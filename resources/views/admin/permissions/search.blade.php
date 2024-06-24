@foreach ($models as $key=>$model)
    <tr class="odd" id="id-{{ $model->label }}">
        <td tabindex="0">{{ $models->firstItem()+$key }}.</td>
        <td>
            <span class="text-truncate d-flex align-items-center text-primary fw-semibold">
                {{ Illuminate\Support\Str::upper($model->label) }}
            </span>
        </td>
        <td>
            @foreach(SubPermissions($model->label) as $label)
                @php $permission_lab = explode('-', $label->name) @endphp
                @if($permission_lab[1]=='list')
                    <span class="badge bg-label-success">List</span>
                @elseif($permission_lab[1]=='create')
                    <span class="badge bg-label-primary">Create</span>
                @elseif($permission_lab[1]=='edit')
                    <span class="badge bg-label-info">Edit</span>
                @elseif($permission_lab[1]=='delete')
                    <span class="badge bg-label-danger">Delete</span>
                @elseif($permission_lab[1]=='status')
                    <span class="badge bg-label-success">Status</span>
                @elseif($permission_lab[1]=='trashed')
                    <span class="badge bg-label-warning">Trashed</span>
                @elseif($permission_lab[1]=='restore')
                    <span class="badge bg-label-info">Restore</span>
                @else
                    <span class="badge bg-label-success">Custom</span>
                @endif
            @endforeach

        </td>
        <td>{{ date('d, F Y', strtotime($model->created_at)) }}</td>
        <td>
            <div class="d-flex align-items-center">
                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="{{ $model->label }}" data-del-url="{{ route('permissions.destroy', $model->label) }}">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
            </div>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="5">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing {{$models->firstItem()}} to {{$models->lastItem()}} of {{$models->total()}} entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    {!! $models->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </td>
</tr>

<script>
    <script src="{{ asset('public/admin/assets/js/search-delete.js') }}"></script>
</script>
