<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use App\Mail\Email;
use Validator;
use App\Models\User;
use App\Models\Task;
use App\Models\Profile;


class LoginController extends BaseController
{
    public function login(Request $request){
        date_default_timezone_set("Asia/Karachi");
        
        $user = User::where('email', $request->email)->first();
        if(empty($request->email)){
            return $this->sendError('Empty.', ['error'=>'Please Enter Email']);
        }

        if (!$user) {
            return $this->sendError('Not Found.', ['error'=>'Invalid Email']);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            
            $success['user'] = new UserResource($user);
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;

            
            $today_assigned_tasks = Task::where('employee_id', $user->id)->where('date',date('Y-m-d'))->where('status','!=', 2)->count();
            $today_completed_tasks = Task::where('employee_id', $user->id)->where('date', date('Y-m-d'))->where('status', 1)->count();
            
            $completed_percent = 0;
            if($today_assigned_tasks > 0){
                $completed_percent = number_format($today_completed_tasks/$today_assigned_tasks*100);
            }
            
            $success['today_completed_percent'] = $completed_percent;
            $success['today_assigned_tasks'] = $today_assigned_tasks;
            $success['today_completed_tasks'] = $today_completed_tasks;
            
            $complement_message = '';
            if ($today_assigned_tasks>0 && $completed_percent < 60) {
                $complement_message = 'You can do it! Keep pushing forward!';
            } else if ($completed_percent >= 60 && $completed_percent <= 80) {
                $complement_message = 'You are making progress! Keep going!';
            } else if ($completed_percent > 80 && $completed_percent <= 90) {
                $complement_message = 'Almost there! Keep it going!';
            } else if ($completed_percent > 90 && $completed_percent < 100) {
                $complement_message = "You're doing great! Just a little more to go!";
            } else if ($completed_percent == 100) {
                $complement_message = 'Hurrah! You have completed the task.';
            }else{
                $complement_message = 'Yet not assigned any task.';
            }
            
            $success['complement_message'] = $complement_message;
            $success['all_time_completed_tasks'] = Task::where('employee_id', $user->id)->where('status', 1)->count();
            $success['all_time_unfinished_tasks'] = Task::where('employee_id', $user->id)->where('status', '!=', 1)->count();

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function userDashboard(Request $request){
        
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }

        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();
        
        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{
            
            $user = User::where('id',$userToken->tokenable_id)->first();
            
            $today_assigned_tasks = Task::where('employee_id', $user->id)->whereDate('date', date('Y-m-d'))->where('status','!=', 2)->count();
            $today_completed_tasks = Task::where('employee_id', $user->id)->whereDate('date', date('Y-m-d'))->where('status', 1)->count();
            
            $completed_percent = 0;
            if($today_assigned_tasks > 0){
                $completed_percent = number_format($today_completed_tasks/$today_assigned_tasks*100);
            }
            
            $success['today_completed_percent'] = $completed_percent;
            $success['today_assigned_tasks'] = $today_assigned_tasks;
            $success['today_completed_tasks'] = $today_completed_tasks;
            
            $complement_message = '';
            if ($today_assigned_tasks>0 && $completed_percent < 60) {
                $complement_message = 'You can do it! Keep pushing forward!';
            } else if ($completed_percent >= 60 && $completed_percent <= 80) {
                $complement_message = 'You are making progress! Keep going!';
            } else if ($completed_percent > 80 && $completed_percent <= 90) {
                $complement_message = 'Almost there! Keep it going!';
            } else if ($completed_percent > 90 && $completed_percent < 100) {
                $complement_message = "You're doing great! Just a little more to go!";
            } else if ($completed_percent == 100) {
                $complement_message = 'Hurrah! You have completed the task.';
            }else{
                $complement_message = 'No Task Assigned.';
            }
            
            $success['complement_message'] = $complement_message;
            
            $success['all_time_completed_tasks'] = Task::where('employee_id', $user->id)->where('status', 1)->count();
            $success['all_time_unfinished_tasks'] = Task::where('employee_id', $user->id)->where('status', '!=', 1)->count();

            return $this->sendResponse($success, 'User Dashboard data.');  
        }
    }

    public function edit(Request $request){
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }

        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();
        
        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{
            $success = User::where('id', $userToken->tokenable_id)->first();
            $success = new UserResource($success);
            return $this->sendResponse($success, 'All Your Data.');
        }
    }

    public function update(Request $request){
        if($request->bearerToken() == ""){
            return $this->sendError('Unauthorized Access', null);
        }
        
        $userToken = DB::table('personal_access_tokens')->where('id', $request->bearerToken())->first();
        
        if(empty($userToken)){
            return $this->sendError('Unauthorized Access', null);
        }else{
            
            if($request->first_name == ""){
                return $this->sendError('First name is required', null);
            }

            if($request->date_of_birth == ""){
                return $this->sendError('Date of birth is required', null);
            }

            if($request->phone_number == ""){
                return $this->sendError('Phone Number is required', null);
            }

            if($request->city == ""){
                return $this->sendError('City is required', null);
            }

            $user = User::where('id', $userToken->tokenable_id)->first();
            
            $profile = Profile::where('user_id', $userToken->tokenable_id)->first();
            
            // if($user && $profile){
                
            //     $user->update([
            //         'first_name' => $request->first_name,
            //         'last_name'  => $request->last_name,
            //     ]);

            //     $imageName = $profile['profile'];

            //     if ($request->hasFile('picture')){    
                    
            //         $image = $request->file('picture');
            //         $imageName = $image->getClientOriginalName();
            //         $imagePath = public_path('admin/assets/img/avatars').$imageName;
            
            //         if (file_exists($imagePath)) {
            //             unlink($imagePath);
            //         }
                    
            //         $image->move(public_path('admin/assets/img/avatars'), $imageName);
            //         $imageName = $imageName;
            //     }
                
            //     $profile->update([
            //         'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
            //         'phone_number'  => $request->phone_number,
            //         'city'          => $request->city,
            //         'profile'       => $imageName,
            //     ]);

            //     return $success['user'] = new UserResource($user);
            //     return $this->sendResponse($success, 'Record Updated.');
            // }
            if($user && $profile){
                $user->update([
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                ]);
                
                $imageName = $profile['profile'];

                if ($request->hasFile('picture')){    
                    
                    $image = $request->file('picture');
                    $imageName = $image->getClientOriginalName();
                    $imagePath = public_path('admin/assets/img/avatars') . $imageName;
                    
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $image->move(public_path('admin/assets/img/avatars'), $imageName);
                    $imageName = $imageName;
                }
                
                $profile->update([
                    'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                    'phone_number'  => $request->phone_number,
                    'city'          => $request->city,
                    'profile'       => $imageName,
                ]);
               
                // if ($request->hasFile('picture')) {    
                //   $imagePath = public_path('admin/assets/img/avatars') . $imageName;
                //     if (file_exists($imagePath)) {
                //         unlink($imagePath);
                //     }

                //     $image->move(public_path('admin/assets/img/avatars'), $imageName);
                //     $profile->update([
                //         'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                //         'phone_number'  => $request->phone_number,
                //         'city'          => $request->city,
                //         'profile'       => $imageName,
                //     ]);
                // }     
                $success['user'] = new UserResource($user);
                return $this->sendResponse($success, 'Record Updated.');
            }

        }
    }
    
    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::where('email', $request->email)->first();
        if(!empty($user)){
            try{
                do{
                    $verify_token = mt_rand(1000, 9999);
                }while(User::where('verify_token', $verify_token)->first());

                $user->verify_token = $verify_token;
                $user->update();

                $body = "Hello ".$user->name.  "<br /> <br />".
                        "You are receiving this email because we recieved a password reset request for your account. <br /><br />".
                        "Your Password Reset Token: <b>". $verify_token."</b><br /><br />".
                        "If you did not request a password reset, no further action is required.<br /><br />";

                $mailData = [
                    'title' => 'Password Reset',
                    'body' => $body
                ];

                \Mail::to($request->email)->send(new Email($mailData));
                
                return $this->sendResponse(null, 'We have sent you token for reset password in your email.');
            } catch (\Exception $e) {
                DB::rollback();
                return $e->getMessage();
            }
        }else{
            return $this->sendError('Account not found.', null);
        }
    }
    
    public function verifyToken(Request $request){
        $validator = Validator::make($request->all(), [
            'verify_token' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::where('verify_token', $request->verify_token)->first();
        if($user){
            $success['verify_token'] = $request->verify_token;
            return $this->sendResponse($success, 'You may choose new password.');
        }else{
            return $this->sendError('Unauthorized Access', null);
        }
    }

    public function changePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'verify_token' => 'required',
            'password' => 'required|min:6|same:confirm-password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::where('verify_token', $request->verify_token)->first();
        if($user){
            $user->password = Hash::make($request->password);
            $user->verify_token = null;
            $user->update();

            return $this->sendResponse(null, 'You have changed password successfully.');
        }else{
            return $this->sendError('Unauthorized Access', null);
        }
    }
}
