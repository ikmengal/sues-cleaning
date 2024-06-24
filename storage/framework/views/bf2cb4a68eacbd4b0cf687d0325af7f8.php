<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="first_name">First Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" value="<?php echo e($data['model']->first_name); ?>" id="first_name" placeholder="Enter first name" name="first_name">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="first_name_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="last_name">Last Name</label>
        <input type="text" class="form-control" value="<?php echo e($data['model']->last_name); ?>" id="last_name" placeholder="Enter last name" name="last_name">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="last_name_error" class="text-danger error"></span>
    </div>
</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
        <input type="email" id="email" class="form-control" value="<?php echo e($data['model']->email); ?>" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="email_error" class="text-danger error"></span>
    </div>
    <!-- <div class="mb-3 fv-plugins-icon-container col-6">
        <label class="form-label" for="phone_number">Phone</label>
        <input
            type="text"
            id="phone_number"
            class="form-control"
            <?php if(isset($data['model']->profile) && !empty($data['model']->profile->phone_number)): ?>
                value="<?php echo e($data['model']->profile->phone_number); ?>"
            <?php endif; ?>
            placeholder="Enter phone number"
            name="phone_number"
        >
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="phone_number_error" class="text-danger error"></span>
    </div> -->

    <div class="mb-3 fv-plugins-icon-container col-6">
    <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>
    <input
        type="text"
        id="phone_number"
        class="form-control"
        <?php if(isset($data['model']->profile) && !empty($data['model']->profile->phone_number)): ?>
            value="<?php echo e($data['model']->profile->phone_number); ?>"
        <?php endif; ?>
        placeholder="Enter phone number"
        name="phone_number"
        oninput="updatePhoneNumberFormat(this)"
    >
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="phone_number_error" class="text-danger error"></span>
</div>


</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="date_of_birth">Date of Birth</label>
        <input
            type="text"
            name="date_of_birth"
            id="multicol-birthdate"
            class="form-control dob-picker"
            placeholder="YYYY-MM-DD"
            <?php if(isset($data['model']->profile) && !empty($data['model']->profile->date_of_birth)): ?>
                value="<?php echo e($data['model']->profile->date_of_birth); ?>"
            <?php endif; ?>
        />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="date_of_birth_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 fv-plugins-icon-container col-6">
        <label class="form-label" for="city">City</label>
        <input type="text" id="city" class="form-control" <?php if(isset($data['model']->profile) && !empty($data['model']->profile->city)): ?> value="<?php echo e($data['model']->profile->city); ?>" <?php endif; ?> placeholder="Enter city" name="city">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="city_error" class="text-danger error"></span>
    </div>
</div>
<script src="<?php echo e(asset('public/admin')); ?>/assets/js/form-layouts.js"></script>
<script>
    function updatePhoneNumberFormat(input) {
        let phoneNumber = input.value.replace(/\D/g, '');
        
        if (phoneNumber.length >= 10) {
            phoneNumber = phoneNumber.slice(0, 10);
        }
        
        if (phoneNumber.length >= 3 && phoneNumber.length <= 6) {
            phoneNumber = phoneNumber.replace(/(\d{3})(\d{0,3})/, '$1-$2');
        } else if (phoneNumber.length > 6) {
            phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1-$2-$3');
        }

        input.value = phoneNumber;
    }
</script>  <?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/employees/edit_content.blade.php ENDPATH**/ ?>