<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
  protected $fillable = ['Task_title', 'Task_description', 'user_id'];


  protected $table = 'tasks';


  protected $primaryKey = 'Task_id';

}
