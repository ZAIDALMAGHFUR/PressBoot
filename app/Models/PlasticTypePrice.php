<?php

namespace App\Models;

use App\Models\Location;
use App\Models\PlasticType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlasticTypePrice extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function plasticType()
    {
        return $this->belongsTo(PlasticType::class, 'plastic_type_id');
    }

    public function Location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
