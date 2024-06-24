@extends('admin.layouts.app')
@section('title', $title)

@push('style')
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/select2/select2.css" />
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('employees.index') }}">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                            <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home /</span> {{ $title }}</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-item-center mt-4">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button
                                class="btn btn-secondary add-new btn-primary mx-3"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Add New Employee"
                                id="add-btn"
                                data-url="{{ route('employees.store') }}"
                                tabindex="0" aria-controls="DataTables_Table_0"
                                type="button" data-bs-toggle="modal"
                                data-bs-target="#create-form-modal"
                                >
                                <span>
                                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">Add New</span>
                                </span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br />
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-4 status"></div>
                    <div class="col-md-4 status">
                        <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                    </div>
                    <div class="col-md-4 status">
                        <select id="status" name="status_id" class="select2 form-select text-capitalize" >
                            <option value="All" selected> Search by Status </option>
                            <option value="1">Active</option>
                            <option value="2">De-active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="container">
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Employee</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($data['employees'] as $key=>$employee)
                                    <tr class="odd" id="id-{{ $employee->id }}">
                                        <td tabindex="0">{{ $data['employees']->firstItem()+$key }}.</td>
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
                                                    <span class="fw-semibold">{{ $employee->first_name??'' }} {{ $employee->last_name??'' }}</span>
                                                    <small class="text-muted">{{ $employee->email??'-' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                @if(isset($employee->profile) && !empty($employee->profile->phone_number))
                                                    {{ $employee->profile->phone_number }}
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
                                            <span class="fw-semibold">
                                                {{ $employee->profile->city??'-' }}
                                            </span>
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
                                                <a href="javascript:;"
                                                    class="edit-btn btn btn-icon btn-label-info waves-effect"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit Employee"
                                                    data-edit-url="{{ route('employees.edit', $employee->slug) }}"
                                                    data-url="{{ route('employees.update', $employee->slug) }}"
                                                    tabindex="0" aria-controls="DataTables_Table_0"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#create-form-modal"
                                                    >
                                                    <i class="ti ti-edit ti-sm"></i>
                                                </a>
                                                &nbsp; &nbsp;    
                                                <a href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="{{ $employee->id }}" data-del-url="{{ route('employees.destroy', $employee->id) }}">
                                                    <i class="ti ti-trash ti-sm"></i>
                                                </a>
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <!--<a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="status" data-status-url='{{ route('employees.status', $employee->id) }}'>-->
                                                    <!--    @if($employee->status)-->
                                                    <!--        De-Active-->
                                                    <!--    @else-->
                                                    <!--        Active-->
                                                    <!--    @endif-->
                                                    <!--</a>-->
                                                    <a href="#"
                                                        class="dropdown-item show"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#dept-details-modal"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Employee Details"
                                                        data-show-url="{{ route('employees.show', $employee->slug) }}"
                                                        >
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="8">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['employees']->firstItem()}} to {{$data['employees']->lastItem()}} of {{$data['employees']->total()}} entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    {!! $data['employees']->links('pagination::bootstrap-4') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add New Employee Modal -->
                <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-add-new-role">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="role-title mb-2" id="modal-label"></h3>
                            </div>
                            <!-- Add role form -->
                            <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="create-form-modal" id="create-form">
                                @csrf

                                <span id="edit-content">
                                    <div class="row">
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="first_name_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="last_name">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="last_name_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                            <input type="email" id="email" class="form-control" placeholder="Enter email address" aria-label="john.doe@cyberonix.org" name="email">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="email_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>
                                            <input type="text" id="phone_number" class="form-control" placeholder="Enter phone number" name="phone_number" >
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="phone_number_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="date_of_birth">Date of Birth</label>
                                            <input
                                                type="text"
                                                name="date_of_birth"
                                                id="multicol-birthdate"
                                                class="form-control dob-picker"
                                                placeholder="YYYY-MM-DD"
                                            />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="location">City <span class="text-danger">*</span></label>
                                            <input type="text" id="city" class="form-control" name="city" placeholder="Enter city name">
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="city_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="password_error" class="text-danger error"></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container col-6">
                                            <label class="form-label" for="conform_password">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" id="conform-password" class="form-control" name="password_confirmation" placeholder="Confirm Password" />
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="conform_password_error" class="text-danger error"></span>
                                        </div>
                                    </div>
                                </span>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View Department Details Modal -->
            <div class="modal fade" id="dept-details-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2" id="modal-label"></h3>
                            </div>

                            <div class="col-12">
                                <span id="show-content"></span>
                            </div>

                            <div class="col-12 mt-3">
                                <button
                                    type="reset"
                                    class="btn btn-label-secondary btn-reset"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Department Details Modal -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/select2/select2.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('public/admin') }}/assets/js/form-layouts.js"></script>
    <!--<script src="{{ asset('public/admin') }}/assets/js/phone-number-format.js"></script>   -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const phoneInput = document.getElementById('phone_number');
            phoneInput.addEventListener('input', function (event) {
                let phoneNumber = event.target.value.replace(/\D/g, '');
                
                if (phoneNumber.length >= 10) {
                    phoneNumber = phoneNumber.slice(0, 10);
                }
                
                if (phoneNumber.length >= 3 && phoneNumber.length <= 6) {
                    phoneNumber = phoneNumber.replace(/(\d{3})(\d{0,3})(\d{0,4})/, '$1-$2');
                } else if (phoneNumber.length > 6) {
                    phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1-$2-$3');
                }
                
                event.target.value = phoneNumber;
            });
        });
    </script> 
@endpush
