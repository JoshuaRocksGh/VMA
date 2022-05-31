@include('snippets.pageHeader')
@include('snippets.pinCodeModal')
<div class="form_process row">
    <section class="col-lg-12 mb-3 px-2 ">

        @include('snippets.transfer.bank_transfer_form')
        @include('snippets.transactionSummary')

    </section>
    {{-- <section class="col-md-5 mb-3 z-1 px-2 d-none d-lg-block" id="transfer_details_view">
        @include('snippets.transfer.transfers_detail_view')
    </section> --}}
    <div class="mx-auto col-md-10">
        <hr>
    </div>
</div>
@include('snippets.rateCalculator')
<script>
    const pageData = new Object();
    pageData.transferType = @json($currentPath);
    pageData.userAccounts = @json(session()->get('customerAccounts'));
    var {
        transferType,
        userAccounts
    } = pageData
</script>
<script src="{{ asset('assets/js/pages/transfer/transfersMaster.js') }}" defer></script>
<script src="{{ asset('assets/js/pages/transfer/beneficiary/beneficiaryForm.js') }}"></script>