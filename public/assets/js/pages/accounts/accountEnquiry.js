$(function () {
    $("select").select2();
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
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
        const accountBalance = option.attr("data-account-balance");
        const accountDescription = option.attr("data-account-description");
        $(".account_product").text(accountProduct);
        $(".account_number").text(accountNumber);
        $(".display_from_account_currency").text(accountCurrency);
        $(".account_description").text(accountDescription);
        $(".account_currency").text(accountCurrency);
        $("#account_balance").text(formatToCurrency(accountBalance));
        PageData.currentAccount = {
            accountCurrency,
            accountDescription,
            accountProduct,
            accountNumber,
            accountBalance,
        };
    });

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
                siteLoading("show");
                getAccountTransactions(
                    account_number,
                    startDate,
                    endDate
                ).always(() => siteLoading("hide"));
                $("#display_account_number").text(account_number);
                $("#display_search_start_date").text(startDate);
                $("#display_search_end_date").text(endDate);

                const pdfPath = `print-account-statement\?ac=${encodeString(
                    account_number
                )}&sd=${encodeString(startDate)}&ed=${encodeString(endDate)}`;
                $("#pdf_print").attr("href", pdfPath);

                $("#excel_print").on("click", (e) => {
                    e.preventDefault();
                    $(".buttons-excel").trigger("click");
                });
            }
        }
    });

    $("#from_account option:last").prop("selected", true).trigger("change");
    $("#search_transaction").trigger("click");
    if (PageData.requestAccount) {
        PageData.requestAccount = decodeString(PageData.requestAccount);
        $(
            `#from_account option[data-account-number=${PageData.requestAccount}]`
        )
            .prop("selected", true)
            .trigger("change");
        $("#search_transaction").trigger("click");
    }

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
            $(".download").hide();
            return;
        }
        let transactionTableOptions = {
            dom: "Bfrtip",
            buttons: ["excel"],
            destroy: true,
            language: {
                emptyTable: `${noDataAvailable}`,
                zeroRecords: `${noDataAvailable.replace(
                    "Data Available",
                    "Records Found"
                )}`,
            },
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
                            return `<div class="text-right"><b class='${color}'>
                                ${formatToCurrency(parseFloat(data))}
                            </b></div>
                            `;
                        }
                        return data;
                    },
                },
                {
                    targets: 5,
                    render: (data) => `<p class="text-left">${data}</p>`,
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
                    `<button type="button" class="btn btn-soft-info waves-effect waves-light more_details" data-toggle="modal" data-target="#accordion-modal" batch-no="${trans.batchNumber}"
                    posting-date="${trans.postingSysDate}" trans-number="${trans.transactionNumber}" value-date="${trans.valueDate}" branch="${trans.branch}"
                    narration="${trans.narration}" amount="${trans.amount}" contra-account="${trans.contraAccount}" channel="${trans.channel}">Details</button>`,
                ])
                .order([0, "desc"])
                .draw(false);
        });
        $(".more_details").click(function () {
            console.log($(this).attr("batch-no"));
            $(".transaction_date").html($(this).attr("posting-date"));
            $(".value_date").html($(this).attr("value-date"));
            $(".transaction_number").html($(this).attr("trans-number"));
            $(".narration").html($(this).attr("narration"));
            $(".amount").html($(this).attr("amount"));
            $(".branch").html($(this).attr("branch"));
            $(".contra-account").html($(this).attr("contra-account"));
            $(".channel").html($(this).attr("channel"));
        });
        $(".download").show();
        PageData.prompt = true;
        if (PageData?.accountAccount?.accountCurrency) {
            $(".currency_display").text(
                `(${PageData.accountAccount.accountCurrency})`
            );
        }
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
                console.log("account-transaction-history =>", response);
                if (
                    response.responseCode !== "000" ||
                    response.data.length === 0
                ) {
                    if (PageData?.prompt) {
                        toaster(response.message, "warning");
                    }
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
