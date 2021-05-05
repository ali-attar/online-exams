<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\permisionUser;
use App\Models\permision;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone_number',
        'code_melli',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function permisionUser()
    {
        return $this->hasMany(permisionUser::class, 'user_id', 'id');
    }
    public function classUsers()
    {
        return $this->hasMany(classUsers::class, 'student_id', 'id');
    }
    public function answer()
    {
        return $this->hasMany(answer::class, 'user_id', 'id');
    }
    public function classp()
    {
        return $this->hasMany(classp::class, 'admin_id', 'id');
    }
    public function azmoon()
    {
        return $this->hasMany(azmoon::class, 'admin_id', 'id');
    }
    public function permision()
    {
        $permisions=array();
        $peruser=permisionUser::where('user_id',$this->id)->get();
        foreach($peruser as $per){
            $p=permision::find($per->permision_id);
            array_push($permisions,$p->role_english);
        };
        return $permisions;
    }
}
