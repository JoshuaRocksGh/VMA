// function
// alert("Welcome");

const chatMessages = document.getElementById("chat-container");

// Function to scroll the div to the bottom
function scrollToBottom() {
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function get_regions() {
    $.ajax({
        type: "GET",
        url: "get-regions-api",
        datatype: "application/json",
        success: function (response) {
            // console.log(response);

            let data = response.data;

            $.each(data, function (index) {
                $(".user_region").append(
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

function updateScroll() {
    var element = document.getElementById("view_chats");
    element.scrollTop = element.scrollHeight;
}

// Generating UUID for chat

function create_UUID() {
    var dt = new Date().getTime();
    var uuid = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(
        /[xy]/g,
        function (c) {
            var r = (dt + Math.random() * 16) % 16 | 0;
            dt = Math.floor(dt / 16);
            return (c == "x" ? r : (r & 0x3) | 0x8).toString(16);
        }
    );
    return uuid;
}

$(document).ready(function () {
    get_regions();
    // =================  //

    // ================= //
    // return;
    //     function convertTo12HourFormat(timestamp) {
    //   const dateObj = new Date(timestamp);
    //   const hours = dateObj.getHours();
    //   const minutes = dateObj.getMinutes();
    //   const amOrPm = hours >= 12 ? 'PM' : 'AM';
    //   const twelveHourFormatHours = hours % 12 || 12;

    //   const formattedTime = `${twelveHourFormatHours}:${minutes.toString().padStart(2, '0')} ${amOrPm}`;
    //   return formattedTime;
    // }
    if (my_mandate == "NationalLevel") {
        $("#user_region").change(function () {
            console.log($(this).val());
            let region = $(this).val();

            db.collection("region")
                .doc(region)
                .collection("chats")
                .orderBy("time", "asc")
                .onSnapshot((snapshots) => {
                    // console.log(snapshots.docs)
                    $("#view_chats").empty();
                    $("#view_my_chats").empty();

                    snapshots.docs.forEach((doc) => {
                        var chat_details = doc.data();
                        console.log("chat_details=>", chat_details);
                        // console.log(userID);
                        var user_image = "assets/images/agent-user.png";

                        var date_time = chat_details.time.split("T");
                        var date = date_time[0];
                        var time_ = date_time[1].split(".");
                        var chat_time = time_[0];
                        // console.log(date);
                        // console.log(chat_time);
                        // $("#view_chats li").remove();

                        if (chat_details.userId != userID) {
                            // console.log("chat_details=>", chat_details);

                            $("#view_chats").append(
                                `
                                <div class="card mr-8" style=" border-radius:10px;background-color:#C6CCD3;margin-right:60px;display: inline-block;margin-bottom: 10px;">
                                    <div class="m-2"  style="display: inline;">
                                    <li class="clearfix odd">

                                            <div class="conversation-text" style="padding: 5px;">
                                                <div class="ctext-wrap">
                                                    <i class="text-muted">${chat_details.userName}-${chat_details.userId}</i>
                                                    <br>

                                                    <span style="display:flex;justify-content: space-between;">
                                                    <h6 class="">
                                                        ${chat_details.text}
                                                    </h6>
                                                <i style="zoom:0.7; padding:7px;float:right">${chat_time}</i>

                                                    </span>

                                                </div>

                                            </div>
                                        </li>

                                    </div>
                                </div>
                                <br>

                        `
                            );
                        } else if (chat_details.userId == userID) {
                            // console.log(chat_details.);
                            $("#view_chats").append(
                                `
                                <br>
                                <br>
                                <div class="card mb-2" style="background-color:#c9e5fc;border-radius:10px;display: inline-block;padding: 5px; float:right">
                                    <div class="m-2 text-right" style="display: inline;">

                                    <li class="clearfix" style="">

                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                <span style="display:flex;justify-content: space-between;">
                                                    <h6 class=""> ${chat_details.text}</h6>
                                                    <i class="" style="zoom:0.7;padding:7px">${chat_time}</i>

                                                </span>

                                                </div>


                                            </div>
                                        </li>
                                    </div>
                                </div>
                                <br>

                        `
                            );
                        } else {
                            return false;
                        }
                        // updateScroll();
                        // setInterval(updateScroll, 1000);
                    });

                    scrollToBottom();

                    // $("#view_chats").scrollTop = $("#view_chats").scrollHeight;
                });
        });
    } else if (my_mandate == "RegionalLevel") {
        db.collection("region")
            .doc(my_region)
            .collection("chats")
            .orderBy("time", "asc")
            .onSnapshot((snapshots) => {
                // console.log(snapshots.docs)
                $("#view_chats").empty();
                $("#view_my_chats").empty();

                snapshots.docs.forEach((doc) => {
                    var chat_details = doc.data();
                    // console.log("chat_details=>", chat_details);
                    // console.log(userID);
                    var user_image = "assets/images/agent-user.png";

                    var date_time = chat_details.time.split("T");
                    var date = date_time[0];
                    var time_ = date_time[1].split(".");
                    var chat_time = time_[0];
                    // console.log(date);
                    // console.log(chat_time);
                    // $("#view_chats li").remove();

                    if (chat_details.userId != userID) {
                        // console.log("chat_details=>", chat_details);

                        $("#view_chats").append(
                            `
                            <li class="clearfix odd">
                                            <div class="chat-avatar">
                                                <img src="${user_image}"
                                                    class="rounded-circle avatar-sm img-fluid " style="width:20px;height:20px" alt="${chat_details.userName}" />
                                                <i>${chat_time}</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i class="text-muted">${chat_details.userName}-${chat_details.userId}</i>
                                                    <h6>
                                                        ${chat_details.text}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                        `
                        );
                    } else if (chat_details.userId == userID) {
                        // console.log(chat_details.);
                        $("#view_my_chats").append(
                            `
                            <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="${user_image}"
                                                    class="rounded-circle avatar-sm img-fluid " style="width:20px;height:20px" alt="${chat_details.userName}" />
                                                <i>${chat_time}</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i class="text-muted">${chat_details.userName}</i>
                                                    <h6>
                                                        ${chat_details.text}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                        `
                        );
                    } else {
                        return false;
                    }
                    // updateScroll();
                    // setInterval(updateScroll, 1000);
                });
            });
    } else {
        db.collection("constituency")
            .doc(my_constituency)
            .collection("chats")
            .orderBy("time", "asc")
            .onSnapshot((snapshots) => {
                // console.log(snapshots.docs)
                $("#view_chats").empty();
                $("#view_my_chats").empty();

                snapshots.docs.forEach((doc) => {
                    var chat_details = doc.data();
                    // console.log("chat_details=>", chat_details);
                    // console.log(userID);
                    var user_image = "assets/images/agent-user.png";

                    var date_time = chat_details.time.split("T");
                    var date = date_time[0];
                    var time_ = date_time[1].split(".");
                    var chat_time = time_[0];
                    // console.log(date);
                    // console.log(chat_time);
                    // $("#view_chats li").remove();

                    if (chat_details.userId != userID) {
                        // console.log("chat_details=>", chat_details);

                        $("#view_chats").append(
                            `
                            <li class="clearfix odd">
                                            <div class="chat-avatar" >
                                                <img src="${user_image}"
                                                   class="rounded-circle avatar-sm img-fluid " style="width:20px;height:20px" alt="${chat_details.userName}" />
                                                <i style="zoom:0.9">${chat_time}</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i class="text-muted">${chat_details.userName}-${chat_details.userId}</i>
                                                    <h6>
                                                        ${chat_details.text}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                        `
                        );
                    } else if (chat_details.userId == userID) {
                        // console.log(chat_details.);
                        $("#view_my_chats").append(
                            `
                            <li class="clearfix">
                                            <div class="chat-avatar">
                                                <img src="${user_image}"
                                                    class="rounded-circle avatar-sm img-fluid " style="width:20px;height:20px" alt="${chat_details.userName}" />
                                                <i style="zoom:0.9">${chat_time}</i>
                                            </div>
                                            <div class="conversation-text">
                                                <div class="ctext-wrap">
                                                    <i class="text-muted">${chat_details.userName}</i>
                                                    <h6>
                                                        ${chat_details.text}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                        `
                        );
                    } else {
                        return false;
                    }
                    // updateScroll();
                    // setInterval(updateScroll, 1000);
                });
            });
    }

    $(".send_notification").click(function (e) {
        e.preventDefault();
        console.log("submit");

        var user_region = $("#user_region").val();
        // var message_title = $("#message_title").val();
        var send_message = $("#send_message").val();
        // console.log(user_region);
        // console.log(send_message);
        // return false;

        var today = new Date();
        var date =
            today.getFullYear() +
            "-" +
            (today.getMonth() + 1) +
            "-" +
            today.getDate();
        var time =
            today.getHours() +
            ":" +
            today.getMinutes() +
            ":" +
            today.getSeconds() +
            "." +
            today.getMilliseconds();
        // var dateTime = date + "T" + time;
        let chat_time = new Date();
        let dateTime = chat_time.toISOString();
        // console.log(dateTime);
        // return false;

        var name = FirstName + " " + Surname;
        // return false;
        if (
            user_region == "" ||
            user_region == null ||
            send_message == "" ||
            send_message == null
        ) {
            toaster("Please Fill Required Fields", "error", 10000);
        } else {
            // console.log(create_UUID());
            // console.log(my_mandate);
            var id = create_UUID();
            if (my_mandate == "NationalLevel") {
                data = {
                    id: id,
                    userId: userID,
                    regionId: user_region,
                    text: send_message,
                    time: dateTime,
                    readBy: [userID],
                    userName: name,
                    userType: "3",
                };

                // console.log(data);
                // console.log(user_region);
                // return false;
                db.collection("region")
                    .doc(user_region)
                    .collection("chats")
                    .doc(id)
                    .set(data);

                $("#send_message").text("");
            } else if (my_mandate == "RegionalLevel") {
                data = {
                    id: id,
                    userId: userID,
                    regionId: my_region,
                    text: send_message,
                    time: dateTime,
                    readBy: [userID],
                    userName: name,
                    userType: "2",
                };
                // console.log(data);
                // return false;
                db.collection("region")
                    .doc(my_region)
                    .collection("chats")
                    .doc(id)
                    .set(data);

                $("#send_message").text("");
            } else {
                data = {
                    id: id,
                    userId: userID,
                    regionId: my_constituency,
                    text: send_message,
                    time: dateTime,
                    readBy: [userID],
                    userName: name,
                    userType: "1",
                };
                // console.log(data);
                // return false;
                db.collection("constituency")
                    .doc(my_constituency)
                    .collection("chats")
                    .doc(id)
                    .set(data);

                $("#send_message").text("");
            }
        }
    });

    // //////////////////////////////////////////////////////////////////
});
