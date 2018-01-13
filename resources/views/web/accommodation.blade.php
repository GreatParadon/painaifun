@extends('web_component.main')
@section('content')

    <h2 style="color:#94a316">ROOM AND RATE</h2>
    <br>    
    <div class="row">
        <div class="col-md-3" style="border-left-style: solid; border-color: #856541;">
            @foreach ($rooms as $r)
                <h5 class="accomhover" style="text-transform: uppercase;"
                    onclick='onShowRoomDetail("{{ $r->id }}")'>{{ $r->title }}</h5>
            @endforeach
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8">
            <div>
                <h4 style="text-transform: uppercase; color:#856541"><b>{{ $room->title or '' }}</b></h4>
                <div>{!! $room->content or '' !!}</div>
                <div>
                    <h5 style="text-transform: uppercase; color:#856541"><b>Rate</b></h5>
                    <table class="table">
                        <tr style="background-color:#856541; color:#FFF">
                            <th>From</th>
                            <th>To</th>
                            <th>Sun - Thu</th>
                            <th>Fri - Sat</th>
                            <th>Holiday</th>
                            <th>Breakfast</th>
                            <th>Extra Bed</th>
                        </tr>

                        @foreach ($rates as $rate)
                            <tr>
                                <td>{{ $rate->from_date }}</td>
                                <td>{{ $rate->to_date }}</td>
                                <td>{{ $rate->first }}</td>
                                <td>{{ $rate->second }}</td>
                                <td>{{ $rate->holiday }}</td>
                                <td>{{ $rate->breakfast }}</td>
                                <td>{{ $rate->extrabed }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>

            </div>
            <div id="pnf-demo" class="owl-carousel gallery ac-bg">

                @foreach ($room_images as $image)
                    <div class="item">
                        <a href="{{ asset("content/room/" . $image->image . "") }}"
                           data-lightbox="painaifun">
                            <img src="{{ asset("content/room/" . $image->image . "") }}">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            $("#pnf-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4],
                pagination: false

            });
        });

        function onShowRoomDetail(id) {
            window.location.replace('{{ url("accommodation") }}/' + id);
        }
    </script>

@endsection