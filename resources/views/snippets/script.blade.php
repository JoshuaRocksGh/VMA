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
{{-- <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" defer> </script> --}}
<script src="{{ asset('assets/plugins/bootstrap/bootstrap-v.4.6.1.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert2@11.js') }}" defer></script>
<script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js')  }}" defer></script>
<script src="{{ asset('assets/js/functions/genericFunctions.js') }}" defer></script>
<script defer>
    const ACCOUNT_NUMBER_LENGTH = 13

$(window).on("load", ()=>{
    $('.menu-item-header').on('click', (e)=>{
        $('.menu-item-body').collapse('hide')
        $(e.currentTarget).next().collapse('show')
    })
    $('[data-toggle="offcanvas"]').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open')
    $('.hamburger-menu').toggleClass('open');
  })
  $("#wrapper").css("background-color", "#ddeefe").show();
  $('.password-eye').on('click', function () {
    var $this = $(this),
        $passwordInput = $this.prev(),
        isPasswordVisible = $passwordInput.attr('type') === 'text';
    $passwordInput.attr('type', isPasswordVisible ? 'password' : 'text');
    $this.toggleClass('show');
  });
  $("#site_loader").fadeOut(1500,'linear');
    $("a[href*='" + location.pathname + "']").addClass("current-page");
    $("a.current-page").parents('.menu-item-body').collapse('show')
    $("a.current-page").parents('.menu-item-body').prev().addClass('current-menu-header')
})
</script>