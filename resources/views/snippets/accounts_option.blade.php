{{-- @foreach (session()->get('customerAccounts') as $i => $account)
<option data-account=""
    value="{{ $account->accountType . '~' . $account->accountDesc . '~' . $account->accountNumber . '~' . $account->currency . '~' . $account->availableBalance ."
    ~" .$account->currencyCode . '~' . $account->accountMandate }}">
    {{ $account->accountDesc . ' || ' . $account->accountNumber . ' || ' . $account->currency . ' ' .
    $account->availableBalance }}
</option>
@endforeach --}}
{{-- <script>
    function getAccountOption(account) {
        let {
            accountDesc,
            accountMandate,
            currencyCode,
            accountNumber,
            accountType,
            availableBalance,
            currency
        } = account;
        let option = ` <option data-content="<div class='account-card row'>
    <div class='col-2 text-center'><div class='account-icon mx-auto'><span>${accountDesc[0]}</span></div></div>
    <div class='col-10 align-self-center'>
        <div class='font-16 font-weight-bold' style='line-height:1.2;'>${accountDesc }</div>
        <div class='d-flex'><div class='mr-auto font-14'>${accountNumber}</div>
        <div class='font-14'><span class='mr-1'>${currency}</span> <span>${availableBalance}</span></div>
    </div></div>
</div>" data-account-type="${accountType}" data-account-number="${accountNumber}"
    data-account-currency="${currency}" data-account-balance="${availableBalance}"
    data-account-mandate="${accountMandate}" data-account-description="${accountDesc}"
    data-account-currency-code="${currencyCode}"
    value="${accountType}~${accountDesc}~${accountNumber}~${currency}~${availableBalance}~${currencyCode}~${accountMandate}">
    ${accountDesc} || ${accountNumber} || ${currency} ${availableBalance}
</option>`
        return option
    }
</script> --}}