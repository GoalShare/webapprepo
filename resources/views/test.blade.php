@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>


<script src="http://connect.facebook.net/en_US/all.js"></script>


<a href="fb-messenger://share/?link= https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fsharing%2Freference%2Fsend-dialog&app_id=123456789">Send In Messenger</a>

<script language="javascript" type="text/javascript">
window.open('fb-messenger://share?link=' + encodeURIComponent(www.lifewithgoals.com) + '&app_id=' + encodeURIComponent(284837855364891));

</script>


  </body>
</html>
@endsection
