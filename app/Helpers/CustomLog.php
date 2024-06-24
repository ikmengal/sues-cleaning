<?php


namespace App\Helpers;
use Request;
use App\Models\CustomLog as CustomLogModel;


class CustomLog
{
    public static function addToCustomLog($subject, $facility_id, $room_id, $status, $user_id)
    {
    	$log = [];
    	$log['subject'] = $subject;
    	$log['user_id'] = $user_id;
    	$log['facility_id'] = $facility_id;
    	$log['room_id'] = $room_id;
    	$log['status'] = $status;
    	
    	CustomLogModel::create($log);
    }

}
