@extends('layouts.master')

@section('style')
    {{-- <link rel="stylesheet" type="text/css" href="selectize.css" /> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.bootstrap3.css" />

    <style>
        select-dropdown {
            width: 600px !important;
        }
    </style>
@endsection


@section('content')
    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="text-center">

                @if (session()->get('UserMandate') != 'ConstituencyLevel')
                    <h1 class=" text-danger">
                        {{ $UserConstituency }}</h1>
                @endif



            </div>

            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" style="background-color:#45b5c6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px ; display: none"
                                                class="total_polling_stations constituency_assigment text-white"></b>
                                            <span class="spinner-border avatar-sm text-white m-2" role="status"></span>

                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/select.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" />
                                        </div>

                                    </div>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px;color:white" />
                                    <br>
                                    <h3 class="text-center mt-0 text-white">TOTAL POLLING STATIONS</h3>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body" style="background-color:green">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px; display: none "
                                                class="assigned_polling_stations constituency_assigment text-white"></b>
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
                            <div class="card" style="background-color: red">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px;display: none"
                                                class="unassigned_polling_stations constituency_assigment text-white"></b>
                                            <span class="spinner-border avatar-sm text-white m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/user.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" />
                                        </div>

                                    </div>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:white" />
                                    <br>
                                    <h3 class="text-center mt-0 text-white">UNASSIGNED POLLING STATIONS</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--    --}}
                    <hr>

                    <br><br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card" style="background-color: #fff">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <h4 class="text-danger"> Agent Details</h4>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <hr class="mt-0">

                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-4"></div>
                                                    <div class="col-md-4 text-center">
                                                        <div class="spinner-border avatar-md text-dark m-2 assign_spinner"
                                                            role="status"></div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>

                                                <div class="agent_details" style="display: none">
                                                    <div class="form-group row" style="display: none">
                                                        <label class="col-md-4 text-dark ">Assign:</label>
                                                        <h4 class="col-md-8 assign text-dark text-center"
                                                            value="{{ $assign }}">{{ $assign }}</h4>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 text-dark ">Agent ID:</label>
                                                        <h4 class="col-md-8 agent_id text-dark text-center"></h4>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 text-dark ">Agent
                                                            Name:</label>
                                                        <h4 class="col-md-8 agent_name text-dark text-center"></h4>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 text-dark ">Gender:</label>
                                                        <h4 class="col-md-8 agent_gender text-dark text-center"></h4>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 text-dark ">Agent
                                                            Region:</label>
                                                        <h4 class="col-md-8 agent_region text-dark text-center"></h4>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="" class="col-md-4 text-dark ">Agent
                                                            Constituency:</label>
                                                        <h4 class="col-md-8 agent_constituency text-dark text-center"></h4>
                                                    </div>
                                                    @if ($assign != 'true')
                                                        <div class="form-group row">
                                                            <label for="" class="col-md-4 text-dark">Agent Polling
                                                                Station:</label>

                                                            {{--  <h4
                                                                class="col-md-8 agent_electoral_area text-dark text-center">
                                                            </h4>  --}}
                                                            <div class="col-md-8">
                                                                <select class=" agent_electoral_area"
                                                                    id="agent_electoral_area"
                                                                    placeholder="-- Select Electoral Area--" disabled>
                                                                    {{-- <option value="">-- Select Electoral Area--</option> --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @elseif($assign == 'true')
                                                        <div class="form-group row">
                                                            <label for="" class="col-md-4 text-dark">Agent Polling
                                                                Station:</label>

                                                            {{-- <h4 class="col-md-6 agent_electoral_area text-blue text-center"></h4> --}}
                                                            <div class="col-md-8">
                                                                <select class=" agent_electoral_area"
                                                                    id="agent_electoral_area"
                                                                    placeholder="-- Select Electoral Area--">
                                                                    {{-- <option value="">-- Select Electoral Area--</option> --}}
                                                                </select>
                                                            </div>


                                                        </div>
                                                    @endif
                                                    {{-- <input type="hidden" value={{ $UserConstituency }} id="user_constituency"> --}}

                                                    <div class="row">
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4">
                                                            <button type="button" class="btn btn-info btn-block"
                                                                id="unassign_agent_button">
                                                                <span class="confirm_text">Confirm</span>
                                                                <span
                                                                    class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                                    role="status" aria-hidden="true"
                                                                    style="display: none"></span>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>

                                                </div>

                                            </form>

                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    {{--  <div class="container-fluid">
        <h3 class="">{{ session()->get('Region') }} &nbsp; > &nbsp;<span class=" text-danger">
                {{ $UserConstituency }}</span>
            @if (session()->get('Region') == 'ConstituencyLevel')
                echo (session()->get('Region'))
            @endif

        </h3>

        <div class="row">
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba( 32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px ; display: none"
                                    class="total_polling_stations constituency_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(136, 198, 197, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">ASSIGNED POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px; display: none"
                                    class="assigned_polling_stations constituency_assigment">0</b>
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
                                <b style="font-size: 48px; display: none"
                                    class="unassigned_polling_stations constituency_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>  --}}
@endsection


@section('scripts')
    <!-- Datatables init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>

    <script src="{{ asset('assets/js/unassign_agent.js') }}"></script>
    <script>
        var UserRegion = '{{ session()->get('Region') }}';

        var constituency = '{{ $constituency }}';

        var user_id = '{{ $user_id }}'


        var UserConstituency = '{{ $UserConstituency }}'
    </script>
@endsection
