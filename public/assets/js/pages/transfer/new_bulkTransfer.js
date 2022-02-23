// alert("bulk transfer");

function my_account() {
    $.ajax({
        type: "GET",
        url: "get-my-account",
        datatype: "application/json",
        success: function (response) {
            //console.log(response.data);
            let data = response.data;
            $.each(data, function (index) {
                $("#my_account").append(
                    $("<option>", {
                        value:
                            data[index].accountType +
                            "~" +
                            data[index].accountDesc +
                            "~" +
                            data[index].accountNumber +
                            "~" +
                            data[index].currency +
                            "~" +
                            data[index].availableBalance +
                            "~" +
                            data[index].accountMandate,
                    }).text(
                        data[index].accountType +
                            "||" +
                            data[index].accountNumber +
                            "||" +
                            data[index].currency +
                            " " +
                            data[index].availableBalance
                    )
                );
            });
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                my_account();
            }, $.ajaxSetup().retryAfter);
        },
    });
}

var bulk_upload_array_list = [];
var bulk_detail_list = [];

function bulk_upload_list(fileBatch) {
    console.log(fileBatch);
    // console.log(allErrors);
    var table = $(".bulk_upload_list").DataTable();

    var nodes = table.rows().nodes();
    //var error_table = $('.failed_bulk_upload_table').DataTable();
    //var _error_nodes = error_table.rows().nodes();
    $.ajax({
        tpye: "GET",
        url: "get-bulk-upload-list-api?fileBatch=" + fileBatch,
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            // return false;
            //console.log("bulk upload list:", response.data);

            let uploadData = response.data.uploadData;
            let uploadDetails = response.data.uploadDetails;
            let uploadDetails_date = uploadDetails.valueDate;
            var uploadDetails_date_split = uploadDetails_date.split("T");
            let value_date = uploadDetails_date_split[0];
            let total_upload = uploadData.length;

            let all_failed_uploads = 0;
            // let upload_with_errors = uploadData.;

            if (response.responseCode == "000") {
                // NO ERRORS IN FILE UPLOAD
                $.each;
                table.row
                    .add([
                        `<b>${uploadDetails.referenceNumber}</b>`,
                        `<b>${uploadDetails.debitAccount}</b>`,
                        `<b>${formatToCurrency(
                            parseFloat(uploadDetails.totalAmount)
                        )}</b>`,
                        `<b>${value_date}</b>`,
                        `<b><button type="button" class="btn btn-sm btn-soft-success waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#full-width-modal" data="">&emsp;${total_upload}&emsp;</button></b>`,
                        `<b>0</b>`,
                        `<b>Upload</b>`,

                        //action
                    ])
                    .draw(false);

                return false;

                console.log(file_total_amount);
                let modal_target = table.row
                    .add([
                        `<b>${response.data[0].ref_number}</b>`,
                        `<b></b>`,
                        `<b>${formatToCurrency(
                            parseFloat(file_total_amount)
                        )}</b>`,
                        `<b>${today}</b>`,
                        `<b>${new_file_upload.length}</b>`,
                        `<b><button type="button" class="btn btn-sm btn-danger waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#full-width-modal" data="${failed_acc_link}">&emsp;${failed_acc_link.length}&emsp;</button></b>`,
                        `<b></b>`,

                        //action
                    ])
                    .draw(false);

                var new_table = $(".failed_bulk_upload_table").DataTable();
                var nodes = new_table.rows().nodes();
                let error_table_modal = failed_acc_link;
                let upload_summary_count = 1;

                $.each(failed_acc_link, function (index) {
                    console.log("failed_acc_link=>", failed_acc_link[index]);

                    new_table.row
                        .add([
                            `<b class="h5">${upload_summary_count++}</b>`,
                            `<b class="h5">${failed_acc_link[index].name}</b>`,
                            `<b class="h5">${failed_acc_link[index].acct_link}</b>`,
                            `<b class="h5">${formatToCurrency(
                                parseFloat(failed_acc_link[index].amount)
                            )}</b>`,
                            `<b class="h5">${failed_acc_link[index].ref_number}</b>`,
                            `<b class="h5 text-danger">${failed_acc_link[index].acct_valid}</b>`,
                        ])
                        .draw(false);
                });

                //  $(".error_modal_data").click(() => {
                //     $(".failed_bulk_upload_table tbody").empty();
                //     $(".successful_bulk_upload tr").remove();

                // })

                return false;

                $(".successful_bulk_upload tr").remove();
                $(".failed_bulk_upload tr").remove();
                //$("#show_error_upload").show()
                //$("#show_successful_upload").show()

                bulk_upload_array_list = response.data.bulk_ref;
                bulk_detail_list = response.data.bulk_details;
                excel_error_list = response.data.excel_errors;

                data = bulk_upload_array_list;
                detail = bulk_detail_list;
                excel = excel_error_list;

                //show alert on upload...

                $.each(excel, function (index) {
                    total_amount = excel[index].TOTAL_AMOUNT;
                    bulk_total_amount = excel[index].EXCEL_TOTAL_AMOUNT;
                    if (
                        excel[index].TOTAL_AMOUNT !=
                        excel[index].EXCEL_TOTAL_AMOUNT
                    ) {
                        $("#display_bulk_amount_error").show();
                    } else {
                        var matched_amounts = true;
                        $("#display_bulk_amount_error").hide();
                    }

                    if (
                        excel[index].REF_NUMBER != excel[index].EXCEL_REF_NUMBER
                    ) {
                        $("#excel_ref_number_upload").append(
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        Ref Number and Excel Ref Number do not Match
                                    </div> `
                        );

                        // $(".successful_bulk_upload").append(
                        //     `
                        //         <tr>
                        //             <td colspan="100%"  class="text-center">${noData} </td>
                        //         </tr>
                        //     `
                        // )
                    } else {
                        var matched_ref_number = true;
                        $("#excel_ref_number_upload").append(
                            `
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        Ref Number and Excel Ref Number Match
                                    </div`
                        );

                        //  $(".failed_bulk_upload").append(
                        //     `
                        //         <tr>
                        //             <td colspan="100%"  class="text-center">${noData} </td>
                        //         </tr>
                        //     `
                        // )
                    }

                    if (matched_amounts != true || matched_ref_number != true) {
                        $("#upload_success_button").append(
                            `
                                    <p class="text-center"> &nbsp; - &nbsp;</p>
                                    `
                        );
                    } else {
                        $("#upload_success_button").append(
                            `<a type="button" class="btn btn-primary waves-effect waves-light float-right" href="{{ url('view-bulk-transfer?batch_no=${data[index].BATCH_NO}&bulk_amount=${data[index].TOTAL_AMOUNT}&account_no=${data[index].ACCOUNT_NO}&bank_type=${data[index].bank_code}') }}"><b>Upload</b></a>`
                        );
                    }
                });

                var new_table = $(".failed_bulk_upload_table").DataTable();

                var nodes = new_table.rows().nodes();

                $.each(detail, function (index) {
                    //console.log("bulk_detail_list:", detail[index])
                    var error_message = detail[index].MESSAGE.split("-");
                    //console.log('error_message:', error_message)
                    var display_error_message = "<ul>";
                    $.each(error_message, function (index) {
                        //console.log(error_message[index])
                        if (error_message[index]) {
                            display_error_message += `<li class="text-danger">${error_message[index]}</li>`;
                        }
                    });
                    display_error_message += "</ul>";
                    total_upload++;

                    if (detail[index].MESSAGE != "") {
                        pending++;

                        new_table.row
                            .add([
                                `<b class="h5">${upload_summary_count++}</b>`,
                                `<b class="h5">${detail[index].NAME}</b>`,
                                `<b class="h5">${detail[index].BBAN}</b>`,
                                `<b class="h5">${formatToCurrency(
                                    parseFloat(detail[index].AMOUNT)
                                )}</b>`,
                                `<b class="h5">${detail[index].REF_NO}</b>`,
                                `<b class="h5">${display_error_message}</b>`,
                            ])
                            .draw(false);

                        //  $(".failed_bulk_upload").append(
                        //     `
                        //         <tr>
                        //             <td class="h5"><b>${upload_summary_count++}</b></td>
                        //             <td class="h5"><b>${detail[index].NAME}</b></td>
                        //             <td class="h5"><b>${detail[index].BBAN}</b></td>
                        //             <td class="h5"><b>${detail[index].AMOUNT}</b></td>
                        //             <td class="h5"><b>${detail[index].REF_NO}</b></td>
                        //             <td class="h5"><b>${display_error_message}</b></td>
                        //         </tr>
                        //     `
                        // )

                        //console.log("pending:", pending)
                    } else if (detail[index].MESSAGE == "") {
                        successful++;

                        //  new_table.row.add([
                        //     `<b class="h5">${upload_summary_count++}</b>`,
                        //     `<b class="h5">${detail[index].NAME}</b>`,
                        //     `<b class="h5">${detail[index].BBAN}</b>`,
                        //     `<b class="h5">${formatToCurrency(parseFloat(detail[index].AMOUNT))}</b>`,
                        //     `<b class="h5">${detail[index].REF_NO}</b>`,
                        //     `<b class="h5 text-success">Validation Successful</b>`

                        // ]).draw(false)
                        //  $(".failed_bulk_upload").append(
                        //     `
                        //         <tr>
                        //             <td class="h5"><b>${upload_summary_count++}</b></td>
                        //             <td class="h5"><b>${detail[index].NAME}</b></td>
                        //             <td class="h5"><b>${detail[index].BBAN}</b></td>
                        //             <td class="h5"><b>${detail[index].AMOUNT}</b></td>
                        //             <td class="h5"><b>${detail[index].REF_NO}</b></td>
                        //             <td class="h5 text-success"><b>Validation Successful</b></td>
                        //         </tr>
                        //     `
                        // )

                        //console.log("successful:", successful)
                    } else {
                        return false;
                    }
                });

                //return false;

                $.each(data, function (index) {
                    console.log("bulk_upload_array_list:", data[index]);

                    let status = "";
                    let bank_type = "";

                    if (data[index].status == "A") {
                        status = `<span class="badge badge-success"> &nbsp; Approved &nbsp; </span> `;
                    } else if (data[index].status == "R") {
                        status = `<span class="badge badge-danger"> &nbsp; Rejected &nbsp; </span> `;
                    } else {
                        status = `<span class="badge badge-warning"> &nbsp; Pending &nbsp; </span> `;
                    }

                    if (data[index].bank_code == "SAB") {
                        bank_type = `<span class=""> &nbsp; Same Bank &nbsp; </span> `;
                    } else {
                        bank_type = `<span class=""> &nbsp; Other Bank &nbsp; </span> `;
                    }

                    if (
                        total_upload == successful &&
                        total_amount == bulk_total_amount
                    ) {
                        $(".successful_upload_header").show();
                        $(".failed_upload_header").hide();
                        action_button = `<div class="row">
                                        <div class="col-md-6">
                                            <a href="#" type="button" class="btn btn-primary btn-sm waves-effect waves-light m-1 float-right" data-toggle="modal" data-target="#full-width-modal"><b>View </b></a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ url('view-bulk-transfer?batch_no=${data[index].BATCH_NO}&bulk_amount=${data[index].TOTAL_AMOUNT}&account_no=${data[index].ACCOUNT_NO}&bank_type=${data[index].bank_code}') }}" type="button" class="btn btn-success btn-sm waves-effect waves-light m-1 float-right"><b>Upload</b></a>
                                        </div>
                                    </div>
                                `;
                    } else {
                        $(".successful_upload_header").hide();
                        $(".failed_upload_header").show();
                        action_button = `<div class="row">
                                        <div class="col-md-6">
                                            <a href="#" type="button" class="btn btn-primary btn-sm waves-effect waves-light m-1 float-right" data-toggle="modal" data-target="#full-width-modal"><b>View </b></a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ url('delete-bulk-transfer?batch_no=${data[index].BATCH_NO}&bulk_amount=${data[index].CUSTOMER_NO}') }}" type="button" class="btn btn-danger btn-sm waves-effect waves-light m-1 float-right"><b>Delete</b></a>
                                        </div>
                                    </div>
                                `;
                    }

                    let batch = `<b>${data[index].BATCH_NO}</b>`;

                    let action = `<span class="btn-group mb-2">
                                                                                                                                                                                        <button class="btn btn-sm btn-success" style="zoom:0.8;"> Approved</button>
                                                                                                                                                                                         &nbsp;
                                                                                                                                                                                         <button class="btn btn-sm btn-danger" style="zoom:0.8;"> Reject</button>
                                                                                                                                                                                         </span>  `;
                });
            } else {
                $("#beneficiary_table").hide();
                $("#beneficiary_list_loader").hide();
                $("#beneficiary_list_retry_btn").show();
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                bulk_upload_list(fileBatch);
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function formatToCurrency(amount) {
    return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
}

$(document).ready(function () {
    setTimeout(function () {
        // bulk_upload_list('057725', "P")
        //alert('called')
        //console.log(@json(session('excel_details')))
        //my_account()
    }, 500);

    let today = new Date();
    let dd = today.getDate();

    let mm = today.getMonth() + 1;
    const yyyy = today.getFullYear();
    console.log(mm);
    console.log(String(mm).length);
    if (String(mm).length == 1) {
        mm = "0" + mm;
    }

    defaultDate = dd + mm + "-" + today.getFullYear();
    console.log(defaultDate);

    //  $(".date-picker-valueDate").flatpickr({
    //     altInput: true,
    //     altFormat: "j F, Y",
    //     dateFormat: "d-m-Y",
    //     defaultDate: [defaultDate],
    //     position: "below"
    // })

    //////////////////////////////
    //// BULK EXCEL VALIDATION ////
    ///////////////////////////

    $("#bulk_upload_form").submit(function (e) {
        e.preventDefault();
        $("#submit_cheque_request").text("Processing ... ");

        // FILE UPLOAD
        var file = document.getElementById("excel_file").files[0];
        //console.log(file);
        //return false;
        if (file) {
            var file_name = file.name;
            var file_extension = file_name.split(".").pop().toLowerCase();

            if (jQuery.inArray(file_extension, ["xls", "xlsx"]) == -1) {
                toaster("Invalid Document Type!", "error", 3000).then(
                    function () {
                        document.getElementById("file").value = "";
                    }
                );
                return false;
            }

            var file_size = file.size;
            //return false;
            if (file_size > 20000000) {
                // check if image size is less than 20MB
                toaster(
                    "The file size is too large. The max file size 20MB!",
                    "error",
                    3000
                );
            } else {
                var form_data = new FormData();

                var account_details = $("#my_account").val();
                var bank_type = $("#bank_type").val();
                var bulk_amount = $("#bulk_amount").val();
                var reference_no = $("#reference_no").val();
                var value_date = $("#value_date").val();

                var file_ = document.getElementById("excel_file").files[0];

                form_data.append("my_account", account_details);
                form_data.append("bank_type", bank_type);
                form_data.append("bulk_amount", bulk_amount);
                form_data.append("reference_no", reference_no);
                form_data.append("value_date", value_date);
                form_data.append("excel_file", file_);
                form_data.append("file_name", file_name);
                form_data.append("file_extension", file_extension);
                form_data.append("file_size", file_size);

                //console.log(form_data)
            }

            //console.log(form_data)
            //console.log(JSON.stringify(form_data));

            //return false;

            siteLoading("show");

            $.ajax({
                type: "POST",
                url: "upload_",
                datatype: "application/json",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    console.log(response);
                    //return false;
                    let data = response.data;
                    let fileBatch = data.fileBatch;

                    if (response.responseCode == "000") {
                        siteLoading("hide");
                        $("#submit_cheque_request").text("Submit File");

                        toaster(response.message, "success", 3000);

                        setTimeout(function () {
                            bulk_upload_list(fileBatch);
                        }, 500);
                    } else {
                        siteLoading("hide");
                        let allErrors = new Array();
                        //console.log(fileBatch)

                        let validationErrors = data.validationErrors;
                        $.each(validationErrors, function (index) {
                            //console.log(validationErrors[index])
                            allErrors.push(validationErrors[index]);
                        });

                        //bulk_upload_list(fileBatch, allErrors)

                        toaster(response.message, "error", 3000);
                        //location.reload();
                        /* setTimeout(function() {
                                     location.reload();

                                 }, 3000) */
                    }
                },
                error: function (xhr, status, error) {
                    siteLoading("hide");

                    toaster(
                        "Error Occurred. Upload Unsuccessful!",
                        "error",
                        3000
                    );
                    //  setTimeout(function() {
                    //     location.reload();
                    //     location.reload();
                    // }, 3000)
                },
            });
        } else {
            swal({
                text: "Something went wrong. Upload was unsuccessful!",
                icon: "warning",
                dangerMode: true,
            }).then(function () {
                document.getElementById("file").value = "";
            });
        }
    });
});
