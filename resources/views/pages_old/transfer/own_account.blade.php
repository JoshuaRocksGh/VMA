@extends('layouts.master')
@section('content')
@php
$pageTitle = "own account transfer";
$basePath= "Transfer";
$currentPath= "Own Account";
@endphp
@include('pages.transfer.transfers_master')
@endsection
@section("scripts")
{{-- <script src="{{ asset("assets/js/pages/transfer/ownAccount.js") }}"> </script> --}}
@endsection
{{-- 
<div class="col-md-7 site-card m-2" id="transaction_form">
    <div class=" container">
        <form action="#" id="payment_details_form" autocomplete="off" aria-autocomplete="off">
            @csrf
            <div class="row justify-content-center">
                <div class="col">
                    <div class="form-group row ">
                        <label for="from_account" class="col-md-4 text-primary mb-1">Transfer
                            Account
                            &nbsp; <span class="text-danger">*</span> </label>
                        <select class="form-control col-md-8 mb-2" id="from_account" required>
                            <option selected disabled value=""> --- Select Account ---
                            </option>
                            @include("snippets.accounts")

                        </select>

                    </div>
                    <legend></legend>

                    <div class="form-group row">
                        <label for="to_account" class="col-md-4"><b
                                class="text-primary">Recipient Account
                                &nbsp;</b><span class="text-danger">*</span></label>
                        <select class="form-control col-md-8 mb-2" id="to_account" required>
                            <option selected disabled value="">--- Select Account ---
                            </option>
                            @include("snippets.accounts")
                        </select>
                    </div>
                    <div class="form-group row">

                        <label for="amount" class="col-md-4 text-primary">Actual Amount &nbsp;
                            <span class="text-danger">*</span></label>

                        <div class="input-group mb-3 col-8" style="padding: 0px;">
                            <div class="input-group-prepend">
                                <input type="text" class="input-group-text "
                                    id="select_currency" placeholder="SSL" style="width: 80px;"
                                    readonly>

                            </div>

                            &nbsp;&nbsp;
                            <input type="text" class="form-control " id="amount"
                                placeholder="Enter Amount"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                required>
                        </div>


                    </div>

                    <div class="form-group row">

                        <label for="select_currency__" class="col-4 text-primary"> Cur / Rate /
                            Converted
                            Amount</label>

                        <div class="input-group mb-3 col-8" style="padding: 0px;">
                            <div class="input-group-prepend">
                                <select name="" class="input-group-text select_currency"
                                    id="select_currency__">
                                </select>
                            </div>
                            &nbsp;&nbsp;
                            <div class="input-group-prepend">
                                <input type="text" class="form-control readOnly"
                                    id="convertor_rate" placeholder="0.00" readonly
                                    style="width: 100px;">
                            </div>
                            &nbsp;&nbsp;
                            <input type="text" class="form-control readOnly"
                                id="converted_amount" placeholder="Converted Amount"
                                aria-label="Converted Amount" aria-describedby="basic-addon1"
                                readonly>
                        </div>


                    </div>

                    <div class="form-group row">
                        <label class="col-md-4"><b class="text-primary">Purpose of
                                Transfer &nbsp;</b><span
                                class="text-danger">*</span></b></label>

                        <input type="text" class="form-control col-md-8 mb-2" id="purpose"
                            value="" placeholder="Enter purpose of transfer" autocomplete="off">

                    </div>

                    <div class="form-group row">
                        <label class="col-md-4"><b class="text-primary">Expense
                                Category
                                &nbsp;</b></label>
                        <input type="hidden" value="Others" id="category_">
                        <select class="form-control col-md-8 mb-2" id="category" required>
                            <option selected disabled value="">Select Category
                            </option>
                        </select>
                    </div>
                    <div class="form-group text-right m-2">
                        <button class="btn btn-primary btn-rounded" type="submit"
                            id="next_button">
                            &nbsp; Next &nbsp;<i class="fe-arrow-right"></i>
                        </button>
                    </div>
                </div>
        </form>
    </div>
</div> --}}
{{-- <div class="col-md-4 m-2 site-card details-showcase">
                        <h4 class="text-primary mb-0">Sender Acc. Info</h4>
                        <hr class="mt-0 mb-2">
                        <div class="row">
                            <p class="col-md-5 details-text">Account Description:</p>
                            <span class="text-primary display_from_account_name col-md-7"></span>

                            <p class="col-md-5 details-text">Account Number:</p>
                            <span class="text-primary display_from_account_no col-md-7"></span>

                            <p class="col-md-5 details-text">Available Balance:</p>

                            <span class="text-primary display_from_account_amount col-md-7"></span>


                            <p class="col-md-5 details-text">Account Currency:</p>
                            <span class="text-primary display_from_account_currency col-md-7"></span>
                        </div>

                        <h4 class="text-primary mb-0">Receiver Acc. Info</h4>
                        <hr class="mt-0 mb-2">
                        <div class="row">
                            <p class="col-md-5 details-text">Account Number:</p>
                            <p class="text-primary display_to_account_no col-md-7"></p>

                            <p class="col-md-5 details-text">Account Balance:</p>
                            <p class="text-primary display_to_account_amount col-md-7"></p>

                            <p class="col-md-5 details-text">Account Currency:</p>
                            <p class="text-primary display_to_account_currency col-md-7"></p>
                        </div>
                        <h4 class="text-primary mb-0">Transfer Info</h4>

                        <hr class="mt-0 mb-2">
                        <div class="row">
                            <p class="col-md-5 details-text">Transfer Amount:</p>

                            <span class=" text-danger text-bol  col-md-7 mt-0"><b class="display_from_account_currency">
                                </b>
                                &nbsp;
                                <b class="mt-0 display_transfer_amount"> </b></span>
                            <p class="col-md-5 details-text">Currency Rate:</p>
                            <span class="text-primary display_midrate col-md-7"></span>

                            <p class="col-md-5 details-text">Converted Amount:</p><span class="col-md-7">
                                <span class="text-primary display_conversion_currency"> </span>
                                <span class="text-primary display_converted_amount"></span></span>
                        </div>
                    </div> --}}