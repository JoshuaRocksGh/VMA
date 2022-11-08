@extends('layouts.master')

@section('content')
    @php
        $pageTitle = 'Customer Complaint';
        $basePath = 'account services';
        $currentPath = 'Complaint';
    @endphp
    @include('snippets.pageHeader')
    <div class="w-100 dashboard site-card" id="request_form_div">
        <div class="w-100  dashboard-body p-3 mx-auto my-3 ">
            <form action="#" class="select_beneficiary pt-4 mx-auto" id="payment_details_form" style="max-width: 650px;"
                autocomplete="off" aria-autocomplete="none">
                @csrf

                <div class="form-group  mb-4">
                    <label class=" text-dark">Select Account</label>
                    <select class="form-control accounts-select " id="from_account" required>
                        <option selected disabled value=""> -- Select Account --</option>
                        @include('snippets.accounts')
                    </select>

                </div>
                <div class="form-group mb-4">
                    <label class=" text-dark"> Select Service Type</label>
                    <select name="" id="service_type" class="form-control">
                        <option disabled value="">---- select a service type ----</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class=" text-dark" for="description"> Description</label>
                    <textarea name="" id="description" class="form-control "></textarea>
                </div>
                <div class="form-group text-right ">
                    <button type="button"
                        class="btn form-button btn-rounded waves-effect waves-light disappear-after-success"
                        id="proceed_button">
                        Proceed
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/accountServices/complaint.js') }}"></script>
@endsection
{{-- //TODO: finish refactoring this page. Possibly change the ui --}}
