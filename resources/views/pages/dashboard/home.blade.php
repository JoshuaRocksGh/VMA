@extends('layouts.master')


@section('content')
    @php
        $pageTitle = 'Dashboard';
        $basePath = 'Home';
        $currentPath = 'Dashboard';
    @endphp
    @include('snippets.pageHeader')

    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="background-color:#45b5c6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px; " class="text-white total national_assigment"></b>
                                            <span class="spinner-border avatar-sm text-white m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/select.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
                                    </div>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:white" />
                                    <br>
                                    <h3 class="text-center mt-0 text-white">TOTAL POLLING STATIONS</h3>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card " style="background-color: green">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px; "
                                                class=" text-white total_assigned national_assigment"></b>
                                            <span class="spinner-border avatar-sm text-white m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/people.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
                                    </div>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:white" />
                                    <br>
                                    <h3 class="text-center mt-0 text-white">ASSIGNED POLLING STATIONS</h3>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="background-color:  red">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px ; "
                                                class="text-white total_unassigned national_assigment"></b>
                                            <span class="spinner-border avatar-sm text-white m-2" role="status"
                                                style="color: white"></span>

                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/user.png') }}"
                                                class=" img-fluid float-right text-white" style="width:40px;height:40px" />
                                        </div>
                                    </div>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:white" />
                                    <br>
                                    <h3 class="text-center mt-0 text-white">UNASSIGNED POLLING STATIONS</h3>



                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br><br>
                    <div class="card">
                        <div class="card-body">
                            <div class="datatable-buttons">

                                <table class="table table-striped dt-responsive nowrap w-100 all_agent_list">
                                    <h1 style="margin-bottom: -20px;">Regional Summary of Polling Stations</h1>


                                    <thead class="bg-info">
                                        <tr class="text-white">
                                            <th>Region</th>
                                            <th>Total Polling Stations</th>
                                            <th>Assigned Polling Stations</th>
                                            <th>UnAssigned Polling Stations</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">

        {{--  <div class="row">
            <div class="col-md-12">
                <div class="card"
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="row" id="agent_list_spinner">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <br>
                            <div class="spinner-border avatar-lg text-primary m-2 text-dark" role="status"></div>
                            <br>
                        </div>
                        <div class="col-md-4 "></div>
                    </div>
                    <div class="card-body" id="all_regions_table" style="display: none">
                        <h4 class="header-title mb-3">ALL REGIONS</h4>


                    </div>
                </div>
            </div>

        </div>  --}}

    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
        var AgentDetail = @json(session()->get('Agents'));
        {{-- var AgentDetail = @json($AgentDetails); --}}
        var UserMandate = @json(session()->get('UserMandate'));
        {{-- var UserRegion = @json(session()->get('Region')); --}}
    </script>
@endsection
