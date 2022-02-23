<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-left mb-0">

            <!-- LOGO -->
            <div class="logo-box">
                <a href="#" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{  asset('assets/images/' . env('APPLICATION_INFO_LOGO_SMALL') )}} " alt=""
                            height="40">
                        <!-- <span class="logo-lg-text-light">UBold</span> -->
                    </span>
                    <span class="logo-lg">
                        <img src="{{  asset('assets/images/' . env('APPLICATION_INFO_LOGO_DARK') )}} " alt=""
                            height="40">
                        <!-- <span class="logo-lg-text-light">U</span> -->
                    </span>
                </a>

                <a href="#" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <button class="button-menu-mobile waves-effect waves-light" onclick="window.history.back()">
                            <b> <i class="mdi mdi-arrow-left  font-22 text-white"></i></b>

                        </button>
                    </span>
                    <span class="logo-lg">
                        <img src="{{  asset('assets/images/' . env('APPLICATION_INFO_LOGO_LIGHT') )}} " alt=""
                            height="40">
                    </span>
                </a>
            </div>
            <li class="dropdown notification-list topbar-dropdown">
                <a onclick="window.history.back()" class="nav-link dropdown-toggle waves-effect waves-light"
                    data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="font-20"> <b> {{ $page_title }}</b> </span>
                </a>
            </li>
        </ul>
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>

                </a>
                <!-- End mobile menu toggle-->
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->