<div class=" d-none d-xl-block mt-2  col-xl-3">

    <div class=" site-card p-1">
        <h6 class="pl-3 pt-2">Quick Links</h6>
        <div class="d-flex w-100">
            <a href='/payments'
                class="site-card-body px-2 d-flex align-items-center justify-content-center grad-blue-pink  w-100 border-0  grad "
                style="min-height: 75px">

                <span class=""><i class="fas font-28 fa-money-check-alt"></i> </span>
                <span class="font-weight-bold font-14">&nbsp; MAKE PAYMENT</span>
            </a>
            <a href="/qr-payment"
                class="site-card-body d-flex align-items-center justify-content-center  border-0  grad-gray-blue grad "
                style="min-height: 75px">
                <span class=""><i class="fas font-28 fa-qrcode"></i> </span>
                <span class=" font-weight-bold ml-2 font-14">QR</span>
            </a>

        </div>
        <div class="d-flex">
            <a href="/own-account"
                class="site-card-body px-2 d-flex align-items-center justify-content-center grad-blue-pink  w-100 border-0  grad-gray-blue red-orange grad "
                style="min-height: 25px">
                <span class=""><i class="fas font-18 fa-sync"></i> </span>

                <span class=" font-weight-bold ml-2 font-12">MAKE TRANSFER</span>
            </a>
            <a href="/card-services"
                class="site-card-body px-2 d-flex align-items-center justify-content-center grad-blue-pink  w-100 border-0  grad-gray-blue grad "
                style="min-height: 25px">
                <span class=""><i class="fas font-18 fa-credit-card"></i> </span>
                <span class=" font-weight-bold ml-2 font-12">Card Services</span>
            </a>
        </div>
    </div>
    <div class="dashboard site-card p-1 mb-0">
        <div class="site-card-body p-0 border-0">
            <img class="img-fluid rounded" src="{{ asset('assets/images/placeholders/banking.png') }}" />

        </div>
    </div>
    <div class="carousel slide bg-transparent p-1 my-2" data-ride="carousel">
        <div id="rate_carousel" class="carousel-inner">

        </div>
    </div>

    <div class=" site-card p-1">
        <div class="site-card-body py-2 bg-primary" style="min-height: 10px !important;">
            <h6 class="text-center mb-0 text-white">Account Agent</h6>
        </div>
        <div class="site-card-body">
            <div class="mb-2 font-13"> <i class="mr-1 fas fa-user text-primary"></i><span class="font-weight-bold">Name
                    :
                </span><span>Akakpo Gilbert Laud</span> </div>
            <div class="mb-2 font-13"> <i class="mr-1 fas fa-phone text-primary"></i><span
                    class="font-weight-bold">Phone
                    :</span> <span>23350997763</span> </div>
            <div class="mb-2 font-13"> <i class="mr-1 fas fa-envelope text-primary"></i><span
                    class="font-weight-bold">Email
                    :</span> <span>Laud@rokel.com</span> </div>

        </div>
    </div>
</div>

<div data-currency='${currency.isoCode}'
    class="d-flex w-100 carousel-item  currency-button justify-content-between bg-white  align-items-center p-3 mt-2 rounded-lg ">
    <div class="d-flex align-items-center"> <img class="rounded-circle" style="width: 30px; height: 30px;"
            src="assets/images/flags/${currency.isoCode}.png" alt="logo">
        <span class="font-weight-bold pl-2 text-primary">${currency?.description}</span>
    </div>
    <div class="">
        <div class="font-weight-bold text-right text-primary">
            1 ${currency.isoCode} = SLL ${formatToCurrency(currencyConvertor(pageData.fxRate, 1.00, currency.isoCode,
            'SLL')?.convertedAmount)}
        </div>
        <div class="text-secondary text-right font-10">updated on => ${new
            Date(pageData?.fxRate?.find(r=>r.PAIR===(currency.isoCode + '/' + "
            SLL"))?.POSTING_DATE).toISOString().slice(0,10)}
        </div>
    </div>
</div>
<script>
    $(async()=>{
        
        
   await getCurrencies();
   await getFx();
   console.log(pageData)
     document.getElementById('rate_carousel').innerHTML = '';
         pageData.currencies.forEach(function (currency , i) {
        if (currency.isoCode === "SLL") return
        document.getElementById('rate_carousel').innerHTML += `
        <div class="carousel-item active">
            <button data-currency='${currency.isoCode}' class="d-flex w-100 currency-button justify-content-between bg-white  align-items-center p-3 mt-2 rounded-lg ">
          <div class="d-flex align-items-center">  <img  class="rounded-circle" style="width: 30px; height: 30px;"
          src="assets/images/flags/${currency.isoCode}.png" alt="logo">
         <span class="font-weight-bold pl-2 text-primary">${currency?.description}</span>
          </div>
          <div class=""> 
           <div class="font-weight-bold text-right text-primary">
             1 ${currency.isoCode} = SLL ${formatToCurrency(currencyConvertor(pageData.fxRate, 1.00, currency.isoCode, 'SLL')?.convertedAmount)}
              </div>
               <div class="text-secondary text-right font-10">updated on => ${new Date(pageData?.fxRate?.find(r=>r.PAIR===(currency.isoCode + '/' + " SLL"))?.POSTING_DATE).toISOString().slice(0,10)} </div>
             </div>
            </button>
            </div>
            `;
            // <div data-currency='${currency.isoCode}' class="d-flex w-100 carousel-item  currency-button justify-content-between bg-white  align-items-center p-3 mt-2 rounded-lg ">
            //     ${currency.isoCode}
            //      </div>
    }); 
})
   
</script>