<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $guarded = ['id'];

    public function roomtype()
    {
      return $this->belongsTo(RoomType::class, 'room_type_id');
    }
    
    public function order()
    {
      return $this->hasMany(Order::class);
    }
}
