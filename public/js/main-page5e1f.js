(function ($) {
    function templateSocialGrid(data) {
        return '<tr class="red" data-login="' + data.login + '" data-profit="' + data.profitability + '" data-period="' + data.lifetime + '" data-commission="' + data.commission + '">\n' +
            '    <td>\n' +
            '        <div class="login-img">\n' + (data.avatar ?
            '            <img class="lazy" data-src="' + data.avatar + '">\n' : '<img class="lazy" data-src="/images/new-site/default-avatar.png">\n') +
            '        </div>\n' +
            '        <div class="login-info">\n' +
            '            <span>@' + data.username + '</span><br>\n' +
            '            ' + data.label + '\n' +
            '        </div>\n' +
            '    </td>\n' +
            '    <td>' + data.lifetime + ' ' + (data.lifetime == 1 ? Lang.day : Lang.days) + '</td>\n' +
            '    <td>' + (+data.profitability).toFixed(2) + ' % / ' + (+data.profitability_abs).toFixed() + ' USD</td>\n' +
            '    <td>' + (+data.equity).toFixed(2) + ' USD</td>\n' +
            '    <td>' +
            '        <a href="' + Tifia.cabinetUrl + 'user/' + data.username + '" class="btn view" target="_blank" rel="nofollow">' + Lang.View + '</a>\n' +
            '    </td>\n' +
            '</tr>';
    }

    function templateSocialCarousel(data) {
        return '<div class="carousel-item" data-login="' + data.login + '" data-profit="' + data.profitability + '" data-period="' + data.lifetime + '" data-commission="' + data.commission + '">\n' +
            '        <div class="container">\n' +
            '            <div class="login-img">\n' + (data.avatar ?
            '                <img class="lazy" data-src="' + data.avatar + '">\n' : '<img class="lazy" data-src="/images/new-site/default-avatar.png">\n') +
            '            </div>\n' +
            '            <div class="login-info">\n' +
            '                <span>@' + data.username + '</span><br>\n' +
            '                ' + data.label + '\n' +
            '            </div>\n' +
            '            <div class="investors-info">\n' +
            '                <div class="row">\n' +
            '                    <div class="col-6">\n' +
            '                        <p>' + Lang.Profitability + '</p>\n' +
            '                        <p><span>' + (+data.profitability).toFixed(2) + ' % / ' + (+data.profitability_abs).toFixed() + ' USD</span></p>\n' +
            '                    </div>\n' +
            '                    <div class="col-3">\n' +
            '                        <p>' + Lang.Equity + '</p>\n' +
            '                        <p><span>' + (+data.equity).toFixed(2) + ' USD</span></p>\n' +
            '                    </div>\n' +
            '                    <div class="col-3">\n' +
            '                        <p>' + Lang.Lifespan + '</p>\n' +
            '                        <p><span>' + data.lifetime + ' ' + (data.lifetime == 1 ? Lang.day : Lang.days) + '</span></p>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '</div>';
    }

    function getSocialGridData() {

        $.ajax({
            url: Tifia.apiUrl + '/v1/top?token=3d47fed749f4ba03e2c87df248dac331',
            dataType: 'json',
            beforeSend: function () {
                App.loader.show($('.social-table'));
            },
            success: function (data) {
                data = data.slice(0, 5);

                var $table = $('.social-table table');
                var $tbody = $table.find('tbody');

                for (var i = 0; i < data.length; i++) {
                    $tbody.append(templateSocialGrid(data[i]));
                }

                $tbody.children().first().addClass('active');

                var $carousel = $('#carousel-social');
                var $carouselInner = $carousel.find('.carousel-inner');

                for (i = 0; i < data.length; i++) {
                    $carouselInner.append(templateSocialCarousel(data[i]));
                }

                $carouselInner.children().first().addClass('active');

                if (lazyLoadInstance) {
                    lazyLoadInstance.update();
                }
            },
            complete: function () {
                App.loader.hide($('.social-table'));
                calc();
            }
        });
    }

    var $calc = $('.calculator-data');
    var countList = [10, 20, 30, 40, 50, 100, 200, 300, 400, 500, 1000, 2000, 3000, 4000, 5000, 10000, 15000, 20000, 30000, 40000, 50000];

    function getPosition(dir, value) {
        var pos = countList.indexOf(value);
        var newPos;

        if (dir === 'minus') {
            newPos = pos - 1;
            if (newPos < 0) {
                newPos = 0;
            }
        } else {
            newPos = pos + 1;
            if (newPos >= countList.length) {
                newPos = countList.length - 1;
            }
        }

        return newPos;
    }

    function changeAmount(dir) {
        var value = getAmount();
        var pos = getPosition(dir, value);
        var $amount = $calc.find('.count');

        $amount.text(countList[pos] + ' USD');
    }

    function calc() {
        var $row;
        if (window.innerWidth >= '992'){
            $row = $('.social-table table tbody tr.active');
        } else {
            $row = $('#carousel-social .carousel-item.active');
        }


        var profit       = $row.data('profit'),
            commission   = $row.data('commission'),
            profitPeriod = getPeriod(),
            amount = getAmount();

        calcProfit(amount, profit, profitPeriod, commission);
    }

    function initCalculator() {
        var $minus = $calc.find('.minus');
        var $plus = $calc.find('.plus');
        var $periods = $calc.find('.period-date li:not(.period-label)');

        $periods.each(function () {
            $(this).on('click', function (e) {
                $periods.removeClass('active');
                $(this).addClass('active');
                calc();
            })
        });

        $minus.click(function () {
            changeAmount('minus');
            calc();
        });

        $plus.click(function () {
            changeAmount('plus');
            calc();
        });

        $(document).on('click', '.social-table table tbody tr', function () {
            $('.social-table table tbody tr').removeClass('active');
            $(this).addClass('active');
            calc();
        });

        $('#carousel-social').on('slid.bs.carousel', function () {
            calc();
        })
    }

    function getPeriod() {
        return +$calc.find('.period-date li.active').text();
    }

    function getAmount() {
        return +$calc.find('.count').text().replace(/\D+/, '');
    }

    function calcProfit(amount, profit, profitPeriod, commission) {
        var profitAmount  = amount * profit / (90 * 100) * (profitPeriod * 30) * (1 - commission/100),
            profitPercent = (amount !== 0) ? profitAmount / amount * 100 : 0
        ;

        var $result = $('.calculator-result');
        $result.find('.profit').html(profitAmount.toFixed(2) + ' USD');
        $result.find('.profit-res').html(profitPercent.toFixed(2) + '%');
    }

    var resizeTimer;
    $(window).resize(function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            calc();
            // Run code here, resizing has "stopped"

        }, 200);
    });

    getSocialGridData();
    initCalculator();
})(jQuery);
