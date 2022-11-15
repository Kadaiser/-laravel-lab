<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms\GenericRoom;

class RoomManagementController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $building
     * @return \Illuminate\Http\Response
     */
    public function show($room, Request $request)
    {
        $room = GenericRoom::find($room);
        return view('rooms.show', ['room' => $room]);
    }

}
