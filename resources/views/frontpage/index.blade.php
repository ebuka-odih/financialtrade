@extends('frontpage.layout.app')

    <!---->
   @section('content')
    <section class="section about-tifia">
        <div class="container-fluid">
            <h1>How about earning more by Forex trading?</h1>
            <p>Welcome to TIFIA! Smart Forex trading on perfect conditions</p>
            <div id="carousel-main" class="carousel slide conditions-block">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p>100$</p>
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
            <div class="group-success">
                <div class="group">
                    <p>Tifia trading account</p>
                    <a class="btn-show-right" href="https://social.tifia.com/en/new-trading-account" rel="nofollow">
                        <div class="circle"><span class="icon arrow"></span></div>
                        <p class="button-text">Open</p>
                    </a>
                </div>
            </div>
            <div class="btn-block">
                <a class="btn btn-green" href="https://social.tifia.com/en/new-trading-account" rel="nofollow">Open trading account</a>
            </div>
            <a class="scroll-icon"></a>
        </div>
    </section>
    <section class="section advantages-tifia">
        <div class="container-fluid">
            <h2>Online trading in forex market on best conditions</h2>
            <p>Tifia online Forex broker provides trading services on financial markets: Forex, commodity markets, and stock indices.</p>
            <h3 class="only-mob">Why Tifia?</h3>
            <div class="advantages-block">
                <ul>
                    <li>
                        <div class="trans-block">
                            <div class="ic1 ic"></div>
                        </div>
                        <p>Segregated accounts</p>
                    </li>
                    <li>
                        <div class="trans-block">
                            <div class="ic2 ic"></div>
                        </div>
                        <p>Negative Balance Protection</p>
                    </li>
                    <li>
                        <div class="trans-block">
                            <div class="ic3 ic"></div>
                        </div>
                        <p>Rapid execution with no re-quotes</p>
                    </li>
                    <li>
                        <div class="trans-block">
                            <div class="ic4 ic"></div>
                        </div>
                        <p>Full range of analytical materials</p>
                    </li>
                </ul>
                <ul>
                    <li>
                        <div class="trans-block">
                            <div class="ic5 ic"></div>
                        </div>
                        <p>All strategies welcomed</p>
                    </li>
                    <li>
                        <div class="trans-block">
                            <div class="ic6 ic"></div>
                        </div>
                        <p>Fast withdrawal</p>
                    </li>
                    <li>
                        <div class="trans-block">
                            <div class="ic7 ic"></div>
                        </div>
                        <p>Best trading platforms MT4/MT5</p>
                    </li>
                    <li>
                        <div class="trans-block">
                            <div class="ic8 ic"></div>
                        </div>
                        <p>Friendly customer support 24/5</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section social-trading" id="five">
        <div class="container-fluid">
            <div class="social-info">
                <img class="lazy" alt="Social Trading" data-src="images/new-site/social-logo.svg">
                <h4>Social Trading</h4>
                <h2>Forex Social Trading - Forex copy trading system</h2>
                <h3 class="only-mob">Synchronize your trades with successful providers' ones!</h3>
                <p>Copy profitable trades of Forex pros and level up your income!</p>
            </div>
            <div class="social-block">
                <div class="calculator-data">
                    <p>I want to invest</p>
                    <div class="calc-date">
                        <i class="minus">
                            <b></b>
                        </i>
                        <span class="count">500 USD</span>
                        <i class="plus">
                            <b></b>
                        </i>
                    </div>
                    <p>Period</p>
                    <ul class="period-date">
                        <li>1</li>
                        <li class="active">3</li>
                        <li>6</li>
                        <li>12</li>
                        <li>month</li>
                    </ul>
                </div>
                <div class="social-table loader-wrapper">
                    <h3>Top 5 Traders</h3>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th width="30%">Monitoring of traders</th>
                            <th width="18%">Lifespan</th>
                            <th>Profitability</th>
                            <th>Equity</th>
                            <th width="20%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div id="carousel-social" class="carousel slide only-mob carousel-social" data-ride="carousel">
                        <div class="carousel-inner">
                        </div>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#carousel-social" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-social" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="calculator-result">
                    <div class="line">
                        <h4>Your profit</h4>
                        <span class="profit"></span>
                    </div>
                    <div class="line">
                        <h4>Profitability</h4>
                        <span class="profit-res"></span>
                    </div>
                </div>
            </div>
            <div class="social-btn">
                <a  class="btn btn-red" href="https://social.tifia.com/en/login" rel="nofollow">Join TIFIA Social Trading</a>
            </div>
        </div>
    </section>
    <section class="section trading-account">
        <div class="container-fluid">
            <h2>Choose your way to trade with TIFIA</h2>
            <p>Open a trading account with ECN broker and earn with the lowest spreads and highest execution speed!</p>
            <h3 class="only-mob">Open a trading account</h3>
            <ul class="nav variant-menu trading-account-menu" role="tablist">
                <li><a href="#start" aria-controls="start" role="tab" data-toggle="tab">Start (Micro)</a></li>
                <li><a href="#classic" aria-controls="classic" role="tab" data-toggle="tab" class="active">ECN Classic</a></li>
                <li><a href="#pro" aria-controls="pro" role="tab" data-toggle="tab">ECN Pro</a></li>
            </ul>
            <div class="trading-account-choose tab-content">
                <div class="start-micro tab-pane fadeIn animated" id="start">
                    <div class="account-type">
                        <h3>Start<br><span>Micro</span></h3>
                        <p>Choose your way<br>to trade with Tifia</p>
                    </div>
                    <ul class="account-info">
                        <li>
                            <p>Minimum deposit</p>
                            <span>$10</span>
                        </li>
                        <li>
                            <p>Spread from</p>
                            <span>2.2</span>
                        </li>
                    </ul>
                    <ul class="account-info-more">
                        <li>
                            <p>Leverage</p>
                            <span>1:1000</span>
                        </li>
                        <li>
                            <p>Account base currency</p>
                            <span>USD, EUR, NGN</span>
                        </li>
                    </ul>
                    <div class="account-info-line">
                        <p>Trading instruments</p>
                        <span>28 <i>Forex</i>, 2 <i>Metals</i></span>
                    </div>
                    <div class="account-info-line">
                        <p>Commission (per round turn lot)</p>
                        <span>-</span>
                    </div>
                    <div class="btn-acc">
                        <a class="btn btn-grey" href="trading-accounts.html">View details</a>                    <a class="btn btn-grey " href="https://social.tifia.com/en/new-trading-account?type=start" rel="nofollow">Open trading account</a>
                    </div>
                </div>
                <div class="tab-pane fadeIn animated active" id="classic">
                    <div class="account-type">
                        <h3 class="feather"><span>ECN Classic</span></h3>
                        <p>Lowest spreads drive<br>you to success</p>
                    </div>
                    <ul class="account-info">
                        <li>
                            <p>Minimum deposit</p>
                            <span>$100</span>
                        </li>
                        <li>
                            <p>Spread from</p>
                            <span>1.1</span>
                        </li>
                    </ul>
                    <ul class="account-info-more">
                        <li>
                            <p>Leverage</p>
                            <span>1:1000</span>
                        </li>
                        <li>
                            <p>Account base currency</p>
                            <span>USD, EUR, NGN, PLN, GBP</span>
                        </li>
                    </ul>
                    <div class="account-info-line">
                        <p>Trading instruments</p>
                        <span>36 <i>Forex</i>, 2 <i>Metals</i>, 2 <i>Commodities</i>, 11 <i>Indices</i></span>
                    </div>
                    <div class="account-info-line">
                        <p>Commission (per round turn lot)</p>
                        <span>-</span>
                    </div>
                    <div class="btn-acc">
                        <a class="btn btn-grey" href="trading-accounts.html">View details</a>                    <a class="btn btn-grey" href="https://social.tifia.com/en/new-trading-account?type=ecn-classic" rel="nofollow">Open trading account</a>
                    </div>
                </div>
                <div class="best tab-pane fadeIn animated" id="pro">
                    <div class="account-type">
                        <h3 class="feather"><span>ECN PRO</span>
                            <i><img src="images/new-site/star.svg"><img src="images/new-site/star.svg"><img src="images/new-site/star.svg"><img src="images/new-site/star.svg"><img src="images/new-site/star.svg"></i>
                        </h3>
                        <p>Unique terms for<br>unique clients</p>
                    </div>
                    <ul class="account-info">
                        <li>
                            <p>Minimum deposit</p>
                            <span>$500</span>
                        </li>
                        <li>
                            <p>Spread from</p>
                            <span>0.0</span>
                        </li>
                    </ul>
                    <ul class="account-info-more">
                        <li>
                            <p>Leverage</p>
                            <span>1:500</span>
                        </li>
                        <li>
                            <p>Account base currency</p>
                            <span>USD, EUR, NGN, PLN, GBP</span>
                        </li>
                    </ul>
                    <div class="account-info-line">
                        <p>Trading instruments</p>
                        <span>52 <i>Forex</i>, 6 <i>Metals</i>, 2 <i>Commodities</i>, 11 <i>Indices</i></span>
                    </div>
                    <div class="account-info-line">
                        <p>Commission (per round turn lot)</p>
                        <span>$8</span>
                    </div>
                    <div class="btn-acc">
                        <a class="btn btn-grey" href="trading-accounts.html">View details</a>                    <a class="btn btn-grey" href="https://social.tifia.com/en/new-trading-account?type=ecn-pro" rel="nofollow">Open trading account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="promotions-block-main">
                <div class="container-fluid">
                    <div class="container-block">
                        <h2>Forex contests and deposit bonuses from Tifia</h2>
                        <p>Tifia provides Forex bonuses on deposits and contests for traders and partners. We would like to make your work on Forex incredibly interesting.</p>
                        <div class="btn-block">
                            <a class="btn btn-red" href="promotions.html">Learn more</a>
                        </div>
                        <img class="promo-img lazy" data-src="images/new-site/promo-img.png">
                        <img class="promo-img-mob lazy" data-src="images/new-site/promo-img-mob.png">
                    </div>
                </div>
            </section>
   @endsection


