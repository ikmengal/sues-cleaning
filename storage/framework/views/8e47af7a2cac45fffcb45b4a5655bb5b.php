    <div class="row">
        <div class="mb-3 fv-plugins-icon-container  col-12">
        <label class="form-label" for="user">User</label>
            <select id="user" name="user" class="select2 form-select text-capitalize" >
                <option value="All" selected> Select User </option>
                <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e($data['previous_user_id']==$user->id?'selected':''); ?> > <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 fv-plugins-icon-container  col-6">
            <label class="form-label" for="date">Date</label>
            <input
                type="text"
                name="date"
                id="date"
                class="form-control dob-picker"
                placeholder="YYYY-MM-DD"
                <?php if(isset($data['date']) && !empty($data['date'])): ?>
                    value="<?php echo e($data['date']); ?>"
                <?php endif; ?>
            />
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="facility_name">Facility</label>
        <input
                type="text"
                name="facility_name"
                id="<?php echo e($data['ficility']->id); ?>"
                class="form-control facility_name"
                <?php if(isset($data['ficility']) && !empty($data['ficility'])): ?>
                    value="<?php echo e($data['ficility']->name); ?>"
                <?php endif; ?>
                readonly
            />
        </div>
        
        <input type="hidden" value="<?php echo e($data['room']->id); ?>" id="room_id" name="room_id" />
        <input type="hidden" value="<?php echo e($data['previous_user_id']); ?>" id="previous_user_id" name="previous_user_id" />
        
        <div class="col-12 text-center mt-2">
            <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn" id="updatedata">Submit</button>
        </div>
    
    </div>   
<script src="<?php echo e(asset('public/admin')); ?>/assets/js/form-layouts.js"></script><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/completion-tasks/room-assign-to-user.blade.php ENDPATH**/ ?>