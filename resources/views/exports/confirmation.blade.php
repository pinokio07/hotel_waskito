<style type="text/css">
  @page{margin-top:10px;margin-bottom:5px;}
  body{
    font-family: Verdana, Geneva, sans-serif;
    font-size: 11pt;
    margin-top: 10px;margin-bottom:5px;
  }
  .halaman{margin: 10px 20px;width:100%;}
  .head{padding: 10px;border:1px solid;}
  .gambar{height: 80px;margin-top:2mm;}
  .tabel tr td {padding: 4 0px;}
  .isi{padding: 4 5px;font-size: 14px;}
  .note{font-size:11px;}
  .ttd{border-collapse:collapse;margin-left:25px;}
  .ttd td{padding:10px 10px;}
  </style>
  <?php $sekolah = sekolah(); ?>
  <div class="halaman">
    <div class="head" align="center">
      <span><img src="{{public_path().'/img/'.$sekolah->logo_hotel}}" class="gambar"></span>
      <p>{{$sekolah->alamat}}<br>
      {{$sekolah->kota}} – {{$sekolah->provinsi}}<br>
      Telp: {{$sekolah->telp}}, Email: {{$sekolah->email}} <br>Website: {{$sekolah->website}}</p>
      <span><h3 style="text-decoration: underline;margin:0px;">Confirmation Letter</h3></span>		
    </div>
  
    <p><b>Dear Sir/Madam,<br>
    Thank you for choosing {{$sekolah->nama_hotel}} Hotel,</b><br>
    We are pleased to confirm your reservations as follows:<br>
    </p>
    <table class="tabel">
      <tr>
        <td>Confirmation Number</td>
        <td>:</td>
        <td class="isi">{{$order->id.'-'.round(microtime(true))}}</td>
      </tr>
      <tr>
        <td>Guest Name</td>
        <td>:</td>
        <td class="isi">{{$order->guest->title}} {{$order->guest->nama_depan}} {{$order->guest->nama_belakang}}</td>
      </tr>
      <tr>
        <td>Company</td>
        <td>:</td>
        <td class="isi">{{$order->market_detail}}</td>
      </tr>
      <tr>
        <td>Room Type</td>
        <td>:</td>
        <td class="isi">{{$order->room->roomtype->nama}}</td>
      </tr>
      <tr>
        <td>Room Rate</td>
        <td>:</td>
        <td class="isi">Rp. {{number_format($order->price)}} Nett (Include breakfast for 2 Persons)</td>
      </tr>
      <tr>
        <td>Number of Room</td>
        <td>:</td>
        <td class="isi">1</td>
      </tr>
      <tr>
        <td>Arrival Date</td>
        <td>:</td>
        <td class="isi">{{$order->arrivals->format('d-m-Y')}}</td>
      </tr>
      <tr>
        <td>Departure Date</td>
        <td>:</td>
        <td class="isi">{{$order->departure->format('d-m-Y')}}</td>
      </tr>
      <tr>
        <td>Billing Method</td>
        <td>:</td>
        <td class="isi">{{$order->payment_type}}</td>
      </tr>
      <tr>
        <td>Credit Card Number</td>
        <td>:</td>
        <td class="isi">{{$order->card_no}}</td>
      </tr>
      <tr>
        <td>Booked By</td>
        <td>:</td>
        <td class="isi">{{$order->by_name}}</td>
      </tr>
      <tr>
        <td>Phone Number</td>
        <td>:</td>
        <td class="isi">{{$order->by_phone}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td class="isi">{{$order->by_email}}</td>
      </tr>
      <tr>
        <td>Special Request</td>
        <td>:</td>
        <td class="isi">{{$order->additional_request}}</td>
      </tr>
    </table>
  
    <p class="note">Kindly note that check-in time is after 14:00 (2 PM) and check-out time is before 12:00 (noon) on the day of departure.<br>
    Your reservation  will be held until 18:00 (6 PM) on the day of arrival unless prior arrangements  has  been  made.<br>
    Room include breakfast for two person, to avoid any disappointment, may we respectfully suggest that you guarantee this reservation to a credit card  or with pre arranged credit facilities with our company.<br>
    We look forward to welcoming our guest and assure you of our best care and attention.<br>
    Thank you.<br>
    </p>
  
    <table class="ttd">
      <tr>
        <td align="center">Warmest Regards,</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        <td align="center">Acknowledge By</td>
      </tr>
      <tr>
        <td height="60" align="center">
        <br>
        <br>
        <br>
        <br>
        (__________________)
        <br>
        Reservation Agent
        </td>
        <td></td>
        <td align="center">
        <br>
        <br>
        <br>
        <br>
        (__________________)
        <br>
        Supervisor
        </td>
      </tr>
    </table>
  
  </div>