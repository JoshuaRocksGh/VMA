@extends('layouts.master')
@section("styles")

@endsection
@section('content')

@php
$pageTitle='Settings';
$basePath = 'Settings';
$currentPath = 'Settings';
@endphp
@include('snippets.pageHeader')

<div class="tab-pane site-card p-2 p-sm-3 p-md-4">

</div>
@endsection

@section('scripts')
{{-- <script src="{{ asset('assets/js/pages/cardServices/cardServices.js') }}">
</script> --}}
@endsection