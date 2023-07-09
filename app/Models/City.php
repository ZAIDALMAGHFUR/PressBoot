<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $table = "citys";

    protected $fillable = [
        'city',
        'location_id',
    ];


    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
