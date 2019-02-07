<?php

namespace App\Http\Controllers;

use App\model\TaskModel;
use Illuminate\Http\Request;


class TaskController extends Controller
{

  // protected $task;

  /**
  * @param Request $request
  * @param  $task
  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
  */
    public function index(Request $request){
      // echo "string";
      // exit();
      $AllTaskInfo = TaskModel::all();
// exit();
      return view('index', [
          'AllTaskInfo' => $AllTaskInfo]);

      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      exit();
        echo "string";
        // return view('addTask');
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
    ]);
    $TaskModel = new TaskModel([
      'Task_title' => $request->get('Task_title'),
      'Task_descriptionTask_description'=> $request->get('Task_description'),
    ]);
    $TaskModel->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $share = TaskModel::find($id);
       $share->delete();

        return redirect('/')->with('success', 'Stock has been deleted Successfully');
    }

    public function loggedInPage(){
      $AllTaskInfo = TaskModel::all();
      // exit();
      return view('index', [
          'AllTaskInfo' => $AllTaskInfo]);
    }
}
