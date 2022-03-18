<form action="#" class="select_beneficiary" id="payment_details_form" autocomplete="off" aria-autocomplete="none">
    @csrf
    <div class="container-md mx-auto" style="max-width: 550px">
        <div class="form-group ">
            <label class=" text-primary"> Card Display Name</label>
            <input class="form-control text-input" placeholder="Card Display Name" type="text" />
        </div>
        <div class="form-group  mb-3" id="pay_from_account">

            <label class=" text-primary">Number of Leaflets</label>

            <select class="form-control " id="card_type" required>
                <option disabled selected value="">Select number of leaflets</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div class="form-group ">
            <label class="text-primary"> Pick Up Branch</label>
            <select class="form-control" id="pick_up_branch" placeholder="Select Pick Up Branch" required>
                <option disabled selected value="">Select Pick Up Branch</option>
            </select>
        </div>
        <div class="form-group text-right mt-4">
            <button type="button" class="btn btn-primary waves-effect waves-light" id="btn_submit_request_statement">
                Submit
            </button>
        </div>
    </div>
</form>