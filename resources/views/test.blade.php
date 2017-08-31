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
       <button class="googleContactsButton">Get my contacts</button>

     <p>Gmail API Quickstart</p>

    Add buttons to initiate auth sequence and sign out
     <button id="authorize-button" style="display: none;">Authorize</button>
     <button id="signout-button" style="display: none;">Sign Out</button>

     <pre id="content"></pre>

     <script type="text/javascript">
       // Client ID and API key from the Developer Console
       var CLIENT_ID = '735097041023-sohugeckr0u9ltkmni4hd05pmmkc4a7p.apps.googleusercontent.com';

       // Array of API discovery doc URLs for APIs used by the quickstart
       var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];

       // Authorization scopes required by the API; multiple scopes can be
       // included, separated by spaces.
       var SCOPES = 'https://www.googleapis.com/auth/gmail.readonly';

       var authorizeButton = document.getElementById('authorize-button');
       var signoutButton = document.getElementById('signout-button');

       /**
        *  On load, called to load the auth2 library and API client library.
        */
       function handleClientLoad() {
         gapi.load('client:auth2', initClient);
       }

       /**
        *  Initializes the API client library and sets up sign-in state
        *  listeners.
        */
       function initClient() {
         gapi.client.init({
           discoveryDocs: DISCOVERY_DOCS,
           clientId: CLIENT_ID,
           scope: SCOPES
         }).then(function () {
           // Listen for sign-in state changes.
           gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

           // Handle the initial sign-in state.
           updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
           authorizeButton.onclick = handleAuthClick;
           signoutButton.onclick = handleSignoutClick;
         });
       }

       /**
        *  Called when the signed in status changes, to update the UI
        *  appropriately. After a sign-in, the API is called.
        */
       function updateSigninStatus(isSignedIn) {
         if (isSignedIn) {
           authorizeButton.style.display = 'none';
           signoutButton.style.display = 'block';
           listLabels();
         } else {
           authorizeButton.style.display = 'block';
           signoutButton.style.display = 'none';
         }
       }

       /**
        *  Sign in the user upon button click.
        */
       function handleAuthClick(event) {
         gapi.auth2.getAuthInstance().signIn();
       }

       /**
        *  Sign out the user upon button click.
        */
       function handleSignoutClick(event) {
         gapi.auth2.getAuthInstance().signOut();
       }

       /**
        * Append a pre element to the body containing the given message
        * as its text node. Used to display the results of the API call.
        *
        * @param {string} message Text to be placed in pre element.
        */
       function appendPre(message) {
         var pre = document.getElementById('content');
         var textContent = document.createTextNode(message + '\n');
         pre.appendChild(textContent);
       }

       /**
        * Print all Labels in the authorized user's inbox. If no labels
        * are found an appropriate message is printed.
        */
       function listLabels() {
         gapi.client.gmail.users.labels.list({
           'userId': 'me'
         }).then(function(response) {
           var labels = response.result.labels;
           appendPre('Labels:');

           if (labels && labels.length > 0) {
             for (i = 0; i < labels.length; i++) {
               var label = labels[i];
               appendPre(label.name)
             }
           } else {
             appendPre('No Labels found.');
           }
         });
       }

     </script>

     <script async defer src="https://apis.google.com/js/api.js"
       onload="this.onload=function(){};handleClientLoad()"
       onreadystatechange="if (this.readyState === 'complete') this.onload()">
     </script>

  </body>
</html>
@endsection
