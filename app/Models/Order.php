<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $guarded = ['id'];
    protected $dates = ['arrivals', 'departure'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
    public function room()
    {
      return $this->belongsTo(Room::class);
    }

    public function guest()
    {
      return $this->belongsTo(Guest::class);
    }

    public function expenses()
    {
      return $this->hasOne(OtherExpense::class);
    }
}
