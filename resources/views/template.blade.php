<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send any link to your inbox in just one click! – {{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Send any link to your inbox in just one click!">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700|Lato:300,400,400i,700|Exo+2:500' rel='stylesheet'>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/font-icons.css" />
    <link rel="stylesheet" href="/css/style.css?v=2" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="apple-mobile-web-app-title" content="{{ env('APP_NAME') }}">
    <meta name="application-name" content="{{ env('APP_NAME') }}">
    <meta name="theme-color" content="#ffffff">
</head>

<body data-spy="scroll" data-offset="60" data-target=".nav__holder">
<main class="main-wrapper">
    <header class="nav nav--sticky-on-mobile" id="home">
        <div class="nav__holder" id="sticky-nav">
            <div class="container">
                <div class="flex-parent">
                    <div class="nav__header clearfix">
                        <div class="logo-wrap local-scroll">
                            <a href="/" class="logo__link">
                                {{ env('APP_NAME') }}
                            </a>
                        </div>

                        <button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="nav__icon-toggle-bar"></span>
                            <span class="nav__icon-toggle-bar"></span>
                            <span class="nav__icon-toggle-bar"></span>
                        </button>
                    </div>
                    <nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse">
                        <ul class="nav__menu nav__menu--inline local-scroll" id="onepage-nav">
                            <li>
                                <a href="/#features">Features</a>
                            </li>
                            <li>
                                <a href="/#price">Price</a>
                            </li>
                            <li>
                                <a href="/#testimonials">Testimonials</a>
                            </li>
                        </ul>
                        <div class="nav__btn-holder">
                            <a href="/#start-using" class="btn btn--sm btn--color rounded"><span>Start using!</span></a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="content-wrapper oh">
        @yield('content')

        <footer class="footer">
            <div class="footer__bottom top-divider">
                <div class="container text-center">
            <span class="copyright">
              Made by <a href="https://valentin.xyz">Valentin Polo</a> from Lille, France – <a href="https://vpfr.typeform.com/to/u1ABkW" target="_blank">Contact</a> – Available on <a href="https://github.com/VP42/fwrdto.me" target="_blank">Github</a>
            </span>
                </div>
            </div>
        </footer>

        <div id="back-to-top">
            <a href="#top"><i class="ui-arrow-up"></i></a>
        </div>

    </div>
</main>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-41931299-14', 'auto');
    ga('send', 'pageview');
</script>

<script>
    var facebookPageId = "fwrdtome-2013547068671414";
</script>
<script type="text/javascript" src="https://messengerify.me/api/chat-head/embed.js"></script>

</body>
</html>