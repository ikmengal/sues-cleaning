<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td><?php echo e($model->name??'-'); ?></td>
    </tr>
    <tr>
        <th>Facility</th>
        <td>
            <?php if(isset($model->hasFacility) && !empty($model->hasFacility->name)): ?>
                <?php echo e($model->hasFacility->name); ?>

            <?php else: ?>
            -
            <?php endif; ?>
        </td>
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
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/rooms/show.blade.php ENDPATH**/ ?>