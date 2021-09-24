@extends('layouts.master')
@section('title') Room Facilities @endsection
@section('page_name') Room Facilities @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Room Facilities -
            @if(Request::has('rtype'))
              {{$facilities->first()->roomtype->nama ?? ''}}
            @else
              Select Room Type
            @endif
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <form method="get">
                <div class="form-group">
                  <select name="rtype" 
                          id="rtype" 
                          class="custom-select" 
                          onchange="this.form.submit()">
                    <option selected disabled>Select Room Type</option>
                    @forelse ($room_types as $rtype)
                      <option value="{{$rtype->id}}" @if(Request::has('rtype') && Request::get('rtype') == $rtype->id) selected @endif>{{$rtype->nama}}</option>
                    @empty                      
                    @endforelse
                  </select>
                </div>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>Room Type</th>
                      <th>Room Size</th>
                      <th>Facilities</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(Request::has('rtype'))
                      <tr>
                        <td rowspan="100%" 
                            class="text-center bg-light" 
                            style="vertical-align: middle;">
                            {{$facilities->first()->roomtype->nama ?? '' }}
                        </td>
                      </tr>
                      <tr>
                        <td rowspan="100%" 
                            class="text-center bg-light" 
                            style="vertical-align: middle;">
                            {{$facilities->first()->large ?? '' }}
                        </td>
                      </tr>
                      @forelse($facilities as $f)
                        <tr>
                          <td>{{$f->facility}}</td>
                        </tr>
                      @empty
                        <tr>
                          <td rowspan="100%">Empty</td>
                        </tr>
                      @endforelse
                    @endif
                  </tbody>
                </table>
              </div>
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