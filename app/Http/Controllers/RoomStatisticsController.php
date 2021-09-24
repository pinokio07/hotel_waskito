<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomStatisticsController extends Controller
{
    public function index()
    {
      $types =  \App\Models\RoomType::with('room')->get();
      $background = \background();
      $types->map(function($t){
        $jmlKamar = $t->room->count();
        $terisi = $t->room->where('fo_status', 'occupied')->count();
        $t->persen = round((100 / $jmlKamar) * $terisi);

        return $t;
      });
                                
      return view('pages.room.statistics.index', compact(['types', 'background']));
    }
}
