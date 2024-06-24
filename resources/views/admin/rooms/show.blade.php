<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $model->name??'-' }}</td>
    </tr>
    <tr>
        <th>Facility</th>
        <td>
            @if(isset($model->hasFacility) && !empty($model->hasFacility->name))
                {{ $model->hasFacility->name }}
            @else
            -
            @endif
        </td>
    </tr>
    <tr>
        <th>Created At</th>
        <td>{{ date('d F Y', strtotime($model->created_at)) }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if($model->status)
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            @else
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            @endif
        </td>
    </tr>
</table>
