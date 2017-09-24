@extends('web_component.main')
@section('content')

    <h2 style="color:#94a316">ABOUT PAINAIFUN</h2>
    {!! $about->content or '' !!}

@endsection