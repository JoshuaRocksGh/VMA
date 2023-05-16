@extends('layouts.app')

@section('content')
    <br><br><br>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="container">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <br> <br>
                                <br> <br>
                                <br>
                                <div class="card" style="box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;opacity:0.9">
                                    <div class="">


                                        <div class=" row">

                                            <div class="col-md-6">
                                                <div class="container">
                                                    <div class=" row ">

                                                        <div class=" col-md-12 m-2 p-1">
                                                            <br><br>

                                                            <div class="text-center w-75 m-auto">

                                                                <p class=" mb-3 mt-1 text-dark h4 font-weight-bold sign_in">
                                                                    Sign In</p>
                                                            </div>

                                                            <form action="#" id="login_form">

                                                                <div class="alert alert-success" role="alert"
                                                                    id="success_alert" style="display: none;">


                                                                </div>

                                                                <div class="alert alert-danger" role="alert"
                                                                    id="error_alert" style="display: none">

                                                                    {{-- <span class="error_alert_message"></span> --}}
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label>User ID</label>
                                                                    <input class="form-control" type="text"
                                                                        id="user_id"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        maxlength="10" required=""
                                                                        placeholder="Enter Your User Id">
                                                                </div>

                                                                {{--  <div class="form-group mb-3">
                                                                    <label for="password" class="h4">Password</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="password" id="password"
                                                                            class="form-control"
                                                                            placeholder="Enter Your Password">
                                                                        <div class="input-group-append"
                                                                            data-password="false">
                                                                            <div class="input-group-text">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>  --}}

                                                                <div class="form-group mb-3">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-end">
                                                                        <label for="password">Password</label>
                                                                        {{--  @if (!config('app.corporate'))  --}}
                                                                        <button type="button"
                                                                            class="text-danger text-right font-12"
                                                                            id="forgot_password"
                                                                            onmouseover='this.style.textDecoration="underline"'
                                                                            onmouseout='this.style.textDecoration="none"'>Forgot
                                                                            your
                                                                            password?</button>
                                                                    </div>
                                                                    <div class="password-group">
                                                                        <input type="password" id="password" maxlength="50"
                                                                            class="password-input form-control"
                                                                            placeholder="Enter Password" autocomplete="off"
                                                                            aria-autocomplete="off">
                                                                        <span class="password-eye"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-0 text-center">
                                                                    <button class="btn btn-primary btn-block "
                                                                        type="submit" id="login_form_button">
                                                                        <span class="log_in_text"><b>Log In </b></span>
                                                                        <span
                                                                            class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                                            role="status" aria-hidden="true"
                                                                            style="display: none"></span>
                                                                    </button>
                                                                </div>
                                                                <br>


                                                                {{-- <br> --}}

                                                            </form>

                                                            {{-- Suggestion FORM --}}
                                                            <form action="" style="display: none" id="sugesstion_form">
                                                                @csrf
                                                                <div class="alert alert-success" role="alert"
                                                                    id="sugesstion_success_alert" style="display: none;">


                                                                </div>

                                                                <div class="alert alert-danger" role="alert"
                                                                    id="sugesstion_error_alert" style="display: none">

                                                                    {{-- <span class="error_alert_message"></span> --}}
                                                                </div>
                                                                <div class="form-groub mb-1">
                                                                    <label class="h4">Topic</label>
                                                                    <input type="text" class="form-control required"
                                                                        id="mail_topic" required>
                                                                </div>

                                                                <div class="form-floating mb-1">
                                                                    <label for="floatingTextarea2"
                                                                        class="h4">Comments</label>
                                                                    <textarea class="form-control required" placeholder="Leave a comment here" id="mail_comment" style="height: 100px"
                                                                        required></textarea>

                                                                </div>

                                                                <div class="form-group mb-0 text-center">
                                                                    <button class="btn btn-blue btn-block " type="submit"
                                                                        id="sugesstion_form_button">
                                                                        <span class="sugesstion_form_inner_text"><b>Send
                                                                            </b></span>
                                                                        {{-- <span
                                                                            class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                                            role="status" aria-hidden="true"
                                                                            style="display: none"></span> --}}
                                                                    </button>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-1"></div>
                                                                    <div class="col-md-10 text-center">
                                                                        <p type="text" href="#"
                                                                            class="bolder sugesstion_form_login"
                                                                            id="sugesstion_form_login">LogIn Instead</p>
                                                                    </div>
                                                                    <div class="col-md-1"></div>

                                                                </div>

                                                            </form>
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-10 text-center">
                                                                    <p type="text" href="#"
                                                                        class="bolder any_suggestion" id="any_suggestion">
                                                                        Any
                                                                        Suggestions?</p>
                                                                </div>
                                                                <div class="col-md-1"></div>

                                                            </div>
                                                            {{-- <br> --}}

                                                            <form action="#" id="first_time_login"
                                                                style="display: none">
                                                                @csrf
                                                                <div class="alert alert-success" role="alert"
                                                                    id="success_alert" style="display: none;">
                                                                    {{-- <i class="mdi mdi-check-all mr-2 alert-success"></i> --}}
                                                                    <span class="first_time_success_alert_message"></span>


                                                                </div>
                                                                <div class="alert alert-danger" role="alert"
                                                                    id="first_time_error_alert" style="display: none">
                                                                    {{-- <i class="mdi mdi-block-helper mr-2"></i> --}}
                                                                    <span class="first_time_error_alert_message"></span>
                                                                </div>
                                                                <div class="form-group mb-1">
                                                                    <label class="h4">User ID</label>
                                                                    <input class="form-control" type="text"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        maxlength="10" id="first_time_user_id"
                                                                        required="" placeholder="Enter Your User ID">
                                                                </div>

                                                                <div class="form-group mb-1">
                                                                    <label class="h4">Voter ID</label>
                                                                    <input class="form-control" type="text"
                                                                        id="first_time_voter_id" required=""
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        maxlength="10" placeholder="Enter Voter ID">
                                                                </div>

                                                                <div class="form-group mb-1">
                                                                    <label class="h4">Date of Birth</label>
                                                                    <input class="form-control" type="date"
                                                                        id="first_time_dob" required="">
                                                                </div>
                                                                <br>
                                                                <div class="form-group mb-0 text-center">
                                                                    <button class="btn btn-blue btn-block " type="submit"
                                                                        id="first_time_login_form_button">
                                                                        <span class="first_time_log_in_text"><b>Verify
                                                                            </b></span>
                                                                        <span
                                                                            class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                                            role="status" aria-hidden="true"
                                                                            style="display: none"></span>
                                                                    </button>
                                                                </div>
                                                                <br>
                                                            </form>

                                                            {{-- USER SETUP FORM --}}
                                                            <form action="#" id="user_setup" style="display: none">
                                                                @csrf
                                                                <div class="alert alert-success" role="alert"
                                                                    id="success_alert" style="display: none;">
                                                                    {{-- <i class="mdi mdi-check-all mr-2 alert-success"></i> --}}

                                                                </div>
                                                                <div class="alert alert-danger" role="alert"
                                                                    id="user_setup_error_alert" style="display: none">
                                                                    {{-- <i class="mdi mdi-block-helper mr-2"></i> --}}
                                                                    <span class="user_setup_error_alert_message"></span>
                                                                </div>

                                                                <div class="form-group mb-1">
                                                                    <label class="h4">User ID</label>
                                                                    <input class="form-control" type="text"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                                        maxlength="10" id="user_setup_user_id"
                                                                        required="" placeholder="Enter Your User ID "
                                                                        autocomplete="off" aria-autocomplete="off">
                                                                </div>

                                                                <div class="form-group mb-1">
                                                                    <label class="h4">Password</label>
                                                                    <input class="form-control" type="password"
                                                                        id="user_setup_user_password" required=""
                                                                        placeholder="Enter Your Password"
                                                                        autocomplete="off" aria-autocomplete="off">
                                                                </div>
                                                                <div class="form-group mb-1">
                                                                    <label class="h4">Confirm Password</label>
                                                                    <input class="form-control" type="password"
                                                                        id="user_setup_user_confirm_password"
                                                                        required="" placeholder="Confrim Your Password"
                                                                        autocomplete="off" aria-autocomplete="off">
                                                                </div>

                                                                <br>
                                                                <div class="form-group mb-0 text-center">
                                                                    <button class="btn btn-blue btn-block " type="submit"
                                                                        id="user_setup_login_form_button">
                                                                        <span class="user_setup_log_in_text"><b>Register
                                                                            </b></span>
                                                                        <span
                                                                            class="spinner-border spinner-border-sm mr-1 spinner-text"
                                                                            role="status" aria-hidden="true"
                                                                            style="display: none"></span>
                                                                    </button>
                                                                </div>
                                                                <br>

                                                            </form>

                                                        </div> <!-- end card-body -->

                                                        {{-- <div class="col-md-6">
                                        <form action="">

                                        </form>
                                    </div> --}}
                                                    </div>
                                                </div>

                                                <!-- end card -->
                                                <!-- end row -->

                                            </div> <!-- end col -->


                                            <div class="col-md-6 w-50">
                                                <div class=" h-100"
                                                    style="background-image: url({{ asset('assets/images/bk2.jpg') }});background-repeat: no-repeat;background-size: cover;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-10 text-center">
                                                                <br><br><br><br>
                                                                <img src="{{ asset('assets/images/Coat.png') }}"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                            <div class="col-md-1"></div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="{{ asset('assets/js/login.js') }}"></script>
    {{-- <script>
        var UserMandate = @json(session()->get('UserMandate'));
    </script> --}}
@endsection
