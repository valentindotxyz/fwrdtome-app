@extends('emails.template_plain')

@section('content')
{{ $title }} ({{ $sentDate->format("m/d/Y H:i") }} UTC)
{{ $link }}
@endsection

