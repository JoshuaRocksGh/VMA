@extends('layouts.master')



@section('content')
    @php
        $pageTitle = 'BULK SALONE-LINK ';
        $basePath = 'Payments';
        $currentPath = 'Bulk Salone-link';
    @endphp

    @include('snippets.pageHeader')

    <div class="dashboard site-card overflow-hidden ">
        <p class="text-muted font-14 m-r-20 m-b-20">
            <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please Note:&nbsp;&nbsp;</b> <span
                    class="">You can download template for upload (<span class=" text-danger"><a
                            href="{{ url('korpor_file_download') }}" class="text-danger"> Click Here to
                            Download</a></span> )</span> </span>

        </p>


        <form action="{{ url('korpor_upload_') }}" class="dashboard-body p-4" id="bulk_korpor_upload" method="post"
            enctype="multipart/form-data">
            @csrf

            <div class="row">

                <div class="card-box col-md-12">

                    <label class=" text-dark"> Account to transfer from</label>
                    <div class="form-group">
                        <select class="accounts-select" name="my_account" id="my_account" required>
                            <option disabled selected value=""> --- Select Source Account --- </option>
                            @include('snippets.accounts')

                        </select>
                    </div>
                    <hr class="mt-0">
                </div>
                <div class="card-box col-md-12">
                    <label class="text-danger">Transfer Details</label>
                    <br>

                    <div class="row">
                        <div class="col-md-4 form-group">

                            <label for="inputEmail3" class=" text-dark">Total
                                Amount</label>
                            <input type="text" name="bulk_amount" id="bulk_amount"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                class="form-control input-sm" required>

                        </div>

                        <div class="col-md-4 form-group ">

                            <label for="" class=" text-dark">Reference
                                Number</label>
                            <input type="text" name="reference_no" id="reference_no" class="form-control input-sm"
                                required>

                        </div>


                        <div class="col-md-4 form-group ">

                            <label for="inputEmail3" class=" text-dark">Value
                                Date</label>
                            <input type="date" name="value_date" id="value_date" class="form-control" required>


                        </div>



                        <div class="col-md-4 form-group ">

                            <label for="" class=" text-dark">File<span class="text-danger">
                                    *</span></label>
                            <br>
                            <input type="file" name="excel_file" id="excel_file" class=" input-sm" required>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-8 offset-4 text-right">
                                    <button type="submit"
                                        class="btn  waves-effect waves-light disappear-after-success form-button"
                                        id="submit_cheque_request">
                                        Upload & Validate
                                    </button>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>
            <hr>

            <div class="breakpoint">
                <label class="text-danger">Payment Summary</label>
                <br>

                <table id="beneficiary_table"
                    class="table table-bordered table-striped display responsive nowrap w-100 bulk_upload_list">

                    <thead>
                        <tr class="bg-info text-white">
                            <th class="all"> Batch </th>
                            <th class="all"> Reference </th>
                            <th class="all"> Debit Account </th>
                            <th class="all"> Bulk Amount </th>
                            <th class="none"> Value date </th>
                            <th class="none"> Status </th>
                            <th class="none"> Action </th>
                            {{-- <th class="text-center"> <b>Actions </b> </th> --}}

                        </tr>
                    </thead>

                    <tbody class="">
                    </tbody>
                </table>


            </div>

        </form>



    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script type="text/javascript" src="{{ asset('assets/js/pages/payments/bulk_korpor.js') }}"></script>
    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
        let customer_no = @json(session('customerNumber'))
    </script>
    {{-- <script>
        alert("bluk korpor");
    </script> --}}
@endsection
