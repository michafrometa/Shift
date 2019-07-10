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
        return $this->belongsTo('App\Models\ServiceOrder');
    }

    public function specialty()
    {
        return $this->hasOne('App\Models\Specialty');
    }
}
