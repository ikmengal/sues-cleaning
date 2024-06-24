@extends('admin.layouts.app')
@section('title', $title)

@push('styles')
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/select2/select2.css" />
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('facilities.index') }}">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                            <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home /</span> {{ $title }}</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-item-center mt-4">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button
                                class="btn btn-secondary add-new btn-danger mx-3"
                                data-toggle="tooltip"
                                data-placement="top"
                                tabindex="0" aria-controls="DataTables_Table_0"
                                type="button" data-bs-toggle="modal"
                                id="generate_pdf"
                                >
                                <i class="ti ti-download me-0 me-sm-1 ti-xs"></i>
                                <span>
                                    <span class="d-none d-sm-inline-block">Generate PDF</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    
                    <div class="col-md-6 status">
                        <select id="user_status" name="user_status" class="select2 form-select text-capitalize" >
                            <option value="All" selected> Select All </option>
                            @foreach($data['user'] as $user)
                                <option value="{{$user->id}}"> {{$user->first_name}} {{$user->last_name}} </option>
                            @endforeach
                        </select>
                    </div>    
                    
                    <!--<div class="col-md-6">-->
                    <!--    <input type="text" name="date" id="multicol-birthenddate" class="form-control dob-picker" placeholder="YYYY-MM-DD" />-->
                    <!--</div> -->
                    
                    <div class="col-md-6">
                        <input type="text" class="form-control flatpickr-input" placeholder="YYYY-MM-DD to YYYY-MM-DD" id="flatpickr-range" readonly="readonly">
                    </div>
                    
                    <!--<div class="col-md-4 status">-->
                    <!--    <select id="status" name="status_id" class="select2 form-select text-capitalize room">-->
                    <!--    </select>-->
                    <!--</div>-->
                
                </div>
            </div>

            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="container">
                        <table class="table border-top dataTable no-footer dtr-column" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Facility</th>
                                    <th>Room</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="employee_body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- View Department Details Modal -->
            <div class="modal fade" id="dept-details-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2" id="modal-label"></h3>
                            </div>

                            <div class="col-12">
                                <span id="show-content"></span>
                            </div>

                            <div class="col-12 mt-3">
                                <button
                                    type="reset"
                                    class="btn btn-label-secondary btn-reset"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- View Department Details Modal -->
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('public/admin') }}/assets/js/form-layouts.js"></script>
    <script src="{{ asset('public/admin/assets/js/forms-pickers.js') }}"></script>
    
    <script>
        // $(document).on('change', '#multicol-birthenddate', function(e) {
        //     date = $(this).val();
        //     user_id = $('#user_status').val();

        //     $.ajax({
        //         url:'completion_task_mployee_room',
        //         method:'GET',
        //         data:{date:date, user_id:user_id},
        //         success: function(response) {
        //             // var optionsHtml = '<option value="All" selected> Search by Status </option>';
        //             // if(response.length>0){
        //             //     $.each(response, function(index, option) {
        //             //         optionsHtml += '<option value="' + option.id + '">' + option.name + '</option>';
        //             //     });
        //             //     $('.room').html(optionsHtml);
        //             // }else{
        //             //     var optionsHtml = '<option selected> No Record Here </option>';
        //             //     $('#status').html(optionsHtml);
        //             //     $('#employee_body').html('');
        //             // }
                    
        //             if(response.length>0){
        //                 $('#employee_body').html(response);
        //             }else{
        //                 $('#employee_body').html('');
        //             }
        //         },
        //     })
        // });

        // $(document).on('change', '.room', function(e) {
        //     $('#body').html("");
        //     room_id = $(this).val();
        //     date = $('#multicol-birthenddate').val();
        //     user_id = $('#user_status').val();
    
        //     $.ajax({
        //         url:'completion_task_mployee_room',
        //         method:'GET',
        //         data:{date:date, user_id:user_id, room_id:room_id},
        //         success: function(response) {
        //             console.log(response);
        //             $('#employee_body').html(response);
        //         },
        //     });
        // });

        // $(document).on('click', '#show_room_detail', function(e){
        //     var showUrl = $(this).data('show-url');
        //     var modal_label = $(this).attr('title');

        //     $('#modal-label').html(modal_label);
        //     $.ajax({
        //         url: showUrl,
        //         method: 'GET',
        //         success: function(response) {
        //             $('#show-content').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error(error);
        //         }
        //     });
        // });
        
        // var dateChanged = false;

        // $(document).on('change', '#multicol-birthenddate', function(e) {
        //         dateChanged = true;
        //         checkAndMakeAjaxCall();
        //     });

        // $(document).on('change', '#user_status', function(e) {
        //         checkAndMakeAjaxCall();
        //     });

        // function checkAndMakeAjaxCall() {
        //     if (dateChanged && $('#user_status').val() !== "") {
        //         date = $('#multicol-birthenddate').val();
        //         user_id = $('#user_status').val();

        //         $.ajax({
        //             url:'{{ url("completion_task_mployee_room") }}',
        //             method:'GET',
        //             data:{date:date, user_id:user_id},
        //             success: function(response) {
                        
        //                 if(response.length>0){
        //                     $('#employee_body').html(response);
        //                 }else{
        //                     $('#employee_body').html('');
        //                 }
        //             },
        //         });
        //     }
        // }
        
        var dateChanged = false;
        
        $(document).on('change', '#flatpickr-range', function(e) {
            dateChanged = true;
            checkAndMakeAjaxCall();
        });

        $(document).on('change', '#user_status', function(e) {
            checkAndMakeAjaxCall();
        });

        function checkAndMakeAjaxCall() {
            if (dateChanged && $('#user_status').val() !== "") {
                date = $('#flatpickr-range').val();
                user_id = $('#user_status').val();

                $.ajax({
                    url:'{{ url("completion_task_mployee_room") }}',
                    method:'GET',
                    data:{date:date, user_id:user_id},
                    success: function(response) {
                        
                        if(response.length>0){
                            $('#employee_body').html(response);
                        }else{
                            $('#employee_body').html('');
                        }
                    },
                });
            }
        }

        $(document).on('click', '#generate_pdf', function(e){

            date = $('#flatpickr-range').val();
            user_id = $('#user_status').val();
            room_id = $('#status').val();

            Url ='{{ route("generate-pdf-report-employee") }}?date='+date+'&user_id='+user_id+'&room_id='+room_id
            if(date!="" && user_id!=""){
                $.ajax({
                    url:'{{ url("generate_pdf_report_employee") }}',
                    method:'GET',
                    data:{date:date, user_id:user_id, room_id:room_id,},
                    success: function(response) {
                        console.log(response);
                        window.open(Url,'_blank');
                    },
                });
            }else{
                alert("Please First Select User and Date");
            }
        });
        
        $(document).on('click', '#show_room_detail', function(e){
            var showUrl = $(this).data('show-url');
            var modal_label = $(this).attr('title');

            $('#modal-label').html(modal_label);
            $.ajax({
                url: showUrl,
                method: 'GET',
                success: function(response) {
                    $('#show-content').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // $(document).on('click', '#generate_pdf', function(e){

        //     date = $('#multicol-birthenddate').val();
        //     user_id = $('#user_status').val();
        //     room_id = $('#status').val();

        //     Url ='{{ route("generate-pdf-report-employee") }}?date='+date+'&user_id='+user_id+'&room_id='+room_id
        //     if((date!="" && user_id!="") && room_id!=""){
        //         $.ajax({
        //             url:'{{ url("generate_pdf_report_employee") }}',
        //             method:'GET',
        //             data:{date:date, user_id:user_id, room_id:room_id,},
        //             success: function(response) {
        //                 console.log(response);
        //                 window.open(Url,'_blank');
        //             },
        //         });
        //     }else{
        //         alert("Please First Select Facility Date and Room");
        //     }
        // });
        
      

    </script>
@endpush