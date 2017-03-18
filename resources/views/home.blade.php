<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>User | Dashboard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="{{route('password.request')}}">Password Reset</a></li>
  <li class="divider"></li>
  <li>  <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
        </a>
  </li>
  {!! Form::open(['method'=>'POST', 'route'=>'logout', 'id'=>'logout-form']) !!}{!! Form::close() !!}
</ul>  
<ul id="dropdown2" class="dropdown-content">
  <li><a href="{{route('password.request')}}">Password Reset</a></li>
  <li class="divider"></li>
  <li>  <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
        </a>
  </li>
</ul>   
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="../images/amalogo.png"  width="125"></a>
    <ul class="right hide-on-med-and-down">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">My Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
    <ul id="nav-mobile" class="side-nav">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">My Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <!-- <h2 class="header center orange-text">Accounts</h2> -->
    </div>
  </div>


  <div class="container">
    <div class="section">
      <!--   Icon Section   -->

      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card cyan accent-1">
            <div class="card-content black-text">
              <h5 class="card-title">Hello {{ Auth::user()->name }}!</h5>
              <table class="highlight responsive-table"> 
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Message</th>
                    <th data-field="name">Date Sent</th>
                  </tr>
                </thead>

                <tbody>
                {{-- <tr>
                    <td>{{ Auth::user()->id }}</td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->email }}</td>
                     <td>{{ $messages}}</td> 
                </tr>--}}
                
                    @foreach ($messages as $message)
                    <tr>
                        <td>{{$message->id}}</td>
                        <td>{{$message->message}}</td>
                        <td>{{$message->created_at}}</td>
                    </tr>
                    @endforeach
                
                </tbody>
              </table>              
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>




  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="../js/init.js"></script>
  <script>
      $(document).ready(function() {
        $('select').material_select();
      });
  </script>

  </body>
</html>









{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER Dashboard</div>

                <div class="panel-body">
                    You are logged in as <strong>USER</strong>!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
