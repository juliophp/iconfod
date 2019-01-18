<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Review extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'comment', 'star', 'restaurant_id', 'user_id'
    ];


    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
