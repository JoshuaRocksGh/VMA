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
                                                    <input type="text" class="form-control col-md-8" id="other_name">
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

                                            </div>




                                        </div>

                                        <legend></legend>

                                        <div class="form-group text-right">
                                            <button type="button"
                                                class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                id="proceed_button">
                                                <span id="proceed-text">Proceed</span>
                                                <span class="spinner-border spinner-border-sm mr-1"
                                                    id="spinner-proceed" role="status"
                                                    aria-hidden="true"></span>
                                                <span id="spinner-text-proceed">Loading...</span>
                                            </button>
                                        </div>
                                                <br>

                                            </div>




                                            <div class="col-md-1"></div>
                                </form>

                            </div><!-- end col -->


                        </div>

                            </div>
                        </div>
                    </div>

                </div> <!-- end col -->

            </div>

        </div>



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
                        url:  'get-accounts-api',
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

            //function to alert users.
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

                $(document).ready(function() {

                    $('#spinner-proceed').hide();
                    $('#spinner-text-proceed').hide();

                            setTimeout(function() {
                                from_account()
                            },200);




                            //console account
                            $("#from_account").change(function(){
                                var from_account = $("#from_account").val();
                                console.log(from_account);
                            });

                            //console first name entered
                            $("#first_name").change(function(){
                                var first_name = $("#first_name").val();;
                                console.log(first_name);
                            });

                            //console other name entered
                            $("#other_name").change(function(){
                                var other_name = $("#other_name").val();;
                                console.log(other_name);
                            });

                            //console log last name entered
                            $("#last_name").change(function(){
                                var last_name = $("#last_name").val();;
                                console.log(last_name);
                            });

                            //console log email entered
                            $("#email").change(function(){
                                var email = $("#email").val();;
                                console.log(email);
                            });

                    $("#proceed_button").click(function(){

                        //declare variables to be used universally here
                        // let account= $("#from_account").val();
                        let first_name = $("#first_name").val();
                        let other_name = $("#other_name").val();
                        let last_name = $("#last_name").val();
                        let email = $("#email").val();


                        //validate to ensure fields are not empty
                        // account.trim() =='' ||
                        if(  first_name=='' || other_name=='' || last_name=='' || email == ''){
                            toaster('Field must not be empty', 'error', 10000)
                            return false;
                        }
                        else{
                            $("#proceed-text").hide();
                            $("#spinner-proceed").show();
                            $("#spinner-text-proceed").show();

                            $.ajax({

                                    type: 'POST',
                                    url:  'create-originator-api',
                                    datatype: "application/json",
                                    'data': {
                                        // 'accountNumber': account,
                                        'first_name': first_name,
                                        'other_name': other_name,
                                        'last_name': last_name,
                                        'email': email
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {

                                        console.log(response)

                                        if (response.responseCode == '000') {
                                            toaster(response.message, 'success', 20000);
                                            $("#request_form_div").hide();
                                            $('.display_button_print').show();
                                        } else {

                                            toaster(response.message, 'error', 9000);

                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $('.submit-text').show();
                                            // $('#confirm_payment').show();
                                            // $('#confirm_button').attr('disabled', false);
                                        }
                                    }
                            });

                        }
                    });

                });

    </script>

@endsection
