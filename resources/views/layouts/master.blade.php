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
                /* src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf); */
        }

        input.key {
            font-family: 'password';
            width: 300px;
            height: 80px;
            font-size: 100px;
        }

        #body {
            width: 100%;
            background-color: white;
        }
    </style>
    @yield('styles')
    <script src="{{ asset('assets\plugins\jquery\jquery-3.6.0.min.js') }}"></script>
    @include('snippets.script')
</head>

<body id="body" class="position-relative">

    <!-- Pre-loader -->
    <div id="site_loader">
        <div>
            <img class="pulse mx-auto" style="width: 100px;" src="{{ asset('assets/images/logoRKB.png') }}" />
            <div class="mt-2  text-primary d-flex tw-relative"><span class="lds-hourglass tw-absolute"></span> <span
                    class="text-semibold align-self-center mx-2 font-weight-bold">
                    Loading</span></div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="wrapper" class="w-100 overflow-hidden" style="min-height:100vh; display: none">
        @include('snippets.nav')
        <div class="row mx-2">
            <div class="offcanvas-collapse col-md-4 d-md-block mt-2 col-xl-2  ">
                @include('snippets.side-bar')
            </div>
            <div class="col-md-8">
                <div class="content">
                    @yield('content')
                </div>

            </div>
            <div class="d-none d-xl-block mt-2  col-xl-2">
                <div class="dashboard site-card p-0">
                    <div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('scripts')
</body>

</html>