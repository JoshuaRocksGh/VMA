@extends('layouts.master')

@section('content')
    @php
        $pageTitle = 'BULK TRANSFER UPLOAD';
        $basePath = 'Transfer';
        $currentPath = 'Bulk Transfer';
    @endphp

    @include('snippets.pageHeader')



    <div class="dashboard site-card overflow-hidden">
        <ul class="list-unstyled text-blue">
            <li><i class="fa fa-info-circle text-red"></i>
                <i> <b style="color:red;">Please Note: </b> Download template for upload
                    (<span class="text-danger"><a href="{{ url('download_other_bank_file') }}" class="text-danger"> Click
                            Here to Download </a></span>)
                    {{--  <ol>
                        <li>Template can be used for single upload of same bank and other banks.</li>
                        <li>If an error is found in file uploaded, please delete and re-upload.</li>
                    </ol>  --}}
                </i>
            </li>
        </ul>
        {{--  <p class="text-muted font-14 m-r-20 m-b-20" data-title="Excel File" data-intro="Click to download template for upload">
            <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please Note:&nbsp;&nbsp;</b>
            </span> Download template for upload (<span class="text-danger"><a href="{{ url('download_other_bank_file') }}"
                    class="text-danger"> Click
                    Here to Download </a></span>)


        </p>  --}}
        <form id="bulk_upload_form" class="dashboard-body p-4" action="#" enctype="multipart/form-data">
            @csrf

            <div class="row ">

                <div class="col-md-12">
                    <label class="text-dark">Account to transfer from</label>

                    <div class="form-group" data-title="Account Tab" data-intro="Click to select account">

                        <select class="accounts-select " name="my_account" id="my_account" required>
                            <option disabled selected value=""> --- Select Source Account --- </option>
                            @include('snippets.accounts')

                        </select>

                    </div>
                    <hr class="mt-0">

                </div>
                {{--  <div class="col-md-7">
                    <div class="col-md-12">
                        <br>
                        <label for="">Account Name: <span class="account-desc-name"></span></label><br>
                        <label for="">Account Number: <span class="account-desc-number"></span></label><br>
                        <label for="">Account Balance: <span class="account-desc-balance"></span></label>
                    </div>


                </div>  --}}



                <div class="card-box col-md-12">
                    <label class="font-weight-bold text-danger">Transfer Details</label>
                    <br>
                    <div class="row">
                        {{-- <h4 for="" class="col-12 col-form-label text-primary"><b>Transfer Details</b></h4> --}}


                        {{--  <div class="col-md-4 form-group ">
                            <label for="inputEmail3" class="text-dark">Bank Type<span class="text-danger">
                                    *</span></label>
                            <select class="custom-select " name="bank_type" id="bank_type" required>
                                <option value="SAB" selected> Same Bank </option>
                                <option value="OTB"> Other Bank </option>
                            </select>
                        </div>  --}}



                        <div class="col-md-2 form-group" data-title="Bulk Amount" data-intro="Enter total amount">
                            <label for="inputEmail3" class="text-dark">Bulk
                                Amount<span class="text-danger"> *</span></label>
                            <input type="text" name="bulk_amount" id="bulk_amount" pattern="([0-9]{1,3}).([0-9]{1,3})"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                class="form-control input-sm" autocomplete="off" required>
                        </div>





                        <div class="col-md-5 form-group" data-title="Reference"
                            data-intro="Enter reference same on upload file">
                            <label for="inputEmail3" class="text-dark">Upload Reference
                                <span class="text-danger"> *</span></label>
                            <input type="text" name="reference_no" id="reference_no" class="form-control input-sm"
                                autocomplete="off" required>

                        </div>






                        <div class="col-md-5 form-group" data-title="Reference"
                            data-intro="Enter reference same on upload file">
                            <label for="inputEmail3" class="text-dark">Transfer Narration
                                <span class="text-danger"> *</span></label>
                            <input type="text" name="transfer_narration" id="transfer_narration" autocomplete="off"
                                class="form-control input-sm" autocomplete="off" required>

                        </div>
                        <div class="col-md-2 form-group" data-title="Vaue Date" data-intro="Select date">
                            <label for="inputEmail3" class="text-dark">Value Date<span class="text-danger">
                                    *</span></label>
                            <input type="date" id="value_date" name="value_date" placeholder="Enter value date"
                                autocomplete="off" class="form-control" required>
                            {{-- parsley-trigger="change" autocomzplete="none" --}}
                            {{-- data-provide="datepicker" data-date-autoclose="true" --}}
                        </div>


                        <div class="col-md-5 form-group" data-title="Upload File" data-intro="Click to choose file">
                            <label for="inputEmail3" class="text-dark">Choose Upload File<span class="text-danger">
                                    *</span></label>
                            <input class="p-2" type="file" name="excel_file" id="excel_file" class=" input-sm"
                                autocomplete="off" required>
                        </div>



                        <div class="col-md-5 form-group" data-title="Upload File" data-intro="Click to choose file">
                            <label for="inputEmail3" class=" text-dark">Transaction Invoice<span class="text-danger">
                                    *</span></label>
                            <input class="p-2" type="file" name="transaction_voucher" id="transaction_voucher"
                                autocomplete="off" class="input-sm " required>
                        </div>



                        <!-- end row -->






                        <br>



                        <!-- Large modal -->
                        {{-- <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#bs-example-modal-lg">Large Modal</button> --}}
                        <br>
                        <hr>
                        <div class="col-md-12" data-title="Upload Button" data-intro="Click to upload">
                            <div class="form-group row">
                                <div class="col-8 offset-4 text-right">
                                    <button type="submit"
                                        class="btn next-button btn-rounded disappear-after-success form-button "
                                        id="submit_cheque_request">
                                        Validate File
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

            <div class="breakpoint" data-title="Upload Summary" data-intro="View Upload Summary">
                <label class="font-weight-bold text-danger">Transfer Summary</label>
                <br>




                {{--  <table id="bulk_upload_list"
                    class="table table-bordered table-striped display responsive nowrap w-100 bulk_upload_list"
                    style="zoom: 0.9;">

                    <thead>
                        <tr class="table-background">
                            <th class="all"> Reference </th>
                            <th class="all"> Debit Account </th>
                            <th class="all"> Total Upload Amount </th>
                            <th class="all"> Value date </th>
                            <th class="none"> Total Upload </th>
                            <th class="none"> Failed </th>
                            <th class="none"> Action </th>

                        </tr>
                    </thead>

                    <tbody class="all_bulk_upload_summary">

                    </tbody>


                </table>  --}}

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 pb-2">
                                <p class=" mb-2  text-danger">Reference</p>
                                <h4 class="upload_reference"></h4>
                            </div>
                            {{--    --}}
                            <div class="col-md-4 pb-2">
                                <p class="mb-2  text-danger">
                                    Debit Account
                                </p>
                                <h4 class="upload_debit_account"></h4>
                            </div>
                            {{--    --}}
                            <div class="col-md-4 pb-2">
                                <p class="mb-2  text-danger">
                                    Total Upload Amount
                                </p>
                                <h4 class="upload_total_amount"></h4>

                            </div>
                            {{--    --}}
                            <div class="col-md-4 pb-2">
                                <p class="mb-2 text-danger">
                                    Total Upload</p>
                                <h4 class="upload_total"></h4>

                            </div>
                            {{--    --}}
                            <div class="col-md-4 pb-2">
                                <p class="mb-2  text-danger">
                                    Successful Upload</p>
                                <span class="upload_successful"></span>

                            </div>
                            {{--    --}}
                            <div class="col-md-4 pb-2">
                                <p class="mb-2  text-danger">
                                    Failed Upload</p>
                                <span class="upload_failed"></span>

                            </div>
                            <br><br><br>
                            {{--    --}}
                            <div class="col-md-4"></div>
                            <br><br>

                            {{--    --}}
                            <div class="pt-4 col-md-4 upload_action"></div>
                            <br><br>

                            {{--    --}}
                            <div class="col-md-4"></div>

                        </div>
                    </div>

                </div>
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
                                        <tr class="table-background">
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
                                        <tr class="table-background">
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
