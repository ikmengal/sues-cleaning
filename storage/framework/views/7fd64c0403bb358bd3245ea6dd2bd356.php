<?php $__currentLoopData = $data['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="odd" id="id-<?php echo e($task->id); ?>">
        <td tabindex="0"><?php echo e($data['tasks']->firstItem()+$key); ?>.</td>
        <td>
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                    <div class="avatar avatar-sm me-3">
                        <?php if(isset($task->hasEmployee) && !empty($task->hasEmployee->image)): ?>
                            <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($task->hasEmployee->image); ?>" alt="Avatar" class="rounded-circle">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="fw-semibold"><?php echo e($task->hasEmployee->first_name??''); ?> <?php echo e($task->hasEmployee->last_name??''); ?></span>
                    <small class="text-muted"><?php echo e($task->hasEmployee->email??'-'); ?></small>
                </div>
            </div>
        </td>
        <td>
            <span class="fw-semibold">
                <?php echo e($task->hasFacility->name??'-'); ?>

            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php echo e($task->hasRoom->name??'-'); ?>

            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php if(!empty($task->date)): ?>
                    <?php echo e(date('d M Y', strtotime($task->date))); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            </span>
        </td>
        <!--<td>-->
        <!--    <span class="fw-semibold">-->
        <!--        <?php echo e($task->comment??'-'); ?>-->
        <!--    </span>-->
        <!--</td>-->
        <td>
            <span class="fw-semibold">
                <?php if($task->status): ?>
                    <span
                        class="badge bg-label-success"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Completed: <?php echo e(date('d F Y', strtotime($task->creaed_at))); ?>"
                    >Completed
                    </span>
                <?php else: ?>
                    <span
                        class="badge bg-label-danger"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Created At: <?php echo e(date('d F Y', strtotime($task->creaed_at))); ?>"
                    >Pending</span>
                <?php endif; ?>
            </span>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <a href="javascript:;" class="text-body dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="ti ti-dots-vertical ti-sm mx-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#"
                        class="dropdown-item show"
                        tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#dept-details-modal"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Task Details"
                        data-show-url="<?php echo e(route('tasks.show', $task->id)); ?>"
                        >
                        View Details
                    </a>
                     <a href="#"
                        class="dropdown-item show"
                        tabindex="0" aria-controls="DataTables_Table_0"
                        type="button" data-bs-toggle="modal"
                        data-bs-target="#dept-details-modal-assign"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Assign Room To Another User"
                        data-show-url="<?php echo e(route('room-assign-to-user', ['user_id'=>$task->hasEmployee->id, 'room_id'=>$task->hasRoom->id, 'task_date'=>$task->date, 'facility_id'=>$task->hasFacility->id])); ?>"
                        data-url="<?php echo e(route('employees.update', $task->hasEmployee->slug)); ?>"
                        id="show_room_data_to_edit"
                        >
                        Assign Room To Another User
                    </a>
                    <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="dropdown-item">
                        Edit
                    </a>
                    <a href="#"
                        class="dropdown-item delete"
                        data-slug="<?php echo e($task->id); ?>"
                        data-del-url="<?php echo e(route('tasks.destroy', $task->id)); ?>"
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
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['tasks']->firstItem()); ?> to <?php echo e($data['tasks']->lastItem()); ?> of <?php echo e($data['tasks']->total()); ?> entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo $data['tasks']->links('pagination::bootstrap-4'); ?>

                </div>
            </div>
        </div>
    </td>
</tr>
<script src="<?php echo e(asset('public/admin/assets/js/search-delete.js')); ?>"></script>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/tasks/search.blade.php ENDPATH**/ ?>