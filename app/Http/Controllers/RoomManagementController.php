<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildings\GenericBuilding;
use App\Models\Rooms\GenericRoom;

class RoomManagementController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $building, $room)
    {
        $room = GenericRoom::find($room);
        return view('rooms.show', ['room' => $room]);
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GenericBuilding $building)
    {
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:255',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'volume' => 'required|numeric',
            'floor' => 'required|String|max:20',
            'type' => 'required|max:255',
        ]);
        
        try{
            $class = 'App\Models\Rooms\\'.$validated['type'];
            if(!class_exists($class))
            {
                throw new \Exception('Room class not found');
            }
            //TODO: check if the room is valid for the building or allows by policies
            //$room = new $class;
            $validated['type']= $class;
            
            $building->rooms()->create($validated);

        } catch (\Exception $e) {
            return redirect()->route('buildings.show', [$building])->withErrors($e->getMessage());
        }
        

        return redirect()->route('buildings.show', [$building])->with('success', 'Nueva sala añadida');
    }

    public function addSensor(Request $request, GenericBuilding $building, GenericRoom $room)
    {
        $validated = $request->validate([
            'name' => 'required|unique:rooms|max:255',
            'model' => 'required|max:50',
            'ws_host' => 'required||max:255',
        ]);

        try{
            /*
            //TODO check if the sensor is valid for the sensor or allows by policies
            $class = 'App\Models\Rooms\\'.$request->type;
            if(!class_exists($class))
            {
                throw new \Exception('Class not found');
            }
            */
            $room->sensors()->create($validated);

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('rooms.show', ['building' => $building, 'room' => $room])->withErrors($e->getMessage());
        }


        return redirect()->route('rooms.show', ['building' => $building, 'room' => $room])->with('success', 'Nuevo Sensor añadido');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  GenericRoom  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($building, $room)
    {
        $room = GenericRoom::find($room);
        if(is_null($room) || !$room->delete()) {
            return redirect()->route('buildings.index')->with('error', 'Error al eliminar la habitación');
        } else {
            return redirect()->route('buildings.show', $room->building_id)->with('success', 'Habitación eliminada');
        }
    }

    

}
