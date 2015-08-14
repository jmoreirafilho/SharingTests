<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationCity extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'location_cities';

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    public function state(){
    	return $this->belongsTo('App\Models\LocationState', 'location_state_id');
    }

    public function materials(){
    	return $this->hasMany('App\Models\Material');
    }
}
