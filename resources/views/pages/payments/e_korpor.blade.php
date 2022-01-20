@extends('layouts.master')

@section('content')

    <div class="">
        @php
            $pageTitle = 'E-Korpor Payment';
            $basePath = 'Payment';
            $currentPath = 'E-Korpor';
        @endphp
        @include("snippets.pageHeader")
        <br>
        <div class="">

            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#send_korpor_page" data-toggle="tab" aria-expanded="true"
                        class="nav-link active send_korpor_tab">
                        Send E-Korpor
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#reverse_korpor_page" data-toggle="tab" aria-expanded="false"
                        class="nav-link reverse_korpor_tab">
                        Reverse E-Korpor
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#redeem_korpor_page" data-toggle="tab" aria-expanded="false" class="nav-link redeem_korpor_tab">
                        Redeem E-Korpor
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#korpor_trans_page" data-toggle="tab" aria-expanded="false" class="nav-link korpor_trans_tab">
                        E-Korpor Transactions
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="send_korpor_page">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">


                                        <div class="form_process">
                                            <div class="row">


                                                <div class="site-card col-md-7 m-2" id="request_form_div">
                                                    <br>

                                                    <form action="#" class="select_beneficiary"
                                                        id="send_korpor_payment_details_form" autocomplete="off"
                                                        aria-autocomplete="none">
                                                        @csrf
                                                        <div class="row container">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10">

                                                                {{-- <br><br><br> --}}
                                                                <div class="row">
                                                                    {{-- <div class="col-md-1"></div> --}}

                                                                    <div class="col-md-12">

                                                                        <div class="form-group row ">
                                                                            <b class="col-md-12 text-primary">Account to
                                                                                transfer from &nbsp;
                                                                                <span class="text-danger">*</span> </b>


                                                                            <select
                                                                                class="form-control col-md-12 from_account"
                                                                                id="account_of_transfer" required>
                                                                                <option disabled selected value=""> ---
                                                                                    Select Source Account ---
                                                                                </option>
                                                                                @include("snippets.accounts")
                                                                            </select>
                                                                        </div>
                                                                        <hr style="padding-top: 0px; padding-bottom: 0px;">


                                                                        <div class="form-group row">

                                                                            <b class="col-md-5 text-primary"> Type of
                                                                                Transfer &nbsp; <span
                                                                                    class="text-danger">*</span></b>

                                                                            <div class="row col-md-7 ">
                                                                                <div
                                                                                    class="radio radio-primary form-check-inline m-1 col-md-5 destination">
                                                                                    <input type="radio"
                                                                                        id="transfer_to_self" value="SELF"
                                                                                        name="self_transfer_toggle">
                                                                                    <label for="transfer_to_self"> Self
                                                                                    </label>
                                                                                </div>
                                                                                <div
                                                                                    class="radio  radio-primary form-check-inline m-1 col-md-5 transfer_type">
                                                                                    <input type="radio"
                                                                                        id="transfer_to_others"
                                                                                        value="OTHERS"
                                                                                        name="self_transfer_toggle" checked>
                                                                                    <label for="transfer_to_others">
                                                                                        Others</label>
                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <hr style="padding-top: 0px; padding-bottom: 0px;">


                                                                        <div id="korpor_transfer_form">


                                                                            <div class="form-group row">

                                                                                <b class="col-md-4 text-primary"> Receiver
                                                                                    Name
                                                                                    &nbsp; <span
                                                                                        class="text-danger">*</span></b>


                                                                                <input type="text"
                                                                                    class="form-control col-md-8 "
                                                                                    id="receiver_name"
                                                                                    placeholder="Enter Receiver Name"
                                                                                    autocomplete="off" required>
                                                                                <br>

                                                                            </div>

                                                                            <div class="form-group row">

                                                                                <b class="col-md-4 text-primary"> Receiver
                                                                                    Telphone &nbsp; <span
                                                                                        class="text-danger">*</span></b>

                                                                                <input type="text"
                                                                                    class="form-control col-md-8 "
                                                                                    id="receiver_phoneNum"
                                                                                    placeholder="Enter Receiver Phone Number"
                                                                                    autocomplete="off"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                                    required>
                                                                                <br>

                                                                            </div>

                                                                            <div
                                                                                class="form-group row hide-if-self-transfer">

                                                                                <b class="col-md-4 text-primary"> Receiver
                                                                                    Address: &nbsp; <span
                                                                                        class="text-danger">*</span></b>

                                                                                <input type="text"
                                                                                    class="form-control col-md-8 "
                                                                                    id="receiver_address"
                                                                                    placeholder="Enter Receiver Address"
                                                                                    autocomplete="off" required>
                                                                                <br>

                                                                            </div>

                                                                            <div class="form-group row mb-3">

                                                                                <b class="col-md-4 text-primary">Amount&nbsp;
                                                                                    <span
                                                                                        class="text-danger">*</span></b>


                                                                                <div class="input-group mb-1 col-md-8"
                                                                                    style="padding: 0px;">
                                                                                    <div class="input-group-prepend">
                                                                                        <input type="text" value="SLL"
                                                                                            class="input-group-text display_currency"
                                                                                            id="select_currency"
                                                                                            style="width: 80px;" readonly>
                                                                                    </div>

                                                                                    &nbsp;&nbsp;
                                                                                    <input type="text"
                                                                                        class="form-control " id="amount"
                                                                                        placeholder="Enter Amount To Transfer"
                                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                                        required>
                                                                                </div>



                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <b class="col-md-4 text-primary">Purpose of
                                                                                    Transfer<span
                                                                                        class="text-danger">*</span></b>

                                                                                <input type="text"
                                                                                    class="form-control col-md-8 "
                                                                                    id="narration"
                                                                                    placeholder="Enter Naration"
                                                                                    autocomplete="off" required
                                                                                    value="E-Korpor Transfer">

                                                                            </div>

                                                                            {{-- <div class="form-group row">

                                                                            <b class="col-md-5 text-primary " for="pin">
                                                                                Enter Your Pin
                                                                                <span class="text-danger">*</span></b>
                                                                            <input type="password"
                                                                                class="form-control col-md-7"
                                                                                id="user_pin"
                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">



                                                                        </div> --}}

                                                                            {{-- <div class="form-group text-right ">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success "
                                                                                id="confirm_button">
                                                                                <span class="submit-text">Submit</span>
                                                                                <span
                                                                                    class="spinner-border spinner-border-sm mr-1"
                                                                                    id="spinner" role="status"
                                                                                    aria-hidden="true"></span>
                                                                                <span
                                                                                    id="spinner-text">Loading...</span>
                                                                            </button>
                                                                        </div> --}}
                                                                        </div>

                                                                        {{-- <div class="self_form">


                                                                        <div class="form-group row">

                                                                            <b class="col-md-4 text-primary"> Receiver
                                                                                Name
                                                                                &nbsp; <span
                                                                                    class="text-danger">*</span></b>


                                                                            <input type="text"
                                                                                class="form-control col-md-8 readOnly"
                                                                                id="receiver_name_self"
                                                                                value="{{ Session()->get('userAlias') }}"
                                                                                autocomplete="off" required readonly>
                                                                            <br>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <b class="col-md-4 text-primary"> Receiver
                                                                                Telephone: &nbsp; <span
                                                                                    class="text-danger">*</span></b>

                                                                            <input type="text"
                                                                                class="form-control col-md-8 "
                                                                                id="receiver_phoneNum_self"
                                                                                placeholder="Enter Phone Number"
                                                                                autocomplete="off" required>

                                                                            <br>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <b class="col-md-4 text-primary"> Receiver
                                                                                Address: &nbsp; <span
                                                                                    class="text-danger">*</span></b>

                                                                            <input type="text"
                                                                                class="form-control col-md-8 "
                                                                                id="receiver_address_self"
                                                                                placeholder="Enter Address"
                                                                                autocomplete="off" required>
                                                                            <br>

                                                                        </div>

                                                                        <div class="form-group row mb-3">

                                                                            <b class="col-md-4 text-primary">Amount&nbsp;
                                                                                <span class="text-danger">*</span></b>

                                                                            <div class="input-group mb-1 col-8"
                                                                                style="padding: 0px;">
                                                                                <div class="input-group-prepend">
                                                                                    <input type="text"
                                                                                        class="input-group-text select_currency"
                                                                                        id="" style="width: 80px;"
                                                                                        readonly>
                                                                                </div>

                                                                                &nbsp;&nbsp;
                                                                                <input type="text" class="form-control "
                                                                                    id="amount_self"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                                    required>
                                                                            </div>



                                                                        </div>




                                                                    </div> --}}

                                                                        <div class="form-group text-right mt-2">
                                                                            <button type="button"
                                                                                class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success "
                                                                                id="confirm_next_button">
                                                                                <span class="submit-text">&nbsp; Next
                                                                                    &nbsp;<i
                                                                                        class="fe-arrow-right"></i></span>

                                                                            </button>
                                                                        </div>

                                                                    </div>

                                                                    {{-- <div class="col-md-1"></div> --}}
                                                                </div>









                                                            </div>


                                                            <div class="col-md-1"></div>

                                                        </div>











                                                    </form>


                                                </div> <!-- end col -->

                                                <div class=" site-card col-md-4 m-2 others_summary">
                                                    <br>
                                                    <div class=" col-md-12">
                                                        <h4 class="text-primary transfer-detail-header">Sender Acc. Info
                                                        </h4>
                                                        <hr class="mt-0">

                                                        <div class="row">
                                                            <p class="col-md-5 transfer-detail-text">Account Name:</p>
                                                            <span
                                                                class="text-primary o-wrap display_from_account_name col-md-7"></span>

                                                            <p class="col-md-5 transfer-detail-text">Account Number:</p>
                                                            <span
                                                                class="text-primary o-wrap display_from_account_no col-md-7"></span>

                                                            <p class="col-md-5 transfer-detail-text">Available Balance:</p>
                                                            <span
                                                                class="text-primary o-wrap display_from_account_amount col-md-7"></span>

                                                            <p class="col-md-5 transfer-detail-text">Account Currency:</p>
                                                            <span
                                                                class="text-primary o-wrap display_currency col-md-7"></span>

                                                        </div>



                                                        <h4 class="text-primary">Receiver Acc. Info</h4>
                                                        <hr class="mt-0">
                                                        <div class="row">
                                                            <p class="col-md-5 transfer-detail-text">Receiver Name: </p>
                                                            <span
                                                                class="text-primary o-wrap display_receiver_name col-md-7"></span>

                                                            <p class="col-md-5 transfer-detail-text">Receiver Phone Number:
                                                            </p>
                                                            <span
                                                                class="text-primary o-wrap display_receiver_phoneNum col-md-7"></span>

                                                            <p class="col-md-5 hide-if-self-transfer transfer-detail-text">
                                                                Receiver Address:</p>
                                                            <span
                                                                class="text-primary o-wrap hide-if-self-transfer display_receiver_address col-md-7"></span>

                                                        </div>
                                                        <hr class="mt-0">
                                                        <div class="row">
                                                            <p class="col-md-5 mt-2 text-primary transfer-detail-text">
                                                                Transfer Amount:</p>
                                                            <h4 class="row text-danger align-items-center  mt-2 col-md-7">
                                                                <span class="display_currency mr-1"></span>
                                                                <span class="display_amount o-wrap "></span>

                                                            </h4>

                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group text-center display_button_print">

                                                    <span>&nbsp;
                                                        <span>&nbsp; <button class="btn btn-light btn-rounded"
                                                                type="button" id="print_receipt"
                                                                onclick="window.print()">Print
                                                                Receipt
                                                            </button></span>
                                                </div> --}}
                                                </div>

                                                {{-- <div class="col-md-4 m-2 self_summary"
                                                style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                                <br><br>
                                                <div class=" col-md-12 card card-body">
                                                    <div class="row">
                                                        <p class="col-md-5">Account Name:</p>
                                                        <span
                                                            class="text-primary display_from_account_name_self col-md-7"></span>

                                                        <h6 class="col-md-5">Account Number:</h6>
                                                        <span
                                                            class="text-primary display_from_account_no_self col-md-7"></span>

                                                        <h6 class="col-md-5">Available Balance:</h6>
                                                        <span
                                                            class="text-primary display_from_account_amount_self col-md-7"></span>

                                                        <h6 class="col-md-5">Account Currency:</h6>
                                                        <span
                                                            class="text-primary display_currency_self col-md-7"></span>

                                                        <h6 class="col-md-5">Amount:</h6>
                                                        <span class="text-primary display_amount_self col-md-7"></span>


                                                        <h6 class="col-md-5">Receiver Name: </h6>
                                                        <span
                                                            class="text-success display_receiver_name_self col-md-7">{{
                                                            session()->get('userAlias') }}</span>

                                                        <h6 class="col-md-5">Receiver Phone Number:</h6>
                                                        <span
                                                            class="text-success display_receiver_phoneNum_self col-md-7">{{
                                                            session()->get('customerPhone') }}</span>

                                                        <h6 class="col-md-5">Receiver Address:</h6>
                                                        <span
                                                            class="text-success display_receiver_address_self col-md-7"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group text-center display_button_print">

                                                    <span>&nbsp;
                                                        <span>&nbsp; <button class="btn btn-light btn-rounded"
                                                                type="button" id="print_receipt"
                                                                onclick="window.print()">Print
                                                                Receipt
                                                            </button></span>
                                                </div>
                                            </div> --}}


                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="reverse_korpor_page">
                    <div class="col-md-12">
                        <div class="cards_table row">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-2 " id="">
                                <div class="p-3 mt-4 mt-lg-0 site-card">
                                    <br>

                                    <div class="card-box">
                                        <b class="text-primary">Unredeemed</b>
                                        <div class="card mb-2 bg-info">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <form class="form-inline">
                                                            <div class="form-group">
                                                                <select class="form-control unredeemed"
                                                                    id="unredeemed_account" required>
                                                                    <option disabled selected value="">Select Account Number
                                                                    </option>
                                                                    @include("snippets.accounts")
                                                                    {{-- @foreach (session()->get('customerAccounts') as $i => $account)
                                                                <option
                                                                    value="{{ $account->accountType . ' ~ ' . $account->accountDesc . ' ~ ' . $account->accountNumber . ' ~ ' . $account->currency . ' ~ ' . $account->availableBalance }}">
                                                                    {{ $account->accountDesc . ' || ' .
                                                                    $account->accountNumber . '||' . $account->currency
                                                                    . ' ' . $account->availableBalance }}
                                                                </option>
                                                                @endforeach --}}
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    {{-- <div class="col-sm-4">
                                                    <div class="text-sm-right">
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            id="submit_unredeemed_account"><i
                                                                class="mdi mdi-plus-circle mr-1"></i>Submit</button>
                                                    </div>
                                                </div><!-- end col--> --}}
                                                </div>
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->

                                        <div class="table-responsive table-bordered accounts_display_area">
                                            <table id="" class="table table-striped mb-0 ">
                                                <thead>
                                                    <tr class="bg-primary text-white ">
                                                        <td> <b> Reference Number </b> </td>
                                                        <td> <b> Receiver Name </b> </td>
                                                        <td> <b> Receiver Telephone </b> </td>
                                                        <td> <b> Receiver Address </b> </td>
                                                        <td> <b> Amount </b> </td>
                                                        <td> <b> Reverse </b></td>
                                                    </tr>
                                                </thead>
                                                <tbody style="background-color:white;" id="korpor_reversal_list_display">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane" id="redeem_korpor_page">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6  pt-5 px-4 m-2 site-card " id="request_form_div"
                                        style="max-height: 75%">

                                        <form action="#" class="select_beneficiary" id="redeem_korpor_payment_details_form"
                                            autocomplete="off" aria-autocomplete="none">
                                            @csrf

                                            <div class="col-md-12">
                                                {{-- <br><br><br> --}}
                                                <div class="row">
                                                    {{-- <div class="col-md-1"></div> --}}

                                                    <div class="col-md-12 redeem_korpor">

                                                        <p class="text-muted font-14 m-b-20">
                                                            <span> <i class="fa fa-info-circle  text-red"></i> <b
                                                                    style="color:red;">Please
                                                                    Note:&nbsp;&nbsp;</b> <span
                                                                    class="">Enter the
                                                                    remittance and phone number for korpor payment details.

                                                                    <hr>
                                                        </p>


                                                        <div class="form-group row">

                                                            <b class="col-md-5 text-primary"> Mobile Number &nbsp; <span
                                                                    class="text-danger">*</span></b>


                                                            <input type="text" class="form-control col-md-7" id="mobile_no"
                                                                autocomplete="off" placeholder="Enter Phone Number"
                                                                required>
                                                        </div>

                                                        <div class=" form-group row">

                                                            <b class="col-md-5 text-primary"> Remittance Number:
                                                                &nbsp; <span class="text-danger">*</span></b>

                                                            <input type="text" class="form-control col-md-7"
                                                                id="remittance_no" placeholder="Enter Remittance Number"
                                                                autocomplete="off"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                required>
                                                        </div>

                                                        <div class="form-group text-right ">
                                                            <button type="button"
                                                                class="btn btn-primary btn-rounded mt-2 waves-effect waves-light disappear-after-success "
                                                                id="proceed_to_redeem_button">
                                                                <span id="next-text">Proceed</span> &nbsp;<i
                                                                    class="fe-arrow-right"></i>
                                                            </button>
                                                        </div>


                                                    </div>
                                                    <div class="col-md-12 korpor_details" style="display: none">
                                                        <div class="form-group row ">
                                                            <b class="col-md-12 text-primary">Select Account To Redeem Into
                                                                &nbsp;
                                                                <span class="text-danger"></span> </b>
                                                            <select class="form-control col-md-12 " id="redeem_account"
                                                                required>
                                                                <option disabled selected value=""> ---
                                                                    Select
                                                                    Account ---
                                                                </option>
                                                                @include("snippets.accounts")
                                                            </select>
                                                        </div>
                                                        <hr style="padding-top: 0px; padding-bottom: 0px;">

                                                        <div class="form-group row">

                                                            <b class="col-md-5 text-primary"> Receiver's Name:</b>


                                                            <input type="text" class="form-control col-md-7"
                                                                id="receiver_name_redeem" autocomplete="off" readonly>
                                                            <br>

                                                        </div>
                                                        <div class="form-group row">

                                                            <b class="col-md-5 text-primary"> Receiver's Phone:
                                                            </b>

                                                            <input type="text" class="form-control col-md-7"
                                                                id="receiver_phone_redeem" autocomplete="off"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                readonly>
                                                        </div>

                                                        <div class="form-group row">

                                                            <b class="col-md-5 text-primary"> Receiver Address:
                                                            </b>

                                                            <input type="text" class="form-control col-md-7"
                                                                id="receiver_address_redeem" autocomplete="off"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                readonly>
                                                        </div>
                                                        <div class="form-group row">

                                                            <b class="col-md-5 text-primary"> Amount:</b>

                                                            <input type="text" class="form-control col-md-7"
                                                                id="receiver_amount_redeem" autocomplete="off"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                readonly>

                                                        </div>
                                                        {{-- <div class="form-group row">

                                                        <b class="col-md-5 text-primary"> Enter OTP:
                                                            &nbsp; <span class="text-danger">*</span></b>

                                                        <input type="text" class="form-control col-md-7"
                                                            id="receiver_otp_redeem" placeholder="One Time Password"
                                                            autocomplete="off"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                            required>
                                                    </div> --}}



                                                        <div class="form-group text-right ">
                                                            <button type="button"
                                                                class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                                id="done_button">
                                                                <span id="redeem-text">Redeem</span>

                                                            </button>
                                                        </div>


                                                    </div>

                                                    {{-- <div class="col-md-1"></div> --}}
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-md-5 m-2 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-ride="carousel" style="min-height: 120px; max-height: auto;">
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="carousel-item active">
                                                            <img class="d-block img-fluid" style="height: 30rem"
                                                                src="{{ asset('assets/images/rokel/sim_korpor_5.jpeg') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" style="height: 30rem"
                                                                src="{{ asset('assets/images/rokel/sim_korpor_3.jpeg') }}"
                                                                alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" style="height: 30rem"
                                                                src="{{ asset('assets/images/rokel/sim_korpor_4.jpeg') }}"
                                                                alt="Third slide">
                                                        </div>
                                                    </div>
                                                    <a class="carousel-control-prev" href="#carouselExampleControls"
                                                        role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleControls"
                                                        role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="korpor_trans_page">

                    <div class="col-md-12">
                        <div class="cards_table row">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-2 customize_card" id=""
                                style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                <div class="p-3 mt-4 mt-lg-0 rounded">
                                    <br>

                                    <div class="card-box">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a href="#home" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link  text-primary">
                                                    <b>Unredeemed/Pending</b>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#profile" data-toggle="tab" aria-expanded="true"
                                                    class="nav-link active text-primary">
                                                    <b>Completed</b>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#messages" data-toggle="tab" aria-expanded="false"
                                                    class="nav-link text-primary">
                                                    <b>Reversed</b>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="home">

                                                <div class="card mb-2 bg-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <form class="form-inline">
                                                                    <div class="form-group">
                                                                        <select class="form-control unredeemed"
                                                                            id="unredeemed_history_account" required>
                                                                            <option disabled selected value="">Select
                                                                                Account Number</option>
                                                                            @foreach (session()->get('customerAccounts') as $i => $account)
                                                                                <option
                                                                                    value="{{ $account->accountType . ' ~ ' . $account->accountDesc . ' ~ ' . $account->accountNumber . ' ~ ' . $account->currency . ' ~ ' . $account->availableBalance }}">
                                                                                    {{ $account->accountDesc . ' || ' . $account->accountNumber . ' || ' . $account->currency . ' ' . $account->availableBalance }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="text-sm-right">
                                                                    <button type="button"
                                                                        class="btn btn-primary waves-effect waves-light"
                                                                        id="submit_account_no_unredeemed"><i
                                                                            class="mdi mdi-plus-circle mr-1"></i>Submit</button>
                                                                </div>
                                                            </div><!-- end col-->
                                                        </div>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->

                                                <div class="table-responsive table-bordered accounts_display_area">
                                                    <table id="" class="table table-striped mb-0 ">
                                                        <thead>
                                                            <tr class="bg-primary text-white ">
                                                                <td> <b> Reference Number </b> </td>
                                                                <td> <b> Receiver Name </b> </td>
                                                                <td> <b> Receiver Telephone </b> </td>
                                                                <td> <b> Receiver Address </b> </td>
                                                                <td> <b> Amount </b> </td>
                                                                <td> <b>Status</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="background-color:white;"
                                                            id="unredeemed_korpor_history_display">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane show active" id="profile">

                                                <div class="card mb-2 bg-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <form class="form-inline">
                                                                    <div class="form-group">
                                                                        <select class="form-control redeemed" required>
                                                                            <option disabled selected value="">Select
                                                                                Account Number</option>

                                                                            @foreach (session()->get('customerAccounts') as $i => $account)
                                                                                <option
                                                                                    value="{{ $account->accountType . ' ~ ' . $account->accountDesc . ' ~ ' . $account->accountNumber . ' ~ ' . $account->currency . ' ~ ' . $account->availableBalance }}">
                                                                                    {{ $account->accountDesc . ' || ' . $account->accountNumber . ' || ' . $account->currency . ' ' . $account->availableBalance }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="text-sm-right">
                                                                    <button type="button"
                                                                        class="btn btn-primary waves-effect waves-light"
                                                                        id="submit_account_no_redeemed"><i
                                                                            class="mdi mdi-plus-circle mr-1"></i>Submit</button>
                                                                </div>
                                                            </div><!-- end col-->
                                                        </div>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->

                                                <div class="table-responsive table-bordered accounts_display_area">
                                                    <table id="" class="table mb-0 ">
                                                        <thead>
                                                            <tr class="bg-primary text-white ">
                                                                <td> <b> Reference Number </b> </td>
                                                                <td> <b> Receiver Name </b> </td>
                                                                <td> <b> Receiver Telephone </b> </td>
                                                                <td> <b> Receiver Address </b> </td>
                                                                <td> <b> Amount </b> </td>
                                                                <td> <b>Status</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="background-color:white;"
                                                            class="redeemed_korpor_list_display">


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="messages">

                                                <div class="card mb-2 bg-info">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <form class="form-inline">
                                                                    <div class="form-group">
                                                                        <select class="form-control reversed" required>
                                                                            <option value="" selected disabled>Select
                                                                                Account Number</option>
                                                                            @foreach (session()->get('customerAccounts') as $i => $account)
                                                                                <option
                                                                                    value="{{ $account->accountType . ' ~ ' . $account->accountDesc . ' ~ ' . $account->accountNumber . ' ~ ' . $account->currency . ' ~ ' . $account->availableBalance }}">
                                                                                    {{ $account->accountDesc . ' || ' . $account->accountNumber . ' || ' . $account->currency . ' ' . $account->availableBalance }}
                                                                                </option>
                                                                            @endforeach

                                                                        </select>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="text-sm-right">
                                                                    <button type="button"
                                                                        class="btn btn-primary waves-effect waves-light"
                                                                        id="submit_account_no_reversed"><i
                                                                            class="mdi mdi-plus-circle mr-1"></i>Submit</button>
                                                                </div>
                                                            </div><!-- end col-->
                                                        </div>
                                                    </div> <!-- end card-body-->
                                                </div> <!-- end card-->


                                                <div class="table-responsive table-bordered accounts_display_area">
                                                    <table id="" class="table mb-0 ">
                                                        <thead>
                                                            <tr class="bg-primary text-white ">
                                                                <td> <b> Reference Number </b> </td>
                                                                <td> <b> Receiver Name </b> </td>
                                                                <td> <b> Receiver Telephone </b> </td>
                                                                <td> <b> Receiver Address </b> </td>
                                                                <td> <b> Amount </b> </td>
                                                                <td> <b>Status</b></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="background-color:white;"
                                                            class="reversed_korpor_list_display">


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                @include("snippets.pinCodeModal")
            </div>
        </div>
    </div>
    <script>
        const customerInfo = new Object();
        customerInfo.customerType = @json(session()->get('customerType'));
        customerInfo.userAlias = @json(session()->get('userAlias'));
        customerInfo.userPhone = @json(session()->get('customerPhone'));
        customerInfo.userEmail = @json(session()->get('email'));
    </script>
    <script>
        @if (config('app.corporate'))
            const ISCORPORATE = true;
        @else
            const ISCORPORATE = false;
        @endif
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
    </script>
    <script src="{{ asset('assets/js/pages/payments/e-korpor.js') }}">

    </script>
@endsection
