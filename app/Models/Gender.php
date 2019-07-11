<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_ngenders';

    public function patient()
    {
        return $this->hasMany('App\Models\Patient');
    }
}
