@extends('layouts.master')


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


                    <form class="parsley-examples" id="bulk_upload_form">
                        <div class="card-box col-md-12">


                            <div class="row">



                                <div class="col-md-6">
                                    <h4 class="mb-2 text-primary">Batch Number : <b
                                            class="text-danger display_batch_no font-12">{{ $uploadData[0]['uploadBatch'] }}</b>
                                    </h4>

                                    <h4 class="mb-2 text-primary">Narration : <b
                                            class="text-danger display_narrations font-12">{{ $uploadData[0]['transDescription'] }}</b>
                                    </h4>

                                </div>



                                <div class="col-md-6">
                                    <h4 class="mb-2 text-primary">Debit Account Number : <b
                                            class="text-danger display_debit_account_no font-12">{{ $uploadDetails['debitAccount'] }}</b>
                                    </h4>

                                    <h4 class="mb-2 text-primary">Bulk Amount : <b
                                            class="text-danger display_total_amount font-12">{{ $uploadDetails['totalAmount'] }}</b>
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
                        <button type="button" class="btn btn-primary hello_clicked">Hello</button>


                    </form>





                    <div class="card-box" id="beneficiary_table" style="zoom: 0.8;">
                        <br>
                        <div class="col-md-12">

                            <table id="datatable-buttons"
                                class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                                <thead>
                                    <tr class="bg-info text-white">
                                        <th>No</th>
                                        <th>Credit Acc</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Ref Number</th>
                                    </tr>
                                </thead>

                                <tbody class="">
                                    @if (isset($uploadData))
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($uploadData as $data)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $data['accountNumber'] }}</td>
                                                <td>{{ $data['name'] }}</td>
                                                <td>{{ $data['amount'] }}</td>
                                                <td>{{ $data['refNumber'] }}</td>
                                            </tr>
                                            @php
                                                $count = $count + 1;
                                            @endphp
                                        @endforeach
                                    @endif
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
    @include('extras.datatables')

    <script type="text/javascript">
        //var table = $(".bulk_upload_list").DataTable()
        //var nodes = table.rows().nodes();

        function submit_upload(batch_no) {

            siteLoading("show")

            //const ipAPI = 'post-bulk-transaction-api?batch_no=' + batch_no + "~" + customer_no

            $.ajax({
                type: "GET",
                url: 'post-bulk-transaction-api?batch_no=' + batch_no,
                datatype: "application/json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(response) {
                    console.log(response)
                    //return false
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
            var batch_no = @json($batch_no)

            $('#approve_upload_btn').click(function() {
                //console.log(batch_no)
                submit_upload(batch_no)
            })

            $('#reject_upload_btn').click(function() {
                reject_upload(batch_no)
            })


        })
    </script>
@endsection
