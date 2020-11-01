@extends('dashboard.layouts.app')
@section('content')

    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="profile-index" class="contents clearfix">
                @include('dashboard.layouts.notice')
                <div class="content-center">
                    <h1 class="no-print">Dashboard</h1>
                    <div id="content-alert-message">
                    </div>

                    <div class="row user-profile-wrapper">
                        <div class="col-md-6 col-xl-3">
                            <section class="panel panel-featured-left- panel-featured-primary">
                                <div class="panel-body">
                                    <div class="widget-summary">
                                        <div class="user-profile">
                                            <div class="avatar-wrapper avatar-small avatar-my dropdown">
                                                <a class="user-menu-link" href="https://social.tifia.com/en/home?username=GIB%40Trade" title="Menu" data-id="25890" data-username="@GIB@Trade"><img src="https://social.tifia.co/uploads/avatars/002/589/1bbccfc960a764135a840eeaa89474ae.jpg" alt=""></a>
                                            </div>
                                            <div class="name">
                                                <div class="username">
                                                    <span class="user-menu"><a class="user-menu-link" href="https://social.tifia.com/en/home?username=GIB%40Trade" data-id="25890">@GIB@Trade</a> <span class="online-user-25890 online-status online" title="Online"></span></span>
                                                </div>
                                                <div>
                                             <span>
                                             <a class="btn btn-default btn-xs" href="https://social.tifia.com/en/pm/dialog?username=GIB%40Trade" title="New message"><i class="fa fa-envelope"></i></a>                                </span>
                                                    <span class="user-subscription ml-xs" data-id="25890">
                                             <a href="https://social.tifia.com/en/help/demo" class="unfollow btn btn-xs btn-stop ajax-action demo-notice no-loader hide" title="Unfollow"><i class="fa fa-minus"></i></a>
                                             <a href="https://social.tifia.com/en/help/demo" class="follow btn btn-xs btn-primary ajax-action  demo-notice no-loader " title="Follow"><i class="fa fa-plus"></i></a>
                                             </span>
                                                    <span class="ml-xs">
                                             <a class="btn btn-xs btn-success" href="https://social.tifia.com/en/sync-trading/investors-account?attach_user=GIB%40Trade" title="Copy"><i class="fa fa-copy"></i></a>                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <section class="panel panel-featured-left- panel-featured-primary">
                                <div class="panel-body">
                                    <div class="widget-summary">
                                        <div class="summary">
                                            <h4 class="title">Account</h4>
                                            <div class="info">
                                                <strong class="amount">$ {{ auth()->user()->acct_wallet }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>Statistics</h3>
                                    <table class="table table-condensed table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Last Withdraw</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Active Withdraw</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Total Withdraw</td>
                                            <td>$0.00</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="ferrari-center-mobile-banners" class="col-md-6">
                            <!-- Ferrary contest sidebar right banner -->
                            <!--        -->
                            <!-- // Ferrary contest sidebar right banner -->
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>Statistics</h3>
                                    <table class="table table-condensed table-striped">
                                        <tr>
                                            <td>Total Deposit</td>
                                            <td>$0.00</td>
                                        </tr>
                                        <tr>
                                            <td>Last Deposit</td>
                                            <td>N/A</td>
                                        </tr>
                                        <tr>
                                            <td>Active Deposit</td>
                                            <td>$0.00</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text">Forex Rates</span></a> by TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                            {
                                "width": 700,
                                "height": 400,
                                "currencies": [
                                "EUR",
                                "USD",
                                "JPY",
                                "GBP",
                                "CHF",
                                "AUD",
                                "CAD",
                                "NZD",
                                "CNY"
                            ],
                                "isTransparent": false,
                                "colorTheme": "light",
                                "locale": "en"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->


                </div>
                <div class="content-right">
                    <div class="sidebar-right-content">
                        <div class="panel">
                            <div class="panel-body top-10-panel" style="padding: 0; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div class="tradingview-widget-container__widget"></div>
                                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">Economic Calendar</span></a></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
                                        {
                                            "colorTheme": "light",
                                            "isTransparent": false,
                                            "width": "100%",
                                            "height": "300",
                                            "locale": "en",
                                            "importanceFilter": "-1,0,1"
                                        }
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-body">
                                <h3>Popular instruments</h3>
                                <table class="table table-symbols mb-md">
                                    <thead>
                                    <tr>
                                        <th>Instrument</th>
                                        <th class="text-right">Trades</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">
                                          <span class="symbol size-32" title="XAUUSD">
                                          <img src="{{ asset('/images/instruments/XAU.png') }}"><img src="{{ asset('/images/flags/flat/32/US.png') }}">
                                          </span></a><a href="#"> <span>XAUUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 7807; Sell: 8731">16538</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                          <span class="symbol size-32" title="GBPUSD">
                                          <img src="{{ asset('/images/flags/flat/32/GB.png') }}"><img src="{{ asset('/images/flags/flat/32/US.png') }}">
                                          </span></a><a href="#"> <span>GBPUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 5084; Sell: 5349">10433</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="{{ asset('/images/flags/flat/32/EU.png') }}"><img src="{{ asset('/images/flags/flat/32/US.png') }}">
                                          </span></a>                        <a href="#"> <span>EURUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 4764; Sell: 5350">10114</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="{{ asset('/images/flags/flat/32/EU.png') }}"><img src="{{ asset('/images/flags/flat/32/US.png') }}">
                                          </span></a>                        <a href="#"> <span>EURUSD</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 2330; Sell: 2468">4798</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">
                                          <span class="symbol size-32" title="EURJPY">
                                          <img src="{{ asset('/images/flags/flat/32/EU.png') }}"><img src="{{ asset('/images/flags/flat/32/JP.png') }}">
                                          </span></a>                        <a href="#"> <span>EURJPYx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 1774; Sell: 2228">4002</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @include('dashboard.layouts.footer')
            <div id="notifications-mob" class="notifications-block notifications-mob">
                <div class="notifications-mob__content">
                    <div class="notifications-title">
                        Notifications                            <a href="#!" class="close"><img src="https://social.tifia.com/images/general/close.svg"/></a>
                    </div>
                    <div class="notifications-content notifications-content-mob loader-wrapper">
                    </div>
                    <div class="view-more">
                        <div class="row">
                            <div class="col-xs-6">
                                <a class="btn btn-blue btn-primary" href="https://social.tifia.com/en/notifications/index">View all</a>
                            </div>
                            <div class="col-xs-6">
                                <a id="notifications-read-all" class="ajax-action btn btn-trans" href="https://social.tifia.com/en/notifications/read-all">Mark as read</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-footer-menu">
                <ul>
                    <li>
                        <a href="https://social.tifia.com/en/deposit/index">
                            <div class="ic ic-depo"></div>
                            Deposit
                        </a>
                    </li>
                    <li>
                        <a href="https://social.tifia.com/en/withdrawal/index">
                            <div class="ic ic-with"></div>
                            Withdrawal
                        </a>
                    </li>
                    <li>
                        <a class="btn-chat">
                            <div class="ic ic-chat"></div>
                            LiveChat
                        </a>
                    </li>
                    <li>
                        <a id="btn-notifications" class="btn-notifications">
                            <div class="ic ic-notif"></div>
                            Notifications
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </div>

@endsection
