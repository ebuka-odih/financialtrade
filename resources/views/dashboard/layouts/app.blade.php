<!DOCTYPE html>
<html lang="en-US" class="fixed">
<!-- Mirrored from social.tifia.com/en/home?username=GIB%40Trade by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 06:53:59 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="uNXaMKKJzcctKlLWBiI_wYUbxnBdnbJq2qZVGn5aIYzomoVZ2PiDkG5PPoNFYUu49FmFRwz11g64yGZjCT1l6g==">
    <title>FTM/Trade</title>
    <link href="{{ asset('admin_assets/d4d1979f/build/css/intlTelInputf907.css?v=1598456919') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/c4fd7b45/css/bootstrap73a6.css?v=1574168826') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/ac24bae0/css/jquery.fileupload73a6.css?v=1574168826') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/e50f5fb0/magnific-popup73a6.css?v=1574168826') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/7e6d2e57/css/bootstrap-datetimepicker.mind6f5.css?v=1576325284') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/81c2fe86/pnotify.customd6f5.css?v=1576325284') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/6bb29040/dist/bootstrap3-editable/css/bootstrap-editableb038.css?v=1574168827') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/92444326/css/ion.rangeSliderb038.css?v=1574168827') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/91093691/css/select2.minf066.css?v=1574168852') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/d3a342e5/animate.minb038.css?v=1574168827') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light|Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/3e5deb507b.js"></script>
    <link href="{{ asset('porto-admin/assets/stylesheets/themeefb9.css?v=1592776270') }}" rel="stylesheet">
    <link href="{{ asset('porto-admin/assets/stylesheets/skins/default6da6.css?v=1576243949') }}" rel="stylesheet">
    <link href="{{ asset('porto-admin/theme-custom29be.css?v=1593983762') }}" rel="stylesheet">
    <link href="{{ asset('porto-admin/theme-tifia4330.css?v=1599810430') }}" rel="stylesheet">
    <script src="{{ asset('admin_assets/5883f585/jquery73a6.js?v=1574168826') }}"></script>
    <script src="{{ asset('admin_assets/c4fd7b45/js/bootstrap73a6.js?v=1574168826') }}"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/new-site/logo3.png') }}"/>


    <link rel="shortcut icon" href="{{ asset('images/new-site/logo3.png') }}" type="image/x-icon" />
    <meta property="og:title" content="FTM / GIB@Trade">
    <meta property="og:description" content="">
    <meta property="og:image" content="{{ asset('images/new-site/logo3.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="FTM">
    <meta name="robots" content="noindex">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PBQR5C');
    </script>
    <!-- End Google Tag Manager -->

</head>
<body class="layouts-main- lang-en">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBQR5C"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script type="text/javascript">
    (function(a,e,f,g,b,c,d){a[b]||(a.FintezaCoreObject=b,a[b]=a[b]||function(){(a[b].q=a[b].q||[]).push(arguments)},a[b].l=1*new Date,c=e.createElement(f),d=e.getElementsByTagName(f)[0],c.async=!0,c.defer=!0,c.src=g,d&&d.parentNode&&d.parentNode.insertBefore(c,d))})
    (window,document,"script","https://content.mql5.com/core.js","fz");
    ("register","website","crirkwwnonoaqlhjnwpackicintsxncayr");
</script>
<section class="body layout-wrapper">
{{--    @if(Auth::guest())--}}
       @include('dashboard.layouts.header')
{{--    @else--}}

{{--    @endif--}}

   @yield('content')
</section>

<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');

    if (typeof fbq !== 'undefined') {
        fbq('init', '676329269549113');
        fbq('trackCustom', 'PageView');
    }
</script>

@include('dashboard.layouts.scripts')

</body>
<!-- Mirrored from social.tifia.com/en/home?username=GIB%40Trade by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Oct 2020 06:53:59 GMT -->
</html>
