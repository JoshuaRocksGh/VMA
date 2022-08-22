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
            <nav class="dashboard-header " style="zoom:0.9">
                <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Basic Infornation</a>
                    <a class="nav-link " id="personal_details_tab" data-toggle="tab" href="#nav_acc_history" role="tab"
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
                <div class="tab-pane fade" id="personal_details" role="tabpanel" aria-labelledby="personal_details_tab">
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
                <div class="tab-pane fade" id="tax_information" role="tabpanel"
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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/temp/customjs/kyc_update.js') }}"></script>
@endsection
