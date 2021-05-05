<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class azmoon extends Model
{
    use HasFactory;
    public function azmoonClass()
    {
        return $this->hasMany(azmoonClass::class, 'azmoon_id', 'id');
    }
    public function question()
    {
        return $this->hasMany(question::class, 'azmoon_id', 'id');
    }
    public function answer()
    {
        return $this->hasMany(answer::class, 'azmoon_id', 'id');
    }
}
