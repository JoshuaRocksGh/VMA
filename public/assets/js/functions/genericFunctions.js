function transactionSuccessToaster(message, timer = 3000) {
    Swal.fire({
        title: "Transaction Successful",
        text: message,
        imageUrl: "land_asset/images/statement_success.gif",
        imageHeight: "10rem",
        width: "20rem",
        imageAlt: "success image",
        confirmButtonColor: "#0388cb",
        timer: timer,
    });
}

function toaster(message, icon, timer = 3000) {
    let color = "#17a2b8";
    if (typeof icon === "string") {
        if (icon.toLowerCase() === "success") {
            color = "#1abc9c";
        } else if (icon.toLowerCase() === "warning") {
            color = "#fd7e14";
        } else if (icon.toLowerCase() === "error") {
            color = "#dc3545";
        }
        Swal.fire({
            html: `<span class="font-16 ">${message}</span>`,
            icon: icon,
            confirmButtonColor: color,
            width: 400,
        });
    }
}

function formatToCurrency(amount) {
    let ret = parseFloat(amount)
        .toFixed(2)
        .replace(/\d(?=(\d{3})+\.)/g, "$&,");
    if (ret === "NaN") {
        return "";
    } else return ret;
}

function somethingWentWrongHandler() {
    toaster("Something went wrong ... please hold on", "error", 3000);
    setTimeout(() => {
        location.reload();
    }, 3000);
}

function validateEmail($email) {
    let emailRegx =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return emailRegx.test($email);
}

function currencyConvertor(
    forexRate,
    amount = 0,
    fromCur = "SLL",
    toCur = "SLL"
) {
    let currencyPair1 = fromCur + "/ " + toCur;
    let currencyPair2 = toCur + "/ " + fromCur;
    let convertedAmount = 0;
    let currencyPair;
    let midrate = 0;
    let conversionData;

    $.each(forexRate, (i) => {
        if (forexRate[i].PAIR === currencyPair1) {
            midrate = forexRate[i].MIDRATE;
            convertedAmount = (
                parseFloat(amount) * parseFloat(midrate)
            ).toFixed(2);
            currencyPair = currencyPair1;
            conversionData = {
                convertedAmount,
                midrate,
                currencyPair,
            };
            return;
        } else if (forexRate[i].PAIR === currencyPair2) {
            midrate = forexRate[i].MIDRATE;
            convertedAmount = (
                parseFloat(amount) / parseFloat(midrate)
            ).toFixed(2);
            currencyPair = currencyPair2;
            conversionData = {
                convertedAmount,
                midrate,
                currencyPair,
            };
            return;
        }
    });
    return conversionData;
}

function getAccounts(account_data) {
    return $.ajax({
        type: "GET",
        url: "get-accounts-api",
        datatype: "application/json",

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            if (response.responseCode !== "000") {
                toater(response.message, "error");
                setTimeout(() => {
                    if (response.data == null) {
                        window.location = "logout";
                    }
                }, 1500);
            }
        },
        error: function (xhr, status, error) {
            setTimeout(function () {
                getAccounts(account_data);
            }, $.ajaxSetup().retryAfter);
        },
    });
}

function siteLoading(state) {
    if (state === "show") {
        $("#preloader").css("background-color", "#4fc6e17a");
        $(".preloader").fadeIn(500);
        return;
    }
    $(".preloader").fadeOut(1500);
    return;
}

function blockUi(data) {
    const defaults = {
        block: "#body",
        message: "Please Wait",
        size: "75px",
        bgColor: "#4fc6e1",
        opacity: "0.3",
    };
    data = Object.assign(defaults, data);
    const { block, message, size, bgColor, opacity } = data;
    $(block).block({
        message: `<div><img class="pulse " style="width: ${size};" src="assets/images/logoRKB.png" />
            <div class="mt-2 row tw-relative"><span class="text-semibold align-self-center mx-2 font-weight-bold">
                ${message}</span><span class="lds-hourglass tw-absolute"></span> </div>`,
        overlayCSS: {
            backgroundColor: bgColor,
            opacity: opacity,
            cursor: "wait",
            "z-index": "9999",
        },
        css: {
            width: "100%",
            height: "100%",
            "backdrop-filter": "blur(3px)",
            // padding: "10px 15px",
            "-webkit-border-radius": 2,
            "-moz-border-radius": 2,
            border: 0,
            display: "flex",
            "justify-content": "center",
            "align-items": "center",
            "z-index": "99999",
            "font-size": "1rem",
            backgroundColor: "none",
        },
    });
}
function unblockUi(block = "#body") {
    $(block).unblock();
}

function encodeString(stringToEncode) {
    return encodeURIComponent(btoa(stringToEncode));
}

function decodeString(stringToDecode) {
    return atob(decodeURIComponent(stringToDecode));
}

$("#sidebar_logout").on("click", (e) => {
    e.preventDefault();
    Swal.fire({
        title: "Logout successful!",
        html: "Redirecting ...",
        icon: "success",
        showConfirmButton: false,
    });
    setTimeout(() => {
        window.location.replace("logout");
    }, 1000);
});
