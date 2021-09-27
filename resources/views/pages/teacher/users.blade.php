@extends('layouts.master')
@section('title') User Lists @endsection
@section('page_name') User Lists @endsection

@section('content')
<?php $days = \Carbon\Carbon::now()->daysInMonth; ?>
@if (count($errors) > 0)
<div class="row">
  <div class="col-12">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
  </div>
</div>
@endif 
  <!-- Main row -->
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">User Lists</h3>
          <div class="card-tools">
            <a href="{{route('users.create')}}" class="btn btn-tool">
              <i class="fas fa-plus"></i> Add
            </a>
            <a href="{{route('users.export')}}" class="btn btn-tool">
              <i class="fas fa-download"></i> Download
            </a>
            <button class="btn btn-tool" data-toggle="modal" data-target="#modalUpload">
              <i class="fas fa-upload"></i> Upload
            </button>
          </div>
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
                    <td class="text-center">{{$user->kelas ?? "GURU"}}</td>
                    <td class="text-center">
                      <a data-href="{{ route('users.reset', ['user' => $user->id]) }}" class="btn btn-xs btn-success elevation-2 reset">
                        <i class="fas fa-sync"> Reset</i></a>
                      <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-xs btn-warning elevation-2">
                        <i class="fas fa-edit"></i> Edit</a>
                      <a data-href="{{ route('users.destroy', ['user' => $user->id]) }}" class="btn btn-xs btn-danger elevation-2 delete">
                          <i class="fas fa-trash"></i> Delete</a>
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

  <!-- Modal Upload -->
  <div class="modal fade" id="modalUpload">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload Users</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('users.import') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="file_import">File to Upload</label>
              <input type="file" name="file_import" id="file_import" 
                     class="form-control"
                     accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                     required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default elevation-2" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success elevation-2">Upload</button>
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
    $('#tableStudent').DataTable();
    
    $(document).on('click', '.reset', function(){
      var link = $(this).data('href');

      Swal.fire({
      title: 'Are you sure?',
      text: "This user password will be reset to rahasia!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reset it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location=link;
      }
    })
    });
  </script>
@endsection