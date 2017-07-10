@extends('template')

@section('content')
    <section class="page-title bottom-divider text-center">
        <div class="container">
            <div class="page-title__holder big">
                <div class="page-title__inner">
                    <div class="page-title__holder">
                        <h1 class="page-title__title">One last step...</h1>
                        <p class="page-title__subtitle lead">We need to ensure the email address you provided really belongs to you and that we won't spam anybody!</p>
                        <p class="page-title__subtitle lead"><strong>A link is on its way to your inbox, click it to start using {{ env('APP_NAME') }}!</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection