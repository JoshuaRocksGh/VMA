@extends('layouts.master')
@section('content')
@php
$pageTitle ="LOCAL BANK TRANSFER";
$basePath ="Transfer";
$currentPath ="Local Bank";
@endphp
@include("pages.transfer.transfers_master")
@endsection
@section('scripts')
{{-- <script src="{{ asset("assets/js/pages/transfer/local_bank.js") }}"> </script> --}}
@endsection


{{-- 
                                        <div class="col-md-7 site-card m-2" id="transaction_form">
                                    <br>
                                    <form action="#" class="select_beneficiary" id="payment_details_form"
                                        autocomplete="off" aria-autocomplete="none">
                                        @csrf


                                        <div class="row container">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">

                                                <div class="form-group row mb-3 no_beneficiary" style="display: none">
                                                    <b class="col-md-4 text-primary ">

                                                    </b>
                                                    <div class="alert alert-warning form-control col-md-8" role="alert">
                                                        <i class="mdi mdi-alert-outline mr-2"></i>
                                                        <strong>warning</strong> No
                                                        beneficiary
                                                        <legend></legend>
                                                    </div>

                                                </div>

                                                <div class="row mb-1">
                                                    <b class="col-md-12 text-primary mb-1">Account from which the money
                                                        will
                                                        be tansfered
                                                        &nbsp; <span class="text-danger">*</span> </b>

                                                    <select class="form-control" id="from_account" required>
                                                        <option disabled selected value=""> -- Select Your Account --
                                                        </option>
                                                        @include("snippets.accounts")
                                                    </select>
                                                </div>
                                                <hr>
                                                <div class="row mb-1">
                                                    <div class="col-md-4">

                                                        <div class="form-group mb-3">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="onetime_toggle" name="onetime_check"
                                                                    value="CHECKED">
                                                                <label class="custom-control-label"
                                                                    for="onetime_toggle"><b class="text-primary">Onetime
                                                                    </b> </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">

                                                            <select class="form-control col-md-12 bene_details"
                                                                id="to_account" required>
                                                                <option disabled selected value=""><b>-- Select
                                                                        Beneficiary --</b>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                </div>


                                                <div id="saved_benefciary_form">

                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Transfer Bank</b>
                                                        <input class="form-control col-md-8 readOnly" type="text"
                                                            id="beneficiary_bank_name" readonly>
                                                    </div>

                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary A/C Number</b>
                                                        <input class="form-control col-md-8 readOnly" type="text"
                                                            id="beneficiary_account_number" readonly>
                                                    </div>

                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary Name</b>
                                                        <input class="form-control col-md-8 readOnly" type="text"
                                                            id="beneficiary_account_name" readonly>
                                                    </div>

                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary Email</b>
                                                        <input class="form-control col-md-8 readOnly" type="text"
                                                            id="beneficiary_email" readonly>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary Address</b>
                                                        <input class="form-control col-md-8 readOnly" type="text"
                                                            id="beneficiary_address" readonly>
                                                    </div>

                                                    <div class="form-group row" style="display: none">

                                                        <b class="col-md-4 text-primary"> Attach Document&nbsp; <span
                                                                class="text-danger">*</span></b>

                                                        <div class="row col-md-8 ">



                                                            <div
                                                                class="radio  radio-primary form-check-inline m-1 col-md-5 include-attachment">
                                                                <input type="radio" id="inlineRadio2" value="true"
                                                                    name="radioInline">
                                                                <label for="inlineRadio2"> YES</label>
                                                            </div>

                                                            <div
                                                                class="radio radio-primary form-check-inline m-1 col-md-5 include-attachment">
                                                                <input type="radio" id="inlineRadio1" value="false"
                                                                    name="radioInline" checked>
                                                                <label for="inlineRadio1"> NO </label>
                                                            </div>


                                                        </div>

                                                    </div>

                                                    <div class="form-group row attach_invoice" style="display: none">
                                                        <b class="text-primary col-md-4">Attach Invoice</b>

                                                        <div class="custom-file col-md-8 attach_file">
                                                            <input type="file" class="custom-file-input"
                                                                id="beneficiary_inputGroupFile04">
                                                            <label class="custom-file-label"
                                                                for="inputGroupFile04">Choose
                                                                file</label>
                                                        </div>

                                                    </div>


                                                    <div class="form-group row">
                                                        <b class="text-primary col-md-4"> Transfer Mode &nbsp;<span
                                                                class="text-danger">*</span></b>

                                                        <select class="form-control col-md-8 " id="transfer_mode"
                                                            required>
                                                            <option disabled selected> -- Select Transfer Mode --
                                                            </option>
                                                            <option value="ACH">ACH</option>
                                                            <option value="RTGS">RTGS</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group row" style="display: none">
                                                        <div class="col-md-4"></div>
                                                        <span class="col-md-8 transfer_mode_note"><b>Note:</b> &emsp;
                                                            <span class="text-danger" id="ach_transfer_mode">Transfer
                                                                will
                                                                go through Automatic Clearing House</span>
                                                            <span class="text-danger" id="rtgs_transfer_mode">Transfer
                                                                will
                                                            </span>
                                                            <span class="text-danger"
                                                                id="instant_transfer_mode">Transfer
                                                                will be Instant</span>
                                                        </span>
                                                    </div>



                                                    <div class="form-group row">

                                                        <b class="col-md-4 text-primary">Actual Amount &nbsp; <span
                                                                class="text-danger">*</span></b>

                                                        <div class="input-group mb-1 col-8" style="padding: 0px;">
                                                            <div class="input-group-prepend">
                                                                <input type="text"
                                                                    class="input-group-text select_currency "
                                                                    id="select_currency" style="width: 80px;" readonly>

                                                            </div>

                                                            &nbsp;&nbsp;
                                                            <input type="text" class="form-control " id="amount"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>
                                                        </div>


                                                    </div>




                                                    <div class="form-group row">

                                                        <b class="col-4 text-primary"> Cur / Rate / Amount</b>

                                                        <div class="input-group mb-1 col-8" style="padding: 0px;">
                                                            <div class="input-group-prepend">
                                                                <select name=""
                                                                    class="input-group-text select_conversion_currency"
                                                                    id="conversion_currency">
                                                                                                                    </select>
                                                            </div>
                                                            &nbsp;&nbsp;
                                                            <div class="input-group-prepend">
                                                                <input type="text" class="form-control readOnly "
                                                                    id="onetime_convertor_rate" value="1.00"
                                                                    style="width: 100px;" readonly>
                                                            </div>
                                                            &nbsp;&nbsp;
                                                            <input type="text" class="form-control"
                                                                id="converted_amount" placeholder="Converted Amount"
                                                                aria-label="converted_amount"
                                                                aria-describedby="basic-addon1" readonly>
                                                        </div>


                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <b class="col-md-4 text-primary ">Purpose of Transfer &nbsp;
                                                            <span class="text-danger">*</span></b>

                                                        <input type="text" class="form-control col-md-8" id="purpose"
                                                            placeholder="Enter purpose of transaction" required>

                                                    </div>


                                                    <div class="form-group row mb-3">
                                                        <b class=" col-md-4 text-primary">Expense Category &nbsp; </b>
                                                        <input type="hidden" value="Others" id="category_">

                                                        <select class="form-control col-md-8" id="category" required>
                                                            <option disabled selected>---Not Selected---</option>

                                                        </select>


                                                    </div>

                                                </div>



                                                <div id="onetime_beneficiary_form" style="display:none">
                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Transfer Bank &nbsp; <span
                                                                class="text-danger">*</span></b>
                                                        <select class="form-control col-md-8"
                                                            id="onetime_beneficiary_bank_name" required>
                                                            <option disabled selected>---Not Selected---</option>

                                                        </select>
                                                    </div>

                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary A/C Number &nbsp;
                                                            <span class="text-danger">*</span></b>
                                                        <input class="form-control col-md-8" type="text"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                            id="onetime_beneficiary_account_number" required>
                                                    </div>
                                                                                        <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary Name &nbsp; <span
                                                                class="text-danger">*</span></b>
                                                        <input class="form-control col-md-8" type="text"
                                                            id="onetime_beneficiary_account_name">
                                                    </div>
                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary Address&nbsp; <span
                                                                class="text-danger">*</span></b>
                                                        <input class="form-control col-md-8" type="text"
                                                            id="onetime_beneficiary_account_address">
                                                    </div>

                                                    <div class="row mb-1">
                                                        <b class="text-primary col-md-4">Beneficiary Email &nbsp; <span
                                                                class="text-danger">*</span></b>
                                                        <input class="form-control col-md-8" type="email"
                                                            id="onetime_beneficiary_email">
                                                    </div>
                                                                                                     <div class="form-group row attach_invoice" style="display: none">
                                                        <b class="text-primary col-md-4">Attach Invoice</b>

                                                        <div class="custom-file col-md-8 attach_file">
                                                            <input type="file" class="custom-file-input"
                                                                id="onetime_inputGroupFile04">
                                                            <label class="custom-file-label"
                                                                for="inputGroupFile04">Choose
                                                                file</label>
                                                        </div>

                                                    </div>

                                                    <div class="form-group row">
                                                        <b class="text-primary col-md-4"> Transfer Mode &nbsp;<span
                                                                class="text-danger">*</span></b>

                                                        <select class="form-control col-md-8 "
                                                            id="onetime_transfer_mode" required>
                                                            <option selected disabled> -- Select Transfer Mode --
                                                            </option>
                                                            <option value="ACH">ACH</option>
                                                            <option value="RTGS">RTGS</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group row" style="display: none">
                                                        <div class="col-md-4"></div>
                                                        <span class="col-md-8 onetime_transfer_mode_note"><b>Note:</b>
                                                            &emsp;
                                                            <span class="text-danger"
                                                                id="onetime_ach_transfer_mode">Transfer will
                                                                go through Automatic Clearing House</span>
                                                            <span class="text-danger"
                                                                id="onetime_rtgs_transfer_mode">Transfer will
                                                            </span>
                                                            <span class="text-danger"
                                                                id="onetime_instant_transfer_mode">Transfer
                                                                will be Instant</span>
                                                        </span>
                                                    </div>

                                                    <div class="form-group row">

                                                        <b class="col-md-4 text-primary">Actual Amount &nbsp; <span
                                                                class="text-danger">*</span></b>

                                                        <div class="input-group mb-1 col-8" style="padding: 0px;">
                                                            <div class="input-group-prepend">
                                                                <input type="text"
                                                                    class="input-group-text select_currency "
                                                                    id="onetime_select_currency" style="width: 80px;"
                                                                    readonly>
                                                            </div>

                                                            &nbsp;&nbsp;
                                                            <input type="text" class="form-control " id="onetime_amount"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>
                                                        </div>


                                                    </div>

                                                    <div class="form-group row">

                                                        <b class="col-4 text-primary"> Cur / Rate / Amount</b>

                                                        <div class="input-group mb-1 col-8" style="padding: 0px;">
                                                            <div class="input-group-prepend">
                                                                <select name=""
                                                                    class="input-group-text select_conversion_currency"
                                                                    id="onetime_conversion_currency">
                                                                </select>
                                                            </div>
                                                            &nbsp;&nbsp;
                                                            <div class="input-group-prepend">
                                                                <input type="text"
                                                                    class="form-control display_midrate readOnly "
                                                                    id="convertor_rate" value="1.00"
                                                                    style="width: 100px;" readonly>
                                                            </div>
                                                            &nbsp;&nbsp;
                                                            <input type="text"
                                                                class="form-control display_converted_amount"
                                                                id="converted_amount_" placeholder="Converted Amount"
                                                                aria-label="Converted Amount"
                                                                aria-describedby="basic-addon1">
                                                        </div>


                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <b class="col-md-4 text-primary ">Purpose of Transfer &nbsp;
                                                            <span class="text-danger">*</span></b>

                                                        <input type="text" class="form-control col-md-8"
                                                            id="onetime_purpose"
                                                            placeholder="Enter purpose of transaction" required>

                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <b class=" col-md-4 text-primary">Expense Category &nbsp; </b>
                                                        <input type="hidden" value="Others" id="onetime_category_">

                                                        <select class="form-control col-md-8" id="onetime_category"
                                                            required>
                                                            <option disabled selected value="">---Not Selected---
                                                            </option>

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group text-right yes_beneficiary">
                                                    <button class="btn btn-primary btn-rounded" type="button"
                                                        id="next_button">
                                                        &nbsp; Next &nbsp;<i class="fe-arrow-right"></i> </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                </div> <!-- end col --> --}}


{{-- <div class="col-md-4 m-2 site-card" id="related_information_display">

                                    <h4 class="text-primary">Sender Acc. Info</h4>
                                    <hr class="mt-0">
                                    <div class="row mt-0">
                                        <h6 class="col-md-5">Account Description:</h6>
                                        <span class="text-primary display_from_account_name col-md-7"></span>

                                        <h6 class="col-md-5">Account Number:</h6>
                                        <span class="text-primary display_from_account_no col-md-7"></span>

                                        <h6 class="col-md-5">Available Balance:</h6>

                                        <span class="text-primary display_from_account_amount col-md-7"></span>


                                        <h6 class="col-md-5">Account Currency:</h6>
                                        <span class="text-primary display_from_account_currency col-md-7"></span>

                                                                     </div>

                                    <hr>
                                    <h4 class="text-primary">Receiver Acc. Info </h4>
                                    <hr class="mt-0">
                                    <div class="row">
                                        <h6 class="col-md-5">Receiver Name:</h6>
                                        <h6 class="text-primary display_to_account_name col-md-7"></h6>

                                        <h6 class="col-md-5">Bank Name:</h6>
                                        <h6 class="text-primary display_to_bank_name col-md-7"></h6>

                                        <h6 class="col-md-5">Receiver Account:</h6>
                                        <h6 class="text-primary display_to_account_no col-md-7"></h6>
                                        <h6 class="col-md-5">Receiver Address:</h6>
                                        <h6 class="text-primary display_to_account_address col-md-7"></h6>

                                        <h6 class="col-md-5 dtac ">Account Currency:</h6>
                                        <h6 class="text-primary dtac display_to_account_currency col-md-7"></h6>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <h6 class="text-primary col-md-5">Transfer Amount:</h6>
                                        <h6 class="text-danger text-bold col-md-7 ">
                                            <span class="display_currency"></span>
                                            &nbsp;
                                            <span class="display_transfer_amount"></span>
                                        </h6>
                                        <h6 class="col-md-5">Currency Rate:</h6>
                                        <span class="text-primary display_midrate col-md-7"></span>

                                        <h6 class="col-md-5">Converted Amount:</h6>
                                        <span class="text-primary display_converted_amount col-md-7"></span>
                                    </div>


                                    <br>
                                    <hr style="margin-top: 2px; margin-bottom: 5px; ">

                                    <hr style="margin-top: 2px; margin-bottom: 5px; ">

                                    <div class="row">
                                        <h6 class="text-primary col-md-5">Transaction Fee:</h6>
                                        <h6 class="text-danger text-bold col-md-7"></h6>
                                    </div>
                                </div> --}}