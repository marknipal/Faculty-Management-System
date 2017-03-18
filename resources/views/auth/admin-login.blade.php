<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>User | Login</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">

<style>
        canvas, div{
            margin: 0;
            padding: 0;
        }

        canvas {
            position: right;
            margin: 1px;
            margin-left: 0px;
            border: 1px solid #3a87ad;
        }
        h1, p {
            padding-left: 2px;
            width: 100%;
            margin: 0 auto;
        }
</style>
<script type="text/javascript"> 
function signatureCapture() {
    var canvas = document.getElementById("newSignature");
    var context = canvas.getContext("2d");
    canvas.width = 943;
    canvas.height = 400;
    context.fillStyle = "#fff";
    context.strokeStyle = "#444";
    context.lineWidth = 1.5;
    context.lineCap = "round";
    context.fillRect(0, 0, canvas.width, canvas.height);
    var disableSave = true;
    var pixels = [];
    var cpixels = [];
    var xyLast = {};
    var xyAddLast = {};
    var calculate = false;
    {   //functions
        function remove_event_listeners() {
            canvas.removeEventListener('mousemove', on_mousemove, false);
            canvas.removeEventListener('mouseup', on_mouseup, false);
            canvas.removeEventListener('touchmove', on_mousemove, false);
            canvas.removeEventListener('touchend', on_mouseup, false);

            document.body.removeEventListener('mouseup', on_mouseup, false);
            document.body.removeEventListener('touchend', on_mouseup, false);
        }

        function get_coords(e) {
            var x, y;

            if (e.changedTouches && e.changedTouches[0]) {
                var offsety = canvas.offsetTop || 0;
                var offsetx = canvas.offsetLeft || 0;

                x = e.changedTouches[0].pageX - offsetx;
                y = e.changedTouches[0].pageY - offsety;
            } else if (e.layerX || 0 == e.layerX) {
                x = e.layerX;
                y = e.layerY;
            } else if (e.offsetX || 0 == e.offsetX) {
                x = e.offsetX;
                y = e.offsetY;
            }

            return {
                x : x, y : y
            };
        };

        function on_mousedown(e) {
            e.preventDefault();
            e.stopPropagation();

            canvas.addEventListener('mouseup', on_mouseup, false);
            canvas.addEventListener('mousemove', on_mousemove, false);
            canvas.addEventListener('touchend', on_mouseup, false);
            canvas.addEventListener('touchmove', on_mousemove, false);
            document.body.addEventListener('mouseup', on_mouseup, false);
            document.body.addEventListener('touchend', on_mouseup, false);

            empty = false;
            var xy = get_coords(e);
            context.beginPath();
            pixels.push('moveStart');
            context.moveTo(xy.x, xy.y);
            pixels.push(xy.x, xy.y);
            xyLast = xy;
        };

        function on_mousemove(e, finish) {
            e.preventDefault();
            e.stopPropagation();

            var xy = get_coords(e);
            var xyAdd = {
                x : (xyLast.x + xy.x) / 2,
                y : (xyLast.y + xy.y) / 2
            };

            if (calculate) {
                var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
                var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
                pixels.push(xLast, yLast);
            } else {
                calculate = true;
            }

            context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
            pixels.push(xyAdd.x, xyAdd.y);
            context.stroke();
            context.beginPath();
            context.moveTo(xyAdd.x, xyAdd.y);
            xyAddLast = xyAdd;
            xyLast = xy;

        };

        function on_mouseup(e) {
            remove_event_listeners();
            disableSave = false;
            context.stroke();
            pixels.push('e');
            calculate = false;
        };
    }
    canvas.addEventListener('touchstart', on_mousedown, false);
    canvas.addEventListener('mousedown', on_mousedown, false);
}

function signatureClear() {
    var canvas = document.getElementById("newSignature");
    var context = canvas.getContext("2d");
    context.clearRect(0, 0, canvas.width, canvas.height);
}

</script>

</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="../images/amalogo.png" width="125"></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h4 class="header center orange-text">Admin Login</h4>
      
      <div class="row">
        <div class="col s12 m12 l12">
          <div id="canvas">
                <canvas class="roundCorners" id="newSignature"
                style="position: relative; margin: 0; padding: 0; border: 1px solid #c4caac;"></canvas>
          </div>
            <script>signatureCapture();</script>
            <button class="btn waves-effect" type="button" onclick="signatureClear()">Clear Signature</button>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
            {!! Form::open() !!}
            <div class="input-field col s12 m12 l12">
                {!! Form::label('email', 'E-mail Address', ['class'=>'black-text']) !!}
                {!! Form::email('email', null, ['class'=>'validate', 'required']) !!}
            </div>
            <div class="input-field col s12 m12 l12">
                {!! Form::label('password', 'Password', ['class'=>'black-text']) !!}
                {!! Form::password('password', ['class'=>'validate', 'required']) !!}
            </div>
        </div>
        <div class="col s12 m12 l12">
            {!! Form::button('Login', ['type'=>'submit', 'class'=>'btn waves-effect waves-light', 'name'=>'reminder']) !!}
            {!! Form::close() !!}
            <a class="waves-effect waves-light btn right" href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
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