<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
  protected $fillable = ['Task_title', 'Task_description', 'List_id' ,'User_id'];


  protected $table = 'tasks';


  protected $primaryKey = 'Task_id';



  public function user()
  {
    $this->belongsTo('App\User');

  }

  public function list()
  {
    $this->belongsTo('App\ListModel');
  }
}
