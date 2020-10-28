@extends('dashboard.layouts.app')
@section('content')
    <div class="inner-wrapper">
        @include('dashboard.layouts.sidebar')
        <section class="content-body" role="main">
            <div id="settings-edit" class="contents clearfix">
                <div class="content-center ">
                    <h1 class="no-print">Client's Profile</h1>
                    <div class="row">
                        <div class="col-md-12 col-xl-12">
                            <header class="panel-heading">
                                <h2 class="panel-title">For full profile verification please complete following step:</h2>
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
                        <li class="active"><a href="{{ route('user.personal_info') }}">Personal information</a></li>
                        <li><a href="{{ route('user.kyc_verification') }}">Verification</a></li>
                        <li><a href="/en/settings/security">Security</a></li>
                        <li><a href="/en/login-history/index">Login history</a></li>
                    </ul>
                    <div class="panel">
                        <div class="panel-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form id="form-settings-main" class="form-horizontal" action="{{ route('user.personal_info.store') }}" method="POST">
                                @csrf

                                <div class="form-group field-profilemainform-title">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-title">Title</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <select id="profilemainform-title" class="form-control" name="title">
                                            <option value="mr" selected>Mr.</option>
                                            <option value="ms">Ms.</option>
                                            <option value="mrs">Mrs.</option>
                                        </select>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-birth_date">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-birth_date">Birth date</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="profilemainform-birth_date" class="form-control" name="date_of_birth" value="{{ $user->date_of_birth }}" data-datepicker="">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-country">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-country">Country</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <select id="profilemainform-country" class="form-control" name="country">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua &amp; Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AC">Ascension Island</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia &amp; Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="IC">Canary Islands</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="BQ">Caribbean Netherlands</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="EA">Ceuta &amp; Melilla</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo - Brazzaville</option>
                                            <option value="CD">Congo - Kinshasa</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d’Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czechia</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DG">Diego Garcia</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="SZ">Eswatini</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong SAR China</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="XK">Kosovo</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao SAR China</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar (Burma)</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG" selected>Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="KP">North Korea</option>
                                            <option value="MK">North Macedonia</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territories</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn Islands</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="XA">Pseudo-Accents</option>
                                            <option value="XB">Pseudo-Bidi</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">São Tomé &amp; Príncipe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia &amp; South Sandwich Islands</option>
                                            <option value="KR">South Korea</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="BL">St. Barthélemy</option>
                                            <option value="SH">St. Helena</option>
                                            <option value="KN">St. Kitts &amp; Nevis</option>
                                            <option value="LC">St. Lucia</option>
                                            <option value="MF">St. Martin</option>
                                            <option value="PM">St. Pierre &amp; Miquelon</option>
                                            <option value="VC">St. Vincent &amp; Grenadines</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard &amp; Jan Mayen</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad &amp; Tobago</option>
                                            <option value="TA">Tristan da Cunha</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks &amp; Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VA">Vatican City</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis &amp; Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-postcode">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-postcode">Postcode</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="profilemainform-postcode" class="form-control" name="postal_code" value="{{ $user->postal_code }}">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-region required">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-region">Region</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="profilemainform-postcode" class="form-control" name="state" value="{{ $user->state }}">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-city">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-city">City</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="profilemainform-city" class="form-control" name="city" value="{{ $user->city }}">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-address">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-address">Address</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="text" id="profilemainform-address" class="form-control" name="address" value="{{ $user->address }}">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <!--        -->
                                <div class="form-group field-profilemainform-phone required">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-phone">Phone</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <input type="tel" id="profilemainform-phone" class="form-control" name="phone" value="{{ $user->phone  }}" autocomplete="off" aria-required="true">
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group field-profilemainform-about">
                                    <div><label class="control-label col-xs-4 col-md-3" for="profilemainform-about">About me</label></div>
                                    <div class="col-xs-8 col-md-6">
                                        <textarea id="profilemainform-about" class="form-control" name="bio" rows="5">{{ $user->bio }}</textarea>
                                        <p class="help-block help-block-error "></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-9 text-right mb-10">
                                        <button type="submit" class="btn btn-wide btn-success demo-notice">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                        <td class="text-right" title="Buy: 8136; Sell: 9524">17660</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=GBPUSDx">
                                          <span class="symbol size-32" title="GBPUSD">
                                          <img src="/images/flags/flat/32/GB.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=GBPUSDx"> <span>GBPUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 5085; Sell: 5282">10367</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=EURUSDx">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="/images/flags/flat/32/EU.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=EURUSDx"> <span>EURUSDx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 4760; Sell: 5171">9931</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=EURUSD">
                                          <span class="symbol size-32" title="EURUSD">
                                          <img src="/images/flags/flat/32/EU.png"><img src="/images/flags/flat/32/US.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=EURUSD"> <span>EURUSD</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 2327; Sell: 2382">4709</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="/en/feed/instrument?instrument=EURJPYx">
                                          <span class="symbol size-32" title="EURJPY">
                                          <img src="/images/flags/flat/32/EU.png"><img src="/images/flags/flat/32/JP.png">
                                          </span></a>                        <a href="/en/feed/instrument?instrument=EURJPYx"> <span>EURJPYx</span></a>
                                        </td>
                                        <td class="text-right" title="Buy: 1773; Sell: 2169">3942</td>
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
