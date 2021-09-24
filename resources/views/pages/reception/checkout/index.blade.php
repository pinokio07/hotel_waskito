@extends('layouts.master')
@section('title') Expected Departure Guests @endsection
@section('page_name') Expected Departure Guests @endsection

@section('content')
  <?php $today = today(); ?>
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Expected Departure Guests</h3>
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
                  <th>Departure</th>
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
                      {{(!$order->departure) ? '' : $order->departure->format('d-m-Y')}}
                    </td>
                    <td class="text-center">{{Str::title($order->market_code)}}</td>
                    <td class="text-center">{{Str::title($order->payment_type)}}</td>
                    <td class="text-center">
                      <button class="btn btn-info btn-xs elevation-2 mb-2 mb-md-0 extend"
                              data-toggle="modal"
                              data-target="#modalExtend"
                              data-id="{{$order->id}}"
                              data-departure="{{$order->departure->format('Y-m-d')}}"
                              ><i class="fas fa-clock"></i> Extend
                      </button>
                      <a href="{{ route('reception.registration.download', ['order' => $order->id]) }}" class="btn btn-success btn-xs elevation-2 mb-2 mb-md-0" target="_blank">
                         <i class="fas fa-download"></i> Registration</a>
                      <button class="btn btn-danger btn-xs elevation-2 mb-2 mb-md-0 receipt"
                              data-toggle="modal"
                              data-target="#modalReceipt"
                              data-id="{{$order->id}}"
                              data-total="Rp. {{number_format($order->price + $order->deposit,0,',','.')}}">
                          <i class="fas fa-download"></i> Receipt</button>
                      <a href="/reception/checkout/{{$order->id}}" class="btn btn-xs btn-warning elevation-2">Checkout</a>
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
  <!-- Modal Extend -->
  <div class="modal fade" id="modalExtend">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Extend Departure Date</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('reception.departure.update') }}" method="post">
          @csrf          
          <input type="hidden" name="order_id" id="order_id">			
          <div class="modal-body">
            <div class="form-group">
              <label for="departure">Select Date</label>
              <input type="date" name="departure" id="departure" 
                     class="form-control"
                     value="{{$today->format('Y-m-d')}}"
                     min="{{$today->format('Y-m-d')}}">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default elevation-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning elevation-2">Save</button>
          </div>
        </form>			
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Receipt -->
  <div class="modal fade" id="modalReceipt">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Amount Text</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formReceipt" action="{{ route('reception.receipt.download') }}" method="post" target="_blank">
          @csrf          
          <input type="hidden" name="receipt_id" id="receipt_id">			
          <div class="modal-body">
            <div class="form-group">
              <label for="amount">Amount <span id="amount_text"></span></label>
              <input type="text" name="amount" id="amount" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default elevation-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning elevation-2">Print</button>
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
      $(document).on('click', '.extend', function(){
        var id = $(this).data('id');
        var departure = $(this).data('departure');
        $('#departure').attr('min', departure);
        $('#order_id').val(id);
      });
      $(document).on('click', '.receipt', function(){
        var id = $(this).data('id');
        var total = $(this).data('total');

        $('#modalReceipt #amount_text').html(total);
        $('#modalReceipt #receipt_id').val(id);
      });
      $(document).on('bs-modal-close', '#modalReceipt', function(){
        console.log("Tutup");
      });
    })
  </script>
@endsection