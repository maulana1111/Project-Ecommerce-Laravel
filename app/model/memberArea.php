<?php

namespace App\model;
use App\model\historyOrder;
use Illuminate\Database\Eloquent\Model;

class memberArea extends Model
{
    protected $table = 'member';
    public $timestamps = false;

    public function historyOrder()
    {
        return $this->hasMany(historyOrder::class, 'member_id');
    }

}
