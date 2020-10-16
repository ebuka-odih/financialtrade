function showLoaderOnButton($btn) {
    $btn.html('<img src="/images/new-site/contests/rush-for-profit/loader.svg" />');
}

function hideLoaderOnButton($btn, text) {
    $btn.html(text);
}

function hideErrorBlock() {
    $('div.error-block').hide()
}

$(document).ready(function () {

    // if (target && $('#' + target).length) {
    //     $([document.documentElement, document.body]).animate({
    //         scrollTop: $('#' + target).offset().top - 25
    //     }, 2000);
    //     $(location.hash + ' p').click();
    // }

    $('.faq-contest ul li .question p').click(function () {

        if ($(this).parents('.question').hasClass('active')) {
            $(this).parent().removeClass('active');
            $(this).parent().find('.answer').slideUp();
        } else {
            $('.answer').slideUp();
            $('.question').removeClass('active');
            $(this).parent().toggleClass('active');
            $(this).parent().find('.answer').slideToggle();
        }
    });

    $('.faq-show').click(function () {
        $(this).parent().find('.faq-ul').slideToggle();
    });

    $('.head-langs').click(function () {
        $('.hl-list').slideToggle(200);
        if ($('.head-langs').hasClass('active')) {
            $('.head-langs').removeClass('active');
        } else {
            $('.head-langs').addClass('active');
        }
    });

    //$('.form-section-reg-rush-for-profits-2020 .start-mob').click(function () {
    //    $('.form-section-reg-rush-for-profits-2020 .start-mob').addClass('fadeOutDown');
    //    $('.form-section-reg-rush-for-profits-2020 .step-2').addClass('fadeInUp show');
    //});

    // $('.btn-open').click(function () {
    //     $('.form-section-reg-rush-for-profits-2020 .step-1').addClass('fadeOutDown');
    //     $('.form-section-reg-rush-for-profits-2020 .step-2').addClass('fadeInUp show');
    // });

    // $('.form-section-reg-rush-for-profits-2020 .step-2 .btn-next').click(function () {
    //     $('.form-section-reg-rush-for-profits-2020 .step-2').addClass('fadeOutDown');
    //     $('.form-section-reg-rush-for-profits-2020 .step-3').addClass('fadeInUp show');
    // });

    // $('.form-section-reg-rush-for-profits-2020 .step-3 .btn-next').click(function () {
    //     $('.form-section-reg-rush-for-profits-2020 .step-3').addClass('fadeOutDown');
    //     $('.form-section-reg-rush-for-profits-2020 .step-4').addClass('fadeInUp show');
    // });

    $('.form-section-reg-rush-for-profits-2020 .step-4 .btn-next').click(function () {
        $('.form-section-reg-rush-for-profits-2020 .step-4').addClass('fadeOutDown');
    });

    $('.show-archive').click(function () {
        $('.block-archive').css({transform: 'translateX(0)'});
    });

    $('.close').click(function () {
        $('.block-archive').css({transform: 'translateX(100%)'}, 400);
    });

    $(document).on('click', '.wrap-main-rush-for-profits-2020 .current-month table tbody tr.more', function(e) {
        $(this).toggleClass('active');
        e.preventDefault();

        var targetrow = $(this).next('.hide-tr');
        targetrow.show().find('.table-info-lots').slideToggle('500', function(){
            if (!$(this).is(':visible')) {
                targetrow.hide();
            }
        });
    });

    $(document).on('click', '.wrap-main-rush-for-profits-2020 .current-month table tbody tr.hide-tr', function(e) {
        e.preventDefault();
        var targetrow = $(this);
        targetrow.show().find('.table-info-lots').slideToggle('500', function(){
            if (!$(this).is(':visible')) {
                targetrow.hide();
                $(this).parents('.hide-tr').prev('.more').removeClass('active');
            }
        });

    });

    var wid = $(window).width();
    if (wid < 920) {

        $('.nav a').click(function (e) {
            e.preventDefault();
            $(this).tab('show')
        });

        $('a.scroll').on('click', function (e) {
            var href = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(href).offset().top
            }, 'slow');
            e.preventDefault();
        });

        $('.show-archive').click(function () {
            $('.block-archive').css({transform: 'translateX(0)'});
            var height_archive = $('.block-archive').outerHeight(true);
            $('.wrap-main').addClass('black');
            $('#form-block').addClass('black');
            $('.wrap-main').height(height_archive);
        });

        $('.close').click(function () {
            $('.block-archive').css({transform: 'translateX(100%)'}, 400);
            $('.wrap-main').removeClass('black');
            $('#form-block').removeClass('black');
            $('.wrap-main').removeAttr("style");
            $('html, body').animate({
                scrollTop: $(".show-archive").offset().top - 100
            }, 0);
        });
    }

    $(".select").select2({
        dropdownParent: $("#form-block")
    });
});

$(document).ready(function () {

    let block0 = $('.form-section-reg-rush-for-profits-2020 .start-mob');
    let block1 = $('.form-reg-rush-for-profits-2020.step-1');
    let block2 = $('.form-reg-rush-for-profits-2020.step-2');
    let block3 = $('.form-reg-rush-for-profits-2020.step-3');
    let block4 = $('.form-reg-rush-for-profits-2020.step-4');

    $(document).on('click', '.form-reg-rush-for-profits-2020.step-1 .btn-open', function () {
        let btn = $(this);
        showLoaderOnButton(btn);
        hideErrorBlock();
        $.post('/contests/rush-for-profit/signup-step-one', {}, function (result) {
            if (result.status === 'success') {
                block2.html(result.content);
                block1.addClass('fadeOutDown');
                block2.addClass('fadeInUp show');
            } else if (result.status === 'error') {
                alert('error');
            }
            hideLoaderOnButton(btn, btn.data('text'));
        })
    });

    $(document).on('click', '.form-section-reg-rush-for-profits-2020 .start-mob', function () {

        let btn = $('.form-section-reg-rush-for-profits-2020 .start-mob h3');
        let h3_el = btn.html();
        showLoaderOnButton(btn);
        hideErrorBlock();
        $.post('/contests/rush-for-profit/signup-step-one', {}, function (result) {
            if (result.status === 'success') {
                $('.form-section-reg-rush-for-profits-2020 .start-mob h3').html(h3_el);
                block2.html(result.content);
                block2.removeClass('fadeInUp show fadeOutDown');
                block0.addClass('fadeOutDown');
                block2.addClass('fadeInUp show');
            } else if (result.status === 'error') {
                alert('error');
            }
            hideLoaderOnButton(btn, btn.data('text'));
        })

    });

    $(document).on('click', '.form-section-reg-rush-for-profits-2020 .step-2 .close-arrow', function () {
        block2.addClass('fadeOutDown');
        block0.removeClass('fadeOutDown');
        block0.addClass('fadeInUp show');

    });

    $(document).on('click', '.form-reg-rush-for-profits-2020.step-2 .btn-next', function () {
        let btn = $(this);
        let form = block2.find('form');
        let emailOrUid = form.find('#contestFormEmail').val();
        showLoaderOnButton(btn);
        hideErrorBlock();
        $.post('/contests/rush-for-profit/signup-step-one', {emailOrUid: emailOrUid}, function (result) {
            if (result.status === 'success') {
                block3.html(result.content);
                $(".select-no-find").select2();
                let defValue = null;
                if($('#contestFormAccountType').val() === 'start'){
                    defValue = 400;
                }else{
                    defValue = 100;
                }
                $('#contestFormLeverage').val(defValue).change();
                block2.addClass('fadeOutDown');
                block3.addClass('fadeInUp show');
            } else if (result.status === 'error') {
                block2.find('.error-block span').html(result.message);
                block2.find('.error-block').show();
            }
            hideLoaderOnButton(btn, btn.data('text'));
        })
    });

    $(document).on('click', '.form-reg-rush-for-profits-2020.step-3 .btn-next', function () {
        let btn = $(this);
        let form = block3.find('form');
        let emailOrUid = form.find('#contestFormEmailOrUid').val();
        let nickname = form.find('#contestFormNickname').val();
        let accountType = form.find('#contestFormAccountType').val();
        let leverage = form.find('#contestFormLeverage').val();
        showLoaderOnButton(btn);
        hideErrorBlock();
        $.post('/contests/rush-for-profit/signup-step-two', {
            emailOrUid: emailOrUid,
            nickname: nickname,
            accountType: accountType,
            leverage: leverage,
        }, function (result) {
            if (result.status === 'success') {
                block3.addClass('fadeOutDown');
                block4.addClass('fadeInUp show');
            } else if (result.status === 'error') {
                block3.find('.error-block span').html(result.message);
                block3.find('.error-block').show();
            }
            hideLoaderOnButton(btn, btn.data('text'));
        })
    });

    $(document).on('click', 'div.error-block', function (e) {
        $(this).hide();
    });

    $(document).on('change', '#contestFormAccountType', function (e) {
        let value = $(this).val();
        let listLeverage = $('#contestFormLeverage').data('list');
        let options = listLeverage[value];
        $('#contestFormLeverage').empty();
        $.each(options, function (key, value) {
            $('#contestFormLeverage')
                .append($("<option></option>")
                    .attr("value", value)
                    .text('1:' + value));
        });
        let defValue = null;
        if($('#contestFormAccountType').val() === 'start'){
            defValue = 400;
        }else{
            defValue = 100;
        }
        $('#contestFormLeverage').val(defValue).change();
    });

    var nextListOffset = 0;
    var nextListSearch = '';
    var nextMonthSeeMore = $('.next-month a.see-more');

    var currentListOffset = 0;
    var currentListSearch = '';
    var currentMonthSeeMore = $('.current-month a.see-more');

    var pastListOffset = 0;
    var pastListSearch = '';
    var pastMonthSeeMore = $('.previous-month a.see-more');


    $('.search-field').bind('keydown', function (e) {
        var keyCode = e.which;

        var validKeyCodes = ',8,37,38,39,40,46,';
        var isOther = (validKeyCodes.indexOf(',' + keyCode + ',') > -1);

        if($(this).val().length > 30 && !isOther){
            return false
        }

        var isDigit = (keyCode > 47 && keyCode < 58);
        var isAlpha = (keyCode > 64 && keyCode < 91);
        var isExtended = (keyCode > 95 && keyCode < 106);

        if (isDigit || isAlpha || isExtended || isOther) {
            return true;
        } else {
            return false;
        }
    }).bind('blur', function () {
        var pattern = new RegExp('[^a-zA-Z0-9]+', 'g');
        var input = $(this);
        var value = input.val();
        value = value.replace(pattern, '');

        if(value.length > 30){
            return false
        }

        input.val(value);
    });

    $(document).on('keydown', '.next-month .search-field', $.debounce(function () {
        updateNextMonthTable();
    }, 500));

    $(document).on('keydown', '.current-month .search-field', $.debounce(function () {
        updateCurrentMonthTable();
    }, 500));

    $(document).on('keydown', '.previous-month .search-field', $.debounce(function () {
        updatePastMonthTable();
    }, 500));

    $(document).on('click', '.next-month a.see-more', function () {
        updateNextMonthTable();
    });

    $(document).on('click', '.current-month a.see-more', function () {
        updateCurrentMonthTable();
    });

    $(document).on('click', '.previous-month a.see-more', function () {
        updatePastMonthTable();
    });

    function updateNextMonthTable() {

        let _this = nextMonthSeeMore;
        let stageId = $('#next-month').data('stage');
        let offset = _this.data('offset');
        let search = $('.next-month').find('.search-field').val();

        if (nextListSearch !== search) {
            offset = 0;
            nextListSearch = search;
        }

        $.get('/contests/rush-for-profit/get-list-next-stage', {
            stageId: stageId,
            offset: offset,
            search: search
        }, function (result) {
            if (result.status === true) {
                if (offset === 0) {
                    $('div.next-month tbody').html(result.data);
                } else {
                    $('div.next-month tr').last().after(result.data);
                }
                if (result.more === true) {
                    _this.data('offset', offset + 20);
                    _this.show();
                } else {
                    _this.hide();
                }
            }
        });
    }

    function updateCurrentMonthTable() {

        let _this = currentMonthSeeMore;
        let stageId = $('#current-month').data('stage');
        let offset = _this.data('offset');
        let search = $('.current-month').find('.search-field').val();

        if (currentListSearch !== search) {
            offset = 0;
            currentListSearch = search;
        }

        $.get('/contests/rush-for-profit/get-list-current-stage', {
            stageId: stageId,
            offset: offset,
            search: search
        }, function (result) {
            if (result.status === true) {
                if (offset === 0) {
                    $('div.current-month tbody').html(result.data);
                } else {
                    $('div.current-month tr').last().after(result.data);
                }
                if (result.more === true) {
                    _this.data('offset', offset + 20);
                    _this.show();
                } else {
                    _this.hide();
                }
            }
        });
    }

    function updatePastMonthTable() {

        let _this = pastMonthSeeMore;
        let stageId = $('#previous-month').data('stage');
        let offset = _this.data('offset');
        let search = $('.previous-month').find('.search-field').val();

        if (pastListSearch !== search) {
            offset = 0;
            pastListSearch = search;
        }

        $.get('/contests/rush-for-profit/get-list-past-stage', {
            stageId: stageId,
            offset: offset,
            search: search
        }, function (result) {
            if (result.status === true) {
                if (offset === 0) {
                    $('div.previous-month tbody').html(result.data);
                } else {
                    $('div.previous-month tr').last().after(result.data);
                }
                if (result.more === true) {
                    _this.data('offset', offset + 20);
                    _this.show();
                } else {
                    _this.hide();
                }
            }
        });
    }
});
