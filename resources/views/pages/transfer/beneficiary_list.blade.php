@extends('layouts.master')

@section('styles')
<style>
    .page-item.active .page-link {

        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .table_over_flow {
        overflow-y: hidden;

    }

    td,
    th {
        white-space: nowrap
    }

    .current-type .box-circle {
        background-color: white !important;
    }

    .current-type .beneficiary-text {
        font-weight: bold !important;
        color: white !important;
    }

    .beneficiary-text {
        color: rgb(216, 216, 216)
    }

    .display-card {
        height: 4rem;
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(5px);
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 0.25rem;
        display: flex !important;
        justify-content: center;
        align-items: center;
        width: 150px;
        cursor: pointer;

    }

    .box-circle {
        position: absolute;
        top: 5px;
        right: 5px;
        border-radius: 50%;
        height: 0.8rem;
        width: 0.8rem;
        border: solid white 2px;
    }
</style>

@endsection

@section('content')

@php
$pageTitle = "TRANSFER BENEFICIARY";
$basePath = "Transfer";
$currentPath = "Transfer Beneficiary";
@endphp
@include("snippets.pageHeader")

<div class="p-3">
    <div class="site-card ">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-17 text-left font-weight-bold text-capitalize mb-3 text-primary">select Beneficiary type
                </h2>
                <div class="row mb-4 justify-content-center mx-auto" style="max-width: 750px;">
                    <div class="col-md-3 mb-2 mx-2 mx-lg-4 beneficiary-type current-type display-card bg-danger"
                        data-value="SAB" id=''>
                        <span class="box-circle"></span>
                        <span class="mt-1 beneficiary-text" id=''>Same Bank</span>
                    </div>

                    <div class="col-md-3 mb-2 mx-2 mx-lg-4 beneficiary-type display-card  bg-success" data-value="OTB"
                        id=''>
                        <span class="box-circle"></span>
                        <span class="mt-1 beneficiary-text" id=''>Other Local Bank</span>
                    </div>
                    <div class="col-md-3 mb-2 mx-2 mx-lg-4 beneficiary-type display-card  bg-info" data-value="INT"
                        id=''>
                        <span class="box-circle"></span>
                        <span class="mt-1 beneficiary-text" id=''>International Bank</span>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <h3 class="font-15 text-capitalize text-center mx-3 font-weight-bold align-self-center my-auto"><i
                            class="font-18 text-info mx-2 fa fa-user-friends"></i>Same Bank
                        Beneficiaries</h3>
                    <button type="button" class="btn px-3 btn-sm font-14 font-weight-bold btn-info btn-rounded"
                        id="add_beneficiary"><i class="pr-2 fa fa-user-plus"></i>Add</button>
                </div>
                {{-- <div class="row justify-content-end pr-4">
                    <div class="dropdown drop-left text-sm-right">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-rounded" data-toggle="dropdown"
                            id="dropdownMenuButton"> Add
                            Beneficiary </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('add-same-bank-beneficiary') }}">Same
                Bank</a>
                <a class="dropdown-item" href="{{ url('add-local-bank-beneficiary') }}">Other
                    Local Bank
                </a>
                <a class="dropdown-item" href="{{ url('add-international-bank-beneficiary') }}">International
                    Bank </a>
            </div>
        </div>
    </div> --}}
    <div class="p-3 mt-3 rounded-lg m-2 customize_card table-responsive" id="transaction_summary">
        <table id="beneficiary_list"
            class="table table-bordered table-striped table-centered dt-responsive w-100 mb-0 beneficiary_list_display">
            <thead>
                <tr class="bg-info text-white">
                    <th> <b> Alias </b> </th>
                    <th> <b> Account Number </b> </th>
                    <th> <b> Beneficiary Name </b> </th>
                    {{-- <th> <b> Beneficiary Email </b> </th> --}}
                    <th> <b> Beneficiary Bank </b> </th>
                    <th class="text-center"> <b>Actions </b> </th>
                </tr>
            </thead>

        </table>
    </div>
</div> <!-- end card body-->
</div>
{{-- <div class="col-md-1"></div> --}}
</div> <!-- end card-body -->
</div> <!-- end col -->


@include("pages.transfer.beneficiary_form_modal")

@endsection

@section('scripts')
<script src="{{ asset("assets/js/pages/transfer/beneficiaryList.js") }}">

</script>
@endsection