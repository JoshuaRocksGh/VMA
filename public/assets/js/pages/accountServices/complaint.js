function getServiceType() {
    return $.ajax({
        type: "get",
        url: "get-service-type-api",
        datatype: "application/json",
    })
        .done(({ data }) => {
            if (!data) {
                toaster("Couldn't get service type", "warning");
            }
            const select = document.getElementById("service_type");
            data.forEach((service) => {
                const option = document.createElement("option");
                option.text = service.description;
                option.value = service.actualCode;
                select.appendChild(option);
            });
        })
        .fail((err) => console.log(err.message));
}

function submitComplaint(accountNumber, serviceType, description) {
    return $.ajax({
        type: "POST",
        url: "complaint-api",
        datatype: "application/json",
        data: {
            accountNumber,
            serviceType,
            description,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    })
        .done((res) => console.log(res))
        .fail((err) => console.log(err.message));
}

$(function () {
    siteLoading("show");
    getServiceType().always(siteLoading("hide"));
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
    $("#service_type").select2({
        minimumResultsForSearch: Infinity,
    });

    $("#proceed_button").on("click", () => {
        let accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        let serviceType = $("#service_type").val();
        let description = $("#description").val();
        console.log({ accountNumber, serviceType, description });
        //validate to ensure fields are not empty
        if (!accountNumber || !serviceType || !description) {
            toaster("Fields must not be empty", "warning");
            return false;
        }
        siteLoading("show");
        submitComplaint(accountNumber, serviceType, description).always(
            siteLoading("hide")
        );
    });
});
