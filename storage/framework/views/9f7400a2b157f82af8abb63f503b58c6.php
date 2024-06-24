<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td><?php echo e($model->name??'-'); ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo e($model->email??'-'); ?></td>
    </tr>

    <tr>
        <th>Phone Number</th>
        <td><?php echo e($model->phone_number??'-'); ?></td>
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
<?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/facilities/show.blade.php ENDPATH**/ ?>