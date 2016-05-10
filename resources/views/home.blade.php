@extends('layout')

@section('content')
    <h1 class="text-center">Send web pages to your inbox easily!</h1>
    <h2 class="text-center" style="margin-bottom: 14px;">Thanks to our Bookmarklet, send any web page to yourself in one click</h2>
    <p class="text-center">
        <strong>NEW</strong>: Looking for the Google Chrome Extension version? <a href="https://chrome.google.com/webstore/detail/fwrdtome/jhlipdcjclnkibfkjchlapkjhlbpbipf?hl=fr" target="_blank">Here it is!</a>
    </p>

    <br />

    <form method="POST" id="register">
        <h3 class="text-center">Get your bookmarklet!</h3>
        <div class="row uniform">
            <div class="12u$ 12u$(xsmall)">
                <input type="email" name="email" id="email" placeholder="Email address*" required>
            </div>
        </div>
        {{--<div class="row uniform">--}}
            {{--<div class="12u$ 12u$(xsmall)">--}}
                {{--<div class="g-recaptcha" data-sitekey="6Lfj9R4TAAAAAArBUavOunoPGJfXKooS0Wgky38F"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row uniform">
            <div class="12u$ 12u$(xsmall) text-center">
                <button type="submit" class="button special icon fa-envelope-o">GET MY BOOKMARKLET!</button><br />
            </div>
        </div>
    </form>

    <p id="outlook">
        Outlook, Hotmail and MSN users may not receive emails properly.<br />
        While we do our best to ensure deliverability, please use any other email provider in the mean time.
    </p>

    <br /><br />

    <h2 style="text-align: center; font-size: 2em;">Questions?</h2>

    <br />

    <div class="row uniform">
        <div class="6u">
            <blockquote>
                <strong>"How does this work?"</strong><br />
                Once subscribed, you'll get a bookmarklet to drag-n-drop to your browser bookmarks bar. Everytime you'll want to send a web page to your inbox, click the bookmarklet and an email will be on its way!
            </blockquote>
        </div>
        <div class="6u 12u(small)">
            <blockquote>
                <strong>"Free, seriously?"</strong><br />
                Yes, absolutely! This service is provided free of charge.<br />Of course servers cost money but I use Fwrdto.me for my personnal use and it's fine for now to offer it for free!<br />
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="margin: 21px 0 0 0;">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="NHLAYAU29FXRL">
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                </form>
            </blockquote>
        </div>
    </div>

    <div class="row uniform">
        <div class="6u">
            <blockquote>
                <strong>"I'm sure you'll sell/share my email address with others (spams)!"</strong><br />
                I can guarantee your email address will never leave Fwrdto.me and will only be used to send links to your inbox – nothing more!<br />
                Sources of the project are available on <a href="https://github.com/VP42/fwrdto.me">Github</a> too!
            </blockquote>
        </div>
        <div class="6u 12u(small)">
            <blockquote>
                <strong>"The service doesn't fit my needs. Any way to unsubscribe?"</strong><br />
                I'm sad to see you go but sure!<br />
                <a href="mailto:unsubscribe@fwrdto.me">Click here</a> to unsubscribe.
            </blockquote>
        </div>
    </div>
@endsection