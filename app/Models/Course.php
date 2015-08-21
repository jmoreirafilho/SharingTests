<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SelectableTrait;

class Course extends Model
{
    use SelectableTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'subject_id'];

    public function subjects(){
        return $this->hasMany('App\Models\Subject');
    }

    public function college(){
        return $this->belongsTo('App\Models\College');
    }
}
