<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use DB;
use Str;
use App\Helpers\CustomLog;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "Working";
        $this->authorize('room-list');
        $data = [];

        $title = 'All Room Types';
        // if($request->ajax()){
        //     // $query = Facility::orderby('id', 'desc')->where('id', '>', 0);
        //     // if($request['search'] != ""){
        //     //     $query->where('name', 'like', '%'. $request['search'] .'%');
        //     //     $query->orWhere('email', 'like', '%'. $request['search'] .'%');
        //     //     $query->orWhere('phone_number', 'like', '%'. $request['search'] .'%');
        //     // }
        //     // if($request['status'] != "All"){
        //     //     if($request['status']==2){
        //     //         $request['status'] = 0;
        //     //     }
        //     //     $query->where('status', $request['status']);
        //     // }

        //     // $data['facilities'] = $query->paginate(10);
        //     // return (string) view('admin.facilities.search', compact('data'));
        // }

        $data['room_type'] = RoomType::orderby('id', 'desc')->paginate(10);
        return view('admin.room-type.index', compact('title', 'data'));
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
        ]);

        DB::beginTransaction();

        try{
            $model = [
                'name' => $request->name,
                'slug' => Str::slug($request->name.'-'.Str::random(3)),
                'status' => $request->status??1,
            ];

            $model = RoomType::create($model);

            DB::commit();

            $message = 'Room type added';
            $facility_id = "";
            $room_id = "";
            $status = $request->status??1;
            $user_id = auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Room type added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $this->authorize('room-edit');
        $data = [];
        $data['model'] = RoomType::where('slug', $slug)->first();
        return (string) view('admin.room-type.edite_content', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $model = RoomType::where('slug', $slug)->first();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try{
            $model->name = $request->name;
            $model->slug = Str::slug($request->name.'-'.Str::random(3));
            $model->status = $request->status??1;
            $model->save();

            DB::commit();

            $message = 'Room type updated';
            $facility_id = "";
            $room_id = "";
            $status = $request->status??1;
            $user_id = auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Room type updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $this->authorize('room-delete');
        $model = RoomType::where('slug', $slug)->delete();
        if($model){
            $onlySoftDeleted = RoomType::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }
}
