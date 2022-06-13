@extends('layouts.master')

@section('content')
    @php
    $pageTitle = 'BULK TRANSFER UPLOAD';
    $basePath = 'Transfer';
    $currentPath = 'Bulk Transfer';
    @endphp

    @include('snippets.pageHeader')



    <div class="dashboard site-card overflow-hidden">
        <p class="text-muted font-14 m-r-20 m-b-20">
            <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please Note:&nbsp;&nbsp;</b>
            </span> You can download template for upload (<span class="text-danger"><a
                    href="{{ url('download_same_bank_file') }}" class="text-danger"> Same Bank </a></span>) / (<span
                class="text-danger"><a href="{{ url('download_other_bank_file') }}" class="text-danger"> Other
                    Bank </a></span>)


        </p>
        <form id="bulk_upload_form" class="dashboard-body p-4" action="#" enctype="multipart/form-data">
            @csrf

            <div class="row ">
                <div class="col-md-12">
                    <label class="text-primary">Account to transfer from</label>

                    <div class="form-group">

                        <select class="accounts-select " name="my_account" id="my_account" required>
                            <option disabled selected value=""> --- Select Source Account --- </option>
                            @include('snippets.accounts')

                        </select>

                    </div>
                    <hr class="mt-0">

                </div>


                <div class="card-box col-md-12">
                    <label class="text-primary">Transfer Details</label>
                    <br>
                    <div class="row">
                        {{-- <h4 for="" class="col-12 col-form-label text-primary"><b>Transfer Details</b></h4> --}}


                        <div class="col-md-4 form-group ">
                            <label for="inputEmail3" class="text-primary">Bank Type<span class="text-danger">
                                    *</span></label>
                            <select class="custom-select " name="bank_type" id="bank_type" required>
                                {{-- <option value=""> ---Select Type --</option> --}}
                                <option value="SAB" selected> Same Bank </option>
                                <option value="OTB"> Other Bank </option>
                            </select>
                        </div>



                        <div class="col-md-4 form-group">
                            <label for="inputEmail3" class="text-primary">Bulk
                                Amount<span class="text-danger"> *</span></label>
                            <input type="text" name="bulk_amount" id="bulk_amount" pattern="([0-9]{1,3}).([0-9]{1,3})"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                class="form-control input-sm" required>
                        </div>





                        <div class="col-md-4 form-group">
                            <label for="inputEmail3" class="text-primary">Reference
                                Number<span class="text-danger"> *</span></label>
                            <input type="text" name="reference_no" id="reference_no" class="form-control input-sm" required>

                        </div>



                        <div class="col-md-4 form-group">
                            <label for="inputEmail3" class="text-primary">Value Date<span class="text-danger">
                                    *</span></label>
                            <input type="date" id="value_date" name="value_date" placeholder="Enter value date"
                                class="form-control" required>
                            {{-- parsley-trigger="change" autocomzplete="none" --}}
                            {{-- data-provide="datepicker" data-date-autoclose="true" --}}
                        </div>




                        <div class="col-md-4 form-group">
                            <label for="inputEmail3" class="col-12 col-form-label text-primary">File<span
                                    class="text-danger"> *</span></label>
                            <input type="file" name="excel_file" id="excel_file" class=" input-sm" required>
                        </div>



                        <!-- end row -->







                        <br>
                        <!-- Large modal -->
                        {{-- <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#bs-example-modal-lg">Large Modal</button> --}}
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-8 offset-4 text-right">
                                    <button type="submit"
                                        class="btn btn-primary next-button btn-rounded disappear-after-success"
                                        id="submit_cheque_request">
                                        Upload & Validate
                                    </button>
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#full-width-modal">Full width Modal</button></b> --}}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <hr>

            <div class="breakpoint">
                <label class="text-primary">Transfer Summary</label>
                <br>



                <table id="bulk_upload_list"
                    class="table table-bordered table-striped display responsive nowrap w-100 bulk_upload_list"
                    style="zoom: 0.9;">

                    <thead>
                        <tr class="bg-info text-white">
                            {{-- <th> <b> Batch </b> </th> --}}
                            <th class="all"> Reference </th>
                            <th class="all"> Debit Account </th>
                            <th class="all"> Total Upload Amount </th>
                            <th class="all"> Value date </th>
                            <th class="none"> Total Upload </th>
                            {{-- <th> Successful </th> --}}
                            <th class="none"> Failed </th>
                            <th class="none"> Action </th>
                            {{-- <th class="text-center"> <b>Actions </b> </th> --}}

                        </tr>
                    </thead>

                    <tbody class="all_bulk_upload_summary">

                    </tbody>


                </table>
            </div>
        </form>


    </div>



    {{-- <div class="col-md-1"></div> --}}

    {{-- </div> <!-- end card-body --> --}}

    {{-- </div> --}}
    {{-- </div> --}}




    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Bulk Upload Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active ">
                                <p class="text-success"><b>Successful Upload</b></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                <p class="text-danger"><b>Failed Upload</b></p>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <br>
                            <div class="table-responsive">
                                <table id="all_successful_uploads_table"
                                    class="table table-bordered table-striped dt-responsive nowrap w-100 all_successful_uploads_table"
                                    style="zoom: 0.9">
                                    <thead>
                                        <tr class="bg-success  text-white">
                                            {{-- <th><b>Record ID</b></th> --}}
                                            <th><b>Name</b></th>
                                            <th><b>Account No.</b></th>
                                            <th><b>Amount</b></th>
                                            <th><b>Ref No.</b></th>
                                            <th><b>&emsp;&emsp;Description&emsp;&emsp;</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="successful_uploads">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane show " id="profile">
                            <br>
                            <div class="table-responsive">
                                <table id="all_failed_uploads_table"
                                    class="table table-bordered table-striped dt-responsive nowrap w-100 all_failed_uploads_table"
                                    style="zoom: 0.9">
                                    <thead>
                                        <tr class="bg-danger  text-white">
                                            {{-- //<th><b>Record ID</b></th> --}}
                                            <th><b>Name</b></th>
                                            <th><b>Account No.</b></th>
                                            <th><b>Amount</b></th>
                                            <th><b>Ref No.</b></th>
                                            <th><b>&emsp;Description&emsp;</b></th>
                                            {{-- //<th><b>&emsp;Edit&emsp;</b></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="failed_uploads">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection


@section('scripts')
    @include('extras.datatables')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script> --}}

    <script type="text/javascript" src="{{ asset('assets/js/pages/transfer/new_bulkTransfer.js') }}"></script>
    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!};
        let customer_no = @json(session('customerNumber'))
    </script>
@endsection
