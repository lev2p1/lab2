<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['from', 'to', 'price', 'seats', 'type', 'date', 'transport_id'];

    protected $table = 'routes';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
