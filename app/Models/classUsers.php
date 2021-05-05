<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classUsers extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
    public function classp()
    {
        return $this->belongsTo(classp::class, 'class_id', 'id');
    }
}