<title>Guest Billing</title>
<style type="text/css">
  .halaman{margin: 10px 20px;width: 100%;}
  .gambar{float:left;max-height: 60px; margin-right: 40px;}
  .tabel{width:100%;border-collapse: collapse;}
  .tabel th, td {padding: 12px;}
  .kotak{border-collapse:collapse;}
  .kotak tr td{border:1px solid;padding:5px;}
  .kotak .header{
    text-align: center; vertical-align: middle;
  }
  .isi{padding: 8 5px;font-size: 14px;}
  .no-bottom-border{
    border-bottom: 1 transparent;
  }
  .top-border{ border-top: 1px solid; }
  .bg-grey{background-color: rgb(224, 224, 224)}
  .text-right{text-align: right;}
  .text-center{text-align: center;}
  /* .tbh{height:350px;} */
  .ttd{border-collapse:collapse;width: 100%;}
  .ttd td{padding:10px 10px;width:33%;}
  </style>
  <div class="halaman">
    <div style="padding: 4mm;border:1px solid;" align="center">
      <span><img src="{{public_path().'/img/'.sekolah()->logo_hotel}}" class="gambar" height="100"></span>
      <span><h3 style="text-decoration: underline; margin:0 auto;"></h3></span>
      <span><h3 style="text-decoration: underline;">Guest Bill</h3></span>
    </div>
    
    <div>
      <table class="tabel" style="width: 100%;">      
          <tr>
            <td style="width: 25%;">Date</td>
            <td style="width: 1px !important;">:</td>
            <td class="isi">{{today()->translatedFormat('l, j F Y')}}</td>            		
            <td style="width: 25%;">Room No</td>
            <td style="width: 1% !important;">:</td>
            <td class="isi">{{optional($order->room)->no}}</td>
          </tr>
          <tr>
            <td>Receive From</td>
            <td style="width: 1px !important;">:</td>
            <td class="isi">{{ optional($order->guest)->namaLengkap() }}</td>
            <td>Arrivals Date</td>
            <td style="width: 1px !important;">:</td>
            <td class="isi">{{$order->arrivals->format('d-m-Y')}}</td>
          </tr>
          <tr>         
            <td>Room Type</td>
            <td style="width: 1px !important;">:</td>
            <td class="isi">{{optional($order->room)->roomtype->nama}}</td>
            <td>Departure Date</td>
            <td style="width: 1px !important;">:</td>
            <td class="isi">{{$order->departure->format('d-m-Y')}}</td>
          </tr>
      </table>
      <table class="kotak" style="width: 100%;">
        <tr>
          <td class="header">In Payment of</td>
          <td class="header">Debit</td>
          <td class="header">Credit</td>
          <td class="header">Balance</td>
        </tr>
        <tr>
          <td class="no-bottom-border bg-grey">Room Rates Deposit</td>
          <td class="no-bottom-border bg-grey text-right">Rp. {{ number_format(($order->price), 0, ',', '.') }}</td>
          <td class="no-bottom-border bg-grey text-right"></td>
          <td class="no-bottom-border bg-grey text-right">Rp. {{ number_format(($order->price), 0, ',', '.') }}</td>
        </tr>
        <?php $jml = $order->price; ?>
        @for($i = 0; $i < $order->nights; $i++)
          <tr>
            <td class="no-bottom-border">Rates for {{ $order->arrivals->addDays($i)->format('d-m-Y') }}</td>
            <td class="no-bottom-border text-right"></td>
            <td class="no-bottom-border text-right">Rp. {{ number_format(($rate), 0, ',', '.') }}</td>
            <td class="no-bottom-border text-right">Rp. 
              <?php $jml = $jml - $rate; ?>
              {{ number_format(($jml), 0, ',', '.') }}
            </td>
          </tr>
        @endfor        
        <tr>
          <td class="no-bottom-border bg-grey">Guest Deposit</td>
          <td class="no-bottom-border bg-grey text-right">Rp. {{ number_format($order->deposit, 0, ',', '.') }}</td>
          <td class="no-bottom-border bg-grey text-right"></td>
          <td class="no-bottom-border bg-grey text-right">Rp. {{ number_format($order->deposit, 0, ',', '.') }}</td>
        </tr>
        @if(optional($order->expenses)->extra_bed != 0)
        <tr>
          <td class="no-bottom-border">Extra Bed</td>
          <td class="no-bottom-border text-right"></td>
          <td class="no-bottom-border text-right">            
              <?php $sisa = $sisa - optional($order->expenses)->extra_bed; ?>
              Rp. {{ number_format(optional($order->expenses)->extra_bed, 0, ',', '.') }}            
          </td>
          <td class="no-bottom-border text-right">
            Rp. {{ number_format($sisa, 0, ',', '.') }}</td>
        </tr>
        @endif
        @if(optional($order->expenses)->laundry != 0)
        <tr>
          <td class="no-bottom-border">Laundry</td>
          <td class="no-bottom-border text-right"></td>
          <td class="no-bottom-border text-right">            
              <?php $sisa = $sisa - optional($order->expenses)->laundry; ?>
              Rp. {{ number_format(optional($order->expenses)->laundry, 0, ',', '.') }}            
          </td>
          <td class="no-bottom-border text-right">
            Rp. {{ number_format($sisa, 0, ',', '.') }}</td>
        </tr>
        @endif
        @if(optional($order->expenses)->fnb != 0)
        <tr>
          <td class="no-bottom-border">Extra Food & Beverage</td>
          <td class="no-bottom-border text-right"></td>
          <td class="no-bottom-border text-right">            
              <?php $sisa = $sisa - optional($order->expenses)->fnb; ?>
              Rp. {{ number_format(optional($order->expenses)->fnb, 0, ',', '.') }}           
          </td>
          <td class="no-bottom-border text-right">
            Rp. {{ number_format($sisa, 0, ',', '.') }}</td>
        </tr>
        @endif
        @if(optional($order->expenses)->etc != 0)
        <tr>
          <td>Other</td>
          <td class="text-right"></td>
          <td class="text-right">            
              <?php $sisa = $sisa - optional($order->expenses)->etc; ?>
              Rp. {{ number_format(optional($order->expenses)->etc, 0, ',', '.') }}           
          </td>
          <td class="text-right">
            Rp. {{ number_format($sisa, 0, ',', '.') }}</td>
        </tr>
        @endif
        <tr>
          <td align="center" class="top-border"><b>Total Billing</b></td>
          <td class="text-right top-border" align="center" colspan="3"><b>Rp. {{number_format($order->revenue)}}</b></td>
        </tr>
        <tr>
          <td align="center"><b>Refund Deposit</b></td>
          <td class="text-right" align="center" colspan="3"><b>Rp. {{ number_format($sisa, 0, ',', '.')}}</b></tr>
      </table>
      <table class="ttd" style="margin-top:20px; width:100%;">
        <tr>
          <td class="text-center" style="width:35%;"><u>Lapor keluar oleh</u> <br> <b>Check out By</b></td>
          <td style="width: 30%;"></td>
          <td class="text-center" style="width:35%;"><u>Penyelia</u> <br> <b>Supervisor</b></td>
        </tr>
        <tr>
          <td class="text-center">
          <br>
          <br>
          <br>
          <br>
          <br>
          ( <u>{{ Str::upper(auth()->user()->nama) }}</u> )
          </td>
          <td></td>
          <td class="text-center">
          <br>
          <br>
          <br>
          <br>
          <br>
          (_____________________)
          </td>
        </tr>
      </table>
    </div>
  
  </div>
