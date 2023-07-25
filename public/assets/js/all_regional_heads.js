function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

function get_all_regional_list() {
    $.ajax({
        type: "GET",
        url: "get-all-regional-heads-list",
        datatype: "application/json",
        success: function (response) {
            console.log("regional list=>", response);

            let data = response.data;

            // console.log("data=>", data);

            let count = 1;

            // let user_detail = new Array();

            if (response.status == "ok") {
                // $(".all_regional_heads_list tbody").remove();

                var table = $(".all_regional_heads_list").DataTable();

                var nodes = table.rows().nodes();
                $(".all_reported_issues_list tr").remove();

                $("#user_list_spinner").hide();
                $("#all_regional_heads").toggle("500");
                $.each(data, function (index) {
                    //console.log("regional list=>", data[index]);

                    // user_detail.push(JSON.stringify(data[index]));

                    //console.log("user_detail=>", user_detail);
                    // return false;

                    if (
                        data[index].Picture == "" ||
                        data[index].Picture == null
                    ) {
                        var user_image = "assets/images/agent-user.png";
                    } else {
                        var user_image = data[index]?.Picture;
                    }
                    let user_id = data[index]?.Username;
                    var image = data[index]?.Picture;
                    var name = data[index]?.Fname + " " + data[index]?.SurName;
                    var image_name =
                        `<span style="width: 14px;">
                            <img src="${user_image}" alt="contact-img" title="contact-img" class=" img-fluid rounded-circle avatar-sm" style="width:40px;height:40px" />
                         </span>` +
                        " " +
                        " " +
                        name;
                    // let button = ;
                    table.row
                        .add([
                            `<b >${count++}</b>`,
                            `<b>${image_name}</b>`,
                            `<b>${data[index].PhoneNumber}</b>`,
                            `<b>${data[index].Username}</b>`,
                            `<b>${data[index].Region}</b>`,
                            `<a href="#"  type="button"  class="btn btn-outline-info waves-effect waves-light all_regional_list_action"
                            user-image="${data[index].Picture}" data-user-id="${data[index].Username}" user-name="${name}" user-phoneNumber="${data[index].PhoneNumber}" user-id="${user_id}" user-region="${data[index].Region}" user-mandate="${data[index].UserMandate}"
                            >More Actions</a>`,
                        ])
                        .draw();

                    /* $(".user_buttons").append(

                            `
                    );
                    $(".user_image_id").append(
                        `
                            <img src=${image} alt="image"
                                        class="img-fluid avatar-xxl rounded-circle" />
                        `
                    ); */
                });

                $(".all_regional_heads_list").on(
                    "click",
                    ".all_regional_list_action",
                    function (e) {
                        const editButton = e.currentTarget;
                        const userDetail = data.find(
                            (e) =>
                                e.Username ===
                                $(editButton).attr("data-user-id")
                        );
                        // console.log(userDetail);
                        // console.log(data);
                        // return false;
                        $(".users_name").text(
                            userDetail.SurName + " " + userDetail.Fname
                        );
                        $(".user_telephone").text(userDetail.PhoneNumber);
                        $(".user_mandate").text(userDetail.UserMandate);
                        $(".user_region").text(userDetail.Region);
                        $(".user_id").text(userDetail.Username);
                        if (
                            userDetail.Picture == "" ||
                            userDetail.Picture == null
                        ) {
                            $(".user_image_id").attr(
                                "src",
                                "assets/images/agent-user.png"
                            );
                        } else {
                            $(".user_image_id").attr("src", userDetail.Picture);
                        }

                        $(".user_reset_password").attr(
                            "href",
                            "reset-password?userId=" + userDetail.Username
                        );

                        $(".user_forgot_password").attr(
                            "href",
                            "forgot-password?userId=" + userDetail.Username
                        );

                        if (userDetail.Active != true) {
                            $(".activate_deactivate_user").html("Activate");
                            $(".user_delete").attr(
                                "href",
                                "activate-user?userId=" + userDetail.Username
                            );
                        } else {
                            $(".activate_deactivate_user").html("De-Activate");
                            $(".user_delete").attr(
                                "href",
                                "de_activate-user?userId=" + userDetail.Username
                            );
                        }
                        $(".all_regional_list_action").attr({
                            "data-toggle": "modal",
                            "data-target": "#bs-example-modal-lg",
                        });

                        // console.log(
                        //     $(".all_regional_list_action").getAttribute(
                        //         "user-name"
                        //     )
                        // );

                        //return false;
                        // const beneficiaryData = user_id.find(
                        //     (e) =>
                        //         e.user_id ==
                        //         $(".all_regional_list_action").addEventListener(
                        //             "user-id"
                        //         )
                        // );
                    }
                );

                return;

                let editButtons = document.querySelectorAll(
                    ".all_regional_list_action"
                );

                editButtons.forEach((button) => {
                    button.addEventListener("click", (e) => {
                        const editButton = e.currentTarget;
                        const userDetail = data.find(
                            (e) =>
                                e.Username ===
                                $(editButton).attr("data-user-id")
                        );
                        console.log(userDetail);
                        // console.log(data);
                        // return false;
                        $(".users_name").text(
                            userDetail.SurName + " " + userDetail.Fname
                        );
                        $(".user_telephone").text(userDetail.PhoneNumber);
                        $(".user_mandate").text(userDetail.UserMandate);
                        $(".user_region").text(userDetail.Region);
                        $(".user_id").text(userDetail.Username);
                        if (
                            userDetail.Picture == "" ||
                            userDetail.Picture == null
                        ) {
                            $(".user_image_id").attr(
                                "src",
                                "assets/images/agent-user.png"
                            );
                        } else {
                            $(".user_image_id").attr("src", userDetail.Picture);
                        }

                        $(".user_reset_password").attr(
                            "href",
                            "reset-password?userId=" + userDetail.Username
                        );

                        $(".user_forgot_password").attr(
                            "href",
                            "forgot-password?userId=" + userDetail.Username
                        );

                        if (userDetail.Active != true) {
                            $(".activate_deactivate_user").html("Activate");
                            $(".user_delete").attr(
                                "href",
                                "activate-user?userId=" + userDetail.Username
                            );
                        } else {
                            $(".activate_deactivate_user").html("De-Activate");
                            $(".user_delete").attr(
                                "href",
                                "de_activate-user?userId=" + userDetail.Username
                            );
                        }
                        $(".all_regional_list_action").attr({
                            "data-toggle": "modal",
                            "data-target": "#bs-example-modal-lg",
                        });

                        // console.log(
                        //     $(".all_regional_list_action").getAttribute(
                        //         "user-name"
                        //     )
                        // );

                        //return false;
                        // const beneficiaryData = user_id.find(
                        //     (e) =>
                        //         e.user_id ==
                        //         $(".all_regional_list_action").addEventListener(
                        //             "user-id"
                        //         )
                        // );
                    });
                });

                /* $(".all_regional_list_action").click((e) => {
                    e.preventDefault();

                    var details = $(".all_regional_list_action").attr(
                        "user-detail"
                    );

                    console.log(JSON.parse(details));

                    return false;

                    var name = $(".all_regional_list_action").attr("data-name");
                    var PhoneNumber = $(".all_regional_list_action").attr(
                        "user-telephone"
                    );
                    var UserMandate = $(".all_regional_list_action").attr(
                        "user-mandate"
                    );
                    var Region = $(".all_regional_list_action").attr(
                        "user-region"
                    );
                    var Username = $(".all_regional_list_action").attr(
                        "user-id"
                    );

                    $(".users_name").text(name);
                    $(".user_telephone").text(PhoneNumber);
                    $(".user_mandate").text(UserMandate);
                    $(".user_region").text(Region);
                    $(".user_id").text(Username);
                });  */
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_all_regional_list();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

setTimeout(() => {
    get_all_regional_list();
}, 500);

$(document).ready(function () {
    // document.addEventListener("touchstart", handler, { passive: true });

    function get_user_deatil(detail) {
        console.log(detail);
    }

    $(".user_reset_password").click(function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        console.log("this url=>", url);
        // return;

        $.ajax({
            type: "get",
            url: url,
            datatype: "application/json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("response=>,", response);
                if (response.status == "ok") {
                    toaster(response.message, "success", 10000);
                } else {
                    toaster(response.message, "error", 10000);
                }
            },
        });
    });

    $(".user_forgot_password").click(function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        console.log("this url=>", url);
        // return;

        $.ajax({
            type: "get",
            url: url,
            datatype: "application/json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("response=>,", response);
                if (response.status == "ok") {
                    toaster(response.message, "success", 10000);
                } else {
                    toaster(response.message, "error", 10000);
                }
            },
        });
    });

    $(".user_delete").click(function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        console.log("this url=>", url);
        // return;

        $.ajax({
            type: "get",
            url: url,
            datatype: "application/json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("response=>,", response);
                if (response.status == "ok") {
                    toaster(response.message, "success", 10000);
                } else {
                    toaster(response.message, "error", 10000);
                }
            },
        });
    });
});
