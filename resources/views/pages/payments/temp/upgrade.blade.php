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

            {{-- <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                            <h4 class="mt-0 font-16">Income Status</h4>
                            <h2 class="text-primary my-3 text-center">$<span data-plugin="counterup">31,570</span></h2>
                            <p class="text-muted mb-0">Total income: $22506 <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>10.25%</span></p>
                        </div>
                    </div>
                </div>
            </div> --}}



            <!-- end row-->



            <div class="container-fluid">
                <div class="">
                    <div class="row">


                        <div class="col-lg-4">
                            <div class="card-box ribbon-box" style="border-radius: 20px;">
                                {{-- <div class="ribbon ribbon-blue float-left"><i class="mdi mdi-access-point mr-1"></i> Balance</div> --}}
                                <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                                    <h4 class="ribbon ribbon-blue float-left mt-0 font-15"><i class="fe-briefcase mr-1"></i>Balance</h4>
                                    <br><br>
                                    <a href="{{ url('') }}"><h2 class="text-primary my-3" style="font-size: 25px">SLL <span>100,000,000000000</span></h2></a>
                                    <br>
                                    <p class="text-primary mb-0">Click the amount to see your accounts. <span class="float-right"><i class="fa fa-caret-up text-success mr-1"></i>10.25%</span></p>

                                {{-- <div class="ribbon ribbon-blue float-left"><i class="mdi mdi-access-point mr-1"></i> Balance</div>
                                <h5 class="text-blue float-right mt-0">Balance</h5>
                                <div class="ribbon-content">
                                    <p class="mb-0 text-primary" style="font-size: 30px;" href="{{ url('account-enquiry') }}">SLL 4,000000308</p>
                                    <br><br><br>
                                    <h5 class="text-primary ">Updated according to the total amount in your balance. Click on amount to see your list of accounts</h5>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="col-md-4 col-xl-4">
                            <div class=" card-box">
                                <div class="row">
                                    <div class="col-4">
                                        <h4 class=" font-15">Balance</h4> --}}

                                        {{-- <div class="avatar-md rounded-circle bg-white ">
                                            <i class="fe-log-out font-20 avatar-title text-info"></i>
                                        </div> --}}
                                    {{-- </div>
                                    <div class="col-8">
                                        <i class="fa fa-info-circle text-muted float-right" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="More Info"></i>
                                        <div class="text-right">
                                            <h3 class=" text-white"><span></span></h3>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                                <div class="row">
                                    <h2 class="text-primary my-3 text-center">SLL <span>31,570</span></h2>
                                </div>
                                <div class="row">
                                    <h6 class="text-primary font-7">Updated approximatelyy every 15 minutes</h6>
                                </div>
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col--> --}}

                        <div class="col-md-4 col-xl-4">
                            <div class="card" style="border-radius: 20px">

                            {{-- <div class="widget-rounded-circle card-box bg-warning">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-md rounded-circle bg-white">
                                            <i class="fe-send font-20 avatar-title text-white text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="mt-1 text-white"><span> &nbsp; Other Bank Transfer</span></h3>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle--> --}}

                            {{-- <div class="row mt-4 text-center">
                                <div class="col-4">
                                    <p class="text-muted font-14 mb-1 text-truncate">Target</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>$3.8k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-14 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success mr-1"></i>$1.1k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-14 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>$25k</h4>
                                </div>
                            </div> --}}
                            <div class="mt-3 chartjs-chart">
                                <canvas id="projections-actuals-chart" data-colors="#0561ad,#e3eaef" height="170px"></canvas>
                            </div>
                        </div>
                        </div> <!-- end col-->


                        {{-- <div class="col-md-3 col-xl-3">
                            <div class="widget-rounded-circle card-box bg-danger">
                                <div class=" row">
                                    <div class="col-4">
                                        <div class="avatar-md rounded-circle bg-white ">
                                            <i class="fe-smartphone text-white font-20 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="mt-1 text-white"><span>&nbsp; Mobile Money</span></h3>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> --}}


                        <div class="col-md-4">
                            <a href="{{ url('manage-cards') }}">
                            <div class="card" style="background-color: #0561ad; border-radius: 20px;">

                                {{-- <img class="card-img-top img-fluid" src="../assets/images/small/img-5.jpg" alt="Card image cap"> --}}
                                <div class="card-body">

                                    <h5 class="card-title text-white">My Card</h5>
                                    <br>
                                    <p class="card-text font-30 text-white" style="font-size: 23px;">1234 **** **** **** ****</p>
                                    <p class="card-text">
                                        <p class="text-white mb-0" style="font-size: 20px;">Joshua Amarfio <span class="float-right"><i class="fe-shield-off text-danger mr-1"></i>12/26</span></p>

                                    </p>
                                </div>
                            </div> <!-- end card-box-->
                            </a>
                        </div>
                        {{-- <div class="col-md-3 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md rounded-circle bg-soft-primary border-primary border">
                                    <i class="fe-log-out font-20 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="mt-1"><span >Funds Transactions</span></h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col--> --}}



                    </div>
                </div>
            </div>



            <div class="container-fluid">
                <div class="">
                    <div class="row">


                        <div class="col-md-3 col-xl-3">
                            <a href="{{ url('mobile-money') }}"><div class="widget-rounded-circle card-box" style="border-radius: 20px; background-color: #0561ad">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-md rounded-circle bg-white ">
                                            <i class="fe-log-out font-20 avatar-title text-info"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                            <div class="text-right">
                                                <h3 class="mt-1 text-white"><span>Mobile Money</span></h3>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </a>
                        </div> <!-- end col-->

                        <div class="col-md-3 col-xl-3">
                            <a href="{{ url('airtime-payment') }}">
                            <div class="widget-rounded-circle card-box bg-warning" style="border-radius: 20px;">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-md rounded-circle bg-white">
                                            <i class="fe-send font-20 avatar-title text-white text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="mt-1 text-white"><span> &nbsp; Airtime Purchase</span></h3>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                            </a>
                        </div> <!-- end col-->


                        <div class="col-md-3 col-xl-3">
                            <a href="{{ url('korpone-loane-payment') }}">
                            <div class="widget-rounded-circle card-box bg-danger" style="border-radius: 20px;">
                                <div class=" row">
                                    <div class="col-4">
                                        <div class="avatar-md rounded-circle bg-white ">
                                            <i class="fe-smartphone text-white font-20 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="mt-1 text-white"><span>&nbsp; Korpor</span></h3>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                            </a>
                        </div>


                        <div class="col-md-3 col-xl-3">
                            <a href="{{ url('cardless-payment') }}">
                            <div class="widget-rounded-circle card-box custom-color-gold" style="border-radius: 20px;">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="avatar-md rounded-circle bg-white">
                                            <i class="fe-rss font-20 avatar-title custom-text-color-gold"></i>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="text-right">
                                            <h3 class="mt-1 text-white"><span> &nbsp; Cardless</span></h3>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                            </a>
                        </div> <!-- end col-->

                        {{-- <div class="col-md-3 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md rounded-circle bg-soft-primary border-primary border">
                                    <i class="fe-log-out font-20 avatar-title text-primary"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="mt-1"><span >Funds Transactions</span></h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col--> --}}



                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-12">
                {{-- <h5 class="page-title element">ACCOUNTS</h5> --}}
                <div class="row">


                    <div class="col-md-4 col-xl-4">
                        <div class="card" style="border-radius: 20px;">
                            <div class="border mt-0 rounded">
                                <h4 class="header-title p-2 mb-0 text-dark" style="font-weight: bolder">Latest Transactions</h4>

                                <div class="table-responsive" style="height: 360px; zoom:0.9">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="avatar-sm rounded bg-soft-blue">
                                                        <i class="fe-arrow-down-left font-4 avatar-title text-blue"></i>
                                                    </div>
                                                    {{-- <div class="avatar-md rounded-circle bg-white ">
                                                        <span class="fe-arrow-down-left noti-icon text-danger"></span>
                                                    &nbsp;&nbsp;
                                                    </div> --}}
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Deposit</a>
                                                    <small class="d-block">02/03/2021</small>
                                                </td>

                                                <td class="text-right font-weight-semibold text-primary">
                                                    SLL 90,039.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td >
                                                    <div class="avatar-sm rounded bg-soft-danger">
                                                        <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">RTGS Transfer</a>
                                                    <small class="d-block">03/01/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 5,700.00
                                                </td>
                                            </tr>
                                            <tr>

                                                    <td >
                                                        <div class="avatar-sm rounded bg-soft-danger">
                                                            <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                        </div>
                                                    </td>

                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Designer Awesome T-Shirt</a>
                                                    <small class="d-block">02/06/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 888.00
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div> <!-- end .border-->

                        </div>
                    </div>

                    <div class="col-md-4 col-xl-4">
                        <div class="card" style="border-radius: 20px;">
                            <div class="border mt-0 rounded">
                                <h4 class="header-title p-2 mb-0 text-dark" style="font-weight: bolder">Expense Categories</h4>

                                <div class="table-responsive" style="height: 360px; min-height:285px; zoom:0.9">
                                    <table class="table table-centered table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="avatar-sm rounded bg-soft-danger">
                                                        <i class="fe-arrow-down-left font-4 avatar-title text-danger"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Food and Groceries</a>
                                                    <small class="d-block">02/03/2021</small>
                                                </td>

                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 90,039.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td >
                                                    <div class="avatar-sm rounded bg-soft-danger">
                                                        <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Electricity</a>
                                                    <small class="d-block">03/01/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 5,700.00
                                                </td>
                                            </tr>
                                            <tr>

                                                    <td >
                                                        <div class="avatar-sm rounded bg-soft-danger">
                                                            <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                        </div>
                                                    </td>

                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Personal</a>
                                                    <small class="d-block">02/06/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 888.00
                                                </td>
                                            </tr>
                                            <tr>

                                                <td >
                                                    <div class="avatar-sm rounded bg-soft-danger">
                                                        <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Fees</a>
                                                    <small class="d-block">02/06/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 888.00
                                                </td>
                                            </tr>
                                            <tr>

                                                <td >
                                                    <div class="avatar-sm rounded bg-soft-danger">
                                                        <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Gifts and Donations</a>
                                                    <small class="d-block">02/06/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 888.00
                                                </td>
                                            </tr>
                                            <tr>

                                                <td >
                                                    <div class="avatar-sm rounded bg-soft-danger">
                                                        <i class="fe-arrow-up-right font-4 avatar-title text-danger"></i>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="ecommerce-product-detail.html"
                                                        class="text-body font-weight-semibold">Travel</a>
                                                    <small class="d-block">02/06/2021</small>
                                                </td>
                                                <td class="text-right font-weight-semibold text-danger">
                                                    SLL 888.00
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div> <!-- end .border-->

                        </div>
                    </div>

                    <div class="col-md-4 col-xl-4">

                        {{-- <div class="col-xl-4 col-lg-5"> --}}

                        {{-- <div class="card">
                            <div class="card-body">

                                <h5 class="card-title font-16 mb-3">Accounts</h5>

                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#i_have" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            I HAVE
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#i_owe" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            I OWE
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#investments" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            INVESTMENT
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="i_have">


                                        <div class="border mt-0 rounded">
                                            <h4 class="header-title p-2 mb-0 text-success">MY CURRENT & SAVINGS</h4>

                                            <div class="table-responsive" style="height: 275px;">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('account-enquiry') }}"
                                                                    class="text-body font-weight-semibold">Savings
                                                                    Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Savings
                                                                    Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Savings
                                                                    Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Savings
                                                                    Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Red Hoodie for
                                                                    men</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>
                                                            <td class="text-right">
                                                                USD 5,700.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Designer Awesome
                                                                    T-Shirt</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>
                                                            <td class="text-right">
                                                                SLL 888.00
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div> <!-- end .border-->

                                    </div>
                                    <div class="tab-pane" id="i_owe">
                                        <div class="border mt-0 rounded">
                                            <h4 class="header-title p-2 mb-0 text-danger">My LOANS</h4>

                                            <div class="table-responsive" style="height: 275px;">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-danger">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-danger"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Savings
                                                                    Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-danger">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-danger"></i>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Red Hoodie for
                                                                    men</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>
                                                            <td class="text-right">
                                                                USD 5,700.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-danger">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-danger"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Designer Awesome
                                                                    T-Shirt</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>
                                                            <td class="text-right">
                                                                SLL 888.00
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div> <!-- end .border-->


                                    </div>
                                    <div class="tab-pane" id="investments">
                                        <div class="border mt-0 rounded">
                                            <h4 class="header-title p-2 mb-0 text-success">INVESTMENTS</h4>

                                            <div class="table-responsive" style="height: 275px;">
                                                <table class="table table-centered table-nowrap mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('account-enquiry') }}"
                                                                    class="text-body font-weight-semibold">Fixed Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 10px;">
                                                                <div class="avatar-sm rounded bg-soft-info">
                                                                    <i
                                                                        class="dripicons-wallet font-4 avatar-title text-info"></i>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <a href="ecommerce-product-detail.html"
                                                                    class="text-body font-weight-semibold">Savings
                                                                    Account</a>
                                                                <small class="d-block">01024499300101</small>
                                                            </td>

                                                            <td class="text-right">
                                                                GHS 90,039.00
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                        </div> <!-- end .border-->
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- </div> --}}
                        <div class="card" style="border-radius: 20px;">
                            <div class="border mt-0 rounded">
                                <h4 class="header-title p-2 mb-0 text-dark" style="font-weight: bolder">Forex Rates</h4>
                                <ul class="nav nav-tabs nav-bordered nav-justified">
                                    <li class="nav-item" id="currency_rates_tour">
                                        <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            Cross Rates
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            Note Rates
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content"
                                    style="overflow-y:scroll !important; height: 285px; min-height:285px; ">
                                    <div class="tab-pane active" id="home-b2">


                                        <div class="text-center cross_rates_loading_area" id="account_balance_info_loader">
                                            <div class="spinner-border text-secondary avatar-sm " role="status"></div>
                                        </div>



                                        <div class="text-center cross_rates_error_area">
                                            <img src="{{ asset('assets/images/api-error.gif') }}" class="img-fluid" alt=""
                                                style="width: 180px; height:130px;">
                                            <legend></legend>
                                            <button class="btn btn-secondary" onclick="get_fx_rate('Cross rate')"> <i
                                                    class="fe-rotate-ccw"></i> &nbsp; Please retry</button>
                                        </div>




                                        <table class="table table-bordered mb-0 cross_rate_display_area" style="zoom: 0.8;">
                                            <thead>
                                                <tr>
                                                    <th>Currency</th>
                                                    <th>SALE(SLL)</th>
                                                    <th>BUY(SLL)</th>
                                                </tr>
                                            </thead>
                                            <tbody class="display_cross_rates">

                                            </tbody>
                                        </table>



                                    </div>
                                    <div class="tab-pane " id="profile-b2">



                                        <div class="text-center cross_rates_loading_area">
                                            <div class="spinner-border text-secondary avatar-sm " role="status"></div>
                                        </div>



                                        <div class="text-center cross_rates_error_area">
                                            <img src="{{ asset('assets/images/api-error.gif') }}" class="img-fluid" alt=""
                                                style="width: 180px; height:130px;">
                                            <legend></legend>
                                            <button class="btn btn-secondary" onclick="get_fx_rate('Note rate')"> <i
                                                    class="fe-rotate-ccw"></i> &nbsp; Please retry</button>
                                        </div>



                                        <table class="table table-bordered mb-0 cross_rates_display_area"
                                            style="zoom: 0.8;">
                                            <thead>
                                                <tr>
                                                    <th>Currency</th>
                                                    <th>SALE(SLL)</th>
                                                    <th>BUY(SLL)</th>
                                                </tr>
                                            </thead>
                                            <tbody class="display_note_rates">



                                            </tbody>
                                        </table>


                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>


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




    @endsection


    @section('scripts')
        <!-- Plugins js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


        <!-- Tour page js -->
        <script src="{{ asset('assets/libs/hopscotch/js/hopscotch.min.js') }}"></script>
        <!-- Tour init js-->
        {{-- <script src="{{ asset('assets/js/pages/tour.init.js') }}"></script> --}}

        <!-- Chart JS -->
        <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>

        <!-- Chat app -->
        <script src="{{ asset('assets/js/pages/jquery.chat.js') }}"></script>

        <!-- Todo app -->
        <script src="{{ asset('assets/js/pages/jquery.todo.js') }}"></script>

        <!-- Dashboard init JS -->
        <script src="{{ asset('assets/js/pages/dashboard-3.init.js') }}"></script>

        <!-- App js-->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

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

                    //     {{-- function dynamic_display(first, second, third){
                    //      $(".cross_rate_display_area").hide()
                    //      $(".cross_rates_error_area").hide()


                    //     $('".' + first + '"').hide()
                    //     $('".' + second + '"').hide()
                    //     $('".' + third + '"').show()
                    // } --}}




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
