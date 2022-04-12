@extends('layouts.master')

@section('content')
    @php
    $pageTitle = 'Dashboard';
    $basePath = 'Home';
    $currentPath = 'Dashboard';
    @endphp
    @include('snippets.pageHeader')

    {{-- dashboard layout --}}
    <div class="px-2">
        <div class="dashboard site-card overflow-hidden">
            <nav class="dashboard-header ">
                <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Acc Summary</a>
                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Approvals</a>
                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">History</a>
                </div>
            </nav>
            <div class="tab-content border-primary border " id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="">
                        <canvas id="myChart" style="max-height: 350px"></canvas>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"></div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/plugins/chartjs/chartjs-v3.7.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/pages/home/home.js') }}"></script>


    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
    </script>
@endsection
