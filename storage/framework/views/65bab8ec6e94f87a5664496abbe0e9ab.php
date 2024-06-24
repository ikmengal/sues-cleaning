<?php $__env->startSection('title', $title); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('facility_services.index')); ?>">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Facility /</span> <a href="<?php echo e(route('facility_rooms.index', ['facility_slug' => $data['facility']->slug])); ?>">Rooms</a> / Room name of <u><?php echo e($data['facility']->name); ?></u> - <u><?php echo e($data['room']->name); ?></u></h4>

        <h5><?php echo e($title); ?></h5>
        <div class="col-md-4 status">
            <select name="room" class="select2 form-select text-capitalize" id="redirectDropdown" onchange="redirectPage(this)">
                <?php $__currentLoopData = $data['rooms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(URL::to('facility_services', $room->slug)); ?>" <?php echo e($room->slug==$data['room']->slug?'selected':''); ?>><?php echo e($room->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col-md mb-4 mb-md-2">
                <form action="<?php echo e(route('facility_services.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="facility_id" value="<?php echo e($data['facility']->id); ?>">
                    <input type="hidden" name="room_id" value="<?php echo e($data['room']->id); ?>">

                    <div class="accordion mt-3" id="accordionWithIcon">
                        <?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item card">
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
                                <div id="accordionWithIcon-<?php echo e($key); ?>" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table input-checkbox">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th style="width: 20%">
                                                            <div class="form-check">
                                                                <?php if(subServicesCount($data['facility']->id, $data['room']->id, $service->id)==count($service->haveSubServices)): ?>
                                                                    <input checked class="form-check-input select-all" type="checkbox" id="<?php echo e($key); ?>-select-all" />
                                                                <?php else: ?>
                                                                    <input class="form-check-input select-all" type="checkbox" id="<?php echo e($key); ?>-select-all" checked />
                                                                <?php endif; ?>
                                                                <label class="form-check-label" for="<?php echo e($key); ?>-select-all"> Select All </label>
                                                            </div>
                                                        </th>
                                                        <th>Service Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $service->haveSubServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_service_key => $sub_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <?php if(facilityService($data['facility']->id, $data['room']->id, $service->id, $sub_service->id)): ?>
                                                                        <input name="checked_services[<?php echo e($service->id); ?>][]" checked value="<?php echo e($sub_service->id); ?>" class="form-check-input checkbox" type="checkbox" id="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>" />
                                                                    <?php else: ?>
                                                                        <input name="checked_services[<?php echo e($service->id); ?>][]" value="<?php echo e($sub_service->id); ?>" class="form-check-input checkbox" type="checkbox" id="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>" checked />
                                                                    <?php endif; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <label class="form-check-label" for="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>"> <?php echo e($sub_service->name); ?> </label>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <h2 class="mt-3 d-flex align-items-center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                Save
                            </button>
                        </h2>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="content-backdrop fade"></div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        function redirectPage(dropdown) {
            var selectedOption = dropdown.value;

            if (selectedOption !== '') {
                window.location.href = selectedOption;
            }
        }

        $(document).ready(function() {
            // Event handler for the "Select All" checkbox
            $(document).on('click', '.select-all', function() {
                // Check/uncheck all checkboxes based on the Select All checkbox
                $(this).parents('.input-checkbox').find(".checkbox").prop("checked", $(this).prop("checked"));

                var total_checked_length = $(this).parents('.input-checkbox').find(".checkbox:checked").length;

                if(total_checked_length > 0){
                    // Enable/disable the button based on the Select All checkbox
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", !$(this).prop("checked"));
                    $(this).parents('.input-checkbox').find('.approve-btn').prop('disabled', !$(this).prop('checked'));
                }else{
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", true);
                    $(this).parents('.input-checkbox').find('.approve-btn').prop('disabled', true);
                }
            });

            // Individual checkbox click event
            $(document).on('click', ".checkbox", function() {
                // Check the Select All checkbox if all checkboxes are checked
                var total_checkboxes_length = $(this).parents('.input-checkbox').find(".checkbox").length;
                var total_checked_length = $(this).parents('.input-checkbox').find(".checkbox:checked").length;

                if (total_checked_length > 0 && total_checked_length < total_checkboxes_length) {
                    $(this).parents('.input-checkbox').find(".select-all").prop("checked", false);
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", false);
                    $(this).parents('.input-checkbox').find(".approve-btn").prop("disabled", false);
                }else if (total_checked_length === total_checkboxes_length) {
                    $(this).parents('.input-checkbox').find(".select-all").prop("checked", true);
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", !$(this).prop("checked"));
                    $(this).parents('.input-checkbox').find(".approve-btn").prop("disabled", !$(this).prop("checked"));
                }else{
                    $(this).parents('.input-checkbox').find(".select-all").prop("checked", false);
                    $(this).parents('.input-checkbox').find(".apply-btn").prop("disabled", true);
                    $(this).parents('.input-checkbox').find(".approve-btn").prop("disabled", true);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/facility-services/index.blade.php ENDPATH**/ ?>