<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  protected $table = 'blogs';

  protected $fillable = ['title', 'body' , 'user_id'];

  /**
   * blog belongs to user
   * @return mix
   */
  public function user() 
  {
    return $this->belongsTo('App\Models\User');
  }

}
