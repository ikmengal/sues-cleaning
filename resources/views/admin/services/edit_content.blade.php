<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="parent_service_id">Parent Service Name </label>
    <select name="parent_service_id" id="parent_service_id" class="form-control">
        <option value="" selected>Select Parent Service</option>
        @foreach ($data['parent_services'] as $parent_service)
            <option value="{{ $parent_service->id }}" {{ $data['model']->parent_service_id==$parent_service->id?'selected':'' }}>{{ $parent_service->name }}</option>
        @endforeach
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="parent_service_id_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" value="{{ $data['model']->name }}" placeholder="Enter service name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="" selected>Select Status</option>
        <option value="1" {{ $data['model']->status==1?'selected':'' }}>Active</option>
        <option value="0" {{ $data['model']->status==0?'selected':'' }}>De-Active</option>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="status_error" class="text-danger error"></span>
</div>
