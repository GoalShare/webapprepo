@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
<head>
<title>Your Website Title</title>
  <!-- You can use open graph tags to customize link previews.
  Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="http://www.lifewithgoals.com/test" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="{{asset('favicon/android-chrome-256x256.png')}}" />
</head>
  <body>


<script src="http://connect.facebook.net/en_US/all.js"></script>


<div style="height:50px;" data-layout="button_count" class="fb-invite" data-href="http://www.lifewithgoals.com/"></div>
<div id="fb-root"></div>
<script language="javascript" type="text/javascript">

  window.fbAsyncInit = function() {
    FB.init({
      appId            : '284837855364891',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


</script>




  </body>
</html>
@endsection
