<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class GoodsTypes extends Model
{
    protected $table = 'goods_types';
    protected $fillable = ['id', 'category_id', 'name', 'price', 'measurement', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');

    }
}
