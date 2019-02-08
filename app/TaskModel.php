<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
  protected $fillable = ['Task_title', 'Task_description', 'User_id'];


  protected $table = 'tasks';


  protected $primaryKey = 'Task_id';



  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
