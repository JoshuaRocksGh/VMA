@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-background-image">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>

                        {{-- page title --}}
                        <div class="col-md-10">
                            <div class="row" id="transaction_summary">
                                <div class="col-md-12">
                                    <h3 class="text-primary">Request Draft</h3>
                                        <hr>

                                        <div class="border p-3 mt-4 mt-lg-0 rounded">
                                            <h4 class="header-title mb-3">Loan Summary</h4>

                                            <div class="table-responsive">
                                                <table class="table mb-0">

                                                    <tbody>
                                                        <tr>
                                                            <td>Loan Product:</td>
                                                            <td>
                                                                <span
                                                                    class="font-13 text-primary text-bold display_from_account_type"
                                                                    id="display_from_account_type"></span>
                                                                <span
                                                                    class="d-block font-13 text-primary text-bold display_from_account_name"
                                                                    id="display_from_account_name"> </span>
                                                                <span
                                                                    class="d-block font-13 text-primary text-bold display_from_account_no"
                                                                    id="display_from_account_no"></span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>To Account:</td>
                                                            <td>

                                                                <span
                                                                    class="font-13 text-primary text-bold display_to_account_type"
                                                                    id="display_to_account_type"> </span>
                                                                <span
                                                                    class="d-block font-13 text-primary text-bold display_to_account_name"
                                                                    id="display_to_account_name"> </span>
                                                                <span
                                                                    class="d-block font-13 text-primary text-bold display_to_account_no"
                                                                    id="display_to_account_no"> </span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Amount:</td>
                                                            <td>
                                                                <span class="font-15 text-primary h3 display_currency"
                                                                    id="display_currency"> </span>
                                                                &nbsp;
                                                                <span class="font-15 text-primary h3 display_transfer_amount"
                                                                    id="display_transfer_amount"></span>

                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Loan Duration:</td>
                                                            <td>
                                                                <span class="font-13 text-primary h3 display_category"
                                                                    id="display_category"></span>

                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Purpose:</td>
                                                            <td>
                                                                <span class="font-13 text-primary h3 display_purpose"
                                                                    id="display_purpose"></span>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Schedule Payment:</td>
                                                            <td>
                                                                <span class="font-13 text-primary h3 display_schedule_payment"
                                                                    id="display_schedule_payment">NO </span>
                                                                    &nbsp; | &nbsp;
                                                                <span class="font-13 text-primary h3 display_schedule_payment_date" id="display_schedule_payment_date"> N/A
                                                                </span>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Loan Date: </td>
                                                            <td>
                                                                <span class="font-13 text-primary h3"
                                                                    id="display_transfer_date">{{  date('d F, Y') }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Posted BY: </td>
                                                            <td>
                                                                <span class="font-13 text-primary h3"
                                                                    id="display_posted_by">Joshua Tetteh</span>
                                                            </td>
                                                        </tr>

                                                        {{-- <tr>
                                                            <td>Enter Pin: </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" name="user_pin" class="form-control"
                                                                        id="user_pin"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                                </div>
                                                            </td>
                                                        </tr> --}}


                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- end table-responsive -->
                                            <br>

                                            <div class="form-group text-center">
                                                <b>Loan Status</b>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td><b >Your Score:</b></td>
                                                                <td>
                                                                    <span class="font-20 text-primary h3 display_category"
                                                                        id="" style="font-size: 20px"><b>You Failed</b></span>

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Loan Score:</td>
                                                                <td>
                                                                    <span class="font-20 text-primary h3 display_category"
                                                                        id=""><b>50%</b></span>
                                                                </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <br/>
                                            <div class="form-group text-center">
                                                <span> <button class="btn btn-secondary btn-rounded" type="button"
                                                        id="back_button">Back</button> &nbsp; </span>
                                                <span>&nbsp; <button class="btn btn-primary btn-rounded" type="button"
                                                        id="confirm_button">Confirm Loan </button></span>
                                                <span>&nbsp; <button class="btn btn-light btn-rounded" type="button"
                                                        id="confirm_button" onclick="window.print()">Print Receipt </button></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
