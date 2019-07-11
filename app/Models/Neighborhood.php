<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_neighborhoods';

    public function post_collection()
    {
        return $this->hasOne('App\Models\PostCollection');
    }

    public function patient()
    {
        return $this->hasOne('App\Models\Patient');
    }

    public function city()
    {
        return $this->hasOne('App\Models\City');
    }
}
