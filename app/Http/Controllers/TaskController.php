<?php

namespace App\Http\Controllers;

use App\User;
use App\list2;
use App\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  // protected $task;

  /**
  * @param Request $request
  * @param  $task
  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
    public function index($id){
      $list = List2::find($id);
      $AllTaskInfo = Task::where('list_id', $id)->get();


      return view('tasks.index', [
          'AllTaskInfo' => $AllTaskInfo,
          'list' => $list,
          'id' => $id
        ]);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($list_id)
    {
      return view('tasks.create')->with('list_id', $list_id);   // views/task/create.blade.php
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
      'Task_title'=>'required',
      'Task_description'=> 'required',
      'Duration' => 'required'
    ]);
    $TaskModel = new Task([
      'Task_title' => $request->get('Task_title'),
      'Task_description'=> $request->get('Task_description'),
      'Duration'=> $request->get('Duration'),
      'Status' =>  $request->get('Status'),
      'User_id' => Auth::id(),
      'List_id' => $request->get('List_id'),
    ]);

    $TaskModel->save();

return redirect('/listPage')->with('message', 'Task  ' . ' ' . $request->Task_title . ' ' . 'is succesfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $task = Task::find($id);

      return view('tasks/editTask', ['task' => $task]);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $TaskModel = Task::find($id);

       $TaskModel->Task_title = $request->Task_title;
       $TaskModel->Task_description = $request->Task_description;

       $TaskModel->save();

       return redirect('/listPage');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $share = Task::find($id);
       $share->delete();

        return redirect('/listPage')->with('success', 'Stock has been deleted Successfully');
    }
}
