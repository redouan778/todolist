<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use App\List2;
use Illuminate\Http\Request;
use Auth;



class ListController extends Controller{
  public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $AllOpenTask = Task::where('Status', 'Not Done Yet')->count();

      $AllListInfo = List2::all();

      return view('list.index', [
          'List' => $AllListInfo,
          'AllOpenTask' => $AllOpenTask,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('list.create');   // views/task/create.blade.php
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
      'List_title'=>'required',
      ]);

      $List = new List2([
        'List_title' => $request->get('List_title'),
        'User_id' => Auth::id(),
      ]);

    $List->save();

return redirect('/listPage')->with('message', 'List  ' . ' ' . $request->List_title . ' ' . 'is succesfully created.');
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
      $List = List2::find($id);

      return view('list/edit', ['List' => $List]);
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
      $AddList = List2::find($id);

     $AddList->List_title = $request->List_title;
     $AddList->save();

     return redirect('/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $share = List2::find($id);
      $share->delete();

        return redirect('/list')->with('success', 'Stock has been deleted Successfully');
    }
}
