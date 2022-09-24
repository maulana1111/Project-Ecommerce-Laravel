<?php

namespace App\model;
use App\model\memberArea;
use Illuminate\Database\Eloquent\Model;
use Member_Area;

class historyOrder extends Model
{
    protected $table = 'history_order';
    public $timestamps = false;

    public function member()
    {
        return $this->belongsTo(memberArea::class);
    }

}
