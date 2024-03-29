@extends('layout')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="jquery.3.4.1.js"></script>
        <script src="all.min.js"></script>


<style>
    table {
    font-size:14px;
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
    padding:20px;  
}
    .row{
        margin-right:0 !important;
    }
    th{
        font-weight:500; 
         cursor: pointer;
    }
    </style>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>     -->
<script type="text/javascript" src="/js/sortTable.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">

    @if(Session::has('success'))
    
        <div class="alert" style="background-color:#46C646; font-size:20px; width:670px;">
                <span class="check"><i class="material-icons" style="font-size:20px;color:white;"></i></span>
                <center>  <span class="msg"  style="color:white; font-size:20px;">{{Session::get('success')}}</span> 
                <span class="crose" data-dismiss="alert">&times;</span></center>
            </div>
            @endif
            
        <br>
    <div class="card">
    <h3>Members Information</h3><br>
    <button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/user-registration';">Create</button>
    <form action="{{route('member.search')}}" method="POST">
    @csrf
   <div class="search">
                <div class="input">
           
                   <button type="submit"><i class="fa fa-search"></i></button> 
                   <input name="keyword" type="search" placeholder="Search" >
                    
                </div>
        </div>
</form>
   <table class="table table-bordered">
            <thread>
                <tr class="trhead">
                <td style='white-space: nowrap'>Name
                        
                    </td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Bank Account Number</td>
                    <td>Handphone Number</td>
                    <td>Gender</td>
                    <td>Action</td>
                    
                </tr>
            </thread>
            <tbody class="alldata">
                @foreach($users as $viewMember)
                <tr>
                    <td>{{ $viewMember->name }}</td>
                    <td>{{ $viewMember->email }}</td>
                    <td>{{ $viewMember->ic }}</td>
                    <td>{{ $viewMember->bank_account_number1 }}
                        {{ $viewMember->bank_account_number2 }}
                        {{ $viewMember->bank_account_number3 }}
                    </td>
                    <td>{{ $viewMember->handphone_number }}</td>
                    <td>{{ $viewMember->gender }}</td>
                    <td  style='white-space: nowrap'><a href="{{ route('member.edit',['id'=>$viewMember->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                   <a href="{{ route('member.delete',['id'=>$viewMember->id]) }}" class="btn btn-danger btn-xs"  onClick="return confirm('Are you sure to delete?')">Delete</a></td> 
                </tr>
                @endforeach
            </tbody> 
        </table>
        <div>
        {{ $users -> links("pagination::bootstrap-4")}}</div>
        <br>
        </div>
    </div>
</div>

<script type="text/javascript">

    $('#search').on('keyup',function()
    {
        $value = $(this).val();

        if($value)
        {
            $('.alldata').hide();
            $('.searchdata').show();
        }
        else
        {
            $('.alldata').show();
            $('.searchdata').hide();
        }

        $.ajax({
            
            type: 'get',
            url: '{{URL::to('search-member') }}',
            data: {'search':$value},

            success:function(data)
            {
                console.log(data);
                $('#Content').html(data);
            }
        });
    });
             
</script>
@endsection