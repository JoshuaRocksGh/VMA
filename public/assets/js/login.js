$(".spinner-text").hide();
// console.log("get cans==>", db.collection("candidates"));

$("#success_alert").hide();
$("#error_alert").hide();
// $("#error_alert").delay(4000).hide();
// setTimeout("$('#error_alert').hide();", 4000);

// $(".login_form_button").attr("disabled", fale);
// $(".spinner-text").show();$(".spinner-text").hide();

$("#success_alert").hide();
$("#error_alert").hide();
// $("#error_alert").delay(4000).hide();
// setTimeout("$('#error_alert').hide();", 4000);

// $(".login_form_button").attr("disabled", fale);
// $(".spinner-text").show();
// $(".log_in_text").hide();
function hide_alert() {
    setTimeout(function () {
        $("#error_alert").hide();
        $(".error_alert_message").hide();
        $("#first_time_error_alert").hide();
        $(".first_time_error_alert_message").hide();
        $("#user_setup_error_alert").hide();
        $(".user_setup_error_alert_message").hide();
    }, 5000);
}

function error_alert(message, targetId) {
    $(targetId).text(message);
    $(targetId).show(200);
    setTimeout(() => {
        $(targetId).hide(200);
    }, 3000);
}

function user_setup() {
    $("#login_form").hide();
    $("#first_time_login").hide();
    $("#user_setup").toggle("500");
    $(".sign_in").html("Setup Password");
    $(".spinner-text").hide();
}

function validate_user() {
    $(".sign_in").html("Validate Details");
    $("#login_form").hide();
    $("#first_time_login").toggle("500");
    $(".spinner-text").hide();

    //
}

/*function login(email, password) {
    $.ajax({
        type: "POST",
        url: "login-api",
        datatype: "application/json",
        data: {
            user_id: email,
            password: password,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            // console.log(response.data);
            let user_data = response.data;

            // $("#success_alert").append();
            // return false;
            // $("#error_alert").append();
            // $("#success_alert").hide();
            // $("#error_alert").hide();
            if (response.responseCode == "ok") {
                console.log(user_data);

                if (
                    user_data.Active === false ||
                    user_data.Active === "false"
                ) {
                    // console.log(user_data.Active);
                    // return false;
                    $("#error_alert").show();
                    $("#error_alert").html(
                        "Please Contact National Head for Activation"
                    );
                    $(".spinner-text").hide();
                    $(".log_in_text").show();
                    $("#login_form_button").attr("disabled", false);

                    hide_alert();
                    return false;
                } else if (
                    user_data.FirstTime === true ||
                    user_data.FirstTime === "true"
                ) {
                    validate_user();
                    return false;
                } else {
                    // return false;

                    // alert(UserMandate);
                    // if (UserMandate === "RegionalLevel") {

                    // }
                    // alert("success");
                    // return false;

                    // $("#success_alert").show();
                    // $("#success_alert").html(response.message);

                    window.location = "welcome";
                    $("#login_form_button").attr("disabled", true);
                }
            } else {
                console.log(response.message);
                $("#login_form_button").attr("disabled", false);

                $(".spinner-text").hide();
                $(".log_in_text").show();
                // alert(response.message);
                // $(".error_alert_message").html(response.message);
                // $("#error_alert").show();
                error_alert(response.message, "#error_alert");
                // hide_alert();
            }
        },
    });
} */

/*$("#login_form_button").click(function (e) {
    e.preventDefault();

    var email = $("#user_id").val();
    var password = $("#password").val();


    if (email === "" || email === undefined) {
        $(".error_alert_message").text("Please Enter User Id");
        $("#error_alert").toggle(500);

        hide_alert();
    } else if (password === "" || password === undefined) {
        $(".error_alert_message").text("Please Enter Password");
        $("#error_alert").toggle(500);

        hide_alert();
    } else {
        $(".login_form_button").prop("disabled", true);
        $(".spinner-text").show();
        $(".log_in_text").hide();
        login(email, password);
    }
}); */

function any_suggestion(e) {
    e.preventDefault();
}

// Set the amount of time (in milliseconds) before the user is considered inactive
var inactivityTime = 180000; // 5 mins

// Set a timer that will trigger after the specified amount of time
var timeoutId = setTimeout(function () {
    // This code will execute when the user has been inactive for the specified amount of time
    //  console.log("User is inactive");
    location.reload();
}, inactivityTime);

$(document).ready(function () {
    $("#first_time_login").submit(function (e) {
        e.preventDefault();
        // alert("clicked");

        //   return false;
        var first_time_user_id = $("#first_time_user_id").val();
        var first_time_voter_id = $("#first_time_voter_id").val();
        var first_time_dob = $("#first_time_dob").val();

        // console.log(first_time_user_id);
        // console.log(first_time_voter_id);
        // console.log(first_time_dob);
        // return false;
        if (
            first_time_user_id === "" ||
            first_time_user_id === null ||
            first_time_voter_id === "" ||
            first_time_voter_id === null ||
            first_time_dob === "" ||
            first_time_dob === null
        ) {
            $("#first_time_error_alert").show();
            $(".first_time_error_alert_message").html("Please Fill All Fields");
            hide_alert();
            return false;
        } else {
            // console.log("fields not empty");
            $(".first_time_log_in_spinner").show();
            $(".first_time_log_in_text").hide();

            $.ajax({
                type: "POST",
                url: "validate-user-details-api",
                datatype: "application/json",
                data: {
                    first_time_user_id: first_time_user_id,
                    first_time_voter_id: first_time_voter_id,
                    first_time_dob: first_time_dob,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);

                    if (response.status == "ok") {
                        $("#success_alert").show();
                        $(".first_time_success_alert_message").html(
                            response.message
                        );

                        user_setup();

                        return false;
                    } else {
                        $(".first_time_log_in_spinner").hide();
                        $(".first_time_log_in_text").show();

                        $(".first_time_error_alert_message").html(
                            response.message
                        );
                        $("#first_time_error_alert").show();
                        hide_alert();
                    }
                },
            });
        }
    });

    $("#user_setup").submit(function (e) {
        e.preventDefault();
        // alert("final step")

        var user_setup_user_id = $("#user_setup_user_id").val();
        var user_setup_user_password = $("#user_setup_user_password").val();
        var user_setup_user_confirm_password = $(
            "#user_setup_user_confirm_password"
        ).val();
        // console.log(user_setup_user_id);
        // console.log(user_setup_user_password);
        // console.log(user_setup_user_confirm_password);
        // return false;

        if (user_setup_user_password != user_setup_user_confirm_password) {
            $("#user_setup_error_alert").show();
            $(".user_setup_error_alert_message").html("Password do not match");
            hide_alert();
            return false;
        } else if (
            user_setup_user_id === "" ||
            user_setup_user_id === null ||
            user_setup_user_password === "" ||
            user_setup_user_password === null ||
            user_setup_user_confirm_password === "" ||
            user_setup_user_confirm_password === null
        ) {
            $("#user_setup_error_alert").show();
            $(".user_setup_error_alert_message").html("Please Fill All Fields");
            hide_alert();
            return false;
        } else {
            $(".user_setup_log_in_spinner").show();
            $(".user_setup_log_in_text").hide();
            $.ajax({
                type: "POST",
                url: "user-setup-password-api",
                datatype: "application/json",
                data: {
                    user_setup_user_id: user_setup_user_id,
                    user_setup_user_password: user_setup_user_password,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);
                    if (response.status == "ok") {
                        location.reload();
                    } else {
                        $(".user_setup_log_in_spinner").hide();
                        $(".user_setup_log_in_text").show();

                        $(".user_setup_error_alert_message").html(
                            response.message
                        );
                        $("#user_setup_error_alert").show();
                        hide_alert();
                        return false;
                    }
                },
            });
        }
    });

    $("#any_suggestion").click(function (e) {
        e.preventDefault();
        // alert("Any suggestion");
        $(".sign_in").text("Please Fill The Form Below");
        $("#any_suggestion").hide();

        $("#login_form").hide();
        $("#sugesstion_form").toggle(500);
    });

    $("#sugesstion_form_login").click(function (e) {
        e.preventDefault();
        $(".sign_in").text("Sign In");
        $("#any_suggestion").toggle(500);
        $("#login_form").toggle(500);
        $("#sugesstion_form").hide();
    });
});

$("#sugesstion_form").submit(function (e) {
    e.preventDefault();

    var mailTopic = $("#mail_topic").val();
    var mailComment = $("#mail_comment").val();

    // if(mailTopic ==)

    $.ajax({
        type: "POST",
        url: "send-mail",
        dataType: "application/json",
        data: {
            mailTopic: mailTopic,
            mailComment: mailComment,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);

            if (response.responseCode == "000") {
                $("#sugesstion_success_alert").show();
                $("#sugesstion_success_alert").$(selector).text();
                response.message;
                hide_alert();
            } else {
                // $("#sugesstion_error_alert").show();
                // $("#sugesstion_error_alert").text(response.message);
                // hide_alert();
                error_alert(response.message, "#sugesstion_error_alert");
            }
        },
    });
});

// $(".log_in_text").hide();
function hide_alert() {
    setTimeout(function () {
        $("#error_alert").hide();
        $(".error_alert_message").hide();
        $("#first_time_error_alert").hide();
        $(".first_time_error_alert_message").hide();
        $("#user_setup_error_alert").hide();
        $(".user_setup_error_alert_message").hide();
        $("#sugesstion_success_alert").hide();
        $("#sugesstion_error_alert").hide();
    }, 5000);
}

function user_setup() {
    $("#login_form").hide();
    $("#first_time_login").hide();
    $("#user_setup").toggle("500");
    $(".sign_in").text("Setup Password");
    $(".spinner-text").hide();

    $("#user_setup_login_form_button").click(function (e) {
        e.preventDefault();

        var user_setup_user_id = $("#user_setup_user_id").val();
        var user_setup_user_password = $("#user_setup_user_password").val();
        var user_setup_user_confirm_password = $(
            "#user_setup_user_confirm_password"
        ).val();
        // console.log(user_setup_user_id);
        // console.log(user_setup_user_password);
        // console.log(user_setup_user_confirm_password);
        // return false;

        if (user_setup_user_password != user_setup_user_confirm_password) {
            $("#user_setup_error_alert").show();
            $(".user_setup_error_alert_message").text("Password do not match");
            hide_alert();
            return false;
        } else if (
            user_setup_user_id == "" ||
            user_setup_user_id == null ||
            user_setup_user_password == "" ||
            user_setup_user_password == null ||
            user_setup_user_confirm_password == "" ||
            user_setup_user_confirm_password == null
        ) {
            $("#user_setup_error_alert").show();
            $(".user_setup_error_alert_message").text("Please Fill All Fields");
            hide_alert();
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "user-setup-password-api",
                datatype: "application/json",
                data: {
                    user_setup_user_id: user_setup_user_id,
                    user_setup_user_password: user_setup_user_password,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);
                    if (response.status == "ok") {
                        location.reload();
                    } else {
                        $("#user_setup_error_alert").show();
                        $(".user_setup_error_alert_message").text(
                            response.message
                        );
                        hide_alert();
                        return false;
                    }
                },
            });
        }
    });
}

function validate_user() {
    $(".sign_in").text("Validate Details");
    $("#login_form").hide();
    $("#first_time_login").toggle("500");
    $(".spinner-text").hide();

    $("#first_time_login_form_button").click(function (e) {
        e.preventDefault();
        // return false;
        var first_time_user_id = $("#first_time_user_id").val();
        var first_time_voter_id = $("#first_time_voter_id").val();
        var first_time_dob = $("#first_time_dob").val();

        // console.log(first_time_user_id);
        // console.log(first_time_voter_id);
        // console.log(first_time_dob);
        // return false;
        if (
            first_time_user_id == "" ||
            first_time_user_id == null ||
            first_time_voter_id == "" ||
            first_time_voter_id == null ||
            first_time_dob == "" ||
            first_time_dob == null
        ) {
            $("#first_time_error_alert").show();
            $(".first_time_error_alert_message").text("Please Fill All Fields");
            hide_alert();
            return false;
        } else {
            // console.log("fields not empty");
            $.ajax({
                type: "POST",
                url: "validate-user-details-api",
                datatype: "application/json",
                data: {
                    first_time_user_id: first_time_user_id,
                    first_time_voter_id: first_time_voter_id,
                    first_time_dob: first_time_dob,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);
                    // return false;

                    if (response.status == "ok") {
                        $("#success_alert").show();
                        $(".first_time_success_alert_message").text(
                            response.message
                        );
                        setTimeout(function () {
                            user_setup();
                        }, 1000);
                    } else {
                        $("#error_alert").show();
                        $(".error_alert_message").text(response.message);
                        hide_alert();
                    }
                },
            });
        }

        // var today = new Date();
        // var nowyear = today.getFullYear();
        // var nowmonth = today.getMonth();
        // var nowday = today.getDate();
        // var b = $("#first_time_dob").val();

        // var birth = new Date(b);
        // console.log(birth);

        // var birthyear = birth.getFullYear();
        // var birthmonth = birth.getMonth();
        // var birthday = birth.getDate();

        // var age = nowyear - birthyear;
        // var age_month = nowmonth - birthmonth;
        // var age_day = nowday - birthday;

        // if (age < 18) {

        //     console.log(age);
        //     $("#first_time_error_alert").show();
        //     $(".first_time_error_alert_message").text(
        //         "Please Select A Valid Date of Birth"
        //     );
        //     hide_alert();

        //     return false;
        // }
    });
}

function login(email, password) {
    // console.log("email=>", email);
    // console.log("password=>", password);
    // return;
    $.ajax({
        type: "POST",
        url: "login-api",
        // url: "./authenticate",
        datatype: "application/json",
        data: {
            user_id: email,
            password: password,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response.data);
            let user_data = response.data;

            // $("#success_alert").append();
            // return false;
            // $("#error_alert").append();
            // $("#success_alert").hide();
            // $("#error_alert").hide();
            if (response.responseCode == "ok") {
                console.log(user_data);
                // console.log(user_data.Active);
                if (user_data.Active == false || user_data.Active == "false") {
                    $("#error_alert").show();
                    // $(".error_alert_message").text(
                    //     "Please Contact National Head for Activation"
                    // );

                    error_alert(
                        "Please Contact National Head for Activation",
                        "#error_alert"
                    );
                    $(".spinner-text").hide();
                    $(".log_in_text").show();
                    $("#login_form_button").attr("disabled", false);

                    hide_alert();
                    return false;
                } else if (
                    user_data.FirstTime == true ||
                    user_data.FirstTime == "true"
                ) {
                    validate_user();
                    // return false;
                }

                // return false;

                // alert(UserMandate);
                // if (UserMandate === "RegionalLevel") {

                // }
                // alert("success");
                // return false;

                // $("#success_alert").show();
                // $("#success_alert").text(response.message);

                window.location = "welcome";
                $("#login_form_button").attr("disabled", true);
            } else {
                console.log(response);
                $("#login_form_button").attr("disabled", false);

                $(".spinner-text").hide();
                $(".log_in_text").show();
                // alert(response.message);
                // $(".error_alert_message").text(response.message);
                // $("#error_alert").show();
                error_alert(response.message, "#error_alert");

                // hide_alert();
            }
        },
        error: function (xhr, status, error) {
            // console.log("Ajax request failed...", xhr);
            console.log("Ajax request failed...", xhr.status);
            console.log("Ajax request failed...", xhr.responseText);
        },
    });
}

$("#login_form_button").click(function (e) {
    e.preventDefault();
    // alert("clicked");
    // return false;

    var email = $("#user_id").val();
    var password = $("#password").val();
    // $(".login_form_button").attr("disabled", true);

    if (email === "" || email === undefined) {
        $("#error_alert").html("Please Enter User Id");
        $("#error_alert").toggle(500);
        setTimeout(() => {
            hide_alert();
        }, 100);
        return false;
    } else if (password === "" || password === undefined) {
        $("#error_alert").html("Please Enter Password");
        $("#error_alert").toggle(500);
        setTimeout(() => {
            hide_alert();
        }, 100);

        return false;
    } else {
        $("#login_form_button").prop("disabled", true);
        $(".spinner-text").show();
        $(".log_in_text").hide();
        login(email, password);
    }
});
