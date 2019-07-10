<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_service_orders';

    public function service_order_exam()
    {
        return $this->belongsTo('App\Models\ServiceOrderExam');
    }

    public function agreement()
    {
        return $this->hasOne('App\Models\Agreement');
    }

    public function patient()
    {
        return $this->hasOne('App\Models\Patient');
    }

    public function doctor()
    {
        return $this->hasOne('App\Models\Doctor');
    }

    public function post_collection()
    {
        return $this->hasOne('App\Models\PostCollection');
    }
}
