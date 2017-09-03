@extends('layouts.navbar')

@section('content')


<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=gapiLoad"></script>
    <script src="https://apis.google.com/js/client.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  </head>
  <body>

    <script type="text/javascript">
    var myObj, i, j, x = "";
          var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
          var apiKey = 'R9ijmkXitCwlC-Zh7oY26ICw';
          var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

          $(document).on("click",".googleContactsButton", function(){
            gapi.client.setApiKey(apiKey);
            window.setTimeout(authorize);
          });

          function authorize() {
            gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
          }

          function handleAuthorization(authorizationResult) {
            if (authorizationResult && !authorizationResult.error) {
              $.get("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
                function(result){

                  //process the response here
                  // console.log(JSON.stringify(result));

                  console.log(result);
                  document.write(result.feed.entry.gd$email[0]);
                  document.write(result.feed.entry[200].gd$email[0].address+'<br>');
                  // for(var i=0;i<50;i++){
                  //
                  //              document.write(result.feed.entry[i].gd$email[0].address+'<br>');
                  //
                  //
                  //  }

                });
            }
          }

  //   function auth() {
	//     var config = {
	//       'client_id': '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com',
	//       'scope': 'https://www.google.com/m8/feeds'
	//     };
	//     gapi.auth.authorize(config, function() {
	//       fetch(gapi.auth.getToken());
  //
	//     });
	//   }
  //
	//   function fetch(token) {
	//     $.ajax({
	// 	    url: "https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&alt=json",
	// 	    dataType: "jsonp",
	// 	    success:function(data) {
  //                             // display all your data in console
	// 	            console.log(JSON.stringify(data));
  //               console.log(data);
  //
  //               for(var i=0;i<data.feed.entry.length;i++){
  //                 var z=data.feed.entry[i].link[0].href;
  //               document.write(data.feed.entry[i].gd$email[0].address+'<br>');
  //
  //
  //             }
  //
  //
	// 	    }
	// 	});
	// }



        </script>
         <!-- <button onclick="auth();">GET CONTACTS FEED</button> -->

         <button class="googleContactsButton">Get my contacts</button>


  </body>
</html>
@endsection
