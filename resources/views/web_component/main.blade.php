<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Pai Nai Fun</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Athiti" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/stylesheet.css') }}" rel="stylesheet" type="text/css">

    <!-- Basic stylesheet -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}">

    <!-- Default Theme -->
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.theme.css') }}">

    <link href="{{ asset("/plugins/lightbox/css/lightbox.css")}}" rel="stylesheet" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>

</head>
<body>

@include('web_component.header')

<div id='container'>
    @yield('content')
</div>

@include('web_component.footer')

<script src="{{ asset("/plugins/lightbox/js/lightbox.js")}}"></script>

</body>

</html>