@extends('layouts.master')

@section('content')
    @php
    $currentPath = 'Update KYC';
    $basePath = 'Account Services';
    $pageTitle = 'Update KYC';
    @endphp
    @include('snippets.pageHeader')

    <div class="">
        <div class="dashboard site-card overflow-hidden">
            <nav class="dashboard-header ">
                <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Basic Infornation</a>
                    <a class="nav-link" id="nav_acc_history_tab" data-toggle="tab" href="#nav_acc_history" role="tab"
                        aria-controls="nav_acc_history" aria-selected="false">Personal Details</a>
                    <a class="nav-link" id="residential_details_tab" data-toggle="tab" href="#residential_details"
                        role="tab" aria-controls="residential_details" aria-selected="false">Residential Details</a>
                    <a class="nav-link" id="employment_details_tab" data-toggle="tab" href="#employment_details"
                        role="tab" aria-controls="employment_details" aria-selected="false">Employment Details</a>
                    <a class="nav-link" id="tax_information_details_tab" data-toggle="tab" href="#tax_information_details"
                        role="tab" aria-controls="tax_information_details" aria-selected="false">Tax Information</a>
                </div>
            </nav>

            <div class="tab-content dashboard-body border-primary border " id="nav-tabContent">
                {{-- Basic Information Tab Pane --}}
                <div class="tab-pane fade h-100 show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    {{-- <p>Basic Information</p> --}}
                    <form id="basic_information" method="post" action="#" class="form-horizontal" autocomplete="off"
                        aria-autocomplete="off">
                        <div class="row">

                            <div class="col-md-6">
                                <label class="text-primary">Customer Number</label>
                                <input type="text" class="form-control" id="customer_number" readonly required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Title<span class="text-danger">*</span></label>
                                <input type="hidden" value="" id="title_">

                                {{-- <input type="text" class="form-control" id="title"  required> --}}
                                <select class="custom-select " id="title" required>
                                    <option selected>Select Title</option>
                                    {{-- <option value="Mr">Mr</option>
                                                                    <option value="Mrs">Mrs</option>
                                                                    <option value="Dr">Dr</option>
                                                                    <option value="Miss">Miss</option>
                                                                    <option value="Professor">Professor</option> --}}
                                </select>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class=" text-primary">Firstname<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstname" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Surname<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="surname" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Othername<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="Othername" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Telephone Number<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="telephone_number" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Email Address<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_address" required>
                                <br>
                            </div>


                            <div class="col-md-6">
                                <label class="text-primary">Date of Birth<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_birth" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Select Gender<span class="text-danger">*</span></label>
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input radio" type="radio" name="gender"
                                            id="gender_male" value="Male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    &nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input radio" type="radio" name="gender"
                                            id="gender_female" value="Female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                                {{-- <input type="" class="form-control" id="email_address"  required> --}}
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary">Proof of Address<span class="text-danger">*</span></label>
                                <input type="hidden" id="proof_of_address_">
                                <input type="file" class="form-control-file" id="proof_of_address" required><br>
                                <img class="img-fluid display_selected_id_image" id="display_selected_id_image"
                                    src="#" alt="your image" />

                                <br>
                            </div>

                        </div> <!-- end row -->
                        <button class="btn btn-primary btn-rounded waves-effect waves-light float-right" type="submit"
                            id="basic_information_next_btn">Next<i class="fe-arrow-right"></i> </button>

                    </form>
                </div>

                {{-- Perosnal Details --}}
                <div class="tab-pane fade" id="nav_acc_history" role="tabpanel" aria-labelledby="nav_acc_history_tab">
                    <form id="personal_details" method="post" action="#" class="form-horizontal">
                        <div class="row">


                            <div class="col-md-6">
                                <label class="text-primary">Marital Status<span class="text-danger">*</span></label>
                                {{-- <input type="text" class="form-control" id="marital_status"  required> --}}
                                <select class="custom-select " id="marital_status" required>
                                    <option selected>Select Marital Status</option>
                                    {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                </select>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Number of Children<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="number_of_children" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Number of Dependents<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="number_of_dependents" required>
                                <br>
                            </div>
                            <div class="col-md-6">
                                <label class="text-primary">Nationality<span class="text-danger">*</span></label>
                                {{-- <input type="text" class="form-control" id="nationality"  required> --}}
                                <select class="custom-select " id="nationality" required>
                                    <option selected>Nationality</option>
                                    {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                </select>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">ID Type<span class="text-danger">*</span></label>
                                <select class="custom-select " id="id_type" required>
                                    <option selected>ID Type</option>
                                    {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                </select>
                                {{-- <input type="text" class="form-control"  required> --}}
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">ID Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="id_number" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Date of Issue<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_issue" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Date of Expiry<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_of_expiry" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Mother Maiden Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="mother_maiden_name" required>
                                <br>
                            </div>

                            {{-- <div class="col-md-12">
                                <h5>Next of Kin Information</h5>
                            </div> --}}

                            <div class="col-md-6">
                                <label class="text-primary">Next of Kin Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="next_of_kin_name" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Next of Kin Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="next_of_kin_address" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Next of Kin Telephone<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="next_of_kin_telephone" required>
                                <br>
                            </div>


                        </div>
                        <!-- end row -->
                        <ul class="list-inline wizard mb-0">
                            <li class=" list-inline-item"><button
                                    class="btn btn-secondary btn-rounded waves-effect waves-light" type="button"
                                    id="personal_details_back_btn">Back</button></li>

                            <li class="list-inline-item float-right"><button
                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                    id="personal_details_next_btn" type="submit">Next<i
                                        class="fe-arrow-right"></i></button></li>
                        </ul>
                    </form>
                </div>

                {{-- Residential Details --}}
                <div class="tab-pane fade" id="residential_details" role="tabpanel"
                    aria-labelledby="residential_details_tab">
                    <form id="residential_details" method="post" action="#" class="form-horizontal">
                        <div class="row">


                            <div class="col-md-6">
                                <label class="text-primary">Country of Residence<span class="text-danger">*</span></label>
                                <select class="custom-select " id="country_of_residence" required>
                                    <option selected>Select Country</option>
                                    {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                </select>
                                {{-- <input type="text" class="form-control"   required> --}}
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Number of years at
                                    residence<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="years_at_residence" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Building Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="building_name" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Town<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="town" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Residential Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="residential_address" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Postal Address<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="postal_address" required>
                                <br>
                            </div>
                        </div>
                        <!-- end row -->
                        <ul class="list-inline wizard mb-0">
                            <li class=" list-inline-item"><button
                                    class="btn btn-secondary btn-rounded waves-effect waves-light" type="button"
                                    id="residential_details_back_btn">Back</button>
                            </li>

                            <li class="list-inline-item float-right"><button
                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                    id="residential_details_next_btn" type="submit">Next<i
                                        class="fe-arrow-right"></i></button></li>
                        </ul>
                    </form>
                </div>

                {{-- Employment Details --}}
                <div class="tab-pane fade" id="employment_details" role="tabpanel"
                    aria-labelledby="employment_details_tab">
                    <form id="employment_details" method="post" action="#" class="form-horizontal">
                        <div class="row">

                            <div class="col-md-6">
                                <label class="text-primary">Employment Type<span class="text-danger">*</span></label>
                                <select class="custom-select " id="employment_type" required>
                                    <option selected>Select Employment Type</option>
                                    {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                </select>
                                {{-- <input type="text" class="form-control"   required> --}}
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Employee Number</label>
                                <input type="number" class="form-control" id="employee_number" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Employee Code</label>
                                <input type="text" class="form-control" id="employee_code" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Department</label>
                                <input type="text" class="form-control" id="department" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Date of Employement</label>
                                <input type="date" class="form-control" id="date_of_employment" required>
                                <br>
                            </div>

                            {{-- <div class="col-md-6">
                                                                <label class="form-label">Postal Address</label>
                                                                <input type="text" class="form-control" id="postal_address"  required>
                                                                <br>
                                                            </div> --}}
                        </div>
                        <ul class="list-inline wizard mb-0">
                            <li class=" list-inline-item"><button
                                    class="btn btn-secondary btn-rounded waves-effect waves-light" type="button"
                                    id="employment_details_back_btn">Back</button></li>

                            <li class="list-inline-item float-right"><button
                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                    id="employment_details_next_btn" type="submit">Next<i
                                        class="fe-arrow-right"></i></button></li>
                        </ul>
                        <!-- end row -->
                    </form>
                </div>

                {{-- Tax Information --}}
                <div class="tab-pane fade" id="tax_information_details" role="tabpanel"
                    aria-labelledby="tax_information_details_tab">
                    <form id="tax_information" method="post" action="#" class="form-horizontal">
                        <div class="row">


                            <div class="col-md-6">
                                <label class="text-primary">Tax Identification
                                    Number</label>
                                <input type="text" class="form-control" id="tax_identification_number" required>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">Last Update Date</label>
                                <input type="Date" class="form-control" id="last_update_date" required>
                                <br>
                            </div>



                            <div class="col-md-6">
                                <label class="text-primary">Are you a citizen of US?<span
                                        class="text-danger">*</span></label>
                                {{-- <input type="text" class="form-control" id="city"  required> --}}
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input radio" type="radio" name="citizen_of_us"
                                            id="citizen_yes" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    &nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input radio" type="radio" name="citizen_of_us"
                                            id="citizen_no" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <div class="col-md-6">
                                <label class="text-primary">US Resident<span class="text-danger">*</span></label>
                                {{-- <input type="text" class="form-control" id="town"  required> --}}
                                <div class="form-group">

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input radio" type="radio" name="onetime"
                                            id="resident_yes" value="Yes">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    &nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input radio" type="radio" name="onetime"
                                            id="resident_no" value="No">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                                <br>
                            </div>


                        </div>
                        <ul class="list-inline wizard mb-0">
                            <li class=" list-inline-item"><button
                                    class="btn btn-secondary btn-rounded waves-effect waves-light" type="button"
                                    id="tax_information_back_btn">Back</button></li>

                            <li class="list-inline-item float-right">
                                {{-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#bs-example-modal-lg" type="submit" id="tax_information_next_btn">Submit</button> --}}
                                <button class="btn btn-primary btn-rounded waves-effect waves-light" data-toggle="modal"
                                    data-target="#bs-example-modal-lg" type="submit"
                                    id="tax_information_next_btn">Submit</button>

                                {{-- <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#scrollable-modal" type="submit" id="tax_information_next_btn">Submit</button> --}}

                                {{-- <button class="btn btn-primary btn-rounded waves-effect waves-light" id="tax_information_next_btn" type="submit">Next</button> --}}
                            </li>

                        </ul>
                        <!-- end row -->
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class=" ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-9">
                                    <h3 class="text-primary">KYC Update
                                        <button type="button" class="btn btn-info btn-sm float-right  mod-open"
                                            data-toggle="modal" data-target="#centermodal"> <span
                                                class="fe-info mr-1"></span> info</button>
                                    </h3>
                                    <hr>
                                </div>

                                <div class="col-md-2"></div>
                            </div> --}}


                            <div class="row">
                                <div class="col-md-2"></div>

                                <!-- Center modal content -->
                                <div class="modal fade" id="centermodal" tabindex="-1" role="dialog"
                                    aria-hidden="true" style="zoom: 0.9;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-primary" id="myCenterModalLabel">KYC Update
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">X</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class=" ">
                                                    <div class="btn-group d-block mb-2">
                                                        <p class="card-text">To successfully Update your KYC, you need to
                                                            follow the processes below.</p>
                                                        <br>
                                                        <h4 class="card-title" style="color: #0561ad">
                                                            KYC Update Process
                                                        </h4>

                                                    </div>
                                                    <div class="mail-list mt-3">
                                                        <a href="#" class="list-group-item border-0 font-14"><i
                                                                class="mdi mdi-adjust font-18 align-middle mr-2"
                                                                style="color: #0561ad"></i>BASIC INFORMATION</a>
                                                        <a href="#" class="list-group-item border-0 font-14"><i
                                                                class="mdi mdi-adjust font-18 align-middle mr-2"
                                                                style="color: #0561ad"></i>PERSONAL DETAILS</a>
                                                        <a href="#" class="list-group-item border-0 font-14"><i
                                                                class="mdi mdi-adjust font-18 align-middle mr-2"
                                                                style="color: #0561ad"></i>RESIDENT ADDRESS</a>
                                                        <a href="#" class="list-group-item border-0 font-14"><i
                                                                class="mdi mdi-adjust font-18 align-middle mr-2"
                                                                style="color: #0561ad"></i>EMPLOYMENT DETAILS</a>
                                                        <a href="#" class="list-group-item border-0 font-14"><i
                                                                class="mdi mdi-adjust font-18 align-middle mr-2"
                                                                style="color: #0561ad"></i>OTHER PERSONAL DETAILS</a>
                                                        <a href="#" class="list-group-item border-0 font-14"><i
                                                                class="mdi mdi-adjust font-18 align-middle mr-2"
                                                                style="color: #0561ad"></i>TAX INFORMATION</a>
                                                    </div>

                                                    {{-- <br>

                                                <h4 class="card-title" style="color: #0561ad">Requirements</h4>
                                                <div class="mail-list mt-3">
                                                    <a href="#" class="list-group-item border-0 font-14"><i class="mdi mdi-account-check-outline font-18 align-middle mr-2" style="color: #0561ad"></i>Selfie</a>
                                                    <a href="#" class="list-group-item border-0 font-14"><i class="mdi mdi-card-account-details-outline font-18 align-middle mr-2" style="color: #0561ad"></i>ID (Driver Licence SSNIT/Passport/Voter card +
                                                        Birth Certificate)</a>
                                                    <a href="#" class="list-group-item border-0 font-14"><i class="mdi mdi-map-marker-outline font-18 align-middle mr-2" style="color: #0561ad"></i>Residential Address</a>
                                                  </div>

                                                <br>

                                                <h5 class="card-title" ><i class="mdi mdi-alert-circle mdi-18px" style="color: #0561ad"></i>&nbsp; Must be 18 years and above</h5> --}}


                                                </div>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                {{-- page title --}}

                            </div>

                            <div class="row">

                                <div class="col-md-1"></div>

                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body">

                                            <div id="rootwizard">
                                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item" data-target-form="#basic_information"
                                                        id="basic_information_tab">
                                                        <a href="#first" data-toggle="tab"
                                                            class="nav-link rounded-0 pt-2 pb-2">
                                                            {{-- <i class="mdi mdi-account-circle mr-1"></i> --}}
                                                            <span class="d-none d-sm-inline">Basic Information</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-target-form="#personal_details"
                                                        id="personal_details_tab">
                                                        <a href="#second" data-toggle="tab"
                                                            class="nav-link rounded-0 pt-2 pb-2">
                                                            {{-- <i class="mdi mdi-face-profile mr-1"></i> --}}
                                                            <span class="d-none d-sm-inline">Personal Details</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-target-form="#residential_details"
                                                        id="residential_details_tab">
                                                        <a href="#third" data-toggle="tab"
                                                            class="nav-link rounded-0 pt-2 pb-2">
                                                            {{-- <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i> --}}
                                                            <span class="d-none d-sm-inline">Residential Details</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-target-form="#employment_details"
                                                        id="employment_details_tab">
                                                        <a href="#fourth" data-toggle="tab"
                                                            class="nav-link rounded-0 pt-2 pb-2">
                                                            {{-- <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i> --}}
                                                            <span class="d-none d-sm-inline">Employment Details</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" data-target-form="#tax_information"
                                                        id="tax_information_tab">
                                                        <a href="#sixth" data-toggle="tab"
                                                            class="nav-link rounded-0 pt-2 pb-2">
                                                            {{-- <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i> --}}
                                                            <span class="d-none d-sm-inline">Tax Information</span>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content mb-0 b-0 pt-0">

                                                    <div class="tab-pane" id="first">
                                                        <form id="basic_information" method="post" action="#"
                                                            class="form-horizontal" autocomplete="off"
                                                            aria-autocomplete="off">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5>Basic Information</h5>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Customer Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="customer_number" readonly required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Title<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="hidden" value="" id="title_">

                                                                    {{-- <input type="text" class="form-control" id="title"  required> --}}
                                                                    <select class="custom-select " id="title"
                                                                        required>
                                                                        <option selected>Select Title</option>
                                                                        {{-- <option value="Mr">Mr</option>
                                                                    <option value="Mrs">Mrs</option>
                                                                    <option value="Dr">Dr</option>
                                                                    <option value="Miss">Miss</option>
                                                                    <option value="Professor">Professor</option> --}}
                                                                    </select>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Firstname<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="firstname" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Surname<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="surname" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Othername<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="Othername" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Telephone Number<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" class="form-control"
                                                                        id="telephone_number" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Email Address<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="email" class="form-control"
                                                                        id="email_address" required>
                                                                    <br>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <label class="form-label">Date of Birth<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="date" class="form-control"
                                                                        id="date_of_birth" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Select Gender<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="form-group">

                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input radio"
                                                                                type="radio" name="gender"
                                                                                id="gender_male" value="Male">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio1">Male</label>
                                                                        </div>
                                                                        &nbsp;&nbsp;
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input radio"
                                                                                type="radio" name="gender"
                                                                                id="gender_female" value="Female">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio2">Female</label>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <input type="" class="form-control" id="email_address"  required> --}}
                                                                    <br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Proof of Address<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="hidden" id="proof_of_address_">
                                                                    <input type="file" class="form-control-file"
                                                                        id="proof_of_address" required><br>
                                                                    <img class="img-fluid display_selected_id_image"
                                                                        id="display_selected_id_image" src="#"
                                                                        alt="your image" />

                                                                    <br>
                                                                </div>

                                                            </div> <!-- end row -->
                                                            <button
                                                                class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                type="submit" id="basic_information_next_btn">Next<i
                                                                    class="fe-arrow-right"></i> </button>

                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="second">
                                                        <form id="personal_details" method="post" action="#"
                                                            class="form-horizontal">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5>Personal Details</h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Marital Status<span
                                                                            class="text-danger">*</span></label>
                                                                    {{-- <input type="text" class="form-control" id="marital_status"  required> --}}
                                                                    <select class="custom-select " id="marital_status"
                                                                        required>
                                                                        <option selected>Select Marital Status</option>
                                                                        {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                                                    </select>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Number of Children<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" class="form-control"
                                                                        id="number_of_children" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Number of Dependents<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="number" class="form-control"
                                                                        id="number_of_dependents" required>
                                                                    <br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Nationality<span
                                                                            class="text-danger">*</span></label>
                                                                    {{-- <input type="text" class="form-control" id="nationality"  required> --}}
                                                                    <select class="custom-select " id="nationality"
                                                                        required>
                                                                        <option selected>Nationality</option>
                                                                        {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                                                    </select>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">ID Type<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="custom-select " id="id_type"
                                                                        required>
                                                                        <option selected>ID Type</option>
                                                                        {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                                                    </select>
                                                                    {{-- <input type="text" class="form-control"  required> --}}
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">ID Number<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="id_number" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Date of Issue<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="date" class="form-control"
                                                                        id="date_of_issue" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Date of Expiry<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="date" class="form-control"
                                                                        id="date_of_expiry" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Mother Maiden Name<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="mother_maiden_name" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <h5>Next of Kin Information</h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Next of Kin Name<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="next_of_kin_name" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Next of Kin Address<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="next_of_kin_address" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Next of Kin Telephone<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="next_of_kin_telephone" required>
                                                                    <br>
                                                                </div>


                                                            </div>
                                                            <!-- end row -->
                                                            <ul class="list-inline wizard mb-0">
                                                                <li class=" list-inline-item"><button
                                                                        class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                        type="button"
                                                                        id="personal_details_back_btn">Back</button></li>

                                                                <li class="list-inline-item float-right"><button
                                                                        class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                        id="personal_details_next_btn"
                                                                        type="submit">Next<i
                                                                            class="fe-arrow-right"></i></button></li>
                                                            </ul>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="third">
                                                        <form id="residential_details" method="post" action="#"
                                                            class="form-horizontal">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5>Residential Address Details</h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Country of Residence<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="custom-select "
                                                                        id="country_of_residence" required>
                                                                        <option selected>Select Country</option>
                                                                        {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                                                    </select>
                                                                    {{-- <input type="text" class="form-control"   required> --}}
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Number of years at
                                                                        residence<span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="years_at_residence" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Building Name<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="building_name" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Town<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="town" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Residential Address<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="residential_address" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Postal Address<span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        id="postal_address" required>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                            <ul class="list-inline wizard mb-0">
                                                                <li class=" list-inline-item"><button
                                                                        class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                        type="button"
                                                                        id="residential_details_back_btn">Back</button>
                                                                </li>

                                                                <li class="list-inline-item float-right"><button
                                                                        class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                        id="residential_details_next_btn"
                                                                        type="submit">Next<i
                                                                            class="fe-arrow-right"></i></button></li>
                                                            </ul>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="fourth">
                                                        <form id="employment_details" method="post" action="#"
                                                            class="form-horizontal">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5>Employment Details</h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Employment Type<span
                                                                            class="text-danger">*</span></label>
                                                                    <select class="custom-select " id="employment_type"
                                                                        required>
                                                                        <option selected>Select Employment Type</option>
                                                                        {{-- <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                    <option value="Widowed">Widowed</option> --}}

                                                                    </select>
                                                                    {{-- <input type="text" class="form-control"   required> --}}
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Employee Number</label>
                                                                    <input type="number" class="form-control"
                                                                        id="employee_number" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Employee Code</label>
                                                                    <input type="text" class="form-control"
                                                                        id="employee_code" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Department</label>
                                                                    <input type="text" class="form-control"
                                                                        id="department" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Date of Employement</label>
                                                                    <input type="date" class="form-control"
                                                                        id="date_of_employment" required>
                                                                    <br>
                                                                </div>

                                                                {{-- <div class="col-md-6">
                                                                <label class="form-label">Postal Address</label>
                                                                <input type="text" class="form-control" id="postal_address"  required>
                                                                <br>
                                                            </div> --}}
                                                            </div>
                                                            <ul class="list-inline wizard mb-0">
                                                                <li class=" list-inline-item"><button
                                                                        class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                        type="button"
                                                                        id="employment_details_back_btn">Back</button></li>

                                                                <li class="list-inline-item float-right"><button
                                                                        class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                        id="employment_details_next_btn"
                                                                        type="submit">Next<i
                                                                            class="fe-arrow-right"></i></button></li>
                                                            </ul>
                                                            <!-- end row -->
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="sixth">
                                                        <form id="tax_information" method="post" action="#"
                                                            class="form-horizontal">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h5>Tax Information</h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Tax Identification
                                                                        Number</label>
                                                                    <input type="text" class="form-control"
                                                                        id="tax_identification_number" required>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">Last Update Date</label>
                                                                    <input type="Date" class="form-control"
                                                                        id="last_update_date" required>
                                                                    <br>
                                                                </div>



                                                                <div class="col-md-6">
                                                                    <label class="form-label">Are you a citizen of US?<span
                                                                            class="text-danger">*</span></label>
                                                                    {{-- <input type="text" class="form-control" id="city"  required> --}}
                                                                    <div class="form-group">

                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input radio"
                                                                                type="radio" name="citizen_of_us"
                                                                                id="citizen_yes" value="Yes">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio1">Yes</label>
                                                                        </div>
                                                                        &nbsp;&nbsp;
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input radio"
                                                                                type="radio" name="citizen_of_us"
                                                                                id="citizen_no" value="No">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio2">No</label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label class="form-label">US Resident<span
                                                                            class="text-danger">*</span></label>
                                                                    {{-- <input type="text" class="form-control" id="town"  required> --}}
                                                                    <div class="form-group">

                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input radio"
                                                                                type="radio" name="onetime"
                                                                                id="resident_yes" value="Yes">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio1">Yes</label>
                                                                        </div>
                                                                        &nbsp;&nbsp;
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input radio"
                                                                                type="radio" name="onetime"
                                                                                id="resident_no" value="No">
                                                                            <label class="form-check-label"
                                                                                for="inlineRadio2">No</label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                </div>


                                                            </div>
                                                            <ul class="list-inline wizard mb-0">
                                                                <li class=" list-inline-item"><button
                                                                        class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                                        type="button"
                                                                        id="tax_information_back_btn">Back</button></li>

                                                                <li class="list-inline-item float-right">
                                                                    {{-- <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#bs-example-modal-lg" type="submit" id="tax_information_next_btn">Submit</button> --}}
                                                                    <button
                                                                        class="btn btn-primary btn-rounded waves-effect waves-light"
                                                                        data-toggle="modal"
                                                                        data-target="#bs-example-modal-lg" type="submit"
                                                                        id="tax_information_next_btn">Submit</button>

                                                                    {{-- <button  type="button" class="btn btn-secondary" data-toggle="modal" data-target="#scrollable-modal" type="submit" id="tax_information_next_btn">Submit</button> --}}

                                                                    {{-- <button class="btn btn-primary btn-rounded waves-effect waves-light" id="tax_information_next_btn" type="submit">Next</button> --}}
                                                                </li>

                                                            </ul>
                                                            <!-- end row -->
                                                        </form>
                                                    </div>

                                                    {{-- <ul class="list-inline wizard mb-0">
                                                    <li class="previous list-inline-item"><a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                                    </li>
                                                    <li class="next list-inline-item float-right"><a href="javascript: void(0);" class="btn btn-secondary">Next</a></li>
                                                </ul> --}}

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #rootwizard-->

                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div> <!-- end col -->

                                <div class="col-md-1"></div>



                                <!--  Modal content for the Large example -->
                                {{-- <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">KYC Summary</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Customer Number:</label>
                                                            <span class="col-md-6" id="display_customer_number"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Firstname:</label>
                                                            <span class="col-md-6" id="display_firstname "></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Othername:</label>
                                                            <span class="col-md-6" id="display_othername"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Email Address:</label>
                                                            <span class="col-md-6" id="display_email_address"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Select Gender:</label>
                                                            <span class="col-md-6" id="display_gender_male"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Number of Children:</label>
                                                            <span class="col-md-6" id="display_number_of_children"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Nationality:</label>
                                                            <span class="col-md-6" id="display_nationality"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">ID Number:</label>
                                                            <span class="col-md-6" id="display_id_number"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Date of Expiry:</label>
                                                            <span class="col-md-6" id="display_date_of_expiry"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Next of Kin Name:</label>
                                                            <span class="col-md-6" id="display_next_of_kin_name"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Next of Kin
                                                                Telephone:</label>
                                                            <span class="col-md-6"
                                                                id="display_next_of_kin_telephone"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Number of years at
                                                                residence:</label>
                                                            <span class="col-md-6" id="display_years_at_residence"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Town:</label>
                                                            <span class="col-md-6" id="display_town"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Postal Address:</label>
                                                            <span class="col-md-6" id="display_postal_address"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Employee Number:</label>
                                                            <span class="col-md-6" id="display_employee_number"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Department:</label>
                                                            <span class="col-md-6" id="display_department"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Last Update Date:</label>
                                                            <span class="col-md-6" id="display_last_update_date"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Are you a citizen of
                                                                US?</label>
                                                            <span class="col-md-6" id="display_citizen_of_us"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Proof of Address:
                                                                <img class="img-fluid display_selected_id_image"
                                                                    id="display_selected_id_image" src="#"
                                                                    alt="your image" />
                                                            </label>
                                                            <span class="col-md-6" id="display_proof_of_address"></span>



                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Title:</label>
                                                            <span class="col-md-6" id="display_title "></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Surname:</label>
                                                            <span class="col-md-6" id="display_surname"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Telephone Number:</label>
                                                            <span class="col-md-6" id="display_telephone_number"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Date of Birth:</label>
                                                            <span class="col-md-6" id="display_date_of_birth"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Marital Status:</label>
                                                            <span class="col-md-6" id="display_marital_status"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Number of
                                                                Dependents:</label>
                                                            <span class="col-md-6"
                                                                id="display_number_of_dependents"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">ID Type:</label>
                                                            <span class="col-md-6" id="display_id_type"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Date of Issue:</label>
                                                            <span class="col-md-6" id="display_date_of_issue"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Mother Maiden Name:</label>
                                                            <span class="col-md-6" id="display_mother_maiden_name"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Next of Kin Address:</label>
                                                            <span class="col-md-6"
                                                                id="display_next_of_kin_address"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Country of
                                                                Residence:</label>
                                                            <span class="col-md-6"
                                                                id="display_country_of_residence"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Building Name:</label>
                                                            <span class="col-md-6" id="display_building_name"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Residential Address:</label>
                                                            <span class="col-md-6"
                                                                id="display_residential_address"></span>

                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Employment Type:</label>
                                                            <span class="col-md-6" id="display_employment_type"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Employee Code:</label>
                                                            <span class="col-md-6" id="display_employee_code"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Date of
                                                                Employement:</label>
                                                            <span class="col-md-6"
                                                                id="display_date_of_employment"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">Tax Identification
                                                                Number:</label>
                                                            <span class="col-md-6"
                                                                id="display_tax_identification_number"></span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="form-label col-md-6">US Resident:</label>

                                                            <span class="col-md-6" id="display_us_resident"></span>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"
                                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                                    data-dismiss="modal" id="kyc_confirm_btn">Confirm</button>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/customjs/kyc_update.js') }}"></script>
@endsection
