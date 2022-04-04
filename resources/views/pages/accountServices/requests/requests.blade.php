@extends('layouts.master')
@section("styles")
<style>
    .knav.active {
        margin-left: 0 !important;
        margin-right: 0 !important;
        box-shadow: rgba(0, 0, 0, 0.2) 0px 20px 30px;
        /* box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1); */
    }

    #request_statement.active {
        background-color: var(--primary-alt) !important;
        border-color: var(--primary-alt) !important;
        color: white !important;
    }


    #request_letter.active {
        color: white !important;
        background-color: var(--teal) !important;
        border-color: var(--teal) !important;
    }

    #request_bank_draft.active {
        background-color: var(--success) !important;
        border-color: var(--success) !important;
        color: white !important;
    }

    .date-select {
        height: 100%;
        max-width: 200px;
        border-radius: 0;
        border: none;
        background-color: transparent;
        color: var(--primary);
        font-weight: 500;
        font-size: 13px;
        border: 1px solid var(--primary);
        border-radius: 33px;
        padding: 0.5rem 1rem;
        outline: none;
        cursor: pointer;
    }

    .date-select:hover {
        background-color: var(--primary);
        color: white;
        focus transition: all 0.3s ease-in-out;
        box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    }

    .date-select.selected {
        background-color: var(--primary);
        color: white;
    }
</style>
@endsection
@section('content')

@php
$pageTitle='Request';
$basePath = 'AccountServices';
$currentPath = 'requests';
@endphp
@include('snippets.pageHeader')

<div class="tab-pane site-card p-2 p-sm-3 p-md-4">
    <div class=" mt-lg-0 rounded">
        <div class="form-group mb-3 justify-content-center d-md-flex mx-md-auto"
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
            <nav id="requests_tabs" class="col-md-4  nav nav-pills flex-column mx-auto mb-3 flex-row"
                style="max-width: 350px" role="tablist">
                <button id="request_statement" data-toggle="pill"
                    class=" transition-all py-md-2 active  text-sm-center mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                    href="#tab_request_statement">Statement Request</button>
                <button data-toggle="pill"
                    class=" transition-all py-md-2  text-sm-center mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link "
                    id="request_letter" href="#tab_request_letter">Request For Letter</button>

                <button id="request_bank_draft" data-toggle="pill"
                    class="  transition-all py-md-2 text-sm-center mb-1  mb-md-2 mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                    href="#tab_request_bank_draft">Request Bank Draft</button>

            </nav>
            <div class="col-md-8 px-0" style="max-width: 650px;">
                <div class="tab-content pt-0" id="tabContent_requests">
                    <div class="tab-pane fade show active" id="tab_request_statement" role="tabpanel">
                        @include('pages.accountServices.requests.statement_request')</div>
                    <div class="tab-pane fade" id="tab_request_letter" role="tabpanel">
                        @include('pages.cards.block_card')

                    </div>
                    <div class="tab-pane fade" id="tab_request_bank_draft" role="tabpanel">...b</div>
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
@endsection