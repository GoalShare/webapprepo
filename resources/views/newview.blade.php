@extends('layouts.navbar')

@section('content')
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="{{asset('/css/stylenewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->
  <link href="{{asset('/css/custom-stylenewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- CSS style Horizontal Nav (Layout 03)-->
  <link href="{{asset('/css/style-horizontalnewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{asset('/css/prismnewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('/css/perfect-scrollbarnewview.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset('/css/chartistnewview.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  </head>

  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!-- START CONTENT -->
        <section id="content">
          <!--start container-->
            <div id="profile-page" class="section">
              <div class="row">
              <!-- profile-page-header -->
              <div class="col l2 m2"></div>

              <div class="col l8 m8">
                <div id="profile-page-header" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="imagesnewview/user-profile-bg.jpg" alt="user background">
                    </div>
                  <figure class="card-profile-image">
                      <img src="imagesnewview/avatar.jpg" alt="profile image" class="circle z-depth-2 responsive-img activator">
                  </figure>
                  <div class="card-content">
                    <div class="row">
                      <div class="col s3 offset-s2">
                          <h4 class="card-title grey-text text-darken-4">Roger Waters</h4>
                          <p class="medium-small grey-text">Project Manager</p>
                      </div>
                      <div class="col s2 center-align">
                          <h4 class="card-title grey-text text-darken-4">10+</h4>
                          <p class="medium-small grey-text">Work Experience</p>
                      </div>
                      <div class="col s2 center-align">
                          <h4 class="card-title grey-text text-darken-4">6</h4>
                          <p class="medium-small grey-text">Completed Projects</p>
                      </div>
                      <div class="col s2 center-align">
                          <h4 class="card-title grey-text text-darken-4">$ 1,253,000</h4>
                          <p class="medium-small grey-text">Busness Profit</p>
                      </div>
                      <div class="col s1 right-align">
                        <a class="btn-floating activator waves-effect waves-light darken-2 right">
                            <i class="material-icons white-text text-darken-2">perm_identity</i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-reveal">
                      <p>
                        <span class="card-title grey-text text-darken-4">Roger Waters <i class="material-icons right">clear</i></span>
                        <span><i class="material-icons cyan-text text-darken-2">perm_identity</i>Project Manager</span>
                      </p>

                      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>

                      <p><i class="material-icons cyan-text text-darken-2">perm_phone_msg</i> +1 (612) 222 8989</p>
                      <p><i class="material-icons cyan-text text-darken-2">email</i> mail@domain.com</p>
                      <p><i class="material-icons cyan-text text-darken-2">cake</i> 18th June 1990</p>
                      <p><i class="material-icons cyan-text text-darken-2">airplanemode_active</i> BAR - AUS</p>
                  </div>
              </div>
            </div>

            <div class="col l2 m2"></div>
          </div>
              <!--/ profile-page-header -->

              <!-- profile-page-content -->
              <div id="profile-page-content" class="row">
                <div class="col l2 m2"></div>
                <!-- profile-page-sidebar-->
                <div id="profile-page-sidebar" class="col s12 m4">
                  <!-- Profile About  -->
                  <div class="card light-blue">
                    <div class="card-content white-text">
                      <span class="card-title">About Me!</span>
                      <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                    </div>
                  </div>
                  <!-- Profile About  -->
                </div>
                <!-- profile-page-sidebar-->

                <!-- profile-page-wall -->
                <div id="profile-page-wall" class="col s12 m4">
                  </div>
                <!--/ profile-page-wall -->
                <div class="col l2 m2"></div>
              </div>
            </div>


          <!--end container-->
        </section> <!-- END CONTENT -->




    <!--prism-->
    <script type="text/javascript" src="{{asset('/js/prismnewview.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset('/js/perfect-scrollbarnewview.min.js') }}"></script>
    <!-- chartist -->
    <script type="text/javascript" src="{{asset('/js/chartistnewview.min.js') }}"></script>
    <!-- sparkline -->
    <script type="text/javascript" src="{{asset('/js/jquery.sparklinenewview.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('/js/sparkline-scriptnewview.js') }}"></script>
    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset('/js/pluginsnewview.js') }}"></script>

  </body>
  </html>
@endsection
