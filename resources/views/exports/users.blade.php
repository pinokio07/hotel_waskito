<table>
  <thead>
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama Lengkap</th>
      <th>JK</th>
      <th>Kelas</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($users as $user)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$user->nis}}</td>
        <td>{{$user->nama}}</td>
        <td>{{$user->jenis_kelamin}}</td>
        <td>{{$user->kelas}}</td>
        <td>{{$user->role}}</td>
      </tr>
    @empty      
    @endforelse
  </tbody>
</table>