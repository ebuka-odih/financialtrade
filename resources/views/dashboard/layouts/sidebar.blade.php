
<aside class="sidebar-left" id="sidebar-left">
    <div class="nano">
        <div class="nano-content">
            <div class="sidebar-left-content">
                <div class="user-info">
                    <div class="avatar-wrapper avatar-normal avatar-my dropdown">
                        <img src="{{ auth()->user()->profile_image }}" alt="">
                    </div>
                    <div class="name">
                              <span class="full-name text text-capitalize">
                              {{ auth()->user()->name }}
                              </span>
                        <span class="username">{{ auth()->user()->email }}<span class="online-user-921 online-status online" title="Online"></span></span>
                        <span class="">{!! auth()->user()->user_status() !!}</span>
                    </div>
                </div>
{{--                <div class="sidebar-button">--}}
{{--                    <a class="btn btnreal" href="https://social.tifia.com/en/new-trading-account">Dashboard</a>--}}
{{--                </div>--}}

            </div>
            <nav role="navigation" class="nav-main" id="menu">
                <ul class="nav  nav-main">
                    <li class=""><a href="{{ route('user.dashboard') }}" ><i class="fa fa-home"></i> Home</a></li>
{{--                    <li class="nav-parent">--}}
{{--                        <a href="#" ><i class="fa fa-bar-chart"></i> My Accounts</a>--}}
{{--                        <ul class='nav nav-children'>--}}
{{--                            <li><a href="https://social.tifia.com/en/accounts/index" ><i class="fa fa-list"></i> Accounts list</a></li>--}}
{{--                            <li><a href="https://social.tifia.com/en/terminal/index" ><i class="fa fa-download"></i> Trading terminal</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li class=""><a href="{{ route('user.trades.index') }}" ><i class="fa fa-chart-line"></i> Trades</a></li>
                    <li class=""><a href="{{ route('user.pick_plan') }}" ><i class="fa fa-long-arrow-right"></i> Deposit</a></li>
                    <li class=""><a href="{{ route('user.make_withdrawal') }}" ><i class="fa fa-long-arrow-left"></i> Withdrawal</a></li>
                    <li class=""><a href="{{ route('user.deposit_history') }}" ><i class="fa fa-history"></i> Transaction history</a></li>

                    <li class="nav-parent">
                        <a href="#" ><i class="fa fa-gear"></i> Client's Profile</a>
                        <ul class='nav nav-children'>
                            <li><a href="{{ route('user.profile_details') }}" ><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{ route('user.personal_info') }}" ><i class="fa fa-list-alt"></i> Personal information</a></li>
                            <li><a href="{{ route('user.kyc_verification') }}" ><i class="fa fa-file-text"></i> Verification</a></li>
                            <li><a href="{{ route('user.change_password') }}" ><i class="fa fa-lock"></i> Security</a></li>
                            </ul>
                    </li>
                    <li class="nav-parent">
                        <a href="#" ><i class="fa fa-info"></i> Help</a>
                        <ul class='nav nav-children'>
                            <li><a href="https://www.tidio.com/talk/bdqn75mlu16hdlh7abpgxyck65rgwrpr" target="_blank"><i class="fa fa-comments"></i> LiveChat</a></li>
                            <li><a target="_blank" href="mailto:support@financialtrademarkets.com" ><i class="fa fa-envelope-open"></i> Mail Us</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
