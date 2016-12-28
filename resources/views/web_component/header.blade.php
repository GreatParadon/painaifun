<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index"><img style="width:140px"
                                                      src="{{ asset('resources/img/logo_brown.PNG') }}">
                <!-- <b style="color:#856541">ปายในฝัน</b> --></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li onclick='onAbout()'><a href="#about">ABOUT</a></li>
                <li onclick='onAccom()'><a href="#accommodation">ROOM & RATE</a></li>
                <li onclick='onReser()'><a href="#reservation">RESERVATION</a></li>
                <li onclick='onGalle()'><a href="#gallery">GALLERY</a></li>
                <li onclick='onConta()'><a href="#contact">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="banner" class="owl-carousel owl-theme">
    @foreach(\App\Models\Banner::get() as $banner)

        <div class="item">
            <img src="{{ filePath('banner', $banner->image) }}" alt="{{ $banner->image }}">
        </div>

    @endforeach

</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#banner").owlCarousel({

            navigation: false, // Show next and prev buttons
            slideSpeed: 200,
            paginationSpeed: 800,
            rewindSpeed: 1000,
            singleItem: true,
            pagination: false,
            autoPlay: 5000,
            stopOnHover: true

            // "singleItem:true" is a shortcut for:
            // items : 1,
            // itemsDesktop : false,
            // itemsDesktopSmall : false,
            // itemsTablet: false,
            // itemsMobile : false

        });
    });

    function onAbout() {
        window.location.replace('{{ asset('about') }}');
    }

    function onAccom() {
        window.location.replace('{{ asset('accommodation') }}');
    }

    function onReser() {
        window.location.replace('{{ asset('reservation') }}');
    }

    function onGalle() {
        window.location.replace('{{ asset('gallery')}}');
    }

    function onConta() {
        window.location.replace('{{ asset('contact')}}');
    }
</script>