@extends('layouts.master')
@section("styles")
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/plugins/bootstrap-pincode-input/bootstrap-pincode-input.css') }}" />
<style>
    .card-img {
        font-size: 28px !important;

    }

    @media (min-width: 574px) {
        .card-img {
            font-size: 3rem !important;
        }
    }

    .text {
        position: absolute;
        width: 0px;
        height: 0px;
        transition: all 1s;

    }
</style>
@endsection
@section('content')

@php
$pageTitle='Settings';
$basePath = 'Settings';
$currentPath = 'Settings';
@endphp
@include('snippets.pageHeader')

<div class="tab-pane site-bg font site-card p-2 p-sm-3 p-md-4">

    <div style="max-width: 1024px;
    " class="d-flex mx-auto justify-content-between flex-wrap" id="settings_display"></div>

    <div class="mt-5 d-flex align-items-center justify-content-center font-11 font-weight-bold">
        <img style="height: 15px;" src="{{ asset('assets/images/logoRKB.png') }}" />
        <span class="d-block ml-1">
            Rokel
            Commercial
            Bank Internet
            Banking
        </span>
    </div>
</div>

@include('pages.settings.enquiry')
@include('pages.settings.forgot_transaction_pin')
@include("pages.settings.change_transaction_pin")
@include('pages.settings.faq')
@endsection
@section('scripts')
<script src="{{ asset('assets/js/pages/settings/settings.js') }}">
</script>
<script defer src="{{ asset('assets/plugins/bootstrap-pincode-input/bootstrap-pincode-input.js') }}"></script>

@endsection