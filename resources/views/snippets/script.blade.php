<!-- Third Party js-->
{{-- <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" defer> </script> --}}
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins/bootstrap/bootstrap-v.4.6.1.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert2@11.js') }}" defer></script>
<script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}" defer></script>
<script src="{{ asset('assets/js/functions/genericFunctions.js') }}" defer></script>
{{-- <script src="{{ assest('assets/js/temp/jquery.idle.js') }}"></script> --}}
{{--  tour cdn  --}}

{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>  --}}
{{--  <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>  --}}
<script defer>
    const ACCOUNT_NUMBER_LENGTH = 13

    pageData = {};
    $(() => {
        $('.menu-item-header').on('click', (e) => {
            $('.menu-item-body').collapse('hide')
            $(e.currentTarget).next().collapse('show')
        })
        $('[data-toggle="offcanvas"]').on('click', function() {
            $('.offcanvas-collapse').toggleClass('open')
            $('.hamburger-menu').toggleClass('open');
        })
        //var imageUrl = "{{ asset('assets/images/simple-shiny.png') }}";
        var imageUrl1 = "{{ asset('assets/images/freedom.jpg') }}";
        var imageUrl = "{{ asset('assets/images/layered-blue.png') }}";
        $("#wrapper").css("background-image", "url(" + imageUrl + ")");
        $("#wrapper").css("background-color", "#f1f1f1").show();
        $('#wrapper').css('background-repeat', 'no-repeat');
        $('#wrapper').css('background-size', 'cover');
        $('#wrapper').css('height', '100%');
        //$("#wrapper").css("background-image", "#fedddd").show();
        $("#wrapper1").css("background-image", "url(" + imageUrl1 + ")");
        $("#wrapper1").css("background-color", "#f1f1f1").show();
        $('#wrapper1').css('background-repeat', 'no-repeat');
        $('#wrapper1').css('background-size', 'cover');
        $('#wrapper1').css('height', '100%');
        // $('#wrapper1').css('padding-bottom', '200px');
        $('.password-eye').on('click', function() {
            var $this = $(this),
                $passwordInput = $this.prev(),
                isPasswordVisible = $passwordInput.attr('type') === 'text';
            $passwordInput.attr('type', isPasswordVisible ? 'password' : 'text');
            $this.toggleClass('show');
        });
        $("#site_loader").fadeOut(1500, 'linear');
        $("a[href$='" + location.pathname + "']").addClass("current-page");
        $("a.current-page").parents('.menu-item-body').collapse('show')
        $("a.current-page").parents('.menu-item-body').prev().addClass('current-menu-header')


        $("select").select2();
        $(".accounts-select").select2({
            minimumResultsForSearch: Infinity,
            templateResult: accountTemplate,
            templateSelection: accountTemplate,
        });
    })

    {{--  alert("introJs().start()")  --}}
    //CALL INTRO.JS
    {{--  introJs().start();  --}}
</script>
