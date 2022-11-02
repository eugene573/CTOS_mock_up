<<<<<<< HEAD
@extends('auth.layout')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ url('css/update.css') }}">
<center>
=======
@extends('layout')
@include('sidenav')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/update.css') }}">
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
<main class="register-form">
  <div class="cotainer" style="overflow-x:hidden">
  <div class="row justify-content-left ml-5">
          <div class="col-md-10">
            <br>
<<<<<<< HEAD
            <div class="column" style="width: 80%;">
             <h3 style="color:black;">Update Profile</h3>
             <br>
             @foreach($users as $user)
                 <form method="POST" action="{{ route('profile.update',['id'=>$user->id])  }}">
                    {{ csrf_field() }}
              
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Your Full Name"
=======
            <div class="column">
             <h3 style="color:black;">Update Profile</h3>
         
             @foreach($users as $user)
                 <form method="POST" action="{{ route('profile.update',['id'=>$user->id])  }}">
                    {{ csrf_field() }}
            <div class="column" style=" float: left;width: 20%;margin-left:20px; padding-top:20px;">
                    <div class="form-group">
                        <label for="name">Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name"
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                         id="name" name="name"  value="{{$user->name}}"  required autofocus>
 
                    </div>

                    <div class="form-group" style="margin-top:20px;">
                        <label for="username">User Name :</label>
<<<<<<< HEAD
                        <input type="text" class="form-control" placeholder="Enter Your User Name"
=======
                        <input type="text" class="form-control" placeholder="Enter Full Name"
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                         id="username" name="username"  value="{{$user->username}}"  required autofocus>
 
                    </div>

                    <div class="form-group"  style="margin-top:20px;">
                        <label for="email">Email :</label>
<<<<<<< HEAD
                        <input type="email" class="form-control" placeholder="Enter Your Email" 
=======
                        <input type="email" class="form-control" placeholder="Email" 
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                        id="email" name="email"  value="{{$user->email}}" required autofocus>
 
                    </div>
                    
                    <div class="form-group" style="margin-top:20px;">
                        <label for="contactNumber">Phone Number :</label>
<<<<<<< HEAD
                        <input type="tel" class="form-control" placeholder="Enter Your Contact Number" 
=======
                        <input type="tel" class="form-control" placeholder="Contact Number" 
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                        id="handphone_number" name="handphone_number" 
                        pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}"  value="{{$user->handphone_number}}" required autofocus>
                        <p style="margin:1px;font-size:9px;">*Format: 123-4567890</p>

                    </div> 

                    <div class="form-group" style="margin-top:20px;">
                        <label for="ic">IC Number :</label>
                        <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  value="{{$user->ic}}" required autofocus>

                    </div> 
<<<<<<< HEAD

                    <div class="form-group" style="margin-top:20px;">
                        <label for="bank_account_number1">Bank Account No.1 :</label>
                        <input type="text" class="form-control" placeholder="Enter Your Bank Account Number"
=======
</div>
<div class="column" style=" float: left;width: 20%;margin-left:30px;">
                    <div class="form-group" style="margin-top:20px;">
                        <label for="bank_account_number1">Bank Account Number 1 :</label>
                        <input type="text" class="form-control" placeholder="Bank Account Number 1"
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                         id="bank_account_number1" name="bank_account_number1"  value="{{$user->bank_account_number1}}"  required autofocus>
 
                    </div>
                    
                    <div class="form-group" style="margin-top:20px;">
<<<<<<< HEAD
                        <label for="bank_account_number2">Bank Account No.2 :</label>
                        <input type="text" class="form-control" placeholder="Enter Your Bank Account Number"
=======
                        <label for="bank_account_number2">Bank Account Number 2 :</label>
                        <input type="text" class="form-control" placeholder="Bank Account Number 2"
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                         id="bank_account_number2" name="bank_account_number2"  value="{{$user->bank_account_number2}}">
 
                    </div>

                    <div class="form-group" style="margin-top:20px;">
<<<<<<< HEAD
                        <label for="bank_account_number3">Bank Account No.3 :</label>
                        <input type="text" class="form-control" placeholder="Enter Your Bank Account Number"
=======
                        <label for="bank_account_number3">Bank Account Number 3 :</label>
                        <input type="text" class="form-control" placeholder="Bank Account Number 3"
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                         id="bank_account_number3" name="bank_account_number3"  value="{{$user->bank_account_number3}}">
 
                    </div>

<<<<<<< HEAD
=======
                    

>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                    <div class="form-group"   style="margin-top:20px;">
                        <label for="gender">Gender :</label><br>
                        <input type="radio" id="male" name="gender"
                        style="vertical-align: middle; margin-bottom:2px;"  value="Male" required >
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp;
                        <input type="radio" id="female" name="gender"
                        style="vertical-align: middle;margin-bottom:2px;margin-left:5px;"  value="Female"required>
                        <label for="female" style="font-size:14px;">Female</label>
                    </div>
<<<<<<< HEAD
       <br>
                    <center><button type="submit" class="btn btn-primary" onClick="return confirm('Are you sure to edit your profile?')">Submit</button></center>
                 
                </form>
=======
       
                    <div class="form-group" style="text-align:right;"><br>
                        <button  type="submit" class="btn btn-primary">Submit</button>
                    </div>
    
   </div>
</div>      </form>
         
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                @endforeach
        </div>
        </div>
        </div>
        </div>
<<<<<<< HEAD
  </main>
        </center>
     <br>
=======
        </main>
        <br><br>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
        @endsection