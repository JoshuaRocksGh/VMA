function lovs_list() {
    $.ajax({
        type: "GET",
        url: "../get-lovs-list-api",
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            let title_list = response.data.titleList;
            let country_list = response.data.nationalityList;
            console.log(country_list);
            let id_list = response.data.documentTypeList;
            let residence_list = response.data.residentStatusList;

            console.log(id_list);

            $.each(title_list, function (index) {
                $("#title").append(
                    $("<option>", {
                        value:
                            title_list[index].actualCode +
                            "~" +
                            title_list[index].description,
                    }).text(title_list[index].description)
                );
            });
            $.each(country_list, function (index) {
                // let cList_ = country_list[index].actualCode;
                // let cList = cList_.sort();
                // console.log(cList_);
                $("#country").append(
                    $("<option>", {
                        value:
                            country_list[index].actualCode +
                            "~" +
                            country_list[index].description,
                    }).text(country_list[index].description)
                );
            });

            $.each(residence_list, function (index) {
                $("#residence_status").append(
                    $("<option>", {
                        value:
                            residence_list[index].actualCode +
                            "~" +
                            residence_list[index].description,
                    }).text(residence_list[index].description)
                );
            });

            $.each(id_list, function (index) {
                $("#id_type").append(
                    $("<option>", {
                        value:
                            title_list[index].actualCode +
                            "~" +
                            id_list[index].description,
                    }).text(id_list[index].description)
                );
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                lovs_list();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

$(() => {
    $("#spinner").hide(), $("#spinner-text").hide(), $("#print_receipt").hide();
    $(".mod-open").trigger("click");
    lovs_list();
    $("select").select2();
    $(".display_selected_id_image").hide();
    $(".display_passport_picture").hide();
    $(".display_selfie").hide();

    $("#image_uploads").on("change", function () {
        var file = $("#image_upload[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".display_selected_id_image").attr("src", reader.result);
            };
            reader.readAsDataURL(file);
            reader.onload = function () {
                $(".display_selected_id_image").attr("src", reader.result);
                $("#image_upload_").val(reader.result);
            };
        }

        $(".display_selected_id_image").show();
    });

    $("#previewImgs").on("change", function () {
        var file = $("#previewImg[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".previewImg").attr("src", reader.result);
            };

            reader.readAsDataURL(file);
        }
    });

    // Contact Details Values
    // $("#contact_id_details").on("click", function (e) {
    //     e.preventDefault();
    //     var file = $("input[type=file]").get(0).files[0];

    //     if (file) {
    //         var reader = new FileReader();

    //         reader.onload = function () {
    //             $("#previewImg").attr("src", reader.result);
    //         };

    //         reader.readAsDataURL(file);
    //     }
    // });

    $("#bio_detailss").on("submit", function (e) {
        e.preventDefault();
        // Personal Details
        var title = $("#title").val();
        $("#display_title").text(title);

        var surname = $("#surname").val();
        $("#display_surname").text(surname);

        var firstname = $("#firstname").val();
        $("#display_firstname").text(firstname);

        var othername = $("#othername").val();
        $("#display_othername").text(othername);

        var gender = $("#select_gender input[type='radio']:checked").val();
        $("#display_select_gender").text(gender);

        var birthday = $("#DOB").val();
        $("#display_DOB").text(birthday);

        var birth_place = $("#birth_place").val();
        $("#display_birth_place").text(birth_place);

        var country = $("#country").val();
        var country_info = country.split("~");
        $("#display_country").text(country_info[1]);

        var residence_status = $("#residence_status").val();
        var residence_status_info = residence_status.split("~");
        $("#display_residence_status").text(residence_status_info[1]);

        // Contact & ID Details
        var mobile_number = $("#mobile_number").val();
        $("#display_mobile_number").text(mobile_number);

        var email = $("#email").val();
        $("#display_email").text(email);

        var city = $("#city").val();
        $("#display_city").text(city);

        var town = $("#town").val();
        $("#display_town").text(town);

        var residential_address = $("#residential_address").val();
        $("#display_residential_address").text(residential_address);

        var id_type = $("#id_type").val();
        $("#display_id_type").text(id_type);

        var id_number = $("#id_number").val();
        $("#display_id_number").text(id_number);

        var tin_number = $("#tin_number").val();
        $("#display_tin_number").text(tin_number);

        var issue_date = $("#issue_date").val();
        $("#display_issue_date").text(issue_date);

        var expiry_date = $("#expiry_date").val();
        $("#display_expiry_date").text(expiry_date);

        var file = $("input[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $("#previewImg").attr("src", reader.result);
            };

            reader.readAsDataURL(file);
        }
    });

    // Bio Details

    $("#passport_pictures").change(function () {
        var file = $("#passport_picture[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".display_passport_picture").attr("src", reader.result);
            };

            reader.readAsDataURL(file);

            reader.onload = function () {
                // {{--  alert(reader.result)  --}}

                $(".display_passport_picture").attr("src", reader.result);
                $("#passport_picture_").val(reader.result);
            };
        }
        $(".display_passport_picture").show();
    });

    $("#selfie_uploads").change(function () {
        var file = $("#selfie_upload[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".display_selfie").attr("src", reader.result);
            };

            reader.readAsDataURL(file);

            reader.onload = function () {
                // {{--  alert(reader.result)  --}}
                $(".display_selfie").attr("src", reader.result);
                $("#selfie_upload_").val(reader.result);
            };
        }

        $(".display_selfie").show();
    });

    $("#proof_of_addresss").change(function () {
        var file = $("#proof_of_address[type=file]").get(0).files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                $(".display_proof_of_address").attr("src", reader.result);
            };

            reader.readAsDataURL(file);

            reader.onload = function () {
                // {{--  alert(reader.result)  --}}
                $(".display_proof_of_address").attr("src", reader.result);
                $("#proof_of_address_").val(reader.result);
            };
        }

        $(".display_proof_of_address").show();
    });

    $("#submit1").on("click", (e) => {
        console.log("click");
        if (!document.forms["personal_details"].reportValidity()) {
            return false;
        }
        $("#custom-v-pills-contact-and-id-details-tab").tab("show");
        return true;
    });

    $("#submit2").on("click", (e) => {
        if (!document.forms["contact_id_details"].reportValidity()) {
            return false;
        }
        $("#custom-v-pills-bio-details-tab").tab("show");
        return true;
    });

    $("#final_submit").on("click", (e) => {
        if (!document.forms["bio_details"].reportValidity()) {
            e.preventDefault();
            return false;
        }
        $("#summary-tab").tab("show");
        return true;
    });
    $("#back_to_personal").on("click", (e) => {
        $("#custom-v-pills-personal-details-tab").tab("show");
    });
    $("#back_to_contact").on("click", (e) => {
        $("#custom-v-pills-contact-and-id-details-tab").tab("show");
    });
    $("#back_to_bio").on("click", (e) => {
        $("#custom-v-pills-bio-details-tab").tab("show");
    });
    $("#confirm_submits").on("click", function (e) {
        e.preventDefault();

        // Personal Details
        var title_ = $("#title").val().split("~");
        var title = title_[0];
        $("#display_title").text(title);

        var surname = $("#surname").val();
        $("#display_surname").text(surname);

        var firstname = $("#firstname").val();
        $("#display_firstname").text(firstname);

        var othername = $("#othername").val();
        $("#display_othername").text(othername);

        var gender = $("#select_gender input[type='radio']:checked").val();
        $("#display_select_gender").text(gender);

        var birthday = $("#DOB").val();
        $("#display_DOB").text(birthday);

        var birth_place = $("#birth_place").val();
        $("#display_birth_place").text(birth_place);

        var country = $("#country").val();
        var country_info = country.split("~");
        $("#display_country").text(country_info[1]);
        var country_ = country_info[0];

        var residence_status = $("#residence_status").val();
        var residence_status_info = residence_status.split("~");
        $("#display_residence_status").text(residence_status_info[1]);
        var residence_status_ = residence_status_info[0];

        // Contact & ID Details
        var mobile_number = $("#mobile_number").val();
        $("#display_mobile_number").text(mobile_number);

        var email = $("#email").val();
        $("#display_email").text(email);

        var city = $("#city").val();
        $("#display_city").text(city);

        var town = $("#town").val();
        $("#display_town").text(town);

        var residential_address = $("#residential_address").val();
        $("#display_residential_address").text(residential_address);

        var id_type_ = $("#id_type").val().split("~");
        var id_type = id_type_[0];
        var issueAuthority = id_type_[1];
        $("#display_id_type").text(id_type_[1]);

        var id_number = $("#id_number").val();
        $("#display_id_number").text(id_number);

        var tin_number = $("#tin_number").val();
        $("#display_tin_number").text(tin_number);

        var issue_date = $("#issue_date").val();
        $("#display_issue_date").text(issue_date);

        var expiry_date = $("#expiry_date").val();
        $("#display_expiry_date").text(expiry_date);

        var id_image = $("#image_upload_").val();

        var passport_picture = $("#passport_picture_").val();

        var signed_selfie_paper = $("#selfie_upload_").val();

        var proof_of_address = $("#proof_of_address_").val();

        $.ajax({
            type: "POST",
            url: "../savings-account-creation-api",
            datatype: "application/json",
            data: {
                title: title,
                surname: surname,
                firstname: firstname,
                othername: othername,
                gender: gender,
                birthday: birthday,
                birth_place: birth_place,
                country: country_,
                residence_status: residence_status_,
                mobile_number: mobile_number,
                email: email,
                city: city,
                town: town,
                issueAuthority: issueAuthority,
                residential_address: residential_address,
                id_type: id_type,
                id_number: id_number,
                tin_number: tin_number,
                issue_date: issue_date,
                expiry_date: expiry_date,
                id_image: id_image,
                passport_picture: passport_picture,
                signed_selfie_paper: signed_selfie_paper,
                proof_of_address: proof_of_address,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                var res = JSON.parse(response);
                console.log(res);

                if (res.responseCode == "000") {
                    Swal.fire({
                        title: res.messge,
                        html: `<p>customer Number: ${res.customerNumber}</p>
                <p>Account Number:${res.accountNumber}</p>`,
                        icon: "success",
                    });
                } else {
                    toaster(res.message, "error", 3000);

                    $("#spinner").hide();
                    $("#spinner-text").hide();
                    $("#confirm_submit_text").show(),
                        $("#confirm_submit").attr("disabled", false);
                }
            },
        });
    });
});
