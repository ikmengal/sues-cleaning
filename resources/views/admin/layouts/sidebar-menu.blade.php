@php use Illuminate\Support\Facades\Gate; @endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link">
            <img style="width: 40%" src="{{ asset('public/admin/assets/img/logo/1684880051.png') }}" class="img-fluid light-logo" alt="Default"/>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard')?'active':'' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        @if(
            Gate::check('employees-list')
        )
            <li class="menu-item {{
                    request()->is('employees') ||
                    request()->is('employees/create')
                    ?'open active':''
                }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Employees">Employees</div>
                </a>
                <ul class="menu-sub">
                    @can('employees-list')
                        <li class="menu-item {{ request()->is('employees')?'active':'' }}">
                            <a href="{{ route('employees.index') }}" class="menu-link">
                                <div data-i18n="Employees">Employees</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

        @if(
            Gate::check('service-list')
        )
            <li class="menu-item {{
                    request()->is('services') ||
                    request()->is('services/create')
                    ?'open active':''
                }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                    <div data-i18n="Services">Services</div>
                </a>
                <ul class="menu-sub">
                    @can('service-list')
                        <li class="menu-item {{ request()->is('services')?'active':'' }}">
                            <a href="{{ route('services.index') }}" class="menu-link">
                            <div data-i18n="All Services">All Services</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif
       
        @if(
            Gate::check('facility-list')
        )
            <li class="menu-item {{
                    request()->is('facilities') ||
                    request()->is('room-types')
                    ?'open active':''
                }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Facilities">Facilities</div>
                </a>
                <ul class="menu-sub">
                    @can('facility-list')
                        <li class="menu-item {{ request()->is('facilities')?'active':'' }}">
                            <a href="{{ route('facilities.index') }}" class="menu-link">
                            <div data-i18n="All Facilities">All Facilities</div>
                            </a>
                        </li>
                    @endcan
                    @can('room-list')                   
                        <li class="menu-item {{ request()->is('room-types')?'active':'' }}">
                            <a href="{{ route('room-type.index') }}" class="menu-link">
                            <div data-i18n="All Room Types">All Room Types</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif

        @if(
            Gate::check('task-list')
        )
            <li class="menu-item {{
                    request()->is('tasks')
                    ?'open active':''
                }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-layout-grid"></i>
                    <div data-i18n="Tasks">Tasks</div>
                </a>
                <ul class="menu-sub">
                    @can('facility-list')
                        <li class="menu-item {{ request()->is('tasks')?'active':'' }}">
                            <a href="{{ route('tasks.index') }}" class="menu-link">
                            <div data-i18n="All Tasks">All Tasks</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif
        
        @if(
            Gate::check('complation-list')
        )
            <li class="menu-item {{
                    request()->is('completion_tasks_report') ||
                    request()->is('completion_employee_report') ||
                    request()->is('completion_room_report')
                    ?'open active':''
                }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-report"></i>
                    <div data-i18n="Reports">Reports</div>
                </a>
                <ul class="menu-sub">
                    @can('complation-list')
                        <li class="menu-item {{ request()->is('completion_tasks_report')?'active':'' }}">
                            <a href="{{ url('completion_tasks_report') }}" class="menu-link">
                            <div data-i18n="Facility Report">Facility Report</div>
                            </a>
                        </li>
                    @endcan
                        <li class="menu-item {{ request()->is('completion_employee_report')?'active':'' }}">
                            <a href="{{ url('completion_employee_report') }}" class="menu-link">
                            <div data-i18n="Employee Report">Employee Report</div>
                            </a>
                        </li>
                    
                        <li class="menu-item {{ request()->is('completion_room_report')?'active':'' }}">
                            <a href="{{ url('completion_room_report') }}" class="menu-link">
                            <div data-i18n="Room Report">Room Report</div>
                            </a>
                        </li>
                </ul>
            </li>
        @endif

        @if(
            Gate::check('roles-list') ||
            Gate::check('permissions-list')
        )
            <li class="menu-item  {{
                    request()->is('roles') ||
                    request()->is('permissions')
                    ?'open active':''
                }}">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Administration">Administration</div>
                </a>
                <ul class="menu-sub">
                    @can('roles-list')
                        <li class="menu-item {{ request()->is('roles')?'active':'' }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                            </a>
                        </li>
                    @endcan
                    @can('permissions-list')
                        <li class="menu-item {{ request()->is('permissions')?'active':'' }}">
                            <a href="{{ route('permissions.index') }}" class="menu-link">
                            <div data-i18n="Permission">Permission</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endif
        
        <li class="menu-item {{ request()->is('logs_index')?'active':'' }}">
                <a href="{{ url('logs_index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Logs">Logs</div>
            </a>
        </li>

    </ul>
</aside>
