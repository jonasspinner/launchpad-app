<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class TrackerClient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'secret_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['secret_token'];

    public function batches()
    {
        return $this->hasMany('App\ActivityBatch', 'client_id', 'id');
    }
}
