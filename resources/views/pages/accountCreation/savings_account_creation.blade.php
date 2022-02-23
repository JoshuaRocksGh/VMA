@extends('layouts.app')




@section('content')


@include("snippets.top_navbar", ['page_title' => 'ACCOUNT OPENING'])

<div class="container-fluid">
    <div class="row pt-5 ">

        <div class="col-md-1">
            <br>
            <a href="{{ url()->previous() }}" type="button"
                class="btn btn-soft-blue btn-sm waves-effect waves-light float-left"><i
                    class="mdi mdi-reply-all-outline"></i>&nbsp;Go
                Back</a>

        </div>

        <div class="col-md-10">



            <div class="card card-background-image">

                <div class="card-body">


                    <!-- Center modal content -->
                    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" id="myCenterModalLabel">Acquiring a Savings
                                        Account</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">X</button>
                                </div>
                                <div class="modal-body">
                                    <div class=" ">
                                        <div class="btn-group d-block mb-2">
                                            <p class="card-text">To successfully create an account
                                                You need to follow the KYC collected process</p>
                                            <br>
                                            <h4 class="card-title" style="color: #0561ad">
                                                Process
                                            </h4>

                                        </div>
                                        <div class="mail-list mt-3">
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-adjust font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>PERSONAL DETAILS</span>
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-adjust font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>ID DETAILS</span>
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-adjust font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>CONTACT DETAILS</span>
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-adjust font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>BIO DETAILS</span>
                                        </div>

                                        <br>
                                        <h4 class="card-title" style="color: #0561ad">Requirements</h4>
                                        <div class="mail-list mt-3">
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-account-check-outline font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>Selfie</span>
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-card-account-details-outline font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>ID (Driver Licence SSNIT/Passport/Voter
                                                card +
                                                Birth Certificate)</span>
                                            <span href="#" class="list-group-item border-0 font-14"><i
                                                    class="mdi mdi-map-marker-outline font-18 align-middle mr-2"
                                                    style="color: #0561ad"></i>Residential Address</span>
                                        </div>

                                        <br>

                                        <h5 class="card-title"><i class="mdi mdi-alert-circle mdi-18px"
                                                style="color: #0561ad"></i>&nbsp; Must be 18 years and above</h5>


                                    </div>

                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->



                    <h3 class="sub-header font-18 purple-color">
                        <div class="row">
                            <div class="col-md-4">
                                SAVINGS ACCOUNT OPENING
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-info btn-sm text-right mod-open"
                                    data-toggle="modal" data-target="#centermodal"> <span class="fe-info mr-1"></span>
                                    info</button>
                            </div>
                        </div>



                    </h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <br><br>
                            <div class="nav nav-pills flex-column navtab-bg nav-pills-tab text-center" id="v-pills-tab"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active show py-2" id="custom-v-pills-personal-details-tab"
                                    data-toggle="pill" href="#custom-v-pills-personal-details" role="tab"
                                    aria-controls="custom-v-pills-personal-details" aria-selected="true">

                                    Personal Details
                                </a>
                                <a class="nav-link mt-2 py-2" id="custom-v-pills-contact-and-id-details-tab"
                                    data-toggle="pill" href="#custom-v-pills-contact-and-id-details" role="tab"
                                    aria-controls="custom-v-pills-contact-and-id-details" aria-selected="false">

                                    Contact & ID Details</a>
                                <a class="nav-link mt-2 py-2" id="custom-v-pills-bio-details-tab" data-toggle="pill"
                                    href="#custom-v-pills-bio-details" role="tab"
                                    aria-controls="custom-v-pills-bio-details" aria-selected="false">

                                    Bio Details</a>
                                <a class="nav-link mt-2 py-2" id="summary-tab" data-toggle="pill"
                                    href="#summary-v-pills-payment" role="tab"
                                    aria-controls="custom-v-pills-payment-payment" aria-selected="false">

                                    Summary</a>
                            </div>

                        </div> <!-- end col-->
                        <div class="col-md-8">

                            <div class="tab-content p-3">
                                <div class="tab-pane fade active show" id="custom-v-pills-personal-details"
                                    role="tabpanel" aria-labelledby="custom-v-pills-personal-details-tab">
                                    <div>

                                        <h5 class="mb-3 mt-0 bg-light p-2">Personal Details</h5>

                                        <form action="" id="personal_details" autocomplete="off"
                                            aria-autocomplete="off">
                                            <div class="___class_+?52___">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b for="billing-phone">Title</b>

                                                        <select class="custom-select title" id="title" required>
                                                            <option value="" disabled selected>Title</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b for="billing-phone">Surname</b>
                                                        <input class="form-control" type="text" placeholder="Surname"
                                                            id="surname" required />
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <b for="billing-phone">First Name</b>
                                                    <input class="form-control" type="text" placeholder="Firstname"
                                                        id="firstname" required />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <b for="billing-phone">Other Name</b>
                                                    <input class="form-control" type="text" placeholder="Othername"
                                                        id="othername" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="billing-phone">Gender</label>
                                                    <div class="row" id="select_gender">
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <div class="radio form-check-inline radio-primary">
                                                                    <input type="radio" id="radio1" value="M"
                                                                        name="radioInline" required>
                                                                    <label for="inlineRadio1">Male </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <div class="radio form-check-inline radio-primary">
                                                                    <input type="radio" id="radio2" value="F"
                                                                        name="radioInline" required>
                                                                    <label for="inlineRadio2">Female </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="billing-address">Date of Birth</label>

                                                    <div class="form-group mb-3">
                                                        <input class="form-control" id="DOB" type="date" name="date"
                                                            required>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="billing-town-city">Place of Birth</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Enter your place of birth" id="birth_place"
                                                        required />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nationality</label>


                                                    <select data-toggle="select2" title="Country"
                                                        class="form-control country select-picker" id="country"
                                                        required>
                                                        <option value="" disabled selected>Select Country</option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Residence Status</label>


                                                    <select data-toggle="select2" title="Residence"
                                                        class="form-control country select-picker" id="residence_status"
                                                        required>
                                                        <option value="" selected> -- Select --</option>


                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-12">

                                                <div class="col-md-12">
                                                    <div class="text-sm-right mt-2 mt-sm-0">

                                                        <button class="btn btn-primary btn-rounded float-right"
                                                            type="submit" id="submit1">
                                                            Next
                                                            <i class="fe-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-v-pills-contact-and-id-details" role="tabpanel"
                                    aria-labelledby="custom-v-pills-contact-and-id-details-tab">
                                    <div>
                                        <h5 class="mb-3 mt-1 bg-light p-2">Contact Details</h5>

                                        <form action="" id="contact_id_details" autocomplete="off"
                                            aria-autocomplete="off">
                                            <div class="___class_+?88___">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b>Mobile Number</b>
                                                        <input class="form-control" type="" placeholder="Mobile number"
                                                            id="mobile_number"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b>Email</b>
                                                        <input class="form-control" type="email" placeholder="Email"
                                                            id="email" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b>City</b>
                                                        <input class="form-control" type="text" placeholder="City"
                                                            id="city" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b>Town</b>
                                                        <input class="form-control" type="text" placeholder="Town"
                                                            id="town" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b>Residential Address</b>
                                                        <input class="form-control" type="text"
                                                            placeholder="Home Address" id="residential_address"
                                                            required />
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end row-->
                                            <br />

                                            <h5 class="mb-3 mt-1 bg-light p-2">ID Details</h5>


                                            <div class="___class_+?105___">
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <div class="
                                                            form-group">
                                                            <b>Tax Identification Number</b></label>
                                                            <input class="form-control" type="text"
                                                                placeholder="Tin Number" id="tin_number" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <b>ID Type</b>
                                                        <select class="custom-select" id="id_type" required>
                                                            <option value="">-- Select ID Type -- </option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b>ID Number</b></label>
                                                        <input class="form-control" type="text" placeholder="ID Number"
                                                            id="id_number" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b for="billing-last-name">Date of Issue</b>
                                                        <input class="form-control" type="date"
                                                            placeholder="Date of Issue" id="issue_date" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <b for="billing-last-name">Date of Expiry</b>
                                                        <input class="form-control" type="date" placeholder=" "
                                                            id="expiry_date" required />
                                                    </div>
                                                </div>


                                                <div class="form-group mb-3">
                                                    <h4 for="example-fileinput">Upload Image of Selected ID</h4>
                                                    <input type="file" id="image_upload" class="form-control-file"
                                                        required><br>
                                                    <input type="hidden" id="image_upload_">
                                                    <img class="img-fluid display_selected_id_image text-center w-50 h-50"
                                                        id="display_selected_id_image" src="#" alt="your image" />
                                                </div>


                                            </div>
                                            <!-- end row-->


                                            <div class="row mt-4">

                                                <div class="col-xl-7">

                                                </div> <!-- end col -->



                                                <div class="col-xl-5">
                                                    <button type="button" class="btn btn-secondary btn-rounded"
                                                        data-toggle="pill" href="#custom-v-pills-personal-details"
                                                        role="tab" aria-controls="custom-v-pills-personal-details">
                                                        <i class="fe-arrow-left"></i> Previous </button>

                                                    <button class="btn btn-primary btn-rounded float-right"
                                                        type="submit" id="submit2">
                                                        Next <i class="fe-arrow-right"></i>
                                                    </button>

                                                </div> <!-- end col -->

                                            </div> <!-- end row -->

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-v-pills-bio-details" role="tabpanel"
                                    aria-labelledby="custom-v-pills-bio-details-tab">
                                    <div>
                                        <h5 class="mb-3 mt-1 bg-light p-2">Bio Details</h5>


                                        <!-- Passport Picture Upload-->
                                        <form action="" id="bio_details" autocomplete="off" aria-autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-6 form-group mb-3">
                                                    <h4 for="example-fileinput">Picture(Passport)</h4>
                                                    <input type="file" id="passport_picture" class="form-control-file"
                                                        required><br>
                                                    <input type="hidden" id="passport_picture_">
                                                    <img src="{{asset('assets/images/placeholders/placeholder_avatar.webp')}}"
                                                        class="img-fluid img_display display_passport_picture previewImg1 w-50 h-50"
                                                        id="previewImg1" style="display:none;" alt="your image" />
                                                </div>

                                                <div class="col-md-6 form-group mb-3">
                                                    <h4 for="example-fileinput">Picture of a signed paper</h4>
                                                    <input type="file" id="selfie_upload" class="form-control-file"
                                                        required><br>
                                                    <input type="hidden" id="selfie_upload_">
                                                    <img class="img-fluid img_display display_selfie previewImg2 w-50 h-50"
                                                        id="previewImg2" src="#" alt="your image" />
                                                </div>
                                                <div class="col-md-6 form-group mb-3">
                                                    <h4 for="example-fileinput">Proof of address</h4>
                                                    <input type="file" id="proof_of_address" class="form-control-file"
                                                        required><br>
                                                    <input type="hidden" id="proof_of_address_">
                                                    <img class="img-fluid img_display display_proof_of_address previewImg3 w-50 h-50"
                                                        id="previewImg3" style="display:none" src="#"
                                                        alt="your image" />
                                                </div>


                                            </div>

                                            <!-- end Cash on Delivery box-->
                                            <ul class="list-inline wizard mb-0">
                                                <li class=" list-inline-item"><button type="button"
                                                        class="btn btn-secondary btn-rounded" id="bio-previous-btn"
                                                        data-toggle="pill" href="#custom-v-pills-contact-and-id-details"
                                                        role="tab"
                                                        aria-controls="custom-v-pills-contact-and-id-details">
                                                        <i class="fe-arrow-left"></i> Previous </button></li>

                                                <li class="list-inline-item float-right"><button
                                                        class="btn btn-primary btn-rounded float-right" type="submit"
                                                        id="final_submit">
                                                        Next <i class="fe-arrow-right"></i>
                                                    </button></li>
                                            </ul>

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="summary-v-pills-payment" role="tabpanel"
                                    aria-labelledby="custom-v-pills-bio-details-tab">
                                    <div>
                                        <h5 class="mb-3 mt-1 bg-light p-2">Personal Details</h5>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">Title:</span> </p>
                                                    <span class="font-weight-semibold col-6" id="display_title"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">Surname:</span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_surname"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">First
                                                            Name:</span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_firstname"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">Other
                                                            Name:</span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_othername"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">
                                                            Gender:</span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_select_gender"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light"> Date of
                                                            Birth:</span>
                                                    </p> <span class="font-weight-semibold col-6"
                                                        id="display_DOB"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light"> Place
                                                            of Birth:</span>
                                                    </p><span class="font-weight-semibold col-6"
                                                        id="display_birth_place"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">
                                                            Country: </span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_country"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">
                                                            Residence Status: </span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_residence_status"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="mb-3 mt-4 bg-light p-2"> Contact & ID Details</h5>
                                        <div id="row">
                                            <div class="col-12">
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">Mobile
                                                            Number:</span>
                                                    </p> <span class="font-weight-semibold col-6"
                                                        id="display_mobile_number"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">Email:</span></p>
                                                    <span class="font-weight-semibold col-6" id="display_email"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">City:</span>
                                                    </p> <span class="font-weight-semibold col-6"
                                                        id="display_city"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">Town:</span>
                                                    </p> <span class="font-weight-semibold col-6"
                                                        id="display_town"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light">
                                                            Residential
                                                            Address:</span></p><span class="font-weight-semibold col-6"
                                                        id="display_residential_address"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light ">Tin
                                                            Number:<span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_tin_number"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light ">ID
                                                            Type:<span></p>
                                                    </span><span class="font-weight-semibold col-6"
                                                        id="display_id_type"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light ">ID
                                                            Number:<span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_id_number"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light ">Date
                                                            Issued:<span></p>
                                                    <span class="font-weight-semibold col-6"
                                                        id="display_issue_date"></span>
                                                </div>
                                                <div class="row">

                                                    <p class="col-6"><span class="font-weight-light ">Date of
                                                            Expiry:<span>
                                                    </p><span class="font-weight-semibold col-6"
                                                        id="display_expiry_date"></span>
                                                </div>
                                            </div>
                                            <p class="mb-1"><span class="font-weight-light ">
                                                    <h4> ID image:
                                                    </h4> <br> <img
                                                        class="img-fluid display_selected_id_image w-50 h-50"
                                                        id="previewImg" src="#" alt="your image" /><span
                                                        class="font-weight-semibold mr-3" id="display_title">
                                                        &nbsp</span>
                                        </div>
                                        <h5 class="mb-3 mt-4 bg-light p-2"> Bio Details</h5>

                                        <div>
                                            <div class="font-weight-light mr-2">
                                                <h4>Passport Picture: </h4>
                                                <img class="img-fluid display_passport_picture previewImg1 w-50 h-50"
                                                    id="_passport_picture_summary" src="#" alt="your image" /><span
                                                    class="font-weight-semibold mr-3">
                                                    &nbsp</span>
                                            </div>

                                            <div class="font-weight-light mr-2">
                                                <h4>
                                                    Signature
                                                    Image: </h4>
                                                <img class="img-fluid display_selfie previewImg2 w-50 h-50"
                                                    id="selfie_picture_summary" src="#" alt="your image" /><span
                                                    class="font-weight-semibold mr-3">
                                                    &nbsp</span>
                                            </div>

                                            <div class="font-weight-light mr-2">
                                                <h4>
                                                    Address
                                                    Image: </h4>
                                                <img class="img-fluid display_proof_of_address previewImg3 w-50 h-50"
                                                    id="address_picture_summary" src="#" alt="your image"
                                                    style="display:none" /><span class="font-weight-semibold mr-3">
                                                    &nbsp</span>
                                            </div>


                                        </div>





                                    </div>

                                    <ul class="list-inline wizard mb-0">
                                        <li class=" list-inline-item"><button type="button"
                                                class="btn btn-secondary btn-rounded" id="bio-previous-btn"
                                                data-toggle="pill" href="#custom-v-pills-bio-details" role="tab"
                                                aria-controls="custom-v-pills-bio-details"><i class="fe-arrow-left"></i>
                                                Previous</button></li>

                                        <li class="list-inline-item float-right"><button
                                                class="btn btn-primary btn-rounded float-right " type="button"
                                                id="confirm_submit">
                                                <span id="confirm_submit_text">Confirm & Submit</span>
                                                <span class="spinner-border spinner-border-sm mr-1" role="status"
                                                    id="spinner" aria-hidden="true"></span>
                                                <span id="spinner-text">Loading...</span>
                                            </button></li>
                                    </ul>



                                </div>


                            </div>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row-->

            </div>

            <div class="col-md-"></div>

        </div>


    </div>

</div>

</div>


@endsection



@section('scripts')
<script src="{{ asset('assets/js/pages/accounts/savings_accounts_creation.js') }}"> </script>
@endsection