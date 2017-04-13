<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';
    protected $fillable = ['id', 'from_user_id', 'to_user_id', 'goods_id', 'quantity', 'time', 'viewed' , 'created_at', 'updated_at'];

    public function fromUser()
    {
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }
    public function ToUser()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }
    public function good(){
        return $this->belongsTo('App\GoodsTypes', 'goods_id', 'id');
    }
}
