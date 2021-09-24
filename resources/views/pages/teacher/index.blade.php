@extends('layouts.master')
@section('title') Student Report @endsection
@section('page_name') Student Report @endsection

@section('content')
<?php $days = \Carbon\Carbon::now()->daysInMonth; ?>
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Student Report</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-sm table-striped" style="width: 100%;" id="tableStudent">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>NIS</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Class</th>
                  <th>Total Res</th>
                  <th>Total Reg</th>
                  <th>Total Revenue</th>
                  <th>Canceled</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$user->nis}}</td>
                    <td>{{$user->nama}}</td>
                    <td class="text-center">{{$user->jenis_kelamin}}</td>
                    <td class="text-center">{{$user->kelas}}</td>
                    <td class="text-center">{{$user->reservation}}</td>
                    <td class="text-center">{{$user->registration}}</td>
                    <td class="text-center">Rp. {{number_format($user->revenue, 0, ',', '.')}}</td>
                    <td class="text-center">{{$user->canceled}}</td>
                    <td class="text-center">
                      <button class="btn btn-xs btn-info elevation-2 detail"
                              data-toggle="modal"
                              data-target="#modalDetail"
                              data-id="{{$user->id}}">Details</button>
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

  <!-- Modal Detail -->
  <div class="modal fade" id="modalDetail">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>        		
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-sm" style="width: 100%;">
              <thead>
                <tr>
                  <th>Room</th>
                  <th>Guest Name</th>
                  <th>Arrival</th>
                  <th>Departure</th>
                  <th>Status</th>
                  <th>Revenue</th>
                </tr>
              </thead>
              <tbody id="hasil">

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default elevation-2" data-dismiss="modal">Close</button>
        </div>		
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('footer')
  <script>
    $('#tableStudent').DataTable();

    jQuery(document).ready(function(){
      $(document).on('click', '.detail', function(){
        var id = $(this).data('id');

        $.ajax({
          url: "{{ route('get.detail') }}",
          type: "GET",
          data:{
            id:id
          },
          success:function(msg){
            $('#hasil').html(msg);
          }
        })
      });
    });
  </script>
@endsection