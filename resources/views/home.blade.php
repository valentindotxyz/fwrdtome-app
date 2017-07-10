@extends('template')

@section('content')
    <section class="hero bg-gradient bg-gradient white-text">
        <svg version="1.1" class="wave" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 152.8" enable-background="new 0 0 1920 152.8" xml:space="preserve">
          <path class="wave-path" d="M1,152.4v-61c0,0,257.3,56.4,431,44c260.8-18.7,490.2-63.1,647-97c496.4-107.3,842,42,842,42v72H1z"/>
        </svg>
        <div class="container hero__container hero__container--720">
            <div class="row hero__outer flex-vertical-align-center">
                <div class="col-lg-5 col-md-7 text-center hidden-sm hidden-xs">
                    <img src="/img/logo-white.png">
                </div>
                <div class="col-lg-6 col-md-5">
                    <h1 class="hero__title hero--boxed">Send any link to your inbox in just one click!</h1>
                    <p class="hero__subtitle">With {{ env('APP_NAME') }} you can send yourself any link to your inbox with just a just click. You no longer need to open your favorite email client to save a link for future use!</p>
                    <div class="hero__btn-holder mt-30">
                        <a href="#start-using" class="btn btn--lg btn--color btn--icon rounded"><span><i class="ui-arrow-right"></i>Start using!</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap bottom-divider pt-200 pt-md-100" id="features">
        <div class="container">
            <div class="row flex-parent flex-vertical-align-center flex-sm-collapse">
                <div class="col-sm-4 mb-sm-40">
                    <div class="feature text-center mb-60">
                        <a href="javascript:void(0);" class="feature__icon-holder">
                            <i class="ui-check feature__icon feature__icon--gradient-2"></i>
                        </a>
                        <div class="feature__text">
                            <h3 class="feature__title">Easy to use</h3>
                            <p class="feature__paragraph">Whether you're using Chrome or any web browser, send yourself a link in just a click. We promise, just one!</p>
                        </div>
                    </div>
                    <div class="feature text-center">
                        <a href="javascript:void(0);" class="feature__icon-holder">
                            <i class="ui-smiley feature__icon feature__icon--gradient-2"></i>
                        </a>
                        <div class="feature__text">
                            <h3 class="feature__title">Spam-free</h3>
                            <p class="feature__paragraph">No one likes to give its email address on the internet. Your email address will never leave {{ env('APP_NAME') }} and will only be used to send links to your inbox; nothing more!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-sm-40 text-center">
                    <img src="/img/logo-blue.png" alt="">
                </div>
                <div class="col-sm-4">
                    <div class="feature text-center mb-60">
                        <a href="javascript:void(0);" class="feature__icon-holder">
                            <i class="ui-clock feature__icon feature__icon--gradient-2"></i>
                        </a>
                        <div class="feature__text">
                            <h3 class="feature__title">Queued links</h3>
                            <p class="feature__paragraph">Links can be grouped in one email sent everyday at the time you decide. You're so close to Inbox Zero, we do not want to be on your way ;) </p>
                        </div>
                    </div>

                    <div class="feature text-center">
                        <a href="javascript:void(0);" class="feature__icon-holder">
                            <i class="ui-camera-polaroid feature__icon feature__icon--gradient-2"></i>
                        </a>
                        <div class="feature__text">
                            <h3 class="feature__title">Nice previews</h3>
                            <p class="feature__paragraph">Sometimes it is hard to remember why we saved a link for later. With previews, you'll find a thumbnail of the website along the link.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-wrap bg-light bottom-divider" id="price">
        <div class="container text-center">
            <div class="heading-content">
                <p>Free</p>
                <p>
                    While servers obviously cost money, <a href="https://valentin.xyz" target="_blank">{{ env('APP_NAME') }}'s maker</a> uses it intensively everyday and is pleased to offer it to everyone for free!
                </p>
                <p>
                    Of course, if you feel generous and found a good use of {{ env('APP_NAME') }}<br /><strong><a href="https://paypal.me/vpolo/5" target="_blank">feel free to participate to its development</a></strong> 😇
                </p>
            </div>
        </div>
    </section>
    <section class="section-wrap bottom-divider" id="testimonials">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-md-40">
                    <div class="testimonial box-shadow text-center clearfix">
                        <img src="/img/testimonials/ryan.jpeg" alt="" class="testimonial__img">
                        <div class="testimonial__body">
                            <p class="testimonial__text">“I love the simplicity<br />of the bookmarklet.”</p>
                        </div>
                        <div class="testimonial__info">
                            <span class="testimonial__author">Ryan Hoover</span>
                            <span class="testimonial__company">Product Hunt</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="testimonial box-shadow text-center clearfix">
                        <img src="/img/testimonials/cliff.jpeg" alt="" class="testimonial__img">
                        <div class="testimonial__body">
                            <p class="testimonial__text">“Absolutely love it. This is perfect and 100% useful for me. Thanks for building it!”</p>
                        </div>
                        <div class="testimonial__info">
                            <span class="testimonial__author">Cliff Dailey</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="testimonial box-shadow text-center clearfix">
                        <img src="/img/testimonials/alex.jpeg" alt="" class="testimonial__img">
                        <div class="testimonial__body">
                            <p class="testimonial__text">“This is brilliant, I send so many emails to myself with links to webpages, this is a much nicer experience.”</p>
                        </div>
                        <div class="testimonial__info">
                            <span class="testimonial__author">Alex Marshall</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="testimonial box-shadow text-center clearfix">
                        <img src="/img/testimonials/milan.jpeg" alt="" class="testimonial__img">
                        <div class="testimonial__body">
                            <p class="testimonial__text">“Excellent! Loved it. This is so very useful. Simple. Clean. And One-Click solution to send web pages to your inbox.”</p>
                        </div>
                        <div class="testimonial__info">
                            <span class="testimonial__author">Milan Chheda</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section-wrap bg-light bottom-divider" id="start-using" >
        <div class="container text-center">
            <div class="heading-row">
                <h2 class="heading">Get the extension that best suits you…</h2>
            </div>
            <div class="btn__holder">
                <a href="https://chrome.google.com/webstore/detail/fwrdtome/jhlipdcjclnkibfkjchlapkjhlbpbipf" class="btn btn--x-large btn--icon btn--chrome">
                    <i class="ui-google"></i><span>I'm using Google Chrome</span>
                </a>
                <a href="/get-for-all-browser" class="btn btn--x-large btn--icon btn--color">
                    <i class="ui-computer-imac"></i><span>I'm using Firefox, Safari, IE...</span>
                </a>
                <a href="/#" class="btn btn--x-large btn--icon btn--apple" disabled="disabled">
                    <i class="ui-apple"></i><span>I'm using iOS (soon!)</span>
                </a>
            </div>

        </div>
    </section>
@endsection