@extends('layouts.master')

@section('content')
@php
$pageTitle = "payment BENEFICIARY";
$basePath = "payment";
$currentPath = "payment Beneficiary";
@endphp
@include("snippets.pageHeader")

<div class="dashboard site-card ">
    <div class="dashboard-body p-4">
        <div class="d-flex justify-content-center mt-1 ">
            <h3
                class="font-14 pr-3 text-capitalize text-center  font-weight-bold align-self-center text-primary my-auto">
                <i class="mx-2 fa fa-user-friends"></i><span class="font-14" id="beneficiary_type_title">Mobile
                    Money
                </span>Beneficiaries
            </h3>
            <button type="button" class="btn px-3  btn-sm font-12 font-weight-bold btn-primary btn-rounded"
                id="add_beneficiary"><i class="pr-2 fa fa-user-plus"></i>Add</button>
        </div>
        <div class="row mx-auto" style="max-width: 80rem;">
            <div class="col-md-4 mt-lg-4 mx-auto" style="max-width: 20rem">
                <h2 class="font-14 text-center font-weight-bold text-capitalize mb-3 text-primary">select Beneficiary
                    type
                </h2>
                <div class="mb-4   mx-auto" style="max-width: 750px;">
                    <button class="beneficiary-type knav mb-2 active current-type  knav-primary" data-value="MOM"
                        data-title="Mobile Money" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Mobile Money</span>
                    </button>

                    <button class="beneficiary-type  knav mb-2 knav-info  " data-value="AIR" data-title="Airtime" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Airtime</span>
                    </button>
                    <button class="beneficiary-type  knav mb-2 knav-success " data-value="UTL" data-title="Utility"
                        id=''>
                        <span class="box-circle"></span>
                        <span id=''>Utility </span>
                    </button>
                    <button class="beneficiary-type  knav mb-2 knav-warning  " data-value="EDU" data-title="Education"
                        id=''>
                        <span class="box-circle"></span>
                        <span id=''>Education </span>
                    </button>
                    <button class="beneficiary-type  knav mb-2 knav-danger  " data-value="GVT"
                        data-title="Government tax" id=''>
                        <span class="box-circle"></span>
                        <span id=''>Government tax </span>
                    </button>
                </div>
                <hr>
            </div>
            <div class="col-md-8 mx-auto" style="max-width: 55rem;">
                <div class="pt-4 table-responsive" id="transaction_summary">
                    <table id="beneficiary_list" style="min-height: 200px"
                        class="table table-hover table-centered w-100 mb-0 beneficiary_list_display">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th> <b> Name </b> </th>
                                <th> <b> Account </b> </th>
                                <th> <b> Sub Type </b> </th>
                                <th class="text-center " style="max-width:30px;"> <b>Actions </b> </th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div> <!-- end card body-->
        </div>
    </div>
</div> <!-- end card-body -->


@include("pages.payments.payment_beneficiary_form_modal")

@endsection

@section('scripts')
@include("extras.datatables")
<script>
    const noDataAvailable =   {!! json_encode($noDataAvailable) !!}
    const pageData= {}
</script>
<script src="{{ asset('assets/js/pages/payments/paymentBeneficiaryList.js') }}">
</script>
@endsection