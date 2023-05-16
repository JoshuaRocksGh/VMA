@extends('layouts.master')


@section('styles')

<!-- third party css -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->

<style>

</style>

@endsection



@section('content')


<div class="container-fluid">
    <br>
    <!-- start page title -->
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-primary">
                <img src="{{ asset('assets/images/logoRKB.png') }}" alt="logo" style="zoom: 0.05">&emsp;
                BULK TRANSFER UPLOAD

            </h4>

            <p class="text-muted font-14 m-b-20">
                <span> <i class="fa fa-info-circle  text-red"></i> <b style="color:red;">Please
                        Note:&nbsp;&nbsp;</b> <span class="">You can download template for upload (<span class="text-danger"><a href="{{ url('download_same_bank_file') }}" class="text-danger"> Same Bank</a></span>) and
                        (<span> <a href="{{ url('download_other_bank_file') }}" class="text-danger"> Other
                                ACH Bank </a> </span>)</span> </span>

                <hr>
            </p>
        </div>

        <div class="col-md-6 text-right">
            <h6>

                <span class="flaot-right">
                    <b class="text-primary"> Transfer </b> &nbsp; > &nbsp; <b class="text-danger">Own Account</b>


                </span>

            </h6>

        </div>

        <div class="col-md-12 ">
            <hr class="text-primary" style="margin: 0px;">
        </div>

    </div>
</div>



<div>
    <legend></legend>

    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-md-1"></div>

                <div class="card-body col-md-10">


                    <form id="bulk_upload_form" action="{{ url('upload_') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">


                                <div class="form-group ">
                                    <div class="col-12">
                                        <label for="inputEmail3" class="col-12 col-form-label"> Account<span class="text-danger"> *</span></label>
                                        <select class="custom-select " name="my_account" id="my_account" required>
                                            <option value="">Select Account</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="col-12">
                                        <label for="inputEmail3" class="col-12 col-form-label">Bank Type<span class="text-danger"> *</span></label>
                                        <select class="custom-select " name="bank_type" id="bank_type" required>
                                            <option value=""> ---Select Type --</option>
                                            <option value="SAB"> Same Bank </option>
                                            <option value="OTB"> Other Bank </option>
                                        </select>
                                    </div>
                                </div>


                            </div>


                            <div class="col-md-4" id="">


                                <div class="form-group ">
                                    <div class="col-12">
                                        <label for="inputEmail3" class="col-12 col-form-label">Total Amount<span class="text-danger"> *</span></label>
                                        <input type="text" name="bulk_amount" id="bulk_amount" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" class="form-control input-sm" required>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="col-12">
                                        <label for="inputEmail3" class="col-12 col-form-label">Reference Number<span class="text-danger"> *</span></label>
                                        <input type="text" name="reference_no" id="reference_no" class="form-control input-sm" required>
                                    </div>
                                </div>


                            </div>


                            <div class="col-md-4" id="">


                                <div class="form-group ">
                                    <div class="col-12">
                                        <label for="inputEmail3" class="col-12 col-form-label">Value Date<span class="text-danger"> *</span></label>
                                        <input type="text" name="value_date" id="value_date" class="form-control date-picker-valueDate flatpickr-input input-sm" required>

                                    </div>
                                </div>


                                <div class="form-group ">
                                    <div class="col-12">
                                        <label for="inputEmail3" class="col-12 col-form-label">File<span class="text-danger"> *</span></label>
                                        <input type="file" name="excel_file" id="excel_file" class=" input-sm" required>
                                    </div>
                                </div>


                            </div>




                            <!-- end row -->



                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-8 offset-4 text-right">
                                        <button type="submit" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light disappear-after-success" id="submit_cheque_request">
                                            Submit Upload
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>

                    <div class="row card" id="beneficiary_table" style="zoom: 0.8;">
                        <br>

                        <div class="col-md-12">

                            @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif

                            @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                        </div>

                        <div class="col-md-12">

                            <table id="datatable-buttons" class="table table-bordered table-striped dt-responsive nowrap w-100 bulk_upload_list">

                                <thead>
                                    <tr class="bg-secondary text-white">
                                        <th> <b> Batch </b> </th>
                                        <th> <b>Reference </b> </th>
                                        <th> <b> Debit Account </b> </th>
                                        <th> <b> Bulk Amount </b> </th>
                                        <th> <b> Value date </b> </th>
                                        <th> <b> Bank Type </b> </th>
                                        <!-- <th> <b> Status </b> </th> -->
                                        {{-- <th class="text-center"> <b>Actions </b> </th>  --}}

                                    </tr>
                                </thead>

                                <tbody class="">

                                </tbody>


                            </table>
                        </div>


                    </div>


                </div>

                <div class="col-md-1"></div>

            </div> <!-- end card-body -->

        </div>
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
{{-- <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script> --}}
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

<script>

</script>
<script>
    function my_account() {
        $.ajax({
            'type': 'GET'
            , 'url': 'get-my-account'
            , "datatype": "application/json"
            , success: function(response) {
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
            }
            , error: function(xhr, status, error) {

                setTimeout(function() {
                    my_account();
                }, $.ajaxSetup().retryAfter)
            }

        })
    }

    var bulk_upload_array_list = []


    function bulk_upload_list(customer_no, status) {
        var table = $('.bulk_upload_list').DataTable();
        var nodes = table.rows().nodes();
        $.ajax({
            'tpye': 'GET'
            , 'url': 'get-bulk-upload-list-api?customer_no=' + customer_no
            , "datatype": "application/json"
            , success: function(response) {
                console.log(response.data);


                if (response.responseCode == '000') {
                    bulk_upload_array_list = response.data; {
                        {
                            --$('#beneficiary_table').show();
                            $('#beneficiary_list_loader').hide();
                            $('#beneficiary_list_retry_btn').hide();
                            --
                        }
                    }

                    data = bulk_upload_array_list

                    $.each(data, function(index) {
                        console.log(data[index])

                        let status = ''
                        let bank_type = ''

                        if (data[index].status == 'A') {
                            status =
                                `<span class="badge badge-success"> &nbsp; Approved &nbsp; </span> `
                        } else if (data[index].status == 'R') {
                            status =
                                `<span class="badge badge-danger"> &nbsp; Rejected &nbsp; </span> `
                        } else {
                            status =
                                `<span class="badge badge-warning"> &nbsp; Pending &nbsp; </span> `
                        }

                        if (data[index].bank_code == 'I') {
                            bank_type = `<span class=""> &nbsp; Same Bank &nbsp; </span> `
                        } else {
                            bank_type = `<span class=""> &nbsp; Other Bank &nbsp; </span> `
                        }

                        let batch =
                            `<a href="{{ url('view-bulk-transfer?batch_no=${data[index].batch_no}&bulk_amount=${data[index].total_amount}&account_no=${data[index].account_no}&bank_type=${data[index].bank_code}') }}">${data[index].batch_no}</a>`

                        let action =
                            `<span class="btn-group mb-2">
                                                                                                                                                                                        <button class="btn btn-sm btn-success" style="zoom:0.8;"> Approved</button>
                                                                                                                                                                                         &nbsp;
                                                                                                                                                                                         <button class="btn btn-sm btn-danger" style="zoom:0.8;"> Reject</button>
                                                                                                                                                                                         </span>  `

                        table.row.add([
                            batch
                            , data[index].ref_no
                            , data[index].account_no
                            , data[index].total_amount
                            , bank_type
                            , data[index].value_date,
                            // status,
                            //action


                        ]).draw(false)

                    })

                } else {
                    $('#beneficiary_table').hide();
                    $('#beneficiary_list_loader').hide();
                    $('#beneficiary_list_retry_btn').show();
                }

            }
            , error: function(xhr, status, error) {

                setTimeout(function() {
                    bulk_upload_list(customer_no, status)
                }, $.ajaxSetup().retryAfter)
            }
        })
    }




    function formatToCurrency(amount) {
        return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
    };


    function toaster(message, icon, timer) {
        const Toast = Swal.mixin({
            toast: true
            , position: 'top-end'
            , showConfirmButton: false
            , timer: timer
            , timerProgressBar: false
            , didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: icon
            , title: message
        })
    }



    $(document).ready(function() {


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



        $(".date-picker-valueDate").flatpickr({
            altInput: true
            , altFormat: "j F, Y"
            , dateFormat: "d-m-Y"
            , defaultDate: [defaultDate]
            , position: "below"
        })

        var customer_no = @json(session('customerNumber'))

        setTimeout(function() {
            // bulk_upload_list('057725', "P")
            bulk_upload_list(customer_no, "P")
            my_account()
        }, 1000)

        $('#bulk_upload_form').submit(function(e) {
            $('submit_cheque_request').text('Processing ... ')
        })


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); {
            {
                --$('#bulk_upload_form').submit(function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    console.log(formData);
                    return false;

                    $('#image-input-error').text('');

                    $.ajax({
                        type: 'POST'
                        , url: 'http://localhost/laravel/cib_api/public/api/import'
                        , data: formData
                        , contentType: false
                        , processData: false
                        , success: (response) => {
                            if (response) {
                                this.reset();
                                alert('Image has been uploaded successfully');
                            }
                        }
                        , error: function(response) {
                            console.log(response);
                            $('#image-input-error').text(response.responseJSON.errors.file);
                        }
                    });
                });
                --
            }
        }



    });

</script>

@endsection
