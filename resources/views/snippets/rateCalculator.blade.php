<!-- Center modal content -->
<div class="modal fade show" id="rate_modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1054">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  pinCodeModal border-0 shadow-lg "
            style=" max-width: 25rem; border-radius: 1.2rem 1.2rem 0 0 ;  ">
            <div class="mt-4 align-items-end justify-content-between p-3 d-flex  font-16 font-weight-bold text-center ">
                <div class="text-center font-14">
                    To
                    <div class="d-flex align-items-center">
                        <img style="width: 30px;" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;

                        <select class="select2-no-search mr-2 rate-select currency_select" style="width: 100px;"
                            required>
                        </select>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">

                    <i class="fas bg-warning font-14 rounded-circle p-1 text-white fa-sync"></i>
                </div>
                <div class="text-center font-14">
                    From
                    <div class="d-flex align-items-center">
                        <i class="fas fa-caret-down"></i>
                        <select class="select2-no-search no-select-border ml-2 rate-select currency_select"
                            style="width: 100px;" required>
                        </select>
                        <img style="width: 30px;" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;

                    </div>
                </div>

            </div>
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