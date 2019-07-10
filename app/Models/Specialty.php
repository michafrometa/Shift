<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_specialties';

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
}
