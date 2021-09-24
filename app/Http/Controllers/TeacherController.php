<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    public function index()
    {
      $users = User::with('order')->where('role', 'siswa')->get();

      $users->map(function($u){
        $u->reservation = $u->order->whereNotNull('by_name')
                                   ->where('status', '<>', 'canceled')
                                   ->count();
        $u->registration = $u->order->where('status', 'check-out')
                                    ->count();
        $u->canceled = $u->order->where('status', 'canceled')
                                ->count();
        $u->revenue = $u->order->sum('revenue');
      });

      return view('pages.teacher.index', compact('users'));
    }

    public function detail(Request $request)
    {
      $user = User::findOrFail($request->id);
      $user->load('order', 'order.room', 'order.guest');

      $result = '';

      foreach($user->order as $order){
        $result .= "<tr>
                      <td>".$order->room->no."</td>
                      <td>".$order->guest->namaLengkap()."</td>
                      <td>".$order->arrivals->format('d-m-Y')."</td>
                      <td>".$order->departure->format('d-m-Y')."</td>
                      <td>".$order->status."</td>
                      <td>".$order->revenue."</td>
                    </tr>";
      }

      echo $result;
    }
}
