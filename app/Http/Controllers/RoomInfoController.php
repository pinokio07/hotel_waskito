<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomInfoController extends Controller
{
    public function index(Request $request)
    {
      $ruangan = '';
      $rooms = Room::with('roomtype')
                    // ->where('fo_status', 'vacant')
                    ->get();                   
      $background = \background();
      
      if($request->has('rtype')){
        $ruangan = $rooms->where('room_type_id', $request->rtype);
      }
      $rooms = $rooms->groupBy('room_type_id');
      return view('pages.reservation.info.index', compact(['rooms', 'background', 'ruangan']));
    }
}
