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

    <style>

    </style>
@endsection

@section('content')
    <div class="container-fluid hide_on_print">
        <br>
        <!-- start page title -->
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-sm btn-soft-blue waves-effect waves-light"
                    id="page_back_button"><i class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>
            </div>

            <div class="col-md-4">
                <h4 class="text-primary mb-0 page-header text-center text-uppercase">
                    <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                    PENDING APPROVAL

                </h4>
            </div>

            <div class="col-md-4 text-right">
                <h6>

                    <span class="flaot-right">
                        <b class="text-primary"> Approval </b> &nbsp; > &nbsp; <b class="text-danger">Pending
                            Approval</b>


                    </span>

                </h6>

            </div>

            <div class="col-md-12 ">
                <hr class="text-primary" style="margin: 0px;">
            </div>

        </div>
    </div>

    <div>
        <br>
        <div class="row">
            <br> <br><br>
            <div class="col-12">
                <div class="">
                    <div class="">

                        <div class=" row">


                            <div class="col-md-12">


                                <div class="card card-body table-responsive">

                                    <table id="datatable-buttons"
                                        class="table dt-responsive  table-bordered table-striped nowrap w-100 pending_transaction_request "
                                        style="zoom: 0.8;">
                                        <thead>
                                            <tr class="bg-info text-white">
                                                <th>Rquest Id</th>
                                                <th>Req-Type</th>
                                                <th>Account No</th>
                                                <th>Amount</th>
                                                <th>Transfer Purpose</th>
                                                <th>Posted Date</th>
                                                <th>Initiated By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>



                                    </table>


                                </div> <!-- end card body-->



                            </div>



                        </div> <!-- end card-body -->




                        <!-- Info Alert Modal -->
                        <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-body p-4">
                                        <div class="text-center">
                                            <i class="dripicons-information h1 text-info"></i>
                                            <h4 class="mt-2">Heads up!</h4>
                                            <p class="mt-3">Cras mattis consectetur purus sit amet fermentum. Cras
                                                justo
                                                odio, dapibus ac facilisis in, egestas eget quam.</p>
                                            <button type="button" class="btn btn-info my-2"
                                                data-dismiss="modal">Continue</button>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->




                        <!-- Modal -->
                        <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                        <div class="modal-header">
                                            <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                                Details</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                        </div>

                                        <div class="modal-body">


                                            <div class="row" id="transaction_summary">


                                                <div class="col-md-12">
                                                    <div class="border p-3 mt-4 mt-lg-0 rounded">
                                                        <h4 class="header-title mb-3">Transfer Detail Summary</h4>

                                                        <div class="table-responsive">
                                                            <table class="table mb-0">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>From Account:</td>
                                                                        <td>
                                                                            <span
                                                                                class="font-13 text-primary text-bold display_from_account_type"
                                                                                id="display_from_account_type"></span>
                                                                            <span
                                                                                class="d-block font-13 text-primary text-bold display_from_account_name"
                                                                                id="display_from_account_name"> </span>
                                                                            <span
                                                                                class="d-block font-13 text-primary text-bold display_from_account_no"
                                                                                id="display_from_account_no"></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>To Account:</td>
                                                                        <td>

                                                                            <span
                                                                                class="font-13 text-primary text-bold display_to_account_type"
                                                                                id="display_to_account_type"> </span>
                                                                            <span
                                                                                class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                                id="display_to_account_name"> </span>
                                                                            <span
                                                                                class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                                id="display_to_account_no"> </span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Amount:</td>
                                                                        <td>
                                                                            <span
                                                                                class="font-15 text-primary h3 display_currency"
                                                                                id="display_currency"> </span>
                                                                            &nbsp;
                                                                            <span
                                                                                class="font-15 text-primary h3 display_transfer_amount"
                                                                                id="display_transfer_amount"></span>

                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>Category:</td>
                                                                        <td>
                                                                            <span
                                                                                class="font-13 text-primary h3 display_category"
                                                                                id="display_category"></span>

                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>Purpose:</td>
                                                                        <td>
                                                                            <span
                                                                                class="font-13 text-primary h3 display_purpose"
                                                                                id="display_purpose"></span>
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>Schedule Payment:</td>
                                                                        <td>
                                                                            <span
                                                                                class="font-13 text-primary h3 display_schedule_payment"
                                                                                id="display_schedule_payment">NO </span>
                                                                            &nbsp; | &nbsp;
                                                                            <span
                                                                                class="font-13 text-primary h3 display_schedule_payment_date"
                                                                                id="display_schedule_payment_date"> N/A
                                                                            </span>
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td>Transfer Date: </td>
                                                                        <td>
                                                                            <span class="font-13 text-primary h3"
                                                                                id="display_transfer_date">{{ date('d F, Y') }}</span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Posted BY: </td>
                                                                        <td>
                                                                            <span class="font-13 text-primary h3"
                                                                                id="display_posted_by">Kwabena Ampah</span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Enter Pin: </td>
                                                                        <td>
                                                                            <div class="form-group">
                                                                                <input type="text" name="user_pin"
                                                                                    class="form-control" id="user_pin"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                            </div>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end table-responsive -->
                                                        <br>
                                                        <div class="form-group text-center">
                                                            <span> <button class="btn btn-secondary btn-rounded"
                                                                    type="button" id="back_button">Back</button> &nbsp;
                                                            </span>
                                                            <span>&nbsp; <button class="btn btn-primary btn-rounded"
                                                                    type="button" id="confirm_button">Confirm Transfer
                                                                </button></span>
                                                            <span>&nbsp; <button class="btn btn-light btn-rounded"
                                                                    type="button" id="receipt_button">Print Receipt
                                                                </button></span>
                                                        </div>
                                                    </div>

                                                </div> <!-- end col -->





                                            </div>


                                        </div>



                                        <div class="modal-footer">
                                            <button type="send" id="send" class="btn btn-primary"
                                                data-target="#multiple-two" data-toggle="modal"
                                                data-dismiss="modal">Send</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->




                    </div> <!-- end col -->

                </div> <!-- end row -->



            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @include("extras.datatables")

    <script>
        let customer_no = @json(session()->get('customerNumber'));
        //var customer_no = @json(session()->get('customerNumber'));
    </script>

    {{-- <script src="{{ asset('assets/js/pages/approvals/pending_approval.js') }}"></script> --}}
    <script src="{{ asset('assets/js/pages/approvals/pending_approvals.js') }}"></script>
@endsection
