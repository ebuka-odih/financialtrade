@extends('dashboard.layouts.app')

@section('content')
    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="withdrawal-index" class="contents clearfix">
                <div class="content-center ">

                    <h1 class="no-print">Finance</h1>

                   @include('dashboard.layouts.notice')
                    <br>

                    <div id="content-alert-message">
                    </div>


                    <ul class="top-menu-content first no-print"><li><a href="/en/deposit/index">Deposit</a></li>
                        <li class="active"><a href="/en/withdrawal/index">Withdrawal</a></li>
                        <li><a href="{{ route('user.deposit_history') }}">Transactions history</a></li>
                    <div class="withdrawal-page">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="block-payment-method unavailable" data-url="/en/withdrawal/form?method=btc" data-method="btc" style="border-left-color: #6C8EB6"
                                             title=""  data-original-title="Please, use for the withdrawal only the same payment method (bank card, wallet, payment system and so on) which you have used for deposit your trading account.">
                                            <div class="wrapper">
                                                <div class="logo">
                                                    <img src="https://social.tifia.com/images/payment-system/btc.png?v=1" alt="Bitcoin" />
                                                </div>
                                                <div class="descr">
                                                    <p class="title">Bitcoin</p>
                                                    <div class="info">
                                                        <p>Min. amount: 2000.00 USD</p>
                                                        <p>Fee: 0%</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="block-payment-method unavailable" data-url="/en/withdrawal/form?method=mb" data-method="mb" style="border-left-color: #900d66"
                                             title=""  data-original-title="Please, use for the withdrawal only the same payment method (bank card, wallet, payment system and so on) which you have used for deposit your trading account.">
                                            <div class="wrapper">
                                                <div class="descr col-md-8">
                                                    <p class="title">Account Balance</p>
                                                    <div class="info">
                                                        <p>Balance: {{ auth()->user()->acct_wallet }} USD</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                        <div id="form-wrapper" class="ajax-form-wrapper panel-body loader-wrapper" style="" data-select2-id="form-wrapper">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('declined'))
                                <div class="alert alert-danger">
                                    {{ session()->get('declined') }}
                                </div>
                            @endif
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('success_message') }}
                                </div>
                            @endif
                            <h3>Withdrawal information</h3>
                            <form id="form-withdrawal-local"  action="{{ route('user.make_withdrawal_store') }}" method="POST" data-select2-id="form-withdrawal-local">
                                @csrf
                                <div class="form-group ">
                                    <div><label class="control-label col-xs-4 col-md-3" for="withdrawallocalform-amount">From</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <div class="input-group select2-bootstrap-prepend select2-bootstrap-append">
                                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                            <input type="text"  class="form-control" value="Financial Trade Market" readonly aria-required="true"></div>
                                    </div>
                                </div>

                                <div class="form-group form-target-currency field-withdrawallocalform-amount required">
                                    <div><label class="control-label col-xs-4 col-md-3" for="withdrawallocalform-amount">Amount</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <div class="input-group select2-bootstrap-prepend select2-bootstrap-append">
                                            <span class="input-group-addon">USD</span>
                                            <input type="number" id="withdrawallocalform-amount" class="form-control" name="amount"  placeholder="0.00" aria-required="true" required>
                                        </div>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <h3>Personal information</h3>
                                <div class="form-group field-withdrawallocalform-name required">
                                    <div><label class="control-label col-xs-4 col-md-3" for="withdrawallocalform-name">Name</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="withdrawallocalform-name" class="form-control text text-uppercase" readonly value="{{ auth()->user()->name }}" aria-required="true">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <!--    -->
                                <div class="form-group field-withdrawallocalform-address required">
                                    <div><label class="control-label col-xs-4 col-md-3" for="withdrawallocalform-address">Wallet Address</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="withdrawallocalform-address" class="form-control" readonly value="{{ auth()->user()->btc_wallet }}" aria-required="true">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-withdrawallocalform-email required">
                                    <div><label class="control-label col-xs-4 col-md-3" for="withdrawallocalform-email">Email</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="withdrawallocalform-email" class="form-control" readonly value="{{ auth()->user()->email }}" aria-required="true">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-9 text-right mb-10">
                                        <button type="submit" class="btn btn-success demo-notice">Continue</button>
                                    </div>
                                </div>
                            </form>
                            <script type="text/javascript">
                                //<![CDATA[
                                (function ($) {
                                    $(document).ready(function () {
                                        $('form .form-select-account select').trigger('change');

                                        var inputAmount = $("#withdrawallocalform-amount");

                                        inputAmount.inputmask('numeric', {
                                            'allowMinus': false,
                                            'decimalProtect': false,
                                            'autoGroup': true,
                                            'groupSeparator': " ",
                                            'groupSize': 3,
                                            'digits': 2,
                                            'digitsOptional': false,
                                            'prefix': '',
                                            'placeholder': '0',
                                            'rightAlign': false,
                                            'max': 999999999999
                                        });
                                    });
                                })(window.jQuery);
                                //]]>
                            </script>
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
