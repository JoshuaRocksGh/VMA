<div class="container-fluid  mb-2">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <img style="width: 30px;" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;
            <span class="font-14 text-primary font-weight-bold text-uppercase"> {{ $pageTitle }}
            </span>
        </div>

        <span class="d-none d-sm-block font-12 font-weight-medium ">
            <span class="text-primary "> {{ $basePath }} </span> &nbsp; > &nbsp; <span class="text-danger">{{
                $currentPath }}</span>
        </span>

    </div>
</div>