<div class="card card-primary card-outline">
  <div class="card-header">
    <h3 class="card-title">Guest Info</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>    
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-2">
        <div class="form-group">
          <label for="title">Guest Title</label>
          <select name="guest[title]" id="title" 
                  class="custom-select @error('guest.title') is-invalid @enderror" 
                  required>
            <option selected disabled value="">Select...</option>
            <option value="Mr" 
                    @if($order->guest != '' && $order->guest->title == 'Mr' || old('guest.title') == 'Mr') selected @endif
                    >Mr.</option>
            <option value="Mrs" 
                    @if($order->guest != '' && $order->guest->title == 'Mrs' || old('guest.title') == 'Mrs') selected @endif
                    >Mrs.</option>
            <option value="Ms" 
                    @if($order->guest != '' && $order->guest->title == 'Ms' || old('guest.title') == 'Ms') selected @endif
                    >Ms.</option>
            <option value="Miss"
                    @if($order->guest != '' && $order->guest->title == 'Miss' || old('guest.title') == 'Miss') selected @endif
                    >Miss.</option>
            <option value="Bapak" 
                    @if($order->guest != '' && $order->guest->title == 'Bapak' || old('guest.title') == 'Bapak') selected @endif
                    >Bapak.</option>
            <option value="Ibu" 
                    @if($order->guest != '' && $order->guest->title == 'Ibu' || old('guest.title') == 'Ibu') selected @endif
                    >Ibu.</option>
            <option value="Bapak/Ibu" 
                    @if($order->guest != '' && $order->guest->title == 'Bapak/Ibu' || old('guest.title') == 'Bapak/Ibu') selected @endif
                    >Bapak/Ibu.</option>
            <option value="Dr" 
                    @if($order->guest != '' && $order->guest->title == 'Dr' || old('guest.title') == 'Dr') selected @endif
                    >Dr.</option>
            <option value="Drs" 
                    @if($order->guest != '' && $order->guest->title == 'Drs' || old('guest.title') == 'Drs') selected @endif
                    >Drs.</option>
            <option value="Ir" 
                    @if($order->guest != '' && $order->guest->title == 'Ir' || old('guest.title') == 'Ir') selected @endif
                    >Ir.</option>
            <option value="Prof" 
                    @if($order->guest != '' && $order->guest->title == 'Prof' || old('guest.title') == 'Prof') selected @endif
                    >Prof.</option>
            <option value="Doctor" 
                    @if($order->guest != '' && $order->guest->title == 'Doctor' || old('guest.title') == 'Doctor') selected @endif
                    >Doctor.</option>
          </select>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="nama_belakang">Surname</label>
          <input type="text" name="guest[nama_belakang]" id="nama_belakang" 
                  class="form-control @error('guest.nama_belakang') is-invalid @enderror"
                  value="{{ old('guest.nama_belakang') ?? optional($order->guest)->nama_belakang}}"
                  placeholder="Surname" required>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="nama_depan">First Name</label>
          <input type="text" name="guest[nama_depan]" id="nama_depan" 
                  class="form-control"
                  value="{{ old('guest.nama_depan') ?? optional($order->guest)->nama_depan}}"
                  placeholder="First Name" required>
        </div>
      </div>
    </div>
    <div class="row">
      @if($method == 'registration')
      <div class="col-md-2">
        <div class="form-group">
          <label for="tanggal_lahir">Birth Date</label>
          <input type="date" name="guest[tanggal_lahir]" id="tanggal_lahir" 
                 class="form-control @error('guest.tanggal_lahir') is-invalid @enderror"
                 value="{{ old('guest.tanggal_lahir') ?? optional($order->guest)->tanggal_lahir}}"
                 placeholder="Birth Date" required>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="id_no">ID Number</label>
          <input type="text" name="guest[id_no]" id="id_no" 
                  class="form-control @error('guest.id_no') is-invalid @enderror"
                  value="{{ old('guest.id_no') ?? optional($order->guest)->id_no}}"
                  placeholder="Identity Number Ex. ID, Passport, Licence" required>
        </div>
      </div>      
      <div class="col-6 col-md-4">
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" name="guest[email]" id="email" 
                  class="form-control @error('guest.email') is-invalid @enderror"
                  value="{{ old('guest.email') ?? optional($order->guest)->email}}"
                  placeholder="Email Address">
        </div>
      </div>
      @endif
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="telp">Phone Number</label>
          <input type="text" name="guest[telp]" id="telp" 
                  class="form-control @error('guest.telp') is-invalid @enderror"
                  value="{{ old('guest.telp') ?? optional($order->guest)->telp}}"
                  data-inputmask="'mask': ['9999-9999-9999 [x99999]', '+62 0999 9999 9999[9]-9999']" data-mask
                  placeholder="Phone Number" required>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="form-group">
          <label for="country">Country</label>
          <select name="guest[country_id]" id="country" 
                  class="form-control select2bs4" style="width: 100% !important;"
                  required>
            @forelse ($countries as $country)
              <option value="{{$country->id}}"
                      @if($order->guest != '' && $order->guest->country_id == $country->id || old('guest.country_id') == $country->id) selected @elseif($country->id == 98) selected @endif
                      >
                {{$country->nama}}
              </option>
            @empty
              
            @endforelse
          </select>
        </div>
      </div>
      @if($method == 'registration')
      <div class="col-6 col-md-4" id="city_select">
        <div class="form-group">
          <label for="kota">City</label>
          <select name="guest[kota]" id="kota" 
                  class="select2bs4" style="width: 100%;"
                  required
                  >
              <option selected disabled value="">Choose...</option>
            @forelse ($cities as $city)
              <option value="{{$city->nama}}"
                      @if(optional($order->guest)->kota == $city->nama || old('guest.kota') == $city->nama) selected @endif
                      >
                {{$city->nama}}
              </option>
            @empty          
            @endforelse
          </select>
        </div>
      </div>
      <div class="col-6 col-md-4 d-none" id="city_text">
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city_name" 
                  class="form-control @error('guest.city_name') is-invalid @enderror"
                  value="{{ old('guest.city_name') ?? optional($order->guest)->kota}}"
                  placeholder="City">
        </div>
      </div>
      @endif
      <div class="col-6 col-md-2">
        <div class="form-group">
          <label for="vip">VIP</label>
          <select name="order[vip]" id="vip" 
                  class="custom-select"
                  required>
            <option value="1"
                    @if($order->vip == 1 || old('order.vip') == 1) selected @endif
                    >1</option>
            <option value="2"
                    @if($order->vip == 2 || old('order.vip') == 2) selected @endif
                    >2</option>
            <option value="3"
                    @if($order->vip == 3 || old('order.vip') == 3) selected @endif
                    >3</option>
            <option value="4"
                    @if($order->vip == 4 || old('order.vip') == 4) selected @endif
                    >4</option>
          </select>
        </div>
      </div>
      <div class="col-6 col-md-2">
        <div class="form-group">
          <label for="market_code">Market Code</label>
          <select name="order[market_code]" id="market_code" 
                  class="custom-select"
                  required>
            <option value="individual"
                    @if($order->market_code == 'individual' || old('order.market_code') == 'individual') selected @endif
                    >Individual</option> 
            <option value="group"
                    @if($order->market_code == 'group' || old('order.market_code') == 'group') selected @endif
                    >Group</option>
            <option value="government"
                    @if($order->market_code == 'government' || old('order.market_code') == 'government') selected @endif
                    >Government</option> 
            <option value="corporate"
                    @if($order->market_code == 'corporate' || old('order.market_code') == 'corporate') selected @endif
                    >Corporate</option>
            <option value="travel-agent"
                    @if($order->market_code == 'travel-agent' || old('order.market_code') == 'travel-agent') selected @endif
                    >Travel Agent</option>
            <option value="other"
                    @if($order->market_code == 'other' || old('order.market_code') == 'other') selected @endif
                    >Other</option>          
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 d-none" id="detail_market">
        <div class="form-group">
          <label for="market_detail"><span id="market_detail_name">Market</span> Detail</label>
          <input type="text" name="order[market_detail]" id="market_detail" 
                  class="form-control @error('order.market_detail') is-invalid @enderror"
                  value="{{ old('order.market_detail') ?? $order->market_detail}}"
                  placeholder="Market Details">
        </div>
      </div>
    </div>
  </div>
</div>

@if($method == 'reservation')
<div class="card card-info card-outline">
  <div class="card-header">
    <h3 class="card-title">Booked By</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>  
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group form-group-sm">
          <label for="by_name">Full Name</label>
          <input type="text" name="order[by_name]" id="by_name" 
                 class="form-control form-control-sm"
                 required
                 placeholder="Booked By Name"
                 value="{{ old('order.by_name') ?? $order->by_name}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group form-group-sm">
          <label for="by_email">Email</label>
          <input type="email" name="order[by_email]" id="by_email" 
                 class="form-control form-control-sm"
                 required
                 placeholder="Booked By Email"
                 value="{{ old('order.by_email') ?? $order->by_email}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group form-group-sm">
          <label for="by_phone">Phone Number</label>
          <input type="text" name="order[by_phone]" id="by_phone" 
                 class="form-control form-control-sm"
                 required
                 placeholder="Booked By Phone"
                 value="{{ old('order.by_phone') ?? $order->by_phone}}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group form-group-sm">
          <label for="by_address">Address</label>
          <input type="text" name="order[by_address]" id="by_address" 
                 class="form-control form-control-sm"
                 required
                 placeholder="Booked By Address"
                 value="{{ old('order.by_address') ?? $order->by_address}}">
        </div>
      </div>
    </div>
  </div>
</div>
@endif

<div class="card card-success card-outline">
  <div class="card-header">
    <h3 class="card-title">Room Info</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">      
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="dates">Dates Range</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
              </span>
            </div>
            <input type="text" name="order[dates]" id="dates"
                    class="form-control float-right"
                    value="{{old('order.dates') 
                      ?? (($order->arrivals != '') ? $order->arrivals->format('d/m/Y') : today()->format('d/m/Y')).' - '.(($order->departure != '') ? $order->departure->format('d/m/Y') : today()->format('d/m/Y'))}}">
          </div>
          <!-- /.input group -->
        </div>
      </div>
      <div class="col-6 col-md-1">
        <div class="form-group">
          <label for="nights">Nights</label>
          <input type="number" name="order[nights]" id="nights" 
                  class="form-control" 
                  value="{{ old('order.night') ?? $order->nights ?? '1'}}" 
                  readonly>
        </div>
      </div>
      <div class="col-6 col-md-1">
        <div class="form-group">
          <label for="adult">Adult</label>
          <select name="order[adult]" id="adult" class="custom-select">
            <option value="1"
                    @if($order->adult == 1 || old('order.adult') == 1) selected @endif
                    >1</option>
            <option value="2"
                    @if($order->adult == 2 || old('order.adult') == 2) selected @endif
                    >2</option>
            <option value="3"
                    @if($order->adult == 3 || old('order.adult') == 3) selected @endif
                    >3</option>
            <option value="4"
                    @if($order->adult == 4 || old('order.adult') == 4) selected @endif
                    >4</option>
          </select>
        </div>
      </div>
      <div class="col-6 col-md-1">
        <div class="form-group">
          <label for="child">Child</label>
          <select name="order[child]" id="child" class="custom-select">
            <option value="0"
                    @if($order->child == 0 || old('order.child') == 0) selected @endif
                    >0</option>
            <option value="1"
                    @if($order->child == 1 || old('order.child') == 1) selected @endif
                    >1</option>
            <option value="2"
                    @if($order->child == 2 || old('order.child') == 2) selected @endif
                    >2</option>
            <option value="3"
                    @if($order->child == 3 || old('order.child') == 3) selected @endif
                    >3</option>
            <option value="4"
                    @if($order->child == 4 || old('order.child') == 4) selected @endif
                    >4</option>
          </select>
        </div>
      </div>
      @if($method == 'reservation')
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="res_type">Reservation Type</label>
          <select name="order[res_type]" id="res_type" class="custom-select" required>
            <option selected disabled value="">Choose..</option>
            <option value="6 PM Release"
                    @if($order->res_type == '6 PM Released' || old('order.res_type') == '6 PM Released') selected @endif
                    >6 PM Release</option>
            <option value="Guaranteed"
                    @if($order->res_type == 'Guaranteed' || old('order.res_type') == 'Guaranteed') selected @endif
                    >Guaranteed</option>
            <option value="Confirmed"
                    @if($order->res_type == 'Confirmed' || old('order.res_type') == 'Confirmed') selected @endif
                    >Confirmed</option>
          </select>
        </div>
      </div>      
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="conf_letter">Confirmation Letter</label>
          <select name="order[conf_letter]" id="conf_letter" class="custom-select" required>
            <option value="0" @if(old('order[conf_letter]') == 0) selected @endif>No</option>
            <option value="1" @if(old('order[conf_letter]') == 1) selected @endif>Yes</option>            
          </select>
        </div>
      </div>  
      @endif    
      <div class="col-6 col-md-2">
        <div class="form-group">
          <label for="room_id">Room No</label>
          <select name="order[room_id]" id="room_id" 
                  class="select2bs4" style="width: 100% !important;"
                  required>
            <option selected disabled value="">Choose...</option>
            @forelse ($rooms as $room)
              <option value="{{$room->id}}"
                      @if($order->room_id == $room->id || old('order.room_id') == $room->id) selected 
                      @elseif($selectedRoom != '' && $selectedRoom->id == $room->id) selected @endif
                      data-type="{{$room->room_type_id}}"
                      data-bed="{{$room->bed}}"
                      data-view="{{$room->view}}"
                      >{{$room->no}}</option>
            @empty                  
            @endforelse
          </select>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="form-group">
          <label for="room_type">Room Type</label>
          <select name="room_type" id="room_type" 
                  class="custom-select" 
                  required>
            <option selected disabled value="">Choose...</option>
            @forelse ($roomTypes as $roomType)
              <option value="{{$roomType->id}}"
                  @if(optional($order->room)->room_type_id == $roomType->id || old('room_type') == $roomType->id) selected
                  @elseif($selectedRoom != '' && $selectedRoom->room_type_id == $roomType->id) selected @endif
                  data-room="{{$rooms->where('room_type_id', $roomType->id)->first()->id ?? ''}}"
                      >{{$roomType->nama}}</option>
            @empty                  
            @endforelse
          </select>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="bed">Bed</label>
          <input type="text" name="bed" id="bed" class="form-control"
                  value="{{ old('bed') ?? $selectedRoom->bed ?? $order->room->bed ?? ''}}"
                  placeholder="Select Room"
                  readonly>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="view">View</label>
          <input type="text" name="view" id="view" class="form-control"
                  value="{{ old('view') ?? $selectedRoom->view ?? $order->room->view ?? ''}}"
                  placeholder="Select Room"
                  readonly>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="rates">Rates</label>
          @php
              if($order->price != '' && $order->nights != ''){
                $rates = $order->price / $order->nights;
              } elseif($selectedRoom != ''){
                $rates = $selectedRoom->roomtype->rates->individual;
              } else {
                $rates = old('rates') ?? 0;
              }
          @endphp
          <input type="text" name="rates" id="rates" class="form-control"
                  value="Rp. {{ number_format($rates, 0, ',', '.') }}"
                  placeholder="Select Room"
                  readonly>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="form-group">
          <label for="price">Total Price</label>
          @php
              if($order->price != ''){
                $price = $order->price;
              } elseif($selectedRoom != ''){
                $price = $selectedRoom->roomtype->rates->individual;
              } else {
                $price = old('order.price') ?? 0;
              }
          @endphp
          <input type="text" name="price_text" id="price_text" class="form-control"
                  value="Rp. {{ number_format($price, 0, ',', '.')}}"
                  placeholder="Select Room"
                  readonly>
          <input type="hidden" name="order[price]" id="price" value="{{$price}}">
        </div>
      </div>
      @if($method == 'reservation')
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="additional_request">Additional Request</label>
          <input type="text" name="order[additional_request]" id="additional_request" 
                  class="form-control"
                  value="{{old('order.additional_request') ?? $order->additional_request ?? ''}}"
                  placeholder="Additional Request">
        </div>
      </div>
      @endif
      @if($method == 'registration')
      <div class="col-12 col-md-4">
        <div class="form-group">
          @php
              if($order->deposit != ''){
                $deposit = $order->deposit;
              } else {
                $deposit = old('order.deposit') ?? 0;
              }
          @endphp
          <label for="deposit_text">Deposit</label>
          <input type="text" name="deposit_text" id="deposit_text" 
                 class="form-control"
                 value="{{ number_format($deposit, 0, '.', ',') }}"
                 data-inputmask="'alias':'currency',
                                 'digits':0,
                                 'groupSeparator': '.',
                                 'rightAlign':1,
                                 'reverse': true,
                                 'prefix' : 'Rp. '"
                 data-mask>
          <input type="number" name="order[deposit]" id="deposit"
                 class="d-none"
                 value="{{$deposit}}">
        </div>
      </div>
      @endif
    </div>    
  </div>
</div>

<div class="card card-warning card-outline">
  <div class="card-header">
    <h3 class="card-title">Payment Type</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>  
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="form-group">
          <label for="payment_type">Payment Type</label>
          <select name="order[payment_type]" id="payment_type" class="custom-select" required>
            <option value="cash"
                    @if(old('order.payment_type') == 'cash' 
                        || $order->payment_type == 'cash') selected @endif
                    >Cash</option>
            <option value="credit-card"
                    @if(old('order.payment_type') == 'credit-card' 
                        || $order->payment_type == 'credit-card') selected @endif
                    >Credit Card</option>
            <option value="guarantee-letter"
                    @if(old('order.payment_type') == 'guarantee-letter' 
                        || $order->payment_type == 'guarantee-letter') selected @endif
                    >Guarantee Letter</option>
            <option value="voucher"
                    @if(old('order.payment_type') == 'voucher' 
                        || $order->payment_type == 'voucher') selected @endif
                    >Voucher</option>
            <option value="other"
                    @if(old('order.payment_type') == 'other' 
                        || $order->payment_type == 'other') selected @endif
                    >Other</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-4 @if($order->payment_type != 'other') d-none @endif other">
        <div class="form-group">
          <label for="payment_detail">Payment Detail</label>
          <input type="text" name="order[payment_detail]" id="payment_detail" 
                 class="form-control"
                 placeholder="Payment Detail"
                 value="{{ old('order.payment_detail') ?? $order->payment_detail}}">
        </div>
      </div>
      <div class="col-6 col-md-4 @if($order->payment_type != 'credit-card') d-none @endif credit-card">
        <div class="form-group">
          <label for="card_no">Card Number</label>
          <input type="text" name="order[card_no]" id="card_no" 
                 class="form-control"
                 placeholder="Card Number"
                 value="{{ old('order.card_no') ?? $order->card_no}}">
        </div>
      </div>
      <div class="col-6 col-md-4 @if($order->payment_type != 'credit-card') d-none @endif credit-card">
        <div class="form-group">
          <label for="exp_date">Exp Date</label>
          <input type="date" name="order[exp_date]" id="exp_date" 
                 class="form-control"
                 value="{{ old('order.exp_date') ?? $order->exp_date}}">
        </div>
      </div>
      <div class="col-6 col-md-4 @if($order->payment_type != 'guarantee-letter') d-none @endif guarantee-letter">
        <div class="form-group">
          <label for="company">Company Name</label>
          <input type="text" name="order[company]" id="company" 
                 class="form-control"
                 placeholder="Company Name"
                 value="{{ old('order.company') ?? $order->company}}">
        </div>
      </div>
      <div class="col-6 col-md-4 @if($order->payment_type != 'guarantee-letter') d-none @endif guarantee-letter">
        <div class="form-group">
          <label for="letter_no">Letter No</label>
          <input type="text" name="order[letter_no]" id="letter_no" 
                 class="form-control"
                 placeholder="Letter No"
                 value="{{ old('order.letter_no') ?? $order->letter_no}}">
        </div>
      </div>
      <div class="col-6 col-md-4 @if($order->payment_type != 'voucher') d-none @endif voucher">
        <div class="form-group">
          <label for="voucher_no">Voucher No</label>
          <input type="text" name="order[voucher_no]" id="voucher_no" 
                 class="form-control"
                 placeholder="Voucher No"
                 value="{{ old('order.voucher_no') ?? $order->voucher_no}}">
        </div>
      </div>
    </div>
  </div>
</div>

@section('footer')  
  <script>
    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + '.' + '$2');
        }
        return x1 + x2;
    }
    $(function(){
      $('[data-mask]').inputmask();      

      $('#dates').daterangepicker({
        format: 'L',
        autoApply: true,
        @if($order->arrivals == '' || $method == 'registration')
        minDate: "{{today()->format('d/m/Y')}}",        
        @endif
        locale: {
                format: 'DD/MM/YYYY'
                },
      }).on('apply.daterangepicker', function(ev, picker) {
                var start = moment(picker.startDate.format('YYYY-MM-DD'));
                var end   = moment(picker.endDate.format('YYYY-MM-DD'));
                var diff = end.diff(start, 'days'); // returns correct number
                $('#nights').val(diff).change();
      });
    });
    jQuery(document).ready(function(){

      @if($method == 'reservation')
      $(document).on('keyup keydown', '#nama_depan, #nama_belakang', function(){
        var surname = $('#nama_belakang').val();
        var firstName = $('#nama_depan').val();
        var byname = firstName + " " + surname;
        $('#by_name').val(byname);
      });
      $(document).on('keyup keydown', '#telp', function(){
        var telp = $(this).val();
        $('#by_phone').val(telp);
      });
      @endif

      $(document).on('change', '#market_code', function(){
        var kode = $(this).val();
        
        if(kode !== 'individual' && kode !== 'other'){          
          $('#detail_market').removeClass('d-none');
          $('#detail_market #market_detail_name').html(toTitleCase(kode));
          $('#market_detail').attr('placeholder', toTitleCase(kode)+" Detail");
          $('#market_detail').attr('required', true);
        } else {
          $('#detail_market').addClass('d-none');
          $('#market_detail').attr('required', false);
        }
      });
      $(document).on('change', '#room_id', function(){
        var rtype = $(this).find(":selected").data('type');
        var bed = $(this).find(":selected").data('bed');
        var view = $(this).find(":selected").data('view');
        $('#room_type').val(rtype);
        $('#bed').val(bed);
        $('#view').val(view);
      });
      $(document).on('change', '#room_type', function(){
        var room_id = $(this).find(":selected").data('room');
        $('#room_id').val(room_id).change();
      });
      $(document).on('change', '#market_code, #room_type, #room_id, #nights', function(){
        var mcode = $('#market_code').find(':selected').val();
        var room = $('#room_id').find(':selected').val();
        var rtype = $('#room_type').find(':selected').val();
        var nights = $('#nights').val();
        // console.log('Kode:'+mcode+";Room:"+room+';Type:'+rtype);
        if(mcode != '' && room != '' & rtype != ''){
          $.ajax({
            url: "{{ route('get.price') }}",
            data:{
              mcode:mcode,
              room:room,
              rtype:rtype
            },
            success:function(msg){
              // console.log(msg);
              var tprice = msg * nights;
              $('#price').val(tprice);
              $('#rates').val("Rp. " + addCommas(msg));
              $('#price_text').val("Rp. " + addCommas(tprice));
            }
          })
        }
      });
      $(document).on('change', '#payment_type', function(){
        var ptype = $(this).find(':selected').val();
        if(ptype == 'cash'){
          $('.other').addClass('d-none');
          $('#payment_detail').val('');
          $('.credit-card').addClass('d-none');
          $('#card_no').val('');
          $('#exp_date').val('');
          $('.guarantee-letter').addClass('d-none');
          $('#company').val('');
          $('#letter_no').val('');
          $('.voucher').addClass('d-none');
          $('#voucher_no').val('');
        }
        if(ptype == 'other'){
          $('.other').removeClass('d-none');

          $('.credit-card').addClass('d-none');
          $('#card_no').val('');
          $('#exp_date').val('');
          $('.guarantee-letter').addClass('d-none');
          $('#company').val('');
          $('#letter_no').val('');
          $('.voucher').addClass('d-none');
          $('#voucher_no').val('');
        } 
        if(ptype == 'credit-card'){
          $('.credit-card').removeClass('d-none');

          $('.other').addClass('d-none');
          $('#payment_detail').val('');
          $('.guarantee-letter').addClass('d-none');
          $('#company').val('');
          $('#letter_no').val('');
          $('.voucher').addClass('d-none');
          $('#voucher_no').val('');
        }
        if(ptype == 'guarantee-letter'){
          $('.guarantee-letter').removeClass('d-none');

          $('.credit-card').addClass('d-none');
          $('#card_no').val('');
          $('#exp_date').val('');
          $('.other').addClass('d-none');
          $('#payment_detail').val('');
          $('.voucher').addClass('d-none');
          $('#voucher_no').val('');
        }
        if(ptype == 'voucher'){
          $('.voucher').removeClass('d-none');

          $('.credit-card').addClass('d-none');
          $('#card_no').val('');
          $('#exp_date').val('');
          $('.other').addClass('d-none');
          $('#payment_detail').val('');
          $('.guarantee-letter').addClass('d-none');
          $('#company').val('');
          $('#letter_no').val('');
        }
      });
      @if($method == 'registration')
      $(document).on('change', '#country', function(){
        var country = $(this).val();
        if(country != 98){
          $('#city_text').removeClass('d-none');
          $('#city_name').attr('name', 'guest[kota]');
          $('#city_name').attr('required', true);
          $('#city_select').addClass('d-none');
          $('#kota').attr('name', '');
          $('#kota').attr('required', false);
        }
      });
      $(document).on('keyup keydown', '#deposit_text', function(){
        var val = $(this).val();        
        var nmb = parseInt(val.replace(/\D/g,''));
        $('#deposit').val(nmb);
      });
      $(document).on('submit', '#formRegister', function(e){
        var depo = $('#deposit').val();
        if(depo < 1){
          e.preventDefault();
          Swal.fire(
            'Deposit Kosong?',
            'Silahkan masukkan jumlah deposito!',
            'error'
          )
        }
      });
      @endif
    });
  </script>
@endsection
