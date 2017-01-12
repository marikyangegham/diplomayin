<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['id', 'category_name', 'created_at', 'updated_at'];

    protected $hidden = [
        'remember_token'
    ];

    public function goods()
    {
        return $this->hasMany('App\GoodsTypes', 'category_id', 'id');

    }
}
