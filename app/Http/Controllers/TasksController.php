<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Task::all();
        $categories = Category::all();
        return view('tasks.index', ['tareas' => $tareas,'categories' => $categories]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
        ]);

        $tarea = new Task;
        $tarea->title = $request->title;
        $tarea->category_id = $request->category_id;
        $tarea->status = 1;
        $tarea->save();

        return redirect()->route('tasks.index')->with('success','Tarea creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $categories = Category::all();
        return view('tasks.show', ['task' => $task, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarea = Task::find($id);
        $tarea->title = $request->title;
        //dd($tarea);
        $tarea->save();

        return redirect()->route('tasks.index')->with('success','Tarea actualizada');
        //return view('tasks.index', ['tarea' => $tarea, 'success' => 'Tarea actualizada']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Task::find($id);
        $tarea->delete();
        return redirect()->route('tasks.index')->with('success','Tarea eliminada');
         //return view('tasks.index', ['tarea' => $tarea, 'success' => 'Tarea borrada']);
    }
}
