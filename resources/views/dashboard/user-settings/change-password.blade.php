<!DOCTYPE html>
<html lang="en-US" class="fixed">
@include('dashboard.layouts.head')
<body class="layouts-main- lang-en">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBQR5C"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript">
    (function(a,e,f,g,b,c,d){a[b]||(a.FintezaCoreObject=b,a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)},a[b].l=1*new Date,c=e.createElement(f),d=e.getElementsByTagName(f)[0],c.async=!0,c.defer=!0,c.src=g,d&&d.parentNode&&d.parentNode.insertBefore(c,d))})
    (window,document,"script","https://content.mql5.com/core.js","fz");
    fz("register","website","crirkwwnonoaqlhjnwpackicintsxncayr");
</script>
<section class="body layout-wrapper">
  @include('dashboard.layouts.header')
    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="settings-security" class="contents clearfix">
                <div class="content-center ">
                    <h1 class="no-print">Client's Profile</h1>
                    @include('dashboard.layouts.notice')
                    <br>
                    <div id="content-alert-message">
                    </div>
                    <ul class="top-menu-content first no-print">
                        <li><a href="{{ route('user.profile_details') }}">Profile</a></li>
                        <li><a href="{{ route('user.personal_info') }}">Personal information</a></li>
                        <li><a href="{{ route('user.kyc_verification') }}">Verification</a></li>
                        <li class="active"><a href="{{ route('user.change_password') }}">Security</a></li>
                        <li><a href="/en/login-history/index">Login history</a></li>
                    </ul>
                    <div class="panel-body">
                        <h3>FTM Client's profile password changing</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 style="line-height: 1.5;background: #ecedf0;padding: 10px 10px;display: inline-block;width: 100%;">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    Please set a new password which contains at least 8 symbols, capital and small letters, numbers and special symbols (#, @,! and so on).
                                </h5>
                            </div>
                        </div>
                        <form id="form-settings-password" class="form-horizontal" method="POST" action="{{ route('user.change.password') }}" autocomplete="false">
                            @csrf

                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group field-passwordchangeform-password required">
                                <label class="control-label col-xs-4 col-md-3" for="passwordchangeform-password">New password</label>
                                <div class='col-xs-8 col-md-6'>
                                    <input type="password" id="passwordchangeform-password" class="form-control" name="new_password" autocomplete="current-password"  aria-required="true"><span class='eye-password'></span>
                                    <p class="help-block help-block-error "></p>
                                </div>
                            </div>
                            <div class="form-group field-passwordchangeform-password_repeat required">
                                <label class="control-label col-xs-4 col-md-3" for="passwordchangeform-password_repeat">Confirm new password</label>
                                <div class='col-xs-8 col-md-6'>
                                    <input type="password" id="passwordchangeform-password_repeat" class="form-control" name="new_confirm_password" autocomplete="current-password" aria-required="true"><span class='eye-password'></span>
                                    <p class="help-block help-block-error "></p>
                                </div>
                            </div>
                            <div class="form-group field-passwordchangeform-password_old required">
                                <label class="control-label col-xs-4 col-md-3" for="passwordchangeform-password_old">Enter your current password</label>
                                <div class='col-xs-8 col-md-6'>
                                    <input type="password" id="passwordchangeform-password_old" class="form-control" name="current_password" autocomplete="current-password" aria-required="true"><span class='eye-password'></span>
                                    <p class="help-block help-block-error "></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12 mb-10 text-center">
                                    <button type="submit" class="btn btn-wide btn-success demo-notice">Set a new password</button>
                                </div>
                            </div>
                        </form>
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
</section>

<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');

    if (typeof fbq !== 'undefined') {
        fbq('init', '676329269549113');
        fbq('trackCustom', 'PageView');
    }
</script>
<script src="{{ asset('admin_assets/c9bbf424/yii73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/c9bbf424/yii.validation73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/d4d1979f/build/js/utilsf907.js?v=1598456919') }}"></script>
<script src="{{ asset('admin_assets/d4d1979f/build/js/intlTelInput-jqueryf907.js?v=1598456919') }}"></script>
<script src="{{ asset('admin_assets/c9bbf424/yii.activeForm73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/3b209fd3/jquery.timeago73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/3d5c124f/bin/javascripts/jquery.nanoscroller.min73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/827fde0/jquery.browser.mobiled6f5.js?v=1576325284">') }}"></script>
<script src="{{ asset('admin_assets/b130fe13/dist/jquery.maskedinput.min73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/f7300bcd/jquery.cookie73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/f61b5756/jquery-debounce/jquery.debounceb197.js?v=1586278041') }}"></script>
<script src="{{ asset('admin_assets/3677ede4/jquery.query-object73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/fdedcbaf/dist/jquery.autocomplete.min73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/1ca0b49/ui/widget73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/ac24bae0/js/jquery.fileupload73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/e50f5fb0/jquery.magnific-popup.min73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/7e6d2e57/js/bootstrap-datetimepicker.mind6f5.js?v=1576325284') }}"></script>
<script src="{{ asset('admin_assets/72c42241/dist/autosize.min73a6.js?v=1574168826') }}"></script>
<script src="{{ asset('admin_assets/81c2fe86/pnotify.customd6f5.js?v=1576325284') }}"></script>
<script src="{{ asset('admin_assets/6bb29040/dist/bootstrap3-editable/js/bootstrap-editable.minb038.js?v=1574168827') }}"></script>
<script src="{{ asset('admin_assets/92444326/js/ion.rangeSlider.minb038.js?v=1574168827') }}"></script>
<script src="{{ asset('admin_assets/91093691/js/select2.full.minf066.js?v=1574168852') }}"></script>
<script src="{{ asset('admin_assets/a6ec9adb/clipboard.minb038.js?v=1574168827') }}"></script>
<script src="{{ asset('porto-admin/main6da6.js?v=1576243949') }}"></script>
<script src="{{ asset('porto-admin/assets/vendor/modernizr/modernizr6da6.js?v=1576243949') }}"></script>
<script src="{{ asset('porto-admin/assets/javascripts/theme6da6.js?v=1576243949') }}"></script>
<script src="{{ asset('porto-admin/assets/javascripts/theme.init6da6.js?v=1576243949') }}"></script>
<script src="{{ asset('porto-admin/theme.custom4221.js?v=1601636118') }}"></script>
<script src="{{ asset('porto-admin/jquery.inputmask.mind77d.js?v=1580462975') }}"></script>
<script src="{{ asset('porto-admin/assets/javascripts/help/jcfilter.min6da6.js?v=1576243949') }}"></script>
<script src="{{ asset('porto-admin/assets/javascripts/responsive-switch.mind77d.js?v=1580462975') }}"></script>
<script>jQuery(function ($) {
        $(document).on('click', 'span.eye-password', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let field = $(this).parent().find('input');
            let type = field.attr('type');
            if (type === 'password') {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        });
        jQuery('#form-settings-password').yiiActiveForm([{"id":"passwordchangeform-password","name":"password","container":".field-passwordchangeform-password","input":"#passwordchangeform-password","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Set a new password"});yii.validation.string(value, messages, {"message":"New password must be a string.","min":8,"tooShort":"Password shall contain 8 or more characters, including capital letters, small letters and numbers.","skipOnEmpty":1});yii.validation.regularExpression(value, messages, {"pattern":/^(?=.*[a-z])(?=.*[A-Z]).*$/,"not":false,"message":"Password shall contain 8 or more characters, including capital letters, small letters and numbers.","skipOnEmpty":1});yii.validation.regularExpression(value, messages, {"pattern":/^(?=.*[0-9!@#$%^&*]).*$/,"not":false,"message":"Password shall contain 8 or more characters, including capital letters, small letters and numbers.","skipOnEmpty":1});yii.validation.string(value, messages, {"message":"New password must be a string.","min":8,"tooShort":"New password should contain at least 8 characters.","max":50,"tooLong":"New password should contain at most 50 characters.","skipOnEmpty":1});}},{"id":"passwordchangeform-password_repeat","name":"password_repeat","container":".field-passwordchangeform-password_repeat","input":"#passwordchangeform-password_repeat","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Confirm your new password"});yii.validation.compare(value, messages, {"operator":"==","type":"string","compareAttribute":"passwordchangeform-password","compareAttributeName":"PasswordChangeForm[password]","skipOnEmpty":1,"message":"Repeat new password must be equal to \"New password\"."}, $form);}},{"id":"passwordchangeform-password_old","name":"password_old","container":".field-passwordchangeform-password_old","input":"#passwordchangeform-password_old","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Specify your current password"});}}], []);
    });
</script>
</body>
</html>
