<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Str;

class AuthController extends Controller
{
    public function index()
    {
      if(Auth::check()){
        return redirect('/dashboard');
      }
      return view('login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('nis', 'password'))){
          return redirect()->intended('/dashboard');
        }

        return redirect('/')->with('gagal', 'NIS atau Password salah');
    }

    public function profile()
    {
      $user = auth()->user();
      $user->load('order');

      return view('profile', compact('user'));
    }

    public function postprofile(Request $request)
    {
      $user = auth()->user();
      $data = $request->validate([
                        'nama' => 'required',
                        'nis' => [
                          'required',
                          Rule::unique('users')->ignore($user->id),
                        ]
                      ]);
      if($data){
        $user->update($request->except(['password', 'avatar']));

        if($request->password != ''){
          $user->password = bcrypt($request->password);
          $user->save();
        }

        if($request->hasFile('avatar')){
          $filelama = public_path().'/img/users/'.$user->avatar;
          if(!is_dir($filelama) && file_exists($filelama)){
            unlink($filelama);
          }

          $ext = $request->file('avatar')->getClientOriginalExtension();
          $nama = Str::slug($request->nama).'-'.round(microtime(true)).'.'.$ext;
          $request->file('avatar')->move('img/users/', $nama);
          $user->avatar = $nama;
          $user->save();
        }

        return redirect('/profile')->with('sukses', 'Edit Profile Success.');

      }
      

    }

    public function logout()
    {
      Auth::logout();

      return redirect('/');
    }
}
