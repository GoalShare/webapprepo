<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('materialize/css/materialize.css')}}">
    <meta name="description" content="Welcome to lifewithgoals.com. Set your life goals and track your achievements">
    <script src="{{asset('materialize/js/materialize.js')}}"></script>
    <meta charset="utf-8">
    <meta name="keywords" content="www.lifewithgoals.com, life, goals, lifewithgoals, goal management, goal management system, goals for life, set goals, add goals, search goals, make goals, create goals, aim, life aims, improve my life, my goals, my life goals, achive, manage life, etc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Life With Goals</title>
{{-- favicon --}}
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favicon/manifest.json')}}">
{{-- <link rel="mask-icon" href="{{assest('favicon/safari-pinned-tab.svg" color="#5bbad5')}}"> --}}
<meta name="theme-color" content="#ffffff">
{{-- // --}}


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
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-102672548-1', 'auto');
    ga('send', 'pageview');

  </script>
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

    .alignedCard{
      overflow-y: scroll;
      height: 200px;
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
    background:rgba(0, 0, 0, 0.6);
      z-index: 2;

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

      .logoImg{
        margin-top: 15px;
      }

      .logoImg2{
        margin-top: 7px;
      }



      ::-webkit-scrollbar-track
      {
      	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      	background-color: #F5F5F5;
      }

    ::-webkit-scrollbar
      {
      	width: 6px;
      	background-color:  #999999;
      }

    ::-webkit-scrollbar-thumb
      {
      	background-color:  #999999;
      }




    /*///*/
  </style>
</head>
<body>
    <ul id="dropdown1" class="dropdown-content row">

      <li>
        @if ($friendrequest->isEmpty())
          <a href="#" class="col s12 center-align">You dont have any requests</a>
        @else
        @foreach ($friendrequest as $friendrequests)
        <div class="chip col s12">
        <img src="{{asset('uploads/avatars/'.$friendrequests->avatar)}}" alt="Contact Person">
        <form class="inline" action="{{route('confirmfriend')}}" method="post">
          {{csrf_field()}}
          <a href="{{url('/search/'.$friendrequests->id)}}">{{$friendrequests->fname}}&nbsp;{{$friendrequests->lname}}</a>
          <input type="hidden" name="userid" value="{{$friendrequests->id}}">
          <button type="submit" class="btn ">confirm</button>
        </form>
      </div><br>
      @endforeach
      @endif

      </li>
      <li class="divider"></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content center">
      <li><a href="{{url('profile/'.Auth::id())}}">Profile</a></li>
      <li class="divider"></li>
      <li><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
          Logout</a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </ul>
    <div class="navbar-fixed">


    <nav>
      <div class="nav-wrapper blue darken-4 ">


        <ul class="left">
              <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
             <img class="logoImg hide-on-small-only" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/LOGO.png')}}" alt="" height="40px" width="200px">
              <img class="logoImg2 hide-on-med-and-up" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/favicon.ico')}}" >
        </ul>


        <ul class="right hide-on-small-only">
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class=" material-icons">perm_identity</i></a></li>
        </ul>

        <ul class="right">
          <li>
            <form action="{{route('search')}}" method="post" id="search-form">
              {{ csrf_field()}}
              <input type="search" autocomplete="off" name="searchkey" placeholder="Search " id="search" class="searchbar blue-text text-darken-4 dropdown-button" data-hover="false" data-activates="suggestions">
            </form>
            <style media="screen">
            /*ul#suggestions {
              margin-top: -20px;
              list-style: none;
              margin: 0;
              padding: 0;
              width: 208px;
              display: none;
              z-index: 5;
            }

            ul#suggestions li {
            }

            ul#suggestions li a {
              display: block;
              min-height: 1em;
              padding: 0.5em 10px;
              background: #CCC;
              color: #000;
              text-decoration: none;
            }

            ul#suggestions li a:hover {
              background: #AAA;
            }*/
            </style>
            <ul class=" dropdown-content searchdrop center" style="margin-top:45px;min-width:300px;" id="suggestions">
            </ul>
            <script type="text/javascript">
            // note: IE8 doesn't support DOMContentLoaded
            document.addEventListener('DOMContentLoaded', function() {
              var suggestions = document.getElementById("suggestions");
              var form = document.getElementById("search-form");
              var action = form.getAttribute("action");
              var search = document.getElementById("search");

              function showSuggestions(json) {
                  var li_list = suggestionsToList(json);
                  suggestions.innerHTML = li_list;
                  suggestions.style.display = 'block';
                }


                function suggestionsToList(items) {
                  // <li><a href="search.php?q=alpha">Alpha</a></li>
                  var output = '';

                  for(i=0; i < items.length; i++) {
                    if((items[i].id)!={{Auth::id()}}){
                    output += '<li>';
                    output += '<a href="';
                    output += "/search/"+ items[i].id + "\">";
                    output += items[i].fname +' '+items[i].lname;
                    output += '</a>';
                    output += '</li><br>';
                  }
                  }

                  return output;
                }


              function getSuggestions() {
                var q = search.value;
                var form_data=new FormData(form);
                if(q.length < 2) {
                  suggestions.style.display = 'none';
                  return;
                }
                var xhr = new XMLHttpRequest();
                xhr.open('POST',action, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.send(form_data);
                xhr.onreadystatechange = function () {
                  if(xhr.readyState == 4 && xhr.status == 200) {
                    var result = xhr.responseText;
                    console.log('Result: ' + result);
                    var json = JSON.parse(result);
                    showSuggestions(json);
                    // var json = JSON.parse(result);
                    // showSuggestions(json);
                  }
                };

              }

              // use "input" (every key), not "change" (must lose focus)
              search.addEventListener("input", getSuggestions);

            });

            </script>
          </li>

      <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class=" material-icons">textsms</i></a></li>

        </ul>




      </div>
    </nav>
    </div>

    <!-- Dropdown Structure -->
    <ul id="slide-out" class="side-nav ">
       <li>
         <div class="container">
           {{-- <img class="circle front " src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" width="150px" height="150px" > --}}
           <a href="{{url('profile/'.Auth::id())}}" class="waves-effect"><img class="circle front z-depth-1" src="{{asset('uploads/avatars/'.Auth::User()->avatar)}}" width="160px" height="160px" ></a>
          <br>
         </div>
         <div class="divider"></div>
        </li>
         <div class="user-view">
        <li>
         <a href="{{url('profile/'.Auth::id())}}" ><i class="material-icons">person_pin</i><span class="black-text name"> {{Auth::User()->fname." ".Auth::User()->lname}}</span></a>
        </li>
        <li>
         <a href="{{url('profile/'.Auth::id())}}"><i class="material-icons">email</i><span class="black-text email truncate"> {{Auth::User()->email}}</span></a>
        </li>
       </div>
 <div class="divider">

 </div>
       <li><a href="{{url('/dashboard')}}">Dashboard<i class="material-icons">dashboard</i></a></li>
       <!-- subheaders -->
       {{-- <li><a class="subheader">&nbsp Pinned Goals</a></li>
       <li><a class="subheader">&nbsp  Goals</a></li> --}}
       <!-- // -->
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="#!">Categories<i class="material-icons">toc</i></a></li>
       @foreach ($categorylist as $categorylists)
         <li><a class="col s9" href="{{ url('/dashboard/'.$categorylists->goalcategory) }}">&nbsp;&nbsp;&nbsp {{$categorylists->goalcategory}}</a></li>
       @endforeach
       <br>
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('signout-form').submit();">Sign out<i class="material-icons">settings_power</i></a></li>
                <form id="signout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
       <div class="divider"></div>

     </ul>

    <!-- /head -->
    <!-- end of navbar -->



        @yield('content')

   <!-- footer -->
<footer class="page-footer blue darken-4"  >
         <div class="container">
           <div class="row">
             <div class="col l6 s12">
               <h5 class="white-text">Life With Goals</h5><br>

               <p class="white-text">
                 <a href="#" class="white-text footerCont" style=" font-size:x-small;">English(UK)</a>
                 <a href="" class="white-text footerCont" style=" font-size:x-small;">Sinhalese</a>
               </p>

               <div class="divider"></div>
               <p class="white-text">
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style=" font-size:x-small;">About us</a>
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style=" font-size:x-small;">  Support</a>
                 {{-- <a href="{!! url('/aboutus'); !!}" class="white-text footerCont"> Press</a> --}}
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style=" font-size:x-small;"> Work with us</a>
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
           <div class="container" style=" font-size:x-small;">
           © 2017 Copyright Text
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
