@extends('admin.layouts.app')
@section('title', $title.' - Cyberonix')

@section('content')
<input type="hidden" id="page_url" value="{{ route('positions.index') }}">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">{{ $title }}</h5>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row me-2">
                        <div class="col-md-2">
                            <div class="me-3">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>
                                        @if(session()->has('message'))
                                            <div class="alert alert-success" id="message-alert">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif

                                        @if(session()->has('error'))
                                            <div class="alert alert-danger" id="message-alert">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">
                                {{-- <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>
                                        <input type="search" class="form-control" id="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                                        <input type="hidden" class="form-control" id="status" value="All">
                                    </label>
                                </div> --}}
                                <div class="dt-buttons btn-group flex-wrap">
                                    <a data-toggle="tooltip" data-placement="top" title="Show All Records" href="{{ route('employees.index') }}" class="btn btn-success btn-primary mx-3">
                                        <span>
                                            <i class="ti ti-eye me-0 me-sm-1 ti-xs"></i>
                                            <span class="d-none d-sm-inline-block">View All Records</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Employee</th>
                                    <th>Emp-Id</th>
                                    <th>Role</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @php $counter=1; @endphp
                                @foreach ($models as $key=>$employee)
                                    <tr class="odd" id="id-{{ $employee->id }}">
                                        <td tabindex="0">{{ $counter++ }}.</td>
                                        <td class="sorting_1">
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        @if(!empty($employee->image))
                                                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $employee->image }}" alt="Avatar" class="rounded-circle">
                                                        @else
                                                            <img src="{{ asset('public/admin/default.png') }}" alt="Avatar" class="rounded-circle">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="{{ route('employees.show', $employee->slug) }}" class="text-body text-truncate">
                                                        <span class="fw-semibold">{{ $employee->first_name??'' }} {{ $employee->last_name??'' }}</span>
                                                    </a>
                                                    <small class="text-muted">{{ $employee->email??'-' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                @if(isset($employee->profile) && !empty($employee->profile->employment_id))
                                                    {{ $employee->profile->employment_id }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                @if(!empty($employee->getRoleNames()))
                                                    @foreach ($employee->getRoleNames() as $role_name)
                                                        <span class="badge bg-label-primary" text-capitalized="">
                                                            {{ $role_name }}
                                                        </span>
                                                    @endforeach
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if(isset($employee->departmentBridge->department) && !empty($employee->departmentBridge->department))
                                                {{ $employee->departmentBridge->department->name }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if(isset($employee->userWorkingShift->workShift) && !empty($employee->userWorkingShift->workShift->name))
                                                {{ $employee->userWorkingShift->workShift->name }}
                                            @else
                                                @if(isset($employee->departmentBridge->department->departmentWorkShift) && !empty($employee->departmentBridge->department->departmentWorkShift))
                                                    {{ $employee->departmentBridge->department->departmentWorkShift->workShift->name }}
                                                @else
                                                    -
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            @if($employee->status)
                                                <span class="badge bg-label-success" text-capitalized="">Active</span>
                                            @else
                                                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('employees.restore', $employee->id) }}">
                                                    <span>
                                                        <i class="ti ti-refresh ti-sm me-2"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{count($models)}} entries</div>
                                            </div>
                                           
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        setTimeout(function() {
            $('#message-alert').fadeOut('slow');
        }, 2000);
    </script>
@endpush
