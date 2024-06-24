
<?php $__env->startSection('title', $title); ?>

<?php $__env->startPush('styles'); ?>

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
        <div class="card pt-4">
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="container">
                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1227px;">
                            <thead class="fs-5">
                                <tr>
                                    <th class="text-center fs-6">S.No#</th>
                                    <th class="text-center fs-6">User</th>
                                    <th class="text-center fs-6">Facility</th>
                                    <th class="text-center fs-6">Room</th>
                                    <th class="text-center fs-6">Date</th>
                                    <th class="text-center fs-6">Status</th>
                                    <th class="text-center fs-6">Message</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $__currentLoopData = $data['logs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td  tabindex="0"><?php echo e($data['logs']->firstItem()+$key); ?>.</td>
                                        <td><?php echo e($log->hasUser->first_name); ?> <?php echo e($log->hasUser->last_name); ?></td>
                                        <td><?php echo e($log->hasFacility->name??'N/A'); ?></td>
                                        <td><?php echo e($log->hasRoom->name??'N/A'); ?></td>
                                        <td><?php echo e(date('d-F-Y',strtotime($log['created_at']))); ?></td>
                                        <td>
                                            <?php if(isset($log['status']) && $log['status']==1): ?>
                                                <span class="badge bg-label-success">Completed</span>
                                            <?php else: ?>
                                                <span class="badge bg-label-danger">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($log['subject']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-start" colspan="7">
                                        <div class="row mx-2">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo e($data['logs']->firstItem()); ?> to <?php echo e($data['logs']->lastItem()); ?> of <?php echo e($data['logs']->total()); ?> entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <a  href="<?php echo e($data['logs']->previousPageUrl()); ?>" style="
                                                                padding: 0.594rem 0.9rem;
                                                                min-width: calc( 1.938rem + 0px );
                                                                font-size: 0.75rem;
                                                                line-height: 1;
                                                                border-color: #cbc8c875;
                                                                background-color: #cbc8c875;
                                                                color: #4f4f4f;
                                                                border-radius: 0.5rem;
                                                                margin-right:3px
                                                                ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                                        </svg>
                                                    </a>
                                                    <?php for($i=1;$i<=$data['logs']->lastPage();$i++): ?>
                                                        <?php if($i == $data['logs']->currentPage()): ?>
                                                            <a href="<?php echo e($data['logs']->url($i)); ?>" style="
                                                                padding: 0.594rem 0.9rem;
                                                                min-width: calc( 1.938rem + 0px );
                                                                font-size: 0.75rem;
                                                                line-height: 1;
                                                                border-color: #7367f0;
                                                                background-color: #7367f0;
                                                                color: #fff;
                                                                border-radius: 0.5rem"
                                                            ><?php echo e($i); ?></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e($data['logs']->url($i)); ?>" style="
                                                                padding: 0.594rem 0.9rem;
                                                                min-width: calc( 1.938rem + 0px );
                                                                font-size: 0.75rem;
                                                                line-height: 1;
                                                                border-color: #cbc8c875;
                                                                background-color: #cbc8c875;
                                                                color: #4f4f4f;
                                                                border-radius: 0.5rem"><?php echo e($i); ?></a>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <a href="<?php echo e($data['logs']->nextPageUrl()); ?>" style="
                                                                padding: 0.594rem 0.9rem;
                                                                min-width: calc( 1.938rem + 0px );
                                                                font-size: 0.75rem;
                                                                line-height: 1;
                                                                border-color: #cbc8c875;
                                                                background-color: #cbc8c875;
                                                                color: #4f4f4f;
                                                                border-radius: 0.5rem;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                        </svg>
                                                    </a>    
                                                </div>
                                                <!-- <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                                    <?php echo e($data['logs']->links('pagination::bootstrap-4')); ?>

                                                </div> -->
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
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <!-- Page JS -->
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/logs/index.blade.php ENDPATH**/ ?>