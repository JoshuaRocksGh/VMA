var table = $(".all_agent_list").DataTable({
    pageLength: 25,
    paging: false, // Set the desired number of rows per page
});
// var unassigned = $(".unassigned_constituency_list").DataTable();
var nodes = table.rows().nodes();

function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}

// let db = firebase.firestore();

// function getAllData() {
//     db.collection("candidates")
//         .get()
//         .then((querySnapshot) => {
//             var candidates = [];
//             querySnapshot.forEach((doc) => {
//                 candidates.push(doc.data());
//             });
//             console.log("querySnapshot =>", querySnapshot);
//             console.log("candidates=>", candidates);
//         });
// }

function all_users() {
    var table = $(".all_agent_list").DataTable();
    // var unassigned = $(".unassigned_constituency_list").DataTable();
    var nodes = table.rows().nodes();
    $.ajax({
        type: "GET",
        url: "national-api",
        datatype: "application/json",
        success: function (response) {
            console.log("national response:", response);
            // return;

            if (response.status === "ok") {
                $(".spinner-border").hide();
                $(".national_assigment").show();
                $("#all_regions_table").show();
                $("#agent_list_spinner").hide();

                let total = response.total;
                let total_assigned = response.totalAssigned;
                let total_unassigned = response.totalUnAssigned;

                let data = response.collection;

                $(".total").text(numberWithCommas(total));
                $(".total_assigned").text(numberWithCommas(total_assigned));
                $(".total_unassigned").text(numberWithCommas(total_unassigned));

                // return;

                $.each(data, function (index) {
                    // console.log("for each->", data[index]);
                    // return false;
                    var allRegions = data[index].region.replace(/ /g, "_");

                    table.row
                        .add([
                            `${data[index].region}`,
                            `${numberWithCommas(data[index].total)}`,
                            `${numberWithCommas(data[index].assigned)}`,
                            `${numberWithCommas(data[index].unAssigned)}`,
                            `
                            <a class="btn btn-outline-info waves-effect waves-light" href='region/${data[
                                index
                            ].region.trim()}'>View Details</a>
                            `,
                        ])
                        .draw();

                    // $(".national_details").append(
                    //     `
                    //         <tr
                    //                     style="background-color: rgba(233, 242, 255, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    //                      <td><span class="h2"></span></td>

                    //                     <td><span class="h2"></span></td>

                    //                     <td class="h2">${numberWithCommas(
                    //                         data[index].assigned
                    //                     )}</td>

                    //                     <td class="h2">${numberWithCommas(
                    //                         data[index].unAssigned
                    //                     )}</td>

                    //                     <td>
                    //                         <a href='region/${
                    //                             data[index].region
                    //                         }' class="btn btn-sm btn-blue">VIEW</a>

                    //                     </td>
                    //                 </tr>
                    //     `
                    // );

                    // $(".region_data").show();
                    // $(".spinner-border ").hide();
                });
            } else {
                $("#all_regions_table").hide();
                $("#agent_list_spinner").show();
                all_users();
            }
        },
        error: function (xhr, status, error) {
            // setTimeout(function () {
            all_users();
            // }, $.ajaxSetup().retryAfter);
        },
    });
}
// setTimeout(function () {
//     alert("Winner");
//     // console.log(AgentDetail);
// }, 500);

all_users();

$(document).ready(function () {
    function checkForChanges() {
        if (sessionStorage.getItem("totalAssignedPollingStations")) {
            console.log(sessionStorage.getItem("getAllRegions"));

            var displayAllRegions =
                sessionStorage.getItem("allPollingStations");
            $(".spinner-border").hide();
            $(".total").text(numberWithCommas(displayAllRegions));
            var displayTotalAssignedPollingStations = sessionStorage.getItem(
                "totalAssignedPollingStations"
            );
            console.log(
                "totalUnassignedPollingStations=>",
                sessionStorage.getItem("totalAssignedPollingStations")
            );

            $(".total_assigned").text(
                numberWithCommas(displayTotalAssignedPollingStations)
            );

            var displayTotalUnassignedPollingStations = sessionStorage.getItem(
                "totalUnassignedPollingStations"
            );
            $(".total_unassigned").text(
                numberWithCommas(displayTotalUnassignedPollingStations)
            );
        } else {
            console.log("Value has not changed.");
        }

        // console.log(sessionStorage.getItem("constituencyData"));
        var displayRegionSummary = sessionStorage.getItem("constituencyData");
        var final = JSON.parse(displayRegionSummary);

        $.each(final, function (index) {
            console.log("for each->", final[index]);
            var allRegions = final[index].region.replace(/ /g, "_");

            table.row
                .add([
                    `<b>${final[index].region}</b>`,
                    `<b>${numberWithCommas(final[index].total)}</b>`,
                    `<b>${numberWithCommas(final[index].assigned)}</b>`,
                    `<b>${numberWithCommas(final[index].unAssigned)}</b>`,
                    `
                            <a class="btn btn-outline-success waves-effect waves-light" href='region/${final[
                                index
                            ].region.trim()}'>View Details</a>
                            `,
                ])
                .draw(false);
        });
    }
    // checkForChanges();
    // setInterval(checkForChanges, 30000);
    // console.log(
    //     "session=> ",
    //     sessionStorage.getItem("totalAssignedPollingStations")
    // );
    // getAllData();
    // all_users();
    // $(".total").text(numberWithCommas(total));
    // $(".total_assigned").text(numberWithCommas(totalAssignedPollingStations));
    // $(".total_unassigned").text(
    //     numberWithCommas(totalUnassignedPollingStations)
    // );
    // ////////////////////////

    // $.each(constituencyData, function (index) {
    //     var allRegions = constituencyData[index].region.replace(/ /g, "_");
    //     table.row
    //         .add([
    //             `<b>${constituencyData[index].region}</b>`,
    //             `<b>${numberWithCommas(constituencyData[index].total)}</b>`,
    //             `<b>${numberWithCommas(constituencyData[index].assigned)}</b>`,
    //             `<b>${numberWithCommas(
    //                 constituencyData[index].unAssigned
    //             )}</b>`,
    //             `
    //                         <a class="btn btn-outline-success waves-effect waves-light" href='region/${constituencyData[
    //                             index
    //                         ].region.trim()}'>View Details</a>
    //                         `,
    //         ])
    //         .draw(false);
    // });
});
