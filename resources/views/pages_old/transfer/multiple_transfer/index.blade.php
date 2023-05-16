@extends('layouts.master')

@section('content')

    <div>
        <legend></legend>

        <div class="row" ng-app="myShoppingList" ng-controller="myCtrl">
            {{-- <div class="col-12">
                <ul>
                    <li ng-repeat="x in products">@{{ x }}<span ng-click="removetransfer($index)">×</span></li>
                </ul>
                <input ng-model="addMe">
                <button ng-click="addItem()">Add</button>
                <p>@{{ errortext }}</p>
            </div> --}}

            <div class="col-12">
                <div class="card card-background-image">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"></div>

                            <div class="col-md-8">
                                <h2 class="header-title m-t-0 text-primary">MULTIPLE TRANSFERS</h2>

                        <p class="text-muted font-14 m-b-20">
                            Parsley is a javascript form validation library. It helps you provide your
                            users with feedback on their form submission before sending it to your
                            server.
                        </p>
                        <hr>


                                <div class="row" id="transaction_form">


                                    <div class="col-md-5">
                                        <form action="#" id="payment_details_form" autocomplete="off"
                                            aria-autocomplete="none">
                                            @csrf
                                            <div class="form-group">
                                                <label class="h6">Payer Account</label>


                                                <select class="custom-select " id="from_account" required ng-model="transfer.creditAccount">
                                                    <option value="">Select Account</option>
                                                    {{-- <option value="CA - PERSONAL~kwabeane Ampah~001023468976001~GHS~2000">
                                                    Current Account~001023468976001~GHS~2000 </option> --}}

                                                </select>


                                                <table
                                                    class="table-responsive table table-centered table-nowrap mb-0 from_account_display_info card">
                                                    <tbody class="text-primary">
                                                        <tr class="text-primary">

                                                            <td class="text-primary">
                                                                <a
                                                                    class="text-body font-weight-semibold display_from_account_name text-primary"></a>
                                                                <small
                                                                    class="d-block display_from_account_no text-primary"></small>
                                                            </td>

                                                            <td class="text-right font-weight-semibold text-primary">
                                                                <span
                                                                    class="display_from_account_currency text-primary"></span>
                                                                <span
                                                                    class="display_from_account_amount text-primary"></span>

                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>


                                            </div>




                                            <div class="select_onetime">

                                                <div class="form-group">
                                                    <label class="">Beneficiary Name</label>
                                                    <input type="text" class="form-control"
                                                        id="onetime_beneficiary_alias_name" placeholder="Alias Name"
                                                        required ng-model="transfer.benficiary_name">
                                                </div>

                                                <div class="form-group">
                                                    <label class="">Beneficiary Account Number</label>
                                                    <input type="text" class="form-control"
                                                        id="onetime_beneficiary_account_number" placeholder="Alias Name"
                                                        required ng-model="transfer.debitAccount">
                                                </div>

                                                <div class="form-group">
                                                    <label class="">Account Currency</label>

                                                    <select class="custom-select" id="onetime_beneficiary_account_currency"
                                                        required ng-model="transfer.currency">
                                                        <option value="">Select Currency</option>
                                                        <option value="GHS">GHS</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EURO">EURO</option>
                                                        <option value="SLL">SLL</option>
                                                        <option value="GBP">GBP</option>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label class="">Beneficiary Email</label>
                                                    <input type="email" class="form-control" id="onetime_beneficiary_email"
                                                        placeholder="Email" required ng-model="transfer.benficiary_email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Beneficiary Phone Number</label>
                                                    <input type="text" class="form-control" id="onetime_beneficiary_phone"
                                                        placeholder="Phone" required ng-model="transfer.benficiary_phone">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="">Amount</label>
                                                <input type="text" class="form-control" id="amount"
                                                    placeholder="Amount: 0.00"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')"
                                                    required ng-model="transfer.amount">
                                            </div>

                                            <div class="form-group">
                                                <label class="h6">Category</label>

                                                <select class="custom-select" id="category" required ng-model="transfer.category">
                                                    <option value="">Select Category</option>
                                                    <option value="001~Fees">Fees</option>
                                                    <option value="002~Electronics">Electronics</option>
                                                    <option value="003~Travels">Travels</option>
                                                </select>

                                            </div>


                                            <div class="form-group">
                                                <label class="h6">Naration</label>

                                                <input type="text" class="form-control" id="purpose"
                                                    placeholder="Enter purpose / narration" required ng-model="transfer.narration">

                                            </div>

                                            <div class="form-group">
                                                <label>Upload File</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile04">
                                                        <label class="custom-file-label" for="inputGroupFile04">choose an excel file</label>
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="form-group text-right">
                                                <button class="btn btn-primary btn-rounded" type="button" id="next_button_" ng-click="addTransfer(transfer)">
                                                    &nbsp; Next &nbsp;</button>
                                            </div>




                                        </form>
                                    </div> <!-- end col -->



                                    <div class="col-md-7 " >



                                        <div class="col-12">
                                            <div class="card" style="height: 500px; overflow:auto;">
                                                <div class="card-body" >
                                                    <h4 class="header-title text-center">List of Transaction </h4>
                                                    <hr>


                                                    <div class="list-group">

                                                        <a href="#" class="list-group-item list-group-item-action" ng-repeat="transfer in transfers" ng-click="removetransfer($index)">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1"></h5>
                                                                <small class="text-muted">
                                                                    <span class="badge badge-danger">remove</span>
                                                                </small>
                                                            </div>
                                                            <p class="mb-0">From: &nbsp; <span><b>@{{ transfer.creditAccount }}</b></span></p>
                                                            <p class="mb-0">From: &nbsp; <span><b>@{{ transfer.debitAccount }}</b></span></p>
                                                            <p class="mb-0">Amount: &nbsp; <span><b> <span>@{{ transfer.currency }}</span>  <span> @{{ transfer.amount }}</span> </b></span></p>
                                                            <p class="mb-0">Category: &nbsp; <span> <b>@{{ transfer.creditAccount }}</b></span></p>
                                                        </a>
{{--
                                                        <a href="#" class="list-group-item list-group-item-action">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1">List group item heading</h5>
                                                                <small class="text-muted">3 days ago</small>
                                                            </div>
                                                            <p class="mb-1">Donec id elit non mi porta gravida at eget
                                                                metus. Maecenas sed diam eget risus varius blandit.</p>
                                                            <small class="text-muted">Donec id elit non mi porta.</small>
                                                        </a> --}}

                                                    </div>

                                                </div> <!-- end card-body -->
                                            </div> <!-- end card-->
                                        </div> <!-- end col -->

                                    </div> <!-- end col -->


                                    <!-- end row -->



                                </div>



                            </div>

                            <div class="col-md-2"></div>

                        </div> <!-- end card-body -->


                        <!-- Modal -->
                        <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="POST" id="confirm_details" autocomplete="off" aria-autocomplete="off">
                                        <div class="modal-header">
                                            <h4 class="modal-title font-16 purple-color" id="multiple-oneModalLabel">Confirm
                                                Details</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                        </div>

                                        <div class="modal-body">

                                            From: <span class="font-13 text-primary" id="display_from_account"> &nbsp
                                            </span><br><br>
                                            To: <span class="font-13 text-muted" id="display_to_account"> &nbsp
                                            </span><br><br>
                                            Schedule Payments: <span class="font-13 text-muted" id="display_payments"> &nbsp
                                            </span><br><br>
                                            Amount: <span class="font-13 text-muted" id="display_amount"> &nbsp
                                            </span><br><br>
                                            Naration: <span class="font-13 text-muted" id="display_naration"> &nbsp
                                            </span><br><br>
                                            Transaction fee: <span class="font-13 text-muted" id="display_trasaction_fee">
                                            </span><br><br>
                                            Total: <span class="font-13 text-muted" id="display_total"> &nbsp
                                            </span><br><br>

                                            <div class="form-group">
                                                <label class="font-16 purple-color">Enter Pin</label>
                                                <input type="text" class="form-control" id="pin" data-toggle="input-mask"
                                                    placeholder="enter pin" required
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                                            </div>

                                        </div>



                                        <div class="modal-footer">
                                            <button type="send" id="send" class="btn btn-primary"
                                                data-target="#multiple-two" data-toggle="modal"
                                                data-dismiss="modal">Send</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->




                    </div> <!-- end col -->

                </div> <!-- end row -->



            </div>


            <script src="https://code.jquery.com/jquery-3.6.0.js?time{{ time() }}"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js?time{{ time() }}"></script>

        </body>

                <script>
                    var app = angular.module("myShoppingList", []);
                    app.controller("myCtrl", function($scope) {

                        $scope.transfers = [

                            {
                                creditAccount: "string",
                                benficiary_name: "string",
                                currency: "string",
                                debitAccount: "string",
                                amount: "string",
                                authToken: "string",
                                deviceIp: "string",
                                entrySource: "string",
                                narration: "string",
                                secPin: "string",
                                userName: "string"
                            },

                            {
                                creditAccount: "string",
                                benficiary_name: "string",
                                currency: "string",
                                debitAccount: "string",
                                amount: "string",
                                authToken: "string",
                                deviceIp: "string",
                                entrySource: "string",
                                narration: "string",
                                secPin: "string",
                                userName: "string"
                            },

                            {
                                creditAccount: "string",
                                benficiary_name: "string",
                                currency: "string",
                                debitAccount: "string",
                                amount: "string",
                                authToken: "string",
                                deviceIp: "string",
                                entrySource: "string",
                                narration: "string",
                                secPin: "string",
                                userName: "string"
                            },

                            {
                                creditAccount: "string",
                                benficiary_name: "string",
                                currency: "string",
                                debitAccount: "string",
                                amount: "string",
                                authToken: "string",
                                deviceIp: "string",
                                entrySource: "string",
                                narration: "string",
                                secPin: "string",
                                userName: "string"
                            },

                            {
                                creditAccount: "string",
                                benficiary_name: "string",
                                currency: "string",
                                debitAccount: "string",
                                amount: "string",
                                authToken: "string",
                                deviceIp: "string",
                                entrySource: "string",
                                narration: "string",
                                secPin: "string",
                                userName: "string"
                            },

                            {
                                creditAccount: "string",
                                benficiary_name: "string",
                                currency: "string",
                                debitAccount: "string",
                                amount: "string",
                                authToken: "string",
                                deviceIp: "string",
                                entrySource: "string",
                                narration: "string",
                                secPin: "string",
                                userName: "string"
                            },


                        ]
                        $scope.products = ["Milk", "Bread", "Cheese"];
                        $scope.addItem = function() {
                            $scope.errortext = "";
                            if (!$scope.addMe) {
                                return;
                            }
                            if ($scope.products.indexOf($scope.addMe) == -1) {
                                $scope.products.push($scope.addMe);
                            } else {
                                $scope.errortext = "The item is already in your shopping list.";
                            }
                        }
                        $scope.removeItem = function(x) {
                            $scope.errortext = "";
                            $scope.products.splice(x, 1);
                        }
                        $scope.removetransfer = function(x) {
                            $scope.transfers.splice(x, 1);
                        }
                        $scope.addTransfer = function(transfer) {
                            console.log(transfer)

                            if (transfer == "" ||transfer == undefined) {
                                console.log("Empty ")

                            }else{
                                if ($scope.transfers.indexOf(transfer) == -1) {
                                transfer.deviceIp = "string"
                                transfer.entrySource = "string"
                                transfer.secPin = "string"
                                transfer.userName = "string"
                                transfer.authToken = "string"

                                    $scope.transfers.unshift(transfer);
                                    $scope.transfer = {}
                                    $('#payment_details_form').reset()
                                } else {
                                    $scope.errortext = "The item is already in your shopping list.";
                                }
                            }


                        }
                    });

                </script>

                <script>


                    function from_account() {
                        $.ajax({
                            type: 'GET',
                            url:  'get-my-account',
                            datatype: "application/json",
                            success: function(response) {

                                let data = response.data
                                $.each(data, function(index) {
                                    $('#from_account').append($('<option>', {
                                        value: data[index].accountType + '~' + data[index]
                                            .accountDesc + '~' + data[index].accountNumber +
                                            '~' + data[index].currency + '~' + data[index]
                                            .availableBalance
                                    }).text(data[index].accountType + '~' + data[index]
                                        .accountNumber + '~' + data[index].currency + '~' +
                                        data[index].availableBalance));

                                });
                            },

                        })
                    }


                    function to_account() {
                        $.ajax({
                            type: 'GET',
                            url:  'get-same-bank-beneficiary',
                            datatype: "application/json",
                            success: function(response) {
                                console.log(response.data);
                                let data = response.data
                                $.each(data, function(index) {
                                    //$('#from_account').append($('<option>', { value : data[index].accountType+'~'+data[index].accountDesc+'~'+data[index].accountNumber+'~'+data[index].currency+'~'+data[index].availableBalance}).text(data[index].accountType +'~'+ data[index].accountNumber +'~'+data[index].currency+'~'+data[index].availableBalance));
                                    $('#to_account').append($('<option>', {
                                        value: data[index].account_type + '~' + data[index]
                                            .alias_name + '~' + data[index].account_number +
                                            '~' + data[index].account_currency
                                    }).text(data[index].account_type + '~' + data[index]
                                        .account_number + '~' + data[index].alias_name + '~' +
                                        data[index].account_currency));

                                });

                            },

                        })
                    }

                    $(document).ready(function() {

                        function toaster(message, icon) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
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




                    });

                </script>
            @endsection
