<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classp extends Model
{
    use HasFactory;
    public function azmoonClass()
    {
        return $this->hasMany(azmoonClass::class, 'class_id', 'id');
    }
    public function classUsers()
    {
        return $this->hasMany(classUsers::class, 'class_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
}
