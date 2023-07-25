let voteData = [];
let voteDataActuals = [];
let voteDataLabels = [];
let nationalLevelVotes = [];
var table = $(".votes_table").DataTable({
    pageLength: 25, // Set the desired number of rows per page
});
let votePercentages = [];
let totalVotes = 0;

bgColors = ["#DADBDD", "#98AFC7", "#98AFC7", "#00BFFF", "#7FFFD4", "#50C878"];

function get_regions() {
    $.ajax({
        type: "GET",
        url: "get-regions-api",
        datatype: "application/json",
        success: function (response) {
            console.log("get_regions=>", response);
            if (response.status == "ok") {
                let data = response.data;

                $.each(data, function (index) {
                    nationalLevelVotes.push({
                        region: data[index],
                        party_a: "1",
                        party_b: "2",
                        party_c: "3",
                    });

                    $(".monitor_region").append(
                        $("<option>", {
                            value: data[index],
                        }).text(data[index])
                    );
                    // $("#chat_region").append(
                    //     $("<option>", {
                    //         value: data[index],
                    //     }).text(data[index])
                    // );
                });

                $.each(nationalLevelVotes, function (index) {
                    console.log("table=>", nationalLevelVotes[index]);
                    table.row
                        .add([
                            `<b>${nationalLevelVotes[index].region}</b>`,
                            `<b>${nationalLevelVotes[index].party_a}</b>`,
                            `<b>${nationalLevelVotes[index].party_b}</b>`,
                            `<b>${nationalLevelVotes[index].party_c}</b>`,
                        ])
                        .draw(false);
                });
            } else {
                get_regions();
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                get_regions();
            });
        },
    });
}

/*db.collection("candidates").onSnapshot((snapshot) => {
    snapshot.docChanges().forEach((change) => {
        // Handle the change in data
        let data = change.doc.data();
        // console.log("Change type:", change.type);
        // console.log("Data:", data.votes);
        voteData.push(data);
        voteDataActuals.push(data.votes);
        voteDataLabels.push(data.name);
        // data.forEach((e) => {
        //     console.log("all namse->", e);
        // });

        // if (change.type == "added") {
        // }
    });
}); */

async function getVotes() {}

//console.log("labels=>", labels);

// async function getVotingData() {
//     const candidatesRef = db.collection("candidates");
//     // console.log(
//     // "-->",
//     // candidatesRef.get().then((e) => {
//     //     e.forEach((doc) => {
//     //         console.log("dataaaaa=>", doc.data());
//     //     });
//     // });
//     // );
//     // return;

//     candidatesRef.get().onSnapshot((snapshot) => {
//         console.log("snapshot=>", snapshot);
//         snapshot.docChanges().forEach((change) => {
//             console.log("==>", change.doc.data());
//             if (change.type === "added") {
//                 // Document added
//                 const data = change.doc.data();
//                 // Process the added document
//             }
//             if (change.type === "modified") {
//                 // Document modified
//                 const data = change.doc.data();
//                 // Process the modified document
//             }
//             if (change.type === "removed") {
//                 // Document removed
//                 // Process the removed document
//             }
//         });
//     });
// }

// console.log(
//     "==>",
//     db.collection("candidtaes").doc(candidates).collection().get()
// );

//getVotingData();

$(document).ready(function () {
    get_regions();
    // getVotes();

    // console.log("voteData->", voteData);
    // console.log("voteDataLabels->", voteDataLabels);
    // console.log("voteDataActuals->", voteDataActuals);

    voteData.forEach((e) => console.log("element at", e));
    // return;

    // =======

    db.collection("candidates").onSnapshot(function (querySnapshot) {
        $("#display_party_logo").empty();
        querySnapshot.forEach(function (doc) {
            var data = doc.data();
            // Process the data
            voteData.push(data);
            voteDataActuals.push(JSON.stringify(data.votes));
            voteDataLabels.push(data.name);
            // votePercentages.push(Math.round(data.votes / totalVotes) * 100);
            console.log(data);
            totalVotes += data.votes;
            // return;
            // $(".display_party").append(`

            //  <div class="card " style="border-radius: 10px;">
            //                 <div class="card-body">
            //                         <div class="row">
            //                             <div class="col-md-5">
            //                                 <img src="${
            //                                     data.image
            //                                 }" class=" img-fluid "
            //                                     style='width:70px;height:70px;border-radius:50px;' />
            //                                 <br>
            //                                 <br>
            //                                 <b style="" class=" ">JAMES AGUZE</b>
            //                             </div>
            //                             <div class="col-md-7">
            //                                 <div class="row">
            //                                     <div class="col-md-6">
            //                                         <b style="font-size:16px" class=" ">${
            //                                             data.name
            //                                         }</b>

            //                                     </div>
            //                                     <div class="col-md-6 text-right">
            //                                         <img src="${
            //                                             data.image
            //                                         }" class=" img-fluid "
            //                                             style="width:30px;height:30px" />
            //                                     </div>
            //                                 </div>
            //                                 <br>
            //                                 <div class="p-1 text-center"
            //                                     style="background-color: #FAD7A0 ;border-radius: 10px">
            //                                     <p style="font-size:16px">Votes: <b>${data.votes.toLocaleString()}</b></p>
            //                                     <b style="font-size:16px">10%</b>

            //                                 </div>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>

            //                     <br>
            // `);
        });
        // voteData?.forEach((e) => {
        //     // return e.name;
        //     console.log("ee->", e);
        //     // return e.name;
        // });

        console.log("voteData->", voteData);
        console.log("voteDataLabels->", voteDataLabels);
        console.log("voteDataActuals->", voteDataActuals);
        console.log("totalVotes->", totalVotes);

        var dataSet = voteDataActuals;
        console.log("Data Set", dataSet);
        const ctx = document.getElementById("myChart");

        new Chart(ctx, {
            type: "doughnut",
            // label: ["test"],
            data: {
                // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                labels: voteDataLabels,
                // labels: ["A", "B", "C"],
                datasets: [
                    {
                        label: " Votes",
                        data: dataSet,
                        // data: [10, 20, 30],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });

    // =======

    // const ctx_2 = document.getElementById("myChart_2");

    // new Chart(ctx_2, {
    //     type: "bar",
    //     data: {
    //         labels: voteDataLabels,
    //         datasets: [
    //             {
    //                 label: "# of Votes",
    //                 data: voteDataActuals,
    //                 borderWidth: 1,
    //             },
    //         ],
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true,
    //             },
    //         },
    //     },
    // });

    $(".monitor_region").change(function () {
        var getRegionName = $(this).val();
        console.log("getRegionName=>", getRegionName);

        // /regional-constituency/{UserRegion}
        $.ajax({
            type: "GET",
            url: `regional-constituency/${getRegionName}`,
            datatype: "application/json",
            success: function (response) {
                console.log("getRegionName=>", response);
                $(".monitor_constituency option").remove();
                if (response.status == "ok") {
                    let data = response.data;

                    $.each(data, function (index) {
                        $(".monitor_constituency").append(
                            $("<option>", {
                                value: data[index].ConstituencyCode,
                            }).text(data[index].ConstituencyCode)
                        );
                    });
                } else {
                }
            },
            error: function (xhr, status, error) {
                setTimeout(function () {
                    // get_regions();
                });
            },
        });
    });

    $(".user_region").change(function () {
        console.log($(this).val());
        var selectedLevel = $(this).val();

        if (selectedLevel == "NationalLevel") {
            $(".monitor_region").attr("disabled", "disabled");
            console.log("nationalLevelVotes=>", nationalLevelVotes);
            //

            // $.each()
            $(".display_party").toggle(500);
            $(".national_level_display").toggle(500);
        } else if (selectedLevel == "RegionalLevel") {
            $(".monitor_region").removeAttr("disabled");
            $(".display_party").toggle(500);
            $(".regional_level_display").toggle(500);
            $(".national_level_display").hide();
            table.clear();
        }
    });
});
