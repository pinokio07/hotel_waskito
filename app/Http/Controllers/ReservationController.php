<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class ReservationController extends Controller
{    
    public function index()
    {
        $orders = Order::with('guest', 'room.roomtype')
                       ->whereIn('status', ['arrivals', 'canceled'])
                       ->orderBy('arrivals', 'desc')
                       ->get();

        return view('pages.reservation.records.index', compact('orders'));
    }
    
    public function create(Request $request)
    {
        $selectedRoom = '';
        $data = \App\Models\Room::where('room_status', 'inspected')
                                 ->where('fo_status', 'vacant')
                                 ->where('res_status', 'not reserved');
        if($request->has('order')){
          $order = Order::findOrFail($request->order);
          $order->load('room', 'guest');

          $data->orWhere('id', $order->room_id);
        } else {
          $order = new Order;
        }
        
        $rooms = $data->get();
        
        $roomTypes = \App\Models\RoomType::all();
        $countries = \App\Models\Country::all();
        $cities = \App\Models\City::all();

        if($request->has('room')){
          $selectedRoom = \App\Models\Room::findOrFail($request->room);
          $selectedRoom->load('roomtype.rates');
        }

        return view('pages.reservation.reservation.create', compact(['order', 'countries', 'cities', 'rooms', 'roomTypes', 'selectedRoom']));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
          'guest.nama_depan' => 'required',
          'guest.telp' => 'required',
          'order.room_id' => 'required|numeric',
          'order.dates' => 'required',
          'order.price' => 'required|numeric',
          'order.payment_type' => 'required'
        ]);
        if($data){
          $dates = \explode(' - ', $request->order['dates']);

          $arrivals = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d');
          $departure = \Carbon\Carbon::createFromFormat('d/m/Y',$dates[1])->format('Y-m-d');
          
          $guest = \App\Models\Guest::create($request->guest);          

          $order = $guest->order()->create($request->order);
          $order->user_id = auth()->user()->id;
          $order->arrivals = $arrivals;
          $order->departure = $departure;
          $order->save();
          
          $room = \App\Models\Room::findOrFail($request->order['room_id']);
          $room->update([
            'res_status' => 'arrivals'
          ]);          
          
          return redirect('/reservation/records')->with('sukses', 'Reservation Success');
        }
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
          'guest.nama_depan' => 'required',
          'guest.telp' => 'required',
          'order.room_id' => 'required|numeric',
          'order.dates' => 'required',
          'order.price' => 'required|numeric',
          'order.payment_type' => 'required'
        ]);
        if($data){
          $order->load('guest', 'room.roomtype', 'user');
          $dates = \explode(' - ', $request->order['dates']);

          $arrivals = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d');
          $departure = \Carbon\Carbon::createFromFormat('d/m/Y',$dates[1])->format('Y-m-d');

          $order->guest()->update($request->guest);
          $order->update($request->order);
          $order->arrivals = $arrivals;
          $order->departure = $departure;
          $order->save();

          return redirect('/reservation/records')->with('sukses', 'Edit Reservation Success');

        }
        
        // dd($order);
    }

    public function cancel(Request $request)
    {      
      $data = $request->validate([
        'cancel_reason' => 'required'
      ]);
      if($data){
        $order = Order::findOrFail($request->order_id);
        $order->cancel_reason = $request->cancel_reason;
        $order->status = 'canceled';
        $order->save();

        return redirect('/reservation/records')->with('sukses', 'Reservation canceled.');
      }
      
    }

    public function downloadconfirmation(Order $order)
    {
      $pdf = PDF::loadView('exports.confirmation', compact('order'))->setPaper('a4', 'portrait');
      return $pdf->download('confirmation_letter.pdf');
    }

    public function destroy($id)
    {
        //
    }
}
