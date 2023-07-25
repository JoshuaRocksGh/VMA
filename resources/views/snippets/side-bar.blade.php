<!-- ========== Left Sidebar Start ========== -->

<div id="sidebar-menu" class=" overflow-hidden p-0 text-xs site-card text-white"
    style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;background-color:#bbdefb">

    <ul id="side-menu" class="accordion ">
        @if (session()->get('UserMandate') == 'NationalLevel')
            <li class="menu-item">
                <a class="menu-item-header" href="{{ url('home') }}">
                    <i class="mdi mdi-home-outline"></i>
                    <span> Home</span>
                </a>
            </li>
        @elseif (session()->get('UserMandate') == 'RegionalLevel')
            <li class="menu-item">
                <a class="menu-item-header" href={{ url('region/' . $UserRegion) }}>
                    <i class="fas fa-home"></i>
                    <span> Home</span>
                </a>
            </li>
        @elseif(session()->get('UserMandate') == 'ConstituencyLevel')
            <li class="menu-item">
                <a class="menu-item-header" href={{ url('constituency/' . $UserConstituency) }}>
                    <i class="mdi mdi-home-outline"></i>
                    <span> Home</span>
                </a>
            </li>
        @endif

        @if (session()->get('UserMandate') == 'NationalLevel')
            <li class="menu-item">
                <a class="menu-item-header" href="{{ url('vote-monitor') }}">
                    <i class="mdi mdi-vote-outline"></i>
                    <span> Vote Monitor</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-item-header" href="{{ url('create-candidate') }}">
                    <i class="mdi mdi-vote-outline"></i>
                    <span>Create Candidates</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="#sidebarRegionalUsers" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarRegionalUsers">
                    <i class="fas fa-users"></i> <span> Regional Users</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarRegionalUsers">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('all-regional-users') }}">All Regional Users</a>
                        </li>
                        <li>
                            <a href="{{ url('create-user') }}">Create Regional User</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#sidebarIssues" class="menu-item-header" data-toggle="collapse" data-target="#sidebarIssues">
                    <i class="fas fa-folder-plus"></i> <span>Reported Issue</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarIssues">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('reported-issues') }}">All Reported Issue</a>
                        </li>
                        {{--  <li>
                            <a href="{{ url('create-user') }}">Create Regional User</a>
                        </li>  --}}

                    </ul>
                </div>
            </li>
            <li class="menu-item">
                <a href="#sidebarNotfication" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarNotfication">
                    <i class="fas fa-bell"></i> <span>Notifications & Alerts</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarNotfication">
                    <ul class="nav-second-level">
                        <li>
                            <a href="send-notifications">Send Notifications</a>
                        </li>
                        {{--  <li>
                            <a href="{{ url('create-user') }}">Create Regional User</a>
                        </li>  --}}

                    </ul>
                </div>
            </li>
            <li class="menu-item">
                <a href="#sidebarSettings" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarSettings">
                    <i class="fas fa-cog"></i> <span>Settings</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarSettings">
                    <ul class="nav-second-level">
                        <li>
                            <a href="view-profile">View Profile</a>
                        </li>
                        {{--  <li>
                            <a href="{{ url('create-user') }}">Create Regional User</a>
                        </li>  --}}

                    </ul>
                </div>
            </li>
        @elseif (session()->get('UserMandate') == 'RegionalLevel')
            <li class="menu-item">
                <a href="#sidebarConstitiencyUser" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarConstitiencyUser">
                    <i class="fas fa-users"></i> <span> Constituency Users</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarConstitiencyUser">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('all-constituency-users') }}">All Constituency Users</a>
                        </li>
                        <li>
                            <a href="{{ url('create-user') }}">Create Constituency User</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#sidebarRI" class="menu-item-header" data-toggle="collapse" data-target="#sidebarRI">
                    <i class="fas fa-folder-plus"></i> <span> Reported Issue</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarRI">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('reported-issues') }}">All Reported Issue</a>
                        </li>
                        {{--  <li>
                            <a href="{{ url('create-user') }}">Create Constituency User</a>
                        </li>  --}}

                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#sidebarNotification" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarNotification">
                    <i class="fas fa-bell"></i> <span>Notifications & Alerts</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarNotification">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('send-notifications') }}">Send Notifications</a>
                        </li>
                        {{--  <li>
                            <a href="{{ url('create-user') }}">Create Constituency User</a>
                        </li>  --}}

                    </ul>
                </div>
            </li>

            <li class="menu-item">
                <a href="#sidebarProfile" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarProfile">
                    <i class="fas fa-cog"></i> <span> Settings</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarProfile">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('view-profile') }}">View Profile</a>
                        </li>
                        {{--  <li>
                            <a href="{{ url('create-user') }}">Create Constituency User</a>
                        </li>  --}}

                    </ul>
                </div>
            </li>
        @endif

        {{--  <li class="menu-item">
            <a class="menu-item-header" href="{{ url('branch-locator') }}">
                <i class="fas fa-search-location"></i> <span> Branch Locator </span>
            </a>
        </li>  --}}

        @if (session()->get('UserMandate') == 'ConstituencyLevel')
            <li class="menu-item">
                <a class="menu-item-header" href="{{ url('create-parliamentry-candidate') }}">
                    <i class="mdi mdi-vote-outline"></i>
                    <span>Create Candidates</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-item-header" href="{{ url('parliamentry-candidate') }}">
                    <i class="mdi mdi-vote-outline"></i>
                    <span>Create Candidates</span>
                </a>
            </li>


            <li class="menu-item">
                <a href="#sidebarMyAccount" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarMyAccount">
                    <i class="mdi mdi-book-account-outline"></i>
                    <span> Agent</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarMyAccount">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('add-agent') }}">Add New Agent</a>
                        </li>
                        <li>

                            <a href="{{ url('edit-agent') }}">Edit Agent Details</a>
                        </li>
                        <li>
                            {{-- <a href="{{ url('all-regional-users') }}">List Of Agents </a> --}}
                            <a href="{{ url('agent-list') }}">List Of Agents</a>
                        </li>
                        <li>
                            <a href="{{ url('send-agent-message') }}">Send Message</a>
                        </li>
                        {{-- <li>
                                <a href="#budgeting" data-toggle="collapse">
                                    <span> Budgeting </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="budgeting">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ url('budgeting-spending-statics') }}">Spending
                                                Statistics</a>
                                        </li>

                                    </ul>
                                </div>
                            </li> --}}

                    </ul>
                </div>
            </li>
        @endif

        @if (session()->get('UserMandate') == 'ConstituencyLevel')
            <li class="menu-item">
                <a href="#sidebarConSettings" class="menu-item-header" data-toggle="collapse"
                    data-target="#sidebarConSettings">
                    <i class="fas fa-sync"></i> <span>Settings</span>
                    <span class="menu-arrow fas fa-angle-right"></span>
                </a>
                <div class="collapse menu-item-body" id="sidebarConSettings">
                    <ul class="nav-second-level">
                        <li>
                            <a href="{{ url('view-profile') }}">View Profile</a>
                        </li>


                    </ul>
                </div>
            </li>
        @endif

        <li class="menu-item">
            {{--  <a class="menu-item-header" href="{{ url('logout') }}" id="sidebar_logout">  --}}
            <a class="menu-item-header" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt"></i> <span> Logout </span>
            </a>
        </li>
    </ul>
</div>


@section('scripts')
    {{--  @include('extras.datatables')  --}}

    <script>
        {{--  $("#sidebar_logout").click(function(e) {
            e.preventDefault();

            approve_request();
            alert('cleic')
        })  --}}
    </script>
    <script src="{{ asset('assets/plugins/chartjs/chartjs-v3.7.1.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/pages/home/home.js') }}"></script>
@endsection
