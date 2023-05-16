// function get_user_details(my_username) {

//     $.ajax({
//         type: "GET",
//         url: "get-user-details-api?username=" + my_username,
//         datatype: "application/json",
//         success: function (response) {

//             if (response.stats == "ok") {
//                 console.log(response.data);
//             }
//         },
//         error: function (xhr, status, error) {
//             setTimeout(function () {
//                 get_user_details(my_username);
//             }, $.ajaxSetup().retryAfter);
//         },
//     });
// }

// $(document).ready(function () {
//     setTimeout(function () {
//         get_user_details(my_username);
//     }, 500);
// });
