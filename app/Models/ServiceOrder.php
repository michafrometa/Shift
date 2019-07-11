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

    protected $fillable = ['agreement_id','post_collection_id','patient_id','doctor_id'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service_order_exam()
    {
        return $this->hasOne('App\Models\ServiceOrderExam');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agreement()
    {
        return $this->belongsTo('App\Models\Agreement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post_collection()
    {
        return $this->belongsTo('App\Models\PostCollection');
    }
}
