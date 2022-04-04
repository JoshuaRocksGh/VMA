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
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.branchDescription;
                option.value = e.branchCode;
                select.appendChild(option);
            });
        }
    });
}

function submitChequeRequest(data) {
    console.log(data);
    return $.ajax({
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "application/json",
        url: "cheque-book-request-api",
        data,
        beforeSend: (xhr) => {
            siteLoading("show");
        },
    })
        .always((e) => siteLoading("hide"))
        .done((response) => {
            console.log(response);
            if (response?.data) {
                const { data } = response;
                if (data.status === "success") {
                    toaster(data.message, "success");
                    $("#cheque_request_form")[0].reset();
                } else {
                    toaster(data.message, "error");
                }
            }
        })
        .fail((e) => {
            console.log(e.responseText);
            const res = JSON.parse(e.responseText);
            if (res?.message) {
                toaster(res.message, "error");
                return;
            }
            toaster("Something went wrong", "error");
        });
}

$(function () {
    siteLoading("show");
    Promise.all([getBranches()])
        .finally((e) => siteLoading("hide"))
        .catch((e) => {
            somethingWentWrongHandler(e);
        });

    $("select").select2();
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });

    $("#btn_submit_cheque_request").on("click", (e) => {
        e.preventDefault();
        const accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        // const chequeName = $("#cheque_name").val();
        const leaflets = $("#no_of_leaflets").val();
        const branchCode = $("#pick_up_branch").val();
        console.log({ leaflets, branchCode, accountNumber });
        if (!accountNumber || !leaflets || !branchCode) {
            toaster("Please fill all the fields", "warning");
            return;
        }
        PageData.chequeRequestData = {
            accountNumber,
            leaflets,
            branchCode,
        };
        $("#pin_code_modal").modal("show");
    });

    $("#transfer_pin").on("click", (e) => {
        e.preventDefault();
        const pinCode = $("#user_pin").val();
        if (!pinCode) {
            toaster("Please enter the pin code", "warning");
            return;
        }
        if (pinCode.length !== 4) {
            toaster("Pin code must be 4 digits", "warning");
            return;
        }
        PageData.chequeRequestData.pinCode = pinCode;
        submitChequeRequest(PageData.chequeRequestData);
        $("#user_pin").val("");
    });
});
