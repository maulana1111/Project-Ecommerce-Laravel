<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function getProductByCategory()
    {
        return $this->hasMany('Product');
    }

}
