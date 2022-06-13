@extends('layouts.master')


@section('content')
    @php
    $pageTitle = ' TRANSFER STATUS';
    $basePath = 'Transfer';
    $currentPath = 'Tansfer Status';
    @endphp
    <!-- start page title -->
    @include('snippets.pageHeader')
    {{-- </div> --}}
    <div class="dashboard site-card" id="transaction_summary">

        <div class="table-responsive p-4 dashboard-body p-2">

            <table class="table table-bordered mt-5 table-striped display responsive nowrap w-100"
                id="transfer_status_table">
                <thead>
                    <tr class="bg-primary  text-white ">
                        <th class="all"> Date </th>
                        <th class="all"> Beneficiary Name </th>
                        <th class="all"> Amount </th>
                        <th class="all"> Account Description </th>
                        <th class="all"> Account Number </th>
                        <th class="none"> Status </th>
                        <th class="none"> Action </th>
                    </tr>
                </thead>
                <tbody id="transfer_status_body">
                    <td colspan="100%" class="text-center">

                        {!! $noDataAvailable !!}
                    </td>

                </tbody>
            </table>
        </div> <!-- end card body-->
    </div> <!-- end row -->


    <!-- Standard modal content -->
    <div id="transfer_status_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="transfer_status"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h3 class="modal-title modal-title font-18 font-weight-bold text-white" id="transfer_status_title">
                        Transfer
                        Details</h3>
                </div>
                <div class="modal-body">
                    <h4 class="text-primary text-center">Sender Info</h4>
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th class="col-5"> Account Name</th>
                                <td id="sender_name"></td>
                            </tr>
                            <tr>
                                <th class="col-5"> Account Number:</th>
                                <td id="sender_account"></td>
                            </tr>
                            <tr>
                                <th class="col-5"> Customer Number</th>
                                <td id="sender_customer_number"></td>
                            </tr>
                        </tbody>
                    </table>
                    <h4 class="text-primary text-center">Beneficiary Info</h4>

                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th class="col-5">Beneficiary Name</th>
                                <td id="beneficiary_name"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Beneficiary Account Number:</th>
                                <td id="beneficiary_account"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Beneficiary Bank</th>
                                <td id="beneficiary_bank"></td>
                            </tr>
                        </tbody>
                    </table>
                    <h4 class="text-primary text-center">Transfer Info</h4>

                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th class="col-5">Amount</th>
                                <td id="transfer_amount"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Batch Number</th>
                                <td id="batch_number"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Channel</th>
                                <td id="transfer_channel"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Transfer Date</th>
                                <td id="transfer_date"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Transfer Stage</th>
                                <td id="transfer_stage"></td>
                            </tr>
                            <tr>
                                <th class="col-5">Transfer Status</th>
                                <td id="transfer_status"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
@endsection

@section('scripts')
    @include('extras.datatables')
    <script>
        const customerNumber = @json(session()->get('customerNumber'));
    </script>
    <script src="{{ asset('assets/js/pages/transfer/transferStatus.js') }}"></script>
@endsection
