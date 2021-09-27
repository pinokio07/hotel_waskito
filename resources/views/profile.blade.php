@extends('layouts.master')
@section('title') User Profile @endsection
@section('page_name') User Profile @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profile {{$user->nama}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if (count($errors) > 0)
            <div class="row">
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              </div>
            </div>
          @endif 
          <div class="row">
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                     style="background: url('{{asset('template')}}/dist/img/photo1.png') center center;">
                  <h3 class="widget-user-username text-right">{{$user->nama}}</h3>
                  <h5 class="widget-user-desc text-right">{{$user->kelas}}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="{{$user->getAvatar()}}" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{{$user->order()->count()}}</h5>
                        <span class="description-text">GUEST</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Rp. {{number_format($user->order()->sum('revenue'), 0, ',','.')}}</h5>
                        <span class="description-text">REVENUE</span>
                      </div>
                      <!-- /.description-block -->
                    </div>                  
                  </div>
                  <!-- /.row -->
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <div class="col-md-5">
              @if(isset($from) && $from == 'edit')
              <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')                
              @elseif(isset($from) && $from == 'create')
              <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
              @else
              <form action="{{ route('post.profile') }}" method="POST" enctype="multipart/form-data">
              @endif
                @csrf
                <div class="form-group form-group-sm">
                  <label for="nama">Full Name</label>
                  <input type="text" name="nama" id="nama" 
                         class="form-control form-control-sm" 
                         value="{{ old('nama') ?? $user->nama ?? '' }}"
                         placeholder="Full Name">
                </div>
                <div class="form-group form-group-sm">
                  <label for="nis">NIS</label>
                  <input type="text" 
                         @if($user->role == 'admin' || $user->role == 'guru' || (isset($from) && $from == 'create')) name="nis" @else readonly @endif 
                         id="nis" 
                         class="form-control form-control-sm" 
                         value="{{ old('nis') ?? $user->nis ?? '' }}"
                         placeholder="NIS">
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group form-group-sm">
                      <label for="jenis_kelamin">Gender</label>
                      <select name="jenis_kelamin" id="jenis_kelamin" 
                              class="form-control form-control-sm" required>
                        <option selected disabled>Choose..</option>
                        <option value="L" @if($user->jenis_kelamin == 'L') selected @endif>L</option>
                        <option value="P" @if($user->jenis_kelamin == 'P') selected @endif>P</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group form-group-sm">
                      <label for="kelas">Class</label>
                      <input type="text" 
                             @if($user->role == 'guru' || (isset($from) && $from == 'create')) name="kelas" @else disabled @endif 
                             id="kelas" 
                             class="form-control form-control-sm" 
                             value="{{ old('kelas') ?? $user->kelas ?? '' }}"
                             placeholder="Class">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-sm">
                      <label for="avatar">User Avatar</label>
                      <input type="file" 
                             name="avatar"
                             id="avatar" 
                             class="form-control form-control-sm" 
                             accept="image/*"
                             value="{{ old('avatar') ?? $user->avatar ?? '' }}"
                             placeholder="Class">
                    </div>
                  </div>
                </div>
                @isset($from)
                  <div class="form-group form-group-sm">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="custom-select custom-select-sm">
                      <option value="siswa" @if($user->role == 'siswa') selected @endif>Siswa</option>
                      <option value="guru" @if($user->role == 'guru') selected @endif>Guru</option>
                      <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                    </select>
                  </div>
                @endisset
                @if($user->role != 'siswa' && !isset($from))
                  <div class="form-group form-group-sm">
                    <label for="password">Password</label>
                    <input type="password" 
                          name="password"
                          id="password" 
                          class="form-control form-control-sm"
                          placeholder="Password"
                          autocomplete="false">
                  </div>
                @endif
                <div class="row">
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-sm btn-block elevation-2">
                      <i class="fas fa-save"></i> Save
                    </button>
                  </div>                  
                </div>
              </form>
            </div>
          </div>          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
@endsection