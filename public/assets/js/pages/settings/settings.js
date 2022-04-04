const changePin = ({ oldPin, newPin, confirmPin }) => {
    return $.ajax({
        type: "POST",
        url: "change-pin-api",
        datatype: "application/json",
        data: {
            oldPin,
            newPin,
            confirmPin,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }).done((response) => {
        console.log(response);
        if (response.responseCode == "000") {
            toaster(response.message, "success");
        } else {
            toaster(response.message, "error");
        }
    });
};

document.addEventListener("DOMContentLoaded", function (event) {
    console.log("dong");

    const settingsList = [
        {
            title: "change transaction pin",
            icon: "unlock-alt",
            bgClass: "grad-gray-blue",
            dataTarget: "#change_transaction_pin_modal",
        },
        {
            title: "change password",
            icon: "user-lock",
            bgClass: "grad-blue-pink",
        },
        {
            title: "forgot transaction pin",
            icon: "window-close",
            bgClass: "green-yellow",
        },
        {
            title: "Enquiry",
            icon: "comments",
            bgClass: "pink-cyan",
        },
        {
            title: "Tarrif List",
            icon: "chart-bar",
            bgClass: "cyan-green",
        },
        {
            title: "Agent List",
            icon: "users",
            bgClass: "yellow-yellow",
        },
        {
            title: "Help (FAQs)",
            icon: "question-circle",
            bgClass: "blue-blue",
        },
        {
            title: "Terms and Conditions",
            icon: "file-contract",
            bgClass: "red-orange",
        },
        {
            title: "Contact Us",
            icon: "address-card",
            bgClass: "black-black",
        },
    ];

    let settingsHtml = "";
    settingsList.forEach((e) => {
        const { title, bgClass, icon, dataTarget } = e;
        settingsHtml += `   <button data-toggle="modal" data-target="${dataTarget}" class="card d-sm-block mx-auto d-flex  p-1  w-100 ${bgClass} pt-2 px-2 pt-sm-4 grad " style="max-width: 300px;">
       <div class=" d-flex  card-img  w-100 justify-content-sm-center" >
        <i class="fas  fa-${icon}"></i>
        </div>
        <span class="sm-4 mt-2 mt-sm-4 d-sm-block  font-weight-bold font-12">${title}</span>
<div class="text"> </div>
    </button>`;
    });
    document.getElementById("settings_display").innerHTML = settingsHtml;

    $(".pincode-input").pincodeInput({ inputs: 4 });

    $("#change_pin_button").on("click", () => {
        const oldPin = $("#old_pin").val();
        const newPin = $("#new_pin").val();
        const confirmPin = $("#confirm_new_pin").val();

        if (!oldPin || !newPin || !confirmPin) {
            toaster("Please enter all fields", "warning");
            return false;
        }
        if (newPin !== confirmPin) {
            toaster("New pin and confirm pin do not match", "warning");
            return false;
        }
        if (newPin.length !== 4) {
            toaster("Please enter a valid pin code", "warning");
            return false;
        }
        siteLoading("show");
        changePin({
            oldPin,
            newPin,
            confirmPin,
        }).then(() => {
            siteLoading("hide");
        });
    });

    console.log({ oldPin, newPin, confirmPin });
});
