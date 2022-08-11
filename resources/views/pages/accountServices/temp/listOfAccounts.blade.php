@extends('layouts.master')

@section('styles')

    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->
    <style>


    </style>
@endsection

@section('content')


    <div class="">

        <div class="container-fluid">
            <br>
            <!-- start page title -->
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-primary">
                        <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                        List of Accounts
                    </h4>
                </div>

                <div class="col-md-6 text-right">
                    <h6>

                        <span class="flaot-right">
                             <b class="text-primary"> Accounts </b> &nbsp; > &nbsp; <b class="text-danger">List of Accounts</b>


                        </span>

                    </h6>

                </div>

                <div class="col-md-12 ">
                    <hr class="text-primary" style="margin: 0px;">
                </div>

            </div>
        </div>

        <!-- Start Content-->
        <div class="container-fluid ">
            <legend></legend>
            <!-- start page title -->

            <!-- end page title -->

            <div class="row">

                {{-- <div class="col-md-5 col-xl-5">
                    <h5 class="page-title">MY ACCOUNTS </h5>
                    <div class="widget-rounded-circle card-box">
                        <div class="row">

                            <canvas id="myChart" width="400" height="250"></canvas>

                        </div> <!-- end row-->
                        <h4 class="text-center">TOTAL: SLL 90,000,000.00</h4>
                    </div> <!-- end widget-rounded-circle-->

                </div> <!-- end col--> --}}



                <!-- end row-->

                <div class="container-fluid">
                    <div class="">
                        <div class="row">
                            <div class="col-xl-8" style="zoom:0.8;">
                                <div id="accordion" class="mb-3">
                                    <div class="card mb-2" {{-- style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));" --}}>
                                        <a class="text-dark" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="m-0">

                                                    <i class="mdi mdi-help-circle mr-1 text-primary"></i>
                                                    <span class="text-primary"> <b> I HAVE ( Current & Savings) </b></span>
                                                    <span class="text-primary float-right">
                                                        <b class="i_have_currency" style="font-size:12px ">SLL</b>
                                                        <b class="i_have_amount"></b>
                                                    </span>

                                                </h5>
                                            </div>
                                        </a>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordion">
                                            <div class="card-body i_have_display_no_data text-center"></div>
                                            <div class="card-body i_have_display">



                                                <div class="text-center accounts_loading_area" id="account_balance_info_loader">
                                                    <div class="spinner-border text-secondary avatar-sm " role="status"></div>
                                                </div>



                                                <div class="text-center accounts_error_area">
                                                    <img src="{{ asset('assets/images/api-error.gif') }}" class="img-fluid"
                                                        alt="" style="width: 180px; height:130px;">
                                                    <legend></legend>
                                                    <button class="btn btn-secondary" onclick="get_accounts()">
                                                        <i class="fe-rotate-ccw"></i> &nbsp; Please
                                                        retry</button>
                                                </div>




                                                <div class="table-responsive table-bordered accounts_display_area" style="zoom: 0.9;">
                                                    <table id="" class="table mb-0 ">
                                                        <thead>
                                                            <tr class="bg-info text-white ">
                                                                <td> <b> Account No </b> </td>
                                                                <td> <b> Description </b> </td>
                                                                <td> <b> Product </b> </td>
                                                                <td> <b> Cur </b> </td>
                                                                <td> <b> Overdrawn Limit </b> </td>
                                                                <td> <b> Ledger Balance </b> </td>
                                                                <td> <b> Available Balance </b> </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="casa_list_display">


                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end table-responsive -->


                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-2" {{-- style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));" --}}>
                                        <a class="text-dark" data-toggle="collapse" href="#collapseTwo" aria-expanded="true">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="m-0">

                                                    <i class="mdi mdi-help-circle mr-1 text-primary"></i>
                                                    <span class="text-danger"> <b>I OWE (Loans)</b> </span>

                                                    <span class="text-primary float-right " style="text-align: right">
                                                        <b style="font-size:12px ">SLL</b>
                                                        <b> 0.00
                                                        </b></span>

                                                </h5>
                                            </div>
                                        </a>
                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                            data-parent="#accordion">
                                            <div class="card-body i_owe_display_no_data text-center"></div>
                                            <div class="card-body i_owe_display">



                                                <div class="text-center loans_loading_area" id="account_balance_info_loader">
                                                    <div class="spinner-border text-secondary avatar-sm " role="status"></div>
                                                </div>



                                                <div class="text-center loans_error_area">
                                                    <img src="{{ asset('assets/images/api-error.gif') }}" class="img-fluid"
                                                        alt="" style="width: 180px; height:130px;">
                                                    <legend></legend>
                                                    <button class="btn btn-secondary" onclick="get_loans()"> <i
                                                            class="fe-rotate-ccw"></i> &nbsp; Please retry</button>
                                                </div>

                                                <h4 class="text-center text-danger loan_no_data_found"> <b> NO LOANS FOUND </b></h4>

                                                <div class="table-responsive table-bordered loans_display_area">

                                                    <table id="datatable-buttons loan_list" class="table mb-0">
                                                        <thead>
                                                            <tr class="bg-info text-white ">
                                                                <td> <b> Facility Number </b> </td>
                                                                <td> <b> Description </b> </td>
                                                                <td> <b> Currency </b> </td>
                                                                <td> <b> Amount Granted </b> </td>
                                                                <td> <b> Loan Balance </b> </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="loans_display">

                                                        </tbody>
                                                    </table>
                                                </div>


                                                <!-- end table-responsive -->

                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mb-1" {{-- style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));" --}}>
                                        <a class="text-dark" data-toggle="collapse" href="#collapseThree" aria-expanded="true">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="m-0">

                                                    <i class="mdi mdi-help-circle mr-1 text-primary"></i>
                                                    <span class="text-success"> <b>MY INVESTMENTS </b> </span>

                                                    <span class="text-primary float-right " style="text-align: right">
                                                        <b style="font-size:12px ">SLL</b>
                                                        <b> 0.00
                                                        </b></span>

                                                </h5>
                                            </div>
                                        </a>
                                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                            data-parent="#accordion">
                                            <div class="card-body my_investment_display_no_data text-center"></div>
                                            <div class="card-body my_investment_display">



                                                <div class="text-center my_investment_loading_area" id="account_balance_info_loader">
                                                    <div class="spinner-border text-secondary avatar-sm " role="status"></div>
                                                </div>



                                                <div class="text-center my_investment_error_area">
                                                    <img src="{{ asset('assets/images/api-error.gif') }}" class="img-fluid"
                                                        alt="" style="width: 180px; height:130px;">
                                                    <legend></legend>
                                                    <button class="btn btn-secondary" onclick="fixed_deposit()"> <i
                                                            class="fe-rotate-ccw"></i> &nbsp; Please retry</button>
                                                </div>

                                                <h4 class="text-center text-danger my_investment_no_data_found"> <b> NO INVESTMENT FOUND </b></h4>

                                                <div class="table-responsive table-bordered my_investment_display_area">
                                                    <table id="datatable-buttons my_investment_list" class="table mb-0">
                                                        <thead>
                                                            <tr class="custom-color-gold text-white ">
                                                                <td> <b> Source Account </b> </td>
                                                                <td> <b> Amount </b> </td>
                                                                <td> <b> Tenure </b> </td>
                                                                <td> <b> Interest Rate</b> </td>
                                                                <td> <b> Rollover </b> </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="my_investment_account">

                                                        </tbody>
                                                    </table>
                                                </div>


                                                <!-- end table-responsive -->

                                            </div>
                                        </div>
                                    </div>



                                </div> <!-- end #accordions-->
                            </div> <!-- end col -->


                        </div> <!-- end row -->

                    </div>
                </div>

                {{-- <div class="row ">


                    <div class="card-body col-md-6 col-xl-6 col-sm-6 col-xs-12">

                        <div class="card border mt-0 rounded">
                            <h4 class="header-title p-2 mb-0 text-success">I HAVE</h4>

                            <div class="table-responsive" style="height: 275px;">
                                <table class="table table-centered table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-info">
                                                    <i class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('account-enquiry') }}"
                                                    class="text-body font-weight-semibold">Savings Account</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>

                                            <td class="">
                                                GHS 90,039.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-info">
                                                    <i class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="ecommerce-product-detail.html"
                                                    class="text-body font-weight-semibold">Savings Account</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>

                                            <td class="">
                                                GHS 90,039.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-info">
                                                    <i class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="ecommerce-product-detail.html"
                                                    class="text-body font-weight-semibold">Savings Account</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>

                                            <td class="">
                                                GHS 90,039.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-info">
                                                    <i class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="ecommerce-product-detail.html"
                                                    class="text-body font-weight-semibold">Savings Account</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>

                                            <td class="">
                                                GHS 90,039.00
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->


                        </div> <!-- end .border-->




                    </div> <!-- end col -->

                    <div class="card-body col-md-6 col-xl-6 col-sm-6 col-xs-12">



                        <div class=" card border mt-0 rounded">
                            <h4 class="header-title p-2 mb-0 text-danger">I OWE</h4>

                            <div class="table-responsive" style="height: 275px;">
                                <table class="table table-centered table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-danger">
                                                    <i class="dripicons-wallet font-4 avatar-title text-danger"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="ecommerce-product-detail.html"
                                                    class="text-body font-weight-semibold">Savings Account</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>

                                            <td class="">
                                                GHS 90,039.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-danger">
                                                    <i class="dripicons-wallet font-4 avatar-title text-danger"></i>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="ecommerce-product-detail.html"
                                                    class="text-body font-weight-semibold">Red Hoodie for men</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>
                                            <td class="">
                                                USD 5,700.00
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 10px;">
                                                <div class="avatar-sm rounded bg-soft-danger">
                                                    <i class="dripicons-wallet font-4 avatar-title text-danger"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="ecommerce-product-detail.html"
                                                    class="text-body font-weight-semibold">Designer Awesome T-Shirt</a>
                                                <small class="d-block">01024499300101</small>
                                            </td>
                                            <td class="">
                                                SLL 888.00
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div> <!-- end .border-->


                    </div>

                </div> --}}



            </div> <!-- container -->



        </div>
    </div>
    @endsection


    @section('scripts')
        <!-- Plugins js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


        <!-- Tour page js -->
        <script src="{{ asset('assets/libs/hopscotch/js/hopscotch.min.js') }}"></script>
        <!-- Tour init js-->
        {{-- <script src="{{ asset('assets/js/pages/tour.init.js') }}"></script> --}}

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Expense', 'Amount'],
                    ['Vendor payment', 100],
                    ['Travel', 200],
                    ['Petty Cash', 300],
                    ['Salary', 900],
                    ['Groceries', 50],
                    ['Allowances', 80],
                    ['Medical', 50],
                    ['Insurance', 950],
                    ['Tax', 95],
                    ['Others', 40],

                ]);

                var options = {
                    title: 'SPENDING ANALYSIS',
                    is3D: true,
                    chartArea: {
                        left: 10,
                        width: '80%',
                        height: '75%'
                    },
                    legend: {
                        position: 'right',
                        textStyle: {
                            color: 'blue',
                            fontSize: 16
                        }
                    }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }

        </script>

        <script>
            // function(e, legendItem, legend) {
            //     const index = legendItem.datasetIndex;
            //     const ci = legend.chart;
            //     if (ci.isDatasetVisible(index)) {
            //         ci.hide(index);
            //         legendItem.hidden = true;
            //     } else {
            //         ci.show(index);
            //         legendItem.hidden = false;
            //     }
            // }

            {{-- function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            }; --}}

            function fixed_deposit() {

                $('.my_investment_loading_area').show()
                $('.my_investment_error_area').hide()
                $('.my_investment_no_data_found').hide()
                $('.my_investment_display_area').hide()

                $.ajax({

                    "type": "GET",
                    "url": "fixed-deposit-account-api",
                    datatype: "application/json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        {{-- console.log(response); --}}


                        if (response.responseCode == '000') {

                            let data = response.data;

                            if (response.data == null) {
                                $('.my_investment_loading_area').hide()
                                $('.my_investment_error_area').hide()
                                $('.my_investment_no_data_found').show()
                                $('.my_investment_display_area').hide()
                                return false;
                            }

                            if (response.data.length > 0) {
                                console.log(response.data.length);
                                $.each(data, function(index) {
                                    $('.fixed_deposit_account').append(
                                        `<tr>
                                            <td><b> ${data[index].sourceAccount} </b></td>
                                            <td><b> ${data[index].dealAmount} </b></td>
                                            <td><b> ${data[index].tenure} </b></td>
                                            <td><b> ${data[index].fixedInterestRate} </b></td>
                                            <td><b> ${rollover_ } </b></td>
                                        </tr>`
                                    )


                                })

                                $('.my_investment_loading_area').hide()
                                $('.my_investment_error_area').hide()
                                $('.my_investment_no_data_found').hide()
                                $('.my_investment_display_area').show()
                            } else {
                                $('.my_investment_loading_area').hide()
                                $('.my_investment_error_area').hide()
                                $('.my_investment_no_data_found').show()
                                $('.my_investment_display_area').hide()

                            }


                        }else{
                            $('.my_investment_loading_area').hide()
                                $('.my_investment_error_area').show()
                                $('.my_investment_no_data_found').hide()
                                $('.my_investment_display_area').hide()
                        }



                    },
                    error: function(xhr, status, error) {

                        $('.my_investment_loading_area').hide()
                        $('.my_investment_error_area').show()
                        $('.my_investment_no_data_found').hide()
                        $('.my_investment_display_area').hide()


                    }
                })
            }

            function get_accounts() {

                $(".accounts_display_area").hide()
                $(".accounts_error_area").hide()
                $(".accounts_loading_area").show()

                $.ajax({
                    "type": "GET",
                    "url": "get-accounts-api",
                    datatype: "application/json",

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.responseCode == '000') {

                            let data = response.data;

                            let i_have_total = 0

                            $.each(data, function(index) {
                                i_have_total += parseFloat(data[index].availableBalance)
                                $('.casa_list_display').append(
                                    `<tr>
                                        <td>  <a href="{{ url('account-enquiry?accountNumber=${data[index].accountNumber}') }}"> <b class="text-primary">${data[index].accountNumber} </b> </a></td>
                                        <td> <b> ${data[index].accountDesc} </b>  </td>
                                        <td> <b> ${data[index].accountType}  </b>  </td>
                                        <td> <b> ${data[index].currency}  </b>  </td>
                                        <td>  <b> 0.00  </b> </td>
                                        <td> <b> ${formatToCurrency(parseFloat(data[index].ledgerBalance))}   </b>  </td>
                                        <td> <b> ${formatToCurrency(parseFloat(data[index].availableBalance))}   </b></td>
                                    </tr>`
                                )
                            })

                            $('.i_have_amount').text(formatToCurrency(parseFloat(i_have_total)));



                            $(".accounts_error_area").hide()
                            $(".accounts_loading_area").hide()
                            $(".accounts_display_area").show()

                        } else {

                            $(".accounts_error_area").hide()
                            $(".accounts_loading_area").hide()
                            $(".accounts_display_area").show()

                        }

                    },
                    error: function(xhr, status, error) {

                        $(".accounts_loading_area").hide()
                        $(".accounts_display_area").hide()
                        $(".accounts_error_area").show()


                    }
                })
            }




            function get_loans() {

                $(".loan_no_data_found").hide()
                $(".loans_display_area").hide()
                $(".loans_error_area").hide()
                $(".loans_loading_area").show()

                $.ajax({
                    "type": "GET",
                    "url": "get-loan-accounts-api",
                    datatype: "application/json",

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        {{--  alert(response.data)
                                return false  --}}

                                {{--  if(!response.data){
                                    alert(response.data + " ooooo")
                                }else{
                                    alert(response.data + " ii")
                                }
                                return false  --}}
                        if (response.responseCode == '000') {

                            var data = response.data;

                            if(!response.data){
                                alert(response.data)
                                return false

                                $('.loan_no_data_found').show()
                                $(".loans_display_area").hide()
                            }else{
                                $.each(data, function(index) {
                                    $('.loans_display').append(
                                        `
                                    <tr>
                                        <td>  <a href="{{ url('account-enquiry?accountNumber=${data[index].facilityNo}') }}"> <b class="text-danger">${data[index].facilityNo} </b> </a></td>
                                        <td> <b> ${data[index].description} </b>  </td>
                                        <td> <b> ${data[index].isoCode}  </b>  </td>
                                        <td> <b> ${formatToCurrency(parseFloat(data[index].amountGranted))}   </b> </b></td>
                                        <td> <b> ${formatToCurrency(parseFloat(data[index].loanBalance))}   </b>  </td>
                                    </tr>`
                                    )

                                })


                            }



                        }else if(response.responseCode == '00'){
                            $(".loan_no_data_found").show()
                            $(".loans_error_area").hide()
                            $(".loans_loading_area").hide()
                            $(".loans_display_area").hide()
                        }
                        else {
                        $(".loan_no_data_found").hide()
                            {{--  $(".loans_error_area").hide()
                            $(".loans_loading_area").hide()
                            $(".loans_display_area").show()  --}}

                        }

                    },
                    error: function(xhr, status, error) {
                        $(".loans_display_area").hide()
                        $(".loans_loading_area").hide()
                        $(".loans_error_area").show()

                    }

                })
            }

            function get_currency() {
                $.ajax({
                    type: 'GET',
                    url:  'get-currency-list-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {
                            $('.select_currency').append($('<option>', {
                                value: data[index].isoCode
                            }).text('(' + data[index].isoCode + ') ~ ' + data[index]
                                .description));
                        });

                    },

                })
            };


            function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            };


            function get_correct_fx_rate() {

                $(".currency_converter_display_area").hide()
                $(".currency_converter_error_area").hide()
                $(".currency_converter_loading_area").show()

                $.ajax({
                    type: 'GET',
                    url:  'get-correct-fx-rate-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        console.log(data)
                        if (response.responseCode == '000') {

                            $(".currency_converter_loading_area").hide()
                            $(".currency_converter_error_area").hide()
                            $(".currency_converter_display_area").show()

                            $('#hide_fx_rate').val(JSON.stringify(data))

                        } else {
                            $(".currency_converter_display_area").hide()
                            $(".currency_converter_loading_area").hide()
                            $(".currency_converter_error_area").show()
                        }



                    },
                    error: function(xhr, status, error) {
                        $(".currency_converter_display_area").hide()
                        $(".currency_converter_loading_area").hide()
                        $(".currency_converter_error_area").show()


                    }

                })
            };

            function get_fx_rate(rate_type) {

                $(".cross_rate_display_area").hide()
                $(".cross_rates_error_area").hide()
                $(".cross_rates_loading_area").show()

                $.ajax({
                    "type": "GET",
                    "url": "get-fx-rate-api?rateType=" + rate_type,
                    datatype: "application/json",

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.responseCode == '000') {



                            let data = response.data;


                            if (response.data.length > 0) {
                                if (rate_type == "Note rate") {
                                    $.each(data, function(index) {
                                        let flag_1 = ``
                                        let flag_2 = ``
                                        console.log(data[index].pair);
                                        let pair = data[index].pair.split('/')
                                        flag_1 = `assets/images/flags/${pair[0].trim()}.png`
                                        flag_2 = `assets/images/flags/${pair[1].trim()}.png`
                                        $('.display_cross_rates').append(
                                            `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td style="zoom: 0.8;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src='${flag_1}' width='40px' height='20px' style='border-radius:5px;'>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    /
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src='${flag_2}' width='40px' height='20px' style='border-radius:5px;'>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td> <b> ${parseFloat(data[index].buy)} </b> </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <td> <b> ${parseFloat(data[index].sell)} </b> </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        `
                                        );
                                    });
                                } else if (rate_type == "Cross rate") {
                                    $.each(data, function(index) {
                                        let flag_1 = ``
                                        let flag_2 = ``
                                        console.log(data[index].pair);
                                        let pair = data[index].pair.split('/')
                                        flag_1 = `assets/images/flags/${pair[0].trim()}.png`
                                        flag_2 = `assets/images/flags/${pair[1].trim()}.png`
                                        $('.display_cross_rates').append(
                                            `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td style="zoom: 0.8;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <img src='${flag_1}' width='40px' height='20px' style='border-radius:5px;'>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                /
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <img src='${flag_2}' width='40px' height='20px' style='border-radius:5px;'>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td> <b> ${parseFloat(data[index].buy)} </b> </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <td> <b> ${parseFloat(data[index].sell)} </b> </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `
                                        );
                                    });
                                }

                            }


                            $(".cross_rates_error_area").hide()
                            $(".cross_rates_loading_area").hide()
                            $(".cross_rate_display_area").show()

                        } else {

                            $(".cross_rates_error_area").hide()
                            $(".cross_rates_loading_area").hide()
                            $(".cross_rate_display_area").show()
                        }

                    },
                    error: function(xhr, status, error) {
                        $(".cross_rate_display_area").hide()
                        $(".cross_rates_loading_area").hide()
                        $(".cross_rates_error_area").show()


                    }
                })
            }

            {{-- function dynamic_display(first, second, third){
             $(".cross_rate_display_area").hide()
             $(".cross_rates_error_area").hide()


            $('".' + first + '"').hide()
            $('".' + second + '"').hide()
            $('".' + third + '"').show()
        } --}}




            $(document).ready(function() {

                {{-- dynamic_display("cross_rate_display_area", "cross_rates_error_area", "cross_rates_loading_area") --}}

                $('.loan_no_data_found').hide()
                $(".i_owe_display_no_data").hide()

                $(".i_have_display_no_data").hide()
                $(".fd_display_no_data").hide()
                $(".fd_display").hide()

                $(".cross_rate_display_area").hide()
                $(".cross_rates_error_area").hide()
                $(".cross_rates_loading_area").show()

                $(".loans_display_area").hide()
                $(".loans_error_area").hide()
                $(".loans_loading_area").show()

                $(".accounts_display_area").hide()
                $(".accounts_error_area").hide()
                $(".accounts_loading_area").show()

                $(".currency_converter_display_area").hide()
                $(".currency_converter_error_area").hide()
                $(".currency_converter_loading_area").show()

                var converter_rates = []

                function fx_rates() {
                    get_fx_rate("Transfer rate")
                    get_fx_rate("Note rate")
                    get_fx_rate("Cross rate")
                }

                setTimeout(function() {
                    fx_rates()
                    converter_rates = get_correct_fx_rate()
                    get_currency()
                    get_accounts();
                    get_loans();
                    fixed_deposit();
                }, 200);

            })

        </script>

        {{--  <script src="{{ asset('assets/customjs/currency_converter.js') }}"></script>  --}}



        {{-- <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script> --}}



        <!-- third party js -->
        {{-- <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"> --}}


        {{-- <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script> --}}
        <!-- third party js ends -->

        <!-- Datatables init -->
        {{-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}


    @endsection
