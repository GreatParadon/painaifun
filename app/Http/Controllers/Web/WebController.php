<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ReservationInfo;
use App\Models\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;

class WebController extends Controller
{
    public function index()
    {
        return $this->about();
    }

    public function about()
    {
        $about = About::first();
        return view('web.about', compact('about'));
    }

    public function reservation()
    {
        $reservation = ReservationInfo::first();
        return view('web.reservation', compact('reservation'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('web.contact', compact('contact'));
    }
}
