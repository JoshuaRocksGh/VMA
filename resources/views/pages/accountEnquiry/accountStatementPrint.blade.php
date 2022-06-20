@extends('layouts.print')
@section('styles')
    <style>
        .details-label {
            width: 8rem;
            display: inline-block;
        }

        table tr td {
            padding: 5px;
        }

    </style>
@endsection
@section('content')
    <br>
    <div class="border border-primary p-2 m-2" style="border-radius: 0.25rem">
        <div class="row">
            <div class="col-md-6 text-left"><img src="{{ asset('assets/images/rokel_logo.png') }}" height="50px"></div>
            <div class="col-md-6 text-right">
                <p class="fw-bold" style="font-size: 20px; font-weight: bold; margin-bottom: 0px">STATEMENT OF
                    ACCOUNT</p>
                <p style="font-size: 16px; margin-bottom: 0px">SLL - CA - CORPORATE</p>
                <p style="font-size: 16px; font-weight: normal">Extraction Date : {!! date('d/M/y') !!}</p>
            </div>
        </div>
        <div class="p-2" style="background-color: #f3f2ef;border-radius: 0.05rem;">
            {{-- <p>hello</p> --}}
            <p style="margin-bottom: 0px; font-size: 10px;">ACCOUNT HOLDER NAME</p>
            <p style="font-weight: bold;font-size: 14px;">UNION SYSTEMS GLOBAL </p>
            <div class="row">
                <div class="col-md-3">
                    <p style="margin-bottom: 0px; font-size: 10px;">ACCOUNT NUMBER</p>
                    <p style="font-weight: bold;font-size: 14px;">004001100001460294</p>
                </div>
                <div class="col-md-3">
                    <p style="margin-bottom: 0px; font-size: 10px;">ACCOUNT TYPE</p>
                    <p style="font-weight: bold;font-size: 14px;">CA - CORPORATE </p>
                </div>
                <div class="col-md-3">
                    <p style="margin-bottom: 0px; font-size: 10px;">ACCOUNT CURRENCY</p>
                    <p style="font-weight: bold;font-size: 14px;">SLL </p>
                </div>
                <div class="col-md-3">
                    <p style="margin-bottom: 0px; font-size: 10px;">ACCOUNT BRANCH</p>
                    <p style="font-weight: bold;font-size: 14px;">HIGH STREET </p>
                </div>
            </div>

        </div>
        <br>
        <div class="border border-primary p-2 " style="border-radius: 0.25rem">
            <table class="table table-bordered border-dark table-striped">
                <thead>
                    <tr class="bg-primary text-white">
                        <th scope="col">DATE</th>
                        {{-- <th scope="col">VALUE DATE</th> --}}
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">DEBIT</th>
                        <th scope="col">CREDIT</th>
                        <th scope="col">BALANCE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td style="font-weight: bold">OPENING BALANCE AS AT 01/10/2021</td>
                        <td></td>
                        <td></td>
                        <td>10,000,000.00</td>
                    </tr>
                    <tr>
                        <td>05/10/2021</td>
                        <td>ATM Withdrawal</td>
                        <td>100,000.00</td>
                        <td></td>
                        <td>9,900,000.00</td>
                    </tr>
                    <tr>
                        <td>10/10/2021</td>
                        <td>Airtime TopUp</td>
                        <td>10,000.00</td>
                        <td></td>
                        <td>9,890,000.00</td>
                    </tr>
                    <tr>
                        <td>15/10/2021</td>
                        <td>Cheque Withdrawal</td>
                        <td>2,000,000.00</td>
                        <td></td>
                        <td>7,890,000.00</td>
                    </tr>
                    <tr>
                        <td>15/10/2021</td>
                        <td>Cheque Deposit</td>
                        <td></td>
                        <td>500,000.00</td>
                        <td>8,3000.00</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <br><br><br>
        <br><br><br>
        <hr style="height:1px;border:none;color:#333;background-color:#333;">
        <div class="row">
            <div class="col-md-4 text-center">
                <p style="margin-bottom: 0px;font-weight: bold;"><em>Head Office,</em></p>
                <p style="margin-bottom: 0px;font-weight: bold;"><em>25-27 Siaka Stevens St. Freetown.</em></p>
                <p style="margin-bottom: 0px;font-weight: bold;"><em>Sierra Leone</em></p>
            </div>
            <div class="col-md-4 text-center">
                <p style="margin-bottom: 0px;font-weight: bold;"><em>General Info: (+232) 22-222-501</em></p>
                <p style="margin-bottom: 0px;font-weight: bold;"><em>Issues: (+232)-76-22-25-01</em></p>
                <p style="margin-bottom: 0px;font-weight: bold;"><em>Email: info@rokelbank.sl</em></p>
            </div>
            <div class="col-md-4 text-center">
                <p style="margin-bottom: 0px;font-weight: bold;"><em>ROKEL COMMERCIAL BANK (SL) LTD</em></p>
                <p style="margin-bottom: 0px;font-weight: bold;"><em>rokelsl@rokelbank.sl</em></p>
            </div>
        </div>

    </div>
@endsection
