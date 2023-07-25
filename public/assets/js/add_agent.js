// API CALLS

function get_regions() {
    $("#region_spinner").show();
    // var my_region = $("#my_region").val();
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
                $("#agent_region").append(
                    $("<option>", {
                        value: data[index],
                    }).text(data[index])
                );
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_regions();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function get_constituency(region) {
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
            let selectize = $("#agent_constituency").selectize()[0].selectize;
            // console.log(data);
            selectize.clearOptions();

            if (response.status == "ok") {
                $("#constituency_spinner").hide();
                $.each(data, function (index) {
                    // console.log(data[index]);
                    $("#agent_constituency").append(
                        selectize.addOption({
                            value: data[index].name + "~" + data[index].code,
                            text: data[index].name,
                        })
                        // $("<option>", {
                        //     value: data[index].name + "~" + data[index].code,
                        // }).text(data[index].name)
                    );
                });
            } else {
                // setTimeout(function () {
                get_constituency();
                // }, $.ajaxSetup().retryAfter);
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_constituency();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function get_polling_station(constituency) {
    $("#polling_station_spinner").show();
    $.ajax({
        type: "GET",
        url: "get-polling-station-api?constituency=" + constituency,
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            $("#agent_electoral_area").prop("disabled", false);
            $("#agent_electoral_area").css("background", "#fefefe");
            let data = response.data;
            // console.log(data);
            // let selectize = $("#agent_electoral_area").selectize()[0].selectize;
            // console.log(data);
            // selectize.clearOptions();

            // $("#agent_electoral_area option").remove();

            if (response.status == "ok") {
                $("#polling_station_spinner").hide();
                // $("#agent_electoral_area").show();

                $.each(data, function (index) {
                    // console.log(data[index]);
                    $("#agent_electoral_area").append(
                        // selectize.addOption({
                        //     value: data[index].name + "~" + data[index].code,
                        //     text: data[index].name,
                        // })
                        $("<option>", {
                            value: data[index].name + "~" + data[index].code,
                        }).text(data[index].name)
                    );
                });
            } else {
                setTimeout(function () {
                    get_polling_station(constituency);
                }, $.ajaxSetup().retryAfter);
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_polling_station(constituency);
            }, $.ajaxSetup().retryAfter);
        },
    });
}

// $(function () {
//     $("#datepicker").datepicker({
//         changeMonth: true,
//         changeYear: true,
//         showButtonPanel: true,
//         dateFormat: "mm yy",
//         onClose: function (dateText, inst) {
//             $(this).datepicker(
//                 "setDate",
//                 new Date(inst.selectedYear, inst.selectedMonth, 1)
//             );
//         },

//         .on( "change", function() {
//         to.datepicker( "option", "minDate", getDate( this ) );
//       }),
//     to = $( "#toDate" ).datepicker({
//       dateFormat: "yy-mm-dd",
//       changeMonth: true
//     })
//     .on( "change", function() {
//       from.datepicker( "option", "maxDate", getDate( this ) );
//     })

//   function getDate( element ) {
//     var date;
//     var dateFormat = "yy-mm-dd";
//     try {
//       date = $.datepicker.parseDate( dateFormat, element.value );
//     } catch( error ) {
//       date = null;
//     }

//     return date;
//     });
// });

$("#agent_constituency").prop("disabled", true);
$("#agent_constituency").css("background", "#DCDCDC");
$("#agent_electoral_area").prop("disabled", true);
$("#agent_electoral_area").css("background", "#DCDCDC");
$(document).ready(function () {
    setTimeout(function () {
        // alert(my_mandate);
        if (my_mandate == "NationalLevel") {
            get_regions();
        } else if (my_mandate == "RegionalLevel") {
            get_constituency(my_region);
        } else if (my_mandate == "ConstituencyLevel") {
            get_polling_station(my_constituency);
        }
    }, 200);

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
        if (region == "") {
            $("#agent_constituency").prop("disabled", true);
            $("#agent_constituency").css("background", "#DCDCDC");
        }
        console.log(region);
        get_constituency(region);
    });

    $("#agent_constituency").change(function () {
        var con = $(this).val().split("~");
        var constituency = con[1];

        console.log(constituency);
        get_polling_station(constituency);
    });

    function dobValidate(birth) {
        var today = new Date();
        var nowyear = today.getFullYear();
        var nowmonth = today.getMonth();
        var nowday = today.getDate();
        var b = $("#agent_dob").val();

        var birth = new Date(b);

        var birthyear = birth.getFullYear();
        // console.log(birthyear);
        var birthmonth = birth.getMonth();
        // console.log(birthmonth);

        var birthday = birth.getDate();
        // console.log(birthday);

        var age = nowyear - birthyear;
        // console.log("age =>" + age);
        var age_month = nowmonth - birthmonth;
        // console.log("age_month =>" + age_month);

        var age_day = nowday - birthday;
        // console.log("age_day =>" + age_day);

        if (age < 18) {
            Swal.fire(
                "",
                "Agent should be more than 18 years.Please enter a valid Date of Birth",
                "warning"
            );
            $("#agent_submit_form").removeAttr("data-target");
            // return false;
        } else {
        }
    }

    //Confirm Before Postin to api

    $("#agent_submit_form").click(function (e) {
        e.preventDefault();

        // get image form phot uploaded
        var image = $("#image_upload_").val();
        var fname = $("#first_name").val();
        var middile_name = $("#middle_name").val();
        var surname = $("#surname").val();
        var gen = $("#select_gender").val().split("~");
        var gender = gen[1];
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

        // dobValidate(birth);

        var today = new Date();
        var nowyear = today.getFullYear();
        var nowmonth = today.getMonth();
        var nowday = today.getDate();
        var b = $("#agent_dob").val();

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
                "Agent should be more than 18 years.Please enter a valid Date of Birth",
                "warning"
            );

            return false;
        }

        if (telephone_1.replace(/ /g, "").length != 10 || isnum1 === false) {
            toaster("Invalid Phone Number", "error", 5000);
            return false;
        } else if (
            national_id.replace(/ /g, "").length != 10 ||
            isnum_ === false
        ) {
            toaster("Invalid Voter ID Number", "error", 5000);
            return false;
        }
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
            //console.log("fname:", fname);
            //console.log("surname:", surname);
            //console.log("gender:", gender);
            //console.log("dob:", dob);
            //console.log("national_id:", national_id);
            //console.log("telephone_1:", telephone_1);
            //console.log("education_level:", education_level);
            //console.log("year_completion:", year_completion);
            //console.log("agent_region:", agent_region);
            //console.log("agent_electoral_area:", agent_electoral_area);
            //console.log("agent_constituency:", agent_constituency);
            //console.log("insititution_name:", insititution_name);
            // alert("Please fill all required fields");
            // $("#agent_submit_form").removeAttr("data-target");
            toaster("Please fill all required fields", "error", 10000);
        } else {
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
            $("#agent_submit_form").attr({
                "data-target": "#bs-example-modal-lg",
                "data-toggle": "modal",
            });
        }
    });

    //POST TO API
    $("#confirm_agent").click(function (e) {
        e.preventDefault();
        // alert("clicked");
        // return false;
        var id_image = $("#image_upload_").val();

        var first_name = $("#first_name").val();

        var middile_name = $("#middle_name").val();

        var surname = $("#surname").val();

        var gen = $("#select_gender").val().split("~");
        var gender = gen[1];

        var dob = $("#agent_dob").val();

        var national_id = $("#id_number").val();

        var telephone_1 = $("#telephone_number_1").val();

        var telephone_2 = $("#telephone_number_2").val();

        var telephone_3 = $("#telephone_number_3").val();

        var insititution_name = $("#institution_name").val();

        var education_level = $("#educational_level").val();

        var year_completion = $("#completion_year").val();

        var agent_region = $("#agent_region").val();

        var agent_electoral_area = $("#agent_electoral_area").val();
        // var agent_electoral_area = agent_elec_area[1];
        console.log(agent_electoral_area);

        var agent_con = $("#agent_constituency").val().split("~");
        var agent_constituency = agent_con[0];

        function page_reload() {
            location.reload();

            // window.location.href = "{{ url('add-agent') }}";
        }
        $("#confirm_agent").prop("disabled", true);
        $(".spinner-text").show();
        $(".agent_text").hide();
        $.ajax({
            type: "POST",
            url: "create-agent-api",
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
                // console.log(response);
                //console.log(JSON.stringify(response.message));
                let data = response.message;
                if (response.status == "ok") {
                    Swal.fire(response.message, "", "success");
                    $(".spinner-text").hide();
                    $(".agent_text").show();
                    // redirect_page();
                    setTimeout(function () {
                        page_reload();
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
        });
    });
});
