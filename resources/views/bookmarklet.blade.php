@extends('layout')

@section('content')
    <p style="text-align: center; font-size: 26px; text-transform: uppercase;">
        <i class="fa fa-arrow-down fa-fw" aria-hidden="true"></i> Drag this button to your browser favorite's bar! <i class="fa fa-arrow-down fa-fw" aria-hidden="true"></i><br /><br />
        <a href='javascript: !function(){var e=document.createElement("script");e.setAttribute("src","{{ env('APP_URL') }}/client?apiKey={{ $apiKey }}"),document.body.appendChild(e)}();' class="button special animated flash" title="Fwrdto.me">Fwrdto.me</a>
    </p>
@endsection