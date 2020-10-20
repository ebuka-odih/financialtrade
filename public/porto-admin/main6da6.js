$(document).ready(function (){
    $('.ferrari-close').click(function(event) {
        event.preventDefault();
        document.cookie = 'ferrari_footer_banner_close=yes; path=/; expires=01/01/2019 00:00:00';
        $('#ferrari-bottom-banner').hide(450);
    });
});