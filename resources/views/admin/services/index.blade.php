@extends('admin.layouts.app')
@section('title', $title)

@push('styles')
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('services.index') }}">

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
                                title="Add New Service"
                                id="add-btn"
                                data-url="{{ route('services.store') }}"
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
                                    <th>Name</th>
                                    <th>Parent Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                @foreach ($data['services'] as $key=>$service)
                                    <tr class="odd" id="id-{{ $service->slug }}">
                                        <td tabindex="0">{{ $data['services']->firstItem()+$key }}.</td>
                                        <td>
                                            <span class="fw-semibold">
                                                {{ $service->name??'-' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fw-semibold">
                                                @if(isset($service->hasParentService) && !empty($service->hasParentService->name))
                                                    {{ $service->hasParentService->name }}
                                                @else
                                                -
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($service->status)
                                                <span class="badge bg-label-success" text-capitalized="">Active</span>
                                            @else
                                                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end m-0">
                                                    <a href="#"
                                                        class="dropdown-item edit-btn"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#create-form-modal"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Edit service"
                                                        data-edit-url="{{ route('services.edit', $service->slug) }}"
                                                        data-url="{{ route('services.update', $service->slug) }}"
                                                        >
                                                        Edit Service
                                                    </a>
                                                    <a href="#"
                                                        class="dropdown-item delete"
                                                        title="Delete Service"
                                                        data-slug="{{ $service->slug }}"
                                                        data-del-url="{{ route('services.destroy', $service->slug) }}"
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
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['services']->firstItem()}} to {{$data['services']->lastItem()}} of {{$data['services']->total()}} entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    {!! $data['services']->links('pagination::bootstrap-4') !!}
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

            <!-- Add New service Modal -->
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
                                        <label class="form-label" for="parent_service_id">Parent Service Name </label>
                                        <select name="parent_service_id" id="parent_service_id" class="form-control">
                                            <option value="" selected>Select Parent Service</option>
                                            @foreach ($data['parent_services'] as $parent_service)
                                                <option value="{{ $parent_service->id }}">{{ $parent_service->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="parent_service_id_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter service name" name="name">
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                        <span id="name_error" class="text-danger error"></span>
                                    </div>
                                    <div class="mb-3 fv-plugins-icon-container">
                                        <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="" selected>Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">De-Active</option>
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
        </div>
    </div>
</div>
@endsection
@push('js')
@endpush
