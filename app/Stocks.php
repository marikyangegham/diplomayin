<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['id', 'stock_name', 'user_id', 'created_at', 'updated_at'];
}
