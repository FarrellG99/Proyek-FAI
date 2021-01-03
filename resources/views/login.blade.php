@extends("layout")

@section("isipage")
  <form method='post' action='/post_login'>
  @csrf
  <div class="container">
      <div class="row">
        <div class='col-md-6'>
          <h5>{{ $message }}</h5>
        </div>
      </div>
      <br>
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
          <h4>Password  : </h4>
        </div>
        <div class="col-md-4">
          <input type="password" class="form-control" placeholder="Password" name="passwordtxt">
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-3">
          <input type='submit' class="btn btn-success form-control" value="Login User">
        </div>
      </div>
  </div>
  </form>
  <br><br><br><br><br>
@endsection
