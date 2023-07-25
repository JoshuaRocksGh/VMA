@extends('layouts.master')

@section('content')
    @php
        $pageTitle = 'Vote Monitor';
        $basePath = 'Vote Monitor';
        $currentPath = 'Monitor';
    @endphp
    @include('snippets.pageHeader')

    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4 display_chart">
                    {{--  DISPLAY FILTERS  --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group m-3">
                                        <label class="text-dark"><b>Select Level</b></label>
                                        <select class="form-control user_region" id="user_region">
                                            <option selected> -- Select -- </option>
                                            <option value="NationalLevel">National Level </option>
                                            <option value="RegionalLevel">Regional Level </option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-3">
                                        <label class="text-dark"><b>Select Region</b></label>
                                        <select class="form-control monitor_region" id="monitor_region" disabled>
                                            <option selected> -- Select -- </option>
                                            {{--  <option value="NationalLevel">National Level </option>
                                    <option value="RegionalLevel">Regional Level </option>  --}}

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-3">
                                        <label class="text-dark"><b>Select Constituency</b></label>
                                        <select class="form-control monitor_constituency" id="monitor_constituency"
                                            disabled>
                                            <option selected> -- Select -- </option>
                                            {{--  <option value="NationalLevel">National Level </option>
                                    <option value="RegionalLevel">Regional Level </option>  --}}

                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{--  <canvas id="accountsPieChart" style="max-height: 300px"></canvas>  --}}
                    <div class="row">
                        <div class="col-md-5 p-4 display_party" style="display:none">


                        </div>
                        <div class="col-md-7">
                            <br>
                            <div class="datatable-buttons national_level_display" style="display:none">
                                <table class="table table-striped nowrap w-100 votes_table">
                                    <thead>
                                        <tr>
                                            <th><b>Polling Station</b></th>
                                            <th><b>Party A</b></th>
                                            <th><b>Party B</b></th>
                                            <th><b>Party C</b></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>

                            <div class="datatable-buttons regional_level_display" style="display: none">
                                <table class="table table-striped nowrap w-100 ">
                                    <thead>
                                        <tr>
                                            <th><b>Polling Station</b></th>
                                            <th><b>Party A</b></th>
                                            <th><b>Party B</b></th>
                                            <th><b>Party C</b></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>

                            <div class="datatable-buttons constituency_level_display" style="display: none">
                                <table class="table table-striped nowrap w-100 ">
                                    <thead>
                                        <tr>
                                            <th><b>Polling Station</b></th>
                                            <th><b>Party A</b></th>
                                            <th><b>Party B</b></th>
                                            <th><b>Party C</b></th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>

                        </div>
                    </div>
                    {{--  <div class="row">
                        <div class="col-md-9">
                            <canvas id="myChart" style="max-height: 500px"></canvas>

                        </div>
                        <div class="col-md-3" id="display_party_logo">

                        </div>
                    </div>  --}}
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/vote_monitor.js') }}"></script>
@endsection
