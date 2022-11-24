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

    /**
     * Remove the specified resource from storage.
     *
     * @param  GenericRoom  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($room)
    {
        $room = GenericRoom::find($room);
        if(is_null($room) || !$room->delete()) {
            return redirect()->route('buildings.index')->with('error', 'Error al eliminar la habitación');
        } else {
            return redirect()->route('buildings.show', $room->building_id)->with('success', 'Habitación eliminada');
        }
    }

    

}
