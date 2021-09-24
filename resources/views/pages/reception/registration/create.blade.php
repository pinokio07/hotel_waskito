@extends('layouts.master')
@section('title') Registration @endsection
@section('page_name') Registration @endsection

@section('content')
@if($order->id != '')

<form id="formRegister" action="{{ route('reception.registration.update', ['order' => $order->id]) }}" method="post">
  @method('PUT')
  {{-- <input type="hidden" name="order_id" value="{{$order->id}}"> --}}
@else
<form id="formRegister" action="{{ route('reception.store') }}" method="post">  
@endif

  @csrf
  @include('form.reservation', ['method' => 'registration'])
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
                <button type="submit" class="btn btn-sm btn-block btn-success elevation-2">Check In</button>
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