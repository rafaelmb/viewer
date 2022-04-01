<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    protected $dates = ['created_at', 'updated_at', 'last_update'];

    protected $casts = [
        'last_update' => 'date:d/m/y H:i:s'
    ];
}
