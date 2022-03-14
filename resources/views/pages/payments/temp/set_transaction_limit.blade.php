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
                Set Transfer Limit

            </h4>
        </div>

        <div class="col-md-6 text-right">
            <h6>

                <span class="flaot-right">
                    <b class="text-primary"> Settings </b> &nbsp; > &nbsp; <b class="text-danger">Transfer Limit</b>


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
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6  m-2" id="request_form_div"
                                                                            style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                                                            <br><br><br>

                                                                            <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                                                                                aria-autocomplete="none">
                                                                                @csrf

                                                                            <div class="col-md-12">
                                                                                        {{-- <br><br><br> --}}
                                                                                        <div class="row">
                                                                                            {{-- <div class="col-md-1"></div> --}}

                                                                                            <div class="col-md-12 redeem_cardless">

                                                                                                <p class="text-muted font-14 m-b-20">
                                                                                                    <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please
                                                                                                            Note:&nbsp;&nbsp;</b> <span class="">Direct to bank offers you the opportunity to set limits for funds transfer.

                                                                                                    <hr>
                                                                                                </p>


                                                                                                        <div class="form-group row">

                                                                                                            <b class="col-md-5 text-primary"> RTGS LIMIT &nbsp; <span
                                                                                                                    class="text-danger">*</span></b>


                                                                                                            <input type="text" class="form-control col-md-7"
                                                                                                                id="rtgs_limit" autocomplete="off" value="100000000"
                                                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                                                                required>


                                                                                                        </div>


                                                                                                        <div class="form-group row">

                                                                                                            <b class="col-md-5 text-primary"> DIRECT CREDIT LIMIT
                                                                                                                &nbsp; <span class="text-danger">*</span></b>

                                                                                                            <input type="text" class="form-control col-md-7"
                                                                                                                id="direct_credit_limit"
                                                                                                                placeholder="enter phone number" autocomplete="off" value="110"
                                                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                                                                required>

                                                                                                        </div>



                                                                                                        <div class="form-group row">

                                                                                                            <b class="col-md-5 text-primary"> ROKEL LIMIT &nbsp; <span
                                                                                                                    class="text-danger">*</span></b>


                                                                                                            <input type="text" class="form-control col-md-7" value="1000000000"
                                                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                                                                id="rokel_limit" autocomplete="off" required>


                                                                                                        </div>


                                                                                                        <div class="form-group row">

                                                                                                            <b class="col-md-5 text-primary"> DIRECT CREDIT BULK LIMIT &nbsp; <span
                                                                                                                    class="text-danger">*</span></b>


                                                                                                            <input type="text" class="form-control col-md-7" value="70"
                                                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                                                                id="direct_credit_bulk_limit" autocomplete="off" required>


                                                                                                        </div>


                                                                                                        <div class="form-group row">

                                                                                                            <b class="col-md-5 text-primary"> ROKEL BULK LIMIT &nbsp; <span
                                                                                                                    class="text-danger">*</span></b>


                                                                                                            <input type="text" class="form-control col-md-7" value="1000000000"
                                                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                                                                                id="rokel_bulk_limit" autocomplete="off" required>


                                                                                                        </div>


                                                                                                        {{-- <div class="form-group row">

                                                                                                            <b class="col-md-5 text-primary" for="pin">
                                                                                                                Enter Your Pin
                                                                                                                <span class="text-danger">*</span></b>
                                                                                                            <input type="password" class="form-control col-md-7"
                                                                                                                id="user_pin_reverse"
                                                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">



                                                                                                        </div> --}}
                                                                                                        <br><br><br>
                                                                                                        <div class="form-group text-right ">
                                                                                                            {{-- <button type="button"
                                                                                                                class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success "
                                                                                                                id="save_order_button">
                                                                                                                <span id="save-order-text">Save Order</span>
                                                                                                                <span class="spinner-border spinner-border-sm mr-1"
                                                                                                                    id="spinner-save-order" role="status"
                                                                                                                    aria-hidden="true"></span>
                                                                                                                <span id="spinner-text-save-order">Loading...</span>
                                                                                                            </button> --}}

                                                                                                            <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#centermodal">Save Order <span class="mdi mdi-arrow-right"></span></button>
                                                                                                        </div>


                                                                                            </div>


                                                    {{-- <div class="col-md-1"></div> --}}
                                                                                        </div>

                                                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-md-5">
                                        <br>
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="carouselExampleControls" class="carousel slide"
                                                    data-ride="carousel" style="min-height: 120px; max-height: auto;">
                                                    <div class="carousel-inner" role="listbox">
                                                        <div class="carousel-item active">
                                                            <img class="d-block img-fluid" style="min-height: 100%"
                                                                src="{{ asset('assets/images/ads/sim_korpor_ad_9.jpeg') }}"
                                                                alt="First slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" style="height: auto;"
                                                                src="{{ asset('assets/images/ads/sim_korpor_ad_10.jpeg') }}"
                                                                alt="Second slide">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img class="d-block img-fluid" style="min-height"
                                                                src="{{ asset('assets/images/ads/sim_korpor_ad_7.jpeg') }}"
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
                        </div>
                    </div>

                </div> <!-- end col -->

            </div>

        </div>

        <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="topModalLabel">Verification</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h4>Do you want to continue this process</h4>
                        {{-- <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"  data-dismiss="modal">No</button>
                        <button type="button" id="save_order_button" class="btn btn-primary">Yes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>


@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
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

                    $('#spinner-save-order').hide();
                    $('#spinner-text-save-order').hide();

                            // setTimeout(function() {
                            //     from_account()
                            // },200);




                            //console account
                            $("#rtgs_limit").click(function(){
                                var rtgs_limit = $("#rtgs_limit").val();
                                console.log(rtgs_limit);
                            });

                            //console first name entered
                            $("#direct_credit_limit").click(function(){
                                var direct_credit_limit = $("#direct_credit_limit").val();;
                                console.log(direct_credit_limit);
                            });

                            //console other name entered
                            $("#rokel_limit").click(function(){
                                var rokel_limit = $("#rokel_limit").val();;
                                console.log(rokel_limit);
                            });

                            //console log last name entered
                            $("#direct_credit_bulk_limit").click(function(){
                                var direct_credit_bulk_limit = $("#direct_credit_bulk_limit").val();;
                                console.log(direct_credit_bulk_limit);
                            });

                            //console log email entered
                            $("#rokel_bulk_limit").click(function(){
                                var rokel_bulk_limit = $("#rokel_bulk_limit").val();;
                                console.log(rokel_bulk_limit);
                            });

                    $("#save_order_button").click(function(){

                        //declare variables to be used universally here
                        // let account= $("#from_account").val();
                        let rtgs_limit = $("#rtgs_limit").val();
                        let direct_credit_limit = $("#direct_credit_limit").val();
                        let rokel_limit = $("#rokel_limit").val();
                        let direct_credit_bulk_limit = $("#direct_credit_bulk_limit").val();
                        let rokel_bulk_limit = $("#rokel_bulk_limit").val();

                        //validate to ensure fields are not empty
                        // account.trim() =='' ||
                        if(  rtgs_limit=='' || direct_credit_bulk_limit=='' || rokel_limit=='' || direct_credit_limit == ''){
                            toaster('Field must not be empty', 'error', 10000)
                            return false;
                        }
                        else{
                            $("#proceed-text").hide();
                            $("#spinner-proceed").show();
                            $("#spinner-text-proceed").show();

                            $.ajax({

                                    type: 'GET',
                                    url:  'set-transaction-limits-api',
                                    datatype: "application/json",
                                    data: {
                                        // 'accountNumber': account,
                                        'rtgs_limit': rtgs_limit,
                                        'direct_credit_limit': direct_credit_limit,
                                        'rokel_limit': rokel_limit,
                                        'direct_credit_bulk_limit': direct_credit_bulk_limit,
                                        'rokel_bulk_limit':rokel_bulk_limit
                                    },
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function(response) {

                                        console.log(response);




                                        if (response.responseCode == '000') {
                                            // toaster(response.message, 'success', 20000);
                                            toaster('Transaction is successful, Waiting for Approval', 'success', 20000);
                                            // $("#request_form_div").hide();
                                            // $('.display_button_print').show();

                                            setTimeout(function(){
                                                window.location.reload();
                                            }, 2000);

                                        } else {
                                            toaster('Transaction failed','error', 2000);
                                            // toaster(response.message, 'error', 9000);
                                        }
                                    }
                            });

                        }
                    });

                });

    </script>

@endsection
