<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'competitionname', 'competitiondescription'
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
        return $this->belongsToMany('App\Restaurant')->withPivot('vote', 'userid')->withTimeStamps();
    }


}
