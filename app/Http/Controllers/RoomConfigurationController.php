<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomConfigurationController extends Controller
{
    public function index()
    {
      $rooms = \App\Models\Room::all()->groupBy('floor');
      
      return view('pages.room.configuration.index', compact('rooms'));
    }
}
