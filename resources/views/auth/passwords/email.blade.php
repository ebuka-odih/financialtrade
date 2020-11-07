
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
                <h1 class="title text-uppercase">Restore your password</h1>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form id="form-reset-password" action="{{ route('password.email') }}" method="post">
                        Type in your email address below (login from your FTM profile) and we'll send you an email with a link to reset your password.    </p>
                    <div class="form-group field-requestform-email required">
                        <label class="control-label" for="requestform-email">Email address</label>
                        <input type="text" id="requestform-email" class="form-control" name="RequestForm[email]" aria-required="true">

                        <p class="help-block help-block-error"></p>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-default" href="{{ route('login') }}">Back to login form</a>
                        <button type="submit" class="btn btn-primary">Reset Password</button>    </div>
                </form>                </div>
        </div>
        <p class="text-center text-muted mt-md mb-md">
            &copy; Copyright 2020. All Rights Reserved.</p>
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
            <a href="../../es.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/ES.png')"></span> Español        </a>
        </li>
        <li>
            <a href="../../fr.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/FR.png')"></span> Français         </a>
        </li>
        <li>
            <a href="../../id.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/ID.png')"></span> Indonesian        </a>
        </li>
        <li>
            <a href="../../ms.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/MY.png')"></span> Malay        </a>
        </li>
        <li>
            <a href="../../pl.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/PL.png')"></span> Polski        </a>
        </li>
        <li>
            <a href="../../pt.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/PT.png')"></span> Português        </a>
        </li>
        <li>
            <a href="../../th.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/TH.png')"></span> ภาษาไทย        </a>
        </li>
        <li>
            <a href="../../vi.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/VN.png')"></span> Tiếng Việt        </a>
        </li>
        <li>
            <a href="../../zh.html?switch-lang=true">
                <span class="language-flag" style="background-image: url('../../images/flags/shiny/16/CN.png')"></span> 中文        </a>
        </li>
    </ul>
</div>

@include('dashboard.layouts.scripts')
<script>jQuery(function ($) {
        jQuery('#form-reset-password').yiiActiveForm([{"id":"requestform-email","name":"email","container":".field-requestform-email","input":"#requestform-email","error":".help-block.help-block-error","validate":function (attribute, value, messages, deferred, $form) {value = yii.validation.trim($form, attribute, [], value);yii.validation.required(value, messages, {"message":"Email cannot be blank."});yii.validation.email(value, messages, {"pattern":/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,"fullPattern":/^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/,"allowName":false,"message":"Invalid email specified.","enableIDN":false,"skipOnEmpty":1});}}], []);
    });</script>    </body>

<!-- Mirrored from social.tifia.com/en/reset-password/index by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 00:45:52 GMT -->
</html>
