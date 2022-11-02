<<<<<<< HEAD
@extends('auth.layout')
@section('content')

<br><br><br>

<center>
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
=======
@extends('layout')
@include('sidenav')
@section('content')

<main class="register-form">
  <div class="container" style="overflow-x:hidden;margin-top:30px;">
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
  <div class="row justify-content-left ml-5">
          <div class="col-md-10">

          @if(Session::has('error'))
<<<<<<< HEAD
           <div class="alert" style="background-color:#F83030;">
                <span class="check"><i class="fa fa-exclamation-circle" style="font-size:20px;color:white;"></i></span>
=======
            <div class="alert" style="background-color:#F83030;">
                <span class="check"><i class="fa fa-exclamation-circle" style="font-size:20px;color:white; justify-content: center;"></i></span>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                <span class="msg"  style="color:white;">{{Session::get('error')}}</span>
                <span class="crose" data-dismiss="alert" style="font-size:20px;">&times;</span>
            </div>
        @endif
<<<<<<< HEAD
           
            <div class="validation-message" style="width: 30%;"><?php if(isset($message)) { echo $message; } ?> </div>
             <h3 style="color:black;">Change Password</h3>
=======
          
            <div class="validation-message" style="width: 30%;"><?php if(isset($message)) { echo $message; } ?> </div>
             <h3 style="color:black; width:fit-content;">Update Password</h3>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
             <br>
             @foreach($users as $user)
                 <form  name="frmChange" method="POST" action="{{ route('password.update')  }}"  onSubmit="return validatePassword()">
                    @csrf
                    <input type="hidden" id="userID" name="userID" value="{{Auth()->user()->id}}">
              
<<<<<<< HEAD
                    <div class="form-group">
                        <label class="inline-block">Please Enter The New Password :</label>
                        <br>
                        <span id="password"  
                    class="validation-message" style="color:red;"></span><input type="password" name="password"
                        class="full-width"  required autofocus>
=======
                    <div class="form-group"> 
                     
                        <label class="inline-block">Please enter the new password :</label>
                        <br>
                        <span id="password"  
                    class="validation-message" style="color:red;"></span> &nbsp;   
                    <input type="password" id="password" name="password" class="full-width"  required autofocus>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2

                    </div>

                    <div class="form-group"  style="margin-top:20px;">
<<<<<<< HEAD
                        <label class="inline-block">Confirm Your New Password :</label>
                        <br>
                        <span id="confirmPassword"
                        class="validation-message" style="color:red;"></span><input
                        type="password" name="confirmPassword"
=======
                   
                        <label class="inline-block">Confirm your new password :</label>
                        <br>
                        <span id="confirmPassword"
                        class="validation-message" style="color:red;"></span>&nbsp;
                        <input type="password" name="confirmPassword" id="confirmPassword"
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                        class="full-width"  required autofocus>
                    </div>
                    
                   <br>
<<<<<<< HEAD
                        <center><button type="submit" class="btn btn-primary" onClick="return confirm('Are you sure to change your password?')">Submit</button></center>
=======
                   &nbsp;&nbsp; <button type="submit" class="btn btn-primary" onClick="return confirm('Are you sure to change your password?')">Submit</button>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                    
     </div>
                </form>
                @endforeach
        </div>
        </div>
        </div>
        </div>
<<<<<<< HEAD
    </main>
        </center>
        <br><br><br><br>
=======
        </main>
        <br><br>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
        @endsection