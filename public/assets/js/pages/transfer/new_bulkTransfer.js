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

function bulk_upload_list(fileBatch, upload_response) {
    siteLoading("show");

    $.ajax({
        tpye: "GET",
        url: "get-bulk-upload-list-api?fileBatch=" + fileBatch,
        datatype: "application/json",
        success: function (response) {
            // return false;
            // console.log("bulk upload list:", response);

            // console.log("uploadData => ", uploadData);
            // return false;

            // let all_failed_uploads = 0;
            // let upload_with_errors = uploadData.;

            if (response.responseCode == "000") {
                // NO ERRORS IN FILE UPLOAD
                let data = response.data.uploadData;
                let uploadData = response.data.uploadData;
                let uploadDetails = response.data.uploadDetails;
                let uploadDetails_date = uploadDetails.valueDate;
                var uploadDetails_date_split = uploadDetails_date.split("T");
                let value_date = uploadDetails_date_split[0];
                let total_upload = data.length;

                let valid_uploads = 0;
                let valid_uploads_count = 1;
                let invalid_uploads = 0;
                let invalid_uploads_count = 1;

                let all_valid_uploads = $(
                    "#all_successful_uploads_table"
                ).DataTable();
                // var nodes = all_valid_uploads.rows().nodes();
                // $(".successful_uploads tr").remove();
                // $(".failed_uploads tr").remove();

                let all_failed_uploads = $(
                    "#all_failed_uploads_table"
                ).DataTable({
                    columnDefs: [
                        {
                            targets: "all",
                            render: (data) => {
                                if (!data) {
                                    return "n/a";
                                }
                                return data;
                            },
                        },
                    ],
                });

                // $(".failed_uploads tr").remove();

                // $(".all_bulk_upload_summary tr").remove();

                // let total_bulk_upload = $("#bulk_upload_list").DataTable();
                // console.log("uploadData=>", uploadData);
                // return false;

                const group = { valid: [], invalid: [] };
                uploadData.forEach((e) => {
                    const {
                        name,
                        accountNumber,
                        amount,
                        refNumber,
                        acctValid,
                        valid,
                    } = e;
                    // console.log("e=>", e);
                    // return false;
                    if (e.valid === "Y") {
                        group.valid.push(e);
                        console.log("name => ", acctValid);
                        all_valid_uploads.row
                            .add([
                                // `<b>${valid_uploads_count}</b>`,
                                `<b>${name}</b>`,
                                `<b>${accountNumber}</b>`,
                                `<b>${amount}</b>`,
                                `<b>${refNumber}</b>`,
                                `<b class="text-success">${acctValid}</b>`,
                            ])
                            .draw(false);
                        return;
                    }
                    group.invalid.push(e);
                    all_failed_uploads.row
                        .add([
                            // `<b>${valid_uploads_count}</b>`,
                            `<b>${name}</b>`,
                            `<b>${accountNumber}</b>`,
                            `<b>${amount}</b>`,
                            `<b>${refNumber}</b>`,
                            `<b class="text-danger">${acctValid}</b>`,
                        ])
                        .draw(false);
                    return;
                });

                //         all_valid_uploads.row
                //             .add([
                //                 // `<b>${valid_uploads_count}</b>`,
                //                 `<b>${uploadName}</b>`,
                //                 `<b>${uploadAccountNumber}</b>`,
                //                 `<b>${uploadAmount}</b>`,
                //                 `<b>${uploadRefNumber}</b>`,
                //                 `<b class="text-success">${uploadAcctValid}</b>`,
                //             ])
                //             .draw(false);
                const { valid, invalid } = group;
                if (invalid.length < 1) {
                    var action_button = `<a href="view-bulk-transfer?batch_no=${fileBatch}" type="button" class="btn btn-success btn-sm waves-effect waves-light text-center">
                <i class="mdi mdi-check-all"></i>&nbsp;<b>Upload</b>
            </a>`;
                } else {
                    var action_button = `<a href="delete-bulk-transfer?batch_no=${fileBatch}"  type="button" class="btn btn-danger btn-sm waves-effect waves-light text-center delete_bulk_transfer_upload" batch_no="${fileBatch}">
                <i class="mdi mdi-close-circle-outline"></i>&nbsp;<b>Delete</b>
            </a>`;
                }
                total_bulk_upload.row
                    .add([
                        // `<b>${valid_uploads_count}</b>`,
                        `<b>${uploadDetails.referenceNumber}</b>`,
                        `<b>${uploadDetails.debitAccount}</b>`,
                        `<b>${formatToCurrency(
                            parseFloat(uploadDetails.totalAmount)
                        )}</b>`,
                        `<b>${value_date}</b>`,
                        // `<b class="text-success">${uploadAcctValid}</b>`,
                        `<td><button type="button" class="btn btn-sm btn-primary waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#bs-example-modal-lg" >&emsp;<b>${total_upload}</b>&emsp;</button></td>`,
                        `<td><button type="button" class="btn btn-sm btn-danger waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#bs-example-modal-lg" >&emsp;<b>${invalid.length}</b>&emsp;</button></td>`,
                        ` <td>${action_button}</td>`,
                    ])
                    .draw(false);

                // $(".delete_bulk_transfer_upload").click(function (e) {
                //     alert("cliked");
                //     e.preventDefault();
                //     var fileBatch = $(this).attr("batch_no");

                //     siteLoading("show");
                //     $.ajax({
                //         type: "GET",
                //         url: "delete-bulk-transfer?batch_no=" + fileBatch,
                //         datatype: "application/json",
                //         success: function (response) {
                //             console.log(response);
                //             siteLoading("hide");
                //             if (response.responseCode == "000") {
                //                 swal.fire({
                //                     html: response.message,
                //                     icon: "success",
                //                     showConfirmButton: "false",
                //                 }).then(() => {
                //                     window.location.reload();
                //                 });
                //             }
                //         },
                //     });
                // });

                console.log(group);
                //     $.each(uploadData, function (index) {
                //     // console.log(uploadData[index]);
                //     console.log(uploadData[index].valid);

                //     // return false;
                //     if (uploadData[index].valid == "Y") {
                //         valid_uploads++; //increment

                //         if (
                //             uploadData[index].name == null ||
                //             uploadData[index].name == undefined
                //         ) {
                //             var uploadName = "N/A";
                //         } else {
                //             var uploadName = uploadData[index].name;
                //         }

                //         if (
                //             uploadData[index].accountNumber == null ||
                //             uploadData[index].accountNumber == undefined
                //         ) {
                //             var uploadAccountNumber = "N/A";
                //         } else {
                //             var uploadAccountNumber =
                //                 uploadData[index].accountNumber;
                //         }

                //         if (
                //             uploadData[index].amount == null ||
                //             uploadData[index].amount == undefined
                //         ) {
                //             var uploadAmount = "N/A";
                //         } else {
                //             var uploadAmount = uploadData[index].amount;
                //         }

                //         if (
                //             uploadData[index].refNumber == null ||
                //             uploadData[index].refNumber == undefined
                //         ) {
                //             var uploadRefNumber = "N/A";
                //         } else {
                //             var uploadRefNumber = uploadData[index].refNumber;
                //         }

                //         if (
                //             uploadData[index].acctValid == null ||
                //             uploadData[index].acctValid == undefined
                //         ) {
                //             var uploadAcctValid = "N/A";
                //         } else {
                //             var uploadAcctValid = uploadData[index].acctValid;
                //         }
                //         all_valid_uploads.row
                //             .add([
                //                 // `<b>${valid_uploads_count}</b>`,
                //                 `<b>${uploadName}</b>`,
                //                 `<b>${uploadAccountNumber}</b>`,
                //                 `<b>${uploadAmount}</b>`,
                //                 `<b>${uploadRefNumber}</b>`,
                //                 `<b class="text-success">${uploadAcctValid}</b>`,
                //             ])
                //             .draw(false);

                //         // $(".successful_uploads").append(
                //         //     `<tr>
                //         //         // <td><b>${uploadData[index].recordId}</b></td>
                //         //         <td><b>${uploadName}</b></td>
                //         //         <td><b>${uploadAccountNumber}</b></td>
                //         //         <td><b>${uploadAmount}</b></td>
                //         //         <td><b>${uploadRefNumber}</b></td>
                //         //         <td><b class="text-success">${uploadAcctValid}</b></td>
                //         //     </tr>
                //         //     `
                //         // );

                //         valid_uploads_count++;
                //     } else if (uploadData[index].valid != "Y") {
                //         invalid_uploads++;

                //         if (
                //             uploadData[index].name == null ||
                //             uploadData[index].name == undefined
                //         ) {
                //             var uploadName = "N/A";
                //         } else {
                //             var uploadName = uploadData[index].name;
                //         }

                //         if (
                //             uploadData[index].accountNumber == null ||
                //             uploadData[index].accountNumber == undefined
                //         ) {
                //             var uploadAccountNumber = "N/A";
                //         } else {
                //             var uploadAccountNumber =
                //                 uploadData[index].accountNumber;
                //         }

                //         if (
                //             uploadData[index].amount == null ||
                //             uploadData[index].amount == undefined
                //         ) {
                //             var uploadAmount = "N/A";
                //         } else {
                //             var uploadAmount = uploadData[index].amount;
                //         }

                //         if (
                //             uploadData[index].refNumber == null ||
                //             uploadData[index].refNumber == undefined
                //         ) {
                //             var uploadRefNumber = "N/A";
                //         } else {
                //             var uploadRefNumber = uploadData[index].refNumber;
                //         }

                //         if (
                //             uploadData[index].acctValid == null ||
                //             uploadData[index].acctValid == undefined
                //         ) {
                //             var uploadAcctValid = "N/A";
                //         } else {
                //             var uploadAcctValid = uploadData[index].acctValid;
                //         }

                //         all_failed_uploads.row
                //             .add([
                //                 // `<b>${valid_uploads_count}</b>`,
                //                 `<b>${uploadName}</b>`,
                //                 `<b>${uploadAccountNumber}</b>`,
                //                 `<b>${uploadAmount}</b>`,
                //                 `<b>${uploadRefNumber}</b>`,
                //                 `<b class="text-danger">${uploadAcctValid}</b>`,
                //             ])
                //             .draw(false);

                //         // $(".failed_uploads").append(
                //         //     `<tr>
                //         //         // <td><b>${uploadData[index].recordId}</b></td>
                //         //         <td><b>${uploadName}</b></td>
                //         //         <td><b>${uploadAccountNumber}</b></td>
                //         //         <td><b>${uploadAmount}</b></td>
                //         //         <td><b>${uploadRefNumber}</b></td>
                //         //         <td><b class="text-danger">${uploadAcctValid}</b></td>
                //         //         <td><button type="button" class="btn btn-warning width-sm waves-effect waves-light edit_record_uploaded"
                //         //         recordID="${uploadData[index].recordId}" name="${uploadName}" accNumber="${uploadAccountNumber}" amount="${uploadAmount}
                //         //         refNumber="${uploadRefNumber}" bank="${uploadData[index].bank}" transDescription="${uploadData[index].transDescription}"
                //         //         uploadBatch="${uploadData[index].uploadBatch}">Edit Record</a></td>
                //         //     </tr>
                //         //     `
                //         // );
                //         invalid_uploads_count++;
                //     } else {
                //         return false;
                //     }
                // });
                let editButtons = document.querySelectorAll(
                    ".edit_record_uploaded"
                );

                editButtons.forEach((button) => {
                    button.addEventListener("click", (e) => {
                        const editButton = e.currentTarget;
                        console.log(editButton);

                        const recordDetail = data.find(
                            (e) => e.recordId === $(editButton).attr("recordid")
                        );
                        // console.log("recordDetail =>", recordDetail);

                        $(".upload_recordID").val(recordDetail.recordId);
                        $(".upload_name").val(recordDetail.name);
                        $(".upload_accountNumber").text(
                            recordDetail.accountNumber
                        );
                        $(".upload_amount").val(recordDetail.amount);
                        $(".upload_description").val(
                            recordDetail.transDescription
                        );
                        $(".upload_bank").val(recordDetail.bank);
                        $(".upload_referenceNumber").val(
                            recordDetail.refNumber
                        );
                        $(".upload_batch").val(recordDetail.uploadBatch);

                        // $("#full-width-modal").hide();
                        // $("#full-width-modal").remove();
                        // $("#full-width-modal").removeAttr("class");
                        $(".edit_record_uploaded").click(function () {
                            $(".all_upload_details").hide();
                            $(".record_details_display").show();
                        });

                        $(".edit_record_close").click(function () {
                            $(".all_upload_details").hide();
                            $(".record_details_display").show();
                        });

                        // $(".edit_record_close").click(function(){

                        // });
                    });
                });

                console.log("valid_uploads_count=>", valid_uploads_count);
                // var table = $(".bulk_upload_list").DataTable();

                // var nodes = table.rows().nodes();
                // table.row
                //     .add([

                //     ])
                //     .draw(false);
                console.log("invalid_uploads_count=>", invalid_uploads);

                // $(".all_bulk_upload_summary").append(
                //     `
                //             <tr>
                //                 <td><b>${uploadDetails.referenceNumber}</b></td>
                //                 <td><b>${uploadDetails.debitAccount}</b></td>
                //                 <td><b>${formatToCurrency(
                //                     parseFloat(uploadDetails.totalAmount)
                //                 )}</b></td>
                //                 <td><b>${value_date}</b></td>
                //                 <td><button type="button" class="btn btn-sm btn-soft-success waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#full-width-modal" data="">&emsp;<b>${total_upload}</b>&emsp;</button></td>
                //                 <td><button type="button" class="btn btn-sm btn-soft-danger waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#full-width-modal" data="">&emsp;<b>${invalid_uploads}</b>&emsp;</button></td>
                //                 <td>${action_button}</td>
                //             </tr>
                //         `
                // );
                siteLoading("hide");

                toaster(upload_response, "success", 3000);

                return false;
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

// $("#value_date").datetimepicker({
//     format: "DD-MM-YYYY",
//     minDate: Date(),
// });

// $("#value_date").attr("min", maxDate);

$(document).ready(function () {
    window.total_bulk_upload = $("#bulk_upload_list").DataTable();
    // new $.fn.dataTable.Responsive(total_bulk_upload);
    // total_bulk_upload = $("#bulk_upload_list").DataTable({
    //     dom: "Bfrtip",
    //     buttons: ["colvis"],
    // });

    $(".accounts-select").select2({
        minimumResultsForSearch: Infinity,
        templateResult: accountTemplate,
        templateSelection: accountTemplate,
    });
    const today = new Date().toISOString().slice(0, 10);
    $("#value_date").attr("min", today);
    setTimeout(function () {
        // bulk_upload_list('057725', "P")
        //alert('called')
        //console.log(@json(session('excel_details')))
        //my_account()
    }, 500);

    // $("#value_date").datepicker({
    //     numberOfMonths: 3,
    //     showButtonPanel: true,
    //     minDate: dateToday,
    // });

    // let today = new Date();
    // let dd = today.getDate();

    // let mm = today.getMonth() + 1;
    // const yyyy = today.getFullYear();
    // console.log(mm);
    // console.log(String(mm).length);
    // if (String(mm).length == 1) {
    //     mm = "0" + mm;
    // }

    // defaultDate = dd + mm + "-" + today.getFullYear();
    // console.log(defaultDate);

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
        // $("#submit_cheque_request").text("Processing ... ");

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
                    siteLoading("hide");
                    //return false;
                    let data = response?.data;

                    if (response.responseCode == "000") {
                        let fileBatch = data.fileBatch;
                        // $("#submit_cheque_request").text("Submit File");

                        document.getElementById("bulk_upload_form").reset();

                        setTimeout(function () {
                            bulk_upload_list(fileBatch, response.message);
                        }, 200);
                        // siteLoading("hide");
                        // toaster(response.message, "success", 3000);
                    } else {
                        // $("#submit_cheque_request").text("Submit File");
                        let errorMessage = response.message;

                        let validationErrors =
                            data?.validationErrors?.[0] ?? "";

                        let all_errors =
                            errorMessage + `<br>` + validationErrors;

                        //bulk_upload_list(fileBatch, allErrors)

                        // toaster(all_errors, "error", 3000);
                        toaster(all_errors, "error", 3000);
                        document.getElementById("bulk_upload_form").reset();

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

    // $(".edit_record_uploaded").click(function (e) {
    //     e.preventDefault();

    // });

    $(".save_update").click(function (e) {
        e.preventDefault();

        var recordID = $(".upload_recordID").val();
        var name = $(".upload_name").val();
        var accountNumber = $(".upload_accountNumber").val();
        var amount = $(".upload_amount").val();
        var description = $(".upload_description").val();
        var bank = $(".upload_bank").val();
        var reference = $(".upload_referenceNumber").val();
        var batch = $(".upload_batch").val();

        $.ajax({
            type: "POST",
            url: "update-upload",
            dataType: "application/json",
            data: {
                recordID: recordID,
                name: name,
                accountNumber: accountNumber,
                amount: amount,
                batch: batch,
                description: description,
                bank: bank,
                reference: reference,
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log("update-upload =>", response);
                if (response.responseCode == "000") {
                    $(".edit_record_uploaded").hide();
                    toaster(response.message, "success", 3000);
                    setTimeout(function () {
                        bulk_upload_list(batch);
                    }, 3000);
                } else {
                    toaster(response.message, "error", 3000);
                }
            },
        });
    });
});
