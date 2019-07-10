<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_cities';

    public function post_collection()
    {
        return $this->belongsTo('App\Models\PostCollection');
    }

    public function neighborhood()
    {
        return $this->hasOne('App\Models\Neighborhood');
    }
}
