<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mac_address', 'hash'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['mac_address', 'hash'];

    public function activites()
    {
        return $this->hasMany('App\DeviceActivity', 'device_id', 'id');
    }
}
