// TODO : Test the request Card method. especially the API response

function getBranches() {
    $.ajax({
        type: "GET",
        url: "get-branches-api",
        datatype: "application/json",
    }).done((response) => {
        console.log(response);
        if (response?.data) {
            const { data } = response;
            const select = document.getElementById("pick_up_branch");
            const select2 = document.getElementById("card_branch");
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.branchDescription;
                option.value = e.branchCode;
                select.appendChild(option);
                // select2.appendChild(option);
            });
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.branchDescription;
                option.value = e.branchCode;
                // select.appendChild(option);
                select2.appendChild(option);
            });
        }
    });
}

function corporateCardRequest({
    accountDetails,
    cardType,
    cardTypeName,
    pickUpBranch,
    pickUpBranchName,
}) {
    siteLoading("show");
    return $.ajax({
        type: "POST",
        url: "corporate-atm-card-request-api",
        datatype: "application/json",
        data: {
            accountDetails,
            cardType,
            cardTypeName,
            pickUpBranch,
            pickUpBranchName,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }).done((response) => {
        console.log(response);
        if (response.responseCode == "000") {
            toaster(response.message, "success");
        } else {
            toaster(response.message, "error");
        }
    });
}

function requestCard({ accountNumber, cardType, pickUpBranch, pinCode }) {
    return $.ajax({
        type: "POST",
        url: "atm-card-request-api",
        datatype: "application/json",
        data: {
            accountNumber,
            cardType,
            pickUpBranch,
            pinCode,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }).done((response) => {
        console.log(response);
        if (response.responseCode == "000") {
            toaster(response.message, "success");
        } else {
            toaster(response.message, "error");
        }
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
            const select2 = document.getElementById("card_type_select");
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.description;
                option.value = e.actualCode;
                select.appendChild(option);
                // select2.appendChild(option);
            });
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.description;
                option.value = e.actualCode;
                // select.appendChild(option);
                select2.appendChild(option);
            });
        }
    });
}

$(function () {
    siteLoading("show");
    Promise.all([getCardTypes(), getBranches()])
        .finally((e) => siteLoading("hide"))
        .catch((e) => {
            somethingWentWrongHandler(e);
        });

    $(".select").select2();
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });

    $(".coming-soon").on("click", function (e) {
        e.preventDefault();
        comingSoonToast("");
    });
    // make card request
    $("#btn_submit_request_statement").on("click", (e) => {
        e.preventDefault();
        const accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        const accountDetails = $("#from_account option:selected").val();
        const cardType = $("#card_type").val();
        const cardTypeName = $("#card_type option:selected").html();
        let pickUpBranch = $("#pick_up_branch").val();
        const pickUpBranchName = $("#pick_up_branch option:selected").html();
        // console.log("pickUpBranchName ==>", pickUpBranchName);
        if (!accountNumber || !cardType || !pickUpBranch) {
            toaster("Please complete all fields", "warning");
            return false;
        }
        if (ISCORPORATE) {
            corporateCardRequest({
                accountDetails,
                cardType,
                cardTypeName,
                pickUpBranch,
                pickUpBranchName,
            }).then(() => {
                siteLoading("hide");
            });
            return;
        }
        $("#pin_code_modal").modal("show");
    });

    // block card requestCard
    $("#btn_submit_block_card").on("Click", (e) => {
        e.preventDefault();
        const accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        const accountDetails = $("#from_account option:selected").val();
    });

    $("#transfer_pin").on("click", () => {
        const pinCode = $("#user_pin").val();
        console.log(pinCode);
        if (!pinCode || pinCode.length !== 4) {
            toaster("Please enter a valid pin code", "warning");
            return false;
        }
        siteLoading("show");
        requestCard({
            accountNumber,
            cardType,
            pickUpBranch,
            pinCode,
        }).then(() => {
            siteLoading("hide");
        });
    });
});
