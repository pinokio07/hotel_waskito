@extends('layouts.master')
@section('title') Room Statistics @endsection
@section('page_name') Room Statistics @endsection

@section('content')
<?php $days = \Carbon\Carbon::now()->daysInMonth; ?>
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Room Statistics</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            @forelse ($types as $key => $type)
              <div class="col-sm-4 col-6">
                <div class="info-box bg-gradient-{{$background[$loop->iteration]}}">
                  <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
    
                  <div class="info-box-content">
                    <span class="info-box-text">{{$type->nama}}</span>
                    <span class="info-box-number">{{$type->room->count()}}</span>
    
                    <div class="progress">
                      <div class="progress-bar" style="width: {{$type->persen}}%"></div>
                    </div>
                    <span class="progress-description">
                      Rooms Occupied {{$type->persen}}%
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
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