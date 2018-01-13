<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubRoom;
use App\Models\Reservation;

use App\Http\Requests;

class ReservationController extends Controller
{
    public function index($date)
    {
        $headers = ['Sub Room Name', 'Agency'];
        $select = SubRoom::select('id', 'name', 'agency')->get();
        return view('admin.reservation.room', compact('headers', 'select', 'date'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $create = Reservation::create($data);
        if ($create) {
            return success('Success');
        } else {
            return error('Failed');
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $select = Reservation::find($id)->update($data);
        $success = ($select) ? success('Updated') : error('Update failed');
        return $success;
    }

    public function check(Request $request)
    {
        $data = $request->all();
        $select = Reservation::firstOrCreate(['subroom_id' => $data['subroom_id'],'date' => $data['date']]);
        if ($select) {
            return success(compact('select'));
        }
    }
}
