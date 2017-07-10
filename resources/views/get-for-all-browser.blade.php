@extends('template')

@section('content')
    <section class="page-title bottom-divider text-center">
        <div class="container">
            <div class="page-title__holder">
                <div class="page-title__inner">
                    <div class="page-title__holder">
                        <h1 class="page-title__title">Start using with any browser!</h1>
                        <p class="page-title__subtitle lead"><strong>Whether you are on Firefox, Safari or Opera,<br />{{ env('APP_NAME') }} will use a <em>bookmarklet</em> to work seamlessly.</strong></p>
                        <p class="page-title__subtitle lead">You will be given a button to drag and drop to your bookmarks bar, and you will be good to go!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-wrap newsletter bg-img bg-overlay white-text relative">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2 class="newsletter__title">Ready to start? It's totally free!</h2>
                    <p class="newsletter__subtitle">Your email address will be used only to send you your links.<br />"Cross my heart and hope to die!"</p>
                    <form class="newsletter__form relative" method="post">
                        {{ csrf_field() }}
                        <input type="email" class="newsletter__input" name="email" placeholder="Your email address">
                        <input type="submit" class="btn btn--secondary-color btn--button newsletter__submit"  value="Register">
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection