@extends('layouts.master')
@section('content')
    @php
        $pageTitle = 'SWIFT TRANSFER';
        $basePath = 'Transfer';
        $currentPath = 'Swift Transfer';
    @endphp
    @include('snippets.pageHeader')

    <div class="px-2">
        <div class="dashboard site-card overflow-hidden">
            <div class="form-group">
                <ul class="list-unstyled text-blue">
                    <li><i class="fa fa-info-circle text-red"></i>
                        <i> <b style="color:red;">Please Note: </b> Make Sure you have the
                            swift file in our secure shared location folder.
                        </i>
                    </li>
                </ul>
            </div>
            <div class="tab-content dashboard-body p-4">
                <div class="mx-auto  h-100 " style="max-width: 650px" id="swift_request">
                    <form id="upload_swift_form" class="" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-dark">Account to transfer from</label>

                                <div class="form-group" data-title="Account Tab" data-intro="Click to select account">

                                    <select class="accounts-select " name="my_account" id="my_account" required>
                                        <option disabled selected value=""> --- Select Source Account --- </option>
                                        @include('snippets.accounts')

                                    </select>

                                </div>
                                <hr class="mt-0">

                            </div>

                            <div class="col-md-12">
                                <label class="text-danger">Transfer Details</label>
                                <br>
                                <div class="row">

                                    <div class="col-md-4 pb-2">
                                        <label for="inputEmail3" class="text-dark">Account Name</label>
                                        <input type="text" name="account_name" id="account_name"
                                            class="form-control input-sm" readonly="readonly">
                                    </div>

                                    <div class="col-md-4 pb-2">
                                        <label for="inputEmail3" class="text-dark">Account Balance</label>
                                        <input type="text" name="account_balance" id="account_balance"
                                            class="form-control input-sm" readonly="readonly">
                                    </div>

                                    <div class="col-md-4 pb-2">
                                        <label for="inputEmail3" class="text-dark">Account Currency</label>
                                        <input type="text" name="account_currency" id="account_currency"
                                            class="form-control input-sm" readonly="readonly">
                                    </div>

                                    <div class="col-md-4 form-group pb-2" data-title="Upload File"
                                        data-intro="Click to choose file">
                                        <label for="inputEmail3" class="col-12 col-form-label text-dark">Choose File<span
                                                class="text-danger"> *</span></label>
                                        <input type="file" name="excel_file" id="excel_file" class=" input-sm" required>
                                    </div>

                                    <div class="col-md-12 pt-4">
                                        <div class="form-group float-right">
                                            <button typ="button" class="btn btn-secondary">Cancel</button>&nbsp;&nbsp;
                                            <button type="submit" class="btn form-button">Submit MT101</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/transfer/swift_mt101.js') }}"></script>
@endsection
