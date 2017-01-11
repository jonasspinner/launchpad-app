<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class DeviceActivity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['batch_id', 'device_id'];

    public function batch()
    {
        return $this->belongsTo('App\ActivityBatch', 'batch_id', 'id');
    }

    public function device()
    {
        return $this->belongsTo('App\Device', 'device_id', 'id');
    }
}
