@include("snippets.pageHeader")
<div class="row">
    <div class="col-12 py-3 px-2 px-sm-4 px-lg-5">
        @include("snippets.pinCodeModal")
        <div class="form_process row">
            <section class="col-lg-7 mb-3 px-3">

                @include('snippets.transfer.bank_transfer_form')
                @include('snippets.transactionSummary')
            </section>
            <section class="col-md-5 mb-3 z-1 px-3 d-none d-lg-block" id="transfer_details_view">
                @include('snippets.transfer.transfers_detail_view')
            </section>
        </div>
        <div class="col-md-10">
            <hr>
        </div>
    </div>
</div>
@include('snippets.accounts_option')
<script>
    const pageData = new Object();
     pageData.transferType = @json($currentPath) ;
     pageData.userAccounts = @json(session()->get('customerAccounts')) ;
    var  {transferType, userAccounts } = pageData
</script>
<script src="{{ asset('assets/js/pages/transfer/transfersMaster.js') }}" defer></script>
{{-- <script src="{{ asset('assets/js/functions/validateEmail.js') }}" defer></script> --}}
{{-- <script src="{{ asset('assets/js/functions/currencyConverter.js') }}" defer></script> --}}
<script src="assets/js/pages/transfer/beneficiary/beneficiaryForm.js"></script>