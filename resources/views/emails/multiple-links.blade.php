@extends('emails.template')

@section('content')
    @foreach($links as $linkKey => $link)
        <div>
            <a href="{{ $link->link }}"><strong>{{ $link->title ? $link->title : $link->link }}</strong></a><br />
            <small>({{ $link->created_at->format('m/d/Y H:i') }} UTC)</small>

            @if($link->thumbnail !== "" && file_exists(storage_path("app/thumbnails/$link->thumbnail")))
                <br /><br />
                <a href="{{ $link->link }}"><img src="{{ $message->embed(storage_path("app/thumbnails/$link->thumbnail")) }}"></a>
            @endif

            @if ($linkKey < count($links) - 1)
                <p style="text-align: center;">— — —</p>
            @endif
        </div>
    @endforeach
@endsection


