<!DOCTYPE html>
<html>
<head>
    <title>Generate Employees Report</title>
    <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/libs/bootstrap/css_bootstrap.min.css') }}" />
    <style>
        .table td, .table th{
            padding:0.1rem;
            border-top: 0px solid #dee2e6;
        }
        .table{
            width:100%;
        }
        .table td{
            border-bottom: 0.1px solid #dee2e6;
            border-left: 0.1px solid #dee2e6;
            border-right: 0.1px solid #dee2e6;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    @php
    ini_set('memory_limit', '256M');
    @endphp
    @php $counter=0; @endphp
    @foreach($data['tasks'] as $key => $all_task)
        @php $counter=0; @endphp
        <div class="page-break">
            <h2 class="text-center text-capitalize">sues cleaning</h2>
            <b class="text-capitalize">Date {{$all_task[$counter]->date}}</b>
            <table class="table table-border">
                <tr>
                    <td class="border border-5 border-dark"><b>{{$all_task[$counter]->hasFacility->name}}</b></td>
                    @foreach($all_task as $h_task)
                        <td class="border border-5 border-dark text-center"><b>{{ $h_task->hasRoom->name }}</b></td>
                    @endforeach
                </tr>
                <tr>
                    <td class="border border-5 border-dark"></td>
                    @foreach($all_task as $h_task)
                        <td class="bg-warning border border-5 border-dark text-center"><b>{{ $h_task->hasEmployee->first_name }} {{ $h_task->hasEmployee->last_name }}</b></td>
                    @endforeach
                </tr>
                @php 
                    $bool = true; 
                @endphp
                @foreach($data['services'] as $service)
                    @if($bool)
                        @php $bool = false @endphp 
                        <tr>
                            <td class="bg-warning border border-5 border-dark"><b>{{ $service->name }}</b></td>
                            @foreach($all_task as $h_task)
                                <td class="border-dark"></td>
                            @endforeach
                        </tr>
                    @endif
                    @foreach($service->haveSubServices as $sub_service)
                        <tr>
                            <td class="border-dark" ><li style="list-style:none;">{{ $sub_service->name }}</i></td>
                            @foreach($all_task as $task)
                                <td align="center" class="border-dark">
                                @if(taskDetails($task->id, $service->id, $sub_service->id))
                                        <span>
                                            <img src="{{ asset('public/admin/assets/svg/icons/check2.svg') }}" style="width:20px; height:20px">
                                        </span>
                                    @else
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    @php $bool = true @endphp 
                @endforeach
            </table> 
        </div>    
        @php $counter++; @endphp
    @endforeach
</body>
</html>