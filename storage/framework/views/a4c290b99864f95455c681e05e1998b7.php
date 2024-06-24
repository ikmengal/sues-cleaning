<?php $counter=0; ?>
<?php if(!empty($data['user'])): ?>
<?php $__currentLoopData = $data['user']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $counter++; ?>
    <tr class="odd" id="">
        <td tabindex="0"><?php echo e($counter); ?>.</td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e($data['facility'][$key]['name']); ?>

            </span>
        </td>
        <td>
            <span class="text-truncate d-flex align-items-center">
                <?php echo e($data['room'][$key]['name']); ?>

            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

            </span>
        </td>
        <td>
            <span class="fw-semibold">
                <?php echo e($data['task'][$key]->date); ?>

            </span>
        </td>
        <td>
            <?php if($data['task'][$key]->status): ?>
                <span class="badge bg-label-success" text-capitalized="">Completed</span>
            <?php else: ?>
                <span class="badge bg-label-danger" text-capitalized="">Pending</span>
            <?php endif; ?>
        </td>
        <td>
            <div class="d-flex align-items-center">
                    <a href="javascript:;" 
                        class="btn btn-icon btn-label-info waves-effect" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="Room Details" 
                        data-show-url="<?php echo e(route('completion-employee-room-detaile', $data['task'][$key]->id)); ?>" 
                        data-url="" 
                        tabindex="0" 
                        aria-controls="DataTables_Table_0" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#dept-details-modal"
                        id="show_room_detail"
                    >
                        <i class="ti ti-eye-check ti-sm mx-1"></i>
                    </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="8">
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing  entries</div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    
                </div>
            </div>
        </div>
    </td>
</tr>
<?php else: ?>
<tr>
    <td colspan="8">
        <div class="row">
            <div class="col-12 mt-4">
                <h5 class="text-danger text-center">No Record Here</h5>
            </div>
        </div>
    </td>
</tr>
<?php endif; ?><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/completion-tasks/employee-show-room-table.blade.php ENDPATH**/ ?>