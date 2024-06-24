@extends('admin.layouts.app')
@section('title', $title. ' - Cyberonix')
@push('styles')
    <link href="{{ asset('public/admin/assets/vendor/css/pages/page-profile.css') }}" rel="stylesheet" />
@endpush
@section('content')
    @php
        $statistics = getAttandanceCount($model->id, $year."-".((int)$month-1)."-26", $year."-".(int)$month."-25",'all', $shift->id);
    @endphp
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    @if(isset($model->profile->coverImage) && !empty($model->profile->coverImage))
                        <img src="{{ asset('public/admin/assets/img/pages') }}/{{ $model->profile->coverImage->image }}" style="width:100%" alt="Banner image" class="rounded-top img-fluid">
                    @else
                        <img src="{{ asset('public/admin/assets/img/pages/default.png') }}" alt="Banner image" style="width:100%" class="rounded-top img-fluid">
                    @endif
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    @if(isset($model->profile) && !empty($model->profile->profile))
                        <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $model->profile->profile }}" style="width: 100px !important; height:100px !important" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"/>
                    @else
                        <img src="{{ asset('public/admin') }}/default.png" style="width: 100px !important; height:100px !important" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img"/>
                    @endif
                </div>
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                            <h4>{{ $model->first_name }} {{ $model->last_name }} <span data-toggle="tooltip" data-placement="top" title="Employment ID">( {{ $model->profile->employment_id??'-' }} )</span></h4>
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2" >
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Position">
                                    <i class="ti ti-color-swatch"></i>
                                    @if(isset($model->jobHistory->designation->title) && !empty($model->jobHistory->designation->title))
                                        {{ $model->jobHistory->designation->title }}
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Employment Status">
                                    <i class="ti ti-tag"></i>
                                    @if(isset($model->jobHistory->userEmploymentStatus->employmentStatus) && !empty($model->jobHistory->userEmploymentStatus->employmentStatus->name))
                                        {{ $model->jobHistory->userEmploymentStatus->employmentStatus->name }}
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Department">
                                    <i class="ti ti-building"></i>
                                    @if(isset($model->departmentBridge->department) && !empty($model->departmentBridge->department->name))
                                        {{ $model->departmentBridge->department->name }}
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Work Shift">
                                    <i class="ti ti-clock"></i>
                                    @if(isset($model->departmentBridge->department->departmentWorkShift->workShift) && !empty($model->departmentBridge->department->departmentWorkShift->workShift->name))
                                        {{ $model->departmentBridge->department->departmentWorkShift->workShift->name }}
                                    @else
                                        -
                                    @endif
                                </li>
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Joining Date">
                                    <i class="ti ti-calendar"></i>
                                    @if(isset($model->jobHistory) && !empty($model->jobHistory->joining_date))
                                        Joined {{ date('d M Y', strtotime($model->jobHistory->joining_date)) }}
                                    @else
                                    -
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="ti ti-user-check me-1"></i>View Profile
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="reporting-authority position-relative text-center">
                    <div class="card-bg"></div>
                    <div class="card-body">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto user-profile-header">
                            @if(isset($department_manager->profile) && !empty($department_manager->profile->profile))
                                <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $department_manager->profile->profile }}" alt="{{ $department_manager->first_name??'No Image' }}" class="d-block mx-auto rounded user-profile-img border-5">
                            @else
                                <img src="{{ asset('public/admin/default.png') }}" alt="No image" class="d-block mx-auto rounded user-profile-img border-5">
                            @endif
                        </div>
                        <h4 class="mt-1">
                            @if(isset($department_manager->profile) && !empty($department_manager->profile))
                                {{ $department_manager->first_name }} {{ $department_manager->last_name }}
                            @else
                            -
                            @endif
                        <h4>
                        <h5 class="btn-primary d-inline-block px-2 py-1 rounded">Reporting Authority</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                <div class="col-7">
                    <div class="card-body text-nowrap">
                        <h5 class="card-title mb-3">Welcome {{ $model->first_name }}! 🎉</h5>
                        <p class="mb-3">
                            Are you all set to take your productivity to the max 🚀 ? <br />
                            Good luck for your day <br/> ahead 😎!
                        </p>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary ">View Profile</a>
                    </div>
                </div>
                <div class="col-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="{{ asset('public/admin/assets/img/illustrations/card-advance-sale.png') }}" height="140" alt="view sales">
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            @php
                $joining_date = Auth::user()->profile->joining_date;
                $summary_year = date('Y');
                $s_month = 1;
                if(date('Y', strtotime($joining_date))==$summary_year){
                    $s_month = date('n', strtotime($joining_date));
                }

                $late_in_summary = [];
                $half_day_summary = [];
                $absent_summary = [];
                for($s_month; $s_month<=date('n'); $s_month++){
                    $summary_statistics = getAttandanceCount($model->id, $summary_year."-".((int)$s_month-1)."-26", $summary_year."-".(int)$s_month."-25",'all', $shift->id);

                    $late_in_summary[] = $summary_statistics['lateIn'];
                    $half_day_summary[] = $summary_statistics['halfDay'];
                    $absent_summary[] = $summary_statistics['absent'];
                }
            @endphp
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <a href="javascript:;" @if(count($statistics['lateInDates']) > 0) data-bs-toggle="modal" data-bs-target="#teamlateinModal" class="late-in-box" @endif data-latein="{{ json_encode($statistics['lateInDates']) }}">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-icon">
                                    <span class="badge bg-label-warning rounded-pill p-2">
                                    <i class="ti ti-credit-card ti-sm"></i>
                                    </span>
                                </div>
                                <h5 class="card-title mb-0 mt-2">Late-In Summary</h5>
                                <small>{{$statistics['lateIn']}} Late-in</small>
                            </div>
                            <div id="lateinSummary" data-late-in-summary="{{ json_encode($late_in_summary) }}"></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <a href="javascript:;" @if(count($statistics['halfDayDates']) > 0) data-bs-toggle="modal" data-bs-target="#teamhalfdayModal" class="half-day-box" @endif data-halfday="{{ json_encode($statistics['halfDayDates']) }}">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-icon">
                                    <span class="badge bg-label-danger rounded-pill p-2">
                                    <i class="ti ti-credit-card ti-sm"></i>
                                    </span>
                                </div>
                                <h5 class="card-title mb-0 mt-2">Half Day Summary</h5>
                                <small>{{$statistics['halfDay']}} Half Day</small>
                            </div>
                            <div id="halfdaySummary" data-half-day-summary="{{ json_encode($half_day_summary) }}"></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <a href="javascript:;" @if(count($statistics['absent_dates']) > 0) data-bs-toggle="modal" data-bs-target="#teamabsentModal" class="absent-dates-box" @endif data-absent="{{ json_encode($statistics['absent_dates']) }}">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-icon">
                                    <span class="badge bg-label-danger rounded-pill p-2">
                                    <i class="ti ti-credit-card ti-sm"></i>
                                    </span>
                                </div>
                                <h5 class="card-title mb-0 mt-2">Absent Summary</h5>
                                <small>{{$statistics['absent']}} Absent</small>
                            </div>
                            <div id="absentSummary" data-absent-summary="{{ json_encode($absent_summary) }}"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card employe-timeline">
                        <h5 class="card-header">News & Update</h5>
                        <div class="card-body pb-0">
                            <ul class="timeline mb-0">
                                @foreach ($data['announcements'] as $announcement)
                                    <li class="timeline-item timeline-item-transparent">
                                        <span class="timeline-point timeline-point-primary"></span>
                                        <div class="timeline-event">
                                            <div class="timeline-header border-bottom mb-3">
                                                <h6 class="mb-0">{{ $announcement->title }},</h6>
                                                <span class="text-primary">{{ date('d M', strtotime($announcement->created_at)) }}</span>
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap mb-2">
                                                <div>{!! $announcement->description !!}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="col-12 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between">
                                            <small class="d-block mb-1 text-muted">Today Summary</small>
                                        </div>
                                        <h4 class="card-title mb-1">
                                            {{ $punchedIn_date }}
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="d-flex gap-2 align-items-center mb-2">
                                                <span class="badge bg-label-info p-1 rounded"
                                                    ><i class="ti ti-arrow-bar-to-down ti-xs"></i
                                                    ></span>
                                                <p class="mb-0">Check In</p>
                                                </div>
                                                <h5 class="mb-0 pt-1 text-nowrap">
                                                    {{ $punchedIn_time }}
                                                </h5>
                                            </div>
                                            <div class="col-2">
                                                <div class="divider divider-vertical">
                                                </div>
                                            </div>
                                            <div class="col-5  text-end">
                                                <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                                                <p class="mb-0">Check Out</p>
                                                <span class="badge bg-label-danger p-1 rounded"><i class="ti ti-arrow-bar-up ti-xs"></i></span>
                                                </div>
                                                <h5 class="mb-0 pt-1 text-nowrap ms-lg-n3 ms-xl-0">
                                                    {{ $punchedOut_time }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center mt-4">
                                            <div class="progress w-100" style="height: 8px">
                                                <div class="progress-bar bg-info" style="width: {{ $check_in_to_current_duration_of_shift }}%"
                                                   role="progressbar" aria-valuenow="{{ $check_in_to_current_duration_of_shift }}"
                                                   aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" title="Time: {{ $currentDateTime }}">
                                                </div>
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $remaining_duration_shift }}%"
                                                   aria-valuenow="{{ $remaining_duration_shift }}" aria-valuemin="0" aria-valuemax="100"
                                                   data-toggle="tooltip" title="End Shift: {{ $endShiftTime }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="card-header mt-1">My Team</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-end mt-4 pe-4">
                                                <a href="javascript:;"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="My Team"
                                                    data-bs-toggle="modal"
                                                    data-show-url="{{ route('employees.get-team-members', $model->id) }}"
                                                    data-bs-target="#teamModal"
                                                    class="btn btn-primary waves-effect waves-light btn-sm show">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive text-nowrap">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($team_members as $team_member)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                                <div class="avatar-wrapper">
                                                                    <div class="avatar me-2">
                                                                        @if(isset($team_member->profile) && !empty($team_member->profile->profile))
                                                                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $team_member->profile->profile }}" alt="Avatar" class="rounded-circle">
                                                                        @else
                                                                            <img src="{{ asset('public/admin') }}/default.png" alt="Avatar" class="rounded-circle">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate">{{ $team_member->first_name??'-' }} {{ $team_member->last_name??'-' }}</span>
                                                                    <small class="emp_post text-truncate text-muted">
                                                                        @if(isset($team_member->jobHistory->designation) && !empty($team_member->jobHistory->designation->title))
                                                                            {{ $team_member->jobHistory->designation->title }}
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    </small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if(isset($team_member->employeeStatus->employmentStatus) && !empty($team_member->employeeStatus->employmentStatus->name))
                                                                @if($team_member->employeeStatus->employmentStatus->name=='Probation')
                                                                    <span class="badge bg-label-warning me-1">Probation</span>
                                                                @elseif($team_member->employeeStatus->employmentStatus->name=='Permanent')
                                                                    <span class="badge bg-label-success me-1">Permanent</span>
                                                                @else
                                                                    <span class="badge bg-label-danger me-1">Terminanted</span>
                                                                @endif
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header d-flex justify-content-between pb-2 mb-1">
                                    <div class="card-title mb-1">
                                        <h5 class="m-0 me-2">Attendance Summary</h5>
                                        <small class="text-muted">This Month</small>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="salesByCountryTabs" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nav-align-top">
                                    <div class="card-body pb-3">
                                        <ul class="nav nav-tabs nav-fill" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-latein" aria-controls="navs-justified-latein" aria-selected="true">Late-in</button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-earlyout" aria-controls="navs-justified-earlyout" aria-selected="false">Early Out</button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-halfday" aria-controls="navs-justified-halfday" aria-selected="false">Half Day</button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-absent" aria-controls="navs-justified-absent" aria-selected="false">Absent</button>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="tab-content p-0 pt-2 pb-2">
                                        <div class="tab-pane fade show navs-justified-latein active input-checkbox" id="navs-justified-latein" role="tabpanel">
                                            <div class="table-responsive text-nowrap scroll-bottom">
                                                <div class="text-end mb-3 pe-3">
                                                    <button data-modal-id="navs-justified-latein" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button>
                                                </div>
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div>
                                                                    <input class="form-check-input select-all" type="checkbox" value="" id="select-all" />
                                                                </div>
                                                            </th>
                                                            <th>Date</th>
                                                            <th>Behavior</th>
                                                            <th>Satus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        @foreach ($statistics['lateInDates'] as $late_in_date)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input 
                                                                            @if(isset($late_in_date['status']) && $late_in_date['status']!="") 
                                                                                disabled checked class="form-check-input late-in-dates" 
                                                                            @else 
                                                                                class="form-check-input late-in-dates checkbox" 
                                                                            @endif 
                                                                            type="checkbox" 
                                                                            data-type={{ $late_in_date['type'] }}
                                                                            value="{{ $late_in_date['attendance_id'] }}" 
                                                                        />
                                                                    </div>
                                                                </td>
                                                                <td>{{ date('d M Y', strtotime($late_in_date['date'])) }}</td>
                                                                <td>
                                                                    @if($late_in_date['status']=='')
                                                                        <span class="badge bg-label-danger me-1"> Not Applied</span>
                                                                    @else
                                                                        <span class="badge bg-label-warning me-1"> Applied</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($late_in_date['status']==0)
                                                                        <span class="badge bg-label-warning me-1"> Pending</span>
                                                                    @elseif($late_in_date['status']==2)
                                                                        <span class="badge bg-label-danger me-1"> Rejected</span>
                                                                    @elseif($late_in_date['status']==1)
                                                                        <span class="badge bg-label-success me-1"> Approved</span>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade navs-justified-earlyout input-checkbox" id="navs-justified-earlyout" role="tabpanel">
                                            <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                                                <div class="text-end mb-3 pe-3">
                                                    <button data-modal-id="navs-justified-earlyout" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button>
                                                </div>
                                                <div class="table-responsive text-nowrap scroll-bottom">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div>
                                                                        <input class="form-check-input select-all" type="checkbox" value="" id="select-all" />
                                                                    </div>
                                                                </th>
                                                                <th>Date</th>
                                                                <th>Behavior</th>
                                                                <th>Satus</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-border-bottom-0">
                                                            @foreach ($statistics['earlyOutDates'] as $early_out_date)
                                                                <tr>
                                                                    <td>
                                                                        <div>
                                                                            <input 
                                                                                @if(isset($early_out_date['status']) && $early_out_date['status']!="") 
                                                                                    disabled checked class="form-check-input early-out-dates" 
                                                                                @else 
                                                                                    class="form-check-input early-out-dates checkbox" 
                                                                                @endif 
                                                                                type="checkbox" 
                                                                                data-type={{ $early_out_date['type'] }}
                                                                                value="{{ $early_out_date['attendance_id'] }}" 
                                                                            />
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ date('d M Y', strtotime($early_out_date['date'])) }}</td>
                                                                    <td>
                                                                        @if($early_out_date['status']=='')
                                                                            <span class="badge bg-label-danger me-1"> Not Applied</span>
                                                                        @else
                                                                            <span class="badge bg-label-warning me-1"> Applied</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($early_out_date['status']==0)
                                                                            <span class="badge bg-label-warning me-1"> Pending</span>
                                                                        @elseif($early_out_date['status']==2)
                                                                            <span class="badge bg-label-danger me-1"> Rejected</span>
                                                                        @elseif($early_out_date['status']==1)
                                                                            <span class="badge bg-label-success me-1"> Approved</span>
                                                                        @else
                                                                        -
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade navs-justified-halfday input-checkbox" id="navs-justified-halfday" role="tabpanel">
                                            <div class="text-end mb-3 pe-3">
                                                <button data-modal-id="navs-justified-halfday" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button></h3>
                                            </div>
                                            <div class="table-responsive text-nowrap scroll-bottom">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div>
                                                                    <input class="form-check-input select-all" id="select-all" type="checkbox"/>
                                                                </div>
                                                            </th>
                                                            <th>Date</th>
                                                            <th>Behavior</th>
                                                            <th>Satus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        @foreach ($statistics['halfDayDates'] as $half_date)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input 
                                                                            @if(isset($half_date['status']) && $half_date['status']!="") 
                                                                                disabled checked class="form-check-input half-day-dates" 
                                                                            @else 
                                                                                class="form-check-input half-day-dates checkbox" 
                                                                            @endif 
                                                                            type="checkbox" 
                                                                            data-type={{ $half_date['type'] }}
                                                                            value="{{ $half_date['date'] }}" 
                                                                        />
                                                                    </div>
                                                                </td>
                                                                <td>{{ date('d M Y', strtotime($half_date['date'])) }}</td>
                                                                <td>
                                                                    @if($half_date['status']=='')
                                                                        <span class="badge bg-label-danger me-1"> Not Applied</span>
                                                                    @else
                                                                        <span class="badge bg-label-warning me-1"> Applied</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($half_date['status']==0)
                                                                        <span class="badge bg-label-warning me-1"> Pending</span>
                                                                    @elseif($half_date['status']==2)
                                                                        <span class="badge bg-label-danger me-1"> Rejected</span>
                                                                    @elseif($half_date['status']==1)
                                                                        <span class="badge bg-label-success me-1"> Approved</span>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade navs-justified-absent input-checkbox" id="navs-justified-absent" role="tabpanel">
                                            <div class="text-end mb-3 pe-3">
                                                <button data-modal-id="navs-justified-absent" data-url="{{ route('user_leaves.store') }}" class="btn btn-primary btn-sm apply-btn" disabled type="button">Apply</button></h3>
                                            </div>
                                            <div class="table-responsive text-nowrap scroll-bottom">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <div>
                                                                    <input id="select-all" class="form-check-input select-all" type="checkbox" />
                                                                </div>
                                                            </th>
                                                            <th>Date</th>
                                                            <th>Behavior</th>
                                                            <th>Satus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                        @foreach ($statistics['absent_dates'] as $absent_date)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <input 
                                                                            @if(isset($absent_date['status']) && $absent_date['status']!="") 
                                                                                disabled checked class="form-check-input absent-dates" 
                                                                            @else 
                                                                                class="form-check-input absent-dates checkbox" 
                                                                            @endif 
                                                                            type="checkbox" 
                                                                            data-type={{ $absent_date['type'] }}
                                                                            value="{{ $absent_date['date'] }}" 
                                                                        />
                                                                    </div>
                                                                </td>
                                                                <td>{{ date('d M Y', strtotime($absent_date['date'])) }}</td>
                                                                <td>
                                                                    @if($absent_date['status']=="")
                                                                        <span class="badge bg-label-danger me-1"> Not Applied</span>
                                                                    @else
                                                                        <span class="badge bg-label-warning me-1"> Applied</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($absent_date['status']==0)
                                                                        <span class="badge bg-label-warning me-1"> Pending</span>
                                                                    @elseif($absent_date['status']==2)
                                                                        <span class="badge bg-label-danger me-1"> Rejected</span>
                                                                    @elseif($absent_date['status']==1)
                                                                        <span class="badge bg-label-success me-1"> Approved</span>
                                                                    @else
                                                                    -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.dashboards.pop-up-modals')
@endsection
@push('js')
    <script src="{{ asset('public/admin/assets/js/custom-dashboard.js') }}"></script>
@endpush
