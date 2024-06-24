<?php $__env->startSection('title', $title.' - Sues Cleaning'); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('permissions.index')); ?>">
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-header">
                        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Home /</span> <?php echo e($title); ?></h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="dt-buttons btn-group flex-wrap float-end mt-4">
                        <button
                            id="add-btn"
                            data-toggle="tooltip" data-placement="top" title="Add Permission"
                            data-url="<?php echo e(route('permissions.store')); ?>"
                            class="btn add-new btn-primary mb-3 mb-md-0 mx-3"
                            tabindex="0" aria-controls="DataTables_Table_0"
                            type="button" data-bs-toggle="modal"
                            data-bs-target="#addPermissionModal">
                            <span>
                                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                <span class="d-none d-sm-inline-block"> Add Permission </span>
                            </span>
                        </button>   
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row me-2">-->
        <!--    <div class="col-md-4">-->
        <!--        <div class="me-3">-->
        <!--            <div class="dataTables_length" id="DataTables_Table_0_length">-->
        <!--                <h2> <?php echo e($title); ?></h2>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="col-md-8">-->
        <!--        <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">-->
        <!--            <div class="dt-buttons btn-group flex-wrap">-->
        <!--                <button-->
        <!--                    id="add-btn"-->
        <!--                    data-toggle="tooltip" data-placement="top" title="Add Permission"-->
        <!--                    data-url="<?php echo e(route('permissions.store')); ?>"-->
        <!--                    class="btn add-new btn-primary mb-3 mb-md-0 mx-3"-->
        <!--                    tabindex="0" aria-controls="DataTables_Table_0"-->
        <!--                    type="button" data-bs-toggle="modal"-->
        <!--                    data-bs-target="#addPermissionModal">-->
        <!--                    <span>-->
        <!--                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>-->
        <!--                        <span class="d-none d-sm-inline-block"> Add Permission </span>-->
        <!--                    </span>-->
        <!--                </button>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-3">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                    <div class="col-md-3">
                        <input type="search" class="form-control" id="search" name="search" placeholder="Search.." aria-controls="DataTables_Table_0">
                        <input type="hidden" class="form-control" id="status" value="All">
                    </div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                    <div class="container">
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead>
                                <tr>
                                    <th>S.No#</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd" id="id-<?php echo e($model->label); ?>">
                                        <td tabindex="0"><?php echo e($models->firstItem()+$key); ?>.</td>
                                        <td>
                                            <span class="text-truncate d-flex align-items-center text-primary fw-semibold">
                                                <?php echo e(Illuminate\Support\Str::upper($model->label)); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = SubPermissions($model->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $permission_lab = explode('-', $label->name) ?>
                                                <?php if($permission_lab[1]=='list'): ?>
                                                    <span class="badge bg-label-success">View</span>
                                                <?php elseif($permission_lab[1]=='create'): ?>
                                                    <span class="badge bg-label-primary">Create</span>
                                                <?php elseif($permission_lab[1]=='edit'): ?>
                                                    <span class="badge bg-label-info">Edit</span>
                                                <?php elseif($permission_lab[1]=='delete'): ?>
                                                    <span class="badge bg-label-danger">Delete</span>
                                                <?php elseif($permission_lab[1]=='status'): ?>
                                                    <span class="badge bg-label-success">Status</span>
                                                <?php else: ?>
                                                    <span class="badge bg-label-success">Custom</span>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td><?php echo e(date('d, F Y', strtotime($model->created_at))); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="<?php echo e($model->label); ?>" data-del-url="<?php echo e(route('permissions.destroy', $model->label)); ?>">
                                                    <i class="ti ti-trash ti-sm mx-2"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <?php echo $models->links('pagination::bootstrap-4'); ?>

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

            <!-- Modal -->
            <!-- Add Permission Modal -->
            <div class="modal fade" id="addPermissionModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3 p-md-5">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h3 class="mb-2" id="modal-label">Add New Permission</h3>
                                <p class="text-muted">Permissions you may use and assign to your users.</p>
                            </div>
                            <form id="create-form" data-modal-id="addPermissionModal" class="row">
                                <?php echo csrf_field(); ?>

                                <div class="col-12 mb-3">
                                    <label class="form-label" for="name">Permission Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Permission Name" autofocus />
                                    <span id="name_error" class="text-danger"></span>
                                    <input type="hidden" id="label"/>
                                    <span id="label_error" class="text-danger error"></span>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label" for="custom">Custom Permission <small>If needed</small></label>
                                    <input type="text" id="custom" name="custom" class="form-control" placeholder="Permission Name" autofocus />
                                    <span id="custom_error" class="text-danger"></span>
                                    <input type="hidden" id="label"/>
                                    <span id="label_error" class="text-danger error"></span>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">

                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <!-- Default checkbox -->
                                                <div class="col-lg-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="all" id="checkAll"/>
                                                        <label class="form-check-label" for="checkAll"> <strong>All</strong> </label>
                                                    </div>
                                                </div>

                                                <!-- Default checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="list" id="list" checked/>
                                                        <label class="form-check-label" for="list"> <strong>List</strong></label>
                                                    </div>
                                                </div>

                                                <!-- Checked checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="create" id="create"/>
                                                        <label class="form-check-label" for="create"> <strong>Create</strong></label>
                                                    </div>
                                                </div>

                                                <!-- Checked checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="edit" id="edit"/>
                                                        <label class="form-check-label" for="edit"> <strong>Edit</strong></label>
                                                    </div>
                                                </div>

                                                <!-- Checked checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="delete" id="delete"/>
                                                        <label class="form-check-label" for="delete"> <strong>Delete</strong></label>
                                                    </div>
                                                </div>

                                                <!-- Checked checkbox -->
                                                <div class="col-lg-3 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="permissions[]" type="checkbox" value="status" id="status"/>
                                                        <label class="form-check-label" for="status"> <strong>Status</strong></label>
                                                    </div>
                                                </div>

                                                <span id="permissions_error" class="text-danger"></span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                                <div class="col-12 text-center demo-vertical-spacing">
                                    <button type="submit" data-url="<?php echo e(route('permissions.store')); ?>" class="btn btn-primary me-sm-3 me-1 submitBtn">Create Permission</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Discard
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Add Permission Modal -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script>
	$("#checkAll").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>