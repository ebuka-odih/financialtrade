(function ($) {
    function templateSocialGrid(data) {
        return '<tr class="monitoring-row">\n' +
            '    <td>\n' +
            '        <div class="login-img">\n' + (data.avatar ?
            '            <img src="' + data.avatar + '">\n' : '<img src="/images/new-site/default-avatar.png">\n') +
            '        </div>\n' +
            '        <div class="login-info">\n' +
            '            <span>@' + data.username + '</span><br>\n' +
            '            ' + data.label + '\n' +
            '        </div>\n' +
            '    </td>\n' +
            '    <td>' + data.lifetime + ' ' + (data.lifetime == 1 ? Lang.day : Lang.days) + '</td>\n' +
            '    <td>' + data.commission + '%</td>\n' +
            '    <td> <span class="label-profit"> ' + (+data.profitability).toFixed(2) + ' % / ' + (+data.profitability_abs).toFixed() + ' USD </span> </td>\n' +
            '    <td>' + (+data.equity).toFixed(2) + ' USD</td>\n' +
            '    <td>' + data.attached + '</td>\n' +
            '    <td>' + data.equity_attached + ' USD</td>\n' +
            '</tr>';
    }

    function templateSocialCarousel(data) {
        return  '<div class="block-traders-top">\n' +
            '     <span class="arrow-show"></span>\n' +
            '     <div class="container">\n' +
            '         <div class="login-img">\n' + (data.avatar ?
            '            <img src="' + data.avatar + '">\n' : '<img src="/images/new-site/default-avatar.png">\n') +
            '         </div>\n' +
            '         <div class="login-info">\n' +
            '             <span>@' + data.username + '</span><br>\n' +
            '             ' + data.label + '\n' +
            '         </div>\n' +
            '         <div class="investors-info">\n' +
            '             <div class="row">\n' +
            '                 <div class="col-6">\n' +
            '                     <p>' + Lang.Profitability + '</p>\n' +
            '                     <p><span>' + (+data.profitability).toFixed(2) + ' % / ' + (+data.profitability_abs).toFixed() + ' USD</span></p>\n' +
            '                 </div>\n' +
            '                 <div class="col-6">\n' +
            '                     <p>' + Lang.Equity + '</p>\n' +
            '                     <p><span>' + (+data.equity).toFixed(2) + ' USD</span></p>\n' +
            '                 </div>\n' +
            '             </div>\n' +
            '         </div>\n' +
            '         <div class="investors-info investors-info-hide">\n' +
            '             <div class="row">\n' +
            '                 <div class="col-6">\n' +
            '                     <p>' + Lang.Lifespan + '</p>\n' +
            '                     <p><span>' + data.lifetime + ' ' + (data.lifetime == 1 ? Lang.day : Lang.days) + '</span></p>\n' +
            '                 </div>\n' +
            '                 <div class="col-6">\n' +
            '                     <p>' + Lang.TradersCommission + '</p>\n' +
            '                     <p><span>' + data.commission + '%</span></p>\n' +
            '                 </div>\n' +
            '                 <div class="col-6">\n' +
            '                     <p>' + Lang.Investors + '</p>\n' +
            '                     <p><span>' + data.attached + '</span></p>\n' +
            '                 </div>\n' +
            '                 <div class="col-6">\n' +
            '                     <p>' + Lang.InvestorsEquity + '</p>\n' +
            '                     <p><span>' + data.equity_attached + ' USD</span></p>\n' +
            '                 </div>\n' +
            '             </div>\n' +
            '         </div>\n' +
            '     </div>\n' +
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
                data = data.slice(0, 10);
                console.log(data);

                var $table = $('.social-table table');
                var $tbody = $table.find('tbody');

                for (var i = 0; i < data.length; i++) {
                    $tbody.append(templateSocialGrid(data[i]));
                }

                var $carousel = $('.carousel-social');

                for (i = 0; i < data.length; i++) {
                    $carousel.append(templateSocialCarousel(data[i]));
                }
            },
            complete: function (dd) {
                console.log(dd);
                App.loader.hide($('.social-table'));
            }
        });
    }

    getSocialGridData();
})(jQuery);