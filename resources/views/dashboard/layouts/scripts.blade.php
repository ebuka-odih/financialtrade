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
    });


</script>

{{--Password Change JS--}}
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
