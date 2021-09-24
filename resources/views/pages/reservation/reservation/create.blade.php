@extends('layouts.master')
@section('title') Reservation @endsection
@section('page_name') Reservation @endsection

@section('content')
@if($order->id != '')

<form action="{{ route('reservation.reservation.update', ['order' => $order->id]) }}" method="post">
  @method('PUT')
  {{-- <input type="hidden" name="order_id" value="{{$order->id}}"> --}}
@else
<form action="{{ route('reservation.store') }}" method="post">  
@endif

  @csrf
  @include('form.reservation', ['method' => 'reservation'])
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">        
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-4">
                <button type="reset" class="btn btn-sm btn-block elevation-2">Reset</button>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-sm btn-block btn-success elevation-2">Reserve</button>
              </div>
            </div>
          </div>        
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
</form>
@endsection