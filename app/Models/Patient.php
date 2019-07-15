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
        return $this->hasOne('App\Models\ServiceOrder');
    }

    public function neighborhood()
    {
        return $this->belongsTo('App\Models\Neighborhood');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }

    public function getBy($search)
    {
        return self::select('id', 'name')->where("name", 'like', '%'. $search. '%')->get();
    }
}
