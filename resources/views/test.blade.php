@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>


<script src="http://connect.facebook.net/en_US/all.js"></script>


<script language="javascript" type="text/javascript">
    FB.init({
        appId: '284837855364891',
        status: true,
        cookie: true,
        xfbml: true
    });
</script>
<button name="my_full_name" onclick="ShowMyName()" value="My Name" />
<script language="javascript" type="text/javascript">
function ShowMyName() {
  /* make the API call */
FB.api(
"/{user-id}/friendlists",
function (response) {
if (response && !response.error) {
console.log(response);
}
}
);



    }

</script>


  </body>
</html>
@endsection
