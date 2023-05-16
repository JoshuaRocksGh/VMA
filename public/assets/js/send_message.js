// API CALLS

function get_regions() {
    $.ajax({
        type: "GET",
        url: "get-regions-api",
        datatype: "application/json",
        success: function (response) {
            // console.log(response);

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
                $("#chat_region").append(
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
    $(".constituency_spinner").show();
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
                $(".constituency_spinner").hide();
                $("#agent_constituency").show();

                $.each(data, function (index) {
                    // console.log(data[index]);
                    $("#agent_constituency").append(
                        $("<option>", {
                            value: data[index].code,
                        }).text(data[index].name)
                    );
                });
            }
        },
    });
}

$("#send_to").prop("disabled", true);
$("#send_to").css("background", "#DCDCDC");

function getUserRegion(agent_region) {
    get_constituency(agent_region);
    // alert(agent_region);
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

$(document).ready(function () {
    setTimeout(function () {
        // alert(my_mandate);
        if (my_mandate == "NationalLevel") {
            get_regions();
        } else if (my_mandate == "RegionalLevel") {
            var agent_region = $("#agent_region").val();

            getUserRegion(agent_region);
        } else {
            return false;
        }
    }, 200);

    $("#agent_region").change(function () {
        var region = $(this).val();
        if (region == "") {
            // $("#agent_constituency").prop("disabled", true);
            // $("#agent_constituency").css("background", "#DCDCDC");
        }
        console.log(region);
        get_constituency(region);
    });

    // ALL IS SELECTED
    $("#checkbox6c").click(function () {
        if ($(this).is(":checked")) {
            // alert("Checked");
            $("#agent_constituency").prop("disabled", true);
            $("#agent_constituency").css("background", "#DCDCDC");
            $("#agent_region").prop("disabled", true);
            $("#agent_region").css("background", "#DCDCDC");
            $("#send_to").val("ALL");
        } else {
            // alert("Not Checked");
            $("#agent_constituency").prop("disabled", false);
            $("#agent_constituency").css("background", "#fefefe");
            $("#agent_region").prop("disabled", false);
            $("#agent_region").css("background", "#fefefe");
        }
    });

    $("#message_chat").click(function () {
        if ($(this).is(":checked")) {
            // alert("clicked");
            $("#chat_region").prop("disabled", true);
            $("#chat_region").css("background", "#DCDCDC");
            // $("#message_chat").val("ALL");
        } else {
            $("#chat_region").prop("disabled", false);
            $("#chat_region").css("background", "#fefefe");
        }
    });

    var count = 0;
    var arr = [];
    $("#agent_constituency").click(function (e) {
        e.preventDefault();

        arr.push($(this).val());
        arr.join(" " + " , " + " ");
        $("#send_to").val(arr);
        console.log(arr);
        count++;
    });

    // var count = 0;
    // var arr = [];
    // $("#agent_region").click(function (e) {
    //     e.preventDefault();

    //     arr.push($(this).val());
    //     arr.join(" " + " , " + " ");
    //     $("#send_to").val(arr);
    //     console.log(arr);
    //     count++;
    // });

    $("#send_message_button").click(function () {
        //e.preventDefault();
        $(".send_message_text").hide();
        $(".spinner-text").show();
        // return false;
        // alert("clicked on send");
        var subject = $("#message_subject").val();
        var recipients = $("#send_to").val();
        var message = $("#text_message").val();

        //console.log("subject =>" + subject);
        //console.log("recipients =>" + recipients);
        //console.log("message =>" + message);

        if (subject != "" && message != "" && recipients != "") {
            $.ajax({
                type: "POST",
                url: "send-agent-message-api",
                datatype: "application/json",
                data: {
                    title: subject,
                    body: message,
                    region: recipients,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);

                    if (response.status == "ok") {
                        Swal.fire(response.message, "", "success");
                        location.reload();
                        $(".send_message_text").show();
                        $(".spinner-text").hide();
                    } else {
                        toaster(response.message, "error", 10000);
                        $(".send_message_text").show();
                        $(".spinner-text").hide();
                    }
                },
            });
        } else {
            toaster("Please fill all required fields", "error", 10000);
            $(".send_message_text").show();
            $(".spinner-text").hide();
        }
    });

    $("#get_chat_button").click(function () {
        //e.preventDefault();

        if ($("#message_chat").is(":checked")) {
            var all_chat = "ALL";
        }

        console.log("all_chat=>:", all_chat);
        var regions_chat = $("#chat_region").val();
        console.log("regions_chat=>:", regions_chat);

        // alert("clicked");

        if (all_chat != "" || regions_chat != "") {
            $.ajax({
                type: "GET",
                url: "agent-message-replies-api?regionId=" + regions_chat,
                datatype: "application/json",

                // headers: {
                //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                //         "content"
                //     ),
                // },
                success: function (response) {
                    console.log("response chat: =>", response);

                    if (response.status === "ok") {
                        // var time = response.time;
                        // var new_time = time.split("T");
                        $(".conversation-list").empty();
                        let data = response.data;
                        let src = "assets/images/agent-user.png";
                        $.each(data, function (index) {
                            var time = data[index].time;
                            var new_time = time.split("T");
                            var this_time = new_time[1];
                            var chart_time = this_time.split(".");
                            var exact_chat_time = chart_time[0];
                            var best_chat_time = exact_chat_time.slice(0, -3);
                            // console.log(exact_chat_time.slice(0, -3));
                            // console.log("chart_time: =>", chart_time);

                            $(".conversation-list").append(
                                `
                                    <li class="clearfix m-0">
                                        <div class="chat-avatar">
                                            <img src=${src} alt="#"
                                                class="rounded" />
                                            <i><b>${best_chat_time}</b></i>
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <i><b> ${data[index].userId}</b></i>
                                                <p>
                                                    <b>${data[index].text}</b>

                                                </p>
                                            </div>
                                    </div>

                                </li>
                                <hr class="mt-0">
                                `
                            );
                        });
                    }
                },
            });
        } else {
            toaster("Please select to sort chat", "error", 10000);
        }
    });
});
