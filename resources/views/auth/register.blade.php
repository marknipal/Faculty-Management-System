<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>User | Register</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="images/amalogo.png"  width="125"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{route('user.home')}}">Home</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        <li class="active"><a href="{{route('register')}}">Register</a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <li><a href="{{route('user.home')}}">Home</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <h4 class="header center orange-text">Register</h4>
    </div>
  </div>


<div class="container">
    <div class="section">
        <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            {!! Form::open(['method'=>'POST','route'=>'register']) !!}
                <div class="input-field col s12 m12 l12">
                    {!! Form::label('name', 'Name', ['class'=>'black-text']) !!}
                    {!! Form::text('name', null, ['class'=>'validate', 'required']) !!}
                </div>
                <div class="input-field col s12 m12 l12">
                    {!! Form::label('email', 'E-mail Address', ['class'=>'black-text']) !!}
                    {!! Form::email('email', null, ['class'=>'validate', 'required']) !!}
                </div>
                <div class="input-field col s12 m12 l12">
                    {!! Form::label('password', 'Password', ['class'=>'black-text']) !!}
                    {!! Form::password('password', ['class'=>'validate', 'required']) !!}
                </div>
                <div class="input-field col s12 m12 l12">
                    {!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'black-text']) !!}
                    {!! Form::password('password_confirmation', ['class'=>'validate', 'required']) !!}
                </div>
        </div>
        <div class="col s12 m12 l8 offset-l2">
            {!! Form::button('Register', ['type'=>'submit', 'class'=>'btn waves-effect waves-light']) !!}
            {!! Form::close() !!}
        </div>
        </div>
    </div>
</div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>











{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}