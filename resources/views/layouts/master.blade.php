<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VMA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">


    {{--  @include('snippets.style')  --}}
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
            background-color: rgb(248, 241, 241);
        }
    </style>
    @include('snippets.style')
    @yield('styles')
    @include('snippets.script')

</head>

<body id="body" class="" style="position:relative;">

    <!-- Pre-loader -->
    <div id="site_loader" style="z-index: 9999999999999">
        <div>
            <img class="pulse mx-auto" style="width: 100px;" src="{{ asset('assets/images/preloader.png') }}" />
            <div class="mt-2  text-black d-flex tw-relative"><span class="lds-hourglass tw-absolute"></span> <span
                    class="text-semibold align-self-center mx-2 font-weight-bold">
                    Loading</span></div>
        </div>
    </div>
    <!-- Begin page -->

    <div id="wrapper" class="w-100 overflow-hidden" style="height:100vh; display: none;">
        @include('snippets.nav')
        <div class="d-flex px-2 pt-4 w-100">
            <div class="offcanvas-collapse  overflow-auto scrollbar-hidden px-2 d-md-block mt-2 w-100"
                style="max-width: 250px; min-width: 250px;
                    max-height: calc(100vh - var(--navbar-height));
                    "
                data-title="Menu Bar" data-intro="Click to perform a transaction">
                @include('snippets.side-bar')
            </div>
            <div style="max-height: calc(100vh - var(--navbar-height));"
                class="content scrollbar-hidden w-100 overflow-auto px-2">
                @yield('content')
            </div>

        </div>
    </div>

    @yield('scripts')

</body>

</html>
