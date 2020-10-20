@extends('dashboard.layouts.app')
@section('content')

    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="profile-index" class="contents clearfix">
                <div class="content-center ">
                    <h1 class="no-print">GIB@Trade</h1>
                    <div id="content-alert-message">
                    </div>
                    <ul class="top-menu-content first no-print">
                        <li class="active"><a href="https://social.tifia.com/en/home?username=GIB%40Trade">User&#039;s profile</a></li>
                        <li><a href="https://social.tifia.com/en/feed/user?username=GIB%40Trade">User&#039;s posts</a></li>
                        <li><a href="https://social.tifia.com/en/statistics-master/index?username=GIB%40Trade">Trader&#039;s statistics</a></li>
                        <li><a href="https://social.tifia.com/en/followers?username=GIB%40Trade">Followers</a></li>
                        <li><a href="https://social.tifia.com/en/follow?username=GIB%40Trade">Following</a></li>
                        <li><a href="https://social.tifia.com/en/pm/dialog?username=GIB%40Trade">Messages</a></li>
                    </ul>
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
                                            <h4 class="title">Investors</h4>
                                            <div class="info">
                                                <strong class="amount">0</strong>
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
                                    <h3>General information</h3>
                                    <table class="table table-condensed table-striped">
                                        <tbody>
                                        <tr>
                                            <td>Registration date</td>
                                            <td>2018-06-06</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><img class="mr-xs" src="https://social.tifia.co/images/flags/shiny/16/MY.png" alt="" align="left">Malaysia</td>
                                        </tr>
                                        <tr>
                                            <td>Language</td>
                                            <td>Malay</td>
                                        </tr>
                                        <tr>
                                            <td>About me</td>
                                            <td>None</td>
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
                                            <td>Investors</td>
                                            <td class="text-right label-follower text-weight-semibold"><a href="https://social.tifia.com/en/duplicators?username=GIB%40Trade">0</a></td>
                                        </tr>
                                        <tr>
                                            <td>I duplicate</td>
                                            <td class="text-right label-provider text-weight-semibold"><a href="https://social.tifia.com/en/duplicate?username=GIB%40Trade">0</a></td>
                                        </tr>
                                        <tr>
                                            <td>Followers</td>
                                            <td class="text-right label-readers text-weight-semibold"><a href="https://social.tifia.com/en/followers?username=GIB%40Trade">2</a></td>
                                        </tr>
                                        <tr>
                                            <td><span>I follow</td>
                                            <td class="text-right label-readers text-weight-semibold"><a href="https://social.tifia.com/en/follow?username=GIB%40Trade">0</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Trader's accounts</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="widget-summary">
                                        <div class="summary">
                                            <h4 class="title">STR-6192423</h4>
                                            <div class="info">
                                                <table class="table table-condensed table-nobordered mb-xs mt-xs">
                                                    <tr>
                                                        <td>Profitability</td>
                                                        <td class="text-right">
                                                            <span class="label-profit">+554.31 %</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trader's commission</td>
                                                        <td class="text-right">9 %</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Investors</td>
                                                        <td class="text-right">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Equity</td>
                                                        <td class="text-right">154.70 USD</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="summary-footer">
                                            <a class="btn btn-xs btn-primary" href="https://social.tifia.com/en/statistics-master/index?username=GIB%40Trade&amp;login=6192423&amp;server=30">Statistics</a>                                <a class="btn btn-xs btn-success" href="https://social.tifia.com/en/sync-trading/investors-account?attach_user=GIB%40Trade&amp;attach_account=STR-6192423">Copy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="sidebar-right-content">
                        <div class="panel">
                            <div class="panel-body top-10-panel" style="padding: 0; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);">
                                <a href="https://social.tifia.com/deposit/index?promo=promo30" target="_blank">
                                    <img src="https://social.tifia.com/images/banners/en/huge_deposit.png"
                                         class="animated slideInRight"
                                         style="padding-top: 0; object-fit: contain; width: 100%;"
                                         alt="Banner"/>
                                </a>
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
                                            <a href="https://social.tifia.com/en/feed/instrument?instrument=XAUUSDx">
                                          <span class="symbol size-32" title="XAUUSD">
                                          <img src="https://social.tifia.com/images/instruments/XAU.png"><img src="https://social.tifia.com/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="https://social.tifia.com/en/feed/instrument?instrument=XAUUSDx"> <span>XAUUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 4787; Sell: 4692">9479</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://social.tifia.com/en/feed/instrument?instrument=GBPUSDx">
                                          <span class="symbol size-32" title="GBPUSD">
                                          <img src="https://social.tifia.com/images/flags/flat/32/GB.png"><img src="https://social.tifia.com/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="https://social.tifia.com/en/feed/instrument?instrument=GBPUSDx"> <span>GBPUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 4500; Sell: 4377">8877</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://social.tifia.com/en/feed/instrument?instrument=EURUSDx">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="https://social.tifia.com/images/flags/flat/32/EU.png"><img src="https://social.tifia.com/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="https://social.tifia.com/en/feed/instrument?instrument=EURUSDx"> <span>EURUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 3584; Sell: 4138">7722</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://social.tifia.com/en/feed/instrument?instrument=EURUSD">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="https://social.tifia.com/images/flags/flat/32/EU.png"><img src="https://social.tifia.com/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="https://social.tifia.com/en/feed/instrument?instrument=EURUSD"> <span>EURUSD</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 2151; Sell: 2427">4578</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://social.tifia.com/en/feed/instrument?instrument=EURJPYx">
                                          <span class="symbol size-32" title="EURJPY">
                                          <img src="https://social.tifia.com/images/flags/flat/32/EU.png"><img src="https://social.tifia.com/images/flags/flat/32/JP.png">
                                          </span></a>                        <a href="https://social.tifia.com/en/feed/instrument?instrument=EURJPYx"> <span>EURJPYx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 1771; Sell: 1928">3699</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <a href="https://social.tifia.com/en/instruments/index">Full list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="page-footer" style="border-top: 1px solid rgba(62, 62, 62, 0.35); padding-top: 20px;">
                <div class="row">
                    <div class="first col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">About Us</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://tifia.co/company/why-tifia" target="_blank">Why choose us</a></li>
                            <li><a href="https://tifia.co/company/company-news" target="_blank">Our news</a></li>
                            <li><a href="https://tifia.co/en/company/legal-information" target="_blank">Legal information</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Contact us</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://chat.chatra.io/?hostId=73iWprWuzbCNWwgFK" target="_blank">LiveChat</a></li>
                            <li><a href="https://tifia.co/contacts" target="_blank">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Forex trading</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://tifia.co/trading-accounts" target="_blank">Trading accounts</a></li>
                            <li><a href="https://tifia.co/trading-instruments" target="_blank">Trading instruments</a></li>
                            <li><a href="https://tifia.co/ecn-system" target="_blank">ECN system</a></li>
                            <li><a href="https://tifia.co/trading-platforms/metatrader" target="_blank">MT4 trading platform</a></li>
                            <li><a href="https://tifia.co/analytics" target="_blank">Analytics</a></li>
                            <li><a href="https://tifia.co/payments" target="_blank">Deposit/Withdrawal</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Forex tools</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://tifia.co/analytics/forex-calculator" target="_blank">Trader&#039;s Calculator</a></li>
                            <li><a href="https://tifia.co/analytics/economic-calendar" target="_blank">Economic Calendar</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Partnership</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://tifia.co/partners" target="_blank">For Partners</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Regulatory documents</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://tifia.co/uploads/docs/terms-of-provision-and-use-of-information-en.pdf" target="_blank">Terms and Conditions</a></li>
                            <li><a href="https://tifia.co/uploads/docs/privacy-policy-en.pdf" target="_blank">Privacy policy</a></li>
                            <li><a href="https://tifia.co/uploads/docs/aml-policy-en.pdf" target="_blank">AML Policy</a></li>
                            <li><a href="https://tifia.co/uploads/docs/risk-disclosure-en.pdf" target="_blank">Risk disclosure</a></li>
                        </ul>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <p class="text-left">
                            Risk warning: trading forex and CFD’s carries high risks of loosing money and not suitable for all investors. Read here our full <a href="https://tifia.co/uploads/docs/risk-disclosure-en.pdf" target="_blank">Risk Disclosure</a>.                                <br><br>
                            Copyright © 2011 - 2020 Tifia Markets Limited, All rights reserved                                <br>
                            Financial services provided by Tifia Markets Limited<br>
                            <a href="#" class="rs-link" data-link-desktop="Switch to the desktop version" data-link-responsive="Switch to the mobile version"></a>
                        </p>
                    </div>
                </div>
            </footer>
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