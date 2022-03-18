let datatableOptions = {
    destroy: true,
    // lengthChange: false,
    pageLength: 5,
    // searching: false,
    // scrollY: "500px",
    // info: false,
    // "scrollX":        true,
    // scrollCollapse: true,
    // paging: false,
    columnDefs: [
        {
            //ignore time and render only dates
            targets: [3, 4, 6, 7],
            render: (data) => data.split(" ")[0],
        },
        {
            targets: [8],
            render: (data) =>
                `<div class="text-danger cancel-order text-center" data-order-number="${data}"><i style="cursor: pointer;" class="fas fa-ban"></i></div>`,
        },
        {
            // trancate with ellipses ex
            targets: "_all",
            render: function (data, type, row) {
                return data && data.length > 45 && !data.includes("<b")
                    ? data.substr(0, 45) + "…"
                    : data;
            },
        },
    ],
};

function getStandingOrderStatus(accountNumber) {
    siteLoading("show");
    $.ajax({
        type: "POST",
        url: "get-standing-order-status-api",
        data: { accountNumber },
        datatype: "application/json",

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            $("#standing_order_display_area tbody").empty();
            if (response.responseCode == "000") {
                let data = response.data;
                let table = $("#standing_order_display_area").DataTable(
                    datatableOptions
                );
                table.clear();
                $.each(data, function (i, e) {
                    formattedAmount = `<b class="text-success float-right">${formatToCurrency(
                        e.dueAmount
                    )}</b>`;
                    extraData = JSON.stringify(e);
                    table.row
                        .add([
                            e.accountNumber,
                            e.beneficiaryAccount,
                            formattedAmount,
                            e.orderDate,
                            e.expiryDate,
                            e.frequency,
                            e.firstPaymentDate,
                            e.lastPaymentDate,
                            e.orderNumber,
                        ])
                        .order([0, "desc"])
                        .draw(false);
                });
                renderCancelButtons();
            } else {
                toaster(response.message, "warning");
                $("#standing_order_display_area tbody").append(
                    `<td colspan="100%" class="text-center">
                    ${noDataAvailable} </td>`
                );
                $("#no_data_available_img").css("max-width", "200px");
            }
            siteLoading("hide");
        },
        // error: function (xhr, status, error) {
        //     setTimeout(function () {
        //         getStandingOrderStatus(accountNumber);
        //     }, $.ajaxSetup().retryAfter);
        // },
    });
}
function renderCancelButtons() {
    $(".cancel-order").on("click", (e) => {
        let orderNumber = $(e.currentTarget).attr("data-order-number");
        Swal.fire({
            title: "Really cancel this Standing Order?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#D3D3D3",
            confirmButtonText: "Yes, Proceed!",
        }).then((result) => {
            if (result.isConfirmed) {
                let pass = true;
                $("#pin_code_modal").modal("show");
                $("#transfer_pin").on("click", () => {
                    if (!pass) {
                        return;
                    }
                    const pinCode = $("#user_pin").val();
                    if (!pinCode || pinCode.length !== 4) {
                        toaster("invalid pin", "warning");
                    } else {
                        cancelStandingOrder(orderNumber, pinCode);
                    }
                    pass = false;
                    $("#user_pin").val("");
                });
            }
        });
    });
}

function cancelStandingOrder(orderNumber, pinCode) {
    $.ajax({
        type: "POST",
        url: "cancel-standing-order-api",
        datatype: "application/json",
        data: {
            orderNumber: orderNumber,
            pinCode: pinCode,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            console.log(response);
            toaster(response.message, "warning");
        },
        error: (xhr, status, error) => {
            console.log(xhr);
            toaster(error, "error");
        },
    });
}

$(function () {
    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
    $("#from_account").on("change", function () {
        console.log("here");
        let accountNumber = $("#from_account option:selected").attr(
            "data-account-number"
        );
        getStandingOrderStatus(accountNumber);
    });
    $("#from_account").trigger("change");
});
