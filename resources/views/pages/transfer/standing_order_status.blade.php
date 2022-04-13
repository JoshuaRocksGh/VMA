@extends('layouts.master')

@section('content')
@php
$basePath = "Transfer";
$currentPath = "Standing Order Status";
$pageTitle =" STANDING ORDER STATUS";
@endphp
@include("snippets.pageHeader")


<div class="mx-sm-2  m-lg-3">
    <div class="site-card">
        <div class="col-md-6 mx-auto">
            <label class="d-block text-center  font-weight-bold mb-1 text-primary"> Select Account To Transfer
                From</label>
            <select data-style="" class="form-control accounts-select" id="from_account" required>
                @include("snippets.accounts")
            </select>
        </div>
        <hr class="col-md-9">
        <div class="table-responsive p-2 table-centered table-striped table-bordered ">
            <table class="table table-striped mb-0 " id="standing_order_display_area">
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