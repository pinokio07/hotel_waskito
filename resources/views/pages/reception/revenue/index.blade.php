@extends('layouts.master')
@section('title') Room Revenue @endsection
@section('page_name') Room Revenue @endsection

@section('content')
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Revenue This Month</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">          
          <div class="row">
            @forelse ($rooms as $key => $room)
              <div class="col-md-6">
                <div class="table-responsive">
                  <table class="table table-sm table-striped" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Floor</th>
                        <th>Room No</th>
                        <th>Occupancy</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="100%">{{$key}}</td>
                      </tr>
                      @forelse ($room as $r)
                        <tr>
                          <td>{{$r->no}}</td>
                          <td class="text-center">
                            {{ $r->occupancy }} %
                          </td>
                          <td class="text-right">Rp. {{ number_format($r->revenue, 0, ',', '.') }}</td>
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

@section('footer')
  
@endsection