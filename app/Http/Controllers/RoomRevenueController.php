<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomRevenueController extends Controller
{
    public function index()
    {
      $start = now()->startOfMonth()->format('Y-m-d H:i:s');
      $end = now()->endOfMonth()->format('Y-m-d H:i:s');
      $days = today()->daysInMonth;

      $rooms = Room::with(['order' => function($o) use ($start, $end){
                      $o->where('status', 'check-out')
                        ->whereBetween('departure', [$start, $end]);
                    }], 'roomtype')
                    ->get();

      $rooms->map(function($r) use ($days){
        $r->revenue = $r->order->sum('revenue');
        $r->night = $r->order->sum('nights');
        $r->occupancy = round((100/$days)*$r->night);
      });
      $rooms = $rooms->groupBy('floor');

      return view('pages.reception.revenue.index', compact('rooms'));
    }
}
