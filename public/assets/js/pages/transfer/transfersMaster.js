function makeTransfer(url, data) {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: url,
        datatype: "application/json",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            siteLoading("hide");
            console.log(response);
            if (response.responseCode == "000") {
                swal.fire({
                    title: "Transfer successful!",
                    html: response.message,
                    icon: "success",
                    showConfirmButton: "false",
                });
                getAccounts();
                $("#success-message").text(response.message);
                $("#spinner").hide();
                $("#spinner-text").hide();
                $("#back_button").hide();
                $(".hide-on-success").hide();
                $(".rtgs_card_right").hide();
                $(".show-on-success").show();
            } else {
                toaster(response.message, "error", 3000);
                $("#confirm_transfer").show();
                $("#confirm_modal_button").prop("disabled", false);
                $("#spinner").hide();
                $("#spinner-text").hide();
                $("#back_button").show();
                $("#print_receipt").hide();
                $("#related_information_display").show();
                $(".success_gif").hide();
            }
        },
        error: function (error) {
            siteLoading("hide");
            toaster(error.statusText, error);
        },
    });
}

function corporateSpecific(transferInfo) {
    const endPoint =
        "corporate-" +
        transferType.toLowerCase().trim().replace(" ", "-") +
        "-transfer-api";
    makeTransfer(endPoint, transferInfo);
}

function getToAccount(endPoint) {
    siteLoading("show");
    $.ajax({
        type: "GET",
        url: endPoint,
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (response.data.length > 0) {
                $(".no_beneficiary").hide();
                console.log(data);
                $("#to_account")
                    .empty()
                    .trigger("change")
                    .append(
                        `<option disabled selected> ---Select Beneficiary A/C --- </option>`
                    );
                data.forEach((e) => {
                    const value = `${e.BEN_ACCOUNT}`;
                    const dataAttr = `data-account-number='${e.BEN_ACCOUNT}'
                      data-account-type='${e.BENEF_TYPE}'
                      data-account-description='${e.NICKNAME}'  
                      data-account-email='${e.EMAIL}'
                      data-account-currency ='${e.BEN_ACCOUNT_CURRENCY}'
                      data-account-address='${e.ADDRESS_1}' 
                      data-bank-name='${e.BANK_NAME}' 
                      data-bank-swift-code='${e.BANK_SWIFT_CODE}'
                      data-bank-country='${e.BANK_COUNTRY}' `;
                    const text = `${e.BEN_ACCOUNT} || ${e.NICKNAME}`;
                    const option = `<option value="${value}" ${dataAttr}>${text}</option>`;
                    $("#to_account").append(option);
                });
                siteLoading("hide");
            } else {
                $(".no_beneficiary").show();
                siteLoading("hide");
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getToAccount();
            }, $.ajaxSetup().retryAfter);
        },
    });
}
function getCountries() {
    return $.ajax({
        type: "GET",
        url: "get-countries-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 1) {
                $("#onetime_select_country").empty();
                $("#onetime_select_country").append(
                    `<option selected disabled value=""> --- Select Country ---</option>`
                );
                $.each(data, (i) => {
                    let { actualCode, codeType, description } = data[i];
                    option = `<option value="${codeType}"  data-country-code="${actualCode}">${description}</option>`;
                    $("#onetime_select_country").append(option);
                });
                // $("#onetime_select_country").selectpicker("refresh");
            } else {
                toaster(response.message);
            }
        },
    });
}

function getInternationalBanks(countryCode) {
    return $.ajax({
        type: "GET",
        url: "get-international-bank-list-api",
        data: {
            countryCode,
        },
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 1) {
                $("#onetime_select_bank").empty();
                $("#onetime_select_bank").append(
                    `<option selected disabled value=""> --- Select Bank ---</option>`
                );
                $.each(data, (i) => {
                    let { BICODE, BANK_DESC, COUNTRY } = data[i];
                    option = `<option value="${BICODE}" data-bank-country="${COUNTRY}" >${BANK_DESC}</option>`;
                    $("#onetime_select_bank").append(option);
                });
                // $("#onetime_select_bank").selectpicker("refresh");
            } else {
                toaster(response.message);
            }
        },
    });
}

function getLocalBanks() {
    return $.ajax({
        type: "GET",
        url: "get-bank-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 1) {
                $("#onetime_select_bank").empty();
                $("#onetime_select_bank").append(
                    `<option selected disabled value=""> --- Select Bank ---</option>`
                );
                $.each(data, (i) => {
                    let { bankCode, bankDescription, bankSwiftCode } = data[i];
                    option = `<option value="${bankCode}" data-bank-swift-code="${bankSwiftCode}">${bankDescription}</option>`;
                    $("#onetime_select_bank").append(option);
                });
                // $("#onetime_select_bank").selectpicker("refresh");
            } else {
                toaster(response.message);
            }
        },
    });
}

function expenseTypes() {
    $.ajax({
        type: "GET",
        url: "get-expenses",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            $.each(data, function (index) {
                if (data[index].expenseName === "Others") {
                    $("#category").append(
                        $("<option selected>", {
                            value:
                                data[index].expenseCode +
                                "~" +
                                data[index].expenseName,
                        }).text(data[index].expenseName)
                    );
                } else {
                    $("#category").append(
                        $("<option>", {
                            value:
                                data[index].expenseCode +
                                "~" +
                                data[index].expenseName,
                        }).text(data[index].expenseName)
                    );
                }
            });
            $("#category").trigger("change");
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                expenseTypes();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getStandingOrderFrequencies() {
    $.ajax({
        type: "GET",
        url: "get-standing-order-frequencies-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            $.each(data, function (index) {
                $("#beneficiary_frequency").append(
                    `<option value=${data[index].code}~${data[index].name}>
                    ${data[index].name} </option>`
                );
            });
            // $("#beneficiary_frequency").selectpicker("refresh");
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getStandingOrderFrequencies();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getAccountDescription(account) {
    $("#onetime_beneficiary_name_loader").show();
    $.ajax({
        type: "POST",
        url: "get-account-description",
        datatype: "application/json",
        data: {
            accountNumber: account.beneficiaryAccountNumber,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.responseCode == "000") {
                details = response.data;
                account.beneficiaryAccountName = details.accountDescription;
                account.beneficiaryAccountCurrency = details.accountCurrencyIso;
                handleToAccount(account);
            } else {
                toaster(response.message, "warning");
                account.beneficiaryAccountName = "";
                account.beneficiaryAccountCurrency = "";
                handleToAccount(account);
            }
            $("#onetime_beneficiary_name_loader").hide();
        },
    });
}

function handleToAccount(account) {
    let {
        beneficiaryName,
        beneficiaryAccountCurrency,
        beneficiaryAccountNumber,
    } = account;
    $("#onetime_beneficiary_name").val(beneficiaryName);
    $(".display_to_account_name").text(beneficiaryName);
    $(".display_to_account_currency").text(beneficiaryAccountCurrency);
    $(".display_to_account_no").text(beneficiaryAccountNumber);
}

$(() => {
    let transferInfo = new Object();
    let fromAccount = new Object();
    $(".account_currency").text("SLL");
    let toAccount = new Object();
    let onetimeToAccount = new Object();
    let confirmationCompleted = false;
    let validationsCompleted = false;
    let isOnetimeTransfer = false;
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
    $("#to_account").select2({
        minimumResultsForSearch: Infinity,
    });
    $("#category").select2();

    function renderOwnAccounts() {
        $("#to_account").empty()
            .append(`<option disabled selected value=""> -- Select
         Destination Account --</option>`);

        userAccounts
            .filter(
                (account) => account.accountNumber !== fromAccount.accountNumber
            )
            .forEach(
                (account) => {
                    let option = getAccountOption(account);
                    $("#to_account").append(option);
                }
                //             $("#to_account").append(`<option
                //     value=" ${account.accountType} ~ ${account.accountDesc} ~ ${account.accountNumber} ~ ${account.currency} ~ ${account.availableBalance}">
                //      ${account.accountDesc}  ||  ${account.accountNumber} || ${account.currency} || ${account.availableBalance}
                // </option>`)
            );
        $("#to_account").trigger("change");
    }

    function updateTransactionType(type) {
        if (type === "onetime") {
            isOnetimeTransfer = true;
            $("#save_as_beneficiary").addClass("show-on-success");
        } else if (type === "beneficiary") {
            $("#save_as_beneficiary").hide();
            isOnetimeTransfer = false;
        }
    }
    if (transferType !== "Own Account") {
        let beneCode;
        if (transferType === "Same Bank") {
            beneCode = "SAB";
        } else if (transferType === "Local Bank") {
            beneCode = "OTB";
            getLocalBanks();
            // $("onetime_beneficiary_name").removeAttribute("readonly");
        } else if (transferType === "Standing Order") {
            // getToAccount(`get-transfer-beneficiary-api?beneType=OTB`);
            // getToAccount(`get-transfer-beneficiary-api?beneType=SAB`);
            getStandingOrderFrequencies();
            $(".email-div").hide(500);
            $(".bank_div").hide(500);
        } else if (transferType === "International Bank") {
            beneCode = "INTB";
            getCountries();
        }
        if (beneCode) {
            getToAccount(`get-transfer-beneficiary-api?beneType=${beneCode}`);
        }
    }
    expenseTypes();

    // HANDLE BENE TOGGLE
    $("#onetime_tab").on("click", () => {
        $(".display_to_account").text("");
        $(".display_to_account_no").text(
            onetimeToAccount.beneficiaryAccountNumber
        );
        if (onetimeToAccount.beneficiaryName) {
            $("#onetime_beneficiary_name").val(
                onetimeToAccount.beneficiaryName
            );
            $(".display_to_account_name").text(
                onetimeToAccount.beneficiaryName
            );
            $(".display_to_account_currency").text(
                onetimeToAccount.beneficiaryAccountCurrency
            );
        }
        updateTransactionType("onetime");
    });
    $("#beneficiary_tab").on("click", () => {
        updateTransactionType("beneficiary");
        $(".display_to_account").text("");
        $("#to_account").trigger("change");
    });

    $("#from_account").on("change", function () {
        let accountInfo = $(this).val();

        if (!accountInfo) {
            $(".display_from_account").val("").text("");
            $(".account_currency").text("SLL");
            return false;
        }
        const accountData = accountInfo.split("~");
        // let accountType = accountData[0].trim();
        let accountName = accountData[1].trim();
        let accountNumber = accountData[2].trim();
        let accountCurrency = accountData[3].trim();
        let accountBalance = parseFloat(accountData[4].trim());
        let accountCurrencyCode = accountData[5].trim();
        let accountMandate = accountData[6];
        fromAccount = {
            accountName,
            accountNumber,
            accountCurrency,
            accountBalance,
            accountCurrencyCode,
            accountMandate,
        };
        $(".display_from_account_name").text(accountName);
        $(".display_from_account_no").text(accountNumber);
        $(".display_from_account_currency").text(accountCurrency);
        $(".account_currency").text(accountCurrency).val(accountCurrency);
        $(".display_from_account_balance").text(
            formatToCurrency(accountBalance)
        );
        if (transferInfo.amount) {
            $(".display_transfer_currency").text(accountCurrency);
        }
        if (transferType === "Own Account") {
            renderOwnAccounts();
        } else if (transferType === "Standing Order" && $("#sta")) {
        }
    });

    $("#to_account").on("change", function () {
        const beneficiaryInfo = $(this).val();
        if (!beneficiaryInfo) {
            $(".display_to_account").val("").text("");
            return false;
        }
        let target = $("#to_account option:selected");
        console.log(target);
        let accountData = beneficiaryInfo.split("~");
        let beneficiaryType = target.attr("data-account-type");

        let beneficiaryName = target.attr("data-account-description");

        let beneficiaryAccountNumber = target.attr("data-account-number");
        let beneficiaryAccountCurrency = target.attr("data-account-currency");
        let beneficiaryEmail,
            beneficiaryAddress,
            bankName,
            bankCode,
            bankCountryCode;
        if (transferType !== "Own Account") {
            beneficiaryEmail = target.attr("data-account-email");
            $(".display_to_receiver_email")
                .val(beneficiaryEmail)
                .text(beneficiaryEmail);
        }
        // set summary values for display
        $(".display_to_account_type")
            .text(beneficiaryType)
            .val(beneficiaryType);
        $(".display_to_account_name")
            .text(beneficiaryName)
            .val(beneficiaryName);
        $(".display_to_account_no")
            .text(beneficiaryAccountNumber)
            .val(beneficiaryAccountNumber);

        $(".display_to_account_currency").text(beneficiaryAccountCurrency);

        if (
            transferType === "Local Bank" ||
            transferType === "International Bank"
        ) {
            bankName = target.attr("data-bank-name");
            bankCode = target.attr("data-bank-swift-code");
            beneficiaryAddress = target.attr("data-account-address");

            $(".display_to_account_address").text(beneficiaryAddress);
            $("#beneficiary_address").val(beneficiaryAddress);
            $(".display_to_bank_name").text(bankName);
            $("#beneficiary_bank_name").val(bankName);
        }
        if (transferType === "International Bank") {
            bankCountryCode = target.attr("data-bank-country");
        }
        toAccount = {
            beneficiaryName,
            beneficiaryAccountNumber,
            beneficiaryAccountCurrency,
            beneficiaryEmail,
            beneficiaryAddress,
            bankCode,
            bankName,
            bankCountryCode,
        };
    });

    $("#amount").on("keyup", function () {
        transferInfo.transferAmount = $(this).val();
        if (!transferInfo.transferAmount) {
            $(".display_transfer_amount").text("");
            $(".display_transfer_currency").text("");
            return false;
        }
        if (!fromAccount.accountCurrency) {
            $(".display_transfer_currency").text("SLL");
        } else {
            $(".display_transfer_currency").text(fromAccount.accountCurrency);
        }
        $(".display_transfer_amount").text(
            formatToCurrency(transferInfo.transferAmount)
        );
    });
    // ===================================================
    //  isOnetimeTransfer
    // ===================================================
    $("#onetime_account_number").on("keyup", function () {
        if (onetimeToAccount.beneficiaryAccountNumber === $(this).val()) {
            return false;
        }
        onetimeToAccount.beneficiaryAccountNumber = "";
        if ($(this).val() === fromAccount.beneficiaryAccountNumber) {
            toaster("Cannot send to same account", "warning");
            return false;
        }
        onetimeToAccount.beneficiaryAccountNumber = $(this).val();
        if (transferType === "Same Bank") {
            if (onetimeToAccount.beneficiaryAccountNumber.length > 17) {
                getAccountDescription(onetimeToAccount);
            }
        } else {
            handleToAccount(onetimeToAccount);
        }
    });
    $("#onetime_beneficiary_email").on("keyup", function () {
        onetimeToAccount.beneficiaryEmail = $(this).val();
        $(".display_to_receiver_email").text(onetimeToAccount.beneficiaryEmail);
    });
    // ###### ================================
    // ######   international and local bank
    // ###### ================================
    if (
        transferType === "International Bank" ||
        transferType === "Local Bank"
    ) {
        $("#onetime_select_bank").on("change", () => {
            onetimeToAccount.bankCode = $("#onetime_select_bank").val();
            onetimeToAccount.bankName = $(
                "#onetime_select_bank option:selected"
            ).text();
            $(".display_to_bank_name").text(onetimeToAccount.bankName);
        });
        $("#onetime_beneficiary_name").on("keyup", () => {
            onetimeToAccount.beneficiaryName = $(
                "#onetime_beneficiary_name"
            ).val();
            $(".display_to_account_name").text(
                onetimeToAccount.beneficiaryName
            );
        });
        $("#onetime_beneficiary_address").on("keyup", () => {
            onetimeToAccount.beneficiaryAddress = $(
                "#onetime_beneficiary_address"
            ).val();
            $(".display_to_account_address").text(
                onetimeToAccount.beneficiaryAddress
            );
        });
        // international bank
        if (transferType === "International Bank") {
            $("#onetime_select_country").on("change", () => {
                onetimeToAccount.bankCountryCode = $(
                    "#onetime_select_country"
                ).val();
                getInternationalBanks(onetimeToAccount.bankCountryCode);
                $("#onetime_select_bank").prop("selectedIndex", -1);
            });
        }
    }
    // =========================================================
    //Other Checks
    // =========================================================
    $("#transfer_mode").change(function () {
        transferInfo.transferMode = $("#transfer_mode").val();
        $(".display_to_transfer_type").text(transferInfo.transferMode);
    });

    // Standing order date checks
    if (transferType === "Standing Order") {
        let today = new Date();
        let day = today.getDate().toString().padStart(2, "0");
        let month = (today.getMonth() + 1).toString().padStart(2, "0");
        transferInfo.soStartDate = today.getFullYear() + "-" + month + "-01";
        transferInfo.soEndDate = today.getFullYear() + "-" + month + "-" + day;
        transferInfo.soCurrentDate = transferInfo.endDate;

        $("#so_start_date").on("change", function () {
            transferInfo.soStartDate = $("#so_start_date").val();
            $(".display_so_start_date").text(transferInfo.soStartDate);
        });

        $("#so_end_date").on("change", function () {
            transferInfo.soEndDate = $("#so_end_date").val();
            $(".display_so_end_date").text(transferInfo.soEndDate);
        });
        $("#standing_other_type").on("change", () => {
            const standingOrderType = $("#standing_other_type").val();
            switch (standingOrderType) {
                case "own account":
                    $(".email-div").hide(500);
                    $(".currency-div").show(500);
                    $(".bank_div").hide(500);
                    renderOwnAccounts();
                    break;
                case "other bank":
                    $(".email-div").show(500);
                    getToAccount(`get-transfer-beneficiary-api?beneType=OTB`);
                    $(".currency-div").hide(500);
                    $(".bank_div").show(500);
                    break;
                case "same bank":
                    $(".email-div").show(500);
                    $(".currency-div").show(500);
                    $(".bank_div").hide(500);
                    getToAccount(`get-transfer-beneficiary-api?beneType=SAB`);
                    break;
                default:
                    $(".email-div").hide(500);
            }
        });

        //standing order frequency
        $("#beneficiary_frequency").on("change", function () {
            let standing_order = $("#beneficiary_frequency").val().split("~");
            transferInfo.soFrequencyCode = standing_order[0];
            transferInfo.soFrequency = standing_order[1];
            // var optionText = $("#beneficiary_frequency option:selected").text();
            $(".display_frequency_so").text(standing_order[1]);
        });
    }

    //  {{-- ---------------- --}}
    // conclusions
    // {{-- ----------------- --}}
    $("#next_button").on("click", (e) => {
        let pass = true;
        transferInfo.transferPurpose =
            transferType === "Standing Order"
                ? "Standing Order"
                : $("#purpose").val();
        $(".display_purpose").text(transferInfo.transferPurpose);
        transferInfo.transferCategory = $("#category").val();
        if (transferInfo.transferCategory !== "Others") {
            transferInfo.transferCategory = $("#category").val().split("~")[1];
        }
        $(".display_category").text(transferInfo.transferCategory);

        e.preventDefault();
        if (isOnetimeTransfer) {
            if (transferType !== "Own Account")
                onetimeToAccount.beneficiaryEmail = $(
                    "#onetime_beneficiary_email"
                ).val();
            if (!validateEmail(onetimeToAccount.beneficiaryEmail)) {
                toaster("Please enter valid beneficiary email", "warning");
                return false;
            }
            transferInfo = Object.assign(transferInfo, onetimeToAccount);
        } else {
            transferInfo = Object.assign(transferInfo, toAccount);
        }
        // Local Bank Checks
        if (transferType === "Local Bank" && !transferInfo.transferMode) {
            pass = false;
        }
        transferInfo = Object.assign(transferInfo, fromAccount);
        if (
            !pass ||
            !transferInfo.accountNumber ||
            !transferInfo.beneficiaryAccountNumber ||
            !transferInfo.transferAmount ||
            !transferInfo.transferCategory ||
            !transferInfo.transferPurpose
        ) {
            toaster("complete all fields", "warning");
            return false;
        }

        if (
            transferInfo.transferAmount <= 0 ||
            isNaN(transferInfo.transferAmount)
        ) {
            toaster("invalid transfer amount", "warning");
            return false;
        }
        if (transferInfo.transferAmount > fromAccount.accountBalance) {
            toaster("Insufficient account balance", "warning");
            return false;
        }
        if (
            transferInfo.beneficiaryAccountNumber === transferInfo.accountNumber
        ) {
            toaster("cannot send to the same account", "warning");
            return false;
        }
        if (transferType === "Standing Order") {
            const { soStartDate, soEndDate, soCurrentDate } = transferInfo;
            if (soStartDate < soCurrentDate) {
                toaster("Start date can't be less than today", "warning");
                return false;
            } else if (soEndDate < soCurrentDate) {
                toaster("End date can't be less than today", "warning");
                return false;
            } else if (soStartDate > soEndDate) {
                toaster("Start date can't be greater than end date", "warning");
                return false;
            } else if (!transferInfo.soFrequencyCode) {
                toaster("Select order frequency", "warning");
                return false;
            }
        }
        $("#standing_other_type").on("change", () => {
            const type = $("#standing_other_type").val();
        });
        $("#transaction_form").hide();
        $("#transaction_summary").show();
        // $("#transfer_details_view").hide();
        validationsCompleted = true;
    });

    $("#confirm_transfer_button").on("click", (e) => {
        e.preventDefault();
        console.log(transferInfo);

        if (!$("#terms_and_conditions").is(":checked")) {
            toaster("Accept Terms & Conditions to continue", "warning");
            return false;
        }
        if (!validationsCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        confirmationCompleted = true;
        if (ISCORPORATE) {
            corporateSpecific(transferInfo);
            return;
        }
        $("#pin_code_modal").modal("show");
    });

    $("#transfer_pin").on("click", (e) => {
        e.preventDefault;
        if (!confirmationCompleted) {
            somethingWentWrongHandler();
            return false;
        }
        transferInfo.secPin = $("#user_pin").val();
        if (transferInfo.secPin.length !== 4) {
            toaster("invalid pin", "warning");
            return false;
        }
        const endPoint =
            transferType.toLowerCase().trim().replace(" ", "-") +
            "-transfer-api";
        makeTransfer(endPoint, transferInfo);
        $("#user_pin").val("").text("");
        confirmationCompleted = false;
    });

    $("#back_button").on("click", (e) => {
        e.preventDefault();
        $("#transaction_summary").hide();
        $("#transaction_form").show();
        $("#transfer_details_view").show();
        validationsCompleted = false;
    });

    $("#save_as_beneficiary").on("click", () => {
        const beneData = Object.assign({}, transferInfo);
        beneData.accountNumber = transferInfo.console.log(beneData);
    });
});
