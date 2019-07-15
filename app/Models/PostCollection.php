<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCollection extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'shift_post_collections';

    public function service_order()
    {
        return $this->hasOne('App\Models\ServiceOrder');
    }

    public function neighborhood()
    {
        return $this->belongsTo('App\Models\Neighborhood');
    }

    public function getBy($search)
    {
        return self::select('id', 'description')->where("description", 'like', '%'. $search. '%')->get();
    }


}
