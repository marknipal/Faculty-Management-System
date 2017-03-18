<!DOCTYPE html>
<html lang="en">
<head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  	<title>User | Home</title>
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
        <li class="active"><a href="{{route('user.home')}}">Home</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
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
      <!-- <h1 class="header center orange-text">Users Page</h1> -->

    </div>
  </div>


  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m6 l6">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">&#xE55A;</i></h2>
            <h4 class="center">Faculty Members</h4>
              <table>
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Recipient</th>
                    <th data-field="name">Date</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($messages as $message)
                      <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->recipient }}</td>
                        <td>{{ $message->created_at }}</td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>

        <div class="col s12 m6 l6">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">&#xE0B9;</i></h2>
            <h4 class="center">Reminders</h4>
              <table>
                <thead>
                  <tr>
                  	<th data-field="id">ID</th>
                    <th data-field="name">Reminder</th>
                    <th data-field="name">Date</th>
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
    <br><br>

    <div class="section">

    </div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script src="js/init.js"></script>
  </body>
</html>