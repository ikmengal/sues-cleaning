<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskDetail;
use App\Models\TaskPicture;
use App\Models\Facility;
use App\Models\FacilityRoom;
use App\Models\Service;

class CompletionTaskPDFController extends Controller
{
    public function generatePdfReport(Request $request){
        
        // $existingTasks = Task::with(['pictures', 'details'])
        // ->where('date', $request->date)
        // ->where('facility_id', $request->facility_id)
        // // ->where('room_id', $request->room_id)
        // ->get();

        // $data['facilities'] = Facility::where('id',$request->facility_id)->first();
        
        // $task=[];
        // $tsdtl=[];
        // $taPies=[];
        // $user=[];
        // $rooms=[];
        
        // foreach ($existingTasks as $existingTask){       
        //     $task[] = Task::where('id',$existingTask->id )->first();
        //     $tsdtl[] = TaskDetail::groupBy('parent_service_id')->where('task_id', $existingTask->id)->get();
        //     $taPies[] = TaskPicture::where('task_id',$existingTask->id)->first();
        //     $user[] = User::where('id',$existingTask->employee_id)->first();
        //     $rooms[] = FacilityRoom::where('id',$existingTask->room_id)->first();
        // }

        //     $data['tasks'] = $task;
        //     $data['taskDetail'] = $tsdtl;
        //     $data['taskPictures'] = $taPies;  
        //     $data['users'] = $user; 
        //     $data['rooms'] = $rooms;
        //     $data['date'] = $request->date; 
        
        // $data = [];
        // $user = [];
        // $tasks = Task::where('facility_id',$request->facility_id)->where('room_id', $request->room_id)->where('date', $request->date)->get();
        // foreach ($tasks as $task){
        //     $user[] = User::where('id', $task->employee_id)->first();
        // }

        // $data['users'] = $user;
        // $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();
        // $data['tasks'] = Task::with('hasTaskDetails')->where('facility_id',$request->facility_id)->where('room_id', $request->room_id)->where('date', $request->date)->get();
        // $data['date'] = $request->date;
        // $data['facility_name'] = Facility::where('id',$request->facility_id)->first();
        
       
        
        // // return (string) view('admin.completion-tasks.room-pdf-report', compact('data'));
        // $pdf = PDF::loadView('admin.completion-tasks.room-pdf-report', compact('data'));
        // $pdf->setPaper('A3', 'landscape'); 
        // return $pdf->download('RoomDetails.pdf');
        
        // list($startDate, $endDate) = explode(' to ', $request->date);

        // $startDate = \Carbon\Carbon::parse($startDate);
        // $endDate = \Carbon\Carbon::parse($endDate);

        // $data = [];

        // $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();
        // //$data['all_tasks'] = [];
        // $counter = 1;
        // while ($startDate <= $endDate) {
        //     $tasks = Task::with('hasTaskDetails')->where('room_id', $request->room_id)->where('facility_id', $request->facility_id)->where('date', $startDate)->get();
        //     if(count($tasks) > 0){  
        //         // $allTasks[] = $tasks;
        //         $task_date = date('d-m-Y', strtotime($startDate));
        //         $data['tasks'][$task_date] = $tasks;
        //     }
        //     $startDate->addDay();
        // }

        
        $dateRange = explode(' to ', $request->date);

        if(count($dateRange) == 2) {
            list($startDate, $endDate) = $dateRange;
        } else {
            $startDate = $endDate = $dateRange[0];
        }

        $startDate = \Carbon\Carbon::parse($startDate);
        $endDate = \Carbon\Carbon::parse($endDate);

        $data = [];

        $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();

        $counter = 1;
        while ($startDate <= $endDate) {
            $tasks = Task::with('hasTaskDetails')->where('room_id', $request->room_id)->where('facility_id', $request->facility_id)->where('date', $startDate)->get();
            if(count($tasks) > 0){  
                $task_date = date('d-m-Y', strtotime($startDate));
                $data['tasks'][$task_date] = $tasks;
            }
            $startDate->addDay();
        }
        //return (string) view('admin.completion-tasks.room-pdf-report', compact('data'));
        $pdf = PDF::loadView('admin.completion-tasks.room-pdf-report', compact('data'));
        $pdf->setPaper('A3', 'landscape'); 
        
        $userName = FacilityRoom::where('id',$request->room_id)->first();
        $filename = $userName->name;
        $randomNumber = random_int(10000, 99999);
        $filename = $filename." ".$randomNumber;
        return $pdf->download("$filename.pdf");
    }

    public function generatePdfReportEmployee(Request $request){

        // $data = [];
        // $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();
        // $data['tasks'] = Task::with('hasTaskDetails')->where('employee_id', $request->user_id)->where('date', $request->date)->get();
        // $data['user'] = User::where('id', $request->user_id)->first();
        // $data['date'] = $request->date;

        // //return (string) view('admin.completion-tasks.employee-pdf-report', compact('data'));
        // $pdf = PDF::loadView('admin.completion-tasks.employee-pdf-report', compact('data'));
        // $pdf->setPaper('A3', 'landscape'); 
        // return $pdf->download('Employee_Rooms_Details.pdf');
        
        // list($startDate, $endDate) = explode(' to ', $request->date);

        // $startDate = \Carbon\Carbon::parse($startDate);
        // $endDate = \Carbon\Carbon::parse($endDate);

        // $data = [];

        // $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();
        // $counter = 1;
        // while ($startDate <= $endDate) {
        //     $tasks = Task::with('hasTaskDetails')->where('employee_id', $request->user_id)->where('date', $startDate)->get();
        //     if(count($tasks) > 0){  
        //         $task_date = date('d-m-Y', strtotime($startDate));
        //         $data['tasks'][$task_date] = $tasks;
        //     }
        //     $startDate->addDay();
        // }
        
        $dateRange = explode(' to ', $request->date);

        if(count($dateRange) == 2) {
            list($startDate, $endDate) = $dateRange;
        } else {
            $startDate = $endDate = $dateRange[0];
        }

        $startDate = \Carbon\Carbon::parse($startDate);
        $endDate = \Carbon\Carbon::parse($endDate);

        $data = [];

        $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();

        $counter = 1;
        while ($startDate <= $endDate) {
            $tasks = Task::with('hasTaskDetails')->where('employee_id', $request->user_id)->where('date', $startDate)->get();
            if(count($tasks) > 0){  
                $task_date = date('d-m-Y', strtotime($startDate));
                $data['tasks'][$task_date] = $tasks;
            }
            $startDate->addDay();
        }

        $data['user'] = User::where('id', $request->user_id)->first();
        $userName = User::where('id',$request->user_id)->first();
        $filename = $userName->first_name." ".$userName->last_name;
        $randomNumber = random_int(10000, 99999);
        $filename = $filename." ".$randomNumber;
        //return (string) view('admin.completion-tasks.employee-pdf-report', compact('data'));
        $pdf = PDF::loadView('admin.completion-tasks.employee-pdf-report', compact('data'));
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download("$filename.pdf");
    }

    public function generatePdfReportFacility(Request $request){
    
        // list($startDate, $endDate) = explode(' to ', $request->date);

        // $startDate = \Carbon\Carbon::parse($startDate);
        // $endDate = \Carbon\Carbon::parse($endDate);

        // $data = [];

        // $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();
        // //$data['all_tasks'] = [];
        // $counter = 1;
        // while ($startDate <= $endDate) {
        //     $tasks = Task::with('hasTaskDetails')->where('room_id', $request->room_id)->where('facility_id', $request->facility_id)->where('date', $startDate)->get();
        //     if(count($tasks) > 0){  
        //         // $allTasks[] = $tasks;
        //         $task_date = date('d-m-Y', strtotime($startDate));
        //         $data['tasks'][$task_date] = $tasks;
        //     }
        //     $startDate->addDay();
        // }
        // //dd($data['tasks']);
        // //$data['user'] = User::where('id', $request->user_id)->first();
        // //return $data;

        // //return (string) view('admin.completion-tasks.facility-pdf-report', compact('data'));
        // $pdf = PDF::loadView('admin.completion-tasks.facility-pdf-report', compact('data'));
        // $pdf->setPaper('A3', 'landscape'); 
        // return $pdf->download('Facility_Rooms_Details.pdf');
        
        $dateRange = explode(' to ', $request->date);

        if(count($dateRange) == 2) {
            list($startDate, $endDate) = $dateRange;
        } else {
            $startDate = $endDate = $dateRange[0];
        }

        $startDate = \Carbon\Carbon::parse($startDate);
        $endDate = \Carbon\Carbon::parse($endDate);

        $data = [];

        $data['services'] = Service::with('haveSubServices')->where('status', 1)->where('parent_service_id', null)->get();

        $counter = 1;
        while ($startDate <= $endDate) {
            $tasks = Task::with('hasTaskDetails')->where('room_id', $request->room_id)->where('facility_id', $request->facility_id)->where('date', $startDate)->get();
            if(count($tasks) > 0){  
                $task_date = date('d-m-Y', strtotime($startDate));
                $data['tasks'][$task_date] = $tasks;
            }
            $startDate->addDay();
        }
        $facilityName = Facility::where('id',$request->facility_id)->first();
        $filename = $facilityName->name;
        $randomNumber = random_int(10000, 99999);
        $filename = $filename." ".$randomNumber;
        //return (string) view('admin.completion-tasks.facility-pdf-report', compact('data'));
        $pdf = PDF::loadView('admin.completion-tasks.facility-pdf-report', compact('data'));
        $pdf->setPaper('A3', 'landscape'); 
        return $pdf->download("$filename.pdf");
    }
}