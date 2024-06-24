<?php

namespace App\Http\Controllers\Admin;

use DB;
use Str;
use App\Mail\Email;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use App\Helpers\CustomLog;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('employees-list');
        $data = [];

        $title = 'All Employees';
        if($request->ajax()){
            $query = User::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('first_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('last_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('email', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }

            $data['employees'] = $query->where('is_employee', 1)->paginate(10);

            return (string) view('admin.employees.search', compact('data'));
        }

        $data['roles'] = Role::orderby('id', 'desc')->get();
        $data['employees'] = User::orderby('id', 'desc')->where('is_employee', 1)->paginate(10);
        return view('admin.employees.index', compact('title', 'data'));
    }

    public function store(Request $request)
    {  

        //return $request;

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
            'city' => 'required',
            'password' => ['required', 'string', 'max:20', 'confirmed'],
        ]);

        // return "working";

        DB::beginTransaction();

        try{
            // $password = Str::random(5);
            //$password = '12345';
            $model = [
                'created_by' => Auth::user()->id,
                'status' => 1,
                'slug' => $request->first_name.'-'.Str::random(5),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];

            $model = User::create($model);
            $model->assignRole('Employee');

            if($model){
                $employment_id = 0;
                do{
                    $employment_id = random_int(1000, 9999);;
                }while(Profile::where('employment_id', $employment_id)->first());

                Profile::create([
                    'user_id' => $model->id,
                    'employment_id' => $employment_id,
                    'phone_number' => $request->phone_number,
                    'city' => $request->city,
                    'date_of_birth' => $request->date_of_birth,
                ]);

                //Employee portal credentials mail
                $body = "Hi ".$model->first_name.' '.$model->last_name."<br /><br />".
                        "Hope this mail finds you well and healthy. You have been added to our company as an employee. <br /><br />".
                        "Your Login credentials are below, <br /><br />".
                        "Email: ".$model->email." <br /><br />".
                        "Password: ". $request->password." <br /><br /><br /><br />".
                        "Please use these credentials to login into your account. <br /><br /><br />".
                        "<a href='".route('admin.login')."'> Go to your account</a> <br /><br /><br /><br />".
                        "You can change your password from your account password settings. <br /><br />".
                        "Hope you will find useful! <br /><br />";

                $footer = "Thanks & Regards, <br /><br />".
                          "Sue's Cleaning LLC";

                $mailData = [
                    'title' => 'Your account has been created.',
                    'body' => $body,
                    'footer' => $footer
                ];

                // Mail::to($model->email)->send(new Email($mailData));
                //Employee portal credentials mail

                DB::commit();
            }
            
            $subject = 'Employee added';
            $facility_id = '';
            $room_id = '';
            $status = $model->status??'1';
            $user_id = $model->id;

            CustomLog::addToCustomLog($subject, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Employee added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function edit($slug)
    {
        $this->authorize('employees-edit');
        $data = [];
        $data['model'] = User::where('slug', $slug)->first();
        return (string) view('admin.employees.edit_content', compact('data'));
    }

    public function update(Request $request, $slug)
    {
        
        $user = User::where('slug', $slug)->first();
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            //'last_name' => ['string', 'max:255'],
            'email' => 'required|max:255|unique:users,id,'.$user->id,
            'phone_number' => 'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
        ]);

        DB::beginTransaction();

        try{    
            $user->created_by = Auth::user()->id;
            $user->status = 1;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;

            if($user->email != $request->email) {
                $user->email = $request->email;
            }

            $user->save();
            $user->assignRole($request->role_id);

            if($user->getRoleNames()->first() != 'Employee'){
                // Remove the existing role from the user
                $user->removeRole($user->getRoleNames()->first());

                // Assign the new role to the user
                $user->assignRole('Employee');
            }

            if($user){
                $profile = Profile::where('user_id', $user->id)->first();
                $profile->phone_number = $request->phone_number;
                $profile->city = $request->city;
                $profile->date_of_birth = $request->date_of_birth;
                $profile->save();

                DB::commit();
            }

            if($user->email != $request->email){
                //Employee portal credentials mail
                $body = "Hi ".$user->first_name.' '.$user->last_name."<br /><br />".
                        "Hope this mail finds you well and healthy. You have been added to our company as an employee. <br /><br />".
                        "Your Login credentials are below, <br /><br />".
                        "Email: ".$user->email." <br /><br />".
                        "Please use these credentials to login into your account. <br /><br /><br />".
                        "<a href='".route('admin.login')."'> Go to your account</a> <br /><br /><br /><br />".
                        "You can change your password from your account password settings. <br /><br />".
                        "Hope you will find useful! <br /><br />";

                $footer = "Thanks & Regards, <br /><br />".
                          "Sue's Cleaning LLC";

                $mailData = [
                    'title' => 'Your account has been created.',
                    'body' => $body,
                    'footer' => $footer
                ];

                Mail::to($user->email)->send(new Email($mailData));
                //Employee portal credentials mail
            }
            //send email if email changed and generated new password.

            $subject = 'Employee updated';
            $facility_id = '';
            $room_id = '';
            $status = $user->status??'1';
            $user_id = $user->id;

            CustomLog::addToCustomLog($subject, $facility_id, $room_id, $status, $user_id);

            \LogActivity::addToLog('Employee updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function show($slug)
    {
        $model = User::where('slug', $slug)->first();
        return (string) view('admin.employees.show', compact('model'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('employees-delete');
        $model = User::where('id', $id)->delete();
        if($model){
            $onlySoftDeleted = User::onlyTrashed()->count();
            return response()->json([
                'status' => true,
                'trash_records' => $onlySoftDeleted
            ]);
        }else{
            return false;
        }
    }

    public function trashed()
    {
        $models = User::onlyTrashed()->get();
        $title = 'All Trashed Records';
        return view('admin.employees.trashed-index', compact('models', 'title'));
    }
    public function restore($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        return redirect()->back()->with('message', 'Record Restored Successfully.');
    }

    public function status(Request $request, $user_id)
    {
        $model = User::where('id', $user_id)->first();

        if($model->status==1) {
            $model->status = 0;
        } else {
            $model->status = 1; //Active
        }

            $model->save();
        //send email if possible

        
        $subject = 'Employee  Status updated';
        $facility_id = '';
        $room_id = '';
        $status = $model->status??'';
        $user_id = $user->id;

        CustomLog::addToCustomLog($subject, $facility_id, $room_id, $status, $user_id);

        \LogActivity::addToLog('Status updated');
        return response()->json(['success' => true]);
    }

    public function userDirectPermissionEdit($slug){
        $user = User::where('slug', $slug)->first();
        $user_permissions = $user->getPermissionNames();
        $models = Permission::orderby('id','DESC')->groupBy('label')->get();

        return (string) view('admin.employees.edit-direct-permission', compact('user', 'models', 'user_permissions'));
    }

    public function userDirectPermissionUpdate(Request $request, $user_slug){
        DB::beginTransaction();

        try{
            $user = User::where('slug', $user_slug)->first();

            $user->syncPermissions($request->input('permissions'));

            DB::commit();

            \LogActivity::addToLog('Direct Permission assigned');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}

