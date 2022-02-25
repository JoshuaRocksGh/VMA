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
    // console.log(fileBatch);
    // console.log(allErrors);

    //var error_table = $('.failed_bulk_upload_table').DataTable();
    //var _error_nodes = error_table.rows().nodes();

    // var all_invalid_uplaods = $(".all_failed_uploads_table").DataTable({
    //     paging: true,
    // });
    // var nodes = all_valid_uplaods.rows().nodes();

    $.ajax({
        tpye: "GET",
        url: "get-bulk-upload-list-api?fileBatch=" + fileBatch,
        datatype: "application/json",
        success: function (response) {
            console.log(response);
            // return false;
            //console.log("bulk upload list:", response.data);

            // console.log("uploadData => ", uploadData);
            // return false;

            let all_failed_uploads = 0;
            // let upload_with_errors = uploadData.;

            if (response.responseCode == "000") {
                // NO ERRORS IN FILE UPLOAD
                let uploadData = response.data.uploadData;
                let uploadDetails = response.data.uploadDetails;
                let uploadDetails_date = uploadDetails.valueDate;
                var uploadDetails_date_split = uploadDetails_date.split("T");
                let value_date = uploadDetails_date_split[0];
                let total_upload = uploadData.length;

                let valid_uploads = 0;
                let valid_uploads_count = 1;
                let invalid_uploads = 0;
                let invalid_uploads_count = 1;

                var all_valid_uploads = $(
                    ".all_successful_uploads_table"
                ).DataTable();
                var nodes = all_valid_uploads.rows().nodes();

                // all_valid_uploads.destroy();

                $(".successful_uploads tr").remove();
                $(".failed_uploads tr").remove();

                $.each(uploadData, function (index) {
                    // console.log(uploadData[index]);
                    console.log(uploadData[index].valid);

                    // return false;
                    if (uploadData[index].valid == "Y") {
                        valid_uploads++; //increment

                        // $(".successful_uploads").append(
                        //     `<tr>
                        //         <td><b>${valid_uploads_count}</b></td>
                        //         <td><b>${uploadData[index].name}</b></td>
                        //         <td><b>${uploadData[index].accountNumber}</b></td>
                        //         <td><b>${uploadData[index].amount}</b></td>
                        //         <td><b>${uploadData[index].refNumber}</b></td>
                        //         <td><b class="text-success">${uploadData[index].acctValid}</b></td>
                        //     </tr>
                        //     `
                        // );

                        // uploadData[index].name == null ||
                        // uploadData[index].name == undefined
                        //     ? uploadData[index].name
                        //     : "N/A";

                        // console.log(uploadData[index].name);

                        // uploadData[index].accountNumber == null ||
                        // uploadData[index].accountNumber == undefined
                        //     ? uploadData[index].accountNumber
                        //     : "N/A";
                        // console.log(uploadData[index].accountNumber);

                        // uploadData[index].amount == null ||
                        // uploadData[index].amount == undefined
                        //     ? uploadData[index].amount
                        //     : "N/A";
                        // console.log(uploadData[index].amount);

                        // uploadData[index].refNumber == null ||
                        // uploadData[index].refNumber == undefined
                        //     ? uploadData[index].refNumber
                        //     : "N/A";
                        // console.log(uploadData[index].refNumber);

                        // uploadData[index].acctValid == null ||
                        // uploadData[index].acctValid == undefined
                        //     ? uploadData[index].acctValid
                        //     : "N/A";
                        // console.log(uploadData[index].acctValid);

                        if (
                            uploadData[index].name == null ||
                            uploadData[index].name == undefined
                        ) {
                            var uploadName = "N/A";
                        } else {
                            var uploadName = uploadData[index].name;
                        }

                        if (
                            uploadData[index].accountNumber == null ||
                            uploadData[index].accountNumber == undefined
                        ) {
                            var uploadAccountNumber = "N/A";
                        } else {
                            var uploadAccountNumber =
                                uploadData[index].accountNumber;
                        }

                        if (
                            uploadData[index].amount == null ||
                            uploadData[index].amount == undefined
                        ) {
                            var uploadAmount = "N/A";
                        } else {
                            var uploadAmount = uploadData[index].amount;
                        }

                        if (
                            uploadData[index].refNumber == null ||
                            uploadData[index].refNumber == undefined
                        ) {
                            var uploadRefNumber = "N/A";
                        } else {
                            var uploadRefNumber = uploadData[index].refNumber;
                        }

                        if (
                            uploadData[index].acctValid == null ||
                            uploadData[index].acctValid == undefined
                        ) {
                            var uploadAcctValid = "N/A";
                        } else {
                            var uploadAcctValid = uploadData[index].acctValid;
                        }
                        all_valid_uploads.row
                            .add([
                                `<b>${valid_uploads_count}</b>`,
                                `<b>${uploadName}</b>`,
                                `<b>${uploadAccountNumber}</b>`,
                                `<b>${uploadAmount}</b>`,
                                `<b>${uploadRefNumber}</b>`,
                                `<b class="text-success">${uploadAcctValid}</b>`,
                            ])
                            .draw(false);

                        valid_uploads_count++;
                    } else if (uploadData[index].valid != "Y") {
                        invalid_uploads++;

                        $(".failed_uploads").append(
                            `<tr>
                                <td><b>${invalid_uploads_count}</b></td>
                                <td><b>${uploadData[index].name}</b></td>
                                <td><b>${uploadData[index].accountNumber}</b></td>
                                <td><b>${uploadData[index].amount}</b></td>
                                <td><b>${uploadData[index].refNumber}</b></td>
                                <td><b class="text-danger">${uploadData[index].acctValid}</b></td>
                            </tr>
                            `
                        );
                        invalid_uploads_count++;
                    } else {
                        return false;
                    }
                });

                console.log("valid_uploads_count=>", valid_uploads_count);
                console.log("invalid_uploads_count=>", invalid_uploads_count);
                // var table = $(".bulk_upload_list").DataTable();

                // var nodes = table.rows().nodes();
                // table.row
                //     .add([

                //     ])
                //     .draw(false);

                $(".all_bulk_upload_summary").append(
                    `
                            <tr>
                                <td><b>${uploadDetails.referenceNumber}</b></td>
                                <td><b>${uploadDetails.debitAccount}</b></td>
                                <td><b>${formatToCurrency(
                                    parseFloat(uploadDetails.totalAmount)
                                )}</b></td>
                                <td><b>${value_date}</b></td>
                                <td><button type="button" class="btn btn-sm btn-soft-success waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#full-width-modal" data="">&emsp;<b>${total_upload}</b>&emsp;</button></td>
                                <td><button type="button" class="btn btn-sm btn-soft-danger waves-effect waves-light error_modal_data" data-toggle="modal" data-target="#full-width-modal" data="">&emsp;<b>${invalid_uploads}</b>&emsp;</button></td>
                                <td><b>Upload</b></td>
                            </tr>
                        `
                );

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
