@extends('auth.layout')
@section('content')
<<<<<<< HEAD
<style>
    h3{
        color: black;
        text-align: center;
        margin-top: 10px;
    }
    label{
        color: black;
    }
</style>

<div class="cotainer">
    <div class="card">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h3>Create Agent</h3>
                <form action="{{ route('register.post') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
=======
<link rel="stylesheet" type="text/css" href="{{ url('css/userRegister.css') }}">
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-right ml-5">
          <div class="col-md-10">
          @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>  
                        @endif
            <br>
            <div class="column" style=" float: left; width: 20%;">
            <h5>Create Agent</h5>
            <form action="{{ route('register.post') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" id="handphone_number" name="handphone_number" value="">

            <div class="form-group">
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"  required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter User Name" id="username" name="username"  required autofocus>
                        @if ($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
            
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter User Name" id="username" name="username"  required autofocus>
                        @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                                  @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"placeholder="Email" id="email" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

<<<<<<< HEAD
                    <div class="form-group" >
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required autofocus>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
=======
            <div class="form-group" >
                <label for="password">Password:</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required autofocus>
                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
            </div>
</div>
    <!-- column 2 -->
            <div class="column" style=" float: left;width: 20%;margin-left:100px; padding-top:32px;">
            <div class="form-group">
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                        <label for="type" style="margin-bottom:5px;">Type:</label><br>
                        <input type="number" id="type" class="form-control" name="type"  value="2" min="2" max="2">
                        <p style="margin:1px;font-size:9px;">*2 = Agent</p>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="gender" name="gender" name="gender" value="Male" style="vertical-align: middle; margin-bottom:2px;">
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
<<<<<<< HEAD
                        <input type="radio" id="gender" name="gender"name="gender" value="Female" style="vertical-align: middle;margin-bottom:2px;margin-left:5px;">
                        <label for="femela" style="font-size:14px;">Female</label>
                    </div>

                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890/123-45678901</p>
                        @if ($errors->has('handphone_number'))
                                        <span class="text-danger">{{ $errors->first('handphone_number') }}</span>
                        @endif
                    </div>  

                    <div style="float:left;">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                    <div style="float:right;">
                        <button class="btn btn-danger" onclick="history.back()">Cancel</button>
                    </div>
<br><br><br>
                 
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
=======
                        <input type="radio" id="gender" name="gender"name="gender" value="Female"
                        style="vertical-align: middle;margin-bottom:2px;margin-left:5px;">
                        <label for="female" style="font-size:14px;">Female</label>
                    </div>

            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" 
                pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" required autofocus>
                <p style="margin:1px;font-size:9px;">*Format: 123-4567890/123-45678901</p>
                @if ($errors->has('handphone_number'))
                                <span class="text-danger">{{ $errors->first('handphone_number') }}</span>
                @endif
            </div>  

            <div>
                <button type="submit" class="btn btn-primary"style="width:100%">
                    Submit
                </button>
            </div>
</div>
        </form>
        
</div>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
</div>

<br>
@endsection 