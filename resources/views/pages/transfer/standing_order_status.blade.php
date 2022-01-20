@extends('layouts.master')

@section('content')
    {{-- @php
@basePath = "Transfer"

@endphp
@include("snippets.pageHeader") --}}
    <div class="container-fluid pt-2 ">
        <div class="row align-items-center">
            <div class="col-md-4 align-items-center">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-soft-blue waves-effect waves-light"
                    id="page_back_button"><i class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>
            </div>
            <div class="col-md-4">
                <div class="row align-items-center justify-content-center">
                    <img class="header-icon" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;
                    <h4 class="text-primary my-0 page-header text-center text-uppercase"> STANDING ORDER STATUS
                    </h4>
                </div>
            </div>

            <div class="col-md-4 align-items-center d-none d-md-block text-right">
                <span class="align-items-center d-none d-lg-block">
                    <span class="text-primary "> Transfers </span> &nbsp; > &nbsp; <span class="text-primary">Standing
                        Order</span>&nbsp; > &nbsp; <span class="text-danger">Standing Order Status</span>
                </span>
            </div>

        </div>
        <div class="col-md-12 ">
            <hr class="text-primary my-2">
        </div>

    </div>

    <br>
    <div class="mx-3 my-2 my-lg-3 mx-lg-5">
        <div class="site-card">
            <div class="col-md-6 mx-auto">
                <label class="d-block text-center f-18 font-weight-bold mb-1 text-primary"> Select Account To Transfer
                    From</label>
                <select data-style="" data-style-base="form-control select-control" class="form-control" id="from_account"
                    required>
                    @include("snippets.accounts")
                </select>
            </div>
            <hr class="col-md-9">
            <div class="table-responsive table-centered table-striped table-bordered ">
                <table class="table table-striped mb-0 " id="standing_order_display_area" style="zoom:0.8">
                    <thead>
                        <tr class="bg-info text-white ">
                            <td> <b> Account No </b> </td>
                            <td> <b> Beneficiary Account </b> </td>
                            <td> <b> Amount (SLL) </b> </td>
                            <td> <b> Order Date </b> </td>
                            <td> <b> End Date </b> </td>
                            <td> <b> Frequency </b> </td>
                            <td> <b> First Payment </b> </td>
                            <td> <b> Last Payment </b> </td>
                            <td> <b> Cancel </b> </td>
                        </tr>
                    </thead>
                    <tbody class="standing_order_details">
                        <td colspan="100%" class="text-center">
                            {{-- global noDataAvailable image variable shared with all views --}}
                            {!! $noDataAvailable !!}
                        </td>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include("snippets.pinCodeModal")
@endsection

@section('scripts')
    @include("extras.datatables")
    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
        let account_data = new Object()
    </script>
    <script src="assets\js\pages\transfer\standingOrderStatus.js">
    @endsection
