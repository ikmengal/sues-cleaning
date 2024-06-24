<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CompletionTaskReportController;
use App\Http\Controllers\Admin\LogsController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cache-clear', function() {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    $cache = 'Route cache cleared <br /> View cache cleared <br /> Cache cleared <br /> Config cleared <br /> Config cache cleared';
    return $cache;
});

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/logout', [AdminController::class, 'logOut'])->name('user.logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //Trashed Records Routes
    Route::get('/employees/trashed', [App\Http\Controllers\Admin\EmployeeController::class, 'trashed'])->name('employees.trashed');
    Route::get('/employees/restore/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'restore'])->name('employees.restore');
    Route::post('/employees/status/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'status'])->name('employees.status');

    Route::post('/facilities/status/{slug}', [App\Http\Controllers\Admin\FacilityController::class, 'status'])->name('facilities.status');
    Route::post('/facility_rooms/status/{slug}', [App\Http\Controllers\Admin\FacilityRoomController::class, 'status'])->name('facility_rooms.status');
    Route::get('/tasks/get-facility-rooms/{id}', [App\Http\Controllers\TaskController::class, 'getFacilityRooms'])->name('tasks.get-facility-rooms');
    Route::get('/tasks/get-facility-tasks', [App\Http\Controllers\TaskController::class, 'getFacilityTasks'])->name('tasks.get-facility-tasks');

    //Direct Permission
    Route::get('/user-direct/permission/edit/{slug}', [App\Http\Controllers\Admin\EmployeeController::class, 'userDirectPermissionEdit'])->name('user-direct.permission.edit');
    Route::put('/user-direct/permission/update/{slug}', [App\Http\Controllers\Admin\EmployeeController::class, 'userDirectPermissionUpdate'])->name('user-direct.permission.update');


    //Room Types 
    Route::get('/room-types',[App\Http\Controllers\Admin\RoomTypeController::class, 'index'])->name('room-type.index');
    Route::post('/room-create',[App\Http\Controllers\Admin\RoomTypeController::class, 'store'])->name('room-type.store');
    Route::get('/room-edit,{slug}',[App\Http\Controllers\Admin\RoomTypeController::class, 'edit'])->name('room-type.edit');
    Route::put('/room-update,{slug}',[App\Http\Controllers\Admin\RoomTypeController::class, 'update'])->name('room-type.update');
    Route::delete('/room-destroy,{slug}',[App\Http\Controllers\Admin\RoomTypeController::class, 'destroy'])->name('room-type.destroy');

    //Resources
    Route::resource('/roles', App\Http\Controllers\Admin\RoleController::class);
    Route::resource('/permissions', App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('/employees', App\Http\Controllers\Admin\EmployeeController::class);
    Route::resource('/settings', App\Http\Controllers\Admin\SettingController::class);
    Route::resource('/facilities', App\Http\Controllers\Admin\FacilityController::class);
    Route::resource('/services', App\Http\Controllers\Admin\ServiceController::class);
    Route::resource('/facility_services', App\Http\Controllers\Admin\FacilityServiceController::class);
    Route::resource('/facility_rooms', App\Http\Controllers\Admin\FacilityRoomController::class);
    Route::resource('/tasks', App\Http\Controllers\TaskController::class);


    //Generate PDF
    Route::get('/completion_tasks_report',[App\Http\Controllers\Admin\CompletionTaskReportController::class,'index']);
    Route::get('/completion_task_room',[App\Http\Controllers\Admin\CompletionTaskReportController::class,'completionTaskRoom']);
    Route::get('/completion_room_detaile/{id}', [App\Http\Controllers\Admin\CompletionTaskReportController::class, 'completionRoomDetaile'])->name('completion-room-detaile');
    
    
    Route::get('/completion_employee_report',[App\Http\Controllers\Admin\CompletionTaskReportController::class,'completionEmployeeReport']);
    Route::get('/completion_task_mployee_room',[App\Http\Controllers\Admin\CompletionTaskReportController::class,'completionTaskEmployeeRoom']);
    Route::get('/completion_employee_room_detaile/{id}', [App\Http\Controllers\Admin\CompletionTaskReportController::class, 'completionEmployeeRoomDetaile'])->name('completion-employee-room-detaile');


    Route::get('/completion_room_report',[App\Http\Controllers\Admin\CompletionTaskReportController::class,'completionRoomReport']);
    Route::get('/completion_room',[App\Http\Controllers\Admin\CompletionTaskReportController::class,'completionRoom']);
    Route::get('/completion_rdetaile/{id}', [App\Http\Controllers\Admin\CompletionTaskReportController::class, 'completionRDetail'])->name('completion-rdetaile');
    //Route::get('/room-assign-to-user/{user_id}/{room_id}/{task_date}/{facility_id}', [App\Http\Controllers\Admin\CompletionTaskReportController::class, 'roomAssignToUser'])->name('room-assign-to-user');
    //Route::get('/assign_the_room_to_user', [App\Http\Controllers\AdminCompletionTaskReportController::class, 'assignTheRoomToUser'])->name('assign-the-room-to-user');
    Route::get('/room_detail_as_select_user', [App\Http\Controllers\Admin\CompletionTaskReportController::class, 'roomDetailAsSelectUser'])->name('room-detail-as-select-user');
    Route::get('/room-assign-to-user/{user_id}/{room_id}/{task_date}/{facility_id}', [App\Http\Controllers\TaskController::class, 'roomAssignToUser'])->name('room-assign-to-user');
    Route::get('/assign_the_room_to_user', [App\Http\Controllers\TaskController::class, 'assignTheRoomToUser'])->name('assign-the-room-to-user');

    //gerenate_pdf
    Route::get('/generate_pdf_report', [App\Http\Controllers\Admin\CompletionTaskPDFController::class, 'generatePdfReport'])->name('generate-pdf-report');
    Route::get('/generate_pdf_report_employee', [App\Http\Controllers\Admin\CompletionTaskPDFController::class, 'generatePdfReportEmployee'])->name('generate-pdf-report-employee');
    Route::get('/generate_pdf_report_facility', [App\Http\Controllers\Admin\CompletionTaskPDFController::class, 'generatePdfReportFacility'])->name('generate-pdf-report-facility');

    // Route::get('/generate_excel_report', [App\Http\Controllers\Admin\CompletionTaskExcelController::class,'export']);
    // Route::get('/generate_excel_report', [App\Http\Controllers\Admin\CompletionTaskPDFController::class, 'generateExcelReport']);

    // Logs Route
    Route::get('/logs_index',[App\Http\Controllers\Admin\LogsController::class,'index']);



});

require __DIR__.'/auth.php';
