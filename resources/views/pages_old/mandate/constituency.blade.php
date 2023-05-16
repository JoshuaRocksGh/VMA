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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">

    <style>

    </style>

@endsection


@section('content')

    <div class="container-fluid">
        <h3 class="">{{ session()->get('Region') }} &nbsp; > &nbsp;<span class=" text-danger">
                {{ $UserConstituency }}</span>
            @if (session()->get('Region') == 'ConstituencyLevel')
                echo (session()->get('Region'))
            @endif

        </h3>

        <div class="row">
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
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
                    style="background-color: rgba(136, 198, 197, 0.3 );backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">ASSIGNED POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px; display: none "
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
                                <b style="font-size: 48px;display: none"
                                    class="unassigned_polling_stations constituency_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">

        <div class="col-md-12">
            <div class="card-box"
                style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <h4 class="header-title mb-4">Polling Station Information</h4>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <b class="text-success" style="font-size: 16px">Assigned Polling Agents</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                            <b class="text-danger" style="font-size: 16px">UnAssigned Polling Agents</b>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                            Messages
                        </a>
                    </li> --}}
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="home">

                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class=" card-body">

                                        <h4 class="header-title">Assigned Agents</h4>


                                        <table id="datatable-buttons"
                                            class="table table-striped dt-responsive nowrap w-100 assigned_agent_list">
                                            <thead class="bg-info">
                                                <tr class="text-white">
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Region</th>
                                                    <th>Constituency</th>
                                                    <th>Electoral Area</th>
                                                    <th>User Id</th>
                                                    <th>Action</th>


                                                </tr>
                                            </thead>

                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>



                    </div>
                    <div class="tab-pane " id="profile">
                        <div class="row">
                            <div class="col-12">
                                <div class="">
                                    <div class=" card-body">

                                        <h4 class="header-title"> UnAssigned Agents</h4>


                                        <table id="datatable-buttons"
                                            class="table table-striped dt-responsive nowrap w-100 unassigned_agent_list">
                                            <thead class="bg-info">
                                                <tr class="text-white">
                                                    <th>No.</th>
                                                    <th>Name</th>
                                                    <th>Region</th>
                                                    <th>Constituency</th>
                                                    <th>Electoral Name</th>
                                                    <th>User Id</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        {{-- <div class="tab-pane" id="messages">
                        <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                            mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                            quis enim.</p>
                        <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                            enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis
                            pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate
                            eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                    </div> --}}
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <!-- Standard modal content -->
            <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center text-danger" id="standard-modalLabel">Agent Details</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            {{-- <hr style="mt-0"> --}}
                        </div>

                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="" class="col-md-4 h4">Agent ID:</label>
                                <h4 class="col-md-8 agent_id text-blue"></h4>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 h4">Agent Name:</label>
                                <h4 class="col-md-8 agent_name text-blue"></h4>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 h4">Gender:</label>
                                <h4 class="col-md-8 agent_gender text-blue"></h4>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 h4">Agent Region:</label>
                                <h4 class="col-md-8 agent_region text-blue"></h4>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 h4">Agent Constituency:</label>
                                <h4 class="col-md-8 agent_constituency text-blue"></h4>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-4 h4">Agent Polling Station:</label>
                                <h4 class="col-md-8 agent_electoral_area text-blue"></h4>
                            </div>

                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-light" data-dismiss="modal">Close</button> --}}
                            <button type="button" class="btn btn-info" id="unassign_modal_button">Confirm</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Standard  modal -->
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#standard-modal">Standard Modal</button> --}}


            {{-- <div class="col-xl-6">
            <div class="card-box"
                style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <h4 class="header-title mb-4">Tabs Vertical Left</h4>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active show mb-1" id="v-pills-home-tab" data-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                Assign Polling Agent</a>
                            <a class="nav-link mb-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                Assigned Polling Station</a>
                            <a class="nav-link mb-1" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                Unassign Pooling Agent</a>
                            <a class="nav-link mb-1" id="v-pills-settings-tab" data-toggle="pill"
                                    href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false">
                                    Settings</a>
                        </div>
                    </div> <!-- end col-->
                    <div class="col-sm-9">
                        <div class="tab-content pt-0">
                            <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <p>Cillum ad ut irure tempor velit nostrud occaecat ullamco aliqua anim Lorem sint.
                                    Veniam sint duis incididunt
                                    do esse magna mollit excepteur laborum qui. Id id reprehenderit sit est eu aliqua
                                    occaecat quis et velit
                                    excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat commodo et
                                    voluptate minim reprehenderit
                                    mollit pariatur. Deserunt non laborum enim et cillum eu deserunt excepteur ea
                                    incididunt minim occaecat.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <p>Culpa dolor voluptate do laboris laboris irure reprehenderit id incididunt duis
                                    pariatur mollit aute magna
                                    pariatur consectetur. Eu veniam duis non ut dolor deserunt commodo et minim in quis
                                    laboris ipsum velit
                                    id veniam. Quis ut consectetur adipisicing officia excepteur non sit. Ut et elit
                                    aliquip labore Lorem
                                    enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit qui esse anim
                                    eiusmod do sint minim consectetur
                                    qui.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">
                                <p>Fugiat id quis dolor culpa eiusmod anim velit excepteur proident dolor aute qui
                                    magna. Ad proident laboris
                                    ullamco esse anim Lorem Lorem veniam quis Lorem irure occaecat velit nostrud magna
                                    nulla. Velit et et
                                    proident Lorem do ea tempor officia dolor. Reprehenderit Lorem aliquip labore est
                                    magna commodo est ea
                                    veniam consectetur.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">
                                <p>Eu dolore ea ullamco dolore Lorem id cupidatat excepteur reprehenderit consectetur
                                    elit id dolor proident
                                    in cupidatat officia. Voluptate excepteur commodo labore nisi cillum duis aliqua do.
                                    Aliqua amet qui
                                    mollit consectetur nulla mollit velit aliqua veniam nisi id do Lorem deserunt amet.
                                    Culpa ullamco sit
                                    adipisicing labore officia magna elit nisi in aute tempor commodo eiusmod.</p>
                            </div>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->

            </div> <!-- end card-box-->
        </div> --}}

        </div>
        <!-- end row -->
    </div>


@endsection

@section('scripts')

    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    {{-- <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script> --}}
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>


    <script src="{{ asset('assets/js/constituencyLevel.js') }}"></script>
    <script>
        var UserRegion = '{{ session()->get('Region') }}';

        var constituency = '{{ $UserConstituency }}';

        var UserConstituency = '{{ $UserConstituency }}'
    </script>
@endsection
