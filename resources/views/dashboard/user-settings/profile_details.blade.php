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
                        <li><a href="/en/login-history/index">Login history</a></li>
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
                                <a href="/deposit/index?promo=promo30" target="_blank">
                                    <img src="/images/banners/en/huge_deposit.png"
                                         class="animated slideInRight"
                                         style="padding-top: 0; object-fit: contain; width: 100%;"
                                         alt="Banner"/>
                                </a>
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
                                                <a class="user-menu-link" href="/en/user/GIB_Trade" title="Menu" data-id="25890" data-username="@GIB_Trade"><img src="https://social.tifia.com/uploads/avatars/002/589/1bbccfc960a764135a840eeaa89474ae.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="/en/user/GIB_Trade" data-id="25890">@GIB_Trade</a> <span class="online-user-25890 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+1753.24%</span>
                                        </td>
                                        <td class="text-right action">
                                            <a class="btn btn-sm btn-success" href="/en/sync-trading/investors-account?attach_user=GIB_Trade&amp;attach_account=STR-6192423" title="Copy"><i class="fa fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="/en/user/CareTaker" title="Menu" data-id="41440" data-username="@CareTaker"><img src="https://social.tifia.com/uploads/avatars/004/144/9dc078ea88021779f6dcb2638bc3756f.png" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="/en/user/CareTaker" data-id="41440">@CareTaker</a> <span class="online-user-41440 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+725.85%</span>
                                        </td>
                                        <td class="text-right action">
                                            <a class="btn btn-sm btn-success" href="/en/sync-trading/investors-account?attach_user=CareTaker&amp;attach_account=STR-6104288" title="Copy"><i class="fa fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="/en/user/BlackCougarFX" title="Menu" data-id="59650" data-username="@BlackCougarFX"><img src="https://social.tifia.com/uploads/avatars/005/965/b314fbd09457388cd5a15718cb31fa6d.jpeg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="/en/user/BlackCougarFX" data-id="59650">@BlackCougarFX</a> <span class="online-user-59650 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+538.22%</span>
                                        </td>
                                        <td class="text-right action">
                                            <a class="btn btn-sm btn-success" href="/en/sync-trading/investors-account?attach_user=BlackCougarFX&amp;attach_account=CLS-6184715" title="Copy"><i class="fa fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="/en/user/SQD_Trainer" title="Menu" data-id="85738" data-username="@SQD_Trainer"><span class="image male">S</span></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="/en/user/SQD_Trainer" data-id="85738">@SQD_Trainer</a> <span class="online-user-85738 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+527.26%</span>
                                        </td>
                                        <td class="text-right action">
                                            <a class="btn btn-sm btn-success" href="/en/sync-trading/investors-account?attach_user=SQD_Trainer&amp;attach_account=PRO-6199006" title="Copy"><i class="fa fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="40">
                                            <div class="avatar-wrapper avatar-mini">
                                                <a class="user-menu-link" href="/en/user/JaD_FX" title="Menu" data-id="78966" data-username="@JaD_FX"><span class="image male">J</span></a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="user-menu"><a class="user-menu-link" href="/en/user/JaD_FX" data-id="78966">@JaD_FX</a> <span class="online-user-78966 online-status" title="Offline"></span></span>                                <br/>
                                            Profit: <span class="label-profit">+519.56%</span>
                                        </td>
                                        <td class="text-right action">
                                            <a class="btn btn-sm btn-success" href="/en/sync-trading/investors-account?attach_user=JaD_FX&amp;attach_account=STR-6188317" title="Copy"><i class="fa fa-copy"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="text-center mt-md">
                                    <a href="/en/monitoring/index">Traders' rating</a>
                                </div>
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
                                            <a href="/en/feed/instrument?instrument=XAUUSDx">
                                          <span class="symbol size-32" title="XAUUSD">
                                          <img src="/images/instruments/XAU.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=XAUUSDx"> <span>XAUUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 6220; Sell: 6153">12373</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=GBPUSDx">
                                          <span class="symbol size-32" title="GBPUSD">
                                          <img src="/images/flags/flat/32/GB.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=GBPUSDx"> <span>GBPUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 5331; Sell: 5317">10648</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=EURUSDx">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="/images/flags/flat/32/EU.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=EURUSDx"> <span>EURUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 4846; Sell: 5448">10294</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=EURUSD">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="/images/flags/flat/32/EU.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=EURUSD"> <span>EURUSD</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 2379; Sell: 2446">4825</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=EURJPYx">
                                          <span class="symbol size-32" title="EURJPY">
                                          <img src="/images/flags/flat/32/EU.png"><img src="/images/flags/flat/32/JP.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=EURJPYx"> <span>EURJPYx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 1830; Sell: 2255">4085</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <a href="/en/instruments/index">Full list</a>
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
                            <li><a href="https://www.tifia.com/company/why-tifia" target="_blank">Why choose us</a></li>
                            <li><a href="https://www.tifia.com/company/company-news" target="_blank">Our news</a></li>
                            <li><a href="https://www.tifia.com/en/company/legal-information" target="_blank">Legal information</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Contact us</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://chat.chatra.io/?hostId=73iWprWuzbCNWwgFK" target="_blank">LiveChat</a></li>
                            <li><a href="https://www.tifia.com/contacts" target="_blank">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Forex trading</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://www.tifia.com/trading-accounts" target="_blank">Trading accounts</a></li>
                            <li><a href="https://www.tifia.com/trading-instruments" target="_blank">Trading instruments</a></li>
                            <li><a href="https://www.tifia.com/ecn-system" target="_blank">ECN system</a></li>
                            <li><a href="https://www.tifia.com/trading-platforms/metatrader" target="_blank">MT4 trading platform</a></li>
                            <li><a href="https://www.tifia.com/analytics" target="_blank">Analytics</a></li>
                            <li><a href="https://www.tifia.com/payments" target="_blank">Deposit/Withdrawal</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Forex tools</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://www.tifia.com/analytics/forex-calculator" target="_blank">Trader&#039;s Calculator</a></li>
                            <li><a href="https://www.tifia.com/analytics/economic-calendar" target="_blank">Economic Calendar</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Partnership</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://www.tifia.com/partners" target="_blank">For Partners</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-2">
                        <p class="text-left" style="margin: 10px 0 10px;">Regulatory documents</p>
                        <ul class="menu-links text-left">
                            <li><a href="https://www.tifia.com/uploads/docs/terms-of-provision-and-use-of-information-en.pdf" target="_blank">Terms and Conditions</a></li>
                            <li><a href="https://www.tifia.com/uploads/docs/privacy-policy-en.pdf" target="_blank">Privacy policy</a></li>
                            <li><a href="https://www.tifia.com/uploads/docs/aml-policy-en.pdf" target="_blank">AML Policy</a></li>
                            <li><a href="https://www.tifia.com/uploads/docs/risk-disclosure-en.pdf" target="_blank">Risk disclosure</a></li>
                        </ul>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <p class="text-left">
                            Risk warning: trading forex and CFD’s carries high risks of loosing money and not suitable for all investors. Read here our full <a href="https://www.tifia.com/uploads/docs/risk-disclosure-en.pdf" target="_blank">Risk Disclosure</a>.                                <br><br>
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
