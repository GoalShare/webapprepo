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


<button><script type="in/Login"></script></button>
<script>

IN.API.Raw().url(url).method(methodType).body(bodyContent).result(resultCallback);


  // Setup an event listener to make an API call once auth is complete
    function onLinkedInLoad() {
      IN.Event.on(IN, "auth", shareContent);
    }

  // Handle the successful return from the API call
  function onSuccess(data) {
    console.log(data);
  }

  // Handle an error response from the API call
  function onError(error) {
    console.log(error);
  }

  // Use the API call wrapper to share content on LinkedIn
  function shareContent() {

    // Build the JSON payload containing the content to be shared
    var payload = {
      "comment": "Check out developer.linkedin.com! http://linkd.in/1FC2PyG",
      "visibility": {
        "code": "anyone"
      }
    };

    IN.API.Raw("/people/~/shares?format=json")
      .method("POST")
      .body(JSON.stringify(payload))
      .result(onSuccess)
      .error(onError);
  }

</script>
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
