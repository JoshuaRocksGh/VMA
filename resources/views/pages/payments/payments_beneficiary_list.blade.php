@extends('layouts.master')

@section('content')
    @php
        $pageTitle = 'Payment Beneficiary';
        $basePath = 'Payment';
        $currentPath = 'Payment Beneficiary';
    @endphp
    @include('snippets.pageHeader')

    <div class="dashboard site-card ">
        <div class="dashboard-body p-4">
            <div class="d-flex justify-content-center mt-1 ">
                <h3 class="font-14 pr-3 text-capitalize text-center  font-weight-bold align-self-center text-dark my-auto">
                    <i class="mx-2 fa fa-user-friends"></i><span class="font-14" id="beneficiary_type_title">Mobile
                        Money
                    </span>Beneficiaries
                </h3>
                <button type="button" class="btn px-3  btn-sm font-12 font-weight-bold  btn-rounded form-button"
                    id="add_beneficiary"><i class="pr-2 fa fa-user-plus"></i>Add</button>
            </div>
            <div class="row mx-auto" style="max-width: 80rem;">
                <div class="col-md-4 mt-lg-4 mx-auto" style="max-width: 20rem">
                    <h2 class="font-14 text-center font-weight-bold text-capitalize mb-3 text-dark">select Beneficiary
                        type
                    </h2>
                    <div class="mb-4 payment-tabs  mx-auto" style="max-width: 750px;">



                    </div>
                    <hr>
                </div>
                <div class="col-md-8 mx-auto" style="max-width: 50rem;">
                    <div class="pt-4 table-responsive" id="transaction_summary">
                        <table id="beneficiary_list" style="min-height: 200px"
                            class="table table-hover table-centered w-100 mb-0 beneficiary_list_display">
                            <thead>
                                <tr class="table-background">
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


    @include('pages.payments.payment_beneficiary_form_modal')
@endsection

@section('scripts')
    @include('extras.datatables')
    <script>
        const noDataAvailable = {!! json_encode($noDataAvailable) !!}
        const pageData = {}
    </script>
    <script src="{{ asset('assets/js/pages/payments/paymentBeneficiaryList.js') }}"></script>
    <script src="{{ asset('assets/js/functions/comingSoon.js') }}"></script>
@endsection
