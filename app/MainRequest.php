<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainRequest extends Model
{
    protected $table = 'main_requests';
    protected $fillable = ['id', 'goods_id', 'quantity', 'created_at', 'updated_at'];

    public function good()
    {
        return $this->belongsTo('App\GoodsTypes', 'goods_id', 'id');
    }

}
