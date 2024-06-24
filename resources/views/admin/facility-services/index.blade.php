@extends('admin.layouts.app')
@section('title', $title)

@push('styles')
@endpush

@section('content')
<input type="hidden" id="page_url" value="{{ route('facility_services.index') }}">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Facility /</span> <a href="{{ route('facility_rooms.index', ['facility_slug' => $data['facility']->slug]) }}">Rooms</a> / Room name of <u>{{ $data['facility']->name }}</u> - <u>{{ $data['room']->name }}</u></h4>

        <h5>{{ $title }}</h5>
        <div class="col-md-4 status">
            <select name="room" class="select2 form-select text-capitalize" id="redirectDropdown" onchange="redirectPage(this)">
                @foreach ($data['rooms'] as $room)
                    <option value="{{ URL::to('facility_services', $room->slug) }}" {{ $room->slug==$data['room']->slug?'selected':'' }}>{{ $room->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row mb-3">
            <div class="col-md mb-4 mb-md-2">
                <form action="{{ route('facility_services.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="facility_id" value="{{ $data['facility']->id }}">
                    <input type="hidden" name="room_id" value="{{ $data['room']->id }}">

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
                                                                @if(subServicesCount($data['facility']->id, $data['room']->id, $service->id)==count($service->haveSubServices))
                                                                    <input checked class="form-check-input select-all" type="checkbox" id="{{ $key }}-select-all" />
                                                                @else
                                                                    <input class="form-check-input select-all" type="checkbox" id="{{ $key }}-select-all" checked />
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
                                                                    @if(facilityService($data['facility']->id, $data['room']->id, $service->id, $sub_service->id))
                                                                        <input name="checked_services[{{ $service->id }}][]" checked value="{{ $sub_service->id }}" class="form-check-input checkbox" type="checkbox" id="{{ $key }}-{{ $sub_service_key }}" />
                                                                    @else
                                                                        <input name="checked_services[{{ $service->id }}][]" value="{{ $sub_service->id }}" class="form-check-input checkbox" type="checkbox" id="{{ $key }}-{{ $sub_service_key }}" checked />
                                                                    @endif
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="{{ $key }}-{{ $sub_service_key }}"> {{ $sub_service->name }} </label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <h2 class="mt-3 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Save
                            </button>
                        </h2>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
  </div>
@endsection
@push('js')
    <script>
        function redirectPage(dropdown) {
            var selectedOption = dropdown.value;

            if (selectedOption !== '') {
                window.location.href = selectedOption;
            }
        }

        $(document).ready(function() {
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
