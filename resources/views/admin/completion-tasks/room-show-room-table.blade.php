@if(count($data['task'])>0)
    @php $counter=0; @endphp
    @foreach($data['task'] as $item)
        @php $counter++; @endphp
        <tr class="odd" id="">
            <td tabindex="0">{{ $counter }}.</td>
            <td>
                <span class="text-truncate d-flex align-items-center">
                    {{$data['facility']->name}}
                </span>
            </td>
            <td>
                <span class="text-truncate d-flex align-items-center">
                    {{$data['room']->name}}
                </span>
            </td>
            <td>
                <span class="fw-semibold">
                    {{$item->hasEmployee->first_name}} {{$item->hasEmployee->last_name}}
                </span>    
            </td>
            <td>
                <span class="fw-semibold">
                    {{ $item->date }}
                </span>
            </td>
            <td>
                @if($item->status)
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
                        data-show-url="{{ route('completion-rdetaile', $item->id) }}" 
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
@else
<tr>
    <td colspan="7">
        <div class="row">
            <div class="col-12">
                <h5 class="mt-3 text-danger text-center">No Record Here</h5>
            </div>
        </div>
    </td>
</tr>    
@endif
