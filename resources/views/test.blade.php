@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>

<div id="facebook_invite"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<a href="#" onclick="getFriends();">Invite Facebook Friends</a>
<script>
 FB.init({
  appId:'284837855364891',
  cookie:true,
  status:true,
  xfbml:true
 });
</script>
<script>
function getFriends() {
   FB.api('/me/friends', function(response) {
       if(response.data) {
           $.each(response.data,function(index,friend) {
               alert(friend.name + ' has id:' + friend.id);
           });
       } else {
           alert("Error!");
       }
   });
}
</script>
  </body>
</html>
@endsection
