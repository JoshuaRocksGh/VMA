@extends('layouts.master')

@section('content')
@php
$pageTitle = "Customer Complaint";
$basePath = 'account services';
$currentPath = 'complaint';
@endphp
@include('snippets.pageHeader')
<div class="w-100 dashboard site-card" id="request_form_div">
    <div class="w-100  dashboard-body p-3 mx-auto my-3 ">
        <form action="#" class="select_beneficiary pt-4 mx-auto" id="payment_details_form" style="max-width: 650px;"
            autocomplete="off" aria-autocomplete="none">
            @csrf

            <div class="form-group  mb-4">
                <label class=" text-primary">Select Account</label>
                <select class="form-control accounts-select " id="from_account" required>
                    <option selected disabled value=""> -- Select Account --</option>
                    @include('snippets.accounts')
                </select>

            </div>
            <div class="form-group mb-4">
                <label class=" text-primary"> Select Service Type</label>
                <select name="" id="service_type" class="form-control">
                    <option disabled value="">---- select a service type ----</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label class=" text-primary" for="description"> Description</label>
                <textarea name="" id="description" class="form-control "></textarea>
            </div>
            <div class="form-group text-right ">
                <button type="button"
                    class="btn btn-primary btn-rounded waves-effect waves-light disappear-after-success"
                    id="proceed_button">
                    Proceed
                </button>
            </div>
        </form>
    </div>

</div>
{{-- <div class="col-lg-6 d-none d-lg-block">
    <div class="card">
        <div class="card-body">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"
                style="min-height: 120px; max-height: auto;">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" style="min-height: 100%"
                            src="{{ asset('assets/images/rokel/sim_korpor_5.jpeg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" style="height: auto;"
                            src="{{ asset('assets/images/rokel/sim_korpor_6.jpeg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" style="min-height"
                            src="{{ asset('assets/images/rokel/sim_korpor_7.jpeg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages/accountServices/complaint.js') }}">
</script>
@endsection
{{-- //TODO: finish refactoring this page. Possibly change the ui --}}