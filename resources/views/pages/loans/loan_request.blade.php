@extends('layouts.master')


@section('content')
@php
$currentPath = "Loan Request" ;
$basePath = "Loans";
$pageTitle = "Loan Request"; @endphp
@include("snippets.pageHeader")

@include("snippets.pinCodeModal")


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
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Intro Source:</p>
                    <p class="text-primary loan-detail display_loan_intro_source col-md-6" style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Sector:</p>
                    <p class="text-primary loan-detail display_loan_sectors col-md-6" style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-sub-sectors-div" style="display: none">Sub Sector:
                    </p>
                    <p class="text-primary loan-sub-sectors-div display_loan_sub_sectors col-md-6"
                        style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Purpose:</p>
                    <p class="text-primary loan-detail display_loan_purpose col-md-6" style="display: none">
                    </p>
                    <p class="col-md-6 transfer-detail-text my-1 loan-detail" style="display: none">Product Branch:</p>
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
@endsection