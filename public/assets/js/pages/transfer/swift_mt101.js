// alert("connect");

$(document).ready(function () {
    // let account = $("#my_account").val();

    $("#my_account").change(function () {
        // console.log($(this).val());
        let account = $(this).val();
        let accountDetails = account.split("~");
        console.log(accountDetails);
        $("#account_name").val(accountDetails[1]);
        $("#account_balance").val(accountDetails[4]);
        $("#account_currency").val(accountDetails[3]);
    });
});
