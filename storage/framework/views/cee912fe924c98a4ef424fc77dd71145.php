<?php $__currentLoopData = $data['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($employee->id); ?>">
        <td tabindex="0"><?php echo e($data['employees']->firstItem()+$key); ?>.</td>
        <td class="sorting_1">
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-3">
                        <?php if(!empty($employee->image)): ?>
                            <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($employee->image); ?>" alt="Avatar" class="rounded-circle">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <a href="<?php echo e(route('employees.show', $employee->slug)); ?>" class="text-body text-truncate">
                        <span class="fw-semibold"><?php echo e($employee->first_name??''); ?> <?php echo e($employee->last_name??''); ?></span>
                    </a>
                    <small class="text-muted"><?php echo e($employee->email??'-'); ?></small>
                </div>
            </div>
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php if(isset($employee->profile) && !empty($employee->profile->phone_number)): ?>
                    <?php echo e($employee->profile->phone_number); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php if(!empty($employee->getRoleNames())): ?>
                    <?php $__currentLoopData = $employee->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge bg-label-primary" text-capitalized="">
                            <?php echo e($role_name); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    -
                <?php endif; ?>
            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php echo e($employee->profile->city??'-'); ?>

            </span>
        </td>
        <td>
            <?php if($employee->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Active</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">De-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;"
                    class="edit-btn btn btn-icon btn-label-info waves-effect"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Employee"
                    data-edit-url="<?php echo e(route('employees.edit', $employee->slug)); ?>"
                    data-url="<?php echo e(route('employees.update', $employee->slug)); ?>"
                    tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="modal"
                    data-bs-target="#create-form-modal"
                    >
                    <i class="ti ti-edit ti-sm"></i>
                </a>
                &nbsp;&nbsp;
                <a href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('employees.destroy', $employee->id)); ?>">
                    <i class="ti ti-trash ti-sm"></i>
                </a>
                &nbsp;
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                &nbsp;
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <!--<a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="status" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>-->
                    <!--    <?php if($employee->status): ?>-->
                    <!--        De-Active-->
                    <!--    <?php else: ?>-->
                    <!--        Active-->
                    <!--    <?php endif; ?>-->
                    <!--</a>-->
                    <!--<a href="<?php echo e(route('employees.show', $employee->slug)); ?>" class="dropdown-item">View</a>-->
                    <a href="#"
                                                        class="dropdown-item show"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#dept-details-modal"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Employee Details"
                                                        data-show-url="<?php echo e(route('employees.show', $employee->slug)); ?>"
                                                        >
                                                        View
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
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['employees']->firstItem()); ?> to <?php echo e($data['employees']->lastItem()); ?> of <?php echo e($data['employees']->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $data['employees']->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>

<script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/employees/search.blade.php ENDPATH**/ ?>