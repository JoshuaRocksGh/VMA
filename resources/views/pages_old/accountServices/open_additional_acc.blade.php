@extends('layouts.master')

@section('content')
    @php
        $currentPath = 'Additional Account';
        $basePath = 'Account Services';
        $pageTitle = 'Additional Account';
    @endphp
    @include('snippets.pageHeader')

    <div class="dashboard site-card overflow-hidden">
        <div class="tab-content dashboard-body border-danger border "></div>
    </div>
@endsection
