@foreach ($data['facilities'] as $key=>$facility)
    <tr class="odd" id="id-{{ $facility->slug }}">
        <td tabindex="0">{{ $data['facilities']->firstItem()+$key }}.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                {{ $facility->name }}
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                {{ $facility->email??'-' }}
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                {{ $facility->phone_number??'-' }}
            </span>
        </td>
        <td>
            @if($facility->status)
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
                    data-edit-url="{{ route('facilities.edit', $facility->slug) }}"
                    data-url="{{ route('facilities.update', $facility->slug) }}"
                    tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="modal"
                    data-bs-target="#create-form-modal"
                    >
                    <i class="ti ti-edit ti-sm"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="{{ $facility->slug }}" data-del-url="{{ route('facilities.destroy', $facility->slug) }}">
                    <i class="ti ti-trash ti-sm"></i>
                </a>
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="javascript:;" class="dropdown-item change-status-btn" data-status-type="status" data-status-url='{{ route('facilities.status', $facility->slug) }}'>
                        @if($facility->status)
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
                        title="Facility Details"
                        data-show-url="{{ route('facilities.show', $facility->slug) }}"
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
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$data['facilities']->firstItem()}} to {{$data['facilities']->lastItem()}} of {{$data['facilities']->total()}} entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    {!! $data['facilities']->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </td>
</tr>

<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
