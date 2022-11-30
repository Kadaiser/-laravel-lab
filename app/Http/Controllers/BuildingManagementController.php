<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buildings\GenericBuilding;
use App\Models\Buildings\HouseBuilding;
use App\Models\Buildings\OfficeBuilding;
use App\Models\Rooms\GenericRoom;

class BuildingManagementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buildings = GenericBuilding::all();
        $types = [
            (object)['id' => 'GenericBuilding', 'name' => 'Generico'],
            (object)['id' => 'HouseBuilding', 'name' => 'Casa'],
            (object)['id' => 'OfficeBuilding', 'name' => 'Officina']
        ];
        return view('buildings.index', ['buildings' => $buildings, 'types' =>$types]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $building
     * @return \Illuminate\Http\Response
     */
    public function show($building)
    {
        $building = GenericBuilding::find($building);
        $building->setRooms();
        $roomTypes = [
            (object)['id' => 'GenericRoom', 'name' => 'Generico'],
            (object)['id' => 'BedroomRoom', 'name' => 'Dormitorio'],
        ];
        return view('buildings.show', ['building' => $building,'roomTypes' =>$roomTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:buildings|max:255',
            'type' => 'required|max:255',
        ]);

        try{
            
            $class = 'App\Models\Buildings\\'.$request->type;
            if(!class_exists($class))
            {
                throw new \Exception('Class not found');
            }

            $building = new $class;
            $building->name = $request->name;
            $building->location = $request->location;
            $building->disabled = false;
            $building->save();
            
        } catch (\Exception $e) {
            return redirect()->route('buildings.index')->with('error', $e->getMessage());
        }

        return redirect()->route('buildings.index')->with('success', 'Nueva edificio añadido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($building)
    {
        $building = GenericBuilding::find($building);
        $building->Rooms()->each(function($room){
            $room->delete();
        });
        $building->delete();
        return redirect()->route('buildings.index')->with('success', 'Edificio eliminado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenericBuilding $building)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:buildings|max:255',
        ]);
        $building->update($validated);

        return redirect()->route('buildings.show', $building->id)->with('success', 'Edificio modificado');
    }


    public function addSensor(Request $request, $building)
    {
        dd($building);
        $request->validate([
            'name' => 'required|unique:rooms|max:255',
            'ws_host' => 'required||max:255',
        ]);

        try{
            $class = 'App\Models\Rooms\\'.$request->type;
            if(!class_exists($class))
            {
                throw new \Exception('Class not found');
            }
            
            $room = new $class;
            $room->name = $request->name;
            $room->ws_host = $request->ws_host;
            $room->model = $request->model;
            $room->save();

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->route('rooms.show', [$request->building])->withErrors($e->getMessage());
        }


        return redirect()->route('rooms.show', [$request->building])->with('success', 'Nuevo Sensor añadido');
    }

}
