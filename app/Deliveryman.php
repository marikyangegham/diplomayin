<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveryman extends Model
{
    protected $table = 'deliveryman';
    protected $fillable = ['id', 'deliveryman_name', 'created_at', 'updated_at'];
}
