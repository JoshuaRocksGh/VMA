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

        input.key {
            font-family: 'password';
            width: 100px;
            height: 26px;
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
                    Create Originator

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Settings </b> &nbsp; > &nbsp; <b class="text-danger">Create Originator</b>


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
            <div class=" ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="row">

                                {{-- SUMMARY FORM GOES HERE --}}

                                <div class=" col-md-7 m-2" id="transaction_form"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <br>

                                    <form action="#" id="payment_details_form" autocomplete="off" aria-autocomplete="none">
                                        @csrf
                                        <div class="row container">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">


                                            <div class="form-group row ">
                                                <b class="col-md-12 text-primary">Select Account&nbsp; <span
                                                        class="text-danger">*</span></b>

                                                <select class="form-control col-md-12" id="from_account"
                                                    required>
                                                    <option value=""> -- Select Account --</option>
                                                </select>

                                            </div>

                                            <hr style="padding-top: 0px; padding-bottom: 0px;">

                                            {{-- <div class="row ">

                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            name="onetime_beneficiary_type" id="customCheck1">
                                                        <label class="custom-control-label " for="customCheck1">
                                                            <b class="text-primary">Onetime ?</b> </label>
                                                    </div>

                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group  row mb-1 select_beneficiary">


                                                        <select class="form-control col-md-12" id="to_account" required>
                                                            <option value=""> -- Select Beneficiary --</option>

                                                        </select>

                                                    </div>

                                                    <span class="badge badge-primary float-right" style="cursor: pointer"><a
                                                        href="{{ url('add-local-bank-beneficiary') }}"
                                                        class="text-white" id="add_beneficiary_badge">Create
                                                        Beneficiary</a>
                                                </span>
                                                </div>
                                                <hr>

                                            </div> --}}
                                                <div class="row" id="saved_beneficiary_form">

                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> First Name
                                                                &nbsp; <span
                                                                    class="text-danger">*</span>
                                                            </b>
                                                            <input type="text" class="form-control col-md-8" id="first_name" >
                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> Other Name
                                                                &nbsp; <span
                                                                class="text-danger">*</span>
                                                            </b>
                                                            <input type="text" class="form-control col-md-8" id="other_number">
                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> Last Name
                                                                &nbsp; <span
                                                                class="text-danger">*</span>
                                                            </b>
                                                            <input type="text" class="form-control col-md-8" id="last_name">
                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> Email
                                                                &nbsp; <span
                                                                class="text-danger">*</span>
                                                            </b>
                                                            <input type="text" class="form-control col-md-8" id="email">
                                                        </div>





                                                        {{-- <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Purpose of Transfer &nbsp;<span
                                                                    class="text-danger">*</span></b>

                                                            <input type="text" class="form-control col-md-8" id="purpose"
                                                                placeholder="Enter purpose of transaction" required>

                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary">Expense Category &nbsp; <span
                                                                    class="text-danger">*</span></b>


                                                            <select class="form-control col-md-8" id="category" required>
                                                                <option value="">---Not Selected---</option>

                                                            </select>


                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary ">Future Payment &nbsp;

                                                            </b>

                                                            <input type="date" class="form-control col-md-8"
                                                                id="future_payement" required>

                                                        </div> --}}

                                                        {{-- <div class="row">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group mb-0">
                                                                        <input type="checkbox" class="custom-control-inputt"
                                                                            id="invoice_check">
                                                                        &nbsp; &nbsp; <label class="h6">Invoice Attachment ?
                                                                            <span class="badge badge-primary text-right"
                                                                                style="cursor: pointer" data-toggle="modal"
                                                                                data-target="#centermodal">View</span>
                                                                        </label>
                                                                        <span class="hide_invoice">
                                                                            <br>
                                                                            <input type="file" class="hide_invoice"
                                                                                id="invoice_attachment" required>
                                                                        </span>


                                                                    </div>

                                                                </div>
                                                            </div> --}}



                                                        {{-- <div class="row">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-8">

                                                                    <div class="form-group">

                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck1">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck1">Schedule
                                                                                Payments</label>
                                                                        </div>
                                                                        <legend></legend>


                                                                        <input type="text" class="form-control"
                                                                            id="schedule_payment_contraint_input">

                                                                        <input type="date" class="form-control"
                                                                            id="schedule_payment_date">

                                                                    </div>
                                                                </div>
                                                            </div> --}}



                                                        </div>




                                                </div>


                                                {{-- <div class=" row form-group" id="onetime_beneficiary_form">
                                                    <div class="col-md-12">

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> Beneficiary A/C Name</b>
                                                            <input type="text" class="form-control col-md-8 " id="onetime_beneficiary_name" placeholder="Enter Account Name">
                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> Beneficiary A/C Number</b>
                                                            <input type="text" class="form-control col-md-8 " id="onetime_account_number" placeholder="Enter Account Number"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary"> Beneficiary Email</b>
                                                            <input type="text" class="form-control col-md-8 " id="onetime_beneficiary_email" placeholder="Enter Beneficiary Email">
                                                        </div>




                                                        <div class="form-group row">

                                                            <b class="col-md-4 text-primary">Actual Amount &nbsp; <span
                                                                    class="text-danger">*</span></b>

                                                                    <div class="input-group mb-3 col-8" style="padding: 0px;">
                                                                        <div class="input-group-prepend">
                                                                            <select name="" class="input-group-text" id="select_currency__">
                                                                                <option value="SLL" selected>SLL</option>
                                                                                <option value="EUR">EURO</option>
                                                                                <option value="USD">USD</option>
                                                                            </select>
                                                                        </div>

                                                                          &nbsp;&nbsp;
                                                                          <input type="text" class="form-control " id="amount"
                                                                          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" readonly
                                                                          required>
                                                                      </div>


                                                        </div>

                                                        <div class="form-group row">

                                                            <b class="col-4 text-primary"> Cur / Rate / Amount</b>

                                                            <div class="input-group mb-3 col-8" style="padding: 0px;">
                                                                <div class="input-group-prepend">
                                                                    <select name="" class="input-group-text" id="select_currency__">
                                                                        <option value="SLL" selected>SLL</option>
                                                                        <option value="EUR">EURO</option>
                                                                        <option value="USD">USD</option>
                                                                    </select>
                                                                </div>
                                                                &nbsp;&nbsp;
                                                                <div class="input-group-prepend">
                                                                    <input type="text" class="form-control readOnly " value="1.00" style="width: 100px;">
                                                                  </div>
                                                                  &nbsp;&nbsp;
                                                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                              </div>


                                                        </div>





                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Purpose of Transfer &nbsp;<span
                                                                    class="text-danger">*</span></b>

                                                            <input type="text" class="form-control col-md-8" id="onetime_purpose"
                                                                placeholder="Enter purpose of transaction" required>

                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary">Expense Category &nbsp; <span
                                                                    class="text-danger">*</span></b>


                                                            <select class="form-control col-md-8" id="onetime_category" required>
                                                                <option value="">---Not Selected---</option>

                                                            </select>


                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary ">Future Payment &nbsp;

                                                            </b>

                                                            <input type="date" class="form-control col-md-8"
                                                                id="onetime_future_payement" required>

                                                        </div>





                                                    </div>

                                                </div> --}}
                                                <legend></legend>

                                                <div class="form-group text-right proceed">
                                                    <button class="btn btn-primary btn-rounded" type="button"
                                                        id="next_button">
                                                        &nbsp; Proceed &nbsp;<i class="fe-arrow-right"></i></button>
                                                </div>
                                                <br>


                                                {{-- <div class="form-group no_beneficiary">
                                                    <div class="alert alert-warning" role="alert">
                                                        <i class="mdi mdi-alert-outline mr-2"></i> <strong>warning</strong>
                                                        No
                                                        beneficiary found
                                                    </div>
                                                </div> --}}

                                            </div>




                                        <div class="col-md-1"></div>
                                    </form>

                                    {{--  <form action="#" class="onetime_beneficiary" id="onetime_payment_details_form"
                                        autocomplete="off" aria-autocomplete="none">
                                        @csrf

                                                <div class="row ">
                                                    <div class="col-md-1"></div>

                                                    <div class="col-md-10">


                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">My Account &nbsp; <span
                                                                    class="text-danger">*</span></b>

                                                            <select class="form-control col-md-8" id="from_account_onetime"
                                                                required>
                                                                <option value=""> -- Select Your Account --</option>
                                                            </select>

                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Receiver Name &nbsp; <span
                                                                    class="text-danger">*</span></b>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_beneficiary_alias_name"
                                                                placeholder="Beneficiary Name" required>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4"><span
                                                                    class="text-danger">*</span>Account
                                                                Number</label>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_beneficiary_account_number"
                                                                placeholder="Account Number"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4"><span
                                                                    class="text-danger">*</span>Account
                                                                Currency</label>

                                                            <select class="custom-select col-md-8"
                                                                id="onetime_beneficiary_account_currency" required>
                                                                <option value="">Select Currency</option>
                                                                <option value="GHS">GHS</option>
                                                                        <option value="USD">USD</option>
                                                                        <option value="EURO">EURO</option>
                                                                        <option value="SLL">SLL</option>
                                                                        <option value="GBP">GBP</option>
                                                            </select>

                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Enter Amount &nbsp; <span
                                                                    class="text-danger">*</span></b>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_amount" placeholder="Amount: 0.00"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                required>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-4 text-primary">Purpose of Transfer &nbsp;<span
                                                                    class="text-danger">*</span></b>

                                                            <input type="text" class="form-control col-md-8" id="onetime_purpose"
                                                                placeholder="Enter purpose of transaction" required>

                                                        </div>

                                                        <div class="form-group row">
                                                            <b class="col-md-4 text-primary">Expense Category &nbsp; <span
                                                                    class="text-danger">*</span></b>


                                                            <select class="form-control col-md-8" id="onetime_category" required>
                                                                <option value="">---Not Selected---</option>
                                                                <option value="01~Travel">Travel</option>
                                                                            <option value="02~Petty Cash">Petty Cash</option>
                                                                            <option value="03~Salary">Salary</option>
                                                                            <option value="04~Groceries">Groceries</option>
                                                                            <option value="05~Allowances">Allowances</option>
                                                                            <option value="06~Medical">Medical</option>
                                                                            <option value="07~Vendor Payment">Vendor Payment
                                                                            </option>
                                                                            <option value="08~Insurance">Insurance</option>
                                                                            <option value="09~Tax">Tax</option>
                                                                            <option value="10~Others">Others</option>
                                                            </select>


                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4"><span
                                                                    class="text-danger">*</span>Beneficiary
                                                                Email</label>
                                                            <input type="email" class="form-control col-md-8"
                                                                id="onetime_beneficiary_email" placeholder="Email" required>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label class="col-md-4"><span
                                                                    class="text-danger">*</span>Beneficiary
                                                                Phone Number</label>
                                                            <input type="text" class="form-control col-md-8"
                                                                id="onetime_beneficiary_phone" placeholder="Phone" required>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-1"></div>
                                                </div>

                                    </form>  --}}



                                </div><!-- end col -->


                                {{-- RIGHT CARD --}}


                            </div>

                            {{-- <div class=" col-md-4 m-2 d-none d-sm-block"
                                style="background-image: linear-gradient(to bottom right, white, rgb(201, 223, 230)); zoom: 0.9 ;">

                                <div class=" col-md-12  ">
                                    <br><br>
                                    <div class="card card-body">
                                        <div class="row ">
                                            <h6 class="col-md-5">Sender Name:</h6>
                                            <span class="text-primary display_from_account_name col-md-7"></span>

                                            <h6 class="col-md-5">Sender Account:</h6>
                                            <span class="text-primary display_from_account_no col-md-7"></span>

                                            <h6 class="col-md-5">Available Balance:</h6>
                                            <span class="text-primary display_from_account_amount col-md-7"></span>

                                            <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_from_account_currency col-md-7"></span>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <h6 class="col-md-5">Receiver Name:</h6>
                                            <span class="text-primary display_to_account_name col-md-7"></span>

                                            <h6 class="col-md-5">Receiver Account:</h6>
                                            <span class="text-primary display_to_account_no col-md-7"></span>

                                            <h6 class="col-md-5">Account Currency:</h6>
                                            <span class="text-primary display_to_account_currency col-md-7"></span>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <h6 class="col-md-5">Enter Amount:</h6>
                                            <span class="text-primary display_amount col-md-7"></span>

                                            <h6 class="col-md-5">Currency Rate:</h6>
                                            <span class="text-primary display_midrate col-md-7"></span>

                                            <h6 class="col-md-5">Converted Amount:</h6>
                                            <span class="text-primary display_converted_amount col-md-7"></span>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <h6 class="text-primary col-md-5">Transaction Fee:</h6>
                                            <span class="text-danger text-bold col-md-7">0.10% of transfer amount</span>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <h6 class="text-primary col-md-5">Please Note:</h6>
                                            <span class="text-danger col-md-7">RTGS Tranfers should be above (SLL
                                                50,000,000.00)</span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                    </div>
                </div> <!-- end card-body -->

                <div class="">



                    <div class="">


                    </div> <!-- end col -->

                    {{-- <div class="col-md-5 text-center">
                                <img src="{{ asset('land_asset/images/same-bank.gif') }}" class="img-fluid" />
                            </div> <!-- end col --> --}}


                    <!-- end row -->



                </div>

                {{-- <div class="" id="transaction_summary"> --}}


                    {{-- <div class="col-md-12"> --}}
                        {{-- <div class="card border p-3 mt-4 mt-lg-0 rounded">
                            <h4 class="header-title mb-3">Transfer Detail Summary</h4>

                            <p class="display-4 text-center text-success success-message "></p>

                            <div class="table-responsive table-striped table-bordered">
                                <table class="table mb-0">

                                    <tbody>
                                        <tr>
                                            <td>From Account:</td>
                                            <td>
                                                <span class="font-13 text-primary text-bold display_from_account_type"
                                                    id="display_from_account_type"></span>
                                                <span
                                                    class="d-block font-13 text-primary text-bold display_from_account_name"
                                                    id="display_from_account_name"> </span>
                                                <span class="d-block font-13 text-primary text-bold display_from_account_no"
                                                    id="display_from_account_no"></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>To Account:</td>
                                            <td>

                                                <span class="font-13 text-primary text-bold display_to_account_type"
                                                    id="display_to_account_type"> </span>
                                                <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                                    id="display_to_account_name"> </span>
                                                <span class="d-block font-13 text-primary text-bold display_to_account_no"
                                                    id="display_to_account_no"> </span>


                                                <span class="d-block font-13 text-primary text-bold display_to_account_name"
                                                    id="online_display_beneficiary_alias_name"> </span>

                                                <span class="font-13 text-primary h3 online_display_beneficiary_account_no"
                                                    id="online_display_beneficiary_account_no"> </span> --}}
                                                {{-- &nbsp; | &nbsp; --}}
                                                {{-- <span
                                                    class="font-13 text-primary h3 online_display_beneficiary_account_currency"
                                                    id="online_display_beneficiary_account_currency">
                                                </span>

                                                <span
                                                    class="d-block font-13 text-primary text-bold online_display_beneficiary_email"
                                                    id="online_display_beneficiary_email"> </span>

                                                <span
                                                    class="d-block font-13 text-primary text-bold online_display_beneficiary_phone"
                                                    id="online_display_beneficiary_phone"> </span>


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
                                                    id="display_schedule_payment">NO </span> --}}
                                                {{-- &nbsp; | &nbsp; --}}
                                                {{-- <span class="font-13 text-primary h3 display_schedule_payment_date"
                                                    id="display_schedule_payment_date"> N/A
                                                </span>
                                            </td>
                                        </tr> --}}

{{--
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
                                                    id="display_posted_by">{{ session('userId') }}</span>
                                            </td>
                                        </tr>

                                        <tr class="hide_on_print">
                                            <td>Enter Pin: </td>
                                            <td>

                                                <input type="text" name="user_pin" class="form-control key " id="user_pin"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                                            </td>
                                        </tr> --}}


                                    {{-- </tbody>
                                </table>
                            </div> --}}
                            <!-- end table-responsive -->
                            {{-- <br> --}}
                            {{-- <div class="form-group text-center">

                                <span> <button class="btn btn-secondary btn-rounded" type="button"
                                        id="back_button">Back</button> &nbsp; </span>
                                <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                        id="confirm_button"><span id="confirm_transfer">Confirm
                                            Transfer</span>
                                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner"
                                            aria-hidden="true"></span>
                                        <span id="spinner-text">Loading...</span>
                                    </button></span>
                                <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print" type="button"
                                        id="print_receipt" onclick="window.print()">Print
                                        Receipt
                                    </button></span>
                            </div> --}}
                        {{-- </div> --}}

                    {{-- </div> <!-- end col --> --}}





                </div>

                {{-- IMAGE MODAL --}}


                <!-- Center modal content -->
                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true" style="zoom: 0.9;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary" id="myCenterModalLabel">Aquiring a Savings
                                    Account</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Ã—</button>
                            </div>
                            <div class="modal-body">
                                <div class=" ">
                                    <img src="" id="display_invoice_attachment" class="img-fluid" />
                                </div>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



                <!-- Modal -->
                {{-- <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                <div class="modal-header">
                                    <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                        Details</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                                    Total: <span class="font-13 text-muted" id="display_total"> &nbsp
                                    </span><br><br>

                                    <div class="form-group">
                                        <label class="font-16 purple-color">Enter Pin</label>
                                        <input type="text" class="form-control" id="pin" data-toggle="input-mask"
                                            placeholder="enter pin" required
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                                    </div>

                                </div>



                                <div class="modal-footer">
                                    <button type="send" id="send" class="btn btn-primary" data-target="#multiple-two"
                                        data-toggle="modal" data-dismiss="modal">Send</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal --> --}}




            </div> <!-- end col -->

        </div> <!-- end row -->



    </div>


@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>

    function from_account() {
            $.ajax({
                type: 'GET',
                url:  'get-my-account',
                datatype: "application/json",
                success: function(response) {
                    //console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {
                        $('#from_account').append($('<option>', {
                            value: data[index].accountType + '~' + data[index]
                                .accountDesc + '~' + data[index].accountNumber +
                                '~' + data[index].currency + '~' + data[index]
                                .availableBalance
                        }).text(data[index].accountType + '~' + data[index]
                            .accountNumber + '~' + data[index].currency + '~' + data[
                                index].availableBalance));
                        //$('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));

                    });
                },

            })
        }

        // function get_currency() {
        //     $.ajax({
        //         "type": "GET",
        //         "url": "get-currency-list-api",
        //         datatype: "application/json",
        //         success: function(response) {
        //             {{-- console.log(response); --}}

        //             let data = response.data
        //             console.log(data);
        //             $.each(data, function(index) {
        //                 $('#onetime_beneficiary_account_currency').append($('<option>', {
        //                     value: data[index].isoCode
        //                 }).text(data[index].isoCode + '~' + data[index]
        //                     .description));
        //             })
        //         }
        //     })
        // }




        // function to_account() {
        //     $.ajax({
        //         type: 'GET',
        //         url:  'get-transfer-beneficiary-api?beneType=SAB',
        //         datatype: "application/json",
        //         success: function(response) {
        //             console.log(response);
        //             let data = response.data
        //             if (response.data.length > 0) {
        //                 {{--  $('.yes_beneficiary').show()  --}}
        //                 $('.no_beneficiary').hide()
        //                 $.each(data, function(index) {
        //                     //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
        //                     $('#to_account').append($('<option>', {
        //                         value: data[index].BENEF_TYPE + '~' + data[index]
        //                             .NICKNAME + '~' + data[index].BEN_ACCOUNT +
        //                             '~' +
        //                             data[index].BEN_ACCOUNT_CURRENCY
        //                     }).text(data[index].BENEF_TYPE + '~' + data[index]
        //                         .BEN_ACCOUNT +
        //                         '~' + data[index].NICKNAME + '~' + data[index]
        //                         .BEN_ACCOUNT_CURRENCY));

        //                 });
        //                 {{-- <option value="Currenct Account~Joshua Amarfio~8888888888888~GHS~800">
        //                     Currenct Account ~ 8888888888888~Joshua Amarfio
        //                 </option> --}}
        //             } else {
        //                 {{--  $('.yes_beneficiary').hide()  --}}
        //                 $('.no_beneficiary').show()
        //             }


        //         },

        //     })
        // }

        $(document).ready(function() {

            $('#spinner').hide();
            $('#spinner-text').hide();
            // $('#print_receipt').hide();
            // $(".hide_invoice").hide();
            // $('.no_beneficiary').hide();
            // $("#onetime_payment_details_form").show();
            // $('.badge').hide();

            setTimeout(function() {
                from_account();
                // to_account();
                // get_currency();
            }, 3000);

            // $("#customCheck1").click(function() {
            //     if ($(this).is(":checked")) {
            //         console.log("Checkbox is checked.");

            //         $("#onetime_beneficiary_form").toggle(500);
            //         $("#saved_beneficiary_form").hide();
            //         $(".badge").toggle(500);
            //         $(".select_beneficiary").hide();
            //     } else if ($(this).is(":not(:checked)")) {
            //         console.log("Checkbox is unchecked.");
            //         $("#saved_beneficiary_form").toggle(500);
            //         $(".select_beneficiary").toggle(500);
            //         $("#onetime_beneficiary_form").hide();
            //         $(".badge").hide();
            //     }
            // });


            // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
            // $("#invoice_attachment").on("change", function() {
            //     if ($(this).is(":checked")) {
            //         $('.hide_invoice').hide()
            //     } else {
            //         $('.hide_invoice').show()
            //     }
            // });


            // $('#invoice_attachment').change(function() {

            //     var file = $("#invoice_attachment[type=file]").get(0).files[0];

            //     if (file) {
            //         var reader = new FileReader();

            //         reader.onload = function() {
            //             $("#display_invoice_attachment").attr("src", reader.result);
            //         }

            //         reader.readAsDataURL(file);
            //     }
            //     {{-- $("#display_invoice_attachment").attr("src", {{ asset('land_asset/images/same-bank.gif') }}); --}}
            //     $("#display_invoice_attachment").show();
            // })


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

            // {{-- $(".select_onetime").css("display", "none"); --}}
            // {{-- $(".select_beneficiary").css("display", "block"); --}}

            // var type = $("input[type='radio']:checked").val();

            // $(".radio").click(function() {

            //     var type = $("input[type='radio']:checked").val();

            //     if (type == 'beneficiary') {
            //         {{-- $(".select_onetime").css("display", "none"); --}}
            //         {{-- $(".select_beneficiary").css("display", "block"); --}}

            //         // set amonut to empty
            //         $("#amount").val('');


            //         //$(".select_onetime").hide();
            //         $(".select_beneficiary").show();

            //     }
            //     if (type == 'onetime') {

            //         {{-- $(".select_beneficiary").css("display", "none"); --}}
            //         {{-- $(".select_onetime").css("display", "block"); --}}

            //         // set amonut to empty
            //         $("#amount").val('');

            //         $(".select_beneficiary").hide();
            //         //$(".select_onetime").show();
            //     }

            // });

            // hide select accounts info
            // $(".from_account_display_info").hide()
            // $(".to_account_display_info").hide()
            // $("#schedule_payment_date").hide()
            // $('#schedule_payment_contraint_input').hide()
            // $('.display_schedule_payment_date').text('N/A')
            // $('#select_frequency').hide(),
            // $('#select_frequency_text').hide(),

            // $("#transaction_form").show();
            // $("#transaction_summary").hide();
            // $('#onetime_beneficiary_form').hide();

            // {{-- $("#next_button").click(function(e) {
            //         e.preventDefault()
            //         $("#transaction_form").hide()
            //         $("#transaction_summary").show()
            //     }) --}}

            // $("#back_button").click(function(e) {
            //     e.preventDefault()
            //     $("#transaction_summary").hide()
            //     $("#transaction_form").show()

            // })

            // {{-- Event on From Account field --}}
            // var amt = 0

            // $("#from_account").change(function() {
            //     var from_account = $(this).val()
            //     {{-- alert(from_account) --}}
            //     if (from_account.trim() == '' || from_account.trim() == undefined) {
            //         {{-- alert('money') --}}
            //         $(".from_account_display_info").hide()

            //     } else {
            //         from_account_info = from_account.split("~")
            //         {{-- alert('continue') --}}

            //         var to_account = $('#to_account').val()

            //         if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
            //             to_account.trim() != '') {
            //             toaster('can not transfer to same account', 'error', 10000)
            //             {{-- alert('can not transfer to same account') --}}
            //             $(this).val('')
            //         }

            //         // set summary values for display
            //         $(".display_from_account_type").text(from_account_info[0].trim())
            //         $(".display_from_account_name").text(from_account_info[1].trim())
            //         $(".display_from_account_no").text(from_account_info[2].trim())
            //         $(".display_from_account_currency").text(from_account_info[3].trim())

            //         $(".display_currency").text(from_account_info[3].trim()) // set summary currency

            //         amt = from_account_info[4].trim()
            //         $(".display_from_account_amount").text(formatToCurrency(parseFloat(
            //             from_account_info[4]
            //             .trim())))
            //         {{-- alert('and show' + from_account_info[3].trim()) --}}
            //         $(".from_account_display_info").show()
            //     }




            //     // alert(from_account_info[0]);
            // });


            // $("#to_account").change(function() {
            //     var to_account = $(this).val()
            //     {{-- alert(to_account) --}}
            //     if (to_account.trim() == '' || to_account.trim() == undefined) {

            //         $(".to_account_display_info").hide()

            //     } else {
            //         to_account_info = to_account.split("~")


            //         var from_account = $('#from_account').val()

            //         if ((from_account.trim() == to_account.trim()) && from_account.trim() != '' &&
            //             to_account.trim() != '') {
            //             toaster('can not transfer to same account', 'error', 10000)

            //             {{-- alert('can not transfer to same account') --}}
            //             $(this).val('')
            //         }

            //         // set summary values for display
            //         $(".display_to_account_type").text(to_account_info[0].trim())
            //         $(".display_to_account_name").text(to_account_info[1].trim())
            //         $(".display_to_account_no").text(to_account_info[2].trim())
            //         $(".display_to_account_currency").text(to_account_info[3].trim())
            //         //$(".display_to_account_amount").text(formatToCurrency(parseFloat(to_account_info[4].trim())))

            //         $(".to_account_display_info").show()
            //     }




            //     // alert(to_account_info[0]);
            // });


            // $("#amount").keyup(function() {

            //     var type = $("input[type='radio']:checked").val();
            //     //alert(type);
            //     //return false;

            //     if (type == 'beneficiary') {
            //         var from_account = $('#from_account').val()
            //         var to_account = $('#to_account').val()

            //         if (from_account.trim() == '' || to_account.trim() == '') {
            //             toaster('Please select source and destination accounts', 'error', 10000)

            //             {{-- alert('Please select source and destination accounts') --}}
            //             $(this).val('')
            //             return false;
            //         } else {
            //             var transfer_amount = $(this).val()
            //             if (parseFloat(amt) < parseFloat(transfer_amount)) {
            //                 toaster('Insufficient account balance', 'error', 10000)
            //                 return false
            //             } else {
            //                 $(".display_transfer_amount").text(formatToCurrency(parseFloat(
            //                     transfer_amount
            //                     .trim())))
            //             }

            //         }

            //     } else if (type == 'onetime') {

            //         var from_account = $('#from_account').val()
            //         var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name').val()
            //         var onetime_beneficiary_account_number = $(
            //             '#onetime_beneficiary_account_number').val()
            //         var onetime_beneficiary_account_currency = $(
            //             '#onetime_beneficiary_account_currency').val()
            //         var onetime_beneficiary_email = $('#onetime_beneficiary_email').val()
            //         var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()

            //         if (from_account.trim() == '' || onetime_beneficiary_alias_name.trim() == '' ||
            //             onetime_beneficiary_account_number.trim() == '' ||
            //             onetime_beneficiary_account_currency.trim() == '') {
            //             toaster('Please select source and destination accounts', 'error', 10000)

            //             {{-- alert('Please select source and destination accounts') --}}
            //             $(this).val('')
            //             return false;
            //         } else {
            //             //alert('set')
            //             var transfer_amount = $(this).val()
            //             $(".display_transfer_amount").text(formatToCurrency(parseFloat(transfer_amount
            //                 .trim())))
            //         }

            //     } else {
            //         alert(type + ' 00000000 Select either beneficiary or onetime beneficiary')
            //         $(this).val('')
            //         return false;
            //     }




            // });


            // function formatToCurrency(amount) {
            //     return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            // };


            // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
            // $("#customCheck1").on("change", function() {
            //     if ($(this).is(":checked")) {
            //         //console.log("Checkbox Checked!");
            //         $("#schedule_payment_date").show()
            //         $(".display_schedule_payment").text('YES')
            //         $('#schedule_payment_contraint_input').val('TRUE')
            //         $('#select_frequency').show();
            //         $('#select_frequency_text').show();

            //     } else {
            //         //console.log("Checkbox UnChecked!");
            //         $("#schedule_payment_date").val('')
            //         $("#schedule_payment_date").hide()
            //         $('.display_schedule_payment').text('NO')
            //         $('.display_schedule_payment_date').text('N/A')

            //         $('#schedule_payment_contraint_input').val('')
            //         $('#schedule_payment_contraint_input').hide()
            //         $('#schedule_payment_date').val('')
            //         $('#select_frequency').hide();
            //         $('#select_frequency_text').hide();
            //     }
            // });


            // CHECK BOX CONSTRAINT SCHEDULE PAYMENT
            // $("#invoice_check").on("change", function() {
            //     if ($(this).is(":checked")) {
            //         //console.log("Checkbox Checked!");
            //         {{-- alert("dfdf") --}}
            //         $(".hide_invoice").show()


            //     } else {
            //         {{-- alert("454545") --}}
            //         $(".hide_invoice").hide()

            //     }
            // });




            // NEXT BUTTON CLICK
            $("#next_button").click(function() {

                // var type = $("input[type='radio']:checked").val();
                //console.log(type);

                // var from_account = $('#from_account').val()
                // var transfer_amount = $('#amount').val()
                // var category = $('#category').val()
                // var purpose = $('#purpose').val()
                // var schedule_payment_contraint_input = $('#schedule_payment_contraint_input').val()
                // var schedule_payment_date = $('#schedule_payment_date').val();

                // if (from_account.trim() == '' || transfer_amount.trim() == '' || category.trim() ==
                //     '' || purpose.trim() == '') {
                //     toaster('Field must not be empty', 'error', 10000)

                //     {{-- alert('Field must not be empty') --}}

                //     return false

                // }

                // if (parseFloat(amt) < parseFloat(transfer_amount)) {
                //     toaster('Insufficient account balance', 'error', 10000)
                //     return false
                // }

                //set purpose and category values
                // var category_info = category.split("~")
                // $("#display_category").text(category_info[1])
                // $("#display_purpose").text(purpose)

                // $("#transaction_form").hide()
                // $("#transaction_summary").show()



                // if (schedule_payment_contraint_input.trim() != '' || schedule_payment_date.trim() ==
                //     '') {
                //     $('.display_schedule_payment_date').text('N/A') // shedule date NULL
                //     toaster('Select schedule date for subsequent transfers', 'error', 10000)

                //     return false;
                // }


                // if (type == 'beneficiary') {

                //     var to_account = $('#to_account').val()

                //     $('.display_schedule_payment_date').text("| " + schedule_payment_date)


                //     if (from_account.trim() == '' || to_account.trim() == '' || transfer_amount
                //         .trim() == '' || category.trim() == '' || purpose.trim() == '') {
                //         toaster('Field must not be empty', 'error', 10000)


                //         return false
                //     } else {
                //         //set purpose and category values
                //         var category_info = category.split("~")
                //         $("#display_category").text(category_info[1])
                //         $("#display_purpose").text(purpose)

                //         $("#transaction_form").hide()
                //         $("#transaction_summary").show()
                //     }




            //     // } else if (type == 'onetime') {

            //         var from_account = $('#from_account').val()

            //         // ONETIME BENEFICIARY DETAILS
            //         var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name').val()
            //         var onetime_beneficiary_account_number = $(
            //             '#onetime_beneficiary_account_number').val()
            //         var onetime_beneficiary_account_currency = $(
            //             '#onetime_beneficiary_account_currency').val()
            //         var onetime_beneficiary_name = $('#onetime_beneficiary_name').val()
            //         var onetime_beneficiary_email = $('#onetime_beneficiary_email').val()
            //         var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()



            //         // END OF ONETIME BENEFICIARY DETAILS

            //         ///////////////////////////////

            //         //////////////////////////////


            //         if (from_account.trim() == '' || onetime_beneficiary_account_number.trim() ==
            //             '' || transfer_amount.trim() == '' || category.trim() == '' || purpose
            //             .trim() == '') {
            //             toaster('Field must not be empty', 'error', 10000)

            //             {{-- alert('Field must not be empty') --}}
            //             return false
            //         } else {
            //             //set purpose and category values
            //             var category_info = category.split("~")
            //             $("#display_category").text(category_info[1])
            //             $("#display_purpose").text(purpose)

            //             $("#transaction_form").hide()
            //             $("#transaction_summary").show()
            //         }




            //     } else {
            //         toaster('CHOOSE EITHER BENEFICIARY OR ONTIME', 'error', 10000)

            //         {{-- alert('CHOOSE EITHER BENEFICIARY OR ONTIME') --}}
            //     }


            //     var from_account = $('#from_account').val().split('~');
            //     var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name').val()
            //     var onetime_beneficiary_account_number = $('#onetime_beneficiary_account_number')
            //         .val()
            //     var onetime_beneficiary_account_currency = $(
            //         '#onetime_beneficiary_account_currency').val()
            //     var purpose = $('#purpose').val()
            //     var onetime_beneficiary_email = $('#onetime_beneficiary_email').val()
            //     var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()
            //     var transfer_amount = $('#amount').val();
            //     {{-- var select_frequency = $('#select_frequency').val() --}}
            //     var schedule_payment_date = $('#schedule_payment_date').val();
            //     var category = $('#category').val();
            //     var user_pin = $('#user_pin').val();

            //     var from_account_ = from_account[2];


            //     $('#online_display_beneficiary_alias_name').text(onetime_beneficiary_alias_name);
            //     $('#online_display_beneficiary_account_no').text(
            //         onetime_beneficiary_account_number);
            //     $('#online_display_beneficiary_account_currency').text(
            //         onetime_beneficiary_account_currency);
            //     $('#online_display_beneficiary_email').text(onetime_beneficiary_email);
            //     $('#online_display_beneficiary_phone').text(onetime_beneficiary_phone);

            // });

            // POST TO API

            $('#confirm_button').click(function(e) {
                e.preventDefault();

                $.ajax({
                        type: 'POST',
                        url:  'transfer-to-beneficiary-api',
                        datatype: "application/json",
                        'data': {
                            'from_account': from_account,
                            'first_name': first_name,
                            'other_name': other_name,
                            'last_name': last_name,
                            'email': email
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            {{-- console.log(response); --}}


                            if (response.responseCode == '000') {
                                toaster(response.message, 'success', 1000)
                                $('#confirm_button').hide();
                                $('#back_button').hide();
                                $('#print_receipt').show();

                                $(".success-message").html(
                                    '<img src="{{ asset('land_asset/images/statement_success.gif') }}" />'
                                )

                            } else {
                                toaster(response.message, 'error', 10000)

                                $('#spinner').hide();
                                $('#spinner-text').hide();
                                $('#print_receipt').hide();


                                $('#confirm_transfer').show();
                                $('#confirm_button').attr('disabled', false);


                            }



                        },
                        error: function(xhr, status, error) {
                            $('#spinner').hide();
                            $('#spinner-text').hide();
                            $('#print_receipt').hide();


                            $('#confirm_transfer').show();
                            $('#confirm_button').attr('disabled', false);
                        }

                    })


                // var type = $("input[type='radio']:checked").val();
                // // console.log(type);



                // if (type == 'beneficiary') {

                //     //get values

                //     var from_account = $('#from_account').val().split('~');
                //     var to_account = $('#to_account').val().split('~');
                //     var transfer_amount = $('#amount').val();
                //     var category = $('#category').val().split('~');
                //     var purpose = $('#purpose').val();
                //     {{-- var schedule_payment_contraint_input = $('#schedule_payment_contraint_input').val(); --}}
                //     var select_frequency = $('#select_frequency').val()
                //     var schedule_payment_date = $('#schedule_payment_date').val();

                //     var from_account_ = from_account[2];
                //     var to_account_ = to_account[2];
                //     var alias_name = to_account[3];
                //     {{-- var transfer_amount = $('#amount').val(); --}}
                //     var category_ = category[1];
                //     var purpose = $('#purpose').val();
                //     var schedule_payment_date = $('#schedule_payment_date').val();

                //     var pin = $('#user_pin').val();

                //     {{-- console.log(pin); --}}

                //     if (from_account_.trim() == '' || to_account_.trim() == '' || transfer_amount
                //         .trim() == '' || category_.trim() == '' || purpose.trim() == '' || pin == ''
                //     ) {
                //         toaster('Field must not be empty', 'error', 10000)
                //         return false;
                //     }

                //     {{-- console.log(form_account_);
                //             console.log(to_account_);
                //             console.log(transfer_amount);
                //             console.log(category_);
                //             console.log(purpose);
                //             console.log(schedule_payment_date); --}}

                //     $('#spinner').show(),
                //         $('#spinner-text').show(),

                //         $('#confirm_transfer').hide(),
                //         $('#confirm_button').attr('disabled', true);


                    // SEND TO API


                // } else {

                //     {{-- alert('onetime'); --}}

                //     var from_account = $('#from_account').val().split('~');
                //     var onetime_beneficiary_alias_name = $('#onetime_beneficiary_alias_name').val()
                //     var onetime_beneficiary_account_number = $(
                //         '#onetime_beneficiary_account_number').val()
                //     var onetime_beneficiary_account_currency = $(
                //         '#onetime_beneficiary_account_currency').val()
                //     var purpose = $('#purpose').val()
                //     var onetime_beneficiary_email = $('#onetime_beneficiary_email').val()
                //     var onetime_beneficiary_phone = $('#onetime_beneficiary_phone').val()
                //     var transfer_amount = $('#amount').val();
                //     var select_frequency = $('#select_frequency').val()
                //     var schedule_payment_date = $('#schedule_payment_date').val();
                //     var category = $('#category').val();
                //     var user_pin = $('#user_pin').val();

                //     var from_account_ = from_account[2];

                    // {{-- console.log(from_account_);
                    //             console.log(onetime_beneficiary_alias_name);
                    //             console.log(onetime_beneficiary_account_number);
                    //             console.log(onetime_beneficiary_account_currency);
                    //             console.log(purpose);
                    //             console.log(onetime_beneficiary_email);
                    //             console.log(onetime_beneficiary_phone);
                    //             console.log(transfer_amount);
                    //             console.log(select_frequency);
                    //             console.log(schedule_payment_date);
                    //             console.log(category); --}}

                    $('#spinner').show(),
                        $('#spinner-text').show(),

                        $('#confirm_transfer').hide(),
                        $('#confirm_button').attr('disabled', true);

                    $.ajax({
                        type: 'POST',
                        url:  'transfer-to-beneficiary-api',
                        datatype: "application/json",
                        'data': {
                            'from_account': from_account_,
                            'alias_name': onetime_beneficiary_alias_name,
                            'beneficiary_account_number': onetime_beneficiary_account_number,
                            'beneficiary_account_currency': onetime_beneficiary_account_currency,
                            'purpose': purpose,
                            'beneficiary_email': onetime_beneficiary_email,
                            'beneficiary_phone': onetime_beneficiary_phone,
                            'amount': transfer_amount,
                            'frequency': select_frequency,
                            'schedule_payment_date': schedule_payment_date,
                            'category': category,
                            'secPin': user_pin
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            {{-- console.log(response); --}}


                            if (response.responseCode == '000') {
                                toaster(response.message, 'success', 1000)
                                $('#confirm_button').hide();
                                $('#back_button').hide();
                                $('#print_receipt').show();

                                $(".success-message").html(
                                    '<img src="{{ asset('land_asset/images/statement_success.gif') }}" />'
                                )

                            } else {
                                toaster(response.message, 'error', 10000)

                                $('#spinner').hide();
                                $('#spinner-text').hide();
                                $('#print_receipt').hide();


                                $('#confirm_transfer').show();
                                $('#confirm_button').attr('disabled', false);


                            }


                        }
                    })



                }



            })


        });

    </script>
@endsection
