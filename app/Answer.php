<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question()
   {
       return $this->belongsTo('App\Question');
   }
   public function votes()
   {
     return $this->hasMany('App\Vote');
   }
   public function user()
   {
     return $this->belongsTo('App\User');
   }
   public function comments()
   {
     return $this->hasMany('App\Comment');
   }
}
