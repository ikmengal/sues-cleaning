@extends('admin.layouts.app')
@section('title', $title)

@push('style')
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('public/admin') }}/assets/vendor/libs/select2/select2.css" />
@endpush

@section('content')
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
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-primary mx-3">
                                <span>
                                    <!--<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>-->
                                    <span class="d-none d-sm-inline-block">View All</span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br />
        <!-- Users List Table -->
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Basic Layout -->
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4 col-8 offset-2">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Basic Information</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('tasks.update', $data['task']->id) }}" method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="employee_id">Employee <span class="text-danger">*</span></label>
                                            <select name="employee_id" id="employee_id" class="form-control">
                                                <option value="" selected>Select Employee</option>
                                                @foreach ($data['employees'] as $employee)
                                                    <option value="{{ $employee->id }}" {{ $data['task']->employee_id==$employee->id?'selected':'' }}>{{ $employee->first_name }} {{ $employee->last_name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error">{{ $errors->first('employee_id') }}</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="start_date">Start Date <span class="text-danger">*</span></label>
                                                
                                                <input
                                                    type="text"
                                                    name="start_date"
                                                    id="multicol-birthdate"
                                                    class="form-control dob-picker start_custom_date"
                                                    placeholder="YYYY-MM-DD"
                                                    value="{{ $data['task']->date }}"
                                                />
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="date_error" class="text-danger error">{{ $errors->first('date') }}</span>
                                            </div>

                                           
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="facility_id">Facility <span class="text-danger">*</span></label>
                                            <select name="facility_id" id="facility_id" class="form-control">
                                                <option value="" selected>Select Facility</option>
                                                @foreach ($data['facilities'] as $facility)
                                                    <option value="{{ $facility->id }}" {{ $data['task']->facility_id==$facility->id?'selected':'' }} data-url="{{ route('tasks.get-facility-tasks', $facility->id) }}">{{ $facility->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error">{{ $errors->first('facility_id') }}</span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="room_id">Rooms <span class="text-danger">*</span></label>
                                            <select name="room_id" id="room_id" class="form-control">
                                                <option value="" selected>Select Room</option>
                                                @foreach ($data['rooms'] as $room)
                                                    <option value="{{ $room->id }}" {{ $data['task']->room_id==$room->id?'selected':'' }} data-url="{{ route('tasks.get-facility-tasks', $facility->id) }}">{{ $room->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error">{{ $errors->first('facility_id') }}</span>
                                        </div>

                                        <span id="facility-tasks-content" style="display:none;">
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="facility_id">Services</label>
                                            </div>
                                            <div class="accordion mt-3" id="accordionWithIcon">
                                                @foreach ($data['services'] as $key=>$service)
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header d-flex align-items-center">
                                                            <button
                                                                type="button"
                                                                class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#accordionWithIcon-{{ $key }}"
                                                                aria-expanded="false"
                                                            >
                                                                <i class="ti ti-star ti-xs me-2"></i>
                                                                {{ $service->name }}
                                                            </button>
                                                        </h2>
                                                        <div id="accordionWithIcon-{{ $key }}" class="accordion-collapse collapse">
                                                            <div class="accordion-body">
                                                                <div class="table-responsive text-nowrap">
                                                                    <table class="table input-checkbox">
                                                                        <thead>
                                                                            <tr class="text-nowrap">
                                                                                <th style="width: 20%">
                                                                                    <div class="form-check">
                                                                                        @if(subServicesAvailableCount($data['task']->date, $data['facility']->id, $data['task']->room_id, $service->id)==count($service->haveSubServices))
                                                                                            <input class="form-check-input select-all" checked type="checkbox" id="{{ $key }}-select-all" />
                                                                                        @else
                                                                                            <input class="form-check-input select-all" type="checkbox" id="{{ $key }}-select-all" />
                                                                                        @endif
                                                                                        <label class="form-check-label" for="{{ $key }}-select-all"> Select All </label>
                                                                                    </div>
                                                                                </th>
                                                                                <th>Service Name</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($service->haveSubServices as $sub_service_key => $sub_service)
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-check">
                                                                                            @if(facilityAvailableService($data['task']->date, $data['task']->facility_id, $data['task']->room_id, $service->id, $sub_service->id))
                                                                                                <input name="checked_services[{{ $service->id }}][]" value="{{ $sub_service->id }}" checked class="form-check-input checkbox" type="checkbox" id="{{ $key }}-{{ $sub_service_key }}" />
                                                                                            @else
                                                                                                <input name="checked_services[{{ $service->id }}][]" value="{{ $sub_service->id }}" class="form-check-input checkbox" type="checkbox" id="{{ $key }}-{{ $sub_service_key }}" />
                                                                                            @endif
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <label class="form-check-label" for="{{ $key }}-{{ $sub_service_key }}"> {{ $sub_service->name }} </label>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            <tr>
                                                                                <td colspan="2">{{ $errors->first('checked_services') }}</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </span>

                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('public/admin') }}/assets/vendor/libs/select2/select2.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('public/admin') }}/assets/js/form-layouts.js"></script>

    <script>
        
        $(document).ready(function() {
            var startDate = $('#multicol-birthdate').val();
        //  var formattedDate = moment(startDate, 'YYYY-MM-DD').format('DD-MM-YYYY');
            var formattedDate = moment(startDate, 'YYYY-MM-DD').format('DD-MMM-YYYY');
            $('#multicol-birthdate').val(formattedDate);
        
        });
        
        
        // $(document).ready(function() {
        //     var dateInput = document.getElementsByClassName("start_custom_date");
        
        //     function updateFlatpickrFormat(newFormat) {
        //         flatpickr(dateInput, {
        //             dateFormat: newFormat,
        //             defaultDate: dateInput.value
        //         });
        //     }
        
        //     updateFlatpickrFormat("d M Y");
        // });
        
        // $(document).ready(function() {
        //     // Assuming the date is set dynamically
        //     var dateValue = "{{ $data['task']->date }}";
            
        //     // Set the value of the input field
        //     $('#multicol-birthdate').val(dateValue);
        
        //     // Initialize flatpickr with the desired format
        //     flatpickr("#multicol-birthdate", {
        //         dateFormat: "d M Y",
        //         defaultDate: dateValue
        //     });
        // });
        
        $(document).ready(function() {
            $('#facility_id').change(function() {
                var selectedOption = $(this).find('option:selected');
                var url = selectedOption.data('url');
                var date = $('#multicol-birthdate').val();
                var enddate = $('#multicol-birthenddate').val();
                var facility_id = $('#facility_id').val();

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {date:date, facility_id:facility_id},
                    success: function(response) {
                        $('#facility-tasks-content').html(response);
                    }
                });
            });

            // Event handler for the "Select All" checkbox
            $(document).on('click', '.select-all', function() {
                // Check/uncheck all checkboxes based on the Select All checkbox
                $(this).parents('.input-checkbox').find(".checkbox").prop("checked", $(this).prop("checked"));

                var total_checked_length = $(this).parents('.input-checkbox').find(".checkbox:checked").length;

                if(total_checked_length > 0){
                    // Enable/disable the button based on the Select All checkbox
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", !$(this).prop("checked"));
                    $(this).parents('.input-checkbox').find('.approve-btn').prop('disabled', !$(this).prop('checked'));
                }else{
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", true);
                    $(this).parents('.input-checkbox').find('.approve-btn').prop('disabled', true);
                }
            });

            // Individual checkbox click event
            $(document).on('click', ".checkbox", function() {
                // Check the Select All checkbox if all checkboxes are checked
                var total_checkboxes_length = $(this).parents('.input-checkbox').find(".checkbox").length;
                var total_checked_length = $(this).parents('.input-checkbox').find(".checkbox:checked").length;

                if (total_checked_length > 0 && total_checked_length < total_checkboxes_length) {
                    $(this).parents('.input-checkbox').find(".select-all").prop("checked", false);
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", false);
                    $(this).parents('.input-checkbox').find(".approve-btn").prop("disabled", false);
                }else if (total_checked_length === total_checkboxes_length) {
                    $(this).parents('.input-checkbox').find(".select-all").prop("checked", true);
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", !$(this).prop("checked"));
                    $(this).parents('.input-checkbox').find(".approve-btn").prop("disabled", !$(this).prop("checked"));
                }else{
                    $(this).parents('.input-checkbox').find(".select-all").prop("checked", false);
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", true);
                    $(this).parents('.input-checkbox').find(".approve-btn").prop("disabled", true);
                }
            });
            
        });
            
    </script>
@endpush
