@extends('layouts.master')

@section('styles')
    <style>

    </style>
@endsection

@section('content')


<!-- copied code begining-->
<div class="col-md-12 col-xl-12" >
    <h5 class="page-title element">QUICK TRANSACTIONS</h5>
    <div class="row">

        <div class="col-md-7 col-xl-7" >

            <div class="card">
                <div class="card-body" style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">


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
                </div> <!-- end card-box-->
            </div> <!-- end col -->

        </div>


        <div class="col-md-5 col-xl-5 ">
            <div class="card">
                <div class="card-header bg-blue py-2 text-white">
                    <div class="card-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false"
                            aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>

                    </div>
                    <h5 class="card-title mb-0 text-white" id="currency_converter_tour">Currency Converter</h5>
                </div>
                <div id="cardCollpase5" class="collapse show" style="height: 370px; min-height:370; zoom: 0.9;">
                    <div class="card-body" style="background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));">



                        <div class="text-center currency_converter_loading_area"
                            id="account_balance_info_loader">
                            <div class="spinner-border text-secondary avatar-sm " role="status"></div>
                        </div>



                        <div class="text-center currency_converter_error_area">
                            <img src="{{ asset('assets/images/api-error.gif') }}" class="img-fluid" alt=""
                                style="width: 180px; height:130px;">
                            <legend></legend>
                            <button class="btn btn-secondary" onclick="get_correct_fx_rate()"> <i
                                    class="fe-rotate-ccw"></i> &nbsp; Please retry</button>
                        </div>


                        <form action="" autocomplete="off" aria-autocomplete="off"
                            class="currency_converter_display_area">

                            <div class="row">

                                <div class="col-xl-6">
                                    <label for="" class="text-info">From</label>
                                    <select class="form-control select_currency" id="exch_rate_from">
                                        <option value="">-- Currency --</option>
                                        {{-- <option value="EUR">(EUR) EURO</option>
                                    <option value="SLL">(SLL) LOENE</option>
                                    <option value="USD">(USD) US DOLLAR</option>
                                    <option value="GBP">(GBP) BRITISH POUNDS</option> --}}


                                    </select>
                                </div>

                                <div class="col-xl-6">
                                    <label for="" class="text-info">To</label>
                                    <select class="form-control select_currency" id="exch_rate_to">
                                        <option value="">-- Currency --</option>
                                        {{-- <option value="EUR">(EUR) EURO</option>
                                        <option value="SLL">(SLL) LOENE</option>
                                        <option value="USD">(USD) US DOLLAR</option>
                                        <option value="GBP">(GBP) BRITISH POUNDS</option> --}}
                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <div>
                                            <input type="text" class="form-control"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                required placeholder="0.00" id="amount" />
                                            <input type="hidden" value="" id="hide_fx_rate">
                                        </div>
                                    </div>
                                </div>

                                <span id="display"></span>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Result</label>
                                        <div>
                                            <span id="result"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>








</div>

<!-- copied code end -->




    <!-- Start Content-->
    <div class="container-fluid">
    <legend></legend>
        <!-- start page title -->
        <div class="row" style="zoom: 0.8;">
            <div class="col-12">
                <div class="">
                    <div class="page-title-right">
                        {{--  <form class="form-inline">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control border" id="dash-daterange">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-blue border-blue text-white">
                                            <i class="mdi mdi-calendar-range"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>  --}}
                    </div>
                    <h5 class="page-title">MY ACCOUNTS</h5>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-md-6 col-xl-6">
                <div class="widget-rounded-circle card-box">
                    <div class="row">

                        <canvas id="myChart" width="400" height="300"></canvas>

                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-6">
                <div class="card-box" style="zoom: 0.94;">
                    {{-- <h4 class="header-title mb-4">Tabs Justified</h4> --}}

                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                I HAVE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                I OWE
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                Messages
                                            </a>
                                        </li> --}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="home1" >


                            <div class="border mt-0 rounded"  >
                                <h4 class="header-title p-2 mb-0 text-success">MY CURRENT & SAVINGS</h4>

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

                                                <td class="text-right">
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

                                                <td class="text-right">
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

                                                <td class="text-right">
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

                                                <td class="text-right">
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
                                                        class="text-body font-weight-semibold">Red Hoodie for men</a>
                                                    <small class="d-block">01024499300101</small>
                                                </td>
                                                <td class="text-right">
                                                    USD 5,700.00
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
                                                        class="text-body font-weight-semibold">Designer Awesome T-Shirt</a>
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
                        <div class="tab-pane  " id="profile1">



                            <div class="border mt-0 rounded">
                                <h4 class="header-title p-2 mb-0 text-danger">My LOANS</h4>

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

                                                <td class="text-right">
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
                                                <td class="text-right">
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

                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->


        </div>
        <!-- end row-->



        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="page-title-right">

{{--
                        <form class="form-inline">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control border" id="dash-daterange">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-blue border-blue text-white">
                                            <i class="mdi mdi-calendar-range"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>  --}}


                    </div>
                    <h6 class="page-title">QUICK TRANSACTIONS</h6>
                </div>
            </div>

            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md rounded-circle bg-soft-info border-info border">
                                <i class="fe-smartphone font-20 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="mt-1"><span >&nbsp; Mobile Money</span></h3>
                                {{--  <p class="text-muted mb-1 text-truncate">Total Revenue</p>  --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
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
                                {{--  <p class="text-muted mb-1 text-truncate">Todays Sales</p>  --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md rounded-circle bg-soft-info border-info border">
                                <i class="fe-send font-20 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                               <h3 class="mt-1"><span > &nbsp; All Payments</span></h3>
                                {{--  <p class="text-muted mb-1 text-truncate">Conversion</p>  --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-3 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-rss font-20 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="mt-3"><span > &nbsp;&nbsp; Cardless</span></h3>
                                {{--  <p class="text-muted mb-1 text-truncate">Todays Visits</p>  --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-0">Total Revenue</h4>

                    <div class="widget-chart text-center" dir="ltr">

                        <div id="total-revenue" class="mt-0" data-colors="#4fc6e1"></div>

                        <h5 class="text-muted mt-0">Total sales made today</h5>
                        <h2>$178</h2>

                        <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best
                            in the meat of your page content.</p>

                        <div class="row mt-4">
                            <div class="col-4">
                                <p class="text-muted font-13 mb-1 text-truncate">Target</p>
                                <h4><i class="fe-arrow-down text-danger mr-1"></i>$7.8k</h4>
                            </div>
                            <div class="col-4">
                                <p class="text-muted font-13 mb-1 text-truncate">Last week</p>
                                <h4><i class="fe-arrow-up text-success mr-1"></i>$1.4k</h4>
                            </div>
                            <div class="col-4">
                                <p class="text-muted font-13 mb-1 text-truncate">Last Month</p>
                                <h4><i class="fe-arrow-down text-danger mr-1"></i>$15k</h4>
                            </div>
                        </div>

                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col-->

            <div class="col-lg-8">
                <div class="card-box pb-2">
                    <div class="float-right d-none d-md-inline-block">
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-xs btn-light">Today</button>
                            <button type="button" class="btn btn-xs btn-light">Weekly</button>
                            <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Sales Analytics</h4>

                    <div dir="ltr">
                        <div id="sales-analytics" class="mt-4" data-colors="#0561ad,#4fc6e1"></div>
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Top 5 Users Balances</h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                            <thead class="thead-light">
                                <tr>
                                    <th colspan="2">Profile</th>
                                    <th>Currency</th>
                                    <th>Balance</th>
                                    <th>Reserved in orders</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="contact-img"
                                            title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Tomaslau</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                    </td>

                                    <td>
                                        0.00816117 BTC
                                    </td>

                                    <td>
                                        0.00097036 BTC
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i
                                                class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="contact-img"
                                            title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Erwin E. Brown</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-eth text-primary"></i> ETH
                                    </td>

                                    <td>
                                        3.16117008 ETH
                                    </td>

                                    <td>
                                        1.70360009 ETH
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i
                                                class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="contact-img"
                                            title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Margeret V. Ligon</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-eur text-primary"></i> EUR
                                    </td>

                                    <td>
                                        25.08 EUR
                                    </td>

                                    <td>
                                        12.58 EUR
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i
                                                class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="contact-img"
                                            title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Jose D. Delacruz</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-cny text-primary"></i> CNY
                                    </td>

                                    <td>
                                        82.00 CNY
                                    </td>

                                    <td>
                                        30.83 CNY
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i
                                                class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 36px;">
                                        <img src="{{ asset('assets/images/users/user-6.jpg') }}" alt="contact-img"
                                            title="contact-img" class="rounded-circle avatar-sm" />
                                    </td>

                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Luke J. Sain</h5>
                                        <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                                    </td>

                                    <td>
                                        <i class="mdi mdi-currency-btc text-primary"></i> BTC
                                    </td>

                                    <td>
                                        2.00816117 BTC
                                    </td>

                                    <td>
                                        1.00097036 BTC
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-plus"></i></a>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i
                                                class="mdi mdi-minus"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-xl-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Revenue History</h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                            <thead class="thead-light">
                                <tr>
                                    <th>Marketplaces</th>
                                    <th>Date</th>
                                    <th>Payouts</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Themes Market</h5>
                                    </td>

                                    <td>
                                        Oct 15, 2018
                                    </td>

                                    <td>
                                        $5848.68
                                    </td>

                                    <td>
                                        <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Freelance</h5>
                                    </td>

                                    <td>
                                        Oct 12, 2018
                                    </td>

                                    <td>
                                        $1247.25
                                    </td>

                                    <td>
                                        <span class="badge bg-soft-success text-success">Paid</span>
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Share Holding</h5>
                                    </td>

                                    <td>
                                        Oct 10, 2018
                                    </td>

                                    <td>
                                        $815.89
                                    </td>

                                    <td>
                                        <span class="badge bg-soft-success text-success">Paid</span>
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Envatos Affiliates</h5>
                                    </td>

                                    <td>
                                        Oct 03, 2018
                                    </td>

                                    <td>
                                        $248.75
                                    </td>

                                    <td>
                                        <span class="badge bg-soft-danger text-danger">Overdue</span>
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Marketing Revenue</h5>
                                    </td>

                                    <td>
                                        Sep 21, 2018
                                    </td>

                                    <td>
                                        $978.21
                                    </td>

                                    <td>
                                        <span class="badge bg-soft-warning text-warning">Upcoming</span>
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="m-0 font-weight-normal font-13">Advertise Revenue</h5>
                                    </td>

                                    <td>
                                        Sep 15, 2018
                                    </td>

                                    <td>
                                        $358.10
                                    </td>

                                    <td>
                                        <span class="badge bg-soft-success text-success">Paid</span>
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);" class="btn btn-xs btn-light"><i
                                                class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->




@endsection


@section('scripts')
    <!-- Plugins js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['I HAVE', 'I OWE'],
                datasets: [{
                    label: 'MY ACCOUNTS',
                    data: [12, 19],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            {{-- options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            } --}}
        });

    </script>



    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>



@endsection
