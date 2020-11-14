<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

{{--<div id="notifications-mob" class="notifications-block notifications-mob">--}}
{{--    <div class="notifications-mob__content">--}}
{{--        <div class="notifications-title">--}}
{{--            Notifications--}}
{{--            <a href="#!" class="close"><img src="/images/general/close.svg"/></a>--}}
{{--        </div>--}}
{{--        <div class="notifications-content notifications-content-mob loader-wrapper">--}}
{{--        </div>--}}
{{--        <div class="view-more">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xs-6">--}}
{{--                    <a class="btn btn-blue btn-primary" href="/en/notifications/index">View all</a>                                </div>--}}
{{--                <div class="col-xs-6">--}}
{{--                    <a id="notifications-read-all" class="ajax-action btn btn-trans" href="/en/notifications/read-all">Mark as read</a>                                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="fixed-footer-menu">
    <ul>
        <li>
            <a href="#"><div class="ic ic-depo"></div>Deposit</a>
        </li>
        <li>
            <a href="{{ route('user.make_withdrawal') }}"><div class="ic ic-with"></div>Withdrawal</a>
        </li>
        <li>
            <a href="{{ route('user.deposit_history') }}" class="btn-chat"><div class="ic ic-hist"></div>Transaction History</a>
        </li>
        <li>
            <a href="{{ route('user.trades.index') }}">
                <div style="font-weight: 200;" class="fa fa-chart-line fa-3x"></div><br>Trades</a>
        </li>
        <li>
            <a href="{{ route('user.dashboard') }}" class="btn-notifications">
                <div class="ic ic-notif"></div>Home
            </a>
        </li>
    </ul>
</div>

