<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Authorities extends Model
{
    use HasFactory;
    public function comments()
    {
        return $this->hasMany(User::class,'id_authorities');
    }
}
