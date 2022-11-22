$(document).ready(function () {
    // alert("bollore");
    const bolloreInfo = new Object();
    // $("#confirm_next_button").click(function () {
    //     alert("clicked");
    // });

    $("#account_of_transfer").change(function () {
        var details = $(this).val();
        var getValues = details.split("~");
        $("#select_currency").val(getValues[3]);
        // console.log(getValues);
    });

    $("#confirm_next_button").click(function (e) {
        e.preventDefault();

        bolloreInfo.accountDetails = $("#account_of_transfer").val();
        bolloreInfo.beneficiaryName = $("#beneficiary_name").val();
        bolloreInfo.beneficiaryAddress = $("#beneficiary_address").val();
        bolloreInfo.receiverName = $("#reciever_name").val();
        bolloreInfo.transferAmount = $("#amount").val();
        bolloreInfo.idType = $("#id_type").val();
        bolloreInfo.idNumber = $("#id_number").val();
        bolloreInfo.transferPurpose = $("#transfer_purpose").val();
        bolloreInfo.receiverTelephone = $("#telephone_number").val();

        if (
            !bolloreInfo.accountDetails ||
            !bolloreInfo.beneficiaryName ||
            !bolloreInfo.beneficiaryAddress ||
            !bolloreInfo.receiverName ||
            !bolloreInfo.transferAmount ||
            !bolloreInfo.idType ||
            !bolloreInfo.idNumber ||
            !bolloreInfo.transferPurpose ||
            !bolloreInfo.receiverTelephone
        ) {
            console.log(bolloreInfo);
            toaster("All Fields are required", "warning");
            return;
        }
    });
});
