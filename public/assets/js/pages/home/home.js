// --------- PENDING APPROVAL ------------ //
function getCorporateRequests(customerNumber, requestStatus) {
    $.ajax({
        type: "GET",
        url:
            "get-pending-requests?customerNumber=" +
            customerNumber +
            "&requestStatus=" +
            requestStatus,
        datatype: "application/json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function ({ responseCode, data }) {
            if (responseCode !== "000" || !data) {
                return;
            }
            $(".request_table tr").remove();
            $("#approval-count").text(data.length > 0 ? data.length : 0);
            const tableOptions = {
                lengthChange: false,
                pageLength: 5,
            };
            const table = $(".pending_transaction_request").DataTable(
                tableOptions
            );

            const requestTypeExpanded = {
                OWN: "Own Account transfer",
                SAB: "Same Account transfer",
                ACH: "ACH transfer",
                RTGS: "RTGS transfer",
                so: "Standing Order",
                BULK: "Bulk transfer",
                INTB: "International Transfer",
                CHQR: "Cheque Book Request",
                KORP: "E-Korpor",
                BKORP: "Bulk E-Korpor",
                UTL: "Utility Payment",
                AIR: "Airtime Payment",
                MOM: "Mobile Money Payment",
            };
            data.forEach((data) => {
                const {
                    narration,
                    postedby,
                    request_id: requestId,
                    request_type: requestType,
                    customer_no: customerNo,
                    currency,
                    account_no: accountNo,
                } = data;
                const date = new Date(data.post_date)
                    .toISOString()
                    .slice(0, 10);
                const amount = data.amount || data.total_amount;
                if (!amount || !currency) {
                    return;
                }
                const formattedAmount =
                    currency + " " + formatToCurrency(amount);
                const formattedRequestType =
                    requestTypeExpanded[requestType] || "Others";
                const actionButton = `
                <button type="button"
                    onclick="window.open('approvals-pending-transfer-details/${requestId}/${customerNo}'),
                        '_blank', 'location=yes,height=670,width=1200,scrollbars=yes,status=yes'"
                    class=" btn btn-xs btn-outline-primary font-10"
                >
                    Details
                </button>
            `;
                table.row
                    .add([
                        requestId,
                        formattedRequestType,
                        accountNo,
                        formattedAmount,
                        narration,
                        date,
                        postedby,
                        actionButton,
                    ])
                    .order([0, "desc"])
                    .draw();
                table.column(0).visible(false);
            });
        },
        error: function (xhr, status, error) {},
    });
}
pageData.barColors = [
    "#F15BB5",
    "#007ECC",
    "#F3704B",
    "#9B5DE5",
    "#00F5D4",
    "#686770",
    "#99E9FF",
    "#00BBF9",
    "#FEE440",
];
function transactionsBarChart(transactions) {
    // check if transactions is an array
    if (transactions?.length <= 0) {
        $("#transactionNoData").show();
        return;
    } //trim transactions to 30
    transactions = transactions.slice(0, 10).reverse();
    // check for previous chart and destroy it if any
    let chartStatus = Chart.getChart("transactionsBarChart");
    if (chartStatus != undefined) {
        chartStatus.destroy();
    }
    const transactionAmount = transactions.map(
        (transaction) => transaction.amount
    );
    const runningBalance = transactions.map(
        (transaction) => transaction.runningBalance
    );
    const labels = transactions.map((transaction) => {
        const date = new Date(transaction.postingSysDate).toLocaleString("en", {
            year: "numeric",
            month: "short",
            day: "numeric",
            hour: "numeric",
            minute: "numeric",
        });
        return date;
    });
    $("#transactionNoData").hide();
    new Chart("transactionsBarChart", {
        type: "bar",
        data: {
            labels,
            datasets: [
                {
                    data: transactionAmount,
                    label: "Transaction Amount",
                    backgroundColor: "#00F5D4",
                },
                {
                    data: runningBalance,
                    label: "Account Balance",
                    backgroundColor: "#00BBF9",
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Last 10 transactions",
                },
            },
            scales: {
                y: {
                    beginAtZero: false,
                },
            },
        },
    });
}
function accountsPieChart({ xValues = [], yValues = [], title }) {
    // check for previous chart and destroy it if any
    let chartStatus = Chart.getChart("accountsPieChart");
    if (chartStatus != undefined) {
        chartStatus.destroy();
    }
    new Chart("accountsPieChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [
                {
                    backgroundColor: pageData?.barColors,
                    data: yValues,
                },
            ],
        },
        options: {
            emptyDoughnut: {
                color: "#007ECC",
                width: 2,
                radiusDecrease: 20,
            },
            plugins: {
                legend: {
                    position: "right",
                },
                title: {
                    position: "top",
                    display: true,
                    text: title.toUpperCase(),
                },
            },
        },
    });
}

// PIE CHART NEW FUNCTIONS //

function getData({ url, name, data, method }) {
    return $.ajax({
        type: method ?? "GET",
        url,
        data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        datatype: "application/json",
        success: function (response) {
            const { data } = response;
            pageData[name] = data;
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
// loanBalance
// "get-loan-accounts-api" loanBalance
// "get-accounts-api", localEquivalentAvailableBalance

// END OF PIE CHART //

// function account_line_chart(cus_accounts, acc_line_details) {
//     let acc_dataset = [];
//     let chart_data_details = new Array();
//     let before_reverse = [];
//     let acc_chart_details = acc_line_details;
//     chart_data_details = [];
//     $.each(acc_chart_details, function (index) {
//         let chart_res = acc_chart_details[index];
//         let new_chart_res = chart_res[2];
//         var mii = new_chart_res.reverse();
//         before_reverse.push(mii);
//         chart_data_details.push({
//             label: `${chart_res[0]} ${chart_res[1]}`,
//             data: chart_res[2],
//             borderColor: "red",
//             fill: false,
//         });
//     });
//     let apiData = cus_accounts;
//     let datasets = [];
//     var numbers = [];
//     var dates = [];
//     $.each(apiData, function (index) {
//         let apiDataResult = apiData[index];
//         numbers = [];
//         dates = [];
//         $.each(apiDataResult, function (index) {
//             numbers.push(apiDataResult[index].runningBalance);
//             var d = apiDataResult[index].valueDate;
//             d = d.split(" ")[0];
//             dates.push(d);
//         });
//     });
//     const smallest_number = Math.min(...numbers);
//     const largest_number = Math.max(...numbers);
//     let uniqueDates = [...new Set(dates)].sort();
//     new Chart("casa_myChart", {
//         type: "line",
//         data: {
//             labels: dates,
//             datasets: chart_data_details,
//         },
//         options: {
//             legend: {
//                 display: true,
//             },
//             title: {
//                 display: true,
//                 text: "Account History",
//             },
//         },
//     });
// }

// function account_transaction() {
//     $.ajax({
//         type: "GET",
//         url: "get-my-account",
//         datatype: "application/json",
//         success: function (response) {
//             let data = response.data;
//             $.each(data, function (index) {
//                 $("#account_transaction").append(
//                     $("<option>", {
//                         value:
//                             data[index].accountType +
//                             "~" +
//                             data[index].accountDesc +
//                             "~" +
//                             data[index].accountNumber +
//                             "~" +
//                             data[index].currency +
//                             "~" +
//                             data[index].availableBalance,
//                     }).text(
//                         data[index].accountNumber +
//                             " " +
//                             "-" +
//                             " " +
//                             data[index].currency +
//                             " " +
//                             "-" +
//                             " " +
//                             formatToCurrency(
//                                 parseFloat(data[index].availableBalance.trim())
//                             )
//                     )
//                 );
//             });
//         },
//     });
// }

// function fixed_deposit(account_data) {
//     $.ajax({
//         type: "GET",
//         url: "fixed-deposit-account-api",
//         datatype: "application/json",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             let data = response.data;
//             let noInvestments = noDataAvailable.replace("Data", "Investments");
//             if (response.responseCode == "000") {
//                 let fixed_deposit_count = 0;
//                 if (response.data.length > 0) {
//                     account_data.i_invest_total = 0;
//                     account_data.i_invest_total = 0;
//                     $.each(data, function (index) {
//                         let invest_amount = data[index].dealAmount;
//                         invest_amount = invest_amount.replace(/,/g, "");
//                         account_data.i_invest_total += Math.abs(
//                             parseFloat(invest_amount)
//                         );
//                         if (
//                             account_data.i_invest_total != null ||
//                             account_data.i_invest_total != ""
//                         ) {
//                             $(".total_investment_amount").text(
//                                 `${formatToCurrency(
//                                     parseFloat(account_data.i_invest_total)
//                                 )}`
//                             );
//                         } else {
//                             $(".total_investment_amount").text("0.00");
//                         }

//                         var data_rollover = data[index].rollover;
//                         if (data_rollover == "Y") {
//                             var rollover_ = "Yes";
//                         } else {
//                             var rollover_ = "No";
//                         }

//                         var fixedInterestRate = data[index].fixedInterestRate;
//                         if (
//                             fixedInterestRate == null ||
//                             fixedInterestRate == undefined
//                         ) {
//                             var interest_rate = "0";
//                         } else {
//                             var interest_rate = data[index].fixedInterestRate;
//                         }

//                         console.log(
//                             `total investments ${account_data.i_invest_total}`
//                         );
//                         $(".fixed_deposit_account").append(
//                             `<tr>
//                                                     <td><b> ${
//                                                         data[index]
//                                                             .interestAccount
//                                                     } </b></td>
//                                                     <td><b class="float-right"> ${formatToCurrency(
//                                                         parseFloat(
//                                                             data[index]
//                                                                 .dealAmount
//                                                         )
//                                                     )} </b></td>
//                                                     <td><b> ${
//                                                         data[index].tenure
//                                                     } </b></td>
//                                                     <td><b> ${interest_rate} </b></td>
//                                                     <td><b> ${rollover_} </b></td>
//                                                 </tr>`
//                         );
//                         fixed_deposit_count = fixed_deposit_count + 1;
//                     });
//                     $(".investment_count").text(fixed_deposit_count);
//                 } else {
//                     $(".fixed_deposit_account").append(
//                         `
//                                                 <td colspan="100%"  class="text-center">${noInvestments} </td>

//                                             `
//                     );
//                     return;
//                 }
//             } else {
//                 $(".my_investment_loading_area").hide();
//                 $(".my_investment_error_area").show();
//                 $(".my_investment_no_data_found").hide();
//                 $(".my_investment_display_area").hide();
//             }
//         },
//         error: function (xhr, status, error) {
//             $(".my_investment_loading_area").hide();
//             $(".my_investment_error_area").show();
//             $(".my_investment_no_data_found").hide();
//             $(".my_investment_display_area").hide();

//             setTimeout(function () {
//                 fixed_deposit(account_data);
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

// function get_accounts(account_data) {
//     $(".accounts_display_area").hide();
//     $(".accounts_error_area").hide();
//     $(".accounts_loading_area").show();

//     $.ajax({
//         type: "GET",
//         url: "get-accounts-api",
//         datatype: "application/json",

//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             console.log("CURRENT & SAVINGS ACCOUNT:", response);
//             if (response.responseCode == "000") {
//                 let data = response.data;
//                 let i_have_total = 0;
//                 let count = 0;

//                 $(".currency_and_savings_account_no").text(data.length);
//                 account_data.i_have_total = 0;
//                 $.each(data, function (index) {
//                     let localEquivalentAvailableBalance =
//                         data[index].localEquivalentAvailableBalance;
//                     localEquivalentAvailableBalance =
//                         localEquivalentAvailableBalance.replace(/,/g, "");

//                     account_data.i_have_total += Math.abs(
//                         parseFloat(localEquivalentAvailableBalance)
//                     );
//                     if (
//                         account_data.i_have_total != null ||
//                         account_data.i_have_total != ""
//                     ) {
//                         $(".total_casa_amount").text(
//                             `${formatToCurrency(
//                                 parseFloat(account_data.i_have_total)
//                             )}`
//                         );
//                     } else {
//                         $(".total_casa_amount").text(
//                             `${formatToCurrency(parseFloat(0.0))}`
//                         );
//                     }
//                     if (
//                         data[index].availableBalance != null ||
//                         data[index].availableBalance != undefined
//                     ) {
//                         var availableBalance = formatToCurrency(
//                             parseFloat(data[index].availableBalance)
//                         );
//                     } else {
//                         var availableBalance = "0.00";
//                     }

//                     $(".casa_list_display").append(
//                         `<tr>
//                                         <td>  <a href="{{ url('account-enquiry?ac=${encodeString(
//                                             data[index].accountNumber
//                                         )}') }}"> <b class="text-primary">${
//                             data[index].accountNumber
//                         } </b> </a></td>
//                                         <td> <b> ${
//                                             data[index].accountDesc
//                                         } </b>  </td>

//                                         <td> <b> ${
//                                             data[index].currency
//                                         }  </b>  </td>
//                                         <td><b> ${formatToCurrency(
//                                             parseFloat(
//                                                 data[index].ledgerBalance
//                                             )
//                                         )}</b></td>
//                                         <td> <b> ${formatToCurrency(
//                                             parseFloat(
//                                                 data[index].availableBalance
//                                             )
//                                         )}   </b>  </td>
//                                         <td> <b> ${formatToCurrency(
//                                             parseFloat(data[index].odLimit)
//                                         )}   </b>  </td>
//                                         <td> <b> ${formatToCurrency(
//                                             parseFloat(data[index].lienAmount)
//                                         )}   </b>  </td>

//                                     </tr>`
//                     );
//                 });

//                 $(".i_have_amount").text(
//                     formatToCurrency(parseFloat(account_data.i_have_total))
//                 );

//                 $(".accounts_error_area").hide();
//                 $(".accounts_loading_area").hide();
//                 $(".accounts_display_area").show();

//             } else {
//                 $(".accounts_error_area").hide();
//                 $(".accounts_loading_area").hide();
//                 $(".accounts_display_area").show();
//             }
//         },
//         error: function (xhr, status, error) {
//             $(".accounts_loading_area").hide();
//             $(".accounts_display_area").hide();
//             $(".accounts_error_area").show();
//             setTimeout(function () {
//                 get_accounts(account_data);
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

// function get_loans(account_data) {
//     $.ajax({
//         type: "GET",
//         url: "get-loan-accounts-api",
//         datatype: "application/json",

//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             let noLoans = noDataAvailable.replace("Data", "Loans");

//             if (response.responseCode == "000") {
//                 var data = response.data;
//                 let noLoans = noDataAvailable.replace("Data", "Loans");

//                 if (!response.data) {
//                     return false;
//                     $(".loan_no_data_found").show();
//                     $(".loans_display_area").hide();
//                 } else {
//                     if (response.data == null) {
//                         $("#loans_list_body").append(
//                             `<td colspan="100%" class="text-center">
//                                                 ${noLoans} </td>`
//                         );
//                         return;
//                     } else {
//                         let loan_count = 0;

//                         if (response.data.length > 0) {
//                             $("#p_loans_display").show();
//                             $(".loans_display_area").show();

//                             let i_owe_total = 0;
//                             let count = 0;

//                             account_data.i_owe_total = 0;
//                             $.each(data, function (index) {
//                                 let loanBalance = data[index].loanBalance;
//                                 loanBalance = loanBalance.replace(/,/g, "");
//                                 account_data.i_owe_total += Math.abs(
//                                     parseFloat(loanBalance)
//                                 );

//                                 account_data.i_owe_total;

//                                 if (
//                                     account_data.i_owe_total != null ||
//                                     account_data.i_owe_total != ""
//                                 ) {
//                                     $(".total_loan_account").text(
//                                         formatToCurrency(
//                                             parseFloat(account_data.i_owe_total)
//                                         )
//                                     );
//                                 } else {
//                                     $(".total_loan_account").text(
//                                         formatToCurrency(parseFloat(0.0))
//                                     );
//                                 }

//                                 $(".loans_display").append(
//                                     `
//                                                             <tr>
//                                                                 <td>  <a href="{{ url('account-enquiry?ac=${encodeString(
//                                                                     data[index]
//                                                                         .facilityNo
//                                                                 )}') }}"> <b class="text-danger">${
//                                         data[index].facilityNo
//                                     } </b> </a></td>
//                                                                 <td> <b> ${
//                                                                     data[index]
//                                                                         .description
//                                                                 } </b>  </td>
//                                                                 <td> <b> ${
//                                                                     data[index]
//                                                                         .isoCode
//                                                                 }  </b>  </td>
//                                                                 <td> <b class="float-right"> ${formatToCurrency(
//                                                                     parseFloat(
//                                                                         data[
//                                                                             index
//                                                                         ]
//                                                                             .amountGranted
//                                                                     )
//                                                                 )}   </b> </b></td>
//                                                                 <td> <b class="float-right"> ${formatToCurrency(
//                                                                     parseFloat(
//                                                                         data[
//                                                                             index
//                                                                         ]
//                                                                             .loanBalance
//                                                                     )
//                                                                 )}  </b>  </td>
//                                                             </tr>`
//                                 );
//                                 loan_count = loan_count + 1;
//                             });

//                             $(".loan_count").text(loan_count);
//                         } else {
//                             $(".loans_display").append(
//                                 `<td colspan="100%" class="text-center">
//                                                         ${noLoans} </td>`
//                             );
//                             return;
//                         }
//                     }
//                 }
//             } else if (response.responseCode == "00") {
//                 $(".loan_no_data_found").show();
//                 $(".loans_error_area").hide();
//                 $(".loans_loading_area").hide();
//                 $(".loans_display_area").hide();
//             } else {
//                 $(".loans_display").append(
//                     `<td colspan="100%" class="text-center">
//                                                         ${noLoans} </td>`
//                 );
//                 return;
//             }
//         },
//         error: function (xhr, status, error) {
//             $(".loans_display_area").hide();
//             $(".loans_loading_area").hide();
//             $(".loans_error_area").show();
//             setTimeout(function () {
//                 get_loans(account_data);
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }
// let cus_accounts = [];

// let acc_line_details = [];

// function getAccountTransactions(
//     accountNumber,
//     accountCurrency,
//     startDate,
//     endDate,
//     transLimit
// ) {
//     $.ajax({
//         type: "POST",
//         url: "account-transaction-history",
//         datatype: "application/json",
//         data: {
//             accountNumber: accountNumber,
//             endDate: endDate,
//             entrySource: "A",
//             startDate: startDate,
//             transLimit: transLimit,
//         },
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             if (response.responseCode == "000") {
//                 if (
//                     response.data == "" ||
//                     response.data == null ||
//                     response.data == undefined
//                 ) {
//                     $("#line_chart_no_data").show();
//                     $("#casa_myChart").hide();
//                 } else {
//                     $("#line_chart_no_data").hide();
//                     let data_ = response.data;
//                     let acc_run_balances = [];
//                     cus_accounts = [];
//                     cus_accounts.push(response.data);
//                     acc_run_balances = [];
//                     $.each(data_, function (index) {
//                         acc_run_balances.push(data_[index].runningBalance);
//                     });

//                     var details = [
//                         accountNumber,
//                         accountCurrency,
//                         acc_run_balances,
//                     ];
//                     acc_line_details = [];
//                     acc_line_details.push(details);

//                     var limit = 10;
//                     let data = response.data.slice(0, limit);
//                     account_line_chart(cus_accounts, acc_line_details);
//                 }
//             }
//         },
//         error: function (xhr, status, error) {},
//     });
// }

// var global_selected_currency = "";

function prepareGraphValues() {
    const accountsPie = {};
    const totalsPie = {
        xValues: ["Deposits", "Loans", "Investments"],
        yValues: [],
    };
    accountsPie.xValues = pageData.accounts.map((account) =>
        String(account.accountNumber)
    );

    //accounts
    let accountsTotal = 0;
    accountsPie.yValues = pageData.accounts.map((account) => {
        const amount =
            parseFloat(
                String(account.localEquivalentAvailableBalance).replace(
                    /,/g,
                    ""
                )
            ) || 0.0;
        accountsTotal += amount;
        return amount;
    });

    //loans
    const loansPie = {};
    loansPie.xValues = pageData.loans.map((loan) => String(loan.facilityNo));
    let loansTotal = 0;
    loansPie.yValues = pageData.loans.map((loan) => {
        const amount = parseFloat(loan.loanBalance) || 0.0;
        loansTotal += amount;
        return amount;
    });

    //investments
    const investmentPie = {};
    investmentPie.xValues = pageData.investments.map((investment) =>
        String(investment.investmentAccountNumber)
    );
    let investmentsTotal = 0;
    investmentPie.yValues = pageData.investments.map((investment) => {
        const amount = parseFloat(investment.investmentBalance) || 0.0;
        investmentsTotal += amount;
        return amount;
    });

    totalsPie.yValues = [accountsTotal, loansTotal, investmentsTotal];
    pageData.pieValues = {
        accountsPie,
        loansPie,
        investmentPie,
        totalsPie,
    };
}

$(async () => {
    $("select").select2();
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
    siteLoading("show");

    await Promise.all([
        getData({ url: "fixed-deposit-account-api", name: "investments" }),
        getData({ url: "get-loan-accounts-api", name: "loans" }),
        getData({ url: "get-accounts-api", name: "accounts" }),
    ]);

    // siteLoading("hide");
    prepareGraphValues();
    accountsPieChart({ title: "Accounts", ...pageData.pieValues.totalsPie });
    function renderCurrency(data, row) {
        return `<div class="float-right">${
            row.currency ?? row.isoCode
        } <span class="font-weight-bold">${formatToCurrency(
            parseFloat(data)
        )}</span></div>`;
    }
    $(".canvas-tab").on("click", (e) => {
        const selectedTab = $(e.currentTarget).attr("data-target");
        accountsPieChart({
            title: selectedTab.slice(0, -3),
            ...pageData.pieValues[selectedTab],
        });
    });
    const noDataDisplay = `<div colspan='100%' class='text-center' >
    ${noDataAvailable}
</div>`;
    const datatableOptions = {
        searching: false,
        lengthChange: false,
        paging: false,
        info: false,
        visible: true,
        language: {
            emptyTable: noDataDisplay,
            zeroRecords: noDataDisplay,
        },
    };
    $("#accounts_table")
        .DataTable({
            ...datatableOptions,
            data: pageData.accounts,
            columns: [
                {
                    data: "accountNumber",
                    render: function (data) {
                        return `<a href='account-enquiry?ac=${encodeString(
                            data
                        )}'>${data}</a>`;
                    },
                },
                { data: "accountDesc" },
                { data: "accountType" },
                {
                    data: "ledgerBalance",
                    render: (data, type, row) => renderCurrency(data, row),
                },
                {
                    data: "availableBalance",
                    render: (data, type, row) => renderCurrency(data, row),
                },
                {
                    data: "odLimit",
                    render: (data, type, row) => renderCurrency(data, row),
                },
            ],
        })
        .draw();
    $("#investments_table")
        .DataTable({
            ...datatableOptions,
            data: pageData.investments,
            columns: [
                {
                    data: "AccountNo",
                },
                {
                    data: "dealAmount",
                    render: (data, type, row) => renderCurrency(data, row),
                },
                { data: "tenure" },
                { data: "fixedInterestRate" },
                { data: "rollover" },
            ],
        })
        .draw();
    $("#loans_table")
        .DataTable({
            ...datatableOptions,
            data: pageData.loans,
            columns: [
                {
                    data: "facilityNo",
                },
                { data: "description" },
                {
                    data: "amountGranted",
                    render: (data, type, row) => renderCurrency(data, row),
                },
                {
                    data: "loanBalance",
                    render: (data, type, row) => renderCurrency(data, row),
                },
            ],
        })
        .draw();

    $(".toggle-account-visibility").on("click", function () {
        $(".eye-open").toggle();
        $(".open-money").toggleClass("password-font");
    });
    // all_my_account_balance();

    getCorporateRequests(customer_no, "P");

    $("#chart_account").on("change", async function (e) {
        const target = $("#chart_account option:selected");
        const accountNumber = target.attr("data-account-number");
        const accountCurrency = target.attr("data-account-currency");
        console.log("A", { target, accountCurrency, accountNumber });
        const today = new Date();
        let startDate = new Date(today.setMonth(today.getMonth() - 300))
            .toISOString()
            .split("T")[0];
        const endDate = new Date().toISOString().split("T")[0];
        const transLimit = "20";
        blockUi({ block: "#acc_history" });
        await getData({
            url: "account-transaction-history",
            name: "transactions",
            method: "POST",
            data: {
                accountNumber,
                startDate,
                endDate,
                transLimit,
            },
        });
        unblockUi("#acc_history");
        transactionsBarChart(pageData.transactions);
        console.log("trans", pageData);
    });
    $("#chart_account").trigger("change");
});
