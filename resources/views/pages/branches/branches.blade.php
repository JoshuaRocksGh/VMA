@extends('layouts.app')


@section('styles')
    <style>
        .bg-muted {
            background-color: #f5f5f5;
        }
    </style>
@endsection

@section('content')
    @include('snippets.top_navbar', ['page_title' => 'LOCATOR'])




    <div class="container-xl pt-5">

        <div class="site-card mt-3"
            style="background-image: url('assets/images/background.png'); background-repeat: no-repeat; background-size: cover;">
            <div class="row">
                <div class="col-md-3 pt-md-5">
                    <div class="nav flex-column nav-pills" id="pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link my-md-2 rounded-pill active" id="pills-branch-tab" data-toggle="pill"
                            href="#pills-branch" role="tab" aria-controls="pills-branch" aria-selected="true">Branch</a>
                        <a class="nav-link my-md-2 rounded-pill" id="pills-atm-tab" data-toggle="pill" href="#pills-atm"
                            role="tab" aria-controls="pills-atm" aria-selected="false">Atm</a>
                        <a class="nav-link my-md-2 rounded-pill" id="pills-agents-tab" data-toggle="pill"
                            href="#pills-agents" role="tab" aria-controls="pills-agents"
                            aria-selected="false">Agents</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="input-group flex-nowrap w-100 rounded-pill my-3 mx-auto " style="max-width: 400px">
                        <div class="input-group-prepend ">
                            <span class="input-group-text bg-white text-muted"
                                style="border-right: none; border-top-left-radius:33px;border-bottom-left-radius:33px; padding-right: 0"
                                id="addon-wrapping"><i class="fas text-primary fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control  "
                            style="border-left: none; border-top-right-radius:33px;border-bottom-right-radius:33px;"
                            id="search-box" placeholder="Search ..." />
                    </div>
                    <div class="tab-content " id="pills-tabContent" style="height:700px">
                        <div class="tab-pane fade show active" id="pills-branch" role="tabpanel"
                            aria-labelledby="pills-branch-tab">
                            <div class="mx-auto" style="max-width: 500px">
                                {{-- branch list comes here --}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-atm" role="tabpanel" aria-labelledby="pills-atm-tab">
                            Atm</div>
                        <div class="tab-pane fade" id="pills-agents" role="tabpanel" aria-labelledby="pills-agents-tab">
                            Agents</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection





@section('scripts')
    <script>
        $("#branches_info_display").hide();
        $("#branches_info_retry_btn").hide();

        function get_branches() {
            $.ajax({
                type: 'GET',
                url: 'get-branches-api',
                datatype: "application/json",
                success: function(response) {
                    console.log(response.data);
                    let data = response.data

                    if (response.responseCode == '000') {

                        let data = response.data;


                        $.each(data, function(index) {
                            $('#branches_display').append(`

                            <div class="d-flex shadow w-100 bg-white rounded p-2">
                                <div class="px-2 align-self-center"><i
                                        class="fas text-primary fa-building font-28"></i></i>
                                </div>
                                <div class="pl-2 w-100 ">
                                    <div class="pl-2 my-1">
                                        <div class="flex justify-content-between"><span
                                                class="d-block  font-weight-bold" style="color:#222222">ADABRAKA
                                                BRANCH</span><i class="fa-solid fa-ellipsis-vertical"></i></div>
                                        <span class="d-block   font-11">08:00 - 16:00<span class="pl-2">Mon - Fri
                                            </span></span>
                                        <span class="d-block  font-11">10:00 - 14:00<span
                                                class="pl-2">Weekends</span></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="tel:024 897 6789"
                                            class="d-block bg-muted px-2 mr-3 py-1 font-12 rounded-pill "><i
                                                class="fas pr-1 text-primary fa-phone"></i> 024 897 6789</a>
                                        <a href="mailto:info@rokel.cc"
                                            class="d-block bg-muted px-2 p-1 font-12 rounded-pill "><i
                                                class="fas pr-1 text-primary fa-envelope"></i>info@rokel.cc</a>
                                    </div>
                                </div>
                            </div>

                    `)


                        });



                        $("#branches_info_loader").hide();
                        $("#branches_info_retry_btn").hide();
                        $("#branches_info_display").show();


                    } else {
                        $("#branches_info_loader").hide();
                        $("#branches_info_display").hide();
                        $("#branches_info_retry_btn").show();
                    }


                },
                error: function(xhr, status, error) {

                    setTimeout(function() {
                        get_branches()
                    }, $.ajaxSetup().retryAfter)
                }

            })
        };

        $(document).ready(function() {

            setTimeout(function() {
                {{--  get_branches();  --}}
            }, 2000);
        })
    </script>
@endsection
