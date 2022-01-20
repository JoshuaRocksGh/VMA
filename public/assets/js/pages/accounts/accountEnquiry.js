$(function () {
    let today = new Date();
    let day = today.getDate().toString().padStart(2, "0");
    let month = (today.getMonth() + 1).toString().padStart(2, "0");
    let startDate = today.getFullYear() + "-" + month + "-01";
    let endDate = today.getFullYear() + "-" + month + "-" + day;
    let this_day = endDate;

    $("#startDate").val(startDate);
    $("#endDate").val(endDate);

    $("#from_account").on("change", function (e) {
        let option = $("#from_account option:selected");
        const accountNumber = option.attr("data-account-number");
        if (!accountNumber) {
            $(this).val("");
            return;
        }
        const accountProduct = option.attr("data-account-type");
        const accountCurrency = option.attr("data-account-currency");
        const accountDescription = option.attr("data-account-description");
        $(".account_product").text(accountProduct);
        $(".account_number").text(accountNumber);
        $(".display_from_account_currency").text(accountCurrency);
        $(".account_description").text(accountDescription);
        $(".account_currency").text(accountCurrency);
    });
    if (PageData.reqAccount) {
        PageData.reqAccount = decodeString(PageData.reqAccount);
        $(`#from_account option[data-account-number=${PageData.reqAccount}]`)
            .prop("selected", true)
            .trigger("change");
        $("#search_transaction").trigger("click");
    }

    $("#search_transaction").on("click", function () {
        startDate = $("#startDate").val();
        endDate = $("#endDate").val();
        if (startDate > this_day) {
            toaster("Start Date can't be greater than today", "warning");
            return false;
        } else if (endDate > this_day) {
            toaster("End Date can't be greater than today", "warning");
            return false;
        } else if (startDate > endDate) {
            toaster("Start Date can't be greater than End Date", "warning");
            return false;
        } else {
            var from_account = $("#from_account").val();
            console.log(startDate);
            if (!from_account) {
                toaster("please select an account", "warning");
                $("#search_transaction").text("Search");
                return false;
            } else {
                from_account_info = from_account.split("~");
                account_number = from_account_info[2].trim();
                blockUi(
                    "body",
                    "Getting Transactions...Please Wait",
                    "75px",
                    "#4fc6e1"
                );
                getAccountTransactions(
                    account_number,
                    startDate,
                    endDate
                ).always(() => unblockUi("body"));
                const pdfPath = `print-account-statement\?ac=${encodeString(
                    account_number
                )}&sd=${encodeString(startDate)}&ed=${encodeString(endDate)}`;
                $("#pdf_print").attr("href", pdfPath);

                $("#excel_print").html(`
                                <a href="{{ url('print-account-statement') }}">
                                    <img src="assets/images/excel.png" alt="" style="width: 22px; height: 25px;">
                                </a>
                            `);
            }
        }
    });

    $("#filter").on("change", (e) => {
        e.preventDefault();
        let workingTransactions;
        switch (e.currentTarget.value) {
            case "credit":
                workingTransactions = PageData.transaction.filter(
                    (e) => e.amount > 0
                );
                break;
            case "debit":
                workingTransactions = PageData.transaction.filter(
                    (e) => e.amount < 0
                );
                break;
            default:
                workingTransactions = PageData.transaction;
                break;
        }
        drawTransactionsTable(workingTransactions);
    });

    function drawTransactionsTable(workingTransactions) {
        $("#account_transaction_display_table tbody").empty();
        if (!workingTransactions || workingTransactions.length === 0) {
            let noTrans = noDataAvailable.replace("Data", "Transactions");
            $("#account_transaction_display_table tbody").append(
                `<td colspan="100%" class="text-center">
                ${noTrans} </td>`
            );
            return;
        }
        let transactionTableOptions = {
            destroy: true,
            columnDefs: [
                {
                    targets: 0,
                    // "data": "description",
                    render: function (data, type) {
                        if (type === "display" || type === "filter") {
                            const d = new Date(data);
                            return (
                                String(d.getDate()).padStart(2, "0") +
                                "-" +
                                String(d.getMonth() + 1).padStart(2, "0") +
                                "-" +
                                d.getFullYear()
                            );
                        }
                        return data;
                    },
                },
                {
                    targets: [1, 4],
                    render: function (data, type) {
                        if (type === "display" || type === "filter") {
                            const color =
                                data < 0 ? "text-danger" : "text-success";
                            // <i class="fe-arrow-up text-${color} mr-1"></i>
                            return `<b class='${color}'>
                                ${formatToCurrency(parseFloat(data))}
                            </b>
                            `;
                        }
                        return data;
                    },
                },
                {
                    targets: 6,
                    render: (data) =>
                        data.split("~")[0] === 0
                            ? (attachment = `<a href="#" data-value='${
                                  data.split("~")[1]
                              }' class="attachment-icon" >
                    <i class="fe-file-text d-block text-center text-success"></a>`)
                            : "N/A",
                },
            ],
        };
        let table = $("#account_transaction_display_table")
            .DataTable(transactionTableOptions)
            .clear();
        workingTransactions.forEach((trans) => {
            table.row
                .add([
                    trans.postingSysDate,
                    trans.amount,
                    trans.contraAccount,
                    trans.narration,
                    trans.runningBalance,
                    // data[index].batchNumber,
                    trans.documentReference,
                    `${trans.imageCheck}~${trans.batchNumber}`,
                ])
                .order([0, "desc"])
                .draw(false);
        });
        $(".attachment-icon").on("click", function (e) {
            e.preventDefault();
            const docId = $(this).attr("data-value");
            getTransDocument(docId);
        });
    }
    function getAccountTransactions(accountNumber, startDate, endDate) {
        return $.ajax({
            type: "POST",
            url: "account-transaction-history",
            datatype: "application/json",
            data: {
                accountNumber: accountNumber,
                endDate: endDate,
                entrySource: "A",
                startDate: startDate,
                transLimit: "20",
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (
                    response.responseCode !== "000" ||
                    response.data.length === 0
                ) {
                    toaster(response.message, "warning");
                    PageData.transaction = [];
                } else {
                    PageData.transaction = response.data;
                }
                $("#filter").trigger("change");
                return;
            },
            error: function (xhr, status, error) {
                toaster(error, "error");
            },
        });
    }
    function getTransDocument(batchNumber) {
        $.ajax({
            type: "POST",
            url: "account-trans-document-api",
            datatype: "application/json",
            data: { batchNumber },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.responseCode == "000") {
                    const data = response.data;
                    $.each(data, (i) => {
                        Object.entries(data[i]).forEach(([key, value], j) => {
                            if (key.includes("image")) {
                                let active = j === 0 ? "active" : "";
                                let img = `<div class="carousel-item ${active}">
                                <img class="d-block w-100" src="data:image/jpg;base64,${value}" alt="slide-${j}">
                                </div>`;
                                $(".carousel-inner").append(img);
                                let indicator = `<li data-target="#attachment_carousel" data-slide-to="${j}" class="${active}"></li>
                              `;
                                $(".carousel-indicators").append(indicator);
                            }
                        });
                    });
                    $("#attachment_modal").modal("show");
                } else {
                    $("#search_transaction").text("Search");
                }
            },
        });
    }
});
