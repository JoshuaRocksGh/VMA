@extends('layouts.master')
@section("styles")
<style>
    .history-card {
        cursor: pointer;

        box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;
        /* box-shadow: rgba(0, 0, 0, 0.2) 0px 20px 30px; */
        /* box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; */
    }

    .history-card:hover {
        margin-left: 0 !important;
        margin-right: 0 !important;
        box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
    }

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
        /* box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1); */
    }

    #card_request.active {
        background-color: var(--primary-alt) !important;
        border-color: var(--primary-alt) !important;
        color: white !important;
    }


    #block_card.active {
        color: white !important;
        background-color: var(--red) !important;
        border-color: var(--red) !important;
    }

    #activate_card.active {
        background-color: var(--success) !important;
        border-color: var(--success) !important;
        color: white !important;
    }

    #card_limits.active {
        background-color: var(--yellow) !important;
        color: white !important;
        border-color: var(--yellow) !important;
    }
</style>
@endsection
@section('content')

@php
$pageTitle='Card Services';
$basePath = 'CardServices';
$currentPath = 'CardServices';
@endphp
@include('snippets.pageHeader')

<div class="tab-pane dashboard site-card p-2 p-sm-3 p-md-4">
    <div class=" mt-lg-0 dashboard-body rounded">
        <div class="form-group  p-3 justify-content-center d-md-flex mx-md-auto"
            style="max-width: 750px; min-height: 70px;">

            <div class=" align-self-center" style="min-width: 100px"> <label
                    class="d-block f-18 font-weight-bold mb-1 text-primary">
                    Select
                    Account</label></div>
            <div class="pl-md-3 w-100">
                <select class="form-control unredeemed accounts-select" id="from_account" required>
                    <option disabled selected value="">Select
                        Account Number</option>
                    @include('snippets.accounts')
                </select>
            </div>

        </div>
        <div class="container row pt-md-4 mx-auto">
            <nav id="card_services_tabs" class="col-md-4  nav nav-pills flex-column mx-auto mb-3 flex-row"
                style="max-width: 350px" role="tablist">
                <button id="card_request" data-toggle="pill" data-value="unredeemed"
                    class=" transition-all py-md-2 active  text-sm-center mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                    href="#tab_card_request">Card Request</button>
                <button data-value="redeemed" data-toggle="pill"
                    class=" transition-all py-md-2  text-sm-center mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link "
                    id="block_card" href="#tab_block_card">Block Card</button>

                <button id="activate_card" {{-- data-toggle="pill" data-value="reversed" --}}
                    class="  transition-all coming-soon py-md-2 text-sm-center mb-1  mb-md-2 mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                    href="#tab_activate_card">Activate Card</button>
                <button id="card_limits" {{-- data-toggle="pill" data-value="reversed" --}}
                    class="  transition-all coming-soon py-md-2 text-sm-center mb-1  mb-md-2 mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                    href="#tab_card_limit">Card Limits</button>
            </nav>
            <div class="col-md-8 px-0" style="max-width: 650px;">
                <div class="tab-content pt-0" id="tabContent_card_services">
                    <div class="tab-pane fade show active bg-white" id="tab_card_request" role="tabpanel">
                        @include('pages.cards.card_request')</div>
                    <div class="tab-pane fade" id="tab_block_card" role="tabpanel">
                        @include('pages.cards.block_card')

                    </div>
                    <div class="tab-pane fade" id="tab_activate_card" role="tabpanel">...b</div>
                    <div class="tab-pane fade" id="tab_card_limit" role="tabpanel">.x..</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include("snippets.pinCodeModal")
@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages/cardServices/cardServices.js') }}">
</script>
<script src="{{ asset('assets/js/functions/comingSoon.js') }}">
</script>
@endsection