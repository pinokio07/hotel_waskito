<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherExpense extends Model
{
    use HasFactory;

    protected $table = 'other_expenses';
    protected $guarded = ['id'];

    public function order()
    {
      return $this->belongsTo(Order::class);
    }
}
