$(() => {
    $("#receive_payment_tab").on("click", () => {
        $("#amount_view").show(500);
    });

    $("#cash_in_tab").on("click", () => {
        $("#amount_view").hide(500);
    });

    $("#generate_qr").on("click", () => {
        const isCashIn = $("#cash_in_tab").hasClass("active");
        const accountNumber = $("#accounts option:selected").attr(
            "data-account-number"
        );
        const amount = $("#amount").val();
        if (!accountNumber) {
            toaster("select account number", "warning");
            return false;
        }
        if (!isCashIn) {
            if (!amount || isNaN(amount)) {
                toaster("invalid amount", "warning");
                return false;
            }
        }
        const qrData = { accountNumber, amount };
        if (isCashIn) delete qrData.amount;

        $("#qrcode").empty();

        blockUi({ block: "#qrcode" });
        setTimeout(() => {
            console.log(qrData);
            unblockUi("#qrcode");
        }, 500);
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
