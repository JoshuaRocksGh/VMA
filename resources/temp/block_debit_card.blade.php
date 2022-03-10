@extends('layouts.master')


@section('content')


<div class="">

    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-primary">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    MANAGE CARDS

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Account Services </b> &nbsp; > &nbsp; <b class="text-danger">MANAGE CARDS</b>


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

                        {{-- <div class="row">
                            <div class="col-md-12">


                                <span class="text-sm-right float-left">


                                </span>

                                <span class="text-sm-right float-right">

                                    <div class="btn-group drop-left">
                                        <button type="button" class="btn btn-primary dropdown-toggle btn-rounded"
                                            data-toggle="dropdown" aria-expanded="false"> Select Account <i
                                                class="mdi mdi-chevron-down"></i> </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ url('add-same-bank-beneficiary') }}">Same Bank</a>
                                            <a class="dropdown-item"
                                                href="{{ url('add-local-bank-beneficiary') }}">Other Local Bank
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ url('add-international-bank-beneficiary') }}">International
                                                Bank </a>
                                        </div>
                                    </div>
                                </span>


                            </div>
                        </div> --}}


                        <div class="cards_table row">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-2 customize_card" id="transaction_summary"
                                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                    <div class="p-3 mt-4 mt-lg-0 rounded">
                                        <br>

                                        <table id="datatable-buttons"
                                            class="table table-bordered bg-white  table-striped dt-responsive nowrap w-100 beneficiary_list_display">
                                            {{-- <table id="datatable-buttons" class="table table-bordered table-striped dt-responsive nowrap w-100"> --}}
                                            <thead>
                                                <tr class="bg-primary text-white">
                                                    <th> <b> Account Number </b> </th>
                                                    <th> <b> Card Number </b> </th>
                                                    <th><b>Card Type</b></th>
                                                    <th> <b> Card Start </b> </th>
                                                    <th> <b> Card Expiry </b> </th>
                                                    <th> <b> Card Status </b> </th>
                                                    <th> <b>Actions</b></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td>004001216997442165</td>
                                                    <td>1447866768967681</td>
                                                    <td>Visa</td>
                                                    <td>01/05/2021</td>
                                                    <td>01/06/2023</td>
                                                    <td>Blocked</td>
                                                    <td>
                                                        <a href="" title="block" data-toggle="modal" data-target=".full-width-modal"><span class="fe-slash noti-icon text-danger"></span></a>&nbsp;&nbsp;
                                                        <a href="" title="activate" data-toggle="modal" data-target=".full-width-modal"><span class="fe-toggle-right noti-icon text-success"></span></a>&nbsp;&nbsp;
                                                        <a href="" title="replace"><span class="fe-repeat noti-icon text-primary"></span></a>

                                                    </td>

                                                </tr>
                                                <tr class="">
                                                    <td>004001216997442276</td>
                                                    <td>1447866768967570</td>
                                                    <td>Credit Card</td>
                                                    <td>01/05/2020</td>
                                                    <td>01/06/2022</td>
                                                    <td>Active</td>
                                                    <td>
                                                        <a href="" title="block" data-toggle="modal" data-target=".full-width-modal"><span class="fe-slash noti-icon text-danger"></span></a>&nbsp;&nbsp;
                                                        <a href="" title="activate"><span class="fe-toggle-right noti-icon text-success"></span></a>&nbsp;&nbsp;
                                                        <a href="" title="replace"><span class="fe-repeat noti-icon text-primary"></span></a>

                                                    </td>

                                                </tr>
                                            </tbody>


                                        </table>

                                    </div>


                            </div>
                        </div>

                        <div id="" class="modal fade full-width-modal" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-full-width">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="fullWidthModalLabel">Modal Heading</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" >

                                            <div class=" col-md-4 m-2" id="card_processing_request"
                                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                                        <br><br><br>

                                                        <form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off"
                                                            aria-autocomplete="none">
                                                            @csrf
                                                            <div class="row container">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-9">

                                                                    {{-- <br><br><br> --}}
                                                                    <div class="row">
                                                                        {{-- <div class="col-md-1"></div> --}}

                                                                        <div class="col-md-12">

                                                                            <div class="form-group row mb-3">
                                                                                <b class="col-md-12 text-primary">My Account &nbsp; <span
                                                                                        class="text-danger">*</span> </b>


                                                                                <select class="form-control col-md-12 " id="my_account"
                                                                                    required>
                                                                                    <option value="">Select Account</option>
                                                                                </select>
                                                                            </div>

                                                                            <div class="form-group row">

                                                                                <b class="col-md-12 text-primary" for="leaflet" >
                                                                                    Select Card
                                                                                    <span class="text-danger">*</span></b>

                                                                                        <select class="form-control col-md-12" id="cardValue" required>
                                                                                            <option value="">Select Card</option>
                                                                                            <option value="1447866768967681">Visa Card-1447866768967681</option>
                                                                                            <option value="144786676896768">Credit Card - 144786676896768</option>
                                                                                            <option value="144786676896768">Debit Card - 144786676896768</option>
                                                                                        </select>
                                                                            </div>

                                                                            <div class="form-group row">

                                                                                <b class="col-md-12 text-primary">Branch
                                                                                    <span class="text-danger">*</span></b>

                                                                                    <select class="form-control col-md-12" id="pUBranch" required>
                                                                                        <option value="">-- Selected Branch --</option>
                                                                                    </select>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <b class="col-md-6 text-primary">Enter Pin
                                                                                    <span class="text-danger">*</span></b>

                                                                                    <input type="text" class="form-control col-md-6" id="pin" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">


                                                                            </div>




                                                                            <div class="form-group row text-right ">
                                                                                <button type="button"
                                                                                class=" col-md-4 btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                                                id="submit_blockCard_request">
                                                                                    <span class="block-text">Block</span>
                                                                                    <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner-1" aria-hidden="true"></span>
                                                                                    <span id="spinner-text-block">Loading...</span>
                                                                                </button>
                                                                                <button type="button"
                                                                                class="col-md-4 btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                                                id="submit_activateCard_request">
                                                                                <span class="activate-text">Activate</span>
                                                                                <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner" aria-hidden="true"></span>
                                                                                <span id="spinner-text">Loading...</span>
                                                                            </button>
                                                                            <button type="button"
                                                                                class="col-md-4 btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                                                id="submit_replaceCard_request">
                                                                                <span class="replace-text">Replace</span>
                                                                                <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner-r" aria-hidden="true"></span>
                                                                                <span id="spinner-text-replace">Loading...</span>
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


                                            <div class="col-md-7 m-2" id="card_processing_page"
                                                        style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                                                        <br><br>
                                                        <div class=" col-md-12 card card-body">
                                                            {{-- <br><br> --}}
                                                            <div class="row">
                                                                <div class="box">
                                                                    <img class="visa_logo" src="{{ asset("land_asset/images/visa04.png") }}" height="100" width="100"/>

                                                                        <div class="chip">

                                                                        <img src="{{ asset("land_asset/images/chip.png") }}" height="60" width="70">
                                                                        </div>

                                                                        <div class="number">
                                                                        <h class="card_digits">Card Number</h>
                                                                            <h1 class="coded">8356</h1>
                                                                        </div>

                                                                        <div class="number02">
                                                                        <h4 class="good_thru">good thru</h4>
                                                                            <t class="expiry">06/26</t>

                                                                        </div>

                                                                        <div class="name">

                                                                        <h2 class="card_holder">{{ session()->get('userAlias') }}</h2>
                                                                        </div>

                                                                        <div class="mastercard">
                                                                        <img src="{{ asset("land_asset/images/favicon.ico") }}" height="60" width="80">
                                                                        </div>



                                                                    </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="form-group text-center display_button_print">

                                                            <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                                    id="back_button" >Back</button> &nbsp; </span>
                                                            <span>&nbsp;
                                                            <span>&nbsp; <button class="btn btn-light btn-rounded hide_on_print"
                                                                    type="button" id="print_receipt" onclick="window.print()">Print
                                                                    Receipt
                                                                </button></span>
                                                        </div> --}}
                                            </div>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection


@section('scripts')


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>

function my_account() {
            $.ajax({
                type: 'GET',
                url:  'get-my-account',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {

                        $('#my_account').append($('<option>', {
                            value: data[index].accountType + '~' + data[index].accountDesc +
                                '~' + data[index].accountNumber + '~' + data[index]
                                .currency + '~' + data[index].availableBalance
                        }).text(data[index].accountType + '~' + data[index].accountNumber +
                            '~' + data[index].currency + '~' + data[index].availableBalance));

                    });
                },

            })
        }
// format for cc number on card
function cc_format(value) {
    var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
    var matches = v.match(/\d{4,16}/g);
    var match = matches && matches[0] || '';
    var parts = []

    for (i=0, len=match.length; i<len; i+=4) {
        parts.push(match.substring(i, i+4))
    }

    if (parts.length) {
        console.log(parts.join(''));
        return parts.join(' ');

    } else {
        console.log("am here");
        console.log(value);
        return value;

    }
}

function branches() {
            $.ajax({
                type: 'GET',
                url:  'get-bank-branches-list-api',
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
console.log('good');

$(document).ready(function(){




    $('#card_processing_request').hide();
    $('#spinner').hide();
    $('#spinner-text').hide();
    $('#spinner-1').hide();
    $('#spinner-text-block').hide();
    $('#spinner-r').hide();
    $('#spinner-text-replace').hide();
    $('#card_processing_page').hide();
    $('.display_button').hide();
    setTimeout(function() {
                branches()
                my_account()
            }, 1000);

            $(".full-width-modal").click(function(){
        $('#card_processing_request').show();
        $('#card_processing_page').show();
    });

    //code to change code digits
    console.log('Loading complete');
    $("#cardValue").change(function() {
                var cardValue = $("#cardValue").val();
                var optionValue = $("#cardValue option:selected").val();
                console.log(cc_format(optionValue));
                $(".card_digits").text(cc_format(optionValue));
                console.log(optionValue);
            });

    $("#submit_blockCard_request").click(function(){
        let cardNumber = $("#cardValue").val();
        // let branch =
    });

    var value = $("#cardValue option:selected").val();
    console.log(value);

    var num = cc_format(value);
    console.log(num);

});

</script>

@endsection
