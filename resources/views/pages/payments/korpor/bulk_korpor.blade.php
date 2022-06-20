@extends('layouts.master')



@section('content')
    @php
    $pageTitle = 'BULK E-KORPOR PAYMENTS';
    $basePath = 'Payments';
    $currentPath = 'Bulk E-Korpor';
    @endphp

    @include('snippets.pageHeader')

    <div class="container-fluid ">
        <br>


        <div class="col-md-12">
            <p class="text-muted font-14 m-r-20 m-b-20">
                <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please Note:&nbsp;&nbsp;</b> <span
                        class="">You can download template for upload (<span class=" text-danger"><a
                                href="{{ url('korpor_file_download') }}" class="text-danger"> Bulk
                                E-korpor</a></span>)</span> </span>

            </p>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                    <form action="{{ url('korpor_upload_') }}" id="bulk_korpor_upload" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="card-box col-md-12">

                                <h4 for="" class=" text-primary"> <b> Account to transfer from</b><span
                                        class="text-danger"> *</span></h4>
                                <div class="form-group">
                                    <select class="accounts-select" name="my_account" id="my_account" required>
                                        {{-- <option disabled selected value=""> --- Select Source Account --- </option> --}}
                                        @include('snippets.accounts')

                                    </select>
                                </div>


                            </div>
                            <div class="card-box col-md-12">

                                <div class="row">
                                    <div class="col-md-6 form-group">

                                        <label for="inputEmail3" class=" text-primary">Total
                                            Amount<span class="text-danger"> *</span></label>
                                        <input type="text" name="bulk_amount" id="bulk_amount"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                            class="form-control input-sm" required>

                                    </div>


                                    <div class="col-md-6 form-group ">

                                        <label for="inputEmail3" class=" text-primary">Value
                                            Date<span class="text-danger"> *</span></label>
                                        <input type="date" name="value_date" id="value_date" class="form-control"
                                            required>


                                    </div>


                                    <div class="col-md-6 form-group ">

                                        <label for="" class=" text-primary">Reference
                                            Number<span class="text-danger"> *</span></label>
                                        <input type="text" name="reference_no" id="reference_no"
                                            class="form-control input-sm" required>

                                    </div>



                                    <div class="col-md-6 form-group ">

                                        <label for="" class=" text-primary">File<span class="text-danger">
                                                *</span></label>
                                        <br>
                                        <input type="file" name="excel_file" id="excel_file" class=" input-sm"
                                            required>

                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-8 offset-4 text-right">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm waves-effect waves-light disappear-after-success"
                                                    id="submit_cheque_request">
                                                    Upload & Validate
                                                </button>

                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>








                        </div>


                        <div class="row">

                        </div>

                    </form>

                    <div class="row card-box" id="beneficiary_table" style="zoom: 0.8;">
                        <br>

                        <div class="col-md-12">
                            <h4 class="text-primary"><b>E-Korpor Payment Summary</b></h4>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4>{{ $errors->first() }}</h4>
                                </div>
                            @endif
                            <table id="datatable-buttons"
                                class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                                <thead>
                                    <tr class="bg-info text-white">
                                        <th> <b> Batch </b> </th>
                                        <th> <b>Reference </b> </th>
                                        <th> <b> Debit Account </b> </th>
                                        <th> <b> Bulk Amount </b> </th>
                                        <th> <b> Value date </b> </th>
                                        <th> <b> Status </b> </th>
                                        <!-- <th> <b> Status </b> </th> -->
                                        {{-- <th class="text-center"> <b>Actions </b> </th> --}}

                                    </tr>
                                </thead>

                                <tbody class="">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="
                                    col-md-1">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script type="text/javascript" src="{{ asset('assets/js/pages/payments/bulk_korpor.js') }}"></script>
    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
        let customer_no = @json(session('customerNumber'))
    </script>
@endsection
