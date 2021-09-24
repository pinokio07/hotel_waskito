<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class GuestDeparturesController extends Controller
{
    public function index()
    {
      $orders = Order::with('guest', 'room.roomtype')
                     ->where('status', 'arrived')
                     ->whereDate('departure', '=', today())
                     ->get();

      return view('pages.reception.departure.index', compact('orders'));
    }

    public function update(Request $request)
    {
      $order = Order::findOrFail($request->order_id);
      $order->departure = $request->departure;
      $order->save();

      return redirect('/reception/departure')->with('sukses', 'Extend Departure date Success.');
    }
}
