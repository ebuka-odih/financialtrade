@extends('dashboard.layouts.app')

@section('content')
<div class="inner-wrapper">
@include('dashboard.layouts.sidebar')
<section class="content-body" role="main">
<div id="settings-index" class="contents clearfix">
<div class="content-center ">
<h1 class="no-print">Client's Profile</h1>
@include('dashboard.layouts.notice')
<br>
<div id="content-alert-message">
</div>
<ul class="top-menu-content first no-print">
    <li class="active"><a href="{{ route('user.profile_details') }}">Profile</a></li>
    <li><a href="{{ route('user.personal_info') }}">Personal information</a></li>
    <li><a href="{{ route('user.kyc_verification') }}">Verification</a></li>
    <li><a href="{{ route('user.change_password') }}">Security</a></li>
</ul>
<div class="row">
    <div class="col-md-5">
        <div class="panel">
            <div class="panel-body">
                <div class="text-center">
                    <p class="mb-md">Profile photo</p>

                        <div id="avatar-upload-container">
                            <div class="avatar-wrapper avatar-my">
{{--                                                    @if($users_details->profile_images == null)--}}
{{--                                                        <img id="avatar-image-change" class="avatar-image" src="{{ asset('images/general/avatar.png') }}">--}}
{{--                                                    @else--}}
                                    <img id="avatar-image-change" class="avatar-image" src="{{ $users_details->profile_image }}">
{{--                                                    @endif--}}
                            </div>

                            <div id="avatar-progress-bar" class="progress light mt-md" style="display: none">
                                <div style="width: 0;" class="progress-bar progress-bar-success"></div>
                            </div>
                            <form action="{{ route('user.profile_picture_store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="file"  name="profile_image" required class="form-control">

                                <button type="submit"  class="btn btn-success">Upload</button>

                            </form>
                        </div>
                       <div style="margin-top: 8px">
                           @if ($errors->any())
                               <div class="alert alert-danger">
                                   <ul>
                                       @foreach ($errors->all() as $error)
                                           <li>{{ $error }}</li>
                                       @endforeach
                                   </ul>
                               </div>
                           @endif
                           @if(session()->has('success'))
                               <div class="alert alert-success">
                                   {{ session()->get('success') }}
                               </div>
                           @endif
                       </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="panel">
            <div class="panel-body table-responsive">
                <table class="table first-bold  m-none">

                    <tr>
                        <td>Client status</td>
                        <td>
                            <span>{!! $users_details->user_status()  !!}</span>
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Registration date</td>
                        <td>{{ date('Y-m-d', strtotime($users_details->created_at)) }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            Full name
                        </td>
                        <td>
                           <p class="text text-capitalize">{{ $users_details->title }}. {{ $users_details->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email
                        </td>
                        <td>
                            {{ $users_details->email }}
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Address
                        </td>
                        <td>
                            {{ $users_details->country }}, {{ $users_details->postal_code }},  {{ $users_details->state }},  {{ $users_details->city }},  {{ $users_details->address }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Phone
                        </td>
                        <td>
                            {{ $users_details->phone }}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td class="text text-capitalize"> {{ $users_details->gender }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>About me</td>
                        <td> {{ $users_details->bio }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    <hr>
                    <tr>
                        <td>Bitcoin Address</td>
                        <td class="text text-capitalize"> {{ $users_details->btc_wallet }}</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //<![CDATA[
    (function ($) {
        $(document).ready(function () {
            var avatar = null;
            var originalUrl = 'https://social.tifia.com/images/general/avatar.png';

            $('#avatar-upload').fileupload({
                url: '/en/settings/upload-avatar',
                dataType: 'json',
                send: function () {
                    $('#avatar-progress-bar > div').css('width', '0%');
                    $('#avatar-progress-bar').show();
                },
                fail: function(e, data) {
                    App.showMessage(data.jqXHR.responseJSON.message);
                },
                done: function (e, response) {
                    $('#avatar-progress-bar').hide();
                    $('#avatar-progress-bar > div').css('width', '0%');

                    if (response.result.status === 'success') {
                        originalUrl = response.result.originalAvatar;
                        $('.avatar-wrapper.avatar-my img').attr('src', response.result.avatar +'?'+ Math.random());
                        $('#avatar-resize-toggle').removeClass('hidden');
                    } else {
                        App.showMessage(response.result.message, response.result.status);
                    }
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#avatar-progress-bar > div').css('width', progress + '%');
                }
            }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');

            $(document).on('click', '#avatar-resize-toggle', function () {
                $('#avatar-upload-container').hide();
                $('#avatar-resize-container').show();

                avatar = $('#avatar-original').croppie({
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'circle'
                    },
                    boundary: {
                        width: 250,
                        height: 250
                    }
                });

                avatar.croppie('bind', {
                    url: originalUrl
                });
            });

            $(document).on('click', '#avatar-resize-cancel', function () {
                $('#avatar-original').croppie('destroy');
                $('#avatar-resize-container').hide();
                $('#avatar-upload-container').show();
            });

            $(document).on('click', '#avatar-resize-save', function () {
                var data = $('#avatar-original').croppie('get');
                var check = true;
                $.each(data.points, function(i, v) {
                    if (isFinite(v) !== true) {
                        check = false;
                    }
                });
                if (check) {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {x1: data.points[0], y1: data.points[1], x2: data.points[2], y2: data.points[3]},
                        url: '/en/settings/resize-avatar',
                        success: function (response) {
                            if (response.status === 'success') {
                                $('#avatar-original').croppie('destroy');
                                $('#avatar-resize-container').hide();
                                $('#avatar-upload-container').show();
                                $('.avatar-wrapper.avatar-my img').attr('src', response.avatar + '?' + Math.random());
                            }
                        }
                    });
                } else {
                    $('#avatar-original').croppie('destroy');
                    $('#avatar-resize-container').hide();
                    $('#avatar-upload-container').show();
                }
            });
        });
    })(window.jQuery);
    //]]>
</script>
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
