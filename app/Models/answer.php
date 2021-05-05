<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    public function azmoon()
    {
        return $this->belongsTo(azmoon::class, 'azmoon_id', 'id');       
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function answerQuestion()
    {
        return $this->hasMany(answerQuestion::class, 'answer_id', 'id');   
    }
}
