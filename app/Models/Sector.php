<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_sectors';

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam');
    }
}
