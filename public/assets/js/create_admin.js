function get_regions() {
    $.ajax({
        type: "GET",
        url: "get-regions-api",
        datatype: "application/json",
        success: function (response) {
            console.log(response);

            let data = response.data;

            $.each(data, function (index) {
                var this_name = $("#my_region_name").val();
                if (this_name == data[index]) {
                    $("#agent_region ").append(
                        $("<option selected>", {
                            value: data[index],
                        }).text(data[index])
                    );
                } else {
                    $("#agent_region").append(
                        $("<option>", {
                            value: data[index],
                        }).text(data[index])
                    );
                }
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_regions();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

// function get_unassigned_regions() {
//     $.ajax({
//         type: "GET",
//         url: "get-unassigned-regions-api",
//         datatype: "application/json",
//         success: function (response) {

//             let data = response.data.unAssigned;

//             $.each(data, function (index) {
//                 var this_name = $("#my_region_name").val();
//                 if (this_name == data[index]) {
//                     $("#agent_region ").append(
//                         $("<option selected>", {
//                             value: data[index].code,
//                         }).text(data[index].code)
//                     );
//                 } else {
//                     $("#agent_region").append(
//                         $("<option>", {
//                             value: data[index].code,
//                         }).text(data[index].code)
//                     );
//                 }
//             });
//         },
//         error: function (xhr, status, error) {
//             setTimeout(function () {
//                 get_unassigned_regions();
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

$("#agent_constituency").prop("disabled", true);
$("#agent_constituency").css("background", "#DCDCDC");

function get_constituency(region) {
    $("#constituency_spinner").show();
    $.ajax({
        type: "GET",
        url: "get-constituency-api?region=" + region,
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            let data = response.data;
            // console.log(data);
            $("#agent_constituency option").remove();
            if (response.status == "ok") {
                $("#agent_constituency").prop("disabled", false);
                $("#agent_constituency").css("background", "#fefefe");
                $("#constituency_spinner").hide();
                $.each(data, function (index) {
                    // console.log(data[index]);
                    $("#agent_constituency").append(
                        $("<option>", {
                            value: data[index].name + "~" + data[index].code,
                        }).text(data[index].name)
                    );
                });
            }
        },
    });
}
function toaster(message, icon, timer) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: false,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon: icon,
        title: message,
    });
}

// $("#agent_region").prop("disabled", true);
// $("#agent_region").css("background", "#DCDCDC");

function dont_call_constituency() {
    $("#constituency_spinner").hide();

    $("#agent_constituency").prop("disabled", true);
    $("#agent_constituency").css("background", "#DCDCDC");
}

$(document).ready(function () {
    //call functions
    setTimeout(function () {
        if (my_mandate == "RegionalLevel") {
            get_regions();

            get_constituency(my_region);
        } else if (my_mandate == "NationalLevel") {
            // get_unassigned_regions();
            get_regions();
        }
    }, 200);

    // $("#agent_region").selectpicker();

    // $("#agent_region").select2({
    //     placeholder: "Select Country",
    //     allowClear: true,
    // });

    //  $("#agent_region").chosen();

    // $(".agent_select select").selectpicker();

    $("#user_telephone_number").keyup(function () {
        $("#admin_user_id").val($(this).val());
    });

    /*$("#user_mandate").change(function () {
        var user_mandate = $(this).val();
        console.log(user_mandate);



        if (my_mandate == "NationalLevel") {
            if (user_mandate === "NationalLevel") {
                $("#agent_region").prop("disabled", true);
                $("#agent_region").css("background", "#DCDCDC");
                $("#agent_constituency").prop("disabled", true);
                $("#agent_constituency").css("background", "#DCDCDC");
                return;
            } else if (user_mandate === "RegionalLevel") {
                $("#agent_region").prop("disabled", false);
                $("#agent_region").css("background", "#FFFFFF");
                $("#constituency_spinner").hide();

                $("#agent_constituency").prop("disabled", true);
                $("#agent_constituency").css("background", "#DCDCDC");
                toaster("Please Select Region of User", "info", 10000);
                return;
            } else if (user_mandate === "ConstituencyLevel") {
                $("#agent_region").prop("disabled", false);


                $("#agent_region").change(function () {
                    var region = $(this).val();
                    $("#agent_constituency").prop("disabled", true);
                    $("#agent_constituency").css("background", "#DCDCDC");

                    console.log(region);
                    get_constituency(region);
                });
                toaster(
                    "Please Select Region and Constituency of User",
                    "info",
                    10000
                );
                return;
            } else {
                return;
            }
        } else if (my_mandate == "RegionalLevel") {
            if (user_mandate === "ConstituencyLevel") {
                $("#agent_constituency").prop("disabled", false);
                $("#agent_constituency").css("background", "#FFFFFF");

                //console.log(my_region);
                get_constituency(my_region);
            } else {
                $("#agent_constituency").prop("disabled", true);
                $("#agent_constituency").css("background", "#DCDCDC");
            }
        } else {
            return false;
        }
    }); */

    $("#create_admin").click(function (e) {
        e.preventDefault();
        // alert("Admin create");

        var first_name = $("#user_first_name").val(); //yes
        var last_name = $("#user_last_name").val(); //yes
        var middle_name = $("#user_middle_name").val(); //yes
        var dob = $("#user_dob").val(); //yes
        var phone_number = $("#user_telephone_number").val();
        var secondary_phone_number = $("#user_telephone_number_2").val(); //yes
        var other_phone_number = $("#user_telephone_number_3").val(); //yes
        var voters_id = $("#user_voters_id").val(); //yes
        var gender = $("#select_gender").val(); //yes
        var user_mandate = $("#user_mandate").val(); //yes
        var user_region = $("#agent_region").val(); //yes
        var user_constituency = $("#agent_constituency").val(); //yes
        var admin_id = $("#admin_user_id").val(); //yes
        var admin_password = $("#admin_password").val();
        var confirm_admin_password = $("#confirm_admin_password").val();
        var isnum = /^\d+$/.test(phone_number);
        var isnum_ = /^\d+$/.test(voters_id);

        // dobValidate(birth);

        var today = new Date();
        var nowyear = today.getFullYear();
        var nowmonth = today.getMonth();
        var nowday = today.getDate();
        var b = $("#user_dob").val();

        var birth = new Date(b);

        var birthyear = birth.getFullYear();
        var birthmonth = birth.getMonth();
        var birthday = birth.getDate();

        var age = nowyear - birthyear;
        var age_month = nowmonth - birthmonth;
        var age_day = nowday - birthday;

        if (age < 18) {
            // $("#agent_submit_form").removeAttr("data-target");
            Swal.fire(
                "",
                "User should be more than 18 years.Please enter a valid Date of Birth",
                "warning"
            );

            return false;
        } else if (
            phone_number.replace(/ /g, "").length != 10 ||
            isnum === false
        ) {
            toaster("Invalid Phone Number", "error", 5000);
            return false;
        } else if (
            voters_id.replace(/ /g, "").length != 10 ||
            isnum_ === false
        ) {
            toaster("Invalid Voter ID Number", "error", 5000);
            return false;
            // } else if (user_mandate === "RegionalLevel") {
            //     toaster("Region of User Required", "error", 5000);
            //     return false;
        } else if (
            user_mandate === "ConstituencyLevel" &&
            user_region == "" &&
            user_constituency == ""
        ) {
            toaster("Region and Constituency of User", "error", 5000);
            return false;
        } else if (user_mandate === "ConstituencyLevel" && user_region == "") {
            toaster("Region of User Required", 5000);
            return false;
        } else if (
            user_mandate === "ConstituencyLevel" &&
            user_constituency == ""
        ) {
            toaster("Constituency of User Required", "error", 5000);
            return false;
        } else if (
            first_name.trim() == "" ||
            last_name.trim() == "" ||
            user_mandate.trim() == "" ||
            gender.trim() == ""
        ) {
            toaster("Mandatory Fields Required", "error", 5000);
            return false;
        } else if (admin_password == confirm_admin_password) {
            $(".log_in_text").hide();
            $(".spinner-text").show();
            $("#create_admin").attr("disabled", true);
            $.ajax({
                type: "POST",
                url: "create-admin-user-api",
                datatype: "application/json",
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    phone_number: phone_number,
                    voters_id: voters_id,
                    user_mandate: user_mandate,
                    user_region: user_region,
                    user_constituency: user_constituency,
                    admin_id: admin_id,
                    admin_password: confirm_admin_password,
                    middle_name: middle_name,
                    dob: dob,
                    secondary_phone_number: secondary_phone_number,
                    other_phone_number: other_phone_number,
                    gender: gender,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    let data = response.message;

                    console.log(response);
                    if (response.status == "ok") {
                        Swal.fire(response.message, "", "success");
                        setTimeout(function () {
                            location.reload();
                        }, 2000);

                        // window.location = "home";
                        $(".log_in_text").show();
                        $(".spinner-text").hide();
                        $("#create_admin").attr("disabled", true);
                    } else {
                        $(".log_in_text").show();
                        $(".spinner-text").hide();
                        $("#create_admin").attr("disabled", false);
                        var validation_error_message = "<ul>";
                        // $("#bs-example-modal-lg").hide();
                        $.each(data, function (index) {
                            string = JSON.stringify(data[index]).replace(
                                /[\[\]']+/g,
                                ""
                            );
                            new_string = string.replace(/^"|"$/g, "");
                            validation_error_message += `<li class="text-danger">${new_string}</li>`;
                        });

                        validation_error_message += "</ul>";
                        toaster(validation_error_message, "error", 10000);
                    }
                },
            });
        } else {
            toaster("Passwords do not match", "error", 5000);
            $(".log_in_text").show();
            $(".spinner-text").hide();
            $("#create_admin").attr("disabled", false);
        }
    });
});
