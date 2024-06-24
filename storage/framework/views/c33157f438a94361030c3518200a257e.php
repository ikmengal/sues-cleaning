
<?php $__env->startSection('title', $title); ?>

<?php $__env->startPush('styles'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<input type="hidden" id="page_url" value="<?php echo e(route('facility_rooms.index')); ?>">

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-header">
                        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home / <a href="<?php echo e(route('room-type.index')); ?>">All Room Types</a></span></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end align-item-center mt-4">
                        <div class="dt-buttons btn-group flex-wrap">
                            <button
                                class="btn btn-secondary add-new btn-primary mx-3"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Add New Room Type"
                                id="add-btn"
                                data-url="<?php echo e(route('room-type.store')); ?>"
                                tabindex="0" aria-controls="DataTables_Table_0"
                                type="button" data-bs-toggle="modal"
                                data-bs-target="#create-form-modal"
                                >
                                <span>
                                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">Add New</span>
                                </span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br />
        <!-- Users List Table -->
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="container">
                            <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                                <thead>
                                    <tr>
                                        <th>S.No#</th>
                                        <th>Room Type Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
                                    <?php $__currentLoopData = $data['room_type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $room_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="odd" id="">
                                            <td tabindex="0"><?php echo e($data['room_type']->firstItem()+$key); ?>.</td>
                                            <td>
                                                <span class="text-truncate d-flex align-items-center">
                                                    <?php echo e($room_type->name); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <?php if($room_type->status): ?>
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
                                                        <!-- <a href="#"
                                                            class="dropdown-item show"
                                                            tabindex="0" aria-controls="DataTables_Table_0"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#dept-details-modal"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Room Details"
                                                            data-show-url=""
                                                            >
                                                            View Details
                                                        </a> -->
                                                        <a href="#"
                                                            class="dropdown-item edit-btn"
                                                            data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Edit Room Type"
                                                            data-edit-url="<?php echo e(route('room-type.edit', $room_type->slug)); ?>"
                                                            data-url="<?php echo e(route('room-type.update', $room_type->slug)); ?>"
                                                            tabindex="0" aria-controls="DataTables_Table_0"
                                                            type="button" data-bs-toggle="modal"
                                                            data-bs-target="#create-form-modal"
                                                            >
                                                            Edit
                                                        </a>
                                                        <a href="#"
                                                            class="dropdown-item delete"
                                                            data-slug="<?php echo e($room_type->slug); ?>"
                                                            data-del-url="<?php echo e(route('room-type.destroy', $room_type->slug)); ?>"
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
                                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing  to  of  entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                        <?php echo $data['room_type']->links('pagination::bootstrap-4'); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Add New Employee Modal -->
        <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2" id="modal-label"></h3>
                    </div>
                    
                    <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="create-form-modal" id="create-form">
                        <?php echo csrf_field(); ?>

                        <!-- <input type="hidden" name="facility_id" id="facility_id" value=""> -->
                        <span id="edit-content">
                            <div class="mb-3 fv-plugins-icon-container">
                                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Enter room type" name="name">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="name_error" class="text-danger error"></span>
                            </div>

                            <div class="">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="form-control">   
                                    <option value="" selected>Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                <span id="status_error" class="text-danger error"></span>
                            </div>
                        </span>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    <!-- View Department Details Modal -->
        <!-- <div class="modal fade" id="dept-details-modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered1 modal-simple modal-add-new-cc">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2" id="modal-label"></h3>
                        </div>

                        <div class="col-12">
                            <span id="show-content"></span>
                        </div>

                        <div class="col-12 mt-3">
                            <button
                                type="reset"
                                class="btn btn-label-secondary btn-reset"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- View Department Details Modal -->
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
    </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/room-type/index.blade.php ENDPATH**/ ?>