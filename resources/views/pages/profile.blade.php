@extends('auth.layout')
@section('content')

<style>
    table {
        font-size:25px;
        width:200px;
}
    .trhead{
        background-color: #37758f;
        color:white;
    }

    tr:nth-child(even) {
  background-color: #f5f5f5;
}
    .card{
    width:fit-content;
    padding:28px;  
}
    .row{
        margin-right:0 !important;
    }
    </style>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-8">
        
    <div class="card">
    <center><h3 style="color:white; background-color:black;">Profile</h3></center><br>
    @foreach($users as $user)



    <div class="column" style=" float: right;">
        <div class="col-md-13 border-left">
            <div class="p-3 py-3">
                    <table>
                    <tbody>
                   @csrf
                        <tr>
                            <td style="color:black;">Name : {{ $user->name }}</td>
                    </tr>

                    <tr>
                            <td style="color:black;">User Name : {{ $user->username }}</td>
                    </tr>

                             <tr>
                            <td style="color:black;">Email : {{ $user->email }}</td>
                            </tr>
                        

                            <tr>
                            <td style="width:200px; color:black;">Phone Number : {{ $user->handphone_number }}</td>
                            </tr>
                       

                            <tr>
                            <td style="color:black;">IC Number : {{ $user->ic }}</td>
                            </tr>
                       

                            <tr>
                            <td style="color:black;">Bank Account No.1 : {{ $user->bank_account_number1 }}</td>
                            </tr>
                         
                            <tr>
                            <td style="color:black;">Bank Account No.2 : {{ $user->bank_account_number2 }}</td>
                            </tr>

                            <tr>
                            <td style="color:black;">Bank Account No.3 : {{ $user->bank_account_number3 }}</td>
                            </tr>

                            <tr>
                            <td style="color:black;">Gender : {{ $user->gender}}</td>
                        </tr>
                    
                    </tbody>
                </table>
                <br><br>

                <div style="float:left;">
                <style='white-space: nowrap'><a href="{{ route('profile.edit')}}" class="btn btn-warning btn-xs">Edit</a>
                    </div>
                
                    <div style="float:right;">
                    <style='white-space: nowrap'><a href="{{ route('password.change')}}" class="btn btn-danger btn-xs">Change Password</a> 
                    </div>
            </div>
            @endforeach

            </div>
</div>   
        </div>
</div>
    </div>
</div>

@endsection