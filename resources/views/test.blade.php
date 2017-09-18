@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>

<div id="facebook_invite"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<a href="#" onclick="FBInvite()">Invite Facebook Friends</a>
<script>
 FB.init({
  appId:'284837855364891',
  cookie:true,
  status:true,
  xfbml:true
 });
</script>
<script>
 function FBInvite(){
  FB.ui({
   method: 'apprequests',
   message: 'Invite your Facebook Friends'
  },function(response) {
   if (response) {
    alert('Successfully Invited');
   } else {
    alert('Failed To Invite');
   }
  });
 }
</script>
  </body>
</html>
@endsection
