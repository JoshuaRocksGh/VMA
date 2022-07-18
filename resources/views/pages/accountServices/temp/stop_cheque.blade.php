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
                    STOP CHEQUE

                </h4>
            </div>

            <div class="col-md-6 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Account Services </b> &nbsp; > &nbsp; <b class="text-danger">CHEQUE BOOK REQUEST</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>
</div>


   <div>

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
                                                    <div class="col-md-9">

                                                        {{-- <br><br><br> --}}
                                                        <div class="row">
                                                            {{-- <div class="col-md-1"></div> --}}

                                                            <div class="col-md-12">

                                                                <div class="form-group row mb-3">
                                                                    <b class="col-md-6 text-primary">My Account &nbsp; <span
                                                                            class="text-danger">*</span> </b>


                                                                    <select class="form-control col-md-6 " id="my_account"
                                                                        required>
                                                                        <option value="">Select Account
                                                                        </option>


                                                                    </select>
                                                                </div>




                                                                <div class="form-group row">

                                                                    <b class="col-md-6 text-primary" for="pin" >
                                                                        Cheque Number: FROM
                                                                        <span class="text-danger">*</span></b>
                                                                        <input type="text" class="form-control col-md-6" id="cheque_no_from"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                                                                            <br>




                                                                </div>

                                                                <div class="form-group row">

                                                                    <b class="col-md-6 text-primary" for="pin" >
                                                                        Cheque Number: TO
                                                                        <span class="text-danger">*</span></b>
                                                                        <input type="text" class="form-control col-md-6" id="cheque_no_to"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                                                                            <br>


                                                                </div>

                                                                <div class="form-group row">

                                                                    <b class="col-md-6 text-primary">Date Issued: &nbsp; <span
                                                                            class="text-danger">*</span></b>

                                                                            <input type="date" id="date_issued" class="form-control col-md-6"/>
                                                                            <br>

                                                                </div>

                                                                <div class="form-group row">

                                                                    <b class="col-md-6 text-primary" for="amount" >
                                                                        Amount
                                                                        <span class="text-danger">*</span></b>
                                                                        <input type="text" class="form-control col-md-6" id="amount"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">


                                                                </div>




                                                                <div class="form-group row">

                                                                    <b class="col-md-6 text-primary" for="pin" >
                                                                        Enter Your Pin
                                                                        <span class="text-danger">*</span></b>
                                                                        <input type="password" class="form-control col-md-6" id="pin"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">



                                                                </div>

                                                                <div class="form-group text-right yes_beneficiary">
                                                                    <button type="button"
                                                                    class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                                                                    id="submit_cheque_request">
                                                                    <span class="submit-text">Submit</span>
                                                                    <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner" aria-hidden="true"></span>
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
                                        {{-- <br><br> --}}
                                        <div class="row">
                                            <span class="col-md-12 success-message"></span>
                                            <h6 class="col-md-6">Account Name:</h6>
                                            <span class="text-primary display_my_account_name col-md-6"></span>

                                            <h6 class="col-md-6">Account Number:</h6>
                                            <span class="text-primary display_my_account_no col-md-6"></span>

                                            <h6 class="col-md-6">Available Balance:</h6>
                                            <span class="text-primary display_my_account_amount col-md-6"></span>

                                            <h6 class="col-md-6">Account Currency:</h6>
                                            <span class="text-primary display_my_account_currency col-md-6"></span>

                                            <h6 class="col-md-6">Cheque Number FROM:</h6>
                                            <span class="text-success display_cheque_no_from col-md-6"></span>

                                            <h6 class="col-md-6">Cheque Number TO:</h6>
                                            <span class="text-success display_cheque_no_to col-md-6"></span>

                                            <h6 class="col-md-6">Date Issued:</h6>
                                            <span class="text-success display_date_issued col-md-6"></span>


                                            <h6 class="col-md-6">Amount On Cheque:</h6>
                                            <span class="text-success display_currency col-md-2"></span>
                                            <span class="text-success display_amount col-md-4"></span>
                                        </div>
                                    </div>

                                    <div class="form-group text-center display_button_print">


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

            function my_account(){
                $.ajax({
                    type: 'GET',
                    'url' : 'get-my-account',
                    "datatype" : "application/json",
                    success:function(response){
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                        $('#my_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));

                        });
                    },

                })
            }





            function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            };


            function toaster(message, icon, timer)
            {
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
            $("#submit-text").hide();
            $("#spinner").hide();
            $("#spinner-text").hide();
            $(".display_button_print").hide();

            setTimeout(function(){
                my_account()
            }, 1000)



            $("#my_account").change(function() {
                var my_account = $(this).val()

                    my_account_info = my_account.split("~")
                    // set summary values for display
                    $(".display_my_account_type").text(my_account_info[0].trim())
                    $(".display_my_account_name").text(my_account_info[1].trim())
                    $(".display_my_account_no").text(my_account_info[2].trim())
                    $(".display_my_account_currency").text(my_account_info[3].trim())

                    $(".display_currency").text(my_account_info[3].trim()) // set summary currency

                    $(".display_my_account_amount").text(formatToCurrency(parseFloat(my_account_info[4]
                        .trim())))

                        console.log

                    $(".my_account_display_info").show()

            });


                $("#cheque_no_to").keyup(function() {
                    var cheque_no_to = $('#cheque_no_to').val()


                    if (cheque_no_to.trim() == '' ) {
                         toaster("Please cheque number can not be empty", "error", 6000);
                        $(this).val('')
                        return false;
                    } else {
                        $(".display_cheque_no_to").text(cheque_no_to);
                    }

                });


                $("#cheque_no_from").keyup(function() {
                    var cheque_no_from = $('#cheque_no_from').val()


                    if (cheque_no_from.trim() == '' ) {
                        toaster("Please cheque number can not be empty", "error", 6000);
                        $(this).val('')
                        return false;
                    } else {
                        $(".display_cheque_no_from").text(cheque_no_from);
                    }

                });


                $("#amount").keyup(function() {
                    var amount = $('#amount').val()
                    var my_account = $('#my_account').val()
                    console.log(amount)


                    {{-- if (my_account.trim() == '' ) {
                        toaster("Please select source accounts", "error", 6000);
                        $(this).val('')
                        return false;
                    } else {
                        $(".display_amount").text(formatToCurrency(parseFloat(amount)));
                    } --}}

                    //delete after use
                      $(".display_amount").text(formatToCurrency(parseFloat(amount)));

                });



            $("#date_issued").change(function() {
                $('.display_date_issued').text("")
                var date_issued = $(this).val()
                if(date_issued != ""){
                    console.log(date_issued)
                    $('.display_date_issued').text(date_issued)
                }
            })

            $("#submit_cheque_request").click(function(){

                //MY ACCOUNT
                let my_account = $('#my_account').val()

                //date_issued
                let date_issued = $('#date_issued').val()
                //cheque_no_from
                let cheque_no_from = $('#cheque_no_from').val()
                //cheque_no_to
                let cheque_no_to = $('#cheque_no_to').val()

                let amount = $('#amount').val()

                //delete after use
                amount = '67.0'

                let pin = $('#pin').val()

                console.log(my_account)
                console.log(cheque_no_from)
                console.log(cheque_no_to)
                console.log(date_issued)
                console.log(amount)
                console.log(pin)


                {{-- if(cheque_no_to == "" || cheque_no_from == "" || my_account == "" || date_issued == "" || amount == "" || pin == ""){ --}}
                if(cheque_no_to == "" || cheque_no_from == "" || date_issued == "" || amount == "" || pin == ""){
                    toaster("Please fill all required fieilds", "error", 6000);
                }else{

                    {{-- my_account_info = my_account.split("~")
                let accountNumber = my_account_info[2].trim() --}}

                let accountNumber = '67890-09876';


                    $.ajax({

                        'type' : 'POST',
                        'url' : 'submit-stop-cheque-book-request',
                        "datatype" : "application/json",
                        'data' : {
                            'accountNumber' : accountNumber.trim() ,
                            'cheque_no_from' : cheque_no_from.trim() ,
                            'cheque_no_to' : cheque_no_to.trim(),
                            'date_issued' : date_issued.trim() ,
                            'amount' : amount.trim() ,
                            'pinCode' : pin.trim()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:
                        function(response){

                             console.log(response)

                            if(response.responseCode == '000'){
                                toaster(response.message, 'success', 200000 )
                                $("#request_form_div").hide()
                                $(".disappear-after-success").hide()
                                $(".success-message").html('<img src="{{ asset("land_asset/images/statement_success.gif") }}" style="zoom: 0.7"/>')

                                $("#request_detail_div").show()
                                $(".display_button_print").show();


                            }else{

                                toaster(response.message, 'error', 9000 );


                        }
                    }

                    })


                }
            })


        });

    </script>
@endsection


