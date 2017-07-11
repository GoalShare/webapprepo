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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.light_blue-blue.min.css" />
    <link rel="stylesheet" href="styles_goalcards">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style3.css" />
    <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
    html {
    font-family: 'Roboto', sans-serif;
  }
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


      <main  class="mdl-layout__content main" style="font-family: 'Roboto', sans-serif;">
        <div class="row">
          <div class="col s12 l6 m6 right" >
          <div class="card blue darken-4 ">
            <div class="card-tabs" >
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
                      <div class="input-field col s12">
                        <i class="material-icons prefix" style="color:grey;">email</i>
                        <input id="icon_prefix"  name="email" type="email" class="validate" required autofocus>
                        <label for="icon_prefix">Email Address</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="material-icons prefix" style="color:grey;">lock</i>
                        <input id="icon_prefix"  name="password" type="password" class="validate" required autofocus>
                        <label for="icon_prefix">Password</label>
                      </div>
                      <div class="row">
                        <div class="col s6">
                          <input type="checkbox" id="remeber" name="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label for="remeber">Remember me</label>
                        </div>
                        <div class="col s6">

                        </div>
                      </div>
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
          <input id="first_name" name="fname" type="text" style="font-size:large;" class="validate"  required>
          <label for="last_name"><div class="flow-text">
            First Name
          </div></label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" name="lname" style="font-size:large;" class="validate" required>
          <label for="last_name"><div class="flow-text">
            Last Name
          </div></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email"  name="email" type="email" style="font-size:large;" class="validate" required>
          <label for="email"><div class="flow-text">
            Email
          </div></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" style="font-size:large;" class="validate" required>
          <label for="password"><div class="flow-text">
            Password
          </div></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="confermPassword" type="password" style="font-size:large;" name="password_confirmation" class="validate" required>
          <label for="confermPassword"><div class="flow-text">
            Confirm Password
          </div></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <select name="gender">
            <option value="" disabled selected>choose gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
          </select>
          <label><div class="flow-text">Gender</div></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <input id="birthDate" style="font-size:large;" type="date" name="dob">

      </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="phonrNumber" style="font-size:large;" name="phone" type="tel" class="validate">
          <label for="phonrNumber "><div class="flow-text">
            Phone number
          </div></label>
        </div>
      </div>
      <div class="row center">
        <div class="input-field col s12">
          <input type="checkbox" id="useragreement" checked>
          <label for="test1"><h4>  By signing up, you agree to our <br><a href="{!! url('/nonLoginPolicies'); !!}">Terms</a> & <a href="{!! url('/nonLoginPolicies'); !!}">Privacy Policy.</a></h4></label>
      </div>
      {{-- <script type="text/javascript">
        var useragreement=document.getElementById("useragreement");
        useragreement.addEventListener("change",accept);
        function accept() {

          if (useragreement.checked) {
            document.getElementById("register").disabled=false;
          }
          else {
            document.getElementById("register").disabled=true;
          }
        }
      </script> --}}
      </div>
      <div class="row right">
          <div class="input-field col s12">
          <button id="register" class="waves-effect waves-light btn  blue darken-4">Register</button>
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

      <footer class="page-footer blue darken-4">
               <div class="container">
                 <div class="row">
                   <div class="col l6 s12">
                     <h5 class="white-text ">Life With Goals</h5><br>

                     <p class="white-text">
                       <a href="#" class="white-text footerCont">English(UK)</a>
                       <a href="" class="white-text footerCont">Sinhalese</a>
                     </p>

                     <div class="divider"></div>
                     <p class="white-text">
                       <a href="{!! url('/nonLoginAboutus'); !!}" class="white-text footerCont">About us</a>
                       <a href="{!! url('/nonLoginAboutus'); !!}" class="white-text footerCont">  Support</a>
                       {{-- <a href="{!! url('/aboutus'); !!}" class="white-text footerCont"> Press</a> --}}
                       <a href="{!! url('/nonLoginAboutus'); !!}" class="white-text footerCont"> Work with us</a>
                     </p>

                   </div>
                   <!-- <div class="col l4 offset-l2 s12">

                     <ul>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>

                       <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                       <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                     </ul>
                   </div> -->
                 </div>
               </div>
               <div class="footer-copyright">
                 <div class="container">
                 © 2014 Copyright Text
                 <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
                 </div>
               </div>
             </footer>

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
