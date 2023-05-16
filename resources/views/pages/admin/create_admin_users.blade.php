@extends('layouts.master')


@section('styles')
@endsection

@section('content')
    @php
        $pageTitle = 'Create User';
        $basePath = 'Users';
        $currentPath = 'Create User';
    @endphp
    @include('snippets.pageHeader')

    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <form action="#">
                                <div class="row mt-0">
                                    <div class="col-md-12">
                                        <h4 class="text-danger"> Personal Details</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-1">
                                                    <label class="text-dark">First Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="user_first_name" required
                                                        placeholder="Enter User First Name" autocomplete="off">
                                                </div>

                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Middle Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="user_middle_name"
                                                        required placeholder="Enter User Middle Name" autocomplete="off">
                                                </div>

                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Date Of Birth<span
                                                            class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="user_dob" required
                                                        placeholder="Enter User Date of Birth" autocomplete="off">
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Last Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="user_last_name" required
                                                        placeholder="Enter User Last Name" autocomplete="off">
                                                </div>

                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Voters ID<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="user_voters_id"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        maxlength="10" placeholder="Enter User Voter Id Number"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Select
                                                        Gender:<span class="text-danger">*</span></label>
                                                    <select class="form-control col-md-12" id="select_gender">
                                                        <option value="">-- Select Agent Gender --</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>

                                    <div class="col-md-12">
                                        <h4 class="text-danger"> Contact Details</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Primary Phone
                                                        Number<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="user_telephone_number"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        maxlength="10" placeholder="Enter User Primary Telephone  Number"
                                                        autocomplete="off">
                                                </div>

                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Other Phone
                                                        Number<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="user_telephone_number_3"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        maxlength="10" placeholder="Enter User Other Phone Number"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-1">
                                                    <label class="text-dark">Secondary Phone
                                                        Number<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="user_telephone_number_2"
                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                        maxlength="10" placeholder="Enter User Secondary Phone Number"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <br>

                                    <div class="col-md-12">
                                        <h4 class="text-danger"> Region Details</h4>
                                        <div class="row">
                                            <div class="form-group mb-1 agent_select col-md-6">
                                                <label class="text-dark">User Region</label>

                                                @if (session()->get('UserMandate') == 'NationalLevel')
                                                    <select class="form-control" id="agent_region">
                                                        <option value="">-- Select Region --</option>

                                                    </select>
                                                @elseif(session()->get('UserMandate') != 'NationalLevel')
                                                    <select class="form-control" id="agent_region" disabled>
                                                        <option value="{{ session()->get('Region') }}">
                                                            {{ session()->get('Region') }}</option>


                                                    </select>
                                                @endif
                                            </div>


                                            @if (session()->get('UserMandate') != 'NationalLevel')
                                                <div class="form-group mb-1 col-md-6">
                                                    <label class="text-dark" class="h4 col-md-12">User
                                                        Constituency</label>

                                                    @if (session()->get('UserMandate') != 'ConstituencyLevel')
                                                        <select class="form-control col-md-12" id="agent_constituency">
                                                            <option value="">-- Select Constituency--</option>
                                                        </select>
                                                        {{-- <div class="d-flex align-items-center ml-2">

                                                                <span class="spinner-border spinner-border-sm mr-1"
                                                                    id="constituency_spinner" role="status"
                                                                    aria-hidden="true" style="display:none"></span>
                                                            </div> --}}
                                                    @elseif(session()->get('UserMandate') == 'ConstituencyLevel')
                                                        <select class="form-control col-md-10 ml-2"
                                                            id="agent_constituency" style="background: #DCDCDC" disabled>
                                                            <option value="{{ session()->get('Constituency') }}" selected>
                                                                {{ session()->get('Constituency') }}</option>
                                                        </select>
                                                    @endif

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">


                                        <div class="form-group mb-1" style="display: none">
                                            <label class="text-dark">User Mandate Type<span
                                                    class="text-danger">*</span></label>
                                            @if (session()->get('UserMandate') == 'NationalLevel')
                                                <select class="form-control" name="" id="user_mandate">
                                                    <option value="">-- Select User Mandate Level -- </option>
                                                    {{-- <option value="NationalLevel">National Level</option> --}}
                                                    <option value="RegionalLevel" selected>Regional Level</option>
                                                    {{-- <option value="ConstituencyLevel">Constituency Level</option> --}}
                                                </select>
                                            @elseif(session()->get('UserMandate') == 'RegionalLevel')
                                                <select class="form-control" name="" id="user_mandate">
                                                    <option value="">-- Select User Mandate Level -- </option>

                                                    <option value="RegionalLevel">Regional Level</option>
                                                    <option value="ConstituencyLevel" selected>Constituency Level
                                                    </option>
                                                </select>
                                            @elseif(session()->get('UserMandate') == 'ConstituencyLevel')
                                                <select class="form-control" name="" id="user_mandate" disabled>
                                                    <option value="ConstituencyLevel">Constituency Level
                                                    </option>

                                                </select>
                                            @endif

                                        </div>



                                        <div class="form-group mb-1" style="display: none">
                                            <label class="text-dark">User Default Password<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control readOnly" type="text" id="admin_password"
                                                value="PASS1234" autocomplete="on" readonly placeholder="PASS1234"
                                                style="background: #DCDCDC" autocomplete="off">

                                        </div>
                                    </div>

                                    <div class="col-md-6">






                                        <div class="form-group mb-1" style="display: none">
                                            <label class="text-dark">User ID<span class="text-danger">*</span></label>
                                            <input class="form-control readOnly" type="text" id="admin_user_id"
                                                readonly style="background: #DCDCDC" autocomplete="off">
                                        </div>

                                        <div class="form-group mb-1" style="display: none">
                                            <label class="text-dark">Confirm Admin
                                                Password<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="confirm_admin_password"
                                                style="background: #DCDCDC" required autocomplete="on" value="PASS1234"
                                                autocomplete="off">
                                        </div>


                                    </div>
                                </div>
                                <br>

                                <div class="form-group mb-0 text-center">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-block " type="submit" id="create_admin">
                                                <span class="log_in_text"><b>Create User</b></span>
                                                <span class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                    role="status" aria-hidden="true" style="display: none"></span>
                                            </button>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>

                                </div>
                                <br><br>
                            </form>

                        </div>
                        <div class="col-md-1"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>


    {{-- <script src="//code.jquery.com/jquery.min.js"></script> --}}

    {{-- <script src="src/selectstyle.js"></script> --}}



    <script src="{{ asset('assets/js/create_admin.js') }}"></script>

    <script>
        var my_mandate = "{{ session()->get('UserMandate') }}"
        var my_region = "{{ session()->get('Region') }}"
        var my_constituency = "{{ session()->get('Constituency') }}"
    </script>
@endsection
