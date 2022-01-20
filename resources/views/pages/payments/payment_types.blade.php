@extends('layouts.master')
@section('styles')
<link href="{{ asset('assets/css/payments.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
<style>
    .tab-pane {
        animation: slide-right 500ms ease-out;
    }

    @keyframes slide-right {
        0% {
            opacity: 0;
            /* transform: translateY(-50%); */
        }

        100% {
            opacity: 1;
            /* transform: translateY(0); */
        }
    }

    @keyframes fadein {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
@endsection
@section('content')
@php
$pageTitle = 'payment type';
$basePath = 'Payment';
$currentPath = 'Make Payment';
@endphp

@include('snippets.pageHeader')
@include('snippets.misc.no_beneficiary')
@include('pages.payments.payment_verification_modal')
<div class="row">
    <div class="col-12 py-3 px-md-3 px-lg-5">
        <div class="site-card justify-content-center">

            {{-- ============================================= --}}
            {{-- SELECT PAYMENT TYPE --}}
            {{-- ============================================= --}}

            <div class=" mb-1 px-3 row mx-auto justify-content-center" style="max-width: 80rem">
                <div class="col-md-3 col-lg-4">
                    <label class="mb-2 d-block f-18 text-center font-weight-bold text-primary">Select Payment
                        Type</label>
                    <div class="payments-carousel mx-auto" style="max-width: 20rem">
                    </div>
                    <hr class="col-md-8">

                </div>
                <div class="col-md-9 col-lg-8">
                    {{-- =================================== --}}
                    {{-- Select Account --}}
                    {{-- =================================== --}}
                    <div class=" mb-1 mx-auto px-2 px-md-3 px-lg-5" style="max-width: 50rem">
                        <label class="d-block text-center f-18 font-weight-bold mb-1 text-primary"> Select Account To
                            Transfer
                            From</label>

                        <select data-style="" data-style-base="form-control select-control" class="form-control"
                            id="from_account" required>
                            {{-- <option disabled selected value=""> --- Select Account ---
                            </option> --}}
                            @include("snippets.accounts")
                        </select>

                        <hr class="">
                        <div style="position: relative">
                            <ul class="nav w-100 active nav-fill nav-pills" id="onetime_bene_tab" role="tablist">
                                <li class="nav-item w-50" role="presentation" style="position: absolute">
                                    <button class="switch w-100  nav-link active" id="beneficiary_tab"
                                        data-toggle="pill" href="#beneficiary_view" type="button" role="tab"
                                        aria-controls="beneficiary_view" aria-selected="false">
                                        Beneficiary</button>
                                </li>
                                <li class="nav-item w-50" role="presentation">
                                    <button class=" switch leftbtn w-100 nav-link " id="onetime_tab" data-toggle="pill"
                                        href="#onetime_view" type="button" role="tab" aria-controls="onetime_view"
                                        aria-selected="true">
                                        <div class="switch-text">Onetime</div>
                                    </button>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content mx-2" id="onetime_bene_tabContent">

                            {{-- ============================================= --}}
                            {{-- beneficiary toggle --}}
                            {{-- ============================================= --}}
                            <div class="tab-pane fade  show active" id="beneficiary_view" role="tabpanel"
                                aria-labelledby="beneficiary_tab">
                                <div class="row mb-1">
                                    <label class="text-primary col-md-4 bene_details">Select Beneficiary
                                    </label>
                                    <select data-style="" data-style-base="form-control select-control"
                                        class="form-control text-capitalize col-md-8 bene_details" id="to_account"
                                        required>
                                        <option value="">--- Select Beneficiary ---</option>

                                    </select>
                                </div>
                            </div>
                            {{-- ============================================= --}}
                            {{-- Onetime toggle --}}
                            {{-- ============================================= --}}
                            <div class="tab-pane fade" id="onetime_view" role="tabpanel" aria-labelledby="onetime_tab">
                                <div class="row mb-1 text-capitalize" id="subtype_div" style="display: none">
                                    <label class="text-primary text-capitalize col-md-4 " id="subtype_label">
                                    </label>
                                    <select data-style="" data-style-base="form-control select-control"
                                        class="form-control text-capitalize col-md-8 " id="subtype_select" required>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 text-capitalize text-primary" id="payment_label"></label>
                                    <input type="text" class="form-control text-capitalize col-md-8 "
                                        id="onetime_to_account" placeholder="Enter Account Number"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-capitalize text-primary">Enter Amount</label>
                                <input type="text" class="form-control text-capitalize col-md-8 " id="amount"
                                    placeholder="Enter Amount"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>
                        <button
                            class="btn mt-5 font-weight-bold float-right font-11 btn-primary next-button btn-rounded"
                            id="next_button">
                            &nbsp; Proceed &nbsp; <i class="fe-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('snippets.pinCodeModal')
@endsection

@section('scripts')

<script>
    var myaccount = @json(session()->get('customerAccounts'))
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>

<script src="{{ asset('assets/js/pages/payments/paymentTypes.js') }}"></script>


@endsection