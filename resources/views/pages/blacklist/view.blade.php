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
    th{
        font-weight:500;
    }
    th.headerSortUp {
            background-image: url(/images/asc.gif);
            background-color: #3399FF;
            background-repeat: no-repeat;
            background-position: center right;
        }
        th.headerSortDown {
            background-image: url(/images/desc.gif);
            background-color: #3399FF;
            background-repeat: no-repeat;
            background-position: center right;
        }

    </style>

    <script>
  function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

        table = document.getElementsByClassName(tableClass)[0];
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.getElementsByTagName("TR");
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                        var cmpX=isNaN(parseInt(x.innerHTML))?x.innerHTML.toLowerCase():parseInt(x.innerHTML);
                        var cmpY=isNaN(parseInt(y.innerHTML))?y.innerHTML.toLowerCase():parseInt(y.innerHTML);
        cmpX=(cmpX=='-')?0:cmpX;
        cmpY=(cmpY=='-')?0:cmpY;
                if (dir == "asc") {
                    if (cmpX > cmpY) {
                        shouldSwitch= true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (cmpX < cmpY) {
                        shouldSwitch= true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;      
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
        }
    </script>
 <link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-6">
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
       <form action="{{route('blacklist.search')}}" method="POST">
    @csrf
       <div class="search">
           <div class="input">
            <input name="keyword" type="search" placeholder="Search" style="float:left !important">
            <button type="submit" style="float:left !important"><i class="fa fa-search"></i></button>                               
                            </div>
                    </div>
            </form>


      <!-- Table -->
        <table  id="mylists" class="table table-bordered table-sortable" style="margin-top:10px;">
            <thread>
                <tr class="trhead">
                    <th style='white-space: nowrap'>Name
                         <a href="{{route('blacklist.view.name')}}" style="text-decoration:none; color:white;">&#8593</a> 
                         <a href="{{route('blacklist.view.name.desc')}}" style="text-decoration:none; color:white;">&#8595</a> 
                    </th>
                    <th >Email</th>
                    <th>Contact Number</th>
                    <th>IC Number</th>
                    <th>Reason</th>
                    <th>Remark</th>
                    <th>Bank Account</th>
                    <th>Gender</th>    
                    @if(auth()->user()->isAdmin() || auth()->user()->isAgent())
                    <th>Action</th>
                    @endif     
                    <th>Created by</th>
                    <th>Deleted by</th>
                </tr>
            </thread>
            <tbody>
                @foreach($blacklists as $viewBlacklist)
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
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $blacklists -> links("pagination::bootstrap-4")}}
        <br><br>
    </div>
</div>
@endsection