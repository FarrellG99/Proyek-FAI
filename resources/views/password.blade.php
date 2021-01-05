@extends("layout")

@section("isipage")
  <form method='post' action='/post_password'>
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
        <div class="col-md-3">
          <h4>Username  : </h4>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Username" name="usernametxt" value="{{ Auth::User()->username }}" readonly='readonly'>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3">
          <h4>New Password  : </h4>
        </div>
        <div class="col-md-4">
          <input type="password" class="form-control" placeholder="New Password" name="password1">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3">
          <h4>Reenter Password  : </h4>
        </div>
        <div class="col-md-4">
          <input type="password" class="form-control" placeholder="Reenter Password" name="password2">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-2">
          <input type='submit' class="btn btn-success form-control" value="Change Password">
        </div>
      </div>
  </div>
  </form>
  <br><br><br><br><br><br>
@endsection
