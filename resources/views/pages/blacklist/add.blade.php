@extends('layout')
@section('content')
<style>
.card-header{
    font-size:16px;
    font-weight:bold;
    border-radius: 2px;
    }   
label{
    font-weight:bold;
}

</style>

<main class="register-form">
  <div class="cotainer"><br>
      <div class="row justify-content-right ml-1">
          <div class="col-md-5" >
              <div class="card" style="height:750px;width:380px;background-color:white;">
                <center>  <div class="card-header" style="color:white; background-color:black;">Add Member to Blacklist</div>  </center>  
                  <div class="card-body">

                  <form action="{{ route('blacklist.post') }}" method="POST">
                          @csrf
                          <div class="column" style=" float: left;width: 50%;">
                          <div class="form-group row" style="margin-top:10px;">
                              <label for="name" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important; color:black;">Name :</label>&nbsp;
                              <div class="col-md-7">
                                <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                 <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Email :</label>&nbsp;
                              <div class="col-md-7">
                                  <input type="text" id="email" class="form-control" name="email" required>
                              </div>
                          </div> 

                          <div class="form-group row">
                              <label for="handphone_number" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Contact Number :</label>&nbsp;
                              <div class="col-md-7">
                                  <input type="text" id="handphone_number" class="form-control" name="handphone_number"  pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}" >
                              </div>
                          </div> 

                 <div class="form-group row" >
                        <label for="ic" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">IC Number :</label>&nbsp;
                        <div class="col-md-7">
                        <input type="text" class="form-control" placeholder="eg. 991114-07-7777" id="ic" name="ic"
                        pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}">
                </div>
                    </div> 

                    <div class="form-group row" >
                        <label for="bank_account_number1" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Bank Account No. 1 :</label>&nbsp;
                        <div class="col-md-7">
                        
                        <input type="text" class="form-control" id="bank_account_number1" name="bank_account_number1"
                        style="margin-top:10px;" >
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number2" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Bank Account No. 2 :</label>&nbsp;
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number2" name="bank_account_number2"
                        style="margin-top:10px;"  >
                </div>
                    </div> 
                    <div class="form-group row" >
                        <label for="bank_account_number3" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Bank Account No. 3 :</label>&nbsp;
                        <div class="col-md-7">
                        <input type="text" class="form-control" id="bank_account_number3" name="bank_account_number3"
                        style="margin-top:10px;"  >
                </div>
                    </div> 
</div>


<div class="column" style="float: right;width: 50%;">
                    <div class="form-group row"  style="margin-top:10px;">
                    &nbsp; &nbsp; &nbsp;&nbsp;<label for="gender" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Gender :</label>
                        <div class="col-md-7">
                     &nbsp;  &nbsp; <input type="radio" id="male" name="gender"
                        style="margin-top:10px;margin-bottom:5px;" value="Male" required>
                        &nbsp;   <label for="Male" style="font-size:14px; color:black;">Male</label>&nbsp
                        &nbsp;   <input type="radio" id="female" name="gender"
                        style="margin-left:5px;margin-bottom:5px;" value="Female" required>
                        &nbsp;    <label for="female" style="font-size:14px; color:black;">Female</label>
</div>
                    </div>

                          <div class="form-group row" style="margin-top:15px;">
                          &nbsp;&nbsp;&nbsp;&nbsp;  <label for="reason" class="col-md-4 col-form-label text-md-left"style="margin-right: -35px !important; color:black;">Reason :</label>
                          <div class="col-md-7">
                          &nbsp;&nbsp; <textarea type="text" id="reason" name="reason"
                                   required autofocus></textarea >
                                    @if ($errors->has('reason'))
                                  <span class="text-danger">{{ $errors->first('reason') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                          &nbsp;&nbsp;&nbsp;&nbsp;   <label for="remark" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Remark :</label>
                              <div class="col-md-7">
                              &nbsp;&nbsp; <textarea type="text" id="remark"  name="remark"  style="height:80px;" required></textarea >   
                              </div>
                          </div>

                          <div class="form-group row">
                          &nbsp;&nbsp;&nbsp;&nbsp;   <label for="social_media_account" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important; color:black;">Social Media Account :</label>
                              <div class="col-md-7">
                              &nbsp;&nbsp; <textarea type="text" id="social_media_account"  name="social_media_account"  style="height:80px;"></textarea >
                              </div>
                          </div>

                          <div class="form-group row">
                              <!-- <label for="created_by" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Created_by</label> -->
                              <div class="col-md-7">
                                  <input type="hidden" id="created_by" class="form-control" name="created_by" value="{{Auth::user()->id}}">
                              </div>
                          </div>

                          <div class="form-group row">
                              <!-- <label for="deleted_by" class="col-md-4 col-form-label text-md-left" style="margin-right: -35px !important;">Created_by</label> -->
                              <div class="col-md-7">
                                  <input type="hidden" id="deleted_by" class="form-control" name="deleted_by" value="1">
                              </div>
                          </div>
  
                          <div class="col-md-3 offset-md-2">
                          &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  <button type="submit" class="btn btn-primary" style="width:60px;">
                                  Add
                              </button>
                          </div>
</div>
                      </form>
                  

                      <div class="error-messeges" style="background-color:red;color:white;margin-top:15px;
                        font-size:14px;padding-left:5px;padding-right:5px; width:max-content;margin-top:50px;">
                      {!! session()->get('error') !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection