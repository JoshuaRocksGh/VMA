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
                <div class="col-md-6 col-lg-3 ">
                    <a href="{{ url('payments') }}">
                        <div class="widget-rounded-circle card-box home-card " style="background-color: rgb(179, 242, 190);">
                            <div class="row">
                                <div class="col-4">
                                    <div class="avatar-sm rounded-circle bg-white ">
                                        <i class="fe-log-out font-5 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="text-right">
                                        <h3 class="mt-1 text-black sliding-u-l-r-l"><span><b>Payments</b></span></h3>
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
                                                value="{{ $account->accountType .' ~ ' .$account->accountDesc .' ~ ' .$account->accountNumber .' ~ ' .$account->currency .' ~ ' .$account->availableBalance }}">
                                                {{ $account->accountDesc .
                                                    ' || ' .
                                                    $account->accountNumber .
                                                    ' || ' .
                                                    $account->currency .
                                                    ' ' .
                                                    $account->availableBalance }}
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

                                    {{-- <div class="table-responsive table-bordered my_investment_display_area">
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

                                    {{-- <div class="table-responsive table-bordered loans_display_area">
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
                        {{-- <hr> --}}
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
                        {{-- <hr class="mt-0"> --}}
                        <form action="" style="zoom: 0.9">

                            <div class="row">

                                <div class="col-md-6">
                                    <label for="" class="text-dark"><b>From</b></label>
                                    <select class="form-control" id="exch_rate_from">
                                        <option value="">-- Select Currency --</option>
                                        <option value="EUR">(EUR) EURO</option>
                                        {{-- <option value="SLL">(SLL) LOENE</option> --}}
                                        <option value="USD">(USD) US DOLLAR</option>
                                        <option value="GBP">(GBP) BRITISH POUNDS</option>


                                    </select>
                                </div>
                                {{-- <br> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="text-dark"><b>To</b></label>
                                        <select class="form-control" id="exch_rate_to">
                                            {{-- <option value="">-- Select Currency --</option> --}}
                                            {{-- <option value="EUR">(EUR) EURO</option> --}}
                                            <option value="SLL" selected>(SLL) LOENE</option>
                                            {{-- <option value="USD">(USD) US DOLLAR</option> --}}
                                            {{-- <option value="GBP">(GBP) BRITISH POUNDS</option> --}}
                                        </select>
                                    </div>
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
                                            <input type="text" class="form-control readOnly text-danger font-weight-bold"
                                                id="exchange_result" readonly>

                                            {{-- <span></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- <div class="card mt-0">
                    <div class="card-body">
                        <br>
                    </div>
                </div> --}}
                </div>

                <div class="modal fade" id="bs-example-modal-lg" role="dialog"
                    style="position: absolute; left:50%; top:60%;transform: translate(-50%, -50%);"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                {{-- <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4> --}}
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive table-bordered accounts_display_area"
                                    style="display: none; zoom:0.9">
                                    <h3 class="text-center text-success">CURRENT & SAVINGS ACCOUNT</h3>
                                    <table id="" class="table table-striped mb-0 ">
                                        <thead>
                                            <tr class="bg-info text-white ">
                                                <td> <b> Account No </b> </td>
                                                <td> <b> Description </b> </td>
                                                <td> <b> Product </b> </td>
                                                <td> <b> Cur </b> </td>
                                                {{-- <td> <b> OverDraft </b> </td> --}}
                                                <td> <b> Ledger Bal </b> </td>
                                                <td> <b> Available Bal </b> </td>
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
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/pages/home/home.js') }}"></script>
    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
    </script>
@endsection
