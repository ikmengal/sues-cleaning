<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Support\Str;
use App\Models\FacilityRoom;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Helpers\CustomLog;

class FacilityRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('room-list');
        $data = [];

        $title = 'All Rooms';
        if($request->ajax()){
            $query = FacilityRoom::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }

            $data['rooms'] = $query->paginate(10);
            return (string) view('admin.rooms.search', compact('data'));
        }

        $data['facility'] = Facility::where('slug', $request->facility_slug)->first();
        $data['facilities'] = Facility::where('status', 1)->get();
        $data['rooms'] = FacilityRoom::orderby('id', 'desc')->where('facility_id', $data['facility']->id)->paginate(10);
        $data['roomtypes'] = RoomType::get();

        return view('admin.rooms.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'room_occupant_name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try{
            $model = [
                'room_type_id' => $request->room_type,
                'facility_id' => $request->facility_id,
                'name' => $request->name,
                'room_occupant_name' =>$request->room_occupant_name,
                'slug' => Str::slug($request->name.'-'.Str::random(3)),
                'description' => $request->description,
                'status' => $request->status??1,
            ];

            $model = FacilityRoom::create($model);

            DB::commit();



            $message = 'Facility room added';
            $facility_id = $request->facility_id;
            $room_id = $model->id;
            $status = $request->status??1;
            $user_id =  auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);


            \LogActivity::addToLog('Facility room added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $model = FacilityRoom::where('slug', $slug)->first();
        return (string) view('admin.rooms.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $this->authorize('room-edit');
        $data = [];
        $data['model'] = FacilityRoom::where('slug', $slug)->first();
        $data['roomtypes'] = RoomType::get();
        return (string) view('admin.rooms.edit_content', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {   
        // return $request;

        $model = FacilityRoom::where('slug', $slug)->first();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'facility_id' => ['required'],
            'room_occupant_name' => ['required', 'string', 'max:255'],
            'room_type' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model->room_type_id = $request->room_type;
            $model->name = $request->name;
            $model->room_occupant_name = $request->room_occupant_name;
            $model->slug = Str::slug($request->name.'-'.Str::random(3));
            $model->description = $request->description;
            $model->save();

            DB::commit();

            $message = 'Facility room updated';
            $facility_id = $request->facility_id;
            $room_id = $model->id;
            $status = $request->status??1;
            $user_id =  auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Facility room updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $this->authorize('room-delete');
        $model = FacilityRoom::where('slug', $slug)->delete();
        if($model){
            $onlySoftDeleted = FacilityRoom::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }

    public function status($slug)
    {
        $model = FacilityRoom::where('slug', $slug)->first();

        if($model->status==1) {
            $model->status = 0;
        } else {
            $model->status = 1; //Active
        }

        $model->save();

        $message = 'Facility room status updated';
        $facility_id = $model->facility_id;
        $room_id = $model->id;
        $status = $request->status??1;
        $user_id =  auth()->id();
        CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);


        \LogActivity::addToLog('Status updated');
        return response()->json(['success' => true]);
    }
}
