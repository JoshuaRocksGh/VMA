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
            dataTarget: "#forgot_pin_modal",
        },
        {
            title: "Enquiry",
            icon: "comments",
            bgClass: "pink-cyan",
            dataTarget: "#enquiry_modal",
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
            dataTarget: "#faq_modal",
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
        settingsHtml += `   <button data-toggle="modal" data-target="${dataTarget}" class="card d-sm-block mx-auto d-flex  p-1  w-100 ${bgClass} pt-2 px-2 pt-sm-4 grad m-3" style="max-width: 300px;">
       <div class=" d-flex  card-img  w-100 justify-content-sm-center" >
        <i class="fas  fa-${icon}"></i>
        </div>
        <span class="sm-4 mt-2 mt-sm-4 d-sm-block  font-weight-bold font-12">${title}</span>
<div class="text"> </div>
    </button>`;
    });
    document.getElementById("settings_display").innerHTML = settingsHtml;
});
