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
    protected $fillable = ['name', 'mac_address', 'hash', 'owner_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['hash'];

    public function activites()
    {
        return $this->hasMany('App\DeviceActivity', 'device_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo('App\SlackUser', 'owner_id', 'id');
    }
}
