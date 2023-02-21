@if (config('app.corporate'))
    <script>
        ISCORPORATE = true;
    </script>
@else
    <script>
        ISCORPORATE = false;
    </script>
@endif


<!-- Third Party js-->
{{-- <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}" defer> </script> --}}
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins/bootstrap/bootstrap-v.4.6.1.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert2@11.js') }}" defer></script>
<script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}" defer></script>
<script src="{{ asset('assets/js/functions/genericFunctions.js') }}" defer></script>
{{--  tour cdn  --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/6.0.0/intro.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
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
        //var imageUrl = "{{asset('assets/images/simple-shiny.png')}}";
        var imageUrl = "{{asset('assets/images/simple-shiny2.png')}}";
        $("#wrapper").css("background-image", "url(" + imageUrl + ")");
        $("#wrapper").css("background-color", "#f1f1f1").show();
        $('#wrapper').css('background-repeat', 'no-repeat');
        //$('#wrapper').css('background-size', 'cover');
        $('#wrapper').css('height', '100%');
        //$("#wrapper").css("background-image", "#fedddd").show();
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
    introJs().start();
</script>
{{-- Get Device Type --}}
<script>
    const getDeviceType = () => {
        const ua = navigator.userAgent;
        if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
            return "Tablet";
        }
        if (
            /Mobile|iP(hone|od)|Android|BlackBerry|IEMobile|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/
            .test(
                ua
            )
        ) {
            return "Mobile";
        }
        return "Desktop";
    };
    getDeviceType()
    {{-- console.log(getDeviceType()) --}}
</script>

<script type="text/javascript">
    const getDeviceOS = () => {
        if (navigator.appVersion.indexOf("Win") != -1) {
            return "Windows";
        } else if (navigator.appVersion.indexOf("Mac") != -1) {
            return "MacOS";
        } else if (navigator.appVersion.indexOf("Linux") != -1) {
            return "Linux";
        } else {
            return "Unknown";
        }

    }

    getDeviceOS()
    {{-- alert(getDeviceOS()) --}}
</script>

<script>
    const getGPU = () => {
        var canvas = document.createElement('canvas');
        var gl;
        var debugInfo;
        var vendor;
        var renderer;

        try {
            gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
        } catch (e) {}

        if (gl) {
            debugInfo = gl.getExtension('WEBGL_debug_renderer_info');
            vendor = gl.getParameter(debugInfo.UNMASKED_VENDOR_WEBGL);
            renderer = gl.getParameter(debugInfo.UNMASKED_RENDERER_WEBGL);
        }
        return vendor
    }
    getGPU()
</script>

<script>
    // Set timeout variables.
    //var timoutWarning = 840000; // Display warning in 14 Mins.
    var timoutWarning = 30000; // Display warning in 14 Mins.
    var timoutNow = 60000; // Warning has been shown, give the user 1 minute to interact
    var logoutUrl = '/session-logout'; // URL to logout page.

    var warningTimer;
    var timeoutTimer;

    // Start warning timer.
    function StartWarningTimer() {
        warningTimer = setTimeout("IdleWarning()", timoutWarning);
    }

    // Reset timers.
    function ResetTimeOutTimer() {
        clearTimeout(timeoutTimer);
        StartWarningTimer();
        $("#timeout").dialog('close');
    }

    // Show idle timeout warning dialog.
    function IdleWarning() {
        clearTimeout(warningTimer);
        timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
        $("#timeout").dialog({
            modal: true
        });
        // Add code in the #timeout element to call ResetTimeOutTimer() if
        // the "Stay Logged In" button is clicked
    }

    // Logout the user.
    function IdleTimeout() {
        window.location = logoutUrl;
    }

    //StartWarningTimer()
    //IdleWarning()
</script>
