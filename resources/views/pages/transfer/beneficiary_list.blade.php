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

    /* td,
    th {
        white-space: nowrap
    } */
    .bg-same-bank {
        background-color: #dc3545 !important;
    }

    .bg-other-bank {
        background-color: #1abc9c !important;
    }

    .bg-international-bank {
        background-color: #17a2b8 !important;
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

<div class="dashboard site-card ">
    <div class="dashboard-body p-4">
        <h2 class="font-14 text-left font-weight-bold text-capitalize mb-3 text-primary">select Beneficiary type
        </h2>
        <div class="row mb-4 justify-content-center mx-auto" style="max-width: 750px;">
            <div class="col-md-3 mb-2 mx-2 mx-lg-3  beneficiary-type current-type display-card bg-same-bank"
                data-bene-type="SAB" data-title="Same Bank" id=''>
                <span class="box-circle"></span>
                <span class="mt-1 beneficiary-text" id=''>Same Bank</span>
            </div>

            <div class="col-md-3 mb-2 mx-2 mx-lg-3 beneficiary-type display-card  bg-other-bank" data-bene-type="OTB"
                data-title="Other Bank" id=''>
                <span class="box-circle"></span>
                <span class="mt-1 beneficiary-text" id=''>Other Local Bank</span>
            </div>
            <div class="col-md-3 mb-2 mx-2 mx-lg-3 beneficiary-type display-card  bg-international-bank"
                data-bene-type="INTB" data-title="International Bank" id=''>
                <span class="box-circle"></span>
                <span class="mt-1 beneficiary-text" id=''>International Bank</span>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <h3 class=" text-capitalize text-center mx-3 font-weight-bold align-self-center my-auto"><i
                    class="font-18 text-info mx-2 fa fa-user-friends"></i><span id="beneficiary_type_title">Same
                    Bank
                </span><span>Beneficiaries</span></h3>
            <button type="button" class="btn px-3 btn-sm font-12 font-weight-bold btn-info btn-rounded"
                id="add_beneficiary"><i class="pr-2 fa fa-user-plus"></i>Add</button>
        </div>

        <div class="p-3 mt-3 rounded-lg m-2 customize_card table-responsive" id="transaction_summary">
            <table id="beneficiary_list"
                class="table table-bordered table-centered table-striped  dt-responsive w-100 mb-0 beneficiary_list_display">
                <thead>
                    <tr class="bg-info text-white">
                        <th> <b> Alias </b> </th>
                        <th> <b> Account Name </b> </th>
                        <th> <b> Account Number </b> </th>
                        <th> <b> Email </b> </th>
                        <th> <b> Bank </b> </th>
                        <th class="text-center"> <b>Actions </b> </th>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
    {{-- <div class="col-md-1"></div> --}}
</div> <!-- end card-body -->


@include("pages.transfer.beneficiary_form_modal")

@include("extras.datatables")
@endsection

@section('scripts')

<script>
    const pageData = new Object()
    const noDataAvailable =   {!! json_encode($noDataAvailable) !!}
</script>
<script src="assets/js/pages/transfer/beneficiary/beneficiaryList.js">
</script>

@endsection