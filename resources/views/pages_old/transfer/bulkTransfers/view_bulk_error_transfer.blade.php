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

    <div>
        <legend></legend>

        <div class="row">
            <div class="col-12">

                <div class="row">
                    <div class="col-md-1"></div>

                    <div class="  card-body col-md-10">
                        <a href="{{ url()->previous() }}" type="button"
                            class="btn btn-soft-blue btn-sm waves-effect waves-light float-left"><i
                                class="mdi mdi-reply-all-outline"></i>&nbsp;Back</a>
                        <h2 class="header-title text-primary">DETAIL OF BULK UPLOAD</h2>
                        <hr>
                        {{-- <p class="text-muted font-14 m-b-20">
                            Parsley is a javascript form validation library. It helps you provide your
                            users with feedback on their form submission before sending it to your
                            server.
                            <hr>
                        </p> --}}


                        <form role="form" class="parsley-examples" id="bulk_upload_form">
                            <div class="row">


                                <div class="col-md-6">
                                    <h4 class="mb-2">Batch Number : <span class="text-muted mr-2"></span> <b
                                            class="text-primary display_batch_no"></b>
                                    </h4>

                                    <h4 class="mb-2">Narration : <span class="text-muted mr-2"></span> <b
                                            class="text-primary display_narrations"></b>
                                    </h4>

                                </div>



                                <div class="col-md-6">
                                    <h4 class="mb-2">Account Number : <span class="text-muted mr-2"></span> <b
                                            class="text-primary display_debit_account_no"></b>
                                    </h4>

                                    <h4 class="mb-2">Bulk Amount : <span class="text-muted mr-2"></span> <b
                                            class="text-primary display_total_amount"></b>
                                    </h4>

                                </div>




                                <!-- end row -->



                            </div>

                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-8 offset-4 text-right">

                                            <button type="button"
                                                class="btn btn-danger btn-sm btn-rounded waves-effect waves-light disappear-after-success"
                                                id="reject_upload_btn">
                                                Reject Upload
                                            </button>

                                            <button type="button"
                                                class="btn btn-primary btn-sm btn-rounded waves-effect waves-light disappear-after-success"
                                                id="approve_upload_btn">
                                                Submit Upload
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                        </form>
                        <br>

                        <div>
                            <h3 class="text-danger" id="wrong_account_number"><b>- Invalid Account Number</b></h3>
                            {{-- <p><em>Please U</em></p> --}}
                            <h3 class="text-danger" id="insufficient_balance"><b>- Insufficient Funds</b></h3>
                        </div>
                        <br>

                        <div class="row card" id="beneficiary_table" style="zoom: 0.8;">
                            <br>
                            <div class="col-md-12">

                                <table id="datatable-buttons"
                                    class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th>No</th>
                                            <th>Credit Acc</th>
                                            <th>Amount</th>
                                            <th>Name</th>
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

                </div> <!-- end card-body -->

            </div>
        </div>

    </div>

@endsection


@section('scripts')

    @include('extras.datatables')
    <script>
        var bulk_upload_array_list = []

        function formatToCurrency(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        };


        $("#wrong_account_number").hide()
        $("#insufficient_balance").hide()

        function bulk_upload_detail_list(customer_no, batch_no) {
            var table = $('.bulk_upload_list').DataTable({
                destroy: true
            });
            var nodes = table.rows().nodes();
            $.ajax({
                tpye: 'GET',
                url: 'get-bulk-upload-detail-list-api?customer_no=' + customer_no + '&batch_no=' + batch_no,
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);


                    if (response.responseCode == '000') {
                        bulk_upload_array_list = response.data;
                        {{-- $('#beneficiary_table').show();
                        $('#beneficiary_list_loader').hide();
                        $('#beneficiary_list_retry_btn').hide(); --}}

                        let bulk_info = bulk_upload_array_list.bulk_info
                        let bulk_details = bulk_upload_array_list.bulk_details
                        let data = bulk_upload_array_list.bulk_details

                        $('.display_batch_no').text(bulk_info.BATCH_NO)
                        $('.display_narrations').text(bulk_info.DESCRIPTION)
                        $('.display_debit_account_no').text(bulk_info.ACCOUNT_NO)
                        $('.display_total_amount').text(formatToCurrency(parseFloat(bulk_info.TOTAL_AMOUNT)))

                        $.each(data, function(index) {
                            console.log(data[index])
                            if (data[index].BBAN.length != 18 || data[index].BBAN.substring(
                                    0, 3) != 004) {
                                console.log(data[index].BBAN)

                                $("#wrong_account_number").show();

                                let status = ''
                                let bank_type = ''

                                if (data[index].STATUS == 'A') {
                                    status =
                                        `<span class="badge badge-success"> &nbsp; Approved &nbsp; </span> `
                                } else if (data[index].STATUS == 'R') {
                                    status =
                                        `<span class="badge badge-danger"> &nbsp; Rejected &nbsp; </span> `
                                } else {
                                    status =
                                        `<span class="badge badge-warning"> &nbsp; Pending &nbsp; </span> `
                                }

                                if (data[index].BANK_CODE == 'SAB') {
                                    bank_type = `<span class=""> &nbsp; Same Bank &nbsp; </span> `
                                } else {
                                    bank_type = `<span class=""> &nbsp; Other Bank &nbsp; </span> `
                                }

                                let batch =
                                    `<a href="{{ url('bulkFile/${data[index].BATCH_NO}') }}">${data[index].BATCH_NO}</a>`

                                let action =
                                    `<span class="btn-group mb-2">
                                              <button class="btn btn-sm btn-success" style="zoom:0.8;"> Approved</button>&nbsp;
                                              <button class="btn btn-sm btn-danger" style="zoom:0.8;"> Reject</button>
                                        </span>  `

                                table.row.add([
                                    data[index].ID,
                                    data[index].BBAN,
                                    formatToCurrency(parseFloat(data[index].AMOUNT)),
                                    data[index].NAME,


                                ]).draw(false)

                            }

                        })

                    } else {
                        $('#beneficiary_table').hide();
                        $('#beneficiary_list_loader').hide();
                        $('#beneficiary_list_retry_btn').show();


                    }

                },
                error: function(xhr, status, error) {
                    setTimeout(function() {
                        bulk_upload_detail_list()
                    }, $.ajaxSetup().retryAfter)
                }


            })
        }







        $(document).ready(function() {


            {{-- var customer_no = "057725" --}}
            var customer_no = @json(session('customerNumber'))
            {{-- var customer_no = @json($customer_no) --}}
            var batch_no = @json($batch_no)










            setTimeout(function() {
                bulk_upload_detail_list(customer_no, batch_no)

                {{-- my_account() --}}
            }, 1000)




        });
    </script>

@endsection
