<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';
    protected $guarded = ['id'];

    public function room()
    {
      return $this->hasMany(Room::class);
    }

    public function facilities()
    {
      return $this->hasMany(RoomFacility::class);
    }

    public function rates()
    {
      return $this->hasOne(RoomRate::class);
    }
}
