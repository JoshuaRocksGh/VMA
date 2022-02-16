@extends('layouts.app')

@section('content')

@include('snippets.top_navbar', ['page_title' => 'ACCOUNT OPENING'])



<div class="container-fluid px-md-4 pt-5">

    <div class="row pt-2 justify-content-center" max-width="1000px">
        <div class="col-md-6 prod_list" style="display: none">

            <h4 class="text-center">SAVINGS ACCOUNTS</h4>
            <hr class="mt-0">
            <div class="savings_product_list row">
            </div>
        </div>

        <div class="col-md-6 prod_list" style="display: none">
            <h4 class="text-center">CURRENT ACCOUNTS</h4>
            <hr class="mt-0">

            <div class="current_product_list row ">
            </div>
        </div>
    </div>
</div>
<!-- end row -->


@endsection


@section('scripts')



<script src='{{ asset("assets/js/pages/accountCreation.js") }}'>

</script>


@endsection