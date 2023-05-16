// $("#edit_form").hide();

function get_regions() {
    let region = $("#agent_region_").val();
    $("#region_spinner").show();
    $.ajax({
        type: "GET",
        url: "get-regions-api",
        datatype: "application/json",
        success: function (response) {
            // console.log(response);
            $("#region_spinner").hide();

            let data = response.data;
            // console.log("===");
            // console.log(data);

            $.each(data, function (index) {
                // console.log(data[index]);
                if (region == data[index]) {
                    $("#agent_region").append(
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
    });
}

function get_constituency(region) {
    let constituency_ = $("#agent_constituency_").val();
    $("#constituency_spinner").show();
    $.ajax({
        type: "GET",
        url: "get-constituency-api?region=" + region,
        datatype: "application/json",
        success: function (response) {
            // console.log(response);
            $("#agent_constituency").prop("disabled", false);
            $("#agent_constituency").css("background", "#fefefe");
            let data = response.data;
            // let selectize = $("#agent_constituency").selectize()[0].selectize;
            // console.log(data);
            // selectize.clearOptions();
            // console.log(data);
            $("#agent_constituency option").remove();

            if (response.status == "ok") {
                $("#constituency_spinner").hide();
                $.each(data, function (index) {
                    console.log(data[index]);
                    if (constituency_ == data[index].name) {
                        $("#agent_constituency").append(
                            // selectize.getOption({
                            //     value:
                            //         data[index].name + "~" + data[index].code,
                            //     text: data[index].name,
                            // })
                            $("<option selected>", {
                                value:
                                    data[index].name + "~" + data[index].code,
                            }).text(data[index].name)
                        );
                    } else {
                        $("#agent_constituency").append(
                            $("<option>", {
                                value:
                                    data[index].name + "~" + data[index].code,
                            }).text(data[index].name)
                        );
                    }
                });
            }
        },
    });
}

function get_polling_station(constituency) {
    let polling_station = $("#electoral_area_").val();
    $("#polling_station_spinner").show();
    $.ajax({
        type: "GET",
        url: "get-polling-station-api?constituency=" + constituency,
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            let data = response.data;
            // console.log(data);

            $("#agent_electoral_area option").remove();

            if (response.status == "ok") {
                $("#agent_electoral_area").prop("disabled", false);
                $("#agent_electoral_area").css("background", "#fefefe");
                $("#polling_station_spinner").hide();
                $.each(data, function (index) {
                    console.log(data[index]);
                    if (polling_station == data[index].code) {
                        $("#agent_electoral_area").append(
                            $("<option selected>", {
                                value:
                                    data[index].name + "~" + data[index].code,
                            }).text(data[index].name)
                        );
                    } else {
                        $("#agent_electoral_area").append(
                            $("<option>", {
                                value:
                                    data[index].name + "~" + data[index].code,
                            }).text(data[index].name)
                        );
                    }
                });
            }
        },
    });
}

$("#search_agent_button").click(function (e) {
    e.preventDefault();
    $("#search_agent_button").prop("disabled", true);

    $("#edit_spinner").toggle("500");
    $("#new_agent_form").hide();
    var phone_number = $("#phone_number").val();
    var isnum1 = /^\d+$/.test(phone_number);

    if (phone_number.replace(/ /g, "").length != 10 || isnum1 === false) {
        Swal.fire("", "Invalid User ID", "warning");
        $("#edit_spinner").hide();
        $("#new_agent_form").toggle("500");
        $("#search_agent_button").prop("disabled", false);

        // return false;
    } else {
        // alert("clicked");
        $.ajax({
            type: "POST",
            url: "get-agent-details",
            datatype: "application/json",
            data: {
                phone_number: phone_number,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response.data);
                if (response.status == "ok") {
                    $("#new_agent_form").toggle("500");
                    $("#edit_spinner").hide();

                    let data = response.data;
                    $.each(data, function (index) {
                        // console.log(data[index]);

                        $("#first_name").val(data[index].Fname);
                        $("#middle_name").val(data[index].MiddleName);
                        $("#surname").val(data[index].SurName);
                        $("#telephone_number_1").val(
                            data[index].phoneNumber[0]
                        );
                        $("#telephone_number_2").val(
                            data[index].phoneNumber[1]
                        );
                        $("#telephone_number_3").val(
                            data[index].phoneNumber[2]
                        );

                        $("#id_number").val(data[index].Id);
                        $("#institution_name").val(data[index].Institution);
                        $(".display_selected_id_image").attr(
                            "src",
                            data[index].Picture
                        );
                        $("#image_upload_").val(data[index].Picture);

                        $("#agent_dob").val(data[index].DOB);
                        $("#completion_year").val(data[index].YearOfCompletion);

                        $("#select_gender").val(data[index].Gender);

                        $("#educational_level").val(
                            data[index].EducationalLevel
                        );

                        // var GENDER = data[index].Gender;
                        // if (GENDER == "Male") {

                        // }
                        // $("#birth_month")
                        //     .val(data[index].Gender)
                        //     .attr("selected", "selected");

                        var REGION = data[index].Region;
                        $("#agent_region_").val(REGION);

                        var CONSTITUENCY = data[index].Constituency;
                        $("#agent_constituency_").val(CONSTITUENCY);

                        var POLLING_STATION = data[index].ElectoralArea;
                        $("#electoral_area_").val(POLLING_STATION);

                        var quick_test = $("#agent_region_").val(REGION);
                        if (quick_test != "" || quick_test != undefined) {
                            get_regions();
                            var region = $("#agent_region_").val();
                            get_constituency(region);
                            var constituency = $("#agent_constituency_").val();
                            get_polling_station(constituency);
                        }

                        var GENDER = data[index].Gender;
                        $("#gender_").val(GENDER);
                        let gender = $("#gender_").val();

                        // if (gender == data[index].Gender) {
                        //     $("#select_gender").append(
                        //         $("<option selected>", {
                        //             value:
                        //                 title_list[index].description +
                        //                 "~" +
                        //                 title_list[index].actualCode,
                        //         }).text(title_list[index].description)
                        //     );
                        // }
                    });
                } else {
                    Swal.fire(response.message, "", "warning");
                    $("#search_agent_button").prop("disabled", false);
                    $("#edit_spinner").hide();
                    $("#new_agent_form").toggle("500");

                    return false;
                }
            },
        });
    }
});

$("#agent_constituency").prop("disabled", true);
$("#agent_constituency").css("background", "#DCDCDC");
$("#id_number").prop("disabled", true);
$("#id_number").css("background", "#DCDCDC");
$("#telephone_number_1").prop("disabled", true);
$("#telephone_number_1").css("background", "#DCDCDC");
$("#agent_electoral_area").prop("disabled", true);
$("#agent_electoral_area").css("background", "#DCDCDC");

$(document).ready(function () {
    // setTimeout(function () {
    // }, 5000);

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

    $("#image_upload").change(function () {
        var file = $("#image_upload[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".display_selected_id_image").attr("src", reader.result);
            };

            reader.readAsDataURL(file);

            reader.onload = function () {
                // {{--  alert(reader.result)  --}}
                $(".display_selected_id_image").attr("src", reader.result);
                $("#image_upload_").val(reader.result);
            };
        }

        $(".display_selected_id_image").show();
    });

    $("#agent_region").change(function () {
        var region = $(this).val();
        // if (region == "") {
        //     $("#agent_constituency").prop("disabled", true);
        //     $("#agent_constituency").css("background", "#DCDCDC");
        // }
        // console.log(region);
        get_constituency(region);
    });

    $("#agent_constituency").change(function () {
        var con = $(this).val().split("~");
        var constituency = con[1];

        // console.log(constituency);
        get_polling_station(constituency);
    });

    $("#agent_submit_form").click(function (e) {
        e.preventDefault();

        // get image form phot uploaded
        var image = $("#image_upload_").val();
        var fname = $("#first_name").val();
        var middile_name = $("#middle_name").val();
        var surname = $("#surname").val();
        var gender = $("#select_gender").val();
        // var gender = gen[1];
        var dob = $("#agent_dob").val();
        var national_id = $("#id_number").val();
        var telephone_1 = $("#telephone_number_1").val();
        var telephone_2 = $("#telephone_number_2").val();
        var telephone_3 = $("#telephone_number_3").val();
        var insititution_name = $("#institution_name").val();
        var education_level = $("#educational_level").val();
        var year_completion = $("#completion_year").val();
        var agent_region = $("#agent_region").val();
        var agent_elec_area = $("#agent_electoral_area").val().split("~");
        var agent_electoral_area = agent_elec_area[0];
        var agent_cons = $("#agent_constituency").val().split("~");
        var agent_constituency = agent_cons[1];
        var birth = $("#agent_dob").val();
        var isnum1 = /^\d+$/.test(telephone_1);
        var isnum2 = /^\d+$/.test(telephone_2);
        var isnum_ = /^\d+$/.test(national_id);

        if (
            fname == "" ||
            surname == "" ||
            gender == "" ||
            dob == "" ||
            national_id == "" ||
            telephone_1 == "" ||
            education_level == "" ||
            year_completion == "" ||
            agent_region == "" ||
            agent_electoral_area == "" ||
            agent_constituency == "" ||
            insititution_name == ""
        ) {
            // alert("Please fill all required fields");
            $("#agent_submit_form").removeAttr("data-target");
            toaster("Please fill all required fields", "error", 10000);
        } else {
            $("#display_selected_id_image").text();
            $("#display_first_name").text(fname);
            $("#display_middle_name").text(middile_name);
            $("#display_surname").text(surname);
            $("#display_gender").text(gender);
            $("#display_id_number").text(national_id);
            $("#display_dob").text(dob);
            $("#display_phone_number_1").text(telephone_1);
            $("#display_phone_number_2").text(telephone_2);
            $("#display_phone_number_3").text(telephone_3);
            $("#display_institution_name").text(insititution_name);
            $("#display_educational_level").text(education_level);
            $("#display_completion_year").text(year_completion);
            $("#display_agent_region").text(agent_region);
            $("#display_agent_constituency").text(agent_constituency);
            $("#display_agent_electoral_area").text(agent_electoral_area);
        }
    });

    //POST TO API
    $("#confirm_agent").click(function (e) {
        e.preventDefault();
        // alert("clicked");

        var id_image = $("#image_upload_").val();

        var first_name = $("#first_name").val();

        var middile_name = $("#middle_name").val();

        var surname = $("#surname").val();

        var gender = $("#select_gender").val();
        // var gender = gen[1];

        var dob = $("#agent_dob").val();

        var national_id = $("#id_number").val();

        var telephone_1 = $("#telephone_number_1").val();

        var telephone_2 = $("#telephone_number_2").val();

        var telephone_3 = $("#telephone_number_3").val();

        var insititution_name = $("#institution_name").val();

        var education_level = $("#educational_level").val();

        var year_completion = $("#completion_year").val();

        var agent_region = $("#agent_region").val();

        var agent_elec_area = $("#agent_electoral_area").val().split("~");
        var agent_electoral_area = agent_elec_area[1];

        var agent_con = $("#agent_constituency").val().split("~");
        var agent_constituency = agent_con[0];

        function redirect_page() {
            window.location.href = "{{ url('add-agent') }}";
        }

        $("#confirm_agent").prop("disabled", true);
        $(".spinner-text").show();
        $(".agent_text").hide();

        $.ajax({
            type: "POST",
            url: "edit-agent-api",
            datatype: "application/json",
            data: {
                Id: national_id,
                PhoneNumber1: telephone_1,
                PhoneNumber2: telephone_2,
                PhoneNumber3: telephone_3,
                Fname: first_name,
                MiddleName: middile_name,
                SurName: surname,
                DOB: dob,
                Picture: id_image,
                Region: agent_region,
                Constituency: agent_constituency,
                ElectoralArea: agent_electoral_area,
                EducationalLevel: education_level,
                Institution: insititution_name,
                YearOfCompletion: year_completion,
                Gender: gender,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);

                if (response.status == "ok") {
                    Swal.fire(response.message, "", "success");
                    // redirect_page();
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else {
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
                    //console.log(validation_error_message);

                    toaster(validation_error_message, "error", 10000);
                    $("#confirm_agent").prop("disabled", false);
                    $(".spinner-text").hide();
                    $(".agent_text").show();
                }
            },
            error: function (xhr) {
                // $("#validation-errors").html("");
                $.each(xhr.responseJSON.errors, function (key, value) {
                    // $("#validation-errors").append(
                    //     '<div class="alert alert-danger">' + value + "</div"
                    // );

                    toaster(value, "error", 10000);
                });
            },
        });
    });
});
