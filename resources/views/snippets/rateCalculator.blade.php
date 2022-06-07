<!-- Center modal content -->
<div class="modal fade show" id="rate_modal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 1054">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  pinCodeModal border-0 shadow-lg "
            style=" max-width: 30rem; border-radius: 1.2rem 1.2rem 0 0 ;">
            <div
                class="mt-4 align-items-center justify-content-between p-3 d-flex  font-16 font-weight-bold text-center ">
                <div class="text-center col-5 font-14">
                    From
                    <div class="d-flex pt-1 align-items-center">
                        <img class=" rounded-circle" style="width: 35px; height: 35px;" id="curr_img1"
                            src="{{ asset('assets/images/flags/SLL.png') }}" alt="logo">
                        <div class="mx-2" style="width: 120px;">
                            <select id="currency1" data-abbr-target="abbr1" data-img-target="curr_img1"
                                class="select2-no-search rate-select currency_select" required>
                            </select>
                        </div>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
                <div class="align-self-end mb-2 col-2">
                    <i class="fas bg-primary font-14 rounded-circle p-1 text-white fa-sync"></i>
                </div>
                <div class="text-center col-5  font-14">
                    To
                    <div class="d-flex pt-1 align-items-center">
                        <i class="fas fa-caret-down"></i>
                        <div class="px-2" style="width: 120px;">
                            <select id="currency2" data-abbr-target="abbr2" data-img-target="curr_img2"
                                class="select2-no-search no-select-border  rate-select currency_select" required>
                            </select>
                        </div>
                        <img id="curr_img2" class=" rounded-circle" style="width: 35px; height: 35px;"
                            src="{{ asset('assets/images/flags/SLL.png') }}" alt="logo">

                    </div>
                </div>

            </div>
            <div class="bg-primary p-2 " style="
            background: linear-gradient(90deg, var(--primary) 0%, var(--teal) 87%); ">
                <div class="justify-content-around d-flex">
                    <div class="col-5 font-weight-bold">
                        <div class="text-center" id="abbr1"> cur1 </div>
                        <input type="text" class="form-control" value="1" id="amount_to_convert"
                            placeholder="Enter Amount to Convert">
                        <div>
                            <span class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                title="The rate is the amount of currency you receive for 1 unit of currency1."></span>
                            <span id="conversion1"> 0.00</span>
                        </div>
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
                        <input type="text" class="form-control" id="converted_amount" placeholder="Rate" readonly>
                        <div>
                            <span class="fas fa-info-circle" data-toggle="tooltip" data-placement="top"
                                title="The rate is the amount of currency you receive for 1 unit of currency1."></span>
                            <span id="conversion2"> 0.00</span>
                        </div>

                    </div>
                    <div id="all_currencies">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script defer>
    $('#rate_modal').on('show.bs.modal', function (event) {

    document.getElementById('all_currencies').innerHTML = '';
    pageData.currencies.forEach(function (currency) {
        document.getElementById('all_currencies').innerHTML += `
        <button class="d-flex">
            <img  class="rounded-circle" style="width: 35px; height: 35px;"
                            src="assets/images/flags/${currency.isoCode}.png" alt="logo">
            
            </button>
        `;
    });  
  // do something...
  console.log(pageData)
$('.rate-select').on('change', (e)=>{
    const currency = e.target.value
    const selected = e.target.id
    if(currency !== 'SLL'){
       const other = ['currency1', 'currency2'].find(e=>e !== selected)
         $('#'+other).val('SLL').trigger('change')
    }
    const currency_abbr = e.target.dataset.abbrTarget
    const currency_abbr_target = document.getElementById(currency_abbr)
    currency_abbr_target.innerHTML = pageData?.currencies?.find(e => e.isoCode === currency).description
    const currency_img = e.target.dataset.imgTarget
    const currency_img_target = document.getElementById(currency_img)
    currency_img_target.src = `assets/images/flags/${currency}.png`
    
    const conversion1 = document.getElementById('conversion1')
    const conversion2 = document.getElementById('conversion2')
    const currency1 = document.getElementById('currency1').value
    const currency2 = document.getElementById('currency2').value
    console.log({currency1, currency2, conversion1, conversion2})
    conversion1.innerHTML = `1 ${currency1} = ${currency2} ${currencyConvertor(pageData.fxRate, 1.00, currency1, currency2)?.convertedAmount}`
    conversion2.innerHTML = `1 ${currency2} = ${currency1} ${currencyConvertor(pageData.fxRate, 1.00, currency2, currency1)?.convertedAmount}`
    $('#amount_to_convert').trigger('keyup')

    console.log(currencyConvertor(pageData.fxRate, 1.00, currency1, currency2))
})

    document.getElementById('amount_to_convert').addEventListener('keyup', (e)=>{
        const currency1 = document.getElementById('currency1').value
        const currency2 = document.getElementById('currency2').value
        const rate1 = document.getElementById('amount_to_convert').value
        document.getElementById('converted_amount').value = currencyConvertor(pageData.fxRate, rate1, currency1, currency2)?.convertedAmount
        
    })
    $('.rate-select').trigger('change')
    const keyup = new Event('keyup')
   document.getElementById('amount_to_convert').dispatchEvent(keyup)
   document.getElementById('amount_to_convert').focus()


console.log(
    pageData
)
})
$('#rate_modal').on('hidden.bs.modal', function (event) {
    document.getElementById('amount_to_convert').removeEventListener('keyup')
    $('.rate-select').off('change')
})
</script>