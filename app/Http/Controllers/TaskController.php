<?php

namespace App\Http\Controllers;
use App\Helpers\CustomLog;
use App\Http\Resources\TaskPictureResource;
use DB;
use App\Models\Task;
use App\Models\User;
use App\Models\Service;
use App\Models\Facility;
use App\Models\TaskDetail;
use App\Models\FacilityRoom;
use Illuminate\Http\Request;
use App\Models\FacilityService;
use App\Models\TaskPicture;
use Auth;
use Carbon\Carbon;


class TaskController extends Controller
{
    public function index(Request $request) {
        $this->authorize('task-list');
        $data = [];
        $title = 'All Tasks';
        if($request->ajax()){
            $query = Task::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $user = User::where('first_name', 'like', '%'. $request['search'] .'%')->orWhere('email', 'like', '%'.$request['search'] .'%' )->first();
                if(!empty($user)){
                    $query->where('employee_id', $user->id);
                }
                if(empty($user)){
                    $facility = Facility::where('name', 'like', '%'. $request['search'] .'%')->first();
                    if(!empty($facility)){
                        $query->where('facility_id', $facility->id);
                    }
                }
            }
            if($request['status'] != "All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }

            $data['tasks'] = $query->paginate(10);

            return (string) view('admin.tasks.search', compact('data'));
        }

        $data['tasks'] = Task::orderby('id', 'desc')->paginate(10);
        return view('admin.tasks.index', compact('title', 'data'));
    }

    public function create(){
        $this->authorize('task-create');
        $data = [];
        $title = 'Create Task';
        $data['facilities'] = Facility::where('status', 1)->get();
        $data['employees'] = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->where('status', 1)->get();
        return view('admin.tasks.create', compact('title', 'data'));
    }

    public function store(Request $request){

        $request->validate([
            'employee_id' => ['required'],
            'facility_id' => ['required'],
            'facility_room_id' => ['required'],
            'start_date' => 'required',
            'end_date' => 'required',
            'checked_services' => 'required',
        ]);

        DB::beginTransaction();

        try{

            $task = Task::where('employee_id', $request->employee_id)->where('facility_id', $request->facility_id)->where('room_id', $request->facility_room_id)->where('date', $request->start_date)->where('end_date', $request->end_date)->first();            
            if(empty($task)){
                $startDate = Carbon::parse($request->start_date);
                $endDate = Carbon::parse($request->end_date);
                $differenceInDays = $endDate->diffInDays($startDate)+1;
                $count=1;
                for($count; $count<=$differenceInDays; $count++){
                    $task = Task::create([
                        'employee_id' => $request->employee_id,
                        'facility_id' => $request->facility_id,
                        'room_id' => $request->facility_room_id,
                        'date' => $startDate,
                        'end_date'=> Null,
                        'comment' => $request->comment,
                    ]);
                    $startDate->addDay();
                    $task_ids[] = $task->id;
                }
            }

            if($task){
                foreach($request->checked_services as $parent_service_id => $sub_services) {
                    foreach($sub_services as $sub_service_id) {
                        foreach($task_ids as $task_id){   
                            TaskDetail::create([
                                'task_id' => $task_id,
                                'parent_service_id' => $parent_service_id,
                                'sub_service_id' => $sub_service_id,
                            ]);
                        }
                    }
                }
            }

            DB::commit();

            $subject = 'Task Assigned';
            $facility_id = $request->facility_id;
            $room_id = isset($request->room_id) && !empty($request->room_id)?$request->room_id:$task->room_id;
            $status = $task->status??'1';
            $user_id = $request->employee_id;

            CustomLog::addToCustomLog($subject, $facility_id, $room_id, $status, $user_id);

           \LogActivity::addToLog('Task Assigned');

            return redirect()->route('tasks.index')->with('message', 'Task Assigned Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($id){

        $this->authorize('task-edit');
        $data = [];
        $title = 'Edit Task';
        $data['task'] = Task::where('id', $id)->first();
        $data['facility'] = Facility::where('id', $data['task']->facility_id)->first();
        $data['rooms'] = FacilityRoom::where('facility_id', $data['facility']->id)->get();
        $data['facilities'] = Facility::where('status', 1)->get();
        $data['employees'] = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->where('status', 1)->get();

        $data['services'] = Service::with('haveSubServices')->where('parent_service_id', NULL)->where('status', 1)->get();
        $data['facility_services'] = FacilityService::where('facility_id', $data['task']->facility_id)->paginate(10);
        $data['date'] = $data['task']->date;

        return view('admin.tasks.edit', compact('title', 'data'));
    }

    public function update(Request $request, $task_id){
       
        $request->validate([
            'employee_id' => ['required'],
            'facility_id' => ['required'],
            'start_date' => 'required',
            // 'end_date' => 'required',
            'checked_services' => 'required',
            'checked_services*' => 'required',
        ]);

        DB::beginTransaction();

        try{
            
            $task = Task::where('id', $task_id)->first();
            
            if($task){
                $task->date = $request->start_date;
                $task->end_date = Null;
                $task->employee_id = $request->employee_id;
                $task->facility_id = $request->facility_id;
                $task->room_id = isset($request->room_id) && !empty($request->room_id)?$request->room_id:$task->room_id;
                $task->comment = $request->comment;
                //$task->status = 1;
                $task->save();
            }

            if($task && !empty($request->checked_services)){
                TaskDetail::where('task_id', $task_id)->delete();

                foreach($request->checked_services as $parent_service_id => $sub_services) {
                    foreach($sub_services as $sub_service_id) {
                        TaskDetail::create([
                            'task_id' => $task->id,
                            'parent_service_id' => $parent_service_id,
                            'sub_service_id' => $sub_service_id,
                        ]);
                    }
                }
            }

            DB::commit();

            $subject = 'Task Updated';
            $facility_id = $request->facility_id;
            $room_id = isset($request->room_id) && !empty($request->room_id)?$request->room_id:$task->room_id;
            $status = $request->status??'';
            $user_id = $request->employee_id;

            CustomLog::addToCustomLog($subject, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Task Updated');

            return redirect()->route('tasks.index')->with('message', 'Task Updated Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($id){
        $data = [];
        
        $taskPictures = TaskPicture::where('task_id',$id)->get();
        $data['task'] = Task::where('id', $id)->first();
        $data['task_details'] = TaskDetail::groupBy('parent_service_id')->where('task_id', $id)->get();
        
        if(isset($taskPictures) && !empty($taskPictures)){
            $data['picturs'] = TaskPictureResource::Collection($taskPictures);
        }   
        
        return (string) view('admin.tasks.show_content', compact('data'));
    }

    public function destroy($id){
        $this->authorize('task-delete');
        $model = Task::where('id', $id)->delete();
        if($model){
            $onlySoftDeleted = User::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }

    public function getFacilityRooms(Request $request, $facility_id){
        //return $request->employee_id;
        // $facilityRooms = FacilityRoom::where('status', 1)->where('facility_id', $facility_id)->get();
        $facility = Facility::where('id', $facility_id)->first();
        
        $facilityRooms = FacilityRoom::where('status', 1)->where('facility_id', $facility_id)->get();
        
        $task_rooms = [];
        foreach($facilityRooms as $facilityRoom){
            //$room_ids[] = Task::where('facility_id', $facilityRoom->facility_id)->where('date',$request->dobstart_picker)->where('room_id', $facilityRoom->id)->first(['room_id']);
           $task_room= Task::where('facility_id', $facilityRoom->facility_id)->where('room_id', $facilityRoom->id)->where('date',">=",$request->dobstart_picker)->where('end_date',"<=",$request->dobend_picker)->first();  
           if(!empty($task_room)){
                $task_rooms[] = $task_room;
           }
        }
        
        $room_ids = [];
        if(sizeof($task_rooms) > 0){
            foreach($task_rooms as $room){
                // return $room->room_id;
                $room_ids[] = $room->room_id;
            }
        }
        // return $room_ids;
        return $facilityRooms = FacilityRoom::whereNotIn('id', $room_ids)->where('facility_id',$facility_id)->get();

        // return $data;

        // $room_ids = array_filter($room_ids);
        // $data = [];
        // return $room_ids;
        // foreach ($room_ids as $room) {
        //     $excludedRoomId = $room->room_id;
        //     $facilityRooms = FacilityRoom::whereNotIn('id', [$excludedRoomId])->first();
        //     $data[] = $facilityRooms;
        // }
        // return $data;

        // $rooms['facility_rooms'] = $data;
        // foreach($rooms['facility_rooms'] as $values){
        //     $FaclityRm=[];
        //     if(!empty($values)){
        //         foreach($values as $value){
        //             return $fr[] = FacilityRoom::where('id',"!=",$value->room_id)->where('status',1)->where('facility_id',$value->facility_id)->first();    
        //             }
        //     }else{
        //         return $FaclityRm; 
        //     }
        // }
        // if(isset($fr) && !empty($fr)){
        //     return $FaclityRm['facilityRooms'] = $fr;
        // }        
    }

    public function getFacilityTasks(Request $request){

        $data = [];
        $data['facility'] = Facility::where('id', $request->facility_id)->first();
        
        $data['services'] = Service::with('haveSubServices')->where('parent_service_id', NULL)->where('status', 1)->get();

        $data['facility_services'] = FacilityService::where('room_id', $request->room_id)->where('facility_id', $data['facility']->id)->paginate(10);
        $data['date'] = $request->date;

        $data['room_id'] = $request->room_id;
        return (string) view('admin.tasks.facility-services', compact('data'));
    }
    
    public function roomAssignToUser($user_id, $room_id, $task_date, $facility_id){

        $loggedInUserId = Auth::id();
        
        $data=[];
        $previous_user_id = User::where('id',$user_id)->first();
        
        $data['previous_user_id'] = $previous_user_id->id;
        $data['previous_user_fname'] = $previous_user_id->first_name;
        $data['previous_user_lname'] = $previous_user_id->last_name;
        $data['users'] = User::where('id', '!=', $loggedInUserId)->get();
        $data['ficility'] = Facility::where('id',$facility_id)->first();
        $data['room'] = FacilityRoom::where('id',$room_id)->first();
        $data['date'] = $task_date;

        return (string) view('admin.tasks.room-assign-to-user', compact('data'));
    }

    public function assignTheRoomToUser(Request $request){
       
        $assign_to_user_id = $request->user_id;
        
        $existingTask = Task::with(['pictures', 'details'])
                    ->where('date',$request->date)
                    ->where('facility_id',$request->facility_id)
                    ->where('room_id',$request->room_id)
                    ->where('employee_id', $request->previous_user_id)
                    ->first();

        if ($existingTask) {
            
            // Clone the existing task with the new employee_id
            $newTask = $existingTask->replicate();
            $newTask->employee_id = $assign_to_user_id; // Assign the new user ID
            $newTask->save();
            
            // Replicate and associate pictures and details
            foreach ($existingTask->pictures as $picture) {
                $newPicture = $picture->replicate();
                $newPicture->task_id = $newTask->id; // Update foreign key
                $newPicture->save();
            }

            foreach ($existingTask->details as $detail) {
                $newDetail = $detail->replicate();
                $newDetail->task_id = $newTask->id; // Update foreign key
                $newDetail->save();
            }

            return $newTask; 
        } else {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }

}
