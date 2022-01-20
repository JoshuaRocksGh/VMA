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

    <div class="container-fluid">
        <br>
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
                    DETAIL OF BULK UPLOAD

                </h4>
            </div>

            <div class="col-md-4 text-right">
                <h6>
                    <span class="float-right">
                        <p class="text-primary"> Bulk Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Bulk Transfer
                                Detail</b>
                    </span>
                </h6>
            </div>

        </div>

        <hr style="margin: 0px;">
        <br>
    </div>




    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-md-1"></div>

                <div class=" col-md-10">
                    {{-- <p class="text-muted font-14 m-b-20">
                            Parsley is a javascript form validation library. It helps you provide your
                            users with feedback on their form submission before sending it to your
                            server.
                            <hr>
                        </p> --}}


                    <form role="form" class="parsley-examples" id="bulk_upload_form">
                        <div class="card-box col-md-12">


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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-8 offset-4 text-right">

                                            <button type="button"
                                                class="btn btn-danger btn-sm  waves-effect waves-light disappear-after-success"
                                                id="reject_upload_btn">
                                                Reject Upload
                                            </button>

                                            <button type="button" class="btn btn-primary btn-sm  waves-effect waves-light"
                                                id="approve_upload_btn">
                                                Submit Upload
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </form>





                    <div class="card-box" id="beneficiary_table" style="zoom: 0.8;">
                        <br>
                        <div class="col-md-12">

                            <table id="datatable-buttons"
                                class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                                <thead>
                                    <tr class="bg-secondary text-white">
                                        <th>No</th>
                                        <th>Credit Acc</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Ref Number</th>
                                    </tr>
                                </thead>

                                <tbody class="">

                                </tbody>


                            </table>
                        </div>

                    </div>


                </div>

                <div class="col-md-1">
                </div>

            </div> <!-- end card-body -->

        </div>
    </div>



@endsection


@section('scripts')

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    @include('extras.datatables')

    <!-- Datatables init -->
    {{-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}
    <script>
        siteLoading('show')

        function my_account() {
            $.ajax({
                type: 'GET',
                url: 'get-my-account',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data
                    $.each(data, function(index) {

                        $('#my_account').append($('<option>', {
                            value: data[index].accountType + '~' + data[index].accountDesc +
                                '~' + data[index].accountNumber + '~' + data[index]
                                .currency + '~' + data[index].availableBalance
                        }).text(data[index].accountType + '~' + data[index].accountNumber +
                            '~' + data[index].currency + '~' + data[index].availableBalance));

                    });
                },

            })
        }

        var bulk_upload_array_list = []

        function formatToCurrency(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        };




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

                    let ID = 1;

                    //console.log("upload bulk details:", response);

                    if (response.responseCode == '000') {
                        siteLoading('hide')

                        bulk_upload_array_list = response.data;
                        {{-- $('#beneficiary_table').show();
                        $('#beneficiary_list_loader').hide();
                        $('#beneficiary_list_retry_btn').hide(); --}}

                        let bulk_info = bulk_upload_array_list.bulk_info
                        let bulk_details = bulk_upload_array_list.bulk_details
                        let data = bulk_upload_array_list.bulk_details

                        //console.log("bulk_info:", bulk_info);


                        //return false;


                        $('.display_batch_no').text(bulk_info.BATCH_NO)
                        $('.display_narrations').text(bulk_info.DESCRIPTION)
                        $('.display_debit_account_no').text(bulk_info.ACCOUNT_NO)
                        $('.display_total_amount').text(formatToCurrency(parseFloat(bulk_info.TOTAL_AMOUNT)))

                        $.each(data, function(index) {
                            //console.log(data[index])

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
                                                                                                                                                                                                                                                                                                                                                                <button class="btn btn-sm btn-success" style="zoom:0.8;"> Approved</button>
                                                                                                                                                                                                                                                                                                                                                                 &nbsp;
                                                                                                                                                                                                                                                                                                                                                                 <button class="btn btn-sm btn-danger" style="zoom:0.8;"> Reject</button>
                                                                                                                                                                                                                                                                                                                                                                 </span>  `

                            table.row.add([
                                ID++,
                                data[index].BBAN,
                                data[index].NAME,
                                formatToCurrency(parseFloat(data[index].AMOUNT)),
                                data[index].REF_NO



                            ]).draw(false)

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




        function formatToCurrency(amount) {
            return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
        };


        function toaster(message, icon, timer) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: timer,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: icon,
                title: message
            })
        }

        {{-- function post_bulk_transaction(batch_no) {

            Swal.showLoading()

            $.ajax({

                type: 'POST',
                url: 'post-bulk-transaction-api',
                datatype: "application/json",
                'data': {
                    'batch_no': batch_no.trim()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    console.log(response)

                    if (response.responseCode == '000') {
                        toaster(response.message, 'success', 20000)
                        Swal.fire(
                            response.message,

                            'success'
                        )
                    } else {
                        toaster(response.message, 'error', 9000);
                        Swal.fire(
                            response.message,

                            'error'
                        )

                    }
                }
            });
        } --}}



        function submit_upload(batch_no, customer_no) {

            siteLoading("show")

            //const ipAPI = 'post-bulk-transaction-api?batch_no=' + batch_no + "~" + customer_no

            $.ajax({
                type: "GET",
                url: 'post-bulk-transaction-api?batch_no=' + batch_no + "~" + customer_no,
                datatype: 'json',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(response) {
                    siteLoading("hide")

                    if (response.responseCode == '000') {

                        Swal.fire({
                            icon: 'success',
                            title: response.message
                        })

                        setTimeout(function() {
                            window.location = "{{ url('bulk-transfer') }}"
                        }, 3000)
                    }

                },
                error: function(xhr, status, error) {
                    siteLoading("hide")
                    Swal.fire({
                        icon: 'error',
                        title: error
                    })
                }

            })

            {{-- Swal.fire([{
                title: 'Are you sure',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Submit!',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(ipAPI)
                        .then(response => response.json())
                        .then((data) => {
                            if (data.responseCode == '000') {
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message
                                })

                                setTimeout(function() {
                                    window.location = "{{ url('bulk-transfer') }}"
                                }, 3000)
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: data.message
                                })
                            }

                        })
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'API SERVER ERROR'
                            })
                        })
                }
            }]) --}}


        }


        function reject_upload(customer_no) {

            const ipAPI = 'reject-bulk-transaction-api?customer_no=' + customer_no

            Swal.fire([{
                title: 'Are you sure you want to reject',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Reject!',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(ipAPI)
                        .then(response => response.json())
                        .then((data) => {
                            if (data.responseCode == '000') {
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message
                                })

                                setTimeout(function() {
                                    window.location = "{{ url('bulk-transfer') }}"
                                }, 2000)
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: data.message
                                })
                            }
                            {{-- Swal.fire(data.ip) --}}
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'API SERVER ERROR'
                            })
                        })
                }
            }])


        }



        $(document).ready(function() {

            {{-- var customer_no = "057725" --}}
            var customer_no = @json(session('customerNumber'))
            {{-- var customer_no = @json($customer_no) --}}
            var batch_no = @json($batch_no)


            let today = new Date();
            let dd = today.getDate();

            let mm = today.getMonth() + 1;
            const yyyy = today.getFullYear()
            console.log(mm)
            console.log(String(mm).length)
            if (String(mm).length == 1) {
                mm = '0' + mm
            }

            defaultDate = dd + mm + '-' + today.getFullYear()
            console.log(defaultDate)


            $('#approve_upload_btn').click(function() {
                //$(this).text('Processing...')
                submit_upload(batch_no, customer_no)
            })

            $('#reject_upload_btn').click(function() {

                reject_upload(customer_no)
            })



            {{-- $(".date-picker-valueDate").flatpickr({
                altInput: true,
                altFormat: "j F, Y",
                dateFormat: "d-m-Y",
                defaultDate: [defaultDate],
                position: "below"
            }) --}}

            setTimeout(function() {


                bulk_upload_detail_list(customer_no, batch_no)
                {{-- my_account() --}}
            }, 1000)




        });
    </script>

@endsection
