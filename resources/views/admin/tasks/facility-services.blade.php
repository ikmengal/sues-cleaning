<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="facility_id">Services</label>
</div>
<div class="accordion mt-3" id="accordionWithIcon">
    @foreach ($data['services'] as $key=>$service)
        <div class="accordion-item card">
            @if(subServicesAvailableCount($data['date'], $data['facility']->id, $data['room_id'], $service->id)!=count($service->haveSubServices))
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
            @endif
            <div id="accordionWithIcon-{{ $key }}" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table input-checkbox">
                            <thead>
                                <tr class="text-nowrap">
                                    <th style="width: 20%">
                                        <div class="form-check">
                                            <input class="form-check-input select-all" type="checkbox" id="{{ $key }}-select-all" checked />
                                            <label class="form-check-label" for="{{ $key }}-select-all"> Select All </label>
                                        </div>
                                    </th>
                                    <th>Service Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service->haveSubServices as $sub_service_key => $sub_service)
                                    @if(!facilityAvailableService($data['date'], $data['facility']->id, $data['room_id'], $service->id, $sub_service->id))
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input name="checked_services[{{ $service->id }}][]" value="{{ $sub_service->id }}" class="form-check-input checkbox" type="checkbox" id="{{ $key }}-{{ $sub_service_key }}" checked />
                                                </div>
                                            </td>
                                            <td>
                                                <label class="form-check-label" for="{{ $key }}-{{ $sub_service_key }}"> {{ $sub_service->name }} </label>
                                            </td>
                                        </tr>
                                    @endif
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
