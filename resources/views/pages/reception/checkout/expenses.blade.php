@extends('layouts.master')
@section('title') Additional Expenses @endsection
@section('page_name') Additional Expenses @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Guest Info</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped" style="width:100%;">
                  <tr>
                    <td>Full Name</td>
                    <td>:</td>
                    <td>{{$order->guest->namaLengkap()}}</td>
                  </tr>
                  <tr>
                    <td>Birth Date</td>
                    <td>:</td>
                    <td>{{$order->guest->tanggal_lahir->format('d-m-Y')}}</td>
                  </tr>
                  <tr>
                    <td>ID Number</td>
                    <td>:</td>
                    <td>{{$order->guest->id_no}}</td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td>{{$order->guest->country->nama}}</td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td>:</td>
                    <td>{{$order->guest->kota}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$order->guest->email}}</td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td>{{$order->guest->telp}}</td>
                  </tr>
                  <tr>
                    <td>VIP</td>
                    <td>:</td>
                    <td>{{$order->vip}}</td>
                  </tr>
                  <tr>
                    <td>Market Code</td>
                    <td>:</td>
                    <td>{{$order->market_code}}</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="table-responsive">
                <table class="table table-sm table-striped" style="width:100%;">
                  <tr>
                    <td>Room Number</td>
                    <td>:</td>
                    <td>{{$order->room->no}}</td>
                  </tr>
                  <tr>
                    <td>Arrival Date</td>
                    <td>:</td>
                    <td>{{$order->arrivals->format('d-m-Y')}}</td>
                  </tr>
                  <tr>
                    <td>Departure Date</td>
                    <td>:</td>
                    <td>{{$order->departure->format('d-m-Y')}}</td>
                  </tr>
                  <tr>
                    <td>Persons</td>
                    <td>:</td>
                    <td>Adult: {{$order->adult}} ; Child: {{$order->child}}</td>
                  </tr>
                  <tr>
                    <td>Nights</td>
                    <td>:</td>
                    <td>{{$order->nights}}</td>
                  </tr>
                  <tr>
                    <td>Payment Type</td>
                    <td>:</td>
                    <td>{{$order->payment_type}}</td>
                  </tr>
                  @if($order->payment_type == 'credit-card')
                  <tr>
                    <td>Card Number</td>
                    <td>:</td>
                    <td>{{$order->card_no}}</td>
                  </tr>
                  <tr>
                    <td>Exp Date</td>
                    <td>:</td>
                    <td>{{$order->exp_date}}</td>
                  </tr>
                  @elseif($order->payment_type == 'guarantee-letter')
                  <tr>
                    <td>Company</td>
                    <td>:</td>
                    <td>{{$order->company}}</td>
                  </tr>
                  <tr>
                    <td>Letter No</td>
                    <td>:</td>
                    <td>{{$order->letter_no}}</td>
                  </tr>
                  @elseif ($order->payment_type == 'voucher')
                  <tr>
                    <td>Voucher No</td>
                    <td>:</td>
                    <td>{{$order->voucher_no}}</td>
                  </tr>
                  @elseif($order->payment_type == 'other')
                  <tr>
                    <td>Payment Detail</td>
                    <td>:</td>
                    <td>{{$order->payment_detail}}</td>
                  </tr>
                  @endif
                  @if($order->additional_request != '')
                  <tr>
                    <td>Additional Request (Reservation)</td>
                    <td>:</td>
                    <td>{{$order->additional_request}}</td>
                  </tr>
                  @endif
                  <tr>
                    <td><b>TOTAL PRICE</b></td>
                    <td>:</td>
                    <td>Rp. {{number_format($order->price, 0, '.', ',')}}</td>
                  </tr>
                  <tr>
                    <td><b>DEPOSIT</b></td>
                    <td>:</td>
                    <td>Rp. {{number_format($order->deposit, 0, '.', ',')}}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Additional Expenses</h3>
        </div>
        <form id="formCheckout" action="{{ route('reception.checkout.checkout') }}" method="post">
          @csrf
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group form-group-sm">
                  <label for="extra_bed">Extra Bed</label>
                  <input type="number" name="expense[extra_bed]" id="extra_bed"
                         class="form-control form-control-sm"
                         value="{{ old('extra_bed') ?? $order->expenses->extra_bed ?? 0 }}"
                         {{ $disabled }}>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group form-group-sm">
                  <label for="laundry">Laundry</label>
                  <input type="number" name="expense[laundry]" id="laundry"
                         class="form-control form-control-sm"
                         value="{{ old('laundry') ?? $order->expenses->laundry ?? 0 }}"
                         {{ $disabled }}>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group form-group-sm">
                  <label for="fnb">Food and Beverage</label>
                  <input type="number" name="expense[fnb]" id="fnb"
                         class="form-control form-control-sm"
                         value="{{ old('fnb') ?? $order->expenses->fnb ?? 0 }}"
                         {{ $disabled }}>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group form-group-sm">
                  <label for="etc">Etc</label>
                  <input type="number" name="expense[etc]" id="etc"
                         class="form-control form-control-sm"
                         value="{{ old('etc') ?? $order->expenses->etc ?? 0 }}"
                         {{ $disabled }}>
                </div>
              </div>
              <div class="col-12">
                @if($order->revenue != '')
                <h5>Total Billing: Rp. <span id="sisa">{{ number_format($order->revenue, 0, ',','.')}}</span></h5>
                @else
                <h5>Balancing Deposit: Rp. <span id="sisa">{{ 0 - $order->deposit }}</span></h5>
                @endif
              </div>
            </div>            
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            @if($order->status == 'check-out')
            <a href="/reception/checkout/invoice/{{ $order->id }}" 
               class="btn btn-info btn-sm elevation-2"
               target="_blank">
              <i class="fas fa-download"></i> Print Billing</a>
            @else
            <button id="btnCheckout" type="button" class="btn btn-warning btn-sm elevation-2">
              <i class="fas fa-sign-out"></i> Check Out</button>
            @endif
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
  
@endsection

@section('footer')
  <script>
    function hitungSisa(deposit, bed, laundry, fnb, etc)
		{
			return deposit + bed + laundry + fnb + etc;
		}
    
    jQuery(document).ready(function(){
      $(document).on("keyup", "#extra_bed, #laundry, #fnb, #etc", function(){
        var deposit = parseInt({{0 - $order->deposit}});
        var	bed = parseInt($('#extra_bed').val());
        var	laundry = parseInt($('#laundry').val());
        var fnb = parseInt($('#fnb').val());
        var	etc = parseInt($('#etc').val());
        var sisaBayar = hitungSisa(deposit, bed, laundry, fnb, etc);
        
        $('#sisa').text(sisaBayar.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));      
      });
      $(document).on('click', '#btnCheckout', function(){
        Swal.fire({
          title: 'Are you sure?',
          text: "Guest will be checked out!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Check out!'
        }).then((result) => {
          if (result.isConfirmed) {
            $('#formCheckout').submit();
            console.log("Confirmed");
          } else {
            console.log("Canceled");
          }
        });
      });
		
    });
  </script>
@endsection