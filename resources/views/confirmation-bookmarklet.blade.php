@extends('template')

@section('content')
    <section class="page-title bottom-divider text-center">
        <div class="container">
            <div class="page-title__holder big">
                <div class="page-title__inner">
                    <div class="page-title__holder">
                        <h1 class="page-title__title">Drag and drop the button below to your bookmarks bar!</h1>
                        <br /><br />
                        <p class="page-title__subtitle lead">
                            <a href='javascript: !function(){var e=document.createElement("img");e.setAttribute("src", "{{ env('APP_URL') }}/api/send?api-key={{ $apiKey }}&source={{ \App\Enums\ClientSources::BOOKMARKLET }}{!! $options !!}&link="+encodeURIComponent(window.location.href));e.style.display="none";document.body.appendChild(e);alert("Link on its way to your inbox!")}();' title="{{ env('APP_NAME') }}" class="bookmarklet">Send to my inbox</a>
                        </p><br />
                        <p class="hints">
                            Help to display the bookmarks bar on <a href="https://support.google.com/chrome/answer/95745?hl=en" target="_blank">Chrome</a>, <a href="https://support.mozilla.org/en-US/kb/bookmarks-toolbar-display-favorite-websites" target="_blank"> Firefox</a> and <a href="http://help.opera.com/FreeBSD/11.60/en/toolbars.html" target="_blank">Opera</a>.<br />
                            For Safari: Menu View > Show Favorites Bar.
                        </p>
                    </div><br /><br />
                    <div>
                        <h3>Options</h3>
                        <form name="bookmarklet" class="text-left">
                            <div>
                                <input type="checkbox" id="previews" name="previews" value="yes" onchange="submitForm()" @if(isset($inputs["previews"]) && $inputs["previews"] === "yes") checked="checked" @endif>
                                <label for="previews">Add website previews to links</label>
                            </div>
                            <div>
                                <input type="checkbox" id="queued" name="queued" value="yes" onchange="submitForm()" @if(isset($inputs["queued"]) && $inputs["queued"] === "yes") checked="checked" @endif>
                                <label for="queued">Group links so I receive just one email per day</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function submitForm() {
            document.bookmarklet.submit();
        }
    </script>
@endsection