@extends('layout')

@section('content')
    <p style="text-align: center; font-size: 26px; text-transform: uppercase;">
        <i class="fa fa-arrow-down fa-fw" aria-hidden="true"></i> <strong>Drag'n'drop this bookmarklet to your bookmarks bar! <i class="fa fa-arrow-down fa-fw" aria-hidden="true"></i></strong><br /><br />
        <a href='javascript: !function(){var e=document.createElement("img");e.setAttribute("src", "{{ env('APP_URL') }}/send2?api={{ $apiKey }}&url="+encodeURIComponent(window.location.href)+"&title="+encodeURIComponent(window.document.title));e.style.display="none";document.body.appendChild(e);alert("Fwrdto.me: Link sent!")}();' class="button special animated tada" title="Fwrdto.me">Fwrdto.me</a>
    </p>

    <div id="hints">
        <p>
            <strong><i class="fa fa-question-circle fa-fw"></i> Some browsers hide the Bookmarks bar!</strong><br />
            Here's how to display it on <a href="https://support.google.com/chrome/answer/95745?hl=en" target="_blank">Chrome</a> and <a href="https://support.mozilla.org/en-US/kb/bookmarks-toolbar-display-favorite-websites" target="_blank"> Firefox</a>.<br />
            For Safari: Menu View > Show Favorites Bar.
        </p>
    </div>

@endsection