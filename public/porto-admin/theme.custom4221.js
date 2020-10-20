(function ($) {
    'use strict';

    if ( typeof PNotify !== 'undefined' ) {
        $.extend(true, PNotify.prototype.options.buttons, {
            closer: true,
            closer_hover: false,
            sticker: false,
            labels: {
                close: 'Close',
                stick: 'Stick'
            }
        });
    }

    $.extend(true, $.magnificPopup.defaults, {
        tLoading: ''
    }, $.magnificPopup.instance._onFocusIn = function (e) {
        if ( $(e.target).hasClass('select2-search__field') ) {
            return true;
        }

        $.magnificPopup.proto._onFocusIn.call(this,e);
    });
}).apply(this, [window.jQuery]);

var App = (function ($) {
    'use strict';

    var loadingNotifications = false;

    function textareaAutosize()
    {
        autosize($('textarea'));
    }

    function timeAgo()
    {
        $('time[data-toggle="timeago"]').timeago();
    }

    function socialFilesUpload()
    {
        $('.form-editor').on('dragleave drop', function (e) {
            $(this).removeClass('__drag');
            e.preventDefault();
        }).on('dragover', function (e) {
            $(this).addClass('__drag');
            e.preventDefault();
        });

        $('.form-editor-fileupload').each(function () {
            $(this).fileupload({
                dataType: 'json',
                sequentialUploads: true,
                formData: {},
                dropZone: $(this).closest('.form-editor'),
                send: function () {
                    $(this).closest('.under-textarea').find('.progress > div').css('width', '0%');
                    $(this).closest('.under-textarea').find('.progress').show();
                },
                fail: function(e, data) {
                    App.showMessage(data.jqXHR.responseJSON.message);
                },
                done: function (e, response) {
                    $(this).closest('.under-textarea').find('.progress').hide();
                    $(this).closest('.under-textarea').find('.progress > div').css('width', '0%');

                    ajaxComplete(response.result);

                    if (response.result.status == 'success') {
                        $(this).closest('.form-editor').find('.attachments').append(response.result.content);
                    }
                },
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $(this).closest('.under-textarea').find('.progress > div').css('width', progress + '%');
                }
            }).prop('disabled', !$.support.fileInput);
        });
    }

    function ajaxPaginationScroll()
    {
        var loading = false;
        var enabled = true;

        $(window).scroll(function (){
            if ((($(window).scrollTop()+ $(window).height()) + 250) >= $(document).height()) {
                $('.ajax-pagination .ajax-pagination-scroll-button').click();
            }
        });

        $(document).on('click', '.ajax-pagination .ajax-pagination-scroll-button', function (e) {
            var obj     = $(this);
            var wrapper = $(this).closest('.ajax-pagination');
            var page    = parseInt(obj.attr('data-page')) || 2;
            var url     = obj.attr('href') + page;

            if (loading == false && enabled == true) {
                loading = true;
                App.loader.show(obj);

                $.get(url, function(response) {
                    if (response && $.trim(response) != '') {
                        wrapper.find('.ajax-pagination-target').append(response);
                        obj.attr('data-page', page + 1);
                    } else {
                        obj.closest('.loader-wrapper').remove();
                        enabled = false;
                    }

                    loading = false;
                    App.loader.hide(obj);
                });
            }
            e.preventDefault();
        });
    }

    function ajaxPaginationPrepend()
    {
        var loading = false;

        $(document).on('click', '.ajax-pagination .ajax-pagination-prepend-button', function (e) {
            var obj     = $(this);
            var wrapper = $(this).closest('.ajax-pagination');

            if (loading === false) {
                loading = true;
                App.loader.show(obj);

                var url = wrapper.attr('data-url');

                if (url.indexOf('?') >= 0) {
                    url += '&firstId=';
                } else {
                    url += '?firstId=';
                }

                $.get(url + wrapper.find('.ajax-pagination-target > *:first-child').attr('data-id'), function(response) {
                    if (response && $.trim(response) != '') {
                        wrapper.find('.ajax-pagination-target').prepend(response);
                    }

                    if (wrapper.attr('id') === 'feed' || wrapper.attr('id') === 'dialog')
                        App.initAjaxFeed();

                    if (wrapper.attr('id') === 'notifications')
                        timeAgo();

                    loading = false;
                    App.loader.hide(obj);
                });
            }
            e.preventDefault();
        });

        if ($('#feed .ajax-pagination-prepend-button').length > 0) {
            setInterval(function () {
                $('#feed .ajax-pagination-prepend-button').trigger('click');
            }, 1000 * 60 * 3);
        }
    }

    function ajaxPaginationAppend()
    {
        var loading = false;
        var enabled = true;

        $(window).scroll(function (){
            if ((($(window).scrollTop()+ $(window).height()) + 250) >= $(document).height()) {
                $('.ajax-pagination .ajax-pagination-append-button').click();
            }
        });

        $(document).on('click', '.ajax-pagination .ajax-pagination-append-button', function (e) {
            var obj     = $(this);
            var wrapper = $(this).closest('.ajax-pagination');

            if (loading === false && enabled === true) {
                loading = true;
                App.loader.show(obj);

                var url = wrapper.attr('data-url');

                if (url.indexOf('?') >= 0) {
                    url += '&lastId=';
                } else {
                    url += '?lastId=';
                }

                $.get(url + wrapper.find('.ajax-pagination-target > *:last-child').attr('data-id'), function(response) {
                    if (response && $.trim(response) != '') {
                        wrapper.find('.ajax-pagination-target').append(response);
                    } else {
                        obj.closest('.loader-wrapper').remove();
                        enabled = false;
                    }

                    if (wrapper.attr('id') === 'feed' || wrapper.attr('id') === 'dialog') {
                        App.initAjaxFeed();
                    }

                    if (wrapper.attr('id') === 'notifications' || wrapper.attr('id') === 'dialog-list') {
                        timeAgo();
                    }

                    loading = false;
                    App.loader.hide(obj);
                });
            }
            e.preventDefault();
        });
    }

    function socialFeedAttachments()
    {
        $('.post-wrapper .attachments').each(function () {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled:true
                }
            });
        });
    }

    function popupImages()
    {
        $('.image-link').magnificPopup({
            type:'image',
            closeOnContentClick: true
        });
    }

    function popupForm()
    {
        $('html .ajax-modal').magnificPopup({
            type: 'ajax',
            closeOnBgClick: false,
            callbacks: {
                ajaxContentAdded: function () {magnificPopupCallback(this)},
                parseAjax: magnificPopupParse
            }
        });

        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
    }

    function magnificPopupCallback(obj)
    {
        obj.content.closest('.mfp-content').addClass('ajax-content');
        popupForm();
        editable();

        if (obj.content.find('form').hasClass('form-editor')) {
            showFeedComments();
            App.initAjaxFeed();
        }

        if (obj.content.find('.ajax-pagination').length > 0) {
            obj.content.closest('.mfp-wrap').scroll(function (){
                var obj = $(this);
                if (((obj.scrollTop() + obj.height()) + 250) >= obj.find('.modal-block').height()) {
                    obj.find('.ajax-pagination .ajax-pagination-append-button').click();
                    obj.find('.ajax-pagination .ajax-pagination-scroll-button').click();
                }
            });
        }
    }

    function magnificPopupParse(mfpResponse)
    {
        var html = '<div class="modal-block"><div class="panel">';
        var content = $('<div>' + mfpResponse.data + '</div>');
        var title   = content.find('[data-modal-title]').attr('data-modal-title');

        if (title) {
            html += '<div class="panel-heading"><h4 class="panel-title">' + title + '</h4></div>';
        }

        html += '<div class="panel-content">' + mfpResponse.data + '</div>';
        html += '</div></div>';

        mfpResponse.data = html;

        return mfpResponse;
    }

    function editable()
    {
        $('.editable').editable({
            success: function(response) {
                if (response.status === 'error') {
                    return response.message;
                }
            }
        });
    }

    function ajax()
    {
        // AJAX ACTION
        $(document).on('click', '.ajax-action', function (e) {
            var obj = $(this);

            if (!obj.hasClass('ajax-loading')) {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: obj.attr('href') || obj.attr('data-href'),
                    beforeSend: function () {
                        App.loader.show(obj);
                    },
                    complete: function () {
                        App.loader.hide(obj);
                    },
                    success: function(response) {
                        if (obj.hasClass('ajax-action-once')) {
                            obj.removeClass('ajax-action');
                        }
                        ajaxComplete(response, obj);
                    }
                });
            }

            e.preventDefault();
            e.stopImmediatePropagation();
        });

        // AJAX LOAD CONTENT
        $(document).on('click', '.ajax-load-content', function (e) {
            var obj = $(this);

            if (!obj.hasClass('ajax-loading')) {
                $.ajax({
                    type: 'GET',
                    url: obj.attr('href') || obj.attr('data-href'),
                    beforeSend: function () {
                        App.loader.show(obj);
                    },
                    complete: function () {
                        App.loader.hide(obj);
                    },
                    success: function(response) {
                        App.loader.hide(obj);
                        $(obj.attr('data-target')).html(response);
                        App.initAjax();
                    }
                });
            }

            e.preventDefault();
            e.stopImmediatePropagation();
        });

        // AJAX CHECKBOX
        $(document).delegate('.ajax-checkbox', 'click',  function () {
            var obj = $(this);

            if (!obj.hasClass('ajax-loading')) {
                $.ajax({
                    type: 'GET',
                    data: {name: obj.attr('name'), value: obj.is(':checked') ? 1 : 0},
                    dataType: 'json',
                    url: obj.attr('data-url'),
                    beforeSend: function () {
                        App.loader.show(obj);
                    },
                    complete: function () {
                        App.loader.hide(obj);
                    },
                    success: function(response) {
                        ajaxComplete(response, obj);
                    }
                });
            }
        });

        // AJAX SELECT LOAD CONTENT
        $(document).on('change', '.ajax-select', function (e) {
            var obj = $(this);
            var form = $(this).closest('form');

            if (!obj.hasClass('ajax-loading')) {
                $.ajax({
                    type: 'GET',
                    url: obj.attr('data-url') + obj.val(),
                    beforeSend: function () {
                        App.loader.show(obj);
                    },
                    complete: function () {
                        App.loader.hide(obj);
                    },
                    success: function(response) {
                        App.loader.hide(obj);
                        ajaxCompleteForm(response, form);
                        App.initAjax();
                    }
                });
            }

            e.preventDefault();
            e.stopImmediatePropagation();
        });

        // AJAX FORMS
        $(document).on('submit', '.mfp-content form:not(.form-editor), form.ajax-form', function (e) {
            var form = $(this).closest('form');

            if (!form.hasClass('ajax-loading')) {
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    beforeSend: function () {
                        App.loader.show(form);
                    },
                    complete: function(xhr) {
                        if (xhr.getResponseHeader('X-Redirect') === null) {
                            App.loader.hide(form);
                        }
                    },
                    success: function(response, status, xhr) {
                        if (xhr.getResponseHeader('X-Redirect') === null) {
                            App.loader.hide(form);
                        }
                        ajaxCompleteForm(response, form);
                    }
                });
            }

            e.preventDefault();
        });

        // AJAX FORM POST
        $(document).on('submit', 'form.form-editor', function (e) {
            var form = $(this).closest('form');

            if (!form.hasClass('ajax-loading')) {
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    beforeSend: function () {
                        App.loader.show(form);
                    },
                    complete: function () {
                        App.loader.hide(form);
                    },
                    success: function(response) {
                        ajaxCompleteForm(response, form);

                        if (response.status === 'success') {
                            form.find('textarea').val('');
                            form.find('.attachments').html('');
                        }

                        if (form.hasClass('new-message-form')) {
                            dialogsRefresh();

                            if (response.userId !== undefined) {
                                dialogRefresh(response.userId);
                            }
                        }

                        if (form.hasClass('new-post-form'))
                            feedRefresh();

                        App.initAjaxFeed();
                    }
                });
            }

            e.preventDefault();
        });
    }

    function ajaxComplete(response, obj)
    {
        if (response.status !== undefined && response.message !== undefined && response.message !== null) {
            App.showMessage(response.message, response.status, response.title);
        }

        if (response.status === 'success') {
            if (response.content !== undefined) {
                var action = response.action || 'insert',
                    target = response.target || null
                ;

                if (action === 'replace') {
                    if (target) {
                        $(target).replaceWith(response.content);
                    } else {
                        obj.replaceWith(response.content);
                    }
                } else if (action === 'insert') {
                    if (target) {
                        $(target).html(response.content);
                    } else {
                        obj.closest('.ajax-content').html(response.content);
                    }
                } else if (action === 'after') {
                    if (target) {
                        $(target).after(response.content);
                    } else {
                        obj.closest('.ajax-content').after(response.content);
                    }
                }
            }

            if (response.remove !== undefined) {
                $(response.remove).remove();
            }

            if (response.function !== undefined) {
                eval(response.function)(response.params || {});
            }
        }

        if (response.feed !== undefined) {
            if (response.feed.post !== undefined) {
                if (response.feed.countComments !== undefined) {
                    $('#post-' + response.feed.post + ' .post-comments-count').html(response.feed.countComments);
                }
                if (response.feed.countRepost !== undefined) {
                    $('#post-' + response.feed.post + ' .post-repost-count').html(response.feed.countRepost);
                }
            }
        }

        if (response.modal !== undefined) {
            $.magnificPopup.open({
                type: 'ajax',
                items: {
                    src: response.modal
                },
                closeOnBgClick: false,
                callbacks: {
                    ajaxContentAdded: function () {magnificPopupCallback(this)},
                    parseAjax: magnificPopupParse
                }
            }, 0);
        }

        if (response.redirect !== undefined) {
            window.location.replace(response.redirect);
        }

        App.initAjax();
    }

    function ajaxCompleteForm(response, obj)
    {
        if (obj.closest('.mfp-content').length > 0) {
            if (response.status === undefined) {
                // $.magnificPopup.instance.appendContent($(response), 'ajax');
                obj.closest('.mfp-content > .modal-block > .panel > .panel-content').html($(response));
            } else if (response.content !== undefined && response.target == undefined) {
                obj.closest('.mfp-content > .modal-block > .panel > .panel-content').html(response.content);
            }

            if (response.status === 'success' && response.stay === undefined) {
                $.magnificPopup.close();
            }
        } else {
            if (response.status === undefined) {
                if (obj.closest('.ajax-form-wrapper-replace').length > 0) {
                    obj.closest('.ajax-form-wrapper-replace').replaceWith(response);
                } else if (obj.closest('.ajax-form-wrapper').length > 0) {
                    obj.closest('.ajax-form-wrapper').html(response);
                } else {
                    obj.parent().html(response);
                }
            }
        }

        ajaxComplete(response, obj);
    }

    function formRefresh(selector)
    {
        var form = $(selector);

        $.ajax({
            type: 'GET',
            url: form.attr('action'),
            beforeSend: function () {
                App.loader.show(form);
            },
            complete: function () {
                App.loader.hide(form);
            },
            success: function (response) {
                App.loader.hide(form);
                ajaxCompleteForm(response, form);
            }
        });
    }

    function notificationsInit()
    {
        // notificationsLoad();
        initNotificationsScroll();
    }

    var leftOffset,
        leftX,
        overallMovement,
        skipAjax,
        scrolling = false,
        endScrolling;

    function initNotificationsScroll()
    {
        $(window).scroll(function () {
            // SCROLL EVENT - START
            scrolling = true;
            endScrolling = window.setTimeout(function () {
                scrolling = false;
                window.clearTimeout(endScrolling);
                // SCROLL EVENT - STOP
            }, 20);
        });
    }

    function onTouchStart(event)
    {
        // TOUCH START
        if (scrolling) {
            return;
        }

        var $this = $(event.currentTarget);
        var offset = $this.offset();
        var touches = event.changedTouches;

        leftX = offset.left;
        leftOffset = touches[0].clientX - leftX;
        skipAjax = false;
    }

    function onTouchMove(event)
    {
        // TOUCH START MOVE');
        if (scrolling) {
            return;
        }

        var $this = $(event.currentTarget);
        $this.addClass('active');
        var touches = event.changedTouches;
        var leftMovement = touches[0].clientX - leftOffset;
        $this.css({'position': 'absolute',
            'left': leftMovement, 'width': '100%'});
        overallMovement = Math.abs(leftMovement - leftX);

        if (overallMovement > 100) {
            // delete notification
            $this.fadeOut(200);
            $this.parent('.notification-wrap').hide(500);

            if (!skipAjax) {
                skipAjax = true;

                $.ajax({
                    url: '/notifications/set-read',
                    method: 'POST',
                    data: {
                        id: $this.data('id'),
                    },
                    success: function () {
                        skipAjax = true;
                    }
                })
            }
        }
    }

    function onTouchEnd(event)
    {
        // TOUCH END

        var $this = $(event.currentTarget);

        if (overallMovement < 100) {
            // return to place
            $this.css({'left': leftX});
            $this.attr('style', '');
            $this.removeClass('active');
        }
    }

    function initNotificationsTouchMove()
    {
        $(document).find('.notification-message').each(function () {
            var draggable = $(this);

            draggable.on('touchstart', onTouchStart);
            draggable.on('touchmove', onTouchMove);
            draggable.on('touchend', onTouchEnd);
        });
    }

    function notificationsLoad(selector)
    {
        // Starting load notifications

        var $notificationBlock = $('.notifications-block');
        var $notificationContent = $notificationBlock.find('.notifications-content');

        App.loader.show($notificationContent);

        $.ajax({
            url: '/' + lang + '/notifications/load-new',
            success: function (data) {
                $notificationContent.html(data);
                $notificationBlock.addClass('loaded');

                initNotificationsTouchMove();

                App.notificationCounterUpdate($($notificationContent.get(0)).find('.notification-message').length)
            },
            complete: function () {
                App.loader.hide($notificationContent);
            }
        });

        return false;
    }

    function feed()
    {
        $(document).on('click', '.new-comment-toggle', function () {
            $(this).closest('.post-wrapper').find('.post-comments-wrapper').show();
            $(this).closest('.post-wrapper').find('.form-editor textarea').focus();
        });

        $(document).on('click', '.show-comments-button', function () {
            $(this).closest('.post-comments-wrapper').find('.post-comments-hidden').show(0, function (){
                var showComment = $.query.get('showComment');

                if (showComment) {
                    $('body').scrollTo('#comment-' + showComment);
                }
            });
            $(this).remove();
        });

        $(document).delegate('.new-comment-answer', 'click', function () {
            $(this).closest('.post-wrapper').find('.post-comments-wrapper').show();

            var text     = $(this).attr('data-text');
            var textarea = $(this).closest('.post-wrapper').find('.form-editor textarea');
            editorInsert(textarea, text + ',');
        });

        $(document).on('click', '.favorite-button:not(.ajax-loading)', function () {
            if ($(this).find('i').hasClass('fa-star-o')) {
                $(this).find('i').removeClass('fa-star-o');
                $(this).find('i').addClass('fa-star');
                $(this).find('.text').html(textNotFavorite);
            } else {
                $(this).find('i').removeClass('fa-star');
                $(this).find('i').addClass('fa-star-o');
                $(this).find('.text').html(textToFavorite);
            }
        });

        $(document).on('click', '.like-button:not(.ajax-loading)', function () {
            var count = parseInt($(this).find('.count').html());

            if ($(this).find('i').hasClass('fa-heart-o')) {
                $(this).find('i').removeClass('fa-heart-o');
                $(this).find('i').addClass('fa-heart');
                $(this).find('.count').html(count + 1);
                $(this).find('.text').html(textNotLike);
            } else {
                $(this).find('i').removeClass('fa-heart');
                $(this).find('i').addClass('fa-heart-o');
                $(this).find('.count').html(count - 1);
                $(this).find('.text').html(textLike);
            }
        });

        $(document).on('click', '.feed-who-like-view-all > a', function () {
            $(this).closest('.like-button-wrapper').find('.popover').hide();
        });

        function leaveLikeWho(obj)
        {
            setTimeout(function () {
                if (obj.closest('.like-button-wrapper:hover').length === 0) {
                    obj.closest('.like-button-wrapper').find('.popover').hide();
                } else {
                    obj.closest('.like-button-wrapper').on('mouseleave', function () {
                        obj.closest('.like-button-wrapper').find('.popover').hide();
                        obj.closest('.like-button-wrapper').unbind("mouseleave");
                    });
                }
            }, 1000);
        }

        $(document).on('mouseenter', '.like-button', function () {
            var count = parseInt($(this).closest('span').find('.count').html());

            if (count > 0) {
                var obj = $(this);

                if (obj.closest('.like-button-wrapper').find('.popover').length) {
                    obj.closest('.like-button-wrapper').find('.popover').show();
                    leaveLikeWho(obj);
                } else {
                    var url = obj.closest('.comment-content').length
                            ? urlWhoLikesComment
                            : urlWhoLikesPost;
                    var id  = obj.closest('.comment-content').length
                            ? $(this).closest('.comment-content').attr('data-id')
                            : $(this).closest('.post-wrapper').attr('data-id');

                    $.get(url + '?id=' + id, function(response) {
                        obj.popover({
                            content: response,
                            placement: 'top',
                            html: true
                        }).popover('show');
                        leaveLikeWho(obj);

                        App.initAjax();
                    });
                }
            }
        });
    }

    function editor()
    {
        $(document).delegate( '.form-editor .attachments .attachment .delete', 'click', function () {
            $(this).closest('.attachment').remove();
        });

        $(document).delegate('.form-editor textarea', 'keydown', function (e) {
            if (e.ctrlKey && e.keyCode == 13) {
                $(this).closest('form').submit();
            }
        });

        $(document).delegate('.post-smile-button', 'click', function () {
            $(this).closest('.post-smiles-wrapper').find('.dropdown-menu').html($('#smiles-source').html());
        });

        $(document).delegate('.smiles-popup .smile', 'click',  function () {
            editorInsert($(this).closest('.form-editor').find('textarea'), $(this).attr('alt'));
        });
    }

    function editorInsert(textarea, text)
    {
        textarea.val($.trim(textarea.val() + ' ' + text) + ' ');
        textarea.focus();
    }

    function iniTooltip()
    {
        $('[title]').tooltip();
    }

    function initSelect()
    {
        $.fn.select2.defaults.set('width', 'resolve');
        $.fn.select2.defaults.set('minimumResultsForSearch', 15);
        $('select').select2();
    }

    function initMaskedInput()
    {
        $.each($('input[data-mask]'), function () {
            var obj = $(this);
            if (obj.attr('data-mask') != '') {
                if (obj.attr('placeholder')) {
                    obj.mask(obj.attr('data-mask'), {placeholder: obj.attr('placeholder')});
                } else {
                    obj.mask(obj.attr('data-mask'));
                }
            }
        });
    }

    function demoNotice()
    {
        $(document).delegate('.demo-notice', 'click', function(event) {
            if (isDemo) {
                if ($('html').hasClass('no-mobile-device')) {
                    $.magnificPopup.open({
                        type: 'ajax',
                        items: {
                            src: urlDemoNotice
                        },
                        closeOnBgClick: false,
                        callbacks: {
                            ajaxContentAdded: function () {magnificPopupCallback(this)},
                            parseAjax: magnificPopupParse
                        }
                    }, 0);
                } else {
                    document.location.href = urlDemoNotice;
                }

                event.preventDefault();
                event.stopImmediatePropagation();
            }
        });
    }

    function showFeedComments()
    {
        $('#show-post .show-comments-button').click();
    }

    function sliderInit()
    {
        $.each($("input.slider"), function () {
            var filter = $(this);
            filter.ionRangeSlider({
                type: "single",
                min: filter.attr('data-min') || null,
                max: filter.attr('data-max') || null,
                step: filter.attr('data-step') || null,
                prefix: filter.attr('data-prefix') || null,
                postfix: filter.attr('data-postfix') || null,
                grid: filter.attr('data-grid') || null
            });
        });
    }

    function sidebarMenu()
    {
        $(document).on('click', '.sidebar-widget-accounts > ul.nav > li > a', function () {
            var $link = $(this);

            if (!$link.hasClass('loaded')) {
                $link.addClass('loading');
                $.get($link.attr('href'), function(response) {
                    $link.closest('.nav-parent').find('.table-info').html(response);
                    $link.addClass('loaded');
                }).always(function () {
                    $link.removeClass('loading');
                });
            }

            return false;
        });
    }

    function userMenu()
    {
        if (typeof userId === 'undefined') {
            return false;
        }

        var $menuTpl   = '<ul class="dropdown-menu">'
                       + '    <li>' + linkUserProfile  + '</li>'
                       + '    <li>' + linkUserNewPm    + '</li>'
                       + '    <li>' + linkUserPm       + '</li>'
                       + '    <li>' + linkUserPosts    + '</li>'
                       + '    <li class="user-subscription">' + linkFollow + "\n" + linkUnfollow + '</li>'
                       + '</ul>';
        var $menuTplMy = '<ul class="dropdown-menu">'
                       + '    <li>' + linkUserProfile  + '</li>'
                       + '    <li>' + linkUserPmMy     + '</li>'
                       + '    <li>' + linkUserPosts    + '</li>'
                       + '</ul>';

//         $(document).delegate('.user-menu .user-menu-link:not([data-toggle=dropdown])', 'click', function(event) {
//             generateUserMenu($(this), $(this).text().replace('@', ''), $(this).closest('.user-menu').attr('data-id'));
//             event.stopPropagation();
//             event.preventDefault();
//         });

        $(document).delegate('.avatar-wrapper .user-menu-link:not([data-toggle=dropdown])', 'click', function(event) {
            var title = $(this).attr('data-username') || $(this).find('img').attr('title') || $(this).find('img').attr('data-original-title');
            generateUserMenu($(this), title.replace('@', ''), $(this).attr('data-id'));
            event.stopPropagation();
            event.preventDefault();
        });

        function generateUserMenu(obj, username, userId)
        {
            var $menu = obj.hasClass('my') ? $menuTplMy : $menuTpl;

            $menu = $menu.replace(/_username_/g, username);
            $menu = $menu.replace(/_userid_/g, userId);

            obj.after($menu);

            if (subscriptionList.indexOf(userId) > -1) {
                obj.next().find('.follow').addClass('hide');
            } else {
                obj.next().find('.unfollow').addClass('hide');
            }

            obj.next().find('.user-subscription').attr('data-id', userId);

            obj.attr('data-toggle', 'dropdown');
            obj.dropdown('toggle');

            popupForm();
        }
    }

    function updateSubscription(params)
    {
        if (params.subscribed) {
            $('.user-subscription[data-id=' + params.user_id + '] .follow').addClass('hide');
            $('.user-subscription[data-id=' + params.user_id + '] .unfollow').removeClass('hide');

            if (subscriptionList.indexOf(params.user_id) == -1) {
                subscriptionList.push(params.user_id);
            }
        } else {
            $('.user-subscription[data-id=' + params.user_id + '] .unfollow').addClass('hide');
            $('.user-subscription[data-id=' + params.user_id + '] .follow').removeClass('hide');

            subscriptionList = $.grep(subscriptionList, function(value) {
                return value != params.user_id;
            });
        }
    }

    function feedRefresh()
    {
        if ($('#feed').length > 0) {
            $('#feed .ajax-pagination-prepend-button').trigger('click');
        }
    }

    function dialogsRefresh()
    {
        $('#dialog-list-new-message').remove();

        if ($('#dialog-list').length > 0) {
            $('#dialog-list-refresh-button').trigger('click');
        }
    }

    function dialogRefresh(userId)
    {
        if ($('#dialog').length > 0 && $('#dialog-user').val() == userId) {
            $('.ajax-pagination-prepend-button').trigger('click');
        }
    }

    function dateTimePicker()
    {
        $('[data-datetimepicker]').datetimepicker({
            'locale': 'en-GB',
            'format': 'yyyy-mm-dd HH:mm:ss',
            'todayHighlight': true
        });

        $('[data-datepicker]').datetimepicker({
            'weekStart': 1,
            'todayHighlight': true,
            'autoclose': true,
            'minView': 'month',
            'locale': 'en-GB',
            'format': 'yyyy-mm-dd'
        });

        $('[data-timepicker]').datetimepicker({
            'locale': 'en-GB',
            'todayHighlight': true,
            'format': 'HH:mm:ss'
        });
    }

    function nodeApp()
    {
        try {
            if (typeof nodeUrl === 'undefined') {
                return false;
            }

            var socket = io.connect(nodeUrl);

            socket.on('connect', function () {
                socket.emit('open', {key: sessionId});
            });

            socket.on('notification', function () {
                if ($('.notification-menu').is(':visible')) {
                    App.notificationsLoad(false);
                } else {
                    App.notificationCounterUpdate(parseInt($('.notification-icon span').html()) + 1);
                }

                $('#notifications .ajax-pagination-prepend-button').trigger('click');
            });

            socket.on('personal_message', function (from) {
                dialogsRefresh();

                if ($('#dialog-user').length > 0 && $('#dialog-user').val() == from) {
                    $('#dialog .ajax-pagination-prepend-button').trigger('click');
                }
            });

            socket.on('personal_message_read', function (to) {
                if ($('#dialog-list').length > 0) {
                    $('#dialog-list #post-user-id-' + to + ' .post-body').removeClass('unread');
                }

                if ($('#dialog-user').length > 0 && $('#dialog-user').val() == to) {
                    $('#dialog .post-body').removeClass('unread');
                }
            });

            socket.on('user_online', function (data) {
                App.userSetOnline(data.id);
            });

            socket.on('user_offline', function (data) {
                if (data.id != userId) {
                    App.userSetOffline(data.id);
                }
            });
        } catch (ex) {
            try{console.debug({ex: ex});}catch(ex){}
        }
    }

    function events()
    {
        $(document).on('click', '.mfp-content .close-button', function (e) {
            $.magnificPopup.close();
            e.preventDefault();
        });

        $(document).delegate('a.upload-file-button', 'click', function (e) {
            $(this).prev().click();
            e.preventDefault();
        });

        $(document).delegate('input[type=file].upload-file-button', 'change',  function () {
            $(this).next().removeClass('btn-warning');
            $(this).next().addClass('btn-success');
            $(this).next().text($(this).val());
        });

        $(document).on('mouseenter', '.user-menu', function () {
            if ($(this).find('.online-status.was').length > 0) {
                var obj = $(this).find('.online-status.was');

                var element = obj.parent().find('time');
                var title   =  textWasOnline + ' ' + element.text();

                obj.attr('data-original-title', title);
                obj.parent().find('popover').text(title);
            }
        });

        $(document).on('click', '#graph-monthly-master-button', function () {
            $(this).addClass('selected');
            $('#graph-monthly-slave-button').removeClass('selected');
            $('#graph-monthly-master').show();
            $('#graph-monthly-slave').hide();
        });

        $(document).on('click', '#graph-monthly-slave-button', function () {
            $(this).addClass('selected');
            $('#graph-monthly-master-button').removeClass('selected');
            $('#graph-monthly-slave').show();
            $('#graph-monthly-master').hide();
        });

        $(document).on('input', '#form-header-search input[name=search]', $.throttle(function () {
            var field = $(this);

            if (field.val().length >= 3) {
                $.ajax({
                    type: 'GET',
                    dataType: "html",
                    data: {search: field.val()},
                    url: field.closest('form').attr('action'),
                    success: function(response) {
                        $('.search.dropdown .dropdown-menu').html(response);
                        $('.search.dropdown .dropdown-menu').show();
                    }
                });
            } else {
                $('.search.dropdown .dropdown-menu').hide();
            }
        }, 1500));

        $(document).on('click', '#notifications-read-all', function () {
            var idList = [];
            $(this).parents('.notifications-block').find('.notification-message.unread').each(function () {
                idList.push($(this).data('id'));
            });

            $.ajax({
                url: '/' + lang + '/notifications/set-read',
                data: {
                    _csrf: $('meta[name=csrf-token]').attr("content"),
                    id: idList,
                },
                success: function (data) {
                    $('.notifications-content .notification-message').removeClass('unread');
                }
            });
            App.notificationCounterUpdate(0)
        });

        $(document).click(function (event) {
            if ($(event.target).closest('.search.dropdown').length) {
                return;
            }

            $('.search.dropdown .dropdown-menu').hide();
            event.stopPropagation();
        });

        $(document).delegate('.button-print', 'click', function () {
            window.print();
        });

        $(document).delegate('form .form-select-account select', 'change', function () {
            var result = / ([A-Z]{3}).*$/g.exec($(this).find('option:selected').text());

            if (result !== null) {
                $(this).closest('form').find('.form-target-currency .input-group-addon:first').text(result[1]);
            }
        });
        $('form .form-select-account select').trigger('change');

        $(document).delegate('form .form-select-currency select', 'change', function () {
            $(this).closest('form').find('.form-target-currency .input-group-addon').text($(this).val());
        });
        $('form .form-select-currency select').trigger('change');

        $(document).delegate('.user-subscription .follow, .user-subscription .unfollow', 'click', function () {
            updateSubscription({user_id: $(this).closest('.user-subscription').attr('data-id'), subscribed: $(this).hasClass('follow') ? true : false});
        });

        $(document).delegate('.text-more-link', 'click', function () {
            $(this).next().show();
            $(this).remove();
        });

        $(document).delegate('#registerform-country', 'change', function () {
            var countryCode = $(this).val();
            var phoneCode   = $('#registerform-phone').val();

            if (phoneCode.length < 5) {
                $('#registerform-phone').intlTelInput('setCountry', countryCode.toLowerCase())
            }
        });

        $(document).delegate('.show-loader-on-click', 'click', function () {
            App.loader.showPageLoader();
        });

        $(document).delegate('.spoiler', 'click',  function (e) {
            e.preventDefault();

            var target = $($(this).attr('data-target'));

            target.toggle();

            if (target.is(':hidden')) {
                $(this).find('.fa.fa-plus, .fa.fa-minus').addClass('fa-plus');
                $(this).find('.fa.fa-plus, .fa.fa-minus').removeClass('fa-minus');
            } else {
                $(this).find('.fa.fa-plus, .fa.fa-minus').addClass('fa-minus');
                $(this).find('.fa.fa-plus, .fa.fa-minus').removeClass('fa-plus');
            }
        });
    }

    function eventsLast()
    {
        $(document).delegate('[data-href]', 'click', function () {
            document.location.href = $(this).attr('data-href');
        });

        $(document).delegate('[data-href]', 'mousedown', function (e) {
            if ( e.which == 2 ) {
                document.location.href = $(this).attr('data-href');
            }
        });

        new ClipboardJS('.clipboard');
    }

    return {
        init: function () {
            demoNotice();
            events();
            feed();
            editor();
            ajax();
            textareaAutosize();
            editable();
            popupForm();
            popupImages();
            socialFilesUpload();
            socialFeedAttachments();
            ajaxPaginationScroll();
            ajaxPaginationPrepend();
            ajaxPaginationAppend();
            showFeedComments();
            notificationsInit();
            iniTooltip();
            initSelect();
            initMaskedInput();
            dateTimePicker();
            sliderInit();
            sidebarMenu();
            userMenu();
            eventsLast();
            nodeApp();
        },
        initAjax: function () {
            iniTooltip();
            initSelect();
            initMaskedInput();
            popupForm();
        },
        initAjaxImages: function () {
            popupImages();
        },
        initAjaxFeed: function () {
            timeAgo();
            textareaAutosize();
            popupForm();
            popupImages();
            socialFilesUpload();
            socialFeedAttachments();
        },
        notificationsLoad: function (selector) {
            notificationsLoad(selector)
        },
        notificationCounterUpdate: function (value) {
            if (value === 0) {
                $('.notification-icon span').removeClass('new');
            } else {
                $('.notification-icon span').addClass('new');
            }

            $('.notification-icon span').html(value);
        },
        userSetOnline: function (id)
        {
            $('.online-user-' + id).addClass('online');
            $('.online-user-' + id).removeClass('was');
            $('.online-user-' + id).attr('title', textOnline);
        },
        userSetOffline: function (id)
        {
            $('.online-user-' + id).removeClass('online');
            $('.online-user-' + id).attr('title', textOffline);
        },
        setBrowserUrl: function (url) {
            var urlObj = {Page: url, Url: url};
            history.pushState(urlObj, urlObj.Page, urlObj.Url);
        },
        showMessage: function (message, status, title)
        {
            new PNotify({
                title: title !== undefined ? undefined : false,
                text: message,
                type: status,
                icon: false,
                delay: 5000
            });
        },
        loader: {
            getObj: function (obj) {
                if (obj.closest('.loader-wrapper').length > 0) {
                    return obj.closest('.loader-wrapper');
                }

                return obj;
            },
            show: function (obj) {
                var obj = this.getObj(obj);

                if (!obj.hasClass('no-loader')) {
                    obj.addClass('ajax-loading');

                    if (obj.height() >= 50) {
                        obj.append('<div class="loader"></div>');
                    } else {
                        obj.append('<div class="loader __mini"></div>');
                    }

                    obj.addClass('overlay');
                }
            },
            hide: function (obj) {
                var obj = this.getObj(obj);

                obj.removeClass('ajax-loading');
                obj.find('.loader').remove();
                obj.removeClass('overlay');
            },
            showPageLoader: function() {
                $('body').find('.mfp-bg').remove();
                $('body').append('<div class="mfp-bg mfp-ready"><div class="mfp-preloader"></div></div>');
            }
        }
    };
})(window.jQuery);

App.init();
