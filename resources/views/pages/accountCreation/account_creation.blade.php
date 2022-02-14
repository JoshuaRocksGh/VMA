@extends('layouts.app')

@section('content')

@include('snippets.top_navbar', ['page_title' => 'ACCOUNT OPENING'])



<div class="container-fluid">

    <br>
    <div class="row">
        <legend></legend>
        <br>
        <legend></legend>
        <p class="sub-header font-18 purple-color">
            <br>
        </p>
        <br>
        <div class="col-md-1">
            <a href="{{ url('/') }}" type="button"
                class="btn btn-soft-blue btn-sm waves-effect waves-light float-left"><i
                    class="mdi mdi-reply-all-outline"></i>&nbsp;Go
                Back</a>
        </div>
        <div class="col-md-10">
            <div class="col-md-12">

                <div class="row">

                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <div class="spinner-border avatar-md text-primary m-2" role="status"></div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-5 prod_list" style="display: none">

                        <h3 class="text-center">SAVINGS ACCOUNTS</h3>
                        <hr class="mt-0">
                        <div class="savings_product_list row">


                        </div>
                    </div>
                    <div class="col-md-1"></div>

                    <div class="col-md-5 prod_list" style="display: none">
                        <h3 class="text-center">CURRENT ACCOUNTS</h3>
                        <hr class="mt-0">

                        <div class="current_product_list row ">

                        </div>



                    </div>
                </div>

            </div>
            {{-- <label for="" class="text-center">1463</label>
            <div id="demo" data-value="1463"></div> --}}
        </div>
        <div class="col-md-1">

        </div>

        <br>



    </div>
    <!-- end row -->


    @endsection


    @section('scripts')



    <script>
        $(".prod_list").hide();

            function productList() {
                $.ajax({
                    type: "GET",
                    url: "get-lovs-list-api",
                    datatype: "application/json",
                    success: function(response) {
                        $(".spinner-border").hide()
                        $(".prod_list").toggle('500');
                        {{-- console.log(response.data.productList) --}}

                        {{-- console.log(response.data.productList) --}}
                        let product = response.data.productList
                        {{-- console.log(product); --}}

                        $.each(product, function(index) {
                            {{-- console.log(product[index]) --}}
                            let subCode = product[index].subCode;
                            let description = product[index].description;
                            {{-- console.log(subCode) --}}


                            {{-- console.log(product[index].description.trim() == ) --}}



                            if (subCode == "M" && description.indexOf("CA") >= 0) {
                                console.log("=====")
                                console.log(product[index].description)
                                console.log("-------")
                                $('.current_product_list').append(
                                    `
                                        <div class="col-md-6">
                                            <div class="card card-body">
                                                <i class="mdi mdi-account-plus-outline  mdi-48px" style="margin-left: 40%"></i>
                                                <h5 class="card-title" style="text-align: center">${product[index].description}</h5>

                                                <a href="#"
                                                    class="btn btn-outline-primary waves-effect waves-light">Apply</a>
                                            </div>
                                        </div>
                                        `
                                )

                            }



                            if (subCode == "M" && description.indexOf("SA") >= 0) {

                                {{-- console.log(product[index]); --}}


                                if (description.indexOf("STAFF") >= 0) {

                                } else {
                                    {{-- console.log("=====")
                                    console.log(product[index].description)
                                    console.log("-------") --}}
                                    $('.savings_product_list').append(
                                        `
                                        <div class="col-md-6">
                                            <div class="card card-body">
                                                <i class="mdi mdi-account-plus-outline  mdi-48px" style="margin-left: 40%"></i>
                                                <h5 class="card-title" style="text-align: center">${product[index].description}</h5>

                                                <a href="{{ url('/account-creation/savings-account-creation') }}"
                                                    class="btn btn-outline-primary waves-effect waves-light">Apply</a>
                                            </div>
                                        </div>
                                        `
                                    )

                                }
                            }

                        })
                    }
                })
            }

            $(document).ready(function() {
                setTimeout(function() {
                    productList();

                }, 500)

                {{-- var data = $("#demo").attr("data-value")
                $("#demo").barcode(
                    data,
                    "code128"

                ) --}}

            })
    </script>


    @endsection