function get_currency() {
    $.ajax({
        type: "GET",
        url: "get-currency-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            let selectize = $("#currency").selectize()[0].selectize;
            selectize.clearOptions();
            $.each(data, (i) => {
                let { isoCode, description } = data[i];
                selectize.addOption({ value: isoCode, text: description });
            });
            selectize.setValue(data[0].isoCode);
        },
    });
}

function getNationalities() {
    $.ajax({
        type: "GET",
        url: "get-lovs-list-api",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            console.log(data);
            // let selectize = $("#currency").selectize()[0].selectize;
            // selectize.clearOptions();
            // $.each(data, (i) => {
            //     let { isoCode, description } = data[i];
            //     selectize.addOption({ value: isoCode, text: description });
            // });
            // selectize.setValue(data[0].isoCode);
        },
    });
}

function getBanksInCountry(countryCode) {
    $.ajax({
        type: "GET",
        url: "get-international-bank-list-api",
        data: {
            countryCode,
        },
        datatype: "application/json",
        success: (response) => {
            let data = response.data;
            let selectize = $("#bank_name").selectize()[0].selectize;
            selectize.clearOptions();
            $.each(data, (i) => {
                let { BICODE, BANK_DESC } = data[i];
                selectize.addOption({ value: BICODE, text: BANK_DESC });
            });
            selectize.setValue(data[0].BICODE);
        },
    });
}

function getCountries() {
    $.ajax({
        type: "GET",
        url: "get-countries-list-api",
        datatype: "application/json",
        success: (response) => {
            let data = response.data;
            let selectize = $("#bank_country").selectize()[0].selectize;
            let countryOfResidence = $("#country_of_residence").selectize()[0]
                .selectize;
            selectize.clearOptions();
            countryOfResidence.clearOptions();
            $.each(data, (i) => {
                let { codeType, description } = data[i];
                countryOfResidence.addOption({
                    value: codeType,
                    text: description,
                });
                selectize.addOption({ value: codeType, text: description });
            });
            countryOfResidence.setValue(data[0].codeType);
            selectize.setValue(data[0].codeType);
        },
    });
}

$(document).ready(function () {
    $("selectize").selectize({
        sortField: "text",
    });

    get_currency();
    getCountries();
    let bankDetails = new Object();
    let accountDetails = new Object();
    let beneDetails = new Object();

    $("#rootwizard").click(function (e) {
        e.preventDefault();
        return false;
    });

    $("#bank_country").on("change", () => {
        let selectize = $("#bank_country").selectize()[0].selectize;
        bankDetails.countryCode = selectize.getValue();
        if (bankDetails.countryCode) {
            getBanksInCountry(bankDetails.countryCode);
        }
    });

    $("#bank_name").on("change", () => {
        let selectize = $("#bank_name").selectize()[0].selectize;
        bankDetails.bankCode = selectize.getValue();
        if (!bankDetails.bankCode) {
            $("#swift_code").val("");
            return false;
        }
        $("#swift_code").val(bankDetails.bankCode);
    });

    $("#details_tab").addClass("active show");
    $("#international_bank_account_details").hide();
    $("#international_bank_beneficiary_details").hide();
    $("#international_bank_summary").hide();

    $("#bank_details_next_btn").on("click", (e) => {
        e.preventDefault();

        if (!bankDetails.bankCode || !bankDetails.countryCode) {
            toaster("Fields must not be empty", "warning");
            return false;
        } else {
            $("#details_tab").removeClass("active show");
            $("#account_tab").addClass("active show");
            $("#first").removeClass("active show");
            $("#second").addClass("active show");
            $("#international_bank_details").hide();
            $("#international_bank_account_details").show(500);
        }
    });

    // Return to Beneficiary Bank Details

    $("#account_details_back_btn").on("click", (e) => {
        e.preventDefault();

        $("#account_tab").removeClass("active show");
        $("#details_tab").addClass("active show");

        $("#second").removeClass("active show");
        $("#first").addClass("active");

        $("#international_bank_account_details").hide();
        $("#international_bank_details").show(500);
    });

    $("#account_details_next_btn").on("click", (e) => {
        e.preventDefault();
        accountDetails.accountNumber = $("#acc_number").val();
        accountDetails.accountName = $("#acc_name").val();
        accountDetails.currency = $("#currency")[0].selectize.getValue();
        accountDetails.firstName = $("#firstname").val();
        accountDetails.lastName = $("#lastname").val();
        accountDetails.middleName = $("#middlename").val();
        let { accountNumber, accountName, currency, firstName, lastName } =
            accountDetails;

        if (
            !accountNumber ||
            !accountName ||
            !currency ||
            !firstName ||
            !lastName
        ) {
            toaster("Fields must not be empty", "warning");
            return false;
        }
        $("#account_tab").removeClass("active show");
        $("#beneficiary_tab").addClass("active show");
        $("#second").removeClass("active show");
        $("#third").addClass("active show");
        $("#international_bank_account_details").hide();
        $("#international_bank_beneficiary_details").show(500);
    });

    $("#beneficiary_details_back_btn").click(function (e) {
        e.preventDefault();
        $("#beneficiary_tab").removeClass("active show");
        $("#account_tab").addClass("active show");
        $("#third").removeClass("active show");
        $("#second").addClass("active show");
        $("#international_bank_beneficiary_details").hide();
        $("#international_bank_account_details").show(500);
    });

    $("#beneficiary_details_submit_btn").click(function (e) {
        e.preventDefault();

        var bank_country = $("#bank_country").val();
        $("#display_bank_country").text(bank_country);
        console.log();

        var bank_city = $("#bank_city").val();
        $("#display_bank_city").text(bank_city);

        var bank_branch_ = $("#bank_branch").val().split("~");
        var bank_branch = bank_branch_[1];
        $("#display_bank_branch").text(bank_branch);

        var bank_name_ = $("#bank_name").val().split("~");
        var bank_name = bank_name_[1];
        $("#display_bank_name").text(bank_name);

        var bank_address = $("#bank_address").val();
        $("#display_bank_address").text(bank_address);

        var swift_code = $("#swift_code").val();
        $("#display_swift_code").text(swift_code);

        var acc_number = $("#acc_number").val();
        $("#display_account_number").text(acc_number);

        var acc_name = $("#acc_name").val();
        $("#display_account_name").text(acc_name);

        var currency = $("#currency").val();
        // {{-- var currency = currency_[1] --}}
        $("#display_currency").text(currency);

        var firstname = $("#firstname").val();
        $("#display_firstname").text(firstname);

        var lastname = $("#lastname").val();
        $("#display_lastname").text(lastname);

        var middlename = $("#middlename").val();
        $("#display_middlename").text(middlename);

        var beneficiary_name = $("#beneficiary_name").val();
        $("#display_beneficiary_name").text(beneficiary_name);

        var beneficiary_email = $("#beneficiary_email").val();
        $("#display_beneficiary_email").text(beneficiary_email);

        var nationality = $("#nationality").val();
        $("#display_nationality").text(nationality);

        var country_of_residence = $("#country_of_residence").val();
        $("#display_country_of_residence").text(country_of_residence);

        var city = $("#city").val();
        $("#display_city").text(city);

        var address = $("#address").val();
        $("#display_address").text(address);

        var telephone = $("#telephone").val();
        $("#display_telephone").text(telephone);

        var transfer_email = $(
            "#transfer_email input[type='checkbox']:checked"
        ).val();
        if (transfer_email == "on") {
            $("#display_transfer_email").text("Yes");
        } else {
            $("#display_transfer_email").text("No");
        }

        if (
            beneficiary_name == "" ||
            beneficiary_name == undefined ||
            beneficiary_email == "" ||
            beneficiary_email == undefined ||
            nationality == "" ||
            nationality == undefined ||
            country_of_residence == "" ||
            country_of_residence == undefined ||
            city == "" ||
            city == undefined ||
            address == "" ||
            address == undefined ||
            telephone == "" ||
            telephone == undefined
        ) {
            toaster("Fields must not be empty", "error", 6000);

            return false;
        } else {
            $("#beneficiary_tab").addClass("active show");
            $("#summary_tab").addClass("active show");

            $("#third").addClass("active show");
            $("#fourth").addClass("active show");

            $("#international_bank_beneficiary_details").hide();
            $("#international_bank_summary").toggle("500");
        }
    });

    $("#bank_add_beneficiary_back_btn").click(function (e) {
        e.preventDefault();

        $("#summary_tab").removeClass("active show");
        $("#beneficiary_tab").addClass("active show");

        $("#fourth").removeClass("active show");
        $("#third").addClass("active show");

        $("#international_bank_summary").hide();
        $("#international_bank_beneficiary_details").toggle("500");
    });

    // SUBMIT TO API

    $("#bank_add_beneficiary_btn").click(function (e) {
        e.preventDefault();

        var bank_country = $("#bank_country").val();
        var bank_city = $("#bank_city").val();
        var bank_branch_ = $("#bank_branch").val().split("~");
        var bank_branch = bank_branch_[1];
        var bank_name_ = $("#bank_name").val().split("~");
        var bank_name = bank_name_[1];
        var bank_address = $("#bank_address").val();
        var swift_code = $("#swift_code").val();

        var acc_number = $("#acc_number").val();
        var acc_name = $("#acc_name").val();
        var currency_ = $("#currency").val().split("~");
        var currency = currency_[0];
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var middlename = $("#middlename").val();

        var beneficiary_name = $("#beneficiary_name").val();
        var beneficiary_email = $("#beneficiary_email").val();
        var nationality = $("#nationality").val();
        var country_of_residence = $("#country_of_residence").val();
        var city = $("#city").val();
        var address = $("#address").val();
        var telephone = $("#telephone").val();
        var send_email = $(
            "#transfer_email input[type='checkbox']:checked"
        ).val();
        if (send_email == "on") {
            var transfer_email = "Y";
        } else {
            var transfer_email = "N";
        }

        function redirect_page() {
            window.location.href = "{{ url('beneficiary-list') }}";
        }

        $.ajax({
            type: "POST",
            url: "international-bank-beneficiary-api",
            datatype: "application/json",
            data: {
                bank_country: bank_country,
                bank_city: bank_city,
                bank_branch: bank_branch,
                bank_name: bank_name,
                bank_address: bank_address,
                swift_code: swift_code,
                acc_number: acc_number,
                acc_name: acc_name,
                currency: currency,
                firstname: firstname,
                lastname: lastname,
                middlename: middlename,
                beneficiary_name: beneficiary_name,
                beneficiary_email: beneficiary_email,
                nationality: nationality,
                country_of_residence: country_of_residence,
                city: city,
                address: address,
                telephone: telephone,
                sendMail: transfer_email,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response.responseCode);
                if (response.responseCode == "000") {
                    toaster(response.message, "success", 10000);
                    setTimeout(function () {
                        redirect_page();
                    }, 2000);
                } else {
                    toaster(response.message, "error", 6000);
                }
            },
        });
    });
});
