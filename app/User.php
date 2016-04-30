<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
     protected $hidden = array('password');
   public function questions()
   {
     return $this->hasMany('App\Question');
   }
   public function answers()
   {
      return $this->hasMany('App\Answer');
   }
   public function profile()
   {
      return $this->hasOne('App\Profile');
   }
   public function votes()
   {
      return $this->hasMany('App\Vote');
   }
   public function comments()
   {
      return $this->hasMany('App\Comment');
   }
}
