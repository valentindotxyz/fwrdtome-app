@extends('layout')

@section('content')
    <form method="POST">
        <div class="row uniform">
            <div class="6u$ 12u$(xsmall)">
                <input type="email" name="email" id="email" placeholder="Email address*" required>
            </div>
        </div>
        {{--<div class="row uniform">--}}
            {{--<div class="6u$ 12u$(xsmall)">--}}
                {{--<div class="g-recaptcha" data-sitekey="6Lfj9R4TAAAAAArBUavOunoPGJfXKooS0Wgky38F"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row uniform">
            <div class="6u$ 12u$(xsmall)">
                <button type="submit" class="button icon fa-envelope-o">START SENDING!</button>
            </div>
        </div>
    </form>
@endsection