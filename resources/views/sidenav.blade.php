<<<<<<< HEAD

  <!--SideNav-->       
  @if(auth()->user()->isAdmin())
  <div id="mySideNav" class="sidenav">
            <ul style="padding-left:10px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="#">BlackList</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="/logout">Logout</a></li>
=======
<!--SideNav-->       
<!--@if(auth()->user()->isAdmin())-->
<div id="mySideNav" class="sidenav">
            <ul style="padding-left:10px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>    
            <li><a href="{{ route('agent.register') }}">Register Agent</a></li>
            <li><a href="{{ route('user.register') }}">Register Member</a></li> 
            <li><a href="{{ route('agent.show') }}">Agents Information</a></li> 
            <li><a href="{{ route('member.show') }}">Members Information</a></li>
            {{-- <li><a href="{{ route('agent.view') }}">Agents List</a></li> --}}
            {{-- <li><a href="{{ route('member.view') }}">Members List</a></li> --}}
            {{-- <li><a href="{{ route('blacklist.view') }}">BlackList</a></li> --}}
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
            </ul>
            </div>
            <!--@elseif(auth()->user()->isAgent())-->
            <div id="mySideNav" class="sidenav">
            <ul style="padding-left:10px;">
<<<<<<< HEAD
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="#">BlackList</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="/logout">Logout</a></li>
=======
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>    
            <li><a href="{{ route('user.register') }}">Register Member</a></li> 
            <li><a href="{{ route('member.show') }}">Members Information</a></li>
            {{-- <li><a href="{{ route('agent.view') }}">Agents List</a></li> --}}
            {{-- <li><a href="{{ route('member.view') }}">Members List</a></li> --}}
            {{-- <li><a href="{{ route('blacklist.view') }}">BlackList</a></li> --}}
            </ul>
            </div>
            <!--@elseif(auth()->user()->isMember())-->
            <div id="mySideNav" class="sidenav">
            <ul style="padding-left:10px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>     
            {{-- <li><a href="{{ route('agent.view') }}">Agents List</a></li> --}}
            {{-- <li><a href="{{ route('member.view') }}">Members List</a></li> --}}
            {{-- <li><a href="{{ route('blacklist.view') }}">BlackList</a></li> --}}
>>>>>>> 83c73af2e9273ac2506573fe78a7d4ff2f92dfd2
            </ul>
            </div>
            <!--@endif-->