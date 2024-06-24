<?php $__env->startSection('title', $title.' - Sues Cleaning'); ?>

<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/select2/select2.css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('employees.index')); ?>">
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h4 class="fw-bold pb-4 border-bottom"><span class="text-muted fw-light">Home /</span> <?php echo e($title); ?></h4>
                    <p class="mt-2 mb-0">
                         A role provided access to predefined menus and features so that depending on <br /> assigned role an administrator can have access to what user needs.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4">
        <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-normal mb-2">Total <span class=""><?php echo e(count($role->users)); ?></span> users</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                <?php $counter = 0; ?>
                                <?php $__currentLoopData = $role->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($counter <=5): ?>
                                        <?php $counter++; ?>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                            <?php if(isset($role_user->profile) && !empty($role_user->profile->profile)): ?>
                                                <img class="rounded-circle" src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($role_user->profile->profile); ?>" alt="Avatar" />
                                            <?php else: ?>
                                                <img class="rounded-circle" src="<?php echo e(asset('public/admin/assets/img/avatars/default.png')); ?>" alt="Avatar" />
                                            <?php endif; ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end mt-1">
                            <div class="role-heading">
                                <h4 class="mb-1"><?php echo e($role->name); ?></h4>
                                <a href="javascript:;"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Edit Record"
                                    data-edit-url="<?php echo e(route('roles.edit', $role->id)); ?>"
                                    data-url="<?php echo e(route('roles.update', $role->id)); ?>"
                                    class="role-edit-modal edit-btn"
                                    tabindex="0" aria-controls="DataTables_Table_0"
                                    type="button" data-bs-toggle="modal"
                                    data-bs-target="#addRoleModal">
                                    <span><i class="fa fa-edit"></i> Edit Role</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="<?php echo e(asset('public/admin')); ?>/assets/img/illustrations/add-new-roles.png" class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button
                                id="add-btn"
                                data-toggle="tooltip" data-placement="top" title="Add Role"
                                data-url="<?php echo e(route('roles.store')); ?>"
                                class="btn add-new btn-primary mb-md-0 mx-3"
                                tabindex="0" aria-controls="DataTables_Table_0"
                                type="button" data-bs-toggle="modal"
                                data-bs-target="#addRoleModal">
                                <span>Add Role</span>
                            </button>
                            <p class="mb-0 mt-1">Add role, if it does not exist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-3">Search Filter</h5>
                    <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
                        <div class="col-md-4 role">
                            <select name="search_role_id" id="search_role_id" class="form-select">
                                <option value="All" selected>Search By Role</option>
                                <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4 status">
                            <select id="search_status_id" name="search_status_id" class="select2 form-select text-capitalize" >
                                <option value="All" selected> Search by Status </option>
                                <option value="1">Active</option>
                                <option value="2">De-active</option>
                            </select>
                        </div>
                        <div class="col-md-4 status">
                            <input type="search" class="form-control" id="emp_search" name="emp_search" placeholder="Search.." aria-controls="DataTables_Table_0">
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="me-3">
                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mt-3">

                                    <div class="dt-buttons btn-group flex-wrap">
                                        <button
                                            class="btn btn-secondary add-new btn-primary mx-3"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Add New Employee"
                                            id="add-btn"
                                            data-url="<?php echo e(route('employees.store')); ?>"
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
                        <div class="container">
                            <table class="dt-row-grouping table dataTable dtr-column">
                                <thead>
                                    <tr>
                                        <th scope="col">S.No#</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="body">
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
                                                    <a href="javascript:;"
                                                        class="btn btn-icon btn-label-warning waves-effect edit-btn mx-2"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Direct User Permissions"
                                                        data-edit-url="<?php echo e(route('user-direct.permission.edit', $employee->slug)); ?>"
                                                        data-url="<?php echo e(route('user-direct.permission.update', $employee->slug)); ?>"
                                                        tabindex="0" aria-controls="DataTables_Table_0"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#edit-direct-permission-modal"
                                                        >
                                                        <i class="ti ti-lock ti-sm"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn btn-icon btn-label-primary waves-effect delete" data-slug="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('employees.destroy', $employee->id)); ?>">
                                                        <i class="ti ti-trash ti-sm"></i>
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
                                                        
                                                        <!--<a href="<?php echo e(route('employees.show', $employee->slug)); ?>" class="dropdown-item">View</a>-->
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Add Role Modal -->
                    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
                        <div class="modal-content p-3 p-md-5">
                            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <h3 class="role-title mb-2" id="modal-label">Add New Role</h3>
                                    <p class="text-muted">Set role permissions</p>
                                </div>
                                <!-- Add role form -->
                                <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="addRoleModal" id="create-form">
                                    <?php echo csrf_field(); ?>

                                    <span id="edit-content">
                                        <div class="col-12 mb-4">
                                            <label class="form-label" for="name">Role Name</label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter a role name" tabindex="-1" />
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
                                                        <?php $__currentLoopData = $data['models']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="text-nowrap fw-semibold"><?php echo e(ucfirst($permission->label)); ?> Management</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <?php $__currentLoopData = SubPermissions($permission->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $label = explode('-', $sub_permission->name) ?>
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input" name="permissions[]" value="<?php echo e($sub_permission->id); ?>" type="checkbox" id="userManagementRead-<?php echo e($sub_permission->id); ?>" />
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
                                    </span>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                        </button>
                                    </div>
                                </form>
                                <!--/ Add role form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Add Role Modal -->

                <!-- Add New Employee Modal -->
            <!--        <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">-->
            <!--    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">-->
            <!--        <div class="modal-content p-3 p-md-5">-->
            <!--            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>-->
            <!--            <div class="modal-body">-->
            <!--                <div class="text-center mb-4">-->
            <!--                    <h3 class="role-title mb-2" id="modal-label"></h3>-->
            <!--                </div>-->
                            <!-- Add role form -->
            <!--                <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework"-->
            <!--                    data-method="" data-modal-id="create-form-modal" id="create-form">-->
            <!--                    <?php echo csrf_field(); ?>-->

            <!--                    <span id="edit-content">-->
            <!--                        <div class="row">-->
            <!--                            <div class="mb-3 fv-plugins-icon-container col-6">-->
            <!--                                <label class="form-label" for="first_name">First Name <span class="text-danger">*</span></label>-->
            <!--                                <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">-->
            <!--                                <div class="fv-plugins-message-container invalid-feedback"></div>-->
            <!--                                <span id="first_name_error" class="text-danger error"></span>-->
            <!--                            </div>-->
            <!--                            <div class="mb-3 fv-plugins-icon-container col-6">-->
            <!--                                <label class="form-label" for="last_name">Last Name</label>-->
            <!--                                <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">-->
            <!--                                <div class="fv-plugins-message-container invalid-feedback"></div>-->
            <!--                                <span id="last_name_error" class="text-danger error"></span>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                        <div class="row">-->
            <!--                            <div class="mb-3 fv-plugins-icon-container col-6">-->
            <!--                                <label class="form-label" for="email">Email <span class="text-danger">*</span></label>-->
            <!--                                <input type="email" id="email" class="form-control" placeholder="john.doe@cyberonix.org" aria-label="john.doe@cyberonix.org" name="email">-->
            <!--                                <div class="fv-plugins-message-container invalid-feedback"></div>-->
            <!--                                <span id="email_error" class="text-danger error"></span>-->
            <!--                            </div>-->
            <!--                            <div class="mb-3 fv-plugins-icon-container col-6">-->
            <!--                                <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>-->
            <!--                                <input type="text" id="phone_number" class="form-control" placeholder="Enter phone number" name="phone_number" oninput="updatePhoneNumberFormat(this)">-->
            <!--                                <div class="fv-plugins-message-container invalid-feedback"></div>-->
            <!--                                <span id="phone_number_error" class="text-danger error"></span>-->
            <!--                            </div>-->
            <!--                        </div>-->
                                    <!--<div class="mb-3">-->
                                    <!--    <label class="d-block form-label">Gender</label>-->
                                    <!--    <div class="form-check mb-2">-->
                                    <!--      <input-->
                                    <!--        type="radio"-->
                                    <!--        id="gender-male"-->
                                    <!--        name="gender"-->
                                    <!--        class="form-check-input"-->
                                    <!--        checked-->
                                    <!--        required-->
                                    <!--        value="male"-->
                                    <!--      />-->
                                    <!--      <label class="form-check-label" for="gender-male">Male</label>-->
                                    <!--    </div>-->
                                    <!--    <div class="form-check">-->
                                    <!--      <input-->
                                    <!--        type="radio"-->
                                    <!--        id="gender-female"-->
                                    <!--        name="gender"-->
                                    <!--        class="form-check-input"-->
                                    <!--        required-->
                                    <!--        value="female"-->
                                    <!--      />-->
                                    <!--      <label class="form-check-label" for="gender-female">Female</label>-->
                                    <!--    </div>-->
                                    <!--    <div class="fv-plugins-message-container invalid-feedback"></div>-->
                                    <!--    <span id="gender_error" class="text-danger error"></span>-->
                                    <!--</div>-->
                                    
            <!--                        <div class="row">-->
            <!--                            <div class="col-6 mb-3">-->
            <!--                                <label class="form-label" for="employment_id">Employee ID</label>-->
            <!--                                <input type="text" id="employment_id" name="employment_id" class="form-control phone-mask" placeholder="Enter employment id">-->
            <!--                                <div class="fv-plugins-message-container invalid-feedback"></div>-->
            <!--                                <span id="employment_id_error" class="text-danger error"></span>-->
            <!--                            </div>-->

            <!--                            <div class="mb-3 col-6">-->
                                            <!--<label class="form-label" for="role_ids">Role</label>-->
                                            <!--<select id="role_ids" name="role_ids[]" multiple class="form-control">-->
                                            <!--    <option value="" selected>Select Role</option>-->
                                            <!--    <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                                            <!--        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>-->
                                            <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                            <!--</select>-->
            <!--                                <label class="form-label" for="role_ids">Role</label>-->
            <!--                                <select id="role_ids" name="role_ids" class="form-control">-->
            <!--                                    <option value="" selected>Select Role</option>-->
            <!--                                    <?php $__currentLoopData = $data['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
            <!--                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>-->
            <!--                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
            <!--                                </select>-->
                                            
            <!--                                <div class="fv-plugins-message-container invalid-feedback"></div>-->
            <!--                                <span id="role_ids_error" class="text-danger error"></span>-->
            <!--                            </div>-->
            <!--                        </div>-->
                                    
            <!--                    </span>-->
            <!--                    <div class="col-12 text-center mt-4">-->
            <!--                        <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>-->
            <!--                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">-->
            <!--                        Cancel-->
            <!--                        </button>-->
            <!--                    </div>-->
            <!--                </form>-->
                            <!--/ Add role form -->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
                <!-- Add New Employee Modal -->

                <!-- Add Direct Permission Modal -->
                    <div class="modal fade" id="edit-direct-permission-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-add-new-role">
                        <div class="modal-content p-3 p-md-5">
                            <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <h3 class="role-title mb-2" id="modal-label"></h3>
                                    <p class="text-muted">Set user permissions</p>
                                </div>
                                <!-- Add role form -->
                                <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="edit-direct-permission-modal" id="create-form">
                                    <?php echo csrf_field(); ?>

                                    <span id="edit-content">
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
                                                        <?php $__currentLoopData = $data['models']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td class="text-nowrap fw-semibold"><?php echo e(ucfirst($permission->label)); ?> Management</td>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <?php $__currentLoopData = SubPermissions($permission->label); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php $label = explode('-', $sub_permission->name) ?>
                                                                            <div class="form-check me-3 me-lg-5">
                                                                                <input class="form-check-input" name="permissions[]" value="<?php echo e($sub_permission->id); ?>" type="checkbox" id="userManagementRead-<?php echo e($sub_permission->id); ?>" />
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
                                    </span>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-primary me-sm-3 me-1 submitBtn">Submit</button>
                                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                        </button>
                                    </div>
                                </form>
                                <!--/ Add role form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Add Role Modal -->
                <!--/ View User Detail -->
                    <div class="modal fade" id="dept-details-modal" tabindex="-1" aria-hidden="true">
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
                    </div>
                <!--/ View User Detail -->
                    
                <!--New Employee Modal-->
                    <div class="modal fade" id="create-form-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-add-new-role">
                            <div class="modal-content p-3 p-md-5">
                                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="text-center mb-4">
                                        <h3 class="role-title mb-2" id="modal-label"></h3>
                                    </div>
                                    <!-- Add role form -->
                                    <form class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" data-method="" data-modal-id="create-form-modal" id="create-form">
                                        <?php echo csrf_field(); ?>
        
                                        <span id="edit-content">
                                            <div class="row">
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="first_name">First Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="first_name_error" class="text-danger error"></span>
                                                </div>
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="last_name">Last Name</label>
                                                    <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="last_name_error" class="text-danger error"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" id="email" class="form-control" placeholder="Enter email address" aria-label="john.doe@cyberonix.org" name="email">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="email_error" class="text-danger error"></span>
                                                </div>
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="phone_number">Phone <span class="text-danger">*</span></label>
                                                    <input type="text" id="phone_number" class="form-control" placeholder="Enter phone number" name="phone_number" oninput="updatePhoneNumberFormat(this)">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="phone_number_error" class="text-danger error"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="date_of_birth">Date of Birth</label>
                                                    <input
                                                        type="text"
                                                        name="date_of_birth"
                                                        id="multicol-birthdate"
                                                        class="form-control dob-picker"
                                                        placeholder="YYYY-MM-DD"
                                                    />
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="date_of_birth_error" class="text-danger error"></span>
                                                </div>
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="location">City <span class="text-danger">*</span></label>
                                                    <input type="text" id="city" class="form-control" name="city" placeholder="Enter city name">
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="city_error" class="text-danger error"></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="password_error" class="text-danger error"></span>
                                                </div>
                                                <div class="mb-3 fv-plugins-icon-container col-6">
                                                    <label class="form-label" for="conform_password">Confirm Password <span class="text-danger">*</span></label>
                                                    <input type="password" id="conform-password" class="form-control" name="password_confirmation" placeholder="Confirm Password" />
                                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                                    <span id="conform_password_error" class="text-danger error"></span>
                                                </div>
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
                <!--New Employee Modal-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/vendor/libs/select2/select2.js"></script>
    <script>
        $("#selectAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
    <script src="<?php echo e(asset('public/admin/assets/js/custom/employee.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin')); ?>/assets/js/form-layouts.js"></script>
    <script>
        function updatePhoneNumberFormat(input) {
            let phoneNumber = input.value.replace(/\D/g, '');

            if (phoneNumber.length >= 10) {
                phoneNumber = phoneNumber.slice(0, 10);
            }

            if (phoneNumber.length >= 3 && phoneNumber.length <= 6) {
                phoneNumber = phoneNumber.replace(/(\d{3})(\d{0,3})/, '$1-$2');
            } else if (phoneNumber.length > 6) {
                phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{0,4})/, '$1-$2-$3');
            }

            input.value = phoneNumber;
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>