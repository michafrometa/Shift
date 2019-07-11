<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_doctors';

    public function service_order()
    {
        return $this->hasOne('App\Models\ServiceOrder');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\Specialty');
    }
}
