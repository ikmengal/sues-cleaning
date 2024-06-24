<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\TaskDetail;
use App\Models\TaskPicture;
use App\Models\FacilityRoom;
use DB;
use App\Http\Resources\UserResource;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskDetailResource;
use App\Http\Resources\TaskPictureResource;
use Storage;

class TaskController extends BaseController
{
    public function getUserTasks(Request $request){
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }

        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();

        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{
            $success['user'] = User::where('id', $userToken->tokenable_id)->first();
            $success['total_tasks'] = Task::where('employee_id', $userToken->tokenable_id)->where('status', '!=', 2)->count();
            $currentDate = now()->format('Y-m-d');
            $tasks = Task::orderByRaw("CASE WHEN date = '{$currentDate}' THEN 0 ELSE 1 END")->orderBy('date','desc')->where('employee_id', $userToken->tokenable_id)->where('status', '!=', 2)->get();
            //$tasks = Task::where('employee_id', $userToken->tokenable_id)->where('status', '!=', 2)->get();
            
           // return $tasks;
            
            
            
            $data = [];
            $user_tasks = [];
            foreach($tasks as $task){
                //return $task->hasEmployee->;
                
                
                
                
                // if($task->status==0){
                //     $status = 'Pending';    
                // }else if($task->status==1){
                //     $status = 'Completed';    
                // }else{
                //     $status = 'Cancalled';    
                // }
                
                // $user_tasks[date('l, d M', strtotime($task->date))][$task->hasFacility->name][] = [
                //     'room_name' => $task->hasRoom->name,    
                //     'user_name' => $task->hasEmployee->first_name.' '.$task->hasEmployee->last_name,    
                //     'status' => $status,    
                // ];
                
                // $data[]= [
                //     'date' => date('l, d M', strtotime($task->date)),
                //     'facility_name' => $task->hasFacility->name,
                //     'facility_id' => $task->hasFacility->id,    
                //     'room_name' => $task->hasRoom->name, 
                //     'room_id' => $task->hasRoom->id,   
                //     'user_name' => $task->hasEmployee->first_name.' '.$task->hasEmployee->last_name,    
                //     'user_id' => $task->hasEmployee->id,
                //     'status' => $status,    
                // ];
                
                // $data['facility_data']=[
                //     'date' => date('l, d M', strtotime($task->date)),
                //     'facility_name' => $task->hasFacility->name,
                //     'facility_id' => $task->hasFacility->id,        
                // ];
                // $data['room_data'][]=[
                //     'room_name' => $task->hasRoom->name, 
                //     'room_id' => $task->hasRoom->id,   
                //     'user_name' => $task->hasEmployee->first_name.' '.$task->hasEmployee->last_name,    
                //     'user_id' => $task->hasEmployee->id,
                //     'status' => $status,    
                // ];
                
                
                $desiredDate = date('l, d M', strtotime($task->date)); // The date you want to check
                $desiredFacilityId = $task->hasFacility->id; // The facility_id you want to check
                
                $found = true;

                foreach ($user_tasks as $user_task) {
                    
                    
                    
                    if (isset($user_task['date']) && $user_task['date'] === $desiredDate && $user_task['facility_id'] === $desiredFacilityId) {
                        $found = false;
                        break; // No need to continue searching
                    }
                }

                if ($found) {
                    
                    $rooms_data = [];
                    foreach($task->hasRooms as $room){
                       // return $room;
                        
                        
                        if($room->status==0){
                            $status = 'Pending';    
                        }else if($room->status==1){
                            $status = 'Completed';    
                        }else{
                            $status = 'Cancalled';    
                        }
                        
                        //$status = 'Completed';
                        
                        
                        if($task->employee_id == $room->employee_id){
                            $rooms_data[] = [
                                'room_primary_key' => $room->id,
                                'room_name' => $room->hasRoom->name, 
                                'room_id' => $room->room_id,   
                                //'user_name' => $room->hasEmployee->first_name.' '.$room->hasEmployee->last_name,
                                'room_type' => $room->hasRoom->hasRoomType->name??'N/A',
                                'room_occupant_name' => $room->hasRoom->room_occupant_name,
                                'user_id' => $room->employee_id,
                                'status' => $status,  
                            ];
                        }
                    }

                    $user_tasks['facility_data']=[
                        'date' => date('l, d M', strtotime($task->date)),
                        'facility_name' => $task->hasFacility->name,
                        'facility_id' => $task->hasFacility->id, 
                    ];
                    $user_tasks['room_data'] = $rooms_data;

                    $data[]=$user_tasks;
                } 
                
                
                
            }
                
            //return $data;
                
            // $success['user_tasks'] = $user_tasks;
            $success['user_tasks'] = $data;
            
            return $this->sendResponse($success, 'All Your Tasks Report.');
        }
    }
    
    public function getTaskServices(Request $request){
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }

        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();

        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{

           
            $user = User::where('id', $userToken->tokenable_id)->first();
            $task = Task::where('facility_id', $request->facility_id)->where('room_id', $request->room_id)->where('employee_id', $user->id)->where('id',$request->primary_room_id)->first();
            $facility_data = FacilityRoom::where('id',$task->room_id)->where('facility_id',$task->facility_id)->first();
            //return $task;
        
        
            
            $mainStatus = 'Pending';
            if($task->status==0){
                $mainStatus = 'Pending';
                $mark_as_incompleted = 'Incompleted';
            }else if($task->status==1){
                $mainStatus = 'Completed';
                $mark_as_incompleted = 'Completed';
            }
            $success['main_status'] = $mainStatus;
            $success['mark_as_incompleted'] = $mark_as_incompleted;
            $success['primary_room_id'] = $task->id;
            $success['room_occupant_name'] = $facility_data->room_occupant_name;
            $success['room_type'] = $facility_data->hasRoomType->name??'N/A';
            $success['task'] = new TaskResource($task);
            //return $success;
            //return $task->id;
            $task_details = TaskDetail::where('task_id', $task->id)->get();
            
            $data = [];
            $task_sevices = [];    
            
            foreach($task_details as $task_detail){
        
                $serviceName = $task_detail->hasParentService->name; // The service name you want to check
                $serviceId = $task_detail->hasParentService->id; // The service_id you want to check

                $found = true;

                foreach ($task_sevices as $task_sevice) {
                    if (isset($task_sevice['parent_service_id']) && $task_sevice['parent_service_id'] === $serviceId) {
                        $found = false;
                        break; // No need to continue searching
                    }
                }

                if($found){
                    $service_data=[];
                    foreach(subServices($task_detail->parent_service_id, $task_detail->task_id) as $subService){

                        if($subService->status==0){
                            $status = 'Pending';    
                        }else if($subService->status==1){
                            $status = 'Completed';
                        }else{
                            $status = 'Cancelled';
                        }
                        
                        $is_checked = "";
                        if($subService->status == 0){
                            $is_checked = false;
                        }else if($subService->status == 1){
                            $is_checked = true;
                        }

                        $service_data[] = [
                            'parent_service_id' => $subService->parent_service_id,    
                            'sub_service_id' => $subService->sub_service_id,    
                            'sub_service_name' => $subService->hasSubService->name,    
                            'status' => $status,    
                            'is_checked' => $is_checked, 
                        ];
                    }


                   

                    $task_sevices['services']=[
                        'parent_service_name'=>$task_detail->hasParentService->name,
                        'parent_service_id'=>$task_detail->hasParentService->id, 
                        'primary_room_id' => $task->id,
                        'room_occupant_name' =>$facility_data->room_occupant_name,
                        
                    ];

                    $task_sevices['sub_services'] = $service_data;
                    $data[]=$task_sevices;
                }
            }
            $success['task_services'] = $data;

            //$previousPictures = TaskPicture::orderBy('updated_at', 'desc')->where('task_id', $task->id)->skip(1)->get();
           
            $previousPictures = TaskPicture::orderBy('updated_at', 'desc')->where('task_id', $task->id)
            ->skip(1)
            ->take(PHP_INT_MAX)
            ->get();
            
            //$pictures = TaskPicture::latest('updated_at')->where('task_id', $task->id)->get();
            
            $lastpictures = TaskPicture::orderBy('updated_at', 'desc')->groupBy('updated_at')->where('task_id', $task->id)->first();
           
            if(isset($lastpictures) && !empty($lastpictures)){
                $pictures = TaskPicture::where('task_id', $task->id)
                    ->whereRaw('DATE_FORMAT(updated_at, "%Y-%m-%d %H:%i") = ?', [$lastpictures->updated_at->format('Y-m-d H:i')])
                    ->latest('updated_at')
                    ->get();
            }

            
            if(!empty($pictures) && sizeof($pictures) > 0){
                $success['pictures'] = TaskPictureResource::Collection($pictures);
            }

            $success['previousPictures'] = $previousPictures;
            //$success['task'] = new TaskResource($task);
            return $this->sendResponse($success, 'All Your Tasks Report.');
        }
    }
    
    public function storeTaskServices(Request $request){
        
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }
        
        if($request->facility_id == ""){
          // return $request->facility_id;
            return $this->sendError('Facility is required', null);
        }
        
        if($request->room_id == ""){
            return $this->sendError('Room is required', null);
        }
        
        if($request->parent_services == ""){
            return $this->sendError('Select at least one service to save.', null);
        }
        
        if($request->primary_task_id == ""){
            return $this->sendError('Primary task id is required', null);
        }

        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();
            
        $returnData = [];
        
        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{
            //return $request->primary_task_id;
            $user = User::where('id', $userToken->tokenable_id)->first();
            
            
            $task = Task::where('facility_id', $request->facility_id)->where('room_id', $request->room_id)->where('employee_id', $user->id)->where('id',$request->primary_task_id)->first();

            //return $task;

            $total_task_sub_services = 0;

            
            if(isset($request->previous_parent_services) && !empty($request->previous_parent_services)){
                foreach(json_decode($request->previous_parent_services) as $previous_sub_services){
                    
                    foreach($previous_sub_services->subService as $pre_sub_services_id){
                        
                        $task_detail = TaskDetail::where('task_id', $task->id)->where('parent_service_id', $previous_sub_services->parentService)->where('sub_service_id', $pre_sub_services_id->subServiceId)->first();
                        if(!empty($task_detail)){
                            $task_detail->status = 0;
                            $task_detail->save();
                        }
                    }
                }
            }
            
            foreach(json_decode($request->parent_services) as $sub_services){
                foreach($sub_services->subService as $sub_service_id){
                    
                    // $returnData[$sub_services->parentService][]=[
                    //     'subServiceId'=> $sub_service_id->subServiceId,
                    // ];
                    
                    $total_task_sub_services++;
                    $task_detail = TaskDetail::where('task_id', $task->id)->where('parent_service_id', $sub_services->parentService)->where('sub_service_id', $sub_service_id->subServiceId)->first();
                    if(!empty($task_detail)){
                        $task_detail->status = 1;
                        $task_detail->save();
                    }
                }
            }
            
            $is_complete_task = 0;
            if($total_task_sub_services==count($task->hasTaskDetails)){
                $is_complete_task = 1;
            }
            
            $task->extra_hours = $request->extra_hours;
            //$task->comment = $task->comment.' User: '.$request->comment;
            $task->comment = $request->comment;
            //$task->status = $is_complete_task;
            $task->status = 1;
            $task->save();
            
            
            if ($request->hasFile('pictures')) {
                //return "If Working";
                $pictures = $request->file('pictures');
                //return $pictures;
                foreach ($pictures as $picture) {
                    
                    $imageName = time() . '_' . $picture->getClientOriginalName();
                    $picture->move(public_path('admin/assets/img/task_pictures'), $imageName);
    
                    TaskPicture::create([
                        'task_id' => $task->id,
                        'picture' => $imageName,
                    ]);
                }
            }
            
            $success['previous_parent_services'] = $request->previous_parent_services;
            $lastpictures = TaskPicture::orderBy('updated_at', 'desc')->groupBy('updated_at')->where('task_id', $task->id)->first();
            if(isset($lastpictures) && !empty($lastpictures)){
                $pictures = TaskPicture::where('task_id', $task->id)
                    ->whereRaw('DATE_FORMAT(updated_at, "%Y-%m-%d %H:%i") = ?', [$lastpictures->updated_at->format('Y-m-d H:i')])
                    ->latest('updated_at')
                    ->get();
            }    
            // $pictures = TaskPicture::where('task_id', $task->id)
            //     ->whereRaw('DATE_FORMAT(updated_at, "%Y-%m-%d %H:%i") = ?', [$task->updated_at->format('Y-m-d H:i')])
            //     ->latest('updated_at')
            //     ->get();
            
            //return $pictures;
            
            
            if(isset($request->extra_hours) && !empty($request->extra_hours)){
                $success['extraHoursComment']=[
                    'extra_hours' =>$request->extra_hours,
                    'comment' =>$request->comment,
                ];
            }
            if(!empty($pictures) && sizeof($pictures) > 0){
                $success['pictures'] = TaskPictureResource::Collection($pictures);
            }
            return $this->sendResponse($success, 'You have completed your tasks.');
        }
    }
    
    public function removeRoomImage(Request $request){
        $image = TaskPicture::find($request->picture_id);
        if ($image) {
            
            $currentImagePath = public_path('admin/assets/img/task_pictures/').$image->picture;
            Storage::delete($currentImagePath);
            $image->delete();
            return $this->sendResponse('success', 'Image deleted successfully.');
        }
        return $this->sendResponse('success','Some thing wrong.');
    }
    
    public function markAsIncompleted(Request $request){
        
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }
        
        if($request->task_primary_key == ""){
            return $this->sendError('Please enter task primary key', null);
        }
        
        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();
        
        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{
            $success = [];
            $task = Task::where('id',$request->task_primary_key)->where('status',1)->first();
            
            if(isset($task) && !empty($task)){
                $task->status = 0;
                $task->save(); 
                
                if($task->status == 0){
                    $success=[
                            'mark_as_incompleted' => 'Incompleted'
                        ];
                    return $this->sendResponse($success, 'Mark as Incompleted');
                }else{
                    $success=[
                            'mark_as_incompleted' => 'Completed'
                        ];
                    return $this->sendResponse($success, 'Mark as Completed');
                }

            }else{
                return $this->sendResponse($success, 'Some think is Wrong');
            }
        }
    }
}
