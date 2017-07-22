@extends('emails.template')

@section('content')
<div>
    <a href="{{ $link }}"><strong>{{ $title }}</strong></a><br />
    <small>({{ $sentDate->format("m/d/Y H:i") }} UTC)</small>

    @if($thumbnail !== "" && file_exists(storage_path("app/thumbnails/$thumbnail")))
        <br /><br />
        <a href="{{ $link }}"><img src="{{ $message->embed(storage_path("app/thumbnails/$thumbnail")) }}"></a>
    @endif
</div>
@endsection


