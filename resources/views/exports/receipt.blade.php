<title>Registration Receipt</title>
<style type="text/css">
  .halaman{margin:15px;}
  .head{border: 1px solid; align: center;width: 100%;padding:.3rem;}
  .judul{text-align: center; text-decoration: underline;}
  .tabel tr td{padding:.3rem;}
  .amount{border-collapse:collapse;width: 100%;}
  .amount tr td{border:1px solid;}
  .payment{border-collapse: collapse;white-space: nowrap;width: 100%;}
  .payment tr td{border: 1px solid;}
  .text-center{text-align: center;}
  .jenis tr td{padding:2px;}
  .py-4{padding-top: 2rem;padding-bottom: 2rem;}
  .times{font-weight: 700;}
</style>
<?php $sekolah = sekolah(); ?>
<div class="halaman">
  <div class="head">
    <img src="{{public_path().'/img/'.$sekolah->logo_hotel}}" align="left" height="100">
    <p align="center" style="padding-top:0px;">{{$sekolah->alamat}}<br>
    {{$sekolah->kota}} – {{$sekolah->provinsi}}<br>
    Telp: {{$sekolah->telp}}<br>Email: {{$sekolah->email}}<br>Website: {{$sekolah->website}}</p>    
  </div>
  <h3 class="judul">Official Receipt</h3>
  <div>
    <table class="tabel">
      <tr>
        <td>Date</td>
        <td>:</td>
        <td>{{today()->format('d F Y')}}</td>
      </tr>
      <tr>
        <td>No</td>
        <td>:</td>
        <td>{{$order->id.'-'.$order->room->no}}</td>
      </tr>
      <tr>
        <td>Received From</td>
        <td>:</td>
        <td>{{$order->guest->namaLengkap()}}</td>
      </tr>
    </table>
    <br>
    <table class="amount">
      <tr class="text-center">
        <td>Amount Of</td>
        <td>IDR Rupiah</td>
      </tr>
      <tr>
        <td class="text-center">{{$amount}}</td>
        <td class="text-center py-4"><b>Rp. {{number_format($order->price + $order->deposit)}}</b></td>
      </tr>
    </table>
    <br>
    <br>
    <table class="payment">
      <tr>
        <td style="padding: 20px;">In Payment Of</td>
        <td style="white-space: nowrap;padding:20px;">
          Payment for Room Charges and Deposit for {{$order->room->roomtype->nama}} Room
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td>Method of Payment:</td>
        <td style="padding: 5px 20px;">
          <div style="border:1px solid; width:15px;height:15px;">
            @if($order->payment_type == 'cash') <span class="times">X</span> @endif
          </div>
        </td>
        <td>Cash</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding: 4px 20px;">
          <div style="border:1px solid; width:15px;height:15px;">
            @if($order->payment_type == 'credit-card') <span class="times">X</span> @endif
          </div>
        </td>
        <td>Credit Card</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding: 5px 20px;"></td>
        <td>Number : {{$order->card_no}}</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding: 5px 20px;">
          <div style="border:1px solid; width:15px;height:15px;">
            @if($order->payment_type == 'guarantee-letter') <span class="times">X</span> @endif
          </div>
        </td>
        <td>Guarantee Letter</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding: 5px 20px;">
          <div style="border:1px solid; width:15px;height:15px;">
            @if($order->payment_type == 'voucher') <span class="times">X</span> @endif
          </div>
        </td>
        <td>Voucher</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding: 5px 20px;">
          <div style="border:1px solid; width:15px;height:15px;">
            @if($order->payment_type == 'other') <span class="times">X</span> @endif
          </div>
        </td>
        <td>Other</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>__________________________________________</td>
      </tr>
    </table>
    <br>
    <br>
    <table>
      <tr>
        <td style="padding-left:100px; padding-right:100px;">Received By</td>
        <td style="padding-left:100px; padding-right:100px;">Acknowledge By</td>
      </tr>
      <tr>
        <td align="center"><br><br><br><br><br>(<span style="text-decoration: underline;">{{auth()->user()->nama}}</span>)</td>
        <td align="center"><br><br><br><br><br>(_______________________)</td>
      </tr>
      <tr>
        <td align="center"><b>Front Desk Agent</b></td>
        <td align="center"><b>Supervisor</b></td>
      </tr>
    </table>
    
  </div>
</div>