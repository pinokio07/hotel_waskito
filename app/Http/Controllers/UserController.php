<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Excel;
use Str;

class UserController extends Controller
{
    public function index()
    {
        //Get all Users
        $users = User::all();
        //Return view for Users
        return view('pages.teacher.users', compact('users'));
    }

    public function create(Request $request)
    {
      //Add New Empty User Model
      $user = new User;
      //Info from URL
      $from = 'create';
      //Return view to Profile page
      return view('profile', compact(['user', 'from']));
    }

    public function store(Request $request)
    {
      //Validated data User
      $data = $request->validate([
              'nama' => 'required',
              'nis' => 'required|unique:users,nis'
            ]);
      //If Data is Validated
      if($data){
        //Create New user
        $user = User::create($request->except(['password', 'avatar']));
        //Set Password for New User
        $user->password = bcrypt('rahasia');
        //Save Passord for New User
        $user->save();        

        //If has Image for User
        if($request->hasFile('avatar')){
          //Get User Old file
          $filelama = public_path().'/img/users/'.$user->avatar;
          //Check if Old File Exists
          if(!is_dir($filelama) && file_exists($filelama)){
            //Remove Old File
            unlink($filelama);
          }

          //Get Extension from File
          $ext = $request->file('avatar')->getClientOriginalExtension();
          //Set Name for file
          $nama = Str::slug($request->nama).'-'.round(microtime(true)).'.'.$ext;
          //Move file to users folder
          $request->file('avatar')->move('img/users/', $nama);
          //Assign User avatar to DB
          $user->avatar = $nama;
          //Save DB
          $user->save();
        }
        //Return redirect to Users
        return redirect('/users')->with('sukses', 'Create User Success.');

      }
    }

    public function edit(User $user)
    {
      //Load Relation Order
      $user->load('order');
      //Set From URL
      $from = "edit";
      //Return view profile page
      return view('profile', compact(['user', 'from']));
    }

    public function update(User $user, Request $request)
    {
      // dd($request->all());
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

        return redirect('/users')->with('sukses', 'Edit User Success.');

      }
    }

    public function destroy(User $user)
    {
      $user->delete();

      return redirect('/users')->with('sukses', 'Delete user Success.');
    }

    public function reset(User $user)
    {
      $user->password = bcrypt('rahasia');

      return redirect('/users')->with('sukses', 'Reset password success');
    }

    public function export(Request $request)
    {
      return Excel::download(new UserExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
        $data = $request->validate([
          'file_import' => 'required'
        ]);

        Excel::import(new UserImport, $request->file('file_import'));

        return redirect('/users')->with('sukses', 'Berhasil upload data pengguna');
    }
}
