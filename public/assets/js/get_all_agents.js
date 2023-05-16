function agent_list() {
    var table = $(".beneficiary_list_display").DataTable();
    var nodes = table.rows().nodes();
    $.ajax({
        tpye: "GET",
        url: "all-agents-list-api",
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            return false;
            let data = response.data;
            if (response.responseCode == "000") {
                $("#beneficiary_table").show();
                $("#beneficiary_list_loader").hide();
                $("#beneficiary_list_retry_btn").hide();
                $.each(data, function (index) {
                    // console.log(data[index])

                    model_data = data[index];

                    table.row
                        .add([
                            data[index].NICKNAME,
                            data[index].BEN_ACCOUNT,
                            data[index].NICKNAME,
                            data[index].EMAIL,
                            data[index].BANK_NAME,

                            `&emsp;&emsp; <a class='beneficiary_data' data-value='${data[index]}' href='edit-beneficiary?bene_type=${data[index].BENEF_TYPE}&bene_id=${data[index].BENE_ID}'> <span class="fe-edit noti-icon text-primary"></span></a>

                                    &emsp;&emsp; <a class='delete_beneficiary_data' href='delete-beneficiary?bene_id=${data[index].BENE_ID}'><span class="fe-trash noti-icon text-danger delete_beneficiary_data" data-value="${data[index].BENE_ID}"></span></a>`,
                        ])
                        .draw(false);
                });
            } else {
                $("#beneficiary_table").hide();
                $("#beneficiary_list_loader").hide();
                $("#beneficiary_list_retry_btn").show();
            }
        },
    });
}

$(document).ready(function () {
    setTimeout(function () {
        agent_list();
    }, 200);

    $("#checker").click(function (e) {
        e.preventDefault();
        alert("All Agents");
    });
});
