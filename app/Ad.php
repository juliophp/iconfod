<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image', 'section', 'text', 'restaurant_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }


}
