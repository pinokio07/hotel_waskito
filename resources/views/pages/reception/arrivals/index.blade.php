@extends('layouts.master')
@section('title') Expected Guests @endsection
@section('page_name') Expected Guests @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Expected Guests</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form id="formArrivals" action="{{ url()->current() }}" method="get">
            <div class="row">
              <div class="col-12 col-md-4">
                <div class="form-group">
                  <label for="dates">Dates Range</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" name="dates" id="dates"
                            class="form-control float-right"
                            value="{{old('dates') 
                                      ?? Request::get('dates') 
                                      ?? today()->format('d/m/Y')}}">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-sm table-bordered text-sm" id="tableGuest" style="width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Guest Name</th>
                  <th>Room</th>
                  <th>Arrivals</th>
                  <th>Market Code</th>
                  <th>Payment Method</th>
                  <th>Action</th>
                </tr>
              </thead>                  
              <tbody>
                @forelse ($orders as $order)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$order->guest->namaLengkap()}}</td>
                    <td class="text-center">{{$order->room->no}}</td>
                    <td class="text-center">
                      {{(!$order->arrivals) ? '' : $order->arrivals->format('d-m-Y')}}
                    </td>
                    <td class="text-center">{{Str::title($order->market_code)}}</td>
                    <td class="text-center">{{Str::title($order->payment_type)}}</td>
                    <td class="text-center">
                      <a href="/reception/registration?order={{$order->id}}" 
                         class="btn btn-xs btn-info elevation-2">
                         Check In
                      </a>
                    </td>
                  </tr>
                @empty
                  
                @endforelse
              </tbody>                  
            </table>
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
  <script>
    $(function(){
      $('#dates').daterangepicker({
        format: 'L',
        autoApply: true,        
        locale: {
                format: 'DD/MM/YYYY'
                },
        minDate: "{{ today()->format('d/m/Y') }}",
      }).on('apply.daterangepicker', function(ev, picker) {
          $('#formArrivals').submit();
      });
    })
    $('#tableGuest').DataTable();
  </script>
@endsection