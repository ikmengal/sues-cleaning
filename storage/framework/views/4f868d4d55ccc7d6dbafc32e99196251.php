<?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($service->slug); ?>">
        <td tabindex="0"><?php echo e($data['services']->firstItem()+$key); ?>.</td>
        <td>
            <span class="fw-semibold">
                <?php echo e($service->name??'-'); ?>

            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php if(isset($service->hasParentService) && !empty($service->hasParentService->name)): ?>
                    <?php echo e($service->hasParentService->name); ?>

                <?php else: ?>
                -
                <?php endif; ?>
            </span>
        </td>
        <td>
            <?php if($service->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#"
                        class="dropdown-item edit-btn"
                        tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#create-form-modal"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Edit service"
                        data-edit-url="<?php echo e(route('services.edit', $service->slug)); ?>"
                        data-url="<?php echo e(route('services.update', $service->slug)); ?>"
                        >
                        Edit Service
                    </a>
                    <a href="#"
                        class="dropdown-item delete"
                        title="Delete Service"
                        data-slug="<?php echo e($service->slug); ?>"
                        data-del-url="<?php echo e(route('services.destroy', $service->slug)); ?>"
                        >
                        Delete
                    </a>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="8">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['services']->firstItem()); ?> to <?php echo e($data['services']->lastItem()); ?> of <?php echo e($data['services']->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $data['services']->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>

<script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/services/search.blade.php ENDPATH**/ ?>