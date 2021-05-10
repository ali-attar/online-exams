<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryAzmoon extends Model
{
    use HasFactory;
    public function question()
    {
        return $this->hasMany(question::class, 'category_azmoon_id', 'id');
    }
    public function azmoon()
    {
        return $this->belongsTo(azmoon::class, 'azmoon_id', 'id');
    }
}
