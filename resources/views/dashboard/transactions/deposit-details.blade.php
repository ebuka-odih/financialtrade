@extends('dashboard.layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="deposit-history" class="contents clearfix">
                <div class="content-center ">
                    <h1 class="no-print">Finance</h1>
                   @include('dashboard.layouts.notice')
                    <br>
                    <div id="content-alert-message">
                    </div>
                    <ul class="top-menu-content second no-print">
                        <li><a href="{{ route('user.deposit_history') }}">Deposits history</a></li>
                        <li><a href="{{ route('user.withdrawal_history') }}">Withdrawals history</a></li>
                    </ul>
                    <div class="ajax-pagination">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <h3>Statistics</h3>
                                                <table class="table table-condensed table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <td>Last Deposit</td>
                                                        <td>$@convert($l_deposit)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Approved Deposit</td>
                                                        <td>$@convert($a_deposit)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pending Deposit</td>
                                                        <td>$@convert($p_deposit)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Canceled Deposit</td>
                                                        <td>$@convert($c_deposit)</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total Deposit</td>
                                                        <td>$@convert($t_deposit)</td>
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
                                </div>

                                <div class="table-responsive">
                                    @if( $deposit_detail->status == 'approved')
                                    <table class="table table-condensed table-bordered">
                                        <tr>
                                            <td colspan="2"> <h4>Transaction Details</h4></td>
                                        </tr>
                                        <tr>
                                            <th>TRANSACTION STATUS:</th>
                                            <td>{!! $deposit_detail->status() !!}</td>
                                        </tr>
                                        <tr>
                                            <th>INVESTMENT PLAN:</th>
                                            <td>{{ optional($deposit_detail->invest_plan)->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>INVESTED AMOUNT:</th>
                                            <td>${{ $deposit_detail->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th>ROI:</th>
                                            <td>$@convert($deposit_detail->expected_profit())</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL RETURN (WITH CAPITAL):</th>
                                            <td>$@convert($deposit_detail->expected_profit() + $deposit_detail->amount)</td>
                                        </tr>

                                        <tr>
                                            <th>START DATE:</th>
                                            <td colspan="2">{{ date('d-M-y', strtotime($deposit_detail->approved_date() )) }}</td>
                                        </tr>
                                        <tr>
                                            <th>ENDING DATE:</th>
                                            <td>{{ date('d-M-y', strtotime($deposit_detail->ending_date())) }}</td>
                                        </tr>
                                        <tr>
                                            <th>INTERVAL:</th>
                                            <td>{{ optional($deposit_detail->invest_plan)->term_days }} Days</td>
                                        </tr>
                                        <tr>
                                            <th>DAILY PROFIT:</th>
                                            <td>{{ optional($deposit_detail->invest_plan)->daily_return }}(%)</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL PROFIT (%):</th>
                                            <td>{{ optional($deposit_detail->invest_plan)->total_return }}(%)</td>
                                        </tr>
                                        <tr>
                                            <th>PROFIT EARNED:</th>
                                            <td colspan="2">$ @convert($deposit_detail->earning) <span style="margin-left: 20px">(without capital)</span></td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL EARNED:</th>
                                            <td colspan="2">$ @convert($deposit_detail->total_earned()) <span style="margin-left: 20px">(plus capital)</span></td>
                                        </tr>
                                        <tr>
                                            <th> PROGRESS :</th>
                                            @if($deposit_detail->invest_plan->term_days == $i)
                                                <td colspan="2">Plan Ended</td>
                                            @else
                                                <td colspan="2">Plan In Progress...</td
                                            @endif
                                        </tr>
                                        <tr>
                                            <td colspan=3>&nbsp;</td>
                                        </tr>
                                    </table>
                                    @else
                                        <p class="text text-danger">Note: Your investment will start counting immediately you payment is confirmed.</p>
                                        <table class="table table-condensed table-bordered">
                                            <tr>
                                                <td colspan="2"> <h4>Transaction Details</h4></td>
                                            </tr>
                                            <tr>
                                                <th>TRANSACTION STATUS:</th>
                                                <td>{!! $deposit_detail->status() !!}</td>
                                            </tr>
                                            <tr>
                                                <th>INVESTMENT PLAN:</th>
                                                <td>{{ optional($deposit_detail->invest_plan)->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>INVESTED AMOUNT:</th>
                                                <td>${{ $deposit_detail->amount }}</td>
                                            </tr>
                                            <tr>
                                                <th>ROI:</th>
                                                <td>$@convert($deposit_detail->expected_profit())</td>
                                            </tr>
                                            <tr>
                                                <th>TOTAL RETURN (WITH CAPITAL):</th>
                                                <td>$@convert($deposit_detail->expected_profit() + $deposit_detail->amount)</td>
                                            </tr>
                                            <tr>
                                                <th>INTERVAL:</th>
                                                <td>{{ optional($deposit_detail->invest_plan)->term_days }} Days</td>
                                            </tr>
                                            <tr>
                                                <th>DAILY PROFIT:</th>
                                                <td>{{ optional($deposit_detail->invest_plan)->daily_return }}(%)</td>
                                            </tr>
                                            <tr>
                                                <th>TOTAL PROFIT (%):</th>
                                                <td>{{ optional($deposit_detail->invest_plan)->total_return }}(%)</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2"> <h3 class="text text-center">Make Payment To The BTC Wallet Address Below</h3></th>

                                            </tr>

                                            <tr>
                                                <th>MAKE PAYMENT:</th>
                                                <td><input type="text" class="form-control form-control-lg" id="btc" value="{{ setting('wallet_id') }}">
                                                    <button class="btn btn-outline-info" data-clipboard-target="#btc">
{{--                                                        <span>Copy To Clipboard</span>--}}
                                                        <img height="20" width="20" src="{{ asset('images/clippy.svg') }}" alt="Copy to clipboard">
                                                    </button>
                                                    <small>Click on the copy icon to copy the address</small>
                                                </td>
{{--                                                <td><a target="_blank" href="{{ $deposit_detail->payment_url }}">Make Payment</a></td>--}}
                                            </tr>
                                            <tr>
                                                <th>SCAN TO MAKE PAYMENT:</th>
                                                <td><img height="300" width="300" src="{{ asset('img/barcode.jpeg') }}" alt="Payment Barcode">
                                                </td>
{{--                                                <td><a target="_blank" href="{{ $deposit_detail->payment_url }}">Make Payment</a></td>--}}
                                            </tr>
                                            <tr>
                                                <th>UPLOAD PAYMENT PROOF:</th>

                                                <td>
                                                    @if(session()->has('success_message'))
                                                        <div class="alert alert-success col-md-10">
                                                            {{ session()->get('success_message') }}
                                                        </div>
                                                    @endif
                                                    <form action="{{ route('user.payment_proof') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input required type="hidden" name="payment_proof_id" value="{{ $deposit_detail->id }}">
                                                        <input required type="file" class="form-control form-control-lg" name="payment_proof">
                                                        <button type="submit" class="btn btn-success mt-5">Submit</button>
                                                    </form>
                                                </td>
                                                {{--                                                <td><a target="_blank" href="{{ $deposit_detail->payment_url }}">Make Payment</a></td>--}}
                                            </tr>
                                            <tr>
                                                <td colspan=3>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"> <span class="text text-capitalize text-danger">Note: Your Payment will be approved once we confirm your payment</span></td>
                                            </tr>

                                        </table>
                                        <a href="{{ route('user.deposit_history') }}" class="btn btn-success">Finish</a>
                                    @endif
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.btn');
    </script>
@endsection
