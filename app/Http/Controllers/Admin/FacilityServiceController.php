<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\Service;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\FacilityService;
use App\Http\Controllers\Controller;
use App\Models\FacilityRoom;
use App\Helpers\CustomLog;

class FacilityServiceController extends Controller
{
    public function show($slug) {
        $data = [];
        $title = 'Facility Room Services';
        $data['services'] = Service::with('haveSubServices')->where('parent_service_id', NULL)->where('status', 1)->get();
        $data['room'] = FacilityRoom::where('slug', $slug)->first();
        $data['rooms'] = FacilityRoom::orderby('id', 'desc')->where('status', 1)->where('facility_id', $data['room']->facility_id)->get();
        $data['facility'] = Facility::where('id', $data['room']->facility_id)->first();
        $data['facility_services'] = FacilityService::where('facility_id', $data['facility']->id)->paginate(10);

        return view('admin.facility-services.index', compact('title', 'data'));
    }

    public function store(Request $request) {
        DB::beginTransaction();

        try{
            if(sizeof($request->checked_services) > 0){
                FacilityService::where('facility_id', $request->facility_id)->where('room_id', $request->room_id)->delete();

                foreach($request->checked_services as $parent_service_id=>$sub_services){
                    foreach($sub_services as $sub_service_id){
                        FacilityService::create([
                            'facility_id' => $request->facility_id,
                            'room_id' => $request->room_id,
                            'parent_service_id' => $parent_service_id,
                            'service_id' => $sub_service_id,
                        ]);
                    }
                }
                DB::commit();
            }


            $message = 'Facility Service Added';
            $facility_id = $request->facility_id;
            $room_id =$request->room_id;
            $status = $request->status??1;
            $user_id =  auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);


            \LogActivity::addToLog('Facility Service Added');

            $room = FacilityRoom::where('facility_id', $request->facility_id)->first();

            return redirect()->route('facility_services.show', $room->slug)->with('message', 'Facility Service Added Successfully !');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
