<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SelectableTrait;

class Upload extends Model
{
    use SelectableTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'uploads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['link_url', 'subject_id', 'description'];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    public function subject(){
    	return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
}
