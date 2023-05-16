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

<div class="container-fluid hide_on_print">
    <br>
    <!-- start page title -->
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">
                <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                BULK KORPOR PAYMENTS
            </h4>
        </div>

        <div class="col-md-6 text-right">
            <h6>

                <span class="flaot-right">
                    <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Same Bank</b>
                </span>

            </h6>

        </div>

        <div class="col-md-12 ">
            <hr class="text-primary" style="margin: 0px;">
        </div>

    </div>
</div>

    <div>
        <div class="row">


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">BULK E-KORPOR UPLOAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="bulk_upload_form" action="{{ url('korpor_upload_') }}" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Example file input</label>
                                  <input type="file" name="excel_file" id="excel_file" class="form-control-file" >
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="add_korpor" tabindex="-1" role="dialog" aria-labelledby="AddKorporModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddKorporModalLabel">BULK E-KORPOR UPLOAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="" action="#" method="post" enctype="multipart/form-data" autocomplete="off" aria-autocomplete="off">
                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Beneficiary Name</label>
                                  <input type="text" name="add_name" id="add_name" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Telephone Number</label>
                                    <input type="text" name="add_phone" id="add_phone" class="form-control" >
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Amount (SLL)</label>
                                    <input type="text" name="add_amount" id="add_amount" class="form-control" >
                                  </div>

                              </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="edit_korpor" tabindex="-1" role="dialog" aria-labelledby="AddKorporModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditKorporModalLabel">BULK E-KORPOR UPLOAD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="#" method="post" enctype="multipart/form-data" autocomplete="off" aria-autocomplete="off">
                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Beneficiary Name</label>
                                  <input type="text" name="edit_name" id="edit_name" class="form-control" >
                                  <input type="hidden" name="edit_id" id="edit_id" class="form-control" >
                                  <input type="hidden" name="edit_customer_no" id="edit_customer_no" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Telephone Number</label>
                                    <input type="text" name="edit_phone" id="edit_phone" class="form-control" >
                                  </div>

                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Amount (SLL)</label>
                                    <input type="text" name="edit_amount" id="edit_amount" class="form-control" >
                                  </div>

                              </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="edit_save_changes_btn" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Launch demo modal
                </button>
            </div>
            <br>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-12">


                                <div class="card-body">

                                    {{-- <h4 class="header-title">Buttons example</h4>
                                    <p class="sub-header font-13">
                                        The Buttons extension for DataTables provides a common set of options, API
                                        methods and styling to display buttons on a page
                                        that will interact with a DataTable. The core library provides the based
                                        framework upon which plug-ins can built.
                                    </p> --}}

                                    <table id="datatable-buttons"
                                        class="table table-striped table-bordered dt-responsive nowrap w-100 pending_transaction_request"
                                        style="zoom: 0.9;">
                                        <thead>
                                            <tr class="bg-secondary text-white">
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                                <th>data</th>
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
                                            <p class="mt-3">Cras mattis consectetur purus sit amet fermentum. Cras justo
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


        @endsection

        @section('scripts')

            <!-- third party js -->
            <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
            </script>
            <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
            <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
            <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
            <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
            <!-- third party js ends -->

            <!-- Datatables init -->
            <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

            <script>
                function get_corporate_requests() {
                    var table = $('.pending_transaction_request').DataTable();
                    var nodes = table.rows().nodes();

                  //Remove the six coulumn and redraw
                    table.column(6).visible( false, false );
                    table.columns.adjust().draw( false );

                    $.ajax({
                        type: "GET",
                        url: "get-bulk-korpor-upload-detail-list-api",
                        datatype: "application/json",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.responseCode == '000') {

                                let data = response.data;

                                table.clear().draw()

                                let count = 0
                                $.each(data, function(index) {

                                    count++

                                    table.row.add([
                                        count,
                                        data[index].name,
                                        data[index].phone,
                                        data[index].amount,
                                        '09-12-2021',
                                        `
                                          <button class="btn btn-sm btn-info edit_korpor_btn" onclick="GetKorporDetails(this)" data-korpor="${JSON.stringify(data[index])}" data-toggle="modal" data-target="#edit_korpor">Edit</button>

                                        &nbsp;
                                        <a href="#">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </a>
                                        `,
                                        data[index]


                                    ]).draw(false)


                                })


                            } else {

                            }

                        },
                        error: function(xhr, status, error) {

                        }

                    })


                }

                function GetKorporDetails(data)
                {
                    var dataRow = $('.pending_transaction_request').DataTable().row($(data).closest('tr')).data();

                    $('#edit_id').val('');
                    $('#edit_customer_no').val('');
                    $('#edit_name').val('');
                    $('#edit_name').val('');
                    $('#edit_name').val('');

                    let korpor_detail = dataRow[6]

                    $('#edit_id').val(korpor_detail.id);
                    $('#edit_customer_no').val(korpor_detail.customer_no);
                    $('#edit_name').val(korpor_detail.name);
                    $('#edit_phone').val(korpor_detail.phone);
                    $('#edit_amount').val(korpor_detail.amount);

                    {{--  alert(dataRow[0]);  --}}
                    console.log(dataRow[6]);
                }

                $(document).ready(function() {

                    $('#edit_save_changes_btn').click(function(){
                        let id = $('#edit_id').val();
                        let customer_no = $('#edit_customer_no').val();
                        let name = $('#edit_name').val();
                        let phone = $('#edit_phone').val();
                        let amount = $('#edit_amount').val();


                        if(('' == amount.trim())  || ('' == phone.trim())  || ('' == amount.trim())  ) {
                            alert('erroor')
                            return false;
                        }else{
                            alert("klsdjlkfs")

                            let data = {
                                id: id,
                                customer_no: customer_no,
                                name: name,
                                phone: phone,
                                amount: amount
                            }

                            $.ajax({
                                type: "GET",
                                url: "update-korpor-upload-detail-list-api",
                                datatype: "application/json",
                                data: data,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response.responseCode == '000') {

                                        get_corporate_requests()

                                    } else {

                                    }

                                },
                                error: function(xhr, status, error) {

                                }

                            })

                        }


                    })

                    $('.transfer_tab_btn').click(function() {
                        get_corporate_requests()
                    })
                    get_corporate_requests()

                    $('button.edit_korpor_btn').click(function(){
                        alert('hi');
                        var one_korpor = JSON.parse($(this).data('korpor'))
                        console.log(one_korpor)
                    })
                })

            </script>

        @endsection
