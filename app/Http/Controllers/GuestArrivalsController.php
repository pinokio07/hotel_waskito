<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class GuestArrivalsController extends Controller
{
    public function index()
    {
      $orders = Order::with('guest', 'room.roomtype')
                     ->where('status', 'arrivals')
                     ->whereDate('arrivals', '=', today())
                     ->get();

      return view('pages.reception.arrivals.index', compact('orders'));
    }
}
