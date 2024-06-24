<?php $__currentLoopData = $data['rooms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($room->slug); ?>">
        <td tabindex="0"><?php echo e($data['rooms']->firstItem()+$key); ?>.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e($room->name); ?>

            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php if(isset($room->hasFacility) && !empty($room->hasFacility->name)): ?>
                    <?php echo e($room->hasFacility->name); ?>

                <?php else: ?>
                -
                <?php endif; ?>
            </span>
        </td>
        <td>
            <?php if($room->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="<?php echo e(route('facility_services.show', $room->slug)); ?>" style="color: white" class="btn btn-secondary btn-sm btn-primary mx-3 waves-effect waves-light" title="All Services" >
                    <span>
                        <i class="menu-icon tf-icons ti ti-checkbox"></i>
                        <span class="d-none d-sm-inline-block">Services</span>
                    </span>
                </a>

                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="javascript:;" class="dropdown-item change-status-btn" data-status-type="status" data-status-url='<?php echo e(route('facility_rooms.status', $room->slug)); ?>'>
                        <?php if($room->status): ?>
                            De-Active
                        <?php else: ?>
                            Active
                        <?php endif; ?>
                    </a>
                    <a href="#"
                        class="dropdown-item show"
                        tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#dept-details-modal"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Room Details"
                        data-show-url="<?php echo e(route('facility_rooms.show', $room->slug)); ?>"
                        >
                        View Details
                    </a>
                    <a href="#"
                        class="dropdown-item edit-btn"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Edit Employee"
                        data-edit-url="<?php echo e(route('facility_rooms.edit', $room->slug)); ?>"
                        data-url="<?php echo e(route('facility_rooms.update', $room->slug)); ?>"
                        tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#create-form-modal"
                        >
                        Edit
                    </a>
                    <a href="#"
                        class="dropdown-item delete"
                        data-slug="<?php echo e($room->slug); ?>"
                        data-del-url="<?php echo e(route('facility_rooms.destroy', $room->slug)); ?>"
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
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['rooms']->firstItem()); ?> to <?php echo e($data['rooms']->lastItem()); ?> of <?php echo e($data['rooms']->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $data['rooms']->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>

<script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/rooms/search.blade.php ENDPATH**/ ?>