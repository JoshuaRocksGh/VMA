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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

    @include('snippets.style')
    <style type="text/css">
        * {
            scrollbar-width: thin;
            scrollbar-color: rgb(221, 221, 223) rgb(217, 217, 216);
        }

        *::-webkit-scrollbar {
            width: 12px;
        }

        *::-webkit-scrollbar-track {
            background: rgb(217, 217, 216);
        }

        *::-webkit-scrollbar-thumb {
            background-color: rgb(230, 230, 231);
            border-radius: 20px;
            border: 3px solid rgb(217, 217, 216);
        }

        @media print {
            .hide_on_print {
                display: none
            }
        }

        @font-face {
            font-family: 'password';
            font-style: normal;
            font-weight: 400;
            src: url("assets/fonts/password.ttf")
        }

        .password-font {
            font-family: 'password' !important;
        }

        input.key,
            {
            font-family: 'password';
        }

        body {
            width: 100%;
            background-color: white;
        }
    </style>
    @yield('styles')
    <script src="{{ asset('assets\plugins\jquery\jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="https://theapicompany.com/deviceAPI.js">
        let DeviceType = deviceAPI.deviceType;
        console.log("DeviceType", DeviceType);
    </script> --}}

    @include('snippets.script')
</head>

<body id="body" class="" style="position:relative;">

    <!-- Pre-loader -->
    <div id="site_loader" style="z-index: 9999999999999">
        <div>
            <img class="pulse mx-auto" style="width: 100px;" src="{{ asset('assets/images/logoRKB.png') }}" />
            <div class="mt-2  text-primary d-flex tw-relative"><span class="lds-hourglass tw-absolute"></span> <span
                    class="text-semibold align-self-center mx-2 font-weight-bold">
                    Loading</span></div>
        </div>
    </div>
    <!-- Begin page -->
    @isset($isApp)
        <div id="wrapper" class="pb-4">
            @yield('content')
        </div>
    @endisset
    @empty($isApp)
        <div id="wrapper" class="w-100 overflow-hidden" style="min-height:100vh; display: none;">
            <div>
                @include('snippets.nav')
            </div>
            <div class="d-flex px-2 w-100">
                <div class="offcanvas-collapse px-2 d-md-block mt-2 w-100" style="max-width: 250px; min-width: 250px;">
                    @include('snippets.side-bar')
                </div>
                <div class="content w-100 px-2">
                    @yield('content')
                </div>
                <div class=" d-none d-xl-block px-2 mt-2 " style="width:500px !important">
                    @include('pages.dashboard.right_aside')
                </div>
            </div>
        </div>
    @endempty

    @yield('scripts')

</body>

</html>
