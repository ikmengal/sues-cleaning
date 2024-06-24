<?php if(count($data['task'])>0): ?>
    <?php $counter=0; ?>
    <?php $__currentLoopData = $data['task']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $counter++; ?>
        <tr class="odd" id="">
            <td tabindex="0"><?php echo e($counter); ?>.</td>
            <td>
                <span class="text-truncate d-flex align-items-center">
                    <?php echo e($data['facility']->name); ?>

                </span>
            </td>
            <td>
                <span class="text-truncate d-flex align-items-center">
                    <?php echo e($data['room']->name); ?>

                </span>
            </td>
            <td>
                <span class="fw-semibold">
                    <?php echo e($item->hasEmployee->first_name); ?> <?php echo e($item->hasEmployee->last_name); ?>

                </span>    
            </td>
            <td>
                <span class="fw-semibold">
                    <?php echo e($item->date); ?>

                </span>
            </td>
            <td>
                <?php if($item->status): ?>
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
                        data-show-url="<?php echo e(route('completion-rdetaile', $item->id)); ?>" 
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
<?php else: ?>
<tr>
    <td colspan="7">
        <div class="row">
            <div class="col-12">
                <h5 class="mt-3 text-danger text-center">No Record Here</h5>
            </div>
        </div>
    </td>
</tr>    
<?php endif; ?>
<?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/completion-tasks/room-show-room-table.blade.php ENDPATH**/ ?>