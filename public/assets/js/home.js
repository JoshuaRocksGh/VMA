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
    $.ajax({
        type: "GET",
        url: "national-api",
        datatype: "application/json",
        success: function (response) {
            console.log("national response:", response);

            if (response.status === "ok") {
                $(".spinner-border").hide();
                $(".national_assigment").show();
                $("#all_regions_table").show();
                $("#agent_list_spinner").hide();

                let total = response.total;
                let total_assigned = response.totalAssigned;
                let total_unassigned = response.totalUnAssigned;

                let data = response.data;

                $(".total").text(numberWithCommas(total));
                $(".total_assigned").text(numberWithCommas(total_assigned));
                $(".total_unassigned").text(numberWithCommas(total_unassigned));

                $.each(data, function (index) {
                    // console.log(data[index]);
                    // return false;
                    $(".national_details").append(
                        `
                            <tr
                                        style="background-color: rgba(233, 242, 255, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                         <td><span class="h2">${
                                             data[index].region
                                         }</span></td>

                                        <td><span class="h2">${numberWithCommas(
                                            data[index].total
                                        )}</span></td>

                                        <td class="h2">${numberWithCommas(
                                            data[index].assigned
                                        )}</td>

                                        <td class="h2">${numberWithCommas(
                                            data[index].unAssigned
                                        )}</td>

                                        <td>
                                            <a href='region/${
                                                data[index].region
                                            }' class="btn btn-sm btn-blue">VIEW</a>

                                        </td>
                                    </tr>
                        `
                    );

                    $(".region_data").show();
                    $(".spinner-border ").hide();
                });
            } else {
                $("#all_regions_table").hide();
                $("#agent_list_spinner").show();
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                all_users();
            }, $.ajaxSetup().retryAfter);
        },
    });
}
setTimeout(function () {
    // alert("Winner");
    // console.log(AgentDetail);
    all_users();
}, 500);

$(document).ready(function () {
    getAllData();
});
