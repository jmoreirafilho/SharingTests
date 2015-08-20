<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SelectableTrait;

class Subject extends Model
{
    use SelectableTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    public function uploads(){
        return $this->hasMany('App\Models\Upload');
    }

    public function tag() {
        return $this->belongsTo('App\Models\Tag');
    }
}
