@extends('layouts.master')

@section('content')

    <div class="___class_+?0___">

        <div class="container-fluid">
            <br>
            <!-- start page title -->
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-soft-blue waves-effect waves-light"><i
                            class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>
                </div>
                <div class="col-md-4">
                    <h4 class="text-primary">
                        <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                        BLOCK CARD

                    </h4>
                </div>

                <div class="col-md-4 text-right">
                    <h6>

                        <span class="flaot-right">
                            <b class="text-primary"> Account Services </b> &nbsp; > &nbsp; <b class="text-primary"> Card
                                Services</b> &nbsp; >
                            &nbsp; <b class="text-danger">Block Card
                            </b>


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
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                <div class=" col-md-7 m-2" id="request_form_div"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <br><br><br>

                                    <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                                        aria-autocomplete="none">
                                        @csrf
                                        <div class="row container">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10">

                                                {{-- <br><br><br> --}}
                                                <div class="row">
                                                    {{-- <div class="col-md-1"></div> --}}

                                                    <div class="col-md-12">

                                                        <div class="form-group row mb-3">
                                                            <b class="col-md-12 text-primary">Account card which will be
                                                                blocked &nbsp; <span class="text-danger">*</span>
                                                            </b>


                                                            <select class="form-control col-md-12 " id="my_account"
                                                                required>
                                                                <option value="">Select Account
                                                                </option>


                                                            </select>
                                                        </div>

                                                        <br>
                                                        <hr class="mt-0">


                                                        <div class="form-group row mb-3" id="pay_from_account">

                                                            <b class="col-md-4 text-primary">Type Of Card &nbsp;
                                                                <span class="text-danger">*</span></b>

                                                            <select class="form-control col-md-8" id="cardType" required>
                                                                <option value="">Select Type of Card</option>
                                                                <option value="Visa Card">Visa Card</option>
                                                                <option value="Master Card">Master Card</option>
                                                            </select>
                                                            <br>



                                                        </div>



                                                        <div class="form-group row">

                                                            <b class="col-md-4 text-primary"> Card Number &nbsp; <span
                                                                    class="text-danger">*</span></b>

                                                            <input type="text" class="form-control col-md-8"
                                                                id="card_number" placeholder="Enter Card Number"
                                                                autocomplete="off" aria-autocomplete="none">
                                                            {{-- <select class="form-control col-md-8" id="pUBranch"
                                                                placeholder="Select Pick Up Branch" required>
                                                                <option value="">Select Pick Up Branch</option>
                                                            </select> --}}
                                                            <br>

                                                        </div>
                                                        <div class="form-group row">

                                                            <b class="col-md-4 text-primary" for="pin">
                                                                Enter Pin
                                                                <span class="text-danger">*</span></b>
                                                            <input type="password" class="form-control col-md-8" id="pin"
                                                                placeholder="Enter Your Pin" autocomplete="off"
                                                                aria-autocomplete="none"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">



                                                        </div>

                                                        <div class="form-group text-right yes_beneficiary">
                                                            <button type="button"
                                                                class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                                id="btn_submit_request_statement">
                                                                <span class="submit-text">Submit</span>
                                                                <span class="spinner-border spinner-border-sm mr-1"
                                                                    role="status" id="spinner" aria-hidden="true"></span>
                                                                <span id="spinner-text">Loading...</span>
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

                                <div class="col-md-4 m-2" id="atm_request_summary"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <br><br>
                                    <div class=" col-md-12 card card-body">
                                        <h4 class="text-primary">Account Info.</h4>
                                        <hr class="mt-0">
                                        {{-- <br><br> --}}
                                        <div class="row">
                                            <span class="col-md-12 success-message"></span>
                                            <p class="col-md-5">Account Name:</p>
                                            <span class="text-primary display_my_account_name col-md-7"></span>

                                            <p class="col-md-5">Account Number:</p>
                                            <span class="text-primary display_my_account_no col-md-7"></span>

                                            <p class="col-md-5">Available Balance:</p>
                                            <span class="text-primary display_my_account_amount col-md-7"></span>

                                            <p class="col-md-5">Account Currency:</p>
                                            <span class="text-primary display_my_account_currency col-md-7"></span>
                                        </div>

                                        <h4 class="text-primary">Request Info.</h4>
                                        <hr class="mt-0">

                                        <div class="row">
                                            <p class="col-md-5">Type Of Card:</p>
                                            <span class="text-primary display_type_of_card col-md-7"></span>

                                            <p class="col-md-5">Card Number:</p>
                                            <span class="text-primary display_pick_up_branch col-md-7"></span>

                                        </div>

                                    </div>

                                    <div class="form-group text-center display_button">

                                        <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                id="back_button">Back</button> &nbsp; </span>
                                        <span>&nbsp;
                                            <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                    type="button" id="print_receipt" onclick="window.print()">Print
                                                    Receipt
                                                </button></span>
                                    </div>
                                </div>

                                {{-- <div class="col-md-8 text-center success_message" id="request_detail_div" style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <br><br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered table-striped">

                                                    <tbody>
                                                        <tr class="success_gif">
                                                            <td class="text-center bg-white" colspan="2">
                                                                <img src="{{ asset('land_asset/images/statement_success.gif') }}"
                                                                     alt="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Account Name:</td>
                                                            <td>
                                                                <span
                                                                    class="font-13 text-primary text-bold display_my_account_name"></span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Account Number:</td>
                                                            <td>
                                                                <span class="font-13 text-primary text-bold display_my_account_no"></span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Available Balance:</td>
                                                            <td>
                                                                <span class="font-15 text-primary h3 display_my_account_amount"> </span>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Account Currency:</td>
                                                            <td>
                                                                <span class="font-13 text-primary h3 display_my_account_currency"></span>

                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Type Of Card:</td>
                                                            <td>
                                                                <span class="font-13 text-primary h3 display_type_of_card"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pick Up Branch:</td>
                                                            <td>
                                                                <span
                                                                    class="font-13 text-success h3 display_pick_up_branch"></span>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Request Date: </td>
                                                            <td>
                                                                <span class="font-13 text-primary h3">{{ date('d F, Y') }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Posted BY: </td>
                                                            <td>
                                                                <span class="font-13 text-primary h3">{{ session()->get('userAlias') }}</span>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                            <br>

                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                </div>


                        </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function my_account() {
                $.ajax({
                    type: 'GET',
                    url: 'get-my-account',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('#my_account').append($('<option>', {
                                value: data[index].accountType + '~' + data[index].accountDesc +
                                    '~' + data[index].accountNumber + '~' + data[index]
                                    .currency + '~' + data[index].availableBalance
                            }).text(data[index].accountType + '||' + data[index].accountNumber +
                                '||' + data[index].currency + '  ' + data[index].availableBalance));

                        });
                    },

                })
            }

            function branches() {
                $.ajax({
                    type: 'GET',
                    url: 'get-bank-branches-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('#pUBranch').append($('<option>', {
                                value: data[index].branchCode + '~' + data[index]
                                    .branchDescription
                            }).text(data[index].branchDescription));

                        });
                    },

                })
            }

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

            function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            }




            $(document).ready(function() {

                setTimeout(function() {
                    branches()
                    my_account()
                }, 1000)

                $('#spinner').hide();
                $('#spinner-text').hide();
                $('#request_detail_div').hide();
                $('.display_button').hide();

                $("#my_account").change(function() {
                    var my_account = $(this).val();
                    console.log(my_account_info);
                    var my_account_info = my_account.split("~");
                    $(".display_my_account_no").text(my_account_info[0].trim());
                    $(".display_my_account_name").text(my_account_info[1].trim());
                    $(".display_my_account_no").text(my_account_info[2].trim());
                    $(".display_my_account_currency").text(my_account_info[3].trim());
                    $(".display_my_account_amount").text(formatToCurrency(parseFloat(my_account_info[4]
                        .trim())))
                    console.log(my_account);
                });

                $("#cardType").change(function() {
                    var cardType = $("#cardType").val();
                    var optionText = $("#cardType option:selected").text();
                    $(".display_type_of_card").text(optionText);
                    console.log("Card Type: " + optionText);
                })



                {{-- $("#pUBranch").change(function() {
                    $('.display_pick_up_branch').text("");
                    var pickUpBranch = $(this).val();
                    if (pickUpBranch != "") {

                        let branch_info = pickUpBranch.split("~")
                        $(".display_pick_up_branch").text(branch_info[1]);
                        console.log(branch_info[1]);
                        console.log(pickUpBranch);
                        console.log(branch_info[1]);
                    }

                }) --}}

                $("#card_number").keyup(function() {
                    var card_num = $(this).val();
                    $(".display_pick_up_branch").text(card_num);
                })

                // $("#startDate").change(function() {
                //     var startDate = $("#startDate").val();
                //     $(".display_trans_startDate").text("Start Date: " + startDate);
                //     console.log(startDate);
                // })

                // $("#endDate").change(function() {
                //     var endDate = $("#endDate").val();
                //     $(".display_trans_endDate").text("End Date: " + endDate);
                //     console.log(endDate);
                // })

                // $("#pin").keyup(function(){
                //     var pin = $("#pin").val();
                //     console.log(pin);
                // })


                $('#btn_submit_request_statement').click(function() {
                    // toaster("Please fill all required fields","error", 6000);
                    // return false;

                    //hide the spinner on for this screen
                    $('#spinner').hide();
                    $('#spinner-text').hide();


                    //statement request details/get values.
                    let my_account = $('#my_account').val();
                    let type_of_card = $('#cardType').val();
                    let pUBranch = $('#pUBranch').val();
                    // let transStartDate = $('#startDate').val();
                    // let transEndDate = $('#endDate').val();
                    let pin = $('#pin').val();
                    console.log(pin);


                    if (pUBranch == "" || my_account == "" || type_of_card == "" || pin == "") {
                        toaster("Please fill all required fields", "error", 6000);
                    } else {

                        //hide the texts on the button on press
                        $('#spinner').show();
                        $('#spinner-text').show();
                        $('.submit-text').hide();


                        {{-- let branch_info = pUBranch.split("~"); --}}
                        {{-- let branchCode = branch_info[0]; --}}
                        let type_of_card = $('#cardType').val();

                        my_account_info = my_account.split("~");
                        let accountNumber = my_account_info[2].trim();
                        var card_num = $("#card_number").val()


                        $.ajax({

                            type: 'POST',
                            url: 'block-card-request-api',
                            datatype: "application/json",
                            'data': {
                                'account_no': accountNumber.trim(),
                                'type_of_card': type_of_card,
                                'card_number': card_num.trim(),
                                'pin': pin
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {

                                console.log(response)

                                if (response.responseCode == '000') {
                                    Swal.fire(
                                        '',
                                        response.message,
                                        'success'
                                    )
                                    $('#spinner').hide()
                                    $('#spinner-text').hide()
                                    $(".submit-text").show()

                                } else {

                                    toaster(response.message, 'error', 9000);
                                    $('#spinner').hide()
                                    $('#spinner-text').hide()
                                    $(".submit-text").show()


                                }
                            }
                        });

                    }


                });

            });
        </script>

    @endsection
