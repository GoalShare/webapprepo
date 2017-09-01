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

  var CLIENT_ID = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';
  var SCOPES = ['https://www.googleapis.com/auth/gmail.readonly'];
  var USER = 'me';

    /**
     * Called when the client library is loaded to start the auth flow.
     */
    function handleClientLoad() {
      window.setTimeout(checkAuth, 1);
    }

    /**
     * Check if the current user has authorized the application.
     */
    function checkAuth() {
      gapi.auth.authorize(
          {'client_id': CLIENT_ID, 'scope': SCOPES, 'immediate': true},
          handleAuthResult);
    }

    /**
     * Called when authorization server replies.
     *
     * @param {Object} authResult Authorization result.
     */
    function handleAuthResult(authResult) {
      var authButton = document.getElementById('authorizeButton');
      var outputNotice = document.getElementById('notice');
      authButton.style.display = 'none';
      outputNotice.style.display = 'block';
      if (authResult && !authResult.error) {
        // Access token has been successfully retrieved, requests can be sent to the API.
        gapi.client.load('gmail', 'v1', function() {
          listThreads(USER, function(resp) {
            var threads = resp.threads;
            for (var i = 0; i < threads.length; i++) {
              var thread = threads[i];
              console.log(thread);
              console.log(thread['id']);
            }
          });
        });
      } else {
        // No access token could be retrieved, show the button to start the authorization flow.
        authButton.style.display = 'block';
        outputNotice.style.display = 'none';
        authButton.onclick = function() {
            gapi.auth.authorize(
                {'client_id': CLIENT_ID, 'scope': SCOPES, 'immediate': false},
                handleAuthResult);
        };
      }
    }


    /**
     * Get a page of Threads.
     *
     * @param  {String} userId User's email address. The special value 'me'
     * can be used to indicate the authenticated user.
     * @param  {Function} callback Function called when request is complete.
     */
    function listThreads(userId, callback) {
      var request = gapi.client.gmail.users.threads.list({
        'userId': userId
      });
      request.execute(callback);
    }

        </script>
         <!-- <button onclick="auth();">GET CONTACTS FEED</button>
         <span id="test1"></span>
         <span id="test2"></span> -->
        <!-- <button class="googleContactsButton">Get my contacts</button> -->

<button id="authButton" onclick="checkAuth();">Authorise</button>
<button id="outputNotice">Notise</button>
  </body>
</html>
@endsection
