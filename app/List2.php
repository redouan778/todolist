<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List2 extends Model
{

  protected $table = 'list';

  protected $fillable = ['List_title',  'User_id', 'List_id'];

  protected $primaryKey = 'list_id';


  public function user()
  {
    $this->belongsTo('App\User');
  }


  public function tasks()
  {
    $this->hasMany('App\Task');
  }
}
