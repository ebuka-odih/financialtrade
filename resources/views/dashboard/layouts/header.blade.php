<header class="header">
    <div class="logo-container">
        <a href="{{ route('homepage') }}" class="logo">
            <img src="{{ asset('images/new-site/logo3.svg') }}" class="logo-full" alt="FTM" />
            <img src="{{ asset('images/new-site/logo3.png') }}" class="logo-mini" alt="FTM" />
        </a>
        <div class="header-buttons">
            <a class="btn btn-success btn-mini button-deposit" href="{{ route('user.pick_plan') }}">Deposit</a>
            <a class="btn btn-default btn-mini ml-sm button-withdrawal" href="{{ route('user.make_withdrawal') }}">Withdrawal</a>
        </div>
    </div>
    <div class="header-right">
        <div class="header-buttons">
            <a class="btn btn-success btn-mini button-deposit" href="{{ route('user.pick_plan') }}">Deposit</a>
            <a class="btn btn-default btn-mini ml-sm button-withdrawal demo-notice" href="{{ route('user.make_withdrawal') }}">Withdrawal</a>
        </div>

        <span class="separator"></span>
        <div style="height: 20px; margin-top: -30px;" class="language-menu navbar-btn btn-group" id="google_translate_element">
        </div>
        <span class="separator"></span>
        <div class="logout">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <img src="https://social.tifia.com/images/general/out.svg" alt="Exit" />
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <div data-fire-event="sidebar-left-opened" data-target="html" data-toggle-class="sidebar-left-opened" class="visible-xs toggle-sidebar-left">
            <i aria-label="Toggle sidebar" class="fa fa-bars"></i>
        </div>
    </div>
</header>
