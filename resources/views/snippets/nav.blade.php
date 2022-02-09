<!-- Topbar Start -->
<div class="navbar-custom" style="zoom: 0.9;">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list topbar-dropdown d-none d-md-block d-lg-block ">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="" id='google_translate_element'></span>

                </a>
            </li>


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link  nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image" class="rounded-circle">
                    <span class="d-md-inline d-none  ml-1 h4" style="color:white">
                        <b> {{ session()->get('userAlias') }} </b>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a> --}}

                    <!-- item-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Settings</span>
                    </a> --}}

                    <!-- item-->
                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                    </a> --}}

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="logout" id="sidebar_logout" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box" style="display: flex; align-items: center;">
            <a href="/" class="logo logo-light text-center" style="padding-left:2rem">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="company logo" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/rokel_logos.png') }} " alt="company logo" height="40">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>


            <li class="notification-list d-none d-sm-block mt-3 ml-2">
                <span class="fs-6 h3" style="color:white">
                    {{ session()->get('accountDescription') }}
                </span>

            </li>


        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->