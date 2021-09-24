@extends('layouts.master')
@section('title') School Profile @endsection
@section('page_name') School Profile @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profile {{$sekolah->nama}}</h3>
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
          <form action="{{ route('post.setting') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">            
              <div class="col-md-5">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group form-group-sm">
                      <label for="nama">School Name</label>
                      <input type="text" id="nama" 
                             class="form-control form-control-sm" 
                             value="{{ $sekolah->nama ?? '' }}"
                             placeholder="School Name"
                             disabled>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-group-sm">
                      <label for="alamat">School Address</label>
                      <textarea name="alamat" id="alamat" rows="3" 
                      class="form-control form-control-sm" required>{{$sekolah->alamat ?? ''}}</textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-group-sm">
                          <label for="kota">City</label>
                          <input type="text" name="kota" id="kota" 
                                 class="form-control form-control-sm" 
                                 value="{{ old('kota') ?? $sekolah->kota ?? '' }}"
                                 placeholder="City"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-group-sm">
                          <label for="provinsi">Province</label>
                          <input type="text" name="provinsi" id="provinsi" 
                                 class="form-control form-control-sm" 
                                 value="{{ old('provinsi') ?? $sekolah->provinsi ?? '' }}"
                                 placeholder="Province"
                                 required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-group-sm">
                          <label for="telp">Phone Number</label>
                          <input type="text" name="telp" id="telp" 
                                 class="form-control form-control-sm" 
                                 value="{{ old('telp') ?? $sekolah->telp ?? '' }}"
                                 placeholder="Phone Number"
                                 required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-group-sm">
                          <label for="email">School Email</label>
                          <input type="email" name="email" id="email" 
                                 class="form-control form-control-sm" 
                                 value="{{ old('email') ?? $sekolah->email ?? '' }}"
                                 placeholder="Email"
                                 required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-group-sm">
                      <label for="website">Website</label>
                      <input type="text" name="website" id="website" 
                             class="form-control form-control-sm"
                             value="{{ old('website') ?? $sekolah->website ?? '' }}">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-group-sm">
                      <label for="logo_sekolah">Logo Sekolah</label>
                      <input type="file" name="logo_sekolah" id="logo_sekolah" 
                             class="form-control form-control-sm"
                             accept="image/*">
                    </div>
                  </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-success btn-sm btn-block elevation-2">
                      <i class="fas fa-save"></i> Save
                    </button>
                  </div>
                </div>                
              </div> 
              <div class="col-md-5">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group form-group-sm">
                      <label for="nama_hotel">Hotel Name</label>
                      <input type="text" id="nama_hotel" 
                             class="form-control form-control-sm" 
                             value="{{ $sekolah->nama_hotel ?? '' }}"
                             placeholder="Hotel Name"
                             disabled>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group form-group-sm">
                      <label for="logo_hotel">Logo Hotel</label>
                      <input type="file" name="logo_hotel" id="logo_hotel" 
                             class="form-control form-control-sm"
                             accept="image/*">
                    </div>
                  </div>
                </div>                
              </div>            
            </div> 
          </form>         
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
@endsection