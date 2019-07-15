<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_agreements';

    public function examprice()
    {
        return $this->hasOne('App\Models\ExamPrice');
    }

    public function service_order()
    {
        return $this->hasOne('App\Models\ServiceOrder');
    }

    public function getBy($search)
    {
        return self::select('id', 'name')->where("name", 'like', '%'. $search. '%')->get();
    }
}
