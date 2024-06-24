<?php

namespace App\Http\Controllers\Admin;

use LogActivity;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Helpers\CustomLog;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('service-list');
        $data = [];

        $title = 'All Services';
        if($request->ajax()){
            $query = Service::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }

            $data['services'] = $query->paginate(10);
            $data['parent_services'] = Service::where('parent_service_id', NULL)->get();
            return (string) view('admin.services.search', compact('data'));
        }

        $data['services'] = Service::orderby('id', 'desc')->paginate(10);
        $data['parent_services'] = Service::orderby('id', 'desc')->where('parent_service_id', NULL)->get();
        return view('admin.services.index', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model = [
                'name' => $request->name,
                'slug' => Str::slug($request->name.'-'.Str::random(3)),
                'parent_service_id' => $request->parent_service_id,
                'status' => $request->status,
            ];

            $model = Service::create($model);

            DB::commit();

            $message = 'Service added';
            $facility_id = "";
            $room_id = "";
            $status = $request->status??1;
            $user_id = auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            LogActivity::addToLog('Service added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $this->authorize('service-edit');
        $data = [];
        $data['model'] = Service::where('slug', $slug)->first();
        $data['parent_services'] = Service::where('parent_service_id', NULL)->get();
        return (string) view('admin.services.edit_content', compact('data'));
    }

    public function update(Request $request, $slug)
    {
        $model = Service::where('slug', $slug)->first();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required'],
        ]);

        DB::beginTransaction();

        try{
            $model->name = $request->name;
            $model->slug = Str::slug($request->name.'-'.Str::random(3));
            $model->parent_service_id = $request->parent_service_id;
            $model->status = $request->status;
            $model->save();

            DB::commit();
            
            $message = 'Service updated';
            $facility_id = "";
            $room_id = "";
            $status = $request->status??1;
            $user_id = auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            LogActivity::addToLog('Service updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($slug)
    {
        $model = Service::where('slug', $slug)->first();
        return (string) view('admin.services.show', compact('model'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $this->authorize('service-delete');
        $model = Service::where('slug', $slug)->delete();
        if($model){
            $onlySoftDeleted = Service::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }
}
