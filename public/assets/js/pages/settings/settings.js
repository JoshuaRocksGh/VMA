document.addEventListener("DOMContentLoaded", function (event) {
    console.log("dong");

    const settingsList = [
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
        {
            title: "change password",
            icon: "it",
            color: "brown",
        },
    ];

    let settingsHtml = "";
    settingsList.forEach((e) => {
        const { title, color, icon } = e;
        settingsHtml += `<div class="card settings-card">
        <div class="card-img" style="background-color:${color}"><span class="fas fa-${icon}"></span></div>
       
        <div class="card-body">

            <span class="">${title}</span>
        </div>
    </div>`;
    });
    console.log(settingsHtml);
    document.getElementById("settings_display").innerHTML = settingsHtml;
});
