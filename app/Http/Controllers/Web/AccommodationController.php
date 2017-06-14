<?php

namespace App\Http\Controllers\Web;

use App\Models\Room;
use App\Models\Rate;
use App\Models\RoomImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::first();
        return $this->show($room->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms = Room::select('id', 'title')->where('active', 1)->orderBy('seq', 'ASC')->get();
        $room = Room::where('active', 1)->find($id);
        $rates = ($room) ? $this->rate($id) : [];
        $room_images = ($room) ? RoomImage::where('room_id', $id)->get() : [];

        return view('web.accommodation', compact('rooms', 'room', 'room_images', 'rates'));
    }

    private function rate($id)
    {
        $rates = Rate::where('room_id', $id)->get();
        foreach ($rates as $rate) {
            $rate->first = number_format($rate->first) . ' baht';
            $rate->second = number_format($rate->second) . ' baht';
            $rate->holiday = number_format($rate->holiday) . ' baht';
            $rate->from_date = $this->dateThai($rate->from_date);
            $rate->to_date = $this->dateThai($rate->to_date);
            $rate->breakfast = ($rate->breakfast == 1) ? 'Yes' : 'No';
            $rate->extrabed = ($rate->extrabed == null) ? 'No' : number_format($rate->extrabed) . ' baht';
        }

        return $rates;
    }

    private function dateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = ["", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];
        $strMonthThai = $strMonthCut[$strMonth];
        $subYear = substr($strYear, 2);
        return "$strDay $strMonthThai $subYear";
    }

}
