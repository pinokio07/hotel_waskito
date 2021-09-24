@extends('layouts.master')
@section('title') Reservation Lists @endsection
@section('page_name') Reservation Lists @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Reservation Lists</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">          
          <div class="table-responsive">
            <table class="table table-sm table-bordered text-sm" id="tableGuest" style="width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Guest Name</th>
                  <th>Room</th>
                  <th>Country</th>
                  <th>Arrivals</th>
                  <th>Status</th>
                  <th>Res Type</th>
                  <th>Action</th>
                </tr>
              </thead>                  
              <tbody>
                @forelse ($orders as $order)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$order->guest->namaLengkap()}}</td>
                    <td class="text-center">{{$order->room->no}}</td>
                    <td class="text-center">{{$order->guest->country->nama}}</td>
                    <td class="text-center">
                      {{ (!$order->arrivals) ? '' : $order->arrivals->format('d-m-Y')}}
                    </td>                    
                    <td class="text-center">{{Str::title($order->status)}}</td>
                    <td class="text-center">{{Str::title($order->res_type)}}</td>
                    <td class="text-center">
                      @if($order->conf_letter == true)
                        <a href="{{ route('reservation.download.confirmation', ['order' => $order->id]) }}" class="btn btn-xs btn-info elevation-2 mb-2 mb-md-0">
                          <i class="fas fa-download"></i> Confirmation</a>
                      @endif
                      @if($order->status == 'canceled' && $order->cancel_reason != '')
                        <button class="btn btn-xs btn-info elevation-2 view"
                                data-toggle="modal"
                                data-target="#modalCancel"
                                data-cancel="{{$order->cancel_reason}}"
                                >View</button>
                      @else
                      <button class="btn btn-xs btn-warning elevation-2 cancel"
                              data-toggle="modal"
                              data-target="#modalCancel"
                              data-id="{{$order->id}}"
                              >Cancel</button>
                      @endif
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

  <!-- Modal Jadwal -->
  <div class="modal fade" id="modalCancel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cancel Reason</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('reservation.records.update') }}" method="post">
          @csrf          
          <input type="hidden" name="order_id" id="order_id">			
          <div class="modal-body">
            <div class="form-group">
              <textarea name="cancel_reason" id="cancel_reason" rows="3"
                        class="form-control" required></textarea>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default elevation-2" data-dismiss="modal">Close</button>
            <button id="simpan" type="submit" class="btn btn-warning elevation-2">Save</button>
          </div>
        </form>			
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('footer')
  <script>
    $('#tableGuest').DataTable();

    jQuery(document).ready(function(){
      $(document).on('click', '.cancel', function(){
        var order_id = $(this).data('id');
        $('#modalCancel #cancel_reason').attr('disabled', false);
        $('#modalCancel #cancel_reason').val('');
        $('#modalCancel #order_id').val(order_id);
        $('#simpan').attr('type', 'submit');
      });
      $(document).on('click', '.view', function(){
        var cancel_reason = $(this).data('cancel');
        $('#modalCancel #cancel_reason').attr('disabled', true);
        $('#modalCancel #cancel_reason').val(cancel_reason);
        $('#simpan').attr('type', 'button');
      });
    });
  </script>
@endsection