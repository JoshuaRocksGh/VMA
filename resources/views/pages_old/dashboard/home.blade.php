@extends('layouts.master')


@section('content')
    <div class="container-fluid">

        <h3 class="text-right m-3"><span class=" text-danger ">Home</span> </h3>


        <div class="row">
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(136, 198, 197, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">TOTAL POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px;display: none" class="total national_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">ASSIGNED POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px; display: none" class="total_assigned national_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(252, 205, 201, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">UNASSIGNED POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px ; display: none" class="total_unassigned national_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row">
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

                        <div class="table-responsive">
                            <table
                                class="table table-borderless table-hover table-nowrap table-centered m-0 all_agent_list">

                                <thead
                                    style="background-color: rgba(32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                    <tr>
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

    </div>

@endsection

@section('scripts')

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script>
        var AgentDetail = @json(session()->get('Agents'));
        {{-- var AgentDetail = @json($AgentDetails); --}}
        var UserMandate = @json(session()->get('UserMandate'));
        {{-- var UserRegion = @json(session()->get('Region')); --}}
    </script>
@endsection
