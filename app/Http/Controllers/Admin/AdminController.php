<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DB;
use DateTime;
use App\Models\User;
use App\Models\Facility;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function logOut()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
    public function dashboard(Request $request)
    {
        $title = 'Admin Dashboard';
        $model = Auth::user();
        
        $users = User::where('is_employee',1)->count();
        $facilities = Facility::where('status',1)->count();
        $services = Service::where('status',1)->where('parent_service_id','!=',Null)->count();
        $tasks = Task::count();
        
        $data['users']=$users;
        $data['facilities']=$facilities;
        $data['services']=$services;
        $data['tasks'] = $tasks;
        return view('admin.dashboards.admin-dashboard', compact('title', 'model','data'));
    }
    public function loginForm()
    {
        $title = 'Login';
        if(Auth::check()){
            return redirect()->route('dashboard');
        }else{
            return view('admin.auth.login', compact('title'));
        }
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors(['Invalid login credentials']);
        }
    }
}
