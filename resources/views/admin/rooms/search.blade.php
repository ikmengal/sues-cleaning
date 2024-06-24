@foreach ($data['rooms'] as $key=>$room)
    <tr class="odd" id="id-{{ $room->slug }}">
        <td tabindex="0">{{ $data['rooms']->firstItem()+$key }}.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                {{ $room->name }}
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
                        title="Edit Employee"
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

<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
