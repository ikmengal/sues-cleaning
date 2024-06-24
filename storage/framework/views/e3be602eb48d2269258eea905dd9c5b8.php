<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($model->label); ?>">
        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <span class="text-truncate d-flex align-items-center text-primary fw-semibold">
                <?php echo e(Illuminate\Support\Str::upper($model->label)); ?>

            </span>
        </td>
        <td>
            <?php $__currentLoopData = SubPermissions($model->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $permission_lab = explode('-', $label->name) ?>
                <?php if($permission_lab[1]=='list'): ?>
                    <span class="badge bg-label-success">List</span>
                <?php elseif($permission_lab[1]=='create'): ?>
                    <span class="badge bg-label-primary">Create</span>
                <?php elseif($permission_lab[1]=='edit'): ?>
                    <span class="badge bg-label-info">Edit</span>
                <?php elseif($permission_lab[1]=='delete'): ?>
                    <span class="badge bg-label-danger">Delete</span>
                <?php elseif($permission_lab[1]=='status'): ?>
                    <span class="badge bg-label-success">Status</span>
                <?php elseif($permission_lab[1]=='trashed'): ?>
                    <span class="badge bg-label-warning">Trashed</span>
                <?php elseif($permission_lab[1]=='restore'): ?>
                    <span class="badge bg-label-info">Restore</span>
                <?php else: ?>
                    <span class="badge bg-label-success">Custom</span>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </td>
        <td><?php echo e(date('d, F Y', strtotime($model->created_at))); ?></td>
        <td>
            <div class="d-flex align-items-center">
                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="<?php echo e($model->label); ?>" data-del-url="<?php echo e(route('permissions.destroy', $model->label)); ?>">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $models->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>

<script>
    <script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
</script>
<?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/permissions/search.blade.php ENDPATH**/ ?>