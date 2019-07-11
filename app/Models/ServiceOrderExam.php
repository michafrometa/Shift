<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrderExam extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_service_order_exams';

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }

    public function service_order()
    {
        return $this->belongsTo('App\Models\ServiceOrder');
    }
}
