@extends("layout")

@section("isipage")
  <div class="container">
    <p>
      <h3>Welcome, Administrator !</h3><br>
      {{-- @php
          dd($arrmobil);
      @endphp --}}
      <h5>List Mobil - Rental Mobil Angkasa</h5>
      <table class='table table-splitted'>
        @foreach($arrmobil as $rowmobil)
            <tr>
                <td>{{ $rowmobil->platnomor }}</td>
                <td>{{ $rowmobil->namamobil }}</td>
                <td>{{ $rowmobil->warna }}</td>
                <td>{{ $rowmobil->tahunmobil }}</td>
                <td>{{ $rowmobil->status }}</td>
            </tr>
        @endforeach
      </table>
      <br>
      <h5>Input Mobil Baru</h5><br>
      <form action="/post_tambahmobil" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
          @foreach ($errors->all() as $error)
              <div>{{ $error }}</div><br>
          @endforeach
        @endif
        @if (session()->has('message'))
          <h3>{{ session()->get('message') }}</h1>
        @endif
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
            Kondisi Mobil
            <input type="file" name="fotomobil" class="form-control" placeholder="2020"><br>
            <button type="submit" class="btn-info" style="border:0; border-radius:50px; width: 200px; height: 50px;">Tambah Mobil</button><br>
          </div>
          </div>
        </form>
      </div>
    </p>
  </div>
@endsection
