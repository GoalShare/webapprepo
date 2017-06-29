<!doctype html>
<html lang="en">
  <head>
    <!-- Compiled and minified CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{asset('css/materialize.css')}}">
<script src="{{asset('js/materialize.min.js')}}"></script>



<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Goal</title>

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
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/circle.css')}}">

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

        /*.demo-list-control {
          width: 300px;
        }*/

        .demo-list-radio {
          display: inline;
        }
        .btn2{
          padding-top: 20px;
        }
        .progressBar{
          margin-top:  -2px;
        }
        .clearfix:before,.clearfix:after {content: " "; display: table;}
        .clearfix:after {clear: both;}
        .clearfix {*zoom: 1;}
    </style>
    @foreach ($goal as $goals)
        @endforeach
        @foreach ($user as $users)
            @endforeach
    <div id="addtaskmodal" class="modal modal-fixed-footer">
      <div class="modal-content" style="text-align:center;">
        <h4>Add a Task</h4>
        <form action="{{route('goal')}}" method="post" id="addtaskform">
  {{ csrf_field() }}
          <input type="text" class="hidden" value="{{$goals->goalid}}" name="goalid">
          <input type="text" class="hidden" value="addtask" name="action">
          <input type="text" class="hidden" value="{{$goals->goalauthorization}}" name="goalauthorization">
          <div class="collection">
            <a href="#!" class="collection-item">
              <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" style="color:#565656;" type="text" id="taskname" name="taskname">
                <label class="mdl-textfield__label" style="color:#565656;"for="taskname">Task Name</label>
              </div>
            </a>
            <a href="#!" class="collection-item">
              <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" style="color:#565656;" type="text" id="taskintent" name="taskintent">
                <label class="mdl-textfield__label" style="color:#565656;"for="taskintent">Task Intent</label>
              </div>
            </a>
            <a href="#!" class="collection-item">
              <br>
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="taskpriority" value="high" checked>
                <span class="mdl-radio__label">High Priority</span>
              </label>&nbsp;&nbsp;
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="taskpriority" value="medium">
                <span class="mdl-radio__label">Medium Priority</span>
              </label>&nbsp;&nbsp;
              <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                <input type="radio" id="option-3" class="mdl-radio__button" name="taskpriority" value="low">
                <span class="mdl-radio__label">Low Priority</span>
              </label>
              <br>
            </a>
            <a href="#!" class="collection-item">
              <div class="mdl-textfield mdl-js-textfield">
                <label  style="color:#565656;font-size:12pt;"for="taskstartdate">Task Start-Date</label>
                <input class="mdl-textfield__input" style="color:#565656;" type="date" id="taskstartdate" name="taskstartdate">
              </div>
            </a>
            <a href="#!" class="collection-item">
              <div class="mdl-textfield mdl-js-textfield">
                <label  style="color:#565656;font-size:12pt;"for="taskenddate">Task End-Date</label>
                <input class="mdl-textfield__input" style="color:#565656;" type="date" id="taskenddate" name="taskenddate">
              </div>
            </a>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" id="addtaskbtn" style="margin-right:10px;margin-left:10px;"class="modal-action waves-effectwaves-effect waves-light btn">Add Task</button>
      </form>  <a href="#!" id="cancelmodalbtn" style="margin-right:10px;margin-left:10px;"class="model-close waves-effectwaves-effect waves-light btn">Not Now</a>
      </div>
      <script>
      document.getElementById("cancelmodalbtn").addEventListener("click",function(event){
        $('#addtaskmodal').modal('close');
      });
      var addtaskbtn=document.getElementById('addtaskbtn');
      addtaskbtn.addEventListener("click",function(event){
        event.preventDefault();
        addtask();
      });
      function addtask(){
       var form = document.getElementById("addtaskform");
       var action = form.getAttribute("action");
       var form_data = new FormData(form);
       var xhr = new XMLHttpRequest();
       xhr.open('POST', action, true);
       xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
       xhr.send(form_data);
       xhr.onreadystatechange = function () {
         if(xhr.readyState == 4 && xhr.status == 200) {
            var result = xhr.responseText;
            console.log('Result: ' + result);
            $('#addtaskmodal').modal('close');
         }
       };
     }
      </script>
    </div>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Title</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">

        </nav>
        <!-- ----------------------------------------------- -->
        <form action="#">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="site-search">
                <i class="material-icons">search</i>
              </label>
              <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="search" id="site-search" />
                <label class="mdl-textfield__label" for="site-search">Search</label>
              </div>
            </div>
        </form>


         &nbsp   &nbsp
        <!-- --------------------------------------------------------- -->



        <p id="hdrbtn1" class="btn2">
          <span class=" material-icons mdl-badge" data-badge="20">sms</span>
        </p>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn1">
          <li class="mdl-menu__item">line One</li>
        </ul> &nbsp   &nbsp

        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
          <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
          <li class="mdl-menu__item">About</li>
          <li class="mdl-menu__item">Contact</li>
          <li class="mdl-menu__item">Log out</li>
        </ul>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <!-- <span class="mdl-layout-title">Title</span> -->


    <img src="{{asset('img/internships.png')}}" class="demo-avatar">
    <div class="demo-avatar-dropdown">
      <span>Name</span>
      <div class="mdl-layout-spacer"></div>
      <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
        <i class="material-icons" role="presentation">arrow_drop_down</i>
        <span class="visuallyhidden">Accounts</span>
      </button>
      <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
        <li class="mdl-menu__item">Email</li>
        <li class="mdl-menu__item">Log out</li>

      </ul>
    </div>





    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <div class="drawer-separator"></div>
      &nbsp Category
      <a class="mdl-navigation__link" href=""><i class="material-icons">label</i> &nbsp   &nbsp   &nbsp Academic</a>

      <a class="mdl-navigation__link" ><i class="material-icons">add</i>  &nbsp   &nbsp   &nbsp Add new </a>
      <div class="drawer-separator"></div>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  </div>
  </head>
  <body>

    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <!-- <div class="demo-back">
          <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color-text--grey-900" href="index.html" title="go back" role="button">
            <i class="material-icons" role="presentation">arrow_back</i>
          </a>
        </div> -->
        <div class="demo-blog__posts mdl-grid">
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3>{{$goals->goalname}}</h3>
              <div class="section-spacer"></div>
              <div class="clearfix">
                  <div class="c100 p50 big">
                      <span>{{$goals->goalcompletedpercentage}}%</span>
                      <div class="slice">
                          <div class="bar"></div>
                          <div class="fill"></div>
                      </div>
                  </div>
            </div>
              {{-- <div id="p3" class="mdl-progress mdl-js-progress"></div>
              <script>
                document.querySelector('#p3').addEventListener('mdl-componentupgraded', function() {
                  this.MaterialProgress.setProgress({{$goals->goalcompletedpercentage}});
                  // this.MaterialProgress.setBuffer(55);
                });
              </script> --}}
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"><i class="material-icons">person</i></div>
              <div>
                <strong>{{$users->fname}}&nbsp;{{$users->lname}}({{$goals->goalauthorization}})</strong>
                <span>Goal Ending on : @php
                          $edt= Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalenddate)->toFormattedDateString();
                        @endphp{{$edt}}</span>
              </div>
              <div class="section-spacer"></div>
              <div class="meta__favorites">
                <i class="material-icons">thumb_up</i>
                <span class="visuallyhidden">like</span>
              </div>
              <!-- <div>
                <i class="material-icons" role="presentation">bookmark</i>
                <span class="visuallyhidden">bookmark</span>
              </div> -->

              <div>
                <!-- Share icon by Icons8 -->
<img class="icon icons8-Share" width="30" height="30" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAACAklEQVRIS8VWwU3DQBDcuUj5AhVAB0AFhAqACvAjJ+VHUgGhApxfdBcJUwF0QFIBoQKgA/heZC9adEFHiGMcHHw/y/bNzuzu7IJqOqgJlzYC3G63W0qpI2YeW2sny8hVCtzpdPbSNL0DcDAHY+Zpo9E4Gw6HL2EAlQJrrccAjhYZeubHGwEWtlmWPefVjHNuJ0mSt/n7yhj7vD7kATPzobV2WimwB70hor0c4HdjzHZlUnt5r4notKAte8aY+M/AURRtN5vNCyLqB5e9yzMzvwHoEtE+M08AxMaY+8XASudYax0BuFyQ9dY51w2Lp8iYlgJ7Cc+ZuQVgqpQapGkqOboG0Ap6VMyhGxZNEWBucUmhABAT+FYM4YXM/CqyWmuT3wIVSq21fgGwu+LCK+dcXEbWQsvUWh8AeFwBerasUNZh/S3HtQFL5L+Quu+cG1QqtQB7F5K+21ohoUyavjHmdh2Z5Z9V7RRJOxGRjLXYt1McTh+ZOkTUq6SdihiIgQjbsPKZOZnNZr0y8pd2LgnMW6bYojjY5xGr9BYq1nkhy4AoAmBQiWWGiviNQ+Q/+ZchsQji3S7JMx5Rw1q78+fptIxdLYuABFLb6uPNJ2/Zm1hrv6Zabh8XtVTee89azGc/+OZJKXW60fV2Dubz3cqybDwajcRkfpy1+nhdRTZS1WWD+QBizP4f7ScdcAAAAABJRU5ErkJggg==">
                <span class="visuallyhidden">share</span>
              </div>
              <div>
                <!-- Merge Git icon by Icons8 -->
<img class="icon icons8-Merge-Git" width="40" height="40" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAACy0lEQVRYR+2YX27aQBDGZyzZr01PkPQEDSconKDkBHUkvOIxPUHICULe0C4PcIPcIHCCOicoPUHpG7LBUw1ao5Xlf7JZQFX30WD75292Zr5ZhAtfeOF88G8ADofDmyRJvgHALQCESZIsp9Pp4hTqVyoohBgBwGMWhogWcRzfzWaztU3QUkAhxAMAPBcBMKRSqndOQFbnQwpAREsAuEHE6/RakiQ9m+EuVHAwGHQdx3nLgvi+f+W6bmhAPkkpeRtYWbUBpZSH/wZBsEDEL5poLqX0rdABFJeZIAhuEfGHEd6ZUuo+qywAnEdBBssolSuS4zifJpPJ6uQKakBWkevdIVFMECK6V0rNbMHxcyvrIIcaAMbGngMi+oWID1LKV5twtQBTACEEGfvxRSnFNdL6qlSwADBUSnWs09UJcR4gX7OdHOl7Gyl4ivp3DEBOlo5SKrQZ6jYKMtcqiqKOTUfTFpBVDOM47tmCbAr4J+NyOMxctHPDzYZ3t9s9ImKX3RArDwCzKIpeqj6sKeAdALCD+WzUxjUijrMv1YX+DRGvsnu1jvqNANkDbrfb0HXdV7PDaIC9Oo7jzDebzdrzPDYcrFrRKnVDjQFTk1o0EjANEbGqpnJzduHcJk31oyj6WBTq1oAMwhYMEUc5apqqvUspua8Dm17P836nP5a58qMAGt2mT0Q+In7N229pe9RT4s+TA6Yv1ACsVh8AeFzdLyJia8aZzh+xV5NXqxDrLHzWJSJ9JifC9zp2KwiClTlk5WRK8yQpKxFakUrDqkeHItP7HkVRt6wWlu7BY1l+HfIREXEyXWvDy4V63LhQZ4cmANiH4mKGpizIxY2dZYN7pjucb+wUQmSPPrgLcNs6tK6zHX1wltY4PFoqpdihWFuVnaTk+G0Zx3G/KgvbklcC8gt0mfCJiAd5PsBc2DzRMj+qFmBbFdrc/x+wjXp8718e+8g4tuUMVAAAAABJRU5ErkJggg==">
                <span class="visuallyhidden">align</span>
              </div>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                <div class="mdl-tabs__tab-bar">
                    <a href="#overview-panel" class="mdl-tabs__tab is-active">Overview</a>
                    <a href="#tasks-panel" class="mdl-tabs__tab">Tasks</a>
                    <a href="#skills-panel" class="mdl-tabs__tab">Skills</a>
                    <a href="#privacy-panel" class="mdl-tabs__tab">Privacy</a>
                </div>

                <div class="mdl-tabs__panel is-active" id="overview-panel">
                  <br>
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                    <tbody>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric"><b>Intent</b></td>

                          <form action="{{route('goal')}}" method="post" id="intentfrm" style="display:inline;">
                            {{ csrf_field() }}
                            <td>
                            <div class="mdl-textfield mdl-js-textfield">
                              <input class="mdl-textfield__input" name="goalintent" type="text" id="intent" disabled>
                              <input type="text" class="hidden" value="{{$goals->goalid}}" name="goalid">
                              <input type="text" class="hidden" value="updategoal" name="action">
                              <input type="text" class="hidden" value="goalintent" name="attribute">
                              <label class="mdl-textfield__label" id="intentfield" for="intent" style="text-align:right;"><span id="resultintent" style="color:#3a3a3a;">{{$goals->goalintent}}</span></label>
                            </div>
                            </td>
                              <td><button  style="display:none;" type="submit" id="editintent"><i class="material-icons">done</i></button><button id="intentbtn" ><i class="material-icons mdl-color-text--grey-700">mode_edit</i></button></td>
                          </form>


                        <script>

                          window.onload=function(){
                          var intentbtn=document.getElementById('intentbtn');
                          var editintent=document.getElementById('editintent');
                          var intent=document.getElementById('intent');
                          var intentfield=document.getElementById('intentfield');

                          var categorybtn=document.getElementById('categorybtn');
                          var editcategory=document.getElementById('editcategory');
                          var category=document.getElementById('category');
                          var categoryfield=document.getElementById('categoryfield');

                          intentbtn.addEventListener("click", function(event) {
                          event.preventDefault();
                          document.getElementById('resultintent').innerHTML='';
                          intent.disabled=false;
                          intent.focus();
                          editintent.style.display='inline';
                          intentbtn.style.display='none';
                        });
                          categorybtn.addEventListener("click", function(event) {
                          event.preventDefault();
                          document.getElementById('resultcategory').innerHTML='';
                          category.disabled=false;
                          category.focus();
                          editcategory.style.display='inline';
                          categorybtn.style.display='none';
                        });

                          editintent.addEventListener("click",function(event){
                            event.preventDefault();
                            editintentpost();
                          });

                          editcategory.addEventListener("click",function(event){
                            event.preventDefault();
                            editcategorypost();
                          });

                        }
                        function editcategorypost(){
                         var form = document.getElementById("categoryfrm");
                         var action = form.getAttribute("action");
                         var result_category = document.getElementById("resultcategory");
                         var form_data = new FormData(form);

                         var xhr = new XMLHttpRequest();
                         xhr.open('POST', action, true);
                         xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                         xhr.send(form_data);
                         xhr.onreadystatechange = function () {
                           if(xhr.readyState == 4 && xhr.status == 200) {
                              var result = xhr.responseText;
                              console.log('Result: ' + result);
                              if(result!=''){
                              result_category.innerHTML = result;
                             category.disabled=true;
                             editcategory.style.display='none';
                             categorybtn.style.display='inline';
                             category.style.textAlign='right';

                           }
                             else {
                               result_category.innerHTML='this field cannot be empty';
                               result_category.style.color='red';
                             }
                           }
                         };
                       }

                          function editintentpost(){
                           var form = document.getElementById("intentfrm");
                           var action = form.getAttribute("action");
                           var result_div = document.getElementById("resultintent");
                           var form_data = new FormData(form);

                           var xhr = new XMLHttpRequest();
                           xhr.open('POST', action, true);
                           xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                           xhr.send(form_data);
                           xhr.onreadystatechange = function () {
                             if(xhr.readyState == 4 && xhr.status == 200) {
                                var result = xhr.responseText;
                                console.log('Result: ' + result);
                                // var json = JSON.parse(result);
                                // if(json.hasOwnProperty('errors') && json.errors.length > 0) {
                                //   displayErrors(json.errors);
                                // } else {
                                  // postResult(json.intent);
                                // }
                                if(result!=''){
                                result_div.innerHTML = result;
                               intent.disabled=true;
                               editintent.style.display='none';
                               intentbtn.style.display='inline';
                               intent.style.textAlign='right';

                             }
                               else {
                                 result_div.innerHTML='this field cannot be empty';
                                 result_div.style.color='red';
                               }
                             }
                           };
                         }
                        </script>
                      </tr>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric"><b>category</b></td>

                          <form action="{{route('goal')}}" method="post" id="categoryfrm" style="display:inline;">
                            {{ csrf_field() }}
                            <td>
                            <div class="mdl-textfield mdl-js-textfield">
                              <input class="mdl-textfield__input" name="goalcategory" type="text" id="category" disabled>
                              <input type="text" class="hidden" value="{{$goals->goalid}}" name="goalid">
                              <input type="text" class="hidden" value="updategoal" name="action">
                              <input type="text" class="hidden" value="goalcategory" name="attribute">
                              <label class="mdl-textfield__label" id="categoryfield" for="category" style="text-align:right;"><span id="resultcategory" style="color:#3a3a3a;">{{$goals->goalcategory}}</span></label>
                            </div>
                            </td>
                              <td><button  style="display:none;" type="submit" id="editcategory"><i class="material-icons">done</i></button><button id="categorybtn" ><i class="material-icons mdl-color-text--grey-700">mode_edit</i></button></td>
                          </form>
                        </tr>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric"><b>Category</b></td>
                        <td>{{$goals->goalcategory}}</td>
                        <td><a href="#"><i class="material-icons mdl-color-text--grey-700">mode_edit</i></a></td>
                      </tr>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric"><b>Priority</b></td>
                        <td>{{$goals->goalpriority}}</td>
                        <td><a href="#"><i class="material-icons mdl-color-text--grey-700">mode_edit</i></a></td>
                      </tr>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric"><b>Start Date</b></td>
                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalstartdate)->toFormattedDateString()}}</td>
                        <td><a href="#"><i class="material-icons mdl-color-text--grey-700">mode_edit</i></a></td>
                      </tr>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric"><b>End Date</b></td>
                        <td>{{Carbon\Carbon::createFromFormat('Y-m-d', $goals->goalenddate)->toFormattedDateString()}}</td>
                        <td><a href="#"><i class="material-icons mdl-color-text--grey-700">mode_edit</i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="mdl-tabs__panel" id="tasks-panel">
                  @if ($task->isEmpty())
                    <div id="notask" class="row">
                      <div class="col s12 m12">
                        <div class="card blue-grey darken-1">
                          <div class="card-content white-text">
                            <span class="card-title">No Tasks are added yet</span>
                            <p>start working on your goal by adding tasks click the button below to add a new task</p>
                          </div>
                          <div class="card-action">
                            <a  href="#addtaskmodal">Add a Task</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script>
                    $(document).ready(function(){
                        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                        $('.modal').modal();
                      });

                    </script>
                  @else
                  <ul class="collapsible" data-collapsible="expandable">
                    @php
                      $taskcount=1;
                    @endphp
                    @foreach ($task as $tasks)
                      <li>
                        <div class="collapsible-header">{{$taskcount}}&nbsp;&nbsp;{{$tasks->taskname}}</div>
                        <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                      </li>
                    @endforeach
                  </ul>
                @endif
                </div>
                <div class="mdl-tabs__panel" id="skills-panel">
                  <h5>Skills I have:</h5>
                  <span class="mdl-chip mdl-chip--deletable">
                      <span class="mdl-chip__text">{Skill 1}</span>
                      <button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button>
                  </span>
                  <span class="mdl-chip mdl-chip--deletable">
                      <span class="mdl-chip__text">{Skill 2}</span>
                      <button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button>
                  </span>
                  <span class="mdl-chip mdl-chip--deletable">
                      <span class="mdl-chip__text">{Skill 3}</span>
                      <button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button>
                  </span>
                  <form action="#">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                      <input class="mdl-textfield__input" type="text" id="skillsIHave">
                      <label class="mdl-textfield__label" for="skillsIHave">Add more...</label>
                    </div>
                  </form>
                  <div class="section-spacer"></div>

                  <h5>Skills to acquire:</h5>
                  <span class="mdl-chip mdl-chip--deletable">
                      <span class="mdl-chip__text">{Skill 1}</span>
                      <button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button>
                  </span>
                  <span class="mdl-chip mdl-chip--deletable">
                      <span class="mdl-chip__text">{Skill 2}</span>
                      <button type="button" class="mdl-chip__action"><i class="material-icons">cancel</i></button>
                  </span>
                  <form action="#">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                      <input class="mdl-textfield__input" type="text" id="skillsToAcquire">
                      <label class="mdl-textfield__label" for="skillsToAcquire">Add more...</label>
                    </div>
                  </form>
                </div>

                <div class="mdl-tabs__panel" id="privacy-panel">

                  <ul class="demo-list-control mdl-list">

                    <li class="mdl-list__item">
                      <span class="mdl-list__item-primary-content">
                        make intent private
                      </span>
                      <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="pryset1">
                          <input type="checkbox" id="pryset1" class="mdl-switch__input" checked />
                        </label>
                      </span>
                    </li>
                    <li class="mdl-list__item">
                      <span class="mdl-list__item-primary-content">
                        make category private
                      </span>
                      <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="pryset2">
                          <input type="checkbox" id="pryset2" class="mdl-switch__input" checked />
                        </label>
                      </span>
                    </li>
                    <li class="mdl-list__item">
                      <span class="mdl-list__item-primary-content">
                        make start date private
                      </span>
                      <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="pryset3">
                          <input type="checkbox" id="pryset3" class="mdl-switch__input"  />
                        </label>
                      </span>
                    </li>
                    <li class="mdl-list__item">
                      <span class="mdl-list__item-primary-content">
                        make end date private
                      </span>
                      <span class="mdl-list__item-secondary-action">
                        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="pryset4">
                          <input type="checkbox" id="pryset4" class="mdl-switch__input" checked />
                        </label>
                      </span>
                    </li>

                  </ul>

                </div>
              </div>
            </div>

            <!-- start of comments -->
            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <form>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <textarea rows=1 class="mdl-textfield__input" id="comment"></textarea>
                  <label for="comment" class="mdl-textfield__label">Join the discussion</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                  <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                </button>
              </form>
              <div class="comment mdl-color-text--grey-700">
                <header class="comment__header">
                  <img src="images/co1.jpg" class="comment__avatar">
                  <div class="comment__author">
                    <strong>{Commenter's name}</strong>
                    <span>{x time ago}</span>
                  </div>
                </header>
                <div class="comment__text">
                  In in culpa nulla elit esse. Ex cillum enim aliquip sit sit ullamco ex eiusmod fugiat. Cupidatat ad minim officia mollit laborum magna dolor tempor cupidatat mollit. Est velit sit ad aliqua ullamco laborum excepteur dolore proident incididunt in labore elit.
                </div>
                <nav class="comment__actions">
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
                  </button>
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">thumb_down</i><span class="visuallyhidden">dislike comment</span>
                  </button>
                  <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">share</i><span class="visuallyhidden">share comment</span>
                  </button>
                </nav>
                <div class="comment__answers">
                  <div class="comment">
                    <header class="comment__header">
                      <img src="images/co2.jpg" class="comment__avatar">
                      <div class="comment__author">
                        <strong>{Replier's Name}</strong>
                        <span>{x time ago}</span>
                      </div>
                    </header>
                    <div class="comment__text">
                      Yep, agree!
                    </div>
                    <nav class="comment__actions">
                      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
                      </button>
                      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">thumb_down</i><span class="visuallyhidden">dislike comment</span>
                      </button>
                      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">share</i><span class="visuallyhidden">share comment</span>
                      </button>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of comments -->

          </div>

          <!-- <nav class="demo-nav mdl-color-text--grey-50 mdl-cell mdl-cell--12-col">
            <a href="index.html" class="demo-nav__button">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--grey mdl-color-text--white-900" role="presentation">
                <i class="material-icons">arrow_back</i>
              </button>
              Newer
            </a>
            <div class="section-spacer"></div>
            <a href="index.html" class="demo-nav__button">
              Older
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon mdl-color--white mdl-color-text--grey-900" role="presentation">
                <i class="material-icons">arrow_forward</i>
              </button>
            </a>
          </nav> -->
        </div>
        <footer class="mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter">
              <span class="visuallyhidden">Twitter</span>
            </button>
            <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger">
              <span class="visuallyhidden">Facebook</span>
            </button>
            <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus">
              <span class="visuallyhidden">Google Plus</span>
            </button>
          </div>
          <div class="mdl-mini-footer--right-section">
            <!-- <button class="mdl-mini-footer--social-btn social-btn__share">
              <i class="material-icons" role="presentation">share</i>
              <span class="visuallyhidden">share</span>
            </button> -->
            {can write something}
            {copyright maybe?}
          </div>
        </footer>
      </main>
      <div class="mdl-layout__obfuscator"></div>
    </div>
    <!-- <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/blog/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--white">View Source</a> -->



  </body>
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
      el.addEventListener('click', function() {
        location.href = target;
      });
    });
  </script>
</html>
