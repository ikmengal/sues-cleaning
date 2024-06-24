<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" value="<?php echo e($data['model']->name); ?>" placeholder="Enter facility name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
    <input type="email" class="form-control" id="email" value="<?php echo e($data['model']->email); ?>" placeholder="Enter last name" name="email">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="email_error" class="text-danger error"></span>
</div>

<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>
    <input type="text" id="phone_number" class="form-control" value="<?php echo e($data['model']->phone_number); ?>" placeholder="Enter phone number" name="phone_number" oninput="updatePhoneNumberFormat(this)">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="phone_number_error" class="text-danger error"></span>
</div>

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
</script>  <?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/facilities/edit_content.blade.php ENDPATH**/ ?>