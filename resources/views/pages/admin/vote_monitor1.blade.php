@extends('layouts.master')


@section('content')
    @php
        $pageTitle = 'Vote Monitor';
        $basePath = 'Vote Monitor';
        $currentPath = 'Monitor';
    @endphp

    @include('snippets.pageHeader')
    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-body row all_candidates" id="all_candidates">
                            {{--  <div class="col-md-3 pb-2">
                                <div class=" p-2 row"
                                    style="display: flex; justify-content: center; align-items: center;background-color:white ;padding: -0.75rem;border-radius:5px">
                                    <img class="col-md-5" src="${e.image}" alt=""
                                        style="width:60px;height:60px;border-radius:50%">
                                    <br>
                                    <div class="col-md-7">
                                        <h2>${e.name}</h2>

                                        <h2>Hello</h2>
                                        <p>${e.partyName}</p>
                                        <p>PPP</p>
                                        <img class="" src="${e.image}" alt=""
                                            style="width:20px;height:20px;border-radius:10%">

                                    </div>


                                </div>
                            </div>  --}}

                            {{--  <div class="col-md-3">2</div>
                            <div class="col-md-3">3</div>
                            <div class="col-md-3">4</div>  --}}
                        </div>
                    </div>
                    <br> <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" style="border-radius: 15px">
                                <div class="card-body display_vote_analysis" id="display_vote_analysis">


                                    {{--  <div class=" row"
                                        style="border-radius:10px;background-color:#f7f9d2;padding: -0.75rem;">

                                        <i class="col-md-2 fas fa-circle font-12 avatar-title text-dark"
                                            style="margin-top: 10px;"></i>
                                        <h1 class="col-md-6 font-22" style="margin-top:2px">NDC</h1>
                                        <div class="col-md-4" style="text-align:right;">
                                            <span id="approval_count" class="badge badge-success badge-pill font-10 ml-1"
                                                style="padding: 9px;margin-top: 4px;">1,200</span>
                                        </div>
                                    </div>  --}}
                                </div>
                            </div>
                        </div>

                        {{--  chart below  --}}
                        <div class="col-md-6 card" style="border-radius:15px">
                            {{--  <div class="col-md-9">  --}}
                            <canvas id="myChart" style="max-height: 800px"></canvas>

                            {{--  </div>  --}}

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @include('extras.datatables')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/vote_monitor1.js') }}"></script>
@endsection
