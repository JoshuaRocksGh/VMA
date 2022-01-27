@extends('layouts.master')


@section('styles')
<style>
    .repayment .menu-arrow {
        transform: rotate(90deg);
        transition: transform 0.5s
    }

    .repayment[aria-expanded="true"] .menu-arrow {
        transform: rotate(270deg);
    }
</style>
@endsection
@section('content')
@php
$currentPath = "Loan Request" ;
$basePath = "Loans";
$pageTitle = "Loan Request"; @endphp
@include("snippets.pageHeader")

@include("snippets.pinCodeModal")

<div class="card-body mt-md-4 py-3 site-card container" style="min-height: 50vh">
    <nav class="my-3 ">
        <div class="nav nav-pills flex-column flex-sm-row" id="pills-tab" role="tablist">
            <a id="Balance_Tab" class="flex-sm-fill text-sm-center nav-link active" data-toggle="pill" role="tab"
                href="#Balances_Pill">BALANCES</a>
            <a id="Request_Tab" class="flex-sm-fill text-sm-center nav-link" data-toggle="pill" role="tab"
                href="#Requests_Pill">REQUEST</a>
            <a id="Tracking_Tab" class="flex-sm-fill text-sm-center nav-link" data-toggle="pill" role="tab"
                href="#Tracking_Pill">TRACKING</a>
        </div>
    </nav>
    <div class="tab-content my-3" id="pills-tabContent">

        <div class="tab-pane show active " id="Balances_Pill" role="tab-panel" style="height: 100%">
            <div id="loan_balances_no_data" class=" justify-content-center align-items-center" style="display: flex;">
                {!! $noDataAvailable !!}
            </div>
            <div id="loan_balances" class="table-responsive" style="display: none">
                <table id="loan_balances_table" class="table table-striped table-hover table-centered table-bordered">
                    <thead class="bg-primary text-white font-weight-bold">
                        <tr class="text-center">
                            <th>Loan Description</th>
                            <th>Amount Granted</th>
                            <th>Loan Balance</th>
                            <th> View Details </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane  " id="Requests_Pill" role="tab-panel">

            <form action="#" id="payment_details_form" autocomplete="off" class="container" style="max-width: 650px">
                @csrf
                <div class="mb-3 form-group ">
                    <label class="text-primary mb-1 font-weight-bold font-12" for="loan_product">Select Loan
                        Product</label>
                    <select class="form-control" id="loan_product" required>
                        <option value="" disabled selected>Select Loan Product
                        </option>
                    </select>
                </div>
                <div class="mb-3 form-group ">

                    <label class="text-primary mb-1 font-weight-bold font-12" for="loan_amount">Enter Amount</label>
                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text">SSL</span>
                        </div>
                        <input type="text" placeholder="0.00" id="loan_amount" class="form-control">
                    </div>
                </div>
                <div class="mb-3 form-group ">
                    <label class="text-primary mb-1 font-weight-bold font-12" for="principal_repay_frequency">Select
                        Principal Frequency Type</label>
                    <select class="form-control" id="principal_repay_frequency" required>
                        <option value="" disabled selected>Select Principal Frequency Type
                        </option>
                    </select>
                </div>
                <div class="mb-3 form-group ">
                    <label class="text-primary mb-1 font-weight-bold font-12" for="interest_repay_frequency">Select
                        Interest
                        Frequency Type</label>
                    <select class="form-control" id="interest_repay_frequency" required>
                        <option value="" disabled selected>Select Interest Frequency Type
                        </option>
                    </select>
                </div>
                <div class="mb-3 form-group  form-check">
                    <input type="checkbox" class="form-check-input" id="terms_checkbox">
                    <label class="text-primary mb-1 font-weight-bold font-12" class="form-check-label"
                        for="terms_checkbox">I
                        agree to the Terms and Conditions</label>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <div class="tab-pane " id="Tracking_Pill" role="tab-panel">
            <p>Tracking</p>
        </div>
    </div>
</div>


<!-- Standard modal content -->
<div id="loan_detail_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="transfer_status"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="loan_details_content">
                <div class="modal-header bg-primary">
                    <h3 class="modal-title modal-title font-18 font-weight-bold text-white" id="transfer_status_title">
                        LOAN DETAILS</h3>
                </div>


                <div class="modal-body">
                    <div class="rounded-circle d-flex justify-content-center align-items-center mx-auto text-center bg-secondary"
                        style="height: 200px; width: 200px">
                        <div class="text-white ">
                            <span class="d-block font-14">Amount Outstanding</span>
                            <span class="d-block font-16">0.00</span>
                            <span class="d-block font-16">SSL</span>
                        </div>
                    </div>
                    <div class="d-flex px-2 my-4 justify-content-between">
                        <button type="button" class="btn btn-outline-primary rounded shadow-lg"
                            id="advanced_payment">Advance Payment</button>
                        <button type="button" class="btn btn-outline-primary rounded shadow-lg" id="view_loan_schedule">
                            View Schedule</button>
                    </div>

                    <h2 class="text-primary  font-16 font-weight-bold mb-2 text-center">LOAN </h2>

                    <table class="table table-borderless table-striped table-sm">
                        <tbody>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Principal Account</th>
                                <td class="text-primary text-right" id="principal_account"></td>
                            </tr>

                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Principal in Areas</th>
                                <td class="text-primary text-right" id="principal_in_areas"></td>
                            </tr>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Interest in Amount</th>
                                <td class="text-primary text-right" id="interest_in_amount"></td>
                            </tr>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Accrued interest</th>
                                <td class="text-primary text-right" id="accrued_interest"></td>
                            </tr>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Interest in Areas</th>
                                <td class="text-primary text-right" id="interest_in_areas"></td>
                            </tr>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Pinal Accrued</th>
                                <td class="text-primary text-right" id="pinal_accrued"></td>
                            </tr>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Last Repay Date</th>
                                <td class="text-primary text-right" id="last_repay_date"></td>
                            </tr>
                            <tr>
                                <th class="col-5 font-14 font-weight-normal">Next Review Date</th>
                                <td class="text-primary text-right" id="next_review_date"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="loan_schedule_content" class="" style="display: none">
                <div class="p-3 bg-primary">
                    <a id="loan_schedule_back_button" class="fas text-black fa-arrow-left inline-block"></a>
                    <h3 class="pb-2 text-center modal-title modal-title font-16 font-weight-bold text-white"
                        id="transfer_status_title"> LOAN SCHEDULE</h3>
                    <div class="px-2">
                        <div class="d-flex justify-content-between " style="color: #b2b9bd">
                            <span class="font-12">Facility No.</span>
                            <span class="font-weight-bold  text-white">998832</span>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex justify-content-between text-white">
                            <div>
                                <span class="d-block font-12 " style="color: #b2b9bd">Current Balance</span>
                                <span class="d-block font-weight-bold">998832</span>

                            </div>
                            <div>
                                <span class="d-block font-12 text-right" style="color:#b2b9bd">Areas</span>
                                <span class="d-block font-weight-bold text-right">LL 14,998,832.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="min-height: 50vh">
                    <div class="card m-2 shadow" style="border-radius: 2px">
                        <div>
                            <a href="#s" class="repayment" data-toggle="collapse">
                                <div class="d-flex justify-content-between pl-3 py-2">
                                    <span> Repayment #1</span>
                                    <span class="menu-arrow"></span>
                                </div>
                            </a>
                            <div class="collapse " id="s">
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>

                            </div>
                            <div class="bg-info">
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card m-2 shadow" style="border-radius: 2px">
                        <div>
                            <a href="#a" class="repayment" data-toggle="collapse">
                                <div class=" d-flex justify-content-between pl-3 py-2">
                                    <span> Repayment #1</span>
                                    <span class="menu-arrow"></span>
                                </div>
                            </a>
                            <div class="collapse " id="a">
                                <div class=" d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>

                            </div>
                            <div class="bg-info">
                                <div class="d-flex border-top justify-content-between px-3 py-2">
                                    <span class="text-dark"> Interest Amount</span>
                                    <span class="text-info">SLL 09347538</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->



{{-- ================================================================ --}}

{{-- <div class="card-body py-3 px-md-3">
    <div class="row">
        <div class="col-md-7 px-3">
            <div class="site-card h-100" id="request_form_div">
                <br>
                <div class="container">
                    <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                        aria-autocomplete="none">
                        @csrf
                        <div class="row px-md-4  justify-content-center">
                            <div class="col-md-12">

                                <div class="form-group row mb-3">
                                    <b class="col-4 align-self-center text-primary">Loan Product
                                    </b>


                                    <select class="form-control col-8 " id="loan_product" required>
                                        <option value="" disabled selected>Select Loan Product
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group row">

                                    <b class="col-4 align-self-center text-primary" for="loan_amount">
                                        Amount
                                    </b>

                                    <div class="px-0 col-2">
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text display_from_account_currency">
                                                    SLL</div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="text" class="form-control col-6" id="loan_amount"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">


                                </div>

                                <div class="form-group row">

                                    <b class="col-4 align-self-center text-primary" for="tenure_in_months">
                                        Tenure In Months
                                    </b>
                                    <input type="text" class="form-control col-8" id="tenure_in_months" required
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">


                                </div>


                                <div class="form-group row mb-3" id="pay_from_account">

                                    <b class="col-4 align-self-center text-primary">Interest Rate
                                        Type </b>

                                    <select class="form-control col-8" id="interest_rate_type" required>
                                        <option value="" disabled selected>Select Interest Rate Type
                                        </option>
                                    </select>

                                </div>



                                <div class="form-group row">

                                    <b class="col-4 align-self-center text-primary"> Principal
                                        Repayment
                                    </b>


                                    <select class="form-control col-8 loan_frequencies" id="principal_repay_freq"
                                        placeholder="Select Principal Repay Frequency" required>
                                        <option value="" disabled selected>Select Principal Repay
                                            Frequency</option>
                                    </select>

                                </div>

                                <div class="form-group row">

                                    <b class="col-4 align-self-center text-primary"> Interest
                                        Repayment
                                    </b>


                                    <select class="form-control col-8 loan_frequencies" id="interest_repay_freq"
                                        placeholder="Select Interest Repay
                                                            Frequency" required>


                                        <option value="" disabled selected>Select Interest Repay
                                            Frequency</option>
                                    </select>

                                </div>
                                <div class="form-group row loan-detail" style="display: none">

                                    <b class="col-4 align-self-center text-primary"> Intro Source
                                    </b>


                                    <select class="form-control col-8" id="loan_intro_source"
                                        placeholder="Select Where You Heard About The Loan" required>
                                        <option value="" disabled selected>Select Where You
                                            Heard About The Loan</option>
                                    </select>

                                </div>

                                <div class="form-group row loan-detail" style="display: none">

                                    <b class="col-4 align-self-center text-primary"> Sector
                                    </b>


                                    <select class="form-control col-8 " id="loan_sectors"
                                        placeholder="Select The Sector" required>
                                        <option value="" disabled selected>Select the sector
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group row loan-sub-sectors-div" style="display: none">

                                    <b class="col-4 align-self-center text-primary">Sub Sector
                                    </b>


                                    <select class="form-control col-8 " id="loan_sub_sectors"
                                        placeholder="Select The Sub Sector" required>
                                        <option value="" disabled selected>Select the sub
                                            sector</option>
                                    </select>
                                    @include("snippets.loading")

                                </div>
                                <div class="form-group row loan-detail" style="display: none">

                                    <b class="col-4 align-self-center text-primary">
                                        Purpose
                                    </b>


                                    <select class="form-control col-8" id="loan_purpose"
                                        placeholder="Purpose of the loan" required>
                                        <option value="" disabled selected>Purpose
                                            of the
                                            loan
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group row loan-detail" style="display: none">

                                    <b class="col-4 align-self-center text-primary">
                                        Product Branch
                                    </b>


                                    <select class="form-control col-8" id="product_branch"
                                        placeholder="Select pick up branch" required>
                                        <option value="" disabled selected>Select pick up branch
                                        </option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-group text-right yes_beneficiary">
                                    <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light "
                                        id="btn_loan_request">
                                        <span class="submit-text">Proceed</span>
                                        <span class="spinner-border spinner-border-sm mr-1 spinner-load" role="status"
                                            id="spinner" aria-hidden="true" style="display: none"></span>
                                        <span class="spinner-load" id="spinner-text"
                                            style="display: none">Loading...</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br><br><br>

                    </form>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-md-5 z-1 px-3">
            <div class="site-card h-100" id="atm_request_summary">
                <br>
                <span class="text-primary transfer-detail-header "> Loan Detail </span>
                <hr class="mt-0">
                <div class="row">

                    <p class="col-md-12 success-message"></p>
                    <p class="col-md-6 transfer-detail-text my-1">Loan Product:</p>
                    <p class="text-primary display_loan_product col-md-6"></p>
                    <p class="col-md-6 transfer-detail-text my-1">Amount(SLL):</p>
                    <p class="text-primary display_loan_amount col-md-6"></p>

                    <p class="col-md-6 transfer-detail-text my-1">Tenure In Months:</p>
                    <p class="text-primary display_tenure_in_months col-md-6"></p>

                    <p class="col-md-6 transfer-detail-text my-1">Interest Rate Type:</p>
                    <p class="text-primary display_interest_rate_type col-md-6"></p>

                    <p class="col-md-6 transfer-detail-text my-1">Principal Repay Frequency:</p>
                    <p class="text-primary display_principal_repay_freq col-md-6"></p>

                    <p class="col-md-6 transfer-detail-text my-1">Interest Repay Frequency:</p>
                    <p class="text-primary display_interest_repay_freq col-md-6"></p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Intro Source:
                    </p>
                    <p class="text-primary loan-detail display_loan_intro_source col-md-6" style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Sector:</p>
                    <p class="text-primary loan-detail display_loan_sectors col-md-6" style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-sub-sectors-div" style="display: none">Sub
                        Sector:
                    </p>
                    <p class="text-primary loan-sub-sectors-div display_loan_sub_sectors col-md-6"
                        style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Purpose:</p>
                    <p class="text-primary loan-detail display_loan_purpose col-md-6" style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Product Branch:
                    </p>
                    <p class="text-primary loan-detail product-branch display_product_branch col-md-6"
                        style="display: none"></p>

                </div>

                <div class="form-group text-center display_button_print" style="display: none">

                    <span> <button class="btn btn-secondary btn-rounded" type="button" id="back_button"
                            onclick="window.location.reload()">Back</button> &nbsp; </span>
                    <span>&nbsp;
                        <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button"
                                id="print_receipt" onclick="window.print()">Print
                                Receipt
                            </button></span>
                </div>
            </div>
        </div>

    </div>
</div> --}}

{{-- <div class="card" id="payment_schedule" style="display: none">
    <div class="show col-md-12" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4 text-left">
                        <b class="text-primary font-20">Loan Payment Schedule</b>
                    </div>
                    <div class="form-group row">
                        <div class="col-8 offset-4 text-right">
                            <button type="submit" id="btn_proceed_to_loan"
                                class="btn  btn-primary btn-sm btn-rounded waves-effect waves-light ">
                                <b className="text-primary" style="font-size: 12px">Proceed To Request Loan
                                </b>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive p-2 table-striped table-bordered">
                <table class="table mb-0 loan_payment_schedule w-100">
                    <thead>
                        <tr class="bg-info text-white ">
                            <td> <b> NO </b> </td>
                            <td> <b> REPAYMENT DATE </b> </td>
                            <td> <b> PRINCIPAL REPAYMENT AMOUNT </b> </td>
                            <td> <b> INTEREST REPAYMENT AMOUNT </b> </td>
                            <td> <b> TOTAL REPAYMENT AMOUNT </b> </td>
                        </tr>
                    </thead>

                </table>
            </div>
            <!-- end table-responsive -->


        </div>
    </div>
</div> --}}

@endsection

@section('scripts')

@include("extras.datatables")
<script src="{{ asset('assets/js/pages/loans/loan-request.js') }}"> </script>
<script>
    let noDataAvailable = {!! json_encode($noDataAvailable) !!}

</script>
@endsection