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
function getKorporHistory(url, fromAccountNo, target) {
    siteLoading("show");
    $.ajax({
        type: "GET",
        url: url,
        datatype: "application/json",
        data: {
            accountNo: fromAccountNo,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            let data = response.data;
            $(`${target}`).empty();
            if (data.length > 0) {
                let extracolumn;
                if (!target.includes("reversal")) {
                    let badgeColor;
                    let badgeText;
                    if (target.includes("reversed")) {
                        badgeColor = "danger";
                        badgeText = "Cancelled";
                    } else if (target.includes("completed")) {
                        badgeColor = "success";
                        badgeText = "Completed";
                    } else {
                        badgeColor = "warning";
                        badgeText = "Pending";
                    }
                    extracolumn = `<td> <strong><span class="badge badge-${badgeColor}">&nbsp;${badgeText}&nbsp;</span></strong> </td>`;
                }
                $.each(data, function (index) {
                    if (target.includes("reversal")) {
                        extracolumn = `<td> <button class="btn btn-danger badge reversal-button badge-danger" id="${data[index].REMITTANCE_REF}" korporData="${data[index].BENEF_TEL}~${data[index].REMITTANCE_REF}"> &nbsp;Reverse&nbsp;</button> </td>`;
                    }
                    $(`${target}`).append(
                        `<tr><td> <b> ${data[index].REMITTANCE_REF} </b>  </td>
                        <td> <b> ${data[index].BENEF_NAME}  </b>  </td>
                        <td> <b> ${data[index].BENEF_TEL}  </b>  </td>
                        <td> <b> ${data[index].BENEF_ADDRESS1}  </b>  </td>
                        <td> <b> ${formatToCurrency(
                            parseFloat(data[index].REMITTANCE_AMOUNT)
                        )}</b></td>${extracolumn}</tr>`
                    );
                    if (target.includes("reversal")) {
                        $(`#${data[index].REMITTANCE_REF}`).on("click", () => {
                            korporReversal(data[index]);
                        });
                    }
                });
            } else {
                let noData = noDataAvailable.replace(
                    "No Data Available",
                    response.message
                );
                $(target).append(
                    `<td colspan="100%" class="text-center">
                    ${noData} </td>`
                );
                $("#no_data_available_img").css("max-width", "250px");
                // toaster(response.message, "warning");
            }
            siteLoading("hide");
        },
    });
}

$(document).ready(function () {
    // ==============================================================
    // ------------------- Redeem Korpor ---------------------------
    // ==============================================================
    const redeemInfo = new Object();
    $("#redeem_account option[data-account-currency!='SLL']").remove();
    $("#proceed_to_redeem_button").click(function () {
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
            toaster("Invalid Pin Code", "warning");
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
    $("#account_of_transfer").change(function () {
        const e = $("#account_of_transfer option:selected");
        // console.log(e.attr("data-account-currency-code"));
        const accountNumber = e.attr("data-account-number");
        const accountCurrency = e.attr("data-account-currency");
        const accountMandate = e.attr("data-account-mandate");
        const accountName = e.attr("data-account-description");
        const accountType = e.attr("data-account-type");
        const accountBalance = e.attr("data-account-balance");
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

    $("#amount").change(function () {
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
            transferInfo.type = "";
        });
    });
    function corporateInitiateKorpor(transferInfo) {
        const endPoint = "corporate-initiate-korpor";
        initiateKorpor(endPoint, transferInfo);
    }

    // ----------- korpor transfer end -----------

    // $(".unredeemed").change(function () {
    //     var account = $(".unredeemed").val();
    //     console.log(account);
    // });

    //button to submit for list of redeemed/completed transactions
    $("#submit_account_no_redeemed").on("click", function () {
        let fromAccount = $(".redeemed").val();
        handleKorporHistory(
            "redeemed-korpor",
            fromAccount,
            ".redeemed_korpor_list_display"
        );
    });

    //button to submit account unredeemed request
    $("#submit_account_no_unredeemed").on("click", function () {
        let fromAccount = $("#unredeemed_history_account").val();
        handleKorporHistory(
            "unredeem-korpor-request",
            fromAccount,
            "#unredeemed_korpor_history_display"
        );
    });

    // $("#submit_unredeemed_account").on("click", () => {
    $("#unredeemed_account").on("change", () => {
        let fromAccount = $("#unredeemed_account").val();
        handleKorporHistory(
            "unredeem-korpor-request",
            fromAccount,
            "#korpor_reversal_list_display"
        );
    });
    $("#submit_account_no_reversed").on("click", function () {
        let fromAccount = $(".reversed").val();
        handleKorporHistory(
            "reversed-korpor-request",
            fromAccount,
            ".reversed_korpor_list_display"
        );
    });
    function handleKorporHistory(url, fromAccount, target) {
        if (!fromAccount) {
            toaster(
                "Select an account to show list of unredeemed transactions",
                "warning"
            );
            return false;
        }
        let fromAccountNo = fromAccount.split("~")[2];
        getKorporHistory(url, fromAccountNo, target);
    }

    //button to submit for korpor payment for reversal
    $("#reverse_button").click(function () {
        console.log(customerType);

        if (customerType == "C") {
            // alert("Corporate Reversal");

            var account_num = $("#account_of_transfer_reverse")
                .val()
                .split("~");
            console.log(account_num);
            var acc_num = account_num[2];
            var acc_currency = account_num[3];
            var acc_mandate = account_num[5];
            var acc_currCode = account_num[6];
            // return false ;
            var reference_no = $("#reference_no").val();
            var receiver_phoneNo = $("#receiver_phoneNo_reverse").val();
            // var pin = $("#reference_pin").val();

            if (
                reference_no == "" ||
                receiver_phoneNo == "" ||
                account_num == ""
            ) {
                toaster("Fields must not be empty", "error", 10000);
                return false;
            } else {
                $("#reverse-text").hide();
                $("#spinner-reverse").show();
                $("#spinner-text-reverse").show();

                $.ajax({
                    type: "POST",
                    url: "corporate-reverse-korpor",
                    datatype: "application/json",
                    data: {
                        reference_no: reference_no,
                        receiver_phoneNo: receiver_phoneNo,
                        accountNumber: acc_num,
                        accountCurrency: acc_currency,
                        accountMandate: acc_mandate,
                        accountCurrCode: acc_currCode,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        if (response.responseCode == "000") {
                            Swal.fire("", response.message, "success");
                            // toaster(response.message, 'success', 2000)
                            // var data = response.data.loanSchedule
                            // console.log(response)
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        } else {
                            toaster(response.message, "error", 9000);
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#submit").attr("disabled", false);
                        $("#spinner").hide();
                        $("#spinner-text").hide();

                        $("#log_in").show();
                        $("#error_message").text("Connection Error");
                        $("#failed_login").show();
                    },
                });
            }
        } else {
            var reference_no = $("#reference_no").val();
            var receiver_phoneNo = $("#receiver_phoneNo_reverse").val();
            var pin = $("#reference_pin").val();

            // if (from_account == '' || amount == '' || receiver_name == '' || receiver_phoneNum ==
            //     '' || receiver_address == '') {
            //     toaster('Field must not be empty', 'error', 10000)
            //     return false
            // }

            if (!reference_no || !receiver_phoneNo || !pin) {
                toaster("Fields must not be empty", "error");
                return false;
            } else {
                $("#reverse-text").hide();
                $("#spinner-reverse").show();
                $("#spinner-text-reverse").show();

                $.ajax({
                    type: "POST",
                    url: "reverse-korpor",
                    datatype: "application/json",
                    data: {
                        reference_no: reference_no,
                        receiver_phoneNo: receiver_phoneNo,
                        pin: pin,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        if (response.responseCode == "000") {
                            Swal.fire("", response.message, "success");
                            // toaster(response.message, 'success', 2000)
                            // var data = response.data.loanSchedule
                            // console.log(response)
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                            setTimeout(function () {
                                window.location.reload();
                            }, 2000);
                        } else {
                            toaster(response.message, "error", 9000);
                            $("#spinner-text-reverse").hide();
                            $("#spinner-reverse").hide();
                            $("#reverse-text").show();
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#submit").attr("disabled", false);
                        $("#spinner").hide();
                        $("#spinner-text").hide();

                        $("#log_in").show();
                        $("#error_message").text("Connection Error");
                        $("#failed_login").show();
                    },
                });
            }
        }
    });
});
