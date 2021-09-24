<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class CheckoutController extends Controller
{
    public function index()
    {
        $orders = Order::with('guest.country', 'room.roomtype', 'user', 'expenses')
                       ->where('status', 'arrived')
                       ->get();
        return view('pages.reception.checkout.index', compact('orders'));
    }

    public function expenses(Order $order)
    {
      $disabled = 'false';
      if($order->status == 'check-out'){
        $disabled = 'disabled';
      }
      $order->load('guest.country', 'room.roomtype', 'user', 'expenses');

      return view('pages.reception.checkout.expenses', compact(['order', 'disabled']));
    }

    public function checkout(Request $request)
    {
      $order = Order::findOrFail($request->order_id);
      
      $price = $order->price;
      
      $extraBed = $request->expense['extra_bed'];
      $laundry = $request->expense['laundry'];
      $fnb = $request->expense['fnb'];
      $etc = $request->expense['etc'];

      $order->expenses()->updateOrCreate($request->expense);

      $revenue = $order->price + $extraBed + $laundry + $fnb + $etc;

      $order->revenue = $revenue;
      $order->status = 'check-out';
      $order->save();

      $order->room()->update([
        'room_status' => 'dirty',
        'fo_status' => 'vacant',
        'res_status' => 'not reserved'
      ]);

      return redirect('/reception/checkout/'.$order->id)->with('sukses', 'Checking Out Guest Success');

      // return redirect('/reception/checkout')->with('sukses', 'Checking Out Guest Success');
    }

    public function billing(Order $order)
    {
      $sisa = $order->deposit;
      $rate = $order->price / $order->nights;
      $pdf = PDF::loadView('exports.billing', compact(['order', 'sisa', 'rate']))->setPaper('a4', 'portrait');
      return $pdf->stream('billing.pdf');
    }
}
