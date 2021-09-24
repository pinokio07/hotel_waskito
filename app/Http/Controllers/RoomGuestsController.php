<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class RoomGuestsController extends Controller
{
    public function index()
    {
        $firstOfMonth = now()->firstOfMonth()->format('Y-m-d');
        $lastOfMonth = now()->lastOfMonth()->format('Y-m-d');

        $orders = Order::with('guest.country', 'room')
                     ->where('status', '<>', 'check-out')
                     ->whereBetween('departure', [$firstOfMonth, $lastOfMonth])
                     ->get();

         return view('pages.reception.guests.index', compact('orders'));
    }
}
