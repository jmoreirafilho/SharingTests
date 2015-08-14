<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationCountry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'location_countries';

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    public function states(){
    	return $this->hasMany('App\Models\LocationState');
    }
}
