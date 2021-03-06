<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public function author()
    {
      return $this->belongsTo('App\Author');
    }

    public function users()
    {
	     return $this->belongsToMany('App\User');
    }

    public function reviews()
    {
      return $this->hasMany('App\Review');
    }

    public function user_reads()
    {
      return $this->hasMany('App\UserRead');
    }
}
