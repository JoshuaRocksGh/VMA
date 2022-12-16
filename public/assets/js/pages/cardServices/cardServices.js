// TODO : Test the request Card method. especially the API response
const PageData = {};
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
            const select3 = document.getElementById("activate_card_branch");

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
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.branchDescription;
                option.value = e.branchCode;
                // select.appendChild(option);
                select3.appendChild(option);
            });
        }
    });
}

// ===== CIB REQUEST ====

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

function corporateCardBlock({
    accountDetails,
    cardType,
    cardTypeName,
    cardBranch,
    cardBranchName,
    cardNumber,
}) {
    siteLoading("show");
    return $.ajax({
        type: "POST",
        url: "corporate-block-card-request-api",
        datatype: "application/json",
        data: {
            accountDetails,
            cardType,
            cardTypeName,
            cardBranch,
            cardBranchName,
            cardNumber,
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

// ====== END OF CIB REQUEST====

// ======= PIB REQUEST ==========
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

function blockCard(data) {
    return $.ajax({
        type: "POST",
        url: "atm-card-block-api",
        datatype: "application/json",
        data,
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

// ====== END OF PIB REQUEST ====

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
            const select3 = document.getElementById("activate_card_type");
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
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.description;
                option.value = e.actualCode;
                // select.appendChild(option);
                select3.appendChild(option);
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
    $("#btn_card_request").on("click", (e) => {
        e.preventDefault();
        const accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        const accountDetails = $("#from_account option:selected").val();
        const cardType = $("#card_type").val();
        const cardTypeName = $("#card_type option:selected").html();
        const pickUpBranch = $("#pick_up_branch").val();
        const pickUpBranchName = $("#pick_up_branch option:selected").html();
        const requestType = "Card Request";
        // console.log("pickUpBranchName ==>", pickUpBranchName);
        if (!accountNumber || !cardType || !pickUpBranch) {
            toaster("Please complete all fields", "warning");
            return false;
        }
        PageData.cardRequest = {
            requestType,
            accountNumber,
            cardType,
            pickUpBranch,
            // pinCode,
        };

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
    $("#btn_submit_block_card").on("click", (e) => {
        // alert("clicked");
        // return false;
        e.preventDefault();
        const accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        var accountDetails = $("#from_account option:selected").val();
        var cardType = $("#card_type_select").val();
        var cardNumber = $("#card_number").val();
        var cardBranch = $("#card_branch").val();
        var cardBranchName = $("#card_branch option:selected").html();
        var cardTypeName = $("#card_type_select option:selected").html();

        if (!accountNumber || !cardType || !cardNumber || !cardBranch) {
            toaster("Please complete all fields", "warning");
            return false;
        }
        PageData.cardBlock = {
            accountNumber,
            cardType,
            cardNumber,
            cardBranch,
        };

        if (ISCORPORATE) {
            corporateCardBlock({
                accountDetails,
                cardType,
                cardTypeName,
                cardBranch,
                cardBranchName,
                cardNumber,
            }).then(() => {
                siteLoading("hide");
            });
            return;
        }
        $("#pin_code_modal").modal("show");
    });

    $("#transfer_pin").on("click", () => {
        const pinCode = $("#user_pin").val();
        console.log(pinCode);
        if (!pinCode || pinCode.length !== 4) {
            toaster("Please enter a valid pin code", "warning");
            return false;
        }
        siteLoading("show");
        if (PageData.cardRequest) {
            requestCard({
                accountNumber,
                cardType,
                pickUpBranch,
                pinCode,
            }).then(() => {
                siteLoading("hide");
            });
        } else if (PageData.cardBlock) {
            (PageData.cardBlock.pinCode = pinCode),
                blockCard(PageData.cardBlock).then(() => {
                    siteLoading("hide");
                });
        } else {
            // alert("card block");
            siteLoading("hide");
        }
    });
});
