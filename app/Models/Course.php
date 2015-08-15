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
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;
}
