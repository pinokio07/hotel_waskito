@extends('layouts.master')
@section('title') Hotel Facilities @endsection
@section('page_name') Hotel Facilities @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hotel Facilities</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="table-responsive">
                <table class="table table-sm table-bordered text-sm" style="width: 100%;">
                  <thead>
                    <tr class="text-center">
                      <th>Floor</th>
                      <th>Facilities</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    @forelse ($facilities as $key => $facility)                    
                      @if($loop->iteration <= $lantai)
                      <tr>
                        <td rowspan="{{count($facility) + 1}}" class="text-center" style="vertical-align: middle;">{{$key}}</td>
                      </tr>
                      @forelse ($facility as $f)
                        <tr>
                          <td>{{$f->facilities}}</td>
                        </tr>
                      @empty
                        
                      @endforelse
                      @endif
                    @empty
                      <tr>
                        <td>Kosong</td>
                      </tr>
                    @endforelse
                  </tbody>                  
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="table-responsive">
                <table class="table table-sm table-bordered" style="width: 100%;">
                  <thead>
                    <tr class="text-center">
                      <th>Floor</th>
                      <th>Facilities</th>
                    </tr>
                  </thead>                  
                  <tbody>
                    @forelse ($facilities as $key => $facility)                    
                      @if($loop->iteration > $lantai)
                      <tr>
                        <td rowspan="{{count($facility) + 1}}" class="text-center" style="vertical-align: middle;">{{$key}}</td>
                      </tr>
                      @forelse ($facility as $f)
                        <tr>
                          <td>{{$f->facilities}}</td>
                        </tr>
                      @empty
                        
                      @endforelse
                      @endif
                    @empty
                      <tr>
                        <td>Kosong</td>
                      </tr>
                    @endforelse
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