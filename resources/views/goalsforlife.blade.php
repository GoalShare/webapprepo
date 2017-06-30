<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Goals For Life</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href="{{asset('materialize/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.light_blue-blue.min.css" />
    <link rel="stylesheet" href="styles_goalcards">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style3.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>



    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        #view-source {
          position: fixed;
          display: block;
          right: 0;
          bottom: 0;
          margin-right: 40px;
          margin-bottom: 40px;
          z-index: 900;
        }

        .mdl-layout__content {
        	padding: 30px;
        	flex: none;
        }

        .portfolio-max-width {
          max-width: 900px;
          margin: auto;
        }

        .team_hr {
            border: 1px solid #fff;
            width: 39.5%;
            float: left;
        }

        .team_hr_left {
            margin-right: 30px;
            margin-left: 15px;
        }

        .team_hr_right {
            margin-left: 30px;
        }

        .hr_gray {
            border: 1px solid #cccccc;
        }

        .drawer-separator {
          height: 1px;
          background-color: #dcdcdc;
          margin: 8px 0;
        }

        .img-size{
          align-items: center;
        }

        .remember{
          width: 20px
        }


        /*.demo-layout-transparent {
          background: url('images/skills.jpeg') center / cover;
        }*/


    </style>

  </head>
  <body id="page">

    <ul class="cb-slideshow">
        <li><span>Image 01</span><div><h3>Revolution</h3></div></li>
        <li><span>Image 02</span><div><h3>Innovation</h3></div></li>
        <li><span>Image 03</span><div><h3>Balance</h3></div></li>
        <li><span>Image 04</span><div><h3>Equality</h3></div></li>
        <li><span>Image 05</span><div><h3>Enginering</h3></div></li>
        <li><span>Image 06</span><div><h3>Leading</h3></div></li>
    </ul>

    <div class="demo-layout-transparent mdl-layout mdl-js-layout">

          <nav>
      <div class="nav-wrapper blue darken-4">

          <a href="#!" class="brand-logo  "><img src="{{asset('favicon/LOGO.png')}}" alt="" height= "35px" width = "184px">
          </a>


      </div>
    </nav>

      <main class="mdl-layout__content main">
        <br>
        <br>


        <div class="row ">

          <div class="col s12 l6 m6 right">
          <div class="card blue darken-4 ">
            <div class="card-content center">
              <p class="flow-text white-text">Login or Register</p>
            </div>
            <div class="card-tabs">
              <ul class="tabs tabs-fixed-width">
                <li class="tab "><a class="active blue-text" href="#test4">Login</a></li>
                <li class="tab"><a  class="blue-text" href="#test5">Register</a></li>

              </ul>
            </div>
            <div class="card-content grey lighten-4">
              <div id="test4" >
                <form role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="row">
                      <div >
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="email" name="email" class="validate" required autofocus>
                        <label for="icon_prefix"><h4>Email address</h4></label>
                      </div>
                    </div>
                    <div class="row">
                      <div>
                        <i class="material-icons prefix">lock</i>
                        <input id="icon_telephone" name="password" type="password" class="validate" required>
                        <label for="icon_telephone"><h4>Password</h4></label>
                      </div>
                      <p class="center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password  ?
                        </a>
                      </p>
                      <p class="center">
                        <input type="checkbox" id="remeber" />
                        <label for="remeber">Remember me</label>
                          <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            </label>
                          </div>
                      </p>
                    </div>


                    <div class="center">
                        <div >
                        <button type="submit" class="waves-effect waves-light btn  blue darken-4">Login</button>
                      </div>
                    </div>

                  </form>
              </div>



              <div id="test5">
                <div class="row">
    <form class="col s12" role="form" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="fname" type="text" class="validate" required>
          <label for="last_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" name="lname" class="validate" required>
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email"  name="email" type="email" class="validate" required>
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate" required>
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="confermPassword" type="password" name="password_confirmation" class="validate" required>
          <label for="confermPassword">Confirm Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select name="gender">
            <option  value="M">Male</option>
            <option value="F">Female</option>
          </select>
          <label>Gender</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <input id="birthDate" type="date" name="dob">

      </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phonrNumber" name="phone" type="tel" class="validate">
          <label for="phonrNumber ">Phone number</label>
        </div>
      </div>
      <div class="row center">
        <div class="input-field col s12">
          <input type="checkbox" id="test1" checked="checked" >
          <label for="test1"><h4>  By signing up, you agree to our <br><a href="{!! url('/policies'); !!}">Terms</a> & <a href="{!! url('/policies'); !!}">Privacy Policy.</a></h4></label>
      </div>
      </div>
      <div class="row right">
          <div class="input-field col s12">
          <button class="waves-effect waves-light btn  blue darken-4">Register</button>
        </div>
      </div>



    </form>
  </div>



              </div>

            </div>
          </div>
          </div>
          </div>



      </main>
    </div>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('materialize/js/materialize.js')}}"></script>
    <script src="js/init.js"></script>

  </body>
  <script>
  $('.datepicker').pickadate({
   selectMonths: true, // Creates a dropdown to control month
   selectYears: 15 // Creates a dropdown of 15 years to control year
 });

  $(document).ready(function() {
    $('select').material_select();
  });

    Array.prototype.forEach.call(document.querySelectorAll('.mdl-card__media'), function(el) {
      var link = el.querySelector('a');
      if(!link) {
        return;
      }
      var target = link.getAttribute('href');
      if(!target) {
        return;
      }
      el.addEventListener('click', function() {
        location.href = target;
      });
    });
  </script>
</html>
