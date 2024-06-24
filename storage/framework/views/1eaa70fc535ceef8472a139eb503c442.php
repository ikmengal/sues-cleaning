<table class="table">
   <thead>
        <tr>
            <th>EMPLOYEE</th>
            <th>FACILITY</th>
            <th>DATE</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
         <tr>
            <td>
                <div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                        <div class="avatar avatar-sm me-3">
                            <?php if(isset($data['task']->hasEmployee) && !empty($data['task']->hasEmployee->image)): ?>
                                <img src="<?php echo e(asset('public/admin/assets/img/avatars')); ?>/<?php echo e($data['task']->hasEmployee->image); ?>" alt="Avatar" class="rounded-circle">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/admin/default.png')); ?>" alt="Avatar" class="rounded-circle">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="fw-semibold"><?php echo e($data['task']->hasEmployee->first_name??''); ?> <?php echo e($data['task']->hasEmployee->last_name??''); ?></span>
                        <small class="text-muted"><?php echo e($data['task']->hasEmployee->email??'-'); ?></small>
                    </div>
                </div>
            </td>
            <td><?php echo e($data['task']->hasFacility->name??'-'); ?></td>
            <td>
                <?php if(!empty($data['task']->date)): ?>
                    <?php echo e(date('d F Y', strtotime($data['task']->date))); ?>

                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <!--<td>-->
            <!--    <?php if(!empty($data['task']->end_date)): ?>-->
            <!--        <?php echo e(date('d F Y', strtotime($data['task']->end_date))); ?>-->
            <!--    <?php else: ?>-->
            <!--        --->
            <!--    <?php endif; ?>-->
            <!--</td>-->
            <!--<td><?php echo e($data['task']->comment??'-'); ?></td>-->
            <td>
                <?php if($data['task']->status): ?>
                    <span
                        class="badge bg-label-success"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Completed: <?php echo e(date('d F Y', strtotime($data['task']->creaed_at))); ?>"
                    >Completed
                    </span>
                <?php else: ?>
                    <span
                        class="badge bg-label-danger"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Created At: <?php echo e(date('d F Y', strtotime($data['task']->creaed_at))); ?>"
                    >Pending</span>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
        <tr>
            <th colspan="4"><b>Room -> <u><?php echo e($data['task']->hasRoom->name); ?></u></b></th>
        </tr>
        <tr>
            <td colspan="5">
                <table class="table">
                    <tbody>
                        <?php $room = '' ?>
                        <?php $__currentLoopData = $data['task_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="2"><b><?php echo e($task_detail->hasParentService->name); ?></b></td>
                            </tr>
                                <ul>
                                    <?php $__currentLoopData = subServices($task_detail->parent_service_id, $task_detail->task_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><li><?php echo e($sub_service->hasSubService->name); ?></li></td>
                                            <td>
                                                <?php if($sub_service->status): ?>
                                                    <span
                                                        class="badge bg-label-success"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Completed: <?php echo e(date('d F Y', strtotime($sub_service->creaed_at))); ?>"
                                                    >Completed
                                                    </span>
                                                <?php else: ?>
                                                    <span
                                                        class="badge bg-label-danger"
                                                        data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Created At: <?php echo e(date('d F Y', strtotime($sub_service->creaed_at))); ?>"
                                                    >Pending</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr style="border-top:hidden;">
            <th colspan="5">COMMENT: </th>
        </tr>
        <tr style="border-top:hidden;">
            <td colspan="5"><?php echo e($data['task']->comment??'-'); ?></td>
        </tr>
        <tr>
            <th colspan="5">EXTRA HOURS: </th>
        </tr>
       <tr style="border-top:hidden">
            <td colspan="5"><?php echo e($data['task']->extra_hours??'-'); ?></td>
        </tr>    
        <?php if(isset($data['picturs']) && !empty($data['picturs'])): ?>
           <tr style="border-bottom:hidden">
                <th colspan="5">ATTACHEMENTS: </th>
            </tr>
            <tr>
                <td colspan="5">
                    <div class="row">
                        <?php $__currentLoopData = $data['picturs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_picture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-4">
                                <img src="<?php echo e(asset('public/admin/assets/img/task_pictures')); ?>/<?php echo e($task_picture->picture); ?>" alt="radioImg" class="w-100">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/completion-tasks/room-show-content.blade.php ENDPATH**/ ?>