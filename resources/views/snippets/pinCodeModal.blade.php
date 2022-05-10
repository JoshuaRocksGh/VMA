<!-- Center modal content -->
<div class="modal fade show" id="pin_code_modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1054">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  pinCodeModal border-0 shadow-lg "
            style=" max-width: 25rem; border-radius: 1.2rem 1.2rem 0 0 ;  ">
            <div class="mt-4 p-3  font-16 font-weight-bold text-center ">
                ENTER TRANSACTION PIN </div>
            <form action="#" class=" transfer_pin_modal" autocomplete="off" aria-autocomplete="off">
                <div class="form-group p-2 mx-auto" style="max-width: 200px"><input type="number" name="user_pin"
                        maxlength="4" autocomplete="off" aria-autocomplete="off"
                        class="form-control text-center password-font  key  border-primary" id="user_pin"
                        style="border-radius: 0.5rem; height: 50px; font-size: 70px; border: 2px solid var(--primary);"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                </div>
                <div class="pt-2"><button class="btn py-3 font-15 btn-block rounded-0 btn-primary shadow-none"
                        type="submit" id="transfer_pin" data-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>