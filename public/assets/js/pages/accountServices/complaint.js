$(function () {
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
    $("#service_type").select2({
        minimumResultsForSearch: Infinity,
    });

    $("#from_account").on("change", () => {
        var from_account = $("#from_account").val();
        console.log(from_account);
    });

    //console service type entered
    $("#service_type").on("change", () => {
        var service_type = $("#service_type").val();
        console.log(service_type);
    });

    //console description entered
    $("#description").on("change", () => {
        var description = $("#description").val();
        console.log(description);
    });
    $("#proceed_button").on("click", () => {
        let from_account = $("#from_account").val();
        let service_type = $("#service_type").val();
        let description = $("#description").val();

        //validate to ensure fields are not empty
        // account.trim() =='' ||
        if (from_account == "" || service_type == "" || description == "") {
            toaster("Fields must not be empty", "error", 10000);
            return false;
        } else {
            var from_account_info = from_account.split("~");
            let account = from_account_info[2].trim();
            console.log(account);
            $("#proceed-text").hide();
            $("#spinner-proceed").show();
            $("#spinner-text-proceed").show();

            $.ajax({
                type: "POST",
                url: "complaint-api",
                datatype: "application/json",
                data: {
                    // 'accountNumber': account,
                    account_no: account,
                    service_type: service_type,
                    description: description,
                },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    toaster(
                        "Complaint submitted successfully",
                        "success",
                        2000
                    );
                    $("#spinner-proceed").hide();
                    $("#spinner-text-proceed").hide();
                    $("#proceed-text").show();
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);
                    return false;
                },
            });
        }
    });
});
