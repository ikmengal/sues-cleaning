<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" value="<?php echo e($data['model']->name); ?>" placeholder="Enter room type name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>

<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="" selected>Select Status</option>
        <option value="1" <?php echo e($data['model']->status==1?'selected':''); ?>>Active</option>
        <option value="0" <?php echo e($data['model']->status==0?'selected':''); ?>>De-Active</option>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="status_error" class="text-danger error"></span>
</div><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/room-type/edite_content.blade.php ENDPATH**/ ?>