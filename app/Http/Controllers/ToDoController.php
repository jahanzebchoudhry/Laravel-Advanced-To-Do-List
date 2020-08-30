<?php

namespace App\Http\Controllers;

use App\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ToDo $tod)
    {

        //  $todo = ToDo::where('id' , 1)->get();

        $todos = ToDo::orderBy('completed', 'desc')->get();

        // dd($todo);

        return view('todos.index' , compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('todos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',

        ]);
        
        ToDo::create($data);

        return redirect('/todos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $todo)
    {
        return view('todos.edit' , compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $todo)
    {
      
    //     $data =$request->validate([
    //     'title' => 'required',
    //    ]);

    //    dd($to->title);

       ToDo::find($todo->id)->update(['title' => $request->title]);

       return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $todo)
    {
        $todo->delete();

        return redirect()->back();
    }


    public function complete(ToDo $todo){

    

        $todo->update(['completed' => true]);

        return redirect()->back();

    }

    public function incomplete(ToDo $todo){

        $todo->update(['completed' => false]);

        return redirect()->back();

    }
}
