
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" value="<?php echo e($data['model']->name); ?>" placeholder="Enter room name" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="room-occupant-name">Room Occupant Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="room_occupant_name" value="<?php echo e($data['model']->room_occupant_name); ?>" placeholder="Room occupant name" name="room_occupant_name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="room_occupant_name" class="text-danger error"></span>
</div>

<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="room-type-name">Room Type <span class="text-danger">*</span></label>
    <select name="room_type" id="room_type" class="form-control">   
        <option value=""selected>Select Room Type</option>
        <?php $__currentLoopData = $data['roomtypes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($room_type->id); ?>" <?php echo e($data['model']->room_type_id==$room_type->id?'selected':''); ?> > <?php echo e($room_type->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="room_type" class="text-danger error"></span>
</div>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/rooms/edit_content.blade.php ENDPATH**/ ?>