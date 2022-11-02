@extends('layout')
@include('sidenav')
@section('content')
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
    .row{
        margin-right:0 !important;
    }
<<<<<<< HEAD

    </style>


=======
    th{
        font-weight:500; 
         cursor: pointer;
    }

    </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>    
<script type="text/javascript" src="/js/sortTable.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
 <link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
<<<<<<< HEAD
        <br><br>
        <div class="card-body">
        
       <h3>Blacklists</h3><br>
       @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
            <button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/add-to-blacklist';">Create</button>                        
            @endif 
    <!-- Search -->
       <form action="{{route('blacklist.search')}}" method="POST">
    @csrf
       <div class="search">
           <div class="input">
            <br>
            <input name="keyword" type="search" placeholder="Search" style="float:left !important">
            <button type="submit" style="float:left !important">  <i class="fa fa-search" style="color:black;"></i></button>                               
                            </div>
                    </div>
            </form>
         
           <br>
        <table class="table table-bordered" style="margin-top:10px;">
            <thread>
                <tr class="trhead">
                    <td>Member Name</td>
                    <td>Email</td>
                    <td>Contact Number</td>
                    <td>IC Number</td>
                    <td>Reason</td>
                    <td>Remark</td>
                    <td>Bank Account</td>
                    <td>Gender</td>    
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td>Action</td>
                    @endif     
                    <td>Created by</td>
                    <td>Deleted by</td>
                </tr>
            </thread>
            <tbody>
                @foreach($blacklists as $viewBlacklist)
                @if($viewBlacklist->deleted_by == $viewBlacklist->uName) 
                <tr style="background-color:#D10000; color:white;">
=======
        <br>
        <div class="card-body" style="padding-top:0 !important;padding-left:10px !important;">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}  
                </div>  
            @endif   
       <a href="{{route('blacklist.view')}}" style="color:black; text-decoration:none;"><h3>Blacklists</h3></a>
       @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
            <br><button style="width:70px;" class="btn btn-primary" onclick= "window.location.href = '/add-to-blacklist';">Create</button>                        
            @endif 

    <!-- Search -->
    <div class="col-md-10">
        <input type="search" id="search" name="search" style="float:left; margin-top:10px;margin-left:-15px;" placeholder="Search for names..">
    </div>


      <!-- Table -->
        <table  id="mylists" class="table table-bordered" style="margin-top:10px;">
            <thread>
                <tr class="trhead">
                    <!-- <th style='white-space: nowrap'>Name
                         <a href="{{route('blacklist.view.name')}}" style="text-decoration:none; color:white;">&#8593</a> 
                         <a href="{{route('blacklist.view.name.desc')}}" style="text-decoration:none; color:white;">&#8595</a> 
                    </th> -->
                    <th onclick="sortTable(0)">Name</th>
                    <th onclick="sortTable(1)" >Email</th>
                    <th onclick="sortTable(2)">Contact Number</th>
                    <th onclick="sortTable(3)">IC Number</th>
                    <th onclick="sortTable(4)">Reason</th>
                    <th onclick="sortTable(5)">Remark</th>
                    <th onclick="sortTable(6)">Bank Account</th>
                    <th onclick="sortTable(7)">Gender</th>    
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <th>Action</th>
                    @endif     
                    <th onclick="sortTable(8)">Created by</th>
                    <th onclick="sortTable(9)">Deleted by</th>
                </tr>
            </thread>
            <tbody class="alldata">
                @foreach($blacklists as $viewBlacklist)
                @if($viewBlacklist->deleted_by == $viewBlacklist->uName) 
                <tr style="background-color:#D10000; color:white;">
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->email }}</td>
                    <td>{{ $viewBlacklist->handphone_number }}</td>
                    <td>{{ $viewBlacklist->ic }}</td>
                    <td>{{ $viewBlacklist->reason }}</td>
                    <td>{{ $viewBlacklist->remark }}</td>
                    <td>{{ $viewBlacklist->bank_account_number1 }}
                        {{ $viewBlacklist->bank_account_number2 }}
                        {{ $viewBlacklist->bank_account_number3 }}
                    </td>
                    <td>{{ $viewBlacklist->gender }}</td>
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td style='white-space: nowrap'>
                        @if(auth()->user()->isAdmin() || auth()->user()->id == $viewBlacklist->created_by)
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" id="rowClick "class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                        @else
                        N/A
                        @endif
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td>
                  
                    <td>{{ $viewBlacklist->deleted_by }}</td> 
                    @else 
                    <tr>
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->email }}</td>
                    <td>{{ $viewBlacklist->handphone_number }}</td>
                    <td>{{ $viewBlacklist->ic }}</td>
                    <td>{{ $viewBlacklist->reason }}</td>
                    <td>{{ $viewBlacklist->remark }}</td>
                    <td>{{ $viewBlacklist->bank_account_number1 }}
                        {{ $viewBlacklist->bank_account_number2 }}
                        {{ $viewBlacklist->bank_account_number3 }}
                    </td>
                    <td>{{ $viewBlacklist->gender }}</td>
<<<<<<< HEAD

                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td style='white-space: nowrap'>
                    @if(auth()->user()->isAdmin() || auth()->user()->id == $viewBlacklist->created_by)
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                        @else
                        N/A
                        @endif
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td>
                    <td>{{ $viewBlacklist->deleted_by }}</td>
                    @else 
                    <tr>
                    <td>{{ $viewBlacklist->name }}</td>
                    <td>{{ $viewBlacklist->email }}</td>
                    <td>{{ $viewBlacklist->handphone_number }}</td>
                    <td>{{ $viewBlacklist->ic }}</td>
                    <td>{{ $viewBlacklist->reason }}</td>
                    <td>{{ $viewBlacklist->remark }}</td>
                    <td>{{ $viewBlacklist->bank_account_number1 }}
                        {{ $viewBlacklist->bank_account_number2 }}
                        {{ $viewBlacklist->bank_account_number3 }}
                    </td>
                    <td>{{ $viewBlacklist->gender }}</td>
=======
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <td style='white-space: nowrap'>
                        @if(auth()->user()->isAdmin() || auth()->user()->id == $viewBlacklist->created_by)
                        <a href="{{ route('edit.blacklist',['id'=>$viewBlacklist->id]) }}" class="btn btn-warning btn-xs">Edit</a>
                        <a href="{{ route('blacklist.delete',['id'=>$viewBlacklist->id]) }}" id="rowClick "class="btn btn-danger btn-xs"
                        onClick="return confirm('Are you sure to delete?')">Delete</a>
                        @else
                        N/A
                        @endif
                    </td>
                    @endif
                    <td>{{ $viewBlacklist->uName }}</td> 
                    <td>{{ $viewBlacklist->deleted_by }}</td> 
                    @endif
                </tr>
                @endforeach
            </tbody>

            <tbody id="Content" class="searchdata">

            </tbody>
        </table>
        {{ $blacklists -> links("pagination::bootstrap-4")}}
        <br><br>
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
            url: '{{URL::to('search-blacklist') }}',
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