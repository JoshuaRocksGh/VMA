@extends('layouts.master')
@section("styles")
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/pagination/pagination.css') }}" />
<style>
    .nodata {
        text-align: center !important
    }

    #no_data_available_img {
        max-width: 150px !important;
    }

    #cheque_book_request.active {
        background-color: var(--primary-alt) !important;
        border-color: var(--primary-alt) !important;
        color: white !important;
    }


    #block_cheque.active {
        color: white !important;
        background-color: var(--red) !important;
        border-color: var(--red) !important;
    }
</style>
@endsection
@section('content')

@php
$pageTitle='Cheque Services';
$basePath = 'Account Services';
$currentPath = 'Cheque Services';
@endphp
@include('snippets.pageHeader')

<div class="tab-pane site-card p-2 p-sm-3 p-md-4" style="min-height: 60vh">
    <div class=" mt-lg-0 rounded">
        <div class="form-group mb-3 justify-content-center d-md-flex mx-md-auto"
            style="max-width: 750px; min-height: 70px;">

            <div class=" align-self-center" style="min-width: 100px">
                <label class="d-block f-18 font-weight-bold mb-1 text-primary">Select Account</label>
            </div>
            <div class="pl-md-3 w-100">
                <select class="form-control  accounts-select" id="from_account" required>
                    <option disabled selected value="">Select
                        Account Number</option>
                    @include('snippets.accounts')
                </select>
            </div>

        </div>
        <div class="row pt-md-4 mx-auto" style="max-width: 1000px">
            <nav id="cheque_services_tabs" class="col-md-4  nav nav-pills flex-column mx-auto mb-3 flex-row"
                style="max-width: 350px" role="tablist">
                <button id="cheque_book_request" data-toggle="pill"
                    class=" transition-all py-md-2 active  text-sm-center mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link"
                    href="#tab_cheque_book_request">Cheque Book Request</button>
                <button data-toggle="pill"
                    class=" transition-all py-md-2  text-sm-center mb-1 mb-md-2  mx-2 font-weight-bold bg-white rounded-pill border text-primary border-primary knav nav-link "
                    id="block_cheque" href="#tab_block_cheque">Block Cheque</button>

            </nav>
            <div class="col-md-8 px-0" style="max-width: 650px;">
                <div class="tab-content pt-0" id="tabContent_cheque_services">
                    <div class="tab-pane fade show active bg-white" id="tab_cheque_book_request" role="tabpanel">
                        @include('pages.accountServices.chequeServices.cheque_book_request')</div>
                    <div class="tab-pane fade" id="tab_block_cheque" role="tabpanel">
                        @include('pages.accountServices.chequeServices.block_cheque')
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include("snippets.pinCodeModal")
@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages/accountServices/chequeServices.js') }}">
</script>
@endsection