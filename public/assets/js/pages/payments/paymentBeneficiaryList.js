const pageData = new Object();
function getBeneficiaryList() {
    $.ajax({
        tpye: "GET",
        url: "payment-beneficiary-list-api",
        datatype: "application/json",
        success: function (response) {
            if (response.responseCode == "000") {
                const data = response.data;

                if (data && data.length > 0) {
                    $.each(pageData.payTypes, (i) => {
                        const type = pageData.payTypes[i];
                        pageData["bene_" + type] = data.filter(
                            (e) => e.PAYMENT_TYPE === type
                        );
                    });
                    drawBeneficiaryTable();
                }
            } else {
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getBeneficiaryList();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function getPaymentTypes() {
    $.ajax({
        tpye: "GET",
        url: "get-payment-types-api",
        datatype: "application/json",
        success: function (response) {
            if (response.responseCode == "000") {
                const data = response.data;
                pageData.payTypes = [];
                $.each(data, function (i) {
                    const type = data[i].paymentType;
                    pageData.payTypes.push(type);
                    pageData["pay_" + type] = data[i];
                });
            } else {
            }
            getBeneficiaryList();
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                // getPaymentTypes();
            }, $.ajaxSetup().retryAfter);
        },
    });
}
function beneficiarySaved() {
    Swal.fire({
        width: 300,
        title: "<h2 class='text-success font-16 font-weight-bold'>Beneficiary Saved</h2>",
        imageUrl: "assets/images/animations/sprinkles.gif",
        imageHeight: 100,
        confirmButtonColor: "#1abc9c",
    });
    getBeneficiaryList();
}
function beneficiaryDeleted() {
    Swal.fire({
        width: 300,
        title: "<h2 class='text-danger font-16 font-weight-bold'>Beneficiary Deleted</h2>",
        imageUrl: "assets/images/animations/delete-message.gif",
        imageHeight: 100,
        confirmButtonColor: "#dc3545",
    });
    getBeneficiaryList();
}
function drawBeneficiaryTable() {
    let table = $("#beneficiary_list")
        .DataTable({
            destroy: true,
            pageLength: 5,
            lengthChange: false,
            columnDefs: [
                {
                    targets: "_all",
                    orderable: false,
                },
            ],
        })
        .clear();
    let noBeneficiaries = noDataAvailable.replace("Data", "Beneficiaries");
    let data = [];
    $("#beneficiary_list tbody").empty();
    const currentType = $(".current-type").attr("data-value");
    data = pageData["bene_" + currentType];
    if (data && data.length < 1) {
        $("#beneficiary_list tbody")
            .append(`<td colspan="100%" class="text-center">
        ${noBeneficiaries} </td>`);
        return;
    }
    $.each(data, (index) => {
        const beneData = JSON.stringify(data[index]);
        const editIcon = `<a class='edit-beneficiary' style="display:flex; place-content:center;" href="#" data-value='${beneData}'> <span class="fe-edit noti-icon text-info"></span></a>`;
        const { NICKNAME, ACCOUNT, PAYEE_NAME } = data[index];

        const logo = pageData["pay_" + currentType].paySubTypes.find(
            (e) => e.paymentCode === PAYEE_NAME
        ).paymentLogo;
        // logo = "";
        const img = logo
            ? "data:image/jpg;base64," + logo
            : "assets/images/add.png";
        const payeeImage = `<img src="${img}" class="payment_icon">`;
        const payeeText = `<span> ${PAYEE_NAME} </span>`;
        const payee = `<div class="d-flex m-0">${payeeImage}${payeeText}</div>`;
        table.row.add([NICKNAME, ACCOUNT, payee, editIcon]).draw("full-reset");
    });
    // return;
    let editButtons = document.querySelectorAll(".edit-beneficiary");
    editButtons.forEach((item, i) => {
        item.addEventListener("click", (e) => {
            const editButton = e.currentTarget;
            const beneficiaryData = JSON.parse(
                $(editButton).attr("data-value")
            );
            editPaymentBeneficiary(beneficiaryData, currentType);
        });
    });
    siteLoading("hide");
}

$(document).ready(function () {
    siteLoading("show");
    getPaymentTypes();
    $("#add_beneficiary").on("click", () => {
        addPaymentBeneficiary($(".current-type").attr("data-value"));
    });
    let beneficiaryType = document.querySelectorAll(".beneficiary-type");
    beneficiaryType.forEach((item, i) => {
        item.addEventListener("click", (e) => {
            const currentType = e.currentTarget;
            $(".beneficiary-type").removeClass("current-type");
            $(currentType).addClass("current-type");
            $("#beneficiary_type_title").text(
                $(currentType).attr("data-title") + " "
            );
            drawBeneficiaryTable();
        });
    });
});
