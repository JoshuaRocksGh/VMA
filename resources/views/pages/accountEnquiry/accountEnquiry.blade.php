@extends('layouts.master')
@section('styles')
<style>
    .carousel-control-next,
    .carousel-control-prev,
    .carousel-indicators {
        filter: invert(100%);
    }

    @media print {
        .hide_on_print {
            display: none
        }
    }

    .buttons-excel {
        display: none !important;
    }

    @font-face {
        font-family: 'password';
        font-style: normal;
        font-weight: 400;
        font-size: 40px;
        src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
    }

    input.key {
        font-family: 'password';
        width: 300px;
        height: 80px;
        font-size: 100px;
    }

    .table_over_flow {
        overflow-y: hidden;

    }

    h4,
    h5 {
        font-size: 0.9rem;

    }
</style>

@include("extras.datatables")

@endsection

@section('content')


@php
$currentPath = 'Account Statement';
$basePath = 'Account';
$pageTitle = 'account statement'; @endphp
@include("snippets.pageHeader")

<div class="card-body p-0 px-sm-2">
    <div class="row site-card p-2 p-md-4  justify-content-md-around" id="transaction_form">
        <div class="col-12 col-xl-6 align-self-center" style="max-width: 800px">
            <div class="form-group row ">
                <label class=" text-primary align-self-center"> Account :</label>
                <select class="form-control accounts-select " id="from_account" required>
                    <option value="" disabled selected> -- Select Your Account -- </option>
                    @include("snippets.accounts")
                </select>
            </div>

            <div class="form-group row align-items-end">
                <div class="col-6 pl-0">
                    <label class="  text-primary align-self-center">Start Date :</label>
                    <input type="date" id="startDate" class=" text-input  form-control ">
                </div>
                <div class="col-6 pr-0">
                    <label class=" text-primary align-self-center">End Date :</label>
                    <input type="date" id="endDate" class="text-input  form-control ">
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <button class="btn btn-primary mt-1 waves-effect waves-light" id="search_transaction">Search</button>
            </div>
        </div>
        <div class="w-100 col-xl-6 align-self-center px-0 px-xl-2 d-none d-sm-block">
            <div class="w-100  mx-auto p-2 text-center  overflow-hidden text-white rounded-lg"
                style="max-width: 450px; background-image: linear-gradient(to right, #0561ad, #00ccff)">
                <span class="d-block p-2 font-weight-bold font-12 text-right "> Rokel Commercial
                    Bank
                </span>
                <div class="d-flex justify-content-start mt-2 pl-2">
                    <img style="max-height: 50px" src="assets/images/logoRKB.png" />
                    <div class="w-100"><span
                            class="account_number text-center w-100 text-black font-weight-bold  font-sm-22"
                            style="letter-spacing: .1rem;">
                        </span>
                        <div><span class=" font-11 font-weight-bold mr-2 account_currency">
                            </span>
                            <span class="font-weight-bold " id="account_balance">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-4 justify-content-between">
                    <span class="account_description text-left font-weight-bold font-sm-18">

                    </span>
                    <span class="account_product font-11 font-weight-bold text-right">

                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row site-card" id="transaction_summary">
        <div class="mb-3 p-2 rounded alert-secondary w-100" id="account_balance_info_display" role="alert">
            <div class="row">

                <div class="col-md-6 row">
                    <h5 class="col-5">Account Number:
                    </h5>
                    <h5 class="col-7" id="display_account_number"></h5>
                    <h5 class="col-5"> Start Date:
                    </h5>
                    <h5 class="col-7" id="display_search_start_date"></h5>
                    <h5 class="col-5"> End Date:
                    </h5>
                    <h5 class="col-7" id="display_search_end_date"></h5>
                </div>

                <div class="col-9 col-md-4">
                    <select class="form-control col-md-8" id="filter" required>

                        <option value="all" selected> ALL</option>
                        <option value="credit"> CREDIT </option>
                        <option value="debit"> DEBIT </option>
                    </select>
                </div>

                <div class="col-3 col-md-2">
                    <span style="float: right">
                        &nbsp;&nbsp;
                        {{-- <span> --}}
                            <a id="pdf_print" style="display: none" class="download"
                                href="{{ url('print-account-statement') }}">
                                <img src="{{ asset('assets/images/pdf.png') }}" alt=""
                                    style="width: 22px; height: 25px;">
                            </a>
                            {{-- </span> --}}

                        &nbsp;&nbsp;&nbsp;
                    </span>
                    <span style="float: right">
                        {{-- <span> --}}
                            <a id="excel_print" style="display: none" class="download"
                                href="{{ url('print-account-statement') }}">
                                <img src="{{ asset('assets/images/excel.png') }}" alt=""
                                    style="width: 22px; height: 25px;">
                            </a>
                            {{-- </span> --}}

                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive  ">

            <table role="table" class="table p-3 table-bordered table-striped table-centered"
                id="account_transaction_display_table" style="zoom:0.9">
                <thead>

                    <tr class="bg-info text-white ">
                        <th scope="col">Date</th>
                        <th scope="col">Amount <span class="currency_display"></span></th>
                        <th scope="col">Contra Account</th>
                        <th scope="col">Purpose of Transfer <span class="account_currency_display_"></span>
                        </th>
                        <th scope="col">Balance<span class="currency_display"></span>
                        </th>
                        <th scope="col">Document Ref</th>

                        {{-- <th scope="col">Batch No</th> --}}
                        <th scope="col">Attachment</th>
                    </tr>
                </thead>

                <tbody role="rowgroup" id="table-body-display">
                    <td colspan="100%" class="text-center">
                        {!! $noDataAvailable !!}
                    </td>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="attachment_modal" tabindex="-1" role="dialog" aria-labelledby="attachment_modal_title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white font-weight-bold" id="attachment_modal_title">Attachments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="attachment_carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    </ol>
                    <div class="carousel-inner">

                    </div>
                    <a class="carousel-control-prev" href="#attachment_carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#attachment_carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
@include("extras.datatables")
<script src="{{ asset('assets/js/pages/accounts/accountEnquiry.js') }}"></script>
<script defer>
    const PageData = new Object();
        PageData.reqAccount = @json($accountNumber);
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
</script>
@endsection