<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Chef extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'chefname', 'chefavi', 'description'
    ];


    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }


}
