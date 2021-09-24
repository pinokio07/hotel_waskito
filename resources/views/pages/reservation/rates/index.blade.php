@extends('layouts.master')
@section('title') Room Rates @endsection
@section('page_name') Room Rates @endsection

@section('content')  
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Room Rates</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-sm" style="width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>Room Type</th>
                  <th>F.I.T</th>
                  <th>Group (10%)</th>
                  <th>Government (12%)</th>
                  <th>Company (8%)</th>
                  <th>Travel (15%)</th>
                  <th>Airlines (5%)</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($rates as $rate)
                  <tr>
                    <td>{{$rate->roomtype->nama}}</td>
                    <td class="text-right @if($rate->individual == '') bg-light @endif">
                      @if($rate->individual != '')
                        Rp. {{number_format($rate->individual, 0, ',', '.')}}
                      @endif
                    </td>
                    <td class="text-right @if($rate->group == '') bg-light @endif">
                      @if($rate->group != '')
                        Rp. {{number_format($rate->group, 0, ',', '.')}}
                      @endif
                    </td>
                    <td class="text-right @if($rate->government == '') bg-light @endif">
                      @if($rate->government != '')
                        Rp. {{number_format($rate->government, 0, ',', '.')}}
                      @endif
                    </td>
                    <td class="text-right @if($rate->company == '') bg-light @endif">
                      @if($rate->company != '')
                        Rp. {{number_format($rate->company, 0, ',', '.')}}
                      @endif
                    </td>
                    <td class="text-right @if($rate->travel == '') bg-light @endif">
                      @if($rate->travel != '')
                        Rp. {{number_format($rate->travel, 0, ',', '.')}}
                      @endif
                    </td>
                    <td class="text-right @if($rate->airlines == '') bg-light @endif">
                      @if($rate->airlines != '')
                        Rp. {{number_format($rate->airlines, 0, ',', '.')}}
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
@endsection