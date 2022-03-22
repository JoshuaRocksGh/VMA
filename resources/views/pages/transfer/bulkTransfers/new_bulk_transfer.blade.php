@extends('layouts.master')


@section('styles')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- third party css end -->
@endsection



@section('content')
    <div class="container-fluid">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url()->previous() }}" type="button"
                    class="btn btn-sm btn-soft-blue waves-effect waves-light float-left"><i
                        class="mdi mdi-reply-all-outline"></i>&nbsp;Go
                    Back</a>
            </div>
            <div class="col-md-4">
                <h4 class="text-primary mb-0 page-header text-center text-uppercase">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    BULK TRANSFER UPLOAD



                </h4>
            </div>

            <div class="col-md-4 text-right">
                <h6>
                    <span class="float-right">
                        <p class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Bulk Transfer</b>
                    </span>
                </h6>
            </div>

        </div>

        <hr style="margin: 0px;">
        <br>

        <div class="col-md-12 ">

            <p class="text-muted font-14 m-r-20 m-b-20">
                <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please Note:&nbsp;&nbsp;</b>
                </span> You can download template for upload (<span class="text-danger"><a
                        href="{{ url('download_same_bank_file') }}" class="text-danger"> Same Bank</a></span>)

                {{-- and
                        (<span> <a href="{{ url('download_other_bank_file') }}" class="text-danger"> Other ACH Bank
                            </a>
                        </span>)</> </span> --}}
                {{-- <span class="text-danger mt-0" style="font-size: 14px"><em>Total Amount should be equal to the
                                summation of excel Amounts.
                            </em> </span> --}}

                {{-- <span class="text-danger mt-0" style="font-size: 14px"><em>Reference Number should be the same with
                                the excel Ref Number.</em> </span> --}}
            </p>


        </div>



    </div>



    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-10">

                    <form id="bulk_upload_form" action="#" enctype="multipart/form-data">
                        @csrf




                        {{-- <hr class="mt-0"> --}}


                        <div class="row">
                            <div class="card-box col-md-12">
                                <h4 for="" class=" text-primary"><b> Account to transfer from</b><span
                                        class="text-danger">*</span></h4>

                                <div class="form-group">

                                    <select class="form-control " name="my_account" id="my_account" required>
                                        <option value="">Select Source Account</option>
                                        @include('snippets.accounts')

                                    </select>
                                </div>
                            </div>


                            <div class="card-box col-md-12">
                                <div class="row">
                                    <h4 for="" class="col-12 col-form-label text-primary"><b>Transfer Details</b></h4>

                                    <div class="col-md-4 form-group ">
                                        <label for="inputEmail3" class="text-primary">Bank Type<span
                                                class="text-danger">
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
                                        <input type="text" name="bulk_amount" id="bulk_amount"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                            class="form-control input-sm" required>
                                    </div>





                                    <div class="col-md-4 form-group">
                                        <label for="inputEmail3" class="text-primary">Reference
                                            Number<span class="text-danger"> *</span></label>
                                        <input type="text" name="reference_no" id="reference_no"
                                            class="form-control input-sm" required>

                                    </div>



                                    <div class="col-md-4 form-group">
                                        <label for="inputEmail3" class="text-primary">Value Date<span
                                                class="text-danger">
                                                *</span></label>
                                        <input type="date" id="value_date" name="value_date" placeholder="Enter value date"
                                            class="form-control" required>
                                        {{-- parsley-trigger="change" autocomzplete="none" --}}
                                        {{-- data-provide="datepicker" data-date-autoclose="true" --}}
                                    </div>




                                    <div class="col-md-4 form-group">
                                        <label for="inputEmail3" class="col-12 col-form-label text-primary">File<span
                                                class="text-danger"> *</span></label>
                                        <input type="file" name="excel_file" id="excel_file" class=" input-sm"
                                            required>
                                    </div>



                                    <!-- end row -->







                                    <br>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-8 offset-4 text-right">
                                                <button type="submit"
                                                    class="btn btn-primary btn-sm  waves-effect waves-light disappear-after-success p-1"
                                                    id="submit_cheque_request">
                                                    <b>Submit File</b>
                                                </button>
                                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#full-width-modal">Full width Modal</button></b> --}}

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>




                    </form>


                    <div class="card-box col-md-12" id="beneficiary_table">


                        <div class="col-md-12">
                            <h4 class="text-primary"><b>Transfer Summary</b></h4>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4>{{ $errors->first() }}</h4>
                                </div>
                            @endif
                            <table id=""
                                class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list"
                                style="zoom: 0.9;">

                                <thead>
                                    <tr class="bg-info text-white">
                                        {{-- <th> <b> Batch </b> </th> --}}
                                        <th> Reference </th>
                                        <th> Debit Account </th>
                                        <th> File Total Amount </th>
                                        <th> Value date </th>
                                        <th> Total Upload </th>
                                        {{-- <th> Successful </th> --}}
                                        <th> Failed </th>
                                        <th>&emsp; &emsp;&emsp; Action &emsp;&emsp;&emsp; </th>
                                        {{-- <th class="text-center"> <b>Actions </b> </th> --}}

                                    </tr>
                                </thead>

                                <tbody class="all_bulk_upload_summary">

                                </tbody>


                            </table>
                        </div>


                    </div>


                </div>

                <div class="col-md-1"></div>

            </div> <!-- end card-body -->

        </div>
    </div>

    <!-- Full width modal content -->
    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Bulk Upload Deatails</h4>
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
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-bordered table-striped dt-responsive nowrap w-100 all_successful_uploads_table"
                                    style="zoom: 0.9">
                                    <thead>
                                        <tr class="bg-success  text-white">
                                            <th><b>Record ID</b></th>
                                            <th><b>Name</b></th>
                                            <th><b>Account No.</b></th>
                                            <th><b>Amount</b></th>
                                            <th><b>Ref No.</b></th>
                                            <th><b>&emsp;&emsp;Description&emsp;&emsp;</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="successful_uploads">
                                        <tr>
                                            <td colspan="6">
                                                <div class="d-flex justify-content-center">
                                                    <br>
                                                    {!! $noDataAvailable !!}


                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane show " id="profile">
                            <div class="table-responsive">
                                <table id=""
                                    class="table table-bordered table-striped dt-responsive nowrap w-100 all_failed_uploads_table"
                                    style="zoom: 0.9">
                                    <thead>
                                        <tr class="bg-danger  text-white">
                                            <th><b>Record ID</b></th>
                                            <th><b>Name</b></th>
                                            <th><b>Account No.</b></th>
                                            <th><b>Amount</b></th>
                                            <th><b>Ref No.</b></th>
                                            <th><b>&emsp;Description&emsp;</b></th>
                                            <th><b>&emsp;Edit&emsp;</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="failed_uploads">
                                        <tr>
                                            <td colspan="6">
                                                <div class="d-flex justify-content-center">
                                                    <br>
                                                    {!! $noDataAvailable !!}


                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <!-- Standard modal content -->
    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Record Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="" id="update_uplod_form">
                        @csrf

                        @if ($errors->any())
                            <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Record ID</label>
                            <input type="text" class="form-control col-md-7 upload_recordID" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Name</label>
                            <input type="text" class="form-control col-md-7 upload_name" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Account No.</label>
                            <input type="text" class="form-control col-md-7 upload_accountNumber" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Amount</label>
                            <input type="text" class="form-control col-md-7 upload_amount" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Trans. Descripition</label>
                            <input type="text" class="form-control col-md-7 upload_description" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Bank</label>
                            <input type="text" class="form-control col-md-7 upload_bank" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Reference No.</label>
                            <input type="text" class="form-control col-md-7 upload_referenceNumber" required>
                        </div>

                        <div class="form-group row mb-1">
                            <label for="" class="col-md-5">Batch</label>
                            <input type="text" class="form-control col-md-7 upload_batch" readOnly required>
                        </div>



                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary save_update">Save changes</button>
                        </div>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    </div>
@endsection


@section('scripts')
    @include('extras.datatables')
    <script type="text/javascript" src="{{ asset('assets/js/pages/transfer/new_bulkTransfer.js') }}"></script>
    <script>
        let noDataAvailable = {!! json_encode($noDataAvailable) !!}
        let customer_no = @json(session('customerNumber'))
    </script>
@endsection
