<table class="table">
   <thead>
        <tr>
            <th>EMPLOYEE</th>
            <th>FACILITY</th>
            <th>DATE</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
         <tr>
            <td>
                <div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                        <div class="avatar avatar-sm me-3">
                            @if(isset($data['task']->hasEmployee) && !empty($data['task']->hasEmployee->image))
                                <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $data['task']->hasEmployee->image }}" alt="Avatar" class="rounded-circle">
                            @else
                                <img src="{{ asset('public/admin/default.png') }}" alt="Avatar" class="rounded-circle">
                            @endif
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="fw-semibold">{{ $data['task']->hasEmployee->first_name??'' }} {{ $data['task']->hasEmployee->last_name??'' }}</span>
                        <small class="text-muted">{{ $data['task']->hasEmployee->email??'-' }}</small>
                    </div>
                </div>
            </td>
            <td>{{ $data['task']->hasFacility->name??'-' }}</td>
            <td>
                @if(!empty($data['task']->date))
                    {{ date('d F Y', strtotime($data['task']->date)) }}
                @else
                    -
                @endif
            </td>
            <!--<td>-->
            <!--    @if(!empty($data['task']->end_date))-->
            <!--        {{ date('d F Y', strtotime($data['task']->end_date)) }}-->
            <!--    @else-->
            <!--        --->
            <!--    @endif-->
            <!--</td>-->
            <!--<td>{{ $data['task']->comment??'-' }}</td>-->
            <td>
                @if($data['task']->status)
                    <span
                        class="badge bg-label-success"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Completed: {{ date('d F Y', strtotime($data['task']->creaed_at)) }}"
                    >Completed
                    </span>
                @else
                    <span
                        class="badge bg-label-danger"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Created At: {{ date('d F Y', strtotime($data['task']->creaed_at)) }}"
                    >Pending</span>
                @endif
            </td>
        </tr>
        <tr>
        <tr>
            <th colspan="4"><b>Room -> <u>{{ $data['task']->hasRoom->name }}</u></b></th>
        </tr>
        <tr>
            <td colspan="5">
                <table class="table">
                    <tbody>
                        @php $room = '' @endphp
                        @foreach ($data['task_details'] as $task_detail)
                            <tr>
                                <td colspan="2"><b>{{ $task_detail->hasParentService->name }}</b></td>
                            </tr>
                                <ul>
                                    @foreach (subServices($task_detail->parent_service_id, $task_detail->task_id) as $sub_service)
                                        <tr>
                                            <td><li>{{ $sub_service->hasSubService->name }}</li></td>
                                            <td>
                                                @if($sub_service->status)
                                                    <span
                                                        class="badge bg-label-success"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Completed: {{ date('d F Y', strtotime($sub_service->creaed_at)) }}"
                                                    >Completed
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge bg-label-danger"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Created At: {{ date('d F Y', strtotime($sub_service->creaed_at)) }}"
                                                    >Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </ul>
                        @endforeach   
                    </tbody>
                </table>
            </td>
        </tr>
        <tr style="border-top:hidden;">
            <th colspan="5">COMMENT: </th>
        </tr>
        <tr style="border-top:hidden;">
            <td colspan="5">{{ $data['task']->comment??'-' }}</td>
        </tr>
        <tr>
            <th colspan="5">EXTRA HOURS: </th>
        </tr>
        <tr style="border-top:hidden">
            <td colspan="5">{{ $data['task']->extra_hours??'-' }}</td>
        </tr>
        @if(isset($data['picturs']) && !empty($data['picturs']))
            <tr style="border-bottom:hidden">
                <th colspan="5">ATTACHEMENTS: </th>
            </tr>
            <tr>
                <td colspan="5">
                    <div class="row">
                        @foreach($data['picturs'] as $task_picture)
                            <div class="col-4">
                                <img src="{{asset('public/admin/assets/img/task_pictures')}}/{{$task_picture->picture}}" alt="radioImg" class="w-100">
                            </div>
                        @endforeach
                    </div>
                </td>
            </tr>
        @endif
    </tbody>
</table>
