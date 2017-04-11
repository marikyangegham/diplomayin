<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    protected $table = 'input';
    protected $fillable = ['id', 'goods_id', 'user_id', 'quantity', 'deliveryman_id', 'created_at', 'updated_at'];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function good()
    {
        return $this->belongsTo('App\GoodsTypes', 'goods_id', 'id');
    }
    public function deliveryman()
    {
        return $this->belongsTo('App\Deliveryman', 'deliveryman_id', 'id');
    }
}
