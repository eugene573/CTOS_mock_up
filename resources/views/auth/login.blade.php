@extends('layout')
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login</div>
                  <div class="card-body">
  
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                              <input type="email" id="email_address" class="form-control" name="email" placeholder="Email" required @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" required @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <a href="{{ route('forget.password.get') }}">Reset Password</a>
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>

                      <div class="error-messeges" style="background-color:red;color:white;margin-top:15px;
                        font-size:14px;padding-left:5px; width:max-content;">
                      {!! session()->get('error') !!}
                      </div>  
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection