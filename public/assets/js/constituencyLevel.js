$(".spinner-border").show;

function get_all_polling_stations(constituency) {
    // alert(constituency);
    // return false;
    $.ajax({
        type: "GET",
        url: "../get-polling-station-api?constituency=" + constituency,
        datatype: "application/json",
        success: function (response) {
            // console.log(response);

            if (response.status === "ok") {
                // console.log(response.data);
                // let total_polling_stations = response.data.length;
                // console.log(total_polling_stations);
                // $(".total_polling_stations").text(total_polling_stations);
            }
        },
    });
}

function polling_station_assignment(constituency) {
    if (constituency.indexOf("_") >= 0) {
        // alert("contains underscore");
        var request = constituency;
        Constituency_ = request.replace(/_/g, " ");
        // Constituency_ = request.replace(/ /g, " ");
        // alert(Constituency_);
    } else {
        Constituency_ = constituency;
    }
    // return false;
    $.ajax({
        type: "GET",
        url:
            "../get-assigned-polling-stations-api?constituency=" +
            Constituency_,
        datatype: "application/json",
        success: function (response) {
            // console.log("polling_station_assignment=>", response);

            if (response.status === "ok") {
                $(".spinner-border").hide();
                $(".constituency_assigment").show();

                // console.log(response.data);
                // console.log("=======");
                // console.log(response.data.unAssigned);
                // console.log("=======");
                // console.log(response.data.assigned);
                // console.log("yyyyyyy");
                let assigned_polling_station = response.data.totalAssigned;
                let unassigned_polling_station = response.data.totalUnAssigned;
                let total_polling_stations = response.data.total;

                $(".assigned_polling_stations").text(assigned_polling_station);
                $(".total_polling_stations").text(total_polling_stations);

                $(".unassigned_polling_stations").text(
                    unassigned_polling_station
                );
            } else {
                $(".spinner-border").show();
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                polling_station_assignment(constituency);
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function agent_assignments(constituency) {
    // alert(constituency);
    // var constituencyName = constituency;
    if (constituency.indexOf("_") >= 0) {
        // alert("contains underscore");
        var request = constituency;
        Constituency_ = request.replace(/_/g, " ");
        // Constituency_ = request.replace(/ /g, " ");
        // alert(Constituency_);
    } else {
        Constituency_ = constituency;
    }

    // alert(Constituency_);

    var table = $(".assigned_agent_list").DataTable();
    var unassigned = $(".unassigned_agent_list").DataTable();
    var nodes = table.rows().nodes();
    $.ajax({
        type: "GET",
        url: "../get-agents-assignments-api?constituency=" + Constituency_,
        datatype: "application/json",
        success: function (response) {
            //console.log(response);
            // console.log(constituency);
            // return false;

            let data = response.data.assigned;
            let agent_unassigned = response.data.unAssigned;
            // console.log(data);

            if (response.status === "ok") {
                var count = 1;
                // alert(constituency);

                $.each(data, function (index) {
                    console.log("assigned=>", data[index]);
                    var polling_station_name = data[index].ElectoralArea;
                    // count++;
                    table.row
                        .add([
                            `${count++}`,
                            ` ${data[index].Fname + " " + data[index].SurName}`,
                            `${data[index].Region}`,
                            `${data[index].Constituency}`,
                            `${data[index].ElectoralArea} -- ${data[index].PollingStation}`,
                            `${data[index].UserId}`,
                            `
                            <a class="btn btn-outline-danger" href='../unassign-agent?electoral_area=${data[index].ElectoralArea}&UserConstituency=${UserConstituency}&user_id=${data[index].UserId}&assign=false' data-value=${data[index].ElectoralArea}>UnAssign</a>
                            `,
                        ])
                        .draw(false);

                    $(".agent_id").val(data[index].UserId);
                    $(".agent_id").text(data[index].UserId);
                    $(".agent_name").val(
                        data[index].Fname + " " + data[index].SurName
                    );
                    $(".agent_name").text(
                        data[index].Fname + " " + data[index].SurName
                    );
                    $(".agent_gender").val(data[index].Gender);
                    $(".agent_gender").text(data[index].Gender);
                    $(".agent_region").val(data[index].Region);
                    $(".agent_region").text(data[index].Region);
                    $(".agent_constituency").val(data[index].Constituency);
                    $(".agent_constituency").text(data[index].Constituency);
                    $(".agent_electoral_area").val(data[index].ElectoralArea);
                    $(".agent_electoral_area").text(data[index].ElectoralArea);
                });

                $.each(agent_unassigned, function (index) {
                    console.log(agent_unassigned[index]);
                    console.log(constituency);
                    var UserConstituency = constituency;
                    var polling_station_name =
                        agent_unassigned[index].ElectoralArea;
                    // count++;
                    if (
                        agent_unassigned[index].ElectoralArea == "" ||
                        agent_unassigned[index].ElectoralArea == null
                    ) {
                        var electoral_area = "";
                    } else if (
                        agent_unassigned[index].PollingStation == "" ||
                        agent_unassigned[index].PollingStation == null ||
                        agent_unassigned[index].PollingStation == undefined
                    ) {
                        var polling_station = "";
                    }
                    unassigned.row
                        .add([
                            `${count++}`,
                            `${
                                agent_unassigned[index].Fname +
                                " " +
                                agent_unassigned[index].SurName
                            }`,
                            `${agent_unassigned[index].Region}`,
                            `${agent_unassigned[index].Constituency}`,
                            `${agent_unassigned[index].ElectoralArea} -- ${agent_unassigned[index].PollingStation}`,
                            `${agent_unassigned[index].UserId}`,
                            `
                            <a class="btn btn-outline-info" href='../unassign-agent?electoral_area=${agent_unassigned[index].ElectoralArea}&user_id=${agent_unassigned[index].UserId}&assign=true&UserConstituency=${UserConstituency}' data-value=${agent_unassigned[index].ElectoralArea}>Assign</a>
                            `,
                        ])
                        .draw(false);

                    $(".agent_id").val(agent_unassigned[index].UserId);
                    $(".agent_id").text(agent_unassigned[index].UserId);
                    $(".agent_name").val(
                        agent_unassigned[index].Fname +
                            " " +
                            agent_unassigned[index].SurName
                    );
                    $(".agent_name").text(
                        agent_unassigned[index].Fname +
                            " " +
                            agent_unassigned[index].SurName
                    );
                    $(".agent_gender").val(agent_unassigned[index].Gender);
                    $(".agent_gender").text(agent_unassigned[index].Gender);
                    $(".agent_region").val(agent_unassigned[index].Region);
                    $(".agent_region").text(agent_unassigned[index].Region);
                    $(".agent_constituency").val(
                        agent_unassigned[index].Constituency
                    );
                    $(".agent_constituency").text(
                        agent_unassigned[index].Constituency
                    );
                    $(".agent_electoral_area").val(
                        agent_unassigned[index].ElectoralArea
                    );
                    $(".agent_electoral_area").text(
                        agent_unassigned[index].ElectoralArea
                    );
                });
            } else {
                setTimeout(function () {
                    agent_assignments(constituency);
                }, $.ajaxSetup().retryAfter);
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                agent_assignments(constituency);
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function agent_unassigned(constituency) {
    var table = $(".unassigned_agent_list").DataTable();
    var nodes = table.rows().nodes();

    $.ajax({
        type: "GET",
        url: "../get-agents-assignments-api?constituency=" + constituency,
        datatype: "application/json",
        success: function (response) {
            // console.log(response);

            let data = response.data.totalUnAssigned;
            // let data_ = response.data.totalUnAssigned;
            // console.log(data);

            if (response.status === "ok") {
                var count = 1;

                $.each(data, function (index) {
                    console.log(data[index]);
                    // if()
                    // count++;
                    table.row
                        .add([
                            count++,
                            data[index].Fname + " " + data[index].SurName,
                            data[index].Region,
                            data[index].Constituency,
                            data[index].ElectoralArea,
                            data[index].UserId,
                        ])
                        .draw(false);
                });
            } else {
                setTimeout(function () {
                    agent_unassigned(constituency);
                }, $.ajaxSetup().retryAfter);
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                agent_unassigned(constituency);
            }, $.ajaxSetup().retryAfter);
        },
    });
}
function confirm_unassignment() {
    // alert("delete function called");
    Swal.fire({
        title: "Do you want to Unassign Agent?",
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: `Proceed`,
        confirmButtonColor: "#18c40d",
        cancelButtonColor: "#df1919",
        //  denyButtonText: `Don't save`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            var electoral_id = $(".unassign_btn").attr("data-value");
            alert(electoral_id);
            // confirm_deletion();
        } else if (result.isDenied) {
            Swal.fire("Failed to UnAssign Agent", "", "info");
        }
    });
}

function doSomething() {
    // alert("Click event is triggered on the link.");
    // var bene_ID = $(".delete_beneficiary_data").attr("data-value")
    confirm_unassignment();
}

$(document).ready(function () {
    setTimeout(function () {
        // alert(constituency);
        get_all_polling_stations(constituency);
        polling_station_assignment(constituency);
        agent_assignments(constituency);
        agent_unassigned(constituency);
    }, 1000);

    $(".assigned_agent_list").DataTable();

    $(".unassign_btn").click(function () {
        // e.preventDefault();
        alert("clicked");
        return false;
        var id = $(this).attr("data-value");
        console.log(id);
    });

    $("#unassign_agent_button").click(function (e) {
        e.preventDefault();
        var polling_station = $(".agent_electoral_area").val();
        var userID = $(".agent_id").val();

        // alert(polling_station);
        $.ajax({
            type: "Post",
            url: "../unassign-agent-api",
            datatype: "application/json",
            data: {
                pollingID: polling_station,
                userID: userID,
            },
            success: function (response) {
                // console.log(response);
            },
        });
    });

    $("button").click(function () {
        $("a")[0].click();
    });
});
