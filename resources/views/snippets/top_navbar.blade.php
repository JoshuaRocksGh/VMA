<div class="d-flex align-items-center grad-rokel justify-content-between py-2 px-2 px-sm-5 mb-4  site-shadow ">

    <a href="{{ url('home') }}" class="d-none d-md-block">
        <img src="{{ asset('assets/images/rokel_logo.png') }}" height="40" alt="company logo">
    </a>


    <div class="logo-box text-white" style="display: flex; align-items: center;">
        <span class="font-20"> <b> {{ $page_title }}</b> </span>

    </div>
    <div class="d-flex align-items-center">
        <div
            class="d-none d-md-block rounded-pill text-white font-weight-bold border font-11 mx-4 py-1  text-capitalize px-2 border-white">
            @if (config('app.corporate'))
            corporate
            @else
            personal
            @endif
            Internet Banking
        </div>

    </div>
</div>