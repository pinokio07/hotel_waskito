@extends('layouts.master')
@section('title') Room Configuration @endsection
@section('page_name') Room Configuration @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Room Configuration</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            @forelse ($rooms as $key => $r)
              <?php ($loop->last) ? $col = '12' : $col = '6'; ?>
              <div class="col-md-{{$col}}">
                <div class="table-responsive">
                  <table class="table table-bordered table-sm" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Floor</th>
                        <th>Smoking</th>
                        <th>Room Number</th>
                        <th>Room Type/Bed</th>
                        <th>View</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="100%" class="text-center" style="vertical-align: middle;">{{$key}}</td>                        
                      </tr>
                      <tr>
                        @forelse ($r->unique('smoking') as $sm)
                          <td rowspan="100%" class="text-center" style="vertical-align: middle;">
                            @if($sm->smoking == true) Smoking @else Non Smoking @endif  
                          </td>
                        @empty                          
                        @endforelse
                      </tr>
                      @forelse ($r as $room)
                        <tr>
                          <td @if($room->sidebyside == true) class="bg-warning" @endif>{{$room->no}}</td>
                          <td>{{$room->bed}}</td>
                          <td>{{$room->view}}</td>
                          <td>{{Str::title($room->fo_status)}}</td>
                        </tr>
                      @empty
                        
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            @empty
              
            @endforelse
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
@endsection