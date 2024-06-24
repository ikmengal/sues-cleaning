<?php $__env->startSection('title', $title.' - Cyberonix'); ?>
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
                                    <h5 class="mb-0">Profile Information</h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo e(route('profile.update', $data['model']->id)); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('PATCH')); ?>


                                        <div class="row">
                                            <div class="mb-3 fv-plugins-icon-container  col-6">
                                                <label class="form-label" for="first_name">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo e($data['model']->first_name); ?>" id="first_name" placeholder="Enter first name" name="first_name">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="first_name_error" class="text-danger error"></span>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container  col-6">
                                                <label class="form-label" for="last_name">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo e($data['model']->last_name); ?>" id="last_name" placeholder="Enter last name" name="last_name">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="last_name_error" class="text-danger error"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 fv-plugins-icon-container  col-6">
                                                <label class="form-label" for="email">Email</label>
                                                <input type="email" id="email" class="form-control" value="<?php echo e($data['model']->email); ?>" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="email_error" class="text-danger error"></span>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container col-6">
                                                <label class="form-label" for="phone_number">Phone</label>
                                                <input
                                                    type="text"
                                                    id="phone_number"
                                                    class="form-control"
                                                    <?php if(isset($data['model']->profile) && !empty($data['model']->profile->phone_number)): ?>
                                                        value="<?php echo e($data['model']->profile->phone_number); ?>"
                                                    <?php endif; ?>
                                                    placeholder="Enter phone number"
                                                    name="phone_number"
                                                >
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="phone_number_error" class="text-danger error"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 fv-plugins-icon-container  col-6">
                                                <label class="form-label" for="date_of_birth">Date of Birth</label>
                                                <input
                                                    type="text"
                                                    name="date_of_birth"
                                                    id="multicol-birthdate"
                                                    class="form-control dob-picker"
                                                    placeholder="YYYY-MM-DD"
                                                    <?php if(isset($data['model']->profile) && !empty($data['model']->profile->date_of_birth)): ?>
                                                        value="<?php echo e($data['model']->profile->date_of_birth); ?>"
                                                    <?php endif; ?>
                                                />
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="date_of_birth_error" class="text-danger error"></span>
                                            </div>
                                            <div class="mb-3 fv-plugins-icon-container col-6">
                                                <label class="form-label" for="city">City</label>
                                                <input type="text" id="city" class="form-control" <?php if(isset($data['model']->profile) && !empty($data['model']->profile->city)): ?> value="<?php echo e($data['model']->profile->city); ?>" <?php endif; ?> placeholder="Enter city" name="city">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="city_error" class="text-danger error"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 fv-plugins-icon-container col-6">
                                                <label class="form-label" for="profile">Avatar Image</label>
                                                <input type="file" accept="Image/*" id="profile" class="form-control" name="profile">
                                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                                <span id="profile_error" class="text-danger error"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 fv-plugins-icon-container col-6">
                                                <?php if(isset($data['model']->profile) && !empty($data['model']->profile->profile)): ?>
                                                    <img id="imagePreview" src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($data['model']->profile->profile); ?>" width="100px" alt="Image Preview">
                                                <?php else: ?>
                                                    <img id="imagePreview" src="<?php echo e(asset('public/admin/default.png')); ?>" width="100px" alt="Image Preview">
                                                <?php endif; ?>
                                            </div>
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
            // When a file is selected
            $('#profile').change(function(e) {
                var file = e.target.files[0];
                if (file) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                }

                reader.readAsDataURL(file);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/profile/my-profile.blade.php ENDPATH**/ ?>