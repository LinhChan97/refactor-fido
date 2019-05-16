<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'name', 'code',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
