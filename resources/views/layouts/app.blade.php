<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>RC BANKING</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Internet Banking Application" name="Internet Banking Portal for Rokel Commercial Bank." />
    <meta content="Banking Application" name="Union Systems Global" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <style>
        .btn-primary {
            color: #fff;
            background-color: #0561ad;
            border-color: #0561ad;

        }

        .btn-primary:hover {

            background-color: #2793ec;
            border-color: #0561ad;

        }
    </style>

    <script src="assets\plugins\jquery\jquery-3.6.0.min.js"></script>
    @include('snippets.style')
    @include('snippets.script')


</head>

<body class="auth-fluid-pages pb-0"
    style="background-image: url('assets/images/background.png'); background-repeat: no-repeat; background-size: cover;">

    <!-- Pre-loader -->
    <div id="preloader" class="preloader">
        <div id="status" class="preloader">
            <img class="pulse" style="width: 100px; top: -50px;" src="assets/images/logoRKB.png" />
        </div>
    </div> <!-- End Preloader-->

    @yield('content')


    @yield('scripts')
</body>

</html>