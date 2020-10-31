<header class="header">
    <div class="logo-container">
        <a href="https://social.tifia.com/en" class="logo">
            <img src="{{ asset('images/new-site/logo3.svg') }}" class="logo-full" alt="FTM" />
            <img src="{{ asset('images/new-site/logo3.png') }}" class="logo-mini" alt="FTM" />
        </a>
        <div class="header-buttons">
            <a class="btn btn-success btn-mini button-deposit" href="https://social.tifia.com/en/deposit/index">Deposit</a>                                            <a class="btn btn-default btn-mini ml-sm button-withdrawal" href="https://social.tifia.com/en/withdrawal/index">Withdrawal</a>
        </div>
    </div>
    <div class="header-right">
        <div class="header-buttons">
            <a class="btn btn-success btn-mini button-deposit" href="https://social.tifia.com/en/deposit/index">Deposit</a>                                            <a class="btn btn-default btn-mini ml-sm button-withdrawal demo-notice" href="https://social.tifia.com/en/withdrawal/index">Withdrawal</a>
        </div>
        <span class="separator"></span>
        <div class="search dropdown">
            <form id="form-header-search" method="GET" class="search nav-form dropdown-toggle" action="https://social.tifia.com/en/search/index">
                <div class="input-group input-search">
                    <input type="text" class="form-control" name="search" value="" placeholder="Search..." autocomplete="off">            <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                </div>
            </form>
            <div class="dropdown-menu"></div>
        </div>
        <span class="separator"></span>
        <a class="btn-chat" style="cursor: pointer" class="chat-header"><img src="https://social.tifia.com/images/general/livechat.svg" alt="LiveChat" /></a>
        <span class="separator"></span>
        <ul class="notifications">
            <li>
                <a class="notification-icon">
                    <img src="https://social.tifia.com/images/general/bell.svg" alt="Notifications" />
                    <span class="badge ">0</span>
                </a>
                <div class="dropdown-menu notification-menu large notifications-block">
                    <div class="notification-title">
                        Notifications
                    </div>
                    <div class="content">
                        <div class="notifications-content loader-wrapper"></div>
                        <hr/>
                        <div class="view-more">
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-blue btn-primary" href="https://social.tifia.com/en/notifications/index">View all</a>
                                </div>
                                <div class="col-md-6">
                                    <a id="notifications-read-all" class="ajax-action btn btn-trans notifications-read-all" href="https://social.tifia.com/en/notifications/read-all">Mark as read</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <span class="separator"></span>
        <div class="language-menu navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn dropdown-toggle">
                <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/US.png')"></span>
                <span class="language-name">English</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="https://social.tifia.com/es/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/ES.png')"></span> Español        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/fr/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/FR.png')"></span> Français         </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/id/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/ID.png')"></span> Indonesian        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/ms/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/MY.png')"></span> Malay        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/pl/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/PL.png')"></span> Polski        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/pt/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/PT.png')"></span> Português        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/th/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/TH.png')"></span> ภาษาไทย        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/vi/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/VN.png')"></span> Tiếng Việt        </a>
                </li>
                <li>
                    <a href="https://social.tifia.com/zh/home?username=GIB%40Trade&amp;switch-lang=true">
                        <span class="language-flag" style="background-image: url('https://social.tifia.com/images/flags/shiny/16/CN.png')"></span> 中文        </a>
                </li>
            </ul>
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
