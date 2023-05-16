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
            var UserMandate = @json(session()->get('UserMandate'));
            var UserRegion_ = @json(session()->get('Region'));
            var UserConstituency_ = @json(session()->get('Constituency'));

            setTimeout(function() {
                {{-- return false; --}}

                if (UserMandate === "NationalLevel") {
                    window.location = 'home'
                } else if (UserMandate === 'RegionalLevel') {
                    if (UserRegion_.indexOf(' ') >= 0) {
                        {{-- alert("contains spaces"); --}}
                        var request = UserRegion_
                        UserRegion = request.replace(/ /g, "_");
                        window.location.href = `{{ url('region/${UserRegion}') }}`
                    } else {
                        window.location.href = `{{ url('region/${UserRegion_}') }}`
                    }

                } else if (UserMandate === 'ConstituencyLevel') {
                    if (UserConstituency_.indexOf(' ') >= 0) {
                        {{-- alert("contains spaces"); --}}
                        var request = UserConstituency_
                        UserConstituency = request.replace(/ /g, "_");
                        window.location.href = `{{ url('constituency/${UserConstituency}') }}`
                    } else {
                        window.location.href = `{{ url('constituency/${UserConstituency_}') }}`
                    }

                } else {
                    return back();
                }
            }, 2000)





        })
    </script>
@endsection
