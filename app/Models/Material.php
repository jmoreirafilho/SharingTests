<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['link_url', 'description', 'datetime', 'professor_id', 'college_id', 'course_id', 'location_city_id', 'location_state_id'];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    public function teacher(){
    	return $this->belongsTo('App\Models\Teacher', 'teacher_id');
    }

    public function college(){
    	return $this->belongsTo('App\Models\College', 'college_id');
    }

    public function course(){
    	return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function city(){
    	return $this->belongsTo('App\Models\LocationCity', 'location_city_id');
    }
}
