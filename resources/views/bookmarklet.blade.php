@extends('layout')

@section('content')
    <p style="text-align: center; font-size: 26px; text-transform: uppercase;">
        <i class="fa fa-arrow-down fa-fw" aria-hidden="true"></i> <strong>Drag this button to your browser favorite's bar! <i class="fa fa-arrow-down fa-fw" aria-hidden="true"></i></strong><br /><br />
        <a href='javascript: !function(){var e=document.createElement("img");e.setAttribute("src", "{{ env('APP_URL') }}/send2?api={{ $apiKey }}&url="+encodeURIComponent(window.location.href)+"&title="+encodeURIComponent(window.document.title));e.style.display="none";document.body.appendChild(e);alert("Fwrdto.me: Link sent!")}();' class="button special animated flash" title="Fwrdto.me">Fwrdto.me</a>
    </p>
@endsection