<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Style Switcher -->
        <li class="nav-item me-2 me-xl-0">
          <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
            <i class="ti ti-md"></i>
          </a>
        </li>
        <!--/ Style Switcher -->

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
                @if(isset(Auth::user()->profile) && !empty(Auth::user()->profile->profile))
                    <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ Auth::user()->profile->profile }}" style="width:40px !important; height:40px !important" alt class="h-auto rounded-circle" />
                @else
                    <img src="{{ asset('public/admin') }}/default.png" style="width:40px !important; height:40px !important" alt class="h-auto rounded-circle" />
                @endif
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="pages-account-settings-account.html">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                        @if(isset(Auth::user()->profile) && !empty(Auth::user()->profile->profile))
                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ Auth::user()->profile->profile }}" style="width:40px !important; height:40px !important" alt class="h-auto rounded-circle" />
                        @else
                            <img src="{{ asset('public/admin') }}/default.png" style="width:40px !important; height:40px !important" alt class="h-auto rounded-circle" />
                        @endif
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{ Str::ucfirst(Auth::user()->first_name) }} {{ Str::ucfirst(Auth::user()->last_name) }}</span>
                    <small class="text-muted">
                        @php
                            $role = Auth::user()->roles->first();

                            // Check if a role is found
                            if ($role) {
                                $roleName = $role->name;
                                // Perform actions for the role
                                echo $roleName;
                            }else{
                                echo '-';
                            }
                        @endphp
                    </small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                <i class="ti ti-user-check me-2 ti-sm"></i>
                <span class="align-middle">My Profile</span>
                </a>
            </li>
            {{-- @can('setting-create')
                <li>
                    <a class="dropdown-item" href="{{ route('settings.create') }}">
                        <i class="ti ti-settings me-2 ti-sm"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>
            @endcan --}}
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('user.logout') }}">
                    <i class="ti ti-logout me-2 ti-sm"></i>
                    <span class="align-middle">Log Out</span>
                </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
      <input
        type="text"
        class="form-control search-input container-xxl border-0"
        placeholder="Search..."
        aria-label="Search..."
      />
      <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
  </nav>
