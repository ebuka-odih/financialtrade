@extends('frontpage.layout.app')
@section('content')

    <div class="menu-overlay"></div>

    <section class="section contacts-info-page">
        <div class="container-fluid">
            <h1>Tifia is conquering the world</h1>
        </div>
        <div class="map-img">
            <div class="point-block point-2">
                <div class="point blink2"></div>
                <a href="#spain"></a>
            </div>
            <div class="point-block point-3">
                <div class="point blink3"></div>
                <a href="#nigeria"></a>
            </div>
            <div class="point-block point-4">
                <div class="point blink4"></div>
                <a href="#thai"></a>
            </div>
            <div class="point-block point-5">
                <div class="point blink5"></div>
                <a href="#indo"></a>
            </div>
            <img src="https://tifia.com/images/new-site/contacts/map.png">
        </div>
    </section>
    <section class="official-represent-block">
        <div class="container-fluid">
            <h2>FTM headquarters</h2>
            <div class="container">
                <div class="tifia-contacts">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h3>Customer Support</h3>
                            <p>Email: <a href="mailto:support@tifia.com">support@tifia.com</a></p>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h3>Financial Department</h3>
                            <p>Email: <a href="mailto:finance@tifia.com">finance@tifia.com</a><br>
                                <span>9 a.m. - 6 p.m.<br>(Monday to Friday) GMT+3</span></p>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h3>Human Resources Department</h3>
                            <p>Email: <a href="mailto:hr@tifia.com">hr@tifia.com</a></p>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h3>Partnership Department</h3>
                            <p>Skype: partner.tifia<br>
                                Email: <a href="mailto:partners@tifia.com">partners@tifia.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <h2 id="representatives">Official representatives</h2>
                <div class="tifia-represent">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div id="thai" class="block-country thai">
                                <h3>Thailand</h3>
                                <p>
                                    <!--Skype: tifia.thailand<br>-->
                                    Phone: 0961590924<br>
                                    Email: <a href="mailto:thailand@tifia.com">thailand@tifia.com</a>
                                </p>
                                <a class="fb" href="https://www.facebook.com/tifiathailand" target="_blank"></a>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div id="spain" class="block-country spain">
                                <h3>Hispanic Countries Support</h3>
                                <p>
                                    WhatsApp: +57 319 5314742<br>
                                    Skype: gontranfx<br>
                                    Email: <a href="mailto:rene.b@tifia.com">rene.b@tifia.com</a>,<br>
                                    <a href="mailto:soporte@tifia.com">soporte@tifia.com</a>
                                </p>
                                <a class="fb" href="https://www.facebook.com/TifiaSpanish" target="_blank"></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<script>jQuery(function ($) {
        $(document).ready(function () {
            $(".map-img .point-block a").click(function () {
                var elementClick = $(this).attr("href");
                var classActiveCountry = elementClick.split("#")[1];
                var wid_screen = $(window).width();
                $('.tifia-represent').find('.block-country').removeClass('active');
                $('.tifia-represent').find('.' + classActiveCountry).addClass('active');


                if (wid_screen > 992) {
                    var destination = $('#representatives').offset().top;
                } else {
                    var destination = $(elementClick).offset().top;
                }
                $('html, body').animate({ scrollTop: destination }, 600);
                return false;
            });
        });
    });</script>

@endsection
