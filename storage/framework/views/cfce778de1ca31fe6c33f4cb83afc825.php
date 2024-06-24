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
                <?php if(isset($employee->profile) && !empty($employee->profile->employment_id)): ?>
                    <?php echo e($employee->profile->employment_id); ?>

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
            <?php if(isset($employee->departmentBridge->department) && !empty($employee->departmentBridge->department)): ?>
                <?php echo e($employee->departmentBridge->department->name); ?>

            <?php else: ?>
                -
            <?php endif; ?>
        </td>
        <td>
            <?php if(isset($employee->userWorkingShift->workShift) && !empty($employee->userWorkingShift->workShift->name)): ?>
                <?php echo e($employee->userWorkingShift->workShift->name); ?>

            <?php else: ?>
                <?php if(isset($employee->departmentBridge->department->departmentWorkShift) && !empty($employee->departmentBridge->department->departmentWorkShift)): ?>
                    <?php echo e($employee->departmentBridge->department->departmentWorkShift->workShift->name); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            <?php endif; ?>
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
                    class="edit-btn btn btn-icon btn-label-info waves-effect me-2"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Edit Employee"
                    data-edit-url="<?php echo e(route('employees.edit', $employee->slug)); ?>"
                    data-url="<?php echo e(route('employees.update', $employee->slug)); ?>"
                    tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="modal"
                    data-bs-target="#create-form-modal"
                    >
                    <i class="ti ti-edit ti-xs"></i>
                </a>
                <a href="javascript:;"
                    class="text-body edit-btn"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Direct User Permissions"
                    data-edit-url="<?php echo e(route('user-direct.permission.edit', $employee->slug)); ?>"
                    data-url="<?php echo e(route('user-direct.permission.update', $employee->slug)); ?>"
                    tabindex="0" aria-controls="DataTables_Table_0"
                    type="button" data-bs-toggle="modal"
                    data-bs-target="#edit-direct-permission-modal"
                    >
                    <i class="ti ti-lock ti-sm me-2"></i>
                </a>
                <a href="javascript:;" class="text-body delete" data-slug="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('employees.destroy', $employee->id)); ?>">
                    <i class="ti ti-trash ti-sm mx-2"></i>
                </a>
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="status" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>
                        <?php if($employee->status): ?>
                            De-Active
                        <?php else: ?>
                            Active
                        <?php endif; ?>
                    </a>
                    <a href="<?php echo e(route('employees.show', $employee->slug)); ?>" class="dropdown-item">View</a>
                    <a href="javascript:;" class="dropdown-item add-salary-btn" data-user-id="<?php echo e($employee->id); ?>" data-url='<?php echo e(route('employees.add_salary')); ?>'>Add Salary</a>
                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="terminate" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>Terminate</a>
                    <a href="javascript:;" class="dropdown-item emp-status-btn" data-status-type="remove" data-status-url='<?php echo e(route('employees.status', $employee->id)); ?>'>Remove from employee list</a>
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
</tr><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/roles/search.blade.php ENDPATH**/ ?>