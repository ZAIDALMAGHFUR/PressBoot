<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlasticTypePrice extends Model
{
    use HasFactory;

    protected $guarded = [
        'price',
    ];
}
