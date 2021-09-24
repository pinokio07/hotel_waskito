<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class RegistrationController extends Controller
{    
    public function index()
    {
        return "Halaman Registration";
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

        return view('pages.reception.registration.create', compact(['order', 'countries', 'cities', 'rooms', 'roomTypes', 'selectedRoom']));
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
          'guest.nama_depan' => 'required',
          'guest.telp' => 'required',
          'order.room_id' => 'required|numeric',
          'order.dates' => 'required',
          'order.price' => 'required|numeric',
          'order.deposit' => 'required|numeric',
          'order.payment_type' => 'required'
        ]);
        if($data){
          $dates = \explode(' - ', $request->order['dates']);

          $arrivals = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d');
          $departure = \Carbon\Carbon::createFromFormat('d/m/Y',$dates[1])->format('Y-m-d');

          $guest = \App\Models\Guest::create($request->guest);  

          $order = $guest->order()->create($request->order);
          $order->status = 'arrived';
          $order->user_id = auth()->user()->id;
          $order->arrivals = $arrivals;
          $order->departure = $departure;
          $order->save();
          $order->room()->update(['res_status' => 'arrived', 'fo_status' => 'Occupied']);

          return redirect('/reception/departure')->with('sukses', 'Registration Success');
        }
    }
    
    public function show($id)
    {
        
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
          'order.deposit' => 'required|numeric',
          'order.payment_type' => 'required'
        ]);
        if($data){
          $dates = \explode(' - ', $request->order['dates']);

          $arrivals = \Carbon\Carbon::createFromFormat('d/m/Y', $dates[0])->format('Y-m-d');
          $departure = \Carbon\Carbon::createFromFormat('d/m/Y',$dates[1])->format('Y-m-d');

          $guest = $order->guest()->update($request->guest);
          $order->update($request->order);
          $order->status = 'arrived';
          $order->arrivals = $arrivals;
          $order->departure = $departure;
          $order->save();
          $order->room()->update(['res_status' => 'arrived', 'fo_status' => 'Occupied']);

          return redirect('/reception/departure')->with('sukses', 'Registration Success');
        }
    }
    
    public function destroy($id)
    {
        //
    }

    public function downloadregistration(Order $order)
    {
      $pdf = PDF::loadView('exports.registration', compact('order'))->setPaper('a4', 'portrait');
      return $pdf->stream('registration.pdf');
    }

    public function downloadreceipt(Request $request)
    {
      $order = Order::findOrFail($request->receipt_id);
      $amount = $request->amount ?? '-';
      $pdf = PDF::loadView('exports.receipt', compact(['order','amount']))->setPaper('a4', 'portrait');
      return $pdf->stream('receipt.pdf');
    }

}
