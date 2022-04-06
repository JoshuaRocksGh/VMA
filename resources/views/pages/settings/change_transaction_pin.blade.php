<!-- Modal -->
<div class="modal fade" id="change_transaction_pin_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-18 font-weight-bold">Change Transaction Pin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-4">
                <div class="text-center"> <img style="height: 150px"
                        src="{{ asset('assets/images/placeholders/transaction_pin.svg') }}" />

                    <div>
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
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id='change_pin_button' class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>