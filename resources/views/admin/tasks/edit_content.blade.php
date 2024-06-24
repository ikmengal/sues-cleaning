<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" value="{{ $data['model']->name }}" placeholder="Enter facility name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
    <input type="email" class="form-control" id="email" value="{{ $data['model']->email }}" placeholder="Enter last name" name="email">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="email_error" class="text-danger error"></span>
</div>

<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>
    <input type="text" id="phone_number" class="form-control" value="{{ $data['model']->phone_number }}" placeholder="Enter phone number" name="phone_number">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="phone_number_error" class="text-danger error"></span>
</div>
