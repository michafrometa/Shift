<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_patients';

    public function service_order()
    {
        return $this->belongsTo('App\Models\ServiceOrder');
    }

    public function neighborhood()
    {
        return $this->hasOne('App\Models\Neighborhood');
    }
}
