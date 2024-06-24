<?php use Illuminate\Support\Facades\Gate; ?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?php echo e(url('/dashboard')); ?>" class="app-brand-link">
            <img style="width: 40%" src="<?php echo e(asset('public/admin/assets/img/logo/1684880051.png')); ?>" class="img-fluid light-logo" alt="Default"/>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item <?php echo e(request()->is('dashboard')?'active':''); ?>">
            <a href="<?php echo e(route('dashboard')); ?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <?php if(
            Gate::check('employees-list')
        ): ?>
            <li class="menu-item <?php echo e(request()->is('employees') ||
                    request()->is('employees/create')
                    ?'open active':''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Employees">Employees</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employees-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('employees')?'active':''); ?>">
                            <a href="<?php echo e(route('employees.index')); ?>" class="menu-link">
                                <div data-i18n="Employees">Employees</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(
            Gate::check('service-list')
        ): ?>
            <li class="menu-item <?php echo e(request()->is('services') ||
                    request()->is('services/create')
                    ?'open active':''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                    <div data-i18n="Services">Services</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('services')?'active':''); ?>">
                            <a href="<?php echo e(route('services.index')); ?>" class="menu-link">
                            <div data-i18n="All Services">All Services</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
       
        <?php if(
            Gate::check('facility-list')
        ): ?>
            <li class="menu-item <?php echo e(request()->is('facilities') ||
                    request()->is('room-types')
                    ?'open active':''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Facilities">Facilities</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('facility-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('facilities')?'active':''); ?>">
                            <a href="<?php echo e(route('facilities.index')); ?>" class="menu-link">
                            <div data-i18n="All Facilities">All Facilities</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('room-list')): ?>                   
                        <li class="menu-item <?php echo e(request()->is('room-types')?'active':''); ?>">
                            <a href="<?php echo e(route('room-type.index')); ?>" class="menu-link">
                            <div data-i18n="All Room Types">All Room Types</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(
            Gate::check('task-list')
        ): ?>
            <li class="menu-item <?php echo e(request()->is('tasks')
                    ?'open active':''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Tasks">Tasks</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('facility-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('tasks')?'active':''); ?>">
                            <a href="<?php echo e(route('tasks.index')); ?>" class="menu-link">
                            <div data-i18n="All Tasks">All Tasks</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        
        <?php if(
            Gate::check('complation-list')
        ): ?>
            <li class="menu-item <?php echo e(request()->is('completion_tasks_report') ||
                    request()->is('completion_employee_report') ||
                    request()->is('completion_room_report')
                    ?'open active':''); ?>">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-report"></i>
                    <div data-i18n="Reports">Reports</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('complation-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('completion_tasks_report')?'active':''); ?>">
                            <a href="<?php echo e(url('completion_tasks_report')); ?>" class="menu-link">
                            <div data-i18n="Facility Report">Facility Report</div>
                            </a>
                        </li>
                    <?php endif; ?>
                        <li class="menu-item <?php echo e(request()->is('completion_employee_report')?'active':''); ?>">
                            <a href="<?php echo e(url('completion_employee_report')); ?>" class="menu-link">
                            <div data-i18n="Employee Report">Employee Report</div>
                            </a>
                        </li>
                    
                        <li class="menu-item <?php echo e(request()->is('completion_room_report')?'active':''); ?>">
                            <a href="<?php echo e(url('completion_room_report')); ?>" class="menu-link">
                            <div data-i18n="Room Report">Room Report</div>
                            </a>
                        </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(
            Gate::check('roles-list') ||
            Gate::check('permissions-list')
        ): ?>
            <li class="menu-item  <?php echo e(request()->is('roles') ||
                    request()->is('permissions')
                    ?'open active':''); ?>">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Administration">Administration</div>
                </a>
                <ul class="menu-sub">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('roles')?'active':''); ?>">
                            <a href="<?php echo e(route('roles.index')); ?>" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions-list')): ?>
                        <li class="menu-item <?php echo e(request()->is('permissions')?'active':''); ?>">
                            <a href="<?php echo e(route('permissions.index')); ?>" class="menu-link">
                            <div data-i18n="Permission">Permission</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
        
        <li class="menu-item <?php echo e(request()->is('logs_index')?'active':''); ?>">
                <a href="<?php echo e(url('logs_index')); ?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Logs">Logs</div>
            </a>
        </li>

    </ul>
</aside>
<?php /**PATH C:\xampp\htdocs\suescleaning.dotverge.com\resources\views/admin/layouts/sidebar-menu.blade.php ENDPATH**/ ?>