@extends("layout")

@section("isipage")
  <div class="container">
    <p>
      <h5 style="font-weight:bold;">List Users - Rental Mobil Angkasa</h5>
      <br>
      <table class='table table-splitted'>
        <tr>
          <td>Username</td>
          <td>Name</td>
          <td>Alamat</td>
          <td>Kota</td>
          <td>Nomer HP</td>
          <td>Status</td>
          <td>Action</td>
        </tr>
        @foreach($arruser as $row)
            @if ($row->username != "admin")
                <tr>
                    <td>{{ $row->username }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->kota }}</td>
                    <td>{{ $row->nohp }}</td>
                    <td>{{ $row->status }}</td>

                    @if ($row->status == "Aktif") 
                        <td><a href="{{ url("nonaktifkanuser/".$row->username) }}"><input type='button' class='btn btn-success' value='NonAktifkan User'></a></td>
                    @else 
                        <td><a href="{{ url("aktifkanuser/".$row->username) }}"><input type='button' class='btn btn-danger' value='Aktifkan User'></a></td>
                    @endif
                </tr>
            @endif
        @endforeach
      </table>
      <br><br>
    </p>
  </div>
@endsection
