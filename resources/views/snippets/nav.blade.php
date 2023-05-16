<!-- Topbar Start -->
<div id="top-nav-bar"
    class="d-flex  align-items-center justify-content-between py-2 px-2 px-sm-5 bg-white site-shadow sticky ">
    <a class="d-block d-md-none " type="button" data-toggle="offcanvas">
        <div class="hamburger-menu"><span></span><span></span><span></span></div>
    </a>

    <a href="{{ url('home') }}" class="d-none d-md-block">
        {{--  <img src="{{ asset('assets/images/slcb-bg-logo.png') }}" height="40" alt="company logo">  --}}
        <span class="font-14 font-weight-bold" style="color:black">
            DEVSAID
        </span>
    </a>


    <div class="logo-box" style="display: flex; align-items: center;">

        {{-- <span>
            {{ session()->get('accountDescription') }}
        </span> --}}
        <div class="d-none d-md-block rounded-pill border font-11 mx-4 py-1  text-capitalize px-2 border-info">
            <span class="font-14 font-weight-bold text-uppercase" style="color:black">
                {{-- {{ session()->get('Region') }} --}}
                @if (session()->get('UserMandate') == 'NationalLevel')
                    NATIONAL PORTAL
                @elseif(session()->get('UserMandate') == 'RegionalLevel')
                    REGIONAL PORTAL || {{ session()->get('Region') }}
                @elseif(session()->get('UserMandate') == 'ConstituencyLevel')
                    CONSTITUENCY PORTAL || {{ session()->get('Constituency') }}
                @endif
            </span>
        </div>


        <div class="d-none d-xl-flex align-items-center mx-4">
            <div>
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="mx-2">
                <div class="font-12 ">
                    {{ request()->ip() }}
                </div>
                <div class="text-info  font-10">
                    Last Login IP
                </div>
            </div>
        </div>

        <div class="d-none d-lg-flex align-items-center mx-4">
            <div>
                <i class="far fa-clock"></i>
            </div>
            <div class="mx-2">
                <div class="font-12">
                    {{--  {{ explode('GMT', session()->get('lastLogin'), 4)[0] }}  --}}
                    {{ date('Y-m-d H:i:s') }}
                </div>
                <div class="text-info  font-10">
                    Last Login Date
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="d-none d-md-block">
                {{-- <img src="{{ asset('assets/images/logoRKB.png') }}" alt="company logo" height="45"> --}}
            </div>

            <div class="mx-2">
                <div class="font-10 text-center text-info" style="line-height: 1"> Welcome Back </div>
                <div class="font-14 font-weight-bold text-uppercase">
                    {{ session()->get('FirstName') . ' ' . session()->get('Surname') }}

                </div>
            </div>
            <a href="{{ url('logout') }}" class=" ml-2">
                <i class="d-none d-sm-inline-block text-info fas fa-sign-out-alt"></i>
            </a>

        </div>
    </div>

</div>
