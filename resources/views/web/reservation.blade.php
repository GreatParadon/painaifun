@extends('web_component.main')
@section('content')

    <h2 style="color:#94a316; ">RESERVATION</h2><br>
    {!! $reservation->content or '' !!}

@endsection