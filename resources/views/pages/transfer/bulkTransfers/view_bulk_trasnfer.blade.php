@extends('layouts.master')


@section('content')
    @php
        $pageTitle = 'DETAIL OF BULK UPLOAD';
        $basePath = 'Bulk Transfer';
        $currentPath = 'Detail of Bulk Transfer';
    @endphp
    @include('snippets.pageHeader')


    <div class="dashboard site-card overflow-hidden">
        <div class=" dashboard-body p-4">
            {{-- <p class="text-muted font-14 m-b-20">
                            Parsley is a javascript form validation library. It helps you provide your
                            users with feedback on their form submission before sending it to your
                            server.
                            <hr>
                        </p> --}}


            <form class="parsley-examples" id="bulk_upload_form">
                <div class="card-box col-md-12">


                    <div class="row">



                        <div class="col-md-3">
                            <h6 class="mb-2 text-dark">Account Number <br>
                                <p class="text-danger display_debit_account_no ">{{ $uploadDetails['debitAccount'] }}</p>
                            </h6>
                        </div>
                        <div class="col-md-3">
                            <h6 class="mb-2 text-dark">Bulk Amount <br>
                                <p class="text-danger display_total_amount ">
                                    {{ number_format($uploadDetails['totalAmount'], 2) }}</p>
                            </h6>
                        </div>




                        <div class="col-md-3 ">
                            <h6 class="mb-2 text-dark">Narration <br>
                                <p class="text-danger display_narrations">{{ $uploadData[0]['transDescription'] }}</p>
                            </h6>
                        </div>
                        <div class="col-md-3 ">
                            <h6 class="mb-2 text-dark">Batch Number <br>
                                <p class="text-danger display_batch_no ">{{ $uploadData[0]['uploadBatch'] }}</p>
                            </h6>

                        </div>




                        <!-- end row -->



                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">

                                <div class="col-md-4">
                                    <button type="button"
                                        class="btn btn-secondary btn-sm  waves-effect waves-light disappear-after-success"
                                        id="reject_upload_btn">
                                        Reject Upload
                                    </button>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 float-right">
                                    <button type="button" class="btn btn-success btn-sm  waves-effect waves-light"
                                        id="approve_upload_btn">
                                        Submit for Approval
                                    </button>
                                </div>





                            </div>
                        </div>
                    </div>

                </div>
                {{-- <button type="button" class="btn btn-primary hello_clicked">Hello</button> --}}


            </form>





            <div class="card-box" id="beneficiary_table" style="zoom: 0.8;">
                <br>
                <div class="col-md-12">

                    <table id="bulk_upload_list"
                        class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                        <thead>
                            <tr class="table-background">
                                <th>No</th>
                                <th>Credit Acc</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Ref Number</th>
                            </tr>
                        </thead>

                        <tbody class="">
                            {{-- @if (isset($uploadData))
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
                            @endif --}}
                        </tbody>


                    </table>
                </div>

            </div>


        </div>





    </div>
@endsection

@section('scripts')
    @include('extras.datatables')

    <script type="text/javascript" src="{{ asset('assets/js/pages/transfer/view_bulk_transfer.js') }}"></script>
    <script type="text/javascript">
        //var table = $(".bulk_upload_list").DataTable()
        //var nodes = table.rows().nodes();
        var batch_no = `{{ $batch_no }}`
    </script>
@endsection
