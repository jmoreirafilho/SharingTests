<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SelectableTrait;

class College extends Model
{
    use SelectableTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'colleges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'initials', 'location_city_id', 'course_id'];

    public function location_city(){
        return $this->belongsTo('App\Models\LocationCity', 'location_city_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
}
