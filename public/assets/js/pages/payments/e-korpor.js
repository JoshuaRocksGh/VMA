// ==============================================================
// ------------------- Reverse Korpor ---------------------------
// ==============================================================
function korporReversal(data) {
    // transferInfo.type = "reversal";
    data.pass = true;
    $("#pin_code_modal").modal("show");
    $("#transfer_pin").on("click", () => {
        if (!data.pass) {
            return;
        }
        let userPin = $("#user_pin").val();
        if (userPin.length !== 4) {
            toaster("invalid pin", "warning");
            $("#user_pin").val("");
            userPin = "";
            return false;
        }
        let korporData = new Object();
        korporData.pinCode = userPin;
        korporData.referenceNo = data.REMITTANCE_REF;
        korporData.beneficiaryMobileNo = data.BENEF_TEL;
        reverseKorpor("reverse-korpor", korporData);
        $("#user_pin").val("");
        userPin = "";
        data.pass = false;
    });
}

function reverseKorpor(url, data) {
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
            if (response.responseCode === "000") {
                toaster(response.message, "success");
                // window.ref;
            } else {
                toaster(response.message, "error");
            }
        },
    });
}

function initiateKorpor(url, data) {
    // console.log(data);
    // return false;
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: url,
        datatype: "application/json",
        data: {
            amount: data.amount,
            debit_account: data.accountNumber,
            pin_code: data.pinCode,
            receiver_address: data.recipientAddress,
            receiver_name: data.recipientName,
            receiver_phone: data.recipientPhone,
            sender_name: data.accountName,
            account_mandate: data.accountMandate,
            account_currency: data.accountCurrency,
            currCode: data.currCode,
            narration: data.narration,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            siteLoading("hide");
            if (response.responseCode == "000") {
                Swal.fire({
                    width: 400,
                    title: `<h2 class='text-success font-16 font-weight-bold'>${response.message}</h2>`,
                    imageUrl: "assets/images/animations/payment_successful.gif",
                    imageHeight: 200,
                    confirmButtonColor: "#1abc9c",
                });
            } else {
                Swal.fire({
                    width: 400,
                    title: `<h2 class='text-danger font-16 font-weight-bold'>${response.message}</h2>`,
                    imageUrl:
                        "assets/images/animations/payment_unsuccessful.gif",
                    imageHeight: 200,
                    confirmButtonColor: "#dc3545",
                });
            }
        },
        error: function (xhr, status, error) {
            siteLoading("hide");
            console.log(error);
            toaster("something went wrong", "warning");
        },
    });
}
function getKorporDetails(mobileNumber, remittanceNumber) {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: "korpor-otp",
        datatype: "application/json",
        data: {
            remittance_no: remittanceNumber,
            mobile_no: mobileNumber,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            siteLoading("hide");
            if (response.responseCode == "000") {
                console.log(response);
                toaster(response.message, "success");
                $(".redeem_korpor").hide();
                $(".korpor_details").show();
                let receiver_name = response.data.beneficiaryName;
                let receiver_address = response.data.beneficiaryAddress;
                let receiver_amount = response.data.remittanceAmount;
                let receiver_num = $("#mobile_no").val();
                // $("#receiver_name_redeem").text(receiver_name);
                $("#receiver_name_redeem").val(receiver_name);
                $("#receiver_address_redeem").val(receiver_address);
                $("#receiver_amount_redeem").val(receiver_amount);
                $("#receiver_phone_redeem").val(receiver_num);
                // let accountNo = response.data.accountNumber;
            } else {
                toaster(response.message, "error");
            }
        },
        error: (xhr, status, error) => {
            siteLoading("hide");
            console.log(error);
            toaster("something went wrong", "error");
        },
    });
}

function redeemKorpor(data) {
    $.ajax({
        type: "POST",
        url: "redeem-korpor",
        datatype: "application/json",
        data: {
            redeem_amount: data.redeemAmount,
            redeem_receiver_name: data.receiverName,
            redeem_receiver_phone: data.receiverPhone,
            redeem_account: data.redeemAccount,
            redeem_remittance_no: data.remittanceNumber,
            otp_number: data.otp,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);

            if (response.responseCode == "000") {
                Swal.fire({
                    width: 400,
                    title: `<h2 class='text-success font-16 font-weight-bold'>${response.message}</h2>`,
                    imageUrl: "assets/images/animations/payment_successful.gif",
                    imageHeight: 200,
                    confirmButtonColor: "#1abc9c",
                }).then(({ isDismissed }) => {
                    isDismissed && location.reload();
                });
            } else {
                Swal.fire({
                    width: 400,
                    title: `<h2 class='text-danger font-16 font-weight-bold'>${response.message}</h2>`,
                    imageUrl:
                        "assets/images/animations/payment_unsuccessful.gif",
                    imageHeight: 200,
                    confirmButtonColor: "#dc3545",
                });
            }
        },
        error: (xhr, status, error) => {
            console.log(error);
            toaster("something went wrong", "error");
        },
    });
}
function getKorporHistory(type, accountNumber) {
    return $.ajax({
        type: "GET",
        url: "korpor-history-api",
        datatype: "application/json",
        data: {
            accountNumber,
            type,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            const data = response.data;
            // console.log(renderedHistoryItems);
            $("#korpor_history_display").pagination({
                dataSource: data,
                pageSize: 5,
                callback: function (data, pagination) {
                    let items = [];
                    items = data.map((e) => renderKorporHistoryItem(e));

                    if (items.length < 1) {
                        items = noDataAvailable;
                    }
                    $("#korpor_history_container").html(items);
                },
            });
        },
    });
}

function renderKorporHistoryItem(data) {
    console.log(data);

    const {
        BENEF_NAME: name,
        BENEF_TEL: tel,
        REG_POSTING_SYS_DATE: date,
        REMITTANCE_AMOUNT: amount,
    } = data;
    const dateOptions = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
    };

    // TODO: history cards should show modal with details on click
    const color = $(".knav.active").css("background-color");
    const type = $(".knav.active").text();
    const dateFormatted = new Date(date).toDateString("en-US", dateOptions);
    return `  <div class="history-card d-flex mx-2 transition-all justify-content-between font-12 mb-1 py-1 px-3 bg-white" style="border-left: 4px solid ${color}; ">
    <div>
        <div><i class=" fas fa-user" style="color: ${color} !important"></i> <span
                class="account-name font-weight-bold px-1">${name}</span></div>
        <div>
            <span><i class=" fas fa-phone-alt" style="color: ${color} !important"></i> <span
                    class="phone-number px-1">${tel}</span></span>
        </div>
        <div>
            <span> <i class=" fas fa-clock" style="color: ${color} !important"></i><span class="date px-1">${dateFormatted}</span></span>
        </div>
    </div>
    <div class="text-right align-self-center">
        <div>
            <span class="font-14 font-weight-bold text-success">SLL ${formatToCurrency(
                amount
            )}</span>
        </div>
        <div>
            <span style="background-color: ${color} !important;" class=" text-white font-11 font-weight-bold px-1 rounded-pill">
                ${type}</span>
        </div>
    </div>
</div> `;
}

$(function () {
    // ==============================================================
    // ------------------- Redeem Korpor ---------------------------
    // ==============================================================
    const redeemInfo = new Object();
    $("#redeem_account option[data-account-currency!='SLL']").remove();
    $("#proceed_to_redeem_button").on("click", function () {
        let mobileNumber = $("#mobile_no").val();
        let remittanceNumber = $("#remittance_no").val();
        if (!mobileNumber || !remittanceNumber) {
            toaster("All Fields Are Required", "warning");
            return false;
        }
        getKorporDetails(mobileNumber, remittanceNumber);
    });
    $("#done_button").click(function () {
        transferInfo.type = "redeem";
        const e = $("#redeem_account option:selected");
        const accountNumber = e.attr("data-account-number");
        if (!accountNumber) {
            toaster("Select account to redeem into");
            return;
        }
        redeemInfo.redeemAccount = accountNumber;
        redeemInfo.redeemAmount = $("#receiver_amount_redeem").val();
        redeemInfo.receiverPhone = $("#receiver_phone_redeem").val();
        redeemInfo.receiverName = $("#receiver_name_redeem").val();
        redeemInfo.remittanceNumber = $("#remittance_no").val();
        $("#user_pin").attr("maxlength", "8");
        $("#pin_code_modal")
            .modal("show")
            .on("hidden.bs.modal", function () {
                $("#user_pin").attr("maxlength", "4");
            });
    });
    $("#transfer_pin").on("click", (e) => {
        e.preventDefault();
        if (transferInfo.type !== "redeem") {
            return;
        }
        const otp = $("#user_pin").val();
        if (!otp || otp.length < 4) {
            toaster("Invalid OTP code", "warning");
            return;
        }
        redeemInfo.otp = otp;
        redeemKorpor(redeemInfo);
        $("#user_pin").val("");
        transferInfo.type = "";
    });
    //------------- end of redeem korpor -------------

    // ====================================================
    //  ------------- Korpor Transfer ------------------
    // ===================================================
    let transferInfo = new Object();
    $("#account_of_transfer").on("change", function () {
        const e = $("#account_of_transfer option:selected");
        // console.log(e.attr("data-account-currency-code"));
        const accountNumber = e.attr("data-account-number");
        const accountCurrency = e.attr("data-account-currency");
        const accountMandate = e.attr("data-account-mandate");
        const accountName = e.attr("data-account-description");
        const accountType = e.attr("data-account-type");
        const accountBalance = e.attr("data-account-balance") || "0.00";
        const currCode = e.attr("data-account-currency-code");
        transferInfo = {
            accountCurrency,
            accountMandate,
            accountName,
            accountNumber,
            accountType,
            accountBalance,
            currCode,
        };
        $(".display_from_account_type").text(accountType);
        $(".display_from_account_name").text(accountName);
        $(".display_from_account_no").text(accountNumber);
        $(".display_from_account_currency").text(accountCurrency);
        $(".display_currency").text(accountCurrency).val(accountCurrency);
        $(".display_from_account_amount").text(
            formatToCurrency(accountBalance)
        );
    });

    $("#transfer_to_self").on("click", function () {
        console.log("self");
        const { userAlias, userPhone, userEmail } = customerInfo;
        $(".hide-if-self-transfer").hide(500);
        $("#receiver_name")
            .val(userAlias)
            .attr("disabled", true)
            .trigger("keyup");
        $("#receiver_phoneNum")
            .val(userPhone)
            .attr("disabled", true)
            .trigger("keyup");
        $("#receiver_address").val(userEmail);
    });

    $("#transfer_to_others").on("click", function () {
        console.log("others");
        $(".hide-if-self-transfer").show(500);
        $("#receiver_name").val("").attr("disabled", false).trigger("keyup");
        $("#receiver_phoneNum")
            .val("")
            .attr("disabled", false)
            .trigger("keyup");
        $("#receiver_address").val("");
    });
    $("#receiver_name").on("keyup", function () {
        let name = $("#receiver_name").val();
        $(".display_receiver_name").text(name);
    });

    $("#receiver_phoneNum").on("keyup", function () {
        let phone = $("#receiver_phoneNum").val();
        $(".display_receiver_phoneNum").text(phone);
    });

    $("#receiver_address").on("keyup", function () {
        let address = $("#receiver_address").val();
        $(".display_receiver_address").text(address);
    });

    $("#amount").on("change", function () {
        let amount = $("#amount").val();
        $(".display_amount").text(formatToCurrency(amount));
    });

    $("#confirm_next_button").on("click", (e) => {
        e.preventDefault();
        // console.log("here");
        let amount = $("#amount").val();
        let recipientAddress = $("#receiver_address").val();
        let recipientName = $("#receiver_name").val();
        let recipientPhone = $("#receiver_phoneNum").val();
        let narration = $("#narration").val();
        transferInfo = Object.assign(transferInfo, {
            amount,
            recipientName,
            recipientPhone,
            narration,
            recipientAddress,
        });
        if (
            !recipientName ||
            !recipientAddress ||
            !amount ||
            !recipientPhone ||
            !narration ||
            !transferInfo.accountNumber
        ) {
            toaster("All Fields are required", "warning");
            return;
        }
        if (isNaN(amount)) {
            toaster("Amount should be a number", "warning");
            return;
        }
        if (!validatePhone(recipientPhone)) {
            toaster("Invalid phone number", "warning");
            return;
        }
        if (amount > transferInfo.accountBalance) {
            toaster("Insufficient Account Balance", "warning");
            return;
        }
        if (ISCORPORATE) {
            corporateInitiateKorpor(transferInfo);
            return;
        }
        transferInfo.type = "transfer";
        $("#pin_code_modal").modal("show");
        $("#transfer_pin").on("click", (e) => {
            e.preventDefault();
            if (transferInfo.type !== "transfer") {
                return;
            }
            const pinCode = $("#user_pin").val();
            if (!pinCode || pinCode.length !== 4) {
                toaster("Invalid Pin Code", "warning");
                return;
            }
            transferInfo.pinCode = pinCode;
            initiateKorpor("initiate-korpor", transferInfo);
            transferInfo.pinCode = "";
            $("#user_pin").val("");
            transferInfo.type = "";
        });
    });
    function corporateInitiateKorpor(transferInfo) {
        const endPoint = "corporate-initiate-korpor";
        initiateKorpor(endPoint, transferInfo);
    }

    // ----------- korpor transfer end -----------

    //     ####################################################
    //                    Korpor History
    //     ####################################################

    $("#korpor_history_tab").on("click", () => {
        if (!$("#korpor_history_accounts").val()) {
            $("#korpor_history_accounts option:last").prop("selected", true);
        }
        console.log("ll");
        $("#korpor_history_accounts").trigger("change");
    });

    // function accountTemplate(account) {
    //     const data = $(account.element).attr("data-content");
    //     if (!data) return $(account.element).text();
    //     return $(data);
    // }
    //initialize select2 on accounts select
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });

    //trigger knav click on accounts change.
    $("#korpor_history_accounts").on("change", (e) => {
        $(".knav.active").trigger("click");
    });

    $(".knav").on("click", (e) => {
        const accountNumber = $(
            "#korpor_history_accounts option:selected"
        ).attr("data-account-number");
        if (!accountNumber) {
            toaster("Please select a valid account", "warning");
            return;
        }

        const navId = e.currentTarget.id;
        const type = e.currentTarget.getAttribute("data-value");
        $(".knav").removeClass("active");
        $(`#${navId}`).addClass("active");
        siteLoading("show");
        getKorporHistory(type, accountNumber).always(siteLoading("hide"));
    });

    // ================= End of Korpor history =======================
});
