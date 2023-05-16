@extends('layouts.general')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <br><br><br><br><br><br><br><br><br><br>
                <img src="{{ asset('assets/images/Coat.png') }}" alt="" class="welcome_loader img-fluid  w-50 h-50">
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                window.location = 'login'
            }, 2000)
        })
    </script>

@endsection
