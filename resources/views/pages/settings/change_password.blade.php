<div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document" style="wid">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white font-18 font-weight-bold">
                    Change Password
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body p-4">

                <div id="pin_reset_area">
                    <!-- title-->
                    <!-- form -->
                    <form id="change_password_form"action="#" autocomplete="off" aria-autocomplete="off">
                        @csrf
                        <div class="form-group mb-4">
                            <label class=" text-dark"> Security Question</label>
                            {{--  <select name="" id="security_question" class="form-control">
                                <option disabled value="">---- select a service type ----</option>
                            </select>  --}}
                            <input type="text" id="security_question" name="security_question" class="form-control"
                                autocomplete="off" aria-autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Security Answer</label>
                            <input type="text" placeholder="Enter Security Question" id="security_answer"
                                name="security_answer" class="form-control" autocomplete="off" aria-autocomplete="off"
                                required>
                            <br>
                            <label for="">Old Password</label>
                            <input type="text" placeholder="Enter Old Password" id="old_password" name="old_password"
                                class="form-control" autocomplete="off" aria-autocomplete="off" required>
                            <br>
                            <label for="">New Password</label>
                            <input type="text" placeholder="Enter New Password" id="new_password" name="new_password"
                                autocomplete="off" class="form-control" required />
                        </div>

                        <div class="modal-footer">

                            <button class="btn form-button " type="submit" id="new_password_form">Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    const formData = new Object()
    let userId = @json(session()->get('userId'));

    function getSecurityQuestions() {
        return $.ajax({
                type: 'get',
                url: `post-security-question-api/${userId}`,
                datatype: "application/json",
            })
            .done(({
                data
            }) => {
                if (!data) {
                    toaster("Couldn't get security questions", "warning");
                }
                console.log("question=>", data[0]);
                $("#security_question").val(data[0].code)
                $("#security_question").text(data[0].description)
                {{--  const input = document.getElementById("security_question");
                input.value = data[0].question.code;
                input.innerHTML = data[0].question.description;  --}}
                /* data.forEach((question) => {


                     document.getElementById("security_question")
                     input.value = question.code;
                     input.value = "question.code";
                     input.innerHTML = "hello";
                 }) */
            })
    }

    $(function() {
        siteLoading("show");
        getSecurityQuestions().always(siteLoading("hide"));



        $("#new_password_form").click(function(e) {
            e.preventDefault();

            formData.securityQuestionCode = $("#security_question").val()
            formData.securityQuestionText = $("#security_question").html()
            formData.securityAnswer = $("#security_answer").val()
            formData.oldPassword = $("#old_password").val()
            formData.newPassword = $("#new_password").val()
            console.log(formData)

            if (!formData.securityAnswer || !formData.oldPassword || !formData.newPassword) {
                toaster("Please complete all fields", "warning")
                return;
            }


            $.ajax({
                type: 'POST',
                url: 'change-password-api',
                datatype: "application/json",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(response) {
                    console.log(response)
                    if (response.responseCode == "000") {
                        toaster(response.message, "success");
                    } else {
                        toaster(response.message, "error");
                    }
                }
            })
        })

    })
</script>
