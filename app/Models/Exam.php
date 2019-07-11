<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_exams';

    public function examprice()
    {
        return $this->hasOne('App\Models\ExamPrice');
    }

    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }

    public function service_order_exam()
    {
        return $this->hasOne('App\Models\ServiceOrderExam');
    }
}
