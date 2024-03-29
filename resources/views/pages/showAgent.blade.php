@extends('layout')
@include('sidenav')
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

    </style>

th{
        font-weight:500; 
         cursor: pointer;
    }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>    
<script type="text/javascript" src="/js/sortTable.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">


    @if(Session::has('success'))
            <center><div class="alert" style="background-color:#46C646;">
                <span class="check"><i class="material-icons" style="font-size:20px;color:white;"></i></span>
                <span class="msg"  style="color:white;">{{Session::get('success')}}</span>
                <span class="crose" data-dismiss="alert">&times;</span>
            </div></center>
        @endif
        <br>
    <div class="card">
        <h3>Agents Information</h3><br>
        <button style="width:70px;" class="btn btn-primary"
                    onclick= "window.location.href = '/agent-registration';">Create</button>
        <form action="{{route('agent.search')}}" method="POST">
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
                    <td>Name</td>
                    <td>Email</td>
                    <td>IC</td>
                    <td>Handphone Number</td>
                    <td>Gender</td>
                    <td>Action</td>

    @if(Session::has('success'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('success') }}
                            </div>  
                        @endif
        <br>
        <div class="card">
        <h3>Agents Information</h3><br>
        <button style="width:70px;" class="btn btn-primary"
                    onclick= "window.location.href = '/agent-registration';">Create</button>

        <div class="col-md-10" style="max-width:99% !important;">
            <input type="search" id="search" name="search" placeholder="Search for names..">
         </div>
     
        <table id="mylists" class="table table-bordered">
            <thread>
                <tr class="trhead">
                <th onclick="sortTable(0)">Name</th>
                <th onclick="sortTable(1)">Email</th>
                <th onclick="sortTable(2)">IC</th>
                <th onclick="sortTable(3)">Handphone Number</th>
                <th onclick="sortTable(4)">Gender</th>
                <th>Action</th>
                  
                </tr>
            </thread>
            <tbody class="alldata">
                @foreach($users as $viewAgent)
                <tr>
                    <td>{{ $viewAgent->name }}</td>
                    <td>{{ $viewAgent->email }}</td>
                    <td>{{ $viewAgent->ic }}</td>
                    <td>{{ $viewAgent->handphone_number }}</td>
                    <td>{{ $viewAgent->gender }}</td>
                    <td style='white-space: nowrap'>
                    <a href="{{ route('agent.edit',['id'=>$viewAgent->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                    <a href="{{ route('agent.delete',['id'=>$viewAgent->id]) }}" class="btn btn-danger btn-xs"  
                    onClick="return confirm('Are you sure to delete?')">Delete</a>
                </td> 
                </tr>
                @endforeach
            </tbody>

            <tbody id="Content" class="searchdata">

            </tbody>
        </table>

        <div > 

        <div >

        {{ $users -> links("pagination::bootstrap-4")}}
    </div>
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
            url: '{{URL::to('search-agent') }}',
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