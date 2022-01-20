@if (config('app.corporate'))
<script>
    const ISCORPORATE = true;
</script>
@else
<script>
    const ISCORPORATE = false;
</script>
@endif

<!-- Third Party js-->
<script src="{{ asset('assets/js/vendor.min.js') }}" defer></script>
<script src="{{ asset('assets\plugins\sweet-alert\sweetalert2@11.js') }}" defer></script>
<script src="{{ asset('assets/js/app.min.js') }}" defer></script>
{{-- <script src="{{ asset('assets/js/functions/getAccounts.js') }}" defer></script> --}}
<script src="{{  asset('assets/plugins/blockui/jquery.blockUI.min.js') }}" defer></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>
--}}
<script src="assets\plugins\bootstrap-select\bootstrap-select.min.js" defer> </script>
<script defer src="{{ asset('assets/js/functions/genericFunctions.js') }}">

</script>

<script defer>
    const ACCOUNT_NUMBER_LENGTH = 13
    $("input[type=number]").on("focus", function() {
        $(this).on("keydown", function(event) {
            if (event.keyCode === 38 || event.keyCode === 40) {
                event.preventDefault();
            }
        });
    });

    function transactionSuccessToaster(message, timer = 3000) {
        Swal.fire({
            title: "Transaction Successful",
            text: message,
            imageUrl: 'land_asset/images/statement_success.gif',
            imageHeight: "10rem",
            width: "20rem",
            imageAlt: 'success image',
            confirmButtonColor: "#0388cb",
            timer: timer
        })
    }

    function toaster(message, icon, timer = 3000) {
        let color = "#17a2b8"
        if (typeof(icon) === 'string') {
            if (icon.toLowerCase() === "success") {
                color = "#1abc9c"
            } else if (icon.toLowerCase() === "warning") {
                color = "#fd7e14"
            } else if (icon.toLowerCase() === "error") {
                color = "#dc3545"
            }
            Swal.fire({
                html: `<span class="font-16 ">${message}</span>`,
                icon: icon,
                confirmButtonColor: color,
                width: 400,
                // timer: timer
            })
        }
    }

    function formatToCurrency(amount) {
        let ret = parseFloat(amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        if (ret === "NaN") {
            return ""
        } else return ret
    }



    function somethingWentWrongHandler() {
        toaster("Something went wrong ... please hold on", "error", 3000)
        setTimeout(() => {
            location.reload();
        }, 3000);
    }

    function siteLoading(state) {
        if (state === "show") {
            $("#preloader").css("background-color", "#4fc6e17a")
            $(".preloader").fadeIn(500);
            return
        }
        $(".preloader").fadeOut(1500);
        return
    }
$(window).on("load", ()=>{
    siteLoading("hide")
})
    $('#sidebar_logout').on("click", (e) => {
        e.preventDefault()
         Swal.fire({
         title: "Logout successful!",
         html: 'Redirecting ...',
         icon: 'success',
         showConfirmButton: false,
        })
        setTimeout(() => {
            window.location.replace('logout')
        }, 1000);
      })  
</script>
{{-- <script src="{{ asset('assets/js/functions/blockUi.js') }}"></script> --}}
{{-- <script type='text/javascript'>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
</script>

<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'>
</script> --}}