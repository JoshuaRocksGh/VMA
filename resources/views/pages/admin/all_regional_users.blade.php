@extends('layouts.master')

@section('style')
    <style>
        .modal-footer button {
            width: 6rem;
        }

        .modal-dialog {
            max-width: 600px !important;
        }

        .wizard-header {
            border: 1px solid #bfc9d4;
            background-color: transparent;
            font-weight: 600;
            font-size: 15px;
            margin-right: 6px;
            border-radius: 33px;
            text-decoration: none;
            padding: 9px 10px;
        }

        .wizard-header.active {
            background-color: var(--primary);
            color: #ffffff;
            border: none
        }
    </style>
@endsection


@section('content')
    @php
        $pageTitle = 'All Users';
        $basePath = 'Users';
        $currentPath = 'All Users';
    @endphp
    @include('snippets.pageHeader')

    <div class="dashboard site-card overflow-hidden">
        <div class="tab-content dashboard-body border-info border ">
            <div class="p-4">
                <div>
                    {{--  <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>  --}}
                    <div class="table-responsive">
                        <table class="table table-striped dt-responsive nowrap w-100 all_regional_heads_list">

                            <thead class="bg-info">
                                <tr class="text-white">
                                    <th>No.</th>
                                    <th>User Name</th>
                                    {{-- <th>Name</th> --}}
                                    <th>Phone Number</th>
                                    <th>User ID</th>
                                    <th>Region</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="request_table">
                                <tr>
                                    <td colspan="6">
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border avatar-lg text-dark  m-2 canvas_spinner"
                                                role="status">
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

            <!--  Modal content for the Large example -->
            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4 class="modal-title text-white" id="myLargeModalLabel">Regional User Details</h4>
                            <button type="button" class="close text-white" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <span style="display: block; width: 100% ; border-top: 1px solid #ccc" class="mt-0"></span>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center ">
                                    <img alt="image" class="img-fluid avatar-lg rounded-circle user_image_id"
                                        style="width:140px;height:140px" />
                                </div>
                                <div class="col-md-4"></div>
                                <hr>

                                <legend></legend>

                                <legend></legend>

                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <legend></legend>
                                    <div class="row user_buttons">

                                        <div class="col-md-4">
                                            <a type="button"
                                                class="btn btn-outline-warning btn-rounded waves-effect waves-light mb-1 user_reset_password"><b>Reset
                                                    Account</b></a>
                                        </div>

                                        <div class="col-md-4 text-center">
                                            <a type="button"
                                                class="btn btn-outline-info btn-rounded waves-effect waves-light mb-1 user_forgot_password"><b>Forgot
                                                    Password</b></a>
                                        </div>

                                        <div class="col-md-4">
                                            <a type="button"
                                                class="btn btn-outline-danger btn-rounded waves-effect waves-light mb-1 float-right user_delete"><b
                                                    class="activate_deactivate_user">Delete
                                                    User</b></a>
                                        </div>
                                    </div>
                                    <legend></legend>


                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">

                                            <tbody>
                                                <tr>
                                                    <th scope="row" class="text-danger">Name</th>
                                                    <td><b class="users_name"></b></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-danger">Phone Number</th>
                                                    <td><b class="user_telephone"></b></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-danger">Mandate Level</th>
                                                    <td><b class="user_mandate"></b></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-danger">Region</th>
                                                    <td><b class="user_region"></b></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row" class="text-danger">User ID</th>
                                                    <td><b class="user_id"></b></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive-->
                                </div>

                                <legend></legend>

                            </div>
                            <div class="col-md-1"></div>

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->

        </div>



    </div>


    {{--  </div>  --}}
@endsection


@section('scripts')
    <!-- Datatables init -->
    {{-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}
    @include('extras.datatables')



    {{-- <script src="{{ assets('assets/js/all_regional_heads.js') }}"></script> --}}

    <script src="{{ asset('assets/js/all_regional_heads.js') }}"></script>
@endsection
