@extends("layout")

@section("isipage")
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <table class='table table-splitted'>
                @php $ada = 0 @endphp 
                @foreach($arrbooking as $row) 
                    @foreach($arruser as $rowuser)
                        @if($row->username == $rowuser->username && $row->username == Auth::User()->username)
                            @foreach($arrmobil as $rowmobil)
                                @if($rowmobil->platnomor == $row->platnomor)
                                    @php $skrg = date("Y-m-d") @endphp

                                    @if($skrg <= $row->akhir)
                                        @php $ada+=1 @endphp
                                        <tr>
                                            <td>
                                                <h6>Nota : {{ $row->id }}</h6>
                                                <h5>{{ strtoupper($rowuser->name) }}</h5>
                                                <h6>{{ strtoupper($rowuser->alamat) }}</h6>
                                                <h6>{{ strtoupper($rowuser->kota) }}</h6>
                                            </td>
                                            <td>
                                                <h4>{{ $rowmobil->namamobil }}</h4>
                                                <h6>{{ $rowmobil->platnomor }}</h6>
                                                @if ($skrg < $row->awal)
                                                    <h6 style='color:red;'>Belum Berjalan</h6>
                                                @elseif ($skrg < $row->akhir)
                                                    <h6 style='color:red;'>Sedang Berjalan</h6>
                                                @else 
                                                    <h6>&nbsp;</h6>
                                                @endif
                                            </td>
                                            <td>
                                                <h6>Tanggal awal : <h6>
                                                <h5>{{ date("d M Y", strtotime($row->awal)) }}</h5>
                                            </td>
                                            <td>
                                                <h6>Tanggal akhir : <h6>
                                                <h5>{{ date("d M Y", strtotime($row->akhir)) }}</h5>
                                            </td>
                                            <td>
                                                @php 
                                                    $start_date     = new DateTime($row->awal);
                                                    $end_date       = new DateTime($row->akhir);
                                                    $since_start    = $start_date->diff($end_date);
                                                    $tot            = $since_start->days;
                                                    $total = $row->hargamobil * $tot; 
                                                @endphp 
                                                <h5>Rp. {{ $total }}</h5>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach

                @if ($ada == 0) 
                    <tr>
                        <td><h4>no booking transaction for now</h4></td>
                    </tr>
                @endif
            </table>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
@endsection