<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class GuestDeparturesController extends Controller
{
    public function index(Request $request)
    {
      $query = Order::with('guest', 'room.roomtype')
                     ->where('status', 'arrived');
                     
      if($request->has('dates')){
        $dates = explode(' - ', $request->dates);
        $start = Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d');
        $end = Carbon::createFromFormat('d/m/Y', $dates[1])->format('Y-m-d');
        
        $query->whereBetween('departure', [$start, $end]);
        
      } else {
        $query->whereDate('departure', '=', today());
      }
      
      $orders = $query->get();

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
