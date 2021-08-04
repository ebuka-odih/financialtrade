<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} broker. Online Forex trading</title>
    <meta name="description" content="Official website of Financialtrademarket broker. Earn online by trading on Forex and financial markets. With Financialtrade broker, you can trade in сurrency, oil, precious metals and stock indices. Reliable ECN Forex broker with high-quality service.">
    <meta name="keywords">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Financialtrademarktets Forex broker. Online Forex trading with ECN broker">
    <meta property="og:site_name" content="FTM">
    <meta property="og:url" content="index.html">
    <link rel="icon" type="image/png" href="{{ asset('images/new-site/logo3.png') }}"/>
    <meta property="og:description" content="Official website of FTM Forex broker. Earn online by trading on Forex and financial markets. With FTM broker, you can trade in сurrency, oil, precious metals and stock indices. Reliable ECN Forex broker with high-quality service.">
{{--    <link href="index.blade.phpprasing" rel="canonical">--}}
    <link href="{{ asset('dist/app6597.css?v=1601635857') }}" rel="stylesheet">

    <script src="{{ asset('assets/3f891744/jquery.min3aa2.js?v=1601722409') }}"></script>

    <meta name="google-site-verification" content="frd60SSriaELs4qIMHsqWlH3yAXBTMsGzABa2rq9yAY" />

    <style>
        .translated-ltr{margin-top:-30px;}
        .translated-ltr{margin-top:-30px;}
        .goog-te-banner-frame {display: none;margin-top:-20px;}

        .goog-logo-link {
            display:none !important;
        }

        .goog-te-gadget select{
            /*color: transparent !important;*/
            height: inherit;
        }

        @media (max-width: 400px) {
            .goog-te-gadget {
                margin-top: 30px
            }
        }
        @media (max-width: 400px) {
            .goog-te-gadget select{
                height: inherit;
            }
            .map {
                width: 400px;
                height: 350px;
            }
        }
    </style>
    <!-- Chatra {literal} -->
    <script>

        function hasClass(elem,cls) {
            return elem.className.match(new RegExp('(\\s|^)'+cls+'(\\s|$)'));
        }

        Tifia = {
            cabinetUrl: 'https://social.tifia.com/en/',
            apiUrl: 'https://api.tifia.com',
            quotesUrl: 'https://tifia.com'
        };

        Lang = {
            'day'               : 'day',
            'days'              : 'days',
            'View'              : 'View',
            'Equity'            : 'Equity',
            'Lifespan'          : 'Lifespan',
            'Investors'         : 'Investors',
            'Profitability'     : 'Profitability',
            'InvestorsEquity'   : 'Investor&#039;s equity',
            'TradersCommission' : 'Trader&#039;s commission',
        };

        App = {
            loader: {
                getObj: function(obj) {
                    if (obj.closest('.loader-wrapper')) {
                        return obj.closest('.loader-wrapper');
                    } else if ( obj.closest('.dropdown-menu').length > 0 && obj.closest('.btn-group').length > 0 ) {
                        return obj.closest('.btn-group');
                    }

                    return obj;
                },
                show: function (obj) {
                    var obj = this.getObj(obj);

                    if (!obj.hasClass('no-loader')) {
                        obj.addClass('ajax-loading');

                        if (obj.height() >= 50) {
                            obj.append('<div class="loader"></div>');
                        } else {
                            obj.append('<div class="loader __mini"></div>');
                        }

                        obj.addClass('overlay');
                    }
                },
                hide: function (obj) {
                    var obj = this.getObj(obj);

                    obj.removeClass('ajax-loading');
                    obj.find('.loader').remove();
                    obj.removeClass('overlay');
                },
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myModal").modal('show');
        });
    </script>
    <!-- /Chatra {/literal} -->
</head>

<body class="lang-en">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBQR5C" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="main-wrapper">
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 20px">NOTE THAT ALL PAYMENTS SHOULD BE MADE DIRECTLY TO THE COMPANY’S ACCOUNT/CRYPTO WALLET ADDRESS AVAILABLE ON THE DEPOSIT PAGE OF YOUR TRADING ACCOUNT. AS SOON AS PAYMENT IS DONE PLEASE UPLOAD PROOF OF PAYMENT.
                        THE COMPANY WOULDN’T BE HELD RESPONSIBLE FOR ANY LOSS THAT COMES WITH MAKING PAYMENTS TO ANY ACCOUNT MANAGER. THANK YOU FOR YOUR UNDERSTANDING AND COOPERATION.</p>

                </div>
            </div>
        </div>
    </div>
    <header class="" style="height: 95px;">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="left-block mb-5">
                    <div class="logo">
                       <p>
                           <a style="margin-top: -30px; color: white; line-height: 1px" href="{{ route('homepage') }}"><img alt="Financial Trade Markets Limited" height="70" src="{{ asset('images/new-site/logo-white.png') }}">FinancialTradeMarket</a>
                       </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="main-menu">
                            <div id="navbarNav" class="collapse navbar-collapse">
                                <ul class="">
                                    <li class="mob-only no-bg open-acc"><a class="" href="{{ route('register') }}" rel="nofollow">Registration</a>                                            </li>
                                    <li class="mob-only no-bg"><a class="" href="{{ route('login') }}" rel="nofollow">Sign in</a></li>
                                    <li>
                                        <a style="cursor: pointer" href="{{ route('homepage') }}">Home<span></span></a>
                                        <div class="bg-menu"></div>
                                    </li>

                                    <li>
                                        <a style="cursor: pointer" href="{{ route('why_ftm') }}" rel="nofollow">About us</a>
                                        <div class="bg-menu"></div>
                                    </li>
                                    <li>
                                        <a style="cursor: pointer" href="{{ route('contact_us') }}" rel="nofollow">Contact us</a>
                                        <div class="bg-menu"></div>
                                    </li>
                                    <li>
                                        <div class="bg-menu"></div>
                                    </li>
                                    <li class="mob-only">
                                        <div style="height: 20px; margin-top: -30px; margin-left: 20px" id="google_translate_element"></div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-block">
                    <div class="reg-btn">
                        <a class="" href="{{ route('register') }}" rel="nofollow">Open account</a>
                        <a class="" href="{{ route('login') }}" rel="nofollow">Sign in</a>
                    </div>
                    <div class="lang-block">
                        <span class="separator"></span>
                        <div style="height: 20px; margin-top: 30px;"  id="google_translate_element">
                        </div>
                </div>
                </div>
                <button class="navbar-toggler navbar-btn-menu" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </nav>
        </div>
    </header>
    <div class="menu-overlay"></div>
    <div class="bg-fix">
        <div class="bg-fix-new">

            @yield('content')

        <footer class="">
        <div class="container-fluid">
            <ul class="payments">
                <li><img alt="Mastercard logo" data-src="{{ asset('images/new-site/footer-payments/mastercard.svg') }}" class="lazy"></li>
                <li><img alt="Visa logo" data-src="{{ asset('images/new-site/footer-payments/visa.svg') }}" class="lazy"></li>
                <li><img alt="Bank Wire logo" data-src="{{ asset('images/new-site/footer-payments/bankwire.svg') }}" class="lazy"></li>
                <li><img alt="Skrill logo" data-src="{{ asset('images/new-site/footer-payments/skrill.svg') }}" class="lazy"></li>
                <li><img alt="Perfect Money logo" data-src="{{ asset('images/new-site/footer-payments/pm.svg') }}" class="lazy"></li>
                <li><img alt="Neteller logo" data-src="{{ asset('images/new-site/footer-payments/neteller.svg') }}" class="lazy"></li>
{{--                <li><img alt="Local Deposit" data-src="https://tifia.com/images/new-site/footer-payments/localdepo.svg" class="lazy"></li>--}}
                <li><img alt="Fasapay logo" data-src="{{ asset('images/new-site/footer-payments/fasapay.svg') }}" class="lazy"></li>
                <li><img alt="Bitcoin logo" data-src="{{ asset('images/new-site/footer-payments/bitcoin.svg') }}" class="lazy"></li>
            </ul>
        </div>
        <div class="container-content">
           <div class="container">
               <ul class="footer-menu">
                   <li class="col-md-4">
                       <ul>
                           <li>About us</li>
                           <li><a href="{{ route('why_ftm') }}">Why us?</a></li>
                       </ul>
                   </li>
                   <li class="col-md-4">
                       <ul>
                           <li>Contact us</li>
                           <li><a href="{{ route('contact_us') }}">Contacts</a></li>
                       </ul>
                   </li>
                   <li class="col-md-4">
                       <ul>
                           <li>Chat Us</li>
                           <li><a href="https://tawk.to/chat/5fb83d81a1d54c18d8ebcf4e/default">Chat Us</a></li>
                       </ul>
                   </li>
{{--                   <li>--}}
{{--                       <ul>--}}
{{--                           <li>Partnership</li>--}}
{{--                           <li><a href="#">Partners&#039; commissions</a></li>--}}
{{--                       </ul>--}}
{{--                   </li>--}}
               </ul>
           </div>
            <ul class="copyright-text">
                <li>
                    <div class="logo-footer">
                        <p>
                            <a style="margin-top: -30px; color: white; line-height: 1px; font-size: 16px" href="{{ route('homepage') }}">
                                <img  alt="FTM Markets Limited" height="70" src="{{ asset('images/new-site/logo-white.png') }}">
                                <br>FinancialTradeMarket</a>
                        </p>
                    </div>
                    <p>Copyright © 2011 - 2020<br>
                        Financial Trade Markets Limited, All rights reserved<br>
                        Email: <a href="mailto:support@financialtrademarkets.com">support@financialtrademarkets.com/</a>
                    </p>
                </li>
                <li class="docs-main">
                    <ul>
                        <li><a href="{{ route('terms') }}">Terms and Condition</li>
                        <li><a href="{{ route('policy') }}">Privacy policy</a></li>
                        <li><a href="{{ route('why_ftm') }}">Why Choose Us</a></li>
                        <li><a href="{{ route('risk') }}">Risk Disclosure</a></li>
{{--                        <li><a href="{{ route('risk') }}">Contact Us</a></li>--}}
                    </ul>
                </li>
            </ul>
            <div class="switch-footer">
                <a href="#" class="rs-link" data-link-desktop="Switch to the desktop version"
                   data-link-responsive="Switch to the mobile version"></a>
            </div>
        </div>
    </footer>
        </div>
    </div>

</div>


{{--<div class="support-btn ">--}}
{{--    <a class="livechat-btn" style="cursor:pointer" onclick="Chatra(&#039;openChat&#039;)"><span></span></a>--}}
{{--    <a class="callback-btn" href="en/callback.html"><span></span></a>--}}
{{--</div>--}}

<script src="{{ asset('js/TweenMax.minde6a.js?v=1576248880') }}" async="" defer=""></script>
<script src="{{ asset('js/ScrollMagic.minde6a.js?v=1576248880') }}" async="" defer=""></script>
<script src="{{ asset('js/animation.gsap51c7.js?v=1600956792') }}" async="" defer=""></script>
<script src="{{ asset('js/scene-scrollde6a.js?v=1576248880') }}" async="" defer=""></script>
<script src="{{ asset('vue-apps/main-page/quotes/app51c7.js?v=1600956792') }}"></script>
<script src="{{ asset('vue-apps/main-page/quotes/vendor51c7.js?v=1600956792') }}"></script>
<script src="{{ asset('assets/b0720b71/yii3aa2.js?v=1601722409') }}"></script>
<script src="{{ asset('js/popper.minde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('js/bootstrap.minde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('assets/a7d5894c/lazyload.min3aa2.js?v=1601722409') }}"></script>
<script src="{{ asset('js/lazyload-css.1.0.5.minde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('js/new-mainc14a.js?v=1579685345') }}"></script>
<script src="{{ asset('js/main-page5e1f.js?v=2') }}"></script>
<script src="{{ asset('js/select2.full.minde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('js/jquery.inputmask.min03a8.js?v=1584449694') }}"></script>
<script src="{{ asset('js/flickity.pkgd.minde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('js/jquery.jscrollpane.minde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('js/jquery.mousewheelde6a.js?v=1576248880') }}"></script>
<script src="{{ asset('js/bodyScrollLock.minde6a.js?v=1576248880') }}"></script></body>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

{{--<script>--}}
{{--    (function(w,d,u){--}}
{{--        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);--}}
{{--        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);--}}
{{--    })(window,document,'https://cdn.bitrix24.com/b17035423/crm/site_button/loader_4_ykuzos.js');--}}
{{--</script>--}}

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="675e76c4-afbc-4e61-9e12-29c021bf7dee";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

</html>
