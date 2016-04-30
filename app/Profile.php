<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
      'first_name', 'last_name', 'user_id','about','bio','year','degree'
  ];
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
