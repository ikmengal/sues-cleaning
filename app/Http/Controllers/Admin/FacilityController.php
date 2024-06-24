<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use App\Helpers\CustomLog;

class FacilityController extends Controller
{
    public function index(Request $request)
    {   
        $this->authorize('facility-list');
        $data = [];

        $title = 'All Facilities';
        if($request->ajax()){
            $query = Facility::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('email', 'like', '%'. $request['search'] .'%');
                $query->orWhere('phone_number', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }

            $data['facilities'] = $query->paginate(10);
            return (string) view('admin.facilities.search', compact('data'));
        }

        $data['facilities'] = Facility::orderby('id', 'desc')->paginate(10);
        return view('admin.facilities.index', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Facility::class],
            'email' => ['required'],
            //'phone_number' => ['required'],
            'phone_number' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
        ]);

        DB::beginTransaction();

        try{
            $model = [
                'name' => $request->name,
                'slug' => Str::slug($request->name.'-'.Str::random(3)),
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ];

            $model = Facility::create($model);

            DB::commit();

            $message = 'Facility added';
            $facility_id = $model->id;
            $room_id = "";
            $status = 1;
            $user_id =  auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Facility added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $this->authorize('facility-edit');
        $data = [];
        $data['model'] = Facility::where('slug', $slug)->first();
        return (string) view('admin.facilities.edit_content', compact('data'));
    }

    public function update(Request $request, $slug)
    {
        $model = Facility::where('slug', $slug)->first();

        $request->validate([
            'name' => 'required|max:255|unique:facilities,slug,'.$slug,
            'email' => ['required'],
            'phone_number' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
            //'phone_number' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model->name = $request->name;
            $model->slug = Str::slug($request->name.'-'.Str::random(3));
            $model->email = $request->email;
            $model->phone_number = $request->phone_number;
            $model->save();

            DB::commit();

            $message = 'Facility updated';
            $facility_id = $model->id;
            $room_id = "";
            $status = 1;
            $user_id =  auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Facility updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($slug)
    {
        $model = Facility::where('slug', $slug)->first();
        return (string) view('admin.facilities.show', compact('model'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $this->authorize('facility-delete');
        $model = Facility::where('slug', $slug)->delete();
        if($model){
            $onlySoftDeleted = Facility::onlyTrashed()->count();
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
        $model = Facility::where('slug', $slug)->first();

        if($model->status==1) {
            $model->status = 0;
        } else {
            $model->status = 1; //Active
        }

        $model->save();

        $message = 'Status updated';
        $facility_id = $model->id;
        $room_id = "";
        $status = $model->status;
        $user_id =  auth()->id();
        CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

        \LogActivity::addToLog('Status updated');
        return response()->json(['success' => true]);
    }
}
