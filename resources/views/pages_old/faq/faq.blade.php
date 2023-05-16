@php
$isApp = true;
@endphp
@extends('layouts.master')

@section('content')
@include('snippets.top_navbar', ['page_title' => 'FAQ'])

@include('pages.faq.faqs')

<!-- end row -->


@endsection