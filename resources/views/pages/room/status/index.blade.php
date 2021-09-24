@extends('layouts.master')
@section('title') Room Status @endsection
@section('page_name') Room Status @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Rooms</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <form method="get">
            <div class="row">
              <div class="col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Room Status</h3>
                  </div>
                  <div class="card-body pl-0 py-2">
                    <div class="row">
                      <div class="col-6 pr-0">
                        <div class="form-group mb-0">
                          <div class="form-check">
                            <input type="checkbox" 
                                   name="room_status[]" 
                                   id="clean" 
                                   value="clean"
                                   @if(Request::has('room_status') && in_array('clean', Request::get('room_status'))) checked @endif
                                   >
                            <label for="clean">Clean</label>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" 
                                   name="room_status[]" 
                                   id="dirty" 
                                   value="dirty"
                                   @if(Request::has('room_status') && in_array('dirty', Request::get('room_status'))) checked @endif
                                   >
                            <label for="clean">Dirty</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group mb-0">
                          <div class="form-check pl-0">
                            <input type="checkbox" 
                                    name="room_status[]" 
                                    id="inspected" 
                                    value="inspected"
                                    @if(Request::has('room_status') && in_array('inspected', Request::get('room_status'))) checked @endif
                                    >
                            <label for="inspected">Inspected</label>
                          </div>
                          <div class="form-check pl-0">
                            <input type="checkbox" 
                                   name="room_status[]" 
                                   id="outoforder" 
                                   value="out of order"
                                   @if(Request::has('room_status') && in_array('out of order', Request::get('room_status'))) checked @endif
                                   >
                            <label for="outoforder">Out Of Order</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>              
              </div>
              <div class="col-6 col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">FO Status</h3>
                  </div>
                  <div class="card-body pl-0 py-2">
                    <div class="form-group mb-0">
                      <div class="form-check">
                        <input type="checkbox" 
                               name="fo_status[]" 
                               id="vacant" 
                               value="vacant"
                               @if(Request::has('fo_status') && in_array('vacant', Request::get('fo_status'))) checked @endif
                               >
                        <label for="vacant">Vacant</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" 
                               name="fo_status[]" 
                               id="occupied" 
                               value="occupied"
                               @if(Request::has('fo_status') && in_array('occupied', Request::get('fo_status'))) checked @endif
                               >
                        <label for="occupied">Occupied</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Reservation Status</h3>
                  </div>
                  <div class="card-body pl-0 py-2">
                    <div class="form-group mb-0">
                      <div class="form-check">
                        <input type="checkbox" 
                               name="res_status[]" 
                               id="arrivals" 
                               value="arrivals"
                               @if(Request::has('res_status') && in_array('arrivals', Request::get('res_status'))) checked @endif
                               >
                        <label for="arrivals">Arrivals</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" 
                               name="res_status[]" 
                               id="not reserved" 
                               value="not reserved"
                               @if(Request::has('res_status') && in_array('not reserved', Request::get('res_status'))) checked @endif
                               >
                        <label for="not reserved">Not Reserved</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Room Type</h3>
                  </div>
                  <div class="card-body pb-1">
                    <div class="form-group">                    
                      <select name="room_type_id" id="room_type" 
                              class="custom-select">
                        <option value="">Choose..</option>
                        @forelse ($roomType as $type)
                          <option value="{{$type->id}}"
                            @if(Request::has('room_type_id') && Request::get('room_type_id') == $type->id) selected @endif
                            >{{$type->nama}}</option>
                        @empty                        
                        @endforelse
                      </select>
                    </div>
                  </div>
                </div>              
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-sm btn-info btn-block elevation-2">
                  <i class="fas fa-search"></i>
                  Search
                </button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-12">
      <div class="card card-success card-outline">
        <div class="card-header">
          <h3 class="card-title">Results</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm" style="width: 100%;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Room Type</th>
                  <th>Bed Type</th>
                  <th>Room Status</th>
                  <th>FO Status</th>
                  <th>Res Status</th>
                </tr>
              </thead>
              <tbody>
                @if(Request::hasAny('room_status', 'fo_status', 'res_status', 'room_type_id'))
                  @forelse ($rooms as $room)
                    <tr>
                      <td>{{$room->no}}</td>
                      <td>{{$room->roomtype->nama}}</td>
                      <td>{{$room->bed}}</td>
                      <td>
                        <select name="room_status" 
                                id="room_status_{{$room->no}}" 
                                class="custom-select custom-select-sm status"
                                data-id="{{$room->id}}">
                                <option value="dirty"
                                        @if($room->room_status == 'dirty') selected @endif
                                        >Dirty</option>
                                @if($room->room_status != 'out of order')
                                <option value="clean"
                                        @if($room->room_status == 'clean') selected @endif
                                        >Clean</option>                                
                                <option value="inspected"
                                        @if($room->room_status == 'inspected') selected @endif
                                        >Inspected</option>
                                @endif
                                <option value="out or order"
                                        @if($room->room_status == 'out of order') selected @endif
                                        >Out Of Order</option>
                        </select>                        
                      </td>
                      <td>{{Str::title($room->fo_status)}}</td>
                      <td>{{Str::title($room->res_status)}}</td>
                      <td></td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="100%">Search Result Empty</td>
                    </tr>
                  @endforelse
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row (main row) -->
@endsection

@section('footer')
  <script>
    jQuery(document).ready(function(){
      var _token = $()
      $(document).on('change', '.status', function(){
        var id = $(this).data('id');
        var val = $(this).val();

        $.ajax({
          url: "{{ route('room.status.ganti') }}",
          type: "POST",
          data:{
            _token : "{{ csrf_token() }}",
            id : id,
            val : val,
          },
          success: function(msg){
            if(msg === 'OK'){
              toastr.success("Change room status success", "Success!", {timeOut: 4000, closeButton: true});
            } else {
              toastr.error("Change room status failed", "Failed!", {timeOut: 4000, closeButton: true});
            }
          }
        })
      });
    });
  </script>
@endsection