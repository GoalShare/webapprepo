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

    <!-- <script type="text/javascript">
    // var myObj, i, j, x = "";
    //       var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
    //       var apiKey = 'R9ijmkXitCwlC-Zh7oY26ICw';
    //       var scopes = 'https://www.googleapis.com/auth/contacts.readonly';

    //       $(document).on("click",".googleContactsButton", function(){
    //         gapi.client.setApiKey(apiKey);
    //         window.setTimeout(authorize);
    //       });

    //       function authorize() {
    //         gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthorization);
    //       }

    //       function handleAuthorization(authorizationResult) {
    //         if (authorizationResult && !authorizationResult.error) {
    //           $.getJSON("https://www.google.com/m8/feeds/contacts/default/thin?alt=json&access_token=" + authorizationResult.access_token + "&max-results=500&v=3.0",
    //             function(result){

    //               //process the response here
    //               console.log(JSON.stringify(result));

    //             });
    //         }
    //       }

    function auth() {
	    var config = {
	      'client_id': '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com',
	      'scope': 'https://www.googleapis.com/auth/gmail.readonly'
	    };
	    gapi.auth.authorize(config, function() {
	      fetch(gapi.auth.getToken());

	    });
	  }

	  function fetch(token) {
	    $.ajax({
		    url: "https://www.google.com/m8/feeds/contacts/default/full?access_token=" + token.access_token + "&alt=json",
		    dataType: "jsonp",
		    success:function(data) {
                              // display all your data in console
		            console.log(JSON.stringify(data));
                console.log(data);

                for(var i=0;i<data.feed.entry.length;i++){
                  var z=data.feed.entry[i].link[0].href;
                document.write(data.feed.entry[i].gd$email[0].address+'<br>');


              }


		    }
		});
	}



        </script>
         <button onclick="auth();">GET CONTACTS FEED</button>
         <span id="test1"></span>
         <span id="test2"></span>
        <!-- <button class="googleContactsButton">Get my contacts</button> -->


        <div class="container">
        <h1>Gmail API demo</h1>

        <button id="authorize-button" class="btn btn-primary hidden">Authorize</button>

        <table class="table table-striped table-inbox hidden">
          <thead>
            <tr>
              <th>From</th>
              <th>Subject</th>
              <th>Date/Time</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>

      <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

      <script type="text/javascript">
        var clientId = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
        var apiKey = 'AIzaSyCvWE2bE4Kq6xfN166Eaj0GceDBv6P-Qsw';
        var scopes = 'https://www.googleapis.com/auth/gmail.readonly';
        function handleClientLoad() {
  gapi.client.setApiKey(apiKey);
  window.setTimeout(checkAuth, 1);
}

function checkAuth() {
  gapi.auth.authorize({
    client_id: clientId,
    scope: scopes,
    immediate: true
  }, handleAuthResult);
}

function handleAuthClick() {
  gapi.auth.authorize({
    client_id: clientId,
    scope: scopes,
    immediate: false
  }, handleAuthResult);
  return false;
}

function handleAuthResult(authResult) {
  if(authResult && !authResult.error) {
    loadGmailApi();
    $('#authorize-button').remove();
    $('.table-inbox').removeClass("hidden");
  } else {
    $('#authorize-button').removeClass("hidden");
    $('#authorize-button').on('click', function(){
      handleAuthClick();
    });
  }
}

function loadGmailApi() {
  gapi.client.load('gmail', 'v1', displayInbox);
}
      </script>

      <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>

  </body>
</html>
@endsection
