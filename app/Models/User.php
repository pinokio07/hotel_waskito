<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    protected $fillable = [
        'nama',
        'nis',
        'jenis_kelamin',
        'kelas',
        'role',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function getAvatar()
    {
      return (!$this->avatar) ? asset('/img/default-avatar.jpg') : asset('/img/users/'.$this->avatar);
    }

    public function order()
    {
      return $this->hasMany(Order::class);
    }
    
}
