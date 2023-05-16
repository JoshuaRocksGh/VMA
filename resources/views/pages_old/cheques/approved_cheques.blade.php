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

    <div>

        <div class="row">
            <br> <br>
            <div class="col-12">
                <div class="card">
                    <div class="card-body card-background-image">

                        <div class="row">

                            <div class="col-md-12">
                                <p class="sub-header font-18 purple-color" style="cursor: pointer" onclick="window.history.back()">
                                    <b>  Cheques Approved  </b>

                                </p>
                                <hr>
                            </div>

                            <div class="col-md-12">

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="transfer_tab">

                                        <div class="card-body">

                                            <table id="datatable-buttons"
                                                class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Account No</th>
                                                        <th>Name</th>
                                                        <th>Cheque No</th>
                                                        <th>Currency</th>
                                                        <th>Amount To Be Withdraw</th>
                                                    </tr>
                                                </thead>


                                                <tbody>

                                                    <tr>
                                                        <td>004008210057725128</td>
                                                        <td>Kwabena Ampah</td>
                                                        <td class="text text-info" data-toggle="modal" data-target="#bs-example-modal-lg">9143</td>
                                                        <td>GHS</td>
                                                        <td>30,000</td>
                                                    </tr>
                                                    <tr>
                                                        <td>004008210059825128</td>
                                                        <td>Joshua Amarfio</td>
                                                        <td class="text text-info" data-toggle="modal" data-target="#bs-example-modal-lg">9145</td>
                                                        <td>GHS</td>
                                                        <td>60,000</td>
                                                    </tr>
                                                    </tbody>
                                            </table>


                                        </div> <!-- end card body-->


                                </div>

                            </div>
                        </div>



                    </div> <!-- end card-body -->

                    </div> <!-- end col -->

                </div> <!-- end row -->



            </div>

            <!--  Modal content for the Large example -->
            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Pending Cheque ready for approval</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('assets/images/cheque.png') }}"/>
                            <br/>
                            <img src="{{ asset('assets/images/back_cheque.jpg') }}"/>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


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

        @endsection
