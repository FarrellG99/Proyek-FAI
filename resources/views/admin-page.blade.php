@extends("layout")

@section("isipage")
  <div class="container">
    <p>
      <h5 style="font-weight:bold;">List Mobil - Rental Mobil Angkasa</h5>
      <br>
      <table class='table table-splitted'>
        @foreach($arrmobil as $rowmobil)
            <tr>
                <td>{{ $rowmobil->platnomor }}</td>
                <td>{{ $rowmobil->namamobil }}</td>
                <td>{{ $rowmobil->warna }}</td>
                <td>{{ $rowmobil->tahunmobil }}</td>
                <td>{{ $rowmobil->hargamobil }}</td>
                <td>{{ $rowmobil->status }}</td>

                @if ($rowmobil->status == "Aktif") 
                  <td><a href="{{ url("nonaktifkanmobil/".$rowmobil->platnomor) }}"><input type='button' class='btn btn-success' value='NonAktifkan Mobil'></a></td>
                @else 
                <td><a href="{{ url("aktifkanmobil/".$rowmobil->platnomor) }}"><input type='button' class='btn btn-danger' value='Aktifkan Mobil'></a></td>
                @endif
            </tr>
        @endforeach
      </table>
      <br><br>
      <h5 style="font-weight:bold;">Input Mobil Baru</h5><br>
      <form action="/post_tambahmobil" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">  
              @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
              @endif
          </div>
        </div>


        <div class="form-row">
          <div class="col-md-4 form-group">
            Plat Nomor Mobil
            <input type="text" name="plattxt" class="form-control" placeholder="L2020BEB"><br>
            Nama Mobil
            <input type="text" name="namamobiltxt" class="form-control" placeholder="Toyota Avanza Veloz 2020"><br>
            Warna
            <input type="text" name="warnatxt" class="form-control" placeholder="Silver"><br>
            Tahun Mobil
            <input type="text" name="tahuntxt" class="form-control" placeholder="2020"><br>
            Harga Sewa @ hari
            <input type="text" name="hargatxt" class="form-control" placeholder="125000"><br>
            Kondisi Mobil
            <input type="file" name="fotomobil" class="form-control" placeholder=""><br>
            <button type="submit" class="btn-info" style="border:0; border-radius:50px; width: 200px; height: 50px;">Tambah Mobil</button><br>
          </div>
          </div>
      </form>
      </div>
    </p>
  </div>
@endsection
