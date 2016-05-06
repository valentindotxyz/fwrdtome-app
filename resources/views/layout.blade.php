<!DOCTYPE HTML>
<html>
<head>
    <title>Fwrdto.me – Send web pages to your inbox easily!</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/assets/css/animate.css" />
    <link rel="stylesheet" href="/assets/css/main.css?v=3" />
    <link rel="stylesheet" href="/assets/css/custom.css?v=3" />
    <!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicons/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="/favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/manifest.json">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/favicons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div id="wrapper">
    <header id="header">
        <div class="inner">
            <a href="/" class="logo">
                <span class="title">Fwrdto.me</span>
            </a>
        </div>
    </header>

    <div id="main">
        <div class="inner">
            <section>
                @yield('content')
            </section>
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Request::path() === '/')
        <footer id="footer">
            <div class="inner">
                <section>
                    <h2>Contact me!</h2>
                    <p>
                        You can send an email to <a href='mailto:&#102;&#119;&#114;&#100;&#116;&#111;&#109;&#101;&#64;&#118;&#97;&#108;&#101;&#110;&#116;&#105;&#110;&#46;&#120;&#121;&#122;'>&#102;&#119;&#114;&#100;&#116;&#111;&#109;&#101;&#64;&#118;&#97;&#108;&#101;&#110;&#116;&#105;&#110;&#46;&#120;&#121;&#122;</a> anytime!
                    </p>
                </section>
                <ul class="copyright">
                    <li>Made by <a href="https://valentin.xyz" target="_blank">Valentin Polo</a> in Lille, France.</li>
                    <li>Available on <a href="https://github.com/VP42/fwrdto.me" target="_blank">Github</a>.</li>
                </ul>
            </div>
        </footer>
    @endif

</div>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/skel.min.js"></script>
<script src="/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="/assets/js/main.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-41931299-12', 'auto');
    ga('send', 'pageview');
</script>

</body>
</html>