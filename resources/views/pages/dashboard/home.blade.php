@extends('layouts.master')

@section('content')
@php
$pageTitle = 'Dashboard';
$basePath = 'Home';
$currentPath = 'Dashboard';
@endphp
@include('snippets.pageHeader')

{{-- dashboard layout --}}
<div class="px-2">
    <div class="dashboard site-card overflow-hidden">
        <nav class="dashboard-header ">
            <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Acc. Summary</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Approvals &nbsp;<span
                        class="badge badge-danger badge-pill float-right p-1" style="font-size:12px"></span></a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Acc. History</a>
            </div>
        </nav>
        <div class="tab-content dashboard-body border-primary border " id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border avatar-lg text-primary  m-2 canvas_spinner" role="status">
                    </div>
                </div>

                <div class="">
                    <canvas id="myChart" style="max-height: 250px"></canvas>

                </div>
                <div class=" justify-content-center">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="zoom:0.8">
                            <div class="card-body">

                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between bg-primary align-items-center active"
                                        style="font-size: 17px">

                                        <strong>Total Local Amount: </strong>
                                        <strong>

                                            SLL <span class="i_have_amount open-money">0.00</span>
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
                        <div class="col-md-2"></div>
                    </div>

                </div>


            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="table-responsive">

                    <table id="" class="table   table-bordered table-striped nowrap w-100 pending_transaction_request "
                        style="zoom: 0.7;">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>Rquest Id</th>
                                <th>Req-Type</th>
                                <th>Account No</th>
                                <th>Amount</th>
                                <th>Transfer Purpose</th>
                                <th>Posted Date</th>
                                <th>Initiated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="rquest_table">
                            <tr>
                                <td colspan="8">
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border avatar-lg text-primary  m-2 canvas_spinner"
                                            role="status">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>


                    </table>


                </div> <!-- end card body-->
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <strong class="text-success">CURRENT & SAVINGS</strong>
                <select name="" id="casa_line_chart" class="form-control ">

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
                <span colspan="100%" class="text-center" id="line_chart_no_data">
                    {!! $noDataAvailable !!}
                </span>
                <canvas id="casa_myChart">

                </canvas>
            </div>

        </div>
        <div class="tab-content dashboard-body border-primary border " style="min-height:200px">


            <div class="">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <b>Accounts</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            <b>Investments</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <b>Loans</b>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="home">
                        <div class="table-responsive table-bordered accounts_display_area" style=" zoom:0.8;">
                            <table id="accounts_display_area" class="table table-striped mb-0 ">
                                <thead>
                                    <tr class="bg-primary text-white ">
                                        <td> Account No. </td>
                                        <td> Description </td>
                                        {{-- <td> Product </td> --}}
                                        <td> Cur </td>
                                        {{-- <td> <b> OverDraft </b> </td> --}}
                                        <td> Ledger Bal </td>
                                        <td> Available Bal </td>
                                        <td> Over Draft </td>
                                        <td> Blocked Amount </td>
                                    </tr>
                                </thead>
                                <tbody class="casa_list_display">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane show active" id="profile">
                        <div class="table-responsive table-bordered my_investment_display_area" style="zoom:0.9;">

                            <table id="my_investment_display_area" class="table table-striped mb-0 ">
                                <thead>
                                    <tr class="bg-primary text-white ">
                                        <td> Account No. </td>
                                        <td> Deal Amount </td>
                                        <td> Tunure </td>
                                        <td> FixedInterestRate </td>
                                        <td> Rollover </td>

                                    </tr>
                                </thead>
                                <tbody class="fixed_deposit_account">


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages">
                        <div class="table-responsive table-bordered loans_display_area" style=" zoom:0.9;">
                            <table id="loans_display_area" class="table table-striped mb-0 ">
                                <thead>
                                    <tr class="bg-primary text-white ">
                                        <td> Facility No. </td>
                                        <td> Description </td>
                                        <td> Cur </td>
                                        <td> Amount Granted </td>
                                        <td> Loan Bal </td>

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
</div>
@endsection


@section('scripts')
@include('extras.datatables')
<script src="{{ asset('assets/plugins/chartjs/chartjs-v3.7.1.min.js') }}" defer></script>
<script src="{{ asset('assets/js/pages/home/home.js') }}"></script>


<script>
    let noDataAvailable = {!! json_encode($noDataAvailable) !!}
        let customer_no = @json(session()->get('customerNumber'));
</script>
@endsection