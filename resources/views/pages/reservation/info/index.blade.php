@extends('layouts.master')
@section('title') Room Info @endsection
@section('page_name') Room Info @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Available Rooms</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            @forelse ($rooms as $key => $room)
              <?php $name = $room->first()->roomtype->nama; ?>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-{{$background[$key]}}">
                  <div class="inner">
                    <h3>{{$room->where('fo_status', 'vacant')
                          ->where('room_status', 'inspected')->count()}}</h3>
    
                    <p>{{$name}}</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bed"></i>
                  </div>
                  <a href="?rtype={{$room->first()->roomtype->id}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            @empty              
            @endforelse
          </div>
          @if(Request::has('rtype'))
          <div class="row">
            <div class="col-12">
              <div class="card card-{{ $background[Request::get('rtype')] }} card-outline">
                <div class="card-header">
                  <h3 class="card-title">{{$ruangan->first()->roomtype->nama}}</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-sm table-bordered" style="width: 100%">
                      <thead>
                        <tr>
                          <th>Floor</th>
                          <th>Room No</th>
                          <th>Bed Type</th>
                          <th>View</th>
                          <th>Smoking</th>
                          <th>Room Status</th>
                          <th>Res. Status</th>
                          <th>Order</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($ruangan->groupBy('floor') as $rr => $ruang)
                          <tr>
                            <td rowspan="{{$ruang->count() + 1}}"><b>{{$rr}}</b></td>
                          </tr>
                          @forelse ($ruang as $r)
                            <tr>
                              <td>{{$r->no}}</td>
                              <td>{{$r->bed}}</td>
                              <td>{{$r->view}}</td>
                              <td>
                                @if($r->smoking == 'true') Yes @else No @endif
                              </td>
                              <td>{{Str::title($r->room_status)}}</td>
                              <td>{{Str::title($r->res_status)}}</td>
                              <td class="text-center">
                                @if($r->room_status == 'inspected' && $r->res_status == 'not reserved')
                                  <a href="/reservation/create?room={{$r->id}}" 
                                     class="btn btn-xs btn-warning elevation-2 mb-2 mb-md-0">
                                     <i class="fas fa-edit"></i>
                                     Reservation
                                  </a>
                                  {{-- <a href="/reception/registration?room={{$r->id}}" 
                                     class="btn btn-xs btn-danger elevation-2">
                                     <i class="fas fa-edit"></i>
                                     Registration
                                  </a> --}}
                                @endif
                              </td>
                            </tr>
                          @empty
                            
                          @endforelse
                        @empty
                          
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
@endsection

@section('footer')
  <script type="text/javascript">    
    $(".table td:contains('Dirty')").addClass('bg-danger');
    $(".table td:contains('Arrivals')").addClass('bg-warning');
    $(".table td:contains('Out Of Order')").addClass('bg-gray');
    $(".table td:contains('Inspected')").addClass('bg-success'); 
  </script>
@endsection