@extends("layout")

@section("isipage")
    <div class="container">
      <div class="row">

      @foreach($arrmobil as $row) 
          <div class="col-md-4">
              <div class="card">
                <img src="{{ URL::to('mobil/'.$row->foto) }}" width='100%' height='250px'>
              </div>
          </div>
          <div class="col-md-8">
              <div class="card">
              <div class="card-body">
                    <h3 class="card-title">{{ $row->namamobil }}</h3>
                    <br>
                    <form method='post' action='/post_booking'>
                    @csrf
                    <input type='hidden' name='platnomor' value='{{ $row->platnomor }}'>
                    <table style='width:70%;' class='table table-splitted'>
                        <tr>
                            <td>Warna : </td><td>{{ $row->warna }}</td>
                        </tr>
                        <tr>
                            <td>Tahun : </td><td>{{ $row->tahunmobil }}</td>
                        </tr>
                        <tr>
                            <td>Plat Nomor : </td><td>{{ $row->platnomor }}</td>
                        </tr>
                        @if (Auth::check()) 
                            <tr>
                                <td>Tanggal Awal : </td><td><input type='date' name='tanggalawal' class='form-control'></td>
                            </tr>
                            <tr>
                                <td>Tanggal Akhir : </td><td><input type='date' name='tanggalakhir' class='form-control'></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input type='submit' name='btnbooking' class='btn btn-danger' value='Booking Mobil'></td>
                            </tr>
                        @endif
                    </table>
                    </form>
                    <br>
                    <p class="card-text"></p>
              </div>
              </div>
          </div>
      @endforeach
      </div>
    </div>
@endsection