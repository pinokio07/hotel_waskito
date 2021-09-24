@extends('layouts.master')
@section('title') Dashboard @endsection
@section('page_name') Dashboard @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Welcome to {{Str::title(sekolah()->nama_hotel ?? '-')}} Hotel</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('slider/slider-1.jpg') }}" alt="First slide">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Outdoor Pools</h5>
                  <p class="card-text text-white pb-2 pt-1">It's Always fun to play at Outdoor Pool!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('slider/slider-2.jpg') }}" alt="Second slide">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Ocean Views</h5>
                  <p class="card-text text-white pb-2 pt-1">With Outstanding ocean Views!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('slider/slider-3.jpg') }}" alt="Third slide">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">King Bed</h5>
                  <p class="card-text text-white pb-2 pt-1">We Know what You Needs!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('slider/slider-4.jpg') }}" alt="Fourth slide">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Guest Room</h5>
                  <p class="card-text text-white pb-2 pt-1">A Place to Receive your Guest!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('slider/slider-5.jpg') }}" alt="Fifth slide">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Twin Bed</h5>
                  <p class="card-text text-white pb-2 pt-1">When you Need a Spacious Bed!</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('slider/slider-6.jpg') }}" alt="Sixth slide">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title text-primary text-white">Receptionist</h5>
                  <p class="card-text text-white pb-2 pt-1">We will give you the Best There Is!</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
              </span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row (main row) -->
@endsection