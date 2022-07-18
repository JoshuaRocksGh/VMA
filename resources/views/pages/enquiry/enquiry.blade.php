@php
$isApp = true;
@endphp
@extends('layouts.master')

@section('content')

@include('snippets.top_navbar', ['page_title' => 'Enquiry'])



<div class="container mx-auto dashboard site-card">



    <div class="dashboard-header position-relative d-flex align-items-center justify-content-center p-1">
        <a href="{{ url()->previous() }}" type="button" class="btn position-absolute" style="left: 5px"><i
                class="fe-arrow-left"></i>&nbsp;Go
            Back</a>
        <h4 class="text-primary  mb-0 text-center">Send us a complaint</h4>

    </div>
    <div class="p-4 dashboard-body">

        <div class="mx-auto" style="max-width:650px">
            <form>
                <div class="form-group">
                    <label for="simpleinput">Type Of Complaint</label>
                    <select class="custom-select ">
                        <option selected disabled>-- Select Enquiry</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-textarea">Message</label>
                    <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="simpleinput">Prefered Contact</label>
                    <input type="text" id="simpleinput" class="form-control">
                </div>
                <div class="form-group">
                    <label for="simpleinput">Prefered Contact</label>
                    <input type="text" id="simpleinput" class="form-control">
                </div>
                <div class="form-group">
                    <label for="simpleinput">Prefered Date</label>
                    <input type="date" id="simpleinput" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary btn-rounded" type="button" id="next_button">
                        &nbsp; Submit &nbsp;</button>
                </div>
            </form>
        </div> <!-- end col -->
    </div> <!-- end col -->
</div>




@endsection