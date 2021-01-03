@extends("layout")

@section("isipage")
    <div class="container">
      <div class="row">

      @foreach($arrmobil as $row) 
          <div class="col-md-4">
              <div class="card">
                <img src="{{ URL::to('mobil/'.$row->foto) }}" width='100%' height='250px'>
              <div class="card-body">
                  <h5 class="card-title">{{ $row->namamobil }}</h5>
                  <p class="card-text"></p>
                  <a href="{{ url("viewdetail/$row->platnomor") }}" class="btn btn-primary">View Detail</a>
              </div>
              </div>
          </div>
      @endforeach
      </div>
    </div>
@endsection