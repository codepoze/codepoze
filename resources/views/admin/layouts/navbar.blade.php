<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset_admin('images/logo.svg') }}" alt="CodePoze Logo" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset_admin('images/logo-dark.png') }}" alt="CodePoze Logo" height="50">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset_admin('images/logo-light.svg') }}" alt="CodePoze Logo" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset_admin('images/logo-light.png') }}" alt="CodePoze Logo" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    <span class="badge bg-danger rounded-pill">3</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{ asset_admin('images/users/avatar-3.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-simplified">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{ asset_admin('images/users/avatar-4.jpg') }}" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <img class="rounded-circle header-profile-user" src="{{ (session()->get('foto') === null) ? '//placehold.co/150' : asset_upload('picture/'.session()->get('foto')) }}" alt="Header Avatar">
                        <span class="text-start ms-xl-2">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ session()->get('nama') }}</span>
                            <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ session()->get('roles') }}</span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('admin.profil') }}">
                        <i class="bx bx-user font-size-16 align-middle me-1"></i><span>Profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('auth.logout') }}">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i><span>Logout</span>
                    </a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>
        </div>
    </div>
</header>