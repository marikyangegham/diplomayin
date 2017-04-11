<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Output extends Model
{
    protected $table = 'output';
    protected $fillable = ['id', 'goods_id', 'user_id', 'quantity', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function good()
    {
        return $this->belongsTo('App\GoodsTypes', 'goods_id', 'id');
    }
}
