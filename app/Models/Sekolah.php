<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';
    protected $guarded = ['id'];

    public function getLogoSekolah()
    {
      return (!$this->logo_sekolah) 
              ? asset ('/img/default-logo-sekolah.png') 
              : asset ('/img/'.$this->logo_sekolah);
    }

    public function getLogoHotel()
    {
      return (!$this->logo_hotel)
              ? asset ('/img/default-logo-hotel.png') 
              : asset ('/img/'.$this->logo_hotel);
    }
}
