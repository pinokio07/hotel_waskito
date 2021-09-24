<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;

class SettingController extends Controller
{    
    public function index()
    {
        $sekolah = \App\Models\Sekolah::first();

        return view('setting', compact('sekolah'));
    }
    
    public function update(Request $request)
    {
        $sekolah = \App\Models\Sekolah::first();

        $data = $request->validate([
          'alamat' => 'required',
          'kota' => 'required',
          'provinsi' => 'required',
          'telp' => 'required',
          'email' => 'required',
          'website' => 'required',
        ]);

        if($data){
          $sekolah->update($data);

          if($request->hasFile('logo_sekolah')){
            $filelama = public_path().'/img/'.$sekolah->logo_sekolah;
            if(!is_dir($filelama) && file_exists($filelama)){
              unlink($filelama);
            }

            $ext = $request->file('logo_sekolah')->getClientOriginalExtension();
            $nama = 'logo-sekolah-'.round(microtime(true)).'.'.$ext;
            $request->file('logo_sekolah')->move('img/', $nama);
            $sekolah->logo_sekolah = $nama;
            $sekolah->save();
          }

          if($request->hasFile('logo_hotel')){
            $filelama = public_path().'/img/'.$sekolah->logo_hotel;
            if(!is_dir($filelama) && file_exists($filelama)){
              unlink($filelama);
            }

            $ext = $request->file('logo_hotel')->getClientOriginalExtension();
            $nama = 'logo-hotel-'.round(microtime(true)).'.'.$ext;
            $request->file('logo_hotel')->move('img/', $nama);
            $sekolah->logo_hotel = $nama;
            $sekolah->save();
          }

          return redirect('/setting')->with('sukses', 'Update School data Success');
        }
    }

}
