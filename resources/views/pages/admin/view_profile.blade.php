@extends('layouts.master')



@section('content')
    @php
        $pageTitle = 'Profile';
        $basePath = 'Profile';
        $currentPath = 'View Profile';
    @endphp
    @include('snippets.pageHeader')

    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center ">
                                            @if ($userDetails->Picture == '' || $userDetails->Picture == null)
                                                <img src="{{ asset('assets/images/agent-user.png') }}" alt="image"
                                                    class="rounded-circle img-thumbnail avatar-xxl" width="180" />
                                            @else
                                                <img src={{ $userDetails->Picture }} alt="image"
                                                    class="rounded-circle img-thumbnail avatar-xxl" width="180" />
                                            @endif
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="container">
                                            @if (isset($userDetails->MiddleName))
                                                <h3 class="text-center">

                                                    {{ strtoupper($userDetails->Fname . ' ' . $userDetails->MiddleName . ' ' . $userDetails->SurName) }}
                                                </h3>
                                            @else
                                                <h3 class="text-center">

                                                    {{ strtoupper($userDetails->Fname . ' ' . $userDetails->SurName) }}
                                                </h3>
                                            @endif

                                            <span style="display: block; width: 100% ; border-top: 1px solid #ccc"></span>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <br>
                                                    <a href="reset-password?userId={{ $userDetails->Username }}"
                                                        type="button"
                                                        class="btn btn-outline-info btn-rounded waves-effect waves-light mb-3">
                                                        <b><i class="fe-unlock"></i> Reset Account</b>
                                                    </a>
                                                    <br>
                                                    <a href="forgot-password?userId={{ $userDetails->Username }}"
                                                        type="button"
                                                        class="btn btn-outline-warning btn-rounded waves-effect waves-light mb-3">
                                                        <b><i class="fe-unlock"></i> Forgot Password</b>
                                                    </a>


                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    {{--    --}}
                                    <h4>Personal Details</h4>
                                    <span style="display: block; width: 100% ; border-top: 1px solid #ccc"></span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-danger">First Name</th>
                                                            <td><b
                                                                    class="float-right">{{ strtoupper($userDetails->Fname) }}</b>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Last Name</th>
                                                            <td><b
                                                                    class="float-right">{{ strtoupper($userDetails->SurName) }}</b>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Middle Name</th>
                                                            @if (isset($userDetails->MiddleName))
                                                                <td>
                                                                    <b
                                                                        class="float-right">{{ strtoupper($userDetails->MiddleName) }}</b>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <b class="float-right"></b>
                                                                </td>
                                                            @endif

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Voter ID</th>
                                                            <td><b
                                                                    class="float-right">{{ strtoupper($userDetails->Id) }}</b>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Gender</th>
                                                            @if (isset($userDetails->Gender))
                                                                <td><b
                                                                        class="float-right">{{ strtoupper($userDetails->Gender) }}</b>
                                                                </td>
                                                            @else
                                                                <td><b class="float-right"></b>
                                                                </td>
                                                            @endif

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Date of Birth</th>
                                                            @if (isset($userDetails->DOB))
                                                                <td><b
                                                                        class="float-right">{{ strtoupper($userDetails->DOB) }}</b>
                                                                </td>
                                                            @else
                                                                <td><b class="float-right"></b>
                                                                </td>
                                                            @endif

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive-->
                                        </div>
                                    </div>
                                    {{--    --}}
                                    <br>
                                    <h4>Contact Details</h4>
                                    <span style="display: block; width: 100% ; border-top: 1px solid #ccc"></span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Primary Phone Number</th>
                                                            <td>
                                                                <b
                                                                    class="float-right">{{ strtoupper($userDetails->PhoneNumber) }}</b>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Secondary Phone Number
                                                            </th>
                                                            @if (isset($userDetails->PhoneNumber2))
                                                                <td>
                                                                    <b
                                                                        class="float-right">{{ strtoupper($userDetails->PhoneNumber2) }}</b>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <b class="float-right"></b>
                                                                </td>
                                                            @endif

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Other Phone Number</th>
                                                            @if (isset($userDetails->PhoneNumber3))
                                                                <td>
                                                                    <b
                                                                        class="float-right">{{ strtoupper($userDetails->PhoneNumber3) }}</b>
                                                                </td>
                                                            @else
                                                                <td>
                                                                    <b class="float-right"></b>
                                                                </td>
                                                            @endif

                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive-->
                                        </div>
                                    </div>
                                    {{--    --}}
                                    <br>
                                    <h4>Mandate Details</h4>
                                    <span style="display: block; width: 100% ; border-top: 1px solid #ccc"></span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">

                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-danger">Mandate Details</th>
                                                            @if ($userDetails->UserMandate == 'NationalLevel')
                                                                <td>
                                                                    <b class="float-right"> {{ strtoupper('National') }}
                                                                    </b>
                                                                </td>
                                                            @elseif ($userDetails->UserMandate == 'RegionalLevel')
                                                                <td>
                                                                    <b class="float-right"> {{ strtoupper('Regional') }}
                                                                    </b>
                                                                </td>
                                                            @else<td>
                                                                    <b class="float-right">
                                                                        {{ strtoupper('Constituency') }} </b>
                                                                </td>
                                                            @endif

                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div> <!-- end table-responsive-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


    <div class="conatainer-fluid">
        <h3 class="">Settings &nbsp; > &nbsp; <span class=" text-danger">Profile</span> </h3>

        <div class="row">
            <div class="col-md-4">
                <div class="card"
                    style="border-radius: 10px;background-repeat: no-repeat;background-size: cover; background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">

                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card"
                    style="border-radius: 10px;background-repeat: no-repeat;background-size: cover;backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="  card-body">


                    </div>
                </div>
                <div class="card"
                    style="border-radius: 10px;background-repeat: no-repeat;background-size: cover;backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class=" card-body">


                    </div>
                </div>
                <div class="card"
                    style="border-radius: 10px;background-repeat: no-repeat;background-size: cover;backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class=" card-body">



                        <br><br><br><br><br><br>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">My Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <span style="display: block; width: 100% ; border-top: 1px solid #ccc"></span>
                <div class="modal-body">
                    <div class="table-responsive">
                        <form action="" id="user_profile_edit" autocomplete="off" aria-autocomplete="off">
                            <h4>Personal Details</h4>
                            <table class="table table-striped mb-0">

                                <tbody>
                                    <tr>
                                        <td class="text-danger">First Name</td>
                                        <td><input class="form-control" value="{{ strtoupper($userDetails->Fname) }}" />
                                        </td>
                                        <td class="text-danger">Middle Name</td>
                                        @if (isset($userDetails->MiddleName))
                                            <td><input class="form-control" type="text"
                                                    value="{{ strtoupper($userDetails->MiddleName) }}" /></td>
                                        @else
                                            <td><input class="form-control" type="text" value="" /></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="text-danger">Last Name</td>
                                        <td><input class="form-control" type="text"
                                                value="{{ strtoupper($userDetails->SurName) }}" /></td>
                                        <td class="text-danger">Gender</td>
                                        <td><select class="form-control" id="example-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td class="text-danger">Voter ID</td>
                                        <td><input class="form-control" type="text"
                                                value="{{ strtoupper($userDetails->Id) }}" /></td>
                                        <td class="text-danger">Date of Birth</td>
                                        <td><input class="form-control" id="example-date" type="date" name="date">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4>Contact Details</h4>
                            <table class="table table-striped mb-0">

                                <tbody>
                                    <tr>
                                        <td class="text-danger">Primary Phone Number</td>
                                        <td><input class="form-control"
                                                value="{{ strtoupper($userDetails->PhoneNumber) }}" /></td>
                                        <td class="text-danger">Secondary Phone Number</td>
                                        @if (isset($userDetails->PhoneNumber2))
                                            <td><input class="form-control" type="text"
                                                    value="{{ strtoupper($userDetails->PhoneNumber2) }}" /></td>
                                        @else
                                            <td><input class="form-control" type="text" value="" /></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td class="text-danger">Other Phone Number</td>
                                        @if (isset($userDetails->PhoneNumber3))
                                            <td><input class="form-control" type="text"
                                                    value="{{ strtoupper($userDetails->PhoneNumber3) }}" /></td>
                                        @else
                                            <td><input class="form-control" type="text" value="" /></td>
                                        @endif

                                    </tr>

                                </tbody>
                            </table>
                            <h4>Mandate Details</h4>

                            <table class="table table-striped mb-0">

                                <tbody>
                                    <tr>
                                        <td class="text-danger">Mandate Details</td>
                                        @if ($userDetails->UserMandate == 'NationalLevel')
                                            <td>
                                                <input class="form-control" type="text"
                                                    value="{{ strtoupper('National') }}" />
                                            </td>
                                        @elseif ($userDetails->UserMandate == 'RegionalLevel')
                                            <td>
                                                <input class="form-control" type="text"
                                                    value="{{ strtoupper('Regional') }}" />
                                            </td>
                                        @else<td>
                                                <input class="form-control" type="text">
                                                {{ strtoupper('Constituency') }} />
                                            </td>
                                        @endif
                                    </tr>


                                </tbody>
                            </table>
                            <br><br>

                            <div class="row">

                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-info  btn-md waves-effect waves-light btn-block" type="button"
                                        id="user_profile_edit_button">
                                        <span id="user_profile_submit"><b>Submit</b> </span>
                                        <span class="spinner-border spinner-border-sm mr-1" role="status"
                                            style="display: none" id="spinner" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>


                        </form>
                    </div> <!-- end table-responsive-->

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection


@section('scripts')
    <!-- Datatables init -->
    {{-- <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}

    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('assets/js/view_profile.js') }}"></script>

    <script>
        //var my_username = "{{ session()->get('Username') }}"
    </script>
@endsection
