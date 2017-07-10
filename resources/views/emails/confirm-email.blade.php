@extends('emails.template')

@section('content')
<div>
    Thank you for using {{ env('APP_NAME') }}!<br /><br />
    Please click the link below to confirm your email address and start sending links:<br />
    <a href="{{ env('APP_URL') . "/confirm-email-address/$verificationCode?previews=yes" }}">{{ env('APP_URL') . "/confirm-email-address/$verificationCode?previews=yes" }}</a>
</div>
@endsection


