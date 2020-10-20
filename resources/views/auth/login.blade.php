<!DOCTYPE html>
<html lang="en-US">
@include('dashboard.layouts.head')
<body class="outside-page layouts-login- external-alt sb-l-c sb-r-c">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBQR5C"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript">
    (function(a,e,f,g,b,c,d){a[b]||(a.FintezaCoreObject=b,a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)},a[b].l=1*new Date,c=e.createElement(f),d=e.getElementsByTagName(f)[0],c.async=!0,c.defer=!0,c.src=g,d&&d.parentNode&&d.parentNode.insertBefore(c,d))})
    (window,document,"script","https://content.mql5.com/core.js","fz");
    fz("register","website","crirkwwnonoaqlhjnwpackicintsxncayr");
</script>
<section class="body-sign">
    <div class="center-sign">
        <a href="../../index.html" class="logo pull-left">
            <img src="{{ asset('images/new-site/logo3.svg') }}" class="logo-full" alt="FTM" />
            <img src="{{ asset('images/new-site/logo3.svg') }}" class="logo-mini" alt="FTM" />
        </a>
        <div class="panel panel-sign">
            <div class="panel-title-sign">
                <h1 class="title text-uppercase">FTM login form</h1>
            </div>
            <div class="panel-body">
                <div class="login-wrapper">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="login-form-username-password" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group field-loginemailform-email required">
                            <div><label class="control-label" for="loginemailform-email">Email</label></div>
                            <div>
                                <input type="text" id="loginemailform-email" class="form-control input-lg" name="email" tabindex="1" aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>
                        <div class="form-group field-loginemailform-password required">
                            <div><label class="control-label" for="loginemailform-password">Password</label><a class="pull-right" href="../reset-password/index.html" tabindex="7">Forgot password?</a></div>
                            <div>
                                <input type="password" id="loginemailform-password" class="form-control input-lg" name="password" tabindex="2" aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group field-loginemailform-rememberme">
                                    <div class="checkbox-custom checkbox-default"><input type="hidden" name="LoginEmailForm[rememberMe]" value="0"><input type="checkbox" id="loginemailform-rememberme" name="LoginEmailForm[rememberMe]" value="1" checked tabindex="3"> <label for="loginemailform-rememberme">Remember me</label></div>
                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right"><button type="submit" class="btn btn-primary submit-btn" tabindex="4">Login</button></div>
                        </div>
                    </form>
                    <p class="text-center">Not yet registered? <a href="{{ route('register') }}" tabindex="5">Registration</a></p>
                </div>
            </div>
        </div>
        <p class="text-center text-muted mt-md mb-md">
            Risk warning: trading forex and CFD’s carries high risks of loosing money and not suitable for all investors. Read here our full <a href="https://www.tifia.com/uploads/docs/risk-disclosure-en.pdf" target="_blank">Risk Disclosure</a>.                <br><br>
            &copy; Copyright 2020. All Rights Reserved.
        </p>
    </div>
</section>
<!-- TODO: убрать после перевода панели -->
<div class="language-menu">
    <button data-toggle="dropdown" class="btn dropdown-toggle">
        <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/US.png')"></span>
        <span class="language-name">English</span>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li>
            <a href="../../es/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/ES.png')"></span> Español        </a>
        </li>
        <li>
            <a href="../../fr/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/FR.png')"></span> Français         </a>
        </li>
        <li>
            <a href="../../id/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/ID.png')"></span> Indonesian        </a>
        </li>
        <li>
            <a href="../../ms/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/MY.png')"></span> Malay        </a>
        </li>
        <li>
            <a href="../../pl/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/PL.png')"></span> Polski        </a>
        </li>
        <li>
            <a href="../../pt/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/PT.png')"></span> Português        </a>
        </li>
        <li>
            <a href="../../th/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/TH.png')"></span> ภาษาไทย        </a>
        </li>
        <li>
            <a href="../../vi/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/VN.png')"></span> Tiếng Việt        </a>
        </li>
        <li>
            <a href="../../zh/login/index.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/CN.png')"></span> 中文        </a>
        </li>
    </ul>
</div>
@include('dashboard.layouts.scripts')
</body>
<!-- Mirrored from social.tifia.com/en/login/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 00:44:48 GMT -->
</html>
