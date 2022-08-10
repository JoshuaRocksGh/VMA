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

    <div class="container-fluid hide_on_print">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-soft-blue btn-sm waves-effect waves-light"><i
                        class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>


            </div>
            <div class="col-md-4">
                <h4 class="text-primary text-center">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    ACCOUNTS
                </h4>
            </div>

            <div class="col-md-4 text-right">
                <h6>

                    <span class="float-right">
                        <b class="text-primary"> My Account </b> &nbsp; > &nbsp; <b class="text-danger">Accounts</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-7">
                <div class="card-box"
                    style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="zoom:0.8;">
                            <canvas id="myChart" width="200" height="200"></canvas>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">

                            <div class="card-body">

                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center active"
                                        style="font-size: 17px">

                                        <strong>Total Local Amount: </strong>
                                        <strong>

                                            SLL <span class="i_have_amount open-money"></span>
                                            <span class="i_have_amount_ close-money">***********</span>
                                            &nbsp;&nbsp;&nbsp;
                                            <i class="fas fa-eye  float-right eye-open text-white" data-toggle="tooltip"
                                                data-placement="bottom" title="" data-original-title="More Info"></i>
                                            <i class="fa fa-eye-slash  float-right eye-close text-white"
                                                data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="More Info"></i>

                                        </strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-success"> CURRENT & SAVINGS ACCOUNT</strong>
                                        <span class="badge badge-success badge-pill currency_and_savings_account_no"></span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-warning">INVESTMENTS</strong>
                                        <span class="badge badge-warning badge-pill investment_count">0</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong class="text-danger"> LOANS </strong>
                                        <span class="badge badge-danger badge-pill loan_count">0</span>
                                    </li>

                                </ul>

                            </div> <!-- end card-body -->

                        </div>
                        <div class="col-md-1"></div>
                    </div>


                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mt-0 text-success">CURRENT & SAVINGS ACCOUNT</h3>
                        <div class="table-responsive table-bordered accounts_display_area">
                            <table id="" class="table mb-0 ">
                                <thead>
                                    <tr class="bg-info text-white ">
                                        <td> <b> Account No </b> </td>
                                        {{-- <td> <b> Description </b> </td> --}}
                                        {{-- <td> <b> Product </b> </td> --}}
                                        <td> <b> Cur </b> </td>
                                        {{-- <td> <b> OverDraft </b> </td> --}}
                                        {{-- <td> <b> Ledger Bal </b> </td> --}}
                                        <td> <b> Av. Bal </b> </td>
                                    </tr>
                                </thead>
                                <tbody class="casa_list_display">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mt-0 text-warning">INVESTMENTS</h3>
                        <div class="table-responsive table-bordered my_investment_display_area">
                            <table id="" class="table mb-0 ">
                                <thead>
                                    <tr class="bg-info text-white ">
                                        <td> <b> Account No </b> </td>
                                        <td> <b> Deal Amount </b> </td>
                                        <td> <b> Tunure </b> </td>
                                        {{-- <td> <b> FixedInterestRate </b> </td>
                                                <td> <b> Rollover </b> </td> --}}

                                    </tr>
                                </thead>
                                <tbody class="fixed_deposit_account">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mt-0 text-danger">LOANS</h3>
                        <div class="table-responsive table-bordered loans_display_area">
                            <table id="" class="table mb-0 ">
                                <thead>
                                    <tr class="bg-info text-white ">
                                        <td> <b> Facility No </b> </td>
                                        {{-- <td> <b> Description </b> </td> --}}
                                        {{-- <td> <b> Cur </b> </td> --}}
                                        <td> <b> Amount Granted </b> </td>
                                        <td> <b> Loan Bal </b> </td>

                                    </tr>
                                </thead>
                                <tbody class="loans_display">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Plugins js-->
    <script src="{{ asset('assets/js/chart.js') }}"></script>


    <!-- Tour page js -->
    <script src="{{ asset('assets/libs/hopscotch/js/hopscotch.min.js') }}"></script>
    <!-- Tour init js-->
    {{-- <script src="{{ asset('assets/js/pages/tour.init.js') }}"></script> --}}

    <!-- Chart JS -->
    {{-- <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script> --}}

    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>

    <!-- Chat app -->
    {{-- <script src="{{ asset('assets/js/pages/jquery.chat.js') }}"></script> --}}

    <!-- Todo app -->
    <script src="{{ asset('assets/js/pages/jquery.todo.js') }}"></script>

    <!-- Dashboard init JS -->
    <script src="{{ asset('assets/js/pages/dashboard-3.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script type="text/javascript">
        var i_have = 0
        var i_owe = 0
        var i_invest_total = 0

        function show_chart(i_have, i_owe, i_invest_total) {

            console.log(i_have)
            console.log(i_owe)
            console.log(i_invest_total)
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['I HAVE', 'Investments', 'I OWE'],
                    datasets: [{
                        label: 'MY ACCOUNTS',
                        data: [i_have, i_owe, i_invest_total],
                        backgroundColor: [

                            'rgb(75,192,192, 0.5)',
                            'rgba(231, 223, 10, 0.5)',
                            'rgb(233,55,93, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [

                            'rgb(75,192,192 ,0.5)',
                            'rgba(231, 223, 10, 0.5)',
                            'rgb(233,55,93,0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderWidth: 1
                    }]
                },

            });
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
        $(document).ready(function() {
            $('.close-money').show()
            $('.open-money').hide()

            $('.eye-open').hide()
            $('.eye-close').show()

            $('.eye-open').click(function() {

                $('.eye-open').hide()
                $('.eye-close').show()

                $('.open-money').hide()
                $('.close-money').show()

            })

            $('.eye-close').click(function() {

                $('.eye-close').hide()
                $('.eye-open').show()

                $('.open-money').show()
                $('.close-money').hide()
            })

        })

        {{-- function formatToCurrency(amount) {
                return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
            }; --}}

        function account_transaction() {
            $.ajax({
                type: 'GET',
                url: 'get-my-account',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {
                        $('#account_transaction').append($('<option>', {
                            value: data[index].accountType + '~' + data[index]
                                .accountDesc + '~' + data[index].accountNumber +
                                '~' + data[index].currency + '~' + data[index]
                                .availableBalance
                        }).text(data[index].accountNumber + ' ' + '-' + ' ' + data[index]
                            .currency + ' ' + '-' + ' ' +
                            formatToCurrency(parseFloat(data[index].availableBalance.trim()))));
                        //$('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));

                    });
                    {{-- let name = $("from_acc_currency").val(); --}}

                    {{-- console.log(response); --}}
                    {{-- let currency = response.data[0].currency; --}}
                    {{-- console.log(currency); --}}

                    {{-- $.each(currency, function(index) {
                            let data = currency[index].description ;
                            console.log(data);
                        }) --}}

                },

            })
        }

        function fixed_deposit(account_data) {

            $('.my_investment_loading_area').show()
            $('.my_investment_error_area').hide()
            $('.my_investment_no_data_found').hide()
            $('.my_investment_display_area').hide()

            $.ajax({

                type: "GET",
                url: "fixed-deposit-account-api",
                datatype: "application/json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    {{-- console.log(response); --}}


                    if (response.responseCode == '000') {

                        let data = response.data;
                        {{-- console.log("fixed-deposit" + data) --}}

                        if (response.data == null) {
                            $('.my_investment_loading_area').hide()
                            $('.my_investment_error_area').hide()
                            $('.my_investment_no_data_found').show()
                            $('.my_investment_display_area').hide()
                            return false;
                        }

                        {{-- let loan_count = 0 --}}
                        let fixed_deposit_count = 0
                        if (response.data.length > 0) {
                            console.log(response.data.length);

                            account_data.i_invest_total = 0
                            $.each(data, function(index) {

                                let invest_amount = data[index].dealAmount
                                invest_amount = invest_amount.replace(/,/g, "");
                                account_data.i_invest_total += Math.abs(parseFloat(invest_amount))

                                console.log(`total investments ${account_data.i_invest_total}`)
                                $('.fixed_deposit_account').append(
                                    `<tr>
                                            <td><b> ${data[index].interestAccount} </b></td>
                                            <td><b> ${data[index].dealAmount} </b></td>
                                            <td><b> ${data[index].tenure} </b></td>
                                            {{-- <td><b> ${data[index].fixedInterestRate} </b></td> --}}
                                            {{-- <td><b> ${rollover_ } </b></td> --}}
                                        </tr>`
                                )

                                {{-- loan_count = loan_count + 1; --}}
                                fixed_deposit_count = fixed_deposit_count + 1;
                            })

                            {{-- console.log('i_invest_total: ' + i_invest_total) --}}

                            {{-- $(".loan_count").text(loan_count); --}}
                            $(".investment_count").text(fixed_deposit_count);

                            $('.my_investment_loading_area').hide()
                            $('.my_investment_error_area').hide()
                            $('.my_investment_no_data_found').hide()
                            $('.my_investment_display_area').show()

                            {{-- show_chart(i_have, i_owe, i_invest_total) --}}
                        } else {

                            $('#p_fixed_deposit_account').html(
                                `<h2 class="text-center text-warning">No Investment</h2>`)

                            $('.my_investment_loading_area').hide()
                            $('.my_investment_error_area').hide()
                            $('.my_investment_no_data_found').show()
                            $('.my_investment_display_area').hide()

                        }


                    } else {
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

                    setTimeout(function() {
                        fixed_deposit(account_data)
                    }, $.ajaxSetup().retryAfter)

                }
            })
        }

        function get_accounts(account_data) {

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
                        {{-- console.log("accounts" + data) --}}

                        let i_have_total = 0
                        let count = 0

                        $('.currency_and_savings_account_no').text(data.length)
                        console.log('my data')
                        console.log(data)

                        account_data.i_have_total = 0
                        $.each(data, function(index) {
                            let localEquivalentAvailableBalance = data[index]
                                .localEquivalentAvailableBalance
                            localEquivalentAvailableBalance = localEquivalentAvailableBalance.replace(
                                /,/g, "");

                            console.log(typeof(localEquivalentAvailableBalance))


                            account_data.i_have_total += Math.abs(parseFloat(
                                localEquivalentAvailableBalance))
                            console.log(`total money ${account_data.i_have_total}`)
                            $('.casa_list_display').append(
                                `<tr>
                                        <td>  <a href="{{ url('account-enquiry?accountNumber=${data[index].accountNumber}') }}"> <b class="text-primary">${data[index].accountNumber} </b> </a></td>
                                        {{-- <td> <b> ${data[index].accountDesc} </b>  </td> --}}
                                        {{-- <td> <b> ${data[index].accountType}  </b>  </td> --}}
                                        <td> <b> ${data[index].currency}  </b>  </td>
                                        {{-- <td>  <b> 0.00  </b> </td> --}}
                                        {{-- <td> <b> ${formatToCurrency(parseFloat(data[index].ledgerBalance))}   </b>  </td> --}}
                                        <td> <b> ${formatToCurrency(parseFloat(data[index].availableBalance))}   </b></td>
                                    </tr>`
                            )
                        })

                        {{-- console.log('i_have_total: ' + i_have_total) --}}

                        {{-- SETTING TABLE VALUES --}}
                        $('.i_have_amount').text(formatToCurrency(parseFloat(account_data.i_have_total)));

                        {{-- SETTING GRAPH VALUE --}}
                        {{-- i_have = i_have_total --}}



                        $(".accounts_error_area").hide()
                        $(".accounts_loading_area").hide()
                        $(".accounts_display_area").show()

                        {{-- show_chart(i_have, i_owe, i_invest_total) --}}

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
                    setTimeout(function() {
                        get_accounts(account_data)
                    }, $.ajaxSetup().retryAfter)

                }
            })
        }

        function get_loans(account_data) {

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
                    if (response.responseCode == '000') {

                        var data = response.data;
                        {{-- console.log("loans" + data) --}}

                        if (!response.data) {

                            return false
                            $('.loan_no_data_found').show()
                            $(".loans_display_area").hide()
                        } else {
                            if (response.data == null) {
                                $('#p_loans_display').html(`<h2 class="text-center text-danger">No Loan</h2>`)
                            } else {

                                let loan_count = 0

                                if (response.data.length > 0) {
                                    $('#p_loans_display').show()
                                    $(".loans_display_area").show()
                                    console.log("response");

                                    let i_owe_total = 0
                                    let count = 0

                                    account_data.i_owe_total = 0
                                    $.each(data, function(index) {
                                        let loanBalance = data[index].loanBalance
                                        loanBalance = loanBalance.replace(/,/g, "");
                                        account_data.i_owe_total += Math.abs(parseFloat(loanBalance))

                                        console.log(`total loans ${account_data.i_owe_total}`)
                                        $('.loans_display').append(
                                            `
                                            <tr>
                                                <td>  <a href="{{ url('account-enquiry?accountNumber=${data[index].facilityNo}') }}"> <b class="text-danger">${data[index].facilityNo} </b> </a></td>
                                                {{-- <td> <b> ${data[index].description} </b>  </td> --}}
                                                {{-- <td> <b> ${data[index].isoCode}  </b>  </td> --}}
                                                <td> <b> ${ formatToCurrency(parseFloat(data[index].amountGranted))}   </b> </b></td>
                                                <td> <b> ${formatToCurrency(parseFloat(data[index].loanBalance))}  </b>  </td>
                                            </tr>`
                                        )
                                        loan_count = loan_count + 1;


                                    })

                                    $(".loan_count").text(loan_count);

                                    {{-- console.log('i_owe_total: ' + i_owe_total) --}}

                                    {{-- show_chart(i_have, i_owe, i_invest_total) --}}
                                } else {
                                    $('#p_loans_display').html(`<h2 class="text-center">No Loan</h2>`)
                                }
                            }


                        }



                    } else if (response.responseCode == '00') {
                        $(".loan_no_data_found").show()
                        $(".loans_error_area").hide()
                        $(".loans_loading_area").hide()
                        $(".loans_display_area").hide()
                    } else {
                        $(".loan_no_data_found").hide()
                        {{-- $(".loans_error_area").hide()
                            $(".loans_loading_area").hide()
                            $(".loans_display_area").show() --}}

                    }

                },
                error: function(xhr, status, error) {
                    $(".loans_display_area").hide()
                    $(".loans_loading_area").hide()
                    $(".loans_error_area").show()
                    setTimeout(function() {
                        get_loans(account_data)
                    }, $.ajaxSetup().retryAfter)
                }

            })
        }

        function get_currency() {
            $.ajax({
                type: 'GET',
                url: 'get-currency-list-api',
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
                url: 'get-correct-fx-rate-api',
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

                    setTimeout(function() {
                        get_correct_fx_rate()
                    }, $.ajaxSetup().retryAfter)
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
                    setTimeout(function() {
                        get_fx_rate()
                    }, $.ajaxSetup().retryAfter)

                }
            })
        }

        //     {{-- function dynamic_display(first, second, third){
                    //      $(".cross_rate_display_area").hide()
                    //      $(".cross_rates_error_area").hide()


                    //     $('".' + first + '"').hide()
                    //     $('".' + second + '"').hide()
                    //     $('".' + third + '"').show()
                    // } --}}




        let today = new Date();
        let dd = today.getDate();

        let mm = today.getMonth() + 1;
        const yyyy = today.getFullYear()
        console.log(mm)
        console.log(String(mm).length)
        if (String(mm).length == 1) {
            mm = '0' + mm
        }

        var end_date = '01-' + mm + '-' + today.getFullYear();
        var start_date = '30-' + mm + '-' + (Number(today.getFullYear()) - 1);
        var transLimit = 20;



        function getAccountTransactions(account_number, start_date, end_date, transLimit) {
            {{-- var table = $('.account_transaction_display_table').DataTable();
                        var nodes = table.rows().nodes(); --}}


            $.ajax({
                "type": "POST",
                "url": "account-transaction-history",
                datatype: "application/json",
                data: {
                    "accountNumber": account_number,
                    "endDate": end_date,
                    "entrySource": "A",
                    "startDate": start_date,
                    "transLimit": transLimit
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.responseCode == '000') {

                        // let data = response.data ;
                        // console.log(data);

                        var limit = 10;
                        let data = response.data.slice(0, limit);

                        $("#transaction_history tr").remove();

                        $.each(data, function(index) {
                            console.log(data[index].amount);
                            var transfer_amount = parseFloat(data[index].amount);

                            let icon = "";
                            let color = "";

                            if (transfer_amount > 0) {
                                icon = "fe-arrow-down-left ";
                                color = "bg-soft-blue";
                            } else {
                                icon = "fe-arrow-down-right ";
                                color = "bg-soft-danger";


                            }



                            {{-- $("#transaction_history").html("") --}}
                            // $("#transaction_history td").remove();

                            $("#transaction_history").append(
                                `
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <p class="d-block font-weight-semibold transfer_date col-md-3 ">${data[index].postingSysDate}</p>
                                                        <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold transfer_narration col-md-4 text-center">${data[index].narration}</a>

                                                        <span class="account_currency text-primary h4 col-md-4 text-center m-0">${global_selected_currency} &nbsp; <span class="transfer_amount h4">${formatToCurrency(parseFloat(data[index].amount))}</span></span>
                                                    </div>
                                                    <hr class="mt-0">
                                                </td>
                                            </tr>
                                            `
                            )
                        })



                    } else {


                    }

                },
                error: function(xhr, status, error) {
                    {{-- $("#account_transaction_loader").hide();
                                $(".account_transaction_display").hide();
                                $(".account_transaction_display_table").hide();
                                $("#account_transaction_retry_btn").show(); --}}
                    console.log(xhr, status, error);
                }
            })
        }

        var global_selected_currency = "";



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
            let account_data = new Object()
            get_accounts(account_data);
            get_loans(account_data);
            fixed_deposit(account_data);
            account_transaction();
            fx_rates()
            converter_rates = get_correct_fx_rate()
            get_currency()

            setTimeout(function() {


                show_chart(account_data.i_have_total, account_data.i_owe_total, account_data.i_invest_total)

            }, 5000);

        })



        $("#account_transaction").change(function() {
            var account_details = $(this).val().split('~');
            var account_number = account_details[2];
            var account_currency = account_details[3];

            global_selected_currency = account_details[3]

            {{-- var start_date = start_date; --}}
            {{-- var end_date = end_date; --}}
            {{-- var transLimit = transLimit; --}}
            $(".account_currency").text(account_currency);

            console.log(account_details);
            console.log(account_number);
            console.log(start_date);
            console.log(end_date);
            console.log(transLimit);

            getAccountTransactions(account_number, start_date, end_date, transLimit)

            {{-- let data = --}}


        })
    </script>

    {{-- <script src="{{ asset('assets/customjs/currency_converter.js') }}"></script> --}}



    {{-- <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
            <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

            <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script> --}}



    <!-- third party js -->
    {{-- <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"> --}}
    {{-- </script> --}}

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
    <!-- Vendor js -->


@endsection
