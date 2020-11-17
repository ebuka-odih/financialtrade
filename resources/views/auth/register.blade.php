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
                <form id="form-registration" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group field-registerform-full_name required">
                        <div><label class="control-label" for="registerform-full_name">Full name</label></div>
                        <div>
                            <input  placeholder="Enter Full " type="text" id="registerform-full_name" class="form-control input-lg" name="name" value="" aria-required="true">
                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="form-group field-registerform-country required">
                        <div><label class="control-label" for="registerform-country">Country</label></div>
                        <div>
                            <select id="country" class="form-control input-lg" name="country">
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote DIvoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curaco">Curacao</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea Sout">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Phillipines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Erimates">United Arab Emirates</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uraguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>

                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="form-group field-registerform-phone required">
                        <div><label class="control-label" for="registerform-phone">Phone number</label></div>
                        <div>
                            <input type="tel"  class="form-control input-lg  @error('phone') is-invalid @enderror" name="phone" placeholder="+1(200) (0453)" autocomplete="off" aria-required="true">
                            <p class="help-block help-block-error"></p>
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group field-registerform-email required">
                        <div><label class="control-label" for="registerform-email">Email</label></div>
                        <div>
                            <input type="text" id="registerform-email" placeholder="Email Address" class="form-control input-lg @error('email') is-invalid @enderror" name="email" aria-required="true" value="{{ old('email') }}" required autocomplete="email">
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
                                <input type="password" id="registerform-password" class="form-control input-lg @error('email') is-invalid @enderror" name="password" autocomplete="new-password" aria-required="true"><span class='eye-password'></span>
                                <p class="help-block help-block-error"></p>
                            </div>
                            @error('email')
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
                    <div class="form-group field-registerform-ref_uid">
                        <div><label class="control-label" for="registerform-ref_uid">Referral UID <i class="fa fa-question-circle" title="Enter the UID of your partner here (optional)"></i></label></div>
                        <div>
                            <input type="text" id="registerform-ref_uid" class="form-control input-lg" name="RegisterForm[ref_uid]" value="">
                            <p class="help-block help-block-error"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group field-registerform-agreement required">
                                <div class="checkbox-custom checkbox-default">
                                    <input type="hidden" name="RegisterForm[agreement]" value="0"><input type="checkbox" id="registerform-agreement" name="RegisterForm[agreement]" value="1">
                                    <label for="registerform-agreement">
                                        I have read and agree to the following agreements:
                                        <div id="agreement-mi" style="">
                                            <a class="text-more-link" href="javascript:;" style="display: none">(Show)</a>
                                            <div> &ndash; <a href="{{ route('policy') }}" target="_blank">Client agreement</a><br/>  &ndash; <a href="{{ route('risk') }}" target="_blank">Risk disclosure</a><br/></div>
                                        </div>
                                        <div id="agreement-eu" style="display:none">
                                            <a class="text-more-link" href="javascript:;" style="display: none">(Show)</a>
                                            <div> &ndash; <a href="{{ route('risk') }}" target="_blank">Risk disclosure</a></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="help-block help-block-error"></p>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary pull-right" >Sign up</button>
                        </div>
                    </div>
                </form>
                <p class="text-center">Already registered? <a href="{{ route('login') }}">Login</a></p>
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
        jQuery('#form-registration').yiiActiveForm([{"id":"registerform-full_name","name":"full_name","container":".field-registerform-full_name","input":"#registerform-full_name","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Full name cannot be blank."});value = yii.validation.trim($form, attribute, [], value);yii.validation.regularExpression(value, messages, {"pattern":/^\#?([a-zA-Z\@'\*\\/\.]+ +[a-zA-Z\@'\*\\/\.\s]+)+$/i,"not":false,"message":"Your full name should include first and last names. Only Latin characters and spaces allowed","skipOnEmpty":1});}},{"id":"registerform-country","name":"country","container":".field-registerform-country","input":"#registerform-country","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Country cannot be blank."});yii.validation.range(value, messages, {"range":["AF","AX","AL","DZ","AS","AD","AO","AI","AQ","AG","AR","AM","AW","AC","AU","AT","AZ","BS","BH","BD","BB","BY","BZ","BJ","BM","BT","BO","BA","BW","BR","IO","VG","BN","BG","BF","BI","KH","CM","IC","CV","BQ","KY","CF","EA","TD","CL", "CA","CN","CX","CC","CO","KM","CG","CD","CK","CR","CI","HR","CU","CW","CY","CZ","DK","DG","DJ","DM","DO","EC","EG","SV","GQ","ER","EE","SZ","ET","FK","FO","FJ","FI","FR","GF","PF","TF","GA","GM","GE","DE","GH","GI","GR","GL","GD","GP","GU","GT","GG","GN","GW","GY","HT","HN","HK","HU","IS","IN","ID","IR","IQ","IE","IM","IT","JM","JE","JO","KZ","KE","KI","XK","KW","KG","LA","LV","LB","LS","LR","LY","LI","LT","LU","MO","MG","MW","MY","MV","ML","MT","MH","MQ","MR","MU","YT","MX","FM","MD","MC","MN","ME","MS","MA","MZ","MM","NA","NR","NP","NL","NC","NZ","NI","NE","NG","NU","NF","KP","MK","MP","NO","OM","PK","PW","PS","PA","PG","PY","PE","PH","PN","PL","PT","XA","XB","PR","QA","RE","RO","RU","RW","WS","SM","ST","SA","SN","RS","SC","SL","SG","SX","SK","SI","SB","SO","ZA","GS","KR","SS","ES","LK","BL","SH","KN","LC","MF","PM","VC","SD","SR","SJ","SE","CH","SY","TW","TJ","TZ","TH","TL","TG","TK","TO","TT","TA","TN","TR","TM","TC","TV","UG","UA","AE","GB", "US","UY","UZ","VA","VE","VN","WF","EH","YE","ZM","ZW"],"not":false,"message":"Country is invalid.","skipOnEmpty":1});}},{"id":"registerform-phone","name":"phone","container":".field-registerform-phone","input":"#registerform-phone","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {value = yii.validation.trim($form, attribute, [], value);yii.validation.required(value, messages, {"message":"Phone number cannot be blank."});yii.validation.string(value, messages, {"message":"Phone number must be a string.","min":6,"tooShort":"Phone number should contain at least 6 characters.","max":128,"tooLong":"Phone number should contain at most 128 characters.","skipOnEmpty":1});value = yii.validation.trim($form, attribute, [], value);var options = {"message":"The format of Phone number is invalid."}, telInput = $(attribute.input);;

                if($.trim(telInput.val())){
                    if(!telInput.intlTelInput("isValidNumber")){
                        messages.push(options.message);
                    }
                }}},{"id":"registerform-email","name":"email","container":".field-registerform-email","input":"#registerform-email","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Email cannot be blank."});value = yii.validation.trim($form, attribute, [], value);yii.validation.email(value, messages, {"pattern":/^[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?$/,"fullPattern":/^[^@]*<[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?>$/,"allowName":false,"message":"Invalid email address specified. Please provide your valid email address in the format login@example.com","enableIDN":false,"skipOnEmpty":1});}},{"id":"registerform-password","name":"password","container":".field-registerform-password","input":"#registerform-password","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Set the new password"});yii.validation.string(value, messages, {"message":"Set your password: must be a string.","min":8,"tooShort":"Password should contain 8 or more characters, including capital and small letters and numbers.","skipOnEmpty":1});yii.validation.regularExpression(value, messages, {"pattern":/^(?=.*[a-z])(?=.*[A-Z]).*$/,"not":false,"message":"Password should contain 8 or more characters, including capital and small letters and numbers.","skipOnEmpty":1});yii.validation.regularExpression(value, messages, {"pattern":/^(?=.*[0-9!@#$%^&*]).*$/,"not":false,"message":"Password should contain 8 or more characters, including capital and small letters and numbers.","skipOnEmpty":1});}},{"id":"registerform-password_repeat","name":"password_repeat","container":".field-registerform-password_repeat","input":"#registerform-password_repeat","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"Confirm your new password"});yii.validation.compare(value, messages, {"operator":"==","type":"string","compareAttribute":"registerform-password","compareAttributeName":"RegisterForm[password]","skipOnEmpty":1,"message":"Repeat a password: must be equal to \"Set your password:\"."}, $form);}},{"id":"registerform-ref_uid","name":"ref_uid","container":".field-registerform-ref_uid","input":"#registerform-ref_uid","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {value = yii.validation.trim($form, attribute, [], value);yii.validation.number(value, messages, {"pattern":/^\s*[+-]?\d+\s*$/,"message":"Referral UID number must contain only digits.","skipOnEmpty":1});}},{"id":"registerform-agreement","name":"agreement","container":".field-registerform-agreement","input":"#registerform-agreement","error":".help-block.help-block-error","encodeError":false,"validate":function (attribute, value, messages, deferred, $form) {yii.validation.required(value, messages, {"message":"You must accept the agreements to continue","requiredValue":1});}}], []);
    });</script>
</body>
<!-- Mirrored from social.tifia.com/en/registration by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 00:46:14 GMT -->
</html>
