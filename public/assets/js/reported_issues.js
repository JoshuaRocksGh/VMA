// alert("reports");

$(document).ready(function () {
    // $("#reported_issue_list_spinner").hide();
    // $("#all_reported_issues").toggle("500");
    var table = $(".all_reported_issues_list").DataTable();

    var nodes = table.rows().nodes();
    table.order([0, "desc"]).column(0).visible(true, true).draw();
    let reported_issues = new Array();

    db.collection("reports")
        .orderBy("time", "asc")
        .onSnapshot((snapshots) => {
            // console.log("reported_issues=>", reported_issues);

            snapshots.docs.forEach((doc) => {
                let issue_details = doc.data();
                reported_issues.push(issue_details);
                // console.log("reported_issues=>", reported_issues);
                // console.log(issue_details);
                // return false;
            });

            if (my_mandate == "NationalLevel") {
                // var table = $(".all_reported_issues_list").DataTable();

                // var nodes = table.rows().nodes();
                // table.order([0, "desc"]).column(0).visible(true, true).draw();

                $.each(reported_issues, function (index) {
                    // console.log("reported_issues=>", reported_issues[index]);
                    // return false;
                    var date_time = reported_issues[index].time.split("T");
                    // console.log("date_time=>", date_time);
                    var date = date_time[0];
                    var time_ = date_time[1].split(".");
                    var report_time = time_[0];
                    let reported_date_time = date + " " + "" + report_time;
                    // console.log(date_time);

                    table.row
                        .add([
                            `<b class="h5">${reported_date_time}</b>`,
                            `<b class="h5">UserName</b>`,
                            `<b class="h5">${reported_issues[index].userName}</b>`,
                            `<b class="h5">${reported_issues[index].regionId}</b>`,
                            `<b class="h5">Comstituency Name</b>`,
                            `<b class="h5">${reported_issues[index].pollingId}</b>`,
                            `<a href="#" type="button" class="btn  btn-blue waves-effect reported_issue_lists_action"
                            data-user-id="${reported_issues[index].userName}" report-image="${reported_issues[index].image}" report-text=${reported_issues[index].text}>More Details</a>`,
                        ])
                        .draw(false);
                });

                let editButtons = document.querySelectorAll(
                    ".reported_issue_lists_action"
                );
                editButtons.forEach((button) => {
                    button.addEventListener("click", (e) => {
                        const editButton = e.currentTarget;
                        // console.log($(editButton).attr("report-text"));
                        // return false;
                        const reportIssue = reported_issues.find(
                            (e) =>
                                e.userName ===
                                $(editButton).attr("data-user-id")
                        );

                        // console.log(reported_issues);
                        // return false;

                        var date_time = reportIssue.time.split("T");
                        var date = date_time[0];
                        var time_ = date_time[1].split(".");
                        var report_time = time_[0];
                        var reported_date_time = date + " " + "" + report_time;

                        $(".issue_text").text(
                            $(editButton).attr("report-text")
                        );
                        $(".issue_image").attr(
                            "src",
                            $(editButton).attr("report-image")
                        );
                        $(".issue_time").text(reported_date_time);
                        $(".reported_issue_lists_action").attr({
                            "data-toggle": "modal",
                            "data-target": "#standard-modal",
                        });
                    });
                });
            } else {
                $.each(reported_issues, function (index) {
                    // console.log(reported_issues[index].regionId);
                    if (reported_issues[index].regionId == my_region) {
                        console.log(reported_issues);
                        // var table = $(".all_reported_issues_list").DataTable();

                        // var nodes = table.rows().nodes();
                        // table
                        //     .order([0, "desc"])
                        //     .column(0)
                        //     .visible(true, true)
                        //     .draw();
                        // $.each(reported_issues, function (index) {
                        // console.log(
                        //     "reported_issues=>",
                        //     reported_issues[index].text
                        // );
                        // return false;
                        var date_time = reported_issues[index].time.split("T");
                        // console.log("date_time=>", date_time);
                        var date = date_time[0];
                        var time_ = date_time[1].split(".");
                        var report_time = time_[0];
                        let reported_date_time = date + " " + "" + report_time;
                        // console.log(date_time);

                        table.row
                            .add([
                                `<b class="h5">${reported_date_time}</b>`,
                                `<b class="h5">UserName</b>`,
                                `<b class="h5">${reported_issues[index].userName}</b>`,
                                `<b class="h5">Comstituency Name</b>`,
                                `<b class="h5">${reported_issues[index].pollingId}</b>`,
                                `<a href="#" type="button" class="btn  btn-blue waves-effect reported_issue_lists_action"
                            data-user-id="${reported_issues[index].userName}" report-image="${reported_issues[index].image}" report-text=${reported_issues[index].text}>More Details</a>`,
                            ])
                            .draw(false);
                        // });

                        let editButtons = document.querySelectorAll(
                            ".reported_issue_lists_action"
                        );
                        editButtons.forEach((button) => {
                            button.addEventListener("click", (e) => {
                                const editButton = e.currentTarget;
                                // console.log($(editButton).attr("report-text"));
                                // return false;
                                const reportIssue = reported_issues.find(
                                    (e) =>
                                        e.userName ===
                                        $(editButton).attr("data-user-id")
                                );

                                // console.log(reported_issues);
                                // return false;

                                var date_time = reportIssue.time.split("T");
                                var date = date_time[0];
                                var time_ = date_time[1].split(".");
                                var report_time = time_[0];
                                var reported_date_time =
                                    date + " " + "" + report_time;

                                $(".issue_text").text(
                                    $(editButton).attr("report-text")
                                );
                                $(".issue_image").attr(
                                    "src",
                                    $(editButton).attr("report-image")
                                );
                                $(".issue_time").text(reported_date_time);
                                $(".reported_issue_lists_action").attr({
                                    "data-toggle": "modal",
                                    "data-target": "#standard-modal",
                                });
                            });
                        });
                    }
                });
                return false;
            }
        });
});
