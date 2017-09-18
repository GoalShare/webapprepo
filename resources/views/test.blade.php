@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>


<script src="http://connect.facebook.net/en_US/all.js"></script>


<a onclick="test();">Send In Messenger</a>

<script language="javascript" type="text/javascript">
function test(){
window.open('fb-messenger://share?link=' + encodeURIComponent(www.lifewithgoals.com) + '&app_id=' + encodeURIComponent(284837855364891));
}
</script>


  </body>
</html>
@endsection
