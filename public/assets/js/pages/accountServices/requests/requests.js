// TODO : Test the request Card method. especially the API response

const statementData = new Object();
// function getBranches() {
//     $.ajax({
//         type: "GET",
//         url: "get-branches-api",
//         datatype: "application/json",
//     }).done((response) => {
//         console.log("getBranches ==>", response);
//         if (response?.data) {
//             const { data } = response;
//             const select = document.getElementById("pick_up_branch");
//             data.forEach((e) => {
//                 const option = document.createElement("option");
//                 option.text = e.branchDescription;
//                 option.value = e.branchCode;
//                 select.appendChild(option);
//             });
//         }
//     });
// }

function corporateRequestStatement(statementData) {
    $.ajax({
        type: "POST",
        url: "corporate-statement-request-api",
        datatype: "application/json",
        data: statementData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            siteLoading("hide");
            if (response.responseCode == "000") {
                // console.log(response);
                swal.fire({
                    // title: "Transfer successful!",
                    html: response.message,
                    icon: "success",
                    // showConfirmButton: "false",
                    confirmButtonColor: "green",
                });
            } else {
                swal.fire({
                    // title: "Transfer successful!",
                    html: response.message,
                    icon: "error",
                    // showConfirmButton: "false",
                    confirmButtonColor: "red",
                });
            }
        },
        error: function (xhr, status, error) {
            siteLoading("hide");

            swal.fire({
                // title: "Transfer successful!",
                html: xhr.responseText,
                icon: "error",
                // showConfirmButton: "false",
                confirmButtonColor: "green",
            });

            // console.log(xhr.status);
            // console.log(xhr.responseText);
            // setTimeout(function () {
            //     getBranches();
            // }, $.ajaxSetup().retryAfter);
        },
    });
}

function requestStatement(statementData) {
    // console.log("statementData ===>",statementData)
    // return false;
    $.ajax({
        type: "POST",
        url: "statement-request-api",
        datatype: "application/json",
        data: statementData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            siteLoading("hide");
            if (response.responseCode == "000") {
                // console.log(response);
                swal.fire({
                    // title: "Transfer successful!",
                    html: response.message,
                    icon: "success",
                    // showConfirmButton: "false",
                    confirmButtonColor: "green",
                });
            } else {
                swal.fire({
                    // title: "Transfer successful!",
                    html: response.message,
                    icon: "error",
                    // showConfirmButton: "false",
                    confirmButtonColor: "red",
                });
            }
        },
        error: function (xhr, status, error) {
            siteLoading("hide");

            swal.fire({
                // title: "Transfer successful!",
                html: xhr.responseText,
                icon: "error",
                // showConfirmButton: "false",
                confirmButtonColor: "green",
            });

            // console.log(xhr.status);
            // console.log(xhr.responseText);
            // setTimeout(function () {
            //     getBranches();
            // }, $.ajaxSetup().retryAfter);
        },
    });
}

function getCardTypes() {
    return $.ajax({
        type: "GET",
        url: "get-card-types-api",
        datatype: "application/json",
    }).done((response) => {
        if (response?.data) {
            const { data } = response;
            const select = document.getElementById("card_type");
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.description;
                option.value = e.actualCode;
                select.appendChild(option);
            });
        }
    });
}

function getBranches() {
    $.ajax({
        type: "GET",
        url: "get-branches-api",
        datatype: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log("response ==>", response);
            if (response.responseCode == "000") {
                const { data } = response;
                const select = document.getElementById("pick_up_branch");
                data.forEach((e) => {
                    const option = document.createElement("option");
                    option.text = e.branchDescription;
                    option.value = e.branchCode;
                    select.appendChild(option);
                });
            } else {
                setTimeout(function () {
                    getBranches();
                }, $.ajaxSetup().retryAfter);
            }
        },

        error: function (xhr, status, error) {
            setTimeout(function () {
                getBranches();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

$(function () {
    function padWithLeadingZeros(num, totalLength) {
        return String(num).padStart(totalLength, '0');
      }
    // siteLoading("show");
    getBranches();
    // branch();
    $("select").select2();
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });

    $(".statement-type").on("change", (e) => {
        const statementType = e.currentTarget.value;
        $(".period").attr("disabled", statementType === "account_details");
    });

    $(".date-select").on("click", (e) => {
        $(".date-select").removeClass("selected");
        $(e.currentTarget).addClass("selected");
        const selected = $(e.currentTarget);
        console.log(selected);
        console.log(selected.attr("data-value"));
    });

    $("#custom_date_toggle").on("change", (e) => {
        const isCustomDateDisabled = e.currentTarget.checked;
        $(".custom_date").attr("disabled", !isCustomDateDisabled);
        $(".date-select").attr("disabled", isCustomDateDisabled);
        console.log(isCustomDateDisabled);
    });

    let date = new Date(2010, 7, 5);
    let year = new Intl.DateTimeFormat("en", { year: "numeric" }).format(date);
    let month = new Intl.DateTimeFormat("en", { month: "2-digit" }).format(
        date
    );
    let day = new Intl.DateTimeFormat("en", { day: "2-digit" }).format(date);
    const today = `${year}-${month}-${day}`;
    $(".custom_date").attr("max", today);

    $(".coming-soon").on("click", (e) => {
        e.preventDefault();
        comingSoonToast("Stay tuned for more features");
    });

    $(".period").click(function () {
        // alert("clicked");

        var getMonth = $(this).attr("data-value");
        // console.log(getMonth);
        const today = new Date().toISOString().slice(0, 10);
        // console.log("todays' date ===>", today)
        switch (getMonth) {
            case "1":
                var d = new Date();
                var monthNumber = d.getMonth() -1;
                var year = d.getFullYear();
                var actualNum = monthNumber;
                var getFirstDate = new Date(d.getFullYear(), d.getMonth() - 1, 1);
                // console.log(last)
                // begining of the month
                var lastMonthBegining = year + "-" + actualNum + "-" + "01";

                $("#to_date").val(today);
                $("#from_date").val(getFirstDate.toISOString().slice(0, 10));
                // console.log("lastMonthBegining ===>", getFirstDate.toISOString().slice(0, 10))
                break;
            case "3":
                var d = new Date();
                var monthNumber = d.getMonth();
                var year = d.getFullYear();
                var actualNum = monthNumber - 2;
                var result = actualNum.toString().padStart(2, "0");
                var getPast3Months = new Date(d.getFullYear(), d.getMonth() - 3, 1);

                // begining of the month
                var lastMonthBegining = year + "-" + result + "-" + "01";

                $("#to_date").val(today);
                $("#from_date").val(getPast3Months.toISOString().slice(0, 10));
                // console.log(getPast3Months.toISOString().slice(0, 10));
                break;
            case "6":
                // console.log("6 month");
                var d = new Date();
                var monthNumber = d.getMonth();
                var year = d.getFullYear();
                var actualNum = monthNumber - 5;
                var result = actualNum.toString().padStart(2, "0");
                // begining of the month
                var lastMonthBegining = year + "-" + result + "-" + "01";
                var getPast6Months = new Date(d.getFullYear(), d.getMonth() - 6, 1);


                $("#to_date").val(today);
                $("#from_date").val(getPast6Months.toISOString().slice(0, 10));
                // console.log(lastMonthBegining);
                break;
            default: //January is 0!
                var d = new Date();
                var monthNumber = d.getMonth();
                if( monthNumber < 10){
                var actualNum_ = monthNumber + 1;
                var actualNum = padWithLeadingZeros(actualNum_, 2)

                }else{
                var actualNum = monthNumber + 1;

                }

                var year = d.getFullYear();
                // console.log("monthNumber ===>", actualNum)

                // begining of the month
                var monthBeinging = year + "-" + actualNum + "-" + "01";
                $("#to_date").val(today);
                $("#from_date").val(monthBeinging);
                // $("#from_date").val("2023-01-01");

                // console.log(today);
                // console.log("This month ===>",monthBeinging);
        }
    });
    // make card request
    $("#btn_submit_request_statement").on("click", (e) => {
        e.preventDefault();
        statementData.accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        statementData.accountDetails = $("#from_account option:selected").val();
        statementData.statementType = $("#statement_type").val();
        statementData.branch = $("#pick_up_branch").val();
        statementData.branchName = $("#pick_up_branch option:selected").text();
        statementData.startDate = $("#from_date").val();
        statementData.endDate = $("#to_date").val();

        // let pickUpBranch = $("#pick_up_branch").val();
        // console.log('all statementData ===>' , statementData)
        // return false;
        if (
            !statementData.accountNumber ||
            !statementData.statementType ||
            !statementData.branch||
            !statementData.startDate ||
            !statementData.endDate
        ) {
            toaster("Please complete all fields", "warning");
            return false;
        }

        // $("#pin_code_modal").modal("show");


        // corporateRequestStatement(statementData);

        if (!ISCORPORATE) {
            $("#pin_code_modal").modal("show");

        } else {
            corporateRequestStatement(statementData);
        }
    });
    $("#transfer_pin").on("click", () => {
        statementData.pinCode = $("#user_pin").val();
        // console.log(pinCode);
        if (!statementData.pinCode || statementData.pinCode.length !== 4) {
            toaster("Please enter a valid pin code", "warning");
            return false;
        }
        siteLoading("show");

        requestStatement(statementData);
    });
});
