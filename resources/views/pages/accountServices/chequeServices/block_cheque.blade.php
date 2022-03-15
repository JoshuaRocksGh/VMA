<form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off" aria-autocomplete="none">
    @csrf
    <div class="container mx-auto" style="max-width: 550px">
        <div class="form-group ">
            <label class=" text-primary"> Card Display Name</label>
            <input class="form-control text-input" placeholder="Card Display Name" type="text" />
        </div>
        <div class="form-group row align-items-end ">
            <div class="col-6"><label class="text-primary">From Cheque No.</label>
                <input class="form-control text-input" placeholder="Start Cheque No." type="text" />
            </div>
            <div class="col-6">
                <label class="text-primary">To Cheque No</label>
                <input class="form-control text-input" placeholder="End Cheque No." type="text" />
            </div>
        </div>
        <div class="form-group  mb-3" id="pay_from_account">

            <label class=" text-primary">Number of Leaflets</label>

            <input class="form-control text-input" type="date" />
        </div>
        <div class="form-group ">
            <label class="text-primary"> Beneficiary Name</label>
            <input class="form-control text-input" placeholder="Name Of Beneficiary" type="text" />
        </div>
        <div class="form-group text-right mt-4">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btn_submit_request_statement">
                Submit
            </button>
        </div>
    </div>
</form>