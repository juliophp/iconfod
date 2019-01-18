<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [];


    public function menus(){
      return $this->belongsToMany('App\Menu')->withPivot('restaurantid','quantity', 'price', 'status')->withTimeStamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
