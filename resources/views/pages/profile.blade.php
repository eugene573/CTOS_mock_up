@extends('layout')
@include('sidenav')
@section('content')
<style>
*{
   margin:0;
}
.title {
    font-family: "angle", serif; 
}
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
                <table>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>:&nbsp</td>
                            <td>ImDezCode</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:&nbsp </td>
                            <td>imdezcode@gmail.com</td>
                        </tr>
                        <tr>
                            <td style="width:200px;">Phone Number</td>
                            <td>:&nbsp </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>IC</td>
                            <td>:&nbsp </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bank Account Number</td>
                            <td>:&nbsp </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bank Company</td>
                            <td>:&nbsp </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:&nbsp </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:&nbsp </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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