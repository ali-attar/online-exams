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
    public function categoryAzmoon()
    {
        return $this->hasMany(categoryAzmoon::class, 'azmoon_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'admin_id', 'id');
    }
    public function admin_name()
    {
        return user::find($this->admin_id)->name;
    }
}
