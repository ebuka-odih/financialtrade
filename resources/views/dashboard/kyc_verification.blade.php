@extends('dashboard.layouts.app')
@section('content')
    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="documents-index" class="contents clearfix">
                <div class="content-center ">
                    <h1 class="no-print">Client's Profile</h1>
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <header class="panel-heading">
                                <h2 class="panel-title">For full profile verification please complete following steps:</h2>
                                <p class="panel-subtitle">
                                    <a class="mb-xs mt-xs mr-xs btn btn-xs btn-success" href="{{ route('user.kyc_verification') }}">Upload documents</a>
                                </p>
                                <h2 class="panel-title">After uploading your document it will take atlest 1hr before confirmation</h2>
                            </header>
                        </div>
                    </div>
                    <br>
                    <div id="content-alert-message">
                    </div>
                    <ul class="top-menu-content first no-print">
                        <li><a href="/en/settings/index">Profile</a></li>
                        <li><a href="{{ route('user.personal_info') }}">Personal information</a></li>
                        <li class="active"><a href="{{ route('user.kyc_verification') }}">Verification</a></li>
                        <li><a href="/en/settings/security">Security</a></li>
                        <li><a href="/en/settings/notifications">Notifications</a></li>
                        <li><a href="/en/settings/privacy">Privacy</a></li>
                        <li><a href="/en/login-history/index">Login history</a></li>
                    </ul>
                    <section class="panel">
                        <a name="id"></a>
                        <header class="panel-heading">
                            @if(auth()->user()->status != 2)
                                <h2 class="panel-title">Identity (<span class="text-unverified">unverified</span>)</h2>
                            @else
                                <h2 class="panel-title">Identity (<span class="text-verified">verified</span>)</h2>
                            @endif
                        </header>
                        <div class="panel-body">
                            <div class="document-section">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="/images/general/passport-demo.png" class="upload-image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="upload-content">
                                            <p>In compliance with the requirements of regulation</p>
                                            <p>upload a color copy of the document (passport, driving license or local identification card) with:</p>
                                            <ul>
                                                <li>Your photo,</li>
                                                <li>Name and Surname,</li>
                                                <li>Date of birth,</li>
                                                <li>Expiry Date,</li>
                                                <li>Number of the document.</li>
                                                <li>Full-size color copy showing the document in full. Copies which show your documents with the edges cut off will not be accepted..</li>
                                            </ul>
                                        </div>
                                        <br>
                                        <div style="display: table">
                                            <div class="document-list __not-empty document-list-type-id">
                                                <div class="document pull-left type-id">
                                                    <div class="document-date">
                                                        2020-10-27 21:14:34
                                                    </div>
                                                    <div class="document-content">
                                                        <a class="image-link" href="/en/documents/show?id=141963"><img src="/en/documents/show-preview?id=141963" alt=""></a>
                                                    </div>
                                                    <div class="document-status">
                                                        <span class="text-unverified">Rejected</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="document-upload">
                                            <input type="hidden" class="document-upload-type" name="type" value="id">
                                            <span class="fileinput-button">
                                       <i class="fa fa-plus"></i>
                                       <span>Add photo</span>
                                       <input accept="image/jpeg, image/png, image/gif, application/pdf" type="file" name="document" data-type="name" data-status="0" class="document-upload-button demo-notice">
                                       </span>
                                            <div class="progress light" style="display: none">
                                                <div style="width: 0;" class="progress-bar progress-bar-success"></div>
                                            </div>
                                        </div>
                                        <br>
                                        <p class="post-upload-text">
                                            * Supported file formats: PDF, JPG, JPEG, PNG. Maximum size 5 megabyte
                                        </p>
                                        <span style="display: inline-block">
                                       <div class="upload_text_warning" style="background-color: #dff0d8;border-color: #3c763d;margin-top: 15px;padding: 10px 15px; display: none;">
                                          <p class="upload_text_warning" style="margin-bottom: 0; font-size: 17px;">Thank you. File was uploaded successfully.</p>
                                       </div>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <script type="text/javascript">
                        //<![CDATA[
                        (function ($) {
                            $(document).ready(function () {
                                $(document).on('dragleave drop', '.document-upload', function (e) {
                                    e.preventDefault();
                                    $(this).removeClass('__drag');
                                });

                                $(document).on('dragover', '.document-upload', function (e) {
                                    e.preventDefault();
                                    $(this).addClass('__drag');
                                });

                                $('.document-upload-button').each(function () {
                                    $(this).fileupload({
                                        url: '/en/documents/upload',
                                        dataType: 'json',
                                        sequentialUploads: true,
                                        formData: {},
                                        dropZone: $(this).closest('.document-upload'),
                                        send: function () {
                                            $(this).closest('.document-upload').find('.progress > div').css('width', '0%');
                                            $(this).closest('.document-upload').find('.progress').show();
                                        },
                                        fail: function(e, data) {
                                            App.showMessage(data.jqXHR.responseJSON.message);
                                        },
                                        done: function (e, response) {
                                            $(this).closest('.document-upload').find('.progress').hide();
                                            $(this).closest('.document-upload').find('.progress > div').css('width', '0%');

                                            if (response.result.status === 'success') {
                                                $(this).closest('.document-section').find('.document-list').html(response.result.content);
                                                $(this).closest('.document-section').find('.document-list').addClass('__not-empty');
                                                $(this).closest('.document-section').find('.upload-verification').html(response.result.text);
                                                $(this).closest('.document-section').find('.upload-verification').removeClass('success','warning','danger').addClass(response.result.class);
                                                $(this).closest('.document-section').find('.upload_text_warning').show();
                                                setTimeout(function() { $('.upload_text_warning').hide(555); }, 5000);
                                                // App.initPopupImages();
                                            } else {
                                                App.showMessage(response.result.message, response.result.status);
                                            }
                                        },
                                        progressall: function (e, data) {
                                            var progress = parseInt(data.loaded / data.total * 100, 10);
                                            $(this).closest('.document-upload').find('.progress > div').css('width', progress + '%');
                                        }
                                    })
                                        .bind('fileuploadsubmit', function (e, data) {
                                            data.formData = {
                                                type: $(this).closest('.document-upload').find('.document-upload-type').val()
                                            };
                                        })
                                        .prop('disabled', !$.support.fileInput)
                                        .parent().addClass($.support.fileInput ? undefined : 'disabled');
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
            <div id="notifications-mob" class="notifications-block notifications-mob">
                <div class="notifications-mob__content">
                    <div class="notifications-title">
                        Notifications                            <a href="#!" class="close"><img src="/images/general/close.svg"/></a>
                    </div>
                    <div class="notifications-content notifications-content-mob loader-wrapper">
                    </div>
                    <div class="view-more">
                        <div class="row">
                            <div class="col-xs-6">
                                <a class="btn btn-blue btn-primary" href="/en/notifications/index">View all</a>
                            </div>
                            <div class="col-xs-6">
                                <a id="notifications-read-all" class="ajax-action btn btn-trans" href="/en/notifications/read-all">Mark as read</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixed-footer-menu">
                <ul>
                    <li>
                        <a href="/en/deposit/index">
                            <div class="ic ic-depo"></div>
                            Deposit
                        </a>
                    </li>
                    <li>
                        <a href="/en/withdrawal/index">
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
