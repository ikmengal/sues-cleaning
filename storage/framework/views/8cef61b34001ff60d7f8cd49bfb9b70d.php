<?php $__env->startSection('title', $title); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/select2/select2.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
         <div class="card">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                            <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home /</span> <?php echo e($title); ?></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-item-center mt-4">
                        <div class="dt-buttons btn-group flex-wrap">
                            <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary btn-primary mx-3">
                                <span>
                                    <!--<i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>-->
                                    <span class="d-none d-sm-inline-block">View All</span>
                                </span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br />
        <!-- Users List Table -->
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Basic Layout -->
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4 col-8 offset-2">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Basic Information</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo e(route('tasks.update', $data['task']->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PATCH')); ?>

                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="employee_id">Employee <span class="text-danger">*</span></label>
                                            <select name="employee_id" id="employee_id" class="form-control">
                                                <option value="" selected>Select Employee</option>
                                                <?php $__currentLoopData = $data['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employee->id); ?>" <?php echo e($data['task']->employee_id==$employee->id?'selected':''); ?>><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error"><?php echo e($errors->first('employee_id')); ?></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="start_date">Start Date <span class="text-danger">*</span></label>
                                                
                                                <input
                                                    type="text"
                                                    name="start_date"
                                                    id="multicol-birthdate"
                                                    class="form-control dob-picker start_custom_date"
                                                    placeholder="YYYY-MM-DD"
                                                    value="<?php echo e($data['task']->date); ?>"
                                                />
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="date_error" class="text-danger error"><?php echo e($errors->first('date')); ?></span>
                                            </div>

                                           
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="facility_id">Facility <span class="text-danger">*</span></label>
                                            <select name="facility_id" id="facility_id" class="form-control">
                                                <option value="" selected>Select Facility</option>
                                                <?php $__currentLoopData = $data['facilities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($facility->id); ?>" <?php echo e($data['task']->facility_id==$facility->id?'selected':''); ?> data-url="<?php echo e(route('tasks.get-facility-tasks', $facility->id)); ?>"><?php echo e($facility->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error"><?php echo e($errors->first('facility_id')); ?></span>
                                        </div>
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="room_id">Rooms <span class="text-danger">*</span></label>
                                            <select name="room_id" id="room_id" class="form-control">
                                                <option value="" selected>Select Room</option>
                                                <?php $__currentLoopData = $data['rooms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($room->id); ?>" <?php echo e($data['task']->room_id==$room->id?'selected':''); ?> data-url="<?php echo e(route('tasks.get-facility-tasks', $facility->id)); ?>"><?php echo e($room->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="date_of_birth_error" class="text-danger error"><?php echo e($errors->first('facility_id')); ?></span>
                                        </div>

                                        <span id="facility-tasks-content" style="display:none;">
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="facility_id">Services</label>
                                            </div>
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
                                                                                        <?php if(subServicesAvailableCount($data['task']->date, $data['facility']->id, $data['task']->room_id, $service->id)==count($service->haveSubServices)): ?>
                                                                                            <input class="form-check-input select-all" checked type="checkbox" id="<?php echo e($key); ?>-select-all" />
                                                                                        <?php else: ?>
                                                                                            <input class="form-check-input select-all" type="checkbox" id="<?php echo e($key); ?>-select-all" />
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
                                                                                            <?php if(facilityAvailableService($data['task']->date, $data['task']->facility_id, $data['task']->room_id, $service->id, $sub_service->id)): ?>
                                                                                                <input name="checked_services[<?php echo e($service->id); ?>][]" value="<?php echo e($sub_service->id); ?>" checked class="form-check-input checkbox" type="checkbox" id="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>" />
                                                                                            <?php else: ?>
                                                                                                <input name="checked_services[<?php echo e($service->id); ?>][]" value="<?php echo e($sub_service->id); ?>" class="form-check-input checkbox" type="checkbox" id="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>" />
                                                                                            <?php endif; ?>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <label class="form-check-label" for="<?php echo e($key); ?>-<?php echo e($sub_service_key); ?>"> <?php echo e($sub_service->name); ?> </label>
                                                                                    </td>
                                                                                </tr>
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
                                        </span>

                                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/moment/moment.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/select2/select2.js"></script>

    <!-- Page JS -->
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/form-layouts.js"></script>

    <script>
        
        $(document).ready(function() {
            var startDate = $('#multicol-birthdate').val();
        //  var formattedDate = moment(startDate, 'YYYY-MM-DD').format('DD-MM-YYYY');
            var formattedDate = moment(startDate, 'YYYY-MM-DD').format('DD-MMM-YYYY');
            $('#multicol-birthdate').val(formattedDate);
        
        });
        
        
        // $(document).ready(function() {
        //     var dateInput = document.getElementsByClassName("start_custom_date");
        
        //     function updateFlatpickrFormat(newFormat) {
        //         flatpickr(dateInput, {
        //             dateFormat: newFormat,
        //             defaultDate: dateInput.value
        //         });
        //     }
        
        //     updateFlatpickrFormat("d M Y");
        // });
        
        // $(document).ready(function() {
        //     // Assuming the date is set dynamically
        //     var dateValue = "<?php echo e($data['task']->date); ?>";
            
        //     // Set the value of the input field
        //     $('#multicol-birthdate').val(dateValue);
        
        //     // Initialize flatpickr with the desired format
        //     flatpickr("#multicol-birthdate", {
        //         dateFormat: "d M Y",
        //         defaultDate: dateValue
        //     });
        // });
        
        $(document).ready(function() {
            $('#facility_id').change(function() {
                var selectedOption = $(this).find('option:selected');
                var url = selectedOption.data('url');
                var date = $('#multicol-birthdate').val();
                var enddate = $('#multicol-birthenddate').val();
                var facility_id = $('#facility_id').val();

                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {date:date, facility_id:facility_id},
                    success: function(response) {
                        $('#facility-tasks-content').html(response);
                    }
                });
            });

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/tasks/edit.blade.php ENDPATH**/ ?>