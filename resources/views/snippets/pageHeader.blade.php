<div class="container-fluid pt-2 ">
    <div class="row align-items-center">
        <div class="col-3 align-items-center">
            <a href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-soft-blue waves-effect waves-light"
                id="page_back_button"><i class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>
        </div>
        <div class="col-6">
            <div class="row align-items-center justify-content-center">
                <img class="header-icon" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;
                <h4 class="text-primary my-0 page-header text-center text-uppercase"> {{ $pageTitle }}
                </h4>
            </div>
        </div>

        <div class="col-md-3 align-items-center d-none d-md-block text-right">
            <span class="align-items-center font-12 font-weight-bold d-none d-lg-block">
                <span class="text-primary "> {{ $basePath }} </span> &nbsp; > &nbsp; <span class="text-danger">{{
                    $currentPath }}</span>
            </span>
        </div>

    </div>
    <div class="col-md-12 ">
        <hr class="text-primary my-2">
    </div>

</div>