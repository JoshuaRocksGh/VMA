@extends('layouts.master')


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
                    <div class="table-responsive">
                        <table class="table table-striped dt-responsive nowrap w-100 all_regional_heads_list">

                            <thead class="bg-dark">
                                <tr class="text-white">
                                    <th>No.</th>
                                    <th>Name</th>
                                    {{-- <th>Name</th> --}}
                                    <th>Phone Number</th>
                                    <th>User ID</th>
                                    <th>Region</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <div class="container-fluid">
        <h3 class=""><span class=" text-danger">Regional Users</span> </h3>
        <div class="row">



            <!--  Modal content for the Large example -->
            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title text-white" id="myLargeModalLabel">Regional User Details</h4>
                            <button type="button" class="close bg-white" data-dismiss="modal" aria-hidden="true">×</button>
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
        </div><!-- /.modal -->
    </div>
    </div>
@endsection


@section('scripts')
    <!-- Datatables init -->
    {{-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}
    @include('extras.datatables')



    {{-- <script src="{{ assets('assets/js/all_regional_heads.js') }}"></script> --}}

    <script src="{{ asset('assets/js/all_regional_heads.js') }}"></script>
@endsection
