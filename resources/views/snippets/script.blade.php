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
<script src="{{ asset('assets\plugins\bootstrap-select\bootstrap-select.min.js')}}" defer> </script>
<script defer src="{{ asset('assets/js/functions/genericFunctions.js') }}">
</script>
<script src="{{asset('assets\plugins\select2\select2.min.js')  }}" defer></script>
<script defer>
    const ACCOUNT_NUMBER_LENGTH = 13
    // $("input[type=number]").on("focus", function() {
    //     $(this).on("keydown", function(event) {
    //         if (event.keyCode === 38 || event.keyCode === 40) {
    //             event.preventDefault();
    //         }
    //     });
    // });


$(window).on("load", ()=>{
    siteLoading("hide")
})
</script>
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