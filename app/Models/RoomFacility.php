<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    use HasFactory;

    protected $table = 'room_facilities';
    protected $guarded = ['id'];

    public function roomtype()
    {
      return $this->belongsTo(RoomType::class, 'room_type_id');
    }
}
