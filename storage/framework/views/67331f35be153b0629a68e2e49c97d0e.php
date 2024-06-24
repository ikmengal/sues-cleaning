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
                                    <form action="<?php echo e(route('tasks.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="employee_id">Employee <span class="text-danger">*</span></label>
                                            <select name="employee_id" id="employee_id" class="form-control">
                                                <option value="" selected>Select Employee</option>
                                                <?php $__currentLoopData = $data['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="employee_id_error" class="text-danger error"><?php echo e($errors->first('employee_id')); ?></span>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="start_date">Start Date <span class="text-danger">*</span></label>                                        
                                                <input
                                                    type="text"
                                                    name="start_date"
                                                    id="multicol-birthstartdate"
                                                    class="form-control dob-picker"
                                                    placeholder="YYYY-MM-DD"
                                                />
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="date_error" class="text-danger error"><?php echo e($errors->first('start-date')); ?></span>
                                            </div>
                                            <div class="col-6 mb-3 fv-plugins-icon-container">
                                                <label class="form-label" for="end_date">End Date <span class="text-danger">*</span></label>                                        
                                                <input
                                                    type="text"
                                                    name="end_date"
                                                    id="multicol-birthenddate"
                                                    class="form-control dob-picker"
                                                    placeholder="YYYY-MM-DD"
                                                />
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="date_error" class="text-danger error"><?php echo e($errors->first('enddate')); ?></span>
                                            </div>
                                        </div>
 
                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="facility_id">Facility <span class="text-danger">*</span></label>
                                            <select name="facility_id" id="facility_id" class="form-control">
                                                <option value="" selected>Select Facility</option>
                                                
                                                <?php $__currentLoopData = $data['facilities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    dd($facility)
                                                    <option value="<?php echo e($facility->id); ?>" data-url="<?php echo e(route('tasks.get-facility-rooms', $facility->id)); ?>"><?php echo e($facility->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="facility_id_error" class="text-danger error"><?php echo e($errors->first('facility_id')); ?></span>
                                        </div>

                                        <div class="mb-3 fv-plugins-icon-container">
                                            <label class="form-label" for="facility_room_id">Room <span class="text-danger">*</span></label>
                                            <select name="facility_room_id" id="facility_room_id" class="form-control">
                                                <option value="" selected>Select Room</option>
                                            </select>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="facility_room_id_error" class="text-danger error"><?php echo e($errors->first('facility_room_id')); ?></span>
                                        </div>

                                        <span style="display:none" id="facility-tasks-content"></span>

                                        <div class="mb-3 fv-plugins-icon-container mt-3">
                                            <label class="form-label" for="comment">Comment (Optional)</label>
                                            <textarea rows="5" name="comment" id="comment" class="form-control" placeholder="Enter comment"></textarea>
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                            <span id="comment_error" class="text-danger error"><?php echo e($errors->first('comment')); ?></span>
                                        </div>

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
            $('#facility_id').change(function() {
                var selectedOption = $(this).find('option:selected');
                var dobstart_picker = $('#multicol-birthstartdate').val();
                var dobend_picker = $('#multicol-birthenddate').val();
                var employee_id = $('#employee_id').val();
                var facility_id = $('#facility_id').val();

                var url = selectedOption.data('url');

                $.ajax({
                    url: url,
                    method: 'GET',
                    data : {dobstart_picker:dobstart_picker, dobend_picker:dobend_picker, facility_id:facility_id, employee_id:employee_id},
                    success: function(response) {    
                        // console.log(response);
                        if(response){
                            var html = '';
                            html +=''
                                html += '<option value="" selected>Select Room</option>';
                            $.each(response, function(index, value) {
                                html += '<option value="'+value.id+'" data-url="<?php echo e(route("tasks.get-facility-tasks")); ?>">'+value.name+'</option>';
                            });
                            $('#facility_room_id').html(html);
                        }
                    }
                });
            });

            $(document).on('change', '#facility_room_id', function() {
                var selectedOption = $(this).find('option:selected');
                var facility_id = $('#facility_id').val();
               

                var url = selectedOption.data('url');
                var date = $('#multicol-birthdate').val();

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/tasks/create.blade.php ENDPATH**/ ?>