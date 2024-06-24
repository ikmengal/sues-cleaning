<!DOCTYPE html>
<html>
<head>
    <title>Generate Employees Report</title>
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/assets/vendor/libs/bootstrap/css_bootstrap.min.css')); ?>" />
    <style>
        .table td, .table th{
            padding:0.1rem;
            border-top: 0px solid #dee2e6;
        }
        .table{
            width:100%;
        }
        .table td{
            border-bottom: 0.1px solid #dee2e6;
            border-left: 0.1px solid #dee2e6;
            border-right: 0.1px solid #dee2e6;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <?php
    ini_set('memory_limit', '256M');
    ?>
    <?php $counter=0; ?>
    <?php $__currentLoopData = $data['tasks']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $all_task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $counter=0; ?>
        <div class="page-break">
            <h2 class="text-center text-capitalize">sues cleaning</h2>
            <b class="text-capitalize">Date <?php echo e($all_task[$counter]->date); ?></b>
            <table class="table table-border">
                <tr>
                    <td class="border border-5 border-dark"><b><?php echo e($all_task[$counter]->hasFacility->name); ?></b></td>
                    <?php $__currentLoopData = $all_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h_task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="border border-5 border-dark text-center"><b><?php echo e($h_task->hasRoom->name); ?></b></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <td class="border border-5 border-dark"></td>
                    <?php $__currentLoopData = $all_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h_task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="bg-warning border border-5 border-dark text-center"><b><?php echo e($h_task->hasEmployee->first_name); ?> <?php echo e($h_task->hasEmployee->last_name); ?></b></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php 
                    $bool = true; 
                ?>
                <?php $__currentLoopData = $data['services']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($bool): ?>
                        <?php $bool = false ?> 
                        <tr>
                            <td class="bg-warning border border-5 border-dark"><b><?php echo e($service->name); ?></b></td>
                            <?php $__currentLoopData = $all_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h_task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td class="border-dark"></td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endif; ?>
                    <?php $__currentLoopData = $service->haveSubServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border-dark"><li style="list-style:none;"><?php echo e($sub_service->name); ?></i></td>
                            <?php $__currentLoopData = $all_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td align="center" class="border-dark">
                                <?php if(taskDetails($task->id, $service->id, $sub_service->id)): ?>
                                        <span>
                                            <img src="<?php echo e(asset('public/admin/assets/svg/icons/check2.svg')); ?>" style="width:20px; height:20px">
                                        </span>
                                    <?php else: ?>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $bool = true ?> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table> 
        </div>    
        <?php $counter++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH /home/dotverge/public_html/suescleaning.dotverge.com/resources/views/admin/completion-tasks/room-pdf-report.blade.php ENDPATH**/ ?>