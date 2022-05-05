<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('todo',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $task = new Task();

        if(Auth::user()){
            $task->task = $request->task;
            $task->user_id = Auth::user()->id;
            $task->save();
            Session::flash('message','The Task was added succesfully');
            return redirect('/');
        }else{
            Session::flash('message','You should login or register to start adding things to the to do list.');
            return redirect('/register');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task)
    {
        //
        $tasky = Task::findOrFail($task);
        if(Auth::user() && Auth::user()->isAdmin()){
            $tasky->delete();
            Session::flash('message','the task was succesfully deleted!');
            return redirect('/');
        }elseif (Auth::user() && Auth::user()->id == $tasky->user_id){
            $tasky->delete();
            Session::flash('message','Your task was succesfully deleted!');
            return redirect('/');}
        elseif (Auth::user() && Auth::user()->id != $tasky->user_id){
            Session::flash('message','You can only delete your own tasks');
            return redirect('/');
        }
        else{
            Session::flash('message','please sign in or register to add to the to do list!');
            return redirect('/register');
        }

        }

}
