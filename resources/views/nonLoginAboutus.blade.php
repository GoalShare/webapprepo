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
  <body>



    <div class="demo-layout-transparent mdl-layout mdl-js-layout">

          <nav>
      <div class="nav-wrapper blue darken-4">

          <a href="#!" class="brand-logo  "><img src="{{asset('favicon/LOGO.png')}}" alt="" height= "35px" width = "184px">
          </a>


      </div>
    </nav>

      <main class="mdl-layout__content main">


          <!-- /head -->
          <br>
          <div class="card">

            <div class="card-tabs">
              <ul class="tabs tabs-fixed-width blue-text darken-4">
                <li class="tab blue-text darken-4"><a href="#aboutUs"  class="active">About us</a></li>
                <li class="tab"><a href="#support">Support</a></li>
                {{-- <li class="tab"><a href="#press">Press</a></li> --}}
                <li class="tab"><a href="#workWithUs">Work with us</a></li>
              </ul>
            </div>
            <div class="card-content grey lighten-4">
              <div id="aboutUs">



                <div class="col s12 m12">
                  <div class="card blue lighten-1 center">
                    <div class="card-content white-text ">
                      <span class="card-title "><p class="flow-text ">As a startup, our vision is to connect people with common goals to achieve greater success or people to work through a goal they like and share the success to inspire other people.
          We are a young bunch of IT professional those like to think differently with a mentality of innovation.
          </p></span>

                    </div>

                  </div>
                </div>

                <p class="flow-text center"><b>Our Team</b></p><br>

                <div class="container">


                <div class="row">
                  <div class="col s12 m3">
                    <div class="card">
                      <div class="card-image " >
                        <img src="{{asset('avatars/1.png')}}" class="circle "  >
                      </div>
                      <div class="card-content">
                          <span class="card-title center">CEO, Chief Solution Architect and Founder</span>
                        <p class=" center">Ramil De Silva has been in the IT industry for almost 14 years and the founder of Lifewithgoals.com idea.
                          He looks after the operations overall Ramil is a specialist in the HCM/IDAM aspect of ERP implementations</p>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m3">
                    <div class="card">
                      <div class="card-image " >
                        <img src="{{asset('avatars/2.png')}}" class="circle "  >
                      </div>
                      <div class="card-content">
                          <span class="card-title center"> CTO </span>
                        <p class="center"> Darshana Samanpura is a seasoned technical expert in the web technologies. Darshana joined to form Lifewithgoals.com with Ramil
                          and is an integral part of the team. Darshana leads all technical solutions related to Lifewithgoals.com  </p>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m3">
                    <div class="card">
                      <div class="card-image " >
                        <img src="{{asset('avatars/3.png')}}" class="circle "  >
                      </div>
                      <div class="card-content">
                          <span class="card-title center">Webmaster</span>
                        <p class=" center">Sagi Lorenzo Amarasiri  speaks 3 languages fluently (Sinhalese, Italian and English) and is one of the main brains developing the server side scripts for Lifewithgoals.com. He also follows his digree in Software
                           Engineering at NSBM. He always thinks there is a functionality missing to make a this a fun full site for a user.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m3">
                    <div class="card">
                      <div class="card-image " >
                        <img src="{{asset('avatars/4.png')}}" class="circle "  >
                      </div>
                      <div class="card-content">
                          <span class="card-title center">User Interaction Expert</span>
                        <p class=" center">Peshala Dayanatha is an undergraduate in Computer Security at NSBM. He joined Lifewithgoals.com upon conviced by Sagi and is the main brain designing the user interface for the website.
                          Peshala is not happy with the UI and continuously strives to improve optics of this site. </p>
                      </div>
                    </div>
                  </div>

                  </div>
                  </div>


              </div>
              <div id="support"><p class="flow-text center">If you want to send us notices or service of process, please contact us via <br>
         <a href="mailto:contactus@Lifewithgoals.com">contactus@Lifewithgoals.com</a></p></div>
              {{-- <div id="press">Test 3</div> --}}
              <div id="workWithUs">  <div class="col s12 m12">
                  <div class="card blue lighten-1 center">
                    <div class="card-content white-text ">
                      <span class="card-title "><p class="flow-text ">We do not have any openings yet <br> But keep in touch with us for more opportunities
          </p></span>

                    </div>

                  </div>
                </div></div>
            </div>
          </div>





      </main>
      <footer class="page-footer blue darken-4">
               <div class="container">
                 <div class="row">
                   <div class="col l6 s12">
                     <h5 class="white-text">Life With Goals</h5><br>

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
      <!-- /footer -->
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
