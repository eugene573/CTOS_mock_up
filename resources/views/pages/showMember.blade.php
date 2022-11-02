@extends('layout')
@section('content')

<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <script src="jquery.3.4.1.js"></script>
        <script src="all.min.js"></script>


=======
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
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
<<<<<<< HEAD
    }
    </style>
=======
    }
    th{
        font-weight:500; 
         cursor: pointer;
    }
    </style>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>     -->
<script type="text/javascript" src="/js/sortTable.js"></script>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
<link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
<<<<<<< HEAD

    @if(Session::has('success'))
    
        <div class="alert" style="background-color:#46C646; font-size:20px; width:670px;">
                <span class="check"><i class="material-icons" style="font-size:20px;color:white;"></i></span>
                <center>  <span class="msg"  style="color:white; font-size:20px;">{{Session::get('success')}}</span> 
                <span class="crose" data-dismiss="alert">&times;</span></center>
            </div>
            @endif
            
=======
    @if(Session::has('success'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('success') }}
                            </div>  
                        @endif
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
        <br>
    <div class="card">
    <h3>Members Information</h3><br>
    <button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/user-registration';">Create</button>
<<<<<<< HEAD
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
=======

    <div class="col-md-10" style="max-width:99% !important;">
        <input type="search" id="search" name="search" placeholder="Search for names..">
    </div>

   <table id="mylists"class="table table-bordered">
            <thread>
                <tr class="trhead">
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">IC</th>
                <th onclick="sortTable(3)">Bank Account Number</th>
                <th onclick="sortTable(4)">Handphone Number</th>
                <th onclick="sortTable(5)">Gender</th>
                <th>Action</th>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                    
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
<<<<<<< HEAD
=======

            <tbody id="Content" class="searchdata">

            </tbody>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
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