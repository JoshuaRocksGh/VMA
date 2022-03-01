@extends('layouts.app')

@section('content')

@include('snippets.top_navbar', ['page_title' => 'Enquiry'])



<div class="container">


    <div class="row pt-5">

        <div class="col-md-2 mt-3">
            <a href="{{ url()->previous() }}" type="button"
                class="btn btn-soft-blue waves-effect waves-light float-left"><i class="fe-arrow-left"></i>&nbsp;Go
                Back</a>
        </div>
        <div class="col-md-8 mt-3 card card-body">
            <div class="row">
                <div class="col-md-2"> </div>
                <div class="col-md-8">
                    <h4 class="text-primary text-center">Send us a complaint</h4>
                    <hr>
                    <div class="___class_+?32___">
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
                </div> <!-- end card-box-->
            </div> <!-- end col -->
            <div class="col-md-2"> </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>




@endsection