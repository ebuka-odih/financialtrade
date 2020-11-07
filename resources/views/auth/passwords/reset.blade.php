<!DOCTYPE html>
<html lang="en-US">
@include('dashboard.layouts.head')
<body class="outside-page layouts-login- external-alt sb-l-c sb-r-c">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBQR5C"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
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
                <h1 class="title text-uppercase">FTM registration form</h1>
            </div>
            <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="form-registration" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group field-registerform-email required">
                        <div><label class="control-label" for="registerform-email">Email</label></div>
                        <div>
                            <input type="text" id="registerform-email" class="form-control input-lg @error('email') is-invalid @enderror" name="email" aria-required="true" value="{{ $email ?? old('email') }}" required autocomplete="email">
                            <p class="help-block help-block-error"></p>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row mb-md">
                        <div class="form-group field-registerform-password required">
                            <div class='col-sm-12'><label class="control-label" for="registerform-password">Set your password:</label></div>
                            <div class='col-sm-12'>
                                <input type="password" id="registerform-password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" autocomplete="new-password" aria-required="true"><span class='eye-password'></span>
                                <p class="help-block help-block-error"></p>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-md">
                        <div class="form-group field-registerform-password_repeat required">
                            <div class='col-sm-12'><label class="control-label" for="registerform-password_repeat">Repeat a password:</label></div>
                            <div class='col-sm-12'>
                                <input type="password" id="registerform-password_repeat" class="form-control input-lg" name="password_confirmation" aria-required="true"><span class='eye-password'></span>
                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="submit" class="btn btn-primary pull-right" >Reset Password</button>
                        </div>
                    </div>
                </form>
                <p class="text-center">Changed Mind? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
        <p class="text-center text-muted mt-md mb-md">

            &copy; Copyright 2020. All Rights Reserved.
        </p>
    </div>
</section>
<!-- TODO: убрать после перевода панели -->


@include('dashboard.layouts.scripts')

<script>jQuery(function ($) {
        $(document).on('click', 'span.eye-password', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var field = $(this).parent().find('input');
            var type = field.attr('type');
            if (type === 'password') {
                field.attr('type', 'text');
            } else {
                field.attr('type', 'password');
            }
        });
        $('span.eye-password').css('top', '13px');
        (function ($) {
            "use strict";
            $('#registerform-phone').intlTelInput({"formatOnDisplay":false});
        })(jQuery);
        (function ($) {
            "use strict";
            $('#registerform-phone')
                .parents('form')
                .on('submit', function() {
                    $('#registerform-phone')
                        .val($('#registerform-phone')
                            .intlTelInput('getNumber'));
                });
        })(jQuery);
        jQuery('#form-registration').yiiActiveForm([{"id":"registerform-full_name","name":"full_name","container":".field-registerform-full_name","input":"#registerform-full_name","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Full name cannot be blank."});value = yii.validation.trim($form, attribute, [], value);yii.validation.regularExpression(value, messages, {"pattern":/^\#?([a-zA-Z\@'\*\\/\.]+ +[a-zA-Z\@'\*\\/\.\s]+)+$/i,"not":false,"message":"Your full name should include first and last names. Only Latin characters and spaces allowed","skipOnEmpty":1});}},{"id":"registerform-country","name":"country","container":".field-registerform-country","input":"#registerform-country","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Country cannot be blank."});yii.validation.range(value, messages, {"range":["AF","AX","AL","DZ","AS","AD","AO","AI","AQ","AG","AR","AM","AW","AC","AU","AT","AZ","BS","BH","BD","BB","BY","BZ","BJ","BM","BT","BO","BA","BW","BR","IO","VG","BN","BG","BF","BI","KH","CM","IC","CV","BQ","KY","CF","EA","TD","CL","CN","CX","CC","CO","KM","CG","CD","CK","CR","CI","HR","CU","CW","CY","CZ","DK","DG","DJ","DM","DO","EC","EG","SV","GQ","ER","EE","SZ","ET","FK","FO","FJ","FI","FR","GF","PF","TF","GA","GM","GE","DE","GH","GI","GR","GL","GD","GP","GU","GT","GG","GN","GW","GY","HT","HN","HK","HU","IS","IN","ID","IR","IQ","IE","IM","IT","JM","JE","JO","KZ","KE","KI","XK","KW","KG","LA","LV","LB","LS","LR","LY","LI","LT","LU","MO","MG","MW","MY","MV","ML","MT","MH","MQ","MR","MU","YT","MX","FM","MD","MC","MN","ME","MS","MA","MZ","MM","NA","NR","NP","NL","NC","NZ","NI","NE","NG","NU","NF","KP","MK","MP","NO","OM","PK","PW","PS","PA","PG","PY","PE","PH","PN","PL","PT","XA","XB","PR","QA","RE","RO","RU","RW","WS","SM","ST","SA","SN","RS","SC","SL","SG","SX","SK","SI","SB","SO","ZA","GS","KR","SS","ES","LK","BL","SH","KN","LC","MF","PM","VC","SD","SR","SJ","SE","CH","SY","TW","TJ","TZ","TH","TL","TG","TK","TO","TT","TA","TN","TR","TM","TC","TV","UG","UA","AE","GB","UY","UZ","VA","VE","VN","WF","EH","YE","ZM","ZW"],"not":false,"message":"Country is invalid.","skipOnEmpty":1});}},{"id":"registerform-phone","name":"phone","container":".field-registerform-phone","input":"#registerform-phone","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {value = yii.validation.trim($form, attribute, [], value);yii.validation.required(value, messages, {"message":"Phone number cannot be blank."});yii.validation.string(value, messages, {"message":"Phone number must be a string.","min":6,"tooShort":"Phone number should contain at least 6 characters.","max":128,"tooLong":"Phone number should contain at most 128 characters.","skipOnEmpty":1});value = yii.validation.trim($form, attribute, [], value);var options = {"message":"The format of Phone number is invalid."}, telInput = $(attribute.input);;

                if($.trim(telInput.val())){
                    if(!telInput.intlTelInput("isValidNumber")){
                        messages.push(options.message);
                    }
                }}},{"id":"registerform-email","name":"email","container":".field-registerform-email","input":"#registerform-email","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Email cannot be blank."});value = yii.validation.trim($form, attribute, [], value);yii.validation.email(value, messages, {"pattern":/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,"fullPattern":/^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/,"allowName":false,"message":"Invalid email address specified. Please provide your valid email address in the format login@example.com","enableIDN":false,"skipOnEmpty":1});}},{"id":"registerform-password","name":"password","container":".field-registerform-password","input":"#registerform-password","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Set the new password"});yii.validation.string(value, messages, {"message":"Set your password: must be a string.","min":8,"tooShort":"Password should contain 8 or more characters, including capital and small letters and numbers.","skipOnEmpty":1});yii.validation.regularExpression(value, messages, {"pattern":/^(?=.*[a-z])(?=.*[A-Z]).*$/,"not":false,"message":"Password should contain 8 or more characters, including capital and small letters and numbers.","skipOnEmpty":1});yii.validation.regularExpression(value, messages, {"pattern":/^(?=.*[0-9!@#$%^&*]).*$/,"not":false,"message":"Password should contain 8 or more characters, including capital and small letters and numbers.","skipOnEmpty":1});}},{"id":"registerform-password_repeat","name":"password_repeat","container":".field-registerform-password_repeat","input":"#registerform-password_repeat","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Confirm your new password"});yii.validation.compare(value, messages, {"operator":"==","type":"string","compareAttribute":"registerform-password","compareAttributeName":"RegisterForm[password]","skipOnEmpty":1,"message":"Repeat a password: must be equal to \"Set your password:\"."}, $form);}},{"id":"registerform-ref_uid","name":"ref_uid","container":".field-registerform-ref_uid","input":"#registerform-ref_uid","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {value = yii.validation.trim($form, attribute, [], value);yii.validation.number(value, messages, {"pattern":/^\s*[+-]?\d+\s*$/,"message":"Referral UID number must contain only digits.","skipOnEmpty":1});}},{"id":"registerform-agreement","name":"agreement","container":".field-registerform-agreement","input":"#registerform-agreement","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"You must accept the agreements to continue","requiredValue":1});}}], []);
    });</script>
</body>
<!-- Mirrored from social.tifia.com/en/registration by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 00:46:14 GMT -->
</html>
