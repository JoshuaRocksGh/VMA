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
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px;display: none" class="total national_assigment">0</b>
                                            <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/select.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
                                    </div>
                                    <h3 class="text-center mt-0">TOTAL POLLING STATIONS</h3>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px" />

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px; display: none"
                                                class="total_assigned national_assigment">0</b>
                                            <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/people.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
                                    </div>
                                    <h3 class="text-center mt-0">ASSIGNED POLLING STATIONS</h3>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:red" />


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px ; display: none"
                                                class="total_unassigned national_assigment">0</b>
                                            <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>

                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/user.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
                                    </div>
                                    <h3 class="text-center mt-0">UNASSIGNED POLLING STATIONS</h3>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:green" />


                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="datatable-buttons">
                        <table class="table table-striped dt-responsive nowrap w-100 all_agent_list">

                            <thead class="bg-dark">
                                <tr class="text-white">
                                    <th>REGION</th>
                                    <th>TOTAL POLLING STATIONS</th>
                                    <th>ASSIGNED POLLING STATIONS</th>
                                    <th>UNASSIGNED POLLING STATIONS</th>
                                    <th>DETAILS</th>
                                </tr>
                            </thead>
                            <tbody class="national_details">




                            </tbody>
                        </table>
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

    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
        var AgentDetail = @json(session()->get('Agents'));
        {{-- var AgentDetail = @json($AgentDetails); --}}
        var UserMandate = @json(session()->get('UserMandate'));
        {{-- var UserRegion = @json(session()->get('Region')); --}}
    </script>
@endsection
