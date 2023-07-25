function get_all_agents(my_mandate, my_region, my_constituency) {
    // console.log(AgentDetail);
    // alert(my_mandate);
    // return false;

    var table = $(".all_agent_list").DataTable();
    var nodes = table.rows().nodes();
    // let data = AgentDetail;
    $.ajax({
        type: "GET",
        url: "all-agents-list-api",
        datatype: "application/json",
        success: function (response) {
            // console.log(response);
            // return false;
            let data = response.data;
            if (response.status == "ok") {
                let count = 1;
                $("#agent_list_spinner").hide();
                $("#data_table_view").toggle("500");
                if (my_mandate == "NationalLevel") {
                    let data = response.data;

                    $.each(data, function (index) {
                        // console.log("agent-list", data[index]);

                        table.row
                            .add([
                                `<td style="width: 14px;">
                                                        <img src=${data[index].Picture} alt="contact-img" title="contact-img" class="rounded-circle img-fluid avatar-sm" style="width:10px;height:10px"/>
                                                    </td>`,
                                data[index].Fname + " " + data[index].SurName,
                                data[index].Region,
                                data[index].Constituency,
                                data[index].ElectoralArea,
                                data[index].Gender,
                            ])
                            .draw(false);
                    });
                } else if (my_mandate == "RegionalLevel") {
                    let data = response.data;

                    $.each(data, function (index) {
                        // alert(my_region);
                        // return false;
                        if (data[index].Region == my_region) {
                            table.row
                                .add([
                                    `<td style="width: 14px;">
                                                        <img src=${data[index].Picture} alt="contact-img" title="contact-img" class="rounded-circle img-fluid avatar-sm" style="width:20px;height:20px"/>
                                                    </td>`,
                                    data[index].Fname +
                                        " " +
                                        data[index].SurName,
                                    data[index].Region,
                                    data[index].Constituency,
                                    data[index].ElectoralArea,
                                    data[index].Gender,
                                ])
                                .draw(false);
                        }
                    });
                } else if (my_mandate == "ConstituencyLevel") {
                    $.each(data, function (index) {
                        if (data[index].Constituency == my_constituency) {
                            console.log(data[index]);

                            if (
                                data[index].Picture == "" ||
                                data[index].Picture == null
                            ) {
                                var user_image = "assets/images/agent-user.png";
                            } else {
                                var user_image = data[index].Picture;
                            }

                            let user_id = data[index].UserId;
                            var image = data[index].Picture;
                            var name =
                                data[index].Fname + " " + data[index].SurName;

                            var image_name =
                                `<span style="width: 14px;">
                                    <img src="${user_image}" alt="contact-img" title="contact-img" class="rounded-circle img-fluid avatar-sm style="width:20px;height:20px"" />
                                </span>` +
                                " " +
                                " " +
                                name;
                            table.row
                                .add([
                                    `<b>${count++}</b>`,
                                    `<b>${image_name}</b>`,
                                    `<b>${user_id}</b>`,
                                    `<b>${data[index].Region}</b>`,
                                    `<b>${data[index].Constituency}</b>`,
                                    `<b>${data[index].ElectoralArea} -- ${data[index].PollingStation}</b>`,
                                    `<a href="#"  type="button"  class="btn btn-outline-success waves-effect waves-lightall_agent_list_action"
                                        user-image="${data[index].Picture}" user-name="${data[index].name}" user-region="${data[index].Region}" user-constituency="${data[index].Constituency}" user-electoral-area="${data[index].ElectoralArea}" user-id="${user_id}" user-dob="${data[index].DOB}" user-eduction-level="${data[index].EducationalLevel}"
                                        user-institution="${data[index].Institution}" user-phone-numbers="${data[index].phoneNumber}" user-gender="${data[index].Gender}">More Actions</a>`,
                                ])
                                .draw(false);
                        }
                    });
                } else {
                    return false;
                }

                let editButtons = document.querySelectorAll(
                    ".all_agent_list_action"
                );

                editButtons.forEach((button) => {
                    button.addEventListener("click", (e) => {
                        const editButton = e.currentTarget;
                        // console.log(editButton);
                        const userDetail = data.find(
                            (e) => e.UserId === $(editButton).attr("user-id")
                        );
                        // console.log(userDetail);

                        $(".users_name").text(
                            userDetail.SurName + " " + userDetail.Fname
                        );
                        $(".user_id").text(userDetail.UserId);

                        $(".users_region").text(userDetail.Region);
                        $(".users_constituency").text(userDetail.Constituency);
                        $(".users_electoral_area").text(
                            userDetail.ElectoralArea +
                                "" +
                                "--" +
                                "" +
                                userDetail.PollingStation
                        );
                        let phone_numbers = userDetail.phoneNumber;
                        $.each(phone_numbers, function (index) {
                            // console.log(phone_numbers);
                            $(".user_primary_telephone").text(phone_numbers[0]);
                            $(".user_secondary_telephone").text(
                                phone_numbers[1]
                            );
                            $(".user_other_telephone").text(phone_numbers[2]);
                        });
                        $(".user_dob").text(userDetail.DOB);
                        $(".user_gender").text(userDetail.Gender);
                        $(".user_educational_level").text(
                            userDetail.EducationalLevel
                        );
                        $(".user_institution_name").text(
                            userDetail.Institution
                        );

                        $(".user_completion_year").text(
                            userDetail.YearOfCompletion
                        );

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
                            "reset-agent?userId=" + userDetail.UserId
                        );

                        $(".user_forgot_password").attr(
                            "href",
                            "forgot-password?userId=" + userDetail.UserId
                        );

                        if (userDetail.ActiveFlag == true) {
                            $(".activate_deactivate_user").html("Block Agent");
                            $(".user_delete").attr(
                                "href",
                                "block-user?userId=" + userDetail.UserId
                            );
                        } else {
                            $(".activate_deactivate_user").html(
                                "UnBlock Agent"
                            );
                            $(".user_delete").attr(
                                "href",
                                "unblock-user?userId=" + userDetail.UserId
                            );
                        }
                        $(".all_agent_list_action").attr({
                            "data-toggle": "modal",
                            "data-target": "#bs-example-modal-lg",
                        });
                    });
                });
            } else {
                $("#agent_list_spinner").show();
                $("#data_table_view").hide();
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_all_agents(my_mandate, my_region, my_constituency);
            }, $.ajaxSetup().retryAfter);
        },
    });
}
// var my_mandate = @json(session()->get('UserMandate'))
setTimeout(function () {
    //alert(my_mandate);
    // console.log(AgentDetail);
    get_all_agents(my_mandate, my_region, my_constituency);
}, 500);
