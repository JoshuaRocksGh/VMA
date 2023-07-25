@extends('layouts.master')



<style type="text/css">
    /* Your CSS styling for the chat UI goes here */
    .chat-container {
        height: 500px;
        overflow-y: auto;
        border: 1px solid #ccc;
    }


    .chat-messages {
        height: 200px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .view_chats {
        position: relative;
        width: 250px;
        padding: 10px;
        border-radius: 10px;
        background-color: #007bff;
        color: #fff;
        margin: 20px;
    }

    .view_chats::before {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 20px;
        border-width: 0 10px 15px;
        border-style: solid;
        border-color: transparent transparent #007bff;
    }

    .view_chats::after {
        content: '';
        position: absolute;
        bottom: -12px;
        left: 22px;
        border-width: 0 8px 12px;
        border-style: solid;
        border-color: transparent transparent #fff;
    }
</style>


@section('content')
    @php
        $pageTitle = 'Send Notification';
        $basePath = 'Notifications & Alert';
        $currentPath = 'Send Notifications';
    @endphp
    @include('snippets.pageHeader')

    <div>
        <div class="dashboard site-card overflow-hidden">
            <div class="tab-content dashboard-body border-info border ">
                <div class="p-4">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">

                                <div class="row card-body" id="agent_list_spinner" style="display: none">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                        <br>
                                        <div class="spinner-border avatar-lg text-primary m-2 text-dark" role="status">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-4 "></div>
                                </div>


                                <form action="#" id="send_receive_notification">
                                    @csrf
                                    <div class="form-group m-3">
                                        <label class="text-dark"><b>Select Region to Send/View
                                                Notifications<span class="text-danger">*</span></b></label>
                                        @if (session()->get('UserMandate') == 'NationalLevel')
                                            <select class="form-control user_region readonly" id="user_region" readonly>
                                                <option selected> -- Select Region -- </option>

                                            </select>
                                        @else
                                            <select class="form-control readOnly" id="example-select"
                                                style="background:#DCDCDC" disabled>
                                                <option id="user_region" selected value="{{ session()->get('Region') }}">
                                                    <b>{{ $UserRegion }}</b>
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
                                        <label class="text-dark"><b>Message <span class="text-danger">*</span></b></label>
                                        <textarea class="form-control" id="send_message" rows="5" placeholder="Enter Message Here"></textarea>
                                    </div>

                                    <div class="row m-3">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button href="#" type="submit"
                                                class="btn btn-primary btn-block waves-effect waves-light send_notification">Send
                                            </button>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>

                                    {{--  ===========  --}}

                                    {{--  <div class="chat-container">
                                        <div class="chat-messages" id="chat-messages">
                                            <!-- Messages will be displayed here -->
                                        </div>
                                        <div class="chat-input">
                                            <input type="text" id="username-input" placeholder="Your Name">
                                            <input type="text" id="message-input" placeholder="Type your message...">
                                            <button class="send-button" id="send-button">Send</button>
                                        </div>
                                    </div>  --}}

                                    {{--  ===========  --}}

                                </form>

                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <label class="text-center m-3 mb-0 "><b>Replies</b></label>

                                <span style="display: block; width: 100% ; border-top: 1px solid #ccc"
                                    class="mt-0"></span>
                                <div class="" data-simplebar style="max-height: 700px">


                                    {{--  #f4f4f4  --}}
                                    {{--  c9e5fc  --}}
                                    <div style="background-color:f4f4f4">
                                        <div class="row">
                                            <div class="col-md-12 chat-container" id="chat-container">
                                                <div class="row">
                                                    {{--  <div class="row">  --}}
                                                    <div class="col-md-1"></div>
                                                    <ul class="conversation-list col-md-10" id="view_chats">

                                                    </ul>
                                                    <div class="col-md-1"></div>
                                                    {{--  </div>  --}}
                                                </div>

                                            </div>
                                            <div class="col-md-4"></div>
                                            {{--  <div class="col-md-4"></div>  --}}
                                            {{--  <div class="col-md-12 text-right">
                                                <ul class="conversation-list" id="view_my_chats">

                                                </ul>
                                            </div>  --}}

                                            {{--  <div class="col-md-4">free space</div>  --}}
                                        </div>
                                        {{--  <br>  --}}

                                    </div>




                                </div>
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
