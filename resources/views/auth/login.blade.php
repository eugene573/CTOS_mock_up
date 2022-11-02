<<<<<<< HEAD
@include('refresh')

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login Page</title>
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
        <style>
            body{
                overflow-x: hidden;
                background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
            }
        </style>
    </head>
    <body>
        @if(Session::has('success'))
            <div class="alert" id="alert-success">
                <span class="check"><i class="fa fa-check-circle"></i></span>
                <span class="msg">{{Session::get('success')}}</span>
                <span class="crose" data-dismiss="alert">&times;</span>
            </div>
        @elseif(Session::has('error'))
            <div class="alert" id="alert-error">
                <span class="times"><i class="fa fa-times-circle"></i></span>
                <span class="error-msg">{{Session::get('error')}}</span>
                <span class="close" data-dismiss="alert">&times;</span>
            </div>
        @endif
        @include('refresh')
        <main class="login-form">
            <div class="container">
                <section class="vh-100 gradient-custom">
                    <div class="container py-4 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <div class="mb-md-5 mt-md-4 pd-5">
                                        <form action="{{ route('login.post') }}" method="POST">
                                            @csrf
                                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                            <p class="text-white-50 mb-5">Please enter your user name and password</p>
                                            <div class="form-group form-outline form-white mb-4">
                                                <input type="text" id="username" class="form-control form-control-lg" name="username" placeholder="User Name" required @if(Cookie::has('username')) value="{{Cookie::get('username')}}" @endif>
                                                @if ($errors->has('username'))
                                                    <span class="text-danger">{{ $error->first('username')}}</span>
                                                @endif
                                            </div>
                                            <div class="form-group form-outline form-white mb-4">
                                                <input type="password" id="password" class="form-control form-control-lg" name="password" placeholder="Password" required @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-outline form-white mb-4">
                                                <input type="checkbox" name="rememberme" @if(Cookie::has('username')) checked @endif)>Remember Me  
                                            </div>

                                            <p class="small mb-5 pb-lg-2"><a href="{{ route('forget.password.get') }}" class="text-white-50">Forgot password?</a></p>

                                            <button type="submit" class="btn btn-outline-light btn-lg px-5">Login</button>

                                            <div class="d-flex justify-content-around text-center mt-4 pt-1">
                                                <a href="#" class="text-whihte"><i class="fa fa-facebook" style="color: white;"></i></a>
                                                <a href="#" class="text-white"><i class="fa fa-twitter"></i></a>
                                                <a href="#" class="text-white"><i class="fa fa-solid fa-google"></i></a>
                                            </div>
                                            <br>
                                            <div>
                                                <p class="mb-0">Don't have an account</p> <a href="#" class="text-white-50 fw-bold">Sign Up</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>
=======
@extends('layout')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="utf-8">
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="jquery.3.4.1.js"></script>
        <script src="all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<script type="text/javascript">
$(document).on('click', '.toggle-password', function() {

$(this).toggleClass(" fa-eye fa-eye-slash");

var input = $("#password");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script>

 <main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
          @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>  
                        @endif
          @if(Session::has('error'))
            <center><div class="alert" style="background-color:#F83030;">
                <span class="check"><i class="material-icons" style="font-size:20px;color:white;">error</i></span>
                <span class="msg"  style="color:white;">{{Session::get('error')}}</span>
                <span class="crose" data-dismiss="alert">&times;</span>
            </div></center>
        @endif
              <div class="card" style="margin-top:15px;">
                  <div class="card-header">Login</div>
                  <div class="card-body">
  
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <!--<div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                              <input type="email" id="email_address" class="form-control" name="email" placeholder="Email" required @if(Cookie::has('email')) value="{{Cookie::get('email')}}" @endif>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>-->

                          <div class="form-group row">
                              <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                              <div class="col-md-6">
                              <input type="text" id="username" class="form-control" name="username" placeholder="Your Username" required @if(Cookie::has('username')) value="{{Cookie::get('username')}}" @endif>
                                  @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6" style='white-space: nowrap'>
                              <i toggle="#password-field" class="fa-fw fa fa-eye-slash field_icon toggle-password" 
                              style="position:absolute;margin-left:24rem;margin-top:0.7rem;color:grey;"></i>
                              <input type="password" id="password" class="form-control" name="password" placeholder="Password" required @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
                           
                            
                              @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

  
                          <div class="form-group row"  style="margin-bottom:10px !important;">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="rememberme" @if (Cookie::has('username')) checked @endif> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <a href="{{ route('forget.password.get') }}" style="text-decoration:none;">Forget Password?</a>
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
 
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

@endsection
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
