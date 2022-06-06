<!-- Center modal content -->
<div class="modal fade show" id="rate_modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1054">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  pinCodeModal border-0 shadow-lg "
            style=" max-width: 25rem; border-radius: 1.2rem 1.2rem 0 0 ;">
            <div class="mt-4 align-items-end justify-content-between p-3 d-flex  font-16 font-weight-bold text-center ">
                <div class="text-center col-5 font-14">
                    From
                    <div class="d-flex pt-1 align-items-center">
                        <img style="width: 30px;" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;

                        <select id="currency1" data-abbr-target="abbr1"
                            class="select2-no-search mr-2 rate-select currency_select" style="width: 100px;" required>
                        </select>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
                <div class="d-flex col-2 align-items-center">

                    <i class="fas bg-warning font-14 rounded-circle p-1 text-white fa-sync"></i>
                </div>
                <div class="text-center col-5  font-14">
                    To
                    <div class="d-flex pt-1 align-items-center">
                        <i class="fas fa-caret-down"></i>
                        <select id="currency2" data-abbr-target="abbr2"
                            class="select2-no-search no-select-border ml-2 rate-select currency_select"
                            style="width: 100px;" required>
                        </select>
                        <img style="width: 30px;" src="{{ asset('assets/images/logoRKB.png') }}" alt="logo">&emsp;

                    </div>
                </div>

            </div>
            <div class="bg-primary p-2 " style="
            background: linear-gradient(90deg, var(--primary) 0%, var(--teal) 87%); ">
                <div class="justify-content-around d-flex">
                    <div class="col-5 font-weight-bold">
                        <div class="text-center" id="abbr1"> cur1 </div>
                        <input type="text" class="form-control" id="rate1" placeholder="Rate">
                    </div>
                    <div class="col-2 mx-auto">
                        <div class="mx-auto text-center">
                            <span class="fas fa-chart-line"> </span>
                        </div>
                        <div class="mx-auto my-2" style="height:50px; 
                    
                    background-color: #000; width:1px"> </div>
                    </div>
                    <div class="col-5 font-weight-bold">
                        <div class="text-center" id="abbr2"> cur2 </div>
                        <input type="text" class="form-control" id="rate2" placeholder="Rate">
                        <div>
                            <span class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                title="The rate is the amount of currency you receive for 1 unit of currency1."></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer>
    $('#rate_modal').on('show.bs.modal', function (event) {

        const currencyMap = {
            'USD': 'United Stated Dollar',
            'EUR': 'Euro',
            'GBP': 'British Pound',
            'AUD': 'Australian Dollar',
            'CAD': 'Canadian Dollar',
            'CHF': 'Swiss Franc',
            "SLL": "Sierra Leone Leone",
            "XAF": "CFA Franc BEAC",
            "GHC": "Ghana Cedis",
            "GHS": "Ghana Cedis",
            "GMD": "Gambia Dalasi",
            "GNF": "Guinea Franc",
            "KES": "Kenya Shilling",
            "SLO": "Sierra Leone Leone - Old",
        }
  // do something...
  console.log(pageData)
$('.rate-select').on('change', (e)=>{
    const currency = e.target.value
    const currency_abbr = e.target.dataset.abbrTarget
    const currency_abbr_target = document.getElementById(currency_abbr)
    currency_abbr_target.innerHTML = currencyMap[currency]

    console.log(currency)
})
$('.rate-select').trigger('change')
})
</script>