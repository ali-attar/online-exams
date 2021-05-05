<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    public function azmoon()
    {
        return $this->belongsTo(azmoon::class, 'azmoon_id', 'id');
    }
    public function answerQuestion()
    {
        return $this->hasMany(answerQuestion::class, 'question_id', 'id');
    }
    public function option()
    {
        return $this->hasMany(option::class, 'question_id', 'id');
    }
    public function answer()
    {
        return $this->belongsTo(answerQuestion::class, 'answer', 'id');
    }
    public function categoryAzmoon()
    {
        return $this->belongsTo(categoryAzmoon::class, 'category_azmoon_id', 'id');
    }
}
