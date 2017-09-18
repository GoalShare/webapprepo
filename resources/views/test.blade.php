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


  // Once the SDK is initialized and user is logged in (see below), get friends list.
getFriendsList = function() {
            FB.api('/me/friends', function(response) {
                        console.log(response);
            });
};


// The SDK loaded callback (see below)
window.fbAsyncInit = function() {
            // The SDK is loaded so let's init it.
            FB.init({
                appId: '284837855364891',
                status: true,
                cookie: true,
                xfbml: true,
                version : 'v2.1'
            });
            // We check the user's login status
            FB.getLoginStatus(function(response) {
                        if (response.status === 'connected') {
                                    // If user is already logged in on your site with FB, we get the friends list now.
                                    getFriendsList();
                        } else {
                                    // If the user is NOT already logged in, we ask him to do it first
                                    FB.login(function(response) {
                                                if (response.authResponse) {
                                                            // User logged in, let's get the friends list.
                                                            getFriendsList();
                                                } else {
                                                            // User refused to give your site permissions, no friends list !
                                                }
                                    });
                        }
            });
};



// Here you will load Facebook's SDK asynchronously (it will not block your page loading)
// Once the SDK is loaded, it will call the window.fbAsyncInit function above
(function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));



    }

</script>


  </body>
</html>
@endsection
