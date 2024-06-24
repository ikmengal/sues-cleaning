<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-12">
        <span><b>Currently Assigned User : </b> <?php echo e($data['previous_user_fname']); ?> <?php echo e($data['previous_user_lname']); ?> </span>
    </div>
</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="date"><b>Date : </b></label>
        <br />
        <!--<input-->
        <!--    type="text"-->
        <!--    name="date"-->
        <!--    id="date"-->
        <!--    class="form-control dob-picker"-->
        <!--    placeholder="YYYY-MM-DD"-->
        <!--    <?php if(isset($data['date']) && !empty($data['date'])): ?>-->
        <!--        value="<?php echo e($data['date']); ?>"-->
        <!--    <?php endif; ?>-->
        <!--/>-->
            <?php if(isset($data['date']) && !empty($data['date'])): ?>
                <span><?php echo e($data['date']); ?></span>
            <?php endif; ?>
        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>

    <div class="mb-3 fv-plugins-icon-container  col-6">
    <label class="form-label" for="facility_name"><b>Facility : </b></label>
    <!--<input-->
    <!--        type="text"-->
    <!--        name="facility_name"-->
    <!--        id="<?php echo e($data['ficility']->id); ?>"-->
    <!--        class="form-control facility_name"-->
    <!--        <?php if(isset($data['ficility']) && !empty($data['ficility'])): ?>-->
    <!--            value="<?php echo e($data['ficility']->name); ?>"-->
    <!--        <?php endif; ?>-->
    <!--        readonly-->
    <!--    />-->
    <br />
        <?php if(isset($data['ficility']) && !empty($data['ficility'])): ?>
            <span><?php echo e($data['ficility']->name); ?></span>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-12">
    <label class="form-label" for="user"><b> New Assign User :</b> </label>
        <select id="user" name="user" class="select2 form-select text-capitalize" >
            <option value="All" selected> Select User </option>
            <?php $__currentLoopData = $data['users']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($user->id); ?>" <?php echo e($data['previous_user_id']==$user->id?'selected':''); ?> > <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <input type="hidden" value="<?php echo e($data['room']->id); ?>" id="room_id" name="room_id" />
    <input type="hidden" value="<?php echo e($data['previous_user_id']); ?>" id="previous_user_id" name="previous_user_id" />
    <input type="hidden" value="<?php echo e($data['date']); ?>" id="date" name="date" />
    <input type="hidden" value="<?php echo e($data['ficility']->id); ?>" id="<?php echo e($data['ficility']->id); ?>" name="facility_name" />
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-2 text-end mt-2">
        <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn" id="updatedata">Submit</button>
    </div>
    <div class="col-2 text-start mt-2">
        <button
            type="reset"
            class="btn btn-label-secondary btn-reset"
            data-bs-dismiss="modal"
            aria-label="Close"
        >
            Cancel
        </button>
    </div>
    <div class="col-4"></div>
</div>    <?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/tasks/room-assign-to-user.blade.php ENDPATH**/ ?>