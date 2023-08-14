let voteData = [];
let voteDataActuals = [];
let voteDataLabels = [];
let nationalLevelVotes = [];

let votePercentages = [];
let totalVotes = 0;

$(document).ready(function () {
    // Step 1: Define an array of colors
    const colors = [
        "#F6BBC1",
        "#F4EDE4",
        "#36C5F0",
        "#2EB67D",
        "#ECB22E",
        "#DE8969",
        "#2F8AB7",
        "#FFA100",
        "#FFD57E",
        "#FED4BE",
        "#F2606A",
        //
        // "#d2e1f9",
        // "#40f79e",
        // "#d2f2f9",
        // "#d2f9e8",
        // "#f7f9d2",
        // "#c4c3aa",
        // "#bab6c1",
        // "#ffafd7",
        // "#e1dffd",
    ];

    // function getRandomColor() {
    //     const randomIndex = Math.floor(Math.random() * colors.length);
    //     return colors[randomIndex];
    // }

    // Function to shuffle the colors array using Fisher-Yates algorithm
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    let colorIndex = 0;

    db.collection("candidates").onSnapshot(function (querySnapshot) {
        $("#display_party_logo").empty();
        querySnapshot.forEach(function (doc) {
            var data = doc.data();
            // Process the data
            voteData.push(data);
            // voteDataActuals.push(JSON.stringify(data.votes));
            voteDataActuals.push(data.votes);
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

        // Step 1: Calculate the total sum of the array elements
        const totalSum = voteDataActuals.reduce((acc, curr) => acc + curr, 0);

        console.log("totalSum=>", totalSum);

        // Initialize an empty array to store the percentages
        const percentages = [];

        // Step 2: Calculate the percentage for each element in the array
        voteDataActuals.forEach((number) => {
            const percentage = (number / totalSum) * 100;
            // Round the percentage to two decimal places
            // voteData.forEach(function (e) {
            //     e.votes = percentage.toFixed(2);
            // });
            percentages.push(percentage.toFixed(2));
        });

        const mergedArray = voteData.map((object, index) => {
            const percentage = percentages[index];

            // Create a new object with properties from both arrays
            return {
                ...object,
                percentage: percentage + "%",
            };
        });

        console.log("mergedArray =>", mergedArray);

        console.log("percentages=>", percentages);

        $(".all_candidates").empty();
        $(".display_vote_analysis").empty();

        mergedArray.forEach(function (e) {
            const currentColor = colors[colorIndex];
            $(".all_candidates").append(
                `
                    <div class="col-md-3 p-4 pb-2">
                                <div class=" p-2 row"
                                    style="display: flex; justify-content: center; align-items: center;background-color:${currentColor} ;padding: -0.75rem;border-radius:5px;box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;">
                                    <img class="col-md-5" src="${
                                        e.image
                                    }" alt=""
                                        style="width:60px;height:60px;border-radius:50%">
                                    <div class="col-md-7">
                                        <h2>${e.name}</h2>
                                        <p>${e.partyName ?? ""}</p>
                                        <img class="" src="${
                                            e.partyLogo
                                        }" alt=""
                                            style="width:20px;height:20px;border-radius:10%">

                                    </div>


                                </div>
                            </div>
                `
            );
            $(".display_vote_analysis").append(
                `
                    <div class=" row"
                                        style="border-radius:10px;background-color:${currentColor};padding: -0.75rem;">

                                        <i class="col-md-1 fas fa-circle font-12 avatar-title text-dark"
                                            style="margin-top: 10px;"></i>
                                        <h1 class="col-md-3 font-22" style="margin-top:2px">${
                                            e.partyName ?? e.name
                                        }</h1>
                                        <div class="col-md-4" style="text-align:right;">
                                            <span id="approval_count" class="badge badge-primary badge-pill font-10 ml-1"
                                                style="padding: 9px;margin-top: 4px;">${e.votes.toLocaleString()} votes</span>
                                        </div>
                                        <div class="col-md-4" style="text-align:right;margin-top:8px">
                                            <h3>${e.percentage}</h3>
                                        </div>
                                    </div>
                                    <br>
                `
            );

            // Increment the colorIndex for the next element
            colorIndex = (colorIndex + 1) % colors.length;
        });

        const ctx = document.getElementById("myChart");

        new Chart(ctx, {
            type: "bar",
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
                        backgroundColor: colors,
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
});
