<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permision extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_english',
        'role_persian',
        'id',
        
    ];

    public function permisionUser()
    {
        return $this->hasMany(permisionUser::class, 'permision_id', 'id');
    }
}
