<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    use HasFactory;
    public function questionAnswer()
    {
        return $this->hasOne(question::class, 'answer', 'id');
    }
    public function answerQuestion()
    {
        return $this->hasOne(answerQuestion::class, 'option_id', 'id');
    }
    public function question()
    {
        return $this->belongsTo(question::class, 'question_id', 'id');
    }
}
