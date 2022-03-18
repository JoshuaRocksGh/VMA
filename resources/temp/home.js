let datatableOptions = {
    destroy: true,
    lengthChange: false,
    pageLength: 3,
    searching: false,
    scrollY: "200px",
    info: false,
    // "scrollX":        true,
    scrollCollapse: true,
    paging: false,
    columnDefs: [
        {
            targets: "_all",
            render: function (data, type, row) {
                if (data === null || data === undefined) {
                    return "";
                } else {
                    return data.length > 45 && !data.includes("<b>")
                        ? data.substr(0, 45) + "…"
                        : data;
                }
            },
        },
    ],
};

function fixedDeposit() {
    $.ajax({
        type: "GET",
        url: "fixed-deposit-account-api",
        datatype: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response.responseCode == "000") {
                let data = response.data;
                let noInvestments = noDataAvailable.replace(
                    "Data",
                    "Investments"
                );
                $("#fixed_deposit_list_body").empty();
                if (data.length < 1) {
                    $("#fixed_deposit_list_body").append(
                        `<td colspan="100%" class="text-center">
                        ${noInvestments} </td>`
                    );
                    return;
                }
                let table = $("#fixed_deposit_list").DataTable(
                    datatableOptions
                );

                $.each(data, function (i) {
                    table.row
                        .add([
                            data[i].sourceAccount,
                            formatToCurrency(data[i].dealAmount),
                            data[i].tenure,
                            data[i].fixedInterestRate,
                            data[i].rollover,
                        ])
                        .order([0, "desc"]);
                });
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                fixedDeposit();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getLoans() {
    $.ajax({
        type: "GET",
        url: "get-loan-accounts-api",
        datatype: "application/json",

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.responseCode == "000") {
                console.log(response);
                let data = response.data;
                let noLoans = noDataAvailable.replace("Data", "Loans");
                $("#loans_list_body").empty();

                if (data.length < 1) {
                    $("#loans_list_body").append(
                        `<td colspan="100%" class="text-center">
                        ${noLoans} </td>`
                    );
                    return;
                }
                let table = $("#loans_list").DataTable(datatableOptions);

                $.each(data, function (i) {
                    let facilityNo = `<b class="text-danger">${data[i].facilityNo} </b>`;
                    table.row
                        .add([
                            facilityNo,
                            data[i].description,
                            data[i].isoCode,
                            formatToCurrency(data[i].amountGranted),
                            formatToCurrency(data[i].loanBalance),
                        ])
                        .order([0, "desc"])
                        .draw(false);
                });
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getLoans();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getAccountTransactions(accountNumber, transLimit) {
    $.ajax({
        type: "POST",
        url: "account-transaction-history",
        datatype: "application/json",
        data: {
            accountNumber: accountNumber,
            endDate: "NULL",
            entrySource: "A",
            startDate: "NULL",
            transLimit: transLimit,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response.responseCode == "000") {
                let data = response.data;
                let noTransactions = noDataAvailable.replace(
                    "Data",
                    "Transactions"
                );
                $("#transaction_history_body").empty();
                if (data.length < 1) {
                    $("#transaction_history_body").append(
                        `<td colspan="100%" class="text-center">
                        ${noTransactions} </td>`
                    );
                    return;
                }
                $("#transaction_history tr:first").prepend("<td> Col </td>");
                $("#transaction_history tr:gt(0)").prepend("<td></td>");
                let table = $("#transaction_history").DataTable(
                    datatableOptions
                );

                $.each(data, function (i) {
                    let tData = data[i];
                    let transferAmount = formatToCurrency(tData.amount);
                    if (transferAmount > 0) {
                        icon = "fe-arrow-up ";
                        color = "text-success";
                    } else {
                        icon = "fe-arrow-down ";
                        color = "text-danger";
                    }
                    formattedTransferAmount = `<b class="${color}"><i class="${icon} ${color}  mr-1"></i>${transferAmount}<b>`;
                    let sysDate = new Date(data[i].postingSysDate);
                    let dd = String(sysDate.getDate()).padStart(2, "0");
                    let mm = String(sysDate.getMonth() + 1).padStart(2, "0"); //January is 0!
                    let yyyy = sysDate.getFullYear();
                    table.row
                        .add([
                            tData.postingSysDate,
                            `${dd}/${mm}/${yyyy}`,
                            formattedTransferAmount,
                            formatToCurrency(tData.runningBalance),
                            tData.narration,
                            tData.contraAccount,
                            tData.transactionNumber,
                            tData.batchNumber,
                        ])
                        .order([0, "desc"])
                        .column(0)
                        .visible(false, false)
                        .draw(false);
                });
            } else {
            }
        },
        error: function (xhr, status, error) {},
    });
}

function getCorrectFxRates() {
    $.ajax({
        type: "GET",
        url: "get-correct-fx-rate-api",
        datatype: "application/json",
        success: (response) => {
            if (response.responseCode === "000") {
                data = response.data;
                $.each(data, (i) => {
                    let { PAIR, MIDRATE } = data[i];
                    let [currency1, currency2] = PAIR.split("/");
                    let baseFlagsPath = "assets/images/flags/";
                    let imageProps =
                        "class='img-fluid'  style='height:13px; border-radius:1px;'";
                    currency2 = currency2.trim();
                    currency1 = currency1.trim();
                    if (currency1 !== currency2) {
                        $("#fx_rate_marquee").append(`
                            <span>
                    <img src="${baseFlagsPath}${currency1}.png" ${imageProps}>
                    /
                    <img src="/${baseFlagsPath}${currency2}.png" ${imageProps}> &nbsp;=&nbsp;
                    <span> <strong>  ${MIDRATE} </strong> </span>
                    </span>  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; `);
                    }
                });
            }
        },
    });
}

$(document).ready(function () {
    getCorrectFxRates();
    getLoans();
    fixedDeposit();

    $("#loans").on("click", () => {
        $("#loans_list").DataTable().draw();
    });
    $("#investments").on("click", () => {
        $("#fixed_deposit_list").DataTable().draw();
    });

    $("#account_transaction").on("change", function () {
        let accountNumber = $(this).val().split("~")[2];

        if (!accountNumber) {
            return false;
        }
        console.log(accountNumber);
        getAccountTransactions(accountNumber, 20);
    });
    $("#account_transaction").trigger("change");
});
