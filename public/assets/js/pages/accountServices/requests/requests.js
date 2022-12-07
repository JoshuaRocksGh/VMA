// TODO : Test the request Card method. especially the API response

function getBranches() {
    $.ajax({
        type: "GET",
        url: "get-branches-api",
        datatype: "application/json",
    }).done((response) => {
        console.log("getBranches ==>", response);
        if (response?.data) {
            const { data } = response;
            const select = document.getElementByClass("pick_up_branch");
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.branchDescription;
                option.value = e.branchCode;
                select.appendChild(option);
            });
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
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.description;
                option.value = e.actualCode;
                select.appendChild(option);
            });
        }
    });
}

$(function () {
    // siteLoading("show");
    getBranches();
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
    // make card request
    $("#btn_submit_request_statement").on("click", (e) => {
        e.preventDefault();
        const accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        const cardType = $("#card_type").val();
        let pickUpBranch = $("#pick_up_branch").val();
        if (!accountNumber || !pickUpBranch) {
            toaster("Please complete all fields", "warning");
            return false;
        }
        $("#pin_code_modal").modal("show");

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
});
