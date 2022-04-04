@extends('layouts.app')
@section("styles")
<style>
    .nodata {
        text-align: center !important
    }

    #no_data_available_img {
        max-width: 150px !important;
    }

    .knav.active {
        margin-left: 0 !important;
        margin-right: 0 !important;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 20px 30px;
        background-color: var(--primary-alt) !important;
        border-color: var(--primary-alt) !important;
        color: white !important;
    }
</style>
@endsection
@section('content')

@include('snippets.top_navbar', ['page_title' => 'ACCOUNT OPENING'])



<div class="container-fluid px-md-4 pt-5">

    <div class=" row pt-md-5 mx-auto">
        <nav id="card_services_tabs" class="col-md-4  nav nav-pills flex-column mx-auto mb-3 flex-row"
            style="max-width: 350px" role="tablist">
            <button data-toggle="pill"
                class=" transition-all py-md-2 active   mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                href="#tab_card_request">SAVINGS ACCOUNTS</button>
            <button data-toggle="pill"
                class=" transition-all py-md-2   mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link "
                href="#tab_block_card">CURRENT ACCOUNTS</button>
        </nav>
        <div class="col-md-8 px-0 mr-auto" style="max-width: 800px">
            <div class="tab-content pt-0" id="tabContent_card_services">
                <div class="tab-pane fade show active " id="tab_card_request" role="tabpanel">
                    <div class="savings_product_list row">
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_block_card" role="tabpanel">
                    <div class="current_product_list row ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->


@endsection


@section('scripts')



<script src='{{ asset("assets/js/pages/accountCreation.js") }}'>

</script>


@endsection