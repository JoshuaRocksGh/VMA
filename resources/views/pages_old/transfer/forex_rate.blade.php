@extends('layouts.master')

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
            src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    NEW FOREX REQUEST

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">New Forex Request</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- start page title -->

                            <div class="receipt">
                                <div class="container card card-body">

                                    <div class="container">
                                        <div class="">
                                            <div class="col-md-12 col-md-offset-3 body-main">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4 "> <img class="img " alt="InvoIce Template"
                                                                src="{{ asset('assets/images/' . env('APPLICATION_INFO_LOGO_LIGHT')) }} "
                                                                style="zoom: 0.6" /> </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4 text-right">
                                                            <h4 class="text-primary"><strong>ROKEL COMMERCIAL BANK</strong>
                                                            </h4>
                                                            <p>25-27 Siaka Stevens St</p>
                                                            <p> Freetown, Sierra Leone</p>
                                                            <p>rokelsl@rokelbank.sl</p>
                                                            <p>(+232)-76-22-25-01</p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="page-header">
                                                        <h2>Transfer Receipt </h2>
                                                    </div>
                                                    <br>
                                                    {{-- <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <h2>INVOICE</h2>
                                                            <h5>04854654101</h5>
                                                        </div>
                                                    </div> --}}
                                                    <br />
                                                    {{-- <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th><h5>Description</h5></th>
                                                                    <th><h5>Further Details</h5></th>
                                                                    <th><h5>Amount</h5></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-9">
                                                                        From Account Number<br>
                                                                        004004110449140121
                                                                    </td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 50,000 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9">
                                                                        To Account Number<br>
                                                                        004004110445350137
                                                                    </td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 5,200 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9">Category Type</td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 25,000 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9">Purpose of Transfer</td>
                                                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i> 2,200 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-9"> Transfer Amount</td>
                                                                    <td class="text-right">
                                                                        <p> <strong>Shipment and Taxes:</strong> </p>
                                                                        <p> <strong>Total Amount: </strong> </p>
                                                                        <p> <strong>Discount: </strong> </p>
                                                                        <p> <strong>Payable Amount: </strong> </p>
                                                                    </td>
                                                                    <td>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 </strong> </p>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 82,900</strong> </p>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 3,000 </strong> </p>
                                                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900</strong> </p>
                                                                    </td>
                                                                </tr>
                                                                <tr style="color: #F81D2D;">
                                                                    <td class="text-right">
                                                                        <h4><strong>Total:</strong></h4>
                                                                    </td>
                                                                    <td class="text-left">
                                                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> 79,900 </strong></h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> --}}
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    {{-- <th>#</th> --}}
                                                                    <th>Description</th>
                                                                    <th>Further Details</th>
                                                                    {{--  <th>Amount (<span id="receipt_currency"></span>)</th>  --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    {{-- <th scope="row">1</th> --}}
                                                                    <td>Transfer From Account Number</td>
                                                                    <td><span id="from_account_receipt"></span></td>
                                                                    {{--  <td></td>  --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">2</th> --}}
                                                                    <td>Transfer To Account Number</td>
                                                                    <td><span id="to_account_receipt"></span></td>
                                                                    {{--  <td></td>  --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Transfer Category</td>
                                                                    <td><span id="category_receipt"></span></td>
                                                                    {{--  <td></td>  --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Transfer Purpose</td>
                                                                    <td><span id="purpose_receipt"></span></td>
                                                                    {{--  <td></td>  --}}
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Amount</td>
                                                                    {{--  <td></td>  --}}
                                                                    <td><strong>(<span
                                                                                class="receipt_currency"></span>)<span
                                                                                id="amount_receipt"></span></strong>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td>Transaction Fee </td>
                                                                    {{--  <td></td>  --}}
                                                                    <td><strong>(<span
                                                                                class="receipt_currency"></span>)15.00</strong>
                                                                    </td>
                                                                </tr>
                                                                {{--  <tr>
                                                                    <th scope="row">3</th>
                                                                    <td><strong>Total Amount</strong> </td>
                                                                    <td></td>
                                                                    <td><strong><span
                                                                                id="total_amount_receipt"></span></strong>
                                                                    </td>
                                                                </tr>  --}}
                                                                <tr>
                                                                    {{-- <th scope="row">3</th> --}}
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> <!-- end table-responsive-->
                                                    <br>
                                                    <div>
                                                        <div class="col-md-12">
                                                            <p><b>Date Posted :</b> {{ date('d F, Y') }}</p> <br /> <br />
                                                            <p><b>Posted By : {{ session('userId') }}</b></p>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="row">
                                                        <div class="col-md-5"></div>
                                                        <div class="col-md-2">
                                                            <button
                                                                class="btn btn-light btn-rounded hide_on_print text-center"
                                                                type="button" onclick="window.print()">Print
                                                                Receipt
                                                            </button>


                                                        </div>
                                                        <div class="col-md-5"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form_process">
                                <div class="row">

                                    <div class="col-md-7 m-2" id="transaction_summary"
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
                                                                    {{-- <span class="font-13 text-primary text-bold display_from_account_type"
                                                                        id="display_from_account_type"></span> --}}
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

                                                                    {{-- <span class="font-13 text-primary text-bold display_to_account_type"
                                                                        id="display_to_account_type"> </span> --}}
                                                                    <span
                                                                        class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                        id="display_to_account_name"> </span>
                                                                    {{-- <span class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                                                        id="online_display_beneficiary_bank_name"></span> --}}
                                                                    <span
                                                                        class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                        id="display_to_account_no"> </span>

                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td>Amount:</td>
                                                                <td>
                                                                    <span class="font-15 text-primary h3 display_currency"
                                                                        id="display_currency"> </span>
                                                                    &nbsp;
                                                                    <span
                                                                        class="font-15 text-primary h3 display_transfer_amount"
                                                                        id="display_transfer_amount"></span>

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
                                                                <td>Category:</td>
                                                                <td>
                                                                    <span class="font-13 text-primary h3 display_category"
                                                                        id="display_category"></span>

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

                                                            {{-- <tr>
                                                            <td>Enter Pin: </td>
                                                            <td>

                                                                <input type="text" name="user_pin"
                                                                    class="form-control key hide_on_print" id="user_pin"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                            </td>
                                                        </tr> --}}

                                                            <tr>

                                                                <td colspan="2">

                                                                    <div class="alert alert-info form-control col-md-12"
                                                                        role="alert">
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                name="terms_and_conditions"
                                                                                name="terms_and_conditions"
                                                                                id="terms_and_conditions">
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
                                                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center ">
                                                                <h3 class="modal-title text-primary"
                                                                    id="myCenterModalLabel ">ENTER TRANSACTION PIN</h3>

                                                                {{--  <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">×</button>  --}}

                                                            </div>
                                                            <div class="modal-body transfer_pin_modal">

                                                                <div class="row">
                                                                    <div class="col-md-2"></div>
                                                                    <div class="col-md-9  text-center">
                                                                        <form action="#" autocomplete="off"
                                                                            aria-autocomplete="off">
                                                                            <input type="text" name="user_pin"
                                                                                maxlength="4"
                                                                                class="form-control key hide_on_print"
                                                                                id="user_pin"
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
                                                            id="back_button"> <i
                                                                class="fe-arrow-left"></i>&nbsp;Back</button> &nbsp;
                                                    </span>
                                                    <span>
                                                        &nbsp;
                                                        <button class="btn btn-primary btn-rounded " type="button"
                                                            id="confirm_modal_button" data-toggle="modal"
                                                            data-target="#centermodal">
                                                            <span id="confirm_transfer">Confirm Transfer</span>
                                                            <span class="spinner-border spinner-border-sm mr-1"
                                                                role="status" id="spinner" aria-hidden="true"></span>
                                                            <span id="spinner-text">Loading...</span>
                                                        </button>
                                                    </span>

                                                    <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                            type="button" id="print_receipt"
                                                            onclick="window.print()">Print
                                                            Receipt
                                                        </button></span>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>

                                    </div>


                                    <div class="col-md-7 m-2" id="transaction_form"
                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">

                                        <div class=" container">



                                            <form action="#" id="payment_details_form" autocomplete="off"
                                                aria-autocomplete="off">
                                                @csrf
                                                <div class="col-md-12">
                                                    <br><br><br>
                                                    <div class="row">


                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-10">

                                                            <div class="form-group row ">
                                                                <b class="col-md-12 text-primary mb-1">Account from which
                                                                    the money will
                                                                    be tansfered
                                                                    &nbsp; <span class="text-danger">*</span> </b>
                                                                <select class="form-control col-md-12 mb-2"
                                                                    id="from_account" required>
                                                                    <option value="">Select Account</option>

                                                                    {{-- <option value="Saving Account~kwabeane Ampah~001023468976001~GHS~2000">
                                                                Saving Account~001023468976001~GHS~2000
                                                             </option> --}}

                                                                </select>

                                                            </div>
                                                            <legend></legend>

                                                            <div class="form-group row">
                                                                <b class="col-md-12"><b class="text-primary">Account which
                                                                        will receive the money
                                                                        &nbsp;</b><span class="text-danger">*</span></b>
                                                                <select class="form-control col-md-12 mb-2"
                                                                    id="to_account" required>
                                                                    <option value="">Select Account</option>

                                                                </select>
                                                            </div>

                                                            <legend></legend>



                                                            <div class="form-group row">

                                                                <b class="col-md-4 text-primary">Actual Amount &nbsp; <span
                                                                        class="text-danger">*</span></b>

                                                                <div class="input-group mb-3 col-8" style="padding: 0px;">
                                                                    <div class="input-group-prepend">
                                                                        <input type="text"
                                                                            class="input-group-text select_currency"
                                                                            id="select_currency" style="width: 80px;"
                                                                            readonly>
                                                                        {{-- <select name="" class="input-group-text select_currency" id="select_currency">
                                                                                 </select> --}}
                                                                    </div>

                                                                    &nbsp;&nbsp;
                                                                    <input type="text" class="form-control "
                                                                        id="amount" placeholder="Enter Amount"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        required>
                                                                </div>


                                                            </div>

                                                            <div class="form-group row">

                                                                <b class="col-4 text-primary"> Cur / Rate / Converted
                                                                    Amount</b>

                                                                <div class="input-group mb-3 col-8" style="padding: 0px;">
                                                                    <div class="input-group-prepend">
                                                                        <select name=""
                                                                            class="input-group-text select_currency"
                                                                            id="select_currency__">
                                                                            {{-- <option value="SLL" selected>SLL</option>
                                                                            <option value="EUR">EURO</option>
                                                                            <option value="USD">USD</option> --}}
                                                                        </select>
                                                                    </div>
                                                                    &nbsp;&nbsp;
                                                                    <div class="input-group-prepend">
                                                                        <input type="text"
                                                                            class="form-control readOnly "
                                                                            id="convertor_rate" placeholder="0.00"
                                                                            style="width: 100px;">
                                                                    </div>
                                                                    &nbsp;&nbsp;
                                                                    <input type="text" class="form-control"
                                                                        id="converted_amount"
                                                                        placeholder="Converted Amount"
                                                                        aria-label="Converted Amount"
                                                                        aria-describedby="basic-addon1">
                                                                </div>


                                                            </div>

                                                            <div class="form-group text-right m-2">
                                                                <button class="btn btn-primary btn-rounded" type="submit"
                                                                    id="next_button">
                                                                    &nbsp; Next &nbsp;<i class="fe-arrow-right"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-1"></div>



                                                    </div>
                                                </div>

                                            </form>


                                        </div>


                                    </div>

                                    <div class="col-md-4 m-2 d-none d-sm-block" id="related_information_display"
                                        style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230));">
                                        <br><br>

                                        <div class="col-md-12 card card-body rtgs_transfer_summary">
                                            <div class="row">
                                                <p class="col-md-5">Account Description:</p>
                                                <span class="text-primary display_from_account_name col-md-7"></span>

                                                <p class="col-md-5">Account Number:</p>
                                                <span class="text-primary display_from_account_no col-md-7"></span>

                                                <p class="col-md-5">Available Balance:</p>

                                                <span class="text-primary display_from_account_amount col-md-7"></span>


                                                <p class="col-md-5">Account Currency:</p>
                                                <span class="text-primary display_from_account_currency col-md-7"></span>

                                                {{-- <h6 class="col-md-5">Account Currency:</h6>
                                                <span class="text-primary display_from_account_currency col-md-7"></span> --}}
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <p class="col-md-5">Account Number:</p>
                                                <p class="text-primary display_to_account_no col-md-7"></p>

                                                <p class="col-md-5">Account Balance:</p>
                                                <p class="text-primary display_to_account_amount col-md-7"></p>

                                                <p class="col-md-5">Account Currency:</p>
                                                <p class="text-primary display_to_account_currency col-md-7"></p>
                                            </div>

                                            <hr>
                                            <div class="row">
                                                <p class="text-primary col-md-5">Transfer Amount:</p>
                                                <h4 class="text-danger text-bold col-md-7 ">
                                                    <span class="display_from_account_currency"></span>
                                                    &nbsp;
                                                    <b style="font-style: 16px"><span
                                                            class="display_transfer_amount"></span></b>
                                                </h4>
                                            </div>
                                            <div class="row">

                                                {{--  <h6 class="col-md-5">Enter Amount:</h6>
                                                <span class="text-primary display_amount col-md-7"></span>  --}}

                                                <h6 class="col-md-5">Currency Rate:</h6>
                                                <span class="text-primary display_midrate col-md-7"></span>

                                                <h6 class="col-md-5">Converted Amount:</h6>
                                                <span class="text-primary display_converted_amount col-md-7"></span>
                                            </div>

                                            {{--  <hr>  --}}


                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>

                        <div class="">

                            {{-- <table
                            class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                            <tbody class="">
                                <tr>

                                    <td>
                                        <a
                                            class="text-body font-weight-semibold display_from_account_name"></a>
                                        <small class="d-block display_from_account_no"></small>
                                    </td>

                                    <td class="text-right font-weight-semibold">
                                        <span class="display_from_account_currency"></span>
                                        <span class="display_from_account_amount"></span>

                                    </td>
                                </tr>


                            </tbody>
                        </table> --}}
                        </div>



                        <div class="">
                            <div class="form-group">





                                {{-- <table
                                class="table-responsive table table-centered table-nowrap mb-0 to_account_display_info card">
                                <tbody>
                                    <tr>

                                        <td>
                                            <a
                                                class="text-body font-weight-semibold display_to_account_type"></a>
                                            <small class="d-block display_to_account_name"></small>
                                            <small class="d-block display_to_account_no"></small>
                                        </td>

                                        <td class="text-right font-weight-semibold">
                                            {{-- <span class="display_to_account_currency"></span> --}}
                                {{-- <span class="display_to_account_amount"></span> --}}

                                </td>
                                </tr>


                                </tbody>
                                </table>


                            </div>





                            {{-- <img src="{{ asset("land_asset/images/own-account-img.PNG") }}" /> --}}

                            {{-- <img src="{{ asset('assets/images/wallet1.jpg') }}" class="img-fluid" alt="" style="opacity: 0.5"> --}}


                        </div> <!-- end col -->


                        <!-- end row -->



                        <div class="col-md-8  card-body">
                            {{-- <h3 class=" m-t-0 text-primary">OWN ACCOUNT TRANSFER</h3>s --}}
                            <hr>



                            {{-- <div class="row" id="transaction_summary">


                                <div class="col-md-12">
                                    <div class="border card p-3 mt-4 mt-lg-0 rounded">
                                        <h4 class="header-title mb-3">Transfer Detail Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped">

                                                <tbody>
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
                                                                class="font-13 text-primary text-bold display_to_account_type"
                                                                id="display_to_account_type"> </span>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                id="display_to_account_name"> </span>
                                                            <span
                                                                class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                id="display_to_account_no"> </span>
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
                                                        <td>Schedule Payment:</td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_schedule_payment"
                                                                id="display_schedule_payment">NO </span>
                                                            &nbsp;
                                                            <span
                                                                class="font-13 text-primary h3 display_schedule_payment_date"
                                                                id="display_schedule_payment_date"> N/A

                                                            </span>
                                                            &nbsp;

                                                            <span class="font-13 text-primary h3 display_frequency"
                                                                id="display_frequency">

                                                            </span>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Payment Frequency: </td>
                                                        <td>
                                                            <span class="font-13 text-primary h3 display_frequency"
                                                                id="display_frequency"></span>
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
                                                        <td>Posted By: </td>
                                                        <td>
                                                            <span class="font-13 text-primary h3"
                                                                id="display_posted_by">Kwabena
                                                                Ampah</span>
                                                        </td>
                                                    </tr>

                                                    <tr class="hide_on_print">
                                                        <td>Enter Pin: </td>
                                                        <td>

                                                            <input type="text" name="user_pin" class="form-control key"
                                                                id="user_pin"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                        <br>
                                        <div class="form-group text-center">
                                            <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                    id="back_button">Back</button> &nbsp; </span>
                                            <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                                    id="confirm_button"><span id="confirm_transfer">Confirm Transfer</span>
                                                    <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                        id="spinner" aria-hidden="true"></span>
                                                    <span id="spinner-text">Loading...</span>
                                                </button></span>
                                            <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                    type="button" id="print_receipt" onclick="window.print()">Print Receipt
                                                </button></span>
                                        </div>
                                    </div>

                                </div> <!-- end col -->





                            </div> --}}



                        </div>

                        <div class="col-md-2"></div>

                    </div> <!-- end card-body -->


                    <!-- Modal -->
                    <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                            Details</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>

                                    <div class="modal-body">

                                        From: <span class="font-13 text-primary" id="display_from_account"> &nbsp
                                        </span><br><br>
                                        To: <span class="font-13 text-muted" id="display_to_account"> &nbsp
                                        </span><br><br>
                                        Schedule Payments: <span class="font-13 text-muted" id="display_payments"> &nbsp
                                        </span><br><br>
                                        Amount: <span class="font-13 text-muted" id="display_amount"> &nbsp
                                        </span><br><br>
                                        Naration: <span class="font-13 text-muted" id="display_naration"> &nbsp
                                        </span><br><br>
                                        Transaction fee: <span class="font-13 text-muted" id="display_trasaction_fee">
                                        </span><br><br>
                                        Total: <span class="font-13 text-muted" id="display_total"> &nbsp </span><br><br>

                                        <div class="form-group">
                                            <label class="font-16 purple-color">Enter Pin</label>
                                            <input type="text" class="form-control" id="pin"
                                                data-toggle="input-mask" placeholder="enter pin" required
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                                        </div>

                                    </div>



                                    <div class="modal-footer">
                                        <button type="send" id="send" class="btn btn-primary"
                                            data-target="#multiple-two" data-toggle="modal"
                                            data-dismiss="modal">Send</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->




                </div> <!-- end col -->

            </div> <!-- end row -->



        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            function from_account() {
                $.ajax({
                    type: 'GET',
                    url: 'get-my-account',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('#from_account').append($('<option>', {
                                value: data[index].accountType + '~' + data[index]
                                    .accountDesc + '~' + data[index].accountNumber + '~' +
                                    data[index].currency + '~' + data[index]
                                    .availableBalance
                            }).text(data[index].accountNumber +
                                '~' + data[index].currency + ' ~ ' + formatToCurrency(parseFloat(
                                    data[index].availableBalance))
                            ));
                            $('#to_account').append($('<option>', {
                                value: data[index].accountType + ' ~ ' + data[index]
                                    .accountDesc + '~' + data[index]
                                    .accountNumber + '~' + data[index].currency + '~' +
                                    data[index].availableBalance
                            }).text(data[index].accountNumber +
                                '~' + data[index].currency + '~' + formatToCurrency(parseFloat(data[
                                    index].availableBalance))
                            ));

                        });
                    },

                })
            }

            function expenseTypes() {
                $.ajax({
                    "type": "GET",
                    "url": "get-expenses",
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data;

                        $.each(data, function(index) {

                            $("#category").append($('<option>', {
                                value: data[index].expenseCode + '~' + data[index]
                                    .expenseName
                            }).text(data[index].expenseName))

                        });
                    },
                })
            }

            var _cur_ = []
            var get_cur_1 = []
            var get_cur_2 = []

            function get_currency() {
                {{-- let name = $("#hidden_currency").val();
                console.log(name); --}}
                $.ajax({
                    "type": "GET",
                    "url": "get-currency-list-api",
                    datatype: "application/json",
                    success: function(response) {
                        {{-- console.log(response); --}}

                        let data = response.data


                        _cur_ = data
                        get_cur_1 = data
                        get_cur_2 = data

                        console.log(data);
                        $.each(data, function(index) {
                            $('#select_currency__').append($('<option>', {
                                value: data[index].isoCode
                            }).text(data[index].isoCode));
                        })

                        $('#select_currency__ option').each(function() {
                            if ($(this).val() == 'SLL') {
                                $(this).prop("selected", true);
                            } else {

                            }
                        });

                    }
                })
            }


            var forex_rate = []
            var cur_1 = "SLL"
            var cur_2 = "SLL"

            function get_correct_fx_rate() {


                $.ajax({
                    type: 'GET',
                    url: 'get-correct-fx-rate-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data


                        if (response.responseCode == '000') {
                            forex_rate = response.data
                            console.log(forex_rate)
                        } else {

                        }



                    },
                    error: function(xhr, status, error) {

                    }

                })
            };


            $(document).ready(function() {

                $("#transaction_summary").hide();
                $(".success_gif").hide();
                $('#spinner').hide(),
                    $('#spinner-text').hide(),
                    $('#print_receipt').hide();
                $(".receipt").hide();



                setTimeout(function() {
                    from_account();
                    expenseTypes();
                    get_currency();
                    get_correct_fx_rate();

                }, 200);



                var now = new Date();

                var day = ("0" + now.getDate()).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);

                var today = now.getFullYear() + "-" + (month) + "-" + (day);
                {{--  $( "#future_payment" ).datepicker({ minDate: 0});  --}}


                $('#future_payment').text(today).datepicker("setDate", new Date());

                {{-- $( "#future_date" ).datepicker({ defaultDate: new Date() }); --}}

                function sweet_alert() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: false,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: 'Can not send to same account'
                    })
                }

                {{-- hide select accounts info --}}
                $(".from_account_display_info").hide()
                $(".to_account_display_info").hide()
                $("#schedule_payment_date").hide()
                $("#frequency").hide()
                $('#schedule_payment_contraint_input').hide()
                $('.display_schedule_payment_date').text('N/A')

                $("#transaction_form").show()
                $("#transaction_summary").hide()

                $("#future_payment").datepicker();

                {{-- $("#next_button").click(function(e) {
                    e.preventDefault()
                    $("#transaction_form").hide()
                    $("#transaction_summary").show()
                }) --}}

                $("#back_button").click(function(e) {
                    e.preventDefault()
                    $("#transaction_summary").hide()
                    $("#transaction_form").show()

                })

                {{-- Event on From Account field --}}

                var amt = 0

                $("#from_account").change(function() {
                    var from_account = $(this).val();
                    {{-- alert(from_account) --}}
                    if (from_account.trim() == '' || from_account.trim() == undefined) {
                        {{-- alert('money') --}}
                        $(".from_account_display_info").hide()

                    } else {
                        from_account_info = from_account.split("~")
                        console.log(from_account_info);

                        // Sweet alert function



                        var to_account = $('#to_account').val()

                        if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
                            to_account.trim() != '') {
                            {{-- alert('can not transfer to same account') --}}

                            toaster('Can not send to same account', 'error', 10000)
                            $(this).val('')
                        }

                        // set summary values for display
                        $(".display_from_account_type").text(from_account_info[0])
                        $(".display_from_account_name").text(from_account_info[1])
                        $(".display_from_account_no").text(from_account_info[2])
                        $(".display_from_account_currency").text(from_account_info[3])
                        $('#select_currency').val(from_account_info[3])
                        $(".display_currency").text(from_account_info[3]) // set summary currency

                        amt = from_account_info[4].trim()

                        $(".display_from_account_amount").text(formatToCurrency(Parse(from_account_info[4]
                            .trim())))
                        {{-- alert('and show' + from_account_info[3].trim()) --}}
                        $(".from_account_display_info").show()
                    }


                    {{-- alert(from_account_info[0]); --}}
                });


                $("#to_account").change(function() {
                    var to_account = $(this).val()
                    {{-- console.log(to_account); --}}
                    {{-- alert(to_account) --}}
                    if (to_account.trim() == '' || to_account.trim() == undefined) {
                        {{-- alert('money') --}}
                        $(".to_account_display_info").hide()

                    } else {
                        to_account_info = to_account.split("~")
                        console.log(to_account_info);

                        var from_account = $('#from_account').val()

                        if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
                            to_account.trim() != '') {
                            {{-- alert('can not transfer to same account') --}}
                            $(this).val('')
                        }

                        // set summary values for display
                        $(".display_to_account_type").text(to_account_info[0])
                        $(".display_to_account_name").text(to_account_info[1])
                        $(".display_to_account_no").text(to_account_info[2])
                        $(".display_to_account_amount").text(to_account_info[4])
                        $(".display_to_account_currency").text(to_account_info[3])
                        // alert(to_account_info[0].trim())
                        //$(".display_to_account_amount").text(formatToCurrency(parseFloat(to_account_info[4].trim())))

                        $(".to_account_display_info").show()
                    }




                    {{-- alert(to_account_info[0]); --}}
                });



                function currency_convertor(forex_rate) {
                    let amount = $("#amount").val()
                    let convert_amount_currency = $('#select_currency__').val()
                    let converted_amount = ''

                    cur_1 = $('#select_currency').val()
                    cur_2 = $('#select_currency__').val()

                    if (cur_1 == "SLL") {

                    } else {

                    }

                    let currency_pair_1 = cur_1 + '/ ' + cur_2
                    let currency_pair_2 = cur_2 + '/ ' + cur_1

                    let to_local_currency = cur_1 + '/ SLL'
                    let local_currency = ''


                    console.log(currency_pair_1)
                    console.log(currency_pair_2)
                    console.log(forex_rate)

                    $('#converted_amount').val('')
                    $('#convertor_rate').val('')


                    if (forex_rate.length > 0) {
                        $.each(forex_rate, function(index) {

                            if (String(forex_rate[index].PAIR.trim()) == String(to_local_currency.trim())) {
                                local_currency = parseFloat(amount) / parseFloat(forex_rate[index].MIDRATE)

                            }



                            if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_1.trim())) {

                                converted_amount = parseFloat(amount) * parseFloat(forex_rate[index].MIDRATE)
                                $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[index].MIDRATE
                                    .toFixed(2))))
                                $('.display_midrate').text(currency_pair_1.trim() + ' => ' + formatToCurrency(
                                    parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
                                $('#converted_amount').val(formatToCurrency(parseFloat(converted_amount.toFixed(
                                    2))))
                                $('.display_converted_amount').text(convert_amount_currency + ' ' +
                                    formatToCurrency(parseFloat(converted_amount.toFixed(2))))
                                console.log(`match 1 => ${converted_amount}`)
                                console.log(parseFloat(forex_rate[index].MIDRATE))

                            } else if (String(forex_rate[index].PAIR.trim()) == String(currency_pair_2
                            .trim())) {

                                $('#convertor_rate').val(formatToCurrency(parseFloat(forex_rate[index].MIDRATE
                                    .toFixed(2))))
                                $('.display_midrate').text(currency_pair_2.trim() + ' => ' + formatToCurrency(
                                    parseFloat(forex_rate[index].MIDRATE.toFixed(2))))
                                converted_amount = parseFloat(amount) / parseFloat(forex_rate[index].MIDRATE)
                                $('#converted_amount').val(formatToCurrency(parseFloat(converted_amount.toFixed(
                                    2))))
                                $('.display_converted_amount').text(convert_amount_currency + ' ' +
                                    formatToCurrency(parseFloat(converted_amount.toFixed(2))))
                                console.log(`match 2 => ${converted_amount}`)
                                console.log(parseFloat(forex_rate[index].MIDRATE))

                            } else {

                            }
                        })
                    }
                }

                $("#select_currency__").change(function() {
                    {{-- let select_cur_1 = $(this).val()
                        alert(select_cur_1)

                        get_cur_1 = _cur_
                        get_cur_2 = _cur_

                        console.log(get_cur_1)


                            for (let index = 0; index < get_cur_1.length; index++) {
                            console.log(get_cur_1[index].isoCode + ' - index: ' + index)
                            if(String(get_cur_1[index].isoCode) === String(select_cur_1)){
                               console.log("kkkkkkk")
                               if(get_cur_2.splice(index, 1)){

                                break;
                               }

                            }

                            $('#select_currency__').empty().append($('<option>', {
                                value: get_cur_2[index].isoCode
                            }).text(get_cur_2[index].isoCode));

                        }

                        console.log('-----------------')
                        console.log(get_cur_2)
                         console.log('-----------------')

                        return false; --}}

                    currency_convertor(forex_rate)
                })

                $("#select_currency__").change(function() {
                    currency_convertor(forex_rate)
                })



                $("#amount").keyup(function() {
                    var from_account = $('#from_account').val()
                    var to_account = $('#to_account').val()
                    console.log(forex_rate)
                    currency_convertor(forex_rate);


                    if (from_account.trim() == '' || to_account.trim() == '') {

                        toaster('Please select source and destination accounts', 'error', 10000)
                        $(this).val('')
                        return false;
                    } else {
                        var transfer_amount = $(this).val()
                        if (parseFloat(amt) < parseFloat(transfer_amount)) {
                            toaster('Insufficient account balance', 'error', 10000)
                            return false
                        } else {
                            $(".display_transfer_amount").text(formatToCurrency(parseFloat(transfer_amount)));
                        }

                    }

                    let amount = $("#amount").val()
                    $('.display_transfer_amount').text(formatToCurrency(parseFloat(amount)))

                });


                function formatToCurrency(amount) {
                    return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
                };


                // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
                $("input:checkbox").on("change", function() {
                    if ($(this).is(":checked")) {
                        {{-- console.log("Checkbox Checked!"); --}}
                        $("#schedule_payment_date").show()
                        $("#frequency").show()
                        $(".display_schedule_payment").text('YES')
                        $('#schedule_payment_contraint_input').val('TRUE')

                    } else {
                        {{-- console.log("Checkbox UnChecked!"); --}}
                        $("#schedule_payment_date").val('')
                        $("#schedule_payment_date").hide()
                        $("#frequency").hide()
                        $('.display_schedule_payment').text('NO')
                        $('.display_schedule_payment_date').text('N/A')

                        $('#schedule_payment_contraint_input').val('')
                        $('#schedule_payment_contraint_input').hide()
                        $('#schedule_payment_date').val('')
                    }
                });


                {{-- $("#transaction_form").click(function() {}) --}}

                {{-- $("#next_button").click(function() {

                    $("#transaction_summary").show();
                    $("#transaction_form").hide();

                    var t =  $("#schedule_payment_date").val()
                    alert(t)
                    return false;
                    var from_account_ = $('#from_account').val().split("~");
                    var from_account = $('#from_account');

                    var to_account_ = $('#to_account').val().split('~');
                    var to_account = $('#to_account').val();

                    var transfer_amount = $('#amount').val();

                    var category = $('#category').val().split("~");
                    $("#display_category").text(category[1]);

                    var select_frequency_ = $('#select_frequency').val()
                    var purpose = $('#purpose').val();
                    $("#display_purpose").text(purpose);

                    var schedule_payment_contraint_input = $('#schedule_payment_contraint_input').val();

                    var schedule_payment_date = $('#schedule_payment_date').val();

                    var schdule_pay = $("#customCheck1 input[type='checkbox']:checked").val();
                    console.log(schdule_pay);


                    if (from_account_[2] == to_account_[1]) {

                        toaster('Can not send to same account', 'error', 10000)
                        return false;
                    }


                    if (parseFloat(amt) < parseFloat(transfer_amount)) {
                        toaster('Insufficient account balance', 'error', 10000)
                        return false
                    }

                    if (schedule_payment_contraint_input.trim() != '' && schedule_payment_date.trim() ==
                        '') {
                        $('.display_schedule_payment_date').text('N/A') // shedule date NULL
                        toaster('Select schedule date for subsequent transfers', 'error', 10000)
                        alert('Select schedule date for subsequent transfers')
                        return false;
                    }


                    $('.display_schedule_payment_date').text('| ' + schedule_payment_date)


                    if (from_account.trim() == '' || to_account.trim() == '' || transfer_amount.trim() ==
                        '' || category.trim() == '' || purpose.trim() == '') {
                        alert('Field must not be empty')
                        toaster('Field must not be empty', 'error', 10000)
                        return false
                    } else {
                        //set purpose and category values
                        var category_info = category.split("~")

                        var select_frequency_info = select_frequency_.split("~")

                        $("#display_category").text(category_info[1])
                        $("#display_frequency").text(select_frequency_info[1])
                        $("#display_purpose").text(purpose)

                        $("#transaction_form").hide()
                        $("#transaction_summary").show()
                    }

                }); --}}

                $("#payment_details_form").submit(function(e) {
                    e.preventDefault();

                    var from_account_ = $('#from_account').val().split("~");
                    console.log(from_account_);
                    var from_account = from_account_[2];

                    var to_account_ = $('#to_account').val().split('~');
                    console.log(to_account_);
                    var to_account = to_account_[2];

                    var transfer_amount = $('#amount').val();

                    var category = $('#category').val().split("~");
                    $("#display_category").text(category[1]);

                    var purpose = $('#purpose').val();
                    $("#display_purpose").text(purpose);

                    var schedule_payment_contraint_input = $('#schedule_payment_contraint_input').val();

                    var schedule_payment_date = $('#schedule_payment_date').val();

                    var select_frequency_ = $('#select_frequency').val();

                    $("#transaction_summary").show();
                    $("#transaction_form").hide();

                    {{--  if (from_account == '' || to_account == '' || transfer_amount == '' ||
                        category == '' || purpose == '') {
                        alert('Field must not be empty')
                        toaster('Field must not be empty', 'error', 10000)
                        return false
                    } else {
                        $("#transaction_summary").show();
                        $("#transaction_form").hide();
                    }  --}}
                })




                function toaster(message, icon, timer) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: timer,
                        timerProgressBar: false,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: icon,
                        title: message
                    })
                }


                // SUBMIT TO API

                $('#confirm_modal_button').click(function(e) {
                    e.preventDefault();

                    if ($("#terms_and_conditions").is(":checked")) {

                        $("#transfer_pin").click(function(e) {
                            e.preventDefault();

                            $('#confirm_transfer').hide()
                            $('#spinner').show();
                            $('#spinner-text').show();
                            $("#confirm_modal_button").prop('disabled', true);


                            var from_account_ = $('#from_account').val().split("~");
                            console.log(from_account_);
                            var from_account = from_account_[2];
                            $("#from_account_receipt").text(from_account);

                            var to_account_ = $('#to_account').val().split('~');
                            console.log(to_account_);
                            var to_account = to_account_[2];
                            $("#to_account_receipt").text(to_account);


                            var transfer_amount = $('#amount').val();
                            $("#amount_receipt").text(formatToCurrency(parseFloat(transfer_amount)));

                            var select_currency = $("#select_currency").val();
                            $(".receipt_currency").text(select_currency);


                            // var category = $('#category').val().split("~");
                            // $("#display_category").text(category[1]);
                            // $("#category_receipt").text(category[1]);

                            // var purpose = $('#purpose').val();
                            // $("#display_purpose").text(purpose);
                            // $("#purpose_receipt").text(purpose);

                            var schedule_payment_contraint_input = $(
                                '#schedule_payment_contraint_input').val();




                            var schedule_payment_date = $('#schedule_payment_date').val();

                            var select_frequency_ = $('#select_frequency').val();

                            var sec_pin = $('#user_pin').val();


                            $.ajax({

                                type: 'POST',
                                url: 'own-account-api',
                                datatype: "application/json",
                                data: {
                                    'from_account': from_account,
                                    'to_account': to_account,
                                    'transfer_amount': transfer_amount,
                                    'category': category,
                                    'purpose': purpose,
                                    'schedule_payment_type': schedule_payment_contraint_input,
                                    'schedule_payment_date': schedule_payment_date,
                                    'secPin': sec_pin

                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                success: function(response) {
                                    console.log();
                                    {{-- console.log(response.responseCode) --}}
                                    if (response.responseCode == '000') {
                                        $("#related_information_display").removeClass(
                                            "d-none d-sm-block");
                                        Swal.fire(
                                            '',
                                            response.message,
                                            'success'
                                        );

                                        $(".receipt").show();
                                        $(".form_process").hide();

                                        $('#confirm_modal_button').hide();
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#back_button').hide();
                                        $('#print_receipt').show();


                                        $(".rtgs_card_right").hide();
                                        $(".success_gif").show();

                                    } else {

                                        toaster(response.message, 'error', 10000);

                                        $(".receipt").hide();
                                        {{-- $(".form_process").hide(); --}}
                                        {{-- $('#confirm_modal_button').show(); --}}
                                        $("#confirm_transfer").show();
                                        $("#confirm_modal_button").prop('disabled', false);
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                        $('#back_button').show();
                                        $('#print_receipt').hide();
                                        {{-- $("#related_information_display").addClass("d-none d-sm-block"); --}}
                                        $("#related_information_display").show();
                                        $(".success_gif").hide();


                                    }
                                }

                            })

                        })
                    } else {
                        toaster('Accept terms & conditions to continue', 'error', 6000)
                        console.log("UNCHECKED");
                        return false;
                    }


                })
            });
        </script>
    @endsection
