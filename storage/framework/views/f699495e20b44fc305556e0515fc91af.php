<table class="table table-bordered">
    <tr>
        <th>Avatar</th>
        <td>
            <?php if(isset($model->profile) && !empty($model->profile->profile)): ?>
                <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($model->profile->profile); ?>" alt="">
            <?php else: ?>
                <img width="150px" src="<?php echo e(asset('public/admin/default.png')); ?>" alt="">
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>First Name</th>
        <td><?php echo e($model->first_name??'-'); ?></td>
    </tr>
    <tr>
        <th>Last Name</th>
        <td><?php echo e($model->last_name??'-'); ?></td>
    </tr>

    <tr>
        <th>Email</th>
        <td><?php echo e($model->email??'-'); ?></td>
    </tr>
    <tr>
        <th>Date of Birth</th>
        <td>
            <?php if(isset($model->profile) && !empty($model->profile->date_of_birth)): ?>
                <?php echo e(date('d, F Y', strtotime($model->profile->date_of_birth))); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td><?php echo e($model->profile->phone_number??'-'); ?></td>
    </tr>
    <tr>
        <th>City</th>
        <td><?php echo e($model->profile->city??'-'); ?></td>
    </tr>

    <tr>
        <th>Created At</th>
        <td><?php echo e(date('d F Y', strtotime($model->created_at))); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            <?php if($model->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
    </tr>
</table>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/employees/show.blade.php ENDPATH**/ ?>