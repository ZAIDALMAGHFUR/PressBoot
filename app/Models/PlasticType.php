<?php

namespace App\Models;

use App\Models\PlasticTypePrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlasticType extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function plasticTypePrice()
    {
        return $this->belongsTo(PlasticTypePrice::class, 'plastic_types_id', 'id');
    }
}
