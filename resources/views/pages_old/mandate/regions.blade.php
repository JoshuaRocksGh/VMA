@extends("layouts.master")

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
    <!-- third party css end -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">

    <style>

    </style>

@endsection


@section('content')

    <div class="container-fluid">
        {{-- @if (session()->get('UserMandate') == 'NationalLevel')
            <h3 class=""><span class=" text-danger">{{ $region }}</span> </h3>
        @elseif(session()->get('UserMandate') !== 'NationalLevel')
            <h3 class=""><span class=" text-danger">{{ session()->get('Region') }}</span> </h3>
        @endif --}}
        <h3 class=""><span class=" text-danger">{{ $UserRegion }}</span> </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(136, 198, 197, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">TOTAL POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px;display: none"
                                    class="total_constituencies regional_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(32, 185, 252, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">ASSIGNED POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px; display: none"
                                    class="assigned_constituencies regional_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card"
                    style="background-color: rgba(252, 205, 201, 0.3);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <div class="card-body">
                        <h3 class="text-center mt-0">UNASSIGNED POLLING STATIONS</h3>
                        <div class="row">

                            <div class="col-md-12 text-center">
                                <b style="font-size: 48px ; display: none"
                                    class="unassigned_constituencies regional_assigment">0</b>
                                <span class="spinner-border avatar-sm text-dark m-2" role="status"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-box"
                    style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <h4 class="header-title mb-4">Constituency Details</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="" >
                                    <div class=" card-body">
                                <table id="datatable-buttons"
                                    class="table table-striped dt-responsive nowrap w-100 all_constituency_list">
                                    <thead class="bg-info">
                                        <tr class="text-white">
                                            <th>No.</th>
                                            <th>Constituency Name</th>
                                            <th>Total</th>

                                            <th>Assigned </th>
                                            <th>UnAssigned </th>

                                            <th>Action</th>


                                        </tr>
                                    </thead>

                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->


                </div>
            </div> <!-- end card-box-->
        </div>


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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>


    <script src="{{ asset('assets/js/regionalLevel.js') }}"></script>
    <script>
        var Mandate = @json(session()->get('UserMandate'));

        var UserRegion = `{{ $UserRegion }}`;

        {{-- if (Mandate == "NationalLevel") {
            var UserRegion = UserRegion;
            alert(UserRegion)
            var region = '{{ $region }}'
        } else if (Mandate != "NationalLevel") {
            var UserRegion = UserRegion;

        } --}}
    </script>
@endsection
