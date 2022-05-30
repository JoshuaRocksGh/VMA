@extends('layouts.master')
@section('content')
@php
$pageTitle = "SAME BANK TRANSFER";
$basePath = "Transfer";
$currentPath ="Same Bank";
@endphp
@include("pages.transfer.transfers_master")
@endsection
@section('scripts')
{{-- <script src="{{ asset('assets/js/pages/transfer/sameBank.js') }}"></script> --}}
@endsection