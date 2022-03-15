@extends('layouts.master')

@section('content')


    <div class="container">

        <div class=" card card-body">

            <div class="row ">

                <div class="col-md-2"></div>

                <div class="col-md-8">




                    <div class="row">
                        <div class="col-md-2"> </div>

                        <div class="col-md-12">
                            <div class="">


                                <ul class="nav nav-tabs nav-bordered nav-justified">
                                    <li class="nav-item">
                                        <a href="#home-b2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                            <i class="mdi mdi-security"></i>&nbsp; Change Pin
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-b2" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            <i class="fas fa-lock"></i>&nbsp; Change Password
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile-b3" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                            <i class="fas fa-unlock-alt"></i>&nbsp; Forgot Pin
                                        </a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home-b2">
                                        <p>
                                        <h4 class="text-primary text-center">Change your pin</h4>
                                        <hr>
                                        </p>

                                        <p>
                                        <p class="text" style="text-align: center">
                                            Your new Pin must be different from
                                            the previous one
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form autocomplete="off" aria-autocomplete="off" id="forgot_pin_form">

                                                    <div class="form-group">
                                                        <label for="simpleinput">Enter old pin</label>

                                                        <div class="input-group input-group-merge">
                                                        <input type="password" id="old_pin_txtBx" class="form-control"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <div class="input-group-append" data-password="false">
                                                                <div class="input-group-text">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="simpleinput">Enter new pin</label>

                                                        <div class="input-group input-group-merge">
                                                        <input type="text" id="new_pin_txtBx" class="form-control"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                            <div class="input-group-append" data-password="false">
                                                                <div class="input-group-text">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="simpleinput">Confirm pin</label>

                                                        <div class="input-group input-group-merge">
                                                        <input type="text" id="confirm_pin_txtBx" class="form-control"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        <div class="input-group-append" data-password="false">
                                                            <div class="input-group-text">
                                                                <span class="password-eye"></span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="new_password">Security Question</label>
                                                        <div class="input-group input-group-merge">
                                                            <select class="form-control security_questions">
                                                                <option value="">Select Security Queston</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="security_answer">Security Answer</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="security_answer_txtBx"
                                                                class="form-control" placeholder="Security Answer">
                                                        </div>
                                                    </div>

                                                    <div class="form-group text-center">
                                                        <button class="btn btn-primary btn-rounded" type="button" id="btn_change_pin"><span class="submit-text">Submit</span>
                                                            <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner" aria-hidden="true"></span>
                                                            <span id="spinner-text">Loading...</span>
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>

                                            <div class="col-md-6 disappear-after-success">
                                                <img src="{{ asset('assets/images/change_pin.jpg') }}" class="img-fluid"
                                                    alt="">
                                            </div>

                                            <div class="col-md-6 text-center">

                                                <p class="display-4 text-center text-success success-message ">

                                                </p>
                                            </div>


                                        </div> <!-- end col -->
                                        </p>

                                    </div>
                                    <div class="tab-pane " id="profile-b2">

                                        <p>
                                        <h4 class="text-primary text-center">Change your password</h4>
                                        <hr>
                                        </p>

                                        <p>
                                        <p class="text" style="text-align: center">
                                            Your new Password must be different from
                                            the previous one
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6">

                                                <form autocomplete="off" aria-autocomplete="off" id="forgot_password">


                                                    <div class="form-group">
                                                        <label for="old_password">Old Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="old_password_txtBx"
                                                                class="form-control" placeholder="Old Password">
                                                            <div class="input-group-append" data-password="false">
                                                                <div class="input-group-text">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="new_password">New Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="new_password_txtBx"
                                                                class="form-control" placeholder="New Password">
                                                            <div class="input-group-append" data-password="false">
                                                                <div class="input-group-text">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="confirm_password">Confirm Password</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="password" id="confirm_password_txtBx"
                                                                class="form-control" placeholder="Confirm Password">
                                                            <div class="input-group-append" data-password="false">
                                                                <div class="input-group-text">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="new_password">Security Question</label>
                                                        <div class="input-group input-group-merge">
                                                            <select class="form-control security_questions">
                                                                <option value="">Select Security Queston</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="security_answer">Security Answer</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="security_answer_Pass_txtBx"
                                                                class="form-control" placeholder="Security Answer">
                                                        </div>
                                                    </div>


                                                    <div class="form-group mb-0 text-center">
                                                        <button class="btn btn-primary btn-rounded" type="button" id="btn_change_password"><span class="submit-text_pass">Submit</span>
                                                            <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner_pass" aria-hidden="true"></span>
                                                            <span id="spinner-text_pass">Loading...</span>
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div> <!-- end col -->
                                        </p>


                                    </div>

                                    <div class="tab-pane " id="profile-b3">

                                        <p>
                                        <h4 class="text-primary text-center">Reset your pin</h4>
                                        <hr>
                                        </p>

                                        <p>
                                        <p class="text" style="text-align: center">
                                            Enter the fields below to Change your pin.
                                        </p>
                                        <div class="">
                                            <div class="col-md-6">
                                                <form autocomplete="off" aria-autocomplete="off" id="forgot_password">



                                                    <div class="form-group">
                                                        <label for="new_password">Security Question</label>
                                                        <div class="input-group input-group-merge">
                                                            <select class="form-control security_questions">
                                                                <option value="">Select Security Queston</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="security_answer">Security Answer</label>
                                                        <div class="input-group input-group-merge">
                                                            <input type="text" id="security_answer_Pass_txtBx"
                                                                class="form-control" placeholder="Security Answer">
                                                        </div>
                                                    </div>



                                                    <div class="form-group mb-0 text-center">
                                                        <button class="btn btn-primary btn-rounded" type="button" id="btn_change_password_reset_pin"><span class="submit-text_reset_pn">Submit</span>
                                                            <span class="spinner-border spinner-border-sm mr-1" role="status" id="spinner_reset_pin" aria-hidden="true"></span>
                                                            <span id="spinner-text_reset_pin">Loading...</span>
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div> <!-- end col -->
                                        </p>


                                    </div>

                                </div>

                            </div> <!-- end col -->

                            <div class="col-md-2"> </div>
                        </div>


                    </div>

                    <div class="col-md-2"></div>

                </div>

            </div>

        </div>



@endsection

    @section('scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function get_security_question() {
                $.ajax({
                    type: 'GET',
                    url:  'get-security-question-api',
                    datatype: "application/json",
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data
                        $.each(data, function(index) {

                            $('.security_questions').append($('<option>', {
                                value: data[index].Q_CODE
                            }).text(data[index].Q_DESCRIPTION));

                        });

                    },

                })
            }

            //code for sweet alert
            function toaster(message, icon, timer) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: timer,
                    timerProgressBar: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: icon,
                    title: message
                })
            }



            //jquery validate the fields values.
            $(document).ready(function() {

                setTimeout(function() {
                    get_security_question();
                }, 2000);

                //hide the spinner on show for the change pin screen
                $('#spinner').hide();
                $('#spinner-text').hide();

                //hide the spinner on show for the change password screen
                $('#spinner_pass').hide();
                $('#spinner-text_pass').hide();

                //hide the spinner on show for the reset pin screen.
                $('#spinner_reset_pin').hide();
                $('#spinner-text_reset_pin').hide();


                //for testing
                $("#old_pin_txtBx").change(function() {
                    let old_pin = $("#old_pin_txtBx").val();
                    console.log(old_pin);
                });

                $("#new_pin_txtBx").change(function() {
                    let new_pin = $(this).val();
                    console.log(new_pin);
                });

                $("#confirm_pin_txtBx").change(function() {
                    let confirm_pin = $(this).val();
                    console.log(confirm_pin);
                });

                $(".security_questions").change(function() {
                    let security_question = $(this).val();
                    console.log(security_question);
                });

                $("#old_password_txtBx").change(function() {
                    console.log($(this).val());
                });

                $("#new_password_txtBx").change(function() {
                    console.log($(this).val());
                });

                $("#confirm_password_txtBx").change(function() {
                    console.log($(this).val());
                });
                //end of for testing

                //change pin event when the the change pin button is pressed.
                $("#btn_change_pin").click(function() {

                    //show the loading ui to engage user
                    $('.submit-text').hide();
                    $('#spinner').show();
                    $('#spinner-text').show();

                    //variables to be used declared
                    let security_answer = $("#security_answer_txtBx").val();
                    let new_pin = $("#new_pin_txtBx").val();
                    let confirm_pin = $("#confirm_pin_txtBx").val();
                    let old_pin = $("#old_pin_txtBx").val();
                    let security_question = $(".security_questions").val();

                    //check if user is entering all the fields that are required
                    if (security_answer == "" || new_pin == "" || confirm_pin == "" || old_pin == "" ||
                        security_question == "") {
                        toaster("Please fill all required fields", "error", 6000);
                        $('.submit-text').show();
                        $('#spinner').hide();
                        $('#spinner-text').hide();
                    } else {
                        if (new_pin != confirm_pin) {
                            //alert user to ensure new pin is same as confirm pin
                            toaster("new pin and confirm pin must be the same", "error", 6000);
                            $('.submit-text').show();
                            $('#spinner').hide();
                            $('#spinner-text').hide();
                        } else {

                            //assign confirm pin to new pin changed by the user.
                            let pin_correct = confirm_pin;

                            //code to pass variables' values to the api
                            $.ajax({
                                type: 'POST',
                                url:  'change-pin-api',
                                datatype: "application/json",
                                'data': {
                                    'security_answer': security_answer.trim(),
                                    'old_pin': old_pin,
                                    'new_pin': new_pin,
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {

                                    console.log(response)

                                    if (response.responseCode == '000') {

                                        //alert user if the change pin process is successful
                                        toaster(response.message, 'success', 20000)

                                        //hide the request for if pin is changed successfully
                                        $(".disappear-after-success").hide();

                                        //show this gif/image if the change pin process is successful
                                        $(".success-message").html(
                                            '<img src="{{ asset('land_asset/images/statement_success.gif') }}" />'
                                            )

                                            //uis to keep user engaged.
                                            $('.submit-text').show();
                                            $('#spinner').hide();
                                            $('#spinner-text').hide();
                                            $("#security_answer_txtBx").val('');
                                            $("#new_pin_txtBx").val('');
                                            $("#confirm_pin_txtBx").val('');
                                            $("#old_pin_txtBx").val('');
                                            $('select option[value=""]').attr("selected",true);

                                    } else {

                                        //alert the user if the change pin process failed
                                        toaster(response.message, 'error', 9000);
                                        $('.submit-text').show();
                                        $('#spinner').hide();
                                        $('#spinner-text').hide();
                                    }
                                }
                            });

                        }
                    }



                });


                //change the password with the required fields' values
                $("#btn_change_password").click(function() {

                    //ui code to keep use engaged in the change password process
                    $('#spinner_pass').show();
                    $('#spinner-text_pass').show();
                    $('.submit-text_pass').hide();
                    let old_password = $("#old_password_txtBx").val();
                    let new_password = $("#new_password_txtBx").val();
                    let confirm_password = $("#confirm_password_txtBx").val();
                    let security_question = $(".security_questions_txtBx").val();
                    let security_answer = $("#security_answer_Pass_txtBx").val();

                    //check if the user entered all the fields required
                    if (old_password == "" || new_password == "" || confirm_password == "" ||
                        security_question == "" || security_answer == "") {
                        toaster("fields cannot be empty", "error", 6000);
                        $('.submit-text_pass').show();
                            $('#spinner_pass').hide();
                            $('#spinner-text_pass').hide();
                    } else {

                        //check if confirm and new passwords are equal
                        if (new_password != confirm_password) {

                            //alert for user
                            toaster("new password and confirm password must be the same", "error", 5000);
                                            $('#spinner_pass').hide();
                                            $('#spinner-text_pass').hide();
                                            $('.submit-text_pass').show();
                        } else {

                            //assign confirm password to password field
                            var password = confirm_password;


                            //ajax code to pass values to the api
                            $.ajax({
                                type: 'POST',
                                url:  'change-password-api',
                                datatype: "application/json",
                                'data': {
                                    'security_answer': security_answer.trim(),
                                    'old_password': old_password,
                                    'new_password': password,
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {

                                    console.log(response)

                                    if (response.responseCode == '000') {
                                        toaster(response.message, 'success', 20000)

                                        //uis to keep user engaged
                                        $(".disappear-after-success").hide();
                                        $(".success-message").html(
                                            '<img src="{{ asset('land_asset/images/statement_success.gif') }}" />'
                                            )
                                            $('#spinner_pass').hide();
                                            $('#spinner-text_pass').hide();
                                            $('.submit-text_pass').show();
                                        //end of user engagement code

                                        //default values for fields
                                        $("#old_password_txtBx").val('');
                                        $("#new_password_txtBx").val('');
                                        $("#confirm_password_txtBx").val('');
                                        $('select option[value=""]').attr("selected",true);
                                        $("#security_answer_Pass_txtBx").val('');
                                    } else {
                                        //alert user on status of change password
                                        toaster(response.message, 'error', 90000);

                                        //uis to engage user in the process
                                        $('#spinner_pass').hide();
                                        $('#spinner-text_pass').hide();
                                        $('.submit-text_pass').show();

                                        //default values for fields
                                        $("#old_password_txtBx").val('');
                                        $("#new_password_txtBx").val('');
                                        $("#confirm_password_txtBx").val('');
                                        $('select option[value=""]').attr("selected",true);
                                        $("#security_answer_Pass_txtBx").val('');
                                    }
                                }
                            });
                        }

                    }

                });

            });

        </script>
    @endsection
