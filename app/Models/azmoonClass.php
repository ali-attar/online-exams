<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class azmoonClass extends Model
{
    use HasFactory;
    public function azmoon()
    {
        return $this->belongsTo(azmoon::class, 'azmoon_id', 'id');
    }
    public function classp()
    {
        return $this->belongsTo(classp::class, 'class_id', 'id');
    }
}
