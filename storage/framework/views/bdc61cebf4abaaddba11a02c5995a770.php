<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="facility_id">Services</label>
</div>
<div class="accordion mt-3" id="accordionWithIcon">
    <?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="accordion-item card">
            <?php if(subServicesAvailableCount($data['date'], $data['facility']->id, $data['room_id'], $service->id)!=count($service->haveSubServices)): ?>
                <h2 class="accordion-header d-flex align-items-center">
                    <button
                        type="button"
                        class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#accordionWithIcon-<?php echo e($key); ?>"
                        aria-expanded="false"
                    >
                        <i class="ti ti-star ti-xs me-2"></i>
                        <?php echo e($service->name); ?>

                    </button>
                </h2>
            <?php endif; ?>
            <div id="accordionWithIcon-<?php echo e($key); ?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table input-checkbox">
                            <thead>
                                <tr class="text-nowrap">
                                    <th style="width: 20%">
                                        <div class="form-check">
                                            <input class="form-check-input select-all" type="checkbox" id="<?php echo e($key); ?>-select-all" checked />
                                            <label class="form-check-label" for="<?php echo e($key); ?>-select-all"> Select All </label>
                                        </div>
                                    </th>
                                    <th>Service Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $service->haveSubServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_service_key => $sub_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!facilityAvailableService($data['date'], $data['facility']->id, $data['room_id'], $service->id, $sub_service->id)): ?>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input name="checked_services[<?php echo e($service->id); ?>][]" value="<?php echo e($sub_service->id); ?>" class="form-check-input checkbox" type="checkbox" id="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>" checked />
                                                </div>
                                            </td>
                                            <td>
                                                <label class="form-check-label" for="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>"> <?php echo e($sub_service->name); ?> </label>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="2"><?php echo e($errors->first('checked_services')); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/tasks/facility-services.blade.php ENDPATH**/ ?>