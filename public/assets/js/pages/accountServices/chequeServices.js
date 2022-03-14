// TODO : Test the request Card method. especially the API response

function getBranches() {
    $.ajax({
        type: "GET",
        url: "get-branches-api",
        datatype: "application/json",
    }).done((response) => {
        console.log(response);
        if (response?.data) {
            const { data } = response;
            const select = document.getElementById("pick_up_branch");
            data.forEach((e) => {
                const option = document.createElement("option");
                option.text = e.branchDescription;
                option.value = e.branchCode;
                select.appendChild(option);
            });
        }
    });
}

$(function () {
    siteLoading("show");
    Promise.all([getBranches()])
        .finally((e) => siteLoading("hide"))
        .catch((e) => {
            somethingWentWrongHandler(e);
        });

    $("select").select2();
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
});
