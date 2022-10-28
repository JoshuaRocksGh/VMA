<!-- Modal -->
<div class="modal fade" id="change_transaction_pin_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white font-18 font-weight-bold">Change Transaction Pin</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body pb-4">
                <div class="text-center"> <img style="height: 150px"
                        src="{{ asset('assets/images/placeholders/transaction_pin.svg') }}" />

                    <div class="pin-change">
                        <div class="text-center mb-4">Your new PIN must be different from your current pin</div>
                        <div class="text-left font-weight-bold mx-auto mt-2" style="max-width: 250px">
                            Enter Old Pin
                            <input type="text" id="old_pin" class="pincode-input">

                        </div>
                        <div class="text-left font-weight-bold mx-auto mt-2" style="max-width: 250px">
                            Enter New Pin
                            <input type="text" id="new_pin" class="pincode-input">

                        </div>
                        <div class="text-left font-weight-bold mx-auto mt-2" style="max-width: 250px">
                            Confirm New Pin
                            <input type="text" id="confirm_new_pin" class="pincode-input">
                        </div>
                    </div>
                    <div class="otp-display" style="display: none">
                        <div class="text-center mb-4">Enter the OTP sent to your mobile number</div>
                        <div class="text-left font-weight-bold mx-auto mt-2" style="max-width: 250px">
                            Enter OTP
                            <input type="text" id="otp" class="pincode-input">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id='proceed_button' class="btn pin-change btn-dark">Proceed</button>
                <button style="display: none" type="button" id='confirm_change'
                    class="btn otp-display btn-primary">Change Pin</button>
            </div>
        </div>
    </div>
</div>

<script>
    const changePin = ({
        oldPin,
        newPin,
        confirmPin
    }) => {
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
    $("#change_transaction_pin_modal").on('hidden.bs.modal', () => {
        $(".pincode-input").pincodeInput().data('plugin_pincodeInput').clear();
        $(".pin-change").show()
        $(".otp-display").hide()

    })
    $("#change_transaction_pin_modal").on('show.bs.modal', () => {
        $('proceed_button').attr('data-current', 'pin');
        $(".pincode-input").pincodeInput({
            inputs: 4
        });

        $("#proceed_button").on("click", () => {

            const oldPin = $("#old_pin").val();
            const newPin = $("#new_pin").val();
            const confirmPin = $("#confirm_new_pin").val();

            console.log({
                oldPin,
                newPin,
                confirmPin
            });
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
            $(".pin-change").hide()
            $(".otp-display").show()
        });

        // siteLoading("show");
        // changePin({
        //     oldPin,
        //     newPin,
        //     confirmPin,
        // }).then(() => {
        //     siteLoading("hide");
        // });

    })
</script>
