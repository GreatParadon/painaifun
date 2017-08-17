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
        $subrooms = SubRoom::all();
        return success(compact('subrooms'));
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
        $subrooms = SubRoom::create($input);
        $success = ($subrooms) ? $this->show($input['room_id']) : error('Store failed');
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
        $subrooms = SubRoom::where('room_id', $id)->get();
        return success(compact('subrooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subroom = SubRoom::where('room_id', $id)->get();
        return success(compact('subroom'));
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
        $subroom = SubRoom::find($id)->update($input);
        $success = ($subroom) ? success('Updated') : error('Update failed');
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
        $subroom = SubRoom::destroy($id);
        $success = ($subroom) ? success('Deleted') : error('Delete failed');
        return $success;
    }
}
