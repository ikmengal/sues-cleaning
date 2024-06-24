<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Facility;
use App\Models\FacilityRoom;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskDetail;
use App\Models\TaskPicture;
use App\Http\Resources\TaskPictureResource;
use Illuminate\Support\Facades\Auth;


class CompletionTaskReportController extends Controller
{
    // Facility Wise Report Data
    public function index(Request $request){   
        $this->authorize('complation-list');
        $data = [];
        $title = 'Facility Report';

        if($request->ajax()){
            // $rooms = Task::where('date',$request->date)->where('facility_id', $request->facility_id)->get();
            // $roomData = collect();
            // foreach ($rooms as $room) {
            //     $data = FacilityRoom::groupBy('id')->where('id',$room->room_id)->get();
            //     if ($data->isNotEmpty()) {
            //         $roomData = $roomData->merge($data);
            //     }
            // }
            // return $roomData;

            // $rooms = Task::where('date', $request->date)
            //             ->where('facility_id', $request->facility_id)
            //             ->get();

            // $roomData = FacilityRoom::whereIn('id', $rooms->pluck('room_id'))
            //             ->where('facility_id', $request->facility_id)
            //             ->distinct('room_id')
            //             ->get();
            // return $roomData;
            
    
            // $rooms = Task::where('date', $request->date)
            //     ->where('facility_id', $request->facility_id)
            //     ->get();
            

            // list($startDate, $endDate) = explode(' to ', $request->date);
            // $rooms = Task::whereBetween('date', [$startDate, $endDate])
            //     ->where('facility_id', $request->facility_id)
            //     ->get();
            
            $dateRange = explode(' to ', $request->date);

            if(count($dateRange) == 2) {
                list($startDate, $endDate) = $dateRange;
                $rooms = Task::where('facility_id',$request->facility_id)->whereBetween('date',[$startDate,$endDate])->get();
            } else {
                $startDate = $endDate = $dateRange[0];

                $rooms = Task::where('facility_id', $request->facility_id)->where('date', $startDate)->get();
            }
            
            $uniqueRoomIds = $rooms->pluck('room_id')->unique();
            $roomData = FacilityRoom::whereIn('id', $uniqueRoomIds)
                ->where('facility_id', $request->facility_id)
                ->get();
            return $roomData;
        
            
        }
        $data['facilities'] = Facility::orderby('id', 'desc')->paginate(10);
        return view('admin.completion-tasks.index', compact('title', 'data'));
    }

    public function completionTaskRoom(Request $request){
        // $data = [];
        // $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->where('date',$request->date)->first();
        // $user = User::where('id',$tasks->employee_id)->first();
        // $facility = Facility::where('id',$request->facility_id)->first();
        // $room = FacilityRoom::where('id',$tasks->room_id)->first();
       
        
        // $data['facility'] =  $facility;
        // $data['task'] =  $tasks;
        // $data['user'] =  $user;
        // $data['room'] = $room;

        // $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->where('date',$request->date)->get();
        // foreach($tasks as $task){
        //     $user[] = User::where('id',$task->employee_id)->first();
        // }
        // $facility = Facility::where('id',$task->facility_id)->first();
        // $room = FacilityRoom::where('id',$task->room_id)->first();
        // $data['facility'] = $facility;
        // $data['task'] =  $tasks;
        // $data['user'] =  $user;
        // $data['room'] = $room;
        
        // list($startDate, $endDate) = explode(' to ', $request->date);

        // $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->whereBetween('date', [$startDate, $endDate])->get();
        
        $dateRange = explode(' to ', $request->date);

        if(count($dateRange) == 2) {
            list($startDate, $endDate) = $dateRange;
            $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->whereBetween('date', [$startDate, $endDate])->get();
        } else {
            $startDate = $endDate = $dateRange[0];

            $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->where('date', $startDate)->get();
        }
    
        foreach($tasks as $task){
            $user[] = User::where('id',$task->employee_id)->first();
        }
        $facility = Facility::where('id',$task->facility_id)->first();
        $room = FacilityRoom::where('id',$task->room_id)->first();
        $data['facility'] = $facility;
        $data['task'] =  $tasks;
        $data['user'] =  $user;
        $data['room'] = $room;



        
        return (string) view('admin.completion-tasks.show-room-table',compact('data'));
    }

    public function completionRoomDetaile($id){
        $data = [];

        $taskPictures = TaskPicture::where('task_id',$id)->get();
        $data['task'] = Task::where('id', $id)->first();
        $data['task_details'] = TaskDetail::groupBy('parent_service_id')->where('task_id', $id)->get();

        if(isset($taskPictures) && !empty($taskPictures)){
            $data['picturs'] = TaskPictureResource::Collection($taskPictures);
        }        
        return (string) view('admin.completion-tasks.show_content', compact('data'));
    }


    // Employee Wise Report Data
    public function completionEmployeeReport(Request $request){
        // $data = [];
        // $title = 'Completion Tasks';

        // if($request->ajax()){
        //     $rooms = Task::where('date', $request->date)->where('employee_id', $request->user_id)->groupBy('facility_id')->get();
        //     $roomData = collect();
        //     foreach ($rooms as $room) {
        //         $data = FacilityRoom::where('id', $room->room_id)->where('facility_id', $room->facility_id)->get();
        //         if ($data->isNotEmpty()) {
        //             $roomData = $roomData->merge($data);
        //         }
        //     }
        //     return $roomData;
        // }
        // $data['user'] = User::orderby('id', 'desc')->paginate(10);
        // return view('admin.completion-tasks.employee-index', compact('title', 'data'));
        
        
        $data = [];
        $title = 'Employee Report';
        $logInUserId = Auth::id();

        if($request->ajax()){
            // $rooms = Task::where('date', $request->date)->where('employee_id', $request->user_id)->get();
            // $roomData = collect();
            // foreach ($rooms as $room) {
            //     $data = FacilityRoom::where('id', $room->room_id)->where('facility_id', $room->facility_id)->get();
            //     if ($data->isNotEmpty()) {
            //         $roomData = $roomData->merge($data);
            //     }
            // }
            // return $roomData;
            
            // list($startDate, $endDate) = explode(' to ', $request->date);
            // $rooms = Task::whereBetween('date',[$startDate, $endDate])->where('employee_id', $request->user_id)->get();
            
            $dateRange = explode(' to ', $request->date);

            if(count($dateRange) == 2) {
                list($startDate, $endDate) = $dateRange;
                $tasks = Task::where('employee_id',$request->user_id)->whereBetween('date',[$startDate,$endDate])->get();
            } else {
                $startDate = $endDate = $dateRange[0];
                $tasks = Task::where('employee_id',$request->user_id)->where('date',$startDate)->get();
            }
            $roomData = collect();
            foreach ($rooms as $room) {
                $data = FacilityRoom::where('id', $room->room_id)->where('facility_id', $room->facility_id)->get();
                if ($data->isNotEmpty()) {
                    $roomData = $roomData->merge($data);
                }
            }
            return $roomData;
        }
        $data['user'] = User::orderby('id', 'desc')->where('id','!=',$logInUserId)->paginate(10);
        return view('admin.completion-tasks.employee-index', compact('title', 'data'));
        
        
        
    }

    public function completionTaskEmployeeRoom(Request $request){

        // $data = [];
        // $tasks = Task::where('room_id',$request->room_id)->where('employee_id',$request->user_id)->where('date',$request->date)->first();
        // $user = User::where('id',$tasks->employee_id)->first();
        // $facility = Facility::where('id',$tasks->facility_id)->first();
        // $room = FacilityRoom::where('id',$tasks->room_id)->first();
        
        // $data['facility'] =  $facility;
        // $data['task'] =  $tasks;
        // $data['user'] =  $user;
        // $data['room'] = $room;



        // $tasks = Task::where('room_id',$request->room_id)->where('employee_id',$request->user_id)->where('date',$request->date)->get();
        // foreach($tasks as $task){
        //     $user[] = User::where('id',$task->employee_id)->first();
        // }
        // $facility = Facility::where('id',$task->facility_id)->first();
        // $room = FacilityRoom::where('id',$task->room_id)->first();
        // $data['facility'] = $facility;
        // $data['task'] =  $tasks;
        // $data['user'] =  $user;
        // $data['room'] = $room;

        // return (string) view('admin.completion-tasks.employee-show-room-table',compact('data'));
        
        
        $data = [];
        $user = [];
        $facility = [];
        $room = [];
        

        // $tasks = Task::where('employee_id',$request->user_id)->where('date',$request->date)->get();
        
        // list($startDate, $endDate) = explode(' to ', $request->date);
        // $tasks = Task::where('employee_id',$request->user_id)->whereBetween('date',[$startDate,$endDate])->get();
        
        $dateRange = explode(' to ', $request->date);

        if(count($dateRange) == 2) {
            list($startDate, $endDate) = $dateRange;
            $tasks = Task::where('employee_id',$request->user_id)->whereBetween('date',[$startDate,$endDate])->get();
        } else {
            $startDate = $endDate = $dateRange[0];
            $tasks = Task::where('employee_id',$request->user_id)->where('date',$startDate)->get();
        }
        
        foreach($tasks as $task){
            $user[] = User::where('id',$task->employee_id)->first();
            $facility[] = Facility::where('id',$task->facility_id)->first();
            $room[] = FacilityRoom::where('id',$task->room_id)->first();
        }
        
        $data['facility'] = $facility;
        $data['task'] =  $tasks;
        $data['user'] =  $user;
        $data['room'] = $room;
           
        return (string) view('admin.completion-tasks.employee-show-room-table',compact('data'));

    }

    public function completionEmployeeRoomDetaile($id){
        $data = [];

        $taskPictures = TaskPicture::where('task_id',$id)->get();
        $data['task'] = Task::where('id', $id)->first();
        $data['task_details'] = TaskDetail::groupBy('parent_service_id')->where('task_id', $id)->get();

        if(isset($taskPictures) && !empty($taskPictures)){
            $data['picturs'] = TaskPictureResource::Collection($taskPictures);
        }        
        return (string) view('admin.completion-tasks.employee-show-content', compact('data'));
        
    }


    // Room Wise Report Data
    public function completionRoomReport(Request $request){
        $this->authorize('complation-list');
        $data = [];
        $title = 'Room Report';

        if($request->ajax()){
            // $rooms = Task::where('date', $request->date)->where('facility_id', $request->facility_id)->get();
            // $roomData = collect();
            // foreach ($rooms as $room) {
            //     $data = FacilityRoom::groupBy('id')->where('id', $room->room_id)->where('facility_id', $room->facility_id)->get();
            //     if ($data->isNotEmpty()) {
            //         $roomData = $roomData->merge($data);
            //     }
            // }
            // return $roomData;

            // $rooms = Task::where('date', $request->date)
            //  ->where('facility_id', $request->facility_id)
            //  ->get();

            // $roomData = FacilityRoom::whereIn('id', $rooms->pluck('room_id'))
            //                         ->where('facility_id', $request->facility_id)
            //                         ->distinct('room_name')
            //                         ->get();

            // return $roomData;
            
            $room = [];

            $tasks =  Task::where('facility_id', $request->facility_id)->get();
            
            $roomData = FacilityRoom::whereIn('id', $tasks->pluck('room_id'))->distinct('room_name')->get();
            return $roomData;
        }
        $data['facilities'] = Facility::orderby('id', 'desc')->paginate(10);
        return view('admin.completion-tasks.room-index', compact('title', 'data'));
    }

    public function completionRoom(Request $request){
        // $data = [];
        // $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->where('date',$request->date)->get();
        // foreach($tasks as $task){
        //     $user[] = User::where('id',$task->employee_id)->first();
        // }
        // $facility = Facility::where('id',$task->facility_id)->first();
        // $room = FacilityRoom::where('id',$task->room_id)->first();
        // $data['facility'] = $facility;
        // $data['task'] =  $tasks;
        // $data['user'] =  $user;
        // $data['room'] = $room;
       
        // list($startDate, $endDate) = explode(' to ', $request->date);
        
        // $user = [];
        // $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->whereBetween('date',[$startDate,$endDate])->get();
        
        $dateRange = explode(' to ', $request->date);

        if(count($dateRange) == 2) {
            list($startDate, $endDate) = $dateRange;
            $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->whereBetween('date',[$startDate,$endDate])->get();
        } else {
            $startDate = $endDate = $dateRange[0];
            $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->where('date',$startDate)->get();
        }
        
        foreach($tasks as $task){
            $user[] = User::where('id',$task->employee_id)->first();
            $facility = Facility::where('id',$task->facility_id)->first();
            $room = FacilityRoom::where('id',$task->room_id)->first();
        }
        $data['facility'] = isset($facility) && !empty($facility)?$facility:'';
        $data['task'] =  $tasks;
        $data['users'] =  isset($user) && !empty($user)?$facility:'';
        $data['room'] = isset($room) && !empty($room)?$room:'';
       
       
       
       
        
        // $user = [];
        // $tasks = Task::where('room_id',$request->room_id)->where('facility_id',$request->facility_id)->where('date',$request->date)->get();

        // foreach($tasks as $task){
        //     $user[] = User::where('id',$task->employee_id)->first();
        // }
        // $data['tasks'] = $tasks;
        // $data['users'] = $user;

        return (string) view('admin.completion-tasks.room-show-room-table',compact('data'));
    }

    public function completionRDetail($id){
        // $data = [];
        // $taskPictures = TaskPicture::where('task_id',$id)->get();
        // $data['task'] = Task::where('id', $id)->first();
        // $data['task_details'] = TaskDetail::groupBy('parent_service_id')->where('task_id', $id)->get();

        // if(isset($taskPictures) && !empty($taskPictures)){
        //     $data['picturs'] = TaskPictureResource::Collection($taskPictures);
        // }        
        // return (string) view('admin.completion-tasks.room-show-content', compact('data'));
        
        $data = [];
        $taskPictures = TaskPicture::where('task_id',$id)->get();
        $data['task'] = Task::where('id', $id)->first();
        $data['task_details'] = TaskDetail::groupBy('parent_service_id')->where('task_id', $id)->get();

        if(isset($taskPictures) && !empty($taskPictures)){
            $data['picturs'] = TaskPictureResource::Collection($taskPictures);
        }
        $data['tasks'] = Task::where('facility_id',$data['task']->facility_id)->where('room_id',$data['task']->room_id)->where('date',$data['task']->date)->get();
        $user = [];
        foreach($data['tasks'] as $tasks)
        {
            $user[] = User::where('id',$tasks->employee_id)->first();
        }

        $data['users'] = $user;
        
        return (string) view('admin.completion-tasks.room-show-content', compact('data'));
    }

    public function roomAssignToUser($user_id, $room_id, $task_date, $facility_id){
        //return "$room_id | $task_date | $facility_id";
        // $data=[];
        // $previous_user_id = User::where('id',$user_id)->first();
        // $data['previous_user_id'] = $previous_user_id->id;
        // $data['users'] = User::get();
        // $data['ficility'] = Facility::where('id',$facility_id)->first();
        // $data['room'] = FacilityRoom::where('id',$room_id)->first();
        // $data['date'] = $task_date;
        
        $loggedInUserId = Auth::id();
        $data=[];
        $previous_user_id = User::where('id',$user_id)->first();
        $data['previous_user_id'] = $previous_user_id->id;
        $data['users'] = User::where('id', '!=', $loggedInUserId)->get();
        $data['ficility'] = Facility::where('id',$facility_id)->first();
        $data['room'] = FacilityRoom::where('id',$room_id)->first();
        $data['date'] = $task_date;

        return (string) view('admin.completion-tasks.room-assign-to-user', compact('data'));
    }

    public function assignTheRoomToUser(Request $request){
        
        $assign_to_user_id = $request->user_id;
        
        $existingTask = Task::with(['pictures', 'details'])
        ->where('date', $request->date)
        ->where('facility_id', $request->facility_id)
        ->where('room_id', $request->room_id)
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
    
    public function generatePdfReport(Request $request){
    
        $existingTasks = Task::with(['pictures', 'details'])
        ->where('date', $request->date)
        ->where('facility_id', $request->facility_id)
        ->where('room_id', $request->room_id)
        ->get();

        foreach ($existingTasks as $existingTask){
            $task[] = Task::where('id',$existingTask->id )->first();
            $tsdtl[] = TaskDetail::groupBy('parent_service_id')->where('task_id', $existingTask->id)->get();
            $taPies[] = TaskPicture::where('task_id',$existingTask->id)->get();
        }

        $data['tasks'] = $task;
        $data['taskDetail'] = $tsdtl;
        $data['taskPictures'] = $taPies;    

        return (string) view('admin.completion-tasks.room-pdf-report', compact('data'));
    }

    public function roomDetailAsSelectUser(Request $request){

        $taskData = Task::where('employee_id',$request->userId)->where('room_id',$request->roomId)->where('facility_id',$request->facilityId)->where('date',$request->date)->first();

        $taskPictures = TaskPicture::where('task_id',$taskData->id)->get();
        $data['task'] = Task::where('id', $taskData->id)->first();
        $data['task_details'] = TaskDetail::groupBy('parent_service_id')->where('task_id', $taskData->id)->get();

        if(isset($taskPictures) && !empty($taskPictures)){
            $data['picturs'] = TaskPictureResource::Collection($taskPictures);
        }
        $data['tasks'] = Task::where('facility_id',$request->facilityId)->where('room_id',$request->roomId)->where('date',$request->date)->get();
        $user = [];
        foreach($data['tasks'] as $tasks)
        {
            $user[] = User::where('id',$tasks->employee_id)->first();
        }
        
        $data['users'] = $user;
        return (string) view('admin.completion-tasks.room-show-content', compact('data'));
    }
}
