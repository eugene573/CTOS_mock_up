@extends('layout')
@include('sidenav')
@section('content')
<style>
.card-header{
    font-size:16px;
    font-weight:bold;
    }   
label{
    font-weight:bold;
}
<<<<<<< HEAD
</style>

=======
.row{
        margin-right:0 !important;
    }
</style>
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
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
<main class="register-form">
  <div class="cotainer"><br>
      <div class="row justify-content-left ml-5">
          <div class="col-md-6" >
<<<<<<< HEAD
              <div class="card" style="height:450px;width:450px;">
=======
          @if(Session::has('error'))
            <center><div class="alert" style="background-color:#F83030;">
                <span class="check"><i class="material-icons" style="font-size:20px;color:white;">error</i></span>
                <span class="msg"  style="color:white;">{{Session::get('error')}}</span>
                <span class="crose" data-dismiss="alert">&times;</span>
            </div></center>
        @endif
              <div class="card" style="height:550px;width:850px;">
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                  <div class="card-header">Edit Blacklisted Person</div>
                  <div class="card-body">
                  @foreach($blacklists as $blacklist)
                  <form action="{{ route('blacklist.update',['id'=>$blacklist->id]) }}" method="POST">
                          @csrf
<<<<<<< HEAD
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="name" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important; color:black;">Name</label>
=======
                 <div class="column" style=" float: left;width: 50%;">
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="name" class="col-md-4 col-form-label text-md-left"style="margin-right: -30px !important;">Name</label>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                              <div class="col-md-7">
                                  <input type="text" id="name" class="form-control" name="name" value="{{$blacklist->name}}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
<<<<<<< HEAD
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="reason" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important; color:black;">Reason</label>
=======
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Email</label>
                              <div class="col-md-7">
                                  <input type="text" id="email" class="form-control" name="email" value="{{$blacklist->email}}">
                              </div>
                          </div> 

                          <div class="form-group row">
                              <label for="handphone_number" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Contact Number</label>
                              <div class="col-md-7">
                                  <input type="text" id="handphone_number" class="form-control" name="handphone_number" 
                                   pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" value="{{$blacklist->handphone_number}}">
                              </div>
                          </div> 

                 <div class="form-group row" >
                        <label for="ic" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">IC Number</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" value="{{$blacklist->ic}}" required autofocus>
                </div>
                    </div> 

                    <div class="form-group row" >
                        <label for="bank_account_number1" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Bank Account Number 1</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number1" name="bank_account_number1"
                        style="margin-top:10px;" value="{{$blacklist->bank_account_number1}}" required autofocus>
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number2" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Bank Account Number 2</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number2" name="bank_account_number2"
                        style="margin-top:10px;" value="{{$blacklist->bank_account_number2}}"   >
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number3" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Bank Account Number 3</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number3" name="bank_account_number3"
                        style="margin-top:10px;" value="{{$blacklist->bank_account_number3}}"  >
                </div>
</div>
</div>
            <!-- Column 2 -->
            <div class="column" style=" float: left;width: 50%;">
                    <div class="form-group row"  style="margin-top:20px;">
                        <label for="gender" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Gender</label>
                        <div class="col-md-7">
                        <input type="radio" id="male" name="gender"
                        style="margin-top:10px;margin-bottom:5px;" value="Male" required>
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
                        <input type="radio" id="female" name="gender"
                        style="margin-left:5px;margin-bottom:5px;" value="Female" required>
                        <label for="female" style="font-size:14px;">Female</label>
</div>
                    </div>
                       
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="reason" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important;">Reason</label>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                              <div class="col-md-7">
                                  <textarea type="text" id="reason" class="form-control" name="reason"
                                  style="height:100px; font-size:14px;"  value="{{$blacklist->reason}}" required autofocus></textarea >
                                  @if ($errors->has('reason'))
                                      <span class="text-danger">{{ $errors->first('reason') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
<<<<<<< HEAD
                              <label for="remark" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Remark</label>
=======
                              <label for="remark" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Remark</label>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                              <div class="col-md-7">
                                  <textarea type="text" id="remark" class="form-control" name="remark" value="{{$blacklist->remark}}"></textarea >
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" style="float:right;width:80px;">
                                  Update
                              </button>
                          </div>
<<<<<<< HEAD
                      </form>
                      @endforeach

                      <div class="error-messeges" style="background-color:red;color:white;margin-top:15px;
                        font-size:14px;padding-left:5px;padding-right:5px; width:max-content;margin-top:50px;">
                      {!! session()->get('error') !!}
                      </div>
=======
</div>
                      </form>
                      @endforeach
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection