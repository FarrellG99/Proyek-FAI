@extends("layout")

@section("isipage")
  <form method='post' action='/post_register'>
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
          <input type="text" class="form-control" placeholder="Username" name="usernametxt">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Nama  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Nama" name="nametxt">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Email  : </h4>
        </div>
        <div class="col-md-4">
          <input type="email" class="form-control" placeholder="Email" name="emailtxt">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Password  : </h4>
        </div>
        <div class="col-md-4">
          <input type="password" class="form-control" placeholder="Password" name="passwordtxt">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>Confirm  : </h4>
        </div>
        <div class="col-md-4">
          <input type="password" class="form-control" placeholder="Confirm" name="conpasswordtxt">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <h4>No Hp  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="No Hp" name="phonetxt">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <input type='submit' class="btn btn-success form-control" value="Register">
        </div>
      </div>
  </div>
  </form>
@endsection
