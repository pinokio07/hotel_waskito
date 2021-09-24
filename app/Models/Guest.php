<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guests';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_lahir'];

    public function namaLengkap()
    {
      $nama = $this->title.'. ';
      if($this->nama_depan != ''){
        $nama .= $this->nama_depan;
      }
      if($this->nama_belakang != ''){
        $nama .= ' '.$this->nama_belakang;
      }

      return $nama;
    }

    public function country()
    {
      return $this->belongsTo(Country::class);
    }

    public function order()
    {
      return $this->hasMany(Order::class);
    }
    
}
