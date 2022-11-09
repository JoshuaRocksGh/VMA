<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <style type="text/css">
        .main-body {
            display: flex;
        }

        .side {
            padding: 1px;
            width: 5%
        }



        .main-section {
            padding: 10px;
            width: 90%;
            border: solid;
            border-radius: 33px;
            border: 1px solid;
            border-color: #dc3545;
        }

        .reciept-header {
            display: grid;
            grid-template-columns: 40% 20% 40%;
        }

        .address-title {
            margin-bottom: 1px;
        }

        .address {
            padding-top: 0px
        }

        .transaction-receipt {
            display: flex;
        }

        .side-2 {
            padding: 1px;
            width: 15%
        }

        .transaction-header {
            padding: 0px;
            width: 70%;
            text-align: center;
            background-color: #dc3545 !important;
            color: #fff !important;
            margin: 5px;
            border-radius: 10px
        }
    </style>
</head>

<body>
    <div class="main-body">
        <div class="side"></div>
        <div class="main-section">
            <div class="reciept-header">
                <div>
                    <br>
                    <h6 class="address-title">SIERRA LEONE COMMERCIAL BANK</h6>
                    <div class="address">
                        <small>9/31 Siaka Stevens Street</small><br>
                        <small>Freetown, Sierra Leone</small><br>
                        <small>(+232) - 22 -225264</small><br>
                        <small>slcb@slcb.com</small><br>
                    </div>

                </div>
                <div></div>
                <img class="" src="{{ asset('assets/images/slcb_logo.png') }}" alt=""
                    style="zoom:0.3; margin-left:auto">
            </div>
            <br>
            <div class="transaction-receipt">
                <div class="side-2"></div>
                <div class="transaction-header">
                    <h2>
                        Transaction Receipt
                    </h2>
                </div>
                <div class="side-2"></div>

            </div>
            <br>
            <div class="table-responsive mb-0  rounded ">

            </div>

        </div>
        <div class="side"></div>
    </div>
</body>

</html>
