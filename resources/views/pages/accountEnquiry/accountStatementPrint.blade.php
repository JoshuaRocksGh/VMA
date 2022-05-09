@extends('layouts.print')
@section('styles')
    <style>
        .details-label {
            width: 8rem;
            display: inline-block;
        }

        table tr td {
            padding: 5px;
        }

    </style>
@endsection
@section('content')
    <br><br>
    <div class="border border-primary p-4 m-2" style="border-radius: 0.25rem">
        <div class="row">
            <div class="col-md-6 text-left">1</div>
            <div class="col-md-6 text-right">2</div>
        </div>
    </div>
@endsection
