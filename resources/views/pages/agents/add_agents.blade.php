@extends("layouts.master")

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
    {{-- <br> --}}
    {{-- style="background-color: rgba(245, 245, 245, 0.9);" --}}



    <div class="container-fluid">
        <h3 class="">Agent &nbsp; > &nbsp; <span class=" text-danger">Add Agent</span> </h3>

        <div class="card"
            style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <div class="card-body">
                <div class="___class_+?3___">
                    {{-- <div class="container">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h2 class="text-center">Add Agent</h2>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div> --}}

                    {{-- <hr class="mt-0"> --}}

                    <div class="container">

                        <form action="" id="new_agent_form" autocomplete="off" aria-autocomplete="off">
                            {{-- <b><em class="text-blue h3">Personal Details</em></b> --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    {{-- <div class="col-md-4" style="">

                                        <div class="form-group text-center">
                                            <img src="{{ url('assets/images/users/new-u.png') }}" alt="image"
                                                id="display_selected_id_image"
                                                class="img-fluid rounded-circle display_selected_id_image" width="200"
                                                style="border: groove" />
                                            <br><br>
                                            <input type="file" id="image_upload" class="form-control-file float-right">
                                            <input type="hidden" id="image_upload_">

                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        {{-- <b class="float-right"><em>Please fll fields marked with
                                                &nbsp;</em><span class="text-danger h3">*</span></b> --}}
                                    </div>
                                </div>
                                <br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">First Name:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="first_name" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent First Name">
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Middle Name:</label>
                                            <input type="text" id="middle_name" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Middle Name">
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="example-select" class="col-md-12 h4">Select Gender:<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control col-md-11" id="select_gender">
                                                <option value="">-- Select Agent Gender --</option>
                                                <option value="001~Male">Male</option>
                                                <option value="002~Female">Female</option>

                                            </select>
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Telephone Number
                                                2:(optional)</label>
                                            <input type="text" id="telephone_number_2" class="form-control col-md-11"
                                                maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Telephone Number">
                                        </div>



                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Voter ID:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="id_number" class="form-control col-md-11" maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent ID Number">
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Institution Name:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="institution_name" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Institution Name">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        {{-- <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">First Name:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="first_name" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent First Name">
                                        </div> --}}

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Surname:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="surname" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Surname">
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Date of Birth:<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="agent_dob" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Date of Birth">
                                        </div>



                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Telephone Number 1:<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="telephone_number_1" class="form-control col-md-11"
                                                maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Telephone Number">
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Telephone Number
                                                3:(optional)</label>
                                            <input type="text" id="telephone_number_3" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off" maxlength="10"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                placeholder="Enter Agent Telephone Number">
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Educational Level:<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control col-md-11" id="educational_level">
                                                <option value="">-- Select Educational Level --</option>
                                                <option value="JHS">JHS</option>
                                                <option value="SHS">SHS</option>
                                                <option value="Vocational">Vocational</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="HND">HND</option>
                                                <option value="Degree">Degree</option>
                                                <option value="Masters">Masters</option>
                                                <option value="PHD">PHD</option>
                                            </select>

                                        </div>



                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-12 h4">Year of Completion:<span
                                                    class="text-danger">*</span></label>
                                            <input type="date" id="completion_year" class="form-control col-md-11"
                                                autocomplete="off" aria-autocomplete="off"
                                                placeholder="Enter Agent Surname">
                                        </div>
                                    </div>
                                </div>

                                {{-- <hr class="mt-0" style="background-color: #ccc ; height:2px;border: none;"> --}}

                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- <b><em class="text-blue h3">Agent Details</em></b> --}}
                                        <br>
                                        {{-- <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-4 h4">Agent Code:</label>
                                            <input type="text" id="agent_code" class="form-control col-md-8">
                                        </div> --}}
                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-4 h4">Agent Region:<span
                                                    class="text-danger">*</span></label>
                                            {{-- <input type="text" id="agent_region" class="form-control col-md-8"
                                                placeholder="Enter Agent Region"> --}}

                                            @if (session()->get('UserMandate') == 'NationalLevel')
                                                <div class="d-flex align-items-center ml-1">

                                                    <span class="spinner-border spinner-border-sm mr-1" id="region_spinner"
                                                        role="status" aria-hidden="true" style="display:none"></span>
                                                </div>
                                                <select class="form-control col-md-7 ml-3" id="agent_region">
                                                    <option value="">-- Select Region --</option>
                                                </select>
                                            @elseif(session()->get('UserMandate') != "NationalLevel")
                                                {{-- <div class="d-flex align-items-center ml-1">

                                                    <span class="spinner-border spinner-border-sm mr-1" id="region_spinner"
                                                        role="status" aria-hidden="true" style="display:none"></span>
                                                </div> --}}
                                                <select class="form-control col-md-7 ml-3" id="agent_region" disabled
                                                    style="background: #DCDCDC">
                                                    <option value="{{ session()->get('Region') }}" selected>
                                                        {{ session()->get('Region') }}</option>
                                                </select>

                                                {{-- <input type="text" value="{{ session()->get('Region') }}" id="my_region"> --}}
                                            @endif
                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-4 h4">Agent Constituency:<span
                                                    class="text-danger">*</span></label>

                                            <input type="hidden" id="agent_constituency_" class="form-control col-md-4">
                                            @if (session()->get('UserMandate') != 'ConstituencyLevel')
                                                <div class="d-flex align-items-center ml-1">

                                                    <span class="spinner-border spinner-border-sm mr-1"
                                                        id="constituency_spinner" role="status" aria-hidden="true"
                                                        style="display:none"></span>
                                                </div>
                                                <select class="form-control col-md-7 ml-3" id="agent_constituency">
                                                    <option value="">-- Select Constituency--</option>
                                                </select>
                                            @elseif(session()->get('UserMandate') == "ConstituencyLevel")
                                                <div class="d-flex align-items-center ml-1">

                                                    <span class="spinner-border spinner-border-sm mr-1"
                                                        id="constituency_spinner" role="status" aria-hidden="true"
                                                        style="display:none"></span>
                                                </div>
                                                <select class="form-control col-md-7 ml-3" id="agent_constituency" disabled
                                                    style="background: #DCDCDC">
                                                    <option value="{{ session()->get('Constituency') }}">
                                                        {{ session()->get('Constituency') }}</option>
                                                </select>
                                            @endif

                                        </div>

                                        <div class="form-group mb-1 row">
                                            <label for="simpleinput" class="col-md-4 h4">Agent Polling Station:<span
                                                    class="text-danger">*</span></label>
                                            {{-- <input type="text" id="agent_electoral_area" class="form-control col-md-8"
                                                placeholder="Enter Agent Polling Station"> --}}
                                            <div class="d-flex align-items-center ml-1">

                                                <span class="spinner-border spinner-border-sm mr-1"
                                                    id="polling_station_spinner" role="status" aria-hidden="true"
                                                    style="display:none"></span>
                                            </div>
                                            <select class="form-control col-md-7 ml-3" id="agent_electoral_area">
                                                <option value="">-- Select Electoral Area--</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>

                                {{-- <hr class="mt-0" style="background-color: #ccc ; height:2px;border: none;"> --}}
                                <br><br>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-info  btn-lg waves-effect waves-light btn-block"
                                                type="button" id="agent_submit_form">
                                                <span id="log_in"><b>Submit</b> </span>
                                                <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                    style="display: none" id="spinner" aria-hidden="true"></span>
                                            </button>
                                            <!-- Large modal -->
                                            {{-- <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#bs-example-modal-lg">Large Modal</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

        <!--  Modal content for the Large example -->
        <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h4 class="modal-title float-center" id="myLargeModalLabel">Agent
                            Detail Summary</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div> --}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table table-bordered m-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th colspan="2">
                                                    <h4>Agent Detail Summary</h4>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h4 class="">First Name:</h4>
                                                </td>
                                                <td><span class="text-blue h4" id="display_first_name"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="">Middle Name:</h4>
                                                </td>
                                                <td><span class="text-blue h4" id="display_middle_name"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="">Surname:</h4>
                                                </td>
                                                <td><span class=" text-blue h4" id="display_surname"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="">Gender:</h4>
                                                </td>
                                                <td><span class=" text-blue h4" id="display_gender"></span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">DOB:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_dob"></span>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="">Voter ID:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_id_number"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Phone Number 1:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_phone_number_1"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="">Phone Number 2:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_phone_number_2"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Phone Number 3:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_phone_number_3"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Educational Level:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_educational_level"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Institution Name:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_institution_name"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Year of Completion:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_completion_year"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="">Agent Region:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_agent_region"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Agent Constituency:</h4>
                                                </td>
                                                @if (session()->get('UserMandate') != 'ConstituencyLevel')
                                                    <td>
                                                        <span class=" text-blue h4"
                                                            id="display_agent_constituency"></span>
                                                    </td>
                                                @elseif(session()->get('UserMandate') == 'ConstituencyLevel')
                                                    <td>
                                                        <span class=" text-blue h4" id="display_agent_constituency"
                                                            value="{{ session()->get('Constituency') }}">{{ session()->get('Constituency') }}</span>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class=" ">Agent Electoral Area:</h4>
                                                </td>
                                                <td>
                                                    <span class=" text-blue h4" id="display_agent_electoral_area"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>

                        <div class="row">

                            <br><br><br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button type="button"
                                            class="btn btn-danger width-lg waves-effect waves-light float-left"
                                            data-dismiss="modal">
                                            <i class="mdi mdi-block-helper mr-2">
                                            </i>Cancel
                                        </button>
                                    </div>
                                    <div class="col-md-6"></div>
                                    <div class="col-md-3">
                                        <button type="button"
                                            class="btn btn-success width-lg waves-effect waves-light float-right"
                                            id="confirm_agent">
                                            <span class="agent_text"><i
                                                    class="mdi mdi-check-all mr-2"></i>Confirm</span>
                                            <span class="spinner-border spinner-border-sm mr-1 spinner-text" role="status"
                                                aria-hidden="true" style="display: none"></span>
                                        </button>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>

                        </div>



                    </div>

                </div>
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
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js">
    </script>

    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var my_mandate = "{{ session()->get('UserMandate') }}"

        var my_region = "{{ session()->get('Region') }}"

        var my_constituency = "{{ session()->get('Constituency') }}"
    </script>

    <script src="{{ asset('assets/js/add_agent.js') }}"></script>
@endsection
