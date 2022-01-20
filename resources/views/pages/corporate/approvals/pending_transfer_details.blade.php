@extends('layouts.approval_detail')

@section('styles')

    <style>
        @media print {
            .hide_on_print {
                display: none;
            }

            ;
        }

        @page {
            size: A4;
            {{-- margin: 10px; --}}
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            /* ... the rest of the rules ... */
        }


        @font-face {
            font-family: 'password';
            font-style: normal;
            font-weight: 400;
            src: url(https://jsbin-user-assets.s3.amazonaws.com/rafaelcastrocouto/password.ttf);
        }

    </style>



@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="">
                    <div class=" card-body ">
                        <div class="              row">
                            {{-- <div class="col-md-1"></div> --}}

                            <div class="col-md-8">

                                <div class="receipt">
                                    <div class="container card card-body">

                                        <div class="container">
                                            <div class="">
                                                <div class=" col-md-12
                                        body-main">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4 "> <img class="img "
                                                                    alt="InvoIce Template"
                                                                    src="{{ asset('assets/images/' . env('APPLICATION_INFO_LOGO_LIGHT')) }} "
                                                                    style="zoom: 0.6" /> </div>
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-4 text-right">
                                                                <h4 class="text-primary"><strong>ROKEL COMMERCIAL
                                                                        BANK</strong>
                                                                </h4>
                                                                <p>25-27 Siaka Stevens St</p>
                                                                <p> Freetown, Sierra Leone</p>
                                                                <p>rokelsl@rokelbank.sl</p>
                                                                <p>(+232)-76-22-25-01</p>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="page-header">
                                                            <h2>Approval Form</h2>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-1"></div>

                                                        <div class="container col-md-10 text-center">
                                                            <div class="col-md-12">
                                                                <div id="approval_details"></div>


                                                                <div class="mt-1">

                                                                    <div class="col-md-12 mb-3 pending_status">
                                                                        <div class="row">
                                                                            <div class="col-md-2"></div>
                                                                            <button
                                                                                class="btn btn-danger waves-effect waves-light col-md-3 btn-lg"
                                                                                id="reject_transaction" type="button">Reject
                                                                                <i class="mdi mdi-cancel"></i>
                                                                            </button>
                                                                            <div class="col-md-2"></div>
                                                                            <button
                                                                                class="btn btn-success waves-effect waves-light col-md-3 btn-lg"
                                                                                data-toggle="modal"
                                                                                data-target="#success-alert-modal"
                                                                                id="approve_transaction"
                                                                                type="button">Approve
                                                                                <i class="mdi mdi-check-all"></i>
                                                                            </button>
                                                                            <div class="col-md-2"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 approved_status"
                                                                        style="display: none">
                                                                        <div class="row">
                                                                            <div class="col-md-3"></div>
                                                                            <div class="col-md-6">
                                                                                <div class="alert alert-success"
                                                                                    role="alert">
                                                                                    <i class="mdi mdi-check-all"></i>
                                                                                    <strong>Transaction Approved </strong>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 rejected_status"
                                                                        style="display: none">
                                                                        <div class="row">
                                                                            <div class="col-md-3"></div>
                                                                            <div class="col-md-6">
                                                                                <div class="alert alert-danger"
                                                                                    role="alert">
                                                                                    <i class="mdi mdi-cancel"></i>
                                                                                    <strong>Transaction Rejected</strong>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12 mb-3">
                                                                        <div class="row">
                                                                            <div class="col-md-4"></div>
                                                                            <div class="col-md-4">
                                                                                {{-- <button type="button" class="btn btn-blue btn-sm waves-effect waves-light">Btn Small</button> --}}

                                                                            </div>
                                                                            <div class="col-md-4"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-1"></div>


                                                        <br><br>

                                                        {{-- <div>
                                                            <div class="col-md-12">
                                                                <p><b>Date Posted :</b> {{ date('d F, Y') }}</p> <br /> <br />
                                                                <p><b>Posted By : {{ session('userId') }}</b></p>
                                                            </div>
                                                        </div> --}}
                                                        <br><br>
                                                        {{-- <div class="row">
                                                            <div class="col-md-5"></div>
                                                            <div class="col-md-2">
                                                                  <button class="btn btn-light btn-rounded hide_on_print text-center"
                                                                    type="button" onclick="window.print()">Print
                                                                    Receipt
                                                                </button>


                                                            </div>
                                                            <div class="col-md-5"></div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="p-3 mt-4 mt-lg-0">
                                        <h4 class="mb-1 text-center">Account Mandate</h4>
                                        <h2 id="account_mandate"></h2>
                                        {{-- <div class="table-responsive">
                                            <table class="table mb-0 table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td id="account_mandate"><h3></h3></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div> --}}

                                    </div>
                                </div>

                                {{-- <br> --}}
                                <div class="card">
                                    <div class="p-3 mt-4 mt-lg-0">
                                        <h4 class="mb-1 text-center">Initiated By</h4>
                                        <h2 id="initiated_by"></h2>
                                        {{-- <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td id="initiated_by"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> --}}

                                    </div>
                                </div>

                                {{-- <br> --}}
                                <div class="card">
                                    <div class="p-3 mt-4 mt-lg-0">
                                        <h4 class="mb-1 text-center">Status</h4>
                                        <span id="approvers_list"></span>

                                        {{-- <h2 class="approvers">Jonas Korankye</h2>
                                        <h2 class="approvers">Joshua Tetteh</h2> --}}


                                    </div>
                                </div>


                                <div class="">
                                    <div class="card-box">
                                        <h4 class="header-title mb-1 text-center">Approvers</h4>


                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Mandate</th>

                                                    </tr>
                                                </thead>
                                                <tbody class="approvers_list">

                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card-box -->
                                </div> <!-- end col -->





                            </div>



                        </div>
                    </div>

                </div> <!-- end card-body -->



            </div> <!-- end col -->

        </div> <!-- end row -->



        <!--  Modal content for the Large example -->
        <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-info" id="myLargeModalLabel"> BULK TRANSACTION DETAILS</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class=" card-body table-responsive">

                                    <table id="datatable-buttons"
                                        class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                                        <thead>
                                            <tr class="bg-secondary text-white">
                                                <th>No</th>
                                                <th>
                                                    <span id="bulk_header">Credit Acc</span>
                                                    <span id="bkorp_header">Mobile Number</span>
                                                </th>
                                                <th>Name</th>
                                                <th>Amount</th>

                                            </tr>
                                        </thead>

                                        <tbody class="bulk_upload_list_body">

                                        </tbody>


                                    </table>


                                </div> <!-- end card body-->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




    </div>
    </div>

@endsection

@section('scripts')
    <!-- third party js -->

    @include('extras.datatables')



    <script>
        function account_mandate() {

            var customer = @json($customer_no);
            var request = @json($request_id);
            var mandate = @json($mandate)

            //console.log(customer);
            //console.log(request);
            //console.log(mandate);

            $.ajax({
                type: 'GET',
                url: "../../pending-request-details-api?customer_no=" + customer + "&request_id=" + request,
                datatype: 'application/json',
                success: function(response) {
                    console.log("pending request detail=>", response);

                    if (response.responseCode == '000') {

                        let pending_request = response.data[0];
                        let approvers_mandate = response.data[1]
                        console.log("pending_request=>", pending_request);

                        if (pending_request == null || pending_request == '') {
                            {{-- Swal.fire('', 'Request does not exit', 'error'); --}}
                            window.close()

                        }

                        $('#account_mandate').text(pending_request.account_mandate);
                        $('#initiated_by').text(pending_request.postedby);


                        let post_date = pending_request.post_date;
                        post_date != null ? append_approval_details("Issue Date", post_date) : '';

                        let request_type = pending_request.request_type;
                        if (request_type == 'SO') {
                            let request_type = 'Standing Order';
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'RTGS') {
                            let request_type = 'RTGS Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'SAB') {
                            let request_type = 'Same Bank Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                        } else if (request_type == 'OWN') {
                            let request_type = 'Own Account Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                        } else if (request_type == 'ACH') {
                            let request_type = 'ACH Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'OBT') {
                            let request_type = 'Other Bank Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'INTB') {
                            let request_type = 'International Bank Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'BULK') {
                            let request_type = 'Bulk Payment'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                            request_type != null ? append_approval_details_bulk("Request Type", request_type) :
                                '';

                        } else if (request_type == 'DTRA') {
                            let request_type = 'Direct Transfer'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                            {{-- }else if (request_type == 'BULK'){
                                let request_type = 'Bulk Payment'
                                request_type != null ? append_approval_details("Request Type" , request_type) : ''; --}}

                        } else if (request_type == 'STR') {
                            let request_type = 'Statement Request'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'FD') {
                            let request_type = 'Fixed Deposit'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'STST') {
                            let request_type = 'Stop Standing Order'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'COMPL') {
                            let request_type = 'Complaints'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'CHQR') {
                            let request_type = 'Cheque Book Request'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'UTL') {
                            let request_type = 'Utility'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                        } else if (request_type == 'AIR') {
                            let request_type = 'Airtime'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                        } else if (request_type == 'MOM') {
                            let request_type = 'Mobile Money'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';

                        } else if (request_type == 'KORP') {
                            let request_type = 'E-Korpor Transaction'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                        } else if (request_type == 'BKORP') {
                            let request_type = 'Bulk E-Korpor Transaction'
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                            request_type != null ? append_approval_details_bulk("Request Type", request_type) :
                                '';
                        } else {
                            let request_type = ''
                            request_type != null ? append_approval_details("Request Type", request_type) : '';
                        }


                        let posted_by = pending_request.postedby;
                        posted_by != null ? append_approval_details("Posted By", posted_by) : '';

                        let debit_account = pending_request.account_no;
                        debit_account != null ? append_approval_details("Debit Account", debit_account) : '';

                        let currency = pending_request.currency;

                        currency = pending_request.currency == ('ACH' || 'RTGS') ? pending_request.currency :
                            pending_request.currency;
                        currency != null ? append_approval_details("Currency", currency) : '';



                        let amount = pending_request.amount;
                        amount != null ? append_approval_details("Amount", formatToCurrency(parseFloat(
                            amount))) : '';



                        let total_amount = pending_request.total_amount;
                        total_amount != null ? append_approval_details("Total Amount", formatToCurrency(
                            parseFloat(total_amount))) : '';



                        let bank_name = pending_request.bank_name;
                        bank_name != null ? append_approval_details("Bank Name", bank_name) : '';

                        let beneficiary_account = pending_request.creditaccountnumber;
                        beneficiary_account != null ? append_approval_details("Beneficiary Account",
                            beneficiary_account) : '';

                        let beneficiary_address = pending_request.beneficiaryaddress;
                        beneficiary_address != null ? append_approval_details("Beneficiary Address",
                            beneficiary_address) : '';

                        let beneficiary_name = pending_request.beneficiaryname;
                        beneficiary_name != null ? append_approval_details("Beneficiary Name",
                            beneficiary_name) : '';

                        let beneficiary_telephone = pending_request.beneficiarytelephone;
                        beneficiary_telephone != null ? append_approval_details("Beneficiary Telephone",
                            beneficiary_telephone) : "";



                        let narration = pending_request.narration;
                        narration != null ? append_approval_details("Narration", narration) : '';

                        let category = pending_request.category;
                        category != null ? append_approval_details("Cartegory", category) : '';

                        let batch_number = pending_request.batch;
                        batch_number != null ? append_approval_details("Batch Number", batch_number) : '';

                        let reference_number = pending_request.ref_no;
                        reference_number != null ? append_approval_details("Reference Number",
                            reference_number) : '';



                        let order_number = pending_request.order_number;
                        order_number != null ? append_approval_details("Order Number", order_number) : '';

                        let start_date = pending_request.trans_start;
                        start_date != null ? append_approval_details('Start Date', start_date) : '';

                        let end_date = pending_request.trans_end;
                        end_date != null ? append_approval_details("End Date", end_date) : '';

                        let frequency = pending_request.frequency;
                        frequency != null ? append_approval_details("Frequency", frequency) : '';

                        let cheque_number_from = pending_request.cheque_from;
                        cheque_number_from != null ? append_approval_details("Cheque Number From",
                            cheque_number_from) : '';

                        let cheque_number_to = pending_request.cheque_to;
                        cheque_number_to != null ? append_approval_details("Cheque Number To",
                            cheque_number_to) : '';

                        let leaflet = pending_request.leaflet;
                        leaflet != null ? append_approval_details("Number of Leaflet", leaflet) : '';

                        let utility_id = pending_request.utility_id;
                        utility_id != null ? append_approval_details("Utility Id", utility_id) : '';

                        let pending_approvers = pending_request.approvers
                        if (pending_approvers == null || pending_approvers == undefined) {
                            var approvers = 'PENDING APPROVAL'
                            $('#approvers_list').append(`<h2 class="approvers">${approvers}</h2>`)
                        } else {
                            $('#approvers_list').append(`<h2 class="approvers">${pending_approvers}</h2>`)
                        }



                        {{-- $('#request_date').text(pending_request.post_date);
                            $('#request_type').text(pending_request.request_type);
                            $('#posted_by').text(pending_request.postedby);
                            $('#debit_account').text(pending_request.account_no);
                            $('#beneficiary_name').text(pending_request.beneficiary_name);
                            $('#beneficiary_account').text(pending_request.creditaccountnumber);
                            $('#beneficiary_address').text(pending_request.beneficiaryaddress);
                            $('#amount').text(formatToCurrency(parseFloat(pending_request.amount)));
                            $('#total_amount').text(formatToCurrency(parseFloat(pending_request.total_amount)));
                            $('#currency').text(pending_request.currency);
                            $('#Narration').text(pending_request.narration);
                            $('#category').text(pending_request.category);
                            $('#batch_number').text(pending_request.batch);
                            $('#reference_number').text(pending_request.ref_no);
                            $('#frequency').text(pending_request.frequency);
                            $('#cheque_number_from').text(pending_request.cheque_from);
                            $('#cheque_number_to').text(pending_request.cheque_to); --}}

                        console.log(request_type)

                        if (request_type == 'BULK') {
                            ajax_call_bulk_details_endpoint(batch_number)
                            $("#bulk_header").show();
                            $("#bkorp_header").hide();
                        } else if (request_type == 'BKORP') {
                            $("#bkorp_header").show();
                            $("#bulk_header").hide();
                            ajax_call_bulk_korpor_details_endpoint(batch_number)
                        }

                        $.each(approvers_mandate, function(index) {

                            let appr_man = approvers_mandate[index]
                            console.log(appr_man)

                            $('.approvers_list').append(
                                `
                                <tr>
                                    <td>${approvers_mandate[index].first_name} ${approvers_mandate[index].surname}</td>
                                    <td>${approvers_mandate[index].approver_state}</td>
                                </tr>
                                `
                            )

                        })

                        let request_status = response.data.request_status

                        console.log('======');
                        console.log(request_status);
                        console.log('======');

                        if (request_status == 'P') {
                            $('.pending_status').show();
                            $('.approved_status').hide();
                            $('.rejected_status').hide();

                        } else if (request_status == 'A') {
                            $('.approved_status').show();
                            $('.pending_status').hide();
                            $('.rejected_status').hide();
                        } else if (request_status == 'R') {
                            $('.rejected_status').show();
                            $('.pending_status').hide();
                            $('.approved_status').hide();

                        } else {
                            return false;
                        }




                    }

                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        account_mandate(customer, request)
                    }, $.ajaxSetup().retryAfter)
                }
            })
        }

        function ajax_call_bulk_details_endpoint(batch_no) {
            var table = $('.bulk_upload_list').DataTable({
                destroy: true
            });
            var nodes = table.rows().nodes();

            var customer = @json($customer_no);
            var request = @json($request_id);
            {{-- alert(batch_no)
            return false; --}}



            $.ajax({
                type: 'POST',
                url: "../../get-bulk-detail-list-for-approval",
                datatype: 'application/json',
                data: {
                    'batch_no': batch_no
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    if (response.responseCode == '000') {
                        let details = response.data.bulk_details

                        table.clear().draw()
                        let count = 1

                        $.each(details, function(index) {

                            $('.bulk_upload_list_body').append(`
                                    <tr class="">
                                        <th>${count}</th>
                                        <th>${details[index].bban}</th>
                                        <th>${formatToCurrency(parseFloat(details[index].amount))}</th>
                                        <th>${details[index].name}</th>
                                    </tr>
                                `)

                            table.row.add([
                                count,
                                details[index].bban,
                                details[index].name,
                                details[index].amount

                            ]).draw(false)

                            count++
                        })

                    } else {


                    }


                },
                {{-- error: function(xhr, status, error) {
                    setTimeout(function() {
                        ajax_call_bulk_details_endpoint(batch_no)
                    }, $.ajaxSetup().retryAfter)
                } --}}
            })

        }

        function ajax_call_bulk_korpor_details_endpoint(batch_no) {
            var table = $('.bulk_upload_list').DataTable();
            var nodes = table.rows().nodes();

            var customer = @json($customer_no);
            var request = @json($request_id);



            $.ajax({
                type: 'POST',
                url: "../../get-bulk-detail-list-for-approval",
                datatype: 'application/json',
                data: {
                    'batch_no': batch_no
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    if (response.responseCode == '000') {
                        let details = response.data.bulk_details

                        table.clear().draw()
                        let count = 1

                        $.each(details, function(index) {

                            {{-- $('.bulk_upload_list_body').append(`
                                    <tr class="">
                                        <th>${count}</th>
                                        <th>${details[index].bban}</th>
                                        <th>${formatToCurrency(parseFloat(details[index].amount))}</th>
                                        <th>${details[index].name}</th>
                                    </tr>
                                `) --}}

                            table.row.add([
                                count,
                                details[index].mobile_no,
                                details[index].name,
                                details[index].amount

                            ]).draw(false)

                            count++
                        })

                    } else {


                    }


                },
                error: function(xhr, status, error) {
                    setTimeout(function() {
                        ajax_call_bulk_korpor_details_endpoint(batch_no)
                    }, $.ajaxSetup().retryAfter)
                }
            })

        }

        function append_approval_details(description, data) {

            $('#approval_details').append(`<div class="row ">
                    <span class="col-md-6 text-left h4">${description}</span>
                    <span class="col-md-6 text-right text-primary h4">${data}</span>
                </div>
                <hr class="mt-0">`)
        };

        function append_approval_details_bulk(description, data) {

            $('#approval_details').append(`<div class="row ">
                    <span class="col-md-6 text-left h4">Bulk Details</span>
                    <span class="col-md-6 text-right text-primary h4">
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#bs-example-modal-lg">View Transaction Details</button>

                    </span>
                </div>
                <hr class="mt-0">`)
        };

        $(document).ready(function() {

            setTimeout(function() {
                account_mandate();

            }, 300);

            //Reject Button
            $("#reject_transaction").click(function(e) {
                e.preventDefault();
                {{-- alert("Reject Transaction"); --}}

                Swal.fire({
                    title: 'Provide reason for rejection',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonColor: '#f1556c',
                    confirmButtonText: 'Proceed',
                    showLoaderOnConfirm: true,
                    preConfirm: (narration) => {
                        return ajax_post_for_reject();

                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: `${result.value.login}'s avatar`,
                            imageUrl: result.value.avatar_url
                        })
                    }
                })

            })

            $("#approve_transaction").click(function(e) {
                e.preventDefault();



                {{-- alert("Approve Transaction"); --}}

                approve_request();





            })




            function ajax_post() {
                $('#approve_transaction').text("Processing ...")
                siteLoading('true')

                var customer = @json($customer_no);
                var request = @json($request_id);

                $.ajax({
                    type: 'POST',
                    url: "../../approved-pending-request",
                    datatype: 'application/json',
                    data: {
                        'customer_no': customer,
                        'request_id': request
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response)
                        let res = JSON.parse(response);
                        if (res.responseCode == '000') {
                            siteLoading('false')

                            Swal.fire('', res.message, 'success');
                            getAccounts();


                            setTimeout(function() {
                                window.location = 'approvals-pending'
                            }, 3000)


                            {{-- setTimeout(function() {

                                window.opener.location.reload();
                                window.close();
                            }, 3000) --}}


                        } else {
                            siteLoading('false')


                            Swal.fire('', res.message, 'error');

                        }

                        $('#approve_transaction').html(`Approve<i class="mdi mdi-check-all">`)
                    },
                    error: function(xhr, status, error) {
                        $('#approve_transaction').html(`Approve<i class="mdi mdi-check-all">`)
                    }
                })
            }

            function approve_request() {



                Swal.fire({
                    title: 'Do you want to Approve the transaction?',
                    icon: 'question',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: `Proceed`,
                    confirmButtonColor: '#18c40d',
                    cancelButtonColor: '#df1919',
                    {{-- denyButtonText: `Don't save`, --}}
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        ajax_post()

                    } else if (result.isDenied) {
                        Swal.fire('Failed to approve transaction', '', 'info')
                    }
                })


            }

            function ajax_post_for_reject() {
                let narration = $('.swal2-input').val()
                $('#reject_transaction').text("Processing ...")
                var customer_no = @json($customer_no);
                var request_id = @json($request_id);

                console.log(narration)

                $.ajax({
                    type: 'POST',
                    url: "../../reject-pending-request",
                    datatype: 'application/json',
                    data: {
                        'narration': narration,
                        'request_id': request_id,
                        'customer_no': customer_no
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.responseCode == '000') {



                            setTimeout(function() {
                                Swal.fire('', response.message, 'success');
                                window.location = 'approvals-pending'
                            }, 3000)

                        } else {
                            Swal.fire('', response.message, 'error');

                        }

                        $('#reject_transaction').html(`Reject <i class="mdi mdi-cancel">`)
                    },
                    error: function(xhr, status, error) {
                        $('#reject_transaction').html(`Reject <i class="mdi mdi-cancel">`)
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    }
                })
            }

        });
    </script>
@endsection
