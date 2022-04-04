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

    .grad-gray-blue {
        background-image: linear-gradient(to right, #314755 0%, #26a0da 51%, #314755 100%)
    }

    .grad-blue-pink {
        background-image: linear-gradient(to right, #3494E6 0%, #EC6EAD 51%, #3494E6 100%)
    }


    .green-yellow {
        background-image: linear-gradient(to right, #16A085 0%, #F4D03F 51%, #16A085 100%)
    }

    .pink-cyan {
        background-image: linear-gradient(to right, #fc00ff 0%, #00dbde 51%, #fc00ff 100%)
    }

    .cyan-green {
        background-image: linear-gradient(to right, #007991 0%, #78ffd6 51%, #007991 100%)
    }


    .yellow-yellow {
        background-image: linear-gradient(to right, #F7971E 0%, #FFD200 51%, #F7971E 100%)
    }

    .blue-blue {
        background-image: linear-gradient(to right, #0575E6 0%, #021B79 51%, #0575E6 100%)
    }

    .red-orange {
        background-image: linear-gradient(to right, #ee0979 0%, #ff6a00 51%, #ee0979 100%)
    }

    .black-black {
        background-image: linear-gradient(to right, #283048 0%, #859398 51%, #283048 100%)
    }


    .grad {
        /* margin: 10px; */
        /* padding: 15px 45px; */
        /* text-align: center; */
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        /* box-shadow: 0 0 20px #eee; */
        border-radius: 10px;
        /* display: block; */
    }

    .grad:hover {
        background-position: right center;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        /* change the direction of the change here */
        color: #fff;
        text-decoration: none;
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
@include("pages.settings.change_transaction_pin")
@endsection
@section('scripts')
<script src="{{ asset('assets/js/pages/settings/settings.js') }}">
</script>
<script defer src="{{ asset('assets/plugins/bootstrap-pincode-input/bootstrap-pincode-input.js') }}"></script>

@endsection