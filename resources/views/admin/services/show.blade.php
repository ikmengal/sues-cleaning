<table class="table table-bordered">
    <tr>
        <th>Avatar</th>
        <td>
            @if(isset($model->profile) && !empty($model->profile->profile))
                <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $model->profile->profile }}" alt="">
            @else
                <img width="150px" src="{{ asset('public/admin/default.png') }}" alt="">
            @endif
        </td>
    </tr>
    <tr>
        <th>First Name</th>
        <td>{{ $model->first_name??'-' }}</td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td>{{ $model->last_name??'-' }}</td>
    </tr>

    <tr>
        <th>Email</th>
        <td>{{ $model->email??'-' }}</td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>
            @if(isset($model->profile) && !empty($model->profile->date_of_birth))
                {{ date('d, F Y', strtotime($model->profile->date_of_birth)) }}
            @else
                -
            @endif
        </td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td>{{ $model->profile->phone_number??'-' }}</td>
    </tr>
    <tr>
        <th>City</th>
        <td>{{ $model->profile->city??'-' }}</td>
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
