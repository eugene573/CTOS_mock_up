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
    .card{
    width:fit-content;
    padding:20px;  
}
.row{
    margin-right:0 !important;
}
    </style>
    <link rel="stylesheet" type="text/css" href="{{ url('css/search.css') }}">
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br>
        <div class="card">
        <h3>Agents Information</h3><br>
        <form action="{{route('agent.search')}}" method="POST">
                @csrf
            <div class="search">
                            <div class="input">
                            <button style="width:70px;" class="btn btn-primary"
                    onclick= "window.location.href = '/agent-registration';">Create</button>
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
                    
                </tr>
            </thread>
            <tbody>
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
        </table>
        <div >
        {{ $users -> links("pagination::bootstrap-4")}}
    </div>
        <br>
        </div>
    </div>
</div>
@endsection