@extends('layouts.master')

@section('styles')
<style>
    .home-card {
        height: 5.5rem;
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(5px);
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
</style>
@endsection

@section('content')



<!-- Start Content-->
<div class="container-fluid ">
    <legend></legend>
    <!-- start page title -->

    <!-- end page title -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="{{ url('payments') }}">
                    <div class="widget-rounded-circle card-box home-card "
                        style="background-color: rgba(191, 236, 227, 1);">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-sm rounded-circle bg-white ">
                                    <i class="fe-log-out font-5 avatar-title text-info"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="mt-1 text-black "><span><b>Payments</b></span></h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ url('account-enquiry') }}">
                    <div class="widget-rounded-circle card-box home-card"
                        style="background-color: rgba(251, 207, 214, 1);">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-sm rounded-circle bg-white">
                                    <i class="fe-send font-20 avatar-title text-white text-warning"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="mt-1 text-black "><span> &nbsp;<b>Account Enquiry</b> </span></h3>
                                </div>
                            </div> <!-- end row-->
                        </div> <!-- end widget-rounded-circle-->
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-3 dropdown">

                <div class="widget-rounded-circle card-box home-card  dropdown-toggle" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="background-color: rgba(253, 235, 205, 1);cursor: pointer;">
                    <div class="row ">
                        <div class="col-4">
                            <div class="avatar-sm rounded-circle bg-white">
                                <i class="fe-rss font-20 avatar-title custom-text-color-gold text-success"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="mt-1 text-black"><span> &nbsp;<b>Transfers</b> </span></h3>
                            </div>

                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->

                {{-- <select name="" id="">
                    <option value="">Welcome</option>
                </select> --}}
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                    style="background-color: rgba(253, 235, 205, 1);">
                    <a class="dropdown-item" href="{{ url('own-account') }}" id="dropdown_own_account">Own
                        Account</a>
                    <a class="dropdown-item " href="{{ url('same-bank') }}">Same Bank</a>
                    <a class="dropdown-item" href="{{ url('local-bank') }}">Other Bank</a>
                    <a class="dropdown-item" href="{{ url('international-bank') }}">International Bank</a>
                    <a class="dropdown-item" href="{{ url('standing-order') }}">Standing Order</a>
                    @if (config('app.corporate'))
                    <a class="dropdown-item" href="{{ url('bulk-transfer') }}">Bulk Transfer</a>
                    @endif

                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <a href="{{ url('e-korpor') }}">
                    <div class="widget-rounded-circle card-box home-card"
                        style="background-color: rgba(153, 225, 254, 1);">
                        <div class=" row">
                            <div class="col-4">
                                <div class="avatar-sm rounded-circle bg-white ">
                                    <i class="fe-smartphone text-white font-20 avatar-title text-danger"></i>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="text-right">
                                    <h3 class="mt-1 text-black"><span>&nbsp;<b>E-Korpor</b> </span></h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card-box p-0"
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;zoom:0.8;">
                    <div class="row">
                        <div class="col-md-4">
                            {{-- <h3 class="text-center text-dark"><b>Account Balance</b></h3> --}}
                            <br>


                            <canvas id="myChart" width="100" height="100">

                            </canvas>
                            <br>
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border avatar-lg text-primary  m-2 canvas_spinner" role="status">
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">
                            <br><br><br>
                            <div class="card-body">

                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between bg-info align-items-center active"
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
                                        <a href="#" data-toggle="modal" data-target="#bs-example-modal-lg"><strong
                                                class="text-success casa_chart">
                                                CURRENT &
                                                SAVINGS
                                                ACCOUNT</strong></a>

                                        {{-- <strong class="text-success total_casa_amount float-right"></strong> --}}
                                        <strong>

                                            SLL <span class="text-success total_casa_amount open-money">0.00</span>
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
                                        <a href="#" data-toggle="modal" data-target="#bs-example-modal-lg"><strong
                                                class="text-warning investment_chart">INVESTMENTS</strong></a>

                                        {{-- <strong class="total_investment_amount"></strong> --}}
                                        {{-- <span class="badge badge-warning badge-pill investment_count">0</span> --}}
                                        <strong>

                                            SLL <span
                                                class="text-warning total_investment_amount open-money">0.00</span>
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
                                        <a href="#" data-toggle="modal" data-target="#bs-example-modal-lg"><strong
                                                class="text-danger loans_chart"> LOANS </strong></a>

                                        {{-- <strong class="total_loan_account"></strong> --}}
                                        {{-- <span class="badge badge-danger badge-pill loan_count">0</span> --}}
                                        <strong>

                                            SLL <span class="text-danger total_loan_account open-money">0.00</span>
                                            <span class="i_have_amount_ close-money">***********</span>
                                            &nbsp;&nbsp;&nbsp;
                                            <i class="fas fa-eye  float-right eye-open text-white" data-toggle="tooltip"
                                                data-placement="bottom" title="" data-original-title="More Info"></i>
                                            <i class="fa fa-eye-slash  float-right eye-close text-white"
                                                data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="More Info"></i>

                                        </strong>
                                    </li>

                                </ul>

                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                        </div> --}}


                        {{-- <div class="col-md-8">
                            <br><br>
                            <div class="card w-100 h-25 d-inline-block" style="border-radius: 20px;">
                                <div class="border mt-0 rounded p-2"
                                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;zoom:0.9">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <h4 class="header-title p-2 mb-0 text-primary col-md-4 "
                                                style="font-weight: bolder">
                                                Latest
                                                Transactions</h4>

                                            <div class="col-md-8">
                                                <select name="" class="form-control" id="account_transaction">

                                                    @foreach ($accounts as $i => $account)
                                                    <option value={{ $account->accountNumber }}>
                                                        {{ $account->accountDesc . ' ~ ' . $account->accountNumber }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div>



                                    <legend></legend>
                                    <div class="table-responsive table-bordered">
                                        <table id="" class="table table-striped mb-0 ">
                                            <thead>
                                                <tr class="bg-info text-white ">
                                                    <td> <b> Date & Time</b> </td>
                                                    <td> <b> Batch No.</b> </td>
                                                    <td> <b> Description </b> </td>
                                                    <td> <b> Amount </b> </td>
                                                    <td> <b> Running Balance </b> </td>

                                                </tr>
                                            </thead>
                                            <tbody class="transaction_history">

                                                <tr class="text-center text-center">
                                                    <td colspan="5"><img src="{{ asset('assets/images/no_data.png') }}"
                                                            alt="" width="150">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="table-responsive" style="height: 150px; zoom:0.9">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <tbody id="transaction_history">


                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div> <!-- end .border-->

                            </div>
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
                                        <span
                                            class="badge badge-success badge-pill currency_and_savings_account_no"></span>
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

                            </div>
                        </div> --}}
                    </div>

                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">

                            {{-- <div class="card-body">

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
                                        <span
                                            class="badge badge-success badge-pill currency_and_savings_account_no"></span>
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

                            </div> --}}

                        </div>
                        <div class="col-md-2"></div>
                    </div>


                </div>
                <div class="card-box "
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;zoom:0.9;">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active"
                                id="casa_chart_tab">
                                <strong class="text-success">CURRENT & SAVINGS</strong>
                                <select name="" id="casa_line_chart" class="form-control ">
                                    {{-- <option value="" disabled>Select
                                        Account Number</option> --}}
                                    @foreach (session()->get('customerAccounts') as $i => $account)
                                    <option selected
                                        value="{{ $account->accountType . ' ~ ' . $account->accountDesc . ' ~ ' . $account->accountNumber . ' ~ ' . $account->currency . ' ~ ' . $account->availableBalance }}">
                                        {{ $account->accountDesc . ' || ' . $account->accountNumber . ' || ' .
                                        $account->currency . ' ' . $account->availableBalance }}
                                    </option>
                                    @endforeach
                                </select>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link "
                                id="investment_chart_tab">
                                <strong class="text-warning">INVESTMENTS</strong>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link"
                                id="loans_chart_tab">
                                <strong class="text-danger">LOANS</strong> &nbsp;
                            </a>
                        </li> --}}
                    </ul>
                    <div class="tab-content container">
                        <div class="tab-pane active" id="home">
                            <span colspan="100%" class="text-center" id="line_chart_no_data">
                                <br><br>
                                {!! $noDataAvailable !!}
                            </span>
                            <canvas id="casa_myChart" style="width:200px;max-width:700px;">

                            </canvas>


                            {{-- <canvas id="myChart" style="width:100%;max-width:700px"></canvas> --}}






                            {{-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> --}}

                            {{-- <div class="table-responsive table-bordered accounts_display_area">
                                <table id="" class="table table-striped mb-0 ">
                                    <thead>
                                        <tr class="bg-info text-white ">
                                            <td> <b> Account No </b> </td>
                                            <td> <b> Description </b> </td>
                                            <td> <b> Product </b> </td>
                                            <td> <b> Cur </b> </td>
                                            <td> <b> OverDraft </b> </td>
                                            <td> <b> Ledger Bal </b> </td>
                                            <td> <b> Av. Bal </b> </td>
                                        </tr>
                                    </thead>
                                    <tbody class="casa_list_display">


                                    </tbody>
                                </table>
                            </div> --}}




                        </div>

                        <div class="tab-pane show " id="profile">

                            <p id="fixed_deposit_account">

                                {{--
                            <div class="table-responsive table-bordered my_investment_display_area">
                                <table id="" class="table table-striped mb-0 ">
                                    <thead>
                                        <tr class="bg-info text-white ">
                                            <td> <b> Account No </b> </td>
                                            <td> <b> Deal Amount </b> </td>
                                            <td> <b> Tunure </b> </td>
                                            <td> <b> FixedInterestRate </b> </td>
                                            <td> <b> Rollover </b> </td>

                                        </tr>
                                    </thead>
                                    <tbody class="fixed_deposit_account">
                                        <td colspan="100%" class="text-center">
                                            global noDataAvailable image variable shared with all views
                                            {!! $noDataAvailable !!}
                                        </td>

                                    </tbody>
                                </table>
                            </div> --}}
                            <!-- end table-responsive -->

                            </p>

                        </div>

                        <div class="tab-pane" id="messages">
                            <p id="p_loans_display">

                                {{--
                            <div class="table-responsive table-bordered loans_display_area">
                                <table id="" class="table table-striped mb-0 ">
                                    <thead>
                                        <tr class="bg-info text-white ">
                                            <td> <b> Facility No </b> </td>
                                            <td> <b> Description </b> </td>
                                            <td> <b> Cur </b> </td>
                                            <td> <b> Amount Granted </b> </td>
                                            <td> <b> Loan Bal </b> </td>

                                        </tr>
                                    </thead>
                                    <tbody class="loans_display">


                                    </tbody>
                                </table>
                            </div> --}}
                            <!-- end table-responsive -->


                            </p>

                        </div>
                    </div>
                </div> <!-- end card-box-->


            </div>
            <div class="col-md-4">
                {{-- <br> --}}
                {{-- <br> --}}
                <div class="card-box"
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h4 class="header-title text-center"> <b>Transfer Rate</b></h4>
                    {{--
                    <hr> --}}
                    <div class="table-responsive">
                        <table class="table mb-0" style="zoom: 0.9">
                            <thead>
                                <tr>
                                    <th><b>CURRENCY</b></th>
                                    <th><b>SELL(SLL)</b></th>
                                    <th><b>BUY(SLL)</b></th>
                                </tr>
                            </thead>
                            <tbody class="currency_fx_rate">
                                <tr>
                                    <td colspan="3">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border avatar-lg text-primary  m-2 " role="status">
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- <br> --}}
                <div class="card-box"
                    style="background-color: rgba(153, 225, 246, 1);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h4 class="header-title text-center"><b>Currency Convertor</b></h4>
                    {{--
                    <hr class="mt-0"> --}}
                    <form action="" style="zoom: 0.9">

                        <div class="row">

                            <div class="col-xl-6">
                                <label for="" class="text-dark"><b>From</b></label>
                                <select class="form-control" id="exch_rate_from">
                                    <option value="">-- Select Currency --</option>
                                    <option value="EUR">(EUR) EURO</option>
                                    {{-- <option value="SLL">(SLL) LOENE</option> --}}
                                    <option value="USD">(USD) US DOLLAR</option>
                                    <option value="GBP">(GBP) BRITISH POUNDS</option>


                                </select>
                            </div>

                            <div class="col-xl-6">
                                <label for="" class="text-dark"><b>To</b></label>
                                <select class="form-control" id="exch_rate_to">
                                    <option value="">-- Select Currency --</option>
                                    {{-- <option value="EUR">(EUR) EURO</option> --}}
                                    <option value="SLL" selected>(SLL) LOENE</option>
                                    {{-- <option value="USD">(USD) US DOLLAR</option> --}}
                                    {{-- <option value="GBP">(GBP) BRITISH POUNDS</option> --}}
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="text-dark"><b>Amount</b></label>
                                    <div>
                                        <input type="number" class="form-control" required
                                            placeholder="Enter only numbers" id="exchange_amount" />
                                    </div>
                                </div>
                            </div>

                            <span id="display"></span>

                            <div class="col-xl-12">
                                <div class="form-group">
                                    <label class="text-dark"><b>Result</b></label>
                                    <div>
                                        <input type="text" class="form-control readOnly" id="exchange_result" readonly>

                                        {{-- <span></span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card site-card">
                    <div class="card-body">
                        <br><br><br><br>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="bs-example-modal-lg" role="dialog"
                style="position: absolute; left:50%; top:60%;transform: translate(-50%, -50%);"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> --}}
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive table-bordered accounts_display_area" style="display: none">
                                <h3 class="text-center text-success">CURRENT & SAVINGS ACCOUNT</h3>
                                <table id="" class="table table-striped mb-0 ">
                                    <thead>
                                        <tr class="bg-info text-white ">
                                            <td> <b> Account No </b> </td>
                                            <td> <b> Description </b> </td>
                                            <td> <b> Product </b> </td>
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

                            <div class="table-responsive table-bordered my_investment_display_area"
                                style="display: none">
                                <h3 class="text-center text-warning">INVESTMENTS</h3>
                                <table id="" class="table table-striped mb-0 ">
                                    <thead>
                                        <tr class="bg-info text-white ">
                                            <td> <b> Account No </b> </td>
                                            <td> <b> Deal Amount </b> </td>
                                            <td> <b> Tunure </b> </td>
                                            <td> <b> FixedInterestRate </b> </td>
                                            <td> <b> Rollover </b> </td>

                                        </tr>
                                    </thead>
                                    <tbody class="fixed_deposit_account">


                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive table-bordered loans_display_area" style="display: none">
                                <h3 class="text-center text-danger">LOANS</h3>
                                <table id="" class="table table-striped mb-0 ">
                                    <thead>
                                        <tr class="bg-info text-white ">
                                            <td> <b> Facility No </b> </td>
                                            <td> <b> Description </b> </td>
                                            <td> <b> Cur </b> </td>
                                            <td> <b> Amount Granted </b> </td>
                                            <td> <b> Loan Bal </b> </td>

                                        </tr>
                                    </thead>
                                    <tbody class="loans_display">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            @endsection


            @section('scripts')
            <!-- Plugins js-->
            <script src="{{ asset('assets/js/chart.js') }}"></script>
            {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> --}}


            <!-- Tour page js -->
            {{-- <script src="{{ asset('assets/libs/hopscotch/js/hopscotch.min.js') }}"></script> --}}

            {{-- <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('assets/libs/jquery.scrollto/jquery.scrollTo.min.js') }}"></script> --}}

            <!-- Dashboard init JS -->
            {{-- <script src="{{ asset('assets/js/pages/dashboard-3.init.js') }}"></script> --}}

            <!-- App js-->
            {{-- <script src="{{ asset('assets/js/app.min.js') }}"></script> --}}


            <script>
                var i_have = 0
                    var i_owe = 0
                    var i_invest_total = 0

                    function show_chart(i_have, i_owe, i_invest_total) {
                        $(".canvas_spinner").hide()
                        console.log(i_have)
                        console.log(i_owe)
                        console.log(i_invest_total)
                        const data = {
                            labels: ['I HAVE', 'Investments', 'I OWE'],
                            datasets: [{
                                label: 'MY ACCOUNTS',
                                backgroundColor: [
                                    'rgb(75,192,192, 0.7)',
                                    'rgba(231, 223, 10, 0.7)',
                                    'rgb(233,55,93, 0.7)',
                                    'rgba(75, 192, 192, 0.7)',
                                    'rgba(153, 102, 255, 0.7)',
                                    'rgba(255, 159, 64, 0.7)'
                                ],
                                //borderColor: 'rgb(255, 99, 132)',
                                data: [i_have, i_owe, i_invest_total],
                                hoverOffset: 10
                            }]
                        };

                        const config = {
                            type: 'doughnut',
                            data: data,
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: 'MY ACCOUNT'
                                    }
                                }
                            },
                        };
                        // === include 'setup' then 'config' above ===

                        const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                        );
                    }

                    function account_line_chart(cus_accounts, acc_line_details) {

                        //console.log("========")
                        //console.log([cus_accounts, acc_line_details])
                        //console.log("========")

                        let acc_dataset = []
                        let chart_data_details = new Array
                        {{-- let show_chart_data = [] --}}

                        let before_reverse = []

                        let acc_chart_details = acc_line_details

                        empty(chart_data_details);
                        $.each(acc_chart_details, function(index) {

                            let chart_res = acc_chart_details[index]

                            //console.log("========")
                            //console.log(chart_res)
                            //console.log("========")


                            let new_chart_res = chart_res[2]
                            var mii = new_chart_res.reverse()
                            before_reverse.push(mii)

                            chart_data_details.push(

                                {
                                    label: `${chart_res[0]} ${chart_res[1]}`,
                                    data: chart_res[2],
                                    borderColor: "red",
                                    fill: false
                                }



                            )



                        })

                        let apiData = cus_accounts

                        let datasets = []
                        var numbers = []
                        var dates = []
                        $.each(apiData, function(index) {


                            //console.log("=======")
                            //console.log(apiData[index])
                            //console.log("=======")
                            let apiDataResult = apiData[index]
                            empty(numbers)
                            empty(dates)
                            $.each(apiDataResult, function(index) {



                                numbers.push(apiDataResult[index].runningBalance)
                                var d = apiDataResult[index].valueDate
                                d = d.split(' ')[0];
                                dates.push(d)
                                //console.log("d:", d);



                            })

                        })

                        const smallest_number = Math.min(...numbers);
                        const largest_number = Math.max(...numbers);

                        console.log("dates:", dates);

                        let uniqueDates = [...new Set(dates)].sort();
                        console.log("dates for x-axis:", uniqueDates)

                        console.log('Smallest Value:', smallest_number);
                        console.log('Largest Value:', largest_number);
                        //console.log('Dataset:', acc_dataset);
                        console.log('chart_data_details:', chart_data_details);









                        // === include 'setup' then 'config' above ===



                        // w3schools chart
                        var xValues = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];

                        new Chart("casa_myChart", {
                            type: "line",
                            data: {
                                labels: dates,
                                datasets: chart_data_details
                            },
                            options: {
                                legend: {
                                    display: true,

                                },
                                title: {
                                    display: true,
                                    text: 'Account History'
                                }

                            }
                        });
                    }
            </script>


            <script>

            </script>

            <script>
                let noDataAvailable = {!! json_encode($noDataAvailable) !!}
            </script>

            <script>
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
                        return false;
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

                        $('.my_investment_loading_area').hide()
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
                                console.log(response);

                                let data = response.data;
                                let noInvestments = noDataAvailable.replace(
                                    "Data",
                                    "Investments"
                                );



                                if (response.responseCode == '000') {


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
                                            console.log(data[index])


                                            let invest_amount = data[index].dealAmount
                                            invest_amount = invest_amount.replace(/,/g, "");
                                            account_data.i_invest_total += Math.abs(parseFloat(invest_amount))

                                            if (account_data.i_invest_total != null || account_data
                                                .i_invest_total != "") {
                                                $(".total_investment_amount").text(
                                                    `${formatToCurrency(parseFloat(account_data.i_invest_total))}`
                                                )
                                            } else {
                                                $(".total_investment_amount").text("0.00")
                                            }


                                            var data_rollover = data[index].rollover
                                            if (data_rollover == "Y") {
                                                var rollover_ = "Yes"
                                            } else {
                                                var rollover_ = "No"
                                            }

                                            console.log(`total investments ${account_data.i_invest_total}`)
                                            $('.fixed_deposit_account').append(
                                                `<tr>
                                                    <td><b> ${data[index].interestAccount} </b></td>
                                                    <td><b class="float-right"> ${ formatToCurrency(parseFloat(data[index].dealAmount))} </b></td>
                                                    <td><b> ${data[index].tenure} </b></td>
                                                    <td><b> ${data[index].fixedInterestRate} </b></td>
                                                    <td><b> ${rollover_ } </b></td>
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

                                        $(".fixed_deposit_account").append(
                                            `
                                                <td colspan="100%"  class="text-center">${noInvestments} </td>

                                            `
                                        );
                                        return;

                                        {{-- $('#p_fixed_deposit_account').html(
                                    `<h2 class="text-center text-warning">No Investment</h2>`) --}}

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

                                {{-- console.log("before get account:", response); --}}


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
                                        if (account_data.i_have_total != null || account_data.i_have_total != '') {
                                            $(".total_casa_amount").text(
                                                `${formatToCurrency(parseFloat(account_data.i_have_total))}`)
                                        } else {
                                            $(".total_casa_amount").text(
                                                `${formatToCurrency(parseFloat(0.00))}`)
                                        }
                                        if (data[index].availableBalance != null || data[index].availableBalance !=
                                            undefined) {
                                            var availableBalance = formatToCurrency(parseFloat(data[index]
                                                .availableBalance))
                                        } else {
                                            var availableBalance = "0.00"
                                        }

                                        $('.casa_list_display').append(
                                            `<tr>
                                        <td>  <a href="{{ url('account-enquiry?ac=${encodeString(data[index].accountNumber)}') }}"> <b class="text-primary">${data[index].accountNumber} </b> </a></td>
                                        <td> <b> ${data[index].accountDesc} </b>  </td>
                                        <td> <b> ${data[index].accountType}  </b>  </td>
                                        <td> <b> ${data[index].currency}  </b>  </td>
                                        {{-- <td>  <b> 0.00  </b> </td> --}}
                                        {{-- <td> <b> ${formatToCurrency(parseFloat(data[index].ledgerBalance))}   </b>  </td> --}}
                                        <td> <b class="float-right"> ${availableBalance}   </b></td>
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
                                //console.log("========")
                                //console.log("loan response:", response);
                                //console.log("========")

                                let noLoans = noDataAvailable.replace(
                                    "Data",
                                    "Loans"
                                );

                                if (response.responseCode == '000') {

                                    var data = response.data;
                                    let noLoans = noDataAvailable.replace("Data", "Loans");
                                    {{-- console.log("loans" + data) --}}

                                    if (!response.data) {

                                        return false
                                        $('.loan_no_data_found').show()
                                        $(".loans_display_area").hide()
                                    } else {
                                        if (response.data == null) {
                                            $("#loans_list_body").append(
                                                `<td colspan="100%" class="text-center">
                                                ${noLoans} </td>`
                                            );
                                            return;
                                        } else {

                                            let loan_count = 0

                                            if (response.data.length > 0) {
                                                $('#p_loans_display').show()
                                                $(".loans_display_area").show()
                                                console.log("loans_display length:", response.data.length);

                                                let i_owe_total = 0
                                                let count = 0

                                                account_data.i_owe_total = 0
                                                $.each(data, function(index) {
                                                    let loanBalance = data[index].loanBalance
                                                    loanBalance = loanBalance.replace(/,/g, "");
                                                    account_data.i_owe_total += Math.abs(parseFloat(loanBalance));

                                                    console.log("account_data_i_owe_total:",
                                                        account_data.i_owe_total)

                                                    if (account_data.i_owe_total != null || account_data
                                                        .i_owe_total != "") {
                                                        $(".total_loan_account").text(formatToCurrency(parseFloat(
                                                            account_data.i_owe_total)))
                                                    } else {
                                                        $(".total_loan_account").text(formatToCurrency(parseFloat(
                                                            0.00)))
                                                    }


                                                    console.log(`total loans ${account_data.i_owe_total}`)
                                                    $('.loans_display').append(
                                                        `
                                                            <tr>
                                                                <td>  <a href="{{ url('account-enquiry?ac=${encodeString(data[index].facilityNo)}') }}"> <b class="text-danger">${data[index].facilityNo} </b> </a></td>
                                                                <td> <b> ${data[index].description} </b>  </td>
                                                                <td> <b> ${data[index].isoCode}  </b>  </td>
                                                                <td> <b class="float-right"> ${ formatToCurrency(parseFloat(data[index].amountGranted))}   </b> </b></td>
                                                                <td> <b class="float-right"> ${formatToCurrency(parseFloat(data[index].loanBalance))}  </b>  </td>
                                                            </tr>`
                                                    )
                                                    loan_count = loan_count + 1;


                                                })

                                                $(".loan_count").text(loan_count);

                                                {{-- console.log('i_owe_total: ' + i_owe_total) --}}

                                                {{-- show_chart(i_have, i_owe, i_invest_total) --}}
                                            } else {
                                                $(".loans_display").append(
                                                    `<td colspan="100%" class="text-center">
                                                        ${noLoans} </td>`
                                                );
                                                return;
                                            }
                                        }


                                    }



                                } else if (response.responseCode == '00') {
                                    $(".loan_no_data_found").show()
                                    $(".loans_error_area").hide()
                                    $(".loans_loading_area").hide()
                                    $(".loans_display_area").hide()
                                } else {
                                    $(".loans_display").append(
                                        `<td colspan="100%" class="text-center">
                                                        ${noLoans} </td>`
                                    );
                                    return;
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


                    $("#exchange_amount").keyup(function() {
                        var exch_rate_from = $("#exch_rate_from").val();
                        var exch_rate_to = $("#exch_rate_to").val();
                        let ex_amount = $(this).val();
                        console.log(forex_rate)
                        console.log(exch_rate_from)
                        console.log(exch_rate_to)
                        console.log($(this).val())

                    })

                    function formatToCurrency(amount) {
                        return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
                    };

                    {{-- var c = {}

            var forex_rate = []
            var cur_1 = "SLL"
            var cur_2 = "SLL"

            var _cur_ = []
            var get_cur_1 = []
            var get_cur_2 = [] --}}

                    function getCorrectFxRates() {
                        $.ajax({
                            type: "GET",
                            url: "get-correct-fx-rate-api",
                            datatype: "application/json",
                            success: (response) => {
                                {{-- console.log("======")
                        console.log(response.data)
                        console.log("======") --}}
                                if (response.responseCode === "000") {
                                    forex_rate = response.data
                                    $(".currency_fx_rate tr").remove();

                                    data = response.data;
                                    $.each(data, (i) => {
                                        let color = [
                                            'table-success',
                                            'table-warning',
                                            'table-info',
                                            'table-danger',
                                            'table-info',
                                            'table-success',
                                            'table-warning',
                                            'table-danger'
                                        ];
                                        let card_color = color[i];
                                        {{-- console.log("======")
                                console.log(card_color)
                                console.log("======") --}}

                                        {{-- let randomItem = card_color[Math.floor(Math.random() * card_color.length)]; --}}


                                        let {
                                            PAIR,
                                            MIDRATE,
                                            BUY,
                                            SELL
                                        } = data[i];


                                        let [currency1, currency2] = PAIR.split("/");
                                        let baseFlagsPath = "assets/images/flags/";
                                        let imageProps =
                                            "class='img-fluid'  style='height:13px; border-radius:1px;'";
                                        currency2 = currency2.trim();
                                        currency1 = currency1.trim();
                                        if (currency1 !== currency2) {
                                            $("#fx_rate_marquee").append(`
                            <span>
                                <img src="${baseFlagsPath}${currency1}.png" ${imageProps}>
                                /
                                <img src="${baseFlagsPath}${currency2}.png" ${imageProps}> &nbsp;=&nbsp;
                                <span> <strong>  ${MIDRATE} </strong> </span>
                                </span>  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; `);

                                            $(".currency_fx_rate").append(
                                                `
                                            <tr class="${card_color}">
                                                <td><img src="${baseFlagsPath}${currency1}.png" alt="" width='40px'
                                                        height='20px' style='border-radius:5px;'>&nbsp;${ currency1}</td>
                                                <td>${BUY}</td>
                                                <td>${SELL}</td>
                                            </tr>
                                    `
                                            )
                                        }
                                    });
                                }
                            },
                        });
                    }


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
                    var start_date = '30-' + `${ mm - 3}` + '-' + (Number(today.getFullYear()) - 1);
                    var transLimit = 20;
                    console.log(end_date)

                    let cus_accounts = []

                    let acc_line_details = []

                    function getAccountTransactions(account_number, account_currency, start_date, end_date, transLimit) {
                        //console.log([account_number, account_currency, start_date, end_date, transLimit]);
                        //return false;
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
                                console.log("get account transaction:", response)
                                //return false;

                                if (response.responseCode == '000') {

                                    if (response.data == "" || response.data == null || response.data == undefined) {
                                        $("#line_chart_no_data").show()
                                        $("#casa_myChart").hide()
                                    } else {

                                        $("#line_chart_no_data").hide()


                                        let data_ = response.data;
                                        //console.log(data_);
                                        //console.log("========")
                                        //console.log(data_)
                                        //console.log("========")


                                        let acc_run_balances = []
                                        empty(cus_accounts);

                                        cus_accounts.push(response.data)
                                        empty(acc_run_balances);
                                        $.each(data_, function(index) {

                                            acc_run_balances.push(data_[index].runningBalance)

                                        })

                                        var details = [account_number, account_currency, acc_run_balances]
                                        empty(acc_line_details);
                                        acc_line_details.push(details)


                                        {{-- console.log(response.data) --}}



                                        var limit = 10;
                                        let data = response.data.slice(0, limit);


                                        account_line_chart(cus_accounts, acc_line_details)

                                    }


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

                    function line_graph() {

                        console.log(cus_accounts)


                    }

                    function empty(arr) {
                        //empty your array
                        arr.length = 0;

                    }

                    $(document).ready(function() {


                        $(".casa_chart").click(function() {
                            {{-- alert("welcome") --}}
                            $(".accounts_display_area").show()
                            $(".my_investment_display_area").hide()
                            $(".loans_display_area").hide()
                        })

                        $(".investment_chart").click(function() {
                            {{-- alert("welcome") --}}
                            $(".my_investment_display_area").show()
                            $(".accounts_display_area").hide()
                            $(".loans_display_area").hide()
                        })

                        $(".loans_chart").click(function() {
                            {{-- alert("welcome") --}}
                            $(".loans_display_area").show()
                            $(".my_investment_display_area").hide()
                            $(".accounts_display_area").hide()

                        })

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
                        var acc_det = $("#casa_line_chart").val()
                        var my_acc = acc_det.split("~")
                        var acc_num = my_acc[2].trim()
                        var acc_cur = my_acc[3].trim()

                        setTimeout(function() {

                            getCorrectFxRates()

                            show_chart(account_data.i_have_total, account_data.i_owe_total, account_data.i_invest_total)
                            setTimeout(function() {
                                getAccountTransactions(acc_num, acc_cur, start_date, end_date, transLimit)
                                //line_graph()
                                //account_line_chart(cus_accounts, acc_line_details)
                            }, 2000)

                        }, 2000);

                    })

                    $("#casa_line_chart").change(function() {
                        var account_details = $(this).val()
                        var my_account = account_details.split("~")
                        //console.log("my_account:", my_account)

                        getAccountTransactions(my_account[2], my_account[3],
                            start_date,
                            end_date,
                            transLimit)
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

                        {{-- getAccountTransactions(account_number, start_date, end_date, transLimit) --}}

                        {{-- let data = --}}


                    })

                    $(function() {



                        var result = 1;
                        var exch_rate_from = '';
                        var exch_rate_to = '';
                        var rate = 0;

                        var multiply;
                        var divided;

                        $('#exch_rate_from').change(function(e) {
                            e.preventDefault();
                            var exch_rate_from = $('#exch_rate_from').val();
                            {{-- console.log(forex_rate.length); --}}
                            var exch_rate_to = $('#exch_rate_to').val();
                            var get_con = exch_rate_from + '/ ' + exch_rate_to;
                            var get_con_1 = exch_rate_to + '/ ' + exch_rate_from;
                            {{-- $('#result').val();
                    $('#amount').val(); --}}
                            if (exch_rate_from = '' || exch_rate_from == undefined || exch_rate_to == '' ||
                                exch_rate_to ==
                                undefined) {
                                return false;
                            }


                            for (let index = 0; index < forex_rate.length; index++) {
                                console.log('final = ' + get_con);
                                {{-- console.log(forex_rate.length) --}}
                                if (forex_rate[index].PAIR == get_con) {
                                    rate = forex_rate[index].MIDRATE;
                                    console.log(rate)
                                    var amount = $('#exchange_amount').val();
                                    result = parseFloat(amount) * parseFloat(rate);
                                    console.log(amount + '*' + rate)
                                    {{-- $('#exchange_result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN')
                                .format(result)); --}}
                                    multiply = true;
                                    divided = false;
                                    {{-- return false; --}}
                                } else {
                                    {{-- $('#exchange_result').html("<span class='text-danger'> Rate not Found </span> "); --}}
                                    $('#exchange_amount').val('');
                                }


                                if (forex_rate[index].PAIR == get_con_1) {
                                    rate = forex_rate[index].MIDRATE;
                                    console.log(rate)
                                    var amount = $('#exchange_amount').val();
                                    result = parseFloat(amount) / parseFloat(rate);
                                    console.log(amount + '/' + rate)
                                    {{-- $('#exchange_result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN')
                                .format(result)); --}}
                                    divided = true;
                                    multiply = false;
                                    {{-- return false; --}}
                                } else {
                                    {{-- $('#exchange_result').html("<span class='text-danger'> Rate not Found </span> "); --}}
                                    $('#exchange_amount').val('');
                                }

                            }






                        });

                        $('#exch_rate_to').change(function(e) {
                            e.preventDefault();
                            {{-- $('#result').val();
                         $('#amount').val(); --}}
                            var exch_rate_from = $('#exch_rate_from').val();
                            var exch_rate_to = $('#exch_rate_to').val();
                            var get_con = exch_rate_from + '/ ' + exch_rate_to;
                            var get_con_1 = exch_rate_to + '/ ' + exch_rate_from;


                            if (exch_rate_from = '' || exch_rate_from == undefined || exch_rate_to == '' ||
                                exch_rate_to == undefined) {
                                return false;
                            }


                            for (let index = 0; index < forex_rate.length; index++) {
                                console.log('final = ' + get_con);
                                if (forex_rate[index].PAIR == get_con) {
                                    rate = forex_rate[index].MIDRATE;

                                    console.log(rate)
                                    var amount = $('#exchange_amount').val();
                                    result = parseFloat(amount) * parseFloat(rate);
                                    console.log(amount + '*' + rate)
                                    {{-- $('#exchange_result').val(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN')
                                .format(
                                    result)); --}}
                                    multiply = true;
                                    divided = false;
                                    return false;
                                } else {
                                    {{-- $('#exchange_result').html("<span class='text-danger'> Rate not Found </span> "); --}}
                                    $('#exchange_amount').val('');
                                }


                                if (forex_rate[index].PAIR == get_con_1) {
                                    rate = forex_rate[index].MIDRATE;
                                    console.log(rate)
                                    var amount = $('#exchange_amount').val();
                                    result = parseFloat(amount) / parseFloat(rate);
                                    console.log(amount + '/' + rate)
                                    {{-- $('#exchange_result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN')
                                .format(
                                    result)); --}}
                                    divided = true;
                                    multiply = false;
                                    return false;
                                } else {
                                    {{-- $('#exchange_result').html("<span class='text-danger'> Rate not Found </span> "); --}}
                                    $('#exchange_amount').val('');
                                }
                            }
                        });

                        $('#exchange_amount').keyup(function(e) {
                            e.preventDefault();
                            console.log('typing..')
                            var exch_rate_from = $('#exch_rate_from').val();
                            var exch_rate_to = $('#exch_rate_to').val();
                            var get_con = exch_rate_from + '/ ' + exch_rate_to;
                            var get_con_1 = exch_rate_to + '/ ' + exch_rate_from;
                            var amount = $('#exchange_amount').val();

                            if (exch_rate_from = '' || exch_rate_from == undefined || exch_rate_to == '' ||
                                exch_rate_to == undefined) {
                                return false;
                            }
                            if (amount == '' || amount == undefined) {
                                return false;
                            }

                            if (!multiply) {
                                result = parseFloat(amount) * parseFloat(rate);
                                console.log(amount + '*' + rate)
                                $('#exchange_result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(
                                    result));
                            }

                            if (!divided) {
                                result = parseFloat(amount) * parseFloat(rate);
                                console.log(amount + '/' + rate)
                                $('#exchange_result').html(exch_rate_to + ' ' + new Intl.NumberFormat('en-IN').format(
                                    result));
                            }


                        });

                    })
            </script>
            @endsection