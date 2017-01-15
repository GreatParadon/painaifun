<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubRoom;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_rooms = SubRoom::all();
        return success(compact('sub_rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $sub_room = SubRoom::create($input);
        $success = ($sub_room) ? $this->show($input['room_id']) : error('Store failed');
        return $success;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_rooms = SubRoom::where('room_id', $id)->get();
        return success(compact('sub_rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_rooms = SubRoom::where('room_id', $id)->get();
        return success(compact('sub_rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $sub_rooms = SubRoom::find($id)->update($input);
        $success = ($sub_rooms) ? success('Updated') : error('Update failed');
        return $success;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_room = SubRoom::destroy($id);
        $success = ($sub_room) ? success('Deleted') : error('Delete failed');
        return $success;
    }
}
