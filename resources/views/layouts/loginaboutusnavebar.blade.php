<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/client.js"></script>
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.1.24.min.js"></script>
    <link rel="stylesheet" href="{{asset('materialize/css/materialize.css')}}">
    <meta name="description" content="Welcome to lifewithgoals.com. Set your life goals and track your achievements">
    <script src="{{asset('materialize/js/materialize.js')}}"></script>
    <meta charset="utf-8">
    <meta name="keywords" content="www.lifewithgoals.com, life, goals, lifewithgoals, goal management, goal management system, goals for life, set goals, add goals, search goals, make goals, create goals, aim, life aims, improve my life, my goals, my life goals, achive, manage life, etc.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->

<meta property="og:type"            content="article" />
<meta property="og:url"             content="http://www.lifewithgoals.com" />
<meta property="og:title"           content="Introducing our New Site" />
<meta property="og:image"           content="" />
<meta property="og:description"    content="" />

  <script type="text/javascript" src="//platform.linkedin.com/in.js">
      api_key:   81te096pbtgr0p
      onLoad:    onLinkedInLoad
      authorize: true
      lang:      en_US


  </script>
    <title>Life With Goals</title>
{{-- favicon --}}
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favicon/manifest.json')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
    <nav>
      <div class="nav-wrapper blue darken-4 ">
        <ul class="left">
              <li><a href="#" data-activates="slide-out" class="button-collapse left"><i class="material-icons">menu</i></a></li>
              <li><img class="logoImg hide-on-small-only left" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/LOGO.png')}}" alt="" height="40px" width="200px"></li>
              <li><img class="logoImg2 hide-on-med-and-up left" onclick="javascript:location.href='{{url('/dashboard')}}'"  src="{{asset('favicon/favicon.ico')}}" ></li>
        </ul>
      </div>
    </nav>


    <!-- Dropdown Structure -->
    <ul id="slide-out" class="side-nav">



 <div class="divider">

 </div>
       <li><a href="{{url('/dashboard')}}">Dashboard<i class="material-icons">dashboard</i></a></li>
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="{{url('/calendar')}}">My Schedule<i class="material-icons">date_range</i></a></li>
       <li><div class="divider"></div></li>
       <li><a class="waves-effect" href="{{url('/mainlearningboard')}}">Knowledge Hub<i class="material-icons">attach_file</i></a></li>
       <li><a class="waves-effect" href="#sendinvitebtnmodal">Send Invite<i class="material-icons">people</i></a></li>

       <script>

       $(document).ready(function(){
  // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
  $('.modal').modal();
});</script>
       <!-- Modal Structure -->
 <div id="sendinvitebtnmodal" class="modal">
     <div style="height:25px;background-color:#0d47a1;color:white;"><img src="{{asset('favicon/favicon-16x16.png')}}" height="20px">Send Invite</div>
   <div class="modal-content">

     <!-- <h5 style="color:#0d47a1;">We are ready to connect with your friends.</h5> -->
     <div class="row" style="height:25px;"></div>
     <div class="row">
       <div class="col s4 m4 l4">
         <center><a class="googleContactsButton"><img src="{{asset('img/mail_logo_rgb_web.png')}}" style="margin-top:-5%;" width="80%" height="80%"></a></center>
       </div>

       <div class="col s4 m4 l4"><center><a onclick="send_private_msg_to_fb_user()"><img style="cursor:pointer" src="{{asset('img/facebook_logos_PNG19749.png')}}" width="80%" height="80%"></a></center>


         <script type="text/javascript">
    function send_private_msg_to_fb_user(){
       FB.login(function(response){
          if (response.authResponse){
             FB.ui({
                method: 'send',
                name: 'Send Private Message to Facebook User using Javascript Facebook API',
                link: 'http://www.lifewithgoals.com',
               description: 'In this tutorial I will show you how to send private message to facebook user using Javascript Facebook API. Although it looks very complicated but in real it is very simple, just follow the tutorial.'
    });
   }
  });
 }
 </script>
        </div>
       <div class="col s4 m4 l4"><script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
         <center>
           <a><img src="{{asset('img/LinkedIn_Logo.svg.png')}}" data-href="http://www.lifewithgoals.com/" style="cursor:pointer;width:80%; height:80%;" onclick="window.open('https://www.linkedin.com/cws/share?url=http://www.lifewithgoals.com/','targetWindow','width=700px,height=600px');" ></a>
         </center>
       </div>
 </div>
 </div>
</div>


     </ul>

    <!-- /head -->
    <!-- end of navbar -->



        @yield('content')

   <!-- footer -->
<footer class="page-footer blue darken-4"  >
         <div class="container">
           <div class="row">
             <div class="col s12">
               <p class="white-text">
                 <a href="#" class="white-text footerCont" style=" font-size:x-small;">English(UK)</a>
                 <a href="" class="white-text footerCont" style=" font-size:x-small;">Sinhalese</a>
               </p>
             </div>

               <div class="col s12">
                 <div class="col s6">
                  <h3 class="white-text">Life With Goals</h3>
               </div>
               <div class="col s6">
                 <div class="right">
          <a target="_blank" title="find us on Facebook" href="https://www.facebook.com/LifeWithGoals/"><img alt="follow me on facebook" src="//login.create.net/images/icons/user/facebook_30x30.png" border=0></a>&nbsp&nbsp&nbsp&nbsp
          <a target="_blank" title="follow me on youtube" href="https://www.youtube.com/channel/UCP2DuuEb-pU1C1ASw0ZJYRA?view_as=subscriber"><img alt="follow me on youtube" src="https://c866088.ssl.cf3.rackcdn.com/assets/youtube30x30.png" border=0></a>&nbsp&nbsp&nbsp&nbsp
          <a target="_blank" title="follow me on instagram" href="https://www.instagram.com/lifewithgoals_1/"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" border=0></a>&nbsp&nbsp&nbsp&nbsp
          <a target="_blank" title="follow me on twitter" href="http://www.twitter.com"><img alt="follow me on twitter" src="//login.create.net/images/icons/user/twitter_30x30.png" border=0></a>&nbsp&nbsp&nbsp&nbsp
          <a target="_blank" title="follow me on google plus" href="https://plus.google.com"><img alt="follow me on google plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus30x30.png" border=0></a>
        </div>
</div>
</div>
<div class="col s12">

               {{-- <center><h1 class="white-text">Life With Goals</h1></center><br> --}}

               <p class="white-text">
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style="font-size:small;">About us</a>
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style="font-size:small;">  Support</a>
                 <a href="{!! url('/aboutus'); !!}" class="white-text footerCont" style="font-size:small;"> Work with us</a>

                 </p>

             </div>
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
        

</html>
