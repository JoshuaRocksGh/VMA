@extends('layouts.master')

@section('content')
    @php
        $pageTitle = 'Rported Issues';
        $basePath = 'Issues';
        $currentPath = 'Rported Issues';
    @endphp
    @include('snippets.pageHeader')
    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="table-responsive">
                        @if (session()->get('UserMandate') == 'NationalLevel')
                            <table class="table table-striped dt-responsive nowrap w-100  all_reported_issues_list">

                                <thead class="bg-dark">
                                    <tr class="text-white">
                                        <th>Date & Time</th>
                                        <th>Name</th>
                                        <th>user ID</th>
                                        <th>Region</th>
                                        <th>Constituency</th>
                                        <th>Polling Station</th>
                                        <th>Details</th>

                                    </tr>
                                </thead>
                                <tbody class="reported_issues_details">




                                </tbody>
                            </table>
                        @elseif(session()->get('UserMandate') == 'RegionalLevel')
                            <table class="table table-striped dt-responsive nowrap w-100  all_reported_issues_list">

                                <thead class="bg-dark">
                                    <tr class="text-white">
                                        <th>Date & Time</th>
                                        <th>Name</th>
                                        {{-- <th>Name</th> --}}
                                        <th>user ID</th>
                                        <th>Constituency</th>
                                        <th>Polling Station</th>
                                        <th>Details</th>

                                    </tr>
                                </thead>
                                <tbody class="reported_issues_details">




                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid">
        <h3 class=""><span class=" text-danger">Reported Issue</span> </h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card"
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="row" id="reported_issue_list_spinner" style="display: none">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <br>
                            <div class="spinner-border avatar-lg text-primary m-2 text-dark" role="status"></div>
                            <br>
                        </div>
                        <div class="col-md-4 "></div>
                    </div>
                    <div class="card-body" id="all_reported_issues">
                        <h4 class="header-title mb-3">ALL REPORTED ISSUES</h4>
                        <div class="table-responsive">
                            @if (session()->get('UserMandate') == 'NationalLevel')
                                <table
                                    class="table table-borderless table-hover table-nowrap table-centered m-0 all_reported_issues_list">

                                    <thead
                                        style="background-color: rgba(32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Name</th>
                                            <th>user ID</th>
                                            <th>Region</th>
                                            <th>Constituency</th>
                                            <th>Polling Station</th>
                                            <th>Details</th>

                                        </tr>
                                    </thead>
                                    <tbody class="reported_issues_details">




                                    </tbody>
                                </table>
                            @elseif(session()->get('UserMandate') == 'RegionalLevel')
                                <table
                                    class="table table-borderless table-hover table-nowrap table-centered m-0 all_reported_issues_list">

                                    <thead
                                        style="background-color: rgba(32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Name</th>
                                            {{-- <th>Name</th> --}}
                                            <th>user ID</th>
                                            <th>Constituency</th>
                                            <th>Polling Station</th>
                                            <th>Details</th>

                                        </tr>
                                    </thead>
                                    <tbody class="reported_issues_details">




                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Standard modal content -->
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Issue Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <img class="card-img-top img-fluid issue_image" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title issue_text"></h5>

                        <footer>
                            <small class="text-muted issue_time">
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- data-toggle="modal" data-target="#standard-modal" --}}
@endsection


@section('scripts')
    <!-- Datatables init -->
    {{-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}
    @include('extras.datatables')


    <script>
        var my_mandate = "{{ session()->get('UserMandate') }}"
        var my_region = "{{ session()->get('Region') }}"
        var my_constituency = "{{ session()->get('Constituency') }}"
        var userID = "{{ session()->get('userID') }}"
        var FirstName = "{{ session()->get('FirstName') }}"
        var Surname = "{{ session()->get('Surname') }}"
    </script>

    <script src="{{ asset('assets/js/reported_issues.js') }}"></script>
@endsection
