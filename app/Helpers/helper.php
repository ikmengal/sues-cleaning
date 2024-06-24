<?php

use App\Models\Task;
use App\Models\User;
use App\Models\Setting;
use App\Models\TaskDetail;
use App\Models\FacilityService;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

function SubPermissions($label){
    return Permission::where('label', $label)->get();
}
function settings()
{
    return Setting::first();
}

function userRole() {
    $user = User::where('id', Auth::user()->id)->first();
    $role = $user->getRoleNames()->first();
    foreach($user->getRoleNames() as $user_role){
        if($user_role=='Admin'){
            $role = $user_role;
        }elseif($user_role=='Department Manager' || $user_role=='Manager'){
            $role = $user_role;
        }
    }

    return $role;
}

function facilityService($facility_id, $room_id, $parent_service_id, $sub_service_id){
    $facility_service = FacilityService::where('facility_id', $facility_id)->where('room_id', $room_id)->where('parent_service_id', $parent_service_id)->where('service_id', $sub_service_id)->first();
    if(!empty($facility_service)){
        return true;
    }else{
        return false;
    }
}

function subServicesCount($facility_id, $room_id, $parent_service_id){
    $facility_parent_service_count = FacilityService::where('facility_id', $facility_id)->where('room_id', $room_id)->where('parent_service_id', $parent_service_id)->count();
    if($facility_parent_service_count){
        return $facility_parent_service_count;
    }else{
        return $facility_parent_service_count;
    }
}

function subServices($parent_service_id, $task_id){
    return TaskDetail::where('task_id', $task_id)->where('parent_service_id', $parent_service_id)->get();
}

function subServicesAvailableCount($date, $facility_id, $room_id, $parent_service_id){
    $task = Task::where('date', $date)->where('facility_id', $facility_id)->where('room_id', $room_id)->first();
    if(!empty($task)){
        return TaskDetail::where('task_id', $task->id)->where('parent_service_id', $parent_service_id)->count();
    }else{
        return 0;
    }
}

function facilityAvailableService($date, $facility_id, $room_id, $parent_service_id, $sub_service_id){
    $task = Task::where('date', $date)->where('facility_id', $facility_id)->where('room_id', $room_id)->first();
    if(!empty($task)){
        $task_details = TaskDetail::where('task_id', $task->id)->where('parent_service_id', $parent_service_id)->where('sub_service_id', $sub_service_id)->first();
        if(!empty($task_details)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function taskDetails($task_id, $service_id, $sub_service_id){
    $task_details = TaskDetail::where('task_id', $task_id)->where('parent_service_id', $service_id)->where('sub_service_id', $sub_service_id)->first();
    if($task_details->status==1){
        return true;
    }else{
        return false;
    }
}


