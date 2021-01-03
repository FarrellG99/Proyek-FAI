@extends("layout")

@section("isipage")
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <table class='table table-splitted'>
                @foreach($arrbooking as $row) 
                    @foreach($arruser as $rowuser)
                        @if($row->username == $rowuser->username)
                            @foreach($arrmobil as $rowmobil)
                                @if($rowmobil->platnomor == $row->platnomor)
                                    <tr>
                                        <td>
                                            <h6>Nota : {{ $row->id }}</h6>
                                            <h4>{{ strtoupper($rowuser->name) }}</h4>
                                            <h5>{{ strtoupper($rowuser->alamat) }}</h5>
                                            <h5>{{ strtoupper($rowuser->kota) }}</h5>
                                        </td>
                                        <td>
                                            <h4>{{ $rowmobil->namamobil }}</h4>
                                            <h6>{{ $rowmobil->platnomor }}</h6>
                                        </td>
                                        <td>
                                            <h6>Tanggal awal : <h6>
                                            <h4>{{ date("d F Y", strtotime($row->awal)) }}</h4>
                                        </td>
                                        <td>
                                            <h6>Tanggal akhir : <h6>
                                            <h4>{{ date("d F Y", strtotime($row->akhir)) }}</h4>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </table>
        </div>
      </div>
    </div>
@endsection