<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answerQuestion extends Model
{
    use HasFactory;
    public function answer()
    {
        return $this->belongsTo(answer::class, 'amswer_id', 'id');
    }
    public function question()
    {
        return $this->belongsTo(question::class, 'question_id', 'id');
    }
    public function option()
    {
        return $this->belongsTo(option::class, 'option_id', 'id');
    }
}
