@extends('layouts.master')

@section('content')

    <div></div>
    <legend></legend>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-1"></div>

                        <div class="col-md-10">

                            <h3 class=" m-t-0 text-primary" style="cursor: pointer;" onclick="window.history.back()"><i
                                    class="fe-arrow-left"></i> &nbsp; SAME BANK BENEFICIARY</h3>

                            <p class="text-muted font-14 m-b-20">
                                Parsley is a javascript form validation library. It helps you provide your
                                users with feedback on their form submission before sending it to your
                                server.
                            </p>
                            <hr>


                            <div class="row" id="transaction_form">


                                <div class="col-md-12">
                                    <form action="#" id="same_bank_beneficiary_form" autocomplete="off"
                                        aria-autocomplete="off">
                                        {{-- @csrf --}}
                                        <div class="row">




                                            <div class="col-md-6">
                                                <h4 class="text-primary"> Account Details</h4>
                                                <hr>
                                                <div class="form-group row">
                                                    {{-- <label class="purple-color"> Beneficiary Account Details</label><br> --}}
                                                    <label class="col-4">Account Number: <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input class="form-control" type="text" class="form-control"
                                                            id="account_number"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                            placeholder="Account Number" required>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-4">Account Name: <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" id="account_name"
                                                            parsley-trigger="change" placeholder="Account Name" readonly
                                                            required>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-4">Account Currency: <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input type="hidden" class="form-control" readonly value=""
                                                            id="select_currency">
                                                        <input type="text" class="form-control" readonly value=""
                                                            id="select_currency_i">
                                                    </div>



                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <h4 class="text-primary"> Beneficiary Details</h4>
                                                <hr>


                                                <div class="form-group row">

                                                    <label class="col-4">Beneficiary Name: <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" id="beneficiary_name"
                                                            parsley-trigger="change" placeholder="Beneficiary Name"
                                                            required>
                                                    </div>

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-4">Beneficiary Phone : <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control"
                                                            id="beneficiary_mobile_number"
                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                            parsley-trigger="change" placeholder="Beneficiary Mobile Number"
                                                            required>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-4">Beneficiary Address: <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input type="text" class="form-control" id="beneficiary_address"
                                                            parsley-trigger="change" placeholder="Beneficiary Address"
                                                            required>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-4">Beneficiary Email: <span
                                                            class="text-danger">*</span></label>
                                                    <div class="col-7">
                                                        <input type="email" class="form-control" id="beneficiary_email"
                                                            parsley-trigger="change" placeholder="Beneficiary Email"
                                                            required>
                                                    </div>

                                                </div>




                                                <div class="form-group">

                                                    <div class="checkbox checkbox-primary mb-2" id="transfer_email">
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2">
                                                            Email beneficiary when a transfer is made
                                                        </label>
                                                    </div>

                                                </div>

                                                <p class="sub-header font-13">
                                                    Providing beneficairy email and checking

                                                </p>

                                                <button class="btn btn-primary waves-effect waves-light btn-rounded"
                                                    type="submit" id="save_beneficiary">Next</button>


                                            </div>

                                            <br>



                                        </div>

                                    </form>




                                </div> <!-- end col -->





                                <!-- end row -->



                            </div>

                            <div class="row">
                                <div class="col-md-12">


                                    <form action="#" method="POST" id="same_bank_beneficiary_form_summary"
                                        autocomplete="off" aria-autocomplete="off">
                                        <div class="card-box">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>Account Number:&emsp;</label><span
                                                            class="font-weight-light mr-2" id="display_account_number">
                                                            &nbsp</span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Account Name:&emsp;</label><span
                                                            class="font-weight-light mr-2" id="display_account_name">
                                                            &nbsp</span>

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Account currency:&emsp;</label><span
                                                            class="font-weight-light mr-2" id="display_account_currency">
                                                            &nbsp</span>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        {{-- <label class="purple-color">Beneficiary Personal Details</label><br> --}} <br>
                                                        <label>Beneficiary Name:&emsp;</label><span
                                                            class="font-weight-light mr-2" id="display_beneficiary_name">
                                                            &nbsp</span>

                                                        {{-- <input type="text" class="form-control" id="beneficiary_name" data-toggle="input-mask" data-mask-format="00/00/0000 00:00:00" placeholder="Beneficiary Name" required> --}}

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Beneficiary Mobile Number:&emsp;</label><span
                                                            class="font-weight-light mr-2"
                                                            id="display_beneficiary_mobile_number">
                                                            &nbsp</span><br>

                                                        {{-- <input type="text" class="form-control" id="beneficiary_email" data-toggle="input-mask" data-mask-format="00000-000" placeholder="Beneficiary Email" required> --}}

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Beneficiary Address:&emsp;</label><span
                                                            class="font-weight-light mr-2" id="display_beneficiary_Address">
                                                            &nbsp</span><br>

                                                        {{-- <input type="text" class="form-control" id="beneficiary_email" data-toggle="input-mask" data-mask-format="00000-000" placeholder="Beneficiary Email" required> --}}

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Beneficiary Email:&emsp;</label><span
                                                            class="font-weight-light mr-2" id="display_beneficiary_email">
                                                            &nbsp</span><br>


                                                    </div>



                                                    <div class="form-group">

                                                        <div class="">
                                                            {{-- <input id="checkbox2" type="checkbox"> --}}
                                                            <label>Email beneficiary when a transfer is
                                                                made:&emsp;</label><span class="font-weight-light mr-2"
                                                                id="display_transfer_email">
                                                                &nbsp</span>


                                                        </div>

                                                    </div>


                                                    <button type="submit"
                                                        class="btn btn-secondary btn-rounded waves-effect waves-light"
                                                        id="save_beneficiary_back">Back</button>&emsp;&emsp;
                                                    <button class="btn btn-primary btn-rounded waves-effect waves-light"
                                                        type="submit" id="save_beneficiary_summary_btn"><span
                                                            id="confirm_save_beneficiary_text">Save Beneficiary</span>

                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-1"></div>

                    </div> <!-- end card-body -->


                    <!-- /.modal -->



                </div> <!-- end col -->

            </div> <!-- end row -->



        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $(document).ready(function() {

                $('#save_beneficiary').hide('')

                $('#same_bank_beneficiary_form_summary').hide();
                $('#account_number_error').hide();
                $('#account_name_error').hide();
                $('#beneficiary_name_error').hide();
                $('#beneficiary_email_error').hide();
                {{-- $('#spinner').hide(),
                $('#spinner-text').hide(), --}}


                function toaster(message, icon) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
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
                };

                function getAccountDescription(account_no) {
                    $.ajax({
                        "type": "POST",
                        "url": "get-account-description",
                        "datatype": "application/json",
                        "data": {
                            "authToken": "string",
                            "accountNumber": account_no
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {

                            console.log(response.responseCode)
                            if (response.responseCode == "000") {
                                console.log(response.data)
                                toaster(response.message, 'success');
                                $('#account_name').val(response.data.accountDescription)
                                $('#select_currency_i').val(response.data.accountCurrencyDescription)
                                $('#select_currency').val(response.data.accountCurrencyCode + '~' +
                                    response.data.accountCurrencyDescription)

                                $('#save_beneficiary').show('')

                            } else {
                                toaster(response.message, 'error');
                                $('#account_name').val('')
                                $('#select_currency_i').val('')
                                $('#select_currency').val('')
                                $('#save_beneficiary').hide('')


                            }
                        }

                    })
                };


                $("#account_number").keyup(function() {
                    let account_no = $(this).val();
                    if (account_no.length > 10) {
                        getAccountDescription(account_no)
                    }


                })

                $('#same_bank_beneficiary_form').submit(function(e) {
                    e.preventDefault();


                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name = $('#beneficiary_name').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var beneficiary_number = $('#beneficiary_mobile_number').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[1];
                    console.log(currency_);

                    var account_number = $('#account_number').val();
                    $('#display_account_number').text(account_number);

                    var account_name = $('#account_name').val();
                    $('#display_account_name').text(account_name);

                    var currency_ = currency[1];
                    $('#display_account_currency').text(currency);

                    var beneficiary_name = $('#beneficiary_name').val();
                    $('#display_beneficiary_name').text(beneficiary_name);

                    var beneficiary_email = $('#beneficiary_email').val();
                    $('#display_beneficiary_email').text(beneficiary_email);

                    var beneficiary_number = $('#beneficiary_mobile_number').val();
                    $('#display_beneficiary_mobile_number').text(beneficiary_number);

                    var beneficiary_address = $('#beneficiary_address').val();
                    $('#display_beneficiary_Address').text(beneficiary_address)

                    var transfer_email = $("#transfer_email input[type='checkbox']:checked").val();
                    if (transfer_email == 'on') {
                        $('#display_transfer_email').text('Yes');
                    } else {
                        $('#display_transfer_email').text('No');
                    }


                    if (account_number.trim() != '' && account_name.trim() != '' && beneficiary_name
                        .trim() != '' && beneficiary_email.trim() != '' && beneficiary_number.trim() !=
                        '' &&
                        beneficiary_address.trim() != '') {
                        $('#same_bank_beneficiary_form').hide();
                        $("#same_bank_beneficiary_form_summary").toggle('500');

                    }

                })


                $('#save_beneficiary_back').click(function(e) {
                    e.preventDefault(e);

                    $("#same_bank_beneficiary_form").toggle('500');
                    $('#same_bank_beneficiary_form_summary').hide();

                })


                $('#same_bank_beneficiary_form_summary').submit(function(e) {
                    e.preventDefault();
                    var account_number = $('#account_number').val();
                    var account_name = $('#account_name').val();
                    var beneficiary_name = $('#beneficiary_name').val();
                    var currency = $('#select_currency').val().split('~');
                    var currency_ = currency[1];
                    console.log(currency);
                    var beneficiary_number = $('#beneficiary_mobile_number').val();
                    var beneficiary_address = $('#beneficiary_address').val();
                    var beneficiary_email = $('#beneficiary_email').val();
                    var send_email = $("#transfer_email input[type='checkbox']:checked").val();
                    if (send_email) {
                        var transfer_email = ('Y');
                    } else {
                        var transfer_email = ('N');
                    }

                    {{-- $('#spinner').show();
                    $('#spinner-text').show();
                    $('#confirm_save_beneficiary_text').hide();
                    $('#save_beneficiary_summary_btn').attr('disabled',true); --}}


                    function redirect_page() {
                        window.location.href = "{{ url('beneficiary-list') }}";

                    };

                    $.ajax({
                        "type": "POST",
                        "url": "same-bank-beneficiary-api",
                        "datatype": "application/json",
                        "data": {
                            "account_number": account_number,
                            {{-- "account_name": account_name, --}} "account_currency": currency_,
                            "beneficiary_name": beneficiary_name,
                            "beneficiary_email": beneficiary_email,
                            "send_mail": transfer_email,
                            "number": beneficiary_number,
                            "beneficiary_address": beneficiary_address
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {

                            console.log(response.responseCode)
                            if (response.responseCode == "000") {
                                toaster(response.message, 'success');

                                setTimeout(function() {

                                    redirect_page();
                                }, 3000);

                                {{-- $('#spinner').hide();
                            $('#spinner-text').hide();

                            $('#confirm_save_beneficiary_text').show();
                            $('#save_beneficiary_summary_btn').attr('disabled',false); --}}

                            } else {
                                toaster(response.message, 'error');
                                {{-- $('#spinner').hide();
                            $('#spinner-text').hide();
                            $('#confirm_save_beneficiary_text').show();
                            $('#save_beneficiary_summary_btn').attr('disabled',false); --}}
                            }
                        }

                    })

                });

                {{-- var bene_id = @json($bene_id) ;
                console.log($bene_id) ; --}}

            });

        </script>
    @endsection
