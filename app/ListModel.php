<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{


  protected $fillable = ['List_title',  'User_id', 'List_id'];


  protected $table = 'list';


  protected $primaryKey = 'list_id';


  public function user()
  {
    $this->belongsTo('App\User');
  }
}
