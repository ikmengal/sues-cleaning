@extends('admin.layouts.app')
@section('title', $title)

@push('styles')
@endpush

@section('content')

<input type="hidden" id="page_url" value="{{ route('facility_rooms.index') }}">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-header">
                        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home / <a href="{{ route('facilities.index') }}">All Facilities</a> / </span> {{ $title }} of facility - <u>{{ $data['facility']->name }}</u></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end align-item-center mt-4">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button
                                class="btn btn-secondary add-new btn-primary mx-3"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Add New Room"
                                id="add-btn"
                                data-url="{{ route('facility_rooms.store') }}"
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
                    <div class="col-md-4 status">
                        <select name="facility" class="select2 form-select text-capitalize" id="redirectDropdown" onchange="redirectPage(this)">
                            @foreach ($data['facilities'] as $facility)
                                <option value="{{ route('facility_rooms.index', ['facility_slug' => $facility->slug]) }}" {{ $facility->slug==$data['facility']->slug?'selected':'' }}>{{ $facility->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
                                    <th>Room</th>
                                    <th>Room Type</th>
                                    <th>Room Occupant Name</th>
                                    <th>Facility</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($data['rooms'] as $key=>$room)
                                    <tr class="odd" id="id-{{ $room->slug }}">
                                        <td tabindex="0">{{ $data['rooms']->firstItem()+$key }}.</td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                {{ $room->name }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                {{ $room->hasRoomType->name??'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center">
                                                {{ $room->room_occupant_name }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                @if(isset($room->hasFacility) && !empty($room->hasFacility->name))
                                                    {{ $room->hasFacility->name }}
                                                @else
                                                -
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($room->status)
                                                <span class="badge bg-label-success" text-capitalized="">Active</span>
                                            @else
                                                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('facility_services.show', $room->slug) }}" style="color: white" class="btn btn-secondary btn-sm btn-primary mx-3 waves-effect waves-light" title="All Services" >
                                                    <span>
                                                        <i class="menu-icon tf-icons ti ti-checkbox"></i>
                                                        <span class="d-none d-sm-inline-block">Services</span>
                                                    </span>
                                                </a>

                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="javascript:;" class="dropdown-item change-status-btn" data-status-type="status" data-status-url='{{ route('facility_rooms.status', $room->slug) }}'>
                                                        @if($room->status)
                                                            De-Active
                                                        @else
                                                            Active
                                                        @endif
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item show"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#dept-details-modal"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Room Details"
                                                        data-show-url="{{ route('facility_rooms.show', $room->slug) }}"
                                                        >
                                                        View Details
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item edit-btn"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit Room"
                                                        data-edit-url="{{ route('facility_rooms.edit', $room->slug) }}"
                                                        data-url="{{ route('facility_rooms.update', $room->slug) }}"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#create-form-modal"
                                                        >
                                                        Edit
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item delete"
                                                        data-slug="{{ $room->slug }}"
                                                        data-del-url="{{ route('facility_rooms.destroy', $room->slug) }}"
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
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['rooms']->firstItem()}} to {{$data['rooms']->lastItem()}} of {{$data['rooms']->total()}} entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    {!! $data['rooms']->links('pagination::bootstrap-4') !!}
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

                        <input type="hidden" name="facility_id" id="facility_id" value="{{ $data['facility']->id }}">
                        <span id="edit-content">
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Enter room name" name="name">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="name_error" class="text-danger error"></span>
                            </div>

                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="room-occupant-name">Room Occupant Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="room_occupant_name" placeholder="Room occupant name" name="room_occupant_name">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="room_occupant_name" class="text-danger error"></span>
                            </div>
                            
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="room-type-name">Room Type <span class="text-danger">*</span></label>
                                <select name="room_type" id="room_type" class="form-control">   
                                    <option value=""selected>Select Room Type</option>
                                    @foreach($data['roomtypes'] as $room_type)
                                        <option value="{{$room_type->id}}">{{ $room_type->name }}</option>
                                    @endforeach
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="room_type" class="text-danger error"></span>
                            </div>

                            <div class="">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="form-control">   
                                    <option value="" selected>Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="status_error" class="text-danger error"></span>
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

@endsection
@push('js')  
    <script>
        function redirectPage(dropdown) {
            var selectedOption = dropdown.value;

            if (selectedOption !== '') {
                window.location.href = selectedOption;
            }
        }
    </script>
@endpush


