<title>Registration Form</title>
<style type="text/css">
  @page{margin:10px;}
  .halaman{margin: 10px 20px;width:100%;}
  .gambar{float:left;max-height: 60px; margin-right: 40px;}
  .tabel{border-collapse: collapse;white-space: nowrap;table-layout: fixed;}
  .tabel td {border:1px solid;padding: .3rem;}
  .isi{font-size: 14px;text-align: center;}
  .head{font-size: 12px;}
  .setuju-top{font-size:10px;border:solid 1px;border-top-left-radius:5px;border-top-right-radius:5px; margin-top:10px;padding:10 10px;width:100%;}
  .setuju-middle{font-size:10px;border-left:solid 1px;border-right:solid 1px; padding:10 10px;width:100%;}
  .setuju-bottom{font-size:10px;border:solid 1px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;margin-bottom: 10px;padding:10 10px;width:100%;}
  .ttd{border-collapse:collapse;}
  .ttd td{border:1px solid;padding:10px 10px;}
  .text-nowrap{white-space: nowrap;}
</style>
<?php $sekolah = sekolah(); ?>
<div class="halaman">
	<div style="padding: 4mm;border:1px solid;" align="center">
		<span><img src="{{ public_path()}}/img/{{$sekolah->logo_hotel }}" class="gambar" height="110"></span>
		<span><h3 style="text-decoration: underline; margin:0 auto;">Formulir Pendaftaran Tamu</h3></span>
		<span><h3>Guest Registration Form</h3></span>
	</div>

	<table class="tabel" style="width: 100%;">
		<tr class="head">
			<td colspan="2">Title - <b>Title</b></td>
			<td colspan="2">Nama Depan - <b>First name</b></td>
			<td colspan="2">Nama Belakang - <b>Surname</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->guest->title}}</td>
			<td colspan="2">{{$order->guest->nama_depan}}</td>
			<td colspan="2">{{$order->guest->nama_belakang}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Tanggal Lahir - <b>Date of Birth</b></td>
			<td colspan="2">Nomor Identitas - <b>Identity Number</b></td>
			<td colspan="2">Nomor Telepon - <b>Phone Number</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->guest->tanggal_lahir->format('d-m-Y')}}</td>
			<td colspan="2">{{$order->guest->id_no}}</td>
			<td colspan="2">{{$order->guest->telp}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Negara - <b>Country</b></td>
			<td colspan="2">Kota - <b>City</b></td>
			<td colspan="2">Alamat E-Mail - <b>E-Mail Address</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->guest->country->nama}}</td>
			<td colspan="2">{{$order->guest->kota}}</td>
			<td colspan="2">{{$order->guest->email}}</td>
		</tr>
		<tr class="head">
			<td colspan="6">Alamat Lengkap - <b>Address Details</b></td>
		</tr>
		<tr class="isi">
			<td colspan="6" align="left">{{$order->guest->alamat ?? '-'}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Nomor Reservasi - <b>Reservation Number</b></td>
			<td colspan="2">Nomor Kamar - <b>Room Number</b></td>
			<td colspan="2">Tipe Kamar - <b>Room Type</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->id.'-'.$order->room->no}}</td>
			<td colspan="2">{{$order->room->no}}</td>
			<td colspan="2">{{$order->room->roomtype->nama}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Kode VIP - <b>VIP Code</b></td>
			<td colspan="2">Kode Market - <b>Market Code</b></td>
			<td colspan="2">Detil - <b>Details</b></td>
			
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->vip}}</td>
			<td colspan="2">{{$order->market_code}}</td>
			<td colspan="2">{{$order->market_detail}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Tanggal Masuk - <b>Arrival Date</b></td>
			<td colspan="2">Tanggal Keluar - <b>Departure Date</b></td>
			<td colspan="2">Malam - <b>Night</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->arrivals->format('d-m-Y')}}</td>
			<td colspan="2">{{$order->departure->format('d-m-Y')}}</td>			
			<td colspan="2">{{$order->nights}}</td>
		</tr>
		<tr class="head">
			<td>Dewasa - <b>Adult</b></td>
			<td>Anak - <b>Child</b></td>
			<td colspan="2">Harga Kamar - <b>Room Rates</b></td>
			<td colspan="2">Harga Total - <b>Total Price</b></td>
		</tr>
		<tr class="isi">
			<td>{{$order->adult}}</td>
			<td>{{$order->child}}</td>';
			@php
          $rates = $order->price / $order->nights;
      @endphp
			<td colspan="2">Rp. {{number_format($rates, 0, ',', '.')}}</td>
			<td colspan="2">Rp. {{number_format($order->price, 0, ',', '.')}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Deposito - <b>Deposit</b></td>
			<td colspan="2">Jenis Pembayaran - <b>Payment Type</b></td>
			<td colspan="2"> Tanda Tangan - <b> Signature</b></td>
			
		</tr>
		<tr class="isi">
			<td colspan="2">Rp. {{number_format($order->deposit, 0, ',', '.')}}</td>
			<td colspan="2">{{$order->payment_type}}</td>
			<td colspan="2" rowspan="7"></td>
		</tr>
		<tr class="head">
			<td colspan="2">Nomor Kartu - <b>Card Number</b></td>
			<td colspan="2">Berlaku Sampai - <b>Valid Thru</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->card_no}}</td>
			<td colspan="2">{{$order->exp_date}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Nama Perusahaan - <b>Company Name</b></td>
			<td colspan="2">Nomor Surat - <b>Letter Number</b></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->company}}</td>
			<td colspan="2">{{$order->letter_no}}</td>
		</tr>
		<tr class="head">
			<td colspan="2">Nomor Voucher - <b>Voucher Number</b></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="isi">
			<td colspan="2">{{$order->voucher_no}}</td>
			<td colspan="2"></td>
		</tr>			
	</table>

	<div class="setuju-top">
	Saya setuju membayar semua biaya yang timbul selama saya tinggal di Hotel {{$sekolah->nama_hotel}} dan melakukan pembayaran uang muka sebesar 50% dari harga kamar.
	<hr style="height:1px;border:none;color:#333;background-color:#333;">
	<b>I agree to pay all charges incurred during my stay in {{$sekolah->nama_hotel}} Hotel and to open deposit 50% from room charges.
	</b>
	</div>
	<div class="setuju-middle">
	Hotel tidak bertanggung jawab atas kehilangan uang dan barang-barang berharga lainnya di kamar. Kotak deposit tersedia Cuma-Cuma di kamar anda.
	<hr style="height:1px;border:none;color:#333;background-color:#333;">
	<b>The Hotel will not be responsible for any loss of money or valuables in the room. Safe deposit box is available free in your room.
	</b>
	</div>
	<div class="setuju-bottom">
	Kartu kamar harus dikembalikan ke front desk saat check out. Apabila kartu kamar hilang atau rusak akan dikenakan denda sebesar IDR 50.000.
	<hr style="height:1px;border:none;color:#333;background-color:#333;">
	<b>Key cards have to be returned to the Front Desk upon check out. There will be a penalty of IDR 50.000,- should there be any loss or damage.
	</b>
	</div>

	<table class="ttd" style="width: 100%;">
		<tr>
			<td>Lapor masuk oleh - <b>Check in By</b></td>
			<td>Lapor keluar oleh - <b>Check out By</b></td>
			<td>Penyelia - <b>Supervisor</b></td>
		</tr>
		<tr>
			<td height="60"></td>
			<td></td>
			<td></td>
		</tr>
	</table>

</div>