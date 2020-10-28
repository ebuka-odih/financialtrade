
<aside class="sidebar-left" id="sidebar-left">
    <div class="nano">
        <div class="nano-content">
            <div class="sidebar-left-content">
                <div class="user-info">
                    <div class="avatar-wrapper avatar-normal avatar-my dropdown">
                        <img src="https://social.tifia.co/images/general/avatar.png" alt="">
                    </div>
                    <div class="name">
                              <span class="full-name text text-capitalize">
                              {{ auth()->user()->name }}
                              </span>
                        <span class="username">{{ auth()->user()->email }}<span class="online-user-921 online-status online" title="Online"></span></span>
                        <span class="settings">
{{--                              <h4 class="text text-danger"></h4>--}}
{{--                            <span  class="btn btn-danger btn-sm">Unverifed</span>--}}
                            @if(auth()->user()->status != 2)
                            <a class="mb-xs mt-xs mr-xs btn btn-xs btn-danger" >Unverified</a>
                            @else
                                <a class="mb-xs mt-xs mr-xs btn btn-xs btn-success">Verified</a>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="sidebar-button">
                    <a class="btn btnreal" href="https://social.tifia.com/en/new-trading-account">Open trading account</a>
                </div>

            </div>
            <nav role="navigation" class="nav-main" id="menu">
                <ul class="nav  nav-main">
                    <li class=""><a href="{{ route('user.dashboard') }}" ><i class="fa fa-home"></i> Home</a></li>
                    <li class="nav-parent">
                        <a href="#" ><i class="fa fa-bar-chart"></i> My Accounts</a>
                        <ul class='nav nav-children'>
                            <li><a href="https://social.tifia.com/en/accounts/index" ><i class="fa fa-list"></i> Accounts list</a></li>
                            <li><a href="https://social.tifia.com/en/terminal/index" ><i class="fa fa-download"></i> Trading terminal</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="https://social.tifia.com/en/home" ><i class="fa fa-long-arrow-right"></i> Deposit</a></li>
                    <li class=""><a href="https://social.tifia.com/en/home" ><i class="fa fa-long-arrow-left"></i> Withdrawal</a></li>
                    <li class=""><a href="https://social.tifia.com/en/home" ><i class="fa fa-history"></i> Transaction history</a></li>

                    <li class="nav-parent">
                        <a href="#" ><i class="fa fa-gear"></i> Client's Profile</a>
                        <ul class='nav nav-children'>
                            <li><a href="https://social.tifia.com/en/settings/index" ><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{ route('user.personal_info') }}" ><i class="fa fa-list-alt"></i> Personal information</a></li>
                            <li><a href="{{ route('user.kyc_verification') }}" ><i class="fa fa-file-text"></i> Verification</a></li>
                            <li><a href="https://social.tifia.com/en/settings/security" ><i class="fa fa-lock"></i> Security</a></li>
                            </ul>
                    </li>
                    <li class="nav-parent">
                        <a href="#" ><i class="fa fa-info"></i> Help</a>
                        <ul class='nav nav-children'>
                            <li><a href="https://chat.chatra.io/?hostId=73iWprWuzbCNWwgFK" ><i class="fa fa-comments"></i> LiveChat</a></li>
                            <li><a href="https://social.tifia.com/en/help/faq" ><i class="fa fa-question-circle-o"></i> FAQ</a></li>
                            <li><a href="https://social.tifia.com/en/help/index" ><i class="fa fa-graduation-cap"></i> How Social Trading works</a></li>
                            <li><a href="https://social.tifia.com/en/help/copy-types" ><i class="fa fa-copy"></i> Description of copy types</a></li>
                            <li><a href="https://social.tifia.com/en/help/contacts" ><i class="fa fa-phone"></i> Contacts</a></li>
                            <li><a href="https://social.tifia.com/en/support/index" ><i class="fa fa-ticket"></i> Support</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="https://social.tifia.com/en/logout/index" ><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>
</aside>
