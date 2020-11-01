@extends('dashboard.layouts.app')

@section('content')
    <div class="inner-wrapper">
      @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="withdrawal-history" class="contents clearfix">
                <div class="content-center ">
                    <h1 class="no-print">Finance</h1>
                   @include('dashboard.layouts.notice')
                    <br>
                    <div id="content-alert-message">
                    </div>
                    <ul class="top-menu-content second no-print">
                        <li><a href="{{ route('user.deposit_history') }}">Deposits history</a></li>
                        <li class="active"><a href="{{ route('user.withdrawal_history') }}">Withdrawals history</a></li>
                    </ul>
                    <div class="ajax-pagination">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-bordered">
                                        <thead>
                                        <tr>
{{--                                            <th>#</th>--}}
                                            <th>Created Date</th>
                                            <th>Approved Date</th>
                                            <th>Wallet</th>
                                            <th>Withdrawal amount</th>
                                            <th>Payment method</th>
                                            <th>Payment amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="ajax-pagination-target">
                                        @forelse($withdrawals as $withdrawal)
{{--                                            <div style="visibility: hidden">@for($i = 1; $i < 100; $i++)@endfor</div>--}}
                                        <tr>
                                            <td>{{ date('d/m/y h:i A', strtotime($withdrawal->created_at)) }}</td>
                                            @if($withdrawal->status == 'pending' || $withdrawal->status == 'canceled')
                                                <td>"--/--/--"</td>
                                            @else
                                            <td>{{ date('d/m/y h:i A', strtotime($withdrawal->approved_date)) }}</td>
                                            @endif
                                            <td>{{ $withdrawal->user->btc_wallet }}</td>
                                            <td>$@convert($withdrawal->amount)</td>
                                            <td>{{ $withdrawal->payment_method }}</td>
                                            <td>$@convert($withdrawal->payment_amt())</td>
                                            <td>{!! $withdrawal->status() !!}</td>
                                            @if($withdrawal->status == 'pending')
                                            <td><a href="{{ route('user.cancel_withdraw', $withdrawal->id) }}">Cancel</a></td>
                                            @else
                                                <td></td>
                                            @endif
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text text-center">No Transaction Found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="sidebar-right-content">
                        <div class="panel">
                            <div class="panel-body top-10-panel" style="padding: 0; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div class="tradingview-widget-container__widget"></div>
                                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">EURUSD Rates</span></a></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                        {
                                            "symbol": "FX:EURUSD",
                                            "width": "100%",
                                            "height": "100%",
                                            "locale": "en",
                                            "dateRange": "1M",
                                            "colorTheme": "light",
                                            "trendLineColor": "#37a6ef",
                                            "underLineColor": "#E3F2FD",
                                            "isTransparent": false,
                                            "autosize": true,
                                            "largeChartUrl": ""
                                        }
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <h3>Top traders</h3>
                                <table class="table table-condensed table-middle mb-none top-masters">
                                    <tbody>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="/en/user/GIB_Trade" title="Menu" data-id="25890" data-username="@GIB_Trade"><img src="{{ asset('uploads/avatars/1bbccfc960a764135a840eeaa89474ae.jpg') }}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="#" data-id="25890">@GIB_Trade</a> <span class="online-user-25890 online-status online" title="Online"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+1690.39%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="#" title="Menu" data-id="30499" data-username="@hafizz"><img src="{{ asset('uploads/avatars/cb5100644e38f52f2547ca531c1e8a3c.jpg') }}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="#" data-id="30499">@hafizz</a> <span class="online-user-30499 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+768.55%</span>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="#" title="Menu" data-id="41440" data-username="@CareTaker"><img src="{{ asset('uploads/avatars/9dc078ea88021779f6dcb2638bc3756f.png') }}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="#" data-id="41440">@CareTaker</a> <span class="online-user-41440 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+713.27%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="#" title="Menu" data-id="64641" data-username="@maverick"><img src="{{ asset('uploads/avatars/deb4d62c072a26fe96f5e3a45a6b27b9.jpg') }}" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="#" data-id="64641">@maverick</a> <span class="online-user-64641 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+679.44%</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="#" title="Menu" data-id="85738" data-username="@SQD_Trainer"><span class="image male">S</span></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="#" data-id="85738">@SQD_Trainer</a> <span class="online-user-85738 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+666.54%</span>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>

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
            @include('dashboard.layouts.mobile-nav')
        </section>
    </div>
@endsection
