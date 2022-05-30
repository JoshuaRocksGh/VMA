$(() => {
    let qrData = new Object();

    $("#accounts").on("change", function () {
        if (!$("#accounts").val()) {
            return false;
        }
        qrData.accountNumber = $("#accounts").val().split("~")[2];
    });

    $("#receive_payment_tab").on("click", () => {
        $("#amount_view").show(500);
    });

    $("#cash_in_tab").on("click", () => {
        $("#amount_view").hide(500);
    });

    $("#generate_qr").on("click", () => {
        const { accountNumber, amount } = qrData;
        if (!accountNumber) {
            toaster("select account number", "warning");
            return false;
        }
        if (isCashIn) {
            qrData.amount = $("#amount").val();
            if (!amount || isNaN(amount)) {
                toaster("invalid amount", "warning");
                return false;
            }
        } else {
            delete qrCode.amount;
        }
        $("#qrcode").empty();
        let qrCode = new QRCode(document.getElementById("qrcode"), {
            text: JSON.stringify(qrData),
            logo: "assets/images/rokel_logo.png",
            logoWidth: 80,
            logoHeight: 80,
            width: 200,
            height: 200,
            logoBackgroundTransparent: true,
        });
    });
});
