<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamPrice extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_exam_prices';


    public function exam()
{
    return $this->belongsTo('App\Models\Exam');
}
    public function agreement()
    {
        return $this->belongsTo('App\Models\Agreement');
    }
}
