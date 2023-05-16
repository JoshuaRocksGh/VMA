@extends("layouts.master")


@section('styles')

    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->
    <!-- third party css end -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">

    <style>

    </style>

@endsection


@section('content')
    <div class="container-fluid">
        <h3 class="">Agent &nbsp; > &nbsp; <span class=" text-danger">Agent List</span> </h3>
    </div>
    <div class=" container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card"
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">

                        <h4 class="header-title">List of Agents</h4>
                        <div class="row" id="agent_list_spinner">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 text-center">
                                <div class="spinner-border avatar-lg text-primary m-2 text-dark" role="status"></div>
                            </div>
                            <div class="col-md-4 "></div>
                        </div>
                        <div id="data_table_view" style="display: none">
                            <table id="datatable-buttons"
                                class="table table-striped dt-responsive nowrap w-100 all_agent_list">
                                <thead class="bg-info">
                                    <tr class="text-white">
                                        <th>No.</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Name</th>
                                        <th>User ID</th>
                                        <th>Region</th>
                                        <th>Constituency</th>
                                        <th>Electoral Area</th>
                                        <th>Action</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </thead>

                                {{-- @foreach ($AgentDetails as $AgentDetail) --}}
                                {{-- {{ $AgentDetail['Constituency'] }} --}}
                                <tbody>

                                    {{-- <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr> --}}




                                </tbody>
                                {{-- @endforeach --}}
                            </table>
                        </div>


                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>

    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Agent Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <span style="display: block; width: 100% ; border-top: 1px solid #ccc" class="mt-0"></span>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center ">
                            <img alt="image" class="img-fluid avatar-xxl rounded-circle user_image_id" />
                        </div>
                        <div class="col-md-4"></div>
                        <hr>

                        <legend></legend>

                        <legend></legend>

                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <legend></legend>
                            <div class="row user_buttons">

                                <div class="col-md-6">
                                    <a type="button"
                                        class="btn btn-outline-warning btn-rounded waves-effect waves-light mb-1 user_reset_password"><b>Agent
                                            Reset</b></a>
                                </div>

                                {{-- <div class="col-md-4 text-center">
                                    <a type="button"
                                        class="btn btn-outline-info btn-rounded waves-effect waves-light mb-1 user_forgot_password"><b>Forgot
                                            Password</b></a>
                                </div> --}}

                                <div class="col-md-6 text-right">
                                    <a type="button"
                                        class="btn btn-outline-pink btn-rounded waves-effect waves-light mb-1 float-right user_delete"><b
                                            class="activate_deactivate_user"></b></a>
                                </div>
                            </div>
                            <legend></legend>


                            <div class="table-responsive">
                                <table class="table table-striped mb-0">

                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-danger">Name</th>
                                            <td><b class="users_name"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">User ID</th>
                                            <td><b class="user_id"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Region</th>
                                            <td><b class="users_region"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Constituency</th>
                                            <td><b class="users_constituency"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Electoral Area</th>
                                            <td><b class="users_electoral_area"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Primary Phone Number</th>
                                            <td><b class="user_primary_telephone"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Secondary Phone Number</th>
                                            <td><b class="user_secondary_telephone"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Other Phone Number</th>
                                            <td><b class="user_other_telephone"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Date of Birth</th>
                                            <td><b class="user_dob"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Gender</th>
                                            <td><b class="user_gender"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Educational Level</th>
                                            <td><b class="user_educational_level"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Institution Name</th>
                                            <td><b class="user_institution_name"></b></td>

                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-danger">Year of Completion</th>
                                            <td><b class="user_completion_year"></b></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div>

                        <legend></legend>

                    </div>
                    <div class="col-md-1"></div>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


@endsection

@section('scripts')
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('assets/js/all_agent_all.js') }}"></script>

    <script>
        var AgentDetail = @json(session()->get('Agents'));
        var my_mandate = @json($UserMandate);
        //var my_mandate = @json(session()->get('UserMandate'));
        //var my_mandate = "{{ session()->get('UserMandate') }}"
        var my_region = "{{ session()->get('Region') }}"
        var my_constituency = "{{ session()->get('Constituency') }}"
    </script>




@endsection
