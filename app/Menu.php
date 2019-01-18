<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'menuname', 'image', 'description', 'ingredients'
    ];


    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('restaurantid','quantity', 'price', 'status')->withTimeStamps();
    }

}
