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


    @include('snippets.style')


    <style type="text/css">
        .navbar-custom {
            background-color: {
                    {
                    env('APPLICATION_CUSTOM_COLOR')
                }
            }

            ;
        }

        .purple-color {
            color: ##0561ad !important;
        }

        .btn-color {
            background-color: #0561ad;
            color: white;
        }


        .custom-color-gold {
            background-color: #a19472;
        }

        .custom-text-color-gold {
            color: #a19472;
        }



        .btn-primary {
            color: #fff;
            background-color: #0561ad;
            border-color: #0561ad;
            box-shadow: 0 0 0 0 rgb(6 55 195 / 70%);
        }

        .btn-primary:hover {

            background-color: #2793ec;
            border-color: #0561ad;

        }

        .p-text {
            color: white;
        }

        .card-icon {
            color: white;
        }

        .card-background-image {

            background-image: url("{{ asset('assets/images/login-bg.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;

        }

        /* Works on Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: rgb(221, 221, 223) rgb(217, 217, 216);
        }

        /* Works on Chrome, Edge, and Safari */
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

        #datatable-buttons_filter {
            float: right;
        }

    </style>


    <style>
        @media print {
            .hide_on_print {
                display: none
            }
        }

        @font-face {
            font-family: 'password';
            font-style: normal;
            font-weight: 400;
            src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
        }


        input.key {
            font-family: 'password';
            width: 300px;
            height: 80px;
            font-size: 100px;
        }

        .table_over_flow {
            overflow-y: hidden;

        }

    </style>



    @yield('styles')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


</head>

<body
    style="background-image: url('assets/images/background.png'); background-repeat: no-repeat; background-size: cover;"
    class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>


    <!-- Pre-loader -->
    <div id="preloader" class="preloader">
        <div id="status" class="preloader">
            <img class="pulse" style="width: 100px; top: -50px;"
                src="{{ asset('assets/images/logoRKB.png') }}" />
        </div>
    </div> <!-- End Preloader-->

    <!-- Begin page -->
    <div id="wrapper" style="zoom: 0.9;">


        <div>
            <div class="content" style="zoom: 0.9 ;">
                @yield('content')
            </div>

            {{-- @include('snippets.footer') --}}
        </div>
    </div>

    @include('snippets.script')


    @yield('scripts')
    {{-- @include('sweetalert::alert') --}}

</body>
{{-- <script src="bootstrap.min.js"></script> --}}
{{-- <script src="//code.jquery.com/jquery-1.12.1.min.js"></script> --}}
{{-- <script src="dist/jquery.userTimeout.js"></script> --}}

</html>
