const pageData = new Object();
function getPaymentBeneficiaries() {
    $.ajax({
        type: "GET",
        url: "payment-beneficiary-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (data.length > 0) {
                $.each(pageData.payTypes, (i) => {
                    const type = pageData.payTypes[i];
                    pageData["bene_" + type] = data.filter(
                        (e) => e.PAYMENT_TYPE === type
                    );
                });
                initPaymentsCarousel();
            } else {
                return false;
            }
        },
        error: function (xhr, status, error) {
            $("#loader").show();

            setTimeout(function () {
                getPaymentBeneficiaries();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function paymentType() {
    $.ajax({
        type: "GET",
        url: "get-payment-types-api",
        datatype: "application/json",
        success: function (response) {
            $("#loader").hide();
            let data = response.data;
            if (response.responseCode == "000") {
                pageData.payTypes = [];

                if (data.length > 0) {
                    let color = [
                        "bg-success",
                        "bg-info",
                        "bg-warning",
                        "bg-danger",
                        "bg-primary",
                        "bg-pink",
                        "bg-blue",
                        "bg-secondary",
                        "bg-dark",
                    ];
                    $(".payments-carousel").empty();
                    $.each(data, function (i) {
                        const type = data[i].paymentType;
                        pageData.payTypes.push(type);
                        pageData["pay_" + type] = data[i];
                        const { label, paymentType, description } = data[i];
                        if (!label) return;
                        let paymentCard = `<div class="display-card payments ${color[i]}"  id='${paymentType}_card' data-span="${paymentType}">
                    <span class="box-circle"></span>
                    <span id='${paymentType}_text'>${description}</span>
                    </div>`;
                        $(".payments-carousel").append(paymentCard);
                    });
                    getPaymentBeneficiaries();
                } else {
                    return false;
                }
            } else {
                toaster("Failed", "error");
            }
        },
        error: function (xhr, status, error) {
            $("#loader").show();

            setTimeout(function () {
                paymentType();
            }, $.ajaxSetup().retryAfter);
        },
    });
}
function makePayment() {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: "make-payment-api",
        datatype: "application/json",
        data: pageData.paymentInfo,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            siteLoading("hide");
            if (response.responseCode == "000") {
                getAccounts();
                Swal.fire({
                    width: 400,
                    title: `<h2 class='text-success font-16 font-weight-bold'>${response.message}</h2>`,
                    imageUrl: "assets/images/animations/payment_successful.gif",
                    imageHeight: 200,
                    confirmButtonColor: "#1abc9c",
                }).then((result) => {
                    location.reload();
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
        error: function (error) {
            siteLoading("hide");
            toaster(error.statusText, error);
        },
    });
}

function getRecipientName() {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: "payment-name-enquiry-api",
        datatype: "application/json",
        data: pageData.paymentInfo,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.responseCode == "000") {
                siteLoading("hide");
                pageData.paymentInfo.recipientName = response.data;
                paymentVerification();
            }
        },
        error: function (xhr, status, error) {
            $("#loader").show();

            setTimeout(function () {
                paymentType();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function paymentVerification() {
    const {
        paymentType,
        account,
        beneficiaryAccount,
        amount,
        recipientName,
        payeeName,
    } = pageData.paymentInfo;
    const { paymentDescription, paymentAccount } = pageData[
        "pay_" + paymentType
    ].paySubTypes.find((e) => e.paymentCode === payeeName);
    const formattedAmount = formatToCurrency(amount)
        ? formatToCurrency(amount)
        : 0.0;
    const expensetype = pageData["pay_" + paymentType].description;
    const transFee = "0";
    const currency = "SLL";
    const totalAmount = parseFloat(amount) + parseFloat(transFee);
    $("#details_from_account").text(account);
    $("#details_to_account").text(recipientName);
    $("#details_icon_text").text(recipientName[0]);
    $("#details_amount").text(currency + " " + formattedAmount);
    $("#details_recipient_number").text(beneficiaryAccount);
    $("#details_recipient_name").text(recipientName);
    $("#details_trans_fee").text(currency + " " + formatToCurrency(transFee));
    $("#details_narration").text(paymentDescription);
    $("#details_expense_type").text(expensetype);
    $("#details_total_amount").text(
        currency + " " + formatToCurrency(totalAmount)
    );
    pageData.paymentInfo.paymentAccount = paymentAccount;
    pageData.paymentInfo.paymentDescription = paymentDescription;
    $("#payment_verification_modal").modal("show");
}

function initPaymentsCarousel() {
    let payments = document.querySelectorAll(".payments");
    payments.forEach((item, i) => {
        item.addEventListener("click", (e) => {
            $(".payments").removeClass("current-type");
            const type = $(e.currentTarget).attr("data-span");
            $(e.currentTarget).addClass("current-type");
            pageData.currentType = type;
            //populate beneficiaries
            $("#to_account");
            populateBeneficiariesSelect(type);
            populateSubtypesSelect(type);
        });
        if (i === 0) {
            $(item).trigger("click");
        }
    });
    siteLoading("hide");
}

function populateBeneficiariesSelect(type) {
    const beneData = pageData["bene_" + type];

    $("#to_account").empty();
    if (beneData.length < 1) {
        $("#to_account").append(noSavedBeneficiariesOption);
    } else {
        $("#to_account").append(
            `<option selected disabled> --- Select Beneficiary --- </option>`
        );
        beneData.forEach((bene, i) => {
            let { ACCOUNT, NICKNAME, PAYEE_NAME } = bene;
            const paymentLogo = pageData["pay_" + type].paySubTypes.find(
                (e) => e.paymentCode === PAYEE_NAME
            ).paymentLogo;
            let logo = paymentLogo
                ? "data:image/jpg;base64," + paymentLogo
                : "assets/images/add.png";
            let content = `<span class='row text-capitalize'><img src='${logo}' class='ml-2 mr-3' style='width:2rem'><span class='mr-3'>${ACCOUNT}</span> <span>${NICKNAME}</span></span>`;
            let option = `<option data-content="${content}" data-type='${PAYEE_NAME}' value='${ACCOUNT}'> </option> `;
            $("#to_account").append(option);
        });
    }
    $("#to_account").selectpicker("refresh");
}

function populateSubtypesSelect(type) {
    // populate subtypes
    const typeData = pageData["pay_" + type];
    let { label } = typeData;
    label = label.toLowerCase();
    $("#subtype_select").empty();
    $("#subtype_select").append(
        `<option selected disabled class="text-capitalize"> --- ${label} --- </option>`
    );
    $("#subtype_label").val(label).text(label);
    typeData.paySubTypes.forEach((e, i) => {
        let { paymentLabel, paymentCode, paymentDescription, paymentLogo } = e;
        let logo = paymentLogo
            ? "data:image/jpg;base64," + paymentLogo
            : "assets/images/add.png";
        paymentLabel = paymentLabel.toLowerCase();
        paymentDescription = paymentDescription.toLowerCase();
        $("#payment_label").val(paymentLabel).text(paymentLabel);
        $("#payment_label_input").attr("placeholder", `Enter ${paymentLabel}`);
        let content = `<span class='text-capitalize'><img src='${logo}' class='mx-2' style='width:2rem'>${paymentDescription}</span>`;
        let option = `<option data-content="${content}"  value='${paymentCode}'> </option> `;
        $("#subtype_select").append(option);
        $("#subtype_div").show();
        return;
    });
    $("#subtype_select").selectpicker("refresh");
}

$(() => {
    let isOnetimePayment = false;
    siteLoading("show");
    paymentType();
    $(".form-control").selectpicker("refresh");

    function updateTransactionType(type) {
        if (type === "onetime") {
            isOnetimePayment = true;
        } else if (type === "beneficiary") {
            isOnetimePayment = false;
        }
    }

    $("#beneficiary_tab").on("click", () => {
        updateTransactionType("beneficiary");
        $(".display_to_account").text("");
        $("#to_account").trigger("change");
    });

    $("#onetime_tab").on("click", () => {
        updateTransactionType("onetime");
        $(".display_to_account").text("");
        $("#to_account").trigger("change");
    });

    $("#confirm_transfer_button").on("click", (e) => {
        e.preventDefault();
        if (ISCORPORATE) {
            makePayment();
            return;
        }
        $("#pin_code_modal").modal("show");
    });

    $("#next_button").on("click", (e) => {
        e.preventDefault();
        let account = $("#from_account option:selected").attr(
            "data-account-number"
        );
        let accountName = $("#from_account option:selected").attr(
            "data-account-description"
        );
        let accountMandate = $("#from_account option:selected").attr(
            "data-account-mandate"
        );
        let accountCurrency = $("#from_account option:selected").attr(
            "data-account-currency"
        );
        let accountCurrCode = $("#from_account option:selected").attr(
            "data-account-currency-code"
        );
        let amount = $("#amount").val();
        let paymentType = pageData.currentType;
        let beneficiaryAccount, payeeName;

        if (!isOnetimePayment) {
            beneficiaryAccount = $("#to_account").val();
            payeeName = $("#to_account option:selected").attr("data-type");
        } else {
            payeeName = $("#subtype_select").val();
            beneficiaryAccount = $("#onetime_to_account").val();
        }
        if (!amount || !account || !beneficiaryAccount || !payeeName) {
            toaster("all fields required", "warning");
            return;
        }
        pageData.paymentInfo = {
            amount,
            accountCurrCode,
            accountCurrency,
            accountMandate,
            accountName,
            account,
            beneficiaryAccount,
            payeeName,
            paymentType,
        };

        getRecipientName(pageData.paymentInfo);
    });

    $("#transfer_pin").on("click", (e) => {
        e.preventDefault;
        const pin = $("#user_pin").val();
        if (!pin || pin.length !== 4) {
            toaster("invalid pin", "warning");
            return false;
        }
        pageData.paymentInfo.pinCode = pin;
        makePayment();
        $("#user_pin").val("").text("");
    });
});
