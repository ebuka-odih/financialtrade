@extends('dashboard.layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/forex.css') }}">

    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="profile-index" class="contents clearfix">
                @include('dashboard.layouts.notice')
                <div class="content-center">
                    <h1 class="no-print">Dashboard</h1>
                    <div id="content-alert-message">
                    </div>

                    <div style="margin-top: 20px;" class="container">
                        <div class="row">
                            <div class="col-sm-4" style="background-color: #3e3e3e; color: white;">
                                <div style="margin-top: 5px; margin-left: 100px;">
                                    <div class="container align-self-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary">Day</button>
                                            <button type="button" class="btn btn-primary">Week</button>
                                            <button type="button" class="btn btn-primary">Month</button>
                                        </div>
                                    </div>
                                </div>
                                <table>
                                    <tr>
                                        <th> </th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 15px; color: white;">Profit: <h5 style="font-size: 15px; font-weight: bold;">Credit: </h5></td>
                                        <td style="text-align: right; font-size: 15px; color: white;"><span style="font-size: 15px;">$@convert($total_trade)</span> <h5 style="font-size: 15px; font-weight: bold;">$0.00</h5></td>
                                    </tr>
                                    @forelse($trades as $trade)
                                        @if($trade->order == 'sell')
                                    <tr>
                                        <td>{{ $trade->pair }}, <span style="font-size:11.5px;" id="span1">{{ $trade->order }}</span> <span  id="span1">{{ $trade->price }}</span> <h5 style="font-size:13px;"  id="h1">{{ $trade->opening_price }} &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">{{ $trade->closing_price }}</span></h5></td>
                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan">{{ $trade->buy_at }}</span> <h5 style="font-size:15px;" id="h1down">{{ $trade->buy_at }}</h5></td>
                                    </tr>
                                        @else
                                    <tr>
                                        <td>{{ $trade->pair }}, <span style="font-size:11.5px;" id="span2">{{ $trade->order }}</span> <span id="span2">{{ $trade->price }}</span> <h5 style="font-size:13px;" id="h2">{{ $trade->opening_price }}  &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">{{ $trade->closing_price }} </span></h5></td>
                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan2">{{ $trade->buy_at }}</span> <h5 style="font-size:15px; color: dodgerblue;" id="h1down2">{{ $trade->buy_at }}</h5></td>
                                    </tr>
                                        @endif
                                    @empty
                                        <div class="row">
                                            <div class="col-sm-6" style="background-color: #3e3e3e; color: white;">
                                                <table>
                                                    <tr>
                                                        <th> </th>
                                                        <th></th>
                                                    </tr>
                                                    <tr>
                                                        <td>GBPUSD, <span style="font-size:11.5px;" id="span1">sell</span> <span  id="span1">0.00</span> <h5 style="font-size:13px;"  id="h1">0.00000 &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000</span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>USDCAD, <span style="font-size:11.5px;" id="span2">buy</span> <span id="span2">0.00</span> <h5 style="font-size:13px;" id="h2">0.00000  &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000 </span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan2">00.00.0000 00:00:00</span> <h5 style="font-size:15px; color: dodgerblue;" id="h1down2">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>EURUSD, <span style="font-size:11.5px;" id="span3">buy</span> <span id="span3"> 0.00</span><h5 style="font-size:13px;" id="h3">0.00000  &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000</span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan3">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down3">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>USDCHF, <span style="font-size:11.5px;" id="span4">sell</span> <span id="span4"> 0.00</span><h5 style="font-size:13px;" id="h4">0.00000 &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000 </span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan4">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down4">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>USDCAD, <span style="color: #1E90FF; font-size: 11.5px;" id="span5">buy</span> <span style="color:#1E90FF;" id="span5">0.00</span><h5 style="font-size:13px;" id="h5">0.00000 &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i><span style="font-size:13px;">0.00000 </span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan5">00.00.0000 00:00:00</span> <h5 style="color: dodgerblue; font-size: 15px;" id="h1down5">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>EURGBP, <span style="font-size:11.5px;" id="span6">sell</span> <span id="span6">0.00</span> <h5 style="font-size:13px;" id="h6">0.00000&nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000</span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan6">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down6">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>USDCAD, <span style="font-size:11.5px;" id="span7">sell</span> <span id="span5">0.00</span> <h5 style="font-size:13px;" id="h7">0.00000  &nbsp <i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000 </span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan7">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down7">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>EURUSD, <span style="color:#1E90FF; font-size; 11.5px;" id="span8">buy</span> <span style="color:#1E90FF;" id="span8">0.00</span> <h5 style="font-size:13px;" id="h8">0.00000&nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000</span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan8">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down8">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>AUDUSD, <span style="color:#1E90FF; font-size: 11.5px;" id="span9">buy</span> <span style="color:#1E90FF;" id="span9">0.00</span> <h5 style="font-size:13px;" id="h9">0.00000 &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000</span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan9">00.00.0000 00:00:00</span> <h5 style="color:dogerblue; font-size:15px;" id="h1down9">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>USDJPY, <span style="color:#1E90FF; font-size: 11.5px;" id="span10">buy</span> <span style="color:#1E90FF;" id="span10">0.00</span><h5 style="font-size:13px;" id="h10">0.00000 &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:13px;">0.00000</span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan10">00.00.0000 00:00:00</span> <h5 style="font-size:15px;"id="h1down10">0</h5></td>
                                                    </tr>

                                                    <tr>
                                                        <td>GBPUSD, <span style="color:red; font-size:11.5px" id="span11">sell </span><span style="color: red;" id="span11">0.00</span> <h5 style="font-size:13px;" id="h11">0.00000  &nbsp<i class="fa fa-long-arrow-right" aria-hidden="true"></i> <span style="font-size:11.5px;">0.00000 </span></h5></td>
                                                        <td style="text-align: right;"><span style="font-size:11.5px;" id="downspan11">00.00.0000 00:00:00</span> <h5 style="font-size:15px;" id="h1down11">0</h5></td>
                                                    </tr>

                                                </table>
                                            </div>

                                        </div>
                                    @endforelse


                                </table>
                            </div>
                            <div class="col-md-8">
                                <!-- TradingView Widget BEGIN -->
                                <div class="tradingview-widget-container">
                                    <div id="tradingview_d1eb1"></div>
                                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener" target="_blank"><span class="blue-text">EURUSD Chart</span></a></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget(
                                            {
                                                "width": 980,
                                                "height": 610,
                                                "symbol": "AAPL+FX:EURUSD",
                                                "interval": "D",
                                                "timezone": "Etc/UTC",
                                                "theme": "dark",
                                                "style": "1",
                                                "locale": "en",
                                                "toolbar_bg": "#f1f3f6",
                                                "enable_publishing": false,
                                                "allow_symbol_change": true,
                                                "container_id": "tradingview_d1eb1"
                                            }
                                        );
                                    </script>
                                </div>
                                <!-- TradingView Widget END -->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
          @include('dashboard.layouts.footer')
            @include('dashboard.layouts.mobile-nav')
                </div>
        </section>
    </div>

@endsection
