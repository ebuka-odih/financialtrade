@extends('frontpage.layout.app')
@section('content')

    <script>
        (function ($) {
            $(document).ready(function () {
                $('.tifia-plus .grey-block h3').click(function(){
                    var open_block = $(this).parent();
                    open_block.find('p').slideToggle(function(){
                        if($(this).is(':visible'))
                        {
                            open_block.find('i.plus').addClass('opened');
                        }
                        else
                        {
                            open_block.find('i.plus').removeClass('opened');
                        }
                    });
                });

                /*var controller = new ScrollMagic.Controller();

                var scene = new ScrollMagic.Scene({triggerElement: "#tifia-more-info", duration: 500})
                // animate color and top border in relation to scroll position
                    .setTween(".bg-fix-why-tifia", {backgroundColor: "#333333"}) // the tween durtion can be omitted and defaults to 1
                    .addTo(controller);*/
            });
        })(jQuery);
    </script>
    <div class="bg-fix-why-tifia">
        <div class="bg-fix-tifia">
            <section class="section why-tifia">
                <div class="container-fluid">
                    <h1>FTM trading advantages</h1>
                </div>
                <div class="advantages-block-tifia">
                    <div class="container-fluid">
                        <h2>Perfect conditions for profitable trading</h2>
                        <div id="carousel-main" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p>300$</p>
                                    <p>Min. depo</p>
                                </div>
                                <div class="carousel-item">
                                    <p>0.0</p>
                                    <p>Spreads from</p>
                                </div>
                                <div class="carousel-item">
                                    <p>0.1s</p>
                                    <p>Execution from</p>
                                </div>
                                <div class="carousel-item">
                                    <p>120+</p>
                                    <p>Trading instruments</p>
                                </div>
                                <div class="carousel-item">
                                    <p>1:1000</p>
                                    <p>Max Leverage</p>
                                </div>
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#carousel-main" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-main" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="info-tifia" id="tifia-more-info">
                    <div class="container-fluid">
                        <p>FTM is an ECN/STP broker that provides its clients with fully transparent Forex trading conditions.<br>When working with FTM, you can be sure there are no conflicts of interest and you get high-quality trading services and access to Tier-1 bank liquidity with best prices and rapid execution. FTM Forex broker is a unique phenomenon on the foreign exchange market.<br>Its numerous advantages allow the company to stand out from the crowd of competitors.</p>
                    </div>
                </div>
            </section>
            <section class="tifia-more-info">
                <div class="container-fluid">
                    <h2>Top Forex broker for great success!</h2>
                    <div class="container-block">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Segregated accounts</h3>
                                    <p>FTM provides its clients with an exceptional service of segregated accounts. This type of account is tailored to ensure the safety of traders' funds under any force majeure circumstances by segregating a percentage of their investments.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Scalping, automated trading, news trading and arbitrage allowed</h3>
                                    <p>The company allows using such trading strategies as scalping, automated EA trading, news trading, and arbitrage. Our clients enjoy complete freedom and convenience when trading, regardless of their strategies.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Rapid execution with no re-quotes</h3>
                                    <p>Our clients know for sure that their work in the Forex market will be smooth and uninterrupted since there are no re-quotes when executing orders at FTM. The opportunity to close or open a trade immediately enables our clients to react to market fluctuations as fast as possible, which is an essential condition for success in the Forex market.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Leverage from 1:1 up to 1:1000</h3>
                                    <p>FTM's clients may choose the most suitable leverage value . Depending on a trading strategy, leverage varies from 1:1 to 1:1000.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Fair ECN Model</h3>
                                    <p>The trading conditions the company provides exclude any conflicts of interest and dealer intervention just because FTM is tailored to provide its clients with the best trading service.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Hedging (partial or fully locked positions) is allowed</h3>
                                    <p>Our clients may hedge positions partially or in full. Hedging allows them to reduce the risk of losing money in unprofitable trades, and thus insures their deposits.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Best trading platforms MetaTrader 4 and MetaTrader 5</h3>
                                    <p>FTM provides its clients with both versions of the most popular trading platform MetaTrader. The MT4/MT5 platforms can be installed both on a desktop computer and Android/iOS mobile devices. MetaQuotes’ trading platforms are the easiest-to-use and professional platforms for trading in Forex and financial markets and FTM’s clients can use them free of charge. In addition to cutting-edge trading features, the platform delivers extended options for technical analysis of price charts.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>24/5 Professional team working in the best interests of the Client</h3>
                                    <p>Our client support team strives to provide an individual approach to every client. You may receive prompt and competent advice at any time, as our professional team acts in the best interests of the clients.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Tier-1 Bank Liquidity</h3>
                                    <p>FTM offers its clients transparent access to Tier-1 bank liquidity online at competitive rates and with low margin requirements.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Highly Competitive Forex Spreads, spreads start at 0.1 pips</h3>
                                    <p>The Company provides the tightest spreads for major Forex instruments. We strive to keep competitive rates under any market trading conditions and deliver high quality services, no matter the level of volatility.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>No-Dealing Desk: trading with no dealer intervention</h3>
                                    <p>At FTM, orders are executed with no dealer intervention, which excludes any conflicts of interests.</p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <h3>Full range of analytical materials and tools</h3>
                                    <p>The most popular tools and materials for fundamental and technical analyses are provided to our clients at no cost. The latest Forex reviews delivered by Forex market pros ensure the most efficient trades. All the materials are delivered by independent analytical agencies.</p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom-info">
                            <p>The future of the Forex market belongs to FTM as we keep up with the times and offer the latest technologies for transparent trading, to satisfy the needs of modern traders that become more and more sophisticated and demanding.</p>
                            <p>The clients are our best motivation for further development. Everything we do, we do it in your interests!</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="tifia-more-info">
                <div class="container-fluid">
                    <h2>Article Of Incorpration</h2>
                    <div class="container-block">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <img src="{{ asset('images/art_inorp.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-xl-6">
                                <div class="grey-block">
                                    <img src="{{ asset('images/art_incorp.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="bottom-info">
                            <p>The future of the Forex market belongs to FTM as we keep up with the times and offer the latest technologies for transparent trading, to satisfy the needs of modern traders that become more and more sophisticated and demanding.</p>
                            <p>The clients are our best motivation for further development. Everything we do, we do it in your interests!</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section trade-with-tifia">
                <div class="container-fluid">
                    <div class="trade-with-tifia-block">
                        <div class="trade-with-tifia-info">
                            <h2>Trade with FTM</h2>
                            <p>It is time to earn!</p>
                            <img class="mob-only" src="{{ asset('images/new-site/chess-tifia.jpg') }}">
                            <div class="btn-block">
                                <a class="btn btn-red btn-scroll" href="{{ route('register') }}" rel="nofollow" target="blank">Open live account</a>
                            </div>
                        </div>
                        <div class="trade-with-tifia-img">
                            <img src="{{ asset('images/new-site/chess-tifia.jpg') }}">
                        </div>
                    </div>
                </div>
            </section>


   @endsection
