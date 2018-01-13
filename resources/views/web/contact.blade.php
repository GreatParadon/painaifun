@extends('web_component.main')
@section('content')

    <h2 style="color:#94a316">Contact Us</h2>
    <div class="row">
        <div class="col-md-7">
            <a href="{{ asset("content/contact/" . $contact->map_image . "") }}" data-lightbox='contact'><img
                        src="{{ asset("content/contact/" . $contact->map_image . "") }}" style='width:100%'></a>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-4">
            {!! $contact->map_content !!}
        </div>
    </div>
    <h2 style="color:#94a316">GOOGLE MAP</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1862.6347315583334!2d98.44378825956478!3d19.360322781376226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe842efbf864ed88c!2z4Lib4Liy4Lii4LmD4LiZ4Lid4Lix4LiZ!5e0!3m2!1sth!2sth!4v1449840070767"
            style="height:480px; width:100%;" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

@endsection
