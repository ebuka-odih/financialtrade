@extends('frontpage.layout.app')
@section('content')

    <div class="menu-overlay"></div>

    <section class="official-represent-block">
        <div class="container-fluid">
            <h2>FTM headquarters</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3221.1580390156646!2d-86.78026188520892!3d36.16270868008489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886466590b69e33f%3A0x834e16cee8bafda1!2sNashville%20Downtown%20Partnership!5e0!3m2!1sen!2sng!4v1605943880686!5m2!1sen!2sng" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div id="indo" class="block-country usa">
                            <h3 style="color: white">USA</h3>
                            <p style="color: white">
                                Location: 200 3rd Ave North, Second Floor, Suite 101, Nashville, TN 37201, United States<br>
                                Email: <a href="mailto:support@financialtrademarkets.com">support@financialtrademarkets.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="official-represent-block">
        <div class="container-fluid">
            <h2>Official representatives</h2>
            <div class="container">
                <div class="tifia-contacts">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h3>Customer Support</h3>
                            <p>Email: <a href="mailto:support@financialtrademarkets.com">support@financialtrademarkets.com</a></p>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h3>Financial Department</h3>
                            <p>Email: <a href="mailto:support@financialtrademarkets.com">finance@financialtrademarkets.com</a><br>
                                <span>9 a.m. - 6 p.m.<br>(Monday to Friday) GMT+3</span></p>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h3>Human Resources Department</h3>
                            <p>Email: <a href="mailto:support@financialtrademarkets.com">hr@financialtrademarkets.com</a></p>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h3>Partnership Department</h3>
                            <p><br>
                                Email: <a href="mailto:support@financialtrademarkets.com">partner@financialtrademarkets.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section contacts-info-page">
        <div class="container-fluid">
            <h1>FTM is conquering the world</h1>
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
