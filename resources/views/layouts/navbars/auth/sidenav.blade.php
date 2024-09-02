<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}"
            target="_blank">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Admin Panel</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fas fa-user-shield" style="color: #f4645f;"></i>
                    <!-- <i class="fab fa-laravel" style="color: #f4645f;"></i> -->
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Management Pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            @can('role-list')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#locationsExamples" class="nav-link {{ request()->is('court*') || request()->is('court_category*') ? 'active' : '' }}" aria-controls="locationsExamples" role="button" aria-expanded="{{ request()->is('court_category*') || request()->is('court*') ? 'true' : 'false' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-pin-3 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Court</span>
                </a>
                <div class="collapse {{ request()->is('court*') || request()->is('court_category*') ? 'show' : '' }}" id="locationsExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('court_category*') ? 'active' : '' }}" href="{{ route('court_category.index') }}">
                                <!-- <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                                </div> -->
                                <span class="sidenav-mini-icon">  </span>
                                <span class="nav-link-text ms-1">Court Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('court*') ? 'active' : '' }}" href="{{ route('court.index') }}">
                                <!-- <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                                </div> -->
                                <span class="sidenav-mini-icon">  </span>
                                <span class="nav-link-text ms-1">Court</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#CaseExamples" class="nav-link {{ request()->is('case_stage*') || request()->is('case_category*') ? 'active' : '' }}" aria-controls="CaseExamples" role="button" aria-expanded="{{ request()->is('case_category*') || request()->is('case_stage*') ? 'true' : 'false' }}">
                    <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-pin-3 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Case</span>
                </a>
                <div class="collapse {{ request()->is('case_stage*') || request()->is('case_category*') ? 'show' : '' }}" id="CaseExamples">
                    <ul class="nav ms-4">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('case_category*') ? 'active' : '' }}" href="{{ route('case_category.index') }}">
                                <!-- <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                                </div> -->
                                <span class="sidenav-mini-icon">  </span>
                                <span class="nav-link-text ms-1">Case Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('case_stage*') ? 'active' : '' }}" href="{{ route('case_stage.index') }}">
                                <!-- <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                                </div> -->
                                <span class="sidenav-mini-icon">  </span>
                                <span class="nav-link-text ms-1">Case Stages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('cases*') ? 'active' : '' }}" href="{{ route('cases.index') }}">
                                <!-- <div
                                    class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                                </div> -->
                                <span class="sidenav-mini-icon">  </span>
                                <span class="nav-link-text ms-1">All Cases</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user-management']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li> --}}
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('assets/img/illustrations/icon-documentation.svg') }}"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="/dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Check</a>
    </div>
</aside>
