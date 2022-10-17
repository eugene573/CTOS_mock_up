@extends('layout')
@include('sidenav')
@section('content')
<style>

</style>
<br>
<div class="profile">
    <div class="container">
        <div class="card">
            <div class="card-header bg-transparent text-center">
            <h2>Profile</h2>
            </div>
            <div class="card-body"> 
        <div class="column" style=" float: left;padding-left:90px;">
            <div class="col-md-5">
            <div class="d-flex flex-column align-items-center text-center py-5">
            <label class="font-weight-bold" style="width:90px;">Hello world</label>
            <label class="text-black-50">helloword@mail.com.my</label>
            </div>
        </div>
</div>
        <div class="column" style=" float: left;">
        <div class="col-md-10 border-left">
            <div class="p-3 py-3">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="text-left" style="width:220px;">Profile Settings</h4>
                
                </div>
                    <div class="col-md-12">
                    <label class="name">Name:</label>
                </div>

                    <div class="col-md-12">
                    <label class="handphone_number">Phone Number:</label>
                </div>
                    
                <div class="col-md-12">
                    <label class="email">Email:</label>
                 </div>
                    
                <div class="col-md-12">
                    <label class="ic">IC:</label>
                  </div>
                   
                <div class="col-md-12">
                    <label class="bank_account_number">Bank Account Number:</label>
                </div>

                <div class="col-md-12">
                    <label class="bank_company">Bank Company:</label>
                </div>
                 
                <div class="col-md-12">
                  <label class="gender">Gender:</label>
                </div>
            
                <div class="col-md-12">
                 <label class="status">Status:</label>
                </div>
                </div>

            </div>
</div>
            <div class="text-right" style="position: absolute;right:40;bottom:10;">
                <button class="btn btn-primary profile-button" type="button">Save Profile</button>
            </div>

            
        </div>
</div>
    </div>
</div>


@endsection