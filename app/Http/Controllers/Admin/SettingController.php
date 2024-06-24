<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Helpers\CustomLog;

class SettingController extends Controller
{
    public function create()
    {
        $this->authorize('setting-create');
        $settings = Setting::first();
        if(empty($settings)){
            $title = 'Setting';
            return view('admin.settings.create', compact('title'));
        }else{
            return redirect()->route('settings.edit', $settings->id);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'currency_symbol' => 'required|max:5',
            'logo' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'favicon' => 'required|image|mimes:jpeg,png'
        ]);

        DB::beginTransaction();

        try{
            $model = new Setting();

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('admin/assets/img/logo'), $logoName);

                $model->logo = $logoName;
            }

            if ($request->hasFile('favicon')) {
                $favicon = $request->file('favicon');
                $faviconName = time() . '.' . $favicon->getClientOriginalExtension();
                $favicon->move(public_path('admin/assets/img/favicon'), $faviconName);

                $model->favicon = $faviconName;
            }

            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = time() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('admin/assets/img/banner'), $bannerName);

                $model->banner = $bannerName;
            }

            $model->name = $request->name;
            $model->language = $request->language;
            $model->max_leaves = $request->max_leaves;
            $model->max_discrepancies = $request->max_discrepancies;
            $model->currency_symbol = $request->currency_symbol;
            $model->country = $request->country;
            $model->area = $request->area;
            $model->city = $request->city;
            $model->state = $request->state;
            $model->zip_code = $request->zip_code;
            $model->address = $request->address;
            $model->save();

            DB::commit();

            $message = 'Setting details added';
            $facility_id = "";
            $room_id = "";
            $status = $request->status??1;
            $user_id = auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Setting details added');

            return redirect()->route('settings.edit', $model->id)->with('message', 'Setting details added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $this->authorize('setting-edit');
        $title = 'Setting Details';
        $data = [];
        $data['model'] = Setting::where('id', $id)->first();
        return view('admin.settings.edit', compact('title', 'data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'currency_symbol' => 'required|max:5',
        ]);

        DB::beginTransaction();

        try{
            $model = Setting::where('id', $id)->first();

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('admin/assets/img/logo'), $logoName);

                $model->logo = $logoName;
            }

            if ($request->hasFile('favicon')) {
                $favicon = $request->file('favicon');
                $faviconName = time() . '.' . $favicon->getClientOriginalExtension();
                $favicon->move(public_path('admin/assets/img/favicon'), $faviconName);

                $model->favicon = $faviconName;
            }

            if ($request->hasFile('banner')) {
                $banner = $request->file('banner');
                $bannerName = time() . '.' . $banner->getClientOriginalExtension();
                $banner->move(public_path('admin/assets/img/banner'), $bannerName);

                $model->banner = $bannerName;
            }

            $model->name = $request->name;
            $model->language = $request->language;
            $model->max_leaves = $request->max_leaves;
            $model->max_discrepancies = $request->max_discrepancies;
            $model->currency_symbol = $request->currency_symbol;
            $model->country = $request->country;
            $model->area = $request->area;
            $model->city = $request->city;
            $model->state = $request->state;
            $model->zip_code = $request->zip_code;
            $model->address = $request->address;
            $model->save();

            DB::commit();

            $message = 'Setting details updated';
            $facility_id = "";
            $room_id = "";
            $status = $request->status??1;
            $user_id = auth()->id();
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Setting details updated');

            return redirect()->route('settings.edit', $id)->with('message', 'Setting details updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
