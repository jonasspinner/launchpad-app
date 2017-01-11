<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ActivityBatch extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start', 'end']

    public function client()
    {
      return $this->belongsTo('App\TrackerClient', 'client_id', 'id');
    }

    public function activities()
    {
      return $this->hasMany('App\DeviceActivity', 'batch_id', 'id');
    }
}
