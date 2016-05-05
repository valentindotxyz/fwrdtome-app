<!DOCTYPE HTML>
<html>
<head>
    <title>Fwrdto.me – Send web pages to your inbox easily!</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="/assets/css/animate.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="/assets/css/ie8.css" /><![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
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

    <footer id="footer">
        <div class="inner">
            <section>
                <h2>Contact me!</h2>
                <p>
                    You can send an email to <a href='mailto:&#102;&#119;&#114;&#100;&#116;&#111;&#109;&#101;&#64;&#118;&#97;&#108;&#101;&#110;&#116;&#105;&#110;&#46;&#120;&#121;&#122;'>&#102;&#119;&#114;&#100;&#116;&#111;&#109;&#101;&#64;&#118;&#97;&#108;&#101;&#110;&#116;&#105;&#110;&#46;&#120;&#121;&#122;</a> anytime!
                </p>
            </section>
            <ul class="copyright">
                <li>Made by <a href="https://valentin.xyz">Valentin Polo</a> in Lille, France.</li>
            </ul>
        </div>
    </footer>

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