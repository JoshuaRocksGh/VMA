@extends('layouts.master')
@section("styles")
<style>
    .card-img {
        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }

    .settings-card {
        max-width: 300px;
        display: flex;
        flex-direction: row;
        padding: 0.75rem 1.5rem;
        align-items: center;
    }

    .settings-card .card-body {
        text-align: center;
        display: flex;
        align-content: center;
        align-items: center;
        font-weight: bold;
    }

    #settings_display {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 1.25rem;


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

<div class="tab-pane site-card p-2 p-sm-3 p-md-4">
    <div class="card bg-gradient" style=" max-width: 300px;">
        <img style="max-height: 150px" src="{{ asset('assets/images/placeholders/hour_glass.svg') }}" />
        <span class="px-3 py-2 font-weight-bold font-14">Uncle</span>

    </div>`


    <div class="" id="settings_display"></div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/pages/settings/settings.js') }}">
</script>
@endsection