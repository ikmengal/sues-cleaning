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
        <!--        {{ $task->comment??'-' }}-->
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
                        data-show-url="{{ route('room-assign-to-user', ['user_id'=>$task->hasEmployee->id, 'room_id'=>$task->hasRoom->id, 'task_date'=>$task->date, 'facility_id'=>$task->hasFacility->id]) }}"
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
<script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
