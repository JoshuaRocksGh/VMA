@extends('layouts.master')

@section('content')

    <!-- Start Content-->
    <div class="container-fluid">
        <legend></legend>

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-1"></div>


                    <div class="col-md-10">

                        <div class="col-md-12">
                            <a href="{{ url('payment-add-beneficiary') }}">
                                <h3 class="text-primary"> <i class="mdi mdi-arrow-left-thick "></i>&nbsp;  Add Mobile Money Beneficiary</h4>
                            </a>
                            <hr>
                        </div>

                     

                        <div class="row">
                            <div class="col-md-6">
                                <form action="#"  autocomplete="off" aria-autocomplete="off">
                                    <div class="form-group">
                                        <label class="purple-color"> Beneficiary Network Details</label>
                                        {{-- <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00/00/0000" placeholder="Account Number"> --}}
                                        {{-- <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <label>Account Name</label> --}}
                                        {{-- <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00" placeholder="Account Name"> --}}
                                        {{-- <span class="font-13 text-muted">e.g "HH:MM:SS"</span> --}}

                                        <select class="custom-select ">
                                            <option selected>Select Network</option>
                                            <option value="1"><img src="{{ asset('assets/images/mtn.png') }}" alt="image"
                                                    class="img-fluid avatar-xs rounded"> MTN</option>
                                            <option value="2">Vodafone</option>
                                            <option value="3">AirteTigo</option>
                                            {{-- <img src="{{ asset('assets/images/mtn.png') }}" alt="mtn" class="img-fluid"> --}}

                                        </select>

                                    </div>


                                    <div class="form-group">
                                        {{-- <label class="purple-color"> Beneficiary Account Details</label> --}}
                                        <input type="text" class="form-control" data-toggle="input-mask"
                                            data-mask-format="00/00/0000" placeholder="Enter Mobile Number">
                                        {{-- <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span> --}}
                                    </div>
                                    {{-- <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="00:00:00" placeholder="Account Name">
                                    <span class="font-13 text-muted">e.g "HH:MM:SS"</span>
                                </div> --}}
                                    <br>
                                    <div class="form-group">
                                        <label class="purple-color">Beneficiary Personal Details</label>
                                        <input type="text" class="form-control" data-toggle="input-mask"
                                            data-mask-format="00/00/0000 00:00:00" placeholder="Beneficiary Name">
                                        {{-- <span class="font-13 text-muted">e.g "DD/MM/YYYY HH:MM:SS"</span> --}}
                                    </div>
                                    <div class="form-group">
                                        {{-- <label>Beneficiary Email</label> --}}
                                        <input type="text" class="form-control" data-toggle="input-mask"
                                            data-mask-format="00000-000" placeholder="Beneficiary Email">
                                        {{-- <span class="font-13 text-muted">e.g "xxxxx-xxx"</span> --}}
                                        {{-- <label class="custom-control-label" for="checkmeout0">Check me out !</label> --}}

                                    </div><br>
                                    {{-- <div class="form-group">
                                <label class="custom-control-label" for="checkmeout">Check me out !</label>

                                </div> --}}

                                    <div class="form-group">
                                        {{-- <input type="checkbox" class="form-control" data-toggle="input-mask" data-mask-format="0-00-00-00" name="checkbox" value="Email beneficiary when a transfer is made"><p></p> --}}
                                        {{-- <span class="font-13 text-muted">e.g "x-xx-xx-xx"</span> --}}

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Email beneficiary when
                                                payment is made</label>
                                        </div>

                                    </div>
                                    {{-- <div class="form-group">
                                    <label>Money</label>
                                    <label class="custom-control-label" for="checkmeout0">Check me out !</label>

                                    <input type="text" class="form-control" data-toggle="input-mask" data-mask-format="000.000.000.000.000,00" data-reverse="true">
                                    <span class="font-13 text-muted">e.g "Your money"</span>
                                </div> --}}

                                    <div class="row">
                                        &nbsp; <h4>NB</h4> &nbsp;
                                        <div class="col-8">

                                            <p class="sub-header font-13">
                                                Providing beneficairy email and checking
                                                the box, enables us to send an alert mail to
                                                the beneficiary each time a payment is made
                                            </p>
                                        </div>
                                    </div>


                                    <button class="btn btn-primary" type="submit">Save Beneficiary</button>
                                </form>
                            </div> <!-- end col -->

                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <br><br>
                                <img src="{{ asset('assets/images/momo.jpg') }}" class="img-fluid" alt="">
                            </div> <!-- end col -->



                        </div>
                        <!-- end row -->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-1"></div>

        </div> <!-- end row -->




    @endsection
