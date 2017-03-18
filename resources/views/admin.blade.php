<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Admin | Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  {{-- <li><a href="{{route('password.request')}}">Password Reset</a></li>
  <li class="divider"></li> --}}
  <li>  <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
        </a>
  </li>
  {!! Form::open(['method'=>'POST', 'route'=>'logout', 'id'=>'logout-form']) !!}{!! Form::close() !!}
</ul>  
<ul id="dropdown2" class="dropdown-content">
  {{-- <li><a href="{{route('password.request')}}">Password Reset</a></li>
  <li class="divider"></li> --}}
  <li>  <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Logout
        </a>
  </li>
</ul>   
<nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="images/amalogo.png"  width="125"></a>
    <ul class="right hide-on-med-and-down">
        <li class="active"><a href="{{route('admin.dashboard')}}">Home</a></li>
        <li><a href="{{route('admin.userspage')}}">Users</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown1">My Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
    <ul id="nav-mobile" class="side-nav">
        <li><a href="{{route('admin.dashboard')}}">Home</a></li>
        <li><a href="{{route('admin.userspage')}}">Users</a></li>
        <li><a class="dropdown-button" href="#!" data-activates="dropdown2">My Account<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

    <div class="container">
        <div class="section">
          <div class="row">
            <div class="col s12 m6 l6">
              <div class="card blue-grey darken-1">
              {!! Form::open(['method'=>'POST', 'action'=>'AdminController@sendMessage']) !!}
                <div class="card-content white-text">
                  <h5 class="card-title">SEND A MESSAGE</h5>
                  <h5 class="light">Compose your message here</h5>
                    <div class="input-field">
                      {!! Form::label('message', 'Message', ['class'=>'white-text']) !!}
                      {!! Form::text('message', null, ['class'=>'validate', 'required']) !!}
                    </div>
                    <h5 class="light">Recipient</h5>
                    <div class="input-field">
                      <select name="recipient">
                        <option value="" disabled selected>Choose your option</option>
                          @foreach ($faculty as $member)
                            <option value="{{$member->name}}">{{$member->name}}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="card-action">
                    {!! Form::button('Submit', ['type'=>'submit', 'class'=>'btn waves-effect waves-light']) !!}
                </div>
              {!! Form::close() !!}
              </div>
            </div>

            <div class="col s12 m6 l6">
              <div class="card blue-grey darken-1">
              {!! Form::open(['method'=>'POST', 'action'=>'AdminController@setReminder']) !!}
                <div class="card-content white-text">
                  <h5 class="card-title">SET REMINDERS</h5>
                  <br><br>
                  <h5 class="light">Compose your reminder here:</h5>
                    <div class="input-field">
                      {!! Form::label('admin_reminder', 'Reminder', ['class'=>'white-text']) !!}
                      {!! Form::text('admin_reminder', null, ['class'=>'validate']) !!}
                    </div>
                  <br><br><br>
                </div>
                <div class="card-action">
                    {!! Form::button('Submit', ['type'=>'submit', 'class'=>'btn waves-effect waves-light']) !!}
                    {{-- {!! Form::button('Clear', ['type'=>'reset', 'class'=>'btn waves-effect waves-light right']) !!} --}}
                </div>

              {!! Form::close() !!}

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card blue lighten-2">
                <div class="card-content black-text">
                  <h5 class="card-title">Messages</h5>
                  <table class="highlight responsive-table"> 
                    <thead>
                      <tr>
                          {{-- comment the id --}}
                          <th data-field="id">ID</th>
                          <th data-field="name">Message</th>
                          <th data-field="name">Recipient</th>
                          <th data-field="name">Date Sent</th>
                          {{-- <th data-field="price">Action</th> --}}
                      </tr>
                    </thead>

                    <tbody>
                    @foreach ($messages as $message)
                      <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->recipient }}</td>
                        <td>{{ $message->created_at }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>              
                </div>
              </div>
            </div>

            <div class="col s12 m12 l12">
              <div class="card blue lighten-2">
                <div class="card-content black-text">
                  <h5 class="card-title">Reminders</h5>
                  <table class="highlight responsive-table"> 
                    <thead>
                      <tr>
                          {{-- comment the id  --}}
                          <th data-field="id">ID</th>
                          <th data-field="name">Reminders</th>
                          <th data-field="price">Date Added</th>
                          {{-- <th data-field="price">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($reminders as $reminder)
                      <tr>
                        <td>{{ $reminder->id }}</td>
                        <td>{{ $reminder->reminder }}</td>
                        <td>{{ $reminder->created_at }}</td>
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

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script src="../js/init.js"></script>
      <script>
      $(document).ready(function() {
        $('select').material_select();
        $(".dropdown-button").dropdown();
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
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    You are logged in as <strong>ADMIN</strong>!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}