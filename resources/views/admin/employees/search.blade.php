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
                    <a href="{{ route('employees.show', $employee->slug) }}" class="text-body text-truncate">
                        <span class="fw-semibold">{{ $employee->first_name??'' }} {{ $employee->last_name??'' }}</span>
                    </a>
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
                &nbsp;&nbsp;
                <a href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="{{ $employee->id }}" data-del-url="{{ route('employees.destroy', $employee->id) }}">
                    <i class="ti ti-trash ti-sm"></i>
                </a>
                &nbsp;
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                &nbsp;
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <!--<a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="status" data-status-url='{{ route('employees.status', $employee->id) }}'>-->
                    <!--    @if($employee->status)-->
                    <!--        De-Active-->
                    <!--    @else-->
                    <!--        Active-->
                    <!--    @endif-->
                    <!--</a>-->
                    <!--<a href="{{ route('employees.show', $employee->slug) }}" class="dropdown-item">View</a>-->
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

<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
