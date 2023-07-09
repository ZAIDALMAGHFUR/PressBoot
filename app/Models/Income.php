<?php

namespace App\Models;

use App\Models\User;
use App\Models\PlasticType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function plastictype()
    {
        return $this->belongsTo(PlasticType::class, 'plastic_types_id', 'id');
    }
}
