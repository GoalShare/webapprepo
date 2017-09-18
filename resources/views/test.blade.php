@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>


<script src="http://connect.facebook.net/en_US/all.js"></script>


<button onclick="ShowMyName()">test</button>

<script language="javascript" type="text/javascript">
function ShowMyName() {
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '284837855364891',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  FB.ui({
    method: 'send',
    link: 'www.google.com',
    app_id:'284837855364891',
    redirect_uri:'http://www.lifewithgoals.com/test',
    display:'popup',
    to:'',


  });

    }

</script>


  </body>
</html>
@endsection
