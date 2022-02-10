@extends('layouts.app')

@section('content')

<style>
    .card-box {
        position: relative;
        height: 10rem !important;
    }

    .card-box div {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%);
        transform: translate(-50%, -50%);
    }


    .demo {
        font-weight: 500;
        font-size: 36px;
        /* position: absolute; */
        /* width: 450px; */
        /* left: 50%; */
        /* margin-left: -225px; */
        height: 40px;
        /* top: 50%; */
        /* margin-top: -20px; */
    }

    p {
        display: inline-block;
        vertical-align: top;
        margin: 0;
    }

    .word {
        position: absolute;
        /* width: 220px; */
        opacity: 0;
    }

    .wisteria {
        color: #8e44ad;
    }

    .belize {
        color: #2980b9;
    }

    .pomegranate {
        color: #c0392b;
    }

    .green {
        color: #16a085;
    }

    .midnight {
        color: #B89C72;
    }

    .word {
        animation-iteration-count: infinite;
        animation-name: anim;
        animation-duration: 7.5s;
        /*calculate the exact time for looping*/
    }

    .word:nth-child(2) {
        animation-delay: 1.5s;
    }

    .word:nth-child(3) {
        animation-delay: 3s;
    }

    .word:nth-child(4) {
        animation-delay: 4.5s;
    }

    .word:nth-child(5) {
        animation-delay: 6s;
    }

    @keyframes anim {

        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        6.66% {
            transform: translateY(0);
            opacity: 1;
            transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        20% {
            transform: translateY(0);
            opacity: 1;
            transition: transform 0.38s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        46.66% {
            transform: translateY(-100%);
            opacity: 0;
            transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

        /*we give long pause after animation is done by this method*/
        100% {
            transform: translateY(-100%);
            opacity: 0;
            transition: transform 0.32s cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

    }
</style>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box py-0"
        style="background-image: url({{ asset('assets/images/login-bg.jpg') }});background-repeat: no-repeat;background-size: cover; min-width:400 ">
        <div class="align-items-center d-flex">
            <div class="card-body">

                <!-- Logo -->
                <div style="top:3rem">
                    <div class="auth-logo">
                        <a href="{{ url('/') }}" class="logo logo-dark text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/rokel_logo.png') }} " alt="" height="50">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/rokel_logo.png') }} " alt="" height="50">
                            </span>
                        </a>
                    </div>
                </div>

                <!-- title-->
                @php
                if (!config('app.corporate')) {
                $TYPE = 'Personal';
                } else {
                $TYPE = 'Corporate';
                }
                @endphp
                <h1 class="text-primary page-header my-5 text-center font-20 "> {{ $TYPE }} Internet Banking
                </h1>

                <div id="login_form" class="form-center">

                    <h2 class="mt-0 text-left font-weight-bold font-18 mb-4">Sign In</h2>
                    <!-- form -->
                    <form action="POST" id="login_post_form" autocomplete="off" aria-autocomplete="off">
                        @csrf

                        <div class="alert alert-danger bg-danger text-white border-0 " role="alert" id="failed_login"
                            style="display: none">
                        </div>

                        <div class="form-group">

                            <label for="user_id">User ID<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="user_id" placeholder="Enter Username"
                                parsley-trigger="change" autocomplete="off" autofocus maxlength="50"
                                aria-autocomplete="off">

                        </div>



                        <div class="form-group">
                            @if (!config('app.corporate'))

                            <a href="#" class="text-muted float-right" id="forgot_password"><small>Forgot your
                                    password?</small></a>
                            @endif
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" maxlength="50" class="form-control"
                                    placeholder="Enter Password" autocomplete="off" aria-autocomplete="off">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <br>


                        <div class="form-group mb-0 text-center">

                            <button class="btn btn-primary btn-block" type="submit" id="submit"><span id="log_in">Log
                                    In</span>
                                <span class="spinner-border spinner-border-sm mr-1" role="status" style="display: none"
                                    id="spinner" aria-hidden="true"></span>
                                <span id="spinner-text" style="display: none">Loading...</span>
                            </button>
                            <br><br>

                            {{-- <button class="btn btn-primary btn-block" type="submit">Log In </button> --}}

                            @if (!config('app.corporate'))

                            <p class="___class_+?29___"><a href="#" id="self_enroll" class="text-primary ml-1"><b>Self
                                        Enroll
                                        Here!</b></a></p>
                            @endif
                        </div>
                    </form>

                </div>
                @if (!config('app.corporate'))

                <div id="password_reset_area" style="display:none">
                    <!-- title-->
                    <h2 class="mt-0 mb-4 font-weight-bold font-18 text-left">Reset Password</h2>
                    {{-- <p class="text-muted mb-4">Enter the required details to reset password</p> --}}

                    <!-- form -->
                    <form action="#" autocomplete="off" aria-autocomplete="off">
                        <div class="alert alert-danger text-white bg-danger" role="alert" id="error_alert"
                            style="display: none">
                            {{-- <span id="error_message"></span> --}}
                        </div>
                        <div class="alert alert-warning text-white bg-warning " role="alert" id="no_question"
                            style="display: none">
                            {{-- <span id="no_question_found"></span> --}}
                        </div>
                        <div class="alert alert-success bg-success text-white" role="alert" id="reset_success"
                            style="display: none">
                            {{-- <span id="reset_success_message"></span> --}}
                        </div>


                        <div class="form-group" id="user_id">
                            {{-- <label for="pass_email">Enter User ID</label> --}}
                            <div class="input-group input-group-merge ">
                                <input type="email" id="reset_user_id" placeholder="Enter User ID" name="reset_user_id"
                                    class="form-control" autocomplete="off" aria-autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group" id="security_question_form" style="display: none">
                            <input type="email" id="security_question_answer" name="security_question_answer"
                                class="form-control" autocomplete="off" aria-autocomplete="off">
                            <input type="text" id="security_question_code" autocomplete="new-password" hidden>
                            <br>
                            <input type="password" placeholder="Enter New Password" id="reset_password"
                                name="reset_password" class="form-control" autocomplete="off" aria-autocomplete="off">
                            <br>
                            <input type="password" placeholder="Confirm Password" id="reset_confirm_password"
                                name="reset_confirm_password" autocomplete="new-password" class="form-control" />
                        </div>

                        <div class="form-group mb-0 text-center">
                            <br>
                            <button class="btn btn-primary btn-block" type="button" id="user_id_next_btn">
                                <span class="user_id_next_btn_text">Next</span>
                                <span class="spinner-border spinner-border-sm mr-1 spinner-text-next"
                                    style="display: none" role="status" aria-hidden="true"></span>
                                <span class="spinner-text-next" style="display: none">Loading</span>
                                {{-- <span class="spinner-text">Loading ...</span> --}}
                            </button>
                            <button class="btn btn-primary btn-block" style="display: none" type="button"
                                id="security_question_submit">
                                <span id="security_question_submit_text">Submit</span>
                                <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"
                                    id="submit_spinner" style="display: none"></span>
                            </button>
                            {{-- <button class="btn btn-primary btn-block" type="button"
                                id="reset_password_submit_btn">Submit</button> --}}

                            {{-- <button class="btn btn-primary btn-block" type="submit">Log In </button> --}}
                        </div>


                    </form>
                </div>
                @endif
                @if (!config('app.corporate'))


                <div id="self_enroll_form" class=" form-center" style="display: none">
                    <h2 class="mt-0 text-left my-4 font-18 font-weight-bold">Self Enroll</h2>

                    <div class="alert alert-danger bg-danger text-white border-0" role="alert" id="self_enroll_message"
                        style="display: none">
                    </div>

                    <div id="self_enroll_form1" class="form-group">
                        <form action="POST" id="parent_self_enroll_form_1">
                            @csrf
                            <label class="my-2 text-muted" for="customer_number_input"> Customer Number</label>
                            <input class="form-control mb-0" type="number" id="customer_number_input"
                                placeholder="Enter your customer number" pattern="[0-9]*" inputmode="numeric"
                                parsley-trigger="change" autocomplete="none">
                            <br />
                            <div id="a" class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" id="b_next1" type="submit"><span
                                        id="s_next1">Next</span>
                                    <span id="s_loading1">
                                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner1"
                                            aria-hidden="true"></span>
                                        <span id="spinner-text1">Loading...</span>
                                    </span>
                                </button>
                                <br />
                                <p class="___class_+?40___"><a href="#" id="login_instead" class="text-primary ml-1"><b>
                                            Login
                                            Instead</b></a>
                                </p>
                            </div>
                        </form>

                    </div>

                    <div id="self_enroll_form2" class="form-group">
                        <form action="POST" id="parent_self_enroll_form_2">
                            @csrf
                            <label for="phone_number_input"> Phone Number<span class="text-danger">*</span></label>

                            <input class="form-control mb-0" type="number" id="phone_number_input"
                                placeholder="Enter your phone number" parsley-trigger="change" autocomplete="none" />
                            <br />
                            <label for="id_number_input"> ID Number<span class="text-danger">*</span></label>

                            <input class="form-control mb-0" type="text" id="id_number_input"
                                placeholder="Enter your id number" parsley-trigger="change" autocomplete="none" />
                            <br />
                            <label for="date_of_birth_input"> Date of birth<span class="text-danger">*</span></label>

                            <input type="text" id="date_of_birth_input" placeholder="Enter your date of birth"
                                class="form-control mb-0" parsley-trigger="change" autocomplete="none"
                                data-provide="datepicker" data-date-autoclose="true">

                            <br />


                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" id="b_next2" type="submit"><span
                                        id="s_next2">Next</span>
                                    <span id="s_loading2">
                                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner2"
                                            aria-hidden="true"></span>
                                        <span id="spinner-text2">Loading...</span>
                                    </span>
                                </button>
                                <br />
                            </div>
                        </form>
                    </div>

                    <div id="self_enroll_form3" class="form-group">
                        <form action="POST" id="parent_self_enroll_form_3">
                            @csrf
                            <div id="one_time_input_area">
                                <label for="one_time_pin_input"> Enter one time pin<span
                                        class="text-danger">*</span></label>
                                <input class="form-control mb-0" type="text" id="one_time_pin_input"
                                    placeholder="Enter one time pin" parsley-trigger="change" autocomplete="none" />
                                <br />
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" id="b_next3" type="submit"><span
                                        id="s_next3">Register</span>
                                    <span id="s_loading3">
                                        <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner3"
                                            aria-hidden="true"></span>
                                        <span id="spinner-text3">Loading...</span>
                                    </span>
                                </button>
                                <br />
                            </div>
                        </form>
                    </div>

                    {{-- <div class="bg-success">
                        <div class="modal-body p-4">
                            <div class="text-center">
                                {{-- <i class="dripicons-checkmark h1 text-white"></i> -
                                <p class=" text-white" id="success_modal_text"> </p>
                                {{-- <button type="button" class="btn btn-light btn-sm my-2" {{--
                                    data-dismiss="modal">Continue</button>
                            </div>
                        </div>
                    </div> --}}


                </div>
                @endif
                </form>
                <!-- end form-->

                <!-- Footer-->

                <br><br><br>
                @if (!config('app.corporate'))

                <div class="text-center d-lg-none" id="">
                    {{-- <div class="row "> --}}


                        <div>
                            <a href="{{ url('account-creation') }}"
                                class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-1 mx-1"
                                style="min-width: 170px;"> <i class="fas fa-book-open mr-1"></i> Open an account</a>
                            {{-- &nbsp; --}}
                            <a href="{{ url('enquiry') }}"
                                class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-1 mx-1"
                                style="min-width: 170px;"> <i class="fas fa-desktop mr-1"></i> Make Enquiry</a>


                        </div>
                        {{--
                    </div> --}}
                    {{-- <div class="row "> --}}
                        <div>
                            <a href="{{ url('branches') }}"
                                class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-1 mx-1"
                                style="min-width: 170px;"> <i class="fas fa-map-marked-alt mr-1"></i> Branches</a>
                            {{-- &nbsp; --}}
                            <a href="{{ url('faq') }}"
                                class="btn btn-outline-primary btn-rounded waves-effect waves-light mb-1 mx-1"
                                style="min-width: 170px;"> <i class="fas fa-headset mr-1"></i> FAQs</a>
                        </div>
                        {{--
                    </div> --}}
                </div>
                @endif

            </div> <!-- end .card-body -->
        </div> <!-- end .align-items-center.d-flex.h-100-->
    </div>
    <!-- end auth-fluid-form-box-->



    <!-- Auth fluid right content -->


    <div class="auth-fluid-right " id=""
        style="background-image:  linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),url({{ asset('assets/images/meeting.jpg') }});background-repeat: no-repeat;background-size: cover;">
        <div class="auth-user-testimonial">
            @if (!config('app.corporate'))

            <div class="container h-100" id="login_page_extras">

                {{-- <div class="container-fluid"> --}}

                    {{-- <div class="card d-flex h-100" style="background-color: rgba(245, 245, 245, 0);zoom: 0.8 ;">
                        --}}

                        <div class="card-body mb-3 pb-3 mb-lg-5 pb-lg-5 h-75">
                            <div class="row mx-auto" style="width: 65rem">
                                <div class="col-md-7 my-auto">
                                    <h1 class=" text-white"
                                        style="font-size: 3.5rem;font-family: 'Oswald', sans-serif;">
                                        . . . Do more with<br>
                                        <span class="pl-5"> BestMobile App </span>
                                    </h1>

                                    <div class="demo p-2 mt-2 ">
                                        <p class="mr-3">BestMobile App</p>
                                        <p class="word-wrap">
                                            <span class="word wisteria">anywhere...</span>
                                            <span class="word belize">anytime...</span>
                                            <span class="word pomegranate">secure...</span>
                                            <span class="word green">convenient...</span>
                                            <span class="word midnight">fast...</span>
                                        </p>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="row">


                                            <div class="col-md-12 flow-act text-center">

                                            </div>

                                        </div>
                                    </div> --}}

                                </div>

                                {{-- Carousel --}}
                                <div class="col-md-5 text-center">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('assets/images/mobile-login.png') }}" alt="image"
                                                    class="img-fluid rounded" width="200" />
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded" alt="image" width="200"
                                                    src="{{ asset('assets/images/mobile-home.png') }}">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="img-fluid rounded" alt="image" width="200"
                                                    src="{{ asset('assets/images/home-summary.png') }}">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>
                        {{-- <br><br><br><br> --}}
                        <div class="___class_+?100___ mt-5 ">
                            {{-- NEW LAYOUT --}}
                            <div class="___class_+?77___" style="zoom: 0.8">
                                <div class="col-md-12 pb-0">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ url('account-creation') }}">
                                                <div class="text-center card-box">
                                                    <div class="pt-1 pb-1">
                                                        {{-- <img src="../assets/images/users/user-3.jpg"
                                                            class="rounded-circle img-thumbnail avatar-xl"
                                                            alt="profile-image"> --}}


                                                        <i class="fas fa-book-open text-primary font-20"
                                                            style="font-size: 100px;"></i>
                                                        <h4 class="mt-3 font-24 text-primary"> Open Account
                                                        </h4>
                                                        {{-- <a href="{{ url('account-creation') }}"
                                                            class="text-blue">Open Account</a> --}}
                                                        {{-- <a href="{{ url('account-creation') }}" class="p-text">
                                                            <button type="button"
                                                                class="btn btn-primary btn-lg waves-effect waves-light">Here</button>
                                                        </a> --}}

                                                    </div> <!-- end .padding -->
                                                </div> <!-- end card-box-->
                                            </a>

                                        </div>
                                        <div class="col-md-3">

                                            {{-- <div class="col-md-12"> --}}
                                                <a href="{{ url('branches') }}">
                                                    <div class="text-center card-box">
                                                        <div class="pt-1 pb-1">

                                                            <i class=" fas fa-map-marked-alt  text-primary font-20"
                                                                style="font-size: 100px;"></i>

                                                            <h4 class="mt-3 font-24  text-primary">Branches</h4>
                                                            {{-- <a href="{{ url('branches') }}" class="text-white">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-lg waves-effect waves-light">
                                                                    Here</button> --}}
                                                            </a>

                                                        </div> <!-- end .padding -->
                                                    </div> <!-- end card-box-->
                                                </a>

                                                {{--
                                            </div> --}}
                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{ url('enquiry') }}">
                                                <div class="text-center card-box">
                                                    <div class="pt-1 pb-1">
                                                        <i class=" fas fa-desktop  text-primary font-20"
                                                            style="font-size: 100px;"></i>
                                                        <h4 class="mt-3 font-24  text-primary">Enquiries
                                                        </h4>
                                                        {{-- <a href="{{ url('enquiry') }}"
                                                            class="text-blue">Enquiries</a> --}}
                                                        {{-- <a href="{{ url('enquiry') }}" class="p-text">
                                                            <button type="button"
                                                                class="btn btn-primary btn-lg waves-effect waves-light">Here</button>
                                                        </a> --}}

                                                    </div> <!-- end .padding -->
                                                </div> <!-- end card-box-->
                                            </a>

                                        </div>
                                        <div class="col-md-3">
                                            <a href="{{ url('faq') }}">
                                                {{-- <div class="col-md-12"> --}}
                                                    <div class="text-center card-box">
                                                        <div class="pt-1 pb-1">

                                                            <i class="fas fa-headset  text-primary font-20"
                                                                style="font-size: 100px;"></i>

                                                            <h4 class="mt-3 font-24 text-primary">FAQ
                                                            </h4>
                                                            {{-- <a href="{{ url('faq') }}" class="text-blue">FAQ</a>
                                                            --}}

                                                            {{-- <a href="{{ url('faq') }}" class="p-text">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-lg waves-effect waves-light">Here</button>
                                                            </a> --}}

                                                        </div> <!-- end .padding -->
                                                    </div> <!-- end card-box-->
                                                    {{--
                                                </div> --}}
                                            </a>

                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                        {{--
                    </div> --}}

                    {{--
                </div> --}}
            </div>
            @endif

        </div> <!-- end auth-user-testimonial-->
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/js/pages/login.js') }}">
</script>


@endsection