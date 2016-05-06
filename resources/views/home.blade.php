@extends('layout')

@section('content')
    <h1>Send web pages to your inbox easily!</h1>
    <h2 style="margin-bottom: 16px;">With a little Bookmarklet, send any web page to your inbox in just a click!</h2>
    <p><strong>NEW</strong>: Looking for the Google Chrome Extension version? <a href="https://chrome.google.com/webstore/detail/fwrdtome/jhlipdcjclnkibfkjchlapkjhlbpbipf?hl=fr" target="_blank">Here it is!</a></p>

    <br />

    <form method="POST">
        <h3 class="text-center">Get your bookmarklet, it's free!</h3>
        <div class="row uniform">
            <div class="12u$ 12u$(xsmall)">
                <input type="email" name="email" id="email" placeholder="Email address*" required>
            </div>
        </div>
        <div class="row uniform">
            <div class="12u$ 12u$(xsmall)">
                <div class="g-recaptcha" data-sitekey="6Lfj9R4TAAAAAArBUavOunoPGJfXKooS0Wgky38F"></div>
            </div>
        </div>
        <div class="row uniform">
            <div class="12u$ 12u$(xsmall)">
                <button type="submit" class="button special icon fa-envelope-o">START SENDING!</button>
            </div>
        </div>
    </form>

    <br /><br />

    <h2 style="text-align: center;">Questions?</h2>

    <br />

    <div class="row uniform">
        <div class="6u">
            <blockquote>
                <strong>"How does this work?"</strong><br />
                Once subscribed, you'll get a link to drag-n-drop to you browser favorite's bar. Anytime you'll want to send a link to your inbox, click this link and boom!
            </blockquote>
        </div>
        <div class="6u 12u(small)">
            <blockquote>
                <strong>"Free, seriously?"</strong><br />
                Yes, absolutely! This service is provided free of charge.<br />Of course servers cost money but I use Fwrdto.me for my personnal use and it's fine for now to offer it for free!
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
                I'm sad to see you go but sure! <a href="mailto:&#102;&#119;&#114;&#100;&#116;&#111;&#109;&#101;&#64;&#118;&#97;&#108;&#101;&#110;&#116;&#105;&#110;&#46;&#120;&#121;&#122;">Click here</a> to unsubscribe.
            </blockquote>
        </div>
    </div>
@endsection