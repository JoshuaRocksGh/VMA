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

    <div>

        @php
            $currentPath = 'Account Statement';
            $basePath = 'Account';
        $pageTitle = 'account statement'; @endphp
        @include("snippets.pageHeader")

        <div class="col-12">
            <div class="___class_+?12___">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row site-card justify-content-md-around" id="transaction_form">
                                <div class="col-md-6 align-self-center">
                                    <div class="form-group row ">
                                        <b class="col-md-3 text-primary align-self-center"> Account :</b>
                                        <select class="form-control col-md-9" id="from_account" required>
                                            <option value="" disabled selected> -- Select Your Account -- </option>
                                            @include("snippets.accounts")
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <b class="col-md-3 text-primary align-self-center">Start Date :</b>
                                        <input type="date" id="startDate" class=" col-md-9 form-control ">
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-md-3 text-primary align-self-center">End Date :</b>
                                        <input type="date" id="endDate" class=" col-md-9 form-control ">
                                    </div>
                                    <div class="form-group row justify-content-end">
                                        <button class="btn btn-primary mt-1 waves-effect waves-light"
                                            id="search_transaction">Search</button>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-bold text-center"> <b>Account Details</b> </h4>
                                        </div>
                                        <div class="col-5">
                                            <h4>Name:&nbsp; </h4>
                                        </div>
                                        <div class="col-7">
                                            <h4 class="account_description">

                                            </h4>
                                        </div>
                                        <div class="col-5">
                                            <h4>Account No:&nbsp; </h4>
                                        </div>
                                        <div class="col-7">
                                            <h4 class="account_number">

                                            </h4>
                                        </div>
                                        <div class="col-5">

                                            <h4>Product:&nbsp; </h4>

                                        </div>
                                        <div class="col-7">
                                            <h4 class="account_product">

                                            </h4>
                                        </div>
                                        <div class="col-5">

                                            <h4>Currency:&nbsp;
                                            </h4>
                                        </div>
                                        <div class="col-7">
                                            <h4 class="account_currency">

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=" col-12 site-card" id="transaction_summary">
                            <div class="alert alert-secondary" id="account_balance_info_display" role="alert">
                                <div class="row">

                                    <div class="col-md-6">
                                        <h5>Account Number: <strong class="display_account_number"></strong>
                                        </h5>
                                        <h5> Date Range: <strong class="display_search_date_range"></strong>
                                        </h5>
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
                                            <a id="pdf_print" href="{{ url('print-account-statement') }}">
                                                <img src="{{ asset('assets/images/pdf.png') }}" alt=""
                                                    style="width: 22px; height: 25px;">
                                            </a>
                                            {{-- </span> --}}

                                            &nbsp;&nbsp;&nbsp;
                                        </span>
                                        <span style="float: right">
                                            {{-- <span> --}}
                                            <a id="excel_print" href="{{ url('print-account-statement') }}">
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
                                            <th scope="col">Amount <span class="account_number_display_"></span></th>
                                            <th scope="col">Credit Account</th>
                                            <th scope="col">Purpose of Transfer <span
                                                    class="account_currency_display_"></span>
                                            </th>
                                            <th scope="col">Balance<span class="account_description_display_"></span>
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
                </div>
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
