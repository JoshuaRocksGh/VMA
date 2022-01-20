function to_account() {
    $.ajax({
        type: "GET",
        url: "get-transfer-beneficiary-api?beneType=SAB",
        datatype: "application/json",
        success: function (response) {
            let data = response.data;
            if (response.responseCode == "000") {
                // console.log(data);
                $.each(data, function (index) {
                    $("#select_beneficiary").append(
                        $("<option>", {
                            value:
                                data[index].BENEF_TYPE +
                                "~" +
                                data[index].NICKNAME +
                                "~" +
                                data[index].BEN_ACCOUNT +
                                "~" +
                                data[index].BEN_ACCOUNT_CURRENCY,
                        }).text(
                            data[index].BENEF_TYPE +
                                "~" +
                                data[index].BEN_ACCOUNT +
                                "~" +
                                data[index].NICKNAME +
                                "~" +
                                data[index].BEN_ACCOUNT_CURRENCY
                        )
                    );
                });
            }
        },
    });
}

// function get_accounts() {
//     $.ajax({
//         type: "GET",
//         url: "get-accounts-api",
//         datatype: "application/json",

//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             if (response.responseCode == "000") {
//                 let data = response.data;
//                 $.each(data, function (index) {
//                     $("#from_account").append(
//                         $("<option>", {
//                             value:
//                                 data[index].accountType +
//                                 "~" +
//                                 data[index].accountDesc +
//                                 "~" +
//                                 data[index].accountNumber +
//                                 "~" +
//                                 data[index].currency +
//                                 "~" +
//                                 data[index].availableBalance,
//                         }).text(
//                             data[index].accountType +
//                                 "~" +
//                                 data[index].accountNumber +
//                                 "~" +
//                                 data[index].currency +
//                                 "~" +
//                                 data[index].availableBalance
//                         )
//                     );
//                     //$('#to_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance));
//                 });
//             }
//         },
//     });
// }

// function get_currency() {
//     $.ajax({
//         type: "GET",
//         url: "get-currency-list-api",
//         datatype: "application/json",
//         success: function (response) {
//             let data = response.data;
//             $.each(data, function (index) {
//                 $("#select_currency").append(
//                     $("<option>", {
//                         value: data[index].isoCode,
//                     }).text(data[index].isoCode + "~" + data[index].description)
//                 );
//             });
//         },
//     });
// }

$(document).ready(function () {
    // get_accounts();
    to_account();
    // get_currency();

    // $(".from_account_display_info").hide();
    // $(".to_account_display_info").hide();
    // $(".maximum_attempts").hide();

    $("#display_view_list").on("click", function () {
        $("#schedule_payment_table").show();
        $("#schedule_payment_form_summary").hide();
        $("#schedule_payment_form").hide();
        $("#display_view_list").hide();
        $(".maximum_attempts").hide();
        $("#payments_list").show(500);
        $("#display_schedule_payment").show(500).attr("disabled", false);
    });

    $("#display_schedule_payment").on("click", function () {
        $("#schedule_payment_table").hide();
        $("#display_view_list").show();
        $("#schedule_payment_form").toggle(500);
        $("#display_schedule_payment").hide(500).attr("disabled", true);
    });

    $("#back_button").on("click", function () {
        $("#schedule_payment_table").hide();
        $("#display_view_list").show();

        $("#schedule_payment_form_summary").hide();
        $("#schedule_payment_form").toggle(500);
    });

    $("#from_account").on("change", function () {
        var from_account = $(this).val();
        if (from_account == "" || from_account == undefined) {
            $(".from_account_display_info").hide();
        } else {
            var from_account_info = from_account.split("~");

            // set summary values for display
            $(".display_from_account_type").text(from_account_info[0]);
            $(".display_from_account_name").text(from_account_info[1]);
            $(".display_from_account_no").text(from_account_info[2]);
            $(".display_from_account_currency").text(from_account_info[3]);

            $(".display_currency").text(from_account_info[3]); // set summary currency

            amt = from_account_info[4].trim();
            $(".display_from_account_amount").text(from_account_info[4]);
            $(".from_account_display_info").show();
        }
    });

    $("#select_beneficiary").on("change", function () {
        var to_account = $(this).val();

        if (to_account == "" || to_account == undefined) {
            $(".to_account_display_info").hide();
        } else {
            var to_account_info = to_account.split("~");

            var from_account = $("#from_account").val();

            if (
                from_account.trim() == to_account.trim() &&
                from_account.trim() != "" &&
                to_account.trim() != ""
            ) {
                toaster("can not transfer to same account", "error", 10000);
                $(this).val("");
            }

            // set summary values for display
            $(".display_to_account_type").text(to_account_info[0].trim());
            $(".display_to_account_name").text(to_account_info[1].trim());
            $(".display_to_account_no").text(to_account_info[2].trim());
            $(".display_to_account_currency").text(to_account_info[3].trim());
            //$(".display_to_account_amount").text(formatToCurrency(parseFloat(to_account_info[4].trim())))

            $(".to_account_display_info").show();
        }
    });

    $("#effective_date_to").on("change", function (e) {
        let date_from = $("#effective_date_from").val();
        let date_to = $(this).val();

        if (date_from == date_to) {
            $(".maximum_attempts").show();
        } else {
            $(".maximum_attempts").hide();
        }
    });

    $("#next_button").on("change", function (e) {
        e.preventDefault();

        var from_account_ = $("#from_account").val().split("~");
        var from_account = from_account_[2];
        $("#display_from_account").text(from_account);

        var beneficiary_account_ = $("#select_beneficiary").val().split("~");
        var beneficiary_account = beneficiary_account_[2];
        $("#display_select_beneficiary").text(beneficiary_account);

        var effective_date_from = $("#effective_date_from").val();
        $("#display_effective_date_from").text(effective_date_from);

        var effective_data_to = $("#effective_date_to").val();
        $("#display_effective_date_to").text(effective_data_to);

        var frequency = $("#select_frequency").val();
        $("#display_select_frequency").text(frequency);

        var maximum_attempts = $("#select_default_attempts").val();
        $("#diaply_select_default_attempts").text(maximum_attempts);

        var transaction_details = $("#tansaction_details").val();
        $("#display_tansaction_details").text(transaction_details);

        var amount = $("#amount").val();
        $("#display_amount").text(amount);

        $("#schedule_payment_table").hide();
        $("#display_view_list").show();

        $("#schedule_payment_form_summary").show();
        $("#schedule_payment_form").hide();
    });

    $("#submit_button").on("change", function (e) {
        e.preventDefault();
        var from_account_ = $("#from_account").val().split("~");
        var from_account = from_account_[2];

        var beneficiary_account_ = $("#select_beneficiary").val().split("~");
        var beneficiary_account = beneficiary_account_[2];

        var effective_date_from = $("#effective_date_from").val();

        var effective_data_to = $("#effective_date_to").val();

        var frequency = $("#select_frequency").val();

        var maximum_attempts = $("#select_default_attempts").val();

        var transaction_details = $("#tansaction_details").val();

        var amount = $("#amount").val();

        $.ajax({
            type: "POST",
            url: "schedule-payment-api",
            datatype: "application/json",
            data: {
                from_account: from_account,
                beneficiary_account: beneficiary_account,
                effective_date_from: effective_date_from,
                effective_data_to: effective_data_to,
                frequency: frequency,
                maximum_attempts: maximum_attempts,
                transaction_details: transaction_details,
                amount: amount,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.responseCode == "000") {
                    toaster(response.message, "success", 20000);
                } else {
                    toaster(response.message, "error", 10000);
                }
            },
        });
    });
});
