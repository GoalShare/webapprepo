<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('materialize/css/materialize.css')}}">
    <script src="{{asset('materialize/js/materialize.js')}}"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>GFL</title>
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-red.min.css" />
  <link rel="stylesheet" href="{{ asset('css/styles_goalcards.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{asset('js/init.js')}}"></script>

<!-- goal page css-->
      <link href="{{asset('css/goal.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('css/circle.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!-- -->

<style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    }

  main {
    flex: 1 0 auto;
    }

    .front{
      position: absolute;
      margin-top: 20px;

    }



.footerCont{
  padding-left: 20px;
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
        padding: 24px;
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
    .containerholder {
    position: relative;
  }
    .overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: #008CBA;
      overflow: hidden;
      width: 100%;
      height: 0;
      transition: .5s ease;
    }

    .containerholder:hover .overlay {
      height: 100%;
    }

    .text {
      white-space: nowrap;
      color: white;
      font-size: 20px;
      position: absolute;
      overflow: hidden;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
    }

    .btn2{
      padding-top: 20px;
    }




    /*copy this class to everywhere*/
    .front{

        margin-top: 20px;
        position: relative;

      }





    /*///*/
  </style>
</head>
<body>
       <!--start of navbar-->
            <!-- head -->

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Request</a></li>
      <li><a href="#!">Liked</a></li>
      <li class="divider"></li>
      <li><a href="#!">Commented</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content center">
      <li><a href="{{url('profile/'.Auth::id())}}">Profile</a></li>
      <li class="divider"></li>
      <li><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout
      </a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </ul>

    <nav>
      <div class="nav-wrapper blue darken-4 ">


        <ul class="left">
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
             <img src="{{asset('favicon/mainIcon.png')}}" alt="" height="50px" width="50px">
        </ul>

        <ul class="right hide-on-small-only">
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class=" material-icons">perm_identity</i></a></li>
        </ul>

        <ul class="right">
          <li>
            <form>
              <input type="search" placeholder="Search" class="searchbar">
            </form>
          </li>

      <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class=" material-icons">textsms</i></a></li>

        </ul>




      </div>
    </nav>

    <!-- Dropdown Structure -->
    <ul id="slide-out" class="side-nav ">
       <li>
         <div class="container">
           <img class="circle front " src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" width="150px" height="150px">
         </div>
        </li>
         <div class="user-view">
        <li>
         <a href="#!name" ><span class="black-text name">Name : {{Auth::User()->fname." ".Auth::User()->lname}}</span></a>
        </li>
        <li>
         <a href="#!email"><span class="black-text email">Email : {{Auth::User()->email}}</span></a>
        </li>
       </div>


       <li><a href="#!">Goal</a></li>
       <!-- subheaders -->
       <li><a class="subheader"><span class="new badge">4</span>&nbsp Pinned Goals</a></li>
       <li><a class="subheader"><span class="new badge">10</span>&nbsp  Goals</a></li>
       <!-- // -->
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="#!">categories</a></li>
       @foreach ($categorylist as $categorylists)
         <li><a><i class="material-icons">label_outline</i>&nbsp {{$categorylists->goalcategory}}</a></li>
       @endforeach








       <li><div class="divider"></div></li>
       <li><a href="{{url('profile/'.Auth::id())}}" class="waves-effect">Profile</a></li>
       <li><a class="waves-effect" href="#!">Account Setting</a></li>
       <li><a class="waves-effect" href="#!">Friend Request</a></li>
       <li><a class="waves-effect" href="#!">Home</a></li>
       <li><a class="waves-effect" href="#!">Sign out</a></li>
       <li><a class="waves-effect" href="#!">About us</a></li>

     </ul>


    <!-- /head -->
    <!-- end of navbar -->



        @yield('content')

   <!-- footer -->
<footer class="page-footer blue darken-4">
         <div class="container">
           <div class="row">
             <div class="col l6 s12">
               <h5 class="white-text">Goals For Life</h5><br>

               <p class="white-text">
                 <a href="#" class="white-text footerCont">English(UK)</a>
                 <a href="" class="white-text footerCont">Sinhalese</a>
               </p>

               <div class="divider"></div>
               <p class="white-text">
                 <a href="#" class="white-text footerCont">About us</a>
                 <a href="" class="white-text footerCont">  Support</a>
                 <a href="#" class="white-text footerCont"> Press</a>
                 <a href="" class="white-text footerCont"> Work with us</a>
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


</body>
        <!-- Scripts -->
      <script>

      $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrainWidth: false, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left', // Displays dropdown with edge aligned to the left of button
          stopPropagation: false // Stops event propagation
        }
      );


  $(document).ready(function(){
  $('.collapsible').collapsible();
});

  $(function(){
    $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();
    });
  });


  </script>
      <script>



    Array.prototype.forEach.call(document.querySelectorAll('.mdl-card__media'), function(el) {
      var link = el.querySelector('a');
      if(!link) {
        return;
      }
      var target = link.getAttribute('href');
      if(!target) {
        return;
      }
    });
  </script>
    <!--for goal-->
   <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->

    {{-- <script src="{{asset('js/updategoal.js')}}"></script> --}}
    <!-- -->
</html>
