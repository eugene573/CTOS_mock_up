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
</style>

<main class="register-form">
  <div class="cotainer"><br>
      <div class="row justify-content-left ml-5">
          <div class="col-md-6" >
          @if(Session::has('error'))
            <center><div class="alert" style="background-color:#F83030;">
                <span class="check"><i class="material-icons" style="font-size:20px;color:white;">error</i></span>
                <span class="msg"  style="color:white;">{{Session::get('error')}}</span>
                <span class="crose" data-dismiss="alert">&times;</span>
            </div></center>
        @endif
              <div class="card" style="height:550px;width:850px;">
                  <div class="card-header">Edit Blacklisted Person</div>
                  <div class="card-body">
                  @foreach($blacklists as $blacklist)
                  <form action="{{ route('blacklist.update',['id'=>$blacklist->id]) }}" method="POST">
                          @csrf
                 <div class="column" style=" float: left;width: 50%;">
                          <div class="form-group row" style="margin-top:15px;">
                              <label for="name" class="col-md-4 col-form-label text-md-left"style="margin-right: -30px !important;">Name</label>
                              <div class="col-md-7">
                                  <input type="text" id="name" class="form-control" name="name" value="{{$blacklist->name}}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Email</label>
                              <div class="col-md-7">
                                  <input type="text" id="email" class="form-control" name="email">
                              </div>
                          </div> 

                          <div class="form-group row">
                              <label for="handphone_number" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Contact Number</label>
                              <div class="col-md-7">
                                  <input type="text" id="handphone_number" class="form-control" name="handphone_number"  pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}">
                              </div>
                          </div> 

                 <div class="form-group row" >
                        <label for="ic" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">IC Number</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" required autofocus>
                </div>
                    </div> 

                    <div class="form-group row" >
                        <label for="bank_account_number1" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Bank Account Number 1</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number1" name="bank_account_number1"
                        style="margin-top:10px;" required autofocus>
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number2" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Bank Account Number 2</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number2" name="bank_account_number2"
                        style="margin-top:10px;"  >
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number3" class="col-md-4 col-form-label text-md-left" style="margin-right: -30px !important;">Bank Account Number 3</label>
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number3" name="bank_account_number3"
                        style="margin-top:10px;"  >
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
                              <div class="col-md-7">
                                  <textarea type="text" id="reason" class="form-control" name="reason"
                                  style="height:100px; font-size:14px;"  value="{{$blacklist->reason}}" required autofocus></textarea >
                                  @if ($errors->has('reason'))
                                      <span class="text-danger">{{ $errors->first('reason') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="remark" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Remark</label>
                              <div class="col-md-7">
                                  <textarea type="text" id="remark" class="form-control" name="remark" value="{{$blacklist->remark}}"></textarea >
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary" style="float:right;width:80px;">
                                  Update
                              </button>
                          </div>
</div>
                      </form>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection