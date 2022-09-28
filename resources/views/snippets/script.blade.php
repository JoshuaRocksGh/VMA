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
<script src="{{ asset('assets/plugins/bootstrap/bootstrap-v.4.6.1.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/sweet-alert/sweetalert2@11.js') }}" defer></script>
<script src="{{ asset('assets/plugins/blockui/jquery.blockUI.min.js') }}" defer></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}" defer></script>
<script src="{{ asset('assets/js/functions/genericFunctions.js') }}" defer></script>
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
        $("#wrapper").css("background-color", "#ddeefe").show();
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
