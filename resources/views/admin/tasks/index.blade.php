@extends('admin.layouts.app')
@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/select2/select2.css" />
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('tasks.index') }}">

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
                            <a href="{{ route('tasks.create') }}" class="btn btn-secondary btn-primary mx-3">
                                <span>
                                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">Add New</span>
                                </span>
                            </a>
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
                        <select id="status" name="status" class="form-select text-capitalize" >
                            <option value="All" selected> Search by Status </option>
                            <option value="1">Completed</option>
                            <option value="2">Pending</option>
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
                                    <th>Facility</th>
                                    <th>Room</th>
                                    <th>Date</th>
                                    <!--<th>End Date</th>-->
                                    <!-- <th>Comment</th> -->
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($data['tasks'] as $key=>$task)
                                    <tr class="odd" id="id-{{ $task->id }}">
                                        <td tabindex="0">{{ $data['tasks']->firstItem()+$key }}.</td>
                                        <td>
                                            <div class="d-flex justify-content-start align-items-center user-name">
                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3">
                                                        @if(isset($task->hasEmployee) && !empty($task->hasEmployee->image))
                                                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $task->hasEmployee->image }}" alt="Avatar" class="rounded-circle">
                                                        @else
                                                            <img src="{{ asset('public/admin/default.png') }}" alt="Avatar" class="rounded-circle">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span class="fw-semibold">{{ $task->hasEmployee->first_name??'' }} {{ $task->hasEmployee->last_name??'' }}</span>
                                                    <small class="text-muted">{{ $task->hasEmployee->email??'-' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                {{ $task->hasFacility->name??'-' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                {{ $task->hasRoom->name??'-' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                @if(!empty($task->date))
                                                    {{ date('d M Y', strtotime($task->date)) }}
                                                @else
                                                    -
                                                @endif
                                            </span>
                                        </td>
                                        <!--<td>-->
                                        <!--    <span class="fw-semibold">-->
                                        <!--        @if(!empty($task->end_date))-->
                                        <!--            {{ date('d F Y', strtotime($task->end_date)) }}-->
                                        <!--        @else-->
                                        <!--            --->
                                        <!--        @endif-->
                                        <!--    </span>-->
                                        <!--</td>-->
                                        
                                        <td>
                                            <span class="fw-semibold">
                                                @if($task->status)
                                                    <span
                                                        class="badge bg-label-success"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Completed: {{ date('d F Y', strtotime($task->creaed_at)) }}"
                                                    >Completed
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge bg-label-danger"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Created At: {{ date('d F Y', strtotime($task->creaed_at)) }}"
                                                    >Pending</span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="#"
                                                        class="dropdown-item show"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#dept-details-modal"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Task Details"
                                                        data-show-url="{{ route('tasks.show', $task->id) }}"
                                                        >
                                                        View Details
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item show"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#dept-details-modal-assign"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Assign Room To Another User"
                                                        data-show-url="{{ route('room-assign-to-user', ['user_id' => $task->hasEmployee->id, 'room_id' => $task->hasRoom->id, 'task_date' => $task->date, 'facility_id' => $task->hasFacility->id]) }}"
                                                        data-url="{{ route('employees.update', $task->hasEmployee->slug) }}"
                                                        id="show_room_data_to_edit"
                                                        >
                                                        Assign Room To Another User
                                                    </a>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="dropdown-item">
                                                        Edit
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item delete"
                                                        data-slug="{{ $task->id }}"
                                                        data-del-url="{{ route('tasks.destroy', $task->id) }}"
                                                        >
                                                        Delete
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
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['tasks']->firstItem()}} to {{$data['tasks']->lastItem()}} of {{$data['tasks']->total()}} entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    {!! $data['tasks']->links('pagination::bootstrap-4') !!}
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
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter facility name" name="name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter last name" name="email">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="email_error" class="text-danger error"></span>
                                    </div>

                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>
                                        <input type="text" id="phone_number" class="form-control" placeholder="Enter phone number" name="phone_number">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="phone_number_error" class="text-danger error"></span>
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
                <div class="modal-dialog modal-xl modal-dialog-top modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2" id="modal-label"></h3>
                            </div>

                            <div class="col-12">
                                <span id="show-content"></span>
                            </div>

                            <div class="col-12 mt-5">
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
                
            <!-- View User Assign Modal -->
            <div class="modal fade" id="dept-details-modal-assign" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-top modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2" id="modal-label-assign"></h3>
                            </div>

                            <div class="col-12">
                                <span id="show-content-assign"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View User Assign Modall -->
            
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="{{ asset('public/admin') }}/assets/js/form-layouts.js"></script>

<script>
    $(document).on('click', '#show_room_data_to_edit', function(e){
            var showUrl = $(this).data('show-url');
            var modal_label = $(this).attr('title');
            console.log(modal_label);
            $('#modal-label-assign').html(modal_label);
            
            
            
            $.ajax({
                url: showUrl,
                method: 'GET',
                success: function(response) {
                    $('#show-content-assign').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $(document).on('click', '#updatedata', function(e){
            
            var inputName = 'facility_name';
            var targetInput = $('input[name="' + inputName + '"]').first();
            var facility_id = targetInput.attr('id');

            user_id = $('#user').val();
            date = $('#date').val();
            room_id = $('#room_id').val();
            previous_user_id = $('#previous_user_id').val();
            

            $.ajax({
                url:'{{ route("assign-the-room-to-user") }}',
                method:'GET',
                data:{date:date, facility_id:facility_id, room_id:room_id, user_id:user_id, previous_user_id:previous_user_id},
                success: function(response) {
                    console.log(response);
                    window.location.href = '{{ route("tasks.index") }}';
                },
            });
        });
</script>
@endpush
