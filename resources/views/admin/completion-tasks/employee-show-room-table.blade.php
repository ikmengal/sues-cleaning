@php $counter=0; @endphp
@if(!empty($data['user']))
@foreach($data['user'] as $key => $user)
    @php $counter++; @endphp
    <tr class="odd" id="">
        <td tabindex="0">{{$counter}}.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                {{$data['facility'][$key]['name']}}
            </span>
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                {{$data['room'][$key]['name']}}
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                {{ $user->first_name }} {{ $user->last_name }}
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                {{ $data['task'][$key]->date }}
            </span>
        </td>
        <td>
            @if($data['task'][$key]->status)
                <span class="badge bg-label-success" text-capitalized="">Completed</span>
            @else
                <span class="badge bg-label-danger" text-capitalized="">Pending</span>
            @endif
        </td>
        <td>
            <div class="d-flex align-items-center">
                    <a href="javascript:;" 
                        class="btn btn-icon btn-label-info waves-effect" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="Room Details" 
                        data-show-url="{{ route('completion-employee-room-detaile', $data['task'][$key]->id) }}" 
                        data-url="" 
                        tabindex="0" 
                        aria-controls="DataTables_Table_0" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#dept-details-modal"
                        id="show_room_detail"
                    >
                        <i class="ti ti-eye-check ti-sm mx-1"></i>
                    </a>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="8">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{-- $data['facilities']->firstItem()}} to {{$data['facilities']->lastItem()}} of {{$data['facilities']->total() --}} entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    
                </div>
            </div>
        </div>
    </td>
</tr>
@else
<tr>
    <td colspan="8">
        <div class="row">
            <div class="col-12 mt-4">
                <h5 class="text-danger text-center">No Record Here</h5>
            </div>
        </div>
    </td>
</tr>
@endif