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
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-firestore.js"></script>



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
        var imageUrl1 = "{{ asset('assets/images/checked.jpg') }}";
        var imageUrl = "{{ asset('assets/images/layered-blue.png') }}";
        //$("#wrapper").css("background-image", "url(" + imageUrl + ")");
        $("#wrapper").css("background-color", "#f1f1f1").show();
        $('#wrapper').css('background-repeat', 'no-repeat');
        $('#wrapper').css('background-size', 'cover');
        $('#wrapper').css('height', '100%');
        $('#wrapper').css('opacity', '0.8');
        //$("#wrapper").css("background-image", "#fedddd").show();
        $("#wrapper1").css("background-image", "url(" + imageUrl1 + ")");
        $("#wrapper1").css("background-color", "#f1f1f1").show();
        $('#wrapper1').css('background-repeat', 'no-repeat');
        $('#wrapper1').css('background-size', 'cover');
        $('#wrapper1').css('height', '100%');
        $('#wrapper').css('opacity', '0.8');

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

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "{{ config('services.firebase.apiKey') }}",
        authDomain: "{{ config('services.firebase.authDomain') }}",
        projectId: "{{ config('services.firebase.projectId') }}",
        storageBucket: "{{ config('services.firebase.storageBucket') }}",
        messagingSenderId: "{{ config('services.firebase.messagingSenderId') }}",
        appId: "{{ config('services.firebase.appId') }}",
        measurementId: "{{ config('services.firebase.measurementId') }}"
    };

    // Initialize Firebase
    {{--  console.log("firebaseConfig=>", firebaseConfig)  --}}
    const app = firebase.initializeApp(firebaseConfig);
    {{-- const analytics = firebase.getAnalytics(app); --}}
    {{--  console.log("app=>", app)  --}}


    firebase.analytics.isSupported().then((isSupported) => {
        if (isSupported) {
            analytics = firebase.analytics(app);
        }
    })


    let db = firebase.firestore();
    {{--  console.log("get cans==>", db.collection('candidates'))  --}}
    {{--  db.collection('candidates').doc("PARTY A").snapshots((snapshots) => {
        console.log("snapshots ==>", snapshots)
    })  --}}
</script>
<script>
    //var UserMandate = @json(session()->get('UserMandate'));
    //console.log("==>", db.collection("users").doc('0277100300').get())
    {{--  db.collection('pollingStation').doc('A010101').collection('region').onSnapshot((
            snapshots) => {
            console.log(snapshots.docs)
        })  --}}


    var logoutTimer; // Variable to store the logout timer
    var idleTimeoutDuration = 300000; // 5 minutes (adjust as needed)
    //var idleTimeoutDuration = 30000; // 5 minutes (adjust as needed)

    // Function to reset the logout timer
    function resetLogoutTimer() {
        clearTimeout(logoutTimer);
        startLogoutTimer();
    }

    // Function to start the logout timer
    function startLogoutTimer() {
        logoutTimer = setTimeout(logout, idleTimeoutDuration);
    }

    // Function to perform the logout
    function logout() {
        // Add your logout logic here
        console.log('User logged out');
        //window.location.replace("logout");
        //window.close('http://localhost/laravel/New-SLCB-Corporate-Banking/public/approvals-pending-transfer-details/')
    }

    // Event listeners to track user activity
    function handleUserActivity() {
        resetLogoutTimer();
    }

    window.addEventListener('mousemove', handleUserActivity);
    window.addEventListener('keydown', handleUserActivity);
    window.addEventListener('scroll', handleUserActivity);

    // Start the initial logout timer
    {{--  startLogoutTimer();  --}}
</script>
<script></script>
