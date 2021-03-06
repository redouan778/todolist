<?php
namespace App\Http\Controllers;
use App\User;
use App\TaskModel;
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
    public function index(Request $request){
      $AllTaskInfo = TaskModel::all();
      return view('tasks.index', [
          'AllTaskInfo' => $AllTaskInfo]);
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('tasks.create');   // views/task/create.blade.php
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
      'Task_description'=> $request->get('Task_description'),
      // 'User_id' => $User_id,
       'User_id' => Auth::id(),
    ]);
    $TaskModel->save();
return redirect('/')->with('message', 'Task  ' . ' ' . $request->Task_title . ' ' . 'is succesfully created.');
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
    public function edit($id)
    {
      $task = TaskModel::find($id);
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
        $TaskModel = TaskModel::find($id);
       $TaskModel->Task_title = $request->Task_title;
       $TaskModel->Task_description = $request->Task_description;
       $TaskModel->save();
       return redirect('/');
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
