<div class="container-fluid  mb-2">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            {{--  <img style="width: 40px;" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;  --}}
            <span class="font-14 text-dark font-weight-bold text-uppercase"> {{ $pageTitle }}
            </span>
        </div>

        <span class="d-none d-sm-block font-12 font-weight-medium ">
            <span class="text-dark "> {{ $basePath }} </span> &nbsp; > &nbsp; <span class="text-bold"
                style="color:#dc3545">{{ $currentPath }}</span>
        </span>

    </div>
</div>
