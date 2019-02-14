<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

  protected $table = 'tasks';

  protected $fillable = ['Task_title', 'Task_description', 'List_title', 'Duration', 'Status','List_id' ,'User_id'];

  protected $primaryKey = 'Task_id';



  public function user()
  {
    return $this->belongsTo('App\User', 'User_id');

  }

  public function list2()
  {
    return $this->belongsTo('App\List2', 'List_id', 'list_id');
  }
}
