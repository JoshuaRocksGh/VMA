@extends('layouts.master')

@section('content')
    @php
        $pageTitle = 'Dashboard';
        $basePath = 'Home';
        $currentPath = 'Dashboard';
    @endphp
    @include('snippets.pageHeader')

    {{--  DASHBOARD  --}}
    <div>
        <div class="dashboard site-card overflow-hidden">
            {{--  <h3 class=""><span class=" text-danger">{{ $UserRegion }}</span> </h3>  --}}
            <div class="text-center">
                @if (session()->get('UserMandate') == 'NationalLevel')
                    <h1><a href="../home" class="h6" style="text-decoration: underline;cursor: pointer;">HOME</a> &nbsp; >
                        &nbsp;
                        <span class="h6 text-dark">{{ $UserRegion }} REGION</span>
                    </h1>
                    {{--  <h1 class=" text-danger" style="text-decoration: underline"  onclick="window.history.back()">  --}}
                    </h1>
                @endif
            </div>
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row ">
                        <div class="col-md-4 ">
                            <div class="card " style="background-color:#45b5c6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px;display: none"
                                                class="total_constituencies regional_assigment text-white"></b>
                                            <span class="spinner-border avatar-sm m-2 text-white" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/select.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
                                    </div>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px;color:white" />
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
                                            <b style="font-size: 24px; display: none"
                                                class="assigned_constituencies regional_assigment text-white"></b>
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
                            <div class="card " style="background-color: red">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px ; display: none"
                                                class="unassigned_constituencies regional_assigment text-white"></b>
                                            <span class="spinner-border avatar-sm text-white m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/user.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" /></div>
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
                            <table id="datatable-buttons"
                                class="table table-striped dt-responsive nowrap w-100 all_constituency_list">
                                <h1>Constituency Summary of Polling Stations</h1>
                                <thead class="bg-info">
                                    <tr class="text-white">
                                        <th>No.</th>
                                        <th>Constituency Name</th>
                                        <th>Total</th>

                                        <th>Assigned </th>
                                        <th>UnAssigned </th>

                                        <th>Action</th>


                                    </tr>
                                </thead>

                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script src="{{ asset('assets/js/regionalLevel.js') }}"></script>
    <script>
        var Mandate = @json(session()->get('UserMandate'));

        var UserRegion = `{{ $UserRegion }}`;

        {{-- if (Mandate == "NationalLevel") {
            var UserRegion = UserRegion;
            alert(UserRegion)
            var region = '{{ $region }}'
        } else if (Mandate != "NationalLevel") {
            var UserRegion = UserRegion;

        } --}}
    </script>
@endsection
