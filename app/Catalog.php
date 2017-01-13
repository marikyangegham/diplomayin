<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalog';
    protected $fillable = ['id', 'goods_id', 'user_id','quantity', 'created_at', 'updated_at'];
}
