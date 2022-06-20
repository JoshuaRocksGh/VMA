@extends('layouts.master')
@section('styles')
    <style>
        @media print {
            .hide_on_print {
                display: none
            }
        }

        .table_over_flow {
            overflow-y: hidden;

        }

        .dt-buttons {
            display: none;
        }

        .dataTables_filter {
            padding: 2px 10px;
            background-color: #e2e3e5;
        }

        .dataTables_info {
            padding: 2px 10px;

        }

        .pagination {
            padding: 2px 10px;
        }

        table.dataTable#account_transaction_display_table {
            margin-top: 0px !important;
        }

    </style>

    @include('extras.datatables')
@endsection

@section('content')
    @php
    $currentPath = 'Account Statement';
    $basePath = 'Account';
    $pageTitle = 'account statement';
    @endphp
    @include('snippets.pageHeader')

    <div class=" dashboard site-card" id="transaction_form">
        <div class="dashboard-body p-4" style="min-height: 0px;">
            <div class="d-flex align-items-center justify-content-around">
                <div class="w-100" style="max-width: 600px">
                    <div class="form-group  ">
                        <label class=" text-primary align-self-center"> Account :</label>
                        <select class="form-control accounts-select " id="from_account" required>
                            @include('snippets.accounts')
                        </select>
                    </div>

                    <div class="form-group d-flex justify-content-around align-items-end">
                        <div class=" pr-4 w-100">
                            <label class="  text-primary align-self-center">Start Date :</label>
                            <input type="date" id="startDate" class=" text-input  form-control ">
                        </div>
                        <div class=" pr-0 w-100">
                            <label class=" text-primary align-self-center">End Date :</label>
                            <input type="date" id="endDate" class="text-input  form-control ">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary mt-1 waves-effect waves-light"
                            id="search_transaction">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class=" tab-content dashboard-body border-primary border" id="transaction_summary" style="min-height: 0px;">
            {{-- <div class="dashboard-body p-4"> --}}
            <div class="accordion-arrow  p-3 rounded alert-secondary w-100" id="account_balance_info_display" role="alert">
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
                            <a id="pdf_print" style="display: none" class="download"
                                href="{{ url('print-account-statement') }}">
                                <img src="{{ asset('assets/images/pdf.png') }}" alt="" style="width: 22px; height: 25px;">
                            </a>
                            &nbsp;&nbsp;&nbsp;
                        </span>
                        <span style="float: right">
                            <a id="excel_print" style="display: none" class="download"
                                href="{{ url('print-account-statement') }}">
                                <img src="{{ asset('assets/images/excel.png') }}" alt=""
                                    style="width: 22px; height: 25px;">
                            </a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive mb-0  rounded ">

                <table role="table" class="table mb-0  font-12  w-100 table-bordered table-striped table-centered"
                    id="account_transaction_display_table" style="">
                    <thead>

                        <tr class="bg-primary text-white ">
                            <th scope="col">Date</th>
                            <th scope="col">Amount <span class="currency_display"></span></th>
                            {{-- <th scope="col">Contra Account</th> --}}
                            <th scope="col">Purpose of Transfer <span class="account_currency_display_"></span>
                            </th>
                            <th scope="col">Balance<span class="currency_display"></span>
                            </th>
                            {{-- <th scope="col">Document Ref</th> --}}
                            <th scope="col">Attachment</th>
                            <th scope="col">Details</th>
                        </tr>
                    </thead>

                    <tbody role="rowgroup" id="table-body-display">
                        <td colspan="100%" class="text-center">
                            {!! $noDataAvailable !!}
                        </td>
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}
        </div>
    </div>



    <div id="accordion-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content p-0">
                <div id="accordion">
                    <div class="card mb-0">
                        <div class="card-header bg-primary" id="headingOne">
                            <h5 class="m-0">
                                <a href="#collapseOne" class="text-white" data-toggle="collapse" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <b>Transaction Details</b>
                                </a>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">

                                        <tbody>
                                            <tr>
                                                <th scope="row">Transaction Date</th>
                                                <td class="text-danger transaction_date"></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">Value Date</th>
                                                <td class="text-danger value_date"></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">Transaction No.</th>
                                                <td class="text-danger transaction_number"></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">Narration</th>
                                                <td class="text-danger narration"></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">Amount</th>
                                                <td class="text-danger amount"></td>

                                            </tr>

                                            <tr>
                                                <th scope="row">Contra Account</th>
                                                <td class="text-danger contra-account"></td>

                                            </tr>
                                            <tr>
                                                <th scope="row">Branch</th>
                                                <td class="text-danger branch"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Channel</th>
                                                <td class="text-danger channel"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script defer>
        const PageData = new Object();
        PageData.reqAccount = @json($accountNumber);
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
    </script>
    <script src="{{ asset('assets/js/pages/accounts/accountEnquiry.js') }}"></script>
@endsection
