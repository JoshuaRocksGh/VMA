@extends('layouts.master')


@section('content')
    <div class="container-fluid">
        <h3 class="">Agent &nbsp; > &nbsp; <span class=" text-danger">Send Message</span> </h3>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card"
                            style="background-color: rgba(255, 255, 255, 0.5);backdrop-filter: blur(5px);box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                            <div class="row" id="agent_list_spinner" style="display: none">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 text-center">
                                    <br>
                                    <div class="spinner-border avatar-lg text-primary m-2 text-dark" role="status"></div>
                                    <br>
                                </div>
                                <div class="col-md-4 "></div>
                            </div>


                            <form action="#" id="send_receive_notification">
                                @csrf
                                <div class="form-group m-3">
                                    <label for="example-select" class="h4"><b>Select Region to Send/View
                                            Notifications<span class="text-danger">*</span></b></label>
                                    @if (session()->get('UserMandate') == 'NationalLevel')
                                        <select class="form-control user_region" id="user_region">
                                            <option selected> -- Select Region -- </option>

                                        </select>
                                    @elseif(session()->get('RegionalLevel'))
                                        <select class="form-control readOnly" id="example-select" style="background:#DCDCDC"
                                            disabled>
                                            <option id="user_region" selected value="{{ session()->get('Region') }}">
                                                <b>{{ $UserRegion }}</b>
                                            </option>

                                        </select>
                                    @else
                                        <select class="form-control readOnly" id="example-select" style="background:#DCDCDC"
                                            disabled>
                                            <option selected value="{{ session()->get('Region') }}">
                                                <b>{{ $UserRegion }}</b>
                                            </option>

                                        </select>
                                        <br>
                                        <select class="form-control readOnly" id="example-select" style="background:#DCDCDC"
                                            disabled>
                                            <option id="user_region" selected
                                                value="{{ session()->get('Constituency') }}">
                                                <b>{{ $UserConstituency }}</b>
                                            </option>

                                        </select>


                                    @endif
                                </div>
                                <span style="display: block; width: 90% ; border-top: 1px solid #ccc"
                                    class="mt-0 m-3"></span>

                                {{-- <div class="form-group m-3">
                                    <label for="example-textarea" class="h4"><b>Message Title<span
                                                class="text-danger">*</span></b></label>
                                    <textarea class="form-control" id="message_title" rows="2"
                                        placeholder="Enter Message Title Here"></textarea>
                                </div> --}}

                                <div class="form-group m-3">
                                    <label for="example-textarea" class="h4"><b>Message <span
                                                class="text-danger">*</span></b></label>
                                    <textarea class="form-control" id="send_message" rows="5"
                                        placeholder="Enter Message Here"></textarea>
                                </div>

                                <div class="row m-3">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <button href="#" type="submit"
                                            class="btn btn-soft-success btn-block waves-effect waves-light send_notification">Send
                                        </button>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <label for="example-select" class="text-center m-3 mb-0 h4"><b>Replies</b></label>

                            <span style="display: block; width: 100% ; border-top: 1px solid #ccc"
                                class="mt-0"></span>
                            <div class="card-body" data-simplebar style="max-height: 700px">



                                <ul class="conversation-list" id="view_chats">



                                </ul>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="{{ asset('assets/js/send_notifications.js') }}"></script>

    <script>
        var my_mandate = "{{ session()->get('UserMandate') }}"
        var my_region = "{{ session()->get('Region') }}"
        var my_constituency = "{{ session()->get('Constituency') }}"
        var userID = "{{ session()->get('userID') }}"
        var FirstName = "{{ session()->get('FirstName') }}"
        var Surname = "{{ session()->get('Surname') }}"
    </script>



@endsection
