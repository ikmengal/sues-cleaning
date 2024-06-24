<div class="col-12 mb-4">
    <label class="form-label" for="name">Role Name</label>
    <input type="text" id="name" name="name" class="form-control" value="<?php echo e($role->name); ?>" placeholder="Enter a role name" tabindex="-1" />
    <span id="name_error" class="text-danger"></span>
</div>
<div class="col-12">
    <h5>Role Permissions</h5>
    <!-- Permission table -->
    <div class="table-responsive">
        <table class="table table-flush-spacing">
            <tbody>
                <tr>
                    <td class="text-nowrap fw-semibold">
                        Administrator Access
                        <i class="ti ti-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i>
                    </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="selectAll" />
                            <label class="form-check-label" for="selectAll"> Select All </label>
                        </div>
                    </td>
                </tr>
                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-nowrap fw-semibold"><?php echo e(ucfirst($permission->label)); ?> Management</td>
                        <td>
                            <div class="d-flex">
                                <?php $__currentLoopData = SubPermissions($permission->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $label = explode('-', $sub_permission->name) ?>
                                    <div class="form-check me-3 me-lg-5">
                                        <?php $bool = false ?>
                                        <?php $__currentLoopData = $role_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($role_permission==$sub_permission->name): ?>
                                                <?php $bool = true; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($bool): ?>
                                            <input class="form-check-input" checked name="permissions[]" value="<?php echo e($sub_permission->id); ?>" type="checkbox" id="userManagementRead-<?php echo e($sub_permission->id); ?>" />
                                        <?php else: ?>
                                            <input class="form-check-input" name="permissions[]" value="<?php echo e($sub_permission->id); ?>" type="checkbox" id="userManagementRead-<?php echo e($sub_permission->id); ?>" />
                                        <?php endif; ?>
                                        <label class="form-check-label" for="userManagementRead-<?php echo e($sub_permission->id); ?>"> <?php echo e(Str::ucfirst($label[1])); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!-- Permission table -->
</div>

<script>
    $("#selectAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<script src="<?php echo e(asset('public/admin/assets/js/custom/employee.js')); ?>"></script>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/roles/edit_content.blade.php ENDPATH**/ ?>