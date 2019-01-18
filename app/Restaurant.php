<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    use Notifiable;


    protected $guard = 'restaurant';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'email', 'profile', 'banner', 'openstatus',
      'openingtime', 'closingtime', 'deliverytime', 'paymentmethod',
      'phone1', 'phone2', 'address', 'country', 'status',
      'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }

    public function chef()
    {
        return $this->hasMany('App\Chef');
    }

    public function competitions()
    {
        return $this->belongsToMany('App\Competition')->withPivot('vote', 'userid')->withTimeStamps();
    }

    public function reservation()
    {
        return $this->hasMany('App\Reservation');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    public function ads()
    {
        return $this->hasMany('App\Ad');
    }
}
