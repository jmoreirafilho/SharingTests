<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationState extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'location_states';

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    public function cities(){
    	return $this->hasMany('App\Models\LocationCity');
    }

    public function materials(){
    	return $this->hasMany('App\Models\Material');
    }

    public function country(){
    	return $this->belongsTo('App\Models\LocationCountry');
    }
}
