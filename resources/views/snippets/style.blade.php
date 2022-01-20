<!-- App favicon -->
{{--
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"> --}}
{{--
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap"
    rel="stylesheet"> --}}
{{--
<link href="assets/fonts/Roboto.css2.css" rel="stylesheet"> --}}
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
--}}
{{--
<link rel="stylesheet" href="{{ asset('assets\fonts\fontawesome-free-5.15.4-web\css\all.min.css')}}" type="text/css" />
--}}
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" type="text/css" />
<link href="{{ asset('assets/css/bootstrap-purple.min.css') }}" rel="stylesheet" type="text/css"
    id="bs-default-stylesheet" />
<link href="{{ asset('assets/css/app-purple.min.css') }}" rel="stylesheet" type="text/css"
    id="app-default-stylesheet" />
<link href="{{ asset('assets/css/rokel.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .form-group {
        margin-bottom: 0.4rem !Important;
    }

    .readOnly {
        background-color: #eceff1 !Important;
    }


    .site-shadow {
        box-shadow: 4px 4px 15px rgb(26 35 126 / 20%);
    }

    .site-card {
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(5px);
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 0.25rem;
        margin-bottom: 2rem;
        padding: 2rem;
        min-height: 150px
    }

    /* styles for activate and block card */
    .box {
        border: 1px solid black;
        height: 240px;
        width: 400px;
        margin: 50px auto;
        margin-top: 90px;
        background-color: #0561ad;
        background-size: cover;
        border-radius: 8px;
        box-shadow: 2px 4px 18px 5px;
        color: currentColor;
        opacity: 0.8;
    }

    .box:hover {
        box-shadow: 3px 6px 28px 7px;
    }

    .visa_logo {
        position: absolute;
        left: 65%;
        top: 23%;
    }

    .chip {
        position: absolute;
        left: 24.4%;
        top: 46%;
    }


    .card_digits {
        font-family: kelly slab, cursive;
        color: wheat;
        font-size: 23px;
        position: absolute;
        left: 24.4%;
        top: 60%;
        letter-spacing: 6px;
    }

    .coded {
        font-family: kelly slab, cursive;
        color: wheat;
        font-size: 12px;
        position: absolute;
        left: 10%;
        top: 65%;
        font-weight: normal;
        opacity: 0.2;
    }

    .good_thru {
        width: 10px;
        display: none;
        font-family: kelly slab, cursive;
        color: wheat;
        font-size: 15px;
        position: absolute;
        left: 70%;
        top: 50%;
        font-weight: normal;
        line-height: -10px;
        opacity: 0.3;
    }

    .expiry {
        font-family: kelly slab, cursive;
        color: wheat;
        position: absolute;
        left: 55%;
        top: 73.4%;
        letter-spacing: 2px;

    }

    .card_holder {
        font-family: kelly slab, cursive;
        color: wheat;
        font-weight: normal;
        position: absolute;
        left: 24.4%;
        top: 73%;
        letter-spacing: 3px;
    }

    .mastercard {
        position: absolute;
        left: 67%;
        top: 68%;
    }

    // RECEIPT CSS

    .body-main {
        background: #ffffff;
        border-bottom: 15px solid #1E1F23;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #808080;
        /* font-size: 10px */
    }

    .main thead {
        background: #1E1F23;
        color: #fff
    }

    .img {
        height: 100px;

    }

    .logo {
        align: center
    }

    h2 {
        text-align: center
    }

    .form-center {
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type='number'] {
        -moz-appearance: textfield;
    }

    option[value=""][disabled] {
        background-color: #dddddd;
        color: #1E1F23
    }

    select:required:invalid {
        background-color: #fffbfb79;
        color: #1E1F23
    }

    .btn-primary {
        background-color: #00bdf3 !important;
        border-color: #00bdf3 !important;
        /* height: 3rem; */
    }

    .btn-primary:hover {
        background-color: #0388cb !important;
        border-color: #0388cb !important;
        box-shadow: 0 0 0 0.15rem #0388cb80 !important;
    }

    .btn-primary:focus {
        background-color: #0388cb !important;
        border-color: #0388cb !important;
        box-shadow: 0 0 0 0.15rem #0388cb80 !important;
    }


    .btn-primary:active {
        background-color: #0388cb !important;
        border-color: #0388cb !important;
        box-shadow: 0 0 0 0.15rem #0388cb80 !important;

    }

    .btn-primary:active {
        background-color: #00bdf3 !important;
        border-color: #00bdf3 !important;
        box-shadow: 0 0 0 0.15rem #0388cb80 !important;
    }

    /* a.text-primary {
        color: #00bdf3 !important;
    } */

    a.text-primary:focus,
    a.text-primary:hover {
        color: #0388cb !important;
    }


    .div-card {
        background-image: linear-gradient(to bottom right, white, rgb(223, 225, 226));
        box-shadow: 4px 4px 15px rgb(26 35 126 / 20%);
    }


    #wrapper {
        height: auto;
    }
</style>