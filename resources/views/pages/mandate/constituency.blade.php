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
            <div class="text-center">
                <h3 class="">{{ session()->get('Region') }} &nbsp; || &nbsp;<span class=" text-danger">
                        {{ $UserConstituency }}</span>
                    @if (session()->get('Region') == 'ConstituencyLevel')
                        echo (session()->get('Region'))
                    @endif

                </h3>

            </div>
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <b style="font-size: 24px ; display: none"
                                                class="total_polling_stations constituency_assigment">0</b>
                                            <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>

                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/select.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" />
                                        </div>

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
                                            <b style="font-size: 24px; display: none "
                                                class="assigned_polling_stations constituency_assigment">0</b>
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
                                            <b style="font-size: 24px;display: none"
                                                class="unassigned_polling_stations constituency_assigment">0</b>
                                            <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                                        </div>
                                        <div class="col-md-4"><img src="{{ asset('assets/images/user.png') }}"
                                                class=" img-fluid float-right" style="width:40px;height:40px" />
                                        </div>

                                    </div>
                                    <h3 class="text-center mt-0">UNASSIGNED POLLING STATIONS</h3>
                                    <hr style="border-style: solid;border-width: 2px;margin-bottom: 0px; color:green" />
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--    --}}
                    <br><br>
                    <div class="">

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
                        {{--    --}}
                        <div class="tab-content">
                            <div class="tab-pane show active" id="home">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 assigned_agent_list">
                                    <thead class="bg-dark">
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


                                {{--  </div>  --}}



                            </div>
                            <div class="tab-pane " id="profile">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 unassigned_agent_list">
                                    <thead class="bg-dark">
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

                </div>

            </div>

        </div>
    </div>





    <div class="row">

        <div class="col-md-12">


            <!-- Standard modal content -->
            <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
                aria-hidden="true">
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
    @include('extras.datatables')

    <script src="{{ asset('assets/js/constituencyLevel.js') }}"></script>
    <script>
        var UserRegion = '{{ session()->get('Region') }}';

        var constituency = '{{ $UserConstituency }}';

        var UserConstituency = '{{ $UserConstituency }}'
    </script>
@endsection
