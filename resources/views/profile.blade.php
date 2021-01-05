@extends("layout")

@section("isipage")
  <form method='post' action='/post_profile'>
  @csrf
  <div class="container">
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
      <div class="row">
        <div class="col-md-2">
          <h4>Username  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Username" name="usernametxt" value="{{ Auth::User()->username }}" readonly='readonly'>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Nama  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Nama" name="nametxt" value="{{ Auth::User()->name }}">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Email  : </h4>
        </div>
        <div class="col-md-4">
          <input type="email" class="form-control" placeholder="Email" name="emailtxt" value="{{ Auth::User()->email }}">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>No Hp  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="No Hp" name="phonetxt" value="{{ Auth::User()->nohp }}">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Alamat  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Alamat" name="alamattxt" value="{{ Auth::User()->alamat }}">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Kota  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Kota" name="kotatxt" value="{{ Auth::User()->kota }}">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <input type='submit' class="btn btn-success form-control" value="Update Profile">
        </div>
      </div>
  </div>
  </form>
@endsection
