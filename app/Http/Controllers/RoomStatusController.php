<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    public function index(Request $request)
    {
      $data = \App\Models\Room::query();
      $roomType = \App\Models\RoomType::all();

      if($request->has('room_status')){
        $data->whereIn('room_status', $request->room_status);        
      }
      if($request->has('fo_status')){
        $data->whereIn('fo_status', $request->fo_status);
      }
      if($request->has('res_status')){
        $data->whereIn('res_status', $request->res_status);
      }
      if($request->room_type_id != ''){
        $data->where('room_type_id', $request->room_type_id);
      }      

      $rooms = $data->with('roomtype')->get();

      return view('pages.room.status.index', compact(['rooms', 'roomType']));
    }

    public function update(Request $request)
    {
        $room = \App\Models\Room::findOrFail($request->id);

        $room->update(['room_status' => $request->val]);

        return "OK";
    }
}
