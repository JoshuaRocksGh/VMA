@extends('layouts.master')
@section('content')
@php
$pageTitle ="INTERNATIONAL BANK TRANSFER";
$basePath ="Transfer";
$currentPath ="International Bank";
@endphp
@include("pages.transfer.transfers_master")
@endsection
@section('scripts')
@endsection




{{-- @extends('layouts.master')


@section('styles')

<style>
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
</style>


@endsection


@section('content')

<div>

    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
INTERNATIONAL BANK TRANSFER
</h4>
</div>

<div class="col-md-6 text-right">
    <h6>

        <span class="flaot-right">
            <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">International Bank
                Transfer</b>


        </span>

    </h6>

</div>

<div class="col-md-12 ">
    <hr class="text-primary" style="margin: 0px;">
</div>

</div>
</div>


<div class="col-12">
    <div class="card-body">
        <div class="row">

            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-7 rtgs_summary_card m-2" id="transaction_summary"
                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10 ">
                                <br><br><br>

                                <div class="table-responsive card table_over_flow">
                                    <table class="table mb-0 table-bordered table-striped  ">

                                        <tbody>
                                            <tr class="success_gif">
                                                <td class="text-center bg-white" colspan="2">
                                                    <img src="{{ asset('land_asset/images/statement_success.gif') }}"
                                                        style="zoom: 0.5" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>From Account:</td>
                                                <td>
                                                    <span
                                                        class="font-13 text-primary text-bold display_from_account_type"
                                                        id="display_from_account_type"></span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_from_account_name"
                                                        id="display_from_account_name"> </span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_from_account_no"
                                                        id="display_from_account_no"></span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>To Account:</td>
                                                <td>

                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_to_account_name"
                                                        id="display_to_account_name"> </span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_to_bank_name"
                                                        id="display_to_bank_name"></span>
                                                    <span
                                                        class="d-block font-13 text-primary text-bold display_to_account_no"
                                                        id="display_to_account_no"> </span>
                                                    <span
                                                        class="font-13 text-primary text-bold display_to_account_country"
                                                        id="display_to_account_country"> </span>




                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Amount:</td>
                                                <td>
                                                    <span class="font-15 text-primary h3 display_currency"
                                                        id="display_currency"> </span>
                                                    &nbsp;
                                                    <span class="font-15 text-primary h3 display_transfer_amount"
                                                        id="display_transfer_amount"></span>

                                                </td>
                                            </tr>


                                            <tr>
                                                <td>Category:</td>
                                                <td>
                                                    <span class="font-13 text-primary h3 display_category"
                                                        id="display_category"></span>

                                                </td>
                                            </tr>


                                            <tr>
                                                <td>Purpose:</td>
                                                <td>
                                                    <span class="font-13 text-primary h3 display_purpose"
                                                        id="display_purpose"></span>
                                                </td>
                                            </tr>




                                            <tr>
                                                <td>Transfer Date: </td>
                                                <td>
                                                    <span class="font-13 text-primary h3"
                                                        id="display_transfer_date">{{ date('d F, Y') }}</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Posted BY: </td>
                                                <td>
                                                    <span class="font-13 text-primary h3"
                                                        id="display_posted_by">{{ session()->get('userAlias') }}</span>
                                                </td>
                                            </tr>

                                            <!-- <tr>
                                                    <td>Enter Pin: </td>
                                                    <td>

                                                        <input type="text" name="user_pin"
                                                            class="form-control key hide_on_print" id="user_pin"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                    </td>
                                                </tr> -->

                                            <tr>

                                                <td colspan="2">

                                                    <div class="alert alert-info form-control col-md-12" role="alert">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="terms_and_conditions" id="terms_and_conditions">
                                                            <label class="custom-control-label "
                                                                for="terms_and_conditions">
                                                                <b>
                                                                    By clicking, you agree with terms and
                                                                    conditions

                                                                </b>
                                                            </label>
                                                        </div>


                                                    </div>
                                                </td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->


                                <!-- Center modal content -->
                                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title text-center text-primary"
                                                    id="myCenterModalLabel ">ENTER TRANSACTION PIN</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>

                                            </div>
                                            <div class="modal-body transfer_pin_modal">

                                                <div class="row">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-9  text-center">
                                                        <form action="#" autocomplete="off" aria-autocomplete="off">
                                                            <input type="text" name="user_pin" maxlength="4"
                                                                class="form-control key hide_on_print" id="user_pin"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <br>
                                                            <button
                                                                class="btn btn-soft-primary waves-effect waves-light"
                                                                type="button" id="transfer_pin"
                                                                data-dismiss="modal">Submit</button>
                                                        </form>

                                                    </div>
                                                    <div class="col-md-1"></div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->



                                <br>
                                <div class="form-group text-center">

                                    <span> <button class="btn btn-secondary btn-rounded" type="button"
                                            id="back_button">Back</button> &nbsp; </span>
                                    <span>
                                        &nbsp;
                                        <button class="btn btn-primary btn-rounded " type="button"
                                            id="confirm_modal_button" data-toggle="modal" data-target="#centermodal">
                                            <span id="confirm_transfer">Confirm Transfer</span>
                                            <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                id="spinner" aria-hidden="true"></span>
                                            <span id="spinner-text">Loading...</span>
                                        </button>
                                    </span>

                                    <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button"
                                            id="print_receipt" onclick="window.print()">Print
                                            Receipt
                                        </button></span>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                    </div>


                    <div class="col-md-7 m-2" id="transaction_form"
                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                        <br><br><br>

                        <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                            aria-autocomplete="none">
                            @csrf
                            <div class="row container">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">

                                    <div class="row mb-2">
                                        <b class="col-md-12 text-primary mb-1">Account from which the money will
                                            be tansfered
                                            &nbsp; <span class="text-danger">*</span> </b>

                                        <select class="form-control" id="from_account" required>
                                            <option value=""> -- Select Your Account -- </option>


                                        </select>


                                    </div>
                                    <hr>
                                    <div class="row mb-2">
                                        <!-- <div class="col-md-4">
                                             <label class="custom-control-label " for="customCheck1"><b class="text-primary">Onetime Transfer </b> </label>
                                            <input type="checkbox" class="custom-control-input"
                                                name="onetime_beneficiary_type" id="customCheck1">


                                                <div class="form-group mb-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="checkmeout0" name="onetime_check" value="CHECKED">
                                                        <label class="custom-control-label" for="checkmeout0"><b class="text-primary">Onetime Transfer </b> </label>
                                                    </div>
                                                </div>

                                        </div> -->
                                        <div class="col-md-12">
                                            <div class="row">
                                                <b class="text-primary col-md-4 bene_details">Beneficiary
                                                    &nbsp;<span class="text-danger">*</span></b>
                                                <select class="form-control col-md-8 bene_details" id="to_account"
                                                    required>
                                                    <option value=""><b>-- Select Beneficiary --</b> </option>
                                                    <!-- <option value="Standard Chartered Bank~Joshua Amarfio~004004110449140121~GHS~800">
                                                Currenct Account ~ 004004110449140121 </option> -->
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <hr>


                                    <div id="saved_benefciary_form">
                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Country</b>
                                            <input class="form-control col-md-8 " type="text"
                                                id="beneficiary_country_name" readonly>
                                        </div>

                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Bank Name</b>
                                            <input class="form-control col-md-8 " type="text" id="beneficiary_bank_name"
                                                readonly>
                                        </div>

                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Swift Code</b>
                                            <input class="form-control col-md-8 " type="text"
                                                id="beneficiary_swift_code" readonly>
                                        </div>

                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Beneficiary Name</b>
                                            <input class="form-control col-md-8 " type="text"
                                                id="beneficiary_account_name" readonly>
                                        </div>

                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Beneficiary Address</b>
                                            <input class="form-control col-md-8 " type="text" id="beneficiary_address"
                                                readonly>
                                        </div>

                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Beneficiary Email</b>
                                            <input class="form-control col-md-8 " type="text" id="beneficiary_email"
                                                readonly>
                                        </div>

                                        <div class="row mb-2">
                                            <b class="text-primary col-md-4">Beneficiary Telephone</b>
                                            <input class="form-control col-md-8 " type="text" id="beneficiary_telephone"
                                                readonly>
                                        </div>
                                        <hr>

                                        <div class="form-group row">

                                            <b class="col-md-4 text-primary"> Transfer Type &nbsp; <span
                                                    class="text-danger">*</span></b>

                                            <div class="row col-md-8 ">

                                                <div
                                                    class="radio radio-primary form-check-inline m-1 col-md-5 transfer_type">
                                                    <input type="radio" id="inlineRadio1" value="NORMAL"
                                                        name="radioInline" checked>
                                                    <label for="inlineRadio1"> Normal </label>
                                                </div>
                                                <div
                                                    class="radio  radio-primary form-check-inline m-1 col-md-5 transfer_type">
                                                    <input type="radio" id="inlineRadio2" value="INVOICE"
                                                        name="radioInline">
                                                    <label for="inlineRadio2"> Invoice</label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group row attach_invoice">
                                            <b class="text-primary col-md-4">Attach Invoice</b>

                                            <div class="custom-file col-md-8 attach_file">
                                                <input type="file" class="custom-file-input"
                                                    id="beneficiary_inputGroupFile04">
                                                <label class="custom-file-label" for="inputGroupFile04">Choose
                                                    file</label>
                                            </div>

                                        </div>
                                        <hr>

                                        <div class="form-group row">

                                            <b class="col-4 text-primary"> Amount &nbsp; <span
                                                    class="text-danger">*</span></b>

                                            <div class="col-2">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend" style="margin-right:-1px;">
                                                        <div class="input-group-text display_from_account_currency">
                                                            USD</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control col-6" id="amount"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                required>


                                        </div>



                                        <div class="form-group row">
                                            <b class="text-primary col-md-4"> Type of Charges &nbsp;<span
                                                    class="text-danger">*</span></b>

                                            <select class="form-control col-md-8 " id="charges_type" required>
                                                <option value=""> -- Select Transfer Mode -- </option>
                                                <option value="001~OUR">OUR</option>
                                                <option value="002~SHARE">SHARE</option>
                                                <option value="003~YOURS">YOURS </option>
                                            </select>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4"></div>
                                            <span class="col-md-8 charges_type_note"><b>Note:</b> &emsp;
                                                <span class="text-danger" id="our_charges_type">Transfer will
                                                    go through Automatic Clearing House</span>
                                                <span class="text-danger" id="share_charges_type">Transfer will
                                                </span>
                                                <span class="text-danger" id="yours_charges_type">Transfer
                                                    will be Instant</span>
                                            </span>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <b class=" col-md-4 text-primary">Expense Category &nbsp; <span
                                                    class="text-danger">*</span></b>


                                            <select class="form-control col-md-8" id="category" required>
                                                <option value="">---Not Selected---</option>

                                            </select>


                                        </div>

                                        <div class="form-group row mb-3">
                                            <b class="col-md-4 text-primary ">Purpose of Transfer &nbsp;
                                                <span class="text-danger">*</span></b>

                                            <input type="text" class="form-control col-md-8" id="purpose"
                                                placeholder="Enter purpose of transaction" required>

                                        </div>

                                        <div class="form-group row mb-2">
                                            <b class="col-md-4 text-primary ">Value Date &nbsp;</b>

                                            <input type="date" class="form-control col-md-8" id="future_payement"
                                                required>

                                        </div>
                                    </div>


                                    <div class="form-group text-right yes_beneficiary">
                                        <button class="btn btn-primary btn-rounded" type="button" id="next_button">
                                            &nbsp; Next &nbsp;<i class="fe-arrow-right"></i> </button>

                                    </div>

                                    <div class="form-group row mb-3 no_beneficiary">
                                        <b class="col-md-4 text-primary ">

                                        </b>
                                        <div class="alert alert-warning form-control col-md-8" role="alert">
                                            <i class="mdi mdi-alert-outline mr-2"></i>
                                            <strong>warning</strong> No
                                            beneficiary
                                            <legend></legend>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>


                        </form>
                    </div>


                    <div class="col-md-4 m-2 d-none d-sm-block" id="related_information_display"
                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                        <br><br>

                        <div class=" col-md-12 card card-body ach_transfer_summary">
                            <div class="row">
                                <h6 class="col-md-5">Account Description:</h6>
                                <span class="text-primary display_from_account_name col-md-7"></span>

                                <h6 class="col-md-5">Account Number:</h6>
                                <span class="text-primary display_from_account_no col-md-7"></span>

                                <h6 class="col-md-5">Available Balance:</h6>

                                <span class="text-primary display_from_account_amount col-md-7"></span>


                                <h6 class="col-md-5">Account Currency:</h6>
                                <span class="text-primary display_from_account_currency col-md-7"></span>

                                <!-- <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_from_account_currency col-md-7"></span> -->

                            </div>

                            <hr>
                            <div class="row">
                                <h6 class="col-md-5">Receiver Name:</h6>
                                <h6 class="text-primary display_to_account_name col-md-7"></h6>

                                <h6 class="col-md-5">Bank Name:</h6>
                                <h6 class="text-primary display_to_bank_name col-md-7"></h6>

                                <h6 class="col-md-5">Receiver Account:</h6>
                                <h6 class="text-primary display_to_account_no col-md-7"></h6>

                                <h6 class="col-md-5">Account Currency:</h6>
                                <h6 class="text-primary display_to_account_currency col-md-7"></h6>
                            </div>
                            <br>
                            <!-- <button type="button"
                                            class="btn btn-warning btn-xs waves-effect waves-light beneficiary_details col-md-3 text-primary"
                                            data-toggle="modal" data-target="#standard-modal">
                                            More Info</button> -->
                            <hr style="margin-top: 2px; margin-bottom: 5px; ">

                            <div class="row">
                                <h6 class="text-primary col-md-5">Transfer Amount:</h6>
                                <h6 class="text-danger text-bold col-md-7 ">
                                    <span class="display_currency"></span>
                                    &nbsp;
                                    <span class="display_transfer_amount"></span>
                                </h6>
                            </div>
                            <hr style="margin-top: 2px; margin-bottom: 5px; ">

                            <div class="row">
                                <h6 class="text-primary col-md-5">Transaction Fee:</h6>
                                <!-- <h6 class="text-danger text-bold col-md-7">0.08% of transfer amount</h6> -->
                            </div>

                            <hr>
                            <div class="row">
                                <h6 class="text-primary col-md-5">Please Note:</h6>
                                <!-- <h6 class="text-danger col-md-7">ACH Tranfers should be above (SLL
                                                30,000,000.00)</h6> -->
                            </div>


                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')

<script src={{ asset("assets/js/pages/transfer/internationalBank.js") }}></script>
@endsection --}}