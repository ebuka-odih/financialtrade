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
        <a href="{{ route('homepage') }}" class="logo pull-left">
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
                            <div><label class="control-label" for="loginemailform-password">Password</label>
                                @if (Route::has('password.request'))
                                    <a class="pull-right" href="{{ route('password.request') }}" tabindex="7">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
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
                                    <div class="checkbox-custom checkbox-default"><input type="hidden" name="LoginEmailForm[rememberMe]" value="0">
                                        <input type="checkbox" id="loginemailform-rememberme" name="LoginEmailForm[rememberMe]" value="1" checked tabindex="3">
                                        <label for="loginemailform-rememberme">Remember me</label></div>
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
            &copy; Copyright 2020. All Rights Reserved.
        </p>
    </div>
</section>
<!-- TODO: убрать после перевода панели -->

@include('dashboard.layouts.scripts')
</body>
<!-- Mirrored from social.tifia.com/en/login/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 00:44:48 GMT -->
</html>
