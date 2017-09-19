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
<meta property="og:title"         content="Life With Goals" />
<meta property="og:description"   content="A front-end template that helps you build fast, modern mobile web apps" />
<meta property="og:image"         content="http://www.lifewithgoals.com/favicon/LOGO.png" />
<meta property="og:image:type"    content="image/png" />
<meta property="og:image:width"   content="50%" />
<meta property="og:image:height"  content="50%" />

<script type="text/javascript" src="//platform.linkedin.com/in.js">
    api_key:   81te096pbtgr0p
    onLoad:    onLinkedInLoad
    authorize: true
    lang:      en_US


</script>
</head>
  <body>

    <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
    <script type="IN/Share" data-url="http://www.lifewithgoals.com/" data-counter="right"></script>
</script>


<script src="http://connect.facebook.net/en_US/all.js"></script>


<div style="height:50px;" data-layout="button_count" data-size="large" colorscheme="dark" class="fb-send" data-href="http://www.lifewithgoals.com/"></div>
<div id="fb-root"></div>
<script language="javascript" type="text/javascript">

  window.fbAsyncInit = function() {
    FB.init({
      appId            : '284837855364891',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });

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
